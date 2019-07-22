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
			
			color: rgba(5, 5, 0,0.8);
		}
		p{
			text-align: justify;
padding: 10px;
font-size: inherit;
font-weight: inherit
		}
	</style>
</head>
<body style="background:linear-gradient(to left,grey,black);">
	<div class="container">
		<div class="card">
			<?php
			$db = mysqli_connect('localhost','root','','ejournal');

			//check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySql:";
				mysqli_connect_error();
			}
			$id=$_SESSION['id'];
            $db = mysqli_connect('localhost','root','','ejournal');
            $query="SELECT * FROM journal j where j.id='$id';";
            $i=0;
            //echo $query;
            $result=mysqli_query($db,$query) or die(mysqli_error($db));
            while($row=mysqli_fetch_assoc($result)){
            	$i++;
			?>
			<div>
			<h1><?php echo $row['topic']?></h1>
			<h2><?php echo $row['field']?></h2>
			<h3><?php echo $row['status']?></h3>
			<h4><?php echo $row['abs']?></h4>
			<h4><a href="<?php echo 'upload/'.$row['upload'];?>" target="_blank">Paper<?php echo $i?></a></h4>
			</div>
			<hr>
			<?php } ?>
		</div>
	</div>

</body>
</html>