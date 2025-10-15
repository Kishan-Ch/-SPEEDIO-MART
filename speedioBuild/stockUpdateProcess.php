<?php

require "connection.php";

$prID = $_POST["prID"];
$adPrice = $_POST["adPrice"];
$adQty = $_POST["adQty"];

if (empty($prID)) {
    echo("Please select Product what do you want to update");
}elseif (empty($adQty)) {
    echo("Please Enter Quantity value");
}else{

    if (empty($adPrice)) {
        $st_rs = Database::search("UPDATE `product` SET `qty`='".$adQty."' WHERE `id`='".$prID."'");
    echo("Quantity Update Successfully");
    }else {
        $st_rs = Database::search("UPDATE `product` SET `price`='".$adPrice."',`qty`='".$adQty."' WHERE `id`='".$prID."'");
        echo("Updated");
    }

}



?>