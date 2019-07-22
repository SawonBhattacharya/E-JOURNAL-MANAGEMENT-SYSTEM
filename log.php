<?php
include('logval.php');
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
			padding-top: 220px;
			color: rgba(255, 255, 0,0.8);
		}
	</style>
</head>
<body style="background:linear-gradient(to left,grey,black);">
	
	<div class="login" style="background-color: rgba(0,2,2,0.8);"> 
		<h2>LOGIN</h2>
		<form method="post" action="log.php">
		<?php 
		include('error_log.php');
		?>
		
		<input type="text" name="username" value="" placeholder="Enter Username" required>
		
		<input type="password" name="password" minlength="6" placeholder="Enter Password" required>
		<input type="submit" name="login" value="LOGIN">
		<p>
			Not a member? <a href="register.php">Sign Up!!</a> <a href="forget.php">Forget Password?</a>
		</p>
		<?php 
            if(isset($_GET['msg']))
            {
                echo"<p style=color:red>Incorrect Username/Password</p>";
            } 
          ?>
		</form>
	</div>
	<div>
		<center><h1>if you steal from one author it's <p style="color: rgb(153, 255, 51);">plagiarism<p>if you steal from many it's <br><p style="color: rgb(153, 255, 51);">research</p></h1>
			<h5 style="padding-left:320px;color: rgb(255,255,255)">-wilson mizner</h5>
			</center>

	</div>


</body>
</html>