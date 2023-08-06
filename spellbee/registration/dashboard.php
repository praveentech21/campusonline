<?php include "access_check.php"; ?>
<?php
$page="main";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>AGASTYA'15 Admin Module</title>
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
		<h2>Welcome Admin!</h2>
		<p align='justify'>
         <?php 
               include "admin/dashboard.php";
             ?>			               			
			</p>

			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
