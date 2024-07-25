<?php
  session_start();

  if(isset($_POST['checking_viewbtn']))
  {
    include 'partials/_dbconnect.php';
    $r_no=$_POST['roll_num'];
      
    // echo $return = $r_no;

    $sql = "SELECT * FROM companies WHERE roll_no='$r_no'";
    $result = mysqli_query($conn,$sql);
    $cnt = 0;
    if(mysqli_num_rows($result)>0)
    {
      foreach($result as $row)
      {
        $cnt++;
        echo $return = '
          <h5>'.$row['company'].'</h5>
        ';
      }
    }
    else 
    {
    }
  }

?>