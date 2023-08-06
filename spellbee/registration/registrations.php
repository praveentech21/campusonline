<?php include "access_check.php"; ?>
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
		<h2 align='center'>User ID & Password Generation!</h2>

<div style='text-align:right;color:blue;font-size:12px;'><a href='offers.php' target='offers'>B-HUB Offers</a></div>
		<p align='justify'>
<?php
include "connect.php";

$cser=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='CSE';");
$row=mysqli_fetch_row($cser);
$cse=$row[0];

$itr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='IT';");
$row=mysqli_fetch_row($itr);
$it=$row[0];

$ecer=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='ECE';");
$row=mysqli_fetch_row($ecer);
$ece=$row[0];

$eeer=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='EEE';");
$row=mysqli_fetch_row($eeer);
$eee=$row[0];

$mechr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='MECH';");
$row=mysqli_fetch_row($mechr);
$mech=$row[0];

$civilr=mysqli_query($conn, "SELECT count(*) FROM payments p, registrations r where r.rollno=p.rollno and r.dept='CIVIL';");
$row=mysqli_fetch_row($civilr);
$civil=$row[0];

$total= $cse+$it+$ece+$eee+$civil+$mech;
?>
<p class="px5"><br>
<p class="bar01" style="color: #DA0008; font-size: 18px;">Search A Registration</p></td>
<p>
<?php

print "
<table align='center' style='margin-left:150px;'>";
echo "
<tr><td align='right' valign='middle'>Enter Roll Number / Name: </td><td><input type='text' name='search_term' id='search_term' size='20' onKeyUp='search_student()'> (Partial / Full)</td></tr>";
//echo "<tr><td colspan='2' align='center' valign='middle'><br><input type='submit' value='Search Student' width='79' height='20' alt='' border='0' onClick='search_student()'></td></tr>";
echo "</table>";

?>

<br><br>
<center><div id='results'></div></center>
</p>
<p class="bar01" style="color: #DA0008; font-size: 18px;">View Registrations By Department (Total: <?php echo $total."Registrations"; ?>)</p>
<table border ='1' width='100%'>
 <tr><th>Department</th><th colspan='4'>B.E./B.Tech Batches</th><th>Total</th></tr>
 <tr><td align='center'><b>CSE Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=CSE' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=CSE' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=CSE' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=CSE' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?dept=CSE' style='color:blue; font-size:13px;'><b><?php echo $cse; ?></b></a></td>
</tr>
 <tr><td align='center'><b>IT Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=IT' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=IT' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=IT' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=IT' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
<td align='center'><a href='batch_registrations.php?dept=IT' style='color:blue; font-size:13px;'><b><?php echo $it; ?></b></a></td>
</tr>
 <tr><td align='center'><b>ECE Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=ECE' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=ECE' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=ECE' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=ECE' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?dept=ECE' style='color:blue; font-size:13px;'><b><?php echo $ece; ?></b></a></td>
</tr>
 <tr><td align='center'><b>EEE Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=EEE' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=EEE' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=EEE' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=EEE' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?dept=EEE' style='color:blue; font-size:13px;'><b><?php echo $eee; ?></b></a></td>
</tr>
 <tr><td align='center'><b>MECH Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=MECH' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=MECH' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=MECH' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=MECH' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?dept=MECH' style='color:blue; font-size:13px;'><b><?php echo $mech; ?></b></a></td>
</tr>
 <tr><td align='center'><b>CIVIL Department</b></td>
 <td align='center'><a href='batch_registrations.php?year=1&dept=CIVIL' style='color:blue; font-size:13px;'><b>I B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=2&dept=CIVIL' style='color:blue; font-size:13px;'><b>II B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=3&dept=CIVIL' style='color:blue; font-size:13px;'><b>III B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?year=4&dept=CIVIL' style='color:blue; font-size:13px;'><b>IV B.E/B.Tech</b></a></td>
 <td align='center'><a href='batch_registrations.php?dept=CIVIL' style='color:blue; font-size:13px;'><b><?php echo $civil; ?></b></a></td>
</tr>

</table>
<!-- TOTAL FIRST SECTION -->
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

<script type="text/javascript">

// Like a Notification......
function search_student()
{
var search_term = document.getElementById('search_term').value;

if(search_term.length > 3)
  {
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==1)
			{
				document.getElementById('results').innerHTML="Searching Students.....";
			}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('results').innerHTML=xmlhttp.responseText;
			}
  }

	//alert("votes.php?id="+search_term);
	xmlhttp.open("GET","get_registrations.php?sterm=" + search_term,true);
	//alert("wall_likes.php?id=" + post_id);
	xmlhttp.send();
 } 
}

</script>

</td>

			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
