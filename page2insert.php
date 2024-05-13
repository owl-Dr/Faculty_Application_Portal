<?php
include "loginchk.php";
include '_dbconnect.php';

// Retrieve form values and sanitize them
$university_institute = isset($_POST['college_phd']) ? mysqli_real_escape_string($conn, $_POST['college_phd']) : "";
$department = isset($_POST['stream']) ? mysqli_real_escape_string($conn, $_POST['stream']) : "";
$supervisor_name = isset($_POST['supervisor']) ? mysqli_real_escape_string($conn, $_POST['supervisor']) : "";
$year_of_joining = isset($_POST['yoj_phd']) ? mysqli_real_escape_string($conn, $_POST['yoj_phd']) : "";
$successful_thesis_date = isset($_POST['dod_phd']) ? mysqli_real_escape_string($conn, $_POST['dod_phd']) : "";
$award_date = isset($_POST['doa_phd']) ? mysqli_real_escape_string($conn, $_POST['doa_phd']) : "";
$thesis_title = isset($_POST['phd_title']) ? mysqli_real_escape_string($conn, $_POST['phd_title']) : "";

// Check if Ph.D data already exists and delete it
$emailCheckSql = "SELECT * FROM Phd_Thesis WHERE Email = '$loggedInEmail'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    // Delete existing Ph.D record
    $deleteSql = "DELETE FROM Phd_Thesis WHERE Email = '$loggedInEmail'";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Previous Ph.D record deleted successfully. ";
    } else {
        echo "Error deleting previous Ph.D record: " . $conn->error;
    }
}

// Insert Ph.D details
$sql = "INSERT INTO `Phd_Thesis` (`ID`, `email`, `University_Institute`, `Supervisor_Name`, `Successful_Thesis_Date`, `Department`, `Year_of_Joining`, `Award_Date`, `Thesis_Title`)
    VALUES (NULL, '$loggedInEmail', '$university_institute', '$supervisor_name', '$successful_thesis_date', '$department', '$year_of_joining', '$award_date', '$thesis_title')";

if ($conn->query($sql) === TRUE) {
    // echo "New Ph.D record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Retrieve form values and sanitize them for M.Tech
$degreeCertificate = isset($_POST['pg_degree']) ? mysqli_real_escape_string($conn, $_POST['pg_degree']) : "";
$branchStream = isset($_POST['pg_subjects']) ? mysqli_real_escape_string($conn, $_POST['pg_subjects']) : "";
$universityInstitute = isset($_POST['pg_college']) ? mysqli_real_escape_string($conn, $_POST['pg_college']) : "";
$yearOfJoining = isset($_POST['pg_yoj']) ? mysqli_real_escape_string($conn, $_POST['pg_yoj']) : "";
$yearOfCompletion = isset($_POST['pg_yog']) ? mysqli_real_escape_string($conn, $_POST['pg_yog']) : "";
$durationYears = isset($_POST['pg_duration']) ? mysqli_real_escape_string($conn, $_POST['pg_duration']) : "";
$percentageCGPA = isset($_POST['pg_perce']) ? mysqli_real_escape_string($conn, $_POST['pg_perce']) : "";
$divisionClass = isset($_POST['pg_rank']) ? mysqli_real_escape_string($conn, $_POST['pg_rank']) : "";

// Check if M.Tech data already exists and delete it
$emailCheckSql = "SELECT * FROM MTech WHERE email = '$loggedInEmail'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    // Delete existing M.Tech record
    $deleteSql = "DELETE FROM MTech WHERE email = '$loggedInEmail'";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Previous M.Tech record deleted successfully. ";
    } else {
        echo "Error deleting previous M.Tech record: " . $conn->error;
    }
}

// Insert M.Tech details
$sql = "INSERT INTO `MTech` (`email`, `Degree_Certificate`, `Branch_Stream`, `University_Institute`, `Year_of_Joining`, `Year_of_Completion`, `Duration_Years`, `Percentage_CGPA`, `Division_Class`)
    VALUES ('$loggedInEmail', '$degreeCertificate', '$branchStream', '$universityInstitute', '$yearOfJoining', '$yearOfCompletion', '$durationYears', '$percentageCGPA', '$divisionClass')";

if ($conn->query($sql) === TRUE) {
    // echo "New M.Tech record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Retrieve form values and sanitize them for B.Tech
$btechDegreeCertificate = isset($_POST['ug_degree']) ? mysqli_real_escape_string($conn, $_POST['ug_degree']) : "";
$btechBranchStream = isset($_POST['ug_subjects']) ? mysqli_real_escape_string($conn, $_POST['ug_subjects']) : "";
$btechUniversityInstitute = isset($_POST['ug_college']) ? mysqli_real_escape_string($conn, $_POST['ug_college']) : "";
$btechYearOfJoining = isset($_POST['ug_yoj']) ? mysqli_real_escape_string($conn, $_POST['ug_yoj']) : "";
$btechYearOfCompletion = isset($_POST['ug_yog']) ? mysqli_real_escape_string($conn, $_POST['ug_yog']) : "";
$btechDurationYears = isset($_POST['ug_duration']) ? mysqli_real_escape_string($conn, $_POST['ug_duration']) : "";
$btechPercentageCGPA = isset($_POST['ug_perce']) ? mysqli_real_escape_string($conn, $_POST['ug_perce']) : "";
$btechDivisionClass = isset($_POST['ug_rank']) ? mysqli_real_escape_string($conn, $_POST['ug_rank']) : "";

// Check if B.Tech data already exists and delete it
$emailCheckSql = "SELECT * FROM BTech WHERE email = '$loggedInEmail'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    // Delete existing B.Tech record
    $deleteSql = "DELETE FROM BTech WHERE email = '$loggedInEmail'";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Previous B.Tech record deleted successfully. ";
    } else {
        echo "Error deleting previous B.Tech record: " . $conn->error;
    }
}

