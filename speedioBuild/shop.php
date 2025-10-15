<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop | Speedio Mart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="icon.png" />
</head>

<body onload="loadPage(0);">
    <div class="container-fluid">
        <div class="row">

            <?php

            require "header.php";


            ?>

            <div id="center" class="center_o pt-4 pb-4 bg-light">
                <div class="container-xl">
                    <div class="row center_o1 text-center">
                        <div class="col-md-12">
                            <h1>THE SHOP</h1>
                            <h6 class="d-inline-block bg-white" style="font-size: 14px; color: #f7ba01;">
                                <a class="text-dark text-decoration-none" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Shop
                            </h6>
                        </div>
                        
                    </div>
                </div>
            </div>
            

            <!--products-->

            <div class="col-sm-10 offset-lg-1">

                <div id="new-arrivals" class="new-arrivals">
                    <div class="container">
                        <div class="new-arrivals-content">
                            <div class="row" id="productid"> 



                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!--products-->

            <?php

            require "footer.php";

            ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>