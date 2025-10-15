<?php

require "connection.php";

$kword = $_POST["kw"];
$category = $_POST["cate"];
$brand = $_POST["br"];
$sort = $_POST["s"];
$new = $_POST["ne"];
$used = $_POST["us"];
$pRange1 = $_POST["p1"];
$pRange2 = $_POST["p2"];

$query = "SELECT * FROM `product`";
$status = 0;


if ($sort == 0) {


    if (!empty($kword)) {
        $query .= " WHERE `title` LIKE '%" . $kword . "%'";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_id` =' " . $category . "'";
        $status = 1;
    } elseif ($category != 0 && $status != 0) {
        $query .= " AND `category_id` = '" . $category . "'";
    }

    $pid = 0;
    if ($brand != 0 && $status == 0) {
        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $brand . "'");
        $brand_num = $brand_rs->num_rows;

        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        $query .= " WHERE `brand_id` = '" . $pid . "'";
        $status = 1;
    } elseif ($brand != 0 && $status != 0) {
        $query .= " AND `brand_id` = '" . $pid . "'";
    }

    $cbid = 0;
    if ($category != 0 && $brand != 0) {
        $cat_has_brand_rs = Database::search("SELECT * FROM `category_has_brand` WHERE `category_id` = '" . $category . "' AND `brand_id` = '" . $brand . "'");
        $cat_has_brand_num = $cat_has_brand_rs->num_rows;

        for ($x = 0; $x < $cat_has_brand_num; $x++) {
            $cat_has_brand_data = $cat_has_brand_rs->fetch_assoc();
            $cbid = $cat_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `category_has_brand_id` = '" . $cbid . "'";
            $status = 1;
        } elseif ($status != 0) {
            $query .= " AND `category_has_brand_id` = '" . $cbid . "'";
        }
    }

    if ($new == "true" && $status == 0) {
        $query .= " WHERE `condition_id` = '1'";
        $status = 1;
    }

    if ($used == "true" && $status == 0) {
        $query .= " WHERE `condition_id` = '2'";
        $status = 1;
    }

    if (!empty($pRange1) && empty($pRange2)) {
        if ($status == 0) {
            $query .= "WHERE `price` >= '" . $pRange1 . "'";
            $status = 1;
        } elseif ($status != 0) {
            $query .= "AND `price` >= ''" . $pRange1 . "'";
        }
    } elseif (empty($pRange1) && !empty($pRange2)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $pRange2 . "'";
            $status = 1;
        } elseif ($status != 0) {
            $query .= " AND `price` <= '" . $pRange2 . "'";
        }
    } elseif (!empty($pRange1) && !empty($pRange2)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $pRange1 . "' AND '" . $pRange2 . "'";
            $status = 1;
        } elseif ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $pRange1 . "' AND '" . $pRange2 . "'";
        }
    }
} elseif ($sort == 1) {

    if (!empty($kword)) {
        $query .= " WHERE `title` LIKE '%" . $kword . "%' ORDER BY `datetime_added` ASC";
        $status = 1;
    }
} elseif ($sort == 2) {

    $query .= " WHERE `title` LIKE '%" . $kword . "%' ORDER BY `datetime_added` DESC";
    $status = 1;
} elseif ($sort == 3) {

    $query .= " WHERE `title` LIKE '%" . $kword . "%' ORDER BY `price` DESC";
    $status = 1;
} elseif ($sort == 4) {

    $query .= " WHERE `title` LIKE '%" . $kword . "%' ORDER BY `price` ASC";
}

if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {
    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 8;
$numbers_of_pages = ceil($product_num / $results_per_page);

$viewd_result_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewd_result_count . "";
$result_rs = Database::search($query);
$result_num = $result_rs->num_rows;


while ($result_data = $result_rs->fetch_assoc()) {
?>

<div class="col-md-3 col-sm-4" style="padding-top: 8px;">
            <div class="single-new-arrival bg-light">
                <div class="prod_2i3 clearfix w-100 top-0 text-end">

                    <?php

                    if ($result_data["qty"] > 0) {
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

                    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $result_data["id"] . "'");

                    $img_data = $img_rs->fetch_assoc();


                    ?>

                    <a href="singleProductView.php"><img src="<?php echo $img_data["path"]; ?>" alt="new-arrivals images"></a>
                    <div class="single-new-arrival-bg-overlay"></div>
                    <div class="new-arrival-cart">
                        <div class="row gx-5">
                            <div class="col text-center" type="button" onclick="adCart(<?php echo $result_data['id']; ?>);">
                                <p>
                                    <span style="margin-right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" style="margin-top: -5px;" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                        </svg></span>Add <span>to </span> cart
                                </p>
                            </div>

                            <div class="col bg-white text-center" type="button" style="margin-bottom: 17px;" onclick='addWatchlist(<?php echo $result_data["id"]; ?>);'>
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" id="heart<?php echo $result_data["id"]; ?>" style="color: red;" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-4 ps-3 pe-3 clearfix" onclick='location.href="<?php echo 'singleProductView.php?id=' . ($data["id"]); ?>"'>
                    <h6 class="mt-2"><a href="#" class="text-dark text-decoration-none "><?php echo $result_data["title"]; ?></a></h6>

                    <?php

                    if ($result_data["condition_id"] == 1) {
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
                    <h6 class="fw-normal mb-0 pull-right fw-bold col_yell">Rs. <?php echo $result_data["price"]; ?>.00</span></h6>
                </div>
            </div>
        </div>

<?php
}
?>



<div class="offset-lg-3 d-flex justify-content-center align-item-center col-8 col-lg-6 text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item me-2">
                    <a class="page-link text-warning border-0" aria-label="Previous" <?php if ($pageno <= 1) {
                                                                                            echo ("#");
                                                                                        } else {
                                                                                        ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                                        } ?>>
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php

                for ($page = 1; $page <= $numbers_of_pages; $page++) {
                    if ($page == $pageno) {
                ?>
                        <li class="page-item"><a class="page-link text-warning me-2" style="border-radius: 28px; border: solid 1px #f5bc2c;" onclick="advancedSearch(<?php echo ($page); ?>)"><?php echo ($page); ?></a></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link text-warning me-2" style="border-radius: 28px; border: solid 1px #f5bc2c;" onclick="advancedSearch(<?php echo ($page); ?>)"><?php echo ($page); ?></a></li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link text-warning border-0 " aria-label="Next" <?php if ($pageno >= $numbers_of_pages) {
                                                                                        echo ("#");
                                                                                    } else {
                                                                                    ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                                    } ?>>
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>