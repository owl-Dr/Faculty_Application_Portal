<?php
include "loginchk.php";
include '_dbconnect.php';

// TABLE 1
// Check if the form is submitted
// Report all PHP errors
error_reporting(E_ALL);

// Display all errors
ini_set('display_errors', 1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already established a database connection

    // Set parameters for the insert statement
    $email = $_SESSION['email']; // Assuming email is stored in session
    $summary_journal_inter = $_POST['summary_journal_inter'];
    $summary_journal = $_POST['summary_journal'];
    $summary_conf_inter = $_POST['summary_conf_inter'];
    $summary_conf_national = $_POST['summary_conf_national'];
    $patent_publish = $_POST['patent_publish'];
    $summary_book = $_POST['summary_book'];
    $summary_book_chapter = $_POST['summary_book_chapter'];

    // Check if Ph.D data already exists and delete it
    $deleteSql = "DELETE FROM Publications WHERE Email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        // Previous Ph.D record deleted successfully
    } else {
        echo "Error deleting previous Ph.D record: " . $stmt->error;
    }
    $stmt->close();

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Publications (email, summary_journal_inter, summary_journal, summary_conf_inter, summary_conf_national, patent_publish, summary_book, summary_book_chapter) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $email, $summary_journal_inter, $summary_journal, $summary_conf_inter, $summary_conf_national, $patent_publish, $summary_book, $summary_book_chapter);

    if ($stmt->execute()) {
        // Records inserted successfully
    } else {
        echo "Error inserting Ph.D record: " . $stmt->error;
    }
    $stmt->close();

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM Publishing WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare the SQL statement to insert new records
    $sql = "INSERT INTO Publishing (email, Authors, Title, Journal, Year_Vol_Page, Impact, DOI, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $email, $author, $title, $journal, $year_vol_page, $impact, $doi, $status);

    // Assuming $_POST contains the form data
    $authors = isset($_POST['authors']) ? $_POST['authors'] : [];
    $titles = isset($_POST['title']) ? $_POST['title'] : [];
    $journals = isset($_POST['journal']) ? $_POST['journal'] : [];
    $year_vol_pages = isset($_POST['year_vol_page']) ? $_POST['year_vol_page'] : [];
    $impacts = isset($_POST['impact']) ? $_POST['impact'] : [];
    $dois = isset($_POST['doi']) ? $_POST['doi'] : [];
    $statuses = isset($_POST['status']) ? $_POST['status'] : [];

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($authors); $i++) {
        $author = $authors[$i];
        $title = $titles[$i];
        $journal = $journals[$i];
        $year_vol_page = $year_vol_pages[$i];
        $impact = $impacts[$i];
        $doi = $dois[$i];
        $status = $statuses[$i];

        $stmt->execute();
    }
    $stmt->close();

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM patents WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute SQL query
    $sql = "INSERT INTO patents (email, inventor, title, country, patent_number, date_filing, date_published, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $email, $inventor, $title, $country, $patent_number, $date_filing, $date_published, $status);

    $inventors = isset($_POST['patent_inventors']) ? $_POST['patent_inventors'] : [];
    $titles = isset($_POST['patent_title']) ? $_POST['patent_title'] : [];
    $countries = isset($_POST['patent_country']) ? $_POST['patent_country'] : [];
    $patent_numbers = isset($_POST['patent_number']) ? $_POST['patent_number'] : [];
    $date_filings = isset($_POST['patent_date_filing']) ? $_POST['patent_date_filing'] : [];
    $date_published = isset($_POST['patent_date_published']) ? $_POST['patent_date_published'] : [];
    $statuses = isset($_POST['patent_status']) ? $_POST['patent_status'] : [];

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($inventors); $i++) {
        $inventor = $inventors[$i];
        $title = $titles[$i];
        $country = $countries[$i];
        $patent_number = $patent_numbers[$i];
        $date_filing = $date_filings[$i];
        $date_published = $date_published[$i];
        $status = $statuses[$i];

        $stmt->execute();
    }
    $stmt->close();

    $deleteSql = "DELETE FROM books WHERE email = '$email'";
    if (mysqli_query($conn, $deleteSql)) {
        // Data deleted successfully
    } else {
        echo "Error deleting previous data: " . mysqli_error($conn);
    }

    // Initialize empty arrays if $_POST variables are not set
    $authors_book = isset($_POST['authors_book']) ? $_POST['authors_book'] : array();
    $titles_book = isset($_POST['titles_book']) ? $_POST['titles_book'] : array();
    $years_book = isset($_POST['years_book']) ? $_POST['years_book'] : array();
    $isbns_book = isset($_POST['isbns_book']) ? $_POST['isbns_book'] : array();

    // Construct the SQL query to insert new data
    $sql = "INSERT INTO books (email, author, title, year_of_publication, isbn) VALUES ";

    // echo count($authors_book);
    // echo $authors_book[0];

    for ($index = 0; $index < count($authors_book); $index++) {
        $author_book = mysqli_real_escape_string($conn, $authors_book[$index]);
        $title_book = mysqli_real_escape_string($conn, $titles_book[$index]);
        $year_book = mysqli_real_escape_string($conn, $years_book[$index]);
        $isbn_book = mysqli_real_escape_string($conn, $isbns_book[$index]);

        // Add values to the SQL query
        $sql = "INSERT INTO books (email, author, title, year_of_publication, isbn) VALUES ('$loggedInEmail', '$author_book', '$title_book', '$year_book', '$isbn_book')";
        mysqli_query($conn, $sql);
    }

    // Delete previous records for the user's email
    $deleteSql = "DELETE FROM book_chapters WHERE email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        // Previous records deleted successfully
    } else {
        echo "Error deleting previous records: " . $stmt->error;
    }
    $stmt->close();

    // Prepare and execute the SQL statement to insert new records
    $sql = "INSERT INTO book_chapters (email, author, title, year_of_publication, isbn) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $author, $title, $year_of_publication, $isbn);

    // Assuming $_POST contains the form data
    $authors = isset($_POST['book_chapter_authors']) ? $_POST['book_chapter_authors'] : [];
    $titles = isset($_POST['book_chapter_titles']) ? $_POST['book_chapter_titles'] : [];
    $years = isset($_POST['book_chapter_years']) ? $_POST['book_chapter_years'] : [];
    $isbns = isset($_POST['book_chapter_isbns']) ? $_POST['book_chapter_isbns'] : [];

    // Loop through the data to execute the prepared statement
    for ($i = 0; $i < count($authors); $i++) {
        $author = $authors[$i];
        $title = $titles[$i];
        $year_of_publication = $years[$i];
        $isbn = $isbns[$i];

        if ($stmt->execute()) {
            // Records inserted successfully
        } else {
            echo "Error inserting records: " . $stmt->error;
        }
    }
    $stmt->close();

    $google_link = isset($_POST['google_link']) ? $_POST['google_link'] : '';

    $deleteSql = "DELETE FROM Scholar WHERE Email = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        // Previous Ph.D record deleted successfully
    } else {
        echo "Error deleting previous Google Link: " . $stmt->error;
    }
    $stmt->close();

    $sql = "INSERT INTO Scholar (email, Scholar) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $google_link);

    if ($stmt->execute()) {
        // Records inserted successfully
    } else {
        echo "Error inserting Google Link: " . $stmt->error;
    }
    $stmt->close();

    header('location: page5.php');
}

// Close the database connection
$conn->close();
?>