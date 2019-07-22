<?php 
session_start(); 
//Admin login
if(isset($_POST['Submit'])) {
    $logins = array('Sawon' => '123456','username1' => 'password1','username2' => 'password2');

$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

if (isset($logins[$Username]) && $logins[$Username] == $Password) {
    $_SESSION['UserData']['Username']=$logins[$Username];
    header("location:admin.php");
    exit;
    } 
    else {
        $msg="<span style='color:red'>Invalid Login Details</span>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Author</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h3>Login</h3>
    <form action="admin_log.php" method="post" name="Admin_Login_Form">
            <?php if(isset($msg)) {?>
            
              <label><?php echo $msg;?></label>
            
            <?php } ?>

            <br><br>
            <label>Username</label>
            <input name="Username" type="text" class="" placeholder="Enter Username" required="required">
            <label>Password</label>
            <input name="Password" type="password" class="Input" placeholder="Enter Password" required="required">
            <input name="Submit" type="submit" value="Login" class="">
    </form>
</body>
</html>

