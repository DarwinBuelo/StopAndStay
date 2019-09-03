<?php
if (isset($_POST['btn_sub'])) {
      session_start();
     include_once 'db.php';
     $user_id = $_SESSION['user_id'];
    
     // for the IMage
     $imgcounter=0;
     $location="../post_img/";
     foreach($_FILES['image']['name'] as $file)
     {
      $filename[] = $file;
     }
     foreach($_FILES['image']['tmp_name'] as $tempfile)
     {
        $tempname[] = $tempfile;
     }
     
     for($imgcount=0;$imgcount<count($tempname);$imgcount++)
     {
      if(move_uploaded_file($tempname[$imgcount], $location.$filename[$imgcount]))
     {
      //do nun
     }
     }
     //end of image code 
     $img=implode("--/",$filename);
     $title = mysqli_real_escape_string($conn, $_POST['title']);
     $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num']);
     $price = mysqli_real_escape_string($conn, $_POST['price']);
     $desc = mysqli_real_escape_string($conn, $_POST['desc']);
     $age = mysqli_real_escape_string($conn, $_POST['age']);
     $usage = mysqli_real_escape_string($conn, $_POST['usage']);
     $condition = mysqli_real_escape_string($conn, $_POST['condition']);
     $location = mysqli_real_escape_string($conn, $_POST['location']);

             


             /*   $sql1 = "INSERT INTO tbl_classified (user,title,photos,contact,price,description,age,usage,condition,location) VALUES ('$user_id','$title','$img','$contact_num','$price','$desc','$age','$usage','$condition','$location')";*/
              $sql1 = "INSERT INTO tbl_classified (user,title,photos,contact,price,description,age,usge,cond,location) VALUES ('$user_id','$title','$img','$contact_num','$price','$desc','$age','$usage','$condition','$location')";
               $result1 = mysqli_query($conn, $sql1);
                 header('Location: ../index.php');
     }

 else {
  //  header('location: ../login/posting.php?null');
     exit();
}

?>