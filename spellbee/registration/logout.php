<?php
session_start();
$user_name=$_SESSION['valid_uid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2018 Admin Module</title>
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
			<h2>Thank You!</h2>
			<p align='justify'>
<?php     

if(!isset($_REQUEST['logout'])){
echo "<br><br><center><center><font face=\"Arial\" size=\"3\" color=red><strong>Are you sure you want to logout?<br /></strong></font>";
echo "<center><a href='logout.php?logout'><font face=\"Arial\" size=\"3\" >Yes</font></a> | <a href='javascript:history.back()'><font face=\"Arial\" size=\"3\" >No</font></a>";
//echo "<center><a href=logout.php?logout><font face=\"Arial\" size=\"3\" >Yes</font></a> | <a href=javascript:history.back()><font face=\"Arial\" size=\"3\" >No</font></a>";
}
else {
session_destroy();
if(isset($_SESSION['valid_uid']))
{
echo "<center><br><br><font face=\"Arial\" size=\"3\" color=red><strong>You are now logged out!</strong></font></center><br /></font>";
echo "<center><font face=\"Arial\" size=\"2\" color=red><strong>Thank you for using Code Master 2018 Admin Module!</strong></font></center><br /></font>";
echo "<center><font face=\"Arial\" size=\"2\" color=blue><strong><a href='index.php'>Click Here To Go To Admin Home</a></strong></font></center><br /></font>";
}
}

?>     

<br><br><br><br><br><br><br><br><br>			 
			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
