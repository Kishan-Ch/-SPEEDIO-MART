<?php

session_start();
include "connection.php";

$email = $_SESSION["user"]["email"];

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$city = $_POST["city"];
$district = $_POST["district"];
$province = $_POST["province"];
$pcode = $_POST["pcode"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
$user_num = $user_rs->num_rows;
if ($user_num == 1) {
    
    Database::iud("UPDATE `user` SET `fname`='".$fname."',`lname`='".$lname."',`password`='".$password."',`gender_id`='".$gender."',`mobile`='".$mobile."' WHERE `email`='".$email."'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '".$email."'");
    if ($address_rs->num_rows == 1) {
        Database::iud("UPDATE `user_has_address` SET `city_id` = '".$city."', `line1` = '".$line1."', `line2` = '".$line2."', `postal_code` = '".$pcode."' WHERE `user_email` = '".$email."'");
    } else {
        Database::iud("INSERT INTO `user_has_address` (`city_id`, `line1`, `line2`, `postal_code`, `user_email`) VALUES ('".$city."', '".$line1."', '".$line2."', '".$pcode."', '".$email."')");
    }
    if (sizeof($_FILES) == 1) {
        
        $proImg = $_FILES["proImg"];
        $image_extension = $proImg["type"];

        $allowed_image_extensions = array("image/jpeg","image/jpg","image/png","image/svg+xml");

        if (in_array($image_extension,$allowed_image_extensions)) {
            $new_image_extension;

            if ($image_extension == "image/jpeg") {
                $new_image_extension = ".jpeg";
            }else if($image_extension == "image/jpg"){
                $new_image_extension = ".jpg";
            }else if($image_extension == "image/png"){
                $new_image_extension = ".png";
            }elseif ($image_extension == "image/svg+xml") {
                $new_image_extension = ".svg";
            }

            $file_name = "resources//profile_images//".$fname."_".uniqid().$new_image_extension;
            move_uploaded_file($proImg["tmp_name"],$file_name);

            $pro_img_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email`='".$email."'");
            
            if ($pro_img_rs->num_rows == 1) {
                
                Database::iud("UPDATE `profile_images` SET `path`='".$file_name."' WHERE `user_email`='".$email."'");
                echo("Updated");

            }else{

                Database::iud("INSERT INTO `profile_images`(`path`,`user_email`) VALUES ('".$file_name."','".$email."')");
                echo("Saved");

            }
            echo("Update Successfully");
        }

    }elseif (sizeof($_FILES) >= 2) {
        echo("You must select only 01 Image");
    }


}else{
    echo("Invalid User");
}



?>