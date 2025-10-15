// Sign in / Sign out ---- >>>
function changeView() {
    var signinBox = document.getElementById("signinbox");
    var signupBox = document.getElementById("signupbox");

    signinBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}
// Sign in / Sign out ---- >>>


// Chat Box ---- >>>
var chatdiv = document.getElementById("main");
var display = 1;

function chatbox() {

    if (display == 1) {
        chatdiv.style.display = 'block';
        display = 0;


    } else {
        chatdiv.style.display = 'none';
        display = 1;
    }


}
function chatboxClose() {
    if (display == 0) {
        chatdiv.style.display = 'none';
        display = 1;
    }
}
// Chat Box ---- >>>

function viewMsg() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            document.getElementById("chatBox").innerHTML = t;
        }
    }

    r.open("GET", "viewMsgProcess.php", true);
    r.send();
}

function sendMsg() {
    var msg_txt = document.getElementById("msg_txt");

    var f = new FormData();
    f.append("msg_txt", msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
}

// Sign up ---- >>>
function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pas = document.getElementById("password");
    var rpas = document.getElementById("rpassword");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pas.value);
    f.append("rp", rpas.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Successfully. You can Sign in your Acccount") {
                document.getElementById("alert").innerHTML = t;
                document.getElementById("alert").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("alert").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}
// Sign up ---- >>>


// Sign in ---- >>>
function signIn() {
    var email2 = document.getElementById("email2");
    var pw2 = document.getElementById("pw2");
    var rm = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e2", email2.value);
    f.append("pw2", pw2.value);
    f.append("rm", rm.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "index.php";
            } else if (t == "Admin Login") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("alert1").innerHTML = t;
                document.getElementById("msgdiv1").className = "d-block";
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}
// Sign in ---- >>>


function showPassword() {
    var pw2 = document.getElementById("pw2");
    var pw2b = document.getElementById("pw2b");

    if (pw2.type == "password") {

        pw2.type = "text";
        pw2b.innerHTML = '<i class="bi bi-eye" style=" width: 15px;transition: all 5s"></i>';

    } else {
        pw2.type = "password";
        pw2b.innerHTML = '<i  style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>';
    }
}

function showPassword2() {
    var password = document.getElementById("password");
    var pwb = document.getElementById("pwb");

    if (password.type == "password") {

        password.type = "text";
        pwb.innerHTML = '<i class="bi bi-eye" style=" width: 15px;transition: all 5s"></i>';

    } else {
        password.type = "password";
        pwb.innerHTML = '<i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>';
    }
}

function showPassword1() {
    var rpassword = document.getElementById("rpassword");
    var rpwb = document.getElementById("rpwb");

    if (rpassword.type == "password") {

        rpassword.type = "text";
        rpwb.innerHTML = '<i class="bi bi-eye" style=" width: 15px;transition: all 5s"></i>';

    } else {
        rpassword.type = "password";
        rpwb.innerHTML = '<i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>';
    }
}

function showPassword3() {
    var pw3 = document.getElementById("pw3");
    var pw3b = document.getElementById("pw3b");

    if (pw3.type == "password") {
        pw3.type = "text";
        pw3b.type = '<i class="bi bi-eye" style=" width: 15px;transition: all 5s"></i>';
    } else {
        pw3.type = "password";
        pw3b.type = '<i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>';

    }
}

function showPassword4() {
    var pw4 = document.getElementById("pw4");
    var pw4b = document.getElementById("pw4b");

    if (pw4.type == "password") {
        pw4.type = "text";
        pw4b.type = '<i class="bi bi-eye" style=" width: 15px;transition: all 5s"></i>';
    } else {
        pw4.type = "password";
        pw4b.type = '<i style=" width: 15px;transition: all 5s" class="bi bi-eye-slash"></i>';
    }
}


function forgetPasswordView() {
    var forgetPassword = document.getElementById("forgetPassword");
    var signinbox = document.getElementById("signinbox");

    forgetPassword.classList.toggle("d-none");
    signinbox.classList.toggle("d-none");
}


function forgetPassword() {
    var email3 = document.getElementById("email3");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Verification code has been sent. Please check your Email") {

                var forgetPassword3 = document.getElementById("forgetPassword3");
                var forgetPassword = document.getElementById("forgetPassword");

                forgetPassword3.classList.toggle("d-none");
                forgetPassword.classList.toggle("d-none");

            }
        }
    }

    r.open("GET", "forgetPasswordProcess.php?e=" + email3.value, true);
    r.send();
}


function verifyPassword() {

    var verifyC = document.getElementById("verifyC");
    var pw3 = document.getElementById("pw3");
    var pw4 = document.getElementById("pw4");
    var email3 = document.getElementById("email3");

    var f = new FormData();
    f.append("verifyC", verifyC.value);
    f.append("pw3", pw3.value);
    f.append("pw4", pw4.value);
    f.append("email3", email3.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Successfully") {
                alert("Successfully");
                window.location.reload();
            }
        }
    }

    r.open("POST", "verificationProcess.php", true);
    r.send(f);

}

function signOut() {
    if (confirm("Are you sure?")) {

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.status == 200 && r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    window.location.reload();
                }
            }
        }

        r.open("GET", "signOutProcess.php", true);
        r.send();

    }
}

function changeProductImg() {
    var img = document.getElementById("imageuploader");

    img.onchange = function () {

        var file_count = img.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
                document.getElementById("imgChange1").className = "d-none";
                document.getElementById("imgChange2").className = "d-block";

            }

        } else {
            alert(file_count + " files. You are proceed to upload only 3 or less than 3 files.");
        }

    }
}



function addBrand() {
    var adBrand = document.getElementById("adBrand").value;

    var f = new FormData();
    f.append("adBrand", adBrand);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                location.reload();
                alert("Success");
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "adBrand.php", true);
    r.send(f);
}

function addCategory() {
    var adCategory = document.getElementById("adCategory").value;

    var f = new FormData();
    f.append("adCategory", adCategory);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                location.reload();
                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adCategory.php", true);
    r.send(f);
}

function adClr() {
    var adClr = document.getElementById("adClr").value;

    var f = new FormData();
    f.append("adClr", adClr);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                location.reload();
                alert("Sucess");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adClrProcess.php", true);
    r.send(f);
}

function addProduct() {
    var title = document.getElementById("title");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var clr = document.getElementById("clr");
    var con = document.getElementById("con");
    var price = document.getElementById("price");
    var desc = document.getElementById("desc");
    var qty = document.getElementById("qty");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var image = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("title", title.value);
    f.append("category", category.value);
    f.append("brand", brand.value);
    f.append("clr", clr.value);
    f.append("con", con.value);
    f.append("price", price.value);
    f.append("desc", desc.value);
    f.append("qty", qty.value);
    f.append("dwc", dwc.value);
    f.append("doc", doc.value);

    var file_count = image.files.length;
    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                window.location.reload();
                alert("The Product Adding was Successfull");
            } else {
                if (t == "*Please enter the Product Name") {
                    document.getElementById("alert3").innerHTML = t;
                    document.getElementById("alert3").className = "d-block";
                } else if (t == "*Please enter the Product Category" || t == "*Please enter the Brand of Product" || t == "*Please enter the Product color" || t == "*Please enter the Product Condition") {
                    document.getElementById("alert6").innerHTML = t;
                    document.getElementById("alert6").className = "d-block";
                } else if (t == "*Please enter the Price of Product") {
                    document.getElementById("alert4").innerHTML = t;
                    document.getElementById("alert4").className = "d-block";
                } else if (t == "*Please enter the Description to Product") {
                    document.getElementById("alert5").innerHTML = t;
                    document.getElementById("alert5").className = "d-block";
                } else if (t == "*Please enter the Quantity of Product") {
                    document.getElementById("alert7").innerHTML = t;
                    document.getElementById("alert7").className = "d-block";
                } else if (t == "*Please enter the Delivery charge within Colombo") {
                    document.getElementById("alert8").innerHTML = t;
                    document.getElementById("alert8").className = "d-block";
                } else if (t == "*Please enter the Delivery charge out of Colombo") {
                    document.getElementById("alert9").innerHTML = t;
                    document.getElementById("alert9").className = "d-block";
                } else {
                    alert(t);
                }


            }
        }
    }

    r.open("POST", "adProductProcess.php", true);
    r.send(f);
}

function advancedSearch(x) {

    var kw = document.getElementById("kw");
    var w = document.getElementById("w");
    var cate = document.getElementById("cate");
    var br = document.getElementById("br");
    var s = document.getElementById("s");
    var ne = document.getElementById("ne");
    var us = document.getElementById("us");
    var p1 = document.getElementById("p1");
    var p2 = document.getElementById("p2");

    var f = new FormData();
    f.append("kw", kw.value);
    f.append("cate", cate.value);
    f.append("br", br.value);
    f.append("s", s.value);
    f.append("ne", ne.checked);
    f.append("us", us.checked);
    f.append("p1", p1.value);
    f.append("p2", p2.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("advanced_view").innerHTML = t;
        }
    }

    r.open("POST", "advancedProcess.php", true);
    r.send(f);

}

function basicSearch(x) {

    var topdiv = document.getElementById("billboard");
    var search_div = document.getElementById("search_div");
    var page = x;

    topdiv.classList.toggle("d-none");
    search_div.classList.toggle("d-none");

    var searchTxt = document.getElementById("searchTxt");

    var f = new FormData();
    f.append("searchTxt", searchTxt.value);
    f.append("page", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearch_view").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);
}

function basicSearch1(x) {
    var stxtSml = document.getElementById("stxtSml");

    var f = new FormData();
    f.append("stxtSml", stxtSml.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("SmSearch_view").innerHTML = t;
        }
    }
    r.open("POST", "SmbasicSearchProcess.php", true);
    r.send(f);
}



function changeProImg() {
    var proImg = document.getElementById("proImg");

    proImg.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("img").src = url;
    }
}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var password = document.getElementById("password");
    var gender = document.getElementById("gender");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var district = document.getElementById("district");
    var province = document.getElementById("province");
    var pcode = document.getElementById("pcode");
    var proImg = document.getElementById("proImg");

    var f = new FormData();

    f.append("fname", fname.value);

    f.append("lname", lname.value);
    f.append("password", password.value);
    f.append("gender", gender.value);
    f.append("mobile", mobile.value);
    f.append("line1", line1.value);
    f.append("line2", line2.value);
    f.append("city", city.value);
    f.append("district", district.value);
    f.append("province", province.value);
    f.append("pcode", pcode.value);
    f.append("proImg", proImg.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Updated" || t == "Saved") {
                alert("Update Successfully");
                window.location.reload();
                
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}


function loadProductImg(id) {
    var sample_img = document.getElementById("productImg" + id).src;
    var img = document.getElementById("mainImg");


}

function loadPage(x) {

    var page = x;

    var f = new FormData();
    f.append("p", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("productid").innerHTML = t;
        }
    }

    r.open("POST", "loadProductProcess.php", true);
    r.send(f);

}


function addWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Added") {
                document.getElementById("heart" + id).style.color = "green";
                alert("Product was Added");
                window.location.reload();
            } else if (t == "Removed") {
                document.getElementById("heart" + id).style.color = "red";
                alert("Product was Removed from Watchlist");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "adWatchlistProcess.php?id=" + id, true);
    r.send();
}


function adCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "adCartProcess.php?id=" + id, true);
    r.send();
}

function userPageView() {
    var uDetails = document.getElementById("uDetails");
    var proDetails = document.getElementById("proDetails");

    uDetails.classList.toggle("d-none");
    proDetails.classList.toggle("d-none");
}

