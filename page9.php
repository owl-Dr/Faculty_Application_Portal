<?php
include "loginchk.php";
include '_dbconnect.php';
?>
<html>

<head>
  <title>Final Submission</title>
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
  <h3
    style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;"
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
      padding: 0 !important;
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
                <h4>Welcome : <font color="#025198"><strong><?php echo $loggedInUserName ?></strong></font>
                </h4>
              </div>
              <div class="col-md-2">
                <a href="logout.php" class="btn btn-sm btn-success  pull-right">Logout</a>
              </div>
            </div>


          </legend>
        </fieldset>

        <!-- publication file upload           -->

        <form class="form-horizontal" action="page10.php" method="post" enctype="multipart/form-data">


          <!-- Payment file upload           -->


          <input type="hidden" name="ci_csrf_token" value="" />
          <div class="row">

            <div class="col-md-12">
              <div class="panel panel-success ">
                <div class="panel-heading">23. Final Declaration *</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">

                      <textarea style="height:60px" placeholder="" class="form-control input-md" name="my_state"
                        readonly="">
                I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief.
              </textarea>

                      <input type="checkbox" name="decl_status" value="1" required="" />

                    </div>
                    <br />
                    <br />
                    <br />
                    <div class="col-md-4">

                    </div>

                  </div>
                </div>
              </div>
            </div>


          </div>

          <h5 style="font-weight: bold; color:red;">Note: The form can be edited till the cutoff date of the rolling
            advertisment.</h5>
          <hr>
          <div class="form-group">
            <div class="col-md-12">
              <a href="page8.php" class="btn btn-primary pull-left"><i
                  class="glyphicon glyphicon-fast-backward"></i></a>
              <button type="submit" name="preview" value="preview" class="btn btn-info pull-right">SAVE &
                SUBMIT</button>
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
</body>

</html>

<script type="text/javascript">

  function blinker() {
    $('.blink_me').fadeOut(500);
    $('.blink_me').fadeIn(500);
  }

  setInterval(blinker, 1000);
</script>