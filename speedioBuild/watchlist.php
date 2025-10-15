<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist | Speedio Mart</title>

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

            require "connection.php";

            if (isset($_SESSION["user"])) {

                $email = $_SESSION["user"]["email"];
            ?>

                <div id="center" class="center_o pt-4 pb-4 bg-light">
                    <div class="container-xl">
                        <div class="row center_o1 text-center">
                            <div class="col-md-12">
                                <h1>WATCHLIST</h1>
                                <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Watchlist</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wishlist_area mt-5 mb-5">
                    <div class="container">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table_desc wishlist">
                                        <div class="container cart_page ">
                                            <?php


                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON watchlist.product_id=product.id WHERE `watchlist`.`user_email`='" . $email . "'");
                                            $watchlist_num = $watchlist_rs->num_rows;

                                            if ($watchlist_num == 0) {
                                            ?>

                                                <div class="col-12 bg-light">
                                                    <div class="d-flex justify-content-center" style="height: 100px;">
                                                        <h3 class="mt-4" style="font-weight: 500;">EMPTY WATCHLIST !</h3>
                                                    </div>
                                                </div>

                                            <?php
                                            } else {
                                            ?>

                                                <table class="watchlist-table">
                                                    <thead class=" border-top-0 border-end-0 border-start-0" style="background: #f2f2f2; border-width: 3px; border-color: #f7ba01;">

                                                        <tr>
                                                            <th class="product_remove text-center p-2 border-bottom border-top-0 border-end-0 border-start-0" style="border-width: 3px; border-color: #f7ba01;">Remove</th>
                                                            <th class="product_thumb text-center p-2 border-bottom">Image</th>
                                                            <th class="product_name text-center p-2 border-bottom">Product</th>
                                                            <th class="product-price text-center p-2">Price</th>
                                                            <th class="product_quantity text-center p-2">Stock Status</th>
                                                            <th class="product_total text-center p-2">Add To Cart</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="border">
                                                        <?php

                                                        for ($w = 0; $w < $watchlist_num; $w++) {
                                                            $watchlist_data = $watchlist_rs->fetch_assoc();
                                                        ?>

                                                            <tr>
                                                                <td class="product_remove border text-center"><a href="#" class="text-decoration-none fw-bold text-danger" onclick="removeWatchlist(<?php echo $watchlist_data['product_id']; ?>)">X</a></td>
                                                                <?php

                                                                $pr_img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watchlist_data["product_id"] . "'");
                                                                $pr_Img_data = $pr_img->fetch_assoc();

                                                                ?>
                                                                <td class="product_thumb p-4 border text-center"><a href="#"><img src="<?php echo $pr_Img_data["path"]; ?>" height="90px" /></a></td>
                                                                <td class="product_name border text-center"><a href="#" class="text-decoration-none text-dark"><?php echo $watchlist_data["title"]; ?></a></td>
                                                                <td class="product-price border text-center fw-bold">Rs. <?php echo $watchlist_data["price"]; ?>.00</td>
                                                                <?php

                                                                if ($watchlist_data["qty"] == 0) {
                                                                ?>
                                                                    <td class="product_quantity border text-center">Out of Stock</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td class="product_quantity border text-center">In Stock</td>
                                                                <?php
                                                                }

                                                                ?>

                                                                <td class="product_total border text-center"><a href="#" class="btn btn-warning rounded-0 text-white" onclick="adCart(<?php echo $watchlist_data['id']; ?>);">Add to cart</a></td>


                                                            </tr>

                                                        <?php
                                                        }

                                                        ?>

                                                    </tbody>
                                                </table>

                                            <?php
                                            }

                                            ?>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>

            <?php
            } else {
            ?>
                <script>
                    alert("Please Login First");
                    window.location = "index.php";
                </script>

            <?php
            }


            require "footer.php";

            ?>


        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>