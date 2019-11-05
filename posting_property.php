<?php
$page = $_GET['page'];
if ($page == 0) {
    $color = '#5CB85C';
    $title = 'Boarding House';
} else {
    $color = '#4FBFA8';
    $title = 'Apartment';
}
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        .thumb{
            margin: 10px 5px 0 0;
            width: 115px;
            height: 115px;
        }
    </style>
    <head>
        <title>Stop N Stay - Posting</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/inputfile.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mapModal.css">
        <link rel="stylesheet" href="css/roomTypeModal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
    </head>
    <body>
        <?php
        require 'view/mapModal.php';
        require 'view/addRoomType.php';
        ?>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="includes/post_property.php" enctype="multipart/form-data">
                        <span class="login100-form-title" style=" padding-top: 20px; padding-bottom:20px; background-color: <?= $color; ?>">
                            <?= $title; ?>
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter title">
                            <input class="input100" type="hidden" name="page" value="<?= $page; ?>">
                            <input class="input100" type="text" name="title" placeholder="Title">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="file" name="image[]" id="image" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                            <label for="image">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Add Photos</span></label>
                            <div id="image-holder"></div>
                            <script>
                                $("#image").on('change', function () {

                                    //Get count of selected files
                                    var countFiles = $(this)[0].files.length;

                                    var imgPath = $(this)[0].value;
                                    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
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
                                                    //     $("<img  />", {
                                                    //         "src": e.target.result,
                                                    //             "class": "img-thumbnail"

                                                    //     }).appendTo(image_holder);

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
                        <script src="js/custom-file-input.js"></script>
                        <br>
                        <div class="wrap-input100 validate-input" data-validate="Please enter contact #">
                            <input class="input100" type="number" name="contact_num" placeholder="Contact Number (Format: 639*********)">
                            <span class="focus-input100"></span>
                        </div>
                        <br>
                        <input class="input100" type="hidden" name="details" id="details">
                        <?php
                            if ($page == 0) {
                        ?>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn roomTypeModalShow" style="width: 400px; background-color: <?= $color; ?>">
                                Add Room Type
                            </button>
                        </div>
                        <br><br><br>
                        <div class ="box">
                            <select id="roomDetails" name="roomDetails">
                                <option value="" disabled selected style="display: none">Room Details</option>
                            </select>
                        </div>
                        <br><br><br>
                        <?php } ?>
                        <?php
                            if ($page == 1) {
                        ?>
                        <div class="wrap-input100 validate-input" data-validate="Please enter price">
                            <input class="input100" type="number" name="price" placeholder="Monthly Price">
                            <span class="focus-input100"></span>
                        </div>
                        <br>
                        <?php } ?>
                        <textarea class="form-control" cols="4" row="5" placeholder="Description" id="description" name="description" style="height: 100px;"></textarea>
                        <br>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter size">
                            <input class="input100" type="text" name="size" placeholder="Size">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Advance Payment">
                            <input class="input100" type="number" name="tcf" placeholder="Advance Payment">
                            <span class="focus-input100"></span>
                        </div>
                        <br>
                        <br>
                        <div class ="box">
                            <select name="bed">
                                <option value="" disabled selected style="display: none">Bedrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12+">12+</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class ="box">
                            <select name="bath">
                                <option value="" disabled selected style="display: none">Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12+">12+</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="wrap-input100 validate-input m-b-16">
                            <input id="ready" name="ready" type="text" placeholder="Ready By" class="input100" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
                            <span class="focus-input100"></span>
                        </div>
<input type="hidden" name="coord" id="coord" value="">
                        <div class="wrap-input100 validate-input mapModalShow" data-validate="Please enter property location">
                            
                            <input id="locator" class="input100 mapModalShow" type="text" name="location" placeholder="Locate your property">
                            <span class="focus-input100 mapModalShow"></span>
                        </div>
                        <br>
                        <center>
                            <div class ="form-control" style="height: 125vh;">
                                <input type="checkbox" name="extras[]" value="Balcony">Balcony<br><br>
                                <input type="checkbox" name="extras[]"  value="Built n Kitchen Appliances">Built n Kitchen Appliances<br><br>
                                <input type="checkbox" name="extras[]"  value="Built in Wardrobes">Built in Wardrobes<br><br>
                                <input type="checkbox" name="extras[]"  value="Covered Parking">Covered Parking<br><br>
                                <input type="checkbox" name="extras[]"  value="Maid Service">Maid Service<br><br>
                                <input type="checkbox" name="extras[]"  value="Maids Room">Maids Room<br><br>
                                <input type="checkbox" name="extras[]"  value="Pets Allowed">Pets Allowed<br><br>
                                <input type="checkbox" name="extras[]"  value="Private Garden">Private Garden<br><br>
                                <input type="checkbox" name="extras[]"  value="Private Gym">Private Gym<br><br>
                                <input type="checkbox" name="extras[]"  value="Private Pool">Private Pool<br><br>
                                <input type="checkbox" name="extras[]"  value="Security">Security<br><br>
                                <input type="checkbox" name="extras[]"  value="Study">Study<br><br>
                                <input type="checkbox" name="extras[]"  value="View of Landmark">View of Landmark<br><br>
                                <input type="checkbox" name="extras[]"  value="Walk-in Closet">Walk-in Closet<br><br>
                                <input type="checkbox" name="extras[]"  value="CCTV">CCTV<br><br>
                                <input type="checkbox" name="extras[]"  value="Wifi">Wifi<br><br>
                                <input type="checkbox" name="extras[]"  value="Fire Extinguisher">Fire Extinguisher<br><br>

                            </div>
                        </center>
                        <br>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="btn_sub"  style="width: 400px; background-color: <?= $color; ?>">
                                Submit
                            </button>
                        </div>

                        <div class="text-right p-t-13 p-b-23">

                        </div>

                        <div class="flex-col-c p-t-10 p-b-40">

                        </div>
                    </form>
                </div>
            </div>
        </div>

      
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
        <script>
            </

    </body></html>