<?php include "access_check.php"; ?>
<?php
$page="main";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2018 CR Module</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
<style type='text/css'>


td
{
 font-size:14px;
}
</style>

	</head>
<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2018 CR Module</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
<div style='text-align:right;color:blue;font-size:12px;'><a href='logout.php'><h3>Log Out</h3></a></div>
<br style="clear: both;" />
	<div id="content">
	<center><h3>Code Master 2018 Registrations of All CRs</h3></center>

<div style='text-align:right;color:blue;font-size:12px;'><a href='cr_registrations.php'>Go Back</a></div>
		<p align='justify'>
<?php 

include "connect.php";

$presult=mysqli_query($conn, "SELECT cr_id, count(*) as cnt from payments group by cr_id order by cnt desc;");

if(mysqli_num_rows($presult) == 0)
  {
    echo "<tr><th>There are no registrations done!</th></tr>";
  }  
else
  {
     
    $cnt=1;
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>S.NO.</th><th>CR ID</th><th>CR NAME</th><th>DEPARTMENT</th><th>TYPE</th><th>TOTAL REGISTRATIONS</th></tr>";
     while($prow=mysqli_fetch_array($presult))
     {
        $cr_id=$prow[0];    
        $result=mysqli_query($conn, "SELECT name, dept, type from coordinators where cr_id = '$cr_id'");
        $row=mysqli_fetch_array($result);

    	echo "<tr><td align='center'>".$cnt."</td><td align='center'>".$cr_id."</td><td align='center'>".ucwords($row[0])."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$prow[1]."</td>";
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
