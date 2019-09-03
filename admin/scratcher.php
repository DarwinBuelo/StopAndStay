<!doctype html>
<?php
include_once("../includes/db2.php");
if(isset($_GET['item']))
{
$sql="SELECT * from tbl_touristspot where id='".$_GET['item']."'";
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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

                            <div class="card">
                                    <h5 class="card-header">Tourist Spots Details</h5>
                                    <div class="card-body">
                                       <div class="form-group">
                                            <label for="tspot_name" class="col-form-label">Tourist Spot/Attraction Name</label>
                                            <input id="tspot_name" value="<?php echo $row['attraction_name']; ?>"required name="tspot_name" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_time" class="col-form-label">Operating Hours</label>
                                                    <input id="tspot_time" value="<?php echo $row['attraction_open_close_hour']; ?>" required name="tspot_time" type="text" class="form-control">
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_contact" class="col-form-label">Contact Number</label>
                                                    <input type="text" value="<?php echo $row['attraction_contact_in_charge']; ?>"class="form-control international-inputmask" id="international-mask" name="tspot_contact" im-insert="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_fee" class="col-form-label">Entrance Fee</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Php</span></div>
                                                        <input type="text" name="tspot_fee" "text" value="<?php echo $row['attraction_entrance_fee']; ?>" required id="tspot_fee" class="form-control">
                                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                                    <label for="tspot_delis" class="col-form-label">Local Delicacies Available <b>(Separate each with a comma ",")</b></label>
                                                    <input id="tspot_delis" "text" value="<?php echo $row['attraction_delicacies_cuisine_offered']; ?>" required name="tspot_delis" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                            <label for="acts">Activities Offered:</label>
                                            <input type="text" id="acts"hidden>
                                            <br>
                                            <select multiple="" class="selectpicker form-control" id="number-multiple" data-container="body" 
                                            data-live-search="true" title="Select Activities" data-hide-disabled="true" 
                                            data-actions-box="true" data-virtual-scroll="false" tabindex="-98" name="tspot_acts[]">
                                           <!-- <select id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="5"> -->
                                            <option value="Biking">Biking</option>
                                            <option value="Swimming">Swimming</option>
                                            <option value="Trekking">Trekking</option>
                                            <option value="Pilgrimage">Pilgrimage</option>
                                            <option value="Immersion Tours">Immersion Tours</option>
                                            <option value="Deer Interaction">Deer Interaction</option>
                                            <option value="Bird Watching">Bird Watching</option>
                                            <option value="Wakeboarding">Wakeboarding</option>
                                            <option value="Educational Tours">Educational Tours</option>
                                            <option value="Dine">Dine</option>
                                            <option value="Sight Seeing">Sight Seeing</option>
                                            <option value="Picture Taking">Picture Taking</option>
                                            <option value="Tunnel Exploration">Tunnel Exploration</option>
                                            <option value="Museum Tour">Museum Tour</option>
                                            <option value="Religious Activities">Religious Activities</option>
                                            <option value="Historical Significance">Historical Significance</option>
                                            <option value="Mass Service">Mass Service</option>
                                            <option value="Workshops">Workshops</option>
                                            <option value="Talk">Talk</option>
                                            <option value="House Visit">House Visit</option>
                                            <option value="Diving">Diving</option>
                                            <option value="Boat Tour">Boat Tour</option>
                                            <option value="Camping">Camping</option>
                                            <option value="Dolphin Watching">Dolphin Watching</option>
                                            <option value="Educational Tour">Educational Tour</option>
                                            <option value="Firefly Tour">Firefly Tour</option>
                                            <option value="Fishing">Fishing</option>
                                            <option value="Flying Fox Watching">Flying Fox Watching</option>
                                            <option value="Island Hopping">Island Hopping</option>
                                            <option value="Kayaking">Kayaking</option>
                                            <option value="Rock-climbing">Rock-climbing</option>
                                            <option value="Sea kayaking">Sea kayaking</option>
                                            <option value="Snorkeling">Snorkeling</option>
                                            <option value="Spelunking">Spelunking</option>
                                            <option value="Tabon Bird Watching and Feeding ">Tabon Bird Watching and Feeding </option>
                                            <option value="Zipline">Zipline</option>
                                            <option value="Jogging">Jogging</option>
                                            <option value="SCUBA Diving"> SCUBA Diving</option>
                                            <option value="Bird Watching"> Bird Watching</option>
                                            <option value="Museum Tour"> Museum Tour</option>
                                            <option value="Sightseeing"> Sightseeing</option>
                                            <option value="Picture Taking"> Picture Taking</option>
                                            <option value="Picnicking"> Picnicking</option>
                                            <option value="Shopping"> Shopping</option>
                                            <option value="Swimming"> Swimming</option>
                                            <option value="Camping"> Camping</option>
                                            <option value="Hiking"> Hiking</option>
                                            <option value="Excursions"> Excursions</option>
                                            <option value="Playing around the Park"> Playing around the Park</option>
                                            <option value="Way of the Cross"> Way of the Cross</option>
                                            <option value="Historical Significance"> Historical Significance</option>
                                            <option value="Worship"> Worship</option>
                                            <option value="Workshops"> Workshops</option>
                                            <option value="Attend Mass"> Attend Mass</option>
                                            <option value="Conventions"> Conventions</option>
                                            <option value="Pilgrimage"> Pilgrimage</option>
                                            <option value="Jogging"> Jogging</option>
                                            <option value="Devotion to Santo Entierro"> Devotion to Santo Entierro</option>
                                            <option value="Tours"> Tours</option>
                                            <option value="Balinsasayaw Watching"> Balinsasayaw Watching</option>
                                            <option value="Strolling"> Strolling</option>
                                            <option value="Snorkeling "> Snorkeling </option>
                                            <option value="Surfing"> Surfing</option>
                                            <option value="Island hopping"> Island hopping</option>
                                            <option value="Rock Climbing"> Rock Climbing</option>
                                            <option value="Snorkeling"> Snorkeling</option>
                                            <option value="Diving"> Diving</option>
                                            <option value="Boat Riding"> Boat Riding</option>
                                            <option value="Sea Turtle watching"> Sea Turtle watching</option>
                                            <option value="Surfboarding"> Surfboarding</option>
                                            <option value="Fishing"> Fishing</option>
                                            <option value="Trekking"> Trekking</option>
                                            <option value="Spelunking"> Spelunking</option>
                                            <option value="Canoeing"> Canoeing</option>
                                            <option value="ATV"> ATV</option>
                                            <option value="Strolling">Strolling</option>
                                            <option value="ATV & Off-Road Tours"> ATV & Off-Road Tours</option>
                                            <option value="Freshwater Fishing"> Freshwater Fishing</option>
                                            <option value="Swimmimg"> Swimmimg</option>
                                            <option value="Luge Ride"> Luge Ride</option>
                                            <option value="Educational Tours"> Educational Tours</option>
                                            <option value="River Rafting"> River Rafting</option>
                                            <option value="Religious Activities"> Religious Activities</option>
                                            <option value="Skate boarding"> Skate boarding</option>
                                            <option value="Seminars"> Seminars</option>
                                            <option value="SCUBA Diving Snorkeling"> SCUBA Diving Snorkeling</option>
                                            <option value="Spear fishing"> Spear fishing</option>
                                            <option value="Windsurfing"> Windsurfing</option>
                                            <option value="Jetski"> Jetski</option>
                                            <option value="Whaleshark Watching"> Whaleshark Watching</option>
                                            <option value="Mountaineering"> Mountaineering</option>
                                            <option value="Trail Hiking"> Trail Hiking</option>
                                            <option value="Rappelling"> Rappelling</option>
                                            <option value="Biking"> Biking</option>
                                            <option value="Field Trips"> Field Trips</option>
                                            <option value="Stargazing"> Stargazing</option>
                                            <option value="Rock-climbing"> Rock-climbing</option>
                                            <option value="Water Tubing"> Water Tubing</option>
                                            <option value="Sight Seeing"> Sight Seeing</option>
                                            <option value="Snorkeling Trekking"> Snorkeling Trekking</option>
                                          </select>

                                        </div>
                                        <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                                            <label for="cat">Attraction Category:</label>
                                            <input type="text" id="cat"hidden>
                                            <input type="text" hidden name="item" value='<?php echo $_GET['item']; ?>'>
                                            <br>
                                            <select class="selectpicker1" name="tspot_cat"  data-live-search="true">
                                                <option value="Nature Tourism">Nature Tourism</option>
                                                <option value="Sun and Beach Tourism">Sun and Beach Tourism</option>
                                                <option value="Cultural/Historical Tourism">Cultural/Historical Tourism</option>
                                                <option value="Leisure and Entertainment Tourism">Leisure and Entertainment Tourism</option>
                                            </select>
                                        </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                                <label for="tspot_desc">Attraction Description</label>
                                                <textarea class="form-control" name="tspot_desc" "text" value="" id="tspot_desc" rows="3"><?php echo $row['attraction_desc']; ?></textarea>
                                            </div>
                                        </div>
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

