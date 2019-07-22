<?php
include('rinsert_server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration system</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<style type="text/css">
	h1{
			font-family: times new roman;
			text-transform: capitalize;
			font-weight: bold;
			
			color: rgba(0, 0, 0,0.8);
			text-align: center;
		}
		.label-left{
			text-align: left;
		}
		textarea{
			float: center;
		}
	</style>
</head>
<body style="background:linear-gradient(to right,grey,lightgrey);">
	<h1>REVIEW FORM</h1>
	<div>
	<form method="post" action="rinsert.php" class="login" style="top:50%" enctype="multipart/form-data">
		<label class="input-label label-left">JOURNAL_ID</label><br>
		<input type="text" name="field" placeholder="what is the JOURNAL_ID" required><br>
		<label class="input-label label-left">COMMENT</label><br>
		<input type="text" name="topic" placeholder="COMMENT?YES:NO" required>
		<input type="submit" name="insert" value="REVIEW">
		<input type="reset" name="reset" value="RESET">
	</form>
	</div>


</body>
</html>