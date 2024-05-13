<?php
include "loginchk.php";
include '_dbconnect.php';

// Report all PHP errors
error_reporting(E_ALL);

// Display all errors
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already established a database connection

    // Set the email
    $email = $_SESSION['email'];

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM professional_societies WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query to insert new records
    $sql = "INSERT INTO professional_societies (email, society_name, membership_status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $society_name, $membership_status);

    // Get form data
    $society_names = isset($_POST['society_name']) ? $_POST['society_name'] : [];
    $membership_statuses = isset($_POST['membership_status']) ? $_POST['membership_status'] : [];

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($society_names); $i++) {
        $society_name = $society_names[$i];
        $membership_status = $membership_statuses[$i];

        $stmt->execute();
    }
    $stmt->close();

    // Set parameters for the insert statement
    $email = $_SESSION['email']; // Assuming email is stored in session
    $types_of_training = isset($_POST['training_type']) ? $_POST['training_type'] : [];
    $organisations = isset($_POST['training_organization']) ? $_POST['training_organization'] : [];
    $years = isset($_POST['training_year']) ? $_POST['training_year'] : [];
    $durations = isset($_POST['training_duration']) ? $_POST['training_duration'] : [];

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM trainings_received WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query to insert new records
    $sql = "INSERT INTO trainings_received (email, type_of_training, organisation, year, duration) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $type_of_training, $organisation, $year, $duration);

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($types_of_training); $i++) {
        $type_of_training = $types_of_training[$i];
        $organisation = $organisations[$i];
        $year = $years[$i];
        $duration = $durations[$i];

        $stmt->execute();
    }
    $stmt->close();

    // Get the email from session or wherever it is stored
    $email = $_SESSION['email'];

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM Awards WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Assuming $_POST contains the form data
    if (isset($_POST['award_name']) && isset($_POST['awarded_by']) && isset($_POST['award_year'])) {
        $award_names = $_POST['award_name'];
        $awarded_bys = $_POST['awarded_by'];
        $award_years = $_POST['award_year'];

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO Awards (email, name, awarded_by, year) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $email, $name, $awarded_by, $year);

        foreach ($award_names as $index => $name) {
            $awarded_by = $awarded_bys[$index];
            $year = $award_years[$index];
            $stmt->execute();
        }

        $stmt->close();
    }

    $email = $_SESSION['email']; // Assuming email is stored in session
    $sponsoring_agencies = $_POST['sponsoring_agency'];
    $project_titles = $_POST['project_title'];
    $sanctioned_amounts = $_POST['sanctioned_amount'];
    $periods = $_POST['period'];
    $roles = $_POST['role'];
    $statuses = $_POST['status'];

    // Check if sponsored projects data already exists and delete it
    $deleteSql = "DELETE FROM sponsored_projects WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        // Previous sponsored projects record deleted successfully
    } else {
        echo "Error deleting previous sponsored projects record: " . $stmt->error;
    }
    $stmt->close();

    // Prepare and execute the SQL statement to insert new sponsored projects data
    $sql = "INSERT INTO sponsored_projects (email, sponsoring_agency, project_title, sanctioned_amount, period, role, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $email, $sponsoring_agency, $project_title, $sanctioned_amount, $period, $role, $status);

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($sponsoring_agencies); $i++) {
        $sponsoring_agency = $sponsoring_agencies[$i];
        $project_title = $project_titles[$i];
        $sanctioned_amount = $sanctioned_amounts[$i];
        $period = $periods[$i];
        $role = $roles[$i];
        $status = $statuses[$i];

        $stmt->execute();
    }
    $stmt->close();

    $email = $_SESSION['email']; // Assuming email is stored in session
    $organizations = $_POST['consultancy_projects_organization'];
    $project_titles = $_POST['consultancy_projects_title'];
    $grant_amounts = $_POST['consultancy_projects_contract_amount'];
    $periods = $_POST['consultancy_projects_period'];
    $roles = $_POST['consultancy_projects_role'];
    $statuses = $_POST['consultancy_projects_status'];

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM consultancy_projects WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute the SQL statement to insert new records
    $sql = "INSERT INTO consultancy_projects (email, organization, title, contract_amount, period, role, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $email, $organization, $project_title, $grant_amount, $period, $role, $status);

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($organizations); $i++) {
        $organization = $organizations[$i];
        $project_title = $project_titles[$i];
        $grant_amount = $grant_amounts[$i];
        $period = $periods[$i];
        $role = $roles[$i];
        $status = $statuses[$i];

        $stmt->execute();
    }
    $stmt->close();
    header('location: page6.php');

}
// Close the database connection
$conn->close();
?>