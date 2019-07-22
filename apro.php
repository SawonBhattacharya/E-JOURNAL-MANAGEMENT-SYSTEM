<?php
include('server.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>author</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/footstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
</head>
<body style="background-image: url(img/CHEM.jpg);background-size: cover;">
<p><?php 
if(!(isset($_SESSION['success']))){
header('location:index.html');
}?>
<style type="text/css">
  h1{
    font-style: normal;
font-weight: inherit;
font-family: times new roman;
color: darkred;
  }
  a:hover{
    background-color: rgba(0, 122, 153,0.7);
  }
</style>

<div class="navbar1">
    <a href="research_fields.html" target="display"><button class="navbtn">Field Of Research</button></a>
    <a href="methods.html" target="display"><button class="navbtn">Method</button></a>
    <a href="contactus_index.html" target="display"><button class="navbtn">Contact Us</button></a>
    <a href=""><button class="navbtn">About</button></a>
 </div>

<div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo '<img src="img_upload/'.$_SESSION['picture'].'" style="width:200px;height:200px;border-radius:50%">';?>
                    </div>
                    <div class="col-md-12 mt-25">
                        <div class="card card_color">
                            <h5 class="text-center">Profile Menu</h5>
                            
                            <center class="profile"><?php echo $_SESSION['username']?></center>
                            <center class="profile" style="text-transform: lowercase;font-size: large;"><?php echo $_SESSION['email']?></center>
                            <p class="pro"><?php echo $_SESSION['position']?> at,<?php echo $_SESSION['institution']?> </p>
                                                        

                                <a href="edit_apro.php" style="color: white">Edit Profile</a>
                            
                                <form action="logout.php" method="get">
                                    <input type="submit" class="btn btn-style btn-margin" style="border-style: none;border-radius: 10%;background-color: dodgerblue;opacity: 1;color: white;width: auto;float: right;" name="logout" value="logout"/>
                                </form>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card_color">
                    <center>Recently Uploaded</center>
                    <center>
                    <table class="records" border="1" align="center" cellpadding="10" cellspacing="10" style="padding:2px;border-style: double;border-color: cornsilk;">
                        <tr>
                            <th style="text-align: center;padding: 3px;">Serial No.</th>
                            <th style="text-align: center;padding: 3px;">FIELD</th>
                            <th style="text-align: center;padding: 3px;">TOPIC</th>
                            <th style="text-align: center;padding: 3px;">STATUS</th>
                        </tr>

                        <?php
                        $id=$_SESSION['id'];
                        $db = mysqli_connect('localhost','root','','ejournal');
                        $query="SELECT * FROM journal j where j.id='$id';";
                        //echo $query;
                        $result=mysqli_query($db,$query) or die(mysqli_error($db));
                        $i=0;


                        while($row = mysqli_fetch_assoc($result)) {
                        
                        $i++;
                        $field = $row['field'];
                        $topic = $row['topic'];
                        $status = $row['status'];
                        
                        $jquery="SELECT comment FROM `review` r,`journal` j WHERE r.j_id=j.j_id;";
                        $jresult=mysqli_query($db,$jquery);
                        
                        
                        echo "<tr><td style='text-align: center;padding: 3px;'>".$i."</td><td style='text-align: center;padding: 3px;'>".$field."</td><td style='text-align: center;padding: 3px;'>".$topic."</td><td style='text-align: center;padding: 3px;'>".$status."</td></tr>";
                        } 
                        mysqli_close($db);
                        ?>

                    </table>
                </center>
                <a href="insert.php"><button type="button" class="btn-style btn-margin" style="border-style: none;border-radius: 10%;background-color: dodgerblue;opacity: 1;color: white;width: auto;margin-left: 250px;">insert</button></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card_color">
                    <center>Archive</center>
                    <ul type="none">
                        <li><a href="recent_upload.html" style="color: white">Recently Published</li>
                        <li><a href="archive.php" style="color: white">My Papers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer" style="margin-top: 600px;">
      <div class="column">
        <address>
          <p>Don't be shy- drop us a line.<br>
          We are looking forward to speaking to you!</p>
          <a href="mailto:hello@ejournal.com">hello@ejournal.com</a>
          <p>Contact Us:<br>------------</p>  
        </address>  
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-linkedin"></a>
      </div>

      <div class="column">
        <ul>
          <li>Research
          <ul>
            <li><a href="recent_upload.html">Research Centers A-Z</a></li>
            <li><a href="recent_upload.html">Libraries</a></li>
          </ul>
        </li>

        <li>Departments
          <ul>
            <li><a href="research_fields.html">Departments A-Z</a></li>
            <li><a href="research_fields.html">Interdisciplinary Programs</a></li>
          </ul>
        </li> 
        </ul> 
      </div>

      <div class="column-img">
          <figure class="poof"><div class="stag"><img src="https://bluestag.co.uk/templates/blue_stag/img/footer/seb.gif" style="height: 300%;width: 300%;"></div></figure>

      </div>

      <div class="row">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="t&c_index.html">Terms of use</a>&nbsp;&nbsp;&nbsp;
        <a href="pp_index.html">Privacy Policy</a>&nbsp;&nbsp;&nbsp;
        <a href="t&c_index.html">Copyright Policy</a>
        <p></p>
      </div>



      
    </div>
</body>
</html>