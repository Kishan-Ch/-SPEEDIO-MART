<?php

session_start();
include "connection.php";

if (isset($_SESSION["admin"])) {
    $uemail = $_SESSION["admin"]["email"];

?>

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Dashboard</title>

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
                            <h5 class="headBox" style="margin-left: 260px;">Admin Dashboard</h5>
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

                <?php

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $uemail . "'");
                $user_data = $user_rs->fetch_assoc();

                ?>

                <div class="container" style="margin-left: 13%;">
                    <p>Hi, Welcome Back <span style="font-weight: 700; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"><?php echo $user_data["fname"]; ?></span>!</p>
                </div>

                <div class="container">

                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-4 mx-1 mt-4">
                        <div class="col">
                            <div class="p-4 rounded-4 bg-white " style="height: 120px; border: 3px solid #6c757d;">
                                <div class="container px-4 text-center ">
                                    <div class="row gx-2">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <?php
                                                $use_rs = Database::search("SELECT * FROM `user` WHERE `user_type_id`='2'");
                                                $use_num = $use_rs->num_rows;

                                                ?>
                                                <h5 style="margin-left: -6px; font-size: 15px;">Users <span>(<?php echo $use_num; ?>)</span></h5>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="p-4 rounded-4 bg-white" style="height: 120px; border: 3px solid #6c757d;">
                                <div class="container px-4 text-center ">
                                    <div class="row gx-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <?php
                                                $prod_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='1'");
                                                $prod_num = $prod_rs->num_rows;

                                                ?>
                                                <h5 style="margin-left: -6px; font-size: 15px;">Products <span>(<?php echo $prod_num; ?>)</span></h5>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path>
                                                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path>
                                                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-4 rounded-4 bg-white" style="height: 120px; border: 3px solid #6c757d;">
                                <div class="container px-4 text-center ">
                                    <div class="row gx-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h5 style="margin-left: -6px; font-size: 15px;">Orders <span>(<?php 
                                                 $ord_rs = Database::search("SELECT * FROM `order_history` INNER JOIN `order_item` ON order_history.order_history_id=order_item.order_id");
                                                 $ord_num = $ord_rs->num_rows;
                                               echo $ord_num; ?>)</span></h5>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-4 rounded-4 bg-white" style="height: 120px; border: 3px solid #6c757d; ">
                                <div class="container px-4 text-center ">
                                    <div class="row gx-1">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h5 style="margin-left: -6px; font-size: 15px;">Admins<span>(2)</span></h5>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" fill="currentColor">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                    <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
                                                    <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="text-center bg-white rounded-3 p-4 border mt-4" id="printArea2">
                        <div class="row">
                            <div>
                                <h3 class="fw-bold" style="font-weight: 500;"><u>Order Details</u></h3>
                            </div>
                            <div class=" rounded-2 mt-3 mb-3 mx-1 table-x">
                                <table class="table table-hover mt-4" style="overflow-x: auto;">
                                    <thead class="table-active fw-bold">
                                        <td>#</td>
                                        <td>Order ID</td>
                                        <td>Price</td>
                                        <td>Order Date</td>
                                        <td>Buyer Email</td>


                                    </thead>
                                    <tbody>

                                        <?php

                                        $ord_rs = Database::search("SELECT * FROM `order_history` INNER JOIN `order_item` ON order_history.order_history_id=order_item.order_id");
                                        $ord_num = $ord_rs->num_rows;

                                        for ($x = 1; $x <= $ord_num; $x++) {
                                            $ord_data = $ord_rs->fetch_assoc();

                                        ?>

                                            <tr style="font-size: 13px;">
                                                <td><?php echo $x; ?></td>
                                                <td style="text-transform: uppercase;">#<?php echo $ord_data["oh_id"]; ?></td>
                                                <td><?php echo $ord_data["amount"]; ?>/=</td>
                                                <td><?php echo $ord_data["order_date"]; ?></td>
                                                <td><?php echo $ord_data["user_email"]; ?></td>


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
                            <button class="btn btn-outline-danger" style="font-weight: 500; margin-right: 14px;" onclick="printdiv2();">Print</button>
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