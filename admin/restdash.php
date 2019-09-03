<!doctype html>
<?php
session_start();
include_once("../includes/db2.php");
$sql1="SELECT * FROM tbl_touristspot where attraction_name='".$_SESSION['name']."'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
$item=$row1['id'];
if(isset($item))
{
$sql="SELECT * from tbl_touristspot where id='".$item."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
}
else
header("location:tspot_view.php");

?>
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
    <title>Lakbay Bikol | <?php echo $row['attraction_name']; ?></title>
    <style>
        input[type="file"] {
        display: block;
        }
        .imageThumb {
        max-height: 75px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
        }
        .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        }
        .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
        }
        .remove:hover {
        background: white;
        color: black;
        }

    </style>
</head>
<?php

include_once("header2.php");
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
                                <h3 class="mb-2">Related Establishment </h3>
                                <p class="pageheader-text">Input related establishment complete details</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Related Establishment</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Input</li>
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
                        <div class="col-xl-12 col-lg-12 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                           <form method="post" action="related_script_update2.php" enctype="multipart/form-data">
                            <div class="card">
                                    <h5 class="card-header">Related Establishment Details</h5>
                                    <div class="card-body">
                                       <div class="row">
                                        <div class="col-6">
                                           <div class="form-group">
                                                <label for="tspot_name" class="col-form-label">Establishment Name</label>
                                                <input id="tspot_name" required name="establish_name" value="<?php echo $row['attraction_name'];?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                           <div class="form-group">
                                                <label for="tspot_name" class="col-form-label">Establishment Type</label>
                                                <br>
                                                <select class="selectpicker" disabled style="line-height:1;" name="establish_type">

                                                    <option value="1">Hotel</option>
                                                    <option value="2">Restaurant </option>
                                                    <option value="3">Establishment</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_time" class="col-form-label">Establishment Category</label>
                                                    <input id="tspot_time" value="<?php echo $row['Related_Establistment_Category']; ?>"required name="establish_category" type="text" class="form-control">
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_contact" class="col-form-label">Establishment Contact Number</label>
                                                    <input id="tspot_contact" value="<?php echo $row['attraction_contact_in_charge']; ?>"required name="establish_number" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_fee" class="col-form-label">Establishment Classification</label>
                                                    <input id="tspot_fee" value="<?php echo $row['Related_Establistment_Classification']; ?>"required name="establish_classification" type="text" class="form-control">
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_delis" class="col-form-label">Establishment Municipality</b></label>
                                                    <input id="tspot_delis" value="<?php echo $row['Related_Establistment_Municipality']; ?>"required name="establish_municipality" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="estab_man" class="col-form-label">Establishment Manager</label>
                                                    <input id="estab_man" value="<?php echo $row['Related_Establistment_Manager']; ?>"required name="establish_manager" type="text" class="form-control">
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="estab_email" class="col-form-label">Establishment Email</b></label>
                                                    <input id="estab_email" value="<?php echo $row['Related_Establistment_Address']; ?>"required name="establish_email" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="estab_man" class="col-form-label">Establishment Average Price Rate</label>
                                                    <input id="estab_man" value="<?php echo $row['attraction_fee']; ?>"required name="establish_rate" type="text" class="form-control">
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="estab_email" class="col-form-label">Establishment Number of Menu Category </b></label>
                                                    <input id="estab_email" value="<?php echo $row['Related_Establistment_NumberofRoom']; ?>"required name="establish_rooms" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div> 

                           <div class="card">
                                    <input type="text" hidden name="item" value="<?php echo $item;?>">
                                    <h5 class="card-header">Location Details</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="input-select">Province</label>
                                                    <br>
                                                    <select class="selectpicker1" name="establish_prov" id="input-select">
                                                        <option value="1">Albay</option>
                                                        <option value="5">Masbate</option>
                                                        <option value="6">Sorsogon</option>
                                                        <option value="4">Catanduanes</option>
                                                        <option value="3">Camarines Sur</option>
                                                        <option value="2">Camarines Norte</option>
                                                    </select>
                                                </div> 
                                            </div>

                                            <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                <label for="estab_add" class="col-form-label">Establishment Address</label>
                                                <input id="estab_add" value="<?php echo $row['Related_Establistment_Address']; ?>"required name="establish_address" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <label for="tspot_lat">Map Location</label>
                                                <input type="text" name="tspot_lat" id="tspot_lat" hidden>
                                                <input type="text" name="tspot_long" id="tspot_long" hidden>
                                                <div id="map_1" class="gmaps"></div>
                                                <script>
                                                function myMap() {
                                                    var marker;
                                                var mapProp= {
                                                    center:new google.maps.LatLng(13.432367,123.409424),
                                                    zoom:7,
                                                };
                                                var map=new google.maps.Map(document.getElementById("map_1"),mapProp);
                                                map.addListener('click', function(e) {
                                                placeMarker(e.latLng, map);
                                                });

                                                function placeMarker(position, map) {
                                                    if ( marker ) 
                                                        {
                                                        marker.setPosition(position);
                                                        } 
                                                    else 
                                                        {
                                                        marker = new google.maps.Marker({
                                                        position: position,
                                                        map: map
                                                        });
                                                        map.panTo(position);
                                                        }
                                                };
                                            
                                                google.maps.event.addListener(map, 'click', function(event) {
                                                // alert(event.latLng.lat() + ", " + event.latLng.lng());
                                                document.getElementById('tspot_lat').value=event.latLng.lat();
                                                document.getElementById('tspot_long').value=event.latLng.lng();
                                                });

                                                }
                                                </script>
                                        </div>
                                    </div>

                                  
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                         <div class="col-12">
                                        <h4>Upload Image/ Event Banner</h2>
                                        <input type="file" id="imgup" name="imgup[]" accept="image/*" multiple />
                                        </div>
                                        <p class="text-right">
                                        <button type="submit" value="submit" name="submit"class="btn btn-space btn-primary">Submit</button>
                                        <button class="btn btn-space btn-secondary">Cancel</button>
                                        </p>
                                        <br>
                                     </div>
                            </div> 
                            
                            </form> <!-- =============  FORM END   ============= -->    
                    </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            <!-- ============================================================== -->
        </form>
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
    <script src="assets/vendor/bootstrap-select/js/bootstrap-select.js"</script>
    <script src="../assets/libs/js/gmaps.min.js"></script>
    <script src="../assets/libs/js/google_map.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyC5TaSNk0MhM7hdBCVi6I_MvzsXR8ozOi0&callback=myMap"></script>
   <script>
   <?php
   echo "var hotval=".$row['attraction_type'].";\n";
   echo "var hotprov=".$row['province_id'].";\n";
   ?>
   $('.selectpicker').selectpicker('val',hotval);
   $('.selectpickerf').selectpicker('refresh');
   $('.selectpicker1').selectpicker('val',hotprov);
   $('.selectpicker1').selectpicker('refresh');
   </script>f


   <!-- UPLOAD SCRIPT -->
   <script>
   $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#imgup").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#imgup");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
   </script>
</body>
 
</html>

