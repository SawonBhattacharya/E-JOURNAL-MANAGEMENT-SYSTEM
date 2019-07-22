<?php
	session_start();
	$aid="";
	$field = "";
	$topic= "";
	$abs = "";
	$upload = "";
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
	if (isset($_POST['insert'])) {
		$field = mysqli_real_escape_string($db, $_POST['field']);//sql injection
		$topic = mysqli_real_escape_string($db, $_POST['topic']);
		//abstract of the paper
		$abs = mysqli_real_escape_string($db, $_POST['abs']);
		$aid=$_SESSION['id'];
		//file upload
		$filename=$_FILES['upload']['name'];
		$tmpname=$_FILES['upload']['tmp_name'];
		$type=$_FILES['upload']['type'];
		$filesize=$_FILES['upload']['size'];
		$filext=explode('.',$filename);
		$fileactext=strtolower(end($filext));
		$allow=array('pdf');
		if(in_array($fileactext, $allow)){
			if($filesize<100000){
				$filenewname=$filename;
				$filedest='upload/'.$filenewname;
				move_uploaded_file($tmpname,$filedest);
				$ins = "INSERT INTO journal (id, field, topic, abs, upload) VALUES ('$aid','$field','$topic','$abs','$filename');";
				echo $ins;
				if(mysqli_query($db, $ins)){
					
					header("Location:apro.php?uploadsuccess");
				}
				else
					echo "can't store data";
				
			}
		}
		else{
			echo "can't accept the files extension only .pdf,.txt,.docx files are allowed";
		}
		
					
					
					
	}
	mysqli_close($db);
