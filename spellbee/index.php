<?php

include "connect.php";

$result = mysqli_query($conn, "SELECT * FROM payments;");
$total = mysqli_num_rows($result);

$result = mysqli_query($conn, "SELECT * FROM payments where language='C';");
$c = mysqli_num_rows($result);

$result = mysqli_query($conn, "SELECT * FROM payments where language='PYTHON';");
$python = mysqli_num_rows($result);

$result = mysqli_query($conn, "SELECT * FROM payments where language='JAVA';");
$java = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>Spell Champ - Online Spelling Challenge</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">
    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pathway+Gothic+One|PT+Sans+Narrow:400+700|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->
    <!-- Global styles BEGIN -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles BEGIN -->
    <link href="assets/pages/css/animate.css" rel="stylesheet">
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles BEGIN -->
    <link href="assets/pages/css/components.css" rel="stylesheet">
    <link href="assets/pages/css/slider.css" rel="stylesheet">
    <link href="assets/onepage/css/style.css" rel="stylesheet">
    <link href="assets/onepage/css/style-responsive.css" rel="stylesheet">
    <link href="assets/onepage/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="assets/onepage/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->


    <style type='text/css'>
        .blink {
            animation: blink-animation 3s steps(5, start) infinite;
            -webkit-animation: blink-animation 3s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>

</head>
<!--DOC: menu-always-on-top class to the body element to set menu on top -->

<body class="menu-always-on-top">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel">
        <!-- <div class="color-mode-icons icon-color"><a href='ranks.php' style='color:#FFF'>WINNERS 2018</a></div> -->
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">

        </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER -->

    <!-- Header BEGIN -->
    <div class="header header-mobi-ext">
        <div class="container">
            <div class="row">
                <!-- Logo BEGIN -->
                <div class="col-md-2 col-sm-2">
                    <a class="scroll site-logo" href="#promo-block"><img src="assets/onepage/img/logo/red.png" alt="Metronic One Page"></a>
                </div>
                <!-- Logo END -->
                <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
                <!-- Navigation BEGIN -->
                <div class="col-md-10 pull-right">
                    <ul class="header-navigation">
                        <li class="current"><a href="#promo-block">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Prizes</a></li>
                        <li><a href="#portfolio">Leader Board</a></li>
                        <li><a href="#benefits">FAQ</a></li>
                        <li><a href="#prices"><strong style='color:#C91E3E;'>REGISTER</strong></a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <!-- Navigation END -->
            </div>
        </div>
    </div>
    <!-- Header END -->

    <!-- Promo block BEGIN -->
    <div class="promo-block" id="promo-block">
        <div id="carousel-example-generic" class="carousel slide carousel-slider" style="margin-top: 60px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-one active">
                    <img class="carousel-position-srkrec hidden-sm hidden-xs animate-delay" src="assets/onepage/img/slider/srkrec.png" alt="Code Master 2018" data-animation="animated fadeInDown">
                    <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <h2 class="margin-bottom-20 animate-delay carousel-title-v1" data-animation="animated fadeInDown">
                                    <span class="color-red"><b>Spell Champ SRKR</b></span>
                                </h2>

                                <div class="animated flipInX">
                                    <div class="hidden-xs">
                                        <i class="promo-like fa fa-thumbs-up" style='padding-bottom:80px;margin-top:40px;'></i>
                                        <div class="promo-like-text">
                                            <h2>Test Your Spelling Skills in <br><span class='color-red'>Spell Champ SRKR</span></h2>
                                            <p>Participate & Win Exciting Prizes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img class="carousel-position-coders hidden-sm hidden-xs animate-delay" src="assets/onepage/img/slider/coders.png" alt="Iphone" data-animation="animated fadeInUp">

                </div>

                <!-- Second slide -->
                <div class="item carousel-item-two">
                    <img class="carousel-position-two hidden-sm hidden-xs animate-delay" src="assets/onepage/img/slider/title.png" alt="Code Master 2018" data-animation="animated fadeInDown">
                    <img class="carousel-position-three hidden-sm hidden-xs animate-delay" src="assets/onepage/img/slider/prizes.png" alt="Iphone" data-animation="animated fadeInUp">
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-three">
                    <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <span class="carousel-subtitle-v1">IMPORTANT DATES</span>
                                <h3 class="margin-bottom-20 animate-delay promo-like-text" data-animation="animated fadeInDown">
                                    <div STYLE='font-size:32px;'><span class='color-red'>ROUND 1:</span> 16th Agu - 02th Sep 2023</div>
                                    <div STYLE='font-size:32px;'><span class='color-red'>ROUND 2:</span> 04th Sep - 09th Sep 2023</div>
                                    <div STYLE='font-size:32px;'><span class='color-red'>ROUND 3:</span> 11th Sep - 16th Sep 2023</div>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <img class="carousel-position-three hidden-sm hidden-xs animate-delay" src="assets/onepage/img/slider/prizes2.png" alt="Prizes" data-animation="animated fadeInUp">

                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- Promo block END -->

    <!-- About block BEGIN -->
    <div class="about-block content content-center" id="about">
        <div class="container">
            <h2><strong><b>Spell Champ Srkr</b></strong><br>The Spell Bee Challenge of SRKREC</h2>
            <h4>Spell Champ is an unique online Spelling challenge conducted annually to test the Spelling skills of SRKREC students. Only SRKREC students (all branches & years of B.E/B.Tech programmes) are eligible to take part in this challenge and can win exciting prizes. The winners will be decided based on their skill level in Spelling, Speed and accuracy. We provide audio of the word,you need to identify the Spelling of the word from the MCQ's.</h4>
            <!-- <h4>Code Master is an unique online coding challenge conducted annually to test the coding skills of SRKREC students. Only SRKREC students (all branches & years of B.E/B.Tech programmes) are eligible to take part in this challenge and can win exciting prizes. The winners will be decided based on their skill level in Programming, Problem Solving and Code Writing tested in 3 different languages in 3 different levels.</h4> -->

            <a name='rules'></a>
            <div class="container">
                <h2 class="margin-bottom-20" style='font-size:24px;'><strong>Levels</strong> Of Spell Champ Challenge</h2>
                <div class="row">
                    <!-- Pricing item BEGIN -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="pricing-item">
                            <div class="pricing-head">
                                <h3>LEVEL 1</h3>
                                <p>Live Spelling Test</p>
                            </div>
                            <div class="pricing-content">
                                <div class="pi-price">
                                    <strong><i class="fa fa-rupee"></i><em>20</em>/-</strong>
                                </div>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-circle"></i> For Replay <i class="fa fa-rupee"><em>10</em>/-</i></li>
                                    <li><i class="fa fa-circle"></i> 20 Words / 20 Minutes</li>
                                    <li><i class="fa fa-circle"></i> Take Exam at Campus Online Stall</li>
                                    <li><i class="fa fa-circle"></i> Top 20% will go to Level 2</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="rules.php#l1" class="zoom valign-center btn btn-default">More Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing item END -->
                    <!-- Pricing item BEGIN -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="pricing-item">
                            <div class="pricing-head">
                                <h3>LEVEL 2</h3>
                                <p>Live Typing Test</p>
                            </div>
                            <div class="pricing-content">
                                <div class="pi-price">
                                    <strong><i class="fa fa-rupee"></i> <em>0</em>/-</strong>
                                </div>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-circle"></i> 20 Words / Speed Base Scoring</li>
                                    <li><i class="fa fa-circle"></i> Proctored Online Exam @ Tech Centre</li>
                                    <li><i class="fa fa-circle"></i> Top 30 will go to Final Level</li>
                                    <li><i class="fa fa-circle"></i> Merit Certificates</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="rules.php#l2" class="zoom valign-center btn btn-default">More Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing item END -->
                    <!-- Pricing item BEGIN -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="pricing-item">
                            <div class="pricing-head">
                                <h3>LEVEL 3</h3>
                                <p>Speed Based Spelling Round</p>
                            </div>
                            <div class="pricing-content">
                                <div class="pi-price">
                                    <strong><i class="fa fa-rupee"></i> <em>0</em>/-</strong>
                                </div>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-circle"></i> 30 Words - 30 Minutes Competation</li>
                                    <li><i class="fa fa-circle"></i> Speed Base Scoring </li>
                                    <li><i class="fa fa-circle"></i> Speed and Accuracy pay's </li>
                                    <li><i class="fa fa-circle"></i> Top 10 Ranks To Be Generated</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="rules.php#l3" class="zoom valign-center btn btn-default">More Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing item END -->
                </div>
            </div>

        </div>
    </div>
    <!-- About block END -->

    <!-- Services block BEGIN -->
    <div class="services-block content content-center" id="services">
        <div class="container">
            <h2>Exciting <strong>Prizes</strong></h2>
            <div class="ab-trio">
                <img src="assets/onepage/img/trio.png" alt="" class="img-responsive">
            </div>
            <br>
            <h2 style='font-size:24px;'>Event <strong>Sponsors</strong></h2>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 item">
                    <h3>Prime Sponsor</h3>
                    <!--		        <a href="assets/onepage/img/sponsors/bhubl.jpg" class="zoom valign-center"> -->
                    <center> <img src="assets/onepage/img/sponsors/bhub.png" alt="" class="img-responsive"></center>
                    <a href='http://www.bhimavaram.online' target='bhub'>Bhimavaram Online</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 item">
                    <h3>Title Sponsor</h3> <br>
                    <center> <img src="assets/onepage/img/sponsors/mobicare.png" alt="" class="img-responsive"></center>
                    <a href='http://www.saipraveen.free.nf/campusonline' target='mobicare'>SRKR Campus Online</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 item">
                    <h3>Associate Sponsor</h3>
                    <br>
                    <center><img src="assets/onepage/img/sponsors/naresh.png" alt="" class="img-responsive"></center>
                    <a href='http://www.saipraveen.free.nf' target='naresh'>Sai Praveen</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services block END -->


    <!-- Message block BEGIN -->
    <div class="message-block content content-center valign-center" id="message-block">
        <div class="valign-center-elem">
            <h2>Top 10 Spell Champs of SRKREC To Be Identified </h2>
            <h2 style='font-size:20px;'><i>Win Prizes worth more than 25,000/-</i></strong></h2>
            <h2 style='font-size:16px;'>Get Your Merit Certificate With Score</h2>
        </div>
    </div>
    <!-- Message block END -->

    <?php

    $cser = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='CSE';");
    $cse = mysqli_fetch_row($cser);

    $itr = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='IT';");
    $it = mysqli_fetch_row($itr);

    $ecer = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='ECE';");
    $ece = mysqli_fetch_row($ecer);

    $eeer = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='EEE';");
    $eee = mysqli_fetch_row($eeer);

    $mechr = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='MECH';");
    $mech = mysqli_fetch_row($mechr);

    $civilr = mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='CIVIL';");
    $civil = mysqli_fetch_row($civilr);


    ?>
    <!-- Portfolio block BEGIN -->
    <div class="portfolio-block content content-center" id="portfolio">
        <div class="container">
            <h2 class="margin-bottom-50">Department Wise <strong>Leader Board</strong></h2>
        </div>
        <div class="row">
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/civil.jpg" alt="CIVIL" class="img-responsive">
                <!--                <a href="civil.php" class="zoom valign-center"> -->
                <a href="leaderboard.php?dept=CIVIL" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Civil Engineering</strong>
                        <em><br><br><br>Registered: <?php echo $civil[0]; ?><br><br></em>
                        <b>View CIVIL LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/cse.jpg" alt="CSE" class="img-responsive">
                <a href="leaderboard.php?dept=CSE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Computer Science & Engineering</strong>
                        <em><br><br>Registered: <?php echo $cse[0]; ?><br><br></em>
                        <b>View CSE LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/ece.jpg" alt="ECE" class="img-responsive">
                <a href="leaderboard.php?dept=ECE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Electronics & Communication Engineering</strong>
                        <em><br>Registered: <?php echo $ece[0]; ?><br><br></em>
                        <b>View ECE LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/eee.jpg" alt="EEE" class="img-responsive">
                <a href="leaderboard.php?dept=EEE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Electrical & Electronics Engineering</strong>
                        <em><br>Registered: <?php echo $eee[0]; ?><br><br></em>
                        <b>View EEE LeaderBoard</b>
                    </div>
                </a>
            </div>

            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/it.jpg" alt="IT" class="img-responsive">
                <a href="leaderboard.php?dept=IT" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Information Technology</strong>
                        <em><br><br>Registered: <?php echo $it[0]; ?><br><br></em>
                        <b>View IT LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/mech.jpg" alt="MECH" class="img-responsive">
                <a href="leaderboard.php?dept=MECH" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Mechanical Engineering</strong>
                        <em><br><br>Registered: <?php echo $mech[0]; ?><br><br></em>
                        <b>View MECH LeaderBoard</b>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Portfolio block END -->

    <!-- Portfolio block BEGIN -->
    <div class="portfolio-block content content-center" id="portfolio">
        <div class="row">
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/civil.jpg" alt="CIVIL" class="img-responsive">
                <!--                <a href="civil.php" class="zoom valign-center"> -->
                <a href="leaderboard.php?dept=CIVIL" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Computer Science and Design</strong>
                        <em><br><br><br>Registered: <?php echo $civil[0]; ?><br><br></em>
                        <b>View CSD LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/cse.jpg" alt="CSE" class="img-responsive">
                <a href="leaderboard.php?dept=CSE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Computer Science and Business Systems</strong>
                        <em><br><br>Registered: <?php echo $cse[0]; ?><br><br></em>
                        <b>View CSBS LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/ece.jpg" alt="ECE" class="img-responsive">
                <a href="leaderboard.php?dept=ECE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Artificial Intelligence & Machine Learning </strong>
                        <em><br>Registered: <?php echo $ece[0]; ?><br><br></em>
                        <b>View AIML LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/eee.jpg" alt="EEE" class="img-responsive">
                <a href="leaderboard.php?dept=EEE" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Artificial Intelligence and Data Science</strong>
                        <em><br>Registered: <?php echo $eee[0]; ?><br><br></em>
                        <b>View EEE LeaderBoard</b>
                    </div>
                </a>
            </div>

            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/it.jpg" alt="IT" class="img-responsive">
                <a href="leaderboard.php?dept=IT" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Computer Science and Information Technology</strong>
                        <em><br><br>Registered: <?php echo $it[0]; ?><br><br></em>
                        <b>View CSI LeaderBoard</b>
                    </div>
                </a>
            </div>
            <div class="item col-md-2 col-sm-6 col-xs-12">
                <img src="assets/onepage/img/portfolio/mech.jpg" alt="MECH" class="img-responsive">
                <a href="leaderboard.php?dept=MECH" class="zoom valign-center">
                    <div class="valign-center-elem">
                        <strong>Internet of Things and Cyber Security</strong>
                        <em><br><br>Registered: <?php echo $mech[0]; ?><br><br></em>
                        <b>View CSE(IOT) LeaderBoard</b>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Portfolio block END -->

    <!-- Choose us block BEGIN -->
    <div class="choose-us-block content text-center margin-bottom-40" id="benefits">
        <div class="container">
            <h2>Frequently Asked <strong>Questions</strong></h2>
            <h4>The frequently asked questions have been answered for better understanding of the Speel Bee Contest and other details. Please feel free to contact <a href="javascript:void(0);">Technology Centre, Z-Block</a> for any unanswered queries.</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-left">
                    <img src="assets/onepage/img/choose-us.png" alt="Why to choose us" class="img-responsive">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-left">
                    <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">Who can participate?</a>
                                </h5>
                            </div>
                            <div id="accordion1_1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>The Speel Bell contest is only for the students of SRKR Engineering College. Students of any branch and any year can participate in the contest.</p>
                                    <p>Students can register and pay the fee at Campus Online Stall or Technology Centre.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">Is there an exam fee?</a>
                                </h5>
                            </div>
                            <div id="accordion1_2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>For First Time: Rs. 20/-. For Replay - Rs. 10/-</p>
                                    <p>The registration fee can be paid to our Team at Stalls or at Technology Centre to get your exam user id and password.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">What is the benefit of taking this contest?</a>
                                </h5>
                            </div>
                            <div id="accordion1_3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>The exciting prizes are only meant for encouragement. More than the prizes, you can assess your Spelling skills and know where you stand among the potential Spell Champs of SRKR. Speel Bee Champ 2018 is going to generate a Rank for top 10 students based on their overall performance in the contest. A certificate of merit or participation is given to acknowledge their performance is provided for all.</p>
                                    <p>You can win an Boat Buds / FOSSIL Watches / Smart Bands, Wrist Watches, Sound Boxes, Vouchers and other lot of exciting gadgets and coupons by participating in the contest. To encourage students of all branches, Spell Champ has introduced prizes for Department-wise best performers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">Where is the exam conducted?</a>
                                </h5>
                            </div>
                            <div id="accordion1_4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Round 1 can be taken 3 Places (at Campus Online / at Girls Hostel Stall / Technology Centre), we will provide our System / laptop / Desktop before the Round 1 Deadline.</p>
                                    <p>Round 2 & 3 will be conducted @ Technology Centre & Digital Learning Centre.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">What are the words asks ?</a>
                                </h5>
                            </div>
                            <div id="accordion1_5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Basic word mostly used in our Daily world</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6">I have other doubts. Whom do I contact?</a>
                                </h5>
                            </div>
                            <div id="accordion1_6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Contact Technology Centre, I-Hub, Z-Block, SRKR Engineering College, Bhimavaram for any queries or clarifications during 9 AM to 8 PM.</p>
                                    <p>Feel free to contact Mr. <a href="http://saipraveen.free.nf/">Sanju</a>, CSD @ +91 90527 27402.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose us block END -->

    <!-- Checkout block BEGIN -->
    <div class="checkout-block content" id="prices">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>PARTICIPATE IN THE CHALLENGE! <em>See where you stand & win exciting prizes</em></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout block END -->

    <!-- Facts block BEGIN -->
    <div class="facts-block content content-center" id="facts-block">


        <!-- <a href="ranks.php" target="_blank" class="btn blink" style='background-color:#C91E3E;color:#ffff; font-size:18px;box-shadow: 3px 3px 1px white;'><b>REGISTRATIONS CLOSED</b></a> -->
        <br><br><br>
        <h2>Spell Champ 2023 Registration Stats</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong>20% </strong>
                        Total Registrations
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong>50</strong>
                        Qualified for Round 2
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong>30</strong>
                        Qualified for Round 3
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong>18</strong>
                        Winners
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts block END -->


    <!-- Team block BEGIN -->
    <div class="team-block content content-center margin-bottom-40" id="team">
        <div class="container">
            <h2>Meet <strong>The Team</strong></h2>
            <h4>The content - Speel Bee Champ of SRKR was Conducted in assocation with Engilish Department</h4>
            <div class="row">
            <div class="col-md-3 item">
                    <h3>Dr. Suresh Mudunuri</h3>
                    <em>Director, MCR Web Solutions</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Dr. Gopal Krishna</h3>
                    <em>Head,Idea Lab, SRKR</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Pavan Sir</h3>
                    <em>T & P Cell, Srkr</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Riyaz Sir</h3>
                    <em>T & P Cell</em>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 item">
                    <h3>Susela Mantena</h3>
                    <em>Professor, CSD</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Neti Praveen</h3>
                    <em>Professor, CSD</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Asvini </h3>
                    <em>Professor, CSD</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Kotha Madam</h3>
                    <em>Professor, CSD</em>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 item">
                    <h3>Sanju K</h3>
                    <em>CEO, Campus Onlie</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Shiva Mani</h3>
                    <em>MD, Campus Online</em>
                </div>
                <div class="col-md-3 item">
                    <h3>M Prudhivi</h3>
                    <em>CFO, Campus Online</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Vinay S</h3>
                    <em>Student Body Member, CSD</em>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 item">
                    <h3>Puneeth</h3>
                    <em>CIO, Campus Online</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Rohith</h3>
                    <em>CCO, Campus Online</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Karthik Ch</h3>
                    <em>CDO, Campus Online</em>
                </div>
                <div class="col-md-3 item">
                    <h3>Sai Praveen</h3>
                    <em>Founder, Campus Online</em>
                </div>
            </div>
        </div>
    </div>
    <!-- Team block END -->


    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer" id="contact">
        <div class="container">
            <div class="row">
                <!-- BEGIN BOTTOM ABOUT BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2>About us</h2>
                    <p style="align:justify;">Spell Champ is jointly organized by Campus Online, English Department and Idea Lab of SRKR Engineering College, Bhimavaram. This Event is Started in this year and expeted to Countinue futher years </p>
                </div>
                <!-- END BOTTOM ABOUT BLOCK -->
                <!-- BEGIN TWITTER BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2 class="margin-bottom-0">SRKR Campus Online </h2>
                    <h5><a href='http://saipraveen.free.nf/campusonline' target='_new'>Campus Online</a></h5>
                </div>
                <!-- END TWITTER BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <!-- BEGIN BOTTOM CONTACTS -->
                    <h2>Our Contacts</h2>
                    <address class="margin-bottom-20">
                        MCR Web Solutions & Technology Centre<br>
                        2nd Floor, I-Hub Incubation Centre,<br>
                        Idea Lab, SRKR Engineering College,<br>
                        Chinna Amiram, Bhimavaram, A.P. - 534204<br>
                        Phone: <a href="tel:+9052727402">+91 90527 27402</a> <a href="tel:+9848823311">+91 98488 23311</a><br>
                        Email: <a href="mailto:spellbee2k23@srkrec.edu.in">spellbee2k23@srkrec.edu.in</a><br>
                    </address>
                    <!-- END BOTTOM CONTACTS -->
                </div>
            </div>
        </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-8 col-sm-8">
                    <div class="copyright">© Code Master Contest 2018 . All Rights Reserved.</div>
                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-2 col-sm-2 text-right">
                    <p class="powered">Powered by: <a href="http://www.mcr.org.in/" target='_new'><img src='assets/onepage/img/mcr.png'></a></p>
                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN SOCIAL ICONS -->
                <div class="col-md-2 col-sm-2 text-left">
                    <ul class="social-icons">
                        <li><a class="facebook" data-original-title="facebook" href="https://www.facebook.com/mcrweb/" target='_new'></a></li>
                        <li><a class="twitter" data-original-title="twitter" href="https://twitter.com/mcr_web" target='_new'></a></li>
                    </ul>
                </div>
                <!-- END SOCIAL ICONS -->

            </div>
        </div>
    </div>
    <!-- END FOOTER -->
    <a href="#promo-block" class="go2top scroll"><i class="fa fa-arrow-up"></i></a>

    <!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<![endif]-->
    <!-- Load JavaScripts at the bottom, because it will reduce page load time -->
    <!-- Core plugins BEGIN (For ALL pages) -->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Core plugins END (For ALL pages) -->
    <!-- Core plugins BEGIN (required only for current page) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/jquery.easing.js"></script>
    <script src="assets/plugins/jquery.parallax.js"></script>
    <script src="assets/plugins/jquery.scrollTo.min.js"></script>
    <script src="assets/onepage/scripts/jquery.nav.js"></script>
    <!-- Core plugins END (required only for current page) -->
    <!-- Global js BEGIN -->
    <script src="assets/onepage/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            Layout.init();
        });
    </script>
    <!-- Global js END -->
    <script type="text/javascript">
        // Register......
        function register() {

            var rollno = document.getElementById('rollno').value;
            var name = document.getElementById('name').value;
            var batch = document.getElementById('batch').value;
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;
            var language = document.getElementById('language').value;

            document.getElementById('rgerror').innerHTML = "";

            if (rollno == "") {
                document.getElementById('rgerror').innerHTML = "Please Fill Your Roll Number!<br>";
                return false;
            }

            rn = /^[0-9]{12}$/;
            fn = /^[0-9]{2}[0-9A-Za-z]{8}$/;
            mn = /^[0-9]{9}$/;
            if (!rn.test(rollno)) {
                if (!fn.test(rollno)) {
                    if (!mn.test(rollno)) {
                        document.getElementById('rgerror').innerHTML = "Invalid Roll Number!<br>";
                        return false;
                    }
                }
            }

            if (name == "") {
                document.getElementById('rgerror').innerHTML = "Please Fill Your Full Name!<br>";
                return false;
            }

            if (batch == "-") {
                document.getElementById('rgerror').innerHTML = "Please Select Your Batch!<br>";
                return false;
            }

            if (email == "") {
                document.getElementById('rgerror').innerHTML = "Please Fill Your E-mail!<br>";
                return false;
            }
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                document.getElementById('rgerror').innerHTML = "Invalid E-mail ID!<br>";
                return false;
            }

            if (mobile == "") {
                document.getElementById('rgerror').innerHTML = "Please Fill Your Mobile Number!<br>";
                return false;
            }
            mb = /^[0-9]{10}$/;
            if (!mb.test(mobile)) {
                document.getElementById('rgerror').innerHTML = "Invalid Mobile Number!<br>(Enter only a 10 digit mobile number)<br>";
                return false;
            }

            if (language == "-") {
                document.getElementById('rgerror').innerHTML = "Please Select The Exam Language!<br>";
                return false;
            }

            return true;
        }
    </script>


</body>

</html>