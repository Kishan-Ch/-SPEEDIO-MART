<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$m = $_POST["m"];
$p = $_POST["p"];
$rp = $_POST["rp"];

if (empty($fn)) {
    echo("Please enter your First Name");
}elseif (strlen($fn) > 50) {
    echo("First Name must have less than 50 characters");
}elseif (empty($ln)) {
   echo("Please enter your Last Name");
}elseif (strlen($ln) > 50) {
    echo("Last Name must have less than 50 characters");
}elseif (empty($e)) {
    echo("Please enter your Email Address");
}elseif (strlen($e) > 100) {
    echo("Email Address must have less than 100 characters");
}elseif (!filter_var($e,FILTER_VALIDATE_EMAIL)) {
    echo("Invalid Email Address");
}elseif (empty($m)) {
    echo("Please enter your Mobile Number");
}elseif (strlen($m) != 10) {
    echo("Invalid Phone Number");
}elseif (!preg_match("/07[1,2,4,5,6,7,8][0-9]/",$m)) {
    echo("Invalid Phone Number");
}elseif (empty($p)) {
    echo("Please enter your Password");
}elseif (strlen($p) < 5 || strlen($p) > 20) {
    echo("Password length must be between 5 and 20");
}elseif (empty($rp)) {
    echo("Re enter your Password");
}elseif ($p != $rp) {
    echo("Please enter same Password");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$e."' OR `mobile`='".$m."'");

    $num = $rs->num_rows;

    if ($num != 0) {
        echo("User with the same Email or Mobile already exists");
    }else{

        $dtime = new DateTime();
        $timeZone = new DateTimeZone("Asia/Colombo");
        $dtime->setTimezone($timeZone);
        $date = $dtime->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status`,`user_type_id`) VALUES 
                                    ('".$fn."','".$ln."','".$e."','".$p."','".$m."','".$date."','1','2')");

        echo("Successfully. You can Sign in your Acccount");

    }



}
