<?php
 $showAlert = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $facultyid = $_POST["facultyid"];
  $name = $_POST["name"];
  $department = $_POST["department"];
  $email = $_POST["email"];
  $exists = false;
  //check whether unique username exist
  $existsql = "Select * FROM `fa` WHERE username = '$username'";
  $result = mysqli_query($conn,$existsql);
  $numexistrows = mysqli_num_rows($result);
  if($numexistrows>0)
  {
    $exists = true;
  }
 
  if($exists == false){
    $sql =  "INSERT INTO `fa` ( `username`, `password`, `name`, `facultyid`, `department`,`email`) VALUES ('$username', '$password', '$name', '$facultyid', '$department','$email')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
    }
  } 
  else{
    $showError = "Username already exist";
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

    <title>FA Sign Up</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert==true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> Your Account is created.
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
<h3 style="text-align:center">Sign Up as Faculty Advisor</h3>
<div class = "container">
<form action = "/FA/signup.php" method = "post">
<div class="card mx-auto" style="width: 20rem; height:36rem">
<div class="col d-flex justify-content-center">
<div style="width:100px; height:100px" >
<img src="nitcl.png" class="card-img-top">
</div>
    </div>
  <div class="card-body">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name ="username" aria-describedby="emailHelp" placeholder="Username">
    <label for="facultyid">Faculty_ID</label>
    <input type="text" class="form-control" id="facultyid" name="facultyid" placeholder="Faculty Id">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    <label for="department">Department</label>
    <input type="text" class="form-control" id="department" name = "department" placeholder="Department">
    <label for="Email">Email</label>
    <input type="email" class="form-control" id="email" name = "email" placeholder="Email Id">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name = "password" placeholder="Password">
    <br>
    <button type="submit" class="btn btn-dark col-md-12">Sign Up</button>
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