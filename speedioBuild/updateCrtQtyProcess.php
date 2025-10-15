<?php

session_start();
include "connection.php";

$email = $_SESSION["user"]["email"];

$crt_id = $_POST["x"];
$crt_qty = $_POST["qty"];

Database::iud("UPDATE `cart` SET `qty`='".$crt_qty."' WHERE `id`='".$crt_id."' AND `user_email`='".$email."'");
echo("Updated");

?>