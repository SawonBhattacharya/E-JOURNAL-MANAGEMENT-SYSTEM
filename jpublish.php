<?php
session_start();
$db = mysqli_connect('localhost','root','','ejournal');
//check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySql:";
	mysqli_connect_error();
}



$pquery = "UPDATE journal j SET status='Published' WHERE j.j_id=(SELECT j_id FROM review WHERE comment='YES');";



echo "published";
if(mysqli_query($db,$pquery)) {

	$equery = "SELECT * FROM users u WHERE u.id=(SELECT id FROM journal WHERE status='Published');";
	$eresult=mysqli_query($db,$equery) or die(mysqli_error($db));
	$erow=mysqli_fetch_assoc($eresult);
	
	$to = $erow['email'];
	echo $to;
	$subject = 'Hello from E-Journal!';
	$message = 'Your paper has been published!';
	$headers = "From: hello.ejournal@gmail.com\r\n";
	
	if (mail($to, $subject, $message, $headers)) {
	echo "MAIL SENT";
	} 
	else {
	echo "ERROR";
	}
}

