<?php include "access_check.php"; ?>
<?php
$page="main";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2018 Admin Module</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
	</head>
<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2018 Admin Module</a></h1>
		<h2>The Grand Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
<div style='text-align:right;color:blue;font-size:12px;'><a href='logout.php'><h3>Log Out</h3></a></div>
<br style="clear: both;" />
<div id="content"><br>
	<p align='justify'>
<!-- TOTAL FIRST SECTION -->
<?php
$rollno = addslashes(trim($_POST['rollno']));
$name = addslashes(trim($_POST['name']));
$email = addslashes(trim($_POST['email']));
$mobile = addslashes(trim($_POST['mobile']));
$year = addslashes(trim($_POST['year']));
$dept = addslashes(trim($_POST['dept']));
$language = addslashes(trim($_POST['language']));
$cr_id='Admin';

include "connect.php";

mysqli_query($conn, "update registrations set name='$name', year=$year, dept='$dept', email='$email', mobile='$mobile' where rollno = '$rollno' and year=$year and dept='$dept'") || die (mysql_error());

mysqli_query($conn, "update payments set paystatus=1 where rollno = '$rollno' and language='$language'") || die (mysql_error());

$result=mysqli_query($conn, "SELECT password from studentsdb where rollno = '$rollno';");

$row=mysqli_fetch_array($result);

$password=$row[0];

echo "<p style='text-align:center; font-size:20px; color:#DA0008'>Registration Confirmed!<br></p><br>";

//OFFER CODE
  $offer_res=mysqli_query($conn, "SELECT * FROM payments where rollno='$rollno' and language='$language';");
  $ofrow=mysqli_fetch_array($offer_res);

  if($ofrow['coupon_code'] == NULL)
   {
     $offer_res=mysqli_query($conn, "SELECT * FROM offers where status=0 ORDER BY RAND() LIMIT 1;");
     $ofrow=mysqli_fetch_array($offer_res);

     $sno=$ofrow['sno'];
     $coupon_code=rand(1000,9999);

     mysqli_query($conn, "update payments set offer=$sno, coupon_code=$coupon_code, cr_id = '$cr_id' where rollno='$rollno' and language='$language';");
     mysqli_query($conn, "update offers set status=1 where sno=$sno;");

   echo "<center><h4>Offer Generated Now For This User. Coupon Code: <strong><a>$coupon_code</a></strong><br>Visit the <b>Offer Zone</b> section of <a href='http://www.bhimavaramhub.in' target='offer'>www.bhimavaramhub.in</a> and check your offer!</h4></center>";

   $mess="Dear Student,%0a%0aYour B-Hub Offer Coupon Code for $language: $coupon_code!%0aFind your offer @ http://www.bhimavaramhub.in/offer_zone.php%0a%0a-Tech Centre,SRKR";

   $sms = file_get_contents("http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=smudunuri2&password=suresh11&sendername=SRKRTC&mobileno=91".$mobile."&message=".urlencode($mess)."");

   }


//SMS CODE
$mess="Dear student,%0a%0aCode Master'18 UserID for $language: $rollno%0aPassword: $password%0aURL: www.mcr.org.in/level1%0aLast Date: 20th FEB%0a%0a-Tech Centre,SRKR";

$sms = file_get_contents("http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=smudunuri2&password=suresh11&sendername=SRKRTC&mobileno=91".$mobile."&message=".urlencode($mess)."");

echo "<hr><br><br><div style='text-align:center;color:blue;font-size:14px;'>";
echo $sms."<br>";


//Mail Code
require_once('email/classes/class.phpmailer.php');
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded		

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "techcenter.srkr@gmail.com";  // GMAIL username
$mail->Password   = "tech@8080";            // GMAIL password

$mail->SetFrom('techcenter.srkr@gmail.com', 'Technology Center, SRKR');
$mail->AddReplyTo($email);
		
$mail->Subject = "Code Master 2018 - Login Credentials for ".$language;
$mail->Body = "Dear $name\n\nCongratulations! Your registration to Code Master 2018, the Annual Grand Online Programming Challenge of SRKREC, has been confirmed. You can now take the Level 1 Online Exam @ the following link:\n\nURL: http://www.mcr.org.in/level1\nLOGIN ID: $rollno\nPASSWORD: $password\n\nMake sure you take your exam before 20th February 2018 Midnight 12:00 PM. Please note that quiz will be closed after the deadline and registration gets cancelled after the deadline.\n\nRULES & REGULATIONS:\n1. Level 1 is an online exam with 20 objective questions (with easy to moderate complexity) related to $language programming.\n2. TIME LIMIT: 20 Minutes.\n3. You can take your exam at Technology Centre, 2nd Floor, Z-Block (9:00 AM to 7:00 PM) or at Digital Learning Centre (9:00 AM to 11:00 PM) or at General Computer Centre (GCC) or at any place via a PC / Laptop / Tab / Mobile.\n4. A student can re-register but only the score of the latest attempt will be counted. A max of 2 registrations will be allowed.\n5. Make sure you have a decent internet connection and no power realted problems.\n6. Any technical trouble / power failure / internet issue has to be reported to technology centre immediately.\n\nIn case of any trouble, please feel free to contact Technology Centre, 2nd Floor, Z-Block (Canteen Building), SRKREC Campus.\n\nWish you good luck!\n\n-Best Wishes\nCode Master 2018 Team\nMCR Web & Technology Centre\nS.R.K.R. Engineering College\nBhimavaram, WG District, AP.\nPh:+91 9885050551, +91 9293940004";

$mail->AddAddress($email);
$mail->AddBCC("suresh.mudunuri@srkrec.edu.in", "Dr.Suresh Mudunuri");
$mail->Send();
echo "E-mail has been successfully sent to: $email</div>";


echo "<br><div style='text-align:center;color:blue;font-size:14px;'><a href='registrations.php'>GO BACK TO REGISTRATIONS HOME</a></div>";

?>
</table>
</td>
<td align='left'>
</td>
</tr>
</table>
</p>
<!-- /left -->
</td>
</tr>
</table>
<!-- END OF TOTAL FIRST SECTION -->
</td>
<br><br><br><br>
</p>
<div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
