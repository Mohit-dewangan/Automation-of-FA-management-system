<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    

    <title>Welcome - <?php $_SESSION['username']   ?></title>
 
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

<?php
if(isset($_SESSION['status'])){
  echo $_SESSION['status'];
  unset( $_SESSION['status']);
}
?>
<div style="background-image: url('bg.jpg');">
<br>
<h4><center>Pending Requests</center></h4>
<div class="container">
<table class="table table-bordered table-dark" >
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Roll No</th>
      <th scope="col">Faculty Id</th>
      <th scope="col">Request Details</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php
include 'partials/_dbconnect.php';
  $session_id = session_id();
 
  $sql = "SELECT * FROM  `studentrequest` where Status='Pending'";
  
  if($session_id == 1)
  {
    $name = $_SESSION['username'];
    $fid = "Select facultyid from fa where username = '$name'";
    $res = mysqli_query($conn,$fid);
    $col = mysqli_fetch_assoc($res);
    $id = $col['facultyid'];
    echo $id;
  }
  else if($session_id == 2)
  {
     $sname =$_SESSION['username'];
     echo $sname;
    
  }
  $result = mysqli_query($conn,$sql);
  $sno=0;
  $cnt=0;
  while($row = mysqli_fetch_assoc($result)){
    if($session_id == 1)
    {
     if($id == $row['FacultyId']){
      $sno++;
    echo "<tr>
    <th scope='row'>$sno</th>
    <td>". $row['Roll_No'] ."</td>
    <td>". $row['FacultyId'] ."</td>
    <td>". $row['request'] ."</td>
    <td>". $row['Status'] ."</td>
    <td>
    <form action='/FA/showrequest.php' method='POST'>
    <input name='SNo' value='",$row["SNo"],"' hidden>
    <input type='submit' name='Approve' value='Approve' > &nbsp 
    <input type='submit' name='Reject' value='Reject' >
    </form>
    </td>
  </tr>";
}
} 
else if($session_id == 2)
{
  if($sname == $row['Roll_No']){
 $cnt++;

echo "<tr>
<th scope='row'>$cnt</th>
<td>". $row['Roll_No'] ."</td>
<td>". $row['FacultyId'] ."</td>
<td>". $row['request'] ."</td>
<td>". $row['Status'] ."</td>
<td>None</td>
</tr>";
  }
} 
}  
  ?>
</div>
  </tbody>
</table>

<br>
<br> 
<h4><center>Approved/Rejected Requests</center></h4>
<div class="container">

<table class="table table-bordered table-dark" >
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Roll No</th>
      <th scope="col">Faculty Id</th>
      <th scope="col">Request Details</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

<?php
  include 'partials/_dbconnect.php';
  $session_id = session_id();
 
  $sql = "SELECT * FROM  `studentrequest` where Status IN('Approved','Rejected')";
  if($session_id == 1)
  {
    $name = $_SESSION['username'];
    $fid = "Select facultyid from fa where username = '$name'";
    $res = mysqli_query($conn,$fid);
    $col = mysqli_fetch_assoc($res);
    $id = $col['facultyid'];
    echo $id;
  }
  else if($session_id == 2)
  {
     $sname =$_SESSION['username'];
     echo $sname;
    
  }
  $result = mysqli_query($conn,$sql);
  $sno=0;
  $cnt=0;
  while($row = mysqli_fetch_assoc($result)){
    if($session_id == 1)
    {
     if($id == $row['FacultyId']){
      $sno++;
    echo "<tr>
    <th scope='row'>$sno</th>
    <td>". $row['Roll_No'] ."</td>
    <td>". $row['FacultyId'] ."</td>
    <td>". $row['request'] ."</td>
    <td>". $row['Status'] ."</td>
  </tr>";
    }
  } 
  else if($session_id == 2)
  {
    if($sname == $row['Roll_No']){
   $cnt++;

  echo "<tr>
  <th scope='row'>$cnt</th>
  <td>". $row['Roll_No'] ."</td>
  <td>". $row['FacultyId'] ."</td>
  <td>". $row['request'] ."</td>
  <td>". $row['Status'] ."</td>
</tr>";
    }
} 
}   
 ?>
</div>
  </tbody>
</table>

<?php
if(isset($_POST['Approve'])){

  $SNo=$_POST['SNo'];
  $select="UPDATE studentrequest SET Status='Approved' WHERE SNo='$SNo' ";
  $result=mysqli_query($conn,$select);
  header('location:showrequest.php');
}

if(isset($_POST['Reject'])){
$SNo=$_POST['SNo'];
$select="UPDATE studentrequest SET Status='Rejected' WHERE SNo='$SNo' ";
$result=mysqli_query($conn,$select);
header('location:showrequest.php');
}

?>
<br>
<div>
<form>
  <center>
  <button type="submit" class="btn btn-dark " formaction="/FA/welcome.php">Back</button>
  </center>
</form>
</div>

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


