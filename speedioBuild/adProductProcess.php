<?php

session_start();
require "connection.php";

$email = $_SESSION["admin"]["email"];

$title = $_POST["title"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$clr = $_POST["clr"];
$con = $_POST["con"];
$price = $_POST["price"];
$desc = $_POST["desc"];
$qty = $_POST["qty"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];

if (empty($title)) {
    echo ("*Please enter the Product Name");
} elseif (empty($category)) {
    echo ("*Please enter the Product Category");
} elseif (empty($brand)) {
    echo ("*Please enter the Brand of Product");
} elseif (empty($clr)) {
    echo ("*Please enter the Product color");
} elseif (empty($con)) {
    echo ("*Please enter the Product Condition");
} elseif (empty($price)) {
    echo ("*Please enter the Price of Product");
} elseif (empty($desc)) {
    echo ("*Please enter the Description to Product");
} elseif (empty($qty)) {
    echo ("*Please enter the Quantity of Product");
} elseif (empty($dwc)) {
    echo ("*Please enter the Delivery charge within Colombo");
} elseif (empty($doc)) {
    echo ("*Please enter the Delivery charge out of Colombo");
} else {

    $cHasB_rs = Database::search("SELECT * FROM `category_has_brand` WHERE `category_id`='" . $category . "' AND `brand_id`='" . $brand . "' ");

    $cHasB_id;

    if ($cHasB_rs->num_rows > 0) {


        $cHasB_data = $cHasB_rs->fetch_assoc();
        $cHasB_id = $cHasB_data["id"];
    } else {

        Database::iud("INSERT INTO `category_has_brand`(`category_id`,`brand_id`) VALUES ('" . $category . "','" . $brand . "')");
        $cHasB_id = Database::$connection->insert_id;
    }

    $d = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($timeZone);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product`(`category_id`,`brand_id`,`category_has_brand_id`,`title`,`description`,`price`,
            `qty`,`colour_id`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`,`condition_id`,`status_id`,`user_email`) VALUES
            ('" . $category . "','" . $brand . "','" . $cHasB_id . "','" . $title . "','" . $desc . "','" . $price . "','" . $qty . "','" . $clr . "','" . $date . "','" . $doc . "','" . $dwc . "','" . $con . "',
            '" . $status . "','" . $email . "')");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
                $file_extension = $img_file["type"];

                if (in_array($file_extension, $allowed_img_extensions)) {

                    $new_img_extension;

                    if ($file_extension == "image/jpg") {
                        $new_img_extension = ".jpg";
                    } elseif ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } elseif ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } elseif ($file_extension == "image/svg+xml") {
                        $new_img_extension = "..svg";
                    }

                    $file_name = "resources//products//" . $title . "_" . $x . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images`(`path`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
                    
                } else {
                    echo ("This Image type is not Support");
                }
            }
        }

        echo ("Success");

       
    } else {
        echo ("Invalid Image Count");
    }
}

?>