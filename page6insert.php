<?php
include "loginchk.php";
include '_dbconnect.php';

$email = $_SESSION['email']; // Assuming email is stored in session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM thesis_supervision WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query for inserting new data
    $sql = "INSERT INTO thesis_supervision (email, student_name, thesis_title, role, status, date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $email, $student_name, $thesis_title, $role, $status, $date);

    // Assuming $_POST contains the form data
    $student_names = isset($_POST['thesis_supervision_student_name']) ? $_POST['thesis_supervision_student_name'] : [];
    $thesis_titles = isset($_POST['thesis_supervision_thesis_title']) ? $_POST['thesis_supervision_thesis_title'] : [];
    $roles = isset($_POST['thesis_supervision_role']) ? $_POST['thesis_supervision_role'] : [];
    $statuses = isset($_POST['thesis_supervision_status']) ? $_POST['thesis_supervision_status'] : [];
    $dates = isset($_POST['thesis_supervision_date']) ? $_POST['thesis_supervision_date'] : [];

    // echo count($student_names);

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($student_names); $i++) {
        $student_name = $student_names[$i];
        $thesis_title = $thesis_titles[$i];
        $role = $roles[$i];
        $status = $statuses[$i];
        $date = $dates[$i];

        $stmt->execute();
    }
    $stmt->close();

    $deleteSql = "DELETE FROM masters_degree WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query for inserting new data
    $sql = "INSERT INTO masters_degree (email, student_name, thesis_title, role, status, date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $email, $student_name, $thesis_title, $role, $status, $date);

    // Assuming $_POST contains the form data
    $student_names = isset($_POST['masters_thesis_students']) ? $_POST['masters_thesis_students'] : [];
    $thesis_titles = isset($_POST['masters_thesis_thesis_titles']) ? $_POST['masters_thesis_thesis_titles'] : [];
    $roles = isset($_POST['masters_thesis_roles']) ? $_POST['masters_thesis_roles'] : [];
    $statuses = isset($_POST['masters_thesis_status']) ? $_POST['masters_thesis_status'] : [];
    $dates = isset($_POST['masters_thesis_dates']) ? $_POST['masters_thesis_dates'] : [];

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($student_names); $i++) {
        $student_name = $student_names[$i];
        $thesis_title = $thesis_titles[$i];
        $role = $roles[$i];
        $status = $statuses[$i];
        $date = $dates[$i];

        $stmt->execute();
    }
    $stmt->close();

    // Set parameters for the insert statement
    $email = $_SESSION['email']; // Assuming email is stored in session
    $students = isset($_POST['bachelor_thesis_students']) ? $_POST['bachelor_thesis_students'] : [];
    $project_titles = isset($_POST['bachelor_thesis_project_titles']) ? $_POST['bachelor_thesis_project_titles'] : [];
    $roles = isset($_POST['bachelor_thesis_roles']) ? $_POST['bachelor_thesis_roles'] : [];
    $statuses = isset($_POST['bachelor_thesis_statuses']) ? $_POST['bachelor_thesis_statuses'] : [];
    $dates = isset($_POST['bachelor_thesis_dates']) ? $_POST['bachelor_thesis_dates'] : [];

    // Check if B.Tech/B.E./Bachelor's Degree data already exists and delete it
    $deleteSql = "DELETE FROM bachelors_degree WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        // Previous B.Tech/B.E./Bachelor's Degree records deleted successfully
    } else {
        echo "Error deleting previous B.Tech/B.E./Bachelor's Degree records: " . $stmt->error;
    }
    $stmt->close();

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO bachelors_degree (email, student_name, project_title, role, status, date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $email, $student, $project_title, $role, $status, $date);

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($students); $i++) {
        $student = $students[$i];
        $project_title = $project_titles[$i];
        $role = $roles[$i];
        $status = $statuses[$i];
        $date = $dates[$i];

        $stmt->execute();
    }

    // Close the prepared statement and database connection
    $stmt->close();

    header('location: page7.php');
}

$conn->close();
?>