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
				<form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="includes/post_jobs.php" enctype="multipart/form-data">
					<span class="login100-form-title" style=" padding-top: 20px; padding-bottom:20px;">
						Billboard Nation
					</span>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Company Name">
						<input class="input100" type="text" name="companyName" placeholder="Company Name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Position">
						<input class="input100" type="text" name="position" placeholder="Position">
						<span class="focus-input100"></span>
					</div>
                    <div class ="box" style="margin-top: 25px;">
						<select name="industry">
							<option value="" disabled selected style="display: none">Industry</option>
						    <option value="Accounting">Accounting</option>
							<option value="Airlines Aviation">Airlines Aviation</option>
							<option value="Architecture Interior Design">Architecture Interior Design</option>
							<option value="Art Entertainment">Art Entertainment</option>
							<option value="Automotive">Automotive</option>
							<option value="Banking Finance">Banking Finance</option>
							<option value="Beauty">Beauty</option>
							<option value="Business Development">Business Development</option>
							<option value="Business Supplies Equipment">Business Supplies Equipment</option>
							<option value="Construction">Construction</option>
							<option value="Consulting">Consulting</option>
							<option value="Customer Service">Customer Service</option>
							<option value="Education">Education</option>
							<option value="Engineering">Engineering</option>
							<option value="Environmental Services">Environmental Services</option>
							<option value="Event Management">Event Management</option>
							<option value="Executive">Executive</option>
							<option value="Fashion">Fashion</option>
							<option value="Food Beverages">Food Beverages</option>
							<option value="Government / Administration">Government / Administration</option>
							<option value="Graphic Design">Graphic Design</option>
							<option value="HR Recruitment">HR Recruitment</option>
							<option value="Hospitality Restaurants">Hospitality Restaurants</option>
							<option value="Import Export">Import Export</option>
							<option value="Industrial Manufacturing">Industrial Manufacturing</option>
							<option value="Information Technology">Information Technology</option>
							<option value="Insurance">Insurance</option>
							<option value="Internet">Internet</option>
							<option value="Legal Services">Legal Services</option>
							<option value="Logistics Distribution">Logistics Distribution</option>
							<option value="Marketing Advertising">Marketing Advertising</option>
							<option value="Media">Media</option>
							<option value="Medical Healthcar">Medical Healthcare</option>
							<option value="Oil, Gas Energy">Oil, Gas Energy</option>
							<option value="Online Media">Online Media</option>
							<option value="Pharmaceuticals">Pharmaceuticals</option>
							<option value="Public Relations">Public Relations</option>
							<option value="Real Estate">Real Estate</option>
							<option value="Research Development">Research Development</option>
							<option value="Retail Consumer Goods">Retail Consumer Goods</option>
							<option value="Safety Security">Safety Security</option>
							<option value="Sales">Sales</option>
							<option value="Secretarial">Secretarial</option>
							<option value="Sports Fitness">Sports Fitness</option>
							<option value="Telecommunications">Telecommunications</option>
							<option value="Transportation">Transportation</option>
							<option value="Travel Tourism">Travel Tourism</option>
							<option value="Veterinary Animals">Veterinary Animals</option>
							<option value="Warehousing">Warehousing</option>
							<option value="Wholesale">Wholesale</option>
						</select>
					</div>
                    <br><br>
                    <br>
                    <br>
                    <div class ="box" style="margin-top: 15px;">
                    <select name="companySize">
                            <option value="" disabled selected style="display: none">Company Size</option>
                            <option value="Unknown">Unknown</option>
							<option value="1-10">1-10</option>
							<option value="1001-5000">1001-5000</option>
							<option value="10000+">10000+</option>
							<option value="201-500">201-500</option>
							<option value="501-1000">501-1000</option>
							<option value="51-200">51-200</option>
							<option value="11-50">11-50</option>
							<option value="5001-10000">5001-10000</option>
                    </select>
                    </div>
					<br>
					<br><br>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Company Website">
						<input class="input100" type="text" name="companyWebsite" placeholder="Company Website">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Description">
						<input class="input100" type="text" name="description" placeholder="Description">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Contact Name">
						<input class="input100" type="text" name="contactName" placeholder="Contact Name">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Phone Number">
						<input class="input100" type="text" name="phoneNumber" placeholder="Phone Number">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Email Address">
						<input class="input100" type="email" name="emailAddress" placeholder="Email Address">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter location">
						<input class="input100" type="text" name="location" placeholder="location">
						<span class="focus-input100"></span>
					</div>
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