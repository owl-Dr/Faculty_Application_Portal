<?php
include "loginchk.php";
include '_dbconnect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Referees & Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style type="text/css">
    body {
        background-color: #bbdefb;
        padding-top: 0px !important;
    }
</style>

<body>
    <div class="container-fluid" style="background-color: #2874f0;; margin-bottom: 10px;">
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
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .floating-box {
            display: inline-block;
            width: 150px;
            height: 75px;
            margin: 10px;
            border: 3px solid #73AD21;
        }
    </style>
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        label {
            /*padding: 10 !important;*/
            text-align: left !important;
            margin-top: -5px;
            font-family: 'Noto Serif', serif;
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
        }

        .panel-info .panel-heading {
            font-size: 1.1em;
            font-family: 'Oswald', sans-serif !important;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .panel-danger .panel-heading {
            font-size: 1.1em;
            font-family: 'Oswald', sans-serif !important;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .btn-primary {
            padding: 9px;
        }

        .Acae_data {
            font-size: 1.1em;
            font-weight: bold;
            color: #414002;
        }

        .upload_crerti {
            font-size: 1.1em;
            font-weight: bold;
            color: red;
            text-align: center;
        }

        .update_crerti {
            font-size: 1.1em;
            font-weight: bold;
            color: green;
            text-align: center;
        }

        p {
            padding-top: 10px;
        }
    </style>

    <div class="container" style="border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well">
                <fieldset>
                    <legend>
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Welcome : <font color="#025198"><strong><?php echo $loggedInUserName ?></strong>
                                    </font>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <a href="logout.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                            </div>
                        </div>
                    </legend>
                </fieldset>

                <form class="form-horizontal" action="page8insert.php" method="post" enctype="multipart/form-data">
                    <h4 style="text-align:center; font-weight: bold; color: #6739bb;">20. Reprints of 5 Best Research
                        Papers *</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">Upload 5 Best Research Papers in a single PDF < 6MB <a
                                        href="<?php echo isset($_SESSION['documents']['document_1_path']) ? $_SESSION['documents']['document_1_path'] : ''; ?>"
                                        class="btn-sm btn-info" target="_blank">View Uploaded File</a>
                                        <br />
                                        <br />
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-5">
                                        <p class="update_crerti">Update 5 best papers</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input id="full_5_paper" name="document_1" type="file"
                                            class="form-control input-md">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 style="text-align:center; font-weight: bold; color: #6739bb;">21. Check List of the documents
                        attached with the online application *</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">Check List of the documents attached with the online
                                    application (Documents should be uploaded in PDF format only):
                                    <br />
                                    <small style="color: red;">Uploaded PDF files will not be displayed as part of the
                                        printed form.</small>
                                    <small style="color: red;">(In case want to update, re-upload every single
                                        document)</small>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <input type="hidden" name="ci_csrf_token" value="" />
                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">PHD Certificate <a
                                                        href="<?php echo isset($_SESSION['documents']['document_2_path']) ? $_SESSION['documents']['document_2_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update PHD Certificate</p>
                                                    <input id="phd" name="document_2" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">PG Documents <a
                                                        href="<?php echo isset($_SESSION['documents']['document_3_path']) ? $_SESSION['documents']['document_3_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update All semester/year-Marksheets and
                                                        degree certificate</p>
                                                    <input id="post_gr" name="document_3" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">UG Documents <a
                                                        href="<?php echo isset($_SESSION['documents']['document_4_path']) ? $_SESSION['documents']['document_4_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update All semester/year-Marksheets and
                                                        degree certificate </p>
                                                    <input id="under_gr" name="document_4" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">12th/HSC/Diploma Documents <a
                                                        href="<?php echo isset($_SESSION['documents']['document_5_path']) ? $_SESSION['documents']['document_5_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update 12th/HSC/Diploma/Marksheet(s) and
                                                        passing certificate</p>
                                                    <input id="higher_sec" name="document_5" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">10th/SSC Documents <a
                                                        href="<?php echo isset($_SESSION['documents']['document_6_path']) ? $_SESSION['documents']['document_6_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update 12th/HSC/Diploma/Marksheet(s) and
                                                        passing certificate</p>
                                                    <input id="high_school" name="document_6" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Pay Slip <a
                                                        href="<?php echo isset($_SESSION['documents']['document_7_path']) ? $_SESSION['documents']['document_7_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update Pay Slip</p>
                                                    <input id="pay_slip" name="document_7" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">NOC or Undertaking <a
                                                        href="<?php echo isset($_SESSION['documents']['document_8_path']) ? $_SESSION['documents']['document_8_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Undertaking-in case, NOC is not available
                                                        at the time of application but will be provided at the time of
                                                        interview</p>
                                                    <input id="noc_under" name="document_8" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Post phd Experience Certificate/All
                                                    Experience Certificates/ Last Pay slip/
                                                    <a href="<?php echo isset($_SESSION['documents']['document_9_path']) ? $_SESSION['documents']['document_9_path'] : ''; ?>"
                                                        class="btn-sm btn-info " target="_blank">View Uploaded File </a>
                                                    <br />
                                                </div>
                                                <div class="panel-body">
                                                    <p class="update_crerti">Update Certificate</p>
                                                    <input id="post_phd_10" name="document_9" type="file"
                                                        class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Upload any other relevant document in a
                                                    single PDF (For example award certificate, experience certificate
                                                    etc) . If there are multiple documents, combine all the documents in
                                                    a single PDF) <1MB. </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-5">
                                                                <p class="upload_crerti">Upload any other document</p>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input id="misc_certi" name="document_10" type="file"
                                                                    class="form-control input-md">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Upload your Signature in JPG only </div>
                                    <div class="panel-body">
                                        <img src="<?php echo isset($_SESSION['documents']['document_11_path']) ? $_SESSION['documents']['document_11_path'] : ''; ?>"
                                            style="height: 100px; width: 300px; margin-top: -10px;">
                                        <input id="signature" name="document_11" type="file"
                                            class="form-control input-md">
                                    </div>
                                    <p class="upload_crerti"></p>
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10">
                                <a href="page7.php" class="btn btn-primary pull-left"><i
                                        class="glyphicon glyphicon-fast-backward"></i></a>
                            </div>
                            <div class="col-md-2">
                                <button id="submit" type="submit" name="submit" value="Submit"
                                    class="btn btn-success pull-right">SAVE & NEXT</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div id="footer"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="jquery.js"></script>
    </div>
</body>

</html>

<script type="text/javascript">

    function blinker() {
        $('.blink_me').fadeOut(500);
        $('.blink_me').fadeIn(500);
    }

    setInterval(blinker, 1000);
</script>