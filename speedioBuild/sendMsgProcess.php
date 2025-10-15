<?php

require "connection.php";
session_start();

$sender = $_SESSION["user"]["email"];
$msg = $_POST["msg_txt"];

$d = new DateTime();
$tZone = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tZone);
$date = $d->format("Y-m-d H:i:s");

$admin_rs = Database::search("SELECT * FROM `user` WHERE `user_type_id`='1'");
$admin_num = $admin_rs->num_rows;
if ($admin_num == 1) {
    $admin_data = $admin_rs->fetch_assoc();
}


Database::iud("INSERT INTO `chat` (`content`,`date_time`,`status`,`from`,`to`) VALUES ('".$msg."','".$date."','0','".$sender."','".$admin_data["email"]."')");

echo("success");

?>