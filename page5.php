<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1
?>

<html>

<head>
    <title>Academic Industrial Experience</title>
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
                <form class="form-horizontal" action="page5insert.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="ci_csrf_token" value="" />

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



                        <!-- Membership of Professional Societies -->

                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">9. Membership of Professional
                            Societies </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        Fill the Details &nbsp; &nbsp;
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addSociety()">Add
                                            Row</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">S. No.</th>
                                                    <th class="col-md-5">Name of the Professional Society</th>
                                                    <th class="col-md-5">Membership Status (Lifetime/Annual)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="society_table_body">
                                                <?php
                                                // Assuming $data contains the data fetched from the database
                                                $data = isset($_SESSION['professional_societies']) ? $_SESSION['professional_societies'] : [];
                                                if (!empty($data)) {
                                                    foreach ($data as $index => $row) {
                                                        echo "<tr>";
                                                        echo "<td>" . ($index + 1) . "</td>";
                                                        echo "<td><input type='text' name='society_name[]' value='" . $row['society_name'] . "' class='form-control input-md'></td>";
                                                        echo "<td><input type='text' name='membership_status[]' value='" . $row['membership_status'] . "' class='form-control input-md'></td>";
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

                        <!-- Professional Training -->

                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">10. Professional Training
                        </h4>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        Fill the Details &nbsp; &nbsp;
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addTraining()">Add
                                            Row</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-1"> S. No.</th>
                                                    <th class="col-md-3"> Type of Training Received</th>
                                                    <th class="col-md-3"> Organisation</th>
                                                    <th class="col-md-2"> Year</th>
                                                    <th class="col-md-2"> Duration (in years & months)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="training_table_body">
                                                <!-- Dynamically added rows will appear here -->
                                                <?php
                                                // Assuming $_SESSION['trainings_received'] contains the data
                                                $trainings_received = isset($_SESSION['trainings_received']) ? $_SESSION['trainings_received'] : array();
                                                if (!empty($trainings_received)) {
                                                    foreach ($trainings_received as $index => $training) {
                                                        echo "<tr>";
                                                        echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                        echo "<td class='col-md-3'><input type='text' name='type_of_training[]' value='" . $training['type_of_training'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='organisation[]' value='" . $training['organisation'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-2'><input type='text' name='year[]' value='" . $training['year'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-2'><input type='text' name='duration[]' value='" . $training['duration'] . "' class='form-control input-md'></td>";
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

                        <!-- Award(s) and Recognition(s) -->

                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">11. Award(s) and
                            Recognition(s)</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        Fill the Details &nbsp; &nbsp;
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addAward()">Add
                                            Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-1">S. No.</th>
                                                    <th class="col-md-3">Name of Award</th>
                                                    <th class="col-md-3">Awarded By</th>
                                                    <th class="col-md-2">Year</th>
                                                    <!-- <th class="col-md-1">Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="award_table_body">
                                                <!-- Placeholder for dynamically added rows -->
                                                <?php
                                                $award_data = isset($_SESSION['Awards']) ? $_SESSION['Awards'] : array();
                                                if (!empty($award_data)) {
                                                    foreach ($award_data as $index => $award) {
                                                        echo "<tr>";
                                                        echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                        echo "<td class='col-md-3'><input type='text' name='award_name[]' class='form-control input-md' value='" . $award['name'] . "'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='awarded_by[]' class='form-control input-md' value='" . $award['awarded_by'] . "'></td>";
                                                        echo "<td class='col-md-2'><input type='text' name='award_year[]' class='form-control input-md' value='" . $award['year'] . "'></td>";
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



                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">12. Sponsored Projects/
                            Consultancy Details</h4>
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                            <!-- <h4 style="text-align:center; font-weight: bold; color: #6739bb;">(A) Sponsored Projects</h4> -->
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    (A) Sponsored Projects &nbsp; &nbsp;
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="addSponsoredProject()">Add Details</button>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr height="30px">
                                                <th class="col-md-1">S. No.</th>
                                                <th class="col-md-2">Sponsoring Agency</th>
                                                <th class="col-md-3">Title of Project</th>
                                                <th class="col-md-2">Sanctioned Amount (₹)</th>
                                                <th class="col-md-2">Period</th>
                                                <th class="col-md-1">Role</th>
                                                <th class="col-md-1">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sponsored_projects">
                                            <!-- Placeholder for dynamically added rows -->
                                            <?php
                                            // Assuming $sponsored_projects_data contains the data fetched from the database
                                            $sponsored_projects_data = isset($_SESSION['sponsored_projects']) ? $_SESSION['sponsored_projects'] : array();
                                            if (!empty($sponsored_projects_data)) {
                                                foreach ($sponsored_projects_data as $index => $project) {
                                                    echo "<tr>";
                                                    echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                    echo "<td class='col-md-2'><input type='text' name='sponsoring_agency[]' class='form-control input-md' value='" . $project['sponsoring_agency'] . "'></td>";
                                                    echo "<td class='col-md-3'><input type='text' name='project_title[]' class='form-control input-md' value='" . $project['project_title'] . "'></td>";
                                                    echo "<td class='col-md-2'><input type='text' name='sanctioned_amount[]' class='form-control input-md' value='" . $project['sanctioned_amount'] . "'></td>";
                                                    echo "<td class='col-md-2'><input type='text' name='period[]' class='form-control input-md' value='" . $project['period'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='role[]' class='form-control input-md' value='" . $project['role'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='status[]' class='form-control input-md' value='" . $project['status'] . "'></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>


                        <!-- Consultancy Details -->
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    (B) Consultancy Projects
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="addConsultancyProject()">Add Details</button>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr height="30px">
                                                <th class="col-md-1">S. No.</th>
                                                <th class="col-md-2">Organization</th>
                                                <th class="col-md-3">Title of Project</th>
                                                <th class="col-md-2">Amount of Contract</th>
                                                <th class="col-md-2">Period</th>
                                                <th class="col-md-1">Role</th>
                                                <th class="col-md-1">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="consultancy_projects">
                                            <!-- Placeholder for dynamically added rows -->
                                            <?php
                                            $consultancy_projects_data = isset($_SESSION['consultancy_projects']) ? $_SESSION['consultancy_projects'] : array();
                                            if (!empty($consultancy_projects_data)) {
                                                foreach ($consultancy_projects_data as $index => $project) {
                                                    echo "<tr>";
                                                    echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                    echo "<td class='col-md-2'><input class='form-control input-md' type='text' name='consultancy_projects_organization[]' value='" . $project['organization'] . "'></td>";
                                                    echo "<td class='col-md-3'><input class='form-control input-md' type='text' name='consultancy_projects_title[]' value='" . $project['title'] . "'></td>";
                                                    echo "<td class='col-md-2'><input class='form-control input-md' type='text' name='consultancy_projects_contract_amount[]' value='" . $project['contract_amount'] . "'></td>";
                                                    echo "<td class='col-md-2'><input class='form-control input-md' type='text' name='consultancy_projects_period[]' value='" . $project['period'] . "'></td>";
                                                    echo "<td class='col-md-1'><input class='form-control input-md' type='text' name='consultancy_projects_role[]' value='" . $project['role'] . "'></td>";
                                                    echo "<td class='col-md-1'><input class='form-control input-md' type='text' name='consultancy_projects_status[]' value='" . $project['status'] . "'></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>

                        <!-- Button -->

                        <div class="form-group">

                            <div class="col-md-1">
                                <a href="page4.php" class="btn btn-primary pull-left"><i
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

    function addSociety() {
        var tableBody = document.getElementById("society_table_body");
        var rowCount = tableBody.rows.length;

        var newRow = tableBody.insertRow(rowCount);

        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = rowCount + 1;

        var cell2 = newRow.insertCell(1);
        cell2.innerHTML = '<input type="text" name="society_name[]" class="form-control" placeholder="Name of the Professional Society">';

        var cell3 = newRow.insertCell(2);
        cell3.innerHTML = '<input type="text" name="membership_status[]" class="form-control" placeholder="Membership Status (Lifetime/Annual)"> <button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">x</button>';
    }

    function addTraining() {
        // Get the table body element
        var tableBody = document.getElementById("training_table_body");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="training_type[]" type="text" placeholder="Type of Training Received" class="form-control input-md" required></td>
            <td><input name="training_organization[]" type="text" placeholder="Organization" class="form-control input-md" required></td>
            <td><input name="training_year[]" type="text" placeholder="Year" class="form-control input-md" required></td>
            <td><input name="training_duration[]" type="text" placeholder="Duration" class="form-control input-md" required>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">x</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);


    }

    function addAward() {
        // Get the table body element
        var tableBody = document.getElementById("award_table_body");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="award_name[]" type="text" placeholder="Name of Award" class="form-control input-md" required></td>
            <td><input name="awarded_by[]" type="text" placeholder="Awarded By" class="form-control input-md" required></td>
            <td><input name="award_year[]" type="text" placeholder="Year" class="form-control input-md" required>
            <button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">x</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);

        // Update the serial numbers

    }

    function addSponsoredProject() {
        // Get the table body element
        var tableBody = document.getElementById("sponsored_projects");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type='text' name='sponsoring_agency[]' placeholder='Sponsoring Agency' class='form-control input-md'></td>
            <td><input type='text' name='project_title[]' placeholder='Title of Project' class='form-control input-md'></td>
            <td><input type='text' name='sanctioned_amount[]' placeholder='Sanctioned Amount (₹)' class='form-control input-md'></td>
            <td><input type='text' name='period[]' placeholder='Period' class='form-control input-md'></td>
            <td><input type='text' name='role[]' placeholder='Role' class='form-control input-md'></td>
            <td><input type='text' name='status[]' placeholder='Status' class='form-control input-md'>
            <button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">x</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function addConsultancyProject() {
        // Get the table body element
        var tableBody = document.getElementById("consultancy_projects");
        var rowCount = tableBody.rows.length;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td class="col-md-2"><input name="consultancy_projects_organization[]" type="text" placeholder="Organization" class="form-control input-md"></td>
            <td class="col-md-3"><input name="consultancy_projects_title[]" type="text" placeholder="Title" class="form-control input-md"></td>
            <td class="col-md-2"><input name="consultancy_projects_contract_amount[]" type="text" placeholder="Contract Amount" class="form-control input-md"></td>
            <td class="col-md-2"><input name="consultancy_projects_period[]" type="text" placeholder="Period" class="form-control input-md"></td>
            <td class="col-md-1"><input name="consultancy_projects_role[]" type="text" placeholder="Role" class="form-control input-md"></td>
            <td class="col-md-1"><input name="consultancy_projects_status[]" type="text" placeholder="Status" class="form-control input-md"></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        // Update serial numbers after removing a row
        updateSerialNumbers('society_table_body');
        // Update the serial numbers
        updateSerialNumbers("training_table_body");
        updateSerialNumbers("award_table_body");
        updateSerialNumbers("sponsored_projects");
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