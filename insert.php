<?php
include('insert_server.php');
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
	<h1>PUBLISH YOUR PAPER</h1>
	<div>
	<form method="post" action="insert.php" class="login" style="top:80%" enctype="multipart/form-data">
		<label class="input-label label-left">CATEGORY?GENRE</label><br>
		<input type="text" name="field" placeholder="what is the subject?(ex:computer science)" required><br>
		<label class="input-label label-left">HEADING</label><br>
		<input type="text" name="topic" placeholder="headline please(ex:quantum computation)" required>
		<label class="input-label label-left">ABSTRACT</label><br>
		<center><textarea col="10" row="10" name="abs" placeholder="enter your paper's abstraction" maxlength="1000"></textarea><br><br><br><br></center>
		<label class="input-label label-left">UPLOAD YOUR PAPER</label><br>
		<input type="file" name="upload" required>
		<input type="submit" name="insert" value="INSERT">
		<input type="reset" name="reset" value="RETRY">
	</form>
	</div>


</body>
</html>