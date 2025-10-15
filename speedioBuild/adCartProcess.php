<?php

session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_GET["id"]) {
        
        $pid = $_GET["id"];
        $email = $_SESSION["user"]["email"];

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
        $product_data = $product_rs->fetch_assoc();
        $product_qty = $product_data["qty"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 1) {
            $cart_data = $cart_rs->fetch_assoc();
            $cart_qty = $cart_data["qty"];
            $new_qty = (int)$cart_qty +1;

            if ($product_qty >= $new_qty) {
                
                Database::iud("UPDATE `cart` SET `qty`='".$new_qty."' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
                echo("Update Finished");

            }else{
                echo("Invalid Quantity");
            }

        }else{
            Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`qty`) VALUES ('".$pid."','".$email."','1')");
            echo("Product be Added");
        }

    }else{
        echo("Something went wrong");
    }
}else{
    echo("Please Login First");
}

?>