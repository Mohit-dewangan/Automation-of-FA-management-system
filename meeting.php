
<?php
session_start();


$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $facultyid = $_POST["facultyid"];
    $purpose = $_POST["purpose"];
    $venue = $_POST["venue"];
    $start = $_POST["starts"];
    $end = $_POST["ends"];
   
    $sql = "INSERT INTO `meet`(`facultyid`, `purpose`, `venue`, `start`, `till`) 
                  VALUES ('$facultyid','$purpose','$venue','$start','$end')";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $showAlert = true;
    }

}
if(isset($_POST['submit']))
{
 $_SESSION['status']= "Notification Sent Successfully";
 header("location: welcome.php");
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

    <title>AOTFAMS</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php   
       if($showAlert==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>success</strong> meeting is scheduled .
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
        }
      
    ?>
    
   <div style="float: left; width: 40%; height: 90% ; background-image: url('bg.jpg');">
   <br> 
   <br>
   <h3 class = " text-dark" >Add Meeting Details</h3>
    <br>
    <form  action = "/FA/meeting.php" method = "post">
  <div class="container">
  <div class = "form-group col-md-6">
    <label for="Facultid">Faculty Id</label>
    <input type="text" class="form-control" id="facultyid" name="facultyid" placeholder="Enter Faculty Id">
  </div>

  <div class="form-group col-md-6">
    <label for="purpose">Purpose</label>
    <input type="text" class="form-control" id="purpose" name = "purpose" placeholder="Purpose">
  </div>

  <div class="form-group col-md-6">
    <label for="venue">Venue</label>
    <input type="text" class="form-control" id="venue" name = "venue" placeholder="Venue">
  </div>

  <div class="form-group col-md-6">
    <label for="start">Starts on</label>
    <input type="datetime-local" class="form-control" id="starts" name = "starts" placeholder="Start Time">
  </div>

  <div class="form-group col-md-6">
    <label for="ends">Ends on</label>
    <input type="datetime-local" class="form-control" id="ends" name = "ends" placeholder="End Time">
  </div>
<br>
  <div class="container">
  <div class="col-md-6 text-center">
  <input type="submit" name="submit" value="Submit">
  </div>
      </div>
      </div>
</form>
</div>

<div style="width:60%;  float:right;">
    <img src="nitc.jpg" height="594" width="819" />
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