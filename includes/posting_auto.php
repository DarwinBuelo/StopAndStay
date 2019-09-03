<?php
if (isset($_POST['btn_sub'])) {
      session_start();
     include_once 'db.php';
     $user_id = $_SESSION['user_id'];
     $model    = mysqli_real_escape_string($conn, $_POST['model']);
     // for the IMage
     $imgcounter=0;
     $location="../post_img/";
     foreach($_FILES['image']['name'] as $file) {
          $filename[] = $file;
     }
     foreach($_FILES['image']['tmp_name'] as $tempfile) {
        $tempname[] = $tempfile;
     }
     for($imgcount=0;$imgcount<count($tempname);$imgcount++) {
          if(move_uploaded_file($tempname[$imgcount], $location.$filename[$imgcount])) {

          }
     }
     //end of image code 
     $img=implode("--/",$filename);
     $title = mysqli_real_escape_string($conn, $_POST['title']);
     $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num']);
     $price = mysqli_real_escape_string($conn, $_POST['price']);
     $desc = mysqli_real_escape_string($conn, $_POST['desc']);
     $kms = mysqli_real_escape_string($conn, $_POST['kms']);
     $body_con = mysqli_real_escape_string($conn, $_POST['body_con']);
     $mech_con = mysqli_real_escape_string($conn, $_POST['mech_con']);
     $yr = mysqli_real_escape_string($conn, $_POST['yr']);
     $body_T = mysqli_real_escape_string($conn, $_POST['body_T']);
     $color = mysqli_real_escape_string($conn, $_POST['color']);
     $tran_T = mysqli_real_escape_string($conn, $_POST['tran_T']);
     $reg_spec = mysqli_real_escape_string($conn, $_POST['reg_spec']);
     $no_cyl = mysqli_real_escape_string($conn, $_POST['no_cyl']);
     $doors = mysqli_real_escape_string($conn, $_POST['doors']);
     $hp = mysqli_real_escape_string($conn, $_POST['hp']);
     $warranty = mysqli_real_escape_string($conn, $_POST['warranty']);
     $fuel_T = mysqli_real_escape_string($conn, $_POST['fuel_T']);
     $location = mysqli_real_escape_string($conn, $_POST['location']);

                $extra2 ='';
                    if(!empty($_POST['extras']))
               { 
                    $x=0;
                   // $extras = mysqli_real_escape_string($conn, $_POST['extras']);
                    foreach($_POST['extras'] as $selected)
                    {
                         if($x == 0)
                         {
                              $extra2 .= $selected;
                         }
                         else
                         {
                              $extra2 .= ', '.$selected;
                         }
                         $x++;
                    }
               }

                $sql1 = "INSERT INTO tbl_pend (pend_user,pend_model,pend_photos,pend_title,pend_pnum,pend_price,pend_desc,pend_km,pend_bodycon,pend_mechcon,pend_year,pend_bodytype,pend_color,pend_transtype,pend_regional,pend_cylinder,pend_doors,pend_hp,pend_war,pend_fueltype,pend_loc,pend_extras) VALUES ('$user_id','$model','$img','$title','$contact_num','$price','$desc','$kms','$body_con','$mech_con','$yr','$body_T','$color','$tran_T','$reg_spec','$no_cyl','$doors','$hp','$warranty','$fuel_T','$location','$extra2')";
               $result1 = mysqli_query($conn, $sql1);
                 header('location:../index.php?regsuc=1');
         /*  $id_final = 0;
         $sql ="SELECT max(id) FROM tbl_pending";
         $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);*/

        /*  $sql = $conn->prepare("SELECT max(id) FROM tbl_pending;");
          $sql->execute();
          $sql->bind_result($res);
          $temp = 'false';
          $result =0;
          while($sql->fetch())
          {
               $temp = 'true';
               $result = $res;
          }
         
               /////////////////// temporary method. add while loop later on /////////////
          if ($temp == 'false') {
             
              $id_final = 1;
                 $sql1 = "INSERT INTO tbl_pending (id,user_id) VALUES ('$id_final','$user_id')";
               $result1 = mysqli_query($conn, $sql1);
                  
                     $sql7 = "INSERT INTO tbl_photos (pending_id,photos) VALUES ('$id_final','$img')";
                    $result7 = mysqli_query($conn, $sql7);
                    
                   $sql2 = "INSERT INTO tbl_post (pending_id,auto_id,description) VALUES ('$id_final','1','$model'),('$id_final','2','$pic'),('$id_final','3','$title'),('$id_final','4','$contact_num'),('$id_final','5','$price'),('$id_final','6','$desc'),('$id_final','7','$kms'),('$id_final','8','$body_con'),('$id_final','9','$mech_con'),('$id_final','10','$yr'),('$id_final','11','$body_T'),('$id_final','12','$color'),('$id_final','13','$tran_T'),('$id_final','14','$reg_spec'),('$id_final','15','$no_cyl'),('$id_final','16','$doors'),('$id_final','17','$hp'),('$id_final','18','$warranty'),('$id_final','19','$fuel_T'),('$id_final','20','$location')";
               $result2 = mysqli_query($conn, $sql2);

                if(!empty($_POST['extras']))
               { 
                    $extras = mysqli_real_escape_string($conn, $_POST['extras']);
                    foreach($_POST['extras'] as $selected)
                    {
                          $sql5 = "INSERT INTO tbl_post (pending_id,auto_id,description) VALUES ('$id_final','21','$selected')";
                          $result5 = mysqli_query($conn, $sql5);
                    }
               }
               header('location:../index.php?regsuc=1');
          } 
          else {
               $id_final = $result+1;
                   $sql1 = "INSERT INTO tbl_pending (id,user_id) VALUES ('$id_final','$user_id')";
               $result1 = mysqli_query($conn, $sql1);

                     $sql7 = "INSERT INTO tbl_photos (pending_id,photos) VALUES ('$id_final','$img')";
                    $result7 = mysqli_query($conn, $sql7);
                   

                $sql2 = "INSERT INTO tbl_post (pending_id,auto_id,description) VALUES ('$id_final','1','$model'),('$id_final','2','$pic'),('$id_final','3','$title'),('$id_final','4','$contact_num'),('$id_final','5','$price'),('$id_final','6','$desc'),('$id_final','7','$kms'),('$id_final','8','$body_con'),('$id_final','9','$mech_con'),('$id_final','10','$yr'),('$id_final','11','$body_T'),('$id_final','12','$color'),('$id_final','13','$tran_T'),('$id_final','14','$reg_spec'),('$id_final','15','$no_cyl'),('$id_final','16','$doors'),('$id_final','17','$hp'),('$id_final','18','$warranty'),('$id_final','19','$fuel_T'),('$id_final','20','$location')";
               $result2 = mysqli_query($conn, $sql2);

               if(!empty($_POST['extras']))
               { 
                    $extras = mysqli_real_escape_string($conn, $_POST['extras']);
                    foreach($_POST['extras'] as $selected)
                    {
                          $sql5 = "INSERT INTO tbl_post (pending_id,auto_id,description) VALUES ('$id_final','21','$selected')";
                          $result5 = mysqli_query($conn, $sql5);
                    }
               }
               header('location:../index.php?regsuc=1');
          } */
     }

 else {
    header('location: ../login/posting.php?null');
     exit();
}

?>