<?php include "access_check.php"; ?>
<?php
$page="main";

$event=$_GET['event'];

if($event == 'quiz') {$event = "Mega Quiz";}
if($event == 'joomla') {$event = "Joomla Workshop";}
if($event == 'ppt') {$event = "Paper Presentation";}
if($event == 'web') {$event = "Web Designing Contest";}
if($event == 'sfilm') {$event = "Short Film Contest";}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2015 Admin Module</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
	</head>
<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2015 Admin Module</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
<div style='text-align:right;color:blue;font-size:12px;'><a href='logout.php'><h3>Log Out</h3></a></div>
<br style="clear: both;" />
	<div id="content"><br>
		<h2>Event Registrations of <?php echo $event; ?>!</h2>
<div style='text-align:right;color:blue;font-size:12px;'><a href='registrations.php'>Go Back</a></div>
		<p align='justify'>
<?php 

include "connect.php";
		 
$result=mysql_query("SELECT pid, roll, fname, lname, college, event, status from registrations where event = '$event' order by fname");

if(mysql_num_rows($result) == 0)
  {
 	echo "<tr><th>No Results Found!</th></tr>";
  }  
else
  {
    $cnt=1;
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>S.No.</th><th>Registration ID</th><th>Roll Number</th><th>Participant Name</th><th width='200px'>College</th><th>Event</th><th>Confirm Registration</th></tr>";
	while($row=mysql_fetch_array($result))
     {
    	echo "<tr><td align='center'>".$cnt."</td><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td>".ucwords($row[2])." ".ucwords($row[3])."</td><td>".ucwords($row[4])."</td><td>".ucwords($row[5])."</td><td align='center'>";

        if($row[6] == 0)
          {		
    		echo "<a href='edit_registration.php?pid=".$row[0]."' style='color:blue;font-weight:bold;'>Confirm / Edit Registration</a>";
	      } 	
        else
          {		
    		echo "<span style='color:#DA0008;font-weight:bold;'>Already Registered</span><br><a href='print_registration.php?pid=$row[0]' target='_new'>Print Registration</a>";
	      } 	
		echo "</td></tr>";
		$cnt++;
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
