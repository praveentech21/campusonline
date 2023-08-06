<?php

$dept=$_GET['dept'];

if($dept == 'CSE')
{
 $fdept="COMPUTER SCIENCE & ENGINEERING";
}
elseif($dept == 'ECE')
{
 $fdept="ELECTRONICS & COMMUNICATION ENGINEERING";
}
elseif($dept == 'EEE')
{
 $fdept="ELECTRICAL & ELECTRONICS ENGINEERING";
}
elseif($dept == 'MECH')
{
 $fdept="MECHANICAL ENGINEERING";
}
elseif($dept == 'CIVIL')
{
 $fdept="CIVIL ENGINEERING";
}
elseif($dept == 'IT')
{
 $fdept="INFORMATION TECHNOLOGY";
}

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
<title>CodeMaster - Online Coding Challenge</title>

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
	
td,th
{
 padding:5px;
 font-size:13px;	
}
   </style>

</head>
<!--DOC: menu-always-on-top class to the body element to set menu on top -->
<body class="menu-always-on-top">

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
                        <li><a href="index.php"><strong style='color:#C91E3E;'>Code Master Home</strong></a></li>
                    </ul>
                </div>
                <!-- Navigation END -->
            </div>
        </div>
    </div>
    <!-- Header END -->

    <!-- About block BEGIN -->
    <div class="about-block content content-center" id="about">
        <div class="container">
            <h2><strong><b><?php echo $dept; ?> LEADERBOARD</b></strong><br><?php echo $fdept; ?></h2>
        </div>
    </div>
    <!-- About block END -->
			<div class="valign-center-elem">
            <h2 align='center'>
				<img src="assets/onepage/img/portfolio/dept/<?php echo strtolower($dept); ?>.jpg" alt="LOGO" class="img-responsive">
				</h2>
			</div>	

	    <!-- Facts block BEGIN -->
<div class="facts-block content content-center" id="a">
<?php

include "connect.php";
		
$depr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='$dept' and year=1;");
$one=mysqli_fetch_row($depr);
$depr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='$dept' and year=2;");
$two=mysqli_fetch_row($depr);
$depr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='$dept' and year=3;");
$three=mysqli_fetch_row($depr);
$depr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='$dept' and year=4;");
$four=mysqli_fetch_row($depr);

$total=$one[0]+$two[0]+$three[0]+$four[0];		
?>
        <h2>TOTAL REGISTRATIONS OF <?php echo $dept; ?>: <?php echo $total; ?></h2>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong><?php echo $one[0]; ?></strong>
                        <?php echo "<span style='font-size:28px;'>1/4 ".$dept; ?></span><br>Registrations 
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong><?php echo $two[0]; ?></strong>
                        <?php echo "<span style='font-size:28px;'>2/4 ".$dept; ?></span><br>Registrations 
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong><?php echo $three[0]; ?></strong>
                        <?php echo "<span style='font-size:28px;'>3/4 ".$dept; ?></span><br>Registrations 
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="item">
                        <strong><?php echo $four[0]; ?></strong>
                        <?php echo "<span style='font-size:28px;'>4/4 ".$dept; ?></span><br>Registrations 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts block END -->

    <!-- Team block BEGIN -->
    <div class="team-block content content-center margin-bottom-40" id="team">
        <div class="container">
            <h2><?php echo $dept; ?> <strong>Leaderboard</strong></h2>
            <h4>The Leader Board has been generated for all participants who scored a minimum of 10 Marks (50%). The maximum score of all the 3 languages (C, Java & Python) is considered for ranking.<br>
<!--			<strong>NOTE:</strong> This Leader Board is not the list of students selected for Level 2 or 3. It is meant only for preparing the Top 100 Coders List of SRKREC.</h4> -->
  
            <div class="col-md-12">
            
				<?php
				
				include "connect.php";
				
                //$query1="SELECT rollno, (greatest(CL1,PL1,JL1)+greatest(CL2,PL2,JL2)+greatest(CL3,PL3,JL3)) as score FROM ranks having score > 10.0 order by score desc;";
				$query1="SELECT rollno, sname, year, dept, greatest(CL1,PL1,JL1), greatest(CL2,PL2,JL2), greatest(CL3,PL3,JL3), (greatest(CL1,PL1,JL1)+greatest(CL2,PL2,JL2)+greatest(CL3,PL3,JL3)) as score FROM ranks having score >= 10.0 order by score desc;";
				$result1 = mysqli_query($conn, $query1);
	
//				echo "<center><table style='background-color:#FFFFFF;' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;'><th>S.NO</th><th>ROLL NUMBER</th><th>STUDENT NAME</th><th>BATCH</th><th>SCORE</th><th>DEPT. RANK</th><th>OVERALL RANK</th></tr>";
  				echo "<center><table style='background-color:#FFFFFF;text-align:center;' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;align:center;'><th>S.NO</th><th>ROLL NUMBER</th><th>STUDENT NAME</th><th>BATCH</th><th>LEVEL 1 (20%)</th><th>LEVEL 2 (30%)</th><th>LEVEL 3 (50%)</th><th>FINAL SCORE (100%)</th><th>DEPT. RANK</th><th>OVERALL RANK</th></tr>";
          
$count=0;
$rank=0;
$orank=0;
$prev_score=100;
$oprev_score=100;
				
while($rnd1=mysqli_fetch_row($result1))
     {
  	   if($rnd1[7] < $oprev_score) {$orank++;$oprev_score=$rnd1[7];}
 	   $rno=strtoupper($rnd1[0]);
	   if($rnd1[3]==$dept)
	   {
        $count++;
        if($rnd1[7] < $prev_score) {$rank++;$prev_score=$rnd1[7];}
        //   print "<tr><td align='center'>".$count."</td><td align='center'><font color='#DC143C'> ".$rno."</font></td><td> ".$rnd2[0]."</td><td align='center'>".$rnd2[1]."/4 ".$rnd2[2]."</td><td align='center'><b>".round($rnd1[1],2)."</b></td><td align='center'><b>#".$rank."</b></td><td align='center'><b>#".$orank."</b></td></tr>";  
        print "<tr><td align='center'>".$count."</td><td align='center'><font color='#DC143C'> ".$rno."</font></td><td><b>".$rnd1[1]."</b></td><td align='center'>".$rnd1[2]."/4 ".$rnd1[3]."</td><td align='center'>".round($rnd1[4],2)."</td><td align='center'>".round($rnd1[5],2)."</td><td align='center'>".round($rnd1[6],2)."</td><td align='center'><strong><b>".round($rnd1[7],2)."</b></strong></td><td align='center'><b>#".$rank."</b></td><td align='center'><b>#".$orank."</b></td></tr>";  
	   }		   
     }							  

echo "</table></center><br><br>";			 
mysql_close($conn);
?>
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
                    <p align='justify'>Code Master is jointly organized by MCR Web Solutions and Technology Centre of SRKR Engineering College, Bhimavaram. The contest has recieved wonderful responsive during the last two seasons in 2015 & 2016 and winners have been given exciting prizes. </p>
                </div>
                <!-- END BOTTOM ABOUT BLOCK -->
                <!-- BEGIN TWITTER BLOCK --> 
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2 class="margin-bottom-0">PAST CODE MASTER EVENTS</h2>
                    <h5><a href='http://www.srkrcampus.net/codemaster2016/' target='_new'>Code Master 2016</a></h5>
                    <h5><a href='http://www.srkrcampus.net/codemaster2015/' target='_new'>Code Master 2015</a></h5>
                </div>
                <!-- END TWITTER BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <!-- BEGIN BOTTOM CONTACTS -->
                    <h2>Our Contacts</h2>
                    <address class="margin-bottom-20">
                        MCR Web Solutions & Technology Centre<br>
                        2nd Floor, I-Hub Incubation Centre,<br>
                        Z-Block, SRKR Engineering College,<br>
			Chinna Amiram, Bhimavaram, A.P. - 534204<br>
                        Phone: <a>+91 92 93 94 0004</a><br>
                        Email: <a href="mailto:codemaster@srkrec.edu.in">codemaster@srkrec.edu.in</a><br>
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
                    <div class="copyright">© Code Master Contest 2018 . ALL Rights Reserved.</div>
                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-2 col-sm-2 text-right">
                    <p class="powered">Powered by: <a href="http://www.mcr.org.in/"><img src='assets/onepage/img/mcr.png'></a></p>
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
</body>
</html>