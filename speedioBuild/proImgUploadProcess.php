<?php

session_start();
include "connection.php";

$uEmail = $_SESSION["admin"]["email"];

if ($_FILES["proImg"] == 1) {

    $rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email`='" . $uEmail . "'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();

    $path  = "resources/profile_images/" . uniqid() . ".jpeg";
    move_uploaded_file($_FILES["proImg"]["tmp_name"], $path);

    if ($num == 1) {
        Database::iud("UPDATE `profile_images` SET `path`='" . $path . "' WHERE `user_email`='" . $uEmail . "'");
        echo ($path);
    } else {
        Database::iud("INSERT INTO `profile_images`(`path`,`user_email`) VALUES ('".$path."','".$uEmail."')");
        echo($path);
    }

} else {
    echo ("Invalid Img Count");
}
