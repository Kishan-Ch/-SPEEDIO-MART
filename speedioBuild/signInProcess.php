<?php

session_start();

require "connection.php";

$email = $_POST["e2"];
$pw = $_POST["pw2"];
$rm = $_POST["rm"];

if (empty($email)) {
    echo ("Please enter your Email Address");
}elseif (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
}elseif (empty($pw)) {
    echo ("Please enter your Password");
}elseif (strlen($pw) < 5 || strlen($pw) > 20) {
    echo ("Invalid Password");
}else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password` = '".$pw."'");

    $num = $rs->num_rows;

    if ($num == 1) {

        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == "2") {
            echo("Success");
            $_SESSION["user"] = $d;

        }elseif ($d["user_type_id"] == "1") {
           echo("Admin Login");
           $_SESSION["admin"] = $d;
        }
       
        
        
        

        if ($rm == "true") {
            
            setcookie("email",$email,time() + (60*60*24*365));
            setcookie("password",$pw,time() + (60*60*24*365));
            
        }else {
            setcookie("email","",-1);
            setcookie("password","",-1);
        }
        
    }else{
        echo("Invalid Email Address or Password");
    }

}


?>