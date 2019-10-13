<?php
include '../class/Email.php';
include_once 'db.php';
session_start();

if (isset($_POST['submit_signup'])) {

     $fname    = mysqli_real_escape_string($conn, $_POST['fname']);
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['pass']);
     $role = mysqli_real_escape_string($conn, $_POST['role']);

    $sql = "SELECT * FROM tbl_users WHERE user_email='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
        $sql1 = "INSERT INTO tbl_users (user_email,user_fname,user_pass, role) VALUES ('$username','$fname','$password', '$role') ";
        $result1 = mysqli_query($conn, $sql1);
        $content = emailBody($fname, $username);
        $subject = 'Account Verification';
        Email::send($username, $fname, $content, $subject);
        header('location: ../index.php');
    } else {
        $redirect = '<a href="http://localhost/stopNstay/login/register.php">Try Again</a>';
        die('Error: Email Already Exist   '.$redirect);
    }
}
function emailBody($fname, $username)
{
    $html = '<center>
                <br>
                <h2>Hi '.$fname.'!</h2>
                <p style="font-family: Arial;">Thank You For Creating a Stop N Stay Account, You are all ready to go!</p>     <p style="font-family: Arial;">Please Click The Link Below to Complete the Final Step</p>
                <br>
               <input type="hidden" name="email_add" id="email_add" value="'.$username.'"/>
               <a href = "http://localhost/stopNstay/login/confirm.php?username='.$username.'">Confirm Account</a>
            </center>';
    return $html;
}