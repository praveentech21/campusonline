<?php
include 'connect.php';
if (empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') header('location:login.php');
if (isset($_GET['category_id'])) $products = mysqli_query($con, "SELECT * FROM products where category_id = '{$_GET['category_id']}'");
elseif (isset($_GET['tag_name'])) $products = mysqli_query($con, "SELECT * FROM products where sku in ( select product_id from tags where tag_name = '{$_GET['tag_name']}')");
else $products = mysqli_query($con, 'SELECT * FROM products order by date_create desc');
$categories = mysqli_query($con, 'SELECT * FROM categorys order by category_weightage desc');
$tags = mysqli_query($con, 'SELECT * FROM tags group by tag_name');
$top_rated = mysqli_query($con, 'SELECT product_id FROM reviews group by product_id order by rating desc');
$today = date('Y-m-d');

$student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM students where student_id = '{$_SESSION['student_id']}'"));
?>
<!DOCTYPE html>
<html lang='en'>

<head>

    <!-- Basic -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>SRKR Campus Online Store</title>

    <meta name='keywords' content='WebSite Template' />
    <meta name='description' content='Porto - Multipurpose Website Template'>
    <meta name='author' content='okler.net'>

    <!-- Favicon -->
    <link rel='shortcut icon' href='Bhavani/img/favicon.ico' type='image/x-icon' />
    <link rel='apple-touch-icon' href='Bhavani/img/apple-touch-icon.png'>

    <!-- Mobile Metas -->
    <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no'>

    <!-- Web Fonts  -->
    <link id='googleFonts' href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap' rel='stylesheet' type='text/css'>

    <!-- Vendor CSS -->
    <link rel='stylesheet' href='Bhavani/vendor/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/fontawesome-free/css/all.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/animate/animate.compat.css'>
    <link rel='stylesheet' href='Bhavani/vendor/simple-line-icons/css/simple-line-icons.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/owl.carousel/assets/owl.carousel.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/owl.carousel/assets/owl.theme.default.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/magnific-popup/magnific-popup.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/bootstrap-star-rating/css/star-rating.min.css'>
    <link rel='stylesheet' href='Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css'>

    <!-- Theme CSS -->
    <link rel='stylesheet' href='Bhavani/css/theme.css'>
    <link rel='stylesheet' href='Bhavani/css/theme-elements.css'>
    <link rel='stylesheet' href='Bhavani/css/theme-blog.css'>
    <link rel='stylesheet' href='Bhavani/css/theme-shop.css'>

    <!-- Skin CSS -->
    <link id='skinCSS' rel='stylesheet' href='Bhavani/css/skins/default.css'>

    <!-- Theme Custom CSS -->
    <link rel='stylesheet' href='Bhavani/css/custom.css'>

    <!-- Head Libs -->
    <script src='Bhavani/vendor/modernizr/modernizr.min.js'></script>

</head>

<body data-plugin-page-transition>

    <div class='body'>
        <?php include 'shoping_header.php' ?>
        <!-- Headre Comes Here Shiva -->
        <div role='main' class='main shop pt-4'>

            <div class='container pt-3 pb-2'>

                <div class='row pt-2'>
                    <div class='col-lg-3 mt-4 mt-lg-0'>

                        <div class='d-flex justify-content-center mb-4'>
                            <div class='profile-image-outer-container'>
                                <div class='profile-image-inner-container bg-color-primary'>
                                    <img src='img/avatars/avatar.jpg'>
                                    <span class='profile-image-button bg-color-dark'>
                                        <i class='fas fa-camera text-light'></i>
                                    </span>
                                </div>
                                <input type='file' id='file' class='form-control profile-image-input'>
                            </div>
                        </div>

                    </div>
                    <div class='col-lg-9'>

                        <form role='form' class='needs-validation'>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Student Name</label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='stdname' value="<?php echo $student_details['student_name'] ?>">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Register Number</label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='regno' value="<?php echo $student_details['student_id'] ?>">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Mobile</label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='mobile' value="<?php echo $student_details['student_mobile'] ?>">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Father Name</label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='fname' value="<?php echo $student_details['father_name'] ?>">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Mother Name </label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='mname' value="<?php echo $student_details['mother_name'] ?>">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 '>Home Town</label>
                                <div class='col-lg-9'>
                                    <input class='form-control text-3 h-auto py-2' type='text' name='htown' value="<?php echo $student_details['home_town'] ?>">
                                </div>
                            </div>
                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Batch <span class='text-color-danger'>*</span></label>
                                    <div class='custom-select-1'>
                                        <select class='form-select form-control h-auto py-2' name='batch'>
                                            <option value='' <?php echo ($student_details['Batch'] == '') ? 'selected' : '';
                                                                ?>>Select the Batch</option>
                                            <option value='2027' <?php echo ($student_details['Batch'] == '2027') ? 'selected' : '';
                                                                    ?>>2027</option>
                                            <option value='2026' <?php echo ($student_details['Batch'] == '2026') ? 'selected' : '';
                                                                    ?>>2026</option>
                                            <option value='2025' <?php echo ($student_details['Batch'] == '2025') ? 'selected' : '';
                                                                    ?>>2025</option>
                                            <option value='2024' <?php echo ($student_details['Batch'] == '2024') ? 'selected' : '';
                                                                    ?>>2024</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Department <span class='text-color-danger'>*</span></label>
                                    <div class='custom-select-1'>
                                        <select class='form-select form-control h-auto py-2' name='department'>
                                            <option value='' <?php echo ($student_details['Department'] == '') ? 'selected' : '';
                                                                ?>>Select the Department</option>
                                            <option value='AIDS' <?php echo ($student_details['Department'] == 'AIDS') ? 'selected' : '';
                                                                    ?>>AIDS</option>
                                            <option value='AIML' <?php echo ($student_details['Department'] == 'AIML') ? 'selected' : '';
                                                                    ?>>AIML</option>
                                            <option value='CSD' <?php echo ($student_details['Department'] == 'CSD') ? 'selected' : '';
                                                                ?>>CSD</option>
                                            <option value='CSE' <?php echo ($student_details['Department'] == 'CSE') ? 'selected' : '';
                                                                ?>>CSE</option>
                                            <option value='CSBS' <?php echo ($student_details['Department'] == 'CSBS') ? 'selected' : '';
                                                                    ?>>CSBS</option>
                                            <option value='CSIT' <?php echo ($student_details['Department'] == 'CSIT') ? 'selected' : '';
                                                                    ?>>CSIT</option>
                                            <option value='CIC' <?php echo ($student_details['Department'] == 'CIC') ? 'selected' : '';
                                                                ?>>CIC</option>
                                            <option value='CIVIL' <?php echo ($student_details['Department'] == 'CIVIL') ? 'selected' : '';
                                                                    ?>>CIVIL</option>
                                            <option value='ECE' <?php echo ($student_details['Department'] == 'ECE') ? 'selected' : '';
                                                                ?>>ECE</option>
                                            <option value='EEE' <?php echo ($student_details['Department'] == 'EEE') ? 'selected' : '';
                                                                ?>>EEE</option>
                                            <option value='IT' <?php echo ($student_details['Department'] == 'IT') ? 'selected' : '';
                                                                ?>>IT</option>
                                            <option value='MECH' <?php echo ($student_details['Department'] == 'MECH') ? 'selected' : '';
                                                                    ?>>MECH</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Section <span class='text-color-danger'>*</span></label>
                                    <div class='custom-select-1'>
                                        <select class='form-select form-control h-auto py-2' name='section'>
                                            <option value='' <?php echo ($student_details['Section'] == '') ? 'selected' : '';
                                                                ?>>Select the Section</option>
                                            <option value='A' <?php echo ($student_details['Section'] == 'A') ? 'selected' : '';
                                                                ?>>A</option>
                                            <option value='B' <?php echo ($student_details['Section'] == 'B') ? 'selected' : '';
                                                                ?>>B</option>
                                            <option value='C' <?php echo ($student_details['Section'] == 'C') ? 'selected' : '';
                                                                ?>>C</option>
                                            <option value='D' <?php echo ($student_details['Section'] == 'D') ? 'selected' : '';
                                                                ?>>D</option>
                                            <option value='E' <?php echo ($student_details['Section'] == 'E') ? 'selected' : '';
                                                                ?>>E</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Transportation <span class='text-color-danger'>*</span></label>
                                    <div class='custom-select-1'>
                                        <select class='form-select form-control h-auto py-2' name='transportation'>
                                            <option value='' <?php echo ($student_details['Transportation'] == '') ? 'selected' : '';
                                                                ?>>Select the Transportation</option>
                                            <option value='College Bus' <?php echo ($student_details['Transportation'] == 'College Bus') ? 'selected' : '';
                                                                        ?>>College Bus</option>
                                            <option value='RTC' <?php echo ($student_details['Transportation'] == 'RTC') ? 'selected' : '';
                                                                ?>>RTC</option>
                                            <option value='Own Vehicle' <?php echo ($student_details['Transportation'] == 'Own Vehicle') ? 'selected' : '';
                                                                        ?>>Own Vehicle</option>
                                            <option value='Hostel' <?php echo ($student_details['Transportation'] == 'Hostel') ? 'selected' : '';
                                                                    ?>>Hostel</option>
                                            <option value='Room' <?php echo ($student_details['Transportation'] == 'Room') ? 'selected' : '';
                                                                    ?>>Room</option>
                                            <option value='Local' <?php echo ($student_details['Transportation'] == 'Local') ? 'selected' : '';
                                                                    ?>>Local</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class='form-group col-lg-9'>

                                </div>
                                <div class='form-group col-lg-3'>
                                    <input type='submit' value='Save' class='btn btn-primary btn-modern float-end' data-loading-text='Loading...'>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
        <?php include 'shoping_fotter.php';
        ?>
        <!-- Fotter Come Here Shiva -->
    </div>

    <!-- Vendor -->
    <script src='Bhavani/vendor/plugins/js/plugins.min.js'></script>
    <script src='Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js'></script>
    <script src='Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js'></script>
    <script src='Bhavani/vendor/jquery.countdown/jquery.countdown.min.js'></script>

    <!-- Theme Base, Components and Settings -->
    <script src='Bhavani/js/theme.js'></script>

    <!-- Current Page Vendor and Views -->
    <script src='Bhavani/js/views/view.shop.js'></script>

    <!-- Theme Custom -->
    <script src='Bhavani/js/custom.js'></script>

    <!-- Theme Initialization Files -->
    <script src='Bhavani/js/theme.init.js'></script>

</body>

</html>