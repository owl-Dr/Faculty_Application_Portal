<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1	
?>

<html>

<head>
    <title>Publication Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style type="text/css">
    body {
        background-color: #bbdefb;
        padding-top: 0px !important;
    }
</style>

<body>
    <div class="container-fluid" style="background-color: #2874f0;; margin-bottom: 10px;">
        <div class="container">
            <div class="row" style="margin-bottom:10px; ">
                <div class="col-md-8 col-md-offset-2">
                    <h3
                        style="text-align:center;color:aliceblue!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">
                        भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                    <h3
                        style="text-align:center;color:aliceblue!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">
                        Indian Institute of Technology Patna</h3>
                </div>
            </div>
        </div>
    </div>
    <h3 style="color: #e10425; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;"
        class="blink_me">Application for Faculty Position</h3>

    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .floating-box {
            display: inline-block;
            width: 150px;
            height: 75px;
            margin: 10px;
            border: 3px solid #73AD21;
        }
    </style>
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        label {
            padding: 0 !important;
        }

        span {
            font-size: 1.2em;
            font-family: 'Oswald', sans-serif !important;
            text-align: left !important;
            padding: 0px 10px 0px 0px !important;
            /*margin-bottom: 20px!important;*/

        }

        hr {
            border-top: 1px solid #025198 !important;
            border-style: dashed !important;
            border-width: 1.2px;
        }

        .panel-heading {
            font-size: 1.3em;
            font-family: 'Oswald', sans-serif !important;
            letter-spacing: .5px;
        }

        .btn-primary {
            padding: 9px;
        }
    </style>

    <div class="container" style="border-radius: 4px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
                <form class="form-horizontal" action="page4insert.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ci_csrf_token" value="" />
                    <fieldset>

                        <legend>
                            <div class="row">
                                <div class="col-md-10">
                                    <h4>Welcome : <font color="#025198"><strong><?php echo $loggedInUserName ?></strong>
                                        </font>
                                    </h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="logout.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                                </div>
                            </div>


                        </legend>


                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">5. Summary of Publications *
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <span class="col-md-5 control-label" for="summary_journal_inter">Number of
                                            International Journal Papers</span>
                                        <div class="col-md-1">
                                            <input id="summary_journal_inter" name="summary_journal_inter" type="text"
                                                placeholder="" class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_journal_inter']) ? $_SESSION['Publications']['summary_journal_inter'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="summary_journal">Number of National
                                            Journal Papers</span>
                                        <div class="col-md-1">
                                            <input id="summary_journal" name="summary_journal" type="text"
                                                placeholder="" class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_journal']) ? $_SESSION['Publications']['summary_journal'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="summary_conf_inter">Number of
                                            International Conference Papers</span>
                                        <div class="col-md-1">
                                            <input id="summary_conf_inter" name="summary_conf_inter" type="text"
                                                placeholder="" class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_conf_inter']) ? $_SESSION['Publications']['summary_conf_inter'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="summary_conf_national">Number of
                                            National Conference Papers</span>
                                        <div class="col-md-1">
                                            <input id="summary_conf_national" name="summary_conf_national" type="text"
                                                placeholder="" class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_conf_national']) ? $_SESSION['Publications']['summary_conf_national'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="patent_publish">Number of Patent(s)
                                            [Filed, Published, Granted] </span>
                                        <div class="col-md-1">
                                            <input id="patent_publish" name="patent_publish" type="text" placeholder=""
                                                class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['patent_publish']) ? $_SESSION['Publications']['patent_publish'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="summary_book">Number of Book(s)
                                        </span>
                                        <div class="col-md-1">
                                            <input id="summary_book" name="summary_book" type="text" placeholder=""
                                                class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_book']) ? $_SESSION['Publications']['summary_book'] : ''; ?>">
                                        </div>

                                        <span class="col-md-5 control-label" for="summary_book_chapter">Number of Book
                                            Chapter(s)</span>
                                        <div class="col-md-1">
                                            <input id="summary_book_chapter" name="summary_book_chapter" type="text"
                                                placeholder="" class="form-control input-md" required="" maxlength="3"
                                                value="<?php echo isset($_SESSION['Publications']['summary_book_chapter']) ? $_SESSION['Publications']['summary_book_chapter'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="text-align:center; font-weight: bold; color: #6739bb;">6. List of 10 Best
                                    Publications (Journal/Conference)</h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="addPublication()">Add Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <tbody id="publications1">
                                                <tr height="30px">
                                                    <th class="col-md-1"> S. No.</th>
                                                    <th class="col-md-2"> Author(s)</th>
                                                    <th class="col-md-2"> Title</th>
                                                    <th class="col-md-2"> Name of Journal/Conference</th>
                                                    <th class="col-md-1"> Year, Vol., Page</th>
                                                    <th class="col-md-1"> Impact Factor</th>
                                                    <th class="col-md-1"> DOI</th>
                                                    <th class="col-md-2"> Status</th>
                                                </tr>
                                                <?php
                                                // Assuming $_SESSION['Publications'] contains the data
                                                if (isset($_SESSION['Publishing'])) {
                                                    $publications = $_SESSION['Publishing'];
                                                    foreach ($publications as $index => $pub) {
                                                        echo "<tr height='60px'>";
                                                        echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                        echo "<td class='col-md-2'><input name='authors[]' type='text' placeholder='Author(s)' class='form-control input-md' value='" . $pub['authors'] . "' required></td>";
                                                        echo "<td class='col-md-2'><input name='title[]' type='text' placeholder='Title' class='form-control input-md' value='" . $pub['title'] . "' required></td>";
                                                        echo "<td class='col-md-2'><input name='journal[]' type='text' placeholder='Journal/Conference' class='form-control input-md' value='" . $pub['journal'] . "' required></td>";
                                                        echo "<td class='col-md-1'><input name='year_vol_page[]' type='text' placeholder='Year, Vol., Page' class='form-control input-md' value='" . $pub['year_vol_page'] . "' required></td>";
                                                        echo "<td class='col-md-1'><input name='impact[]' type='text' placeholder='Impact Factor' class='form-control input-md' value='" . $pub['impact'] . "' required></td>";
                                                        echo "<td class='col-md-1'><input name='doi[]' type='text' placeholder='DOI' class='form-control input-md' value='" . $pub['doi'] . "' required></td>";
                                                        echo "<td class='col-md-2'>";
                                                        echo "<select name='status[]' class='form-control input-md' required>";
                                                        echo "<option value=''>Select</option>";
                                                        echo "<option value='published' " . ($pub['status'] == 'published' ? 'selected' : '') . ">Published</option>";
                                                        echo "<option value='accepted' " . ($pub['status'] == 'accepted' ? 'selected' : '') . ">Accepted</option>";
                                                        echo "</select>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Patent Text -->

                        <!-- <div class="container-fluid table-responsive"> -->


                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="text-align:center; font-weight: bold; color: #6739bb;">7. List of Patent(s),
                                    Book(s), Book Chapter(s)</h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">(A) Patent(s)
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addPatent()">Add
                                            Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <tbody id="patent_table_body">
                                                <tr height="30px">
                                                    <th class="col-md-1">S. No.</th>
                                                    <th class="col-md-2">Inventor(s)</th>
                                                    <th class="col-md-2">Title of Patent</th>
                                                    <th class="col-md-2">Country of Patent</th>
                                                    <th class="col-md-1">Patent Number</th>
                                                    <th class="col-md-1">Date of Filing</th>
                                                    <th class="col-md-1">Date of Published</th>
                                                    <th class="col-md-2">Status Filed/Published/Granted</th>
                                                </tr>
                                                <?php
                                                // Assuming $patent_data contains the data fetched from the database
                                                $patent_data = isset($_SESSION['patents']) ? $_SESSION['patents'] : array();

                                                // if (!empty($patent_data)) {
                                                foreach ($patent_data as $index => $patent) {
                                                    echo "<tr height='60px' width='20px'>";
                                                    echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_inventors[]' class='form-control input-md' value='" . $patent['inventor'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_title[]' class='form-control input-md' value='" . $patent['title'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_country[]' class='form-control input-md' value='" . $patent['country'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_number[]' class='form-control input-md' value='" . $patent['patent_number'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_date_filing[]' class='form-control input-md' value='" . $patent['date_filing'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_date_published[]' class='form-control input-md' value='" . $patent['date_published'] . "'></td>";
                                                    echo "<td class='col-md-1'><input type='text' name='patent_status[]' class='form-control input-md' value='" . $patent['status'] . "'></td>";
                                                    echo "</tr>";
                                                }
                                                // }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <!-- Book Text -->

                        <div class="container-fluid table-responsive">
                            <div class="row">
                                <!-- <div class="col-md-12"> -->
                                <h4 style="text-align:center; font-weight: bold; color: #6739bb;">(B) Book(s)</h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">(B) Book(s)
                                        <button type="button" class="btn btn-sm btn-danger" onclick="addBook()">Add
                                            Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <tbody id="book_table_body">
                                                <tr height="30px">
                                                    <th class="col-md-1">S. No.</th>
                                                    <th class="col-md-3">Author(s)</th>
                                                    <th class="col-md-3">Title of the Book</th>
                                                    <th class="col-md-3">Year of Publication</th>
                                                    <th class="col-md-2">ISBN</th>
                                                </tr>
                                                <?php
                                                // Assuming $book_data contains the data fetched from the database
                                                $book_data = isset($_SESSION['books']) ? $_SESSION['books'] : array();
                                                if (!empty($book_data)) {
                                                    foreach ($book_data as $index => $book) {
                                                        echo "<tr>";
                                                        echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                        echo "<td class='col-md-3'><input type='text' name='authors_book[]' value='" . $book['author'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='titles_book[]' value='" . $book['title'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='years_book[]' value='" . $book['year_of_publication'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-2'><input type='text' name='isbns_book[]' value='" . $book['isbn'] . "' class='form-control input-md'></td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>


                        <!-- Book chapter Text -->

                        <div class="container-fluid table-responsive">
                            <div class="row">
                                <!-- <div class="col-md-12"> -->
                                <h4 style="text-align:center; font-weight: bold; color: #6739bb;">(C) Book Chapter(s)
                                </h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="addBookChapter()">Add Details</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <tbody id="book_chapter_table_body">
                                                <tr>
                                                    <th class="col-md-1">S. No.</th>
                                                    <th class="col-md-3">Author(s)</th>
                                                    <th class="col-md-3">Title of the Book Chapter(s)</th>
                                                    <th class="col-md-2">Year of Publication</th>
                                                    <th class="col-md-2">ISBN</th>
                                                </tr>
                                                <?php
                                                // Assuming $book_data contains the data fetched from the database
                                                $book_chapter_data = isset($_SESSION['book_chapters']) ? $_SESSION['book_chapters'] : array();
                                                if (!empty($book_chapter_data)) {
                                                    foreach ($book_chapter_data as $index => $book_chapter) {
                                                        echo "<tr>";
                                                        echo "<td class='col-md-1'>" . ($index + 1) . "</td>";
                                                        echo "<td class='col-md-3'><input type='text' name='book_chapter_authors[]' value='" . $book['author'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='book_chapter_titles[]' value='" . $book['title'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-3'><input type='text' name='book_chapter_years[]' value='" . $book['year_of_publication'] . "' class='form-control input-md'></td>";
                                                        echo "<td class='col-md-2'><input type='text' name='book_chapter_isbns[]' value='" . $book['isbn'] . "' class='form-control input-md'></td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>

                        </div>

                        <h4 style="text-align:center; font-weight: bold; color: #6739bb;">8. Google Scholar Link *</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">URL</div>
                                    <div class="panel-body">
                                        <span class="col-md-2 control-label" for="google_link">Google Scholar Link
                                        </span>
                                        <div class="col-md-10">
                                            <input id="google_link"
                                                value="<?php echo isset($_SESSION['Scholar']['scholar']) ? $_SESSION['Scholar']['scholar'] : ''; ?>"
                                                name="google_link" type="text" placeholder="Google Scholar Link"
                                                class="form-control input-md" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Button -->
                        <div class="form-group">

                            <div class="col-md-1">
                                <a href="page3.php" class="btn btn-primary pull-left"><i
                                        class="glyphicon glyphicon-fast-backward"></i></a>
                            </div>

                            <div class="col-md-11">
                                <button id="submit" type="submit" name="submit" value="Submit"
                                    class="btn btn-success pull-right">SAVE & NEXT</button>

                            </div>


                        </div>


                    </fieldset>
                </form>



            </div>
        </div>
    </div>

    <div id="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
</body>

</html>

<script type="text/javascript">

    function blinker() {
        $('.blink_me').fadeOut(500);
        $('.blink_me').fadeIn(500);
    }

    setInterval(blinker, 1000);

    function addPublication() {
        // Get the table body element
        var tableBody = document.getElementById("publications1");

        // Count the number of existing rows to determine the new serial number
        var rowCount = tableBody.rows.length - 1;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input name="authors[]" type="text" placeholder="Author" class="form-control input-md" required></td>
            <td><input name="title[]" type="text" placeholder="Title" class="form-control input-md" required></td>
            <td><input name="journal[]" type="text" placeholder="Journal Name" class="form-control input-md" required></td>
            <td><input name="year_vol_page[]" type="text" placeholder="Year, Vol., Page" class="form-control input-md" required></td>
            <td><input name="impact[]" type="text" placeholder="Impact Factor" class="form-control input-md" required></td>
            <td><input name="doi[]" type="text" placeholder="DOI" class="form-control input-md" required></td>
            <td>
                <select name="status[]" class="form-control input-md" required>
                    <option value="">Select</option>
                    <option value="published">Published</option>
                    <option value="accepted">Accepted</option>
                </select>
            </td>
            <td><button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this)">X</button></td>
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function addPatent() {
        // Get the table body element
        var tableBody = document.getElementById("patent_table_body");

        // Count the number of existing rows to determine the new serial number
        var rowCount = tableBody.rows.length - 1;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td class='col-md-1'><input name="patent_inventors[]" type="text" placeholder="Inventor(s)" class="form-control input-md" required></td>
            <td class='col-md-2'><input name="patent_title[]" type="text" placeholder="Title of Patent" class="form-control input-md" required></td>
            <td class='col-md-2'><input name="patent_country[]" type="text" placeholder="Country of Patent" class="form-control input-md" required></td>
            <td class='col-md-1'><input name="patent_number[]" type="text" placeholder="Patent Number" class="form-control input-md" required></td>
            <td class='col-md-1'><input name="patent_date_filing[]" type="date" placeholder="Date of Filing" class="form-control input-md" required></td>
            <td class='col-md-1'><input name="patent_date_published[]" type="date" placeholder="Date of Published" class="form-control input-md" required></td>
            <td class='col-md-2'>
                <select name="patent_status[]" class="form-control input-md" required>
                    <option value="">Select</option>
                    <option value="Filed">Filed</option>
                    <option value="Published">Published</option>
                    <option value="Granted">Granted</option>
                </select>
                <button type="button" class="btn btn-danger btn-xs" onclick="removeRow(this)">X</button>
            </td>
            
        `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }


    function addBook() {
        // Get the table body element
        var tableBody = document.getElementById("book_table_body");

        // Count the number of existing rows to determine the new serial number
        var rowCount = tableBody.rows.length - 1;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
        <td class='col-md-1'>${rowCount + 1}</td>
        <td class='col-md-3'><input name='authors_book[]' type="text" placeholder="Author(s)" class="form-control input-md" required></td>
        <td class='col-md-3'><input name='titles_book[]' type="text" placeholder="Title of the Book" class="form-control input-md" required></td>
        <td class='col-md-3'><input name='years_book[]' type="text" placeholder="Year of Publication" class="form-control input-md" required></td>
        <td class='col-md-2'><input name='isbns_book[]' type="text" placeholder="ISBN" class="form-control input-md" required>
        <button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">X</button>
        </td>
    `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function addBookChapter() {
        // Get the table body element
        var tableBody = document.getElementById("book_chapter_table_body");

        // Count the number of existing rows to determine the new serial number
        var rowCount = tableBody.rows.length - 1;

        // Create a new row element
        var newRow = document.createElement("tr");

        // Define the HTML content for the new row
        newRow.innerHTML = `
        <td class='col-md-1'>${rowCount + 1}</td>
        <td><input name="book_chapter_authors[]" type="text" placeholder="Author(s)" class="form-control input-md" required></td>
        <td><input name="book_chapter_titles[]" type="text" placeholder="Title of the Book Chapter(s)" class="form-control input-md" required></td>
        <td><input name="book_chapter_years[]" type="text" placeholder="Year of Publication" class="form-control input-md" required></td>
        <td><input name="book_chapter_isbns[]" type="text" placeholder="ISBN" class="form-control input-md" required>
        <button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">X</button></td>
    `;

        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        // Get the row element containing the button
        var row = button.parentNode.parentNode;

        // Remove the row from the table
        row.parentNode.removeChild(row);
    }


</script>