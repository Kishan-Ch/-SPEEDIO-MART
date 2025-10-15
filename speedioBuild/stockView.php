<?php

session_start();
include "connection.php";

if (isset($_SESSION["admin"])) {
    $adEmail = $_SESSION["admin"]["email"];
?>


    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Documentation</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="icon.png" />

    </head>

    <body class="bg-light">

        <div class="container-fluid">

            <?php

            require "sideBar.php";

            ?>

            <div class="container-fluid bg-light divbody" style="margin-left: 8%;">
                <nav class="navbar navbar-main navbar-expand-lg position-sticky px-0 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">

                    <div class="container-fluid" style="margin-left: -150px;">

                        <div class="col-12 adminHead" style="border-right: -140px;">
                            <h5 class="headBox" style="margin-left: 260px;">Products Management</h5>
                        </div>


                        <div class="collapse navbar-collapse mt-2 me-md-0 me-sm-4" style="margin-left: -90px;">

                            <ul class="navbar-nav nav4 justify-content-end gap-3">
                                <li class="nav-item me-4">
                                    <a href="admProfile.php" class="nav-link text-body p-0 position-relative">
                                        <i class="bi bi-person-circle icon-person" style="font-size: 23px;"></i>
                                        <span class="d-lg-none text-secondary setting">PROFILE</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-item-icon dropdown pe-2 me-4">
                                    <a href="admChat.php" class="nav-link text-body p-0 position-relative">
                                        <i class="bi bi-bell-fill icon-bell" style="font-size: 23px;"></i>
                                        <span class="d-lg-none text-secondary setting" style=" font-size: 9px; margin-left: -20px;">NOTIFICATIONS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>


                <div class="container">

                    <div class="col-11 mt-5 text-center" style="margin-left: 6%; margin-bottom: 70px;">

                        <div id="adpro">
                            <div class="row text-center gap-3 p-2">
                                <div class="col border p-2 bg-dark rounded-3" onclick="stockUpd();">
                                    <a href="#" style="text-decoration: none; color: white;font-weight: 500;">+ &nbsp; Add Product</a>
                                </div>
                                <div class="col p-2 rounded-3" style="border: 2px solid #9e9e9e;border-bottom: 0;" onclick="stockUpd();">
                                    <a href="#" style="text-decoration: none; color: black;font-weight: 500;"><i class="bi bi-recycle"></i> &nbsp; Stock Update</a>
                                </div>
                            </div>

                            <!-- Product  Adding -->

                            <div class="col-12 mt-3">
                                <div class="container mt-2 p-2">
                                    <div class="col-12 bg-white rounded-3 p-3 border">
                                        <div class="row p-2">
                                            <div class="mb-4">
                                                <h5 class="text-center" style="font-weight: 700;"><u>PRODUCT ADDING</u></h5>
                                            </div>
                                            <div class="col-sm-6 text-start mb-4 border border-start-0 border-top-0 border-bottom-0">

                                                <label class="mt-5" for="text" style="font-size: 16px;">PRODUCT NAME*</label>
                                                <input class="col-12 col-lg-12 border-start-0 border-top-0 border-end-0 p-2" placeholder="iPhone 13 Pro max" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="title" />

                                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert3">

                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mt-5 border-start border-secondary">
                                                        <select class="form-select rounded-5" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="category">
                                                            <option value="0">Category</option>
                                                            <?php

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
                                                            <input class="col-8 border-start-0 border-top border-end-0 p-2" placeholder="Fashion" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adCategory" />
                                                            <button class="col-3 btn rounded-0 text-white mx-1" onclick="addCategory();" style="font-size: 12px; background-color: gray; height: 42px; margin-top: -3px;">ADD</button>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-5 border-end border-secondary border-start">
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
                                                            <input class="col-8 border-start-0 border-top border-end-0 p-2" placeholder="Asus" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adBrand" />
                                                            <button class="col-3 btn rounded-0 text-white mx-1" onclick="addBrand();" style="font-size: 12px; background-color: gray; height: 42px; margin-top: -3px;">ADD</button>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mt-5 border-start border-end border-secondary">
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
                                                            <input class="col-8 border-start-0 border-top border-end-0 p-2" placeholder="Red" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="adClr" />
                                                            <button class="col-3 btn rounded-0 text-white mx-1" onclick="adClr();" style="font-size: 12px; background-color: gray; height: 42px; margin-top: -3px;">ADD</button>
                                                        </div>


                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-5 border-end border-secondary">
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
                                                </div>

                                                <div class="alert d-none" role="alert" style="font-size: 14px; margin-top: 3px; color: red;" id="alert6">

                                                </div>

                                                <label for="text" class="mt-5" style="font-size: 16px;">QUENTITY*</label>
                                                <input class="col-12 col-lg-12 border-start-0 border-top-0 border-end-0 p-2" placeholder="100" style="border: solid; border-width: 2px; border-color: gray;" type="number" id="qty" />
                                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert7">

                                                </div>

                                                <label for="text" class="mt-4" style="font-size: 16px;">DESCRIPTION*</label>
                                                <textarea class="form-control ad border-start-0 border-top-0 border-end-0 p-2" placeholder="type here.." style="border: solid; border-width: 2px; border-color: gray;" cols="30" rows="4" id="desc"></textarea>
                                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert5">

                                                </div>


                                            </div>
                                            <div class="col-sm-6 text-start">

                                                <label for="text" class="mt-5" style="font-size: 16px;">PRICE*</label>
                                                <input class="col-12 col-lg-12 border-start-0 border-top-0 border-end-0 p-2" placeholder="350000" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="price" />
                                                <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert4">

                                                </div>

                                                <div class="col-12 mt-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h2 class="textual-display mt-5" style="display: inline-block; font-size: 1rem;margin: 0 4px 0 0;text-transform: uppercase;">DELIVERY COST WITHIN COLOMBO*</h2>
                                                            <input class="col-12 border-start-0 border-top-0 border-end-0 p-2" placeholder="250" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="dwc" />
                                                            <div class="alert d-none" role="alert" style="font-size: 14px; color: red;" id="alert8">

                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <h2 class="textual-display mt-5" style="display: inline-block; font-size: 1rem;margin: 0 4px 0 0;text-transform: uppercase;">DELIVERY COST OUT OF COLOMBO*</h2>
                                                            <input class="col-12 border-start-0 border-top-0 border-end-0 p-2" placeholder="300" style="border: solid; border-width: 2px; border-color: gray;" type="text" id="doc" />
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
                                                    <label for="imageuploader" class="uploader-thumbnails__container-empty" onclick="changeProductImg();" style="color: #707070;  box-sizing: border-box; background: none; border: 1px dashed #8f8f8f; border-radius: 16px;"><i class="uploader-thumbnails__photo-icon-bg"><svg style="padding: 21px; background-color: #f7f7f7; border-radius: 33px;" aria-hidden="true" width="72" height="72" class="icon icon--add-image-24">
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
                            </div>
                        </div>


                        <!-- Product  Adding -->

                        <!-- Product  Updating -->

                        <div class=" d-none" id="prading">

                            <div class="row text-center gap-3 p-2">
                                <div class="col p-2 rounded-3" style="border: 2px solid #9e9e9e;border-bottom: 0;" onclick="stockUpd();">
                                    <a href="#" style="text-decoration: none; color: black; font-weight: 500;">+ &nbsp; Add Product</a>
                                </div>
                                <div class="col border p-2 bg-dark  rounded-3" style="border: 2px solid #9e9e9e;border-bottom: 0;" onclick="stockUpd();">
                                    <a href="#" style="text-decoration: none;color: white; font-weight: 500;"><i class="bi bi-recycle"></i> &nbsp; Update Product</a>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="container text-center mt-4 p-2">
                                    <div class="text-center bg-white rounded-3 p-4 border">
                                        <div class="row mt-2">
                                            <div class="mb-4">
                                                <h5 class="text-center" style="font-weight: 700;"><u>UPDATING &nbsp;STOCKS</u></h5>
                                            </div>

                                            <div class="col-12 text-start mb-3">
                                                <div class="row mt-3">
                                                    <label for="text" class="mt-4 mx-2" style="font-size: 15px; font-weight: 500;">SELECT PRODUCT</label>
                                                    <select class="form-select rounded-5 mt-2 mx-2" style="border: solid; border-width: 2px; border-color: gray; font-size: 14px;" id="prName">
                                                        <option value="0">Select Product</option>
                                                        <?php
                                                        $pr_rs = Database::search("SELECT * FROM `product`");
                                                        $pr_num = $pr_rs->num_rows;

                                                        for ($p = 0; $p < $pr_num; $p++) {
                                                            $pr_data = $pr_rs->fetch_assoc();
                                                        ?>

                                                            <option value="<?php echo $pr_data["id"]; ?>"><?php echo $pr_data["title"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>



                                                    </select>
                                                    <div class="col-sm-12 col-lg-6 mt-2">
                                                        <label for="text" class="mt-4 mx-2" style="font-size: 15px; font-weight: 500;">PRICE</label>
                                                        <input class="col-12 col-lg-12 rounded-5 p-2" type="text" placeholder="Rs. 2400.00" id="adPrice" />
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6 mt-2">
                                                        <label for="text" class="mt-4 mx-2" style="font-size: 15px; font-weight: 500;">QUANTITY</label>
                                                        <input class="col-12 col-lg-12 rounded-5 p-2" type="text" placeholder="20" id="adQty" />
                                                    </div>
                                                    <div class="col-12 mt-5">
                                                        <button class="col-12 btn btn-secondary" onclick="stockUpdate();">Update</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                    <!-- Product  Updating -->

                </div>



            </div>

        </div>



        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>


<?php

} else {
?>

    <script>
        alert("You're Not a valid User. Please Sign in Again");
        window.location = "login.php";
    </script>

<?php
}

?>