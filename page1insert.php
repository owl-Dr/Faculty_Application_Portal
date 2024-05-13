<?php
include "loginchk.php";
include '_dbconnect.php';

// TABLE 1
error_reporting(E_ALL);
ini_set('display_errors', 1);

$currentDirectory = __DIR__;

$fname = isset($_POST['fname']) ? mysqli_real_escape_string($conn, $_POST['fname']) : "";
$mname = isset($_POST['mname']) ? mysqli_real_escape_string($conn, $_POST['mname']) : "";
$lname = isset($_POST['lname']) ? mysqli_real_escape_string($conn, $_POST['lname']) : "";
$nationality = isset($_POST['nationality']) ? mysqli_real_escape_string($conn, $_POST['nationality']) : "";
$dob = isset($_POST['dob']) && !empty($_POST['dob']) ? mysqli_real_escape_string($conn, $_POST['dob']) : NULL;
$gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : "";
$mstatus = isset($_POST['mstatus']) ? mysqli_real_escape_string($conn, $_POST['mstatus']) : "";
$category = isset($_POST['cast']) ? mysqli_real_escape_string($conn, $_POST['cast']) : "";
$id_proof = isset($_POST['id_proof']) ? mysqli_real_escape_string($conn, $_POST['id_proof']) : "";
$father_name = isset($_POST['father_name']) ? mysqli_real_escape_string($conn, $_POST['father_name']) : "";
$cadd = isset($_POST['cadd']) ? mysqli_real_escape_string($conn, $_POST['cadd']) : "";
$cadd1 = isset($_POST['cadd1']) ? mysqli_real_escape_string($conn, $_POST['cadd1']) : "";
$cadd2 = isset($_POST['cadd2']) ? mysqli_real_escape_string($conn, $_POST['cadd2']) : "";
$cadd3 = isset($_POST['cadd3']) ? mysqli_real_escape_string($conn, $_POST['cadd3']) : "";
$cadd4 = isset($_POST['cadd4']) ? mysqli_real_escape_string($conn, $_POST['cadd4']) : "";
$padd = isset($_POST['padd']) ? mysqli_real_escape_string($conn, $_POST['padd']) : "";
$padd1 = isset($_POST['padd1']) ? mysqli_real_escape_string($conn, $_POST['padd1']) : "";
$padd2 = isset($_POST['padd2']) ? mysqli_real_escape_string($conn, $_POST['padd2']) : "";
$padd3 = isset($_POST['padd3']) ? mysqli_real_escape_string($conn, $_POST['padd3']) : "";
$padd4 = isset($_POST['padd4']) ? mysqli_real_escape_string($conn, $_POST['padd4']) : "";
$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : "";
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
$alternate_mobile = isset($_POST['mobile_2']) ? mysqli_real_escape_string($conn, $_POST['mobile_2']) : "";
$alternate_email = isset($_POST['email_2']) ? mysqli_real_escape_string($conn, $_POST['email_2']) : "";
$landline = isset($_POST['landline']) ? mysqli_real_escape_string($conn, $_POST['landline']) : "";

// Check if the email already exists
$emailCheckSql = "SELECT * FROM PersonalDetails WHERE Email = '$email'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    // Delete existing record
    $deleteSql = "DELETE FROM PersonalDetails WHERE Email = '$email'";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Previous record deleted successfully. ";
    } else {
        echo "Error deleting previous record: " . $conn->error;
    }
}

// Insert new record
$sql = "INSERT INTO PersonalDetails (First_Name, Middle_Name, Last_Name, Nationality, Date_of_Birth, Gender, Marital_Status, Category, ID_Proof, Father_Name, Correspondence_Address, Permanent_Address, Mobile, Email, Alternate_Mobile, Alternate_Email, Landline_Number) 
        VALUES ('$fname', '$mname', '$lname', '$nationality', '$dob', '$gender', '$mstatus', '$category', '$id_proof', '$father_name', CONCAT('$cadd', ';', '$cadd1', ';', '$cadd2', ';', '$cadd3', ';', '$cadd4'), CONCAT('$padd', ';', '$padd1', ';', '$padd2', ';', '$padd3', ';', '$padd4'), '$mobile', '$email', '$alternate_mobile', '$alternate_email', '$landline')";

if ($conn->query($sql) === TRUE) {
    // echo "New record inserted successfully.";
    // header('location: page2.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Upload directory
$target_dir = "uploads/";

// Get the file name and create a target file path
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$target_file_path = $currentDirectory . '/' . $target_file;

// Upload the file to the target directory
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file_path)) {
    echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";

    // Get the user's current file path from the database (assuming the primary key is user ID)
    $sql = "SELECT photo FROM Photo WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($old_image_path);
    $stmt->fetch();
    $stmt->close();

    // If user has a previous file, delete it from the directory
    if (!empty($old_image_path) && file_exists($currentDirectory . '/' . $old_image_path)) {
        unlink($old_image_path);
    }

    // Check if user has an existing record
    if (!empty($old_image_path)) {
        // Update the file path in the database
        $image_path = $target_file;
        $sql = "UPDATE Photo SET photo = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $image_path, $email);
        $stmt->execute();
        $stmt->close();
    } else {
        // Insert a new record into the database
        $image_path = $target_file;
        $sql = "INSERT INTO Photo (email, photo) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $image_path);
        $stmt->execute();
        $stmt->close();
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}



// Close connection
$conn->close();

header('location: page2.php');
?>