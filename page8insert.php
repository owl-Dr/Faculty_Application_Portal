<?php
// Include database connection file
include "loginchk.php";
include '_dbconnect.php';

// Define the directory where documents will be stored
$uploadDirectory = "uploads/";

// Report all PHP errors
error_reporting(E_ALL);
// Display all errors
ini_set('display_errors', 1);

$currentDirectory = __DIR__;
// echo "Current directory: " . $currentDirectory;


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from the frontend (you can replace this with your method of obtaining the email)
    $email = $_SESSION["email"];

    // Initialize an array to store document paths
    $documentPaths = [];

    // Process each document upload
    for ($i = 1; $i <= 11; $i++) {
        // Check if the file is uploaded
        if (isset($_FILES["document_$i"]) && $_FILES["document_$i"]["error"] == UPLOAD_ERR_OK) {
            // Generate a unique filename
            $fileName = uniqid() . '_' . basename($_FILES["document_$i"]["name"]);
            // Construct the full path for the uploaded file
            $filePath = $currentDirectory . '/' . $uploadDirectory . $fileName;
            // echo $filePath;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES["document_$i"]["tmp_name"], $filePath)) {
                // Store the document path in the array
                $documentPaths[] = $uploadDirectory . $fileName;
            } else {
                echo "Error uploading file $i";
            }
        } else {
            header('location: page9.php');
        }
    }

    // Prepare SQL statement to insert document paths into the database
    $sql = "INSERT INTO documents (email, document_1_path, document_2_path, document_3_path, document_4_path, document_5_path, document_6_path, document_7_path, document_8_path, document_9_path, document_10_path, document_11_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $email, ...$documentPaths);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Documents uploaded successfully!";
    } else {
        echo "Error uploading documents: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

header('location: page9.php');
?>