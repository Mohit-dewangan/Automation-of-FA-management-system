<?php
include 'partials/_dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$reset_token)
{
   require('phpmailer/PHPMailer.php');
   require('phpmailer/Exception.php');
   require('phpmailer/SMTP.php');

   $mail = new PHPMailer(true); 

   try {
     
      //Server settings
                        //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'projectmailid01@gmail.com';                     //SMTP username
      $mail->Password   = 'clzv sftg gsor dzpc';                               //SMTP password //Pwd:pmpms
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients   
      $mail->setFrom('projectmailid01@gmail.com', 'AOTFAMS');
      $mail->addAddress($email);     //Add a recipient
     
  
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Password reset link from AOTFAMS';
      $mail->Body    = "We got a request from you to reset your password!</b>
      Click the link below: <br>
      <a href='http://localhost/FA/student_updatepassword.php?email=$email&reset_token=$reset_token' >
      Reset Password 
      </a>";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      return true;
  } catch (Exception $e) {
      return false;
  }
   


}




if(isset($_POST['send-reset-link']))
{
 $query = "SELECT * FROM `student` WHERE `email`='$_POST[email]'";
 $result=mysqli_query($conn,$query);
 if($result)
 {
  if(mysqli_num_rows($result)==1)
  {
    $reset_token = bin2hex(random_bytes(16));
    date_default_timezone_set('Asia/kolkata');
    $date =date("Y-m-d");
    $query = "UPDATE `student` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
    if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
    {
      echo "<script>
      alert('Password reset link sent to mail');
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
  else{
   echo "<script>
   alert('Invalid email entered');
   window.location.href='slogin.php';
   </script>";
  }
 }
 else{
    echo "<script>
    alert('cannot run query');
    window.location.href='slogin.php';
    </script>";
 }
}

?>