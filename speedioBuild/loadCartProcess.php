<?php

session_start();
require "connection.php";

$userEmail = $_SESSION["user"]["email"];
$netTotal = 0;

$rs = Database::search("SELECT *,(cart.qty) AS `cQty`,(colour.name) AS `colour_name`,(size.name) AS `sname`,(brand.name) `bname` FROM `cart` INNER JOIN `product` ON cart.product_id=product.id INNER JOIN `colour` 
                        ON product.colour_id=colour.id INNER JOIN `brand` ON product.brand_id=brand.id INNER JOIN `product_has_size` ON 
                        product.id=product_has_size.product_id INNER JOIN `size` ON product_has_size.size_size_id=size.size_id WHERE cart.user_email='" . $userEmail . "'");

$num = $rs->num_rows;
echo($num);

if ($num > 0) {
?>

    <div class="col-md-8">
        <div class="cart_3l">
            <h6>PRODUCT</h6>
        </div>
        <?php

        for ($c = 0; $c < $num; $c++) {
            $d = $rs->fetch_assoc();
            $total = $d["price"] * $d["cQty"];
            $netTotal += $total;

        ?>

            <div class="cart_3l1 mt-3 row ms-0 me-0" style="border-bottom: 1px solid #f7ba0121; padding-bottom: 20px;">
                <div class="col-md-3 ps-0 col-3">
                    <div class="cart_3l1i">
                        <a href="#"><img src="<?php echo $d["path"]; ?>" class="w-100"></a>
                    </div>
                </div>
                <div class="col-md-9 col-9">
                    <div class="cart_3l1i1">
                        <h6 class="fw-bold" style="text-decoration: none; color: #000;"><?php echo $d["title"]; ?></h6>
                        <h6 class="fw-normal font_12 mt-3"><?php echo $d["colour_name"]; ?> <?php if ($d["category_id"] == 1) {
                            ?>
                            / <?php echo $d["sname"]; ?>
                            <?php
                        } ?></h6>
                        <h6 class="font_12 mt-3"><?php echo $d["bname"]; ?></h6>
                        <h5 class="col_yell mt-3">Rs. <?php echo $d["price"]; ?>.00</h5>
                        <h6 class="font_12 mt-3 mb-3">Quantity</h6>
                    </div>
                    <div class="cart_3l1i2">
                        <input type="number" min="1" value="1" class="form-control" placeholder="Qty">
                        <h6><a class="button_1 mx-3" href="#">REMOVE</a></h6>
                    </div>
                </div>
            </div>

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
                <h6 class="fw-bold font_13" style="font-size: 13px;">Sub Total <span class="pull-right" style="float: right;">$230.00</span></h6>
                <h6 class="fw-bold mt-3 font_13" style="font-size: 13px;">(+) Shipping <span class="pull-right" style="float: right;">$20.00</span></h6>
                <hr>
                <h6 class="fw-bold font_13" style="font-size: 13px;">Total <span class="pull-right" style="float: right;">$250.00</span></h6><br>
                <h5>PAYMENTS</h5>
                <hr class="line" style="height: 3px!important; width: 100px; background-color: #f7ba01;">
                <div class="form-check mt-3">
                    <input type="radio" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1" style="font-size: 13px;">Check Payments</label>
                </div>
                <div class="form-check mt-2">
                    <input type="radio" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1" style="font-size: 13px;">Cash On Delivery</label>
                </div>
                <div class="form-check mt-2">
                    <input type="radio" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1" style="font-size: 13px;">PayPal</label>
                </div>
                <h6 class="mt-4"><a class="button d-block text-center" href="#">PROCEED TO CHECKOUT</a></h6>
            </div>
        </div>

    </div>

<?php
}

?>