<?php 

$dept="CSE";

if($_GET['dept'])
  {
	$dept=$_GET['dept'];
  }	
  
include "connect.php";
$cser=mysql_query("SELECT count(*) FROM registrations where batch like '%CSE'");
$row=mysql_fetch_row($cser);
$cse=$row[0];
$itr=mysql_query("SELECT count(*) FROM registrations where batch like '%IT'");
$row=mysql_fetch_row($itr);
$it=$row[0];
$ecer=mysql_query("SELECT count(*) FROM registrations where batch like '%ECE'");
$row=mysql_fetch_row($ecer);
$ece=$row[0];
$eeer=mysql_query("SELECT count(*) FROM registrations where batch like '%EEE'");
$row=mysql_fetch_row($eeer);
$eee=$row[0];
$mechr=mysql_query("SELECT count(*) FROM registrations where batch like '%MECH'");
$row=mysql_fetch_row($mechr);
$mech=$row[0];
$civilr=mysql_query("SELECT count(*) FROM registrations where batch like '%CIVIL'");
$row=mysql_fetch_row($civilr);
$civil=$row[0];

$total= $cse+$it+$ece+$eee+$civil+$mech;

?>			               			

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2015 Statistics</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Overall', 'Registrations'],
          ['CSE', <?php echo $cse; ?>],
          ['IT', <?php echo $it; ?>],
          ['ECE', <?php echo $ece; ?>],
          ['EEE', <?php echo $eee; ?>],
          ['MECH', <?php echo $mech; ?>],
          ['CIVIL', <?php echo $civil; ?>]
        ]);

        var options = {
          title: 'Overall Registrations',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [ '<?php echo $dept; ?>',  'Department Registrations'],
		  <?php
    
	        include "connect.php";
            $result=mysql_query("SELECT batch, count(*) FROM registrations where batch like '%$dept' group by batch;");              			
		  
  		    while($row=mysql_fetch_row($result))
			  {
			    echo "['".$row[0]."', ".$row[1]."],";        
			  }

		    ?>
        ]);

        var options = {
          title: '<?php echo $dept; ?> Department Registrations',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>
    </head>
<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2015</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
		<h2 align='center'>Code Master 2015 Statistics</h2>
		<h3 align='center' style="font-family:'Lato';">Total Registrations: <?php echo $total; ?></h3>
		<center>
        <table border ='1' width='100%'>
        <tr>
		<td align='center'><b>Click On Department:</b></td>
		<td align='center'><a href='statistics.php?dept=CSE' style='color:blue; font-size:13px;'><b>CSE</b></a></td>
		<td align='center'><a href='statistics.php?dept=IT' style='color:blue; font-size:13px;'><b>IT</b></a></td>
		<td align='center'><a href='statistics.php?dept=ECE' style='color:blue; font-size:13px;'><b>ECE</b></a></td>
		<td align='center'><a href='statistics.php?dept=EEE' style='color:blue; font-size:13px;'><b>EEE</b></a></td>
		<td align='center'><a href='statistics.php?dept=MECH' style='color:blue; font-size:13px;'><b>MECH</b></a></td>
		<td align='center'><a href='statistics.php?dept=CIVIL' style='color:blue; font-size:13px;'><b>CIVIL</b></a></td>
        </tr>
		</table>
        </center>
		<table border='0'>
		<tr>
		<td>
		<div id="piechart_3d" style="width: 550px; height: 300px;"></div>
		</td></tr>
		<tr>
		<td>
		<div id="piechart_3d2" style="width: 550px; height: 300px;"></div>
		</td></tr>
		</table>
			<div class="clear">&nbsp;</div>
<?php include "footer.php"; ?>
</body>
</html>
