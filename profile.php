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

                                        <a href="#" class="btn btn-outline btn-success mb-2" data-bs-toggle="modal" data-bs-target="#rechargepopup">Reacharge Cridets</a>

                                        <h4>Avabile Criedents</h4>

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Account
                                                    </th>
                                                    <th>
                                                        Avabile
                                                    </th>
                                                    <th>
                                                        used
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Cridets
                                                    </td>
                                                    <td>
                                                        <?php echo $student['cridets'] ?>
                                                    </td>
                                                    <td>
                                                        <?php $used1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(`credites_used`) as used FROM `credites` WHERE `student_id` = '$student_id'"))['used'];
                                                        echo $used1; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        Recharge
                                                    </td>
                                                    <td>
                                                        <?php echo $student['reacharge'] ?>
                                                    </td>
                                                    <td>
                                                        <?php $used2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(`recharge_points_used`) as used FROM `recharge_used` WHERE `student_id` = '$student_id'"))['used'];
                                                        echo $used2; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3
                                                    </td>
                                                    <td>
                                                        Total
                                                    </td>
                                                    <td>
                                                        <?php echo $student['reacharge'] + $student['cridets'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $used1 + $used2; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="accordion" id="accordion6">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h4 class="card-title m-0">
                                                        <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion6" href="#collapse6One">
                                                            <i class="fas fa-users"></i> Cridets Used
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse6One" class="collapse show">
                                                    <div class="card-body">


                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Order ID
                                                                    </th>
                                                                    <th>
                                                                        order Date
                                                                    </th>
                                                                    <th>
                                                                        order Amount
                                                                    </th>
                                                                    <th>
                                                                        Remaining Amount
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $cridets_used = mysqli_query($con, "SELECT * FROM `credites` WHERE `student_id` = '$student_id' ORDER BY date(`date`) DESC");
                                                                while ($cridets_row = mysqli_fetch_assoc($cridets_used)) {

                                                                ?>
                                                                    <tr class="bg-primary text-light">
                                                                        <th scope="row">
                                                                            <?php echo $cridets_row['order_id'] ?>
                                                                        </th>
                                                                        <td>
                                                                            <?php echo $cridets_row['date'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $cridets_row['credites_used'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $cridets_row['avalible_credites'] - $cridets_row['credites_used'] ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>


                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="accordion" id="accordion6">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h4 class="card-title m-0">
                                                        <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion6" href="#collapse6One">
                                                            <i class="fas fa-users"></i> Recharges Used
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse6One" class="collapse show">
                                                    <div class="card-body">

                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Order ID
                                                                    </th>
                                                                    <th>
                                                                        order Date
                                                                    </th>
                                                                    <th>
                                                                        order Amount
                                                                    </th>
                                                                    <th>
                                                                        Remaining Amount
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $recharge_used = mysqli_query($con, "SELECT * FROM `recharge_used` WHERE `student_id` = '$student_id' ORDER BY date(`date`) DESC");
                                                                while ($recharge_row = mysqli_fetch_assoc($recharge_used)) {

                                                                ?>
                                                                    <tr class="bg-primary text-light">
                                                                        <th scope="row">
                                                                            <?php echo $recharge_row['order_id'] ?>
                                                                        </th>
                                                                        <td>
                                                                            <?php echo $recharge_row['date'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $recharge_row['recharge_points_used'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $recharge_row['avabile_recharge_points'] - $recharge_row['recharge_points_used'] ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>


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
                                            <?php
                                            $orders_details = mysqli_query($con, "SELECT * FROM `order_details` WHERE `coustmer_id` = '$student_id' ORDER BY date(`order_date`) DESC");

                                            ?>
                                            <h4 class="mb-3">Order (<?php echo mysqli_num_rows($orders_details); ?>)</h4>
                                            <!-- data toggle Starts hear -->

                                            <div class="accordion" id="accordion6">

                                                <div class="card card-default">
                                                    <!-- <div class="card-header">
                                                        <h4 class="card-title m-0">
                                                            <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion6" href="#collapse6One">
                                                                <i class="fas fa-users"></i> Recharges Used
                                                            </a>
                                                        </h4>
                                                    </div> -->
                                                    <div id="collapse6One" class="collapse show">
                                                        <!-- each order details starts here -->
                                                        <?php
                                                        while ($each_order = mysqli_fetch_assoc($orders_details)) {
                                                            $each_order_products = mysqli_query($con, "SELECT * FROM `orders` WHERE `order_id` = '{$each_order['order_id']}' and `coustmer_id` = '$student_id'");
                                                        ?>
                                                            <div class="card-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                Order ID
                                                                            </th>
                                                                            <th>
                                                                                Date
                                                                            </th>
                                                                            <th>
                                                                                Total
                                                                            </th>
                                                                            <th>
                                                                                Payment Method
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $each_order['order_id'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $each_order['order_date'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $each_order['order_amount'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($each_order['payment'] == 1) echo "Amount from Cridets";
                                                                                elseif ($each_order['payment'] == 2) echo "Amount from Recharge";
                                                                                else echo "Cash on Delivery";
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                Order Amount
                                                                            </th>
                                                                            <th>
                                                                                Discount Amount
                                                                            </th>
                                                                            <th>
                                                                                Coupan Amount
                                                                            </th>
                                                                            <th>
                                                                                Shipping
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $each_order['total_amount'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $each_order['discount_price'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $each_order['coupan_price'] ?>
                                                                            </td>
                                                                            <td>
                                                                                Free Delivery
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!-- products details in the order starts here -->
                                                                <ul class="comments">
                                                                    <!-- each product details starts here -->
                                                                    <?php
                                                                    while ($each_product_row = mysqli_fetch_assoc($each_order_products)) {
                                                                        $each_product_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `products` WHERE `sku` = '{$each_product_row['product_id']}'"));

                                                                    ?>
                                                                        <li>
                                                                            <div class="comment">
                                                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                                    <img class="avatar" alt="" src="Bhavani/img/products/<?php echo $each_product_details['photo1'] ?>">
                                                                                </div>
                                                                                <div class="comment-block">
                                                                                    <div class="comment-arrow"></div>
                                                                                    <span class="comment-by">
                                                                                        <strong><?php echo $each_product_details['product_name'] ?></strong>
                                                                                        <span class="float-end">

                                                                                            <?php if ($each_product_details['discount_price'] != 0) { ?>
                                                                                                <span class="sale text-color-dark font-weight-semi-bold">&#8377; <?php echo $each_product_details['discount_price'] ?></span>
                                                                                                <span class="amount">&#8377; <?php echo $each_product_details['product_price'] ?></span>
                                                                                            <?php } else { ?>
                                                                                                <span class="sale text-color-dark font-weight-semi-bold">&#8377; <?php echo $each_product_details['product_price'] ?></span>
                                                                                            <?php } ?>

                                                                                        </span>
                                                                                    </span>
                                                                                    <p><?php echo $each_product_details['about_product'] ?></p>
                                                                                    <!-- <span class="date float-end">January 12, 2023 at 1:38 pm</span> -->
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <!-- each product details ends here -->
                                                                </ul>
                                                                <!-- products details in the order ends here -->

                                                                <button class="btn btn-modern btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" onclick="setStudentId('<?php echo $student_id ?>','<?php echo $each_order['order_id'] ?>')">
                                                                    Feed Back
                                                                </button>

                                                            </div>
                                                        <?php } ?>
                                                        <!-- each order details Ends here -->
                                                    </div>


                                                </div>
                                                <br>



                                            </div>

                                            <!-- data toggle Ends hear -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Feed Back Modal Starts Here Shiva -->

        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Order Review</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="demo-form" class="mb-4" novalidate="novalidate" enctype="multipart/form-data">

                            <!-- Add student ID input field here -->
                            <input type="hidden" id="studentId" name="studentId">
                            <input type="hidden" id="order_id" name="order_id">
                            <div class="form-group row align-items-center">
                                <label class="col-sm-3 text-start text-sm-end mb-0">Rating</label>
                                <div class="col-sm-9">
                                    <input type="number" name="order_rating" class="form-control" placeholder="Your Rating" required />
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-sm-3 text-start text-sm-end mb-0">Feed Back</label>
                                <div class="col-sm-9">
                                    <input type="text" name="order_feedback" class="form-control" placeholder="Feed Back" required />
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-sm-3 text-start text-sm-end mb-0">Review</label>
                                <div class="col-sm-9">
                                    <input type="text" name="order_review" class="form-control" placeholder="Your review...... " />
                                </div>
                            </div>
                            <!-- <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2">Image Upload</label>
                                <div class="col-lg-6">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file"> 
                                                <input type="file" name="order_image" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Feed Back Modal Ends Here Shiva -->

        <!-- Recharge Modal Starts Here Shiva -->
        <div class="modal fade" id="rechargepopup" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <?php
            $stud_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `students` WHERE `student_id` = '$student_id'"));
            ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Recharge Cridets</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td>

                                        Name
                                    </td>
                                    <td>
                                        <?php echo $stud_details['student_name'] ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Student ID
                                    </td>
                                    <td>
                                        <?php echo $stud_details['student_id'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Student Mobile
                                    </td>
                                    <td>
                                        <?php echo $stud_details['student_mobile'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Avabile Cridets
                                    </td>
                                    <td>
                                        <?php echo $student['cridets'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="hidden" id="recharge_student" value="<?php echo $stud_details['student_id'] ?>">
                        <input type="hidden" id="student_name" value="<?php echo $stud_details['student_name'] ?>">
                        <input type="hidden" id="student_mobile" value="<?php echo $stud_details['student_mobile'] ?>">
                        <input type="hidden" id="student_email" value="<?php echo $stud_details['email'] ?>">
                        <input type="hidden" id="orderid">
                        <div class="form-group row align-items-center">
                            <label class="col-sm-3 text-start text-sm-end mb-0">Recharge Amount</label>
                            <div class="col-sm-9">
                                <input type="number" id="recharge_amount_to_pay" class="form-control" placeholder="Recharge Amount" required />
                            </div>
                        </div>
                        <!-- pay button here -->
                        <div class="form-group ">
                            <button id="rzp-button1" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">Pay</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recharge Modal Ends Here Shiva -->

        <?php include 'shoping_fotter.php'; ?>
        <!-- Fotter Come Here Shiva -->
    </div>


    <!-- Vendor -->
    <script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>
    <script src="Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
    <script src="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
    <script src="Bhavani/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Theme Base, Components and Settings -->
    <script src="Bhavani/js/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="Bhavani/js/views/view.shop.js"></script>

    <!-- Theme Custom -->
    <script src="Bhavani/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="Bhavani/js/theme.init.js"></script>

    <script>
        function setStudentId(studentId, orderId) {
            document.getElementById('studentId').value = studentId;
            document.getElementById('order_id').value = orderId;
        }

        function saveChanges() {
            // Get form data and submit/save it here
            // Example:
            var formData = new FormData(document.getElementById('demo-form'));
            $.ajax({
                url: 'order_feedback.php',
                type: 'POST',
                data: formData,
                success: function(data) {
                    console.log(data);
                    alert('Feedback saved successfully');
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function(data) {
                    console.log(data);
                }
            });

            // Close modal
            $('#formModal').modal('hide');
        }
    </script>

    <script>
        document.getElementById('rzp-button1').addEventListener('click', function() {
            var student_id = document.getElementById('recharge_student').value;
            var recharge_amount_to_pay = document.getElementById('recharge_amount_to_pay').value * 100; //amount in paise

            var student_email = document.getElementById('student_email').value;
            var student_mobile = document.getElementById('student_mobile').value;
            var student_name = document.getElementById('student_name').value;

            $.ajax({
                type: 'POST',
                url: 'create_order.php',
                data: {
                    work: "create_order",
                    orderAmount: recharge_amount_to_pay,
                },
                success: function(response) {
                    console.log(response);

                    var responseData = JSON.parse(response);
                    var orderId = responseData.id;

                    console.log('Order ID:', orderId);

                    if (orderId == null) {
                        alert('Recharge Initiate failed please try again later');
                        //window.location.href = 'profile.php';
                    } else {
                        document.getElementById('orderid').value = orderId;
                        console.log('Order ID:', orderId);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending order details:', error);
                    // Handle error response if needed
                }
            });

            var orderId = document.getElementById('orderid').value;
            $.ajax({
                type: 'POST',
                url: 'recharge_update.php',
                data: {
                    payment: "initiate_payment",
                    orderAmount: recharge_amount_to_pay,
                    orderId: orderId,
                    studentid: student_id
                },
                success: function(response) {
                    console.log(response);
                    // get payment_id from response and send it to server
                    var paymentId = response.Order_ID;
                    console.log('Payment ID:', paymentId);
                    if (orderId == null) {
                        alert('Recharge Initiate failed please try again later');
                        return;
                    } else {
                        alert('Recharge Initiated successful your payment id is ' + paymentId);
                    }
                    // Handle success response if needed
                },
                error: function(xhr, status, error) {
                    console.error('Error sending order details:', error);
                    // Handle error response if needed
                }
            });
            var options = {
                "key": "rzp_test_bZFi6V3FyQ5lBT", // Enter the Key ID generated from the Dashboard
                "amount": recharge_amount_to_pay, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "SRKR Campus Online",
                "description": "SRKR Campusonline Reacharge of Student" + student_id,
                "image": "http://srkrcampusonline.rf.gd/Bhavani/img/campus_online_200_96.png",
                "order_id": orderId, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "callback_url": "http://srkrcampusonline.rf.gd/recharge_update.php",
                "prefill": {
                    "name": student_name,
                    "email": student_email,
                    "contact": student_mobile
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp = new Razorpay(options);

            rzp.open();
        });
    </script>


</body>

</html>