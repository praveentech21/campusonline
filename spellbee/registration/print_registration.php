<?php include "access_check.php"; ?>
<?php
$page="main";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>AGASTYA'15 Admin Module</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
	</head>
<body>
<div id="container760">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header" style='background-color:#f2f2f2;text-align:center;'>
	 <img src='images/logo.jpg'>
	</div>
<div id="main">
	<div id="content">
		<h2 align='center'>AGASTYA'15 REGISTRATION RECEIPT!</h2>
<table border='1' cellspacing='0' width='100%'>
<tr>
<td valign='top' width='60%'>		
<p class="bar01" style="color: #DA0008; font-size: 18px;text-align:center;"><u>Participant Details</u></p>
<center>
<?php
include "connect.php";
date_default_timezone_set('Asia/Calcutta'); 

$pid = $_GET['pid'];

$result=mysql_query("SELECT pid, roll, pname, college, branch, event, fee, email, batch FROM confirmed where pid = $pid");
$row=mysql_fetch_array($result);

$pid=$row[0];
$roll=$row[1];
$pname=$row[2];
$college=$row[3];
$branch=$row[4];
$event=$row[5];
$fee=$row[6];
$email=$row[7];

if($event == 'Paper Presentation') {$venue= "2nd Floor CSE Dept Lecture Hall 1 & 2";}
if($event == 'Joomla Workshop') {$venue= "Ground Floor CSE Lab 3";}
if($event == 'Short Film Contest') {$venue= "Seminar Hall, 1st Floor";}
if($event == 'Web Designing Contest') {$venue= "Ground Floor CSE Lab 2";}
if($event == 'Mega Quiz') {$venue= "Ground Floor Seminar Hall (109), 2nd Floor Drawing Hall 2 & 2nd Floor CSE Seminar Hall";}
?>
<table border ='0'>
 <tr><td align='right' width='40%'><b>Participant ID:</b></td><td width='60%'><?php echo $pid; ?></td></tr>
 <tr><td align='right'><b>Roll Number:</b></td><td><?php echo $roll; ?></td></tr>
 <tr><td align='right'><b>Participant Name:</b></td><td><?php echo $pname; ?></td></tr>
 <tr><td align='right'><b>College:</b></td><td><?php echo $college; ?></td></tr>
 <tr><td align='right'><b>Branch:</b></td><td><?php echo $branch; ?></td></tr>
 <tr><td align='right'><b>Event Registered:</b></td><td style="color: #DA0008;"><?php echo $event; ?></td></tr>
 <tr><td align='right'><b>Payment Status:</b></td><td>Paid Rs. <?php echo $fee; ?>/-</td></tr>
 </table>
</center> 
</td>
<td valign='top' width='40%'>
<p class="bar01" style="color: #DA0008; font-size: 18px;text-align:center;"><u>Event Details</u></p>
<table border ='0'>
<tr><td align='right' width='40%'><b>VENUE:</b></td><td width='60%'><?php echo $venue; ?></td></tr>
<tr><td align='right'></td><td></td></tr>
<tr><td align='right'><b>WiFiUserName:<br>WiFi Password:</b></td><td>GVIT_AGASTYA<br>joomla@2242</td></tr>
<tr><td align='right'></td><td></td></tr>
<tr><td align='right'><b>Help Line:</b></td><td>+91 9030958359 (Avinash)<br>+91 9866600002 (Convener)</td></tr>
</td></tr>
<tr><td align='right'><b>Event Date:</b></td><td><?php echo date('jS F Y'); ?></td></tr>
</table>
</td>
</tr>
</table>
<!-- /left -->
</td>
</tr>
</table>
<!-- END OF TOTAL FIRST SECTION -->
</td>
<table width='100%' border='0'>
<tr><td><b>SEAL</b><br><br></td><td align='right'><b>Registered By</b><br><br></td></tr>
</table>
			</p>

			<div class="clear">&nbsp;</div>
		</div>
	</div>
<?php include "footer.php"; ?>
<hr>
<div style='background-color:#ffffff;'>
<center>
<span style="font=family:'Oswald', Arial; font-size:16px;"><b>E-BAY ONLINE SHOPPING COUPONS</b></span>
<p>Two E-Bay Online Shopping Discount Coupons worth Rs. 100/- each will be emailed to $email soon.</p>
</center>
<hr>
</div>
<div style='background-color:#ffffff;'>
<img src='images/scissor.jpg'>
<center>
<p style="font=family:'Oswald', Arial; font-size:24px;text-align:center;">LUCKY DRAW COUPON<br>
<span style='font-size:16px;text-align:center;padding-top:0px;'><b>Participant ID: <?php echo $pid;?></b></span></p>
<b>Roll Number: </b><?php echo $roll;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Name: </b><?php echo $pname; ?><br>
<b>College: </b><?php echo $college;?>
</center>
<img src='images/scissor2.jpg'>
</div>
</body>
</html>
