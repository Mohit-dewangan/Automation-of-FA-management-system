<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
     <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    
 
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body style="position:relative">
    <?php require 'partials/_nav.php' ?>
    <div class="bg-image" style="background-image: url('bg3.jpg'); height: 100vh;">
    <br><br><br><br><br><br>

   <?php 
    require("partials/_dbconnect.php");

    if(isset($_GET['email']) && isset($_GET['reset_token']))
    {
        date_default_timezone_set('Asia/kolkata');
        $date = date("Y-m-d");
        $query = "SELECT * FROM `student` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
           if(mysqli_num_rows($result)==1)
           {
            echo "
            <div class = 'container'>
            <div class='card mx-auto' style='padding-top:14px; width: 20rem; height:15rem'>
            <div class='col d-flex justify-content-center'>
            <div style='width:100px; height:100px' >
            <img src='nitcl.png' class='card-img-top'>
            </div>
                </div>
              <div class='card-body'>
            <form method='POST'>
              <h3> Create new password </h3> 
              <input type='password' placeholder='New Password' name='password'>
              <button type = 'submit' name = 'updatepassword'>UPDATE</button>
              <input type = 'hidden' name='email' value='$_GET[email]'> 
              </div>
              </div>
                </form>
                </div>
                </div>
            ";
           }
           else{
            echo "<script>
            alert('Invalid or expired link');
            window.location.href='slogin.php';
            </script>";
           }
        }
        else{
            echo "<script>
            alert('Server Down!!Try again later');
            window.location.href='slogin.php';
            </script>";
        }
    }

?>


<?php

if(isset($_POST['updatepassword']))
{
  $pass=$_POST['password'];
  $update = "UPDATE `student` SET `password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
  if(mysqli_query($conn,$update))
  {
    echo "<script>
    alert('Password updated successfully');
    window.location.href='slogin.php';
    </script>";
}
  
  else{
    echo "<script>
            alert('Server Down!!Try again later');
            window.location.href='slogin.php';
            </script>";
  }
}


?>
</div>
<!-- Footer -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>