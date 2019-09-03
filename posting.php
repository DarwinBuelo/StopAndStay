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
	<title>Website Name - Posting</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="includes/posting_auto.php" enctype="multipart/form-data">
					<span class="login100-form-title" style=" padding-top: 20px; padding-bottom:20px;">
						Billboard Nation
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter car model">
						<input class="input100" type="text" name="model" placeholder="What is the model of your car?">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
					<input type="file" name="image[]" id="image" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
					<label for="image">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Add Photos</span></label>
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
				<!--<div class="container-login100-form-btn">
					<input type="file" name="image" id="image"/>
				</div>
				<script>$(document).ready.(function)
				{
					$('#insert').click(function(){
						var image_name = $('#image').val();
						if(image_name == '')
						{
							alert("Okease select img");
							return false;
						}
						else{
							var extension = $('#image').val().split('.').pop().toLowerCase();
							if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
							{
								alert('invalid image file');
								$('#image').val('');
								return false;
							}
						}
					})
				}
				</script>-->
					<br>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter title">
						<input class="input100" type="text" name="title" placeholder="Title">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Please enter contact #">
						<input class="input100" type="text" name="contact_num" placeholder="Phone Number">
						<span class="focus-input100"></span>
					</div>
					<br>

					<div class="wrap-input100 validate-input" data-validate="Please enter car price">
						<input class="input100" type="text" name="price" placeholder="Price">
						<span class="focus-input100"></span>
					</div>

					<br>
					<textarea class="form-control" cols="4" row="5" placeholder="Describe your Used Car for Sale" id="description" name="desc" style="height: 100px;"></textarea>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Please enter kilometers">
						<input class="input100" type="text" name="kms" placeholder="Kilometers">
						<span class="focus-input100"></span>
					</div>
					<br>
					<br>
					<br>
						<div class ="box">
						<select name="body_con">
							 <option value="" disabled selected style="display: none">Body Condition</option>
						  <option value="Perfect Inside and Out">Perfect Inside and Out</option>
						  <option value="No Accidents, Very Few Faults">No Accidents, Very Few Faults</option>
						  <option value="A bit of wear and tear, all repaired">A bit of wear and tear, all repaired</option>
						   <option value="Normal wear and tear, a few issues">Normal wear and tear, a few issues</option>
						    <option value="Lots of wear and tear to the body">Lots of wear and tear to the body</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
						<div class ="box">
						<select name="mech_con">
							 <option value=""disabled selected style="display: none">Mechanical Condition</option>
						  <option value="Perfect Inside and Out">Perfect Condition</option>
						  <option value="Minor Faults, all fixed">Minor Faults, all fixed</option>
						  <option value="Major Faults, all fixed">Major Faults, all fixed</option>
						   <option value="Major Faults Fixed, small remain">Major Faults Fixed, few remain</option>
						    <option value="Ongoing minor and major faults">Ongoing minor and major faults</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="yr">
							 <option value=""disabled selected style="display: none">Year</option>
							 <?php   $datevalue=''.date("Y");
							 $temp =0;
							 for($x=0; $x<100; $x++)
							 { $temp = $datevalue -1;
							 	?>
							 	<!--  Di Ko Sure Kung Tama tong paglagay ko ng value sa date  -->
						  <option value="<?php echo ''.$temp ?>"><?php 
						  		if($x<1)
						  		{
									echo date("Y");
									 $datevalue=''.date("Y");
						  		}
						  		else
						  		{
						  			echo date("Y", strtotime('-'.$x.' year'));
						  			 $datevalue=''.date("Y", strtotime('-'.$x.' year'));
						 		 }
						  	?></option>
						  	<?php } ?>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="body_T">
							<option value="" disabled selected style="display: none">Body Type</option>
							<option value="Coupe">Coupe</option>
							<option value="Crossover">Crossover</option>
							<option value="Hard Top Convertible">Hard Top Convertible</option>
							<option value="Hatchback">Hatchback</option>
							<option value="Pick Up Truck">Pick Up Truck</option>
							<option value="Sedan">Sedan</option>
							<option value="Soft Top Convertible">Soft Top Convertible</option>
							<option value="Sports Car">Sports Car</option>
							<option value="SUV">AUV</option>
							<option value="SUV">XUV</option>
							<option value="SUV">SUV</option>
							<option value="Utility Truck">Utility Truck</option>
							<option value="Van">Van</option>
							<option value="Wagon">Wagon</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Please enter car color">
						<input class="input100" type="text" name="color" placeholder="Color">
						<span class="focus-input100"></span>
					</div>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="tran_T">
							 <option value=""disabled selected style="display: none">Transmission Type</option>
						  <option value="Automatic Transmission">Automatic Transmission</option>
						  <option value="Manual Transmission">Manual Transmission</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
						<div class ="box">
						<select name="reg_spec">
							 <option value=""disabled selected style="display: none">Regional Specs</option>
						  <option value="European Specs">European Specs</option>
						  <option value="GCC Specs">GCC Specs</option>
						   <option value="Japanese Specs">Japanese Specs</option>
						  <option value="North American Specs">North American Specs</option>
						  <option value="Other">Other</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="no_cyl">
							 <option value=""disabled selected style="display: none">No. of Cylinders</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						   <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="8">8</option>
						   <option value="10">10</option>
						  <option value="12">12</option>
						  <option value="Unknown">Unknown</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="doors">
							 <option value=""disabled selected style="display: none">Doors</option>
						  <option value="2 Doors">2 Doors</option>
						  <option value="3 Doors">3 Doors</option>
						   <option value="4 Doors">4 Doors</option>
						  <option value="5+ Doors">5+ Doors</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="hp">
							 <option value=""disabled selected style="display: none">Horse Power</option>
						  <option value="Less than 150 HP">Less than 150 HP</option>
						  <option value="150 - 200 HP">150 - 200 HP</option>
						   <option value="200 - 300 HP">200 - 300 HP</option>
						  <option value="300 - 400 HP">300 - 400 HP</option>
						  <option value="400 - 500 HP">400 - 500 HP</option>
						   <option value="500 - 600 HP">500 - 600 HP</option>
						  <option value="600 - 700 HP">600 - 700 HP</option>
						  <option value="700 - 800 HP">700 - 800 HP</option>
						   <option value="800 - 900 HP">800 - 900 HP</option>
						  <option value="900+ HP">900+ HP</option>
						  <option value="Unknown">Unknown</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="warranty">
							 <option value=""disabled selected style="display: none">Warranty</option>
						  <option value="Yes">Yes</option>
						  <option value="No">No</option>
						   <option value="Does not apply">Does not apply</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="fuel_T">
							 <option value=""disabled selected style="display: none">Fuel Type</option>
						  <option value="Gasoline">Gasoline</option>
						  <option value="Diesel">Diesel</option>
						   <option value="Hybrid">Hybrid</option>
						    <option value="Electric">Electric</option>
						</select>
						
					</div>
					<br>
					<br>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Please enter car location">
						<input class="input100" type="text" name="location" placeholder="Locate Your Car">
						<span class="focus-input100"></span>
					</div>
					<br>
					<br>
					<center>
						<div class ="form-control" style="height: 450px;">
						<input type="checkbox" name="extras[]" value="Climate Control">Climate Control<br><br>
						<input type="checkbox" name="extras[]"  value="DVD Player">DVD Player<br><br>
						<input type="checkbox" name="extras[]"  value="Leather Seats">Leather Seats<br><br>
						<input type="checkbox" name="extras[]" value="Parking Sensors">Parking Sensors<br><br>
						<input type="checkbox" name="extras[]"  value="Rear View Camera">Rear View Camera<br><br>
						<input type="checkbox" name="extras[]"  value="Power Stearing">Power Stearing<br><br>
						<input type="checkbox" name="extras[]"  value="Cooled Seats">Cooled Seats<br><br>
						<input type="checkbox" name="extras[]" value="Keyless Entry">Keyless Entry<br><br>
						<input type="checkbox" name="extras[]"  value="Navigation System">Navigation System<br><br>
						<input type="checkbox" name="extras[]"  value="Premium Sound System">Premium Sound System<br><br>
						<input type="checkbox" name="extras[]"  value="Front Wheel Drive">Front Wheel Drive<br><br>
				</div>
				</center>
					<br>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_sub"  style="width: 400px;">
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


</body></html>