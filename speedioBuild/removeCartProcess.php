<?php

include "connection.php";

$cart_id = $_POST["x"];

Database::iud("DELETE FROM `cart` WHERE `id`='".$cart_id."'");
echo("Product was removed Successfully");


?>