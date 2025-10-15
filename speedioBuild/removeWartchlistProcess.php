<?php

include "connection.php";

$watchlist_id = $_POST["x"];

Database::iud("DELETE FROM `watchlist` WHERE `product_id`='".$watchlist_id."'");
echo("Product was Deleted");

?>