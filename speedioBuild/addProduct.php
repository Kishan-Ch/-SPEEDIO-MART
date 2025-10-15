<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Speedio Mart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="icon.png" />
</head>

<body>
    <div hidden>
        <svg>
            <symbol viewBox="0 0 24 24" id="icon-add-image-24">
                <path d="M6 0a1 1 0 0 1 1 1v1h1a1 1 0 0 1 0 2H7v1a1 1 0 0 1-2 0V4H4a1 1 0 0 1 0-2h1V1a1 1 0 0 1 1-1Z"></path>
                <path fill-rule="evenodd" d="M5 9a1 1 0 1 1 2 0v4.238l3.232-3.878a1 1 0 0 1 1.549.015l3.302 4.128 2.21-2.21a1 1 0 0 1 1.414 0L21 13.586V5a1 1 0 0 0-1-1h-8a1 1 0 1 1 0-2h8a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V9Zm2 7.362V17a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.586l-3-3-2.293 2.293a1 1 0 0 1-1.488-.082l-3.235-4.044L7 16.362Z" clip-rule="evenodd"></path>
                <path d="M18 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 10a1 1 0 1 0-2 0v11a3 3 0 0 0 3 3h11a1 1 0 1 0 0-2H4a1 1 0 0 1-1-1V10Z"></path>
            </symbol>
        </svg>
    </div>
    <div class="container-fluid">
        <div class="row">

            <?php

            require "header.php";

            if (isset($_SESSION["user"])) {
            ?>

                <div id="center" class="center_o pt-4 pb-4 bg-light">
                    <div class="container-xl">
                        <div class="row center_o1 text-center">
                            <div class="col-md-12">
                                <h1 style="text-transform: uppercase">Add Product</h1>
                                <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;">
                                    <a class="text-dark text-decoration-none" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Add Product
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-center">
                    <div class="row align-content-center">

                        <div class="col-12 col-lg-7 p-4 mt-5 offset-lg-3">
                            <div class="row">

                                <label for="text" style="font-size: 16px;">TITLE*</label>
                                <input class="border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="title" />

                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert3">
                                    
                                </div>


                                <div class="col-12 col-lg-3 mt-5 border-start border-secondary">
                                    <select class="form-select rounded-5" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="category">
                                        <option value="0">Category</option>
                                        <?php

                                        require "connection.php";

                                        $cat_rs = Database::search("SELECT * FROM `category`");
                                        $cat_num = $cat_rs->num_rows;

                                        for ($x = 0; $x < $cat_num; $x++) {
                                            $cat_data = $cat_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $cat_data["id"]; ?>"><?php echo $cat_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                    <label for="text" class="mt-4 mx-2" style="font-size: 14px;">ADD CATEGORY*</label>
                                    <div class="group-button col-12">
                                        <input class="col-8 border-start-0 border-top border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adCategory" />
                                        <button class="col-3 btn rounded-0 text-white mx-1" onclick="addCategory();" style="font-size: 12px; background-color: #f5bc2c; height: 42px; margin-top: -3px;">ADD</button>
                                    </div>

                                </div>

                                <div class="col-12 col-lg-3 mt-5 border-end border-secondary border-start">
                                    <select class="form-select rounded-5" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="brand">
                                        <option value="0">Brand</option>
                                        <?php

                                        $brand_rs = Database::search("SELECT * FROM `brand`");
                                        $brand_num = $brand_rs->num_rows;

                                        for ($b = 0; $b < $brand_num; $b++) {
                                            $brand_data = $brand_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                    <label for="text" class="mt-4 mx-2" style="font-size: 14px;">ADD BRAND*</label>
                                    <div class="group-button col-12">
                                        <input class="col-8 border-start-0 border-top border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adBrand" />
                                        <button class="col-3 btn rounded-0 text-white mx-1" onclick="addBrand();" style="font-size: 12px; background-color: #f5bc2c; height: 42px; margin-top: -3px;">ADD</button>
                                    </div>

                                </div>

                                <div class="col-12 col-lg-3 mt-5 border-end border-secondary">
                                    <select class="form-select rounded-5" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="clr">
                                        <option value="0">Colour</option>
                                        <?php

                                        $clr_rs = Database::search("SELECT * FROM `colour`");
                                        $clr_num = $clr_rs->num_rows;

                                        for ($c = 0; $c < $clr_num; $c++) {
                                            $clr_data = $clr_rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                    <label for="text" class="mt-4 mx-2" style="font-size: 14px;">ADD COLOUR*</label>
                                    <div class="group-button col-12">
                                        <input class="col-8 border-start-0 border-top border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adClr" />
                                        <button class="col-3 btn rounded-0 text-white mx-1" onclick="adClr();" style="font-size: 12px; background-color: #f5bc2c; height: 42px; margin-top: -3px;">ADD</button>
                                    </div>


                                </div>

                                <div class="col-12 col-lg-3 mt-5 border-end border-secondary">
                                    <select class="form-select rounded-5" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="con">
                                        <option value="0">Condition</option>
                                        <?php

                                        $con_rs = Database::search("SELECT * FROM `condition`");
                                        $con_num = $con_rs->num_rows;

                                        for ($con = 0; $con < $con_num; $con++) {
                                            $con_data = $con_rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $con_data["id"]; ?>"><?php echo $con_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="alert d-none" role="alert" style="font-size: 14px; margin-top: 3px; color: red;" id="alert6">

                                </div>


                                <label for="text" class="mt-5" style="font-size: 16px;">PRICE*</label>
                                <input class="border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="price" />
                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert4">

                                </div>

                                <label for="text" class="mt-4" style="font-size: 16px;">DESCRIPTION*</label>
                                <textarea class="form-control ad border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" cols="30" rows="4" id="desc"></textarea>
                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert5">

                                </div>



                                <label for="text" class="mt-5" style="font-size: 16px;">QUENTITY*</label>
                                <input class="border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="number" id="qty" />
                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert7">

                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="textual-display mt-5" style="display: inline-block; font-size: 1rem;margin: 0 4px 0 0;text-transform: uppercase;">DELIVERY COST WITHIN COLOMBO*</h2>
                                            <input class="col-12 border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="dwc" />
                                            <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert8">

                                            </div>
                                        </div>

                                        <div class="col">
                                            <h2 class="textual-display mt-5" style="display: inline-block; font-size: 1rem;margin: 0 4px 0 0;text-transform: uppercase;">DELIVERY COST OUT OF COLOMBO*</h2>
                                            <input class="col-12 border-start-0 border-top-0 border-end-0 p-2" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="doc" />
                                            <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert9">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="smry summary--warn summary__photos mt-5 mb-2">
                                    <div class="summary__header-container">
                                        <div class="summary__header" style="align-items: center; display: flex;" tabindex="-1">
                                            <div class="summary__header-label" style="align-items: end; display: flex; flex-direction: row; flex-grow: 2;">
                                                <h2 class="textual-display" style="display: inline-block; font-size: 1rem;margin: 0 4px 0 0;text-transform: uppercase;">Photos &amp; Video</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4" id="imgChange1">
                                    <input type="file" class="d-none" id="imageuploader" multiple />
                                    <label for="imageuploader" class="uploader-thumbnails__container-empty" onclick="changeProductImg();" style="color: #707070;  box-sizing: border-box; background: none; border: 1px dashed #8f8f8f; border-radius: 16px;"><i class="bi bi-cloud-upload"></i><svg style="padding: 21px; background-color: #f7f7f7; border-radius: 33px;" aria-hidden="true" width="72" height="72" class="icon icon--add-image-24">
                                                <use xlink:href="#icon-add-image-24"></use>
                                            </svg></i><span style="color: black; font-size: 16px; margin-top: 2px;">Upload photos</span>
                                        <p style="font-size: 13px; margin-top: -4px;">or drag and drop</p>
                                    </label>
                                </div>

                                <div class=" mt-5 d-none" id="imgChange2">
                                    <div class="row text-center">
                                        <div class="col">
                                            <img src="resources/OI.jpg" style="width: 90%; color: #707070;  box-sizing: border-box; background: none; border: 1px dashed #8f8f8f; border-radius: 16px;" id="i0" />
                                        </div>
                                        <div class="col">
                                            <img src="resources/OI.jpg" style="width: 90%; color: #707070;  box-sizing: border-box; background: none; border: 1px dashed #8f8f8f; border-radius: 16px;" id="i1" />
                                        </div>
                                        <div class="col">
                                            <img src="resources/OI.jpg" style="width: 90%; color: #707070;  box-sizing: border-box; background: none; border: 1px dashed #8f8f8f; border-radius: 16px;" id="i2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <a href="#"><button class="col-12 p-2 mt-4 mb-5 border-0 text-white" style="background-color: #f5bc2c;font-size: 15px;" onclick="addProduct();">ADD PRODUCT</button></a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php
            } else {
            ?>
                <script>
                    alert("Please Login First");
                    window.location = "login.php";
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