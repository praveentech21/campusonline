<?php
include 'connect.php';
$offer = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM offer "))['header'];
if ( isset( $_POST[ 'login' ] ) ) {
    $regno = $_POST[ 'regno' ];
    $password = $_POST[ 'password' ];
    $result = mysqli_query( $con, "SELECT * FROM students WHERE student_id = '$regno' AND `password` = '$password'" );

    if ( mysqli_num_rows( $result ) > 0 ) {
        $_SESSION[ 'student_id' ] = $_POST[ 'regno' ];
        header( 'location:index.php' );
    } else {
        echo "<script>alert('Invalid Register Number or Password');</script>";
    }
}

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
    <link id='googleFonts'
        href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap'
        rel='stylesheet' type='text/css'>

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

    <header id='header'
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
            <div class='header-body header-body-bottom-border-fixed box-shadow-none border-top-0'>
                <div class='header-top header-top-small-minheight header-top-simple-border-bottom'>
                    <div class='container'>
                        <div class='header-row justify-content-between'>
                            <div class='header-column col-auto px-0'>
                                <div class='header-row'>
                                    <p class='font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none'>FREE CLASS
                                        ROOM DELIVERY</p>
                                    <p class='font-weight-semibold text-1 mb-0 d-none d-md-block'>DELIVERY WITHIN CAMPUS
                                        | PICKUP AT CAMPUS ONLINE STALL</p>
                                </div>
                            </div>
                            <div class='header-column justify-content-end col-auto px-0'>
                                <div class='header-row'>
                                    <p class='font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none'>A Startup
                                        from Technology Center</p>
                                    <p class='font-weight-semibold text-1 mb-0 d-none d-md-block'>A Startup from
                                        Technology Center</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='header-container container'>
                    <div class='header-row py-2'>
                        <div class='header-column w-100'>
                            <div class='header-row justify-content-between'>
                                <div class='header-logo z-index-2 col-lg-2 px-0'>
                                    <a href='index.php'>
                                        <img alt='Porto' width='100' height='48' data-sticky-width='82'
                                            data-sticky-height='40' data-sticky-top='84'
                                            src='Bhavani/img/campus_online_200_96.png'>
                                    </a>
                                </div>
                                <div
                                    class='header-nav-features header-nav-features-no-border col-lg-5 col-xl-6 px-0 ms-0'>
                                    <div class='header-nav-feature ps-lg-5 pe-lg-4'>
                                        <form role='search' method='get' id='search-form'>
                                            <div class='search-with-select'>
                                                
                                                <div class='search-form-wrapper input-group'>
                                                    <p class='font-weight-semibold text-5 mb-0 d-none d-md-block'>
                                                        <?php echo $offer ?></p>

                                                </div>
                                            </div>
                                        </form>
                                        <!-- <div id = 'search-results'></div> -->
                                    </div>
                                </div>
                                <div class='d-flex col-auto col-lg-2 pe-0 ps-0 ps-xl-3'>
                                    <ul class='header-extra-info'>
                                        <li class='ms-0 ms-xl-4'>
                                            <div class='header-extra-info-icon'>
                                                <a href='#'
                                                    class='text-decoration-none text-color-dark text-color-hover-primary text-2'>
                                                    <i class='icons icon-user'></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class='header-nav-features ps-0 ms-1'>
                                        <div
                                            class='header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2'>
                                            <a href='#' class='header-nav-features-toggle' aria-label=''>
                                                <img src='Bhavani/img/wishlist_30_30.png' height='30' alt=''
                                                    class='header-nav-top-icon-img'>
                                                <span class='cart-info'>
                                                    <span class='cart-qty'>0</span>
                                                </span>
                                            </a>
                                            <div class='header-nav-features-dropdown' id='headerTopCartDropdown'>

                                            </div>
                                        </div>
                                        <div
                                            class='header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2'>
                                            <a href='#' class='header-nav-features-toggle' aria-label=''>
                                                <img src='Bhavani/img/icons/icon-cart-big.svg' height='30' alt=''
                                                    class='header-nav-top-icon-img'>
                                                <span class='cart-info'>
                                                    <span class='cart-qty'>0</span>
                                                </span>
                                            </a>
                                            <div class='header-nav-features-dropdown' id='headerTopCartDropdown'>

                                                <div class='totals'>
                                                    <span class='label'>Total:</span>
                                                    <span class='price-total'><span
                                                            class='price'><?php echo $total_price ?></span></span>
                                                </div>
                                                <div class='actions'>
                                                    <a href='cart.php'><button
                                                            class='btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3'>view
                                                            cart <i class='fas fa-arrow-right ms-2'></i></button></a>
                                                    <!-- <a class = 'btn btn-primary' href = 'checkout.php'>Checkout</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='header-column justify-content-end'>
                            <div class='header-row'>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Headre Comes Here Shiva -->
        <div role='main' class='main shop pt-4'>

            <div class='container py-4'>

                <div class='row justify-content-center'>
                    <div class='col-md-6 col-lg-5 mb-5 mb-lg-0'>
                        <h2 class='font-weight-bold text-5 mb-0'>Login</h2>
                        <form action='#' id='frmSignIn' method='post' class='needs-validation'>
                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Register Number <span
                                            class='text-color-danger'>*</span></label>
                                    <input type='text' name='regno' class='form-control form-control-lg text-4'
                                        required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='form-group col'>
                                    <label class='form-label text-color-dark text-3'>Password <span
                                            class='text-color-danger'>*</span></label>
                                    <input type='password' name='password' class='form-control form-control-lg text-4'
                                        required>
                                </div>
                            </div>
                            <div class='row justify-content-between'>

                                <div class='form-group col-md-auto'>
                                    <a class='text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2'
                                        href='#'>Forgot Password?</a>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='form-group col'>
                                    <button type='submit' name='login'
                                        class='btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3'
                                        data-loading-text='Loading...'>Login</button>
                                </div>
                            </div>
                            <div class="row">
                            <div class='form-group col-md-auto'>
                                    New to Campus Online :  
                                    <a class='text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2'
                                        href='register.php'>Register Now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <?php include 'shoping_fotter.php' ?>
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