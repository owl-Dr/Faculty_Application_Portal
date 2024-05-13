<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1
$currentDirectory = __DIR__;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update your personal details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-color: #bbdefb;
            padding-top: 0px !important;
        }

        .floating-box {
            display: inline-block;
            width: 150px;
            height: 75px;
            margin: 10px;
            border: 3px solid #73AD21;
        }

        .form-control {
            margin-bottom: 20px;
        }

        label {
            padding: 0 !important;
            text-align: left !important;
            font-family: 'Noto Serif', serif;
        }

        span {
            font-size: 1.2em;
            font-family: 'Oswald', sans-serif !important;
            text-align: left !important;
            padding: 0px 10px 0px 0px !important;
            font-weight: bold;
            color: #414002;
        }

        hr {
            border-top: 1px solid #025198 !important;
            border-style: dashed !important;
            border-width: 1.2px;
        }

        .panel-heading {
            font-size: 1.3em;
            font-family: 'Oswald', sans-serif !important;
            letter-spacing: .5px;
            background-color:
        }

        .btn-primary {
            padding: 9px;
        }

        .thumbnail {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="background-color: #2874f0; margin-bottom: 10px; padding:10px">
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

    <div class="container" style="border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well">
                <form class="form-horizontal" action="page1insert.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>
                            <div class="row">
                                <div class="col-md-11">
                                    <h4>Welcome : <font color="#025198">
                                            <strong><?php echo isset($loggedInUserName) ? $loggedInUserName : ''; ?></strong>
                                        </font>
                                    </h4>
                                </div>
                                <div class="col-md-1">
                                    <a href="logout.php" class="btn btn-sm btn-success pull-right">Logout</a>
                                </div>
                            </div>
                        </legend>
                        <hr>
                        <!-- Personal Details Section -->
                        <div class="panel panel-success">
                            <div class="panel-heading">1. Personal Details <small class="pull-right">Upload/Update
                                    Photo*</small></div>
                            <div class="panel-body">
                                <div class="col-md-10">
                                    <div class="row">
                                        <!-- First Name -->
                                        <span class="col-md-2 control-label" for="fname">First Name*</span>
                                        <div class="col-md-4">
                                            <input id="fname" name="fname" type="text" placeholder="First name"
                                                class="form-control input-md" maxlength="15" required
                                                value="<?php echo isset($_SESSION['PersonalDetails']['First_Name']) ? $_SESSION['PersonalDetails']['First_Name'] : ''; ?>">
                                        </div>
                                        <!-- Middle Name -->
                                        <span class="col-md-2 control-label" for="mname">Middle Name</span>
                                        <div class="col-md-4">
                                            <input id="mname" name="mname" type="text" placeholder="Middle name"
                                                class="form-control input-md" maxlength="12"
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Middle_Name']) ? $_SESSION['PersonalDetails']['Middle_Name'] : ''; ?>">
                                        </div>
                                        <!-- Last Name -->
                                        <span class="col-md-2 control-label" for="lname">Last Name*</span>
                                        <div class="col-md-4">
                                            <input id="lname" name="lname" type="text" placeholder="Last name"
                                                class="form-control input-md" maxlength="15" required
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Last_Name']) ? $_SESSION['PersonalDetails']['Last_Name'] : ''; ?>">
                                        </div>
                                        <!-- Nationality -->
                                        <span class="col-md-2 control-label" for="nationality">Nationality *</span>
                                        <div class="col-md-4">
                                            <select id="nationality" name="nationality" class="form-control input-md"
                                                required>
                                                <option value="">Select</option>
                                                <option value="Indian" <?php echo (isset($_SESSION['PersonalDetails']['Nationality']) && $_SESSION['PersonalDetails']['Nationality'] == 'Indian') ? 'selected' : ''; ?>>Indian</option>
                                                <option value="OCI" <?php echo (isset($_SESSION['PersonalDetails']['Nationality']) && $_SESSION['PersonalDetails']['Nationality'] == 'OCI') ? 'selected' : ''; ?>>OCI</option>
                                            </select>
                                        </div>
                                        <!-- Date of Birth -->
                                        <span class="col-md-2 control-label" for="dob">Date of Birth *</span>
                                        <div class="col-md-4">
                                            <input id="dob" name="dob" type="date" class="form-control input-md"
                                                required
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Date_of_Birth']) ? $_SESSION['PersonalDetails']['Date_of_Birth'] : ''; ?>">
                                        </div>
                                        <!-- Gender -->
                                        <span class="col-md-2 control-label" for="gender">Sex*</span>
                                        <div class="col-md-4">
                                            <select id="gender" name="gender" class="form-control input-md" required>
                                                <option value="">Select</option>
                                                <option value="Male" <?php echo (isset($_SESSION['PersonalDetails']['Gender']) && $_SESSION['PersonalDetails']['Gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="Female" <?php echo (isset($_SESSION['PersonalDetails']['Gender']) && $_SESSION['PersonalDetails']['Gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                                <option value="Other" <?php echo (isset($_SESSION['PersonalDetails']['Gender']) && $_SESSION['PersonalDetails']['Gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <!-- Marital Status -->
                                        <span class="col-md-2 control-label" for="mstatus">Marital Status *</span>
                                        <div class="col-md-4">
                                            <select id="mstatus" name="mstatus" class="form-control input-md" required>
                                                <option value="">Select</option>
                                                <option value="Married" <?php echo (isset($_SESSION['PersonalDetails']['Marital_Status']) && $_SESSION['PersonalDetails']['Marital_Status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                <option value="Unmarried" <?php echo (isset($_SESSION['PersonalDetails']['Marital_Status']) && $_SESSION['PersonalDetails']['Marital_Status'] == 'Unmarried') ? 'selected' : ''; ?>>Unmarried</option>
                                                <option value="Other" <?php echo (isset($_SESSION['PersonalDetails']['Marital_Status']) && $_SESSION['PersonalDetails']['Marital_Status'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <!-- Category -->
                                        <span class="col-md-2 control-label" for="cast">Category</span>
                                        <div class="col-md-4">
                                            <input id="cast" name="cast" type="text" placeholder="cast" readonly
                                                value="<?php echo isset($_SESSION['users']['cast']) ? $_SESSION['users']['cast'] : ''; ?>"
                                                class="form-control input-md" required>
                                        </div>
                                        <!-- ID Proof -->
                                        <span class="col-md-2 control-label" for="id_proof">ID Proof*</span>
                                        <div class="col-md-4">
                                            <select id="id_proof" name="id_proof" class="form-control input-md"
                                                required>
                                                <option value="">Select</option>
                                                <option value="AADHAR" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'AADHAR') ? 'selected' : ''; ?>>AADHAR</option>
                                                <option value="PAN-CARD" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'PAN-CARD') ? 'selected' : ''; ?>>PAN-CARD</option>
                                                <option value="DRIVING-LICENSE" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'DRIVING-LICENSE') ? 'selected' : ''; ?>>DRIVING-LICENSE</option>
                                                <option value="VOTER ID" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'VOTER ID') ? 'selected' : ''; ?>>VOTER ID</option>
                                                <option value="PASSPORT" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'PASSPORT') ? 'selected' : ''; ?>>PASSPORT</option>
                                                <option value="RATION CARD" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'RATION CARD') ? 'selected' : ''; ?>>RATION CARD</option>
                                                <option value="OTHERS" <?php echo (isset($_SESSION['PersonalDetails']['ID_Proof']) && $_SESSION['PersonalDetails']['ID_Proof'] == 'OTHERS') ? 'selected' : ''; ?>>OTHERS</option>
                                            </select>
                                        </div>
                                        <!-- Father's Name -->
                                        <span class="col-md-2 control-label" for="father_name">Father's Name *</span>
                                        <div class="col-md-4">
                                            <input id="father_name" name="father_name" type="text"
                                                placeholder="Father's Name" class="form-control input-md" maxlength="30"
                                                required
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Father_Name']) ? $_SESSION['PersonalDetails']['Father_Name'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <img src="<?php echo isset($_SESSION['Photo']['photo']) ? $_SESSION['Photo']['photo'] : '' ?>"
                                        class="thumbnail pull-right" height="150" width="130" />
                                    <input id="photo" name="photo" type="file" class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <!-- Address Section -->
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <div class="row">
                                    <!-- Correspondence Address -->
                                    <div class="col-md-6">
                                        <!-- Correspondence Address -->
                                        <?php
                                        // Retrieve and split Correspondence Address
                                        $correspondence_address = isset($_SESSION['PersonalDetails']['Correspondence_Address']) ? $_SESSION['PersonalDetails']['Correspondence_Address'] : '';
                                        $caddress_parts = explode(';', $correspondence_address);
                                        ?>
                                        <span class="col-md-6 control-label" for="cadd">Correspondence Address *</span>
                                        <br>
                                        <br>

                                        <textarea style="height:40px" placeholder="Street" class="form-control input-md"
                                            name="cadd" maxlength="200"
                                            required><?php echo isset($caddress_parts[0]) ? $caddress_parts[0] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="City" class="form-control input-md"
                                            name="cadd1" maxlength="200"
                                            required><?php echo isset($caddress_parts[1]) ? $caddress_parts[1] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="State" class="form-control input-md"
                                            name="cadd2" maxlength="200"
                                            required><?php echo isset($caddress_parts[2]) ? $caddress_parts[2] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="Country"
                                            class="form-control input-md" name="cadd3" maxlength="200"
                                            required><?php echo isset($caddress_parts[3]) ? $caddress_parts[3] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="PIN/ZIP"
                                            class="form-control input-md" name="cadd4" maxlength="200"
                                            required><?php echo isset($caddress_parts[4]) ? $caddress_parts[4] : ''; ?></textarea>

                                    </div>
                                    <!-- Permanent Address -->
                                    <div class="col-md-6">
                                        <!-- Correspondence Address -->
                                        <?php
                                        // Retrieve and split Correspondence Address
                                        $permanent_address = isset($_SESSION['PersonalDetails']['Permanent_Address']) ? $_SESSION['PersonalDetails']['Permanent_Address'] : '';
                                        $paddress_parts = explode(';', $permanent_address);
                                        ?>
                                        <span class="col-md-6 control-label" for="padd">Permanent Address *</span>
                                        <br>
                                        <br>
                                        <textarea style="height:40px" placeholder="Street" class="form-control input-md"
                                            name="padd" maxlength="200"
                                            required><?php echo isset($paddress_parts[0]) ? $paddress_parts[0] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="City" class="form-control input-md"
                                            name="padd1" maxlength="200"
                                            required><?php echo isset($paddress_parts[1]) ? $paddress_parts[1] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="State" class="form-control input-md"
                                            name="padd2" maxlength="200"
                                            required><?php echo isset($paddress_parts[2]) ? $paddress_parts[2] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="Country"
                                            class="form-control input-md" name="padd3" maxlength="200"
                                            required><?php echo isset($paddress_parts[3]) ? $paddress_parts[3] : ''; ?></textarea>
                                        <textarea style="height:40px" placeholder="PIN/ZIP"
                                            class="form-control input-md" name="padd4" maxlength="200"
                                            required><?php echo isset($paddress_parts[4]) ? $paddress_parts[4] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Details Section -->
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">


                                        <!-- Mobile -->
                                        <span class="col-md-2 control-label" for="mobile">Mobile *</span>
                                        <div class="col-md-4">
                                            <input id="mobile" name="mobile" type="text" placeholder="Mobile"
                                                class="form-control input-md" required maxlength="20"
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Mobile']) ? $_SESSION['PersonalDetails']['Mobile'] : ''; ?>">
                                        </div>
                                        <!-- Email -->
                                        <span class="col-md-2 control-label" for="email">Email</span>
                                        <div class="col-md-4">
                                            <input id="email" name="email" type="email" placeholder="Email"
                                                class="form-control input-md"
                                                value="<?php echo isset($loggedInEmail) ? $loggedInEmail : ''; ?>"
                                                readonly>
                                        </div>
                                        <!-- Alternate Mobile -->
                                        <span class="col-md-2 control-label" for="mobile_2">Alternate Mobile</span>
                                        <div class="col-md-4">
                                            <input id="mobile_2" name="mobile_2" type="text"
                                                placeholder="Alternate Mobile" class="form-control input-md"
                                                maxlength="20"
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Alternate_Mobile']) ? $_SESSION['PersonalDetails']['Alternate_Mobile'] : ''; ?>">
                                        </div>
                                        <!-- Alternate Email -->
                                        <span class="col-md-2 control-label" for="email_2">Alternate Email</span>
                                        <div class="col-md-4">
                                            <input id="email_2" name="email_2" type="email"
                                                placeholder="Alternate Email" class="form-control input-md"
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Alternate_Email']) ? $_SESSION['PersonalDetails']['Alternate_Email'] : ''; ?>">
                                        </div>
                                        <!-- Landline Number -->
                                        <span class="col-md-2 control-label" for="landline">Landline Number</span>
                                        <div class="col-md-4">
                                            <input id="landline" name="landline" type="text"
                                                placeholder="Landline Number" class="form-control input-md"
                                                maxlength="20"
                                                value="<?php echo isset($_SESSION['PersonalDetails']['Landline_Number']) ? $_SESSION['PersonalDetails']['Landline_Number'] : ''; ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <button id="submit" type="submit" name="submit" value="Submit"
                                    class="btn btn-success pull-right">SAVE & NEXT</button>
                            </div>
                        </div>
            </div>
            </fieldset>
            </form>
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