<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit_signup'])) {
     session_start();
     include_once 'db.php';


     $fname    = mysqli_real_escape_string($conn, $_POST['fname']);
     //$hid_val = mysqli_real_escape_string($conn, $_POST['hid_val']);
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['pass']);

//Load Composer's autoloader
require 'autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'billboardnation@gmail.com';                 // SMTP username
    $mail->Password = 'billyboard123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('billboardnation@gmail.com', 'Billboard-Nation');
    $mail->addAddress(''.$username, ''.$fname);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->AddEmbeddedImage('mocklogo.png','logo');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = '<center>
                         <img src="cid:logo">
                         <br>
                         <h2>Hi '.$fname.'!</h2>
                         <p style="font-family: Arial;">Thank You For Creating a Billboard-Nation Account, You are all ready to go!</p>     <p style="font-family: Arial;">Please Click The Link Below to Complete the Final Step</p>
                         <br> 
                        <input type="hidden" name="email_add" id="email_add" value="'.$username.'"/>
                        <a href = "http://localhost/steve1/login/confirm.php?username='.$username.'">Confirm Account</a>
                         </center>';
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
     
          $sql = "SELECT * FROM tbl_users WHERE user_email='$username'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck < 1) {
               $sql1 = "INSERT INTO tbl_users (user_email,user_fname,user_pass) VALUES ('$username','$fname','$password') ";
               $result1 = mysqli_query($conn, $sql1);
               // $lastid="db2_last_insert_id()"
               $mail->send();
               header('location: confirm.php');
               //header('location: https://accounts.google.com');
          //      $resultCheck1 = mysqli_num_rows($result1);
          //      if ($resultCheck1 < 1) {
                   
          //           exit();
          //      } else {
          //           if ($row1 = mysqli_fetch_assoc($result1)) {
          //                $_SESSION['username'] = $row1['username'];
                         // header('location: ../index.php?login=success');
          //                exit();
          //           }
          //      }
          } 
          else {
                header('location: ../posting_motor.php?dup=error');
          }
     }

 else {
    // header('location: ../posting_motor.php?null');
   //  exit();
}