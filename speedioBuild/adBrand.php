<?php

require "connection.php";

$brand = $_POST["adBrand"];

if (!empty($brand)) {
    
    Database::iud("INSERT INTO `brand` (`name`) VALUES ('".$brand."')");

    echo("success");

}else{
    echo("Empty Brand name.");
}

?>