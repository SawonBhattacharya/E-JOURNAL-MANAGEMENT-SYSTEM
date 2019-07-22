<?php 
session_start(); 
//Admin login
if(isset($_POST['Logout'])) {
	session_destroy();
	unset($_SESSION['UserData']['Username']);
	//echo $_SESSION['username'];
	header('location:admin_log.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="col-md-6">
                <div class="card card_color">
                    <center>Recently Reviewed</center>
                    <center>
                    <table id="atable" border="4" cellpadding="80" cellspacing="30" width="1">
                        <tr>
                            <th>Serial No.</th>
                            <th>FIELD</th>
                            <th>TOPIC</th>
                            <th>COMMENT</th>
                            <th>STATUS</th>
                        </tr>

                        <?php
                        
                   
                        $db = mysqli_connect('localhost','root','','ejournal');
                        $query="SELECT * FROM journal j, review r WHERE j.j_id = r.j_id AND comment = 'YES' ;";
                        //echo $query;
                        $result=mysqli_query($db,$query) or die(mysqli_error($db));
                        $i=0;


                        while($row = mysqli_fetch_assoc($result)) {
                        
                        $i++;
                        $field = $row['field'];
                        $topic = $row['topic'];
                        $comment = $row['comment'];
                        $status = $row['status'];
                        echo "<tr><td>".$i."</td><td style='width: 600px;'>".$field."</td><td style='width: 600px;'>".$topic."</td><td>".$comment."</td><td>".$status."</td></tr>";
                        } 
                        mysqli_close($db);
                        ?>

                    </table>
                </center>
            
                <a href="jpublish.php"><button type="button" class="btn-style btn-margin" style="border-style: none;border-radius: 10%;background-color: dodgerblue;opacity: 1;color: white;width: auto;float: right;">Publish</button></a>
                </div>
            </div>
            
            <a href="admin_logout.php"><button type="button" class="btn-style btn-margin" style="border-style: none;border-radius: 10%;background-color: dodgerblue;opacity: 1;color: white;width: auto;float: right;">Logout</button></a>


</body>
</html>