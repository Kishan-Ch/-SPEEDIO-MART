<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log | Speedio Mart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="icon.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="section" style="height: 100vh; display: flex;  justify-content: center; align-items: center; background-color: #eee">
                <div class="col-10 col-lg-8 bg-white" style="background-color: #fff; position: relative; box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1)">

                    <div class="container">
                        <div class="row">

                            <!-- signupbox -->
                            <div class="col-12 col-lg-6 mb-5 left-side d-none" id="signupbox">

                                <div class="mb-3">
                                    <span class="brand mx-2" style="top: 0; display: flex;text-transform: uppercase">
                                        <span class="d-flex justify-content-center fw-bold title" style="font-size: 15px;">SPEEDIO MART</span>
                                    </span>
                                </div>

                                <div class="col-10 mt-2 form-inputs text-center mx-4" style="padding: 25px">

                                    <p style="font-family: 'Gill Sans'; font-size: 26px; font-weight: bold; color: #3d4348; margin-bottom: 25px;">SIGN UP</p>

                                    <div class="col-12 d-none" id="msgdiv">
                                        <div class="alert alert-danger" role="alert" style="font-size: 13px;" id="alert">

                                        </div>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="in mb-3" id="fname" placeholder="First Name" />
                                            </div>

                                            <div class="col-6">
                                                <input type="text" class="in mb-3" id="lname" placeholder="Last Name" />
                                            </div>
                                        </div>

                                        <input type="text" class="in mb-3" id="email" placeholder="Email Address" />

                                        <input type="text" class="in mb-3" id="mobile" placeholder="Mobile" />
                                        <div class="row">
                                            <div class="col-6">
                                                <div style=" position: relative">
                                                    <input id="password" class="pw" type="password" id="password" placeholder="Password" />
                                                    <span id="pwb" class="showpass" onclick="showPassword2();" style="width: 25px; height: 25px;background-color: #fff;right: -13px;top: 20px; position: absolute; border-radius: 50%; cursor: pointer; display: flex;justify-content: center; align-items: center">
                                                        <i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>
                                                    </span>
                                                    <p class="random_password" style=" margin-top: 5px; letter-spacing: 1px;  font-size: 15px;position: absolute; 
                                                                                top: 58px; left: 3px; cursor: pointer; display: none;font-size: 9px">
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div style=" position: relative">
                                                    <input class="pw" id="rpassword" type="password" placeholder="Re-Password" />
                                                    <span id="rpwb" class="showpass" onclick="showPassword1();" style="width: 25px; height: 25px;background-color: #fff;right: -13px;top: 20px; position: absolute; border-radius: 50%; cursor: pointer; display: flex;justify-content: center; align-items: center">
                                                        <i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>
                                                    </span>
                                                    <p class="random_password" style=" margin-top: 5px; letter-spacing: 1px;  font-size: 15px;position: absolute; 
                                                                                top: 58px; left: 3px; cursor: pointer; display: none;font-size: 9px">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="container mt-2">
                                        <div class="col text-start">
                                            <div class="form-check" style="font-size: 15px; margin-left: -4px; color: #333;">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Agree to terms and conditions
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <button class="col-12 p-2" style="cursor: pointer; border: none; background-color: #130329; text-transform: uppercase; color: #fff;
                                                         margin-top: px" onclick="signUp();">REGISTER</button>
                                    <p class="login-text mt-4" style=" margin-top: 10px; text-transform: uppercase; letter-spacing: 1px; font-size: 12px; color: #555" onclick="changeView();">Already have an account? <a href="#">login</a>
                                    </p>

                                </div>
                            </div>

                            <!-- signupbox -->


                            <!-- signinbox -->

                            <div class="col-12 col-lg-6 mb-5 left-side" id="signinbox">

                                <div class="mb-3">
                                    <span class="brand mx-2" style="top: 0; display: flex;text-transform: uppercase">
                                        <span class="d-flex justify-content-center fw-bold title" style="font-size: 15px;">SPEEDIO MART</span>
                                    </span>
                                </div>

                                <div class="col-10 mt-4 form-inputs text-center mx-4" style="padding: 25px">

                                    <p style="font-family: 'Gill Sans'; font-size: 26px; font-weight: bold; color: #3d4348; margin-bottom: 25px;">SIGN IN</p>

                                    <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" style="font-size: 13px;" id="alert1">

                                        </div>
                                    </div>

                                    <div class="mb-4 mt-4">

                                        <?php

                                        $email = "";
                                        $password = "";

                                        if (isset($_COOKIE["email"])) {
                                            $email = $_COOKIE["email"];
                                        }

                                        if (isset($_COOKIE["password"])) {
                                            $password = $_COOKIE["password"];
                                        }
                                        ?>

                                        <input type="text" class="in mb-3" id="email2" placeholder="Email Address" value="<?php echo $email; ?>" />

                                        <div style=" position: relative">
                                            <input id="pw2" class="pw" type="password" placeholder="Password" value="<?php echo $password; ?>" />
                                            <span id="pw2b" class="showpass" onclick="showPassword();" style="width: 25px; height: 25px;background-color: #fff;right: -13px;top: 20px; position: absolute; border-radius: 50%; 
                                                            cursor: pointer; display: flex;justify-content: center; align-items: center">
                                                <i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>
                                            </span>
                                            <p class="random_password" style=" margin-top: 5px; letter-spacing: 1px;  font-size: 15px;position: absolute; 
                                                                                top: 58px; left: 3px; cursor: pointer; display: none;font-size: 9px">
                                            </p>
                                        </div>

                                    </div>

                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col text-start">
                                                <div class="form-check" style="font-size: 15px; margin-left: -4px; color: #333;">
                                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col text-end">
                                                <a href="#" style="font-size: 15px; color: #333;" onclick="forgetPasswordView();">Forget password?</a>
                                            </div>
                                        </div>

                                    </div><br />

                                    <button class="col-12 p-2" style="cursor: pointer; border: none; background-color: #130329; text-transform: uppercase; color: #fff; margin-top: 22px" onclick="signIn();">LOGIN</button>
                                    <p class="login-text mt-4" style=" margin-top: 10px; text-transform: uppercase; letter-spacing: 1px; font-size: 11px; color: #555" onclick="changeView();">Don,t Have an Account yet? <a href="#">Create an Account</a>
                                    </p>

                                </div>
                            </div>

                            <!-- signinbox -->

                            <!-- forget mail -->

                            <div class="col-12 col-lg-6 mb-5 left-side d-none" id="forgetPassword">

                                <div class="mb-3">
                                    <span class="brand mx-2" style="top: 0; display: flex;text-transform: uppercase">
                                        <span class="d-flex justify-content-center fw-bold title" style="font-size: 15px;">SPEEDIO MART</span>
                                    </span>
                                </div>

                                <div class="col-10 mt-4 form-inputs text-center mx-4" style="padding: 25px">

                                    <p style="font-family: 'Gill Sans'; font-size: 26px; font-weight: bold; color: #3d4348; margin-bottom: 25px;">Forget Password</p>

                                    <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" style="font-size: 13px;" id="alert1">

                                        </div>
                                    </div>

                                    <div class="mb-3 mt-5">

                                        <input type="text" class="in mb-3" id="email3" placeholder="Email Address" />

                                    </div>
                                    <br />

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <button class="col-12 p-2" onclick="forgetPasswordView();" style="cursor: pointer; border: none; background-color: #6c757d; text-transform: uppercase; font-size: 0.8rem; color: #fff; margin-top: 12px">Back</button>
                                            </div>
                                            <div class="col">
                                                <button class="col-12 p-2" onclick="forgetPassword();" style="cursor: pointer; border: none; background-color: #130329; text-transform: uppercase; color: #fff; margin-top: 12px; font-size: 0.8rem;">Send Email</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- forget mail -->

                            <!-- forget password -->

                            <div class="col-12 col-lg-6 mb-5 left-side d-none" id="forgetPassword3">

                                <div class="mb-3">
                                    <span class="brand mx-2" style="top: 0; display: flex;text-transform: uppercase">
                                        <span class="d-flex justify-content-center fw-bold title" style="font-size: 15px;">SPEEDIO MART</span>
                                    </span>
                                </div>

                                <div class="col-10 mt-4 form-inputs text-center mx-4" style="padding: 25px">

                                    <p style="font-family: 'Gill Sans'; font-size: 26px; font-weight: bold; color: #3d4348; margin-bottom: 25px;">Forget Password</p>

                                    <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" style="font-size: 13px;" id="alert1">

                                        </div>
                                    </div>

                                    <div class="mb-3 mt-4">

                                        <input type="text" class="in mb-3" id="verifyC" placeholder="Verification Code" />

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col">
                                                    <div style=" position: relative">
                                                        <input id="pw3" class="pw" type="password" placeholder="Password" />
                                                        <span id="pw3b" class="showpass" onclick="showPassword3();" style="width: 25px; height: 25px;background-color: #fff;right: -13px;top: 20px; position: absolute; border-radius: 50%; 
                                                                    cursor: pointer; display: flex;justify-content: center; align-items: center">
                                                            <i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>
                                                        </span>
                                                        <p class="random_password" style=" margin-top: 5px; letter-spacing: 1px;  font-size: 15px;position: absolute; 
                                                                 top: 58px; left: 3px; cursor: pointer; display: none;font-size: 9px">
                                                        </p>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div style=" position: relative">
                                                        <input id="pw4" class="pw" type="password" placeholder="Re-Password" />
                                                        <span id="pw4b" class="showpass" onclick="showPassword4();" style="width: 25px; height: 25px;background-color: #fff;right: -13px;top: 20px; position: absolute; border-radius: 50%; 
                                                             cursor: pointer; display: flex;justify-content: center; align-items: center">
                                                            <i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>
                                                        </span>
                                                        <p class="random_password" style=" margin-top: 5px; letter-spacing: 1px; font-size: 15px;position: absolute; 
                                                             top: 58px; left: 3px; cursor: pointer; display: none;font-size: 9px">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <br />
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <button class="col-12 p-2" onclick="forgetPassword();" style="cursor: pointer; border: none; background-color: #6c757d; text-transform: uppercase; font-size: 0.8rem; color: #fff; margin-top: 12px">Back</button>
                                            </div>
                                            <div class="col">
                                                <button class="col-12 p-2" onclick="verifyPassword();" style="cursor: pointer; border: none; background-color: #130329; text-transform: uppercase; color: #fff; margin-top: 12px; font-size: 0.8rem;">Save Password</button>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <!-- forget password -->

                            <div class="col-md-6 offset-md-0 right-side d-none d-lg-block" style="position: relative; background-color: #000000e3; display: flex; justify-content: center; align-items: center; overflow: hidden">
                                <span class="circle1" style=" position: absolute;height: 300px; width: 300px;  background-color: #000; border-radius: 50%; top: -100px; left: -100px; transition: all 1s"></span> 
                                <span class="circle2" style=" position: absolute; height: 200px; width: 200px;  background-color: #000; border-radius: 50%; top: 250px; right: 50px; transition: all 1s; transition-delay: 3s"></span>
                                <span class="circle3" style=" position: absolute; height: 100px; width: 100px;  background-color: #000; border-radius: 50%; top: 50px;  right: 10px; transition: all 1s; transition-delay: 2s"></span>
                                <svg style=" position: absolute;bottom: 0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="#000" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,229.3C384,256,480,256,576,234.7C672,213,768,171,864,176C960,181,1056,235,1152,229.3C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                                </svg><h2 style="font-size: 40px;letter-spacing: 1px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #fff; display: flex; align-items: center; justify-content: center; margin-top: 150px; margin-left: -90px;">Hello,</h2>
                                <h2 style="font-size: 40px;letter-spacing: 1px;text-transform: uppercase; font-family:'Gill Sans'; color: #fff; font-weight: bold; display: flex; align-items: center; justify-content: center; margin-left: 30px;">Welcome!</h2>
                                
                            </div>





                        </div>
                    </div>

                </div>
            </div>
            <!-- footer -->
            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2023 speediomart.com || All Rights Reserved</p>
            </div>
            <!-- footer -->

        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>