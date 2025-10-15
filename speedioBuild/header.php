<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="#">About</a>
                    <a class="text-body mr-3" href="#">Help</a>
                    <a class="text-body mr-3" href="#">FAQs</a>
                </div>
            </div>


            <div class="col-lg-6 text-center text-lg-right text-lg-end">

                <?php

                session_start();

                if (isset($_SESSION["user"])) {
                    $data = $_SESSION["user"];

                ?>

                    <div class="d-inline-flex align-items-center" style="margin-top: -2px; margin-bottom: 2px;">
                        <div class="btn-group">
                            <p class="text-light border-end" style="font-size: 14px; margin-top: -2px; margin-bottom: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-top: -4px;" fill="currentColor" class="bi bi-person-fill-exclamation" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z" />
                                </svg>&nbsp;&nbsp;<?php echo $data["fname"]; ?>&nbsp;&nbsp; </p>
                        </div>&nbsp;&nbsp;
                        <div class="btn-group mx-2">
                            <p class="text-light border-end" style="font-size: 14px; margin-bottom: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="margin-top: -2px;" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                </svg> &nbsp; <?php echo $data["email"]; ?>&nbsp;&nbsp;&nbsp; </p>
                        </div>
                        <div class="btn-group ">
                            <a href="#" onclick="signOut();" class="text-white text-decoration-none" style="font-size: 14px; margin-top: -2px; margin-bottom: -2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-top: -2px;" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z" />
                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                </svg> Logout </a>
                        </div>
                    </div>

                <?php

                } else {
                ?>

                    <div class="d-inline-flex align-items-center" style="margin-top: -2px; margin-bottom: 2px;">
                        <div class="btn-group">
                            <a href="login.php">
                                <p class="text-light border-start" type="button" style="font-size: 14px; margin-top: -2px; margin-bottom: -2px;">&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-top: -2px;" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                        <path d="M7.5 1v7h1V1h-1z" />
                                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                    </svg>&nbsp; Sign in &nbsp; OR &nbsp; Sign up</p>
                            </a>
                        </div>
                    </div>

                <?php
                }

                ?>

            </div>

        </div>
    </div>

    <div id="header" class="container-fluid">
        <div class="row py-3 border-bottom">

            <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                <div class="main-logo row">
                    <a href="#" class="text-decoration-none">
                        <span class=" col-12 d-flex justify-content-center fs-2 fw-bold title" style="margin-left: -4px; border-bottom: yellow;">SPEEDIO MART</span>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="search-bar row bg-light p-2 my-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block text-center mt-1 border-end advanced">
                        <a href="advancedSearch.php" class="border-0 bg-transparent text-secondary text-decoration-none " type="button">Advanced</a>
                    </div>
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center">
                            <input type="text" class="form-control border-0 bg-transparent" id="searchTxt" placeholder="Search for more than 20,000 products" onkeyup="basicSearch(0);" />
                        </form>
                    </div>
                    <div class="col-1" onclick="basicSearch(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" type="button" style="margin-top: 6px; color: gray;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                <div class="support-box text-end d-none d-xl-block">
                    <span class="text-muted " style="font-size: 17px; margin-right: 6px;">For support?</span>
                    <h5 class="mb-0" style="font-size: 16px;">+94 779840891</h5>
                </div>

                <ul class="d-flex justify-content-end list-unstyled m-0">

                    <li>
                        <a href="userProfile.php" class="rounded-circle bg-light p-2 mx-1">
                            <i style="color: gray; font-size: 20px; margin-top: -11px;" class="bi bi-person"></i> 
                        </a>
                    </li>
                    <li>
                        <a href="watchlist.php" class="rounded-circle bg-light p-2 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="color: gray;" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none me-2">
                        <a href="cart.php" class="rounded-circle bg-light p-2 mx-1" style="color: gray;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none me-2">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="color: gray;" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 offset-4 text-secondary" id="exampleModalLabel"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" style="color: gray; margin-top: -5px;" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>&nbsp; SEARCH</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12 border rounded-5 bg-light gap-2 d-flex justify-content-center align-content-center" style="margin-top: 130px;">
                                            <input type="text" class="form-control bg-light text-center border-0" placeholder="Search for more than 20,000 products" id="stxtSml" />
                                            <div class="col-1" onclick="basicSearch1(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" type="button" style="margin-top: 6px; color: gray;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4" id="SmSearch_view">
                                            <h5 class="text-center text-dark" style="font-size: 14px;">Browse your Products</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

                <div class="cart text-end d-none d-lg-block">
                    <a href="cart.php" class="border-0 text-center bg-transparent text-decoration-none d-flex flex-column gap-1 lh-1 mx-3" type="button">
                        <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                    </a>
                </div>
            </div>

        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>