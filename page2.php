<?php
include "loginchk.php";
include '_dbconnect.php';
// TABLE 1
?>

<html>

<head>
	<title>Academic Details</title>
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

		hr {
			border-top: 1px solid #025198 !important;
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
			<div class="col-xs-12 col-sm-12 col-md-12 well">
				<form class="form-horizontal" action="page2insert.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="ci_csrf_token" value="" />
					<fieldset>

						<legend>
							<div class="row">
								<div class="col-md-10">
									<h4>Welcome : <font color="#025198"><?php echo $loggedInUserName; ?></font>
									</h4>
								</div>
								<div class="col-md-2">
									<a href="logout.php" class="btn btn-sm btn-success pull-right">Logout</a>
								</div>
							</div>
						</legend>

						<h4 style="text-align:center; font-weight: bold; color: #6739bb;">2. Educational Qualifications
						</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">(A) Details of PhD *</div>
									<div class="panel-body">

										<span class="col-md-2 control-label"
											for="college_phd">University/Institute</span>
										<div class="col-md-4">
											<input id="college_phd"
												value="<?php echo isset($_SESSION['Phd_Thesis']['University_Institute']) ? $_SESSION['Phd_Thesis']['University_Institute'] : ''; ?>"
												name="college_phd" type="text" placeholder="University/Institute"
												class="form-control input-md" autofocus="" required="">
										</div>

										<span class="col-md-2 control-label" for="stream">Department</span>
										<div class="col-md-4">
											<input id="stream"
												value="<?php echo isset($_SESSION['Phd_Thesis']['Department']) ? $_SESSION['Phd_Thesis']['Department'] : ''; ?>"
												name="stream" type="text" placeholder="Department"
												class="form-control input-md" autofocus="">
										</div>

										<span class="col-md-2 control-label" for="supervisor">Name of PhD
											Supervisor</span>
										<div class="col-md-4">
											<input id="supervisor" name="supervisor" type="text"
												placeholder="Name of Ph. D. Supervisor"
												value="<?php echo isset($_SESSION['Phd_Thesis']['Supervisor_Name']) ? $_SESSION['Phd_Thesis']['Supervisor_Name'] : ''; ?>"
												class="form-control input-md" required="">
										</div>

										<span class="col-md-2 control-label" for="yoj_phd">Year of Joining</span>
										<div class="col-md-4">
											<input id="yoj_phd"
												value="<?php echo isset($_SESSION['Phd_Thesis']['Year_of_Joining']) ? $_SESSION['Phd_Thesis']['Year_of_Joining'] : ''; ?>"
												name="yoj_phd" type="text" placeholder="Year of Joining"
												class="form-control input-md" required="">
										</div>

										<div class="row">
											<div class="col-md-12">
												<span class="col-md-2 control-label" for="dod_phd">Date of Successful
													Thesis Defence</span>
												<div class="col-md-4">
													<input id="dod_phd" name="dod_phd" type="date"
														value="<?php echo isset($_SESSION['Phd_Thesis']['Successful_Thesis_Date']) ? $_SESSION['Phd_Thesis']['Successful_Thesis_Date'] : ''; ?>"
														class="form-control input-md datepicker" required="">
												</div>

												<span class="col-md-2 control-label" for="doa_phd">Date of Award</span>
												<div class="col-md-4">
													<input id="doa_phd" name="doa_phd" type="date"
														value="<?php echo isset($_SESSION['Phd_Thesis']['Award_Date']) ? $_SESSION['Phd_Thesis']['Award_Date'] : ''; ?>"
														class="form-control input-md datepicker" required="">
												</div>
											</div>
										</div>
										<br />
										<span class="col-md-2 control-label" for="phd_title">Title of PhD Thesis</span>
										<div class="col-md-10">
											<input id="phd_title"
												value="<?php echo isset($_SESSION['Phd_Thesis']['Thesis_Title']) ? $_SESSION['Phd_Thesis']['Thesis_Title'] : ''; ?>"
												name="phd_title" type="text" placeholder="Title of PhD Thesis"
												class="form-control input-md" required="">
										</div>

									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">(B) Academic Details - M. Tech./ M.E./ PG Details</div>
									<div class="panel-body">

										<span class="col-md-2 control-label" for="pg_degree">Degree/Certificate</span>
										<div class="col-md-4">
											<input id="pg_degree"
												value="<?php echo isset($_SESSION['MTech']['Degree_Certificate']) ? $_SESSION['MTech']['Degree_Certificate'] : ''; ?>"
												name="pg_degree" type="text" placeholder="Degree/Certificate"
												class="form-control input-md" autofocus="">
										</div>

										<span class="col-md-2 control-label"
											for="pg_college">University/Institute</span>
										<div class="col-md-4">
											<input id="pg_college"
												value="<?php echo isset($_SESSION['MTech']['University_Institute']) ? $_SESSION['MTech']['University_Institute'] : ''; ?>"
												name="pg_college" type="text" placeholder="University/Institute"
												class="form-control input-md" autofocus="">
										</div>

										<span class="col-md-2 control-label" for="pg_subjects">Branch/Stream</span>
										<div class="col-md-4">
											<input id="pg_subjects" name="pg_subjects" type="text"
												placeholder="Branch/Stream"
												value="<?php echo isset($_SESSION['MTech']['Branch_Stream']) ? $_SESSION['MTech']['Branch_Stream'] : ''; ?>"
												class="form-control input-md">
										</div>

										<span class="col-md-2 control-label" for="pg_yoj">Year of Joining</span>
										<div class="col-md-4">
											<input id="pg_yoj"
												value="<?php echo isset($_SESSION['MTech']['Year_of_Joining']) ? $_SESSION['MTech']['Year_of_Joining'] : ''; ?>"
												name="pg_yoj" type="text" placeholder="Year of Joining"
												class="form-control input-md">
										</div>

										<div class="row">
											<div class="col-md-12">
												<span class="col-md-2 control-label" for="pg_yog">Year of
													Completion</span>
												<div class="col-md-4">
													<input id="pg_yog" name="pg_yog" type="text"
														placeholder="Year of Completion"
														value="<?php echo isset($_SESSION['MTech']['Year_of_Completion']) ? $_SESSION['MTech']['Year_of_Completion'] : ''; ?>"
														class="form-control input-md">
												</div>

												<span class="col-md-2 control-label" for="pg_duration">Duration (in
													years)</span>
												<div class="col-md-4">
													<input id="pg_duration" name="pg_duration" type="text"
														placeholder="Duration"
														value="<?php echo isset($_SESSION['MTech']['Duration_Years']) ? $_SESSION['MTech']['Duration_Years'] : ''; ?>"
														class="form-control input-md">
												</div>

												<span class="col-md-2 control-label"
													for="pg_perce">Percentage/CGPA</span>
												<div class="col-md-4">
													<input id="pg_perce" name="pg_perce" type="text"
														placeholder="Percentage/CGPA"
														value="<?php echo isset($_SESSION['MTech']['Percentage_CGPA']) ? $_SESSION['MTech']['Percentage_CGPA'] : ''; ?>"
														class="form-control input-md">
												</div>

												<span class="col-md-2 control-label" for="pg_rank">Division/Class</span>
												<div class="col-md-4">
													<input id="pg_rank" name="pg_rank" type="text"
														placeholder="Division/Class"
														value="<?php echo isset($_SESSION['MTech']['Division_Class']) ? $_SESSION['MTech']['Division_Class'] : ''; ?>"
														class="form-control input-md">
												</div>

											</div>
										</div>
										<br />

									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">(C) Academic Details - B. Tech /B.E. / UG Details *</div>
									<div class="panel-body">

										<span class="col-md-2 control-label" for="ug_degree">Degree/Certificate</span>
										<div class="col-md-4">
											<input id="ug_degree"
												value="<?php echo isset($_SESSION['BTech']['Degree_Certificate']) ? $_SESSION['BTech']['Degree_Certificate'] : ''; ?>"
												name="ug_degree" type="text" placeholder="Degree/Certificate"
												class="form-control input-md" autofocus="" required="">
										</div>

										<span class="col-md-2 control-label"
											for="ug_college">University/Institute</span>
										<div class="col-md-4">
											<input id="ug_college"
												value="<?php echo isset($_SESSION['BTech']['University_Institute']) ? $_SESSION['BTech']['University_Institute'] : ''; ?>"
												name="ug_college" type="text" placeholder="University/Institute"
												class="form-control input-md" autofocus="">
										</div>

										<span class="col-md-2 control-label" for="ug_subjects">Branch/Stream</span>
										<div class="col-md-4">
											<input id="ug_subjects" name="ug_subjects" type="text"
												placeholder="Branch/Stream"
												value="<?php echo isset($_SESSION['BTech']['Branch_Stream']) ? $_SESSION['BTech']['Branch_Stream'] : ''; ?>"
												class="form-control input-md" required="">
										</div>

										<span class="col-md-2 control-label" for="ug_yoj">Year of Joining</span>
										<div class="col-md-4">
											<input id="ug_yoj"
												value="<?php echo isset($_SESSION['BTech']['Year_of_Joining']) ? $_SESSION['BTech']['Year_of_Joining'] : ''; ?>"
												name="ug_yoj" type="text" placeholder="Year of Joining"
												class="form-control input-md" required="">
										</div>

										<div class="row">
											<div class="col-md-12">
												<span class="col-md-2 control-label" for="ug_yog">Year of
													Completion</span>
												<div class="col-md-4">
													<input id="ug_yog" name="ug_yog" type="text"
														placeholder="Year of Completion"
														value="<?php echo isset($_SESSION['BTech']['Year_of_Completion']) ? $_SESSION['BTech']['Year_of_Completion'] : ''; ?>"
														class="form-control input-md" required="">
												</div>

												<span class="col-md-2 control-label" for="ug_duration">Duration (in
													years)</span>
												<div class="col-md-4">
													<input id="ug_duration" name="ug_duration" type="text"
														placeholder="Duration"
														value="<?php echo isset($_SESSION['BTech']['Duration_Years']) ? $_SESSION['BTech']['Duration_Years'] : ''; ?>"
														class="form-control input-md" required="">
												</div>

												<span class="col-md-2 control-label"
													for="ug_perce">Percentage/CGPA</span>
												<div class="col-md-4">
													<input id="ug_perce" name="ug_perce" type="text"
														placeholder="Percentage/ CGPA"
														value="<?php echo isset($_SESSION['BTech']['Percentage_CGPA']) ? $_SESSION['BTech']['Percentage_CGPA'] : ''; ?>"
														class="form-control input-md" required="">
												</div>

												<span class="col-md-2 control-label" for="ug_rank">Division/Class</span>
												<div class="col-md-4">
													<input id="ug_rank" name="ug_rank" type="text"
														placeholder="Division/Class"
														value="<?php echo isset($_SESSION['BTech']['Division_Class']) ? $_SESSION['BTech']['Division_Class'] : ''; ?>"
														class="form-control input-md" required="">
												</div>
											</div>
										</div>
										<br />
									</div>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">(D) Academic Details - School *

									</div>
									<div class="panel-body">
										<table class="table table-bordered">
											<tr height="30px">
												<th class="col-md-2"> 10th/12th/HSC/Diploma </th>
												<th class="col-md-2"> School </th>
												<th class="col-md-2"> Year of Passing</th>
												<th class="col-md-2"> Percentage/ CGPA </th>
												<th class="col-md-2"> Division/Class</th>
											</tr>
											<?php
											// Loop through each row in the array
											for ($index = 0; $index < 2; $index++) {
												// Check if data exists for this index
												if (isset($_SESSION['School'][$index])) {
													// If data exists, fetch the row
													$row = $_SESSION['School'][$index];
												} else {
													// If no data exists, initialize an empty row
													$row = array(
														'Exam_Type' => '',
														'School' => '',
														'Year_of_Passing' => '',
														'Percentage_Grade' => '',
														'Division_Class' => ''
													);
												}

												if ($index == 0) {
													$row['Exam_Type'] = '12th/HSC/Diploma';
												} else {
													$row['Exam_Type'] = '10th';
												}
												// Output the HTML code with the input fields pre-populated with the data or placeholders
												echo '<tr height="60px">';
												echo '<td class="col-md-2">';
												echo '<input id="hsc_ssc' . ($index + 1) . '" name="hsc_ssc[]" type="text" value="' . htmlspecialchars($row['Exam_Type']) . '" placeholder="" class="form-control input-md" readonly="" required="">';
												echo '</td>';
												echo '<td class="col-md-2">';
												echo '<input id="school' . ($index + 1) . '" name="school[]" type="text" value="' . htmlspecialchars($row['School']) . '" placeholder="School" class="form-control input-md" maxlength="80" required="">';
												echo '</td>';
												echo '<td class="col-md-2">';
												echo '<input id="passing_year' . ($index + 1) . '" name="passing_year[]" type="text" value="' . htmlspecialchars($row['Year_of_Passing']) . '" placeholder="Passing Year" class="form-control input-md" maxlength="5" required="">';
												echo '</td>';
												echo '<td class="col-md-2">';
												echo '<input id="s_perce' . ($index + 1) . '" name="s_perce[]" type="text" value="' . htmlspecialchars($row['Percentage_Grade']) . '" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">';
												echo '</td>';
												echo '<td class="col-md-2">';
												echo '<input id="s_rank' . ($index + 1) . '" name="s_rank[]" type="text" value="' . htmlspecialchars($row['Division_Class']) . '" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">';
												echo '</td>';
												echo '</tr>';
											}
											?>

										</table>

									</div>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">(E) Additional Educational Qualification (If any)
										<button class="btn btn-sm btn-danger" id="add_more_acde">Add More</button>
									</div>
									<div class="panel-body">
										<table class="table table-bordered">
											<tbody id="acde">
												<tr height="30px">
													<th class="col-md-2"> Degree/Certificate </th>
													<th class="col-md-2"> University/Institute </th>
													<th class="col-md-2"> Branch/Stream </th>
													<th class="col-md-1"> Year of Joining</th>
													<th class="col-md-1"> Year of Completion </th>
													<th class="col-md-1"> Duration (in years)</th>
													<th class="col-md-3"> Percentage/ CGPA </th>
													<th class="col-md-3"> Division/Class</th>
												</tr>
												<?php
												// Check if $_SESSION['Additional_Education'] is set and not empty
												if (isset($_SESSION['Additional_Education']) && !empty($_SESSION['Additional_Education'])) {
													// Loop through each record in $_SESSION['Additional_Education']
													foreach ($_SESSION['Additional_Education'] as $record) {
														?>
														<tr height="60px">
															<td class="col-md-2">
																<input id="add_degree1" name="add_degree[]" type="text"
																	value="<?= htmlspecialchars($record['Degree_Certificate']) ?>"
																	placeholder="Degree" class="form-control input-md"
																	maxlength="10" required="">
															</td>
															<td class="col-md-2">
																<input id="add_college1" name="add_college[]" type="text"
																	value="<?= htmlspecialchars($record['University_Institute']) ?>"
																	placeholder="College" class="form-control input-md"
																	maxlength="80" required="">
															</td>
															<td class="col-md-2">
																<input id="add_subjects1" name="add_subjects[]" type="text"
																	value="<?= htmlspecialchars($record['Branch_Stream']) ?>"
																	placeholder="Subjects" class="form-control input-md"
																	maxlength="80" required="">
															</td>
															<td class="col-md-2">
																<input id="add_yoj1" name="add_yoj[]" type="text"
																	value="<?= htmlspecialchars($record['Year_of_Joining']) ?>"
																	placeholder="Year of Joining" class="form-control input-md"
																	maxlength="5" required="">
															</td>
															<td class="col-md-2">
																<input id="add_yog1" name="add_yog[]" type="text"
																	value="<?= htmlspecialchars($record['Year_of_Completion']) ?>"
																	placeholder="Year of Graduation"
																	class="form-control input-md" maxlength="5" required="">
															</td>
															<td class="col-md-2">
																<input id="add_duration1" name="add_duration[]" type="text"
																	value="<?= htmlspecialchars($record['Duration_Years']) ?>"
																	placeholder="Duration" class="form-control input-md"
																	maxlength="4" required="">
															</td>
															<td class="col-md-2">
																<input id="add_perce1" name="add_perce[]" type="text"
																	value="<?= htmlspecialchars($record['Percentage_CGPA']) ?>"
																	placeholder="Percentage" class="form-control input-md"
																	maxlength="5" required="">
															</td>
															<td class="col-md-2">
																<input id="add_rank1" name="add_rank[]" type="text"
																	value="<?= htmlspecialchars($record['Division_Class']) ?>"
																	placeholder="Percentage" class="form-control input-md"
																	maxlength="5" required="">
															</td>
														</tr>
														<?php
													} // End of foreach loop
												} // End of if condition
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>


						<!-- Form Name -->



						<div class="form-group">

							<div class="col-md-1">
								<a href="page1.php" class="btn btn-primary pull-left"><i
										class="glyphicon glyphicon-fast-backward"></i></a>
							</div>

							<div class="col-md-11">
								<button id="submit" type="submit" name="submit" value="Submit"
									class="btn btn-success pull-right" style="margin-left: 75%;">SAVE & NEXT</button>

							</div>


						</div>

					</fieldset>
				</form>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		function yearcalc() {
			// alert('hi');
			var num1 = document.getElementById("yoj").value;
			var num2 = document.getElementById("yog").value;

			var duration_year = parseFloat(num2) - parseFloat(num1);
			// alert(duration_year);
			document.getElementById("result_test").value = duration_year;

		}


	</script>

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

	// Function to add a new empty row
	function addEmptyRow(event) {
		// Prevent the default form submission behavior
		event.preventDefault();

		var tableBody = document.getElementById('acde');
		var newRow = document.createElement('tr');
		newRow.setAttribute('height', '60px');
		newRow.innerHTML = `
			<td class="col-md-2">
				<input name="add_degree[]" type="text" value="" placeholder="Degree" class="form-control input-md" maxlength="10" required="">
			</td>
			<td class="col-md-2">
				<input name="add_college[]" type="text" value="" placeholder="College" class="form-control input-md" maxlength="80" required="">
			</td>
			<td class="col-md-2">
				<input name="add_subjects[]" type="text" value="" placeholder="Subjects" class="form-control input-md" maxlength="80" required="">
			</td>
			<td class="col-md-2">
				<input name="add_yoj[]" type="text" value="" placeholder="Year of Joining" class="form-control input-md" maxlength="5" required="">
			</td>
			<td class="col-md-2">
				<input name="add_yog[]" type="text" value="" placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required="">
			</td>
			<td class="col-md-2">
				<input name="add_duration[]" type="text" value="" placeholder="Duration" class="form-control input-md" maxlength="4" required="">
			</td>
			<td class="col-md-2">
				<input name="add_perce[]" type="text" value="" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
			</td>
			<td class="col-md-2">
				<input name="add_rank[]" type="text" value="" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
								<button class="btn btn-danger btn-xs pull-right" onclick="removeRow(this)">X</button>
			</td>
		`;
		tableBody.appendChild(newRow);
	}

	function removeRow(button) {
		var row = button.parentNode.parentNode;
		row.parentNode.removeChild(row);
	}

	// Add event listener to the "Add More" button
	document.getElementById('add_more_acde').addEventListener('click', addEmptyRow);
</script>