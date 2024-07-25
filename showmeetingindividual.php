<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: welcome.php");
    exit;
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

<div style="background-image: url('bg.jpg');"> 
<br>
<br>   
<div class="container">


<table class="table table-bordered table-dark" >
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Purpose</th>
      <th scope="col">Venue</th>
      <th scope="col">Start</th>
      <th scope="col">Till</th>
    </tr>
  </thead>
  <tbody>
  
  <div style="background-image: url('bg.jpg')" class="fixed-bottom">
<form>
  <center>
  <button type="submit" class="btn btn-dark col-md-3" formaction="/FA/welcome.php">Back</button>
  </center>
</form>
</div>
</div>

    <?php
include 'partials/_dbconnect.php';
  $session_id = session_id();
  
  $sql = "SELECT * FROM `meetindividual`";
  $result = mysqli_query($conn,$sql);
  $rno = $_SESSION['username'];
  $fid = "select facultyid from studinfo where Roll_No = '$rno'";
  $res = mysqli_query($conn,$fid);
  $row = mysqli_fetch_assoc($res);
  $faculty = $row['facultyid'];
  //echo $faculty;
  $count=0;
  while($col = mysqli_fetch_assoc($result))
  {
    if(($faculty == $col['facultyid']) && ($rno == $col['Roll_No'])){   
   
      $count++;
      echo "<tr>
      <th scope='col'>$count</th>
      <td>". $col['purpose'] ."</td>
      <td>". $col['venue'] ."</td>
      <td>". $col['start'] ."</td>
      <td>". $col['till'] ."</td>
    </tr>";
    }
}  
?>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
  </body>
</html>