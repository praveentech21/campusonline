
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2015 Statistics</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
    </head>
<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2015</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">
<br style="clear: both;" />
	<div id="content"><br>
		<h2>Code Master 2015 Round 1 Selected List</h2>
		<p align='justify'>
		<?php
		
            $db1 = mysqli_connect('localhost', 'codemaster', 'codemaster@8080', 'codemaster2015');
            
            $query1= "select w.rollno, name, batch, score, paystatus from registrations r, winners_round1 w where r.rollno=w.rollno and score > 19 order by score DESC;";
			$result1 = mysqli_query($db1, $query1);
			echo "<table width='100%' border='1' cellspacing='1' cellpadding='3'><tr bgcolor='#DC143C' style='color:#FFFFFF;text-align:center;'><th>S.No</th><th>Roll Number</th><th>Student Name</th><th>Batch</th><th>Score</th></tr>";
            
            $count=0;
			while($rnd1=mysqli_fetch_row($result1))
          	  {
                 $count++;	  
                 print "<tr><td align='center'>".$count."</td><td align='center'><font color='red'>".$rnd1[0]."</font></td><td>".$rnd1[1]."</td><td align='center'>".$rnd1[2]."</td><td align='center'>".$rnd1[3]."</td></tr>";  
	  	      }							  
			echo "</table>";
			 
			mysql_close($conn);
			?>
        
		</p>
        <div style="color:blue;font-size:18px;font-weight:bold;font-family:'Lato';">* The above students are informed to attend Round 2 Exam on 30th December 2015 @ General Computer Centre (GCC) by 4:15 PM Sharp.</div> 
		<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php include "footer.php"; ?>
</body>
</html>
