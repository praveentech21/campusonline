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
		<h2 align='center'>Code Master 2018 Confirm Registration!</h2>
		<p align='justify'>
<!-- TOTAL FIRST SECTION -->
<p class="bar01" style="color: #DA0008; font-size: 18px; text-align:center;">Edit / Confirm Registration</p></td>
<div style='text-align:right;color:blue;font-size:12px;'><a href='registrations.php'>Go Back</a></div>

<?php

include "connect.php";

$pid = $_GET['pid'];
$language = $_GET['language'];

if($language=='C') { $reg_fee=50;} else {$reg_fee=30;}

$result=mysqli_query($conn, "SELECT rollno, name, year, dept, email, mobile FROM registrations where rollno = '$pid'");
$row=mysqli_fetch_array($result);

$rollno=$row[0];
$name=$row[1];
$year=$row[2];
$dept=$row[3];
$email=$row[4];
$mobile=$row[5];

print "
<form action='confirm_registration.php' method='post'>
<table align='center' style='margin-left:200px;'>";
echo "
<tr><td align='right'><b>Roll Number:</b></td><td><input type='text' name='rollno' value='".$rollno."'></td></tr>";
echo "<tr><td align='right'><b>Participant Name:</b></td><td><input type='text' name='name' size='30' value='".$name."'></td></tr>
<tr><td align='right'><b>Year:</b></td><td><input type='text' name='year' value='".$year."' size='1'>/4</td></tr>
<tr><td align='right'><b>Department:</b></td><td><input type='text' name='dept' value='".$dept."'></td></tr>
<tr><td align='right'><b>E-mail ID:</b></td><td><input type='text' name='email' size='30' value='".$email."'></td></tr>
<tr><td align='right'><b>Mobile No:</b></td><td><input type='text' name='mobile' size='30' value='".$mobile."'></td></tr>
<tr><td align='right'><b>Registration Fee:</b></td><td><input type='text' name='fee' size='10' value='Rs. $reg_fee/-' disabled></td>;
<tr><td align='right'><b>Language:</b></td><td><input type='text' name='language1' size='10' value='$language' disabled><input type='hidden' name='language' value='$language'></td></tr>";
echo "<tr><td colspan='2' align='center' valign='middle'><br><input type='submit' value='Confirm Registration' width='79' height='20' style='background-color:#DA0008; font-weight: bold; color: #ffffff; padding:5px;' alt='' border='0'></td></tr>";
echo "</table></form>";

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

			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
