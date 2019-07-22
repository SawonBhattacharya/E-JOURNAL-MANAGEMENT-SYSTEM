<?php

session_start();
//connect to db
$npassword="";
$username="";
$errors = array();
$db = mysqli_connect('localhost','root','','ejournal');
$dpassword="";
//check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySql:";
		mysqli_connect_error();
	}
	//login
		if (isset($_POST['forget'])){
			$username = mysqli_real_escape_string($db, $_POST['username']);				
			$npassword1 = mysqli_real_escape_string($db, $_POST['npassword1']);
			$npassword2 = mysqli_real_escape_string($db, $_POST['npassword2']);
			if ($npassword1 != $npassword2) {
			array_push($errors, "Passwords do not match");
			}
			if (count($errors) == 0) {
				$npassword=md5($npassword1);//encrypt password before storing
				$update_password="UPDATE users SET password='$npassword' WHERE username='$username'";
				echo $update_password;
				if(mysqli_query($db,$update_password))			
					//echo "hi";
					header('location: log.php');
				else
					//echo "else";
					header('location: forget.php?retry');

			}
		}
	mysqli_close($db);
?>
