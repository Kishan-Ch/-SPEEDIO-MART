<?php

require "connection.php";

if (isset($_GET["id"])) {

    $bid = $_GET["id"];

    $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $bid . "'");
    $brand_data = $brand_rs->fetch_assoc();
} elseif (isset($_GET["cat_id"])) {

    $catId = $_GET["cat_id"];

    $cat_rs = Database::search("SELECT * FROm `category` WHERE `id`='" . $catId . "'");
    $cat_data = $cat_rs->fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apple | Speedio Mart</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
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
                            <?php

                            if (isset($_GET["cat_id"])) {
                            ?>

                                <h1 style="text-transform: uppercase"><?php echo $cat_data["name"]; ?></h1>

                            <?php
                            } else if (isset($_GET["id"])) {
                            ?>

                                <h1 style="text-transform: uppercase"><?php echo $brand_data["name"]; ?></h1>

                            <?php
                            }

                            ?>

                            <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a>
                                <?php
                                if (isset($_GET["cat_id"])) {
                                ?>
                                    <span class="me-2 ms-2">/</span> Category Details
                                <?php
                                } else if (isset($_GET["id"])) {
                                ?>
                                    <span class="me-2 ms-2">/</span> Brand Details
                                <?php
                                }

                                ?>

                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center mt-4">
                <div class="row">


                    <?php

                    if (isset($_GET["id"])) {
                    ?>


                        <!--products-->

                        <div class="col-12" style="margin-top: -38px;">

                            <div id="new-arrivals" class="new-arrivals">
                                <div class="container">
                                    <div class="new-arrivals-content">
                                        <div class="row">

                                            <?php

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `brand_id`='" . $bid . "'");
                                            $product_num = $product_rs->num_rows;

                                            if ($product_num == 0) {
                                            ?>

                                                <div class="col-12 p-2 bg-light text-center" style="height: 300px;">
                                                    <p style="color: gray; margin-top: 100px;">Empty products you searched ...</p>
                                                </div>

                                                <?php
                                            } else {
                                                for ($p = 0; $p < $product_num; $p++) {
                                                    $product_data = $product_rs->fetch_assoc();
                                                ?>

                                                    <div class="col-md-3 col-sm-4">
                                                        <div class="single-new-arrival bg-light">
                                                            <div class="prod_2i3 clearfix w-100 top-0 text-end">

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


                                                            </div>
                                                            <div class="single-new-arrival-bg">

                                                                <?php

                                                                $proImg_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                $proImg_data = $proImg_rs->fetch_assoc();



                                                                ?>

                                                                <a href="singleProductView.php"><img src="<?php echo $proImg_data["path"]; ?>" alt="new-arrivals images"></a>
                                                                <div class="single-new-arrival-bg-overlay"></div>
                                                                <div class="new-arrival-cart">
                                                                    <div class="row gx-5">
                                                                        <div class="col text-center">
                                                                            <a href="#">
                                                                                <p>
                                                                                    <span style="margin-right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" style="margin-top: -5px;" class="bi bi-cart4" viewBox="0 0 16 16">
                                                                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                                                        </svg></span>Add <span>to </span> cart
                                                                                </p>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col bg-white text-center">
                                                                            <span><svg xmlns="http://www.w3.org/2000/svg" type="button" width="14" height="14" fill="currentColor" style="color: red;" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-4 pb-4 ps-3 pe-3 clearfix">
                                                                <h6 class="mt-2"><a href="#" class="text-dark text-decoration-none "><?php echo $product_data["title"]; ?></a></h6>

                                                                <?php

                                                                if ($product_data["condition_id"] == 1) {
                                                                ?>
                                                                    <h6 class="" style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">New Product</a></h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class="" style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">Used Product</a></h6>
                                                                <?php
                                                                }

                                                                ?>


                                                                <hr>
                                                                <h6 class="fw-normal mb-0 pull-right fw-bold col_yell">Rs. <?php echo $product_data["price"]; ?>.00</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php
                                                }
                                            }

                                            ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--products-->


                    <?php
                    } elseif (isset($_GET["cat_id"])) {
                    ?>

                        <!--products-->

                        <div class="col-12" style="margin-top: -38px;">

                            <div id="new-arrivals" class="new-arrivals">
                                <div class="container">
                                    <div class="new-arrivals-content">
                                        <div class="row">

                                            <?php

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $catId . "'");
                                            $product_num = $product_rs->num_rows;

                                            if ($product_num == 0) {
                                            ?>

                                                <div class="col-12 p-2 bg-light text-center" style="height: 300px;">
                                                    <p style="color: gray; margin-top: 100px;">Empty products you searched ...</p>
                                                </div>

                                                <?php
                                            } else {
                                                for ($p = 0; $p < $product_num; $p++) {
                                                    $product_data = $product_rs->fetch_assoc();
                                                ?>

                                                    <div class="col-md-3 col-sm-4">
                                                        <div class="single-new-arrival bg-light">
                                                            <div class="prod_2i3 clearfix w-100 top-0 text-end">

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


                                                            </div>
                                                            <div class="single-new-arrival-bg">

                                                                <?php

                                                                $proImg_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                $proImg_data = $proImg_rs->fetch_assoc();



                                                                ?>

                                                                <a href="singleProductView.php"><img src="<?php echo $proImg_data["path"]; ?>" alt="new-arrivals images"></a>
                                                                <div class="single-new-arrival-bg-overlay"></div>
                                                                <div class="new-arrival-cart">
                                                                    <div class="row gx-5">
                                                                        <div class="col text-center" type="button" onclick="adCart(<?php echo $product_data['id']; ?>);">
                                                                            <p>
                                                                                <span style="margin-right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" style="margin-top: -5px;" class="bi bi-cart4" viewBox="0 0 16 16">
                                                                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                                                    </svg></span>Add <span>to </span> cart
                                                                            </p>
                                                                        </div>

                                                                        <div class="col bg-white text-center" type="button" style="margin-bottom: 17px;" onclick='addWatchlist(<?php echo $product_data["id"]; ?>);'>
                                                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" id="heart<?php echo $product_data["id"]; ?>" style="color: red;" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-4 pb-4 ps-3 pe-3 clearfix" onclick='location.href="<?php echo 'singleProductView.php?id=' . ($product_data["id"]); ?>"'>
                                                                <h6 class="mt-2"><a href="#" class="text-dark text-decoration-none "><?php echo $product_data["title"]; ?> </a></h6>

                                                                <?php

                                                                if ($product_data["condition_id"] == 1) {
                                                                ?>
                                                                    <h6 class="" style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">New Product</a></h6>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <h6 class="" style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">Used Product</a></h6>
                                                                <?php
                                                                }

                                                                ?>


                                                                <hr>
                                                                <h6 class="fw-normal mb-0 pull-right fw-bold col_yell">Rs. <?php echo $product_data["price"]; ?>.00</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php
                                                }
                                            }

                                            ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--products-->


                    <?php
                    }

                    ?>



                </div>
            </div>

            <?php

            require "footer.php";

            ?>


        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>