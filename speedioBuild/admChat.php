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
                                    <a href="#" class="nav-link text-body p-0 position-relative">
                                        <i class="bi bi-bell-fill icon-bell" style="font-size: 23px;"></i>
                                        <span class="d-lg-none text-secondary setting" style=" font-size: 9px; margin-left: -20px;">NOTIFICATIONS</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>


                <div class="container">
                    <div class="container col-10 p-3 ">
                        <div class="col-12 justify-content-center p-3">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 border">
                                    <div class="col-12">
                                        <div class="row p-4 border mb-3">
                                            <div class="col-3"><img src="resources/user.png" width="60%" /></div>
                                            <div class="col-8"><span>Kishan Chirantha</span></div>
                                        </div>
                                        <div class="row p-4 border mb-3">
                                            <div class="col-3"><img src="resources/user.png" width="60%" /></div>
                                            <div class="col-8"><span>Minusha Tharushan</span></div>
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-8">
                                    <div id="main" class="col-12 rounded-4">

                                        <div class="col-12">

                                            <div class="card rounded-4 bg-light" id="body">

                                                <div class="card-header msg_head rounded-4" style="background-color: #284075; color: white;">

                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont p-1">
                                                            <img src="resources/user.png" width="50px" class="rounded-circle user_img bg-white p-1">
                                                            <span class="online_icon"></span>
                                                        </div>
                                                        <div class="mt-2 mx-3">

                                                            <span style="font-size: 21px; font-weight: bold;">CUSTOMER SERVICE</span>
                                                            <p style="font-size: 12px; margin-left: 4px;">9 Messages</p>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="rounded-4" style="text-align: center; height: 350px; margin-top: 28px;">

                                                    <div class="card-body msg_card_body2" style="color: white;" id="chatBox2">

                                                        <!-- receiver -->
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <div class="msg_cotainer_send">
                                                                <span>Hi</span>
                                                                <p class="msg_time">7.34;</p>
                                                            </div>
                                                            <div class="img_cont_msg">
                                                                <img src="resources/customer.png" width="40px" height="40px" class="rounded-circle user_img_msg">
                                                            </div>
                                                        </div>
                                                        <!-- receiver -->
                                                        
                                                        <!-- sender -->
                                                        <div class="d-flex justify-content-start mb-4">
                                                            <div class="img_cont_msg mt-1">
                                                                <img src="resources/user.png" width="30px" height="30px" class="rounded-circle user_img_msg bg-white p-1">
                                                            </div>
                                                            <div class="msg_cotainer">
                                                                <span>Hello</span>
                                                                <p class="msg_time">1.45</p>
                                                            </div>
                                                        </div>
                                                      <!-- sender -->

                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="input-group">
                                                        <textarea class="form-control type_msg border-0 rounded-5" style="background-color: #495057; padding: 0.375rem 0.75rem; font-size: 1rem; height: 50px; color: white;" id="msg_txt" placeholder="Type your message..."></textarea>
                                                        <div class="input-group-append mt-2 mx-2" style="width: 40px; height: 40px; cursor: pointer;">
                                                            <span class="input-group-text d-flex send_btn border-0 rounded-5 p-2" style="background-color: #78e08f; color: rgba(0,0,0,0.3);"><i class="bi bi-send-fill mx-1" style="color: white;"></i></span>
                                                        </div>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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