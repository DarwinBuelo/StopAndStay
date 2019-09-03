<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Ads</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/inputfile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<?php 
include_once("header.php");
include_once("../includes/db.php");

if(isset($_GET['searchit']))
{
     if($_GET['searchit']=="")
          header("location:ads_view.php");
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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Ads</a></li>
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
                                if(isset($_GET['success']) && $_GET['success']==1)
                                {
                                    echo '<div class="alert alert-success" role="alert">Successfully Approved Post</div>';
                                }
                                elseif(isset($_GET['success']) && $_GET['success']==2)
                                {
                                    echo '<div class="alert alert-success" role="alert">Successfully Stopped Displaying Post</div>';
                                }
                                ?>
                                <h3 class="mb-0">My Ads
                                <span class='float-right'>
                                    <!-- ==== INSERT ADS ============ -->
                                    <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET"> -->
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button type="submit" data-toggle="modal" data-target="#insertAdsModal" class="btn btn-primary">Insert Ads</button>
                                                </div>
                                            </div>
                                             <!-- Modal -->
    <form method="post" action="insertAds.php">
        <div class="modal fade" id="insertAdsModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i>     Insert My Ads</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" required />
                </div>
                <div class="form-group">
					<label>Location</label>
					<div>
						<select name='location' id='location' class="form-control" required>
						<option value = '0'>Left</option>
						<option value = '1'>Right</option>
						<option value = '2'>Header</option>
						</select>
					</div>
                </div>
                <div class="form-group">
					<input type="file" name="image[]" id="image" data-multiple-caption="{count} files selected" multiple />
                <div id="image-holder"></div>
                <script>
					$("#image").on('change', function () {
					     //Get count of selected files
					     var countFiles = $(this)[0].files.length;
					     var imgPath = $(this)[0].value;
					     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                         console.log(extn);
					     var image_holder = $("#image-holder");
					     image_holder.empty();
					     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
					         if (typeof (FileReader) != "undefined") {

					             //loop for each file selected for uploaded.
					             for (var i = 0; i < countFiles; i++) {

					                 var reader = new FileReader();
					                 reader.onload = function (e) {
					                     var img = $('<img/>').addClass('thumb').attr
					                     ('src', e.target.result); //create image element 
									$(image_holder).append(img); 
					                 }

					                 image_holder.show();
					                 reader.readAsDataURL($(this)[0].files[i]); 
					             	console.log("wew");
					             }

					         } else {
					             alert("This browser does not support FileReader.");
					         }
					     } else {
					         alert("Pls select only images");
					     }
					 });
					</script>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="save" id="save" class="btn btn-info" value="Save"/>
            </div>
                </div>
            </div>
        </div>
    </form>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tspots_all" class="table table-striped table-bordered table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include('ads_pagination.php');
                                            $adsLocation = [
                                                0 => 'Left',
                                                1 => 'Right',
                                                2 => 'Header'
                                            ];
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo "<tr><td>".$row['ad_title']."</td>";
                                                echo "<td id='appadd'>".$row['ad_date']."</td>";
                                                echo "<td>".$adsLocation[$row['ads_location']]."</td>";
                                                
                                                if($row['ad_stat']==1)
                                                {
                                                    echo "<td id='appadd'style='color:#048e09'>";
                                                    echo "Approved</td>";
                                                }
                                                else
                                                {
                                                    echo "<td id='appadd'style='color:#d00c0c'>";
                                                    echo "Not Approved</td>";
                                                }
                                                echo "<td id='appadd'><a title='Approve' href='ad_app.php?item=";
                                                echo $row['id']."'><i class='fas fa-check'>&nbsp;&nbsp;</i></a>";
                                                echo "<a title='Stop Displaying' href='ad_dis.php?item=";
                                                echo $row['id']."'><i class='fas fa-exclamation-triangle'></i></a>";
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
                                            echo '<a style="color:#007bff; font-size:15px;" href="ads_view.php?page=' . $page . '">' . $page . '</a> ';
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