<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1
?>

<html>

<head>
    <title>Academic Experience </title>
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
            padding: 0 !important;
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

    <div class="container" style="border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
                <form class="form-horizontal" action="page6insert.php" method="post" enctype="multipart/form-data">
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


                        <!-- PHD Theses supervision -->


                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">13. Research Supervision:</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        (A) PhD Thesis Supervision &nbsp;
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addThesis()">Add
                                            Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name of Student/Research Scholar</th>
                                                    <th>Title of Thesis</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Ongoing Since/ Year of Completion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="thesis_supervision_body">
                                                <!-- Placeholder for dynamically added rows -->
                                                <?php
                                                // Assuming $thesis_supervision contains the data fetched from the session
                                                $thesis_supervision = isset($_SESSION['thesis_supervision']) ? $_SESSION['thesis_supervision'] : [];

                                                if (!empty($thesis_supervision)) {
                                                    $index = 1;
                                                    foreach ($thesis_supervision as $row) {
                                                        echo "<tr>";
                                                        echo "<td>" . $index . "</td>";
                                                        echo "<td><input type='text' name='thesis_supervision_student_name[]' value='" . $row['student_name'] . "' class='form-control input-md'></td>";
                                                        echo "<td><input type='text' name='thesis_supervision_thesis_title[]' value='" . $row['thesis_title'] . "' class='form-control input-md'></td>";
                                                        echo "<td><input type='text' name='thesis_supervision_role[]' value='" . $row['role'] . "' class='form-control input-md'></td>";
                                                        echo "<td>";
                                                        echo "<select name='thesis_supervision_status[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select</option>";
                                                        echo "<option value='ongoing' " . ($row['status'] == 'ongoing' ? 'selected' : '') . ">Ongoing</option>";
                                                        echo "<option value='completed' " . ($row['status'] == 'completed' ? 'selected' : '') . ">Completed</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "<td><input type='text' name='thesis_supervision_date[]' value='" . $row['date'] . "' class='form-control input-md'></td>";
                                                        echo "</tr>";
                                                        $index++;
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
                                    <div class="panel-heading">
                                        (B) M.Tech/M.E./Master's Degree &nbsp;
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="addMastersThesis()">Add Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name of Student/Research Scholar</th>
                                                    <th>Title of Thesis</th>
                                                    <th>Role</th>
                                                    <th>Ongoing/Completed</th>
                                                    <th>Ongoing Since/Year of Completion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="masters_thesis_body">
                                                <?php
                                                // Assuming $data contains the data fetched from the database
                                                $data = isset($_SESSION['masters_degree']) ? $_SESSION['masters_degree'] : [];

                                                if (!empty($data)) {
                                                    foreach ($data as $index => $row) {
                                                        echo "<tr>";
                                                        echo "<td>" . ($index + 1) . "</td>";
                                                        echo "<td><input name='masters_thesis_students[]' type='text' value='" . $row['student_name'] . "' class='form-control input-md' required></td>";
                                                        echo "<td><input name='masters_thesis_thesis_titles[]' type='text' value='" . $row['thesis_title'] . "' class='form-control input-md' required></td>";
                                                        echo "<td>";
                                                        echo "<select name='masters_thesis_roles[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select Role</option>";
                                                        echo "<option value='supervisor' " . ($row['role'] == 'supervisor' ? 'selected' : '') . ">Supervisor</option>";
                                                        echo "<option value='co_supervisor' " . ($row['role'] == 'co_supervisor' ? 'selected' : '') . ">Co-Supervisor</option>";
                                                        echo "<option value='supervisor_with_co' " . ($row['role'] == 'supervisor_with_co' ? 'selected' : '') . ">Supervisor with Co-Supervisor</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo "<select name='masters_thesis_status[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select</option>";
                                                        echo "<option value='ongoing' " . ($row['status'] == 'ongoing' ? 'selected' : '') . ">Ongoing</option>";
                                                        echo "<option value='completed' " . ($row['status'] == 'completed' ? 'selected' : '') . ">Completed</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "<td><input name='masters_thesis_dates[]' type='text' value='" . $row['date'] . "' class='form-control input-md' required></td>";
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


                        <!-- Bachelor Theses supervision -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        (C) B.Tech/B.E./Bachelor's Degree &nbsp;
                                        <button type="button" class="btn btn-danger" onclick="addBachelorDegree()">Add
                                            Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name of Student</th>
                                                    <th>Title of Project</th>
                                                    <th>Role</th>
                                                    <th>Ongoing/Completed</th>
                                                    <th>Ongoing Since/Year of Completion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bachelors_degree_body">
                                                <!-- Placeholder for dynamically added rows -->
                                                <!-- PHP code to print rows dynamically from session data -->
                                                <?php
                                                // Assuming $_SESSION['bachelors_degree'] contains the data
                                                $bachelors_degree = isset($_SESSION['bachelors_degree']) ? $_SESSION['bachelors_degree'] : [];
                                                if (!empty($bachelors_degree)) {
                                                    foreach ($bachelors_degree as $index => $row) {
                                                        echo "<tr>";
                                                        echo "<td>" . ($index + 1) . "</td>";
                                                        echo "<td><input type='text' name='bachelor_thesis_students[]' value='" . $row['student_name'] . "' class='form-control input-md' required></td>";
                                                        echo "<td><input type='text' name='bachelor_thesis_project_titles[]' value='" . $row['project_title'] . "' class='form-control input-md' required></td>";
                                                        echo "<td>";
                                                        echo "<select name='bachelor_thesis_roles[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select Role</option>";
                                                        echo "<option value='Supervisor' " . ($row['role'] == 'Supervisor' ? 'selected' : '') . ">Supervisor</option>";
                                                        echo "<option value='Co-Supervisor' " . ($row['role'] == 'Co-Supervisor' ? 'selected' : '') . ">Co-Supervisor</option>";
                                                        echo "<option value='Supervisor with Co-Supervisor' " . ($row['role'] == 'Supervisor with Co-Supervisor' ? 'selected' : '') . ">Supervisor with Co-Supervisor</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo "<select name='bachelor_thesis_statuses[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select Status</option>";
                                                        echo "<option value='ongoing' " . ($row['status'] == 'ongoing' ? 'selected' : '') . ">Ongoing</option>";
                                                        echo "<option value='completed' " . ($row['status'] == 'completed' ? 'selected' : '') . ">Completed</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "<td><input type='text' name='bachelor_thesis_dates[]' value='" . $row['date'] . "' class='form-control input-md' required></td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                                <!-- End of PHP code -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Courses Taken -->

                        <!-- Button -->

                        <div class="form-group">

                            <div class="col-md-1">
                                <a href="page5.php" class="btn btn-primary pull-left"><i
                                        class="glyphicon glyphicon-fast-backward"></i></a>
                            </div>

                            <div class="col-md-11">
                                <button id="submit" type="submit" name="submit" value="Submit"
                                    class="btn btn-success pull-right">SAVE & NEXT</button>

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

    function addThesis() {
        // Get the table body element
        var tableBody = document.getElementById("thesis_supervision_body");

        // Create a new row element
        var newRow = document.createElement("tr");
        var rowCount = tableBody.rows.length;

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="thesis_supervision_student_name[]" type="text" placeholder="Name of Student/Research Scholar" class="form-control input-md" required></td>
            <td><input name="thesis_supervision_thesis_title[]" type="text" placeholder="Title of Thesis" class="form-control input-md" required></td>
            <td><input name="thesis_supervision_role[]" type="text" placeholder="Role" class="form-control input-md" required></td>
            <td>
                <select name="thesis_supervision_status[]" class="form-control input-md" required>
                    <option value="">Select</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </td>
            <td><input name="thesis_supervision_date[]" type="text" placeholder="Ongoing Since/Year of Completion" class="form-control input-md" required>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function addMastersThesis() {
        // Get the table body element
        var tableBody = document.getElementById("masters_thesis_body");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="masters_thesis_students[]" type="text" placeholder="Name of Student/Research Scholar" class="form-control input-md" required></td>
            <td><input name="masters_thesis_thesis_titles[]" type="text" placeholder="Title of Thesis" class="form-control input-md" required></td>
            <td>
                <select name="masters_thesis_roles[]" class="form-control input-md" required>
                    <option value="">Select Role</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="co_supervisor">Co-Supervisor</option>
                    <option value="supervisor_with_co">Supervisor with Co-Supervisor</option>
                </select>
            </td>
            <td>
                <select name="masters_thesis_status[]" class="form-control input-md" required>
                    <option value="">Select</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </td>
            <td><input name="masters_thesis_dates[]" type="text" placeholder="Ongoing Since/Year of Completion" class="form-control input-md" required>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function addBachelorDegree() {
        // Get the table body element
        var tableBody = document.getElementById("bachelors_degree_body");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="bachelor_thesis_students[]" type="text" placeholder="Name of Student" class="form-control input-md" required></td>
            <td><input name="bachelor_thesis_project_titles[]" type="text" placeholder="Title of Project" class="form-control input-md" required></td>
            <td>
                <select name="bachelor_thesis_roles[]" class="form-control input-md" required>
                    <option value="">Select Role</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Co-Supervisor">Co-Supervisor</option>
                    <option value="Supervisor with Co-Supervisor">Supervisor with Co-Supervisor</option>
                </select>
            </td>
            <td>
                <select name="bachelor_thesis_statuses[]" class="form-control input-md" required>
                    <option value="">Select Status</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </td>
            <td><input name="bachelor_thesis_dates[]" type="text" placeholder="Ongoing Since/Year of Completion" class="form-control input-md" required>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        // Update serial numbers after removing a row
        updateSerialNumbers('thesis_supervision_body');
        updateSerialNumbers('masters_thesis_body');
        updateSerialNumbers('bachelors_degree_body');
    }

    function updateSerialNumbers(tableId) {
        var tableBody = document.getElementById(tableId);
        var rows = tableBody.getElementsByTagName('tr');
        console.log(rows);
        for (var i = 0; i < rows.length; i++) {
            var cell = rows[i].getElementsByTagName('td')[0];
            cell.textContent = i + 1;
        }
    }

</script>