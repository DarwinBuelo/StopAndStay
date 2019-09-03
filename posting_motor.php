<!DOCTYPE html>
<html lang="en">
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
				<form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="includes/post_motors.php" enctype="multipart/form-data">
					<span class="login100-form-title" style=" padding-top: 20px; padding-bottom:20px; background-color:#4267B2;">
						Billboard Republic
					</span>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter title">
						<input class="input100" type="text" name="title" placeholder="Title">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
					<input type="file" name="image[]" id="image" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
					<label for="image">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Add Photos</span></label>
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
					<div class="wrap-input100 validate-input" data-validate="Please enter contact #">
						<input class="input100" type="text" name="contact_num" placeholder="Phone Number">
						<span class="focus-input100"></span>
					</div>
					<br>

					<div class="wrap-input100 validate-input" data-validate="Please enter price">
						<input class="input100" type="text" name="price" placeholder="Price">
						<span class="focus-input100"></span>
					</div>

					<br>
					<textarea class="form-control" cols="4" row="5" placeholder="Describe your Bike" id="description" name="desc" style="height: 100px;"></textarea>
					<br>
					<br>
					<br>
						<div class ="box">
						<select name="cat">
							 <option value="" disabled selected style="display: none">Category</option>
						  <option value="Cruiser / Chopper">Cruiser / Chopper</option>
						  <option value="Sport Bike">Sport Bike</option>
						  <option value="Off Road">Off Road</option>
						   <option value="Standard  / Commuter">Standard  / Commuter</option>
						    <option value="Scooter">Scooter</option>
						     <option value="Trike">Trike</option>
						    <option value="Cafe racer">Cafe racer</option>
						    <option value="Other">Other</option>
						</select>
						</div>
						<br>
						<br>
						<br>
						<br>
						<div class ="box">
						<select name="usge">
							 <option value="" disabled selected style="display: none">Usage</option>
						  <option value="Still with the dealer">Still with the dealer</option>
						  <option value="Only used once since it was purchased new">Only used once since it was purchased new</option>
						  <option value="Used very rarely since it was purchased">Used very rarely since it was purchased</option>
						   <option value="Used once or twice a week since purchased">Used once or twice a week since purchased</option>
						    <option value="Used as primary mode of transportation">Used as primary mode of transportation</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Please enter kilometers">
						<input class="input100" type="text" name="kms" placeholder="Kilometers">
						<span class="focus-input100"></span>
					</div>
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
						<select name="seller_T">
							 <option value="" disabled selected style="display: none">Seller Type</option>
						  <option value="Owner">Owner</option>
						   <option value="Dealer">Dealer</option>
						    <option value="Dealership/Certified Pre-Owned">Dealership/Certified Pre-Owned</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="fds">
							 <option value="" disabled selected style="display: none">Final Drive System</option>
						  <option value="Belt">Belt</option>
						   <option value="Chain">Chain</option>
						    <option value="Shaft">Shaft</option>
						     <option value="Does not apply">Does not apply</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="wheels">
							 <option value="" disabled selected style="display: none">Wheels</option>
						  <option value="2 Wheels">2 Wheels</option>
						   <option value="3 Wheels">3 Wheels</option>
						    <option value="4 Wheels">4 Wheels</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="manu">
							 <option value="" disabled selected style="display: none">Manufacturer</option>
						  <option value="Access Motor">Access Motor</option>
						  <option value="Aprillia">Aprillia</option>
						  <option value="Asiawing">Asiawing</option>
						  <option value="Bajaj">Bajaj</option>
						  <option value="Benelli">Benelli</option>
						  <option value="Buell">Buell</option>
						  <option value="Can-am">Can-am</option>
						  <option value="Ducati">Ducati</option>
						  <option value="Gas Gas">Gas Gas</option>
						  <option value="Harley Davidson">Harley Davidson</option>
						  <option value="Honda">Honda</option>
						  <option value="Husaberg">Husaberg</option>
						  <option value="Husqvarna">Husqvarna</option>
						  <option value="Indian">Indian</option>
						  <option value="Kawasaki">Kawasaki</option>
						  <option value="KTM">KTM</option>
						  <option value="Moto Guzzi">Moto Guzzi</option>
						  <option value="MV Agusta">MV Agusta</option>
						  <option value="Norton">Norton</option>
						  <option value="Polaris">Polaris</option>
						  <option value="Royal Enfield">Royal Enfield</option>
						  <option value="Suzuki">Suzuki</option>
						  <option value="Triumph">Triumph</option>
						  <option value="Vespa">Vespa</option>
						  <option value="Victory">Victory</option>
						  <option value="Yamaha">Yamaha</option>
						  <option value="Other">Other</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class ="box">
						<select name="cc">
							 <option value=""disabled selected style="display: none">Engine Size</option>
						  <option value="Less than 250cc">Less than 250cc</option>
						  <option value="250cc - 499cc">250cc - 499cc</option>
						   <option value="500cc - 599cc">500cc - 599cc</option>
						  <option value="600cc - 749cc">600cc - 749cc</option>
						  <option value="750cc - 999cc">750cc - 999cc</option>
						   <option value="1,000cc or more">1,000cc or more</option>
						  <option value="Does not apply">Does not apply</option>
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
					<div class="wrap-input100 validate-input" data-validate="Please enter car location">
						<input class="input100" type="text" name="location" placeholder="Locate your motorcycle">
						<span class="focus-input100"></span>
					</div>
					<br>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_sub" style="background-color:#4267B2; width: 400px;">
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