<?php
include "loginchk.php";
include '_dbconnect.php';

?>

<html>

<head>
  <title>Rel Info</title>
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

  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

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

    .btn-primary {
      padding: 9px;
    }

    .Acae_data {
      font-size: 1.1em;
      font-weight: bold;
      color: #414002;
    }

    p {
      padding-top: 10px;
    }
  </style>


  <div class="container" style="height:auto border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">

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

          <form class="form-horizontal" action="page7insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ci_csrf_token" value="" />


            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">14. Significant research contribution and future plans *<small
                      class="pull-right">(not more than 500 words)</small> <br /><small>(Please provide a Research
                      Statement describing your research plans and one or two specific research projects to be conducted
                      at IIT Indore in 2-3 years time frame)</small></div>
                  <div class="panel-body">
                    <textarea style="height:150px" placeholder="Significant research contribution and future plans"
                      class="form-control input-md" name="research_contribution" maxlength="3500"
                      required=""></textarea>

                    <script>
                      // CKEDITOR.replace($_POST['conf_details']);
                      CKEDITOR.replace('research_contribution');

                      var editor = CKEDITOR.instances.research_contribution;

                      // Set the text
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['research_contribution']) ? $_SESSION['contributions']['research_contribution'] : ''); ?>);

                    </script>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">15. Significant teaching contribution and future plans * <small>(Please
                      list UG/PG courses that you would like to develop and/or teach at IIT Indore)</small> <small
                      class="pull-right"> (not more than 500 words)</small></div>
                  <div class="panel-body">
                    <textarea style="height:150px" placeholder="Significant teaching contribution and future plans"
                      class="form-control input-md" name="teaching_contribution" maxlength="3500"
                      value="<?php echo isset($_SESSION['contributions']['teaching_contribution']) ? $_SESSION['contributions']['teaching_contribution'] : ''; ?>"
                      required=""></textarea>

                    <script>
                      // CKEDITOR.replace($_POST['conf_details']);
                      CKEDITOR.replace('teaching_contribution');

                      var editor = CKEDITOR.instances.teaching_contribution;
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['teaching_contribution']) ? $_SESSION['contributions']['teaching_contribution'] : ''); ?>);
                    </script>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">16. Any other relevant information. <small class="pull-right">(not more
                      than 500 words)</small></div>
                  <div class="panel-body">
                    <textarea style="height:150px" placeholder="Any other relevant information you may like to furnish"
                      class="form-control input-md" name="other_contribution" maxlength="3500"
                      value="<?php echo isset($_SESSION['contributions']['other_contribution']) ? $_SESSION['contributions']['other_contribution'] : ''; ?>"></textarea>

                    <script>
                      // CKEDITOR.replace($_POST['conf_details']);
                      CKEDITOR.replace('other_contribution');

                      var editor = CKEDITOR.instances.other_contribution;
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['other_contribution']) ? $_SESSION['contributions']['other_contribution'] : ''); ?>);



                    </script>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">17. Professional Service : Editorship/Reviewership <small
                      class="pull-right">(not more than 500 words)</small></div>
                  <div class="panel-body">
                    <textarea style="height:150px" placeholder="Professional Service as Reviewer/Editor etc"
                      class="form-control input-md" name="editorship" maxlength="3500"
                      value="<?php echo isset($_SESSION['contributions']['editorship']) ? $_SESSION['contributions']['editorship'] : ''; ?>"></textarea>

                    <script>
                      // CKEDITOR.replace($_POST['conf_details']);
                      CKEDITOR.replace('editorship');

                      var editor = CKEDITOR.instances.editorship;
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['editorship']) ? $_SESSION['contributions']['editorship'] : ''); ?>);



                    </script>

                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">18. Detailed List of Journal Publications <br />(Including Sr. No.,
                    Author's Names, Paper Title, Volume, Issue, Year, Page Nos., Impact Factor (if any), DOI,
                    Status[Published/Accepted] )</div>
                  <div class="panel-body">


                    <textarea style="height:15px!important" placeholder="Detailed List of Journal Publications"
                      id="jour_details" class="form-control input-md" name="list_journal"
                      value="<?php echo isset($_SESSION['contributions']['list_journal']) ? $_SESSION['contributions']['list_journal'] : ''; ?>"></textarea>

                    <script>
                      // CKEDITOR.replace($_POST['conf_details']);
                      CKEDITOR.replace('jour_details');

                      var editor = CKEDITOR.instances.jour_details;
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['list_journal']) ? $_SESSION['contributions']['list_journal'] : ''); ?>);



                    </script>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <div class="panel panel-success ">
                  <div class="panel-heading">19. Detailed List of Conference Publications<br />(Including Sr. No.,
                    Author's Names, Paper Title, Name of the conference, Year, Page Nos., DOI [If any] )</div>
                  <div class="panel-body">
                    <textarea style="height:150px" placeholder="Detailed List of Conference Publications"
                      id="conf_details" class="form-control input-md" name="list_conference"
                      value="<?php echo isset($_SESSION['contributions']['list_conference']) ? $_SESSION['contributions']['list_conference'] : ''; ?>"></textarea>

                    <script>
                      CKEDITOR.replace('conf_details');

                      var editor = CKEDITOR.instances.conf_details;
                      editor.setData(<?php echo json_encode(isset($_SESSION['contributions']['list_conference']) ? $_SESSION['contributions']['list_conference'] : ''); ?>);


                    </script>

                  </div>
                </div>
              </div>



            </div>

            <div class="form-group">
              <div class="col-md-10">
                <a href="page6.php" class="btn btn-primary pull-left"><i
                    class="glyphicon glyphicon-fast-backward"></i></a>


              </div>

              <div class="col-md-2">

                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE &
                  NEXT</button>

              </div>


            </div>


      </div>





      </fieldset>
      </form>



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