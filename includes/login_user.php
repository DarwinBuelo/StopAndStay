<?php
if (isset($_POST['submit_login'])) {
     session_start();
     include_once 'db.php';
     
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['pass']);

     if (empty($username) || empty($password)) {
          header('location: ../index.php?login=error');
          exit();
     } else {
          $sql = "SELECT * FROM tbl_users WHERE user_email='$username' AND user_pass='$password'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck < 1) {
                    header('location: ../login/index.php?login=error');
          } else {
               if ($row = mysqli_fetch_assoc($result)) {
                    if ($row['user_name']=='admitratorzxcv32lc') {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['fname'] = $row['user_fname'];
                        $_SESSION['username'] = $row['user_name'];
                        $_SESSION['password'] = $row['user_pass'];
                        $_SESSION['user_number'] = $row['user_contact'];
                        $_SESSION['user_email'] = $row['user_email'];
                        $_SESSION['usertype'] = 'user';
                        header('location: ../admin/index.php');
                    } else {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['fname'] = $row['user_fname'];
                        $_SESSION['username'] = $row['user_name'];
                        $_SESSION['password'] = $row['user_pass'];
                        $_SESSION['user_number'] = $row['user_contact'];
                        $_SESSION['user_email'] = $row['user_email'];
                        $_SESSION['usertype'] = 'user';
                        header('location: ../index.php?login=success');
                    }
                    exit();
               }
          }
     }
} else {
     header('location: ../index.php');
     exit();
}