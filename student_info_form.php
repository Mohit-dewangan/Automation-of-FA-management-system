<?php
 $showAlert = false;
 $showError = false;
 $update = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
   if(isset($_POST['snoEdit'])){
   
    $name = $_POST["nameEdit"];
    $department = $_POST["departmentEdit"];
    $facultyid = $_POST["facultyidEdit"];
    $rollno = $_POST["RollnoEdit"];
    $dob = $_POST["dateEdit"];
    $cgpa = $_POST["cgpaEdit"];
    $placement_status = $_POST["placement_statusEdit"];
    $placement_company = $_POST["placement_companyEdit"];
    $yearofpassing = $_POST["yearofpassingEdit"];
    $emailid = $_POST["emailidEdit"];
    $ctc = $_POST["ctcEdit"];
    $address = $_POST["addressEdit"];
    $sno = $_POST["snoEdit"];
    $parent = $_POST["parentEdit"];
    $number = $_POST["mobileEdit"];
    $hostel = $_POST["hostelEdit"];
    $guardian =$_POST["guardianEdit"];
    $guardian_num = $_POST["guardian_numberEdit"];


    $check = "SELECT * FROM `companies` WHERE facultyid = '$facultyid' AND roll_no = '$rollno' AND company = '$placement_company'";
    $ress = mysqli_query($conn,$check);



    $sql="UPDATE `studinfo` SET `Roll_No`='$rollno',`Name`='$name',`dob`='$dob',`cgpa`='$cgpa',`address`='$address',
          `department`='$department',`placement_status`='$placement_status',`placed_company`='$placement_company',`year_of_passing`='$yearofpassing',
          `facultyid`='$facultyid',`ctc(in lakhs)`='$ctc',`email_id`='$emailid',`parent_name`='$parent',`ph_no`='$number',`hostel`='$hostel',
           `guardian`='$guardian',`guardian_number`='$guardian_num'   WHERE `studinfo`.`sno` = $sno";
    $result= mysqli_query($conn, $sql);
    if($result)
    {
      $update = true;
      
      if(mysqli_num_rows($ress)==0){
      $qry = "INSERT INTO `companies`(`facultyid`, `company`, `roll_no`) VALUES ('$facultyid','$placement_company','$rollno')";
      $resqry = mysqli_query($conn,$qry);
      }


    }else{
      echo "We could not update the record successfully";
    }




   }
 else{ 
  include 'partials/_dbconnect.php';
  $name = $_POST["name"];
  $department = $_POST["department"];
  $facultyid = $_POST["facultyid"];
  $rollno = $_POST["Rollno"];
  $dob = $_POST["date"];
  $cgpa = $_POST["cgpa"];
  $placement_status = $_POST["placement_status"];
  $placement_company = $_POST["placement_company"];
  $yearofpassing = $_POST["yearofpassing"];
  $emailid = $_POST["emailid"];
  $ctc = $_POST["ctc"];
  $address = $_POST["address"];
  $parent = $_POST["parent"];
  $number = $_POST["phone"];
  $hostel = $_POST["hostel"];
  $guardian =$_POST["guardian"];
  $guardian_num = $_POST["guardian_num"];
  
  $exists = false;
  //check whether unique username exist
  $existsql = "Select * FROM `studinfo` WHERE Roll_No = '$rollno'";
  $result = mysqli_query($conn,$existsql);
  $numexistrows = mysqli_num_rows($result);
  if($numexistrows>0)
  {
    $exists = true;
  }
  


  if($exists == false){
    $sql =  "INSERT INTO `studinfo` (`Roll_No`, `Name`, `dob`, `cgpa`, `address`, `department`, `placement_status`, 
           `placed_company`, `year_of_passing`, `facultyid`, `ctc(in lakhs)`, `email_id`,`parent_name`,`ph_no`,`hostel`,
              `guardian`,`guardian_number`) VALUES ('$rollno', '$name', '$dob', 
            '$cgpa', '$address', '$department', '$placement_status', '$placement_company', '$yearofpassing', 
              '$facultyid', '$ctc', '$emailid','$parent','$number','$hostel','$guardian','$guardian_num')";


    $rslt = mysqli_query($conn,$sql);
    if($rslt){
      $showAlert = true;
     
  
      $qry = "INSERT INTO `companies`(`facultyid`, `company`, `roll_no`) VALUES ('$facultyid','$placement_company','$rollno')";
      $resqry = mysqli_query($conn,$qry);
    }
  } 
  else{
    $showError = "Your details are already in the databse";
  }
}}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>FA</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert==true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> details are submitted.
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
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your record has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class="bg-image" style="background-image: url('bg3.jpg'); height: 220vh;">
<br>
<div class = "container">
<form action = "/FA/student_info_form.php" method = "post">
<div class="card mx-auto" style="width: 20rem; height:87rem">

  <div class="card-body">
  <h3 style="text-align:center">Enter Your Details</h3>
    <label for="facultyid">Faculty Id</label>
    <input type="text" class="form-control" id="facultyid" name="facultyid" placeholder="Faculty Id"> 
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    <label for="Rollno">Roll Number</label>
    <input type="text" class="form-control" id="Rollno" name = "Rollno" placeholder="Roll Number">
    <label for="date">DOB</label>
    <input type="date" class="form-control" id="date" name = "date" placeholder="Date of Birth">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name = "address" placeholder="Address">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "emailid" aria-describedby="emailHelp" placeholder="Enter Email">
    <label for="department">Department</label>
    <input type="text" class="form-control" id="department" name = "department" placeholder="Department">
    <label for="cgpa">CGPA</label>
    <input type="number" class="form-control" id="cgpa" name = "cgpa" placeholder="CGPA">
    <label for="hostel">Hostel Details</label>
    <input type="text" class="form-control" id="hostel" name = "hostel" placeholder="Hostel Info">
    <label for="yearofpassing">Year Of Passing</label>
    <input type="date" class="form-control" id="yearofpassing" name = "yearofpassing" placeholder="Year of Passing">
    <label for="placement_status">Placement Status</label>
    <input type="text" class="form-control" id="placement_status" name = "placement_status" >
    <label for="placement_company">Placed Company Name</label>
    <input type="text" class="form-control" id="placement_company" name = "placement_company" placeholder="Placement Company">
    <label for="ctc">CTC</label>
    <input type="number" class="form-control" id="ctc" name = "ctc" placeholder="CTC">
    <label for="parent">Parent's Name</label>
    <input type="text" class="form-control" id="parent" name = "parent" placeholder="Parent Name">
    <label for="phno">Phone number</label>
    <input type="text" class="form-control" id="phone" name = "phone" placeholder="Phone Number">
    <label for="guardian">Guardian Name</label>
    <input type="text" class="form-control" id="guardian" name = "guardian" placeholder="Guardian Name">
    <label for="guardian_num">Guardian Phone Number</label>
    <input type="text" class="form-control" id="guardian_num" name = "guardian_num" placeholder="Guardian Phone Number">
    <br>
    <button type="submit" class="btn btn-dark col-md-12">Submit</button>    <br> <br>
    <button type="submit" class="btn btn-dark col-md-12" formaction="/FA/welcome.php">Back</button>
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