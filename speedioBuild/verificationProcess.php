<?php

require "connection.php";

$verifyC = $_POST["verifyC"];
$pw3 = $_POST["pw3"];
$pw4 = $_POST["pw4"];
$email3 = $_POST["email3"];

if (empty($verifyC)) {
    echo("Please Type your Verification Code");
}elseif(empty($pw3)){
    echo("Please enter your Password");
}elseif(strlen($pw3) < 5 || strlen($pw3) > 20){
    echo("Invalid Password");
}elseif(empty($pw4)){
    echo("Please Re-type your Password");
}elseif($pw3 != $pw4){
    echo("These Password are not Same. Please try Again");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email3."' AND `verification_code`='".$verifyC."'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
        Database::iud("UPDATE `user` SET `password`='".$pw4."' WHERE `email`='".$email3."'");
        echo("Successfully");

    }else{
        echo("Invalid Email Address or Verification Code");
    }

}


?>