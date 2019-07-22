<?php
session_start();
session_destroy();
unset($_SESSION['UserData']['Username']);
header('location:admin_log.php');
	
?>