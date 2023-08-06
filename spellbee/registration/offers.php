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
<br style="clear: both;" />
	<div id="content"><br>
		<h2 align='center'>B-Hub Offers List 2018</h2>

<p>

<?php 

include "connect.php";

$result=mysqli_query($conn, "SELECT * from offers;");

if(mysqli_num_rows($result) == 0)
  {
 	echo "<tr><th>No Offers Found!</th></tr>";
  }  
else
  {
    $cnt=1;
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>Offer ID</th><th>Offer Details</th><th>Offer Status</th></tr>";
   while($row=mysqli_fetch_array($result))
     {
    	echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".ucwords($row[1])."</td><td align='center'>";
        $status=$row[2];
        $offer_id=$row[0];

        if($status==0) { echo "<span style='color:green;font-weight:bold;'>Not Yet Alloted</span>"; }
        else
          {
            $rollres=mysqli_query($conn, "SELECT rollno, paystatus from payments where offer='$offer_id';");
            $orow=mysqli_fetch_array($rollres);
            
            echo "<span style='color:#DA0008;font-weight:bold;'>".$orow[0]." / ";
            if($orow[1] == 1) {echo "<span style='color:green;font-weight:bold;'>PAID</span>";}
            else {echo "<span style='color:blue;font-weight:bold;'>Not Yet PAID</span>";}
            echo "</span>";     
          }

         echo "</td></tr>";
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
