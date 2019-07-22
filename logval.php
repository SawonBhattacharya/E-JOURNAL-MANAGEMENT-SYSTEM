<?php

session_start();
//connect to db
$password="";
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
		if (isset($_POST['login'])){
			$username = mysqli_real_escape_string($db, $_POST['username']);				
			$password = mysqli_real_escape_string($db, $_POST['password']);
			if (count($errors) == 0) {
				$password=md5($password);//encrypt password before storing
				$query="SELECT * FROM users WHERE username='$username'";
				//echo $query;
				$result=mysqli_query($db,$query);
				if(mysqli_num_rows($result)==1){
				//log user in
					//echo "is it here?";
					$row=mysqli_fetch_assoc($result);
					$dpassword=$row['password'];
					
					/*echo "\n";
					echo $dpassword;
					echo "\n";
					echo $password;*/
					if($password==$dpassword){
						$_SESSION['username']=$username;
						$_SESSION['password']=$row['password'];
						$_SESSION['id']=$row['id'];
						$_SESSION['email']=$row['email'];
						$_SESSION['position']=$row['position'];
						$_SESSION['role']=$row['role'];
						$_SESSION['institution']=$row['institution'];
						$_SESSION['picture']=$row['picture'];
						//echo $_SESSION['username'];
						$_SESSION['success']="You are now logged in";
						if ($_SESSION['role']=="Author")
							header('location: apro.php');
						else
							header('location: rpro.php');

					}
					else{
					echo "is it here in else?wrong password";
					array_push($errors,"wrong password");
					header('location: forget.php');
				}
				}
				else{
					echo "is it here in else?wrong username";
					array_push($errors,"wrong username");
					//header('location: log.php');
				}
			}
		}
	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location:index.php');
	}
	mysqli_close($db);
?>
