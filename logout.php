<?php
session_start();
//$_SESSION["user_log_flag"]
if (isset($_SESSION['user_log_flag'])) 
{
    $_SESSION["user_log_flag"]=0;
   	unset($_SESSION['user_log_flag']);
    unset($_SESSION['username']);
	unset($_SESSION['useremail']);
    unset($_SESSION['userid']);
}
header('Location: index.php');
exit();
?> 