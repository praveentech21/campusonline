<?php
$page="login";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>CODE MASTER 2018 CR Module</title>
</head>

<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">CODE MASTER 2018 CR Module</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">

		<div id="content"><br>
			<h2 align='center'>CR Login</h2>

<center>
		<div id="loginbar">
			<div class="sidebarbox">
               <h2>CR LOGIN</h2>
			<center><br>
             <form action='cr_registrations.php' method='post' onSubmit='return login();'>
			 <table>
			  <tr><th>CR PassCode</th><td><input type='password' name='password' id='password' autofocus></td></tr>
			  <tr><td colspan='2' align='center'><input type='submit' value='LOGIN' class='submit'></td></tr>
			</table>
			</form>
			   <div id='error' style='color:red;font-weight:bold; font-size:10px'>
			   	<?php
				if(isset($_REQUEST['login_error']))
                {
                  echo "Invalid Passcode";
                }
				?>
</div><br>
 			  <i>Note:</i> This login is only for CRs to view their registrations.<br><br></center>
                   </div>
        </div>
           
		</div>
<BR><BR><BR>
<BR><BR><BR>
<BR><BR><BR>
</center>		
	</div>
<script type='text/javascript' language='javascript'>

function login()
{
  document.getElementById('error').innerHTML='';

  var pwd= document.getElementById('password').value;
 
  if((uid == '') || (pwd == ''))
    {
	  document.getElementById('error').innerHTML='Passcode Can Not Be Empty';
	  return false;
	}
  return true;	
}

</script>
<?php include "footer.php"; ?>
</body>
</html>
