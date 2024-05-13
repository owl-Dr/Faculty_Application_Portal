<?php
include 'loginchk.php'; // Include your login check script
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Application Form IIT Patna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        /* Styling for the rectangular container */
        .container {
            border: 2px solid #000;
            padding: 20px;
            margin: auto;
            max-width: 70%;
            border-radius: 10px;
        }

        /* Styling for the print button */
        .print-btn {
            margin-top: 20px;
        }

        /* Styling for the tables */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling for the logo */
        .logo {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            /* Added space after the logo */
        }

        .logo img {
            width: 120px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        /* Clearing float */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            margin: 20px;
        }

        /* Styling for the heading */
        .heading {
            text-align: center;
            font-weight: bold;
        }

        /* Styling for the subheading */
        .subheading {
            margin-top: 20px;
        }

        /* Styling for the date and time */
        .date-time {
            text-align: right;
            margin-bottom: 20px;
        }

        /* Styling for faculty info */
        .faculty-info {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container clearfix">
        <!-- Logo -->
        <div class="logo">
            <img src="iitplogo.png" alt="Logo">
        </div>

        <!-- Faculty Application Info -->
        <div class="faculty-info">
            <h1 class="heading">Faculty Application Form</h1>
            <h2 class="subheading">IIT Patna</h2>
        </div>

        <!-- Date and Time -->
        <div class="date-time">
            <?php echo date("F j, Y, g:i a"); ?>
        </div>


        <!-- Personal Details -->
        <h2 class="subheading">Personal Details</h2> <!-- Added space after the heading -->

        <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['First_Name']) ? $_SESSION['PersonalDetails']['First_Name'] . ' ' . $_SESSION['PersonalDetails']['Middle_Name'] . ' ' . $_SESSION['PersonalDetails']['Last_Name'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Nationality']) ? $_SESSION['PersonalDetails']['Nationality'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Date_of_Birth']) ? $_SESSION['PersonalDetails']['Date_of_Birth'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Gender']) ? $_SESSION['PersonalDetails']['Gender'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Marital Status</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Marital_Status']) ? $_SESSION['PersonalDetails']['Marital_Status'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Category']) ? $_SESSION['PersonalDetails']['Category'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>ID Proof</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['ID_Proof']) ? $_SESSION['PersonalDetails']['ID_Proof'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td><?php echo isset($_SESSION['PersonalDetails']['Father_Name']) ? $_SESSION['PersonalDetails']['Father_Name'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <?php echo isset($_SESSION['PersonalDetails']['Correspondence_Address']) ? $_SESSION['PersonalDetails']['Correspondence_Address'] : ''; ?><br>
                    <?php echo isset($_SESSION['PersonalDetails']['Permanent_Address']) ? $_SESSION['PersonalDetails']['Permanent_Address'] : ''; ?>
                </td>
            </tr>
            <tr>
                <th>Contact Information</th>
                <td>
                    Mobile:
                    <?php echo isset($_SESSION['PersonalDetails']['Mobile']) ? $_SESSION['PersonalDetails']['Mobile'] : ''; ?><br>
                    Email:
                    <?php echo isset($_SESSION['PersonalDetails']['Email']) ? $_SESSION['PersonalDetails']['Email'] : ''; ?><br>
                    Alternate Mobile:
                    <?php echo isset($_SESSION['PersonalDetails']['Alternate_Mobile']) ? $_SESSION['PersonalDetails']['Alternate_Mobile'] : ''; ?><br>
                    Alternate Email:
                    <?php echo isset($_SESSION['PersonalDetails']['Alternate_Email']) ? $_SESSION['PersonalDetails']['Alternate_Email'] : ''; ?><br>
                    Landline Number:
                    <?php echo isset($_SESSION['PersonalDetails']['Landline_Number']) ? $_SESSION['PersonalDetails']['Landline_Number'] : ''; ?>
                </td>
            </tr>
        </table>

        <!-- Education Qualification -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Education Qualification</h2>
        <!-- Added margin-top for spacing -->

        <!-- Ph.D. Thesis -->
        <h3 style="margin-bottom: 10px;">(a) Ph.D. Thesis</h3> <!-- Added margin-bottom for spacing -->
        <table class="table">
            <tr>
                <th>ID</th>
                <th>University/Institute</th>
                <th>Supervisor Name</th>
                <th>Successful Thesis Date</th>
                <th>Department</th>
                <th>Year of Joining</th>
                <th>Award Date</th>
                <th>Thesis Title</th>
            </tr>
            <?php
            if (isset($_SESSION['Phd_Thesis'])) {
                $thesis = $_SESSION['Phd_Thesis']; // Assuming there's only one Ph.D. thesis record
                echo "<tr>";
                echo "<td>{$thesis['ID']}</td>";
                echo "<td>{$thesis['University_Institute']}</td>";
                echo "<td>{$thesis['Supervisor_Name']}</td>";
                echo "<td>{$thesis['Successful_Thesis_Date']}</td>";
                echo "<td>{$thesis['Department']}</td>";
                echo "<td>{$thesis['Year_of_Joining']}</td>";
                echo "<td>{$thesis['Award_Date']}</td>";
                echo "<td>{$thesis['Thesis_Title']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <!-- Academic details - MTech -->
        <h3 style="margin-bottom: 10px;">(b) Academic details - MTech</h3> <!-- Added margin-bottom for spacing -->
        <table class="table">
            <tr>
                <th>Degree/Certificate</th>
                <th>Branch/Stream</th>
                <th>University/Institute</th>
                <th>Year of Joining</th>
                <th>Year of Completion</th>
                <th>Duration (Years)</th>
                <th>Percentage/CGPA</th>
                <th>Division/Class</th>
            </tr>
            <?php
            if (isset($_SESSION['MTech'])) {
                $mtech = $_SESSION['MTech']; // Assuming there's only one record for MTech
                echo "<tr>";
                echo "<td>{$mtech['Degree_Certificate']}</td>";
                echo "<td>{$mtech['Branch_Stream']}</td>";
                echo "<td>{$mtech['University_Institute']}</td>";
                echo "<td>{$mtech['Year_of_Joining']}</td>";
                echo "<td>{$mtech['Year_of_Completion']}</td>";
                echo "<td>{$mtech['Duration_Years']}</td>";
                echo "<td>{$mtech['Percentage_CGPA']}</td>";
                echo "<td>{$mtech['Division_Class']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <!-- Academic details - BTech -->
        <h3 style="margin-bottom: 10px;">(c) Academic details - BTech</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Degree/Certificate</th>
                <th>Branch/Stream</th>
                <th>University/Institute</th>
                <th>Year of Joining</th>
                <th>Year of Completion</th>
                <th>Duration (Years)</th>
                <th>Percentage/CGPA</th>
                <th>Division/Class</th>
            </tr>
            <?php
            if (isset($_SESSION['BTech'])) {
                $btech = $_SESSION['BTech']; // Assuming there's only one record for BTech
                echo "<tr>";
                echo "<td>{$btech['Degree_Certificate']}</td>";
                echo "<td>{$btech['Branch_Stream']}</td>";
                echo "<td>{$btech['University_Institute']}</td>";
                echo "<td>{$btech['Year_of_Joining']}</td>";
                echo "<td>{$btech['Year_of_Completion']}</td>";
                echo "<td>{$btech['Duration_Years']}</td>";
                echo "<td>{$btech['Percentage_CGPA']}</td>";
                echo "<td>{$btech['Division_Class']}</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Academic details - School -->
        <h3 style="margin-bottom: 10px;">(c) Academic details - School</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Exam Type</th>
                <th>School</th>
                <th>Year of Passing</th>
                <th>Percentage/Grade</th>
                <th>Division/Class</th>
            </tr>
            <?php
            // Check if School data exists in session
            if (isset($_SESSION['School']) && is_array($_SESSION['School'])) {
                $schoolData = $_SESSION['School']; // Get School data from session
                foreach ($schoolData as $school) {
                    echo "<tr>";
                    echo "<td>{$school['Exam_Type']}</td>";
                    echo "<td>{$school['School']}</td>";
                    echo "<td>{$school['Year_of_Passing']}</td>";
                    echo "<td>{$school['Percentage_Grade']}</td>";
                    echo "<td>{$school['Division_Class']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No academic details found for School.</td></tr>";
            }
            ?>
        </table>

        <!-- Additional Education (if any) -->
        <h3 style="margin-bottom: 10px;">(d) Additional Education (if any)</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Degree/Certificate</th>
                <th>University/Institute</th>
                <th>Branch/Stream</th>
                <th>Year of Joining</th>
                <th>Year of Completion</th>
                <th>Duration (Years)</th>
                <th>Percentage/CGPA</th>
                <th>Division/Class</th>
            </tr>
            <?php
            // Check if Additional Education data exists in session
            if (isset($_SESSION['Additional_Education']) && is_array($_SESSION['Additional_Education'])) {
                $additionalEducationData = $_SESSION['Additional_Education']; // Get Additional Education data from session
                foreach ($additionalEducationData as $education) {
                    echo "<tr>";
                    echo "<td>{$education['Degree_Certificate']}</td>";
                    echo "<td>{$education['University_Institute']}</td>";
                    echo "<td>{$education['Branch_Stream']}</td>";
                    echo "<td>{$education['Year_of_Joining']}</td>";
                    echo "<td>{$education['Year_of_Completion']}</td>";
                    echo "<td>{$education['Duration_Years']}</td>";
                    echo "<td>{$education['Percentage_CGPA']}</td>";
                    echo "<td>{$education['Division_Class']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No additional education details found.</td></tr>";
            }
            ?>
        </table>

        <!-- Employment Details -->
        <h2 style="margin-top: 20px;">Employment Details</h2>


        <!-- Present Employment -->
        <h3 style="margin-bottom: 10px;">(a) Present Employment</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Position</th>
                <th>Organization/Institution</th>
                <th>Status</th>
                <th>Date of Joining</th>
                <th>Date of Leaving</th>
                <th>Duration</th>
            </tr>
            <?php
            // Check if Present Employment data exists and is an array in session
            if (isset($_SESSION['Employment_Details'])) {
                $employment = $_SESSION['Employment_Details']; // Get Present Employment data from session
            
                echo "<tr>";
                echo "<td>{$employment['Position']}</td>";
                echo "<td>{$employment['Organization_Institution']}</td>";
                echo "<td>{$employment['Status']}</td>";
                echo "<td>{$employment['Date_of_Joining']}</td>";
                echo "<td>{$employment['Date_of_Leaving']}</td>";
                echo "<td>{$employment['Duration']}</td>";
                echo "</tr>";

            }
            ?>
        </table>

        <!-- Employment History -->
        <h3 style="margin-bottom: 10px;">(b) Employment History</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Position</th>
                <th>Organization/Institution</th>
                <th>Date of Joining</th>
                <th>Date of Leaving</th>
                <th>Duration</th>
            </tr>
            <?php
            // Check if Employment History data exists in session
            if (isset($_SESSION['Employment_History'])) {
                $employmentHistory = $_SESSION['Employment_History']; // Get Employment History data from session
                foreach ($employmentHistory as $employment) {
                    echo "<tr>";
                    echo "<td>{$employment['Position']}</td>";
                    echo "<td>{$employment['Organization_Institution']}</td>";
                    echo "<td>{$employment['Date_of_Joining']}</td>";
                    echo "<td>{$employment['Date_of_Leaving']}</td>";
                    echo "<td>{$employment['Duration']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No employment history found.</td></tr>";
            }
            ?>
        </table>
        <!-- Teaching Experience after PhD -->
        <h3 style="margin-bottom: 10px;">(c) Teaching Experience after PhD</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Position</th>
                <th>Employer</th>
                <th>Course Taught</th>
                <th>UG/PG</th>
                <th>No. of Students</th>
                <th>Date of Joining</th>
                <th>Date of Leaving</th>
                <th>Duration</th>
            </tr>
            <?php
            // Check if Teaching Experience after PhD data exists in session
            if (isset($_SESSION['Teaching_Experience'])) {
                $teachingExperience = $_SESSION['Teaching_Experience']; // Get Teaching Experience data from session
                foreach ($teachingExperience as $teaching) {
                    echo "<tr>";
                    echo "<td>{$teaching['Position']}</td>";
                    echo "<td>{$teaching['Employer']}</td>";
                    echo "<td>{$teaching['Course_Taught']}</td>";
                    echo "<td>{$teaching['UG_PG']}</td>";
                    echo "<td>{$teaching['No_of_Students']}</td>";
                    echo "<td>{$teaching['Date_of_Joining']}</td>";
                    echo "<td>{$teaching['Date_of_Leaving']}</td>";
                    echo "<td>{$teaching['Duration']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No teaching experience after PhD found.</td></tr>";
            }
            ?>
        </table>
        <!-- Research Experience -->
        <h3 style="margin-bottom: 10px;">(d) Research Experience</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Position</th>
                <th>Institute</th>
                <th>Supervisor</th>
                <th>Date of Joining</th>
                <th>Date of Leaving</th>
                <th>Duration</th>
            </tr>
            <?php
            // Check if Research Experience data exists in session
            if (isset($_SESSION['research_experience'])) {
                $researchExperience = $_SESSION['research_experience']; // Get Research Experience data from session
                foreach ($researchExperience as $research) {
                    echo "<tr>";
                    echo "<td>{$research['Position']}</td>";
                    echo "<td>{$research['Institute']}</td>";
                    echo "<td>{$research['Supervisor']}</td>";
                    echo "<td>{$research['Date_of_Joining']}</td>";
                    echo "<td>{$research['Date_of_Leaving']}</td>";
                    echo "<td>{$research['Duration']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No research experience found.</td></tr>";
            }
            ?>
        </table>
        <!-- Industrial Experience -->
        <h3 style="margin-bottom: 10px;">(e) Industrial Experience</h3> <!-- Added margin-bottom for spacing -->
        <table>
            <tr>
                <th>Organization</th>
                <th>Work Profile</th>
                <th>Date of Joining</th>
                <th>Date of Leaving</th>
                <th>Duration</th>
            </tr>
            <?php
            // Check if Industrial Experience data exists in session
            if (isset($_SESSION['Industrial_Experience'])) {
                $industrialExperience = $_SESSION['Industrial_Experience']; // Get Industrial Experience data from session
                foreach ($industrialExperience as $industrial) {
                    echo "<tr>";
                    echo "<td>{$industrial['Organization']}</td>";
                    echo "<td>{$industrial['Work_Profile']}</td>";
                    echo "<td>{$industrial['Date_of_Joining']}</td>";
                    echo "<td>{$industrial['Date_of_Leaving']}</td>";
                    echo "<td>{$industrial['Duration']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No industrial experience found.</td></tr>";
            }
            ?>
        </table>

        <!-- Table to display Areas data -->
        <h2 style="margin-bottom: 10px;">Areas of speciality</h2> <!-- Added margin-bottom for spacing -->

        <!-- Display the fetched data in an HTML table -->
        <table>
            <tr>
                <th>Specialization</th>
                <th>Research Area</th>
            </tr>
            <?php
            // Check if Areas data is available in session and is an array
            if (isset($_SESSION['Areas']) && is_array($_SESSION['Areas'])) {
                $area = $_SESSION['Areas'];

                echo "<tr>";
                echo "<td>{$area['specialization']}</td>";
                echo "<td>{$area['research_area']}</td>";
                echo "</tr>";

            } else {
                // Display a message if no data is available
                echo "<tr><td colspan='2'>No data available</td></tr>";
            }
            ?>
        </table>

        <h2 style="margin-bottom: 10px;">Summary of Publications</h2> <!-- Added margin-bottom for spacing -->

        <!-- Display the fetched data in an HTML table -->
        <table>
            <tr>
                <th>Summary (Journal - International)</th>
                <th>Summary (Journal)</th>
                <th>Summary (Conference - International)</th>
                <th>Summary (Conference - National)</th>
                <th>Patent/Publication</th>
                <th>Summary (Book)</th>
                <th>Summary (Book Chapter)</th>
            </tr>
            <?php
            // Check if Publications data is available in session and is an array
            if (isset($_SESSION['Publications']) && is_array($_SESSION['Publications'])) {
                $publication = $_SESSION['Publications'];
                echo "<tr>";
                echo "<td>{$publication['summary_journal_inter']}</td>";
                echo "<td>{$publication['summary_journal']}</td>";
                echo "<td>{$publication['summary_conf_inter']}</td>";
                echo "<td>{$publication['summary_conf_national']}</td>";
                echo "<td>{$publication['patent_publish']}</td>";
                echo "<td>{$publication['summary_book']}</td>";
                echo "<td>{$publication['summary_book_chapter']}</td>";
                echo "</tr>";
            } else {
                // Display a message if no data is available
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }
            ?>
        </table>

        <!-- Heading for Publishing -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;"> List of 10 best research publications (Journal/Conference)
        </h2>
        <table>
            <tr>
                <th>Authors</th>
                <th>Title</th>
                <th>Journal</th>
                <th>Year, Volume, Page</th>
                <th>Impact</th>
                <th>DOI</th>
                <th>Status</th>
            </tr>
            <?php
            // Display publishing data
            if (isset($_SESSION['Publishing'])) {
                foreach ($_SESSION['Publishing'] as $publication) {
                    echo "<tr>";
                    echo "<td>{$publication['authors']}</td>";
                    echo "<td>{$publication['title']}</td>";
                    echo "<td>{$publication['journal']}</td>";
                    echo "<td>{$publication['year_vol_page']}</td>";
                    echo "<td>{$publication['impact']}</td>";
                    echo "<td>{$publication['doi']}</td>";
                    echo "<td>{$publication['status']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>


        <h2 style="margin-top: 20px; margin-bottom: 10px;">List of patents ,books,book chapter(s)</h2>

        <!-- Heading for Patents -->
        <h3 style="margin-bottom: 10px;">(a) Patents</h3>
        <table>
            <tr>
                <th>Inventor</th>
                <th>Title</th>
                <th>Country</th>
                <th>Patent Number</th>
                <th>Date of Filing</th>
                <th>Date Published</th>
                <th>Status</th>
            </tr>
            <?php
            // Display patents data
            if (isset($_SESSION['patents'])) {
                foreach ($_SESSION['patents'] as $patent) {
                    echo "<tr>";
                    echo "<td>{$patent['inventor']}</td>";
                    echo "<td>{$patent['title']}</td>";
                    echo "<td>{$patent['country']}</td>";
                    echo "<td>{$patent['patent_number']}</td>";
                    echo "<td>{$patent['date_filing']}</td>";
                    echo "<td>{$patent['date_published']}</td>";
                    echo "<td>{$patent['status']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Books -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(b) Books</h3>
        <table>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Year of Publication</th>
                <th>ISBN</th>
            </tr>
            <?php
            // Display books data
            if (isset($_SESSION['books'])) {
                foreach ($_SESSION['books'] as $book) {
                    echo "<tr>";
                    echo "<td>{$book['author']}</td>";
                    echo "<td>{$book['title']}</td>";
                    echo "<td>{$book['year_of_publication']}</td>";
                    echo "<td>{$book['isbn']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Book Chapters -->

        <h3 style="margin-top: 20px; margin-bottom: 10px;">(c) Book Chapters</h3>
        <table>
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Year of Publication</th>
                <th>ISBN</th>
            </tr>
            <?php
            // Display book chapters data
            if (isset($_SESSION['book_chapters'])) {
                foreach ($_SESSION['book_chapters'] as $chapter) {
                    echo "<tr>";
                    echo "<td>{$chapter['author']}</td>";
                    echo "<td>{$chapter['title']}</td>";
                    echo "<td>{$chapter['year_of_publication']}</td>";
                    echo "<td>{$chapter['isbn']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Scholar -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;"> Google Scholar Link</h2>
        <table>
            <tr>
                <th>URL</th>
            </tr>
            <?php
            // Display scholar data
            if (isset($_SESSION['Scholar'])) {
                $schola = $_SESSION['Scholar'];
                echo "<tr>";
                echo "<td><a href=\"{$schola['scholar']}\">{$schola['scholar']}</a></td>";
                echo "</tr>";
            }

            ?>
        </table>

        <!-- Heading for Professional Societies -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Membership of Professional Societies</h2>
        <table>
            <tr>
                <th>Society Name</th>
                <th>Membership Status</th>
            </tr>
            <?php
            // Display professional societies data
            if (isset($_SESSION['professional_societies'])) {
                foreach ($_SESSION['professional_societies'] as $society) {
                    echo "<tr>";
                    echo "<td>{$society['society_name']}</td>";
                    echo "<td>{$society['membership_status']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Trainings Received -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Professional Trainings </h2>
        <table>
            <tr>
                <th>Type of Training</th>
                <th>Organisation</th>
                <th>Year</th>
                <th>Duration</th>
            </tr>
            <?php
            // Display trainings received data
            if (isset($_SESSION['trainings_received'])) {
                foreach ($_SESSION['trainings_received'] as $training) {
                    echo "<tr>";
                    echo "<td>{$training['type_of_training']}</td>";
                    echo "<td>{$training['organisation']}</td>";
                    echo "<td>{$training['year']}</td>";
                    echo "<td>{$training['duration']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Awards -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Awards and Recognitions </h2>
        <table>
            <tr>
                <th>Name of Award</th>
                <th>Awarded By</th>
                <th>Year</th>
            </tr>
            <?php
            // Display awards data
            if (isset($_SESSION['Awards'])) {
                foreach ($_SESSION['Awards'] as $award) {
                    echo "<tr>";
                    echo "<td>{$award['name']}</td>";
                    echo "<td>{$award['awarded_by']}</td>";
                    echo "<td>{$award['year']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Research Supervision -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Research Supervision</h2>

        <!-- (a) PhD Thesis Supervision -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(a) PhD Thesis Supervision</h3>
        <table>
            <tr>
                <th>Student Name</th>
                <th>Thesis Title</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php
            // Display PhD thesis supervision data
            if (isset($_SESSION['thesis_supervision'])) {
                foreach ($_SESSION['thesis_supervision'] as $supervision) {
                    echo "<tr>";
                    echo "<td>{$supervision['student_name']}</td>";
                    echo "<td>{$supervision['thesis_title']}</td>";
                    echo "<td>{$supervision['role']}</td>";
                    echo "<td>{$supervision['status']}</td>";
                    echo "<td>{$supervision['date']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- (b) M.Tech/M.E./Masters Thesis Supervision -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(b) M.Tech/M.E./Masters Thesis Supervision</h3>
        <table>
            <tr>
                <th>Student Name</th>
                <th>Thesis Title</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php
            // Display M.Tech/M.E./Masters thesis supervision data
            if (isset($_SESSION['masters_degree'])) {
                foreach ($_SESSION['masters_degree'] as $supervision) {
                    echo "<tr>";
                    echo "<td>{$supervision['student_name']}</td>";
                    echo "<td>{$supervision['thesis_title']}</td>";
                    echo "<td>{$supervision['role']}</td>";
                    echo "<td>{$supervision['status']}</td>";
                    echo "<td>{$supervision['date']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- (c) Btech/B.E./Bachelors Project Supervision -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(c) Btech/B.E./Bachelors Project Supervision</h3>
        <table>
            <tr>
                <th>Student Name</th>
                <th>Project Title</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php
            // Display Btech/B.E./Bachelors project supervision data
            if (isset($_SESSION['bachelors_degree'])) {
                foreach ($_SESSION['bachelors_degree'] as $supervision) {
                    echo "<tr>";
                    echo "<td>{$supervision['student_name']}</td>";
                    echo "<td>{$supervision['project_title']}</td>";
                    echo "<td>{$supervision['role']}</td>";
                    echo "<td>{$supervision['status']}</td>";
                    echo "<td>{$supervision['date']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Sponsored Projects/Consultancy Details -->
        <h2 style="margin-top: 20px; margin-bottom: 10px;">Sponsored Projects/Consultancy Details</h2>

        <!-- (a) Sponsored Projects -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(a) Sponsored Projects</h3>
        <table>
            <tr>
                <th>Sponsoring Agency</th>
                <th>Project Title</th>
                <th>Sanctioned Amount</th>
                <th>Period</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
            <?php
            // Display sponsored projects data
            if (isset($_SESSION['sponsored_projects'])) {
                foreach ($_SESSION['sponsored_projects'] as $project) {
                    echo "<tr>";
                    echo "<td>{$project['sponsoring_agency']}</td>";
                    echo "<td>{$project['project_title']}</td>";
                    echo "<td>{$project['sanctioned_amount']}</td>";
                    echo "<td>{$project['period']}</td>";
                    echo "<td>{$project['role']}</td>";
                    echo "<td>{$project['status']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- (b) Consultancy Projects -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">(b) Consultancy Projects</h3>
        <table>
            <tr>
                <th>Organization</th>
                <th>Title</th>
                <th>Contract Amount</th>
                <th>Period</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
            <?php
            // Display consultancy projects data
            if (isset($_SESSION['consultancy_projects'])) {
                foreach ($_SESSION['consultancy_projects'] as $project) {
                    echo "<tr>";
                    echo "<td>{$project['organization']}</td>";
                    echo "<td>{$project['title']}</td>";
                    echo "<td>{$project['contract_amount']}</td>";
                    echo "<td>{$project['period']}</td>";
                    echo "<td>{$project['role']}</td>";
                    echo "<td>{$project['status']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Heading for Significant research contribution and future plans -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Significant research contribution and future plans</h3>
        <?php
        // Display significant research contribution and future plans
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['research_contribution'];
        }
        ?>

        <!-- Heading for Significant teaching contribution and future plans -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Significant teaching contribution and future plans</h3>
        <?php
        // Display significant teaching contribution and future plans
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['teaching_contribution'];
        }
        ?>

        <!-- Heading for Any other relevant information -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Any other relevant information</h3>
        <?php
        // Display any other relevant information
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['other_contribution'];
        }
        ?>

        <!-- Heading for Professional Service as Reviewer/Editor etc. -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Professional Service as Reviewer/Editor etc.</h3>
        <?php
        // Display professional service as reviewer/editor
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['editorship'];
        }
        ?>

        <!-- Heading for Detailed List of Journal Publications -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Detailed List of Journal Publications</h3>
        <?php
        // Display detailed list of journal publications
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['list_journal'];
        }
        ?>

        <!-- Heading for Detailed List of Conference Publications -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;"> Detailed List of Conference Publications</h3>
        <?php
        // Display detailed list of conference publications
        if (isset($_SESSION['contributions'])) {
            echo $_SESSION['contributions']['list_conference'];
        }
        ?>

        <!-- page 8 things left -->



        <!-- Final Declaration -->
        <h3 style="margin-top: 20px; margin-bottom: 10px;">Final Declaration</h3>
        <p>
            I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the
            advertisement and this application form. I further declare that all the entries along with the attachments
            uploaded in this form are true to the best of my knowledge and belief.
        </p>

        <!-- Print Button -->
        <div class="print-btn">
            <button onclick="window.print()">Print</button>
        </div>
        <!-- Add any additional HTML or content here -->
    </div>
    <button onclick="window.print()">Print Page</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
</body>

</html>