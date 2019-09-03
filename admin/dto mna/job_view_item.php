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
    $sql="select * from tbl_props where ID = '".$_GET['item']."'";
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
                                <h3 class="mb-2"><?php echo $row['title']; ?></h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Job Openings</a></li>
                                            <li class="breadcrumb-item"><a href="at_view.php" class="breadcrumb-link">View All Jobs</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
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
                                <div class="card-body border-top">
                                    <h3 class="font-16">Information</h3>
                                    <?php

                  $teabag=$_GET['item'];
                  $sql=mysqli_query($conn,"SELECT * FROM job_opening where id=$teabag");
                  while($res=mysqli_fetch_array($sql))
                  {  
                  ?>
                  <h1 class="margin-bottom"><?php echo $res['company_name'];?></h1>
               
                  <!-- Pruducts -->
                  <div class="margin2x">
                     <div class="s-12 m-8 l-2 xl-7 xl-3">
                        
                        <div class="line hide-m">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                      
                    </div>
                  </div>

                      
                        <h4>Description:</h4>
                        <p class="margin-bottom"><?php echo $res['description']; ?></p>
                        <h4>Company Info:</h4>
                        <p class="margin-bottom"><?php echo "Company Name:". $res['company_name']; ?></p>
                        <p class="margin-bottom"><?php echo "Trade License Number:". $res['trade_license']; ?></p>
                        <p class="margin-bottom"><?php echo "Industry:". $res['industry']; ?></p>
                        <p class="margin-bottom"><?php echo "Company Size:". $res['industry']; ?></p>
                        <p class="margin-bottom"><?php echo "Contact Person:". $res['contact_name']; ?></p>
                        <p class="margin-bottom"><?php echo "Contact Number:". $res['contact_number']; ?></p>
                        <p class="margin-bottom"><?php echo "Email:". $res['email_address']; ?></p>
                        <p class="margin-bottom"><?php echo "Location:". $res['location']; ?></p> 
                         <?php 
                        
                     
                    ?>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 col-s-2 col-xl-2">
                                    <?php
                                    if($res['status']==0)
                                    {
                                        echo '<a href="job_app.php?id='.$res['id'].'"><button class="btn btn-primary"><i class="fa fa-check"></i> Approve</button></a>';
                                    }
                                    else
                                    {
                                        echo '<a href="job_app.php?id='.$res['id'].'"><button disabled class="btn btn-disabled"><i class="fa fa-check"></i> Approve</button></a>';
                                    }
                                    ?>
                                    </div>
                               <div class="col-md-2 col-lg-2 col-s-2 col-xl-2">
                                    <a href="job_dis.php?id=<?php echo $res['id'];} ?>"><button class="btn btn-secondary"><i class="fa fa-check"></i> Decline</button></a>
                                </div>
                            </div>
                        </div>
                                    
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