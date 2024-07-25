
<?php
session_start();

 $showAlert = false;
 $showError = false;
 if(isset($_POST['submit']))
 {
  $_SESSION['status']= "Requested Successfully - Your request is in pending status";
  header("location: showrequest.php");
 }

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  include 'partials/_dbconnect.php';
  $Roll_No = $_POST["Roll_No"];
  $FacultyId = $_POST["FacultyId"];
  $request = $_POST["request"];
 
    $sql =  "INSERT INTO `studentrequest` (`Roll_No`, `FacultyId`, `request`, `status`)
     VALUES ('$Roll_No', '$FacultyId', '$request', 'Pending')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
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

    <title>FA Automation</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert==true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Requested Successfully</strong> - Your request is in pending status
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
   <div style="float: left; width: 40%; height: 90% ; background-image: url('bg1.jpg');">
   <br> <br> <br> <br>
    <div class = "container" >
     <h2>Add Your Request</h2>
     <br>
     <form action = "/FA/request.php" method = "post">
  <div class="form-group col-md-6 ">
    <label for="Roll_No">Roll Number</label>
    <input type="text" class="form-control" id="Roll_No" name ="Roll_No" aria-describedby="emailHelp" placeholder="Roll Number">  
  </div>
  <div class="form-group col-md-6">
    <label for="FacultyId">Faculty Id</label>
    <input type="text" class="form-control" id="FacultyId" name="FacultyId" placeholder="Faculty Id">
  </div>
  <div class="form-group col-md-6">
    <label for="request">Request Details</label>
    <input type="text" class="form-control" id="request" name="request" placeholder="Request">
  </div>
<br> 
  <div class="container">
  <div class="col-md-6 text-center">
  <input type="submit" name="submit" value="Request">
  </div>
    </div>
    <br> <br> <br> <br> <br> 
    </div>
</form>
     </div>

     <div style="width:60%;  float:right;">
    <img src="nitc2.jpg" height="594" width="819" />
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