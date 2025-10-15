<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Speedio Mart</title>
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

            <div class="container-fluid">
                <div class="row py-3">
                    <div class="d-flex justify-content-center justify-content-sm-between align-items-center">
                        <nav class="main-menu d-flex navbar navbar-expand-lg">

                            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span><img src="resources/menu.png" width="40px"></span>
                            </button>

                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                                <div class="offcanvas-header justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>

                                <div class="offcanvas-body">

                                    <ul class="navbar-nav menu-list list-unstyled d-flex justify-content-center me-auto gap-md-5 mb-0 mx-lg-5">

                                        <?php

                                        require "connection.php";

                                        $cat_rs = Database::search("SELECT * FROM `category` LIMIT 5 OFFSET 0");
                                        $cat_num = $cat_rs->num_rows;

                                        for ($x = 0; $x < $cat_num; $x++) {
                                            $cat_data = $cat_rs->fetch_assoc();
                                        ?>

                                            <li class="nav-item dropdown mx-lg-4">
                                                <a href='<?php echo "brandPage.php?cat_id=" . ($cat_data["id"]); ?>' class="nav-link text-uppercase "><?php echo $cat_data["name"]; ?></a>
                                            </li>

                                        <?php
                                        }

                                        ?>


                                        <li class="nav-item mx-lg-3 dropdown-center">
                                            <a href="#" class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">BRANDS</a>
                                            <ul class="dropdown-menu bg-light rounded-0">
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($x = 0; $x < $brand_num; $x++) {
                                                    $brand_data = $brand_rs->fetch_assoc();

                                                ?>

                                                    <li><a class="dropdown-item text-secondary" href='<?php echo "brandPage.php?id=" . ($brand_data["id"]); ?>'><?php echo $brand_data["name"]; ?></a></li>

                                                <?php
                                                }

                                                ?>

                                            </ul>
                                        </li>

                                    </ul>


                                </div>

                            </div>

                        </nav>
                        <div class="btn rounded-5 mx-2 msgbox" type="button" style="width: 47px; height: 45px; background-color: black;" onclick="chatbox();">
                            <a href="#" class="nav-link btn-coupon-code text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" style="color: white;" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="container-fluid d-none" id="search_div">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">

                                    <div class="new-arrivals">
                                        <div class="container">
                                            <div class="new-arrivals-content">
                                                <div class="row" id="basicSearch_view">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="billboard" class="col-md-12 background4">
                        <div class="container mb-5">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 m=">
                                    <div style="margin-top: 45px;" class="p-1 offset-lg-1">
                                        <h1 style="font-size: 65px; font-family: 'Gill Sans'; font-weight: bold;">
                                            <span style="color: rgb(255, 0, 85);">
                                                Sale 20% Off
                                            </span>
                                            <br />
                                            On Everything
                                        </h1>
                                        <p style="font-size: 18px; margin-top: 25px; color: gray;">
                                            Finding the perfect anything is a big deal, the fashion accessories is an item used to contribute In a secondary manner to the wearer's outfit, Often used to complete an outfit and chosen to specifically completement the wearer's look.
                                        </p>
                                        <div class="mt-5 mb-5">
                                            <a href="shop.php" class="btn1">Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--products-->

                    <div class="col-12 mt-5">

                        <div class="heading_container heading_center mt-2">
                            <h2 style="font-size: 55px; font-family: 'Gill Sans'; font-weight: bold;">
                                Latest <span style="color: rgb(255, 0, 85);"> Products</span>
                            </h2>
                        </div>

                        <div id="new-arrivals" class="new-arrivals">
                            <div class="container">
                                <div class="new-arrivals-content">
                                    <div class="row">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0");
                                        $product_num = $product_rs->num_rows;

                                        for ($p = 0; $p < $product_num; $p++) {
                                            $product_data = $product_rs->fetch_assoc();

                                        ?>

                                            <div class="col-md-3 col-sm-4" style="padding-top: 8px;">
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

                                                        $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");

                                                        $img_data = $img_rs->fetch_assoc();

                                                        ?>

                                                        <img src="<?php echo $img_data["path"]; ?>" alt="new-arrivals images">
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
                                                    <div class="pt-4 pb-4 ps-3 pe-3 clearfix" style="overflow: hidden;" onclick='location.href="<?php echo 'singleProductView.php?id=' . ($product_data["id"]); ?>"'>
                                                        <h6 class="mt-2"><a href="#" class="text-dark text-decoration-none"><?php echo $product_data["title"]; ?></a></h6>
                                                        <?php
                                                        if ($product_data["condition_id"] == 1) {
                                                        ?>
                                                            <h6 style="font-size: 13px;"><a class="text-dark text-decoration-none proType" href="#">New Product</a></h6>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <h6 style="font-size: 13px;"><a class="text-dark text-decoration-none proType" href="#">Used Product</a></h6>
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

                                        ?>

                                    </div>

                                </div>

                                <div class="btn-box mt-3" style="display: flex; justify-content: center;">
                                    <a href="shop.php" style="display: inline-block;padding: 10px 40px;background-color: #f7444e; border: 1px solid #f7444e; color: #ffffff;border-radius: 0;transition: all 0.3s; text-decoration: none; text-transform: uppercase;">
                                        View All products
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!--products-->

                    <!--category-->


                    <div class="latest-collection">
                        <div class="container" style="width: 96%; margin-right: auto; margin-left: auto; padding-left: 15px; padding-right: 15px;">
                            <div class="product-collection row">
                                <div class="col-lg-7 col-md-12 left-content">
                                    <div class="collection-item">
                                        <div class="products-thumb">
                                            <img src="resources/collection-item1.jpg" alt="collection item" class="large-image image-rounded" style="border-radius: 10px;" />
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
                                            <div class="categories text-secondary">CASUAL COLLECTION</div>
                                            <h3 class="item-title">Street Wear.</h3>
                                            <p class="text-secondary mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                                            <div class="btn-wrap">
                                                <a href="<?php echo "brandPage.php?cat_id=" . ("1"); ?>" class="d-flex align-items-center text-decoration-none text-dark">Shop Collection &nbsp;<i class="bi bi-arrow-right mt-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 right-content flex-wrap">
                                    <div class="collection-item top-item">
                                        <div class="products-thumb">
                                            <img src="resources/OI.jpg" alt="collection item" class="small-image image-rounded" style="border-radius: 10px;" />
                                        </div>
                                        <div class="col-md-6 product-entry">
                                            <div class="categories text-secondary">RATED COLLECTION</div>
                                            <h3 class="item-title">Mobile Phones.</h3>
                                            <div class="btn-wrap">
                                                <a href="<?php echo "brandPage.php?cat_id=" . ("4"); ?>" class="d-flex align-items-center text-decoration-none text-dark">Shop Collection &nbsp;<i class="bi bi-arrow-right mt-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-item bottom-item">
                                        <div class="products-thumb">
                                            <img src="resources/OI2.jpg" alt="collection item" class="small-image image-rounded" style="border-radius: 10px;" />
                                        </div>
                                        <div class="col-md-6 product-entry">
                                            <div class="categories text-secondary">BEST SELLING PRODUCT</div>
                                            <h3 class="item-title">Electric Tools.</h3>
                                            <div class="btn-wrap">
                                                <a href="<?php echo "brandPage.php?cat_id=" . ("3"); ?>" class="d-flex align-items-center text-decoration-none text-dark">Shop Collection &nbsp;<i class="bi bi-arrow-right mt-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--category-->

                    <!--why select-->

                    <div class="why_section layout_padding">
                        <div class="container">
                            <div class="heading_container heading_center">
                                <h2 style="font-size: 55px; font-family: 'Gill Sans'; font-weight: bold;">
                                    Why Shop With Us
                                </h2>
                            </div>
                            <div class="row  gap-5">
                                <div class="col-md-3 offset-lg-1">
                                    <div class="box ">
                                        <div class="img-box">
                                            <svg version="1.1" id="Layer_1" style=" width: 55px; height: auto; fill: white;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                                    V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                                    c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                                    c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                                    c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                                    c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                                    s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                                    c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                                    h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                                    s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                                    c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                                    c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                                    c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                                    M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                                    l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                                    c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                                    s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                                    c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                                    c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                                    c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                                    C281.901,181.576,281.901,176.501,278.771,173.37z"></path>
                                                    </g>
                                                </g>

                                            </svg>
                                        </div>
                                        <div class="detail-box">
                                            <h5>
                                                Fast Delivery
                                            </h5>
                                            <p style="margin-top: 0; margin-bottom: 1rem;">
                                                we pick, pack and ship the order tto your customer fast
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box ">
                                        <div class="img-box">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" style=" width: 55px; height: auto; fill: white;" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 490.667 490.667;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                                    v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                                    S123.221,234.667,117.333,234.667z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                                    S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                                    S368.853,469.333,245.333,469.333z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                                    c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                                    s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                                    C389.717,143.296,390.443,136.576,386.752,131.989z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                                    s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                                    c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                                    c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                                    S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                                    c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                                    s-4.8,10.667-10.667,10.667H192z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S315.221,277.333,309.333,277.333z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                                    c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S400.555,277.333,394.667,277.333z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                                    c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z"></path>
                                                    </g>
                                                </g>

                                            </svg>
                                        </div>
                                        <div class="detail-box">
                                            <h5>
                                                Free Shiping
                                            </h5>
                                            <p style="margin-top: 0; margin-bottom: 1rem;">
                                                when e-commerce sellers should and shoudn't offer it
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box ">
                                        <div class="img-box">
                                            <svg id="_30_Premium" height="512" viewBox="0 0 512 512" width="512" style=" width: 55px; height: auto; fill: white;" xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                                                <g id="filled">
                                                    <path d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z"></path>
                                                    <path d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z"></path>
                                                    <path d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="detail-box">
                                            <h5>
                                                Best Quality
                                            </h5>
                                            <p style="margin-top: 0; margin-bottom: 1rem;">
                                                we offer you genuine products at a genuine price with good quality
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--why select-->

                    <!--brands-->

                    <div class="col-md-12 mt-5 mb-5 p-2">
                        <div class="row">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container text-center">
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-2">
                                                <div class="col ">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/apple.png" width="50px">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/adidas.png" width="90px">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-4" style="height: 92px;">
                                                        <img src="resources/brand/dell.png" width="130px">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/samsung.png" width="150px" class="mt-3">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/tommy.png" width="150px" class="mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="container text-center">
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-2">
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/asus.png" width="150px" class="mt-3">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/nike.png" width="90px" class="mt-2">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-4" style="height: 92px;">
                                                        <img src="resources/brand/huawei.png" width="140px" class="mt-2">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/oppo.png" width="150px" class="mt-3">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3" style="height: 92px;">
                                                        <img src="resources/brand/acer.png" width="120px" class="mt-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev text-start" style="color: black;" type="button" style="color: black;" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next text-end" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!--brands-->



                    
                    <!--chat box-->

                    <div id="main" class="col-12 col-md-4 chat-body rounded-4" style="position: fixed; display: none; margin-top: -145px;">

                        <div class="col-12">

                            <div class="card rounded-4 bg-dark" id="body">

                                <div class="card-header msg_head rounded-4" style="background-color: #284075; color: white;">

                                    <?php

                                    if (isset($_SESSION["user"])) {
                                    ?>


                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont p-1">
                                                <img src="resources/customer.png" width="50px" class="rounded-circle user_img bg-white p-1">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="mt-2 mx-3">




                                                <?php

                                                $admin_rs = Database::search("SELECT * FROM `user` WHERE `user_type_id`='1'");
                                                $admin_data = $admin_rs->fetch_assoc();

                                                $email = $_SESSION["user"]["email"];

                                                $chat_rs = Database::search("SELECT COUNT(`content`) AS `Count` FROM `chat` WHERE `to`='" . $email . "' AND `from`='" . $admin_data["email"] . "' OR `to`='" . $admin_data["email"] . "' 
                                        AND `from`='" . $email . "'");
                                                $chat_data = $chat_rs->fetch_assoc();

                                                ?>

                                                <span style="font-size: 21px; font-weight: bold;">CUSTOMER SERVICE</span>
                                                <p style="font-size: 12px; margin-left: 4px;"><?php echo $chat_data["Count"]; ?> Messages</p>
                                            </div>
                                        </div>
                                        <div class="text-end" style="margin-top: -40px;" onclick="chatboxClose();">
                                            <span style="cursor: pointer;"><i class="bi bi-x-lg"></i></span>
                                        </div>

                                </div>

                                <div class=" rounded-4" style="text-align: center; height: 350px;  border-width: 2px; margin-top: 28px;">

                                    <div class="card-body bg-dark msg_card_body" style="color: white;" id="chatBox">

                                        <p class="bg-light rounded-5 btn" style="padding-top: 0;padding-bottom: 0; padding-right: 5;padding-left: 5; margin-top: 120px;">
                                            <a class=" text-dark text-decoration-none" href="#" onclick="viewMsg();">chat with customer center ?</a>
                                        </p>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="input-group">
                                        <textarea class="form-control type_msg border-0 rounded-5" style="background-color: #495057; padding: 0.375rem 0.75rem; font-size: 1rem; height: 50px; color: white;" id="msg_txt" placeholder="Type your message..."></textarea>
                                        <div class="input-group-append mt-2 mx-2" style="width: 40px; height: 40px; cursor: pointer;">
                                            <span class="input-group-text d-flex send_btn border-0 rounded-5 p-2" style="background-color: #78e08f; color: rgba(0,0,0,0.3);" onclick="sendMsg();"><i class="bi bi-send-fill mx-1" style="color: white;"></i></span>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                    } else {
                            ?>

                                <div class="d-flex bd-highlight">
                                    <div class="d-flex me-2" onclick="chatboxClose();">
                                        <span style="cursor: pointer;"><i class="bi bi-x-lg"></i></span>
                                    </div>
                                    <div class="img_cont p-1 mt-3">
                                        <img src="resources/customer.png" width="30px" class="rounded-circle user_img bg-white p-1">
                                        <span class="online_icon"></span>
                                    </div>


                                    <div class="col-12 d-flex justify-content-center p-2 mt-2">
                                        <p style="text-transform: uppercase; font-size: 1.1rem;">Please Sign In Firstly</p>
                                    </div>

                                </div>

                            <?php
                                    }

                            ?>

                            </div>
                        </div>

                    </div>

                    <!--chat box-->

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