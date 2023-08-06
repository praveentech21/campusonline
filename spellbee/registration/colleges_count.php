<?php include "access_check.php"; ?>
<?php
$page="main";

$event=$_GET['event'];

if($event == 'joomla') {$event = "Joomla Workshop";}
if($event == 'ppt') {$event = "Paper Presentation";}
if($event == 'web') {$event = "Web Designing";}
if($event == 'sfilm') {$event = "Short Film Contest";}

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
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">AGASTYA'15 Admin Module</a></h1>
		<h2>Tech Fest of CSE Department, GVIT</h2>
	</div>
<div id="main">
<div style='text-align:right;color:blue;font-size:12px;'><a href='logout.php'><h3>Log Out</h3></a></div>
<br style="clear: both;" />
	<div id="content"><br>
		<h2>Event Registrations of <?php echo $event; ?>!</h2>
		<p align='justify'>
         <?php 
          include "connect.php";
      	  $colleges=mysql_query("SELECT college, count(*) FROM registrations where event='Online Coding Challenge' group by college");
          echo "<table border='1' cellspacing='0'><tr bgcolor='green'><th style='color:#ffffff'>S.No</th><th style='color:#ffffff'>College</th><th style='color:#ffffff'>Count</th></tr>";
		  $cnt=1;
          while ($row=mysql_fetch_row($colleges))
	      {
			echo "<tr style='font-size:14px;'><td>".$cnt."</td><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td></tr>";
            $cnt++;
  		  }
    	  echo "</table>";	  


         ?>			               			
			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
