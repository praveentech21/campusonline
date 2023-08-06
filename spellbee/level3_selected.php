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
 font-size:16px;	
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
            <h2><strong><b>LEVEL 3 (FINAL ROUND) SELECTED LIST</b></strong></h2>
        </div>
    </div>
    <!-- Team block BEGIN -->
    <div class="team-block content content-center margin-bottom-40" id="team">
        <div class="container">

			            <h2><strong>C PROGRAMMING</strong></h2>
            <h4><strong>CUT-OFF SCORE FOR C:</strong> 16/20 (for CSE/IT/ECE) 15/20 (for 1/4 Students) 13/20 (for MECH/CIVIL/EEE)<br>
			<strong>C FINAL EXAM DATE:</strong> 13th March 2018 - 1:00 PM 
			</h4>
            <div class="col-md-12">

<?php
				include "connect.php";
			
                $query1= "select username, max(grade) as grade from cml1_user u, cml1_quiz_grades g where u.id=g.userid and quiz=6 and username not in ('codemaster', 'admin', 'siva', 'python', 'pavan', 'kiran', 'java', 'guest', 'c_admin', 'admin') and grade > 10.0 group by username order by grade desc";
		     	$result1 = mysqli_query($conn2, $query1);
	
echo "<center><table style='background-color:#FFFFFF;' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;'><th>S.NO</th><th>ROLL NUMBER</th><th>STUDENT NAME</th><th>BATCH</th><th>LANGUAGE</th><th>SCORE</th></tr>";
            
$count=0;
				
while($rnd1=mysqli_fetch_row($result1))
     {
 	   $rno=strtoupper($rnd1[0]);
       $score=round($rnd1[1],2);
	   $query= "select name, year, dept from registrations where rollno='$rno'";
  	   $result = mysqli_query($conn, $query);
   	   $rnd2=mysqli_fetch_row($result);  
	   $dept=$rnd2[2];	 
		 
       if($dept == 'CSE')
		{
 			$cutoff=16;
		}
		elseif($dept == 'ECE')
		{
		 $cutoff=16;
		}
		elseif($dept == 'EEE')
		{
		 $cutoff=13;
		}
		elseif($dept == 'MECH')
		{			
		 $cutoff=13;
		}
		elseif($dept == 'CIVIL')
		{
		 $cutoff=13;
		}
		elseif($dept == 'IT')
		{
		 $cutoff=16;
		}
		
		 if($rnd2[1] == 1 && $cutoff != 13)
  		  {
		    $cutoff=15;
		  }
			 

	   if($score >= $cutoff)
	    {   
         $count++;
         print "<tr><td align='center'>".$count."</td><td align='center'><font color='#DC143C'> ".$rno."</font></td><td> ".$rnd2[0]."</td><td align='center'>".$rnd2[1]."/4 ".$rnd2[2]."</td><td align='center'><b>C</b></td><td align='center'><b>".$score."</b></td></tr>";  
        }
	 }	 

echo "</table></center><br><br>";			 

?>

			
			            <h2><strong>PYTHON</strong></h2>
<h4><strong>CUT-OFF SCORE FOR PYTHON:</strong> 15/20<br>
<strong>PYTHON FINAL EXAM DATE:</strong> 08th March 2018 - 1:00 PM 
</h4>
  
            <div class="col-md-12">
<?php
				
				$query1= "select username, max(grade) as grade from cml1_user u, cml1_quiz_grades g where u.id=g.userid and quiz=8 and username not in ('codemaster', 'admin', 'siva', 'python', 'pavan', 'kiran', 'java', 'guest', 'c_admin', 'admin') and grade > 10.0 group by username order by grade desc";
		     	$result1 = mysqli_query($conn2, $query1);
	
echo "<center><table style='background-color:#FFFFFF;' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;'><th>S.NO</th><th>ROLL NUMBER</th><th>STUDENT NAME</th><th>BATCH</th><th>LANGUAGE</th><th>SCORE</th></tr>";
            
$count=0;
				
while($rnd1=mysqli_fetch_row($result1))
     {
 	   $rno=strtoupper($rnd1[0]);
       $score=round($rnd1[1],2);
	   $query= "select name, year, dept from registrations where rollno='$rno'";
  	   $result = mysqli_query($conn, $query);
   	   $rnd2=mysqli_fetch_row($result);  
	   $dept=$rnd2[2];	 
		 
           if($dept == 'CSE')
		{
 			$cutoff=13;
		}
		elseif($dept == 'ECE')
		{
		 $cutoff=8;
		}
		elseif($dept == 'EEE')
		{
		 $cutoff=13;
		}
		elseif($dept == 'MECH')
		{			
		 $cutoff=13;
		}
		elseif($dept == 'CIVIL')
		{
		 $cutoff=13;
		}
		elseif($dept == 'IT')
		{
		 $cutoff=16;
		}

	   if($score >= 15)
	    {   
         $count++;
         print "<tr><td align='center'>".$count."</td><td align='center'><font color='#DC143C'> ".$rno."</font></td><td> ".$rnd2[0]."</td><td align='center'>".$rnd2[1]."/4 ".$rnd2[2]."</td><td align='center'><b>PYTHON</b></td><td align='center'><b>".$score."</b></td></tr>";  
        }
	 }	 

echo "</table></center><br><br>";			 
?>	
			<h2><strong>JAVA</strong></h2>
<h4><strong>CUT-OFF SCORE FOR JAVA:</strong> 15/20<br>
<strong>JAVA FINAL EXAM DATE:</strong> 06th March 2018 - 1:00 PM 
				</h4>

<div class="col-md-12">
<?php
				
				$query1= "select username, max(grade) as grade from cml1_user u, cml1_quiz_grades g where u.id=g.userid and quiz=7 and username not in ('codemaster', 'admin', 'siva', 'python', 'pavan', 'kiran', 'java', 'guest', 'c_admin', 'admin') and grade > 10.0 group by username order by grade desc";
		     	$result1 = mysqli_query($conn2, $query1);
	
echo "<center><table style='background-color:#FFFFFF;' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;'><th>S.NO</th><th>ROLL NUMBER</th><th>STUDENT NAME</th><th>BATCH</th><th>LANGUAGE</th><th>SCORE</th></tr>";
            
$count=0;
				
while($rnd1=mysqli_fetch_row($result1))
     {
 	   $rno=strtoupper($rnd1[0]);
       $score=round($rnd1[1],2);
	   $query= "select name, year, dept, email, mobile from registrations where rollno='$rno'";
  	   $result = mysqli_query($conn, $query);
   	   $rnd2=mysqli_fetch_row($result);  
	   $dept=$rnd2[2];	 
		 
       if($dept == 'CSE')
		{
 			$cutoff=16;
		}
		elseif($dept == 'ECE')
		{
		 $cutoff=14;
		}
		elseif($dept == 'EEE')
		{
		 $cutoff=16;
		}
		elseif($dept == 'MECH')
		{			
		 $cutoff=16;
		}
		elseif($dept == 'CIVIL')
		{
		 $cutoff=16;
		}
		elseif($dept == 'IT')
		{
		 $cutoff=16;
		}

	   if($score >= 15) //$cutoff)
	    {   
         $count++;
         print "<tr><td align='center'>".$count."</td><td align='center'><font color='#DC143C'> ".$rno."</font></td><td> ".$rnd2[0]."</td><td align='center'>".$rnd2[1]."/4 ".$rnd2[2]."</td><td align='center'><b>JAVA</b></td><td align='center'><b>".$score."</b></td></tr>";  
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
