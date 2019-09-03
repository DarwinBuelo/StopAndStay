<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Automotives </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>
<?php 
include_once("header.php");
include_once("../includes/db.php");

if(isset($_GET['searchit']))
{
     if($_GET['searchit']=="")
          header("location:prop_view.php");
}
?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">View All Posts</h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Automotives</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View All</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table multiselects  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                if(isset($_GET['success']))
                                {
                                    echo '<div class="alert alert-success" role="alert">Successfully Approved Post</div>';
                                }
                                ?>
                                <h3 class="mb-0">Automotive Posts
                                <span class='float-right'>
                                    <!-- ==== SEARCH HERE ============ -->
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                                        <div class="input-group">
                                                <input type="text" name="searchit" placeholder="Search" class="form-control form-control-sm">
                                                <div class="input-group-append">
                                                    <button type="submit" value="Submit"class="btn btn-primary">Go!</button>
                                                    <?php
                                                        if(isset($_GET['searchit']))
                                                        {
                                                            echo "<a href='post_view.php'><button type='submit' class='btn btn-secondary'>Clear</button></a>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                    </form>
                                </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tspots_all" class="table table-striped table-bordered table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>User</th>
                                                <th>Year</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include('prop_pagination.php');
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo "<tr><td>".$row['title']."</td>";
                                                echo "<td id='appadd'>".$row['description']."</td>";
                                                echo "<td id='appadd'>USER POSTER</td>";
                                                // echo "<td id='appadd'>".$row['poster']."</td>";
                                                echo "<td id='appadd'>".$row['location']."</td>";
                                                
                                                if($row['stat']==1)
                                                {
                                                    echo "<td id='appadd'style='color:#048e09'>";
                                                    echo "Approved</td>";
                                                }
                                                else
                                                {
                                                    echo "<td id='appadd'style='color:#d00c0c'>";
                                                    echo "Not Approved</td>";
                                                }
                                                echo "<td id='appadd'><a title='Approve' href='prop_app.php?item=";
                                                echo $row['ID']."'><i class='fas fa-check'>&nbsp;&nbsp;</i></a>";
                                                echo "<a href='prop_view_item.php?item=";
                                                echo $row['ID']."'><i class='fas fa-eye'></i></a>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                           <!-- =====================PRINT VIA PHP============= -->
                                    </table>
                                    
                                     <?php
                                        if(isset($number_of_pages))
                                        {    
                                        for ($page=1;$page<=$number_of_pages;$page++) {
                                            echo '<a style="color:#007bff; font-size:15px;" href="prop_view.php?page=' . $page . '">' . $page . '</a> ';
                                        }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table multiselects  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>