// Insert B.Tech details
$sql = "INSERT INTO `BTech` (`email`, `Degree_Certificate`, `Branch_Stream`, `University_Institute`, `Year_of_Joining`, `Year_of_Completion`, `Duration_Years`, `Percentage_CGPA`, `Division_Class`)
    VALUES ('$loggedInEmail', '$btechDegreeCertificate', '$btechBranchStream', '$btechUniversityInstitute', '$btechYearOfJoining', '$btechYearOfCompletion', '$btechDurationYears', '$btechPercentageCGPA', '$btechDivisionClass')";

if ($conn->query($sql) === TRUE) {
    // echo "New B.Tech record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$// Check if the email already exists
    $emailCheckSql = "SELECT * FROM School WHERE email = '$loggedInEmail'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    // Delete existing records
    $deleteSql = "DELETE FROM School WHERE email = '$loggedInEmail'";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Previous School records deleted successfully. ";
    } else {
        echo "Error deleting previous School records: " . $conn->error;
    }
}

// SQL query to insert values into the table
$sql = "INSERT INTO School (email, Exam_Type, School, Year_of_Passing, Percentage_Grade, Division_Class) VALUES ";
$values = array();

// Retrieve form values and sanitize them
$hsc_ssc_values = isset($_POST['hsc_ssc']) ? $_POST['hsc_ssc'] : array();
$school_values = isset($_POST['school']) ? $_POST['school'] : array();
$passing_year_values = isset($_POST['passing_year']) ? $_POST['passing_year'] : array();
$percentage_grade_values = isset($_POST['s_perce']) ? $_POST['s_perce'] : array();
$division_class_values = isset($_POST['s_rank']) ? $_POST['s_rank'] : array();

// Loop through each set of values
foreach ($hsc_ssc_values as $key => $hsc_ssc) {
    // Sanitize values
    $hsc_ssc = mysqli_real_escape_string($conn, $hsc_ssc);
    $school = mysqli_real_escape_string($conn, $school_values[$key]);
    $passing_year = mysqli_real_escape_string($conn, $passing_year_values[$key]);
    $percentage_grade = mysqli_real_escape_string($conn, $percentage_grade_values[$key]);
    $division_class = mysqli_real_escape_string($conn, $division_class_values[$key]);

    // Add values to the SQL query
    $values[] = "('$loggedInEmail', '$hsc_ssc', '$school', '$passing_year', '$percentage_grade', '$division_class')";
}

// Combine all values into a single SQL query
$sql .= implode(",", $values);

if (!empty($values) && $conn->query($sql) === TRUE) {
    // echo "New records created successfully";
    // header('location: page3.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Check if there are existing records for the email ID and delete them
$deleteSql = "DELETE FROM Additional_Education WHERE email = '$loggedInEmail'";
if ($conn->query($deleteSql) === TRUE) {
    // Proceed to insert new records
    // SQL query to insert values into the table
    $sql = "INSERT INTO Additional_Education (email, Degree_Certificate, University_Institute, Branch_Stream, Year_of_Joining, Year_of_Completion, Duration_Years, Percentage_CGPA, Division_Class) VALUES ";
    $values = array();

    // Retrieve form values and sanitize them
    $degree_certificate_values = isset($_POST['add_degree']) ? $_POST['add_degree'] : array();
    $university_institute_values = isset($_POST['add_college']) ? $_POST['add_college'] : array();
    $branch_stream_values = isset($_POST['add_subjects']) ? $_POST['add_subjects'] : array();
    $year_of_joining_values = isset($_POST['add_yoj']) ? $_POST['add_yoj'] : array();
    $year_of_completion_values = isset($_POST['add_yog']) ? $_POST['add_yog'] : array();
    $duration_years_values = isset($_POST['add_duration']) ? $_POST['add_duration'] : array();
    $percentage_cgpa_values = isset($_POST['add_perce']) ? $_POST['add_perce'] : array();
    $division_class_values = isset($_POST['add_rank']) ? $_POST['add_rank'] : array();

    if (count($degree_certificate_values) > 0) {


        // Loop through each set of values
        foreach ($degree_certificate_values as $key => $degree_certificate) {
            // Sanitize values
            $degree_certificate = mysqli_real_escape_string($conn, $degree_certificate);
            $university_institute = mysqli_real_escape_string($conn, $university_institute_values[$key]);
            $branch_stream = mysqli_real_escape_string($conn, $branch_stream_values[$key]);
            $year_of_joining = mysqli_real_escape_string($conn, $year_of_joining_values[$key]);
            $year_of_completion = mysqli_real_escape_string($conn, $year_of_completion_values[$key]);
            $duration_years = mysqli_real_escape_string($conn, $duration_years_values[$key]);
            $percentage_cgpa = mysqli_real_escape_string($conn, $percentage_cgpa_values[$key]);
            $division_class = mysqli_real_escape_string($conn, $division_class_values[$key]);

            // Add values to the SQL query
            $values[] = "('$loggedInEmail', '$degree_certificate', '$university_institute', '$branch_stream', '$year_of_joining', '$year_of_completion', '$duration_years', '$percentage_cgpa', '$division_class')";
        }

        // Combine all values into a single SQL query
        $sql .= implode(",", $values);

        if (!empty($values) && $conn->query($sql) === TRUE) {
            // echo "New records created successfully";
            header('location: page3.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        header('location: page3.php');
    }
} else {
    echo "Error deleting previous records: " . $conn->error;
}


$conn->close();
?>