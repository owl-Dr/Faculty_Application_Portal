<?php
include "loginchk.php";
include '_dbconnect.php';

// TABLE 1
// Check if the form is submitted
// Report all PHP errors

error_reporting(E_ALL);

// Display all errors
ini_set('display_errors', 1);

if (isset($_POST["submit"])) {
    // Escape form data
    $position = isset($_POST["pres_emp_position"]) ? mysqli_real_escape_string($conn, $_POST["pres_emp_position"]) : NULL;
    $employer = isset($_POST["pres_emp_employer"]) ? mysqli_real_escape_string($conn, $_POST["pres_emp_employer"]) : NULL;
    $status = isset($_POST["pres_status"]) ? mysqli_real_escape_string($conn, $_POST["pres_status"]) : NULL;
    $doj = isset($_POST["pres_emp_doj"]) ? mysqli_real_escape_string($conn, $_POST["pres_emp_doj"]) : NULL;
    $dol = isset($_POST["pres_emp_dol"]) ? mysqli_real_escape_string($conn, $_POST["pres_emp_dol"]) : NULL;
    $duration = isset($_POST["pres_emp_duration"]) ? mysqli_real_escape_string($conn, $_POST["pres_emp_duration"]) : NULL;


    // Check if Ph.D data already exists and delete it
    $emailCheckSql = "SELECT * FROM Employment_Details WHERE Email = '$loggedInEmail'";
    $emailCheckResult = $conn->query($emailCheckSql);

    if ($emailCheckResult->num_rows > 0) {
        // Delete existing Ph.D record
        $deleteSql = "DELETE FROM Employment_Details WHERE Email = '$loggedInEmail'";
        if ($conn->query($deleteSql) === TRUE) {
            // echo "Previous Ph.D record deleted successfully. ";
        } else {
            echo "Error deleting previous Ph.D record: " . $conn->error;
        }
    }
    // SQL query to insert data into database table
    $sql = "INSERT INTO Employment_Details (email, position, Organization_Institution, status, Date_of_Joining, Date_of_Leaving, duration) 
            VALUES ('$loggedInEmail','$position', '$employer', '$status', '$doj', '$dol', '$duration')";

    // Check if insertion was successful
    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Retrieve form data
    $positions = isset($_POST["position"]) ? $_POST["position"] : [];
    $employers = isset($_POST["employer"]) ? $_POST["employer"] : [];
    $dojs = isset($_POST["doj"]) ? $_POST["doj"] : [];
    $dols = isset($_POST["dol"]) ? $_POST["dol"] : [];
    $durations = isset($_POST["exp_duration"]) ? $_POST["exp_duration"] : [];


    $emailCheckSql = "SELECT * FROM Employment_History WHERE Email = '$loggedInEmail'";
    $emailCheckResult = $conn->query($emailCheckSql);

    if ($emailCheckResult->num_rows > 0) {
        // Delete existing Ph.D record
        $deleteSql = "DELETE FROM Employment_History WHERE Email = '$loggedInEmail'";
        if ($conn->query($deleteSql) === TRUE) {
            // echo "Previous Ph.D record deleted successfully. ";
        } else {
            echo "Error deleting previous Ph.D record: " . $conn->error;
        }
    }

    if (count($positions) > 0) {
        // Loop through each set of values and insert them into the database
        foreach ($positions as $key => $position) {
            $employer = isset($employers[$key]) ? mysqli_real_escape_string($conn, $employers[$key]) : null;
            $doj = isset($dojs[$key]) ? mysqli_real_escape_string($conn, $dojs[$key]) : null;
            $dol = isset($dols[$key]) ? mysqli_real_escape_string($conn, $dols[$key]) : null;
            $duration = isset($durations[$key]) ? mysqli_real_escape_string($conn, $durations[$key]) : null;

            // SQL query to insert data into the table
            $sql = "INSERT INTO Employment_History (email, Position, Organization_Institution, Date_of_Joining, Date_of_Leaving, Duration) 
                    VALUES ('$loggedInEmail','$position', '$employer', '$doj', '$dol', '$duration')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
                // header('location: page4.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Retrieve form data
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $position = isset($_POST['teaching_position']) ? $_POST['teaching_position'] : [];
    $employer = isset($_POST['teaching_employer']) ? $_POST['teaching_employer'] : [];
    $course_taught = isset($_POST['course_taught']) ? $_POST['course_taught'] : [];
    $ug_pg = isset($_POST['ug_pg']) ? $_POST['ug_pg'] : [];
    $no_of_students = isset($_POST['no_of_students']) ? $_POST['no_of_students'] : [];
    $doj = isset($_POST['teaching_doj']) ? $_POST['teaching_doj'] : [];
    $dol = isset($_POST['teaching_dol']) ? $_POST['teaching_dol'] : [];
    $duration = isset($_POST['teaching_duration']) ? $_POST['teaching_duration'] : [];

    // Delete previous records for the same email
    $delete_query = "DELETE FROM Teaching_Experience WHERE email = '$email'";
    $conn->query($delete_query);

    // Insert new records
    for ($i = 0; $i < count($position); $i++) {
        $position_val = $conn->real_escape_string($position[$i]);
        $employer_val = $conn->real_escape_string($employer[$i]);
        $course_taught_val = $conn->real_escape_string($course_taught[$i]);
        $ug_pg_val = $conn->real_escape_string($ug_pg[$i]);
        $no_of_students_val = $no_of_students[$i];
        $doj_val = $conn->real_escape_string($doj[$i]);
        $dol_val = $conn->real_escape_string($dol[$i]);
        $duration_val = $conn->real_escape_string($duration[$i]);

        $insert_query = "INSERT INTO Teaching_Experience (email, Position, Employer, Course_Taught, UG_PG, No_of_Students, Date_of_Joining, Date_of_Leaving, Duration) 
                         VALUES ('$email', '$position_val', '$employer_val', '$course_taught_val', '$ug_pg_val', '$no_of_students_val', '$doj_val', '$dol_val', '$duration_val')";

        if ($conn->query($insert_query) === TRUE) {
            // echo "New records inserted successfully";
            // header('location: page4.php');
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $positions = isset($_POST['research_position']) ? $_POST['research_position'] : [];
    $institutes = isset($_POST['research_institute']) ? $_POST['research_institute'] : [];
    $supervisors = isset($_POST['research_supervisor']) ? $_POST['research_supervisor'] : [];
    $dojs = isset($_POST['research_doj']) ? $_POST['research_doj'] : [];
    $dols = isset($_POST['research_dol']) ? $_POST['research_dol'] : [];
    $durations = isset($_POST['research_duration']) ? $_POST['research_duration'] : [];


    // Delete previous records for the same email
    $delete_sql = "DELETE FROM Research_Experience WHERE email = '$email'";
    $conn->query($delete_sql);

    if (count($positions)) {
        // Insert new records
        for ($i = 0; $i < count($positions); $i++) {
            $position = mysqli_real_escape_string($conn, $positions[$i]);
            $institute = mysqli_real_escape_string($conn, $institutes[$i]);
            $supervisor = mysqli_real_escape_string($conn, $supervisors[$i]);
            $doj = mysqli_real_escape_string($conn, $dojs[$i]);
            $dol = mysqli_real_escape_string($conn, $dols[$i]);
            $duration = mysqli_real_escape_string($conn, $durations[$i]);

            $insert_sql = "INSERT INTO Research_Experience (email, Position, Institute, Supervisor, Date_of_Joining, Date_of_Leaving, Duration) 
                        VALUES ('$email', '$position', '$institute', '$supervisor', '$doj', '$dol', '$duration')";
            $conn->query($insert_sql);
        }
    }

    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $organizations = isset($_POST['industrial_organization']) ? $_POST['industrial_organization'] : [];
    $workProfiles = isset($_POST['industrial_work_profile']) ? $_POST['industrial_work_profile'] : [];
    $dojs = isset($_POST['industrial_doj']) ? $_POST['industrial_doj'] : [];
    $dols = isset($_POST['industrial_dol']) ? $_POST['industrial_dol'] : [];
    $durations = isset($_POST['industrial_duration']) ? $_POST['industrial_duration'] : [];


    // Delete previous records for the same email
    $deleteQuery = "DELETE FROM Industrial_Experience WHERE email='$email'";
    $conn->query($deleteQuery);

    // Insert new records
    for ($i = 0; $i < count($organizations); $i++) {
        $organization = $conn->real_escape_string($organizations[$i]);
        $workProfile = $conn->real_escape_string($workProfiles[$i]);
        $doj = $conn->real_escape_string($dojs[$i]);
        $dol = $conn->real_escape_string($dols[$i]);
        $duration = $conn->real_escape_string($durations[$i]);

        $insertQuery = "INSERT INTO Industrial_Experience (email, Organization, Work_Profile, Date_of_Joining, Date_of_Leaving, Duration) 
                        VALUES ('$email', '$organization', '$workProfile', '$doj', '$dol', '$duration')";
        $conn->query($insertQuery);
    }

    // echo "Data inserted successfully";

    $email = $_SESSION['email'];
    $area_spl = $_POST['area_spl'];
    $area_rese = $_POST['area_rese'];

    // Delete previous records for the same email
    $deleteQuery = "DELETE FROM Areas WHERE email='$email'";
    $conn->query($deleteQuery);

    // Construct the SQL query
    $sql = "INSERT INTO Areas (email, specialization, research_area) VALUES ('$email', '$area_spl', '$area_rese')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // echo "New record inserted successfully";
        header('location: page4.php');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>