<?php
	session_start();
	//old values from session

	//new values submitted through edit profile
	$id = $_SESSION['id'];
	echo $id,"\n";
	$nusername ="";
	$nemail = "";
	$nposition = "";
	$ninstitution = "";
	$nrole = "";
	$npassword_1 = "";
	$npassword_2 = "";
	$npassword="";
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
	if (isset($_POST['update'])) {
		$nusername = mysqli_real_escape_string($db, $_POST['username']);
		$nemail = mysqli_real_escape_string($db, $_POST['email']);
		$nposition = mysqli_real_escape_string($db, $_POST['position']);
		$ninstitution = mysqli_real_escape_string($db, $_POST['institution']);
		$nrole = mysqli_real_escape_string($db, $_POST['role']);
		$npassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$npassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		if(isset($_FILES['pic'])) {
			$filename=$_FILES['pic']['name'];
			$tmpname=$_FILES['pic']['tmp_name'];
			$type=$_FILES['pic']['type'];
			$filesize=$_FILES['pic']['size'];
    		echo $_FILES['pic']['name'];
		}

		if (empty($_FILES)) {
			echo "empty";
		}

		$target_dir =  "/img_upload/";
		$target_file = $target_dir . basename($_FILES["pic"]["name"]);



            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            



		//$filename=$_FILES['pic']['name'];
		//echo $_FILES['pic']['name'];
		
		if ($npassword_1 != $npassword_2) {
			array_push($errors, "Passwords do not match");
		}

		if (empty($nemail)) {
			array_push($errors, "Email is required");//add error
		}

		else if (!filter_var($nemail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[A-Za-z0-9]*$/", $username)) {
					array_push($errors_1, "Invalid username and email");
				}
				else if (!filter_var($nemail, FILTER_VALIDATE_EMAIL)) {
					array_push($errors_1, "Invalid email");
				}
				else if (!preg_match("/^[A-Za-z0-9]*$/", $nusername)) {
					array_push($errors_1, "Invalid username");
				}
			//if there are no errors, save user to database
			

		else {
			$sql="SELECT username FROM users WHERE id=?";
			$stmt=mysqli_stmt_init($db);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				array_push($errors, "Sql Error");
			}

			else {
			//check if username already exists
				
				mysqli_stmt_bind_param($stmt,"s",$nusername);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				
				
				//else {
					if (count($errors) == 0) {
					$npassword=md5($npassword_1);//encrypt password before storing
					//if name!=new name then execute update query
					$filext=explode('.',$filename);
					$fileactext=strtolower(end($filext));
					$allow=array('jpg','jpeg','png');
					if(in_array($fileactext, $allow))
					{
						$filenewname=$filename;
						$filedest='img_upload/'.$filenewname;
						move_uploaded_file($tmpname,$filedest);
						$update="UPDATE users SET username = '$nusername', email = '$nemail', position = '$nposition', institution = '$ninstitution',password = '$npassword', picture='$filename' WHERE id = '$id'";
						echo $update;
						mysqli_query($db, $update);
						$_SESSION['username'] = $nusername;
						$_SESSION['email'] = $nemail;
						$_SESSION['position'] = $nposition;
						$_SESSION['institution'] = $ninstitution;
						$_SESSION['picture']=$_FILES["pic"]["name"];
						header('location: apro.php');
						mysqli_stmt_close($stmt);
					}
					else{

					}
					
					}
				//}
			}
		}
	}
	mysqli_close($db);



