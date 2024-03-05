<?php
include "connect.php";
if (empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') header('Location: login.php');
$student_id = $_SESSION['student_id'];
$student = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM students WHERE `student_id` = '$student_id'"));

if (isset($_POST['editdetails'])) {
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$student_mobile = $_POST['student_mobile'];
	$batch = $_POST['batch'];
	$department = $_POST['department'];
	$section = $_POST['section'];
	if (empty($_POST['password'])) $password = $student['password'];
	else {
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		if ($password != $confirmPassword) echo "<script>alert('Password and Confirm Password Not Matched');</script>";
	}
	$father_name = $_POST['father_name'];
	$mother_name = $_POST['mother_name'];
	$home_town = $_POST['home_town'];
	$Transportation = $_POST['Transportation'];

	if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
		$targetDir = "Bhavani/img/students/";
		$imageName = strtolower(basename($_FILES["photo"]["name"]));
		$imageName = str_replace(' ', '-', $imageName);
		$imageName = $student_id . '_' . $imageName;
		$targetFile = $targetDir . $imageName;
		$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

		// Check file size
		if ($_FILES["photo"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			exit();
		}

		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			exit();
		}

		// Move the uploaded file to the uploads directory
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
			$imageName = $imageName;
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} else {
		echo "No file was uploaded.";
		$imageName = $student['photo'];
	}
	$sql = "UPDATE students SET student_name = '$firstName', email = '$email', `photo` = '$imageName', student_mobile = '$student_mobile', Batch = '$batch', Department = '$department', Section = '$section', `password` = '$password', father_name = '$father_name', mother_name = '$mother_name', home_town = '$home_town', Transportation = '$Transportation' WHERE student_id = '$student_id'";
	if (mysqli_query($con, $sql)) {
		echo "<script>alert('Details Updated Successfully');</script>";
	} else {
		echo "<script>alert('Details Not Updated');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SRKR Campus Online Store</title>

	<meta name="keywords" content="WebSite Template" />
	<meta name="description" content="Porto - Multipurpose Website Template">
	<meta name="author" content="okler.net">

	<!-- Favicon -->
	<link rel="shortcut icon" href="Bhavani/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="Bhavani/img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="Bhavani/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/animate/animate.compat.css">
	<link rel="stylesheet" href="Bhavani/vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/magnific-popup/magnific-popup.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/css/star-rating.min.css">
	<link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="Bhavani/css/theme.css">
	<link rel="stylesheet" href="Bhavani/css/theme-elements.css">
	<link rel="stylesheet" href="Bhavani/css/theme-blog.css">
	<link rel="stylesheet" href="Bhavani/css/theme-shop.css">

	<!-- Skin CSS -->
	<link id="skinCSS" rel="stylesheet" href="Bhavani/css/skins/default.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="Bhavani/css/custom.css">

	<!-- Head Libs -->
	<script src="Bhavani/vendor/modernizr/modernizr.min.js"></script>

</head>

<body data-plugin-page-transition>

	<div class="body">
		<!-- Offere Ends Here Shiva -->
		<?php include "shoping_header.php" ?>
		<!-- Headre Comes Here Shiva -->

		<div role="main" class="main">

			<div class="container pt-3 pb-2">

				<div class="row pt-2">
					<div class="col-lg-3 mt-4 mt-lg-0">
						<form role="form" method="post" action="#" class="needs-validation" enctype="multipart/form-data">

							<div class="d-flex justify-content-center mb-4">
								<div class="profile-image-outer-container">
									<div class="profile-image-inner-container bg-color-primary">
										<img src="Bhavani/img/students/<?php echo $student['photo'] ?>">
										<span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
									</div>
									<input type="file" name="photo" id="file" class="form-control profile-image-input">
								</div>
							</div>



							<aside class="sidebar mt-2" id="sidebar">
								<ul class="nav nav-list flex-column mb-5">
									<li class="nav-item"><a class="nav-link text-3 text-dark active" data-bs-toggle="collapse" data-bs-target="#myprofiledata" aria-expanded="false" aria-controls="myprofiledata">My Profile</a></li>
									<li class="nav-item"><a class="nav-link text-3" data-bs-toggle="collapse" data-bs-target="#accountdata" aria-expanded="false" aria-controls="accountdata">Account Information </a></li>
									<li class="nav-item"><a class="nav-link text-3" data-bs-toggle="collapse" data-bs-target="#ordersdata" aria-expanded="false" aria-controls="ordersdata">Orders</a></li>
								</ul>
							</aside>


					</div>


					<div class="col-lg-9">

						<!-- Start of scroll -->

						<!-- <div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
							<div class="card card-default">
								<div class="card-header" id="collapse100HeadingOne">
									<h4 class="card-title m-0">
										<a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100One" aria-expanded="false" aria-controls="collapse100One">
											Scroll Name
										</a>
									</h4>
								</div>
								<div id="collapse100One" class="collapse" aria-labelledby="collapse100HeadingOne" data-bs-parent="#accordion100">
									<div class="card-body">
									
									Data in the Scroll
									
									</div>
								</div>
							</div>

						</div> -->
						<!-- End of scroll -->

						<div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
							<div class="card card-default">
								<div class="card-header" id="myprofile">
									<h4 class="card-title m-0">
										<a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#myprofiledata" aria-expanded="false" aria-controls="myprofiledata">
											Student Profile
										</a>
									</h4>
								</div>
								<div id="myprofiledata" class="collapse" aria-labelledby="myprofile" data-bs-parent="#accordion100">
									<div class="card-body">

										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">First name</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" name="firstName" value="<?php echo $student['student_name'] ?>" required>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Email</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="email" name="email" value="<?php echo $student['email'] ?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Mobile</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" name="student_mobile" value="<?php echo $student['student_mobile'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Register Number</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" disabled name="student_id" value="<?php echo $student['student_id'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Batch <span class="text-color-danger">*</span></label>
											<div class="col-lg-9">
												<select class="form-select form-control h-auto py-2" name="batch" required>
													<option value="" <?php if ($student['Batch'] == NULL) echo "selected"; ?>>Select the Batch</option>
													<option <?php if ($student['Batch'] == "2027") echo "selected"; ?> value="2027">First Year</option>
													<option <?php if ($student['Batch'] == "2026") echo "selected"; ?> value="2026">Second Year</option>
													<option <?php if ($student['Batch'] == "2025") echo "selected"; ?> value="2025">Third Year</option>
													<option <?php if ($student['Batch'] == "2024") echo "selected"; ?> value="2024">Fourth Year</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Department <span class="text-color-danger">*</span></label>
											<div class="col-lg-9">
												<select class="form-select form-control h-auto py-2" name="department" required>
													<option value="" <?php if ($student['Department'] == NULL) echo "selected"; ?>>Select the Department</option>
													<option <?php if ($student['Department'] == "AIDS") echo "selected"; ?> value="AIDS">AIDS</option>
													<option <?php if ($student['Department'] == "AIML") echo "selected"; ?> value="AIML">AIML</option>
													<option <?php if ($student['Department'] == "CSD") echo "selected"; ?> value="CSD">CSD</option>
													<option <?php if ($student['Department'] == "CSE") echo "selected"; ?> value="CSE">CSE</option>
													<option <?php if ($student['Department'] == "CSBS") echo "selected"; ?> value="CSBS">CSBS</option>
													<option <?php if ($student['Department'] == "CSIT") echo "selected"; ?> value="CSIT">CSIT</option>
													<option <?php if ($student['Department'] == "CIC") echo "selected"; ?> value="CIC">CIC</option>
													<option <?php if ($student['Department'] == "CIVIL") echo "selected"; ?> value="CIVIL">CIVIL</option>
													<option <?php if ($student['Department'] == "ECE") echo "selected"; ?> value="ECE">ECE</option>
													<option <?php if ($student['Department'] == "EEE") echo "selected"; ?> value="EEE">EEE</option>
													<option <?php if ($student['Department'] == "IT") echo "selected"; ?> value="IT">IT</option>
													<option <?php if ($student['Department'] == "MECH") echo "selected"; ?> value="MECH">MECH</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Section <span class="text-color-danger">*</span></label>
											<div class="col-lg-9">
												<select class="form-select form-control h-auto py-2" name="section" required>
													<option <?php if ($student['Section'] == NULL) echo "selected"; ?> value="">Select the Section</option>
													<option <?php if ($student['Section'] == "A") echo "selected"; ?> value="A">A</option>
													<option <?php if ($student['Section'] == "B") echo "selected"; ?> value="B">B</option>
													<option <?php if ($student['Section'] == "C") echo "selected"; ?> value="C">C</option>
													<option <?php if ($student['Section'] == "D") echo "selected"; ?> value="D">D</option>
													<option <?php if ($student['Section'] == "E") echo "selected"; ?> value="E">E</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Father Name</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" name="father_name" value="<?php echo $student['father_name'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Mother Name</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" name="mother_name" value="<?php echo $student['mother_name'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Home Town</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="text" name="home_town" value="<?php echo $student['home_town'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Transportation</label>
											<div class="col-lg-9">
												<select class="form-select form-control h-auto py-2" name="Transportation" required>
													<option <?php if ($student['Transportation'] == NULL) echo "selected"; ?> value="">Select the Section</option>
													<option <?php if ($student['Transportation'] == "College Bus") echo "selected"; ?> value="College Bus">College Bus</option>
													<option <?php if ($student['Transportation'] == "RTC") echo "selected"; ?> value="RTC">RTC</option>
													<option <?php if ($student['Transportation'] == "Own Vehicle") echo "selected"; ?> value="Own Vehicle">Own Vehicle</option>
													<option <?php if ($student['Transportation'] == "Hostel") echo "selected"; ?> value="Hostel">Hostel</option>
													<option <?php if ($student['Transportation'] == "Room") echo "selected"; ?> value="Room">Room</option>
													<option <?php if ($student['Transportation'] == "Local") echo "selected"; ?> value="Local">Local</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Password</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="password" name="password" value="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Confirm password</label>
											<div class="col-lg-9">
												<input class="form-control text-3 h-auto py-2" type="password" name="confirmPassword" value="">
											</div>
										</div>
										<div class="form-group row">
											<div class="form-group col-lg-9">

											</div>
											<div class="form-group col-lg-3">
												<input type="submit" value="Save" name="editdetails" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
											</div>
										</div>
										</form>

									</div>
								</div>
							</div>

							<div class="card card-default">
								<div class="card-header" id="account">
									<h4 class="card-title m-0">
										<a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#accountdata" aria-expanded="false" aria-controls="accountdata">
											Account Information
										</a>
									</h4>
								</div>
								<div id="accountdata" class="collapse" aria-labelledby="account" data-bs-parent="#accordion100">
									<div class="card-body">

									<h4>Bordered</h4>

									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													#
												</th>
												<th>
													First Name
												</th>
												<th>
													Last Name
												</th>
												<th>
													Username
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
												</td>
												<td>
													Mark
												</td>
												<td>
													Otto
												</td>
												<td>
													@mdo
												</td>
											</tr>
											<tr>
												<td>
													2
												</td>
												<td>
													Jacob
												</td>
												<td>
													Thornton
												</td>
												<td>
													@fat
												</td>
											</tr>
											<tr>
												<td>
													3
												</td>
												<td>
													Larry
												</td>
												<td>
													the Bird
												</td>
												<td>
													@twitter
												</td>
											</tr>
										</tbody>
									</table>

										<h4>With Icons</h4>
										<div class="accordion" id="accordion6">
											<div class="card card-default">
												<div class="card-header">
													<h4 class="card-title m-0">
														<a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion6" href="#collapse6One">
															<i class="fas fa-users"></i> Accordion Title 1
														</a>
													</h4>
												</div>
												<div id="collapse6One" class="collapse show">
													<div class="card-body">

														<h4>Contextual classes</h4>

														<table class="table">
															<thead>
																<tr>
																	<th>
																		#
																	</th>
																	<th>
																		Column heading
																	</th>
																	<th>
																		Column heading
																	</th>
																	<th>
																		Column heading
																	</th>
																</tr>
															</thead>
															<tbody>
																<tr class="bg-primary text-light">
																	<th scope="row">
																		1
																	</th>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																</tr>
																<tr>
																	<th scope="row">
																		2
																	</th>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																</tr>

															</tbody>
														</table>

													</div>
												</div>
											</div>

										</div>

										<h4>Without Background</h4>
										<div class="accordion" id="accordion6">
											<div class="card card-default">
												<div class="card-header">
													<h4 class="card-title m-0">
														<a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion6" href="#collapse6One">
															<i class="fas fa-users"></i> Accordion Title 1
														</a>
													</h4>
												</div>
												<div id="collapse6One" class="collapse show">
													<div class="card-body">

														<h4>Contextual classes</h4>

														<table class="table">
															<thead>
																<tr>
																	<th>
																		#
																	</th>
																	<th>
																		Column heading
																	</th>
																	<th>
																		Column heading
																	</th>
																	<th>
																		Column heading
																	</th>
																</tr>
															</thead>
															<tbody>
																<tr class="bg-primary text-light">
																	<th scope="row">
																		1
																	</th>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																</tr>
																<tr>
																	<th scope="row">
																		2
																	</th>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																	<td>
																		Column content
																	</td>
																</tr>

															</tbody>
														</table>

													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<div class="card card-default">
								<div class="card-header" id="orders">
									<h4 class="card-title m-0">
										<a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#ordersdata" aria-expanded="false" aria-controls="ordersdata">
											Orders History
										</a>
									</h4>
								</div>
								<div id="ordersdata" class="collapse" aria-labelledby="orders" data-bs-parent="#accordion100">
									<div class="card-body">
										<div id="comments" class="post-block mt-5 post-comments">
											<h4 class="mb-3">Comments (3)</h4>
											<ul class="comments">

												<li>
													<div class="comment">
														<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
															<img class="avatar" alt="" src="img/avatars/avatar.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>John Doe</strong>
																<span class="float-end">
																	<span>
																		<a href="#">
																			<i class="fas fa-reply"></i> Reply
																		</a>
																	</span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date float-end">January 12, 2023 at 1:38 pm</span>
														</div>
													</div>
												</li>
												<li>
													<div class="comment">
														<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
															<img class="avatar" alt="" src="img/avatars/avatar.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>John Doe</strong>
																<span class="float-end">
																	<span>
																		<a href="#">
																			<i class="fas fa-reply"></i> Reply
																		</a>
																	</span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date float-end">January 12, 2023 at 1:38 pm</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>

		<?php include 'shoping_fotter.php'; ?>
		<!-- Fotter Come Here Shiva -->
	</div>


	<!-- Vendor -->
	<script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>
	<script src="Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
	<script src="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
	<script src="Bhavani/vendor/jquery.countdown/jquery.countdown.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="Bhavani/js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="Bhavani/js/views/view.shop.js"></script>

	<!-- Theme Custom -->
	<script src="Bhavani/js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="Bhavani/js/theme.init.js"></script>

</body>

</html>