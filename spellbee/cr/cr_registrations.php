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
		<center><h3>Code Master 2018 Registrations of <?php echo $_SESSION['name']; ?>(<?php echo $_SESSION['type']; ?>)!</h3></center>

<div style='text-align:right;color:blue;font-size:12px;'><a href='registrations.php'>ALL CR STATS</a></div>
		<p align='justify'>
<?php 

include "connect.php";

$cr_id=$_SESSION['cr_id'];
$presult=mysqli_query($conn, "SELECT rollno, language, paystatus, offer, coupon_code, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p') from payments where cr_id = '$cr_id' order by timestamp desc;");

if(mysqli_num_rows($presult) == 0)
  {
    echo "<tr><th>You have not registered anyone!</th></tr>";
  }  
else
  {
     
    $cnt=1;
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>S.No.</th><th>Roll Number</th><th>Student Name</th><th>Batch</th><th>Language</th><th>Offer Code</th><th>Coupon Code</th><th>Reg. Time</th><th>Status</th></tr>";
     while($prow=mysqli_fetch_array($presult))
     {
        $rollno=$prow[0];    
        $result=mysqli_query($conn, "SELECT rollno, name, year, dept from registrations where rollno = '$rollno'");
        $row=mysqli_fetch_array($result);

    	echo "<tr><td align='center'>".$cnt."</td><td align='center'>".$row[0]."</td><td align='center'>".ucwords($row[1])."</td><td>".$row[2]."/4 ".ucwords($row[3])."</td><td>".$prow['language']."</td><td>".$prow['offer']."</td><td>".$prow['coupon_code']."</td><td>".$prow[5]."</td>";

        $paystatus=$prow['paystatus'];
        echo "<td align='center'>";	
        if($paystatus == 0) 
          {
           echo "<span style='color:blue;font-weight:bold;'>REGISTERED</span>";
          }
        else
          {
           echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span>";
          } 
    	  echo "</td>";
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
