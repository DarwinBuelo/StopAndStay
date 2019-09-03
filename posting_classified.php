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
				<form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="includes/post_classified.php" enctype="multipart/form-data">
					<span class="login100-form-title" style=" padding-top: 20px; padding-bottom:20px;">
						Billboard Nation
					</span>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter title">
						<input class="input100" type="text" name="title" placeholder="Title">
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
					<textarea class="form-control" cols="4" row="5" placeholder="Describe your item" id="desc" name="desc" style="height: 100px;"></textarea>
					<br>
						<br>
						<br>
						<div class ="box">
						<select name="age">
							 <option value="" disabled selected style="display: none">Age</option>
						  <option value="Brand New">Brand New</option>
						   <option value="0-1 month">0-1 month</option>
						    <option value="1-6 months">1-6 months</option>
						     <option value="6-12 months">6-12 months</option>
						      <option value="1-2 years">1-2 years</option>
						       <option value="2-5 years">2-5 years</option>
						        <option value="5-10 years">5-10 years</option>
						         <option value="10 years+">10+ years</option>
						</select>
					</div>
						<br>
						<br>
						<br>
						<br>
						<div class ="box">
						<select name="usage">
							 <option value="" disabled selected style="display: none">Usage</option>
						  <option value="Still in original packaging">Still in original packaging</option>
						  <option value="Only used once">Only used once</option>
						  <option value="Used only a few times">Used only a few times</option>
						  <option value="Used an average amount, as frequently as would be expected">Used an average amount, as frequently as would be expected</option>
						  <option value="Used an above average amount since purchased">Used an above average amount since purchased</option>
						</select>
					</div>
						<br>
						<br>
						<br>
						<br>
						<div class ="box">
						<select name="condition">
							 <option value="" disabled selected style="display: none">Condition</option>
						  <option value="Perfect inside out">Perfect inside out</option>
						  <option value="Almost no noticeable problems or flaws">Almost no noticeable problems or flaws</option>
						  <option value="A bit of wear and tear but in good working condition">A bit of wear and tear but in good working condition</option>
						  <option value="Normal wear and tear for the age of the item, a few problems here and there">Normal wear and tear for the age of the item, a few problems here and there</option>
						  <option value="Above average wear and tear, the item may need a bit of repair to work properly">Above average wear and tear, the item may need a bit of repair to work properly</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Please enter car location">
						<input class="input100" type="text" name="location" placeholder="Locate your item">
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