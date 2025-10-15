<?php

session_start();
include "connection.php";
$user = $_SESSION["user"];

$prodlist = array();
$crtQty = array();

if (isset($_POST["cart"]) && $_POST["cart"] == "true") {

    $crt_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user["email"] . "'");
    $crt_num = $crt_rs->num_rows;

    for ($i = 0; $i < $crt_num; $i++) {
        $crt_data = $crt_rs->fetch_assoc();

        $prodlist[] = $crt_data["product_id"];
        $crtQty[] = $crt_data["qty"];
    }
} else {

    $prodlist[] = $_POST["prodId"];
    $crtQty[] = $_POST["qty"];

}

$merchantId = "1227033";
$merchantSecret = "MzAyNTU5NDIzMTI4NTIxOTI2MDE1NDEyMzMzMTMzMTIxMzA0ODU=";
$items = "";
$netTotal = 0;
$currency = "LKR";
$oderId = uniqid();

for ($i = 0; $i < sizeof($prodlist); $i++) {
    $rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $prodlist[$i] . "'");
    $d = $rs->fetch_assoc();

    $prodQty = $d["qty"];
    if ($prodQty >= $crtQty[$i]) {
        $items .= $d["title"];

        if ($i != sizeof($prodlist) - 1) {
            $items .= ", ";
        }

        $netTotal += (intval($d["price"]) * intval($crtQty[$i]));

    } else {
        echo ("Product has no available in Stock");
    }
}

$add_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON user_has_address.city_id=city.id WHERE `user_email`='" . $user["email"] . "'");
$add_data = $add_rs->fetch_assoc();

if ($add_data["city_id"] == 3) {
    $deliv_fee = $d["delivery_fee_colombo"];
} else {
    $deliv_fee = $d["delivery_fee_other"];
}

$netTotal += $deliv_fee;

$hash = strtoupper(
    md5(
        $merchantId .
            $oderId .
            number_format($netTotal, 2, '.', '') .
            $currency .
            strtoupper(md5($merchantSecret))
    )
);

$payment = array();
$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user["email"];
$payment["phone"] = $user["mobile"];
$payment["address"] = $add_data["line1"] . "," . $add_data["line2"];
$payment["city"] = $add_data["city_name"];
$payment["country"] = "Sri Lanka";
$payment["order_id"] = $oderId;
$payment["items"] = $items;
$payment["currency"] = $currency;
$payment["amount"] = number_format($netTotal, 2, '.', '');
$payment["hash"] = $hash;
$payment["return_url"] = "";
$payment["cancel_url"] = "";
$payment["notify_url"] = "";

echo json_encode($payment);

?>