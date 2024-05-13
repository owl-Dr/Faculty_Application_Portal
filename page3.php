<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1
?>

<html>

<head>
  <title>Employment Details</title>
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
    }

    span {
      font-size: 1.2em;
      font-family: 'Oswald', sans-serif !important;
      text-align: left !important;
      padding: 0px 10px 0px 0px !important;
      /*margin-bottom: 20px!important;*/

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
  </style>

  <div class="container" style="height:auto border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 well">
        <form class="form-horizontal" action="page3insert.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ci_csrf_token" value="" />
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

            <h4 style="text-align:center; font-weight: bold; color: #6739bb;">3. Employment Details</h4>


            <!-- Form Name -->

            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-success">
                  <div class="panel-heading">(A) Present Employment</div>
                  <div class="panel-body">
                    <span class="col-md-2 control-label" for="pres_emp_position">Position</span>
                    <div class="col-md-4">
                      <input id="pres_emp_position" name="pres_emp_position" type="text" placeholder="Position"
                        class="form-control input-md" autofocus="" required=""
                        value="<?php echo isset($_SESSION['Employment_Details']['Position']) ? $_SESSION['Employment_Details']['Position'] : ''; ?>">
                    </div>

                    <span class="col-md-2 control-label" for="pres_emp_employer">Organization/Institution</span>
                    <div class="col-md-4">
                      <input id="pres_emp_employer" name="pres_emp_employer" type="text"
                        placeholder="Organization/Institution" class="form-control input-md" autofocus=""
                        value="<?php echo isset($_SESSION['Employment_Details']['Organization_Institution']) ? $_SESSION['Employment_Details']['Organization_Institution'] : ''; ?>">
                    </div>

                    <span class="col-md-2 control-label" for="pres_status">Status</span>
                    <div class="col-md-4">
                      <select id="pres_status" name="pres_status" class="form-control input-md" required="">
                        <option value="">Select</option>
                        <option <?php echo isset($_SESSION['Employment_Details']['Status']) && $_SESSION['Employment_Details']['Status'] === 'Central Govt.' ? 'selected' : ''; ?>
                          value="Central Govt.">Central Govt.</option>
                        <option <?php echo isset($_SESSION['Employment_Details']['Status']) && $_SESSION['Employment_Details']['Status'] === 'State Government' ? 'selected' : ''; ?>
                          value="State Government">State Government</option>
                        <option <?php echo isset($_SESSION['Employment_Details']['Status']) && $_SESSION['Employment_Details']['Status'] === 'Private' ? 'selected' : ''; ?> value="Private">
                          Private</option>
                        <option <?php echo isset($_SESSION['Employment_Details']['Status']) && $_SESSION['Employment_Details']['Status'] === 'Quasi Govt.' ? 'selected' : ''; ?>
                          value="Quasi Govt.">Quasi Govt.</option>
                        <option <?php echo isset($_SESSION['Employment_Details']['Status']) && $_SESSION['Employment_Details']['Status'] === 'Other' ? 'selected' : ''; ?> value="Other">Other
                        </option>
                      </select>
                    </div>

                    <span class="col-md-2 control-label" for="pres_emp_doj">Date of Joining</span>
                    <div class="col-md-4">
                      <input id="pres_emp_doj" name="pres_emp_doj" type="date" placeholder="Date of Joining"
                        class="form-control input-md" required=""
                        value="<?php echo isset($_SESSION['Employment_Details']['Date_of_Joining']) ? $_SESSION['Employment_Details']['Date_of_Joining'] : ''; ?>">
                    </div>

                    <span class="col-md-2 control-label" for="pres_emp_dol">Date of Leaving <br />(Mention Continue if
                      working)</span>
                    <div class="col-md-4">
                      <input id="pres_emp_dol" name="pres_emp_dol" type="date" placeholder="Date of Leaving"
                        class="form-control input-md" required=""
                        value="<?php echo isset($_SESSION['Employment_Details']['Date_of_Leaving']) ? $_SESSION['Employment_Details']['Date_of_Leaving'] : ''; ?>">
                    </div>

                    <span class="col-md-2 control-label" for="pres_emp_duration">Duration (in years & months)</span>
                    <div class="col-md-4">
                      <input id="pres_emp_duration" name="pres_emp_duration" type="text" placeholder="Duration"
                        class="form-control input-md" required=""
                        value="<?php echo isset($_SESSION['Employment_Details']['Duration']) ? $_SESSION['Employment_Details']['Duration'] : ''; ?>">
                    </div>
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">(B) Employment History (After PhD, Starting with Latest)
                      <button type="button" class="btn btn-sm btn-danger" id="add_more_exp"
                        onclick="addEmploymentDetails()">Add Details</button>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <tbody id="exp">
                          <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-2"> Position </th>
                            <th class="col-md-3"> Organization/Institution </th>
                            <th class="col-md-2"> Date of Joining</th>
                            <th class="col-md-2"> Date of Leaving </th>
                            <th class="col-md-2"> Duration (in years & months)</th>
                          </tr>
                          <?php
                          if (isset($_SESSION['Employment_History']) && !empty($_SESSION['Employment_History'])) {
                            foreach ($_SESSION['Employment_History'] as $key => $row) {
                              echo '<tr height="60px">';
                              echo '<td class="col-md-1">' . ($key + 1) . '</td>';
                              echo '<td class="col-md-2"><input name="position[]" type="text" placeholder="Position" class="form-control input-md" required="" value="' . htmlspecialchars($row['Position']) . '"></td>';
                              echo '<td class="col-md-3"><input name="employer[]" type="text" placeholder="Employer" class="form-control input-md" required="" value="' . htmlspecialchars($row['Organization_Institution']) . '"></td>';
                              echo '<td class="col-md-2"><input name="doj[]" type="date" class="form-control input-md" required="" value="' . htmlspecialchars($row['Date_of_Joining']) . '"></td>';
                              echo '<td class="col-md-2"><input name="dol[]" type="date" class="form-control input-md" required="" value="' . htmlspecialchars($row['Date_of_Leaving']) . '"></td>';
                              echo '<td class="col-md-2"><input name="exp_duration[]" type="text" placeholder="Duration" class="form-control input-md" required="" value="' . htmlspecialchars($row['Duration']) . '"></td>';
                              echo '</tr>';
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">(C) Teaching Experience (After PhD)
                      <button type="button" class="btn btn-sm btn-danger" onclick="addTeachingExperience()">Add
                        Details</button>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <tbody id="teaching_exp">
                          <tr height="30px">
                            <th class="col-md-1/2"> S. No.</th>
                            <th class="col-md-2"> Position </th>
                            <th class="col-md-2"> Employer </th>
                            <th class="col-md-3/2"> Course Taught </th>
                            <th class="col-md-1"> UG/PG </th>
                            <th class="col-md-1"> No. of Students </th>
                            <th class="col-md-1"> Date of Joining </th>
                            <th class="col-md-1"> Date of Leaving </th>
                            <th class="col-md-2"> Duration (in years & months) </th>
                          </tr>
                          <?php
                          if (isset($_SESSION['Teaching_Experience'])) {
                            foreach ($_SESSION['Teaching_Experience'] as $index => $teaching_exp) {
                              echo '<tr height="60px">';
                              echo '<td class="col-md-1">' . ($index + 1) . '</td>';
                              echo '<td class="col-md-2">';
                              echo '<input id="teaching_position' . ($index + 1) . '" name="teaching_position[]" type="text" placeholder="Position" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Position']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-2">';
                              echo '<input id="teaching_employer' . ($index + 1) . '" name="teaching_employer[]" type="text" placeholder="Employer" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Employer']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-2">';
                              echo '<input id="course_taught' . ($index + 1) . '" name="course_taught[]" type="text" placeholder="Course Taught" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Course_Taught']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-1">';
                              echo '<input id="ug_pg' . ($index + 1) . '" name="ug_pg[]" type="text" placeholder="UG/PG" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['UG_PG']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-1">';
                              echo '<input id="no_of_students' . ($index + 1) . '" name="no_of_students[]" type="number" placeholder="No. of Students" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['No_of_Students']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-1">';
                              echo '<input id="teaching_doj' . ($index + 1) . '" name="teaching_doj[]" type="date" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Date_of_Joining']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-1">';
                              echo '<input id="teaching_dol' . ($index + 1) . '" name="teaching_dol[]" type="date" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Date_of_Leaving']) . '" required="">';
                              echo '</td>';
                              echo '<td class="col-md-1">';
                              echo '<input id="teaching_duration' . ($index + 1) . '" name="teaching_duration[]" type="text" placeholder="Duration" class="form-control input-md" value="' . htmlspecialchars($teaching_exp['Duration']) . '" required="">';
                              echo '</td>';
                              echo '</tr>';
                            }
                          } else {
                            echo "what";
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- c) Research Experience: (including Postdoctoral) input-->

              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">(D) Research Experience (Post PhD, including Post Doctoral)
                      <button type="button" class="btn btn-sm btn-danger" onclick="addResearch()">Add Details</button>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <tbody id="research_exp">
                          <tr height="30px">
                            <th class="col-md-1/2"> S. No.</th>
                            <th class="col-md-3"> Position </th>
                            <th class="col-md-3/2"> Institute </th>
                            <th class="col-md-1"> Supervisor </th>
                            <th class="col-md-1"> Date of Joining</th>
                            <th class="col-md-1"> Date of Leaving </th>
                            <th class="col-md-2"> Duration (in years & months)</th>
                          </tr>
                          <?php
                          // Assuming $_SESSION['Research_Experience'] contains the data
                          if (isset($_SESSION['Research_Experience'])) {
                            $research_experience = $_SESSION['Research_Experience'];
                            foreach ($research_experience as $index => $experience) {
                              echo "<tr height='60px'>";
                              echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                              echo "<td class='col-md-2'><input name='research_position[]' type='text' placeholder='Position' class='form-control input-md' value='" . $experience['Position'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='research_institute[]' type='text' placeholder='Institute' class='form-control input-md' value='" . $experience['Institute'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='research_supervisor[]' type='text' placeholder='Supervisor' class='form-control input-md' value='" . $experience['Supervisor'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='research_doj[]' type='date' class='form-control input-md' value='" . $experience['Date_of_Joining'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='research_dol[]' type='date' class='form-control input-md' value='" . $experience['Date_of_Leaving'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='research_duration[]' type='text' placeholder='Duration' class='form-control input-md' value='" . $experience['Duration'] . "' required=''></td>";
                              echo "</tr>";
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              <!-- g)  Industrial Experience Interaction -->
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">(E) Industrial Experience
                      <button type="button" class="btn btn-sm btn-danger" onclick="addIndustrialExperience()">Add
                        Details</button>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <tbody id="industrial_exp">
                          <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-3"> Organization </th>
                            <th class="col-md-4"> Work Profile </th>
                            <th class="col-md-1"> Date of Joining</th>
                            <th class="col-md-1"> Date of Leaving </th>
                            <th class="col-md-2"> Duration (in years & months)</th>
                          </tr>

                          <?php
                          // Assuming $_SESSION['Industrial_Experience'] contains the data
                          if (isset($_SESSION['Industrial_Experience'])) {
                            $industrial_experience = $_SESSION['Industrial_Experience'];
                            foreach ($industrial_experience as $index => $experience) {
                              echo "<tr height='60px'>";
                              echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                              echo "<td class='col-md-2'><input name='industrial_organization[]' type='text' placeholder='Organization' class='form-control input-md' value='" . $experience['Organization'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='industrial_work_profile[]' type='text' placeholder='Work Profile' class='form-control input-md' value='" . $experience['Work_Profile'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='industrial_doj[]' type='date' placeholder='DD/MM/YYYY' class='form-control input-md' value='" . $experience['Date_of_Joining'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='industrial_dol[]' type='date' placeholder='DD/MM/YYYY' class='form-control input-md' value='" . $experience['Date_of_Leaving'] . "' required=''></td>";
                              echo "<td class='col-md-2'><input name='industrial_duration[]' type='text' placeholder='Duration' class='form-control input-md' value='" . $experience['Duration'] . "' required=''></td>";
                              echo "</tr>";
                            }
                          }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>



              <h4 style="text-align:center; font-weight: bold; color: #6739bb;">4. Area(s) of Specialization and Current
                Area(s) of Research</h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="panel panel-success">
                    <div class="panel-heading">Area(s) of Specialization *</div>
                    <div class="panel-body">
                      <strong>Areas of specialization</strong>
                      <textarea style="height:150px" placeholder="Areas of specialization" class="form-control input-md"
                        name="area_spl" maxlength="500"
                        required=""><?php echo isset($_SESSION['Areas']['specialization']) ? $_SESSION['Areas']['specialization'] : ''; ?></textarea>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="panel panel-success">
                    <div class="panel-heading">Current Area(s) of Research *</div>
                    <div class="panel-body">
                      <strong>Current Area of research</strong>
                      <textarea style="height:150px" placeholder="Areas of research" class="form-control input-md"
                        name="area_rese" maxlength="500"
                        required=""><?php echo isset($_SESSION['Areas']['research_area']) ? $_SESSION['Areas']['research_area'] : ''; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-group">

                <div class="col-md-1">
                  <a href="page2.php" class="btn btn-primary pull-left"><i
                      class="glyphicon glyphicon-fast-backward"></i></a>
                </div>

                <div class="col-md-11">
                  <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right"
                    style="margin-left: 75%;">SAVE & NEXT</button>

                </div>

              </div>

          </fieldset>
        </form>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function yearcalc() {
      // alert('hi');
      var num1 = document.getElementById("yoj").value;
      var num2 = document.getElementById("yog").value;

      var duration_year = parseFloat(num2) - parseFloat(num1);
      // alert(duration_year);
      document.getElementById("result_test").value = duration_year;

    }


  </script>

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

  function addEmploymentDetails() {
    // Get the table body element
    var tableBody = document.getElementById("exp");

    // Get the number of existing rows
    var rowCount = tableBody.getElementsByTagName("tr").length - 1;

    // Create a new row
    var newRow = document.createElement("tr");
    newRow.setAttribute("height", "60px");

    // Set the serial number
    var serialNumber = rowCount + 1;

    // Add cells to the row
    newRow.innerHTML = `
        <td class="col-md-1">${serialNumber}</td>
        <td class="col-md-2">
            <input name="position[]" type="text" placeholder="Position" class="form-control input-md" required="">
        </td>
        <td class="col-md-3">
            <input name="employer[]" type="text" placeholder="Employer" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="doj[]" type="date" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="dol[]" type="date" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="exp_duration[]" type="text" placeholder="Duration" class="form-control input-md" required="">
            <button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteRow(this)">X</button>
        </td>
    `;

    // Append the new row to the table body
    tableBody.appendChild(newRow);
  }

  function addTeachingExperience() {
    // Get the table body element
    var tableBody = document.getElementById("teaching_exp");

    // Get the number of existing rows
    var rowCount = tableBody.getElementsByTagName("tr").length - 1;

    // Create a new row
    var newRow = document.createElement("tr");
    newRow.setAttribute("height", "60px");

    // Set the serial number
    var serialNumber = rowCount + 1;

    // Add cells to the row
    newRow.innerHTML = `
        <td class="col-md-1/2">${serialNumber}</td>
        <td class="col-md-2">
            <input name="teaching_position[]" type="text" placeholder="Position" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="teaching_employer[]" type="text" placeholder="Employer" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="course_taught[]" type="text" placeholder="Course Taught" class="form-control input-md" required="">
        </td>
        <td class="col-md-1">
            <input name="ug_pg[]" type="text" placeholder="UG/PG" class="form-control input-md" required="">
        </td>
        <td class="col-md-1">
            <input name="no_of_students[]" type="text" placeholder="No. of Students" class="form-control input-md" required="">
        </td>
        <td class="col-md-1">
            <input name="teaching_doj[]" type="date" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
        </td>
        <td class="col-md-3/2">
            <input name="teaching_dol[]" type="date" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
        </td>
        <td class="col-md-2">
            <input name="teaching_duration[]" type="text" placeholder="Duration" class="form-control input-md" required="">
            <button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this)">X</button>
        </td>
    `;

    // Append the new row to the table body
    tableBody.appendChild(newRow);
  }

  // Function to add a new row
  function addResearch() {
    // Get the table body element
    var tableBody = document.getElementById("research_exp");

    // Create a new row
    var newRow = document.createElement("tr");
    newRow.setAttribute("height", "60px");

    // Get the number of existing rows
    var rowCount = tableBody.getElementsByTagName("tr").length - 1;

    // Set the serial number
    var serialNumber = rowCount + 1;


    // Add cells to the new row
    newRow.innerHTML = `
      <td class="col-md-1">${serialNumber}</td>
      <td class="col-md-2"><input type="text" name="research_position[]" class="form-control input-md" placeholder="Position" required></td>
      <td class="col-md-2"><input type="text" name="research_institute[]" class="form-control input-md" placeholder="Institute" required></td>
      <td class="col-md-2"><input type="text" name="research_supervisor[]" class="form-control input-md" placeholder="Supervisor" required></td>
      <td class="col-md-2"><input type="date" name="research_doj[]" class="form-control input-md" placeholder="Date of Joining" required></td>
      <td class="col-md-2"><input type="date" name="research_dol[]" class="form-control input-md" placeholder="Date of Leaving" required></td>
      <td class="col-md-2"><input type="text" name="research_duration[]" class="form-control input-md" placeholder="Duration" required>
      <button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this)">X</button>
      </td>
    `;

    // Append the new row to the table body
    tableBody.appendChild(newRow);
  }

  function addIndustrialExperience() {
    var tableBody = document.getElementById("industrial_exp");
    var rowCount = tableBody.rows.length;

    var newRow = tableBody.insertRow(rowCount);
    newRow.setAttribute("height", "60px");

    var cell0 = newRow.insertCell(0);
    var cell1 = newRow.insertCell(1);
    var cell2 = newRow.insertCell(2);
    var cell3 = newRow.insertCell(3);
    var cell4 = newRow.insertCell(4);
    var cell5 = newRow.insertCell(5);

    cell0.innerHTML = rowCount;
    cell1.innerHTML = '<input type="text" name="industrial_organization[]" class="form-control input-md" placeholder="Organization" required>';
    cell2.innerHTML = '<input type="text" name="industrial_work_profile[]" class="form-control input-md" placeholder="Work Profile" required>';
    cell3.innerHTML = '<input type="date" name="industrial_doj[]" class="form-control input-md" placeholder="Date of Joining" required>';
    cell4.innerHTML = '<input type="date" name="industrial_dol[]" class="form-control input-md" placeholder="Date of Leaving" required>';
    cell5.innerHTML = '<input type="text" name="industrial_duration[]" class="form-control input-md" placeholder="Duration" required><button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this)">X</button>';
  }

  function deleteRow(button) {
    // Get the table row to delete
    var rowToDelete = button.parentNode.parentNode;

    // Remove the row from the table
    rowToDelete.parentNode.removeChild(rowToDelete);

    // Update the serial numbers of remaining rows
    var tableBody = document.getElementById("teaching_exp");
    var rows = tableBody.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
      rows[i].getElementsByTagName("td")[0].textContent = i + 1;
    }
  }


</script>