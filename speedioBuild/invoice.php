<?php

session_start();
include "connection.php";
$user = $_SESSION["user"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `oh_id`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Invoice | Speedio Mart</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="icon.png" />
    </head>

    <body>

        <div class="container text-end mt-3">
            <a href="index.php" class="btn btn-sm btn-outline-dark">Home</a>
        </div>

        <div class="container mt-4 mb-4">
            <div class="border border-3 p-5 rounded-3">
                <div class="row">

                    <div class="modal-body bg-light">

                        <hr />

                        <div class="row justify-content-between ">
                            <div class="col-4 text-start">
                                <h6 style="font-size: 12px; ">Invoice: #<?php echo $d["oh_id"]; ?></h6>
                                <h6 style="font-size: 12px; margin-top: -5px;">Date: <?php echo $d["order_date"]; ?></h6>
                                <h6 style="font-size: 12px; margin-top: -5px;">Mobile: <?php echo $user["mobile"]; ?></h6>

                                <?php
                                $add_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON user_has_address.city_id=city.id WHERE `user_email`='" . $user["email"] . "'");
                                $add_data = $add_rs->fetch_assoc();
                                ?>

                                <h6 style="font-size: 12px; margin-top: -5px;">Address: <?php echo $add_data["line1"]; ?>, <?php echo $add_data["line2"]; ?>,</h6>
                                <h6 style="font-size: 12px; margin-top: -5px;"><?php echo $add_data["city_name"]; ?></h6>
                            </div>
                            <div class="col-4 d-flex text-end">
                                <h6 class="fw-bold offset-5" style="font-size: 12px;">Receiver:</h6>
                                <br />
                                <h6 class="offset-" style="font-size: 12px; "><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h6>
                            </div>
                        </div>

                        <table class="table mt-3" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Price(Rs)</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal(Rs)</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                <?php

                                $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `product` ON order_item.product_id=product.id WHERE order_item.order_history_id ='" . $orderHistoryId . "'");
                                $num2 = $rs2->num_rows;

                                for ($i = 0; $i < $num2; $i++) {
                                    $d2 = $rs->fetch_assoc();

                                ?>

                                    <tr class="mb-2">
                                        <th><?php echo $d2["title"]; ?></th>
                                        <td>Rs. <?php echo $d2["price"]; ?>.00</td>
                                        <td><?php echo $d2["order_qty"]; ?></td>
                                        <td>Rs.  <?php echo ($d2["price"] * $d2["order_qty"]) ?>.00</td>
                                    </tr>

                                <?php

                                }

                                ?>

                            </tbody>
                        </table>
                        <div class="text-end pe-4 mt-4">
                            <span> Total: Rs. <?php echo $d["amount"]; ?>.00</span>
                        </div>

                        <hr />



                    </div>

                </div>
            </div>
        </div>

    </body>

    </html>

<?php

} else {
    header("Location: index.php");
}


?>