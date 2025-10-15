<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.title,product.description,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
                                        product.category_id,product.brand_id,product.category_has_brand_id,product.colour_id,product.condition_id,product.status_id,product.user_email,
                                        brand.name,category.name AS `category_name`, colour.name AS `colour_name` FROM `product` INNER JOIN `brand` ON brand.id=product.brand_id INNER JOIN `category` ON category.id=product.category_id
                                        INNER JOIN `category_has_brand` ON category_has_brand.id=product.category_has_brand_id INNER JOIN `colour` ON colour.id=product.colour_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Headphone | Speedio Mart</title>
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

                    ?>

                    <div id="center" class="center_o pt-4 pb-4 bg-light">
                        <div class="container-xl">
                            <div class="row center_o1 text-center">
                                <div class="col-md-12">
                                    <h1>PRODUCT DETAIL</h1>
                                    <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Product Detail</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="detail" class="pt-4 pb-4">
                        <div class="container-xl">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $prodImg1_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                    $prodImg1_data = $prodImg1_rs->fetch_assoc();

                                    ?>
                                    <figure class="figure offset-2">
                                        <img src="<?php echo $prodImg1_data["path"]; ?>" width="300px" class="figure-img img-fluid mt-4" id="mainImg" />
                                    </figure><br />


                                    <?php

                                    $productImg_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                    $productImg_num = $productImg_rs->num_rows;
                                    $img = array();

                                    if ($productImg_num != 0) {
                                    ?>


                                        <?php

                                        for ($x = 0; $x < $productImg_num; $x++) {
                                            $productImg_data = $productImg_rs->fetch_assoc();
                                            $img[$x] = $productImg_data["path"];

                                        ?>

                                            <div class="col-10 text-sm-cente text-center" style="display: inline;">
                                                <img src="<?php echo $img[$x]; ?>" type="button" width="19%" height="100px" id="productImg<?php echo $x; ?>" onclick="loadProductImg(<?php echo $x; ?>);" class="me-5 mt-5" />

                                            </div>


                                        <?php
                                        }
                                    } else {
                                        ?>

                                        <figure class="figure offset-2">
                                            <img src="resources/emptyImg.jpg" width="300px" class="figure-img img-fluid mt-4">
                                        </figure><br />
                                        <div class="col-10 text-sm-cente mt-5 text-center">
                                            <img src="resources/emptyImg.jpg" type="button" width="19%" height="100px" class="me-5" />
                                            <img src="resources/emptyImg.jpg" type="button" width="19%" height="100px" class="me-5" />
                                            <img src="resources/emptyImg.jpg" type="button" width="19%" height="100px" />
                                        </div>

                                    <?php
                                    }

                                    ?>


                                </div>
                                <div class="col-md-6 mt-5">
                                    <div class="detail_1r">
                                        <?php

                                        if ($product_data["qty"] > 0) {
                                        ?>
                                            <h6 class="bg_yell d-inline-block pt-1 pb-1 text-white ps-3 pe-3" style="background-color: #f5bc2c; font-size: 13px;">In Stock</h6>
                                        <?php
                                        } else {
                                        ?>
                                            <h6 class="bg_yell d-inline-block pt-1 pb-1 text-white ps-3 pe-3" style="background-color: gray; font-size: 13px;">Out of Stock</h6>
                                        <?php
                                        }

                                        ?>
                                        <h4 class="mt-5"><?php echo $product_data["title"]; ?></h4>

                                        <h4 class="mt-4"><span class="col_yell me-3">Rs. <?php echo $product_data["price"]; ?>.00</span> <span class="text-decoration-line-through text-secondary" style="font-size: 14px;">$78.00</span></h4>
                                        <p class="mt-4"><?php echo $product_data["description"]; ?></p>
                                        <h6 class="mt-4 mb-4 text-secondary">COLOR : <a class="text-decoration-none text-secondary" style="text-transform: uppercase;"><?php echo $product_data["colour_name"]; ?></a></h6>
                                        <h6 class="mt-3 mb-4 text-secondary">CATEGORY : <a class="text-decoration-none text-secondary" style="text-transform: uppercase;"><?php echo $product_data["category_name"]; ?></a></h6>

                                        
                                        <div class="col-6 mt-4">
                                            <input class="form-control" type="number" min="1" placeholder="Quantity" id="Qty" />
                                        </div>


                                        <h6 class="text-uppercase mt-4"><a class="button" href="#" style="width: 140px; height:50px; margin-right:10px; float:left;" onclick="buyNow(<?php echo $product_data['id']; ?>);">Buy now</a></h6>
                                        <h6 class="text-uppercase mt-4 me-4 mb-5"><a class="button bg-secondary" href="#" onclick="adCart(<?php echo $product_data['id']; ?>);">Add to cart</a></h6>
                                        <hr style="background-color: #f7ba01;" />
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <?php

                    require "footer.php";

                    ?>

                </div>
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    }
}

?>