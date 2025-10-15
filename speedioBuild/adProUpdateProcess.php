<?php

session_start();
include "connection.php";

$email = $_SESSION["admin"]["email"];

$adpPw = $_POST["adpPw"];
$adMobile = $_POST["adMobile"];
$adGender = $_POST["adGender"];
$adCity = $_POST["adCity"];
$adDistrict = $_POST["adDistrict"];
$adProvince = $_POST["adProvince"];
$adPcode = $_POST["adPcode"];

if (empty($adGender)) {
    echo("You are Not select Gender");
}elseif (empty($adCity)) {
    echo("You are Not select City");
}elseif (empty($adDistrict)) {
    echo("You are Not select District");
}elseif (empty($adProvince)) {
    echo("You are Not select Province");
}elseif (empty($adPcode)) {
    echo("You are Not Enter Postal Code");
}elseif (strlen($adMobile) != 10) {
    echo("Invalid Phone Number");
}else{


    Database::iud("UPDATE `user` SET `password`='".$adpPw."',`mobile`='".$adMobile."',`gender_id`='".$adGender."' WHERE `email`='".$email."'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");
    $address_num = $address_rs->num_rows;
    if ($address_num == 1) {
       Database::iud("UPDATE `user_has_address` SET `city_id`='".$adCity."',`postal_code`='".$adPcode."' WHERE `user_email`='".$email."'");
       echo("Updated");
    }else{
        Database::iud("INSERT INTO `user_has_address`(`city_id`,`postal_code`,`user_email`) VALUES ('".$adCity."','".$adPcode."','".$email."')");
       echo("Updated");

    }

}

?>