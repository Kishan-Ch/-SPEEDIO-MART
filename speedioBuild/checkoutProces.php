<?php

include "connection.php";
session_start();
$user = $_SESSION["user"];

if (isset($_POST["payment"])) {
    
    $payment = json_decode($_POST["payment"],true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `order_history`(`oh_id`,`order_date`,`amount`,`user_email`) VALUES ('".$payment["order_id"]."','".$time."','".$payment["amount"]."','".$user["email"]."')");

    $orderHistoryId = Database::$connection->insert_id;

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$user["email"]."'");
    $num = $rs->num_rows;

    for ($i=0; $i < $num; $i++) { 
        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `order_item`(`order_qty`,`product_id`,`order_history_id`) VALUES ('".$crt_data["qty"]."','".$crt_data["product_id"]."','".$orderHistoryId."')");

        $rs2 = Database::search("SELECT * FROM `product` WHERE `id`='".$crt_data["product_id"]."'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $crt_data["qty"];
        Database::iud("UPDATE `product` SET `qty`='".$newQty."' WHERE `id`='".$crt_data["product_id"]."'");

    }

    Database::iud("DELETE FROM `cart` WHERE `user_email`='".$user["email"]."'");
    
    $order = array();
    $order["resp"] = "Success";
    $order["order_id"] = $orderHistoryId;

    echo json_encode($order);


}

?>