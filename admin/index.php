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
    <title>Stop N Stay | Admin</title>
    <style>
        .imageThumb2 {
            max-height: 75px;
            max-width: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
    </style>
</head>
<?php 
include_once( "header.php");
 include_once( "../includes/db.php"); session_start(); // if(isset()) ?>
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
                        <h3 class="mb-2">Stop N Stay </h3>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="breadcrumb-link">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
            <!-- ============================================================== -->
            <!-- end profile -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- campaign data -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-7 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- campaign tab one -->
                <!-- ============================================================== -->
                <div class="influence-profile-content pills-regular">
                    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#apartment" role="tab" aria-controls="pills-packages" aria-selected="false">Apartment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#bhouse" role="tab" aria-controls="pills-review" aria-selected="false">Boarding House</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!-- =======================   TPOST PILL  ================================= -->
                        <!-- =======================   EVENT PILL  ================================= -->
                        <div class="tab-pane fade show " id="apartment" role="tabpanel" aria-labelledby="pills-campaign-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="section-block">
                                        <h3 class="section-title">Apartment</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">
                                                             <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where property_type=1";
                                                            $res=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h1>
                                            <p>Total Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="mb-1">
                                                                    <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where status=1 and property_type=1";
                                                            $res=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h2>
                                            <p>Approved Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">
                                                                    <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where status=0 and property_type=1";
                                                            $res=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h1>
                                            <p>Pending Posts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show " id="bhouse" role="tabpanel" aria-labelledby="pills-campaign-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="section-block">
                                        <h3 class="section-title">Boarding House</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">
                                                             <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where property_type=0";
                                                            $res=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h1>
                                            <p>Total Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="mb-1">
                                                                    <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where status=1 and property_type=0";
                                                            $res=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h2>
                                            <p>Approved Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">
                                                                    <?php
                                                            $sql="SELECT COUNT(ID)as num from tbl_property where status=0 and property_type=0";
                                                            $res=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                            echo $res['num'];
                                                            ?>
                                                                </h1>
                                            <p>Pending Posts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        </body>

</html>