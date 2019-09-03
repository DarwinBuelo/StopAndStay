<!doctype html>
<?php
include_once("../includes/db2.php");
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
    <title>Lakbay Bikol | Admin</title>
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

          .imageThumb2 {
        max-height: 75px;
        max-width: 75px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
        }
        .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        }
        .remove {
        display: inherit;
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

include_once("header.php");
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
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <div class="page-header">
                                <h3 class="mb-2">Add a Tourist Spot </h3>
                                <p class="pageheader-text">Add a tourist spot with complete details</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tourist Spot</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                           <form method="POST" action="tspot_script_update.php" enctype="multipart/form-data">
                            <div class="col-xl-3 col-l-3 col-md-3 col-sm-3 col-sx-3">
                                <div class="card card-figure">
                                    <!-- .card-figure -->
                                    <figure class="figure">
                                        <!-- .figure-img -->
                                        <div class="figure-img">
                                            <img class="img-fluid" src="assets/images/card-img.jpg" alt="Card image cap">
                                            <div class="figure-tools">
                                                <a href="#" class="tile tile-circle tile-sm mr-auto">
                                                                <span class="oi-data-transfer-download"></span></a>
                                                <span class="badge badge-danger">Tourist Spot</span>
                                            </div>
                                            <div class="figure-action">
                                                <a href="#" class="btn btn-block btn-sm btn-primary">View</a>
                                            </div>
                                        </div>
                                        <!-- /.figure-img -->
                                        <!-- .figure-caption -->
                                        <figcaption class="figure-caption">
                                            <div class="rating-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                

                                            </div>
                                            <p class="text-muted mb-0"> 34 Total Reviews </p>
                                        </figcaption>
                                        <!-- /.figure-caption -->
                                    </figure>
                                    <!-- /.card-figure -->
                                </div>
                            </div>
                           <div class="card">
                                    <h5 class="card-header">Location Details</h5>
                                    <div class="card-body">
                                        
                                            <div class="form-group">
                                                <label for="input-select">Province</label>
                                                <select class="selectpicker2" name="tspot_prov" id="input-select">
                                                    <option value="1">Albay</option>
                                                    <option value="5">Masbate</option>
                                                    <option value="6">Sorsogon</option>
                                                    <option value="4">Catanduanes</option>
                                                    <option value="3">Camarines Sur</option>
                                                    <option value="2">Camarines Norte</option>
                                                </select>
                                            </div> 
                                            <label for="tspot_lat">Map Location</label>
                                                <input type="text" name="tspot_lat" id="tspot_lat" value="<?php echo $row['attraction_lat']; ?>"hidden>
                                                <input type="text" name="tspot_long" id="tspot_long" value="<?php echo $row['attraction_long']; ?>"hidden>
                                                <div id="map_1" class="gmaps"></div>
                                                <script>
                                                function myMap() {
                                                    var marker;
                                                    // var map=new google.maps.Map(document.getElementById("map_1"),mapProp);
                                                    var oglat =  document.getElementById('tspot_lat').value;
                                                    var oglong =  document.getElementById('tspot_long').value;
                                                    var myLatLng = new google.maps.LatLng(oglat,oglong);
                                                    console.log(myLatLng);
                                                    var mapProp= {
                                                        center:new google.maps.LatLng(oglat,oglong),
                                                        zoom:12,
                                                    };
                                                    var map=new google.maps.Map(document.getElementById("map_1"),mapProp);
                                                        marker = new google.maps.Marker({
                                                        position: myLatLng,
                                                        title:"Current Location"
                                                    });
                                                        marker.setMap(map);
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
                                <div class="card">
                                <div class="card-body">
                                    
                                    <div class="col-12">
                                        <h4>Upload Image/ Event Banner</h2>
                                        <input type="file" id="imgup" name="imgup[]" accept="image/*" multiple />
                                        <?php
                                        $items=[];
                                        $imgsql="SELECT * FROM tbl_touristspot_images where attraction_id='".$_GET['item']."'";
                                        $resimg=mysqli_query($conn,$imgsql);
                                        $counter=0;
                                        while($imgrow=mysqli_fetch_array($resimg))
                                        {
                                            echo '<span class="pip">';
                                            echo    '<img class="imageThumb" src="../../lakbaybikol-api/images/';
                                            echo $imgrow['attraction_image'];
                                            echo '"title="'.$imgrow['attraction_image'].'"/>';
                                            echo    '<br/><span data-id="';
                                            echo $counter.'"data-imgname="';
                                            echo $imgrow['attraction_image'].'" data-imgid="'.$imgrow['id'].'"'; 
                                            echo 'id="remove'.$counter.'" onClick="removethis('.$counter.')"class="remove"> Remove image</span>';
                                            echo   '</span>';
                                            $counter+=1;
                                        }
                                       
                                       

                                        ?>
                                    </div>
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
    <script src="assets/libs/js/gmaps.min.js"></script>
    <script src="assets/libs/js/google_map.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyC5TaSNk0MhM7hdBCVi6I_MvzsXR8ozOi0&callback=myMap"></script>
   <script>
   $('.selectpicker1').selectpicker();
   <?php
    $wew = $row['attraction_category'];
    echo "var at_cat = '". $wew . "';\n";
    ?>
   $('.selectpicker1').selectpicker('val',at_cat);
   $('.selectpicker1').selectpicker('refresh');
   </script>
   <script>
   $('.selectpicker2').selectpicker();
   <?php
    $wew = $row['province_id'];
    echo "var prov = ". $wew . ";\n";
    ?>
   $('.selectpicker2').selectpicker('val',prov);
   $('.selectpicker2').selectpicker('refresh');
   </script>

   <script type='text/javascript'>
    <?php
    $wew = $row['attraction_activities'];
    $php_array = explode(", ",$wew);
    $js_array = json_encode($php_array);
    echo "var javascript_array = ". $js_array . ";\n";
    ?>

   $('.selectpicker').selectpicker('val',javascript_array);
   $('.selectpicker').selectpicker('refresh');
    </script>

    <script type="text/javascript">


    function removethis(count)
    {
        var x = document.getElementById('remove'+count);
        imgname = x.dataset.imgname;
        imgid = x.dataset.imgid;
        $.ajax({
            type:'POST',
            url:'delimg.php',
            data:{'imgid':imgid,'imgname':imgname},
            success: function(data){
                if(data)
                {
                    $('#remove'+count).parent(".pip").remove();
                }
                else
                {
                    alert("ngek");
                }    
            }

             })
    }
    </script>
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

