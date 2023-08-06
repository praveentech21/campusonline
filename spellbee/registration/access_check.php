<?php

session_start();
if ($_SESSION['valid_uid']) #checking if session already exists
   {
      #echo "<h3>iam valid user</h3>";
      //$log_status=1;
   }
elseif ($_POST["userid"] && $_POST["password"]) #if session doesn't exist, create one
    {
     $user_name = addslashes(trim($_POST["userid"]));
     $user_password = addslashes(trim($_POST["password"]));
   
     if($user_name == "admin" && $user_password == "admin@7070")
        {
           $_SESSION['valid_uid'] = "mudunuri";
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
