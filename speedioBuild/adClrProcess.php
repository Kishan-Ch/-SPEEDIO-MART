<?php

require "connection.php";

$clr = $_POST["adClr"];

if (!empty($clr)) {
    
    Database::iud("INSERT INTO `colour` (`name`) VALUES ('".$clr."')");

    echo("success");

}else {
    echo("Empty Colour name.");
}

?>