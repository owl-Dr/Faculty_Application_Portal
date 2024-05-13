<!-- database connection -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $showAlert = false;
    $exists = false;

    include ("_dbconnect.php");
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $cast = $_POST["cast"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // exist query
    // Check if email already exists
    $emailCheckQuery = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);
    $emailCount = mysqli_fetch_assoc($emailCheckResult)['count'];

    if ($emailCount > 0) {
        $exists = true;
    }

    // redirect page to login

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    if (($password == $cpassword) && $exists == false) {
        $sql = "INSERT INTO users (firstname, lastname, email, cast, password)
        VALUES ('$firstname', '$lastname', '$email', '$cast', '$hashed_password')
        ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('New User Created')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
            $showAlert = true;
        }
    } else {
        echo "<script>alert('Email already exists')</script>";
    }
}
?>

<html>

<head>
    <title>Faculty Register | IIT Patna</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
    <!-- <script type="text/javascript" src="jquery.js"></script> -->


</head>
<style type="text/css">
    body {
        background-color: lightgray;
        padding-top: 0px !important;
    }

    canvas {
        /*prevent interaction with the canvas*/
        pointer-events: none;
    }
</style>

<body onload="createCaptcha()">
    <div class="container-fluid" style="background-color: #f7ffff; margin-bottom: 10px;">
        <div class="container">
            <div class="row" style="margin-bottom:10px; ">
                <div class="col-md-8 col-md-offset-2">


                    <h3
                        style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">
                        भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                    <h3
                        style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">
                        Indian Institute of Technology Patna</h3>


                </div>



            </div>
        </div>
    </div>
    <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;"
        class="blink_me">Application for Faculty Position</h3>

    <style type="text/css">
        .form-control {
            margin-bottom: 10px;
        }

        .back-imgs {
            /*background-position: center; */
            background-size: cover;
            /* Resize the background image to cover the entire container */
        }

        h3 {
            font-weight: bold;
            /*color:green;*/
            font-family: 'Sintony', sans-serif;
            text-align: center;
            color: green;
            /*text-align: center;*/
        }
    </style>

    <div class="container" style=" border-radius:10px; margin-top:20px;">
        <div class="row"
            style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; height:auto; background-color:#F7FFFF;">

            <div class="col-md-6 col-sm-6 col-xs-6">

                <div
                    style="background-image: url(iitplogo.png); height: 400px; background-size: cover; width: 400px; margin: 30px; padding: auto;">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <h3>CREATE YOUR PROFILE</h3><br />
                <!-- form -->
                <form id="myForm" action="#" method="post" class="form" role="form"
                    onsubmit="return validatePasswordMatch() && validateCaptcha()">

                    <input type="hidden" name="ci_csrf_token" value="" />
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" value='' name="firstname" placeholder="First name" type="text"
                                required="" autofocus />
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="lastname" value='' required="" placeholder="Last name"
                                type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="email" placeholder="Your email" value='' required=""
                                type="email" />
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <select id="cast" name="cast" class="form-control input-md" required="">
                                <option value="">Select Category</option>
                                <option value="UR">UR</option>
                                <option value="OBC">OBC</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                                <option value="PWD">PWD</option>
                                <option value="EWS">EWS</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <input class="form-control" name="password" placeholder="Password" required=""
                                type="password" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <input class="form-control" name="cpassword" placeholder="Retype - password" required=""
                                type="password" />
                        </div>
                    </div>

                    <div class="row">

                        <input id="created_at" name="created_at" type="hidden">

                        <div class="col-xs-6 col-md-6" id="captcha">


                        </div>

                        <div class="col-xs-6 col-md-6">
                            <input id="captchaTextBox" class="form-control" name="captcha"
                                placeholder="Insert image text" required="" type="text" />
                        </div>


                        <div class="col-xs-12 col-md-12">
                            <h5><strong>
                                    <font color="red">Note:</font>
                                    <br />
                                    <br />
                                    <br />
                                    <font color="#124f93">
                                        1. Applicant should kindly check their email for activation link to access the
                                        portal.
                                        <br />
                                        2. Please check SPAM folder also, in case activation link is not received in
                                        INBOX.<br />
                                        3. Applicant applying for more than one position/ department should use <strong>
                                            <font color="red">different email id</font>
                                        </strong> for each application.
                                    </font>
                                </strong>
                                <br />
                                <br />
                                <br />
                            </h5>
                            <button class="btn btn-sm btn-primary" type="submit" name="submit"
                                value="Submit">Register</button>


                            <strong class=" pull-right" style="color: green;">If registered <a href='index.php'
                                    class="btn btn-sm btn-success"> Login Here</a></strong>
                        </div>
                    </div>
                </form>


                <!-- form ended -->

                <!-- alert password not match -->

                <!-- <?php
                // if($exists){
//     echo "email already exists , please change email.";
// } 
// else if($showError)  echo "Password doesnot match.";
                ?> -->

            </div>
        </div>

    </div>
    <br />
    <div class="container">
        <div class="col-md-8 col-md-offset-2"
            style="text-align: center!important; font-weight: bold; color: black!important;">

        </div>
    </div>

    <div class="modal fade" id="emailExistsModal" tabindex="-1" role="dialog" aria-labelledby="emailExistsModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="emailExistsModalLabel">Email Already Exists</h4>
                </div>
                <div class="modal-body">
                    The email address you entered is already associated with an account. Please use a different email
                    address or try logging in.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div id="footer"></div>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">

    function blinker() {
        $('.blink_me').fadeOut(500);
        $('.blink_me').fadeIn(500);
    }

    setInterval(blinker, 1000);

    var code;
    function createCaptcha() {
        //clear the contents of captcha div first 
        document.getElementById('captcha').innerHTML = "";
        var charsArray =
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var lengthOtp = 6;
        var captcha = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else i--;
        }
        var canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 40;
        var ctx = canv.getContext("2d");
        ctx.font = "25px Georgia";
        ctx.strokeText(captcha.join(""), 0, 30);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }

    function validateCaptcha() {
        if (document.getElementById("captchaTextBox").value == code) {
            // alert("Valid Captcha")
            return true;
        } else {
            alert("Invalid Captcha. try Again");
            createCaptcha();
            return false;
        }
    }

    function validatePasswordMatch() {
        const password = document.getElementsByName('password')[0].value;
        const confirmPassword = document.getElementsByName('cpassword')[0].value;

        if (password === confirmPassword) {
            return true; // Passwords match
        } else {
            alert("Confirm Password and Password do not match")
            return false; // Passwords don't match
        }
    }

</script>