<?php
include('edit_server.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>author</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: rgb(230, 255, 255,0.9);">
<p><?php 
if(!(isset($_SESSION['success']))){
header('location:index.html');
}?>
<div class="container" style="background-color: rgb(230, 255, 255,0.4);">
           <form method="post" action="edit_apro.php" class="login" style="top:85%;" enctype="multipart/form-data">
        <?php 
        include('errors.php');
        ?>
        <div>
            <label class="input-label">Username</label>
            <input class="input-input" type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required>
        </div>
        <div>
            <label style="color:white;font-weight:bold">Email</label><br>
            <input class="input-input" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
        </div>
        <div>
            <label class="input-label">Position</label>
            <input class="input-input" type="text" name="position"  value="<?php echo $_SESSION['position']; ?>" required>
        </div>
        <div>
            <label class="input-label">Institution</label>
            <input class="input-input" type="text" name="institution"  value="<?php echo $_SESSION['institution']; ?>" required>
        </div>
        <div>
            <label class="input-label">Role</label>
            <input class="input-input" type="text" name="role"  value="<?php echo $_SESSION['role']; ?>" required>
            <label class="input-label">Auhtor/Reviewer</label>
        </div>
        <div>
            <label class="input-label">Change Profile Picture</label>
            
            <input type="file" name="pic"/>
        </div>
        <div>
            <label class="input-label"> Change Password</label>
            <input class="input-input" type="password" name="password_1" minlength="6">
        </div>
        <div>
            <label class="input-label">Confirm Password</label>
            <input class="input-input" type="password" name="password_2">
        </div>
        <div>
            <p class="input-label"><input type="submit" name="update" class="btn input-input" value="Update"></p>
        </div>
    </form>
    </div>
</body>
</html>