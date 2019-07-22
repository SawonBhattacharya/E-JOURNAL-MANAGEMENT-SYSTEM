
<?php
session_start();
if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		//echo $_SESSION['username'];
		header('location:index.html');
	}
?>