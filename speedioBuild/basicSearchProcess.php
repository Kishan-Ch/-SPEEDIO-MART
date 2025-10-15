<?php

require "connection.php";

$txt = $_POST["searchTxt"];


if (empty($txt)) {

?>
    <div class="text-center text-secondary" style="height: 80px; font-size: 20px; margin-top: 60px;">
        <p>SEARCH AREA IS EMPTY</p>
    </div>
<?php

} elseif (!empty($txt)) {
    $query = "SELECT * FROM `product` WHERE `title` LIKE '%$txt%'";

?>
    <div id="center" class="center_o pt-4 pb-4 bg-light">
        <div class="container-xl">
            <div class="row center_o1 text-center">
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Search Results "<span><?php echo $txt; ?></span>"</h1>

                </div>
            </div>
        </div>
    </div>
    <?php



    if ("0" != $_POST["page"]) {
        $pageno = $_POST["page"];
    } else {
        $pageno = 1;
    }

    $product_rs = Database::search($query);
    $product_num = $product_rs->num_rows;

    $result_per_page = 12;
    $number_of_page = ceil($product_num / $result_per_page);

    $page_result = ($pageno - 1) * $result_per_page;

    $selected_rs = Database::search($query . " LIMIT " . $result_per_page . " OFFSET " . $page_result . "");
    $selected_num = $selected_rs->num_rows;

    if ($selected_num == 0) {
    ?>
        <div class="d-flex flex-column align-items-center mt-5">
            <div class="title--sUZjQ"><h4>Search No Result</h4></div>
            <div class="description--ka3zF"><p>We're sorry. We cannot find any matches for your search term.</p></div>
        </div>



        <?php
    } else {

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();
        ?>
            <div class="col-md-3 col-sm-4 mt-3" style="padding-top: 8px;">
                <div class="single-new-arrival bg-light">
                    <div class="prod_2i3 clearfix w-100 top-0 text-end">
                        <?php

                        if ($selected_data["qty"] > 0) {
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

                        $prodImg_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                        $prodImg_data = $prodImg_rs->fetch_assoc();


                        ?>
                        <a href="singleProductView.php"><img src="<?php echo $prodImg_data["path"]; ?>" alt="new-arrivals images"></a>
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
                        <h6 class="mt-2"><a href="#" class="text-dark text-decoration-none "><?php echo $selected_data["title"]; ?></a></h6>

                        <?php
                        if ($selected_data["condition_id"] == 1) {
                        ?>
                            <h6 style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">New Product</a></h6>
                        <?php
                        } else {
                        ?>
                            <h6 style="font-size: 13px;"><a class="text-dark text-decoration-none " href="#">Used Product</a></h6>
                        <?php
                        }
                        ?>


                        <hr>
                        <h6 class="fw-normal mb-0 pull-right fw-bold col_yell">Rs. <?php echo $selected_data["price"]; ?>.00</span></h6>
                    </div>
                </div>
            </div>

        <?php
        }

        ?>




        <div class="offset-lg-3 d-flex justify-content-center align-item-center col-8 col-lg-6 text-center">
            <nav aria-label="Page navigation example ">
                <ul class="pagination offset-2">
                    <li class="page-item me-2">
                        <a class="page-link text-warning border-0" aria-label="Previous" <?php if ($pageno <= 1) {
                                                                                                echo ("#");
                                                                                            } else {
                                                                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                                                } ?>>
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php

                    for ($y = 1; $y <= $number_of_page; $y++) {
                        if ($y == $pageno) {
                    ?>
                            <li class="page-item"><a class="page-link text-warning me-2" style="border-radius: 28px; border: solid 1px #f5bc2c;" onclick="basicSearch(<?php echo ($y); ?>)"><?php echo ($y); ?></a></li>

                        <?php
                        } else {
                        ?>
                            <li class="page-item"><a class="page-link text-warning me-2" style="border-radius: 28px; border: solid 1px #f5bc2c;" onclick="basicSearch(<?php echo ($y); ?>)"><?php echo ($y); ?></a></li>
                    <?php
                        }
                    }

                    ?>

                    <li class="page-item">
                        <a class="page-link text-warning border-0 " aria-label="Next" <?php if ($pageno >= $number_of_page) {
                                                                                            echo ("#");
                                                                                        } else {
                                                                                        ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                                            } ?>>
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
<?php
    }
}
?>