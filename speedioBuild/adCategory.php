<?php

require "connection.php";

$category = $_POST["adCategory"];

if (!empty($category)) {
   
    Database::iud("INSERT INTO `category` (`name`) VALUES ('".$category."')");

    echo("success");
    
}else{
    echo("Empty Category name.");
}

?>