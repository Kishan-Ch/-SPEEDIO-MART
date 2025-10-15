<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart | Speedio Mart</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="icon.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <?php

            require "header.php";
            include "connection.php";
            if (isset($_SESSION["user"])) {

                $userEmail = $_SESSION["user"]["email"];
            ?>

                <div id="center" class="center_o pt-4 pb-4 bg-light">
                    <div class="container-xl">
                        <div class="row center_o1 text-center">
                            <div class="col-md-12">
                                <h1>SHOPPING CART</h1>
                                <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Shopping Cart</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $netTotal = 0;

                $crt_rs = Database::search("SELECT *,(cart.id) AS `cid`,(product.id) AS `pid`,(brand.name) AS `bname`,(cart.qty) AS `crt_qty` FROM `cart` INNER JOIN `product` 
                                                ON cart.product_id=product.id INNER JOIN `brand` ON product.brand_id= brand.id INNER JOIN `colour` ON product.colour_id=colour.id WHERE `cart`.`user_email`='" . $userEmail . "'");

                $crt_num = $crt_rs->num_rows;

                if ($crt_num == 0) {
                ?>

                    <div class="col-12 bg-light mt-5">
                        <div class="d-flex justify-content-center" style="height: 100px;">
                            <h3 class="mt-4" style="font-weight: 500;">EMPTY CART !</h3>
                        </div>
                    </div>

                <?php
                } else {
                ?>

                <div id="cart_page" class="cart pt-4 pb-4 mb-5">
                    <div class="container-xl">
                        <div class="cart_2 row">
                            <div class="col-md-6">
                                <h5>MY CART</h5>
                            </div>
                        </div>
                        <div class="cart_3 row mt-3" id="cartBody">
                            <div class="col-md-8">
                                <div class="cart_3l">
                                    <h6>PRODUCT</h6>
                                </div>

                                <?php

                                if ($crt_num > 0) {

                                    for ($ct = 0; $ct < $crt_num; $ct++) {
                                        $crt_data = $crt_rs->fetch_assoc();
                                        $total = $crt_data["price"] * $crt_data["crt_qty"];
                                        $netTotal = $netTotal + $total;

                                ?>

                                        <div class="cart_3l1 mt-3 row ms-0 me-0" style="border-bottom: 8px solid #ebedf0; padding-bottom: 20px;">
                                            <div class="col-md-3 ps-0 col-3">
                                                <div class="cart_3l1i">

                                                    <?php

                                                    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $crt_data["pid"] . "'");
                                                    $img_data = $img_rs->fetch_assoc();

                                                    ?>
                                                    <a href="#"><img src="<?php echo $img_data["path"]; ?>" alt="abc" class="w-100" height="200px"></a>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-9">
                                                <div class="cart_3l1i1">

                                                    <h6 class="fw-bold" style="text-decoration: none; color: #000;"><?php echo $crt_data["title"]; ?></h6>
                                                    <?php

                                                    ?>
                                                    <h6 class="fw-normal font_12 mt-3"><?php echo $crt_data["name"]; ?> Color <?php if ($crt_data["category_id"] == 1) {

                                                                                                                                    $size_rs = Database::search("SELECT *,(size.name) AS `sname` FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_size_id=size.size_id WHERE `product_id`='" . $crt_data["pid"] . "'");
                                                                                                                                    $size_data = $size_rs->fetch_assoc();
                                                                                                                                ?>/ <?php echo $size_data["sname"];
                                                                                                                                } ?> </h6>


                                                    <h6 class="font_12 mt-3"><?php echo $crt_data["bname"]; ?></h6>
                                                    <h5 class="col_yell mt-3">Rs. <?php echo $crt_data["price"]; ?>.00</h5>
                                                    <h6 class="font_12 mt-3 mb-3">Quantity</h6>
                                                </div>
                                                <div class="cart_3l1i2">
                                                    <input type="number" min="1" value="<?php echo $crt_data["crt_qty"]; ?>" onchange="cartQty(<?php echo $crt_data['cid']; ?>); " class="form-control" id="cartQty">
                                                    <h6><a class="button_1 mx-3" href="#" onclick="removeCart(<?php echo $crt_data['cid']; ?>);">REMOVE</a></h6>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                <?php
                                }
                                ?>

                            </div>
                            <div class="col-md-4">
                                <div class="cart_3r">
                                    <h6 class="head_1">SUBTOTAL</h6>
                                    <div class="checkout_1r" style="border: 1px solid #f7ba0121; padding: 25px 15px 30px 15px;">
                                        <h5>CART TOTALS</h5>
                                        <hr class="line" style="height: 3px!important; width: 100px; background-color: #f7ba01;">
                                        <h6 class="fw-bold font_13" style="font-size: 13px;">Sub Total <span class="pull-right" style="float: right;">Rs. <?php echo $netTotal; ?>.00</span></h6>



                                        <?php

                                        $add_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $userEmail . "'");
                                        $add_data = $add_rs->fetch_assoc();

                                        if (empty($add_data["city_id"])) {
                                        ?>
                                            <h6 class="fw-bold mt-3 font_13" style="font-size: 13px;">(+) Shipping <span class="pull-right" style="float: right;">Rs. <?php echo $crt_data["delivery_fee_other"]; ?>.00</span></h6>
                                            <hr>
                                            <h6 class="fw-bold font_13" style="font-size: 13px;">Total <span class="pull-right" style="float: right;">Rs. <?php echo ($netTotal + $crt_data["delivery_fee_other"]) ?>.00</span></h6><br>

                                        <?php
                                        } elseif ($add_data["city_id"] == 3) {
                                        ?>
                                            <h6 class="fw-bold mt-3 font_13" style="font-size: 13px;">(+) Shipping <span class="pull-right" style="float: right;">Rs. <?php echo $crt_data["delivery_fee_colombo"]; ?>.00</span></h6>
                                            <hr>
                                            <h6 class="fw-bold font_13" style="font-size: 13px;">Total <span class="pull-right" style="float: right;">Rs. <?php echo ($netTotal + $crt_data["delivery_fee_colombo"]) ?>.00</span></h6><br>


                                        <?php
                                        } else {
                                        ?>
                                            <h6 class="fw-bold mt-3 font_13" style="font-size: 13px;">(+) Shipping <span class="pull-right" style="float: right;">Rs. <?php echo $crt_data["delivery_fee_other"]; ?>.00</span></h6>
                                            <hr>
                                            <h6 class="fw-bold font_13" style="font-size: 13px;">Total <span class="pull-right" style="float: right;">Rs. <?php echo ($netTotal + $crt_data["delivery_fee_other"]) ?>.00</span></h6><br>

                                        <?php
                                        }
                                        ?>



                                        <h5>PAYMENTS</h5>
                                        <hr class="line" style="height: 3px!important; width: 100px; background-color: #f7ba01;">

                                        <h6 class="mt-4"><a class="button d-block text-center" href="#" onclick="checkout();">PROCEED TO CHECKOUT</a></h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }

                require "footer.php";
            } else {
            ?>

                <div class="center_o pb-5 bg-light mt-4" style="height: 365px;">
                    <div class="container-xl">
                        <div class="row text-center">
                            <div class="col-md-12">

                                <p style="margin-top: 90px; font-family: 'Times New Roman'; color: #89817e;">Please Sign in or Sign up first.</p>
                                <a href="login.php" style="margin-top: 100px; font-family: 'Times New Roman';" class="col-6 col-md-3 btn btn-sm btn-warning text-white">SIGN IN / SIGN UP</a>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }

            ?>

        </div>
    </div>


    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>