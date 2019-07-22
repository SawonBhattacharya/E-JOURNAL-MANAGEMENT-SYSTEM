<?php 
include('server.php');
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
	<div class="login" style="top: 100%;background-color: rgba(0,2,2,0.8);"> 
		<h2>Register Yourself</h2>
		<form method="post" action="register.php" enctype="multipart/form-data">
			<?php 
				include('errors.php');
			?>
			<label class="input-label" style="color: white;">Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" required>
			<label class="input-label" style="color: white;">Email</label><br>
			<input type="email" name="email" value="<?php echo $email; ?>" required>
			<label class="input-label" style="color: white;">Position</label>
			<input type="text" name="position"  value="<?php echo $position; ?>" required>
			<label class="input-label" style="color:white;">Institution</label>
			<input type="text" name="institution"  value="<?php echo $institution; ?>" required>
			<label class="input-label" style="color: white;">Role</label>
			<input type="text" name="role"  value="<?php echo $role; ?>" required>
			<label class="input-label" style="color: white;">Auhtor/Reviewer</label>
			<label class="input-label" style="color: white;">Profile Picture</label>
			<input type="file" name="pic" required>
			<label class="input-label" style="color: white;">Password</label>
			<input type="password" name="password_1" minlength="6">
			<label class="input-label" style="color: white;">Confirm Password</label>
			<input type="password" name="password_2">
			
			<input type="submit" name="register" value="REGISTER"/>
			<p>
			Already a member? <a href="log.php">Sign in</a>
			</p>
		</form>
	</div>
	<div>
		<center><h1>if you steal from one author it's <p style="color: rgb(153, 255, 51);">plagiarism<p>if you steal from many it's <br><p style="color: rgb(153, 255, 51);">research</p></h1>
			<h5 style="padding-left:320px;color: rgb(255,255,255)">-wilson mizner</h5>
			</center>

	</div>


</body>
</html>