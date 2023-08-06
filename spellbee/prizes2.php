<?php
 
function get_prize($rank)
{
      if($rank==1) { $prize="<span style='color:green;'>Python Final Winner - TITAN Watch</span>"; return $prize;}
  elseif($rank==2) { $prize="<span style='color:green;'>Python Final Winner - TITAN Watch</span>"; return $prize;}	
  elseif($rank==3) { $prize="<span style='color:blue;'>C Final Winner - APPLE iPhone SE</span>"; return $prize;}	
  elseif($rank==4) { $prize="<span style='color:green;'>JAVA Final Winner - FOSSIL Watch</span>"; return $prize;}	
  elseif($rank==5) { $prize="<span style='color:green;'>Women Coder of SRKREC - TITAN Watch</span>"; return $prize;}
  elseif($rank==6) { $prize="<span style='color:#FF4000;'>CSE Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank==27) { $prize="<span style='color:#FF4000;'>ECE Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank==11) { $prize="<span style='color:#FF4000;'>IT Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank==54) { $prize="<span style='color:#FF4000;'>EEE Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank==43) { $prize="<span style='color:#FF4000;'>MECHANICAL Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank==149) { $prize="<span style='color:#FF4000;'>CIVIL Topper - Mi Smart Band</span>"; return $prize;}
  elseif($rank >=7 && $rank <=10 ) { $prize='Top 10 - Mi Smart Band'; return $prize;}
  elseif($rank >=12 && $rank <=20 ) { $prize='Top 20 - Fast Track Watch'; return $prize;}
  elseif($rank >=21 && $rank <=30 ) { $prize='Top 30 - VR Box / FREE Course Voucher'; return $prize;}
  elseif($rank >=31 && $rank <=50 ) { $prize='Top 50 - NareshIT Course Voucher Worth Rs.1,000/- (or)<br> FREE Tech Centre Summer Internship Voucher Worth Rs.2,000/-'; return $prize;}
  elseif($rank >=51 && $rank <=75 ) { $prize='Tech Centre Summer Internship Voucher Worth Rs.1,200/-'; return $prize;}
  elseif($rank >=76 && $rank <=100 ) { $prize='Tech Centre Summer Internship Voucher Worth Rs.1,000/-'; return $prize;}
  else { $prize='-'; return $prize;}	
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
 font-size:12px;	
 color:#000000;	
}
   </style>

</head>
<!--DOC: menu-always-on-top class to the body element to set menu on top -->
<body class="menu-always-on-top">

    <div class="team-block content content-center margin-bottom-40" id="team">
        <div class="container"><br>
			<h2><strong><b>CODE MASTER 2018</b><br>WINNERS & PRIZES</strong></h2>
<h4><!-- The Top Coders List has been generated by calculating the scores of all 3 levels. The maximum score of all the 3 languages (C, Java & Python) for every level is considered for ranking.<br>
	<strong>NOTE:</strong> This Leader Board is not the list of students selected for Level 2 or 3. It is meant only for preparing the Top 100 Coders List of SRKREC.</h4> -->
  
            <div class="col-md-12">
				<?php
				
				include "connect.php";
				
                $query1="SELECT rollno, sname, year, dept, greatest(CL1,PL1,JL1), greatest(CL2,PL2,JL2), greatest(CL3,PL3,JL3), (greatest(CL1,PL1,JL1)+greatest(CL2,PL2,JL2)+greatest(CL3,PL3,JL3)) as score FROM ranks having score >= 43.0 order by score desc;";
				$result1 = mysqli_query($conn, $query1);
	
  echo "<center><table style='background-color:#FFFFFF;text-align:center;' border='0' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;align:center;'><th>S.NO</th><th>STUDENT NAME</th><th>OVERALL RANK</th></tr>";
            
  $count=0;
  $rank=0;
  $prev_score=100;
				
  while($rnd1=mysqli_fetch_row($result1))
     {
	   if($rnd1[1] < $oprev_score) {$orank++;$oprev_score=$rnd1[1];}
 	   $rno=strtoupper($rnd1[0]);
       $count++; $rank++;		 
	   $prize=get_prize($rank);	 
       print "<tr><td align='center'>".$count."</td><td style='text-align:left;'><b>".$rnd1[1]."</b><div style='font-size:10px;'>$rno - $rnd1[2]/4 $rnd1[3] <b>PRIZE:</b> $prize</div></td><td align='center' style='font-size:14px;'><b>#".$rank."</b></td></tr>";
     }							  
     print "<tr><td align='center'>101</td><td style='text-align:left;'><b>KANCHERLA LAHIR VENKATA SRI SYAM KIRAN</b><div style='font-size:10px;'>17B91A0170 - 1/4 CIVIL <b>PRIZE:</b> CIVIL Topper - Mi Smart Band</div></td><td align='center'><b>#149</b></td></tr>";
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