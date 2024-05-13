<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch the hashed password, first name, and last name from the database
    $sql = "SELECT password, firstname, lastname FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        $name = $row['firstname'] . ' ' . $row['lastname']; // Concatenate first name and last name
        // Verify the entered password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $name;
            header("location: page1.php");
        } else {
            $showError = "Invalid Credentials or Unregistered";
        }
    } else {
        $showError = "Invalid Credentials or Unregistered";
    }
}
?>


<html>

<head>
    <title>Faculty Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style type="text/css">
    body {
        background-color: aliceblue;
        padding-top: 0px !important;
    }
</style>

<body>
    <div class="container-fluid" style="background-color: #2874f0; margin-bottom: 10px;">
        <div class="container">
            <div class="row" style="margin-bottom:10px; ">
                <div class="col-md-8 col-md-offset-2">


                    <h3
                        style="text-align:center;color:aliceblue!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">
                        भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                    <h3
                        style="text-align:center;color:aliceblue!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">
                        Indian Institute of Technology Patna</h3>


                </div>

            </div>

        </div>
    </div>
    <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;"
        class="blink_me">Application for Faculty Position</h3>




    <div class="container" style="border-radius:10px; height:300px; margin-top:20px;">
        <div class="col-md-10 col-md-offset-1">

            <div class="row"
                style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; background-color:#F7FFFF;">


                <div class="col-md-6" style=" height:403px; border-radius: 10px 0px 0px 10px;"><img src="iitplogo.png"
                        style="margin-top: 5%; margin-left: 20%; height: 75%">

                    <p style="text-align: center;">
                    </p>
                </div>

                <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
                    <br />
                    <div class="col-md-10 col-md-offset-1">
                        <h3 style="text-align: center; color: black; font-weight: 800;"><strong><u>LOGIN
                                    HERE</u></strong></h3><br />
                        <!-- login page : email,password-->
                        <form role="form" method="post">
                            <input type="hidden" name="ci_csrf_token" value="" />

                            <div class="inner-addon left-addon">
                                <i class="glyphicon bx bxs-envelope"></i>
                                <input type="text" name="email" id="email" placeholder="Your email" autofocus=""
                                    required />
                            </div>
                            <br />

                            <div class="inner-addon left-addon">
                                <i class="glyphicon bx bxs-lock-alt"></i>
                                <input type="password" placeholder="Enter your password" name="password" id="password"
                                    required>
                            </div>
                            <br />

                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" name="submit" value="Submit">Login</button>

                                </div>
                                <div class="col-md-9">
                                    <a href="forgot.php"><button type="button" class="cancelbtn pull-right">Reset
                                            Password</button></a>
                                </div>
                            </div>

                        </form>

                        <!-- error -->
                        <?php
                        if (!$login) {
                            echo $showError;
                        } ?>
                        <!--  -->
                        <br />
                        <p style="text-align: center; color: green; font-size: 1.3em;"><strong>NOT REGISTERED? </strong>
                            <a href='signup.php' class="btn-sm btn-primary"> SIGN UP</a>

                        </p>

                    </div>


                </div>
            </div>
        </div>

    </div>

    <div id="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
</body>

</html>

<script type="text/javascript">

    function blinker() {
        $('.blink_me').fadeOut(500);
        $('.blink_me').fadeIn(500);
    }

    setInterval(blinker, 1000);
</script>