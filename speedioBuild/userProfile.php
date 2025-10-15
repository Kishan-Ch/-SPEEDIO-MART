<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile | Speedio Mart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="icon.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row mb-5">

            <?php

            require "header.php";

            ?>

            <div id="center" class="center_o pt-4 pb-4 bg-light">
                <div class="container-xl">
                    <div class="row center_o1 text-center">
                        <div class="col-md-12">
                            <h1>MY PROFILE</h1>
                            <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;"><a class="text-dark text-decoration-none" href="index.php">Home</a>
                                <span class="me-2 ms-2">/</span> Profile
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if (isset($_SESSION["user"])) {



                require "connection.php";

                if (isset($_SESSION["user"])) {
                    $email = $_SESSION["user"]["email"];

                    $detail_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON gender.id=user.gender_id WHERE `email`='" . $email . "'");

                    $img_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $email . "'");

                    $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON user_has_address.city_id=city.id INNER JOIN `district`
                    ON city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id WHERE `user_email`='" . $email . "'");

                    $detail_data = $detail_rs->fetch_assoc();
                    $img_data = $img_rs->fetch_assoc();
                    $address_data = $address_rs->fetch_assoc();
                }

            ?>

                <div class="container bg-light mt-4">
                    <div class="row">
                        <div class="col-sm-6 mt-5 text-center">
                            <div class="about-avatar">

                                <?php

                                if (empty($img_data["path"])) {
                                ?>

                                    <img src="resources/user.png" width="40%" id="img" />

                                <?php
                                } else {
                                ?>

                                    <img src="<?php echo $img_data["path"]; ?>" width="40%" id="img" />

                                <?php
                                }

                                ?>


                                <div class="file btn btn-lg btn-primary" style=" position: relative; overflow: hidden; margin-top: -15%;width: 60%; border: none; border-radius: 0; font-size: 15px; background: #212529b8;">
                                    <input type="file" onclick="changeProImg();" id="proImg" style=" position: absolute; opacity: 0; right: 0; top: 0;" />Change Photo
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 mt-5">
                            <h3 class="dark-color text-center" style="text-transform: uppercase;"><?php echo $detail_data["fname"] . " " . $detail_data["lname"]; ?></h3>
                            <h6 class="theme-color lead text-center" style="font-size: 18px; color: #0062cc;"><?php echo $detail_data["email"]; ?></h6>
                            <hr />

                            <div class="panel-body bio-graph-info d-flex" style="color: #89817e; margin-top: 68px;">
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>First Name </span>: <input type="text" id="fname" class="border-0 bg-transparent" value="<?php echo $detail_data["fname"]; ?>" /> </p>
                                    </div>
                                    <div class="bio-row mx-2">
                                        <p><span>Last Name </span>: <input type="text" id="lname" class="border-0 bg-transparent" value="<?php echo $detail_data["lname"]; ?>" /></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Email </span>: <input type="text" class="border-0 bg-transparent" style="font-size: 16px; margin-left: -3px; width: 202px;" value="<?php echo $detail_data["email"]; ?>" readonly /></p>
                                    </div>
                                    <div class="bio-row mx-2">
                                        <p><span>Password </span>: <input type="Password" id="password" class="border-0 bg-transparent" value="<?php echo $detail_data["password"]; ?>" /></p>
                                    </div>

                                    <?php

                                    $gender_rs = Database::search("SELECT * FROM `gender`");

                                    ?>

                                    <div class="bio-row">
                                        <p><span>Gender</span>:
                                            <select class="form-select border-0 bg-transparent p-0 offset-lg-5" style="width: 130px;" id="gender">
                                                <option value="0" style="color: #89817e;">Select Gender</option>
                                                <?php

                                                $gender_num = $gender_rs->num_rows;
                                                for ($x = 0; $x < $gender_num; $x++) {
                                                    $gender_data = $gender_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $gender_data["id"]; ?>" style="color: #89817e;" <?php
                                                                                                                                if (!empty($detail_data["gender_id"])) {
                                                                                                                                    if ($gender_data["id"] == $detail_data["gender_id"]) {
                                                                                                                                ?>selected<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                            ?>><?php echo $gender_data["gender_name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>
                                        </p>
                                    </div>




                                    <div class="bio-row mx-2">
                                        <p><span>Mobile </span>: <input type="text" id="mobile" class="border-0 bg-transparent" value="<?php echo $detail_data["mobile"]; ?>" /></p>
                                    </div>

                                    <?php

                                    if (!empty($address_data["line1"])) {
                                    ?>
                                        <div class="bio-row">
                                            <p><span>Address Line 1</span>: <input type="text" id="line1" class="border-0 bg-transparent" value="<?php echo $address_data["line1"]; ?>" /></p>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="bio-row">
                                            <p><span>Address Line 1</span>: <input type="text" id="line1" class="border-0 bg-transparent" placeholder="Enter Address Line 1" /></p>
                                        </div>
                                    <?php
                                    }

                                    if (!empty($address_data["line2"])) {
                                    ?>
                                        <div class="bio-row mx-2">
                                            <p><span>Address Line 2</span>: <input type="text" id="line2" class="border-0 bg-transparent" value="<?php echo $address_data["line2"]; ?>" /> </p>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="bio-row mx-2">
                                            <p><span>Address Line 2</span>: <input type="text" id="line2" class="border-0 bg-transparent" placeholder="Enter Address Line 2" /> </p>
                                        </div>
                                    <?php
                                    }


                                    $city_rs = Database::search("SELECT * FROM `city`");

                                    ?>
                                    <div class="bio-row">
                                        <p><span>City</span>:
                                            <select class="form-select border-0 bg-transparent p-0 offset-lg-5" style="width: 130px;" id="city">
                                                <option value="0" style="color: #89817e;">Select City</option>
                                                <?php

                                                $city_num = $city_rs->num_rows;
                                                for ($x = 0; $x < $city_num; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $city_data["id"]; ?>" style="color: #89817e;" <?php if (!empty($address_data["city_id"])) {
                                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                                            ?>selected<?php
                                                                                                                                    }
                                                                                                                                } ?>><?php echo $city_data["city_name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>
                                        </p>
                                    </div>

                                    <?php

                                    $district_rs = Database::search("SELECT * FROM `district`");

                                    ?>

                                    <div class="bio-row mx-2">
                                        <p><span>District</span>:
                                            <select class="form-select border-0 bg-transparent p-0 offset-lg-5" style="width: 130px;" id="district">
                                                <option value="0" style="color: #89817e;">Select District</option>
                                                <?php

                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $district_data["id"]; ?>" style="color: #89817e;" <?php if (!empty($address_data["district_id"])) {
                                                                                                                                    if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                                                ?>selected<?php
                                                                                                                                        }
                                                                                                                                    } ?>><?php echo $district_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </p>
                                    </div>

                                    <?php
                                    $province_rs = Database::search("SELECT * FROM `province`");
                                    ?>

                                    <div class="bio-row">
                                        <p><span>Province</span>:
                                            <select class="form-select border-0 bg-transparent p-0 offset-lg-5" style="width: 130px;" id="province">
                                                <option value="0" style="color: #89817e;">Select Province</option>
                                                <?php

                                                $province_num = $province_rs->num_rows;
                                                for ($x = 0; $x < $province_num; $x++) {
                                                    $province_data = $province_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $province_data["id"]; ?>" style="color: #89817e;" <?php if (!empty($address_data["province_id"])) {
                                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                                ?> selected <?php
                                                                                                                                        }
                                                                                                                                    } ?>><?php echo $province_data["province_name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="bio-row mx-2">

                                        <?php

                                        if (empty($address_data["postal_code"])) {
                                        ?>
                                            <p><span>Postal Code</span>: <input type="text" id="pcode" class="border-0 bg-transparent" placeholder="Enter Postal Code" /> </p>
                                        <?php
                                        } else {
                                        ?>
                                            <p><span>Postal Code</span>: <input type="text" id="pcode" class="border-0 bg-transparent" value="<?php echo $address_data["postal_code"]; ?>" /> </p>
                                        <?php
                                        }

                                        ?>


                                    </div>
                                </div>



                            </div>
                            <div class="col-12 text-end mb-4">
                                <button class="btn btn-sm text-white mt-5" onclick="updateProfile();" style="background-color: #f7ba01; margin-right: 60px;">Save Changes</button>
                            </div>

                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>


                <div class="center_o pb-5 bg-light mt-4" style="height: 365px;">
                    <div class="container-xl">
                        <div class="row text-center">
                            <div class="col-md-12">

                                <p style="margin-top: 90px; font-family: 'Times New Roman'; color: #89817e;">Please Sign in or Sign up first.</p>
                                <a href="login.php" style="margin-top: 100px; font-family: 'Times New Roman';" class="col-6 col-md-3 btn btn-sm btn-warning text-white">SIGN IN / SIGN UP</a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer -->
                <div class="col-12 fixed-bottom d-none d-lg-block">
                    <p class="text-center">&copy; 2023 speediomart.com || All Rights Reserved</p>
                </div>
                <!-- footer -->

            <?php
            }
            ?>

        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>