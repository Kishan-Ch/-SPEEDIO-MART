<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | Speedio Mart</title>
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
                            <h1>ADVANCED SEARCH</h1>
                            <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a>
                                <span class="me-2 ms-2">/</span> Search
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 bg-light mt-4 mx-4 p-1 border">
                <p class="text-secondary mt-1 mb-1 fw-bold mx-2">Find Items</p>
            </div>

            <div class="container text-center mt-2">
                <div class="row">
                    <div class="col-md-6 mt-4 border-end ">
                        <div class="mb-1 mx-3" style="font-size: 15px;">

                            <label for="exampleFormControlInput1" class="form-label d-flex fw-bold">Enter keywords
                                or item number</label>
                            <input type="text" class="form-control" id="kw" placeholder="Enter keywords or item number" />


                            <h6 class="d-flex text-secondary mt-4" style="font-size: 13px;">See general <a href="#">&nbsp;search tips&nbsp;</a> or <a href="#">&nbsp;using advanced search options</a></h6>

                            <div class="row g-3 mt-3 fw-bold">

                                <div class="col mb-1">
                                    <label for="inputState" class="form-label d-flex">In this category:</label>
                                    <select id="cate" class="form-select">
                                        <option value="0">All Categories</option>
                                        <?php

                                        require "connection.php";

                                        $category_rs = Database::search("SELECT * FROM `category`");
                                        $category_num = $category_rs->num_rows;

                                        for ($x = 0; $x < $category_num; $x++) {
                                            $category_data = $category_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>


                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState" class="form-label d-flex">Brands</label>
                                    <select id="br" class="form-select">
                                        <option value="0">All Brands</option>

                                        <?php

                                        $brand_rs = Database::search("SELECT * FROM `brand`");
                                        $brand_num = $brand_rs->num_rows;

                                        for ($x = 0; $x < $brand_num; $x++) {
                                            $brand_data = $brand_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                        <?php
                                        }
                                        ?>


                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-6 col-md-6" style="font-size: 15px;">


                        <div class="row">
                            <div class=" mx-3 d-flex " style="font-size: 15px;">
                                <label class="fw-bold">Condition</label>
                            </div>
                            <div class="form-check mx-4 mt-3">
                                <input class="form-check-input" type="checkbox" id="ne">
                                <label class="form-check-label d-flex" for="flexCheckDefault">
                                    New
                                </label>
                            </div>
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="checkbox" id="us">
                                <label class="form-check-label d-flex" for="flexCheckChecked">
                                    Used
                                </label>
                            </div>

                        </div>
                        <hr />

                        <div class="row">
                            <div class=" mx-3 d-flex" style="font-size: 15px;">
                                <label class="fw-bold"> Price</label>
                            </div>
                            <div class="form-check mt-2">
                                <label class="form-check-label d-flex" for="flexCheckDefault">
                                    Show items priced 
                                </label>
                                <div class="col-12 d-flex mt-2">
                                from $&nbsp;<input type="text" id="p1" />&nbsp;to $&nbsp;
                                    <input type="text" id="p2" />
                                </div>
                            </div>
                        </div>
                        <hr />

                    </div>
                </div>

            </div>

            <div class="col-12 mt-2">
                <div class=" mx-3 d-flex" style="font-size: 15px;">
                    <label class="fw-bold">sort by:</label>
                </div>
                <select class="form-select p-1 rounded-0 mt-3 mb-2" id="s" style="font-size: 14px;">
                    <option value="0" class="rounded-0 text-center">sort by</option>
                    <option value="1" class="rounded-0">Date: Newest on top</option>
                    <option value="2" class="rounded-0">Date: Oldest on top</option>
                    <option value="3" class="rounded-0">Price: High to low</option>
                    <option value="4" class="rounded-0">Price: Low to high</option>
                </select>
            </div>


            <div class="col text-end row mb-4 p-3">
                <button class="btn mx-2 rounded-0" style="background-color: #f7ba01; color: white; font-weight: 11px;" onclick="advancedSearch(0);">SEARCH</button>
            </div>
            <hr style="color: #f5bc2c;" />

            <div class="col-12 bg-light mb-4">



                <div id="new-arrivals" class="new-arrivals">
                    <div class="container">
                        <div class="new-arrivals-content">
                            <div class="row" id="advanced_view">

                                <div class="text-center text-secondary" style="height: 250px; font-size: 20px; margin-top: 180px;">
                                    <p>NO ITEM SEARCHED ...</p>
                                </div>

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
</body>

</html>