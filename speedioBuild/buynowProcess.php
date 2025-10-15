<?php

session_start();
include "connection.php";

$user = $_SESSION["user"];

if (isset($_POST["payment"])) {
   
    $payment = json_decode($_POST["payment"],true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `order_history`(`oh_id`,`order_date`,`amount`,`user_email`) VALUES ('".$payment["order_id"]."','".$time."','".$payment["amount"]."','".$user["email"]."')");

    $orderHistoryId = Database::$connection->insert_id;

    Database::iud("INSERT INTO `order_item`(`order_qty`,`product_id`,`order_history_id`) VALUES ('".$payment["qty"]."','".$orderHistoryId."','".$payment["stock_id"]."')");

    $rs = Database::search("SELECT * FROM `product` WHERE `id`='".$payment["stock_id"]."'");
    $d = $rs->fetch_assoc();

    $newQty = $d["qty"] - $payment["qty"];
    Database::iud("UPDATE `product` SET `qty`='".$newQty."' WHERE `id`='".$payment["stock_id"]."'");
    
    $order = array();
    $order["resp"] = "Success";
    $order["order_id"] = $orderHistoryId;

    echo json_encode($order);

}

?>