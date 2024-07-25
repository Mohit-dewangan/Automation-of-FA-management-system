<?php
 $login = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
 
  $exists = false;
  if($exists == false){
    $sql =  "Select * from student where username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
      $login = true;
      session_id('2');
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header("location: welcome.php");
    }
    else{
      $showError = "Invalid Credentials";
    }
  }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>student login</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($login==true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> You are logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if($showError==true){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '.$showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
      }
?>

<div class="bg-image" style="background-image: url('bg3.jpg'); height: 100vh;">
<br><br>
<div class = "container">
<form action = "/FA/slogin.php" method = "post">
<div class="card mx-auto" style="width: 20rem; height:30rem">
<div class="col d-flex justify-content-center">
<div style="width:100px; height:100px" >
<img src="nitcl.png" class="card-img-top">
</div>
    </div>
    <br>
  <div class="card-body">
    <h3 style="text-align:center">Student Login</h3>
    <br>
  <label for="username">Roll Number</label>
    <input type="text" class="form-control" id="username" name ="username" aria-describedby="emailHelp" placeholder="Roll Number">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name = "password" placeholder="Password">
    <br>
    <button type="submit" class="btn btn-dark col-md-12">Login</button>

    <a href="student_password_reset.php" class="float-end" name="reset_link" >Forget ur password?</a>
  </div>
  </div>
    </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>