<?php include "access_check.php"; ?>
<?php
$page="main";

$year=0;
if(isset($_GET['year']))
 {
  $year=$_GET['year'];
 }
$dept=$_GET['dept'];

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
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
<div style='text-align:right;color:blue;font-size:12px;'><a href='logout.php'><h3>Log Out</h3></a></div>
<br style="clear: both;" />
	<div id="content"><br>
		<h2>Code Master 2018 Registrations of 
		<?php 
		
		 if($year!=0) {echo $year."/4 ".$dept;} else { echo $dept;} ?>!
		
		</h2>
<div style='text-align:right;color:blue;font-size:12px;'><a href='registrations.php'>Go Back</a></div>
		<p align='justify'>
<?php 

include "connect.php";

$whr="";

if($year!=0)
{
 $whr=" and year=$year";
} 

$result=mysqli_query($conn, "SELECT rollno, name, year, dept, email, mobile from registrations where dept = '$dept'$whr");

if(mysqli_num_rows($result) == 0)
  {
 	echo "<tr><th>No Results Found!</th></tr>";
  }  
else
  {
    $cnt=1;
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>S.No.</th><th>Roll Number</th><th>Student Name</th><th>Batch</th><th>E-mail ID</th><th>Mobile Number</th><th>C</th><th>Java</th><th>Python</th></tr>";
	while($row=mysqli_fetch_array($result))
     {
    	echo "<tr><td align='center'>".$cnt."</td><td align='center'>".$row[0]."</td><td align='center'>".ucwords($row[1])."</td><td>".$row[2]."/4 ".ucwords($row[3])."</td><td>".strtolower($row[4])."</td><td>".$row[5]."</td>";

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p') FROM payments where rollno = '$row[0]' and language='C'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span>";} 
    	  echo "</td>";
        }

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p') FROM payments where rollno = '$row[0]' and language='JAVA'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span>";} 
    	  echo "</td>";
        }

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p') FROM payments where rollno = '$row[0]' and language='PYTHON'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span>";} 
    	  echo "</td>";
        }
        $cnt++;		 
		echo "</tr>";
     }
    echo "</table>"; 
  }


         ?>			               			
			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
