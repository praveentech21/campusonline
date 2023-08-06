<?php

include "connect.php";

$sterm = $_GET['sterm'];

$result=mysqli_query($conn, "SELECT rollno, name, year, dept, email, mobile FROM registrations where rollno like '%$sterm%' or name like '%$sterm%'");

if(mysqli_num_rows($result) == 0)
  {
 	echo "<tr><th>No Results Found!</th></tr>";
  }  
else
  {
	echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>Roll Number</th><th>Student Name</th><th>Batch</th><th>E-mail ID</th><th>Mobile Number</th><th>Password</th><th>C</th><th>Java</th><th>Python</th></tr>";
	while($row=mysqli_fetch_array($result))
     {
        $passres=mysqli_query($conn, "SELECT password FROM studentsdb where rollno ='$row[0]'");
		
        $pass=mysqli_fetch_array($passres);
	    echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".ucwords($row[1])."</td><td>".$row[2]."/4 ".ucwords($row[3])."</td><td>".strtolower($row[4])."</td><td>".$row[5]."</td><td>".$pass[0]."</td>";

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p'), offer FROM payments where rollno = '$row[0]' and language='C'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span><div style='font-size:10px;'>$reg[4]</div>";} 
    	  echo "</td>";
        }

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p'), offer FROM payments where rollno = '$row[0]' and language='JAVA'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span><div style='font-size:10px;'>$reg[4]</div>";} 
    	  echo "</td>";
        }

		$payments=mysqli_query($conn, "SELECT rollno, language, paystatus, DATE_FORMAT(timestamp, '%d/%m/%y - %h:%i %p'), offer FROM payments where rollno = '$row[0]' and language='PYTHON'");
        if(mysqli_num_rows($payments) == 0)
		{
		   echo "<td align='center'><span>-</span></td>";
		}
		else
        {	
          $reg=mysqli_fetch_array($payments);
		  $rollno=$reg[0]; $language=$reg[1]; $paystatus=$reg[2]; $regdate=$reg[3];
		  
		  echo "<td align='center'>";	
            if($paystatus == 0) {echo "<a href='edit_registration.php?pid=".$row[0]."&language=".$language."' style='color:blue;font-weight:bold;'>CONFIRM</a><div style='font-size:10px;'>$regdate</div>";} 	
            else{echo "<span style='color:#DA0008;font-weight:bold;'>CONFIRMED</span><div style='font-size:10px;'>$reg[4]</div>";} 
    	  echo "</td>";
        }
		 
		echo "</tr>";
     }
    echo "</table>"; 
  }

?>
