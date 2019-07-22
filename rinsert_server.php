<?php
	session_start();
	$rid="";
	$j_id="";
	$comment="";
	$errors = array();
	$errors_1 = array();
	$update1="";
	
	//connect to the database
	$db = mysqli_connect('localhost','root','','ejournal');

	//check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySql:";
		mysqli_connect_error();
	}
	$rid=$_SESSION['id'];

	//if the register button is clicked
	if (isset($_POST['insert'])) {
		$j_id = mysqli_real_escape_string($db, $_POST['field']);//sql injection
		$comment = mysqli_real_escape_string($db, $_POST['topic']);
		//abstract of the paper
		
		//$rid=$_SESSION['id'];
		//file upload
		$ins = "INSERT INTO review (j_id,id,comment) VALUES ('$j_id','$rid','$comment');";
		if ($comment == "YES") 
			$update1="UPDATE journal j SET status = 'Published' WHERE j.j_id = '$j_id'";
		else 
			$update1="UPDATE journal j SET status = 'Rejected' WHERE j.j_id = '$j_id'";	
		
		mysqli_query($db,$update1);
		



		if(mysqli_query($db, $ins)){
			header("Location:rpro.php?uploadsuccess");
		}
		else
			echo "can't store data";
	}
	mysqli_close($db);
?>