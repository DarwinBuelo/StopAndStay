<?php

     session_start();
     include_once("../includes/db2.php");
    // 'db.php';
     
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['pass']);

          $sql = "SELECT * FROM tbl_websiteuser WHERE user_name='$username' AND user_pass='$password'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck == 1) 
          {
               $sql1 = "SELECT * FROM tbl_websiteuser WHERE user_name='$username' AND user_pass='$password'";
               $result1 = mysqli_query($conn, $sql1);
               $row=mysqli_fetch_array($result1);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['name'] = $row['user_fname'];
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['userpriv'] = $row['user_lvl'];
                    $_SESSION['utag'] = $row['user_tag'];

                    //check user privilieges
                    if($_SESSION['userpriv']==1)
                    {
                    header('location: index.php');
                    exit();
                    }
                    elseif($_SESSION['userpriv']==0)
                    {
                         switch ($_SESSION['utag']) {
                              case 1:
                                   header("location:hoteldash.php");
                                   break;
                              case 2:
                                   header("location:restdash.php");
                                   break;
                              case 3:
                                   header("location:entitydash.php");
                                   break;
                              
                              default:
                                   # code...
                                   break;
                         }
                    }

                    exit();
          }    
          else
          {
          header('location: login.php?ret=0');
          exit();
          }   
              
          
