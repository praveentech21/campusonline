<?php
$page="login";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="variant-multi.css" title="Variant Multi" media="all" />
	<title>CODE MASTER 2018 Admin Module</title>
</head>

<body>
<div id="containerfull">
<!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
		<h1><a href="index.php">CODE MASTER 2018 Admin Module</a></h1>
		<h2>The Grand Online Programming Challenge of SRKREC</h2>
	</div>
<div id="main">

		<div id="content"><br>
			<h2 align='center'>Admin Login</h2>

<center>
		<div id="loginbar">
			<div class="sidebarbox">
               <h2>ADMIN LOGIN</h2>
			<center><br>
             <form action='registrations.php' method='post' onSubmit='return login();'>
			 <table>
			 <tr><th>Admin ID</th><td><input type='text' name='userid' id='userid' value='<?php 
			  if(isset($_REQUEST['login_error']))
                {
                  echo $_GET['login_error'];
                }
			  else
                {
                  echo "";
                }
              ?>'></td></tr>
			  <tr><th>Password</th><td><input type='password' name='password' id='password'></td></tr>
			  <tr><td colspan='2' align='center'><input type='submit' value='LOGIN' class='submit'></td></tr>
			</table>
			</form>
			   <div id='error' style='color:red;font-weight:bold; font-size:10px'>
			   	<?php
				if(isset($_REQUEST['login_error']))
                {
                  echo "Invalid User ID or Password";
                }
				?>
</div><br>
 			  <i>Note:</i> This login is only for Admin to update the database.<br><br></center>
                   </div>
        </div>
           
		</div>
</center>		
	</div>

<script type='text/javascript' language='javascript'>

function login()
{
  document.getElementById('error').innerHTML='';

  var uid= document.getElementById('userid').value;
  var pwd= document.getElementById('password').value;
 
  if((uid == '') || (pwd == ''))
    {
	  document.getElementById('error').innerHTML='UserID or Password Can Not Be Empty';
	  return false;
	}
  return true;	
}

</script>
<br><br><br>	
<?php include "footer.php"; ?>
</body>
</html>