function stockUpd() {
    var prading = document.getElementById("prading");
    var adpro = document.getElementById("adpro");

    prading.classList.toggle("d-none");
    adpro.classList.toggle("d-none");
}

function printdiv() {
    var orginalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;
    window.print();
    document.body.innerHTML = orginalContent;
}

function printdiv1() {
    var orginalContent = document.body.innerHTML;
    var printArea1 = document.getElementById("printArea1").innerHTML;

    document.body.innerHTML = printArea1;
    window.print();
    document.body.innerHTML = orginalContent;
}

function printdiv2() {
    var orginalContent = document.body.innerHTML;
    var printArea2 = document.getElementById("printArea2").innerHTML;

    document.body.innerHTML = printArea2;
    window.print();
    document.body.innerHTML = orginalContent;
}

function stockUpdate() {
    var prID = document.getElementById("prName");
    var adPrice = document.getElementById("adPrice");
    var adQty = document.getElementById("adQty");

    var f = new FormData();
    f.append("prID", prID.value);
    f.append("adPrice", adPrice.value);
    f.append("adQty", adQty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "stockUpdateProcess.php", true);
    r.send(f);

}

function adProUpdate() {
    var adpPw = document.getElementById("adpPw");
    var adMobile = document.getElementById("adMobile");
    var adGender = document.getElementById("adGender");
    var adCity = document.getElementById("adCity");
    var adDistrict = document.getElementById("adDistrict");
    var adProvince = document.getElementById("adProvince");
    var adPcode = document.getElementById("adPcode");

    var f = new FormData();
    f.append("adpPw", adpPw.value);
    f.append("adMobile", adMobile.value);
    f.append("adGender", adGender.value);
    f.append("adCity", adCity.value);
    f.append("adDistrict", adDistrict.value);
    f.append("adProvince", adProvince.value);
    f.append("adPcode", adPcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Updated") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "adProUpdateProcess.php", true)
    r.send(f);
}


function changeProImg1() {
    var proImg = document.getElementById("proImg");

    var f = new FormData();
    f.append("proImg", proImg.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Invalid Img Count") {
                alert(t);
            } else {
                document.getElementById("img1").src = t;
                proImg.value = "";
            }
        }
    }

    r.open("POST", "proImgUploadProcess.php", true);
    r.send(f);
}

function removeCart(x) {
    if (confirm("Are you sure?")) {

        var f = new FormData();
        f.append("x", x);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.status == 200 && r.readyState == 4) {
                var t = r.responseText;
                alert(t);
                window.location.reload();
            }
        }
        r.open("POST", "removeCartProcess.php", true);
        r.send(f);

    }

}


function cartQty(x) {
    var qty = document.getElementById("cartQty");

    var f = new FormData();
    f.append("x", x);
    f.append("qty", qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "Updated") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "updateCrtQtyProcess.php", true);
    r.send(f);
}

function checkout() {
    var f = new FormData();
    f.append("cart", true);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            var payment = JSON.parse(t);
            doCheckout(payment, "checkoutProces.php");
        }
    }

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
}


function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                
                var order = JSON.parse(response);
                
                if (order.resp == "Success") {
                    window.location = "invoice.php?orderId="+ order.order_id;
                } else {
                    alert(response);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(prodId) {

    var qty = document.getElementById("Qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("cart", false);
        f.append("prodId", prodId);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.status == 200 && r.readyState == 4) {
                var t = r.responseText;
                var payment = JSON.parse(t);
                payment.stock_id = prodId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        r.open("POST", "paymentProcess.php", true);
        r.send(f);

    } else {
        alert("Please Enter Quantity value");
    }

}


function removeWatchlist(x) {
    if (confirm("Are you sure?")) {
        var f = new FormData();
        f.append("x", x);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.status == 200 && r.readyState == 4) {
                var t = r.responseText;
                alert(t);
                window.location.reload();
            }
        }

        r.open("POST", "removeWartchlistProcess.php", true);
        r.send(f);
    }
}



