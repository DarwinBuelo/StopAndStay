<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Billboard Nation | Admin</title>
</head>

<?php
session_start();
include_once("header.php");
include_once("../includes/db.php");

if(isset($_GET['item']))
{
    $viewid=$_GET['item'];
    $sql="select * from tbl_pend where pend_id = '".$_GET['item']."'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
}
?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"><?php echo $row['pend_title']; ?></h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Automotives</a></li>
                                            <li class="breadcrumb-item"><a href="at_view.php" class="breadcrumb-link">View All Automotive</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $row['pend_title']; ?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- ========= CAROUSEL =========== -->
                                    <?php
                                    $sql1="select * from tbl_pend where pend_id = '".$_GET['item']."'";
                                    $rest=mysqli_query($conn,$sql1);
                                    $countrest=mysqli_num_rows($rest);
                                    ?>
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                       <?php
                                       for($i=0;$i<$countrest;$i++)
                                        {
                                            echo ' <li data-target="#carouselExampleIndicators" data-slide-to="';
                                        echo $i.'"></li>';
                                        }
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        
                                         <?php
                                            $imgs1=$row['pend_photos'];
                                            $imgs=explode("--/",$imgs1);
                                            $counter=0;
                                            foreach($imgs as $image)
                                            
                                        {
                                            
                                           if($counter==0)
                                           {
                                            echo '<div class="carousel-item active">';
                                            echo '<img class="d-block" style="max-height: 550px;margin: auto;background-position: center center;background-repeat: no-repeat;; background-position: center center;
                                            background-repeat: no-repeat;" src="../post_img/';
                                            echo $image.'">';
                                            echo '</div>';
                                           }
                                           else
                                           {
                                            echo '<div class="carousel-item">';
                                             echo '<img class="d-block" style="width:800px; height:375px; background-position: center center;
                                            background-repeat: no-repeat;" src="../post_img/';
                                            echo $image.'">';
                                            echo '</div>';
                                           }
                                            
                                          $counter+=1;
                                        }

                                        ?>
                                        <!-- <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/images/card-img-1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/images/card-img-2.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/images/card-img-3.jpg" alt="Third slide">
                                        </div> -->
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                       <span class="sr-only">Previous</span>  </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>  </a>
                                    </div>
                                <!-- ============ END OF CAROUSEL -->

                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo $row['pend_title'];?></h2>
                                        <p><?php echo $row['pend_desc'];?></p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Information</h3>
                                    <?php

                  $teabag=$_GET['item'];
                  $sql=mysqli_query($conn,"SELECT * FROM tbl_pend where pend_id=$teabag");
                  while($res=mysqli_fetch_array($sql))
                  {  
                  ?>
                  <h1 class="margin-bottom"><?php echo $res['pend_title'];?></h1>
               
                  <!-- Pruducts -->
                  <div class="margin2x">
                     <div class="s-12 m-8 l-2 xl-7 xl-3">
                        
                        <div class="line hide-m">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                      
                    </div>
                  </div>

                        <h5><strong><?php echo money_formater($res['pend_price']); ?></strong></h5>
                        <table>
                           <th style="text-align:center;">Year</th>
                           <th style="text-align:center;">Kilometers</th>
                           <th style="text-align:center;">Fuel Type</th>
                           <th style="text-align:center;">Transmission</th>
                           <tr>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/Calendar.png">
                                 <br><?php echo $res['pend_year']; ?>
                              </td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/Km.png">
                                 <br><?php echo $res['pend_km']; ?>
                              </td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/FuelType.png">
                                 <br><?php echo $res['pend_fueltype']; ?></td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/Automatic.png">
                                 <br><?php echo $res['pend_transtype']; ?></td>
                           </tr>
                           <th style="text-align:center;">Body Type</th>
                           <th style="text-align:center;">Doors</th>
                           <th style="text-align:center;">Color</th>
                           <th style="text-align:center;">Condition</th>
                           <tr>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/BodyCondition.png">
                                 <br><?php echo $res['pend_bodytype']; ?>
                              </td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/Doors.png">
                                 <br><?php echo $res['pend_doors']; ?>
                              </td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/Color.png">
                                 <br><?php echo $res['pend_color']; ?></td>
                              <td style="text-align:center;">
                                 <img class="details_icons" src="../img/BodyCondition.png">
                                 <br><?php echo $res['pend_bodycon']; ?></td>
                           </tr>
                        </table>
                        <h4>Description:</h4>
                        <p class="margin-bottom"><?php echo $res['pend_desc']; ?></p>
                         <h4>Extra Features:</h4>
                         <?php 
                         $extras = explode(", ",$res['pend_extras']);
                         foreach($extras as $extra)
                         {
                           echo '<p class="margin-bottom">'.$extra.'</p>';
                         }
                     
                    ?>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 col-s-2 col-xl-2">
                                    <?php
                                    if($res['pend_stat']==0)
                                    {
                                        echo '<a href="at_app.php?id='.$res['pend_id'].'"><button class="btn btn-primary"><i class="fa fa-check"></i> Approve</button></a>';
                                    }
                                    else
                                    {
                                        echo '<a href="at_app.php?id='.$res['pend_id'].'"><button disabled class="btn btn-disabled"><i class="fa fa-check"></i> Approve</button></a>';
                                    }
                                    ?>
                                    </div>
                               <div class="col-md-2 col-lg-2 col-s-2 col-xl-2">
                                    <a href="at_dis.php?id=<?php echo $res['pend_id'];} ?>"><button class="btn btn-secondary"><i class="fa fa-check"></i> Decline</button></a>
                                </div>
                            </div>
                        </div>
                                    <!-- <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-list-alt mr-3"></i><b>Category: </b> <?php echo $row['attraction_category'];?></li>
                                        <li class="mb-2"><i class="fas fa-fw fa-phone mr-3"></i><b>Contact: </b><?php echo $row['attraction_contact_in_charge'];?></li>
                                         <li class="mb-2"><i class="fas fa-calendar-check mr-3"></i><b>Open/Close Hours: </b><?php echo $row['attraction_open_close_hour'];?></li>
                                        <li class="mb-2"><i class="fas fa-utensils mr-3"></i><b>Cuisines/Delicacies: </b><?php echo $row['attraction_delicacies_cuisine_offered'];?></li>
                                        <li class="mb-2"><i class="fas fa-camera-retro mr-3"></i><b>Activities: </b><?php echo $row['attraction_activities'];?></li>
                                        <li class="mb-2"><i class="fas fa-dollar-sign mr-3"></i><b>Entrance Fee: </b><?php echo $row['attraction_entrance_fee'];?></li>
                                    </ul>
                                    </div> -->
                                </div>
                               
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                       
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyC5TaSNk0MhM7hdBCVi6I_MvzsXR8ozOi0&callback=myMap"></script>
</body>
 
</html>
<?php
function money_formater($value) {
  return 'Php ' . number_format($value,2);
}

?>