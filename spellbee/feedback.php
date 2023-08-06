
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="registration/variant-multi.css" title="Variant Multi" media="all" />
	<title>Code Master 2018 Feedback</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bilbo|Oswald' rel='stylesheet' type='text/css'>
	<style type='text/css'>
	 th
	 {
	  font-size:12px;
	  color:#000;
	  text-align:justify;
	  font-family:'Lato';
	  font-weight:bold;
	  padding-bottom:10px;
	 }
	 a{
	  font-size:12px;	 
      text-decoration:none;	  
	 }
	 a:hover
	 {
	  color:green;
      text-decoration:underline;	  
	 }
	 body
		{
		 font-size:12px;	
		 width:100%;	
		 background-color:#ffffff;	
		}
	 label
		{
		 font-size:10px;	
		}
	</style>

    </head>
<body>
<div id="container600">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">Code Master 2018</a></h1>
		<h2>The Annual Online Programming Challenge of SRKREC</h2>
	</div>
<br style="clear: both;" />
			<?php

if(!isset($_POST['code']))
{
print "
<form name='feedback' action='";
echo $_SERVER['PHP_SELF'];
print "' method='post' onSubmit='return validate();'>
<table align='center' border='0' width='70%' cellpadding='5' cellspacing='5'>
<tr><th style='font-size:12px;'>Q#1. Rate the overall experience of Code Master 2018.</th></tr>
<tr><th align='left' valign='middle' style='padding-left:10px;'>
<input type='radio' name='q1' id='q11' value='1'> <label for='q11'> POOR</label> 
<input type='radio' name='q1' id='q12' value='2'> <label for='q12'> AVERAGE</label> 
<input type='radio' name='q1' id='q13' value='3'> <label for='q13'> GOOD</label>
<input type='radio' name='q1' id='q14' value='4'> <label for='q14'> VERY GOOD</label> 
<input type='radio' name='q1' id='q15' value='5'> <label for='q15'> EXCELLENT</label>
<span style='color:red;background-color:yellow;font-size:12px;margin:5px;' id='q1_err'></span>
</th></tr>
<tr><th align='left' style='font-size:12px;'>Q#2. Rate the quality of questions / programs used in the exams.</th></tr>
<tr><th align='left' valign='middle' style='padding-left:10px;'>
<input type='radio' name='q2' id='q21' value='1'> <label for='q21'> POOR</label> 
<input type='radio' name='q2' id='q22' value='2'> <label for='q22'> AVERAGE</label> 
<input type='radio' name='q2' id='q23' value='3'> <label for='q23'> GOOD</label>
<input type='radio' name='q2' id='q24' value='4'> <label for='q24'> VERY GOOD</label> 
<input type='radio' name='q2' id='q25' value='5'> <label for='q25'> EXCELLENT</label> 
<span style='color:red;background-color:yellow;font-size:12px;margin:5px;' id='q2_err'></span>
</th></tr>
<tr><th align='left' style='font-size:12px;'>Q#3. Rate the technology / platform (Moodle) used for online exam.</th></tr>
<tr><th align='left' valign='middle' style='padding-left:10px;'>
<input type='radio' name='q3' id='q31' value='1'> <label for='q31'> POOR</label> 
<input type='radio' name='q3' id='q32' value='2'> <label for='q32'> AVERAGE</label> 
<input type='radio' name='q3' id='q33' value='3'> <label for='q33'> GOOD</label>
<input type='radio' name='q3' id='q34' value='4'> <label for='q34'> VERY GOOD</label> 
<input type='radio' name='q3' id='q35' value='5'> <label for='q35'> EXCELLENT</label> 
<span style='color:red;background-color:yellow;font-size:12px;margin:5px;' id='q3_err'></span>
</th></tr>
<tr><th align='left' style='font-size:12px;'><br>Give Your General Feedback / Comments / Suggestions Below:</th></tr>
<tr><th align='left' valign='middle'>
<textarea name='q6' id='q61' rows='5' cols='50' style='border:1px solid #000;'></textarea><br><br> 
</th></tr>
<tr><th align='left' valign='middle'>Your Email:<input type='text' name='email' id='email' size='30' placeholder='Optional (Required if need reply)'>
<br>Department: <select name='dept' id='dept'>
<option value='-'>Select Your Department</option>
<option value='CSE'>CSE</option>
<option value='IT'>IT</option>
<option value='ECE'>ECE</option>
<option value='EEE'>EEE</option>
<option value='MECH'>MECHANICAL</option>
<option value='CIVIL'>CIVIL</option>
</select>
<span style='color:red;background-color:yellow;font-size:12px;margin:5px;' id='sec_err'></span>
<br>Enter Secret Code:<input type='password' name='code' id='code' size='20'> (Check the SMS Sent To You)
<span style='color:red;background-color:yellow;font-size:12px;margin:5px;' id='sc_err'></span>
</th></tr>
";
echo "<tr><td align='left' valign='middle' style='padding-left:150px;'><br><input type='submit' value='SUBMIT FEEDBACK' style='background-color:#DC143C; color:#ffffff; padding:5px; font-weight: bold;'></td></tr>
</table>
</form>";
}

if(isset($_POST['code']))
   {
    $q1=$_POST['q1'];
    $q2=$_POST['q2'];
    $q3=$_POST['q3'];
    $feedback=addslashes(trim($_POST['q6']));	
    $email=addslashes(trim(strtolower($_POST['email'])));	
    $code=addslashes(trim($_POST['code']));	
    $dept=$_POST['dept'];

	include "connect.php";
	
	if($email == "")
	 {
    	$email="Anonymous";
     }

	   
    if($code != "code#1980")
	    { 
     	 print "<br><br><br><center><font color='red' size='4'><b>INVALID SECRET CODE!</b></font></center><br>";
      	 echo "<div align='center'><a href='feedback.php'><b>Go Back To Feedback Form</b></a></div>";
		 echo "<br><br><br><br><br><br><br><br>";	
		 include "registration/footer.php";

        }
       else 
	   {    
   		   mysqli_query($conn, "insert into feedback (q1, q2, q3, feedback, email, dept) values ($q1, $q2, $q3, '$feedback', '$email', '$dept');") || die (mysql_error());		
		   print "<center><br><br>";
		   print "<font color='green' size='4'><b>Your Feedback Has Been Successfully Submitted!</b></font></center><br>";
    	   echo "<br><br><br><br><br><br><br><br>";	
 		   include "registration/footer.php";

		   require_once('registration/email/classes/class.phpmailer.php');
  	       include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded		
		
		   $mail = new PHPMailer();

		   $mail->IsSMTP(); // telling the class to use SMTP
		   $mail->Host       = "smtp.gmail.com"; // SMTP server
		   $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		   $mail->SMTPAuth   = true;                  // enable SMTP authentication
		   $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		   $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		   $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
		   $mail->Username   = "techcenter.srkr@gmail.com";  // GMAIL username
		   $mail->Password   = "tech@8080";            // GMAIL password

		   $mail->SetFrom('techcenter.srkr@gmail.com', 'Code Master 2018, SRKR');

    	   if($email != "")
         	{
   	           $mail->AddReplyTo($email);
	        }

		   $mail->Subject = "Code Master 2018 Feedback!";

		   $mail->Body = "FEEDBACK:\n\nSo Overall Experience: $q1\n Questions Quality: $q2\n Technology(Moodle) Rating: $q3\n\n General Feedback: $feedback\n Batch: $dept\n\n ~$email";

		   $mail->AddAddress("suresh.mudunuri@srkrec.edu.in");

		   $mail->Send();		
           include "registration/footer.php";
   } 	
     
	mysql_close($conn);  
	
 }		

?>			


		<div class="clear">&nbsp;</div>
<?php include "registration/footer.php"; ?> 
<script type="text/javascript">
 		
function validate()
  {
      var q1 = document.feedback.q1;
      var q2 = document.feedback.q2;
      var q3 = document.feedback.q3;
      var section = document.getElementById("dept").value;
      var sc = document.getElementById("code").value;

	  document.getElementById('q1_err').innerHTML="";	  
	  document.getElementById('q2_err').innerHTML="";	  
	  document.getElementById('q3_err').innerHTML="";	  
	  document.getElementById('sec_err').innerHTML="";	  
	  document.getElementById('sc_err').innerHTML="";	  

      for (var i=0; i<q1.length; i++) { if (q1[i].checked) break;}
      if (i==q1.length)
	  {
	     document.getElementById('q1_err').innerHTML=" Please Check One Of The Options! ";
		 return false;
	  }

      for (var i=0; i<q2.length; i++) { if (q2[i].checked) break;}
      if (i==q2.length)
	  {
	     document.getElementById('q2_err').innerHTML=" Please Check One Of The Options! ";
		 return false;
	  }

      for (var i=0; i<q3.length; i++) { if (q3[i].checked) break;}
      if (i==q3.length)
	  {
	     document.getElementById('q3_err').innerHTML=" Please Check One Of The Options! ";
		 return false;
	  }

	  if(section == "-") { document.getElementById('sec_err').innerHTML="Please Select Your Batch!"; return false;}	  
	  if(sc == "") { document.getElementById('sc_err').innerHTML="Secret Code Can Not Be Empty!"; return false;}	  
	  
      return true;
  }
</script> 
</body>
</html>
