<?php
	session_start();
	$username = "";
	$email = "";
	$position = "";
	$institution = "";
	$role = "";
	$password_1 = "";
	$password_2 = "";
	$password="";
	$filename="";
	$tmpname="";
	$filesize="";
	$fileactext="";
	$errors = array();
	$errors_1 = array();
	
	//connect to the database
	$db = mysqli_connect('localhost','root','','ejournal');

	//check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySql:";
		mysqli_connect_error();
	}

	//if the register button is clicked
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$position = mysqli_real_escape_string($db, $_POST['position']);
		$institution = mysqli_real_escape_string($db, $_POST['institution']);
		$role = mysqli_real_escape_string($db, $_POST['role']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$filename=$_FILES['pic']['name'];
		$tmpname=$_FILES['pic']['tmp_name'];
		$type=$_FILES['pic']['type'];
		$filesize=$_FILES['pic']['size'];

		if ($password_1 != $password_2) {
			array_push($errors, "Passwords do not match");
		}

		if (empty($email)) {
			array_push($errors, "Email is required");//add error
		}

		else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-Za-z0-9]*$/", $username)) {
					array_push($errors_1, "Invalid username and email");
				}
				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					array_push($errors_1, "Invalid email");
				}
				else if (!preg_match("/^[A-Za-z0-9]*$/", $username)) {
					array_push($errors_1, "Invalid username");
				}
			//if there are no errors, save user to database
		else {
			$sql="SELECT username FROM users WHERE username=?";
			$stmt=mysqli_stmt_init($db);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				array_push($errors, "Sql Error");
			}
			else {
			//check if username already exists
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck=mysqli_stmt_num_rows($stmt);
				if ($resultCheck > 0) {
					array_push($errors, "Username taken");		
				}
				else {
					if (count($errors) == 0) {
					$password=md5($password_1);//encrypt password before storing
					
					$filext=explode('.',$filename);
					$fileactext=strtolower(end($filext));
					$allow=array('jpg','jpeg','png');
						if(in_array($fileactext, $allow))
						{
							$filenewname=$filename;
							$filedest='img_upload/'.$filenewname;
							move_uploaded_file($tmpname,$filedest);
							$sql = "INSERT INTO users (username, email, password, position, role, institution,picture) VALUES ('$username','$email','$password','$position','$role','$institution','$filename')";
							echo $sql;
							if(mysqli_query($db, $sql))
								header('location: log.php?registered');
							else
								header('location: register.php?fail to register');
							mysqli_stmt_close($stmt);
						}
						else{
						echo "can't accept the files extension only .jpg,.jpeg,.png files are allowed";
						}
					}
				}
			}
		}
	}
	mysqli_close($db);
