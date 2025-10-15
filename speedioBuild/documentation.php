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
                        <h5 class="headBox" style="margin-left: 260px;">Documentation</h5>
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

                    <div id="uDetails">
                        <div class="row text-center gap-3 p-2">
                            <div class="col border p-2 bg-dark rounded-3" onclick="userPageView();">
                                <a href="#" style="text-decoration: none; color: white;font-weight: 500;"><i class="bi bi-person-lines-fill"></i> &nbsp; Users Details</a>
                            </div>
                            <div class="col p-2 rounded-3" style="border: 2px solid #9e9e9e;" onclick="userPageView();">
                                <a href="#" style="text-decoration: none; color: black;font-weight: 500;"><i class="bi bi-handbag"></i> &nbsp; Products Details</a>
                            </div>
                        </div>

                        <!-- User  Details -->

                        <div class="col-12 mt-5">
                            <div class="container text-center mt-4 p-2">
                                <div class="text-center bg-white rounded-3 p-4 border" id="printArea">
                                    <div class="row mt-2">
                                        <div class="text-center">
                                            <h3 class="fw-bold" style="font-weight: 500;">Users Details</h3>
                                        </div>
                                        <div class=" rounded-2 mt-3 mb-3 mx-1 table-x">
                                            <table class="table mt-4 ">
                                                <thead class="table-active fw-bold">
                                                    <td>#</td>
                                                    <td>Name</td>
                                                    <td>Email</td>
                                                    <td>Gender</td>
                                                    <td>Mobile</td>
                                                    <td>Status</td>

                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $adm_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON user.gender_id=gender.id INNER JOIN `status` ON user.status=status.id WHERE `user_type_id`='2' ");
                                                    $adm_num = $adm_rs->num_rows;

                                                    for ($x = 1; $x <= $adm_num; $x++) {
                                                        $adm_data = $adm_rs->fetch_assoc();

                                                    ?>

                                                        <tr style="font-size: 13px;">
                                                            <td><?php echo $x; ?></td>
                                                            <td><?php echo $adm_data["fname"] . " " . $adm_data["lname"]; ?></td>
                                                            <td><?php echo $adm_data["email"]; ?></td>
                                                            <td><?php echo $adm_data["gender_name"]; ?></td>
                                                            <td><?php echo $adm_data["mobile"]; ?></td>
                                                            <td><?php echo $adm_data["name"]; ?></td>
                                                        </tr>

                                                    <?php
                                                    }

                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>




                                </div>
                            </div>
                            <div class="text-end mb-3">
                                <div class="col">
                                    <button class="btn btn-outline-danger" style="font-weight: 500; margin-right: 14px;" onclick="printdiv();">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User  Details -->

                    <!-- Product  Details -->

                    <div class=" d-none" id="proDetails">
                        <div class="row text-center gap-3 p-2">
                            <div class="col p-2 rounded-3" style="border: 2px solid #9e9e9e;" onclick="userPageView();">
                                <a href="#" style="text-decoration: none; color: black; font-weight: 500;"><i class="bi bi-person-lines-fill"></i> &nbsp; Users Details</a>
                            </div>
                            <div class="col border p-2 bg-dark  rounded-3" onclick="userPageView();">
                                <a href="#" style="text-decoration: none;color: white; font-weight: 500;"><i class="bi bi-handbag-fill"></i> &nbsp; Products Details</a>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="container text-center mt-4 p-2">
                                <div class="text-center bg-white rounded-3 p-4 border" id="printArea1">
                                    <div class="row mt-2">
                                        <div>
                                            <h3 class="fw-bold" style="font-weight: 500;">Product Details</h3>
                                        </div>
                                        <div class=" rounded-2 mt-3 mb-3 mx-1 table-x">
                                            <table class="table mt-4 " style="overflow-x: auto;">
                                                <thead class="table-active fw-bold">
                                                    <td>#</td>
                                                    <td>Name</td>
                                                    <td>Brand</td>
                                                    <td>Price</td>
                                                    <td>Quantity</td>
                                                    <td>Condition</td>
                                                    <td>Status</td>

                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $prod_rs = Database::search("SELECT *,(brand.name) AS `bname`,(status.name) AS `sname` FROM `product` INNER JOIN `brand` ON product.brand_id=brand.id INNER JOIN `status` ON product.status_id=status.id INNER JOIN `condition` ON product.condition_id=condition.id WHERE `status_id`='1'");
                                                    $prod_num = $prod_rs->num_rows;

                                                    for ($x = 1; $x <= $prod_num; $x++) {
                                                        $prod_data = $prod_rs->fetch_assoc();

                                                    ?>

                                                        <tr style="font-size: 13px;">
                                                            <td><?php echo $x; ?></td>
                                                            <td><?php echo $prod_data["title"]; ?></td>
                                                            <td><?php echo $prod_data["bname"]; ?></td>
                                                            <td><?php echo $prod_data["price"]; ?>/=</td>
                                                            <td><?php echo $prod_data["qty"]; ?></td>
                                                            <td><?php echo $prod_data["name"]; ?></td>
                                                            <td><?php echo $prod_data["sname"]; ?></td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mb-3 mt-2">
                                    <div class="col">
                                        <button class="btn btn-outline-danger" style="font-weight: 500; margin-right: 14px;" onclick="printdiv1();">Print</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- Product  Details -->

            </div>



        </div>


    </div>

    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php

}else{
    ?>
    
    <script>
        alert("You're Not a valid User. Please Sign in Again");
        window.location = "login.php";
    </script>
    
    <?php
}

?>