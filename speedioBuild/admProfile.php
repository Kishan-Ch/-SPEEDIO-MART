<?php

session_start();
include "connection.php";

if (isset($_SESSION["admin"])) {
    $ademail = $_SESSION["admin"]["email"];


?>


    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>MY ACCOUNT</title>

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
                            <h5 class="headBox" style="margin-left: 260px;">MY ACCOUNT</h5>
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

                    <div class="col-11 mt-5 text-center" style="margin-left: 6%;">

                        <div class="container text-center border shadow p-5 rounded-3" style="margin-top: -3%">
                            <div class="row p-3">
                                <div class="col-sm border border-end border-start-0 border-top-0 border-bottom-0 border-3 border-dark me-5">


                                    <?php

                                    $adm_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON user.gender_id=gender.id WHERE `email`='" . $ademail . "'");

                                    $img_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email`='" . $ademail . "'");

                                    $addrss_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON user_has_address.city_id=city.id INNER JOIN `district` ON 
                                                                city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id WHERE `user_email`='" . $ademail . "'");

                                    $adm_data = $adm_rs->fetch_assoc();
                                    $img_data = $img_rs->fetch_assoc();
                                    $addrss_data = $addrss_rs->fetch_assoc();

                                    ?>

                                    <div class="tm-avatar-container mt-5">
                                        <?php

                                        if (empty($img_data["path"])) {
                                        ?>

                                            <img src="resources/user.png" width="40%" alt="Avatar" class="tm-avatar img-fluid mb-4" id="img1" />

                                        <?php
                                        } else {
                                        ?>

                                            <img src="<?php echo $img_data["path"]; ?>" width="40%" alt="Avatar" class="tm-avatar img-fluid mb-4" id="img1" />

                                        <?php
                                        }

                                        ?>

                                    </div>
                                    <div class="file col-8 btn btn-sm btn-outline-dark btn-block text-uppercase mb-5">
                                        <input type="file" onclick="changeProImg1();" id="proImg" style=" position: absolute; opacity: 0;" />Change Photo
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="name" style="font-weight: 500;">Full Name :</label>
                                        <input name="text" type="text" class="form-control validate mt-1" readonly placeholder="Saman Kumara" value="<?php echo $adm_data["fname"] . " " . $adm_data["lname"]; ?>" />
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="password" style="font-weight: 500;">Email Address :</label>
                                        <input name="text" type="text" class="form-control validate mt-1 p-1" style="font-size: 12px;" readonly placeholder="ad@gmal.com" value="<?php echo $adm_data["email"]; ?>" id="adEmail" />
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="password2" style="font-weight: 500;"> Password :</label>
                                        <input name="text" type="text" class="form-control validate mt-1" placeholder="323423" value="<?php echo $adm_data["password"]; ?>" id="adpPw" />
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="phone" style="font-weight: 500;">Phone :</label>
                                        <input name="text" type="text" class="form-control validate mt-1" placeholder="07823423" value="<?php echo $adm_data["mobile"]; ?>" id="adMobile" />
                                    </div>
                                    <div class="form-group col-lg-6 mb-2">
                                        <select class="form-select rounded-2 mt-2" style=" font-size: 14px;" id="adGender">
                                            <option value="0">Gender</option>
                                            <?php
                                            $gender_rs = Database::search("SELECT * FROM `gender`");
                                            $gender_num = $gender_rs->num_rows;

                                            for ($g = 0; $g < $gender_num; $g++) {
                                                $gender_data = $gender_rs->fetch_assoc();
                                            ?>

                                                <option value="<?php echo $gender_data["id"]; ?>" <?php
                                                                                                    if (!empty($adm_data["id"])) {
                                                                                                        if ($gender_data["id"] == $adm_data["id"]) { ?>selected<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                            ?>><?php echo $gender_data["gender_name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm">
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="phone" style="font-weight: 500;"> City :</label>
                                        <select class="form-select rounded-2 mt-2" style=" font-size: 14px;" id="adCity">
                                            <option value="0">City</option>
                                            <?php

                                            $city_rs = Database::search("SELECT * FROM `city`");
                                            $city_num = $city_rs->num_rows;

                                            for ($g = 0; $g < $city_num; $g++) {
                                                $city_data = $city_rs->fetch_assoc();
                                            ?>

                                                <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                    if (!empty($addrss_data["city_id"])) {
                                                                                                        if ($city_data["id"] == $addrss_data["city_id"]) { ?>selected<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                            ?>><?php echo $city_data["city_name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="phone" style="font-weight: 500;">District :</label>
                                        <select class="form-select rounded-2 mt-2" style=" font-size: 14px;" id="adDistrict">
                                            <option value="0">District</option>
                                            <?php

                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $district_num = $district_rs->num_rows;

                                            for ($g = 0; $g < $district_num; $g++) {
                                                $district_data = $district_rs->fetch_assoc();
                                            ?>

                                                <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                    if (!empty($addrss_data["district_id"])) {
                                                                                                        if ($district_data["id"] == $addrss_data["district_id"]) { ?>selected<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                            ?>><?php echo $district_data["name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="phone" style="font-weight: 500;">Province :</label>
                                        <select class="form-select rounded-2 mt-2" style=" font-size: 14px;" id="adProvince">
                                            <option value="0">Province</option>
                                            <?php

                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            $province_num = $province_rs->num_rows;

                                            for ($g = 0; $g < $province_num; $g++) {
                                                $province_data = $province_rs->fetch_assoc();
                                            ?>

                                                <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                    if (!empty($addrss_data["province_id"])) {
                                                                                                        if ($province_data["id"] == $addrss_data["province_id"]) { ?>selected<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                            ?>><?php echo $province_data["province_name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="phone" style="font-weight: 500;">Postal COde :</label>
                                        <input name="text" type="text" class="form-control validate mt-2" placeholder="81000" value="<?php echo $addrss_data["postal_code"]; ?>" id="adPcode" />
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-12 text-end mt-4">
                            <label class="tm-hide-sm">&nbsp;</label>
                            <button type="submit" style="font-weight: 500;" onclick="adProUpdate();" class="btn btn-dark btn-block text-uppercase"> Update Your Profile </button>
                        </div>

                    </div>


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