<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION['loggedin'] != true) {
    header('location: index.php');
    exit;
} else {
    if (isset($_SESSION['user_name'])) {
        $loggedInUserName = $_SESSION['user_name'];
    }
    if (isset($_SESSION['email'])) {
        $loggedInEmail = $_SESSION['email'];
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
include '_dbconnect.php'; // Include your database connection file

function fetchAndStoreData($tableName, $conn, $loggedInEmail)
{
    // Prepare a SELECT query
    $sql = "SELECT * FROM $tableName WHERE Email = '$loggedInEmail'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the data and store it in session variables
            $row = mysqli_fetch_assoc($result);

            // Store each field in session variables
            foreach ($row as $key => $value) {
                $_SESSION[$tableName][$key] = $value;
            }

            // echo "Data fetched and stored in session variables successfully.";
        } else {
            // echo "No data found for the given email address.";
        }
    } else {
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
}

function fetchAndStoreData2($tableName, $conn, $loggedInEmail)
{
    // Prepare a SELECT query
    $sql = "SELECT * FROM $tableName WHERE Email = '$loggedInEmail'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Initialize an array to store multiple rows
            $_SESSION[$tableName] = [];

            // Fetch each row and store it in the session array
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION[$tableName][] = $row;
            }

            // echo "Data fetched and stored in session variables successfully.";
        } else {
            // echo "No data found for the given email address.";
        }
    } else {
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
}

fetchAndStoreData('users', $conn, $loggedInEmail);
fetchAndStoreData('PersonalDetails', $conn, $loggedInEmail);
fetchAndStoreData('Phd_Thesis', $conn, $loggedInEmail);
fetchAndStoreData('MTech', $conn, $loggedInEmail);
fetchAndStoreData('BTech', $conn, $loggedInEmail);
fetchAndStoreData2('School', $conn, $loggedInEmail);
fetchAndStoreData2('Additional_Education', $conn, $loggedInEmail);
fetchAndStoreData('Employment_Details', $conn, $loggedInEmail);
fetchAndStoreData2('Employment_History', $conn, $loggedInEmail);
fetchAndStoreData2('Teaching_Experience', $conn, $loggedInEmail);
fetchAndStoreData2('Research_Experience', $conn, $loggedInEmail);
fetchAndStoreData2('Industrial_Experience', $conn, $loggedInEmail);
fetchAndStoreData('Areas', $conn, $loggedInEmail);
fetchAndStoreData('Publications', $conn, $loggedInEmail);
fetchAndStoreData2('Publishing', $conn, $loggedInEmail);
fetchAndStoreData2('patents', $conn, $loggedInEmail);
fetchAndStoreData2('books', $conn, $loggedInEmail);
fetchAndStoreData2('book_chapters', $conn, $loggedInEmail);
fetchAndStoreData('Scholar', $conn, $loggedInEmail);
fetchAndStoreData2('professional_societies', $conn, $loggedInEmail);
fetchAndStoreData2('trainings_received', $conn, $loggedInEmail);
fetchAndStoreData2('Awards', $conn, $loggedInEmail);
fetchAndStoreData2('sponsored_projects', $conn, $loggedInEmail);
fetchAndStoreData2('consultancy_projects', $conn, $loggedInEmail);
fetchAndStoreData2('thesis_supervision', $conn, $loggedInEmail);
fetchAndStoreData2('masters_degree', $conn, $loggedInEmail);
fetchAndStoreData2('bachelors_degree', $conn, $loggedInEmail);
fetchAndStoreData('contributions', $conn, $loggedInEmail);
fetchAndStoreData('documents', $conn, $loggedInEmail);
fetchAndStoreData('Photo', $conn, $loggedInEmail);
// Close the connection
mysqli_close($conn);
?>