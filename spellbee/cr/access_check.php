<?php

session_start();
if ($_SESSION['valid_uid']) #checking if session already exists
   {
      #echo "<h3>iam valid user</h3>";
      //$log_status=1;
   }
elseif ($_POST["password"]) #if session doesn't exist, create one
    {
      $user_password = addslashes(trim($_POST["password"]));
     
      include "connect.php"; 
      $passcodes=mysqli_query($conn, "SELECT * FROM coordinators WHERE passcode = '$user_password';");
      
      if(mysqli_num_rows($passcodes)!=0)
        {
           $_SESSION['valid_uid'] = "mudunuri";
           $cr=mysqli_fetch_array($passcodes);
           $_SESSION['cr_id'] = $cr[0];
           $_SESSION['name'] = $cr[2];
           $_SESSION['dept'] = $cr[3];
           $_SESSION['type'] = $cr[5];
           $_SESSION['passcode'] = $user_password;
        }
     else
        {
           session_destroy();
           header("Location:index.php?login_error=$_POST[userid]");
           exit;
        }
  }
else              #if user access the page directly, redirect to login page
{
 session_destroy();
 header("Location:index.php");
 exit;
}
?>
