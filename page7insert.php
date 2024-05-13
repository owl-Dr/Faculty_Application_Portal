<?php
include "loginchk.php";
include '_dbconnect.php';

$email = $_SESSION['email']; // Assuming email is stored in session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM contributions WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query for inserting new data
    $sql = "INSERT INTO contributions (research_contribution, teaching_contribution, other_contribution, editorship, list_journal, list_conference, Email) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Assuming $_POST contains the form data
    $research_contribution = isset($_POST['research_contribution']) ? $_POST['research_contribution'] : "";
    $teaching_contribution = isset($_POST['teaching_contribution']) ? $_POST['teaching_contribution'] : "";
    $other_contribution = isset($_POST['other_contribution']) ? $_POST['other_contribution'] : "";
    $editorship = isset($_POST['editorship']) ? $_POST['editorship'] : "";
    $list_journal = isset($_POST['list_journal']) ? $_POST['list_journal'] : "";
    $list_conference = isset($_POST['list_conference']) ? $_POST['list_conference'] : "";

    // Bind parameters
    $stmt->bind_param("sssssss", $research_contribution, $teaching_contribution, $other_contribution, $editorship, $list_journal, $list_conference, $email);

    // Execute the statement
    $stmt->execute();


    // Close the statement
    $stmt->close();
    header('location: page8.php');
}

$conn->close();
?>