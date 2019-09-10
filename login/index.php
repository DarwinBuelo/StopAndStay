<?php
require '../fb-init.php';
?>
<html lang="en"><head>
	<title>Stop N Stay - Login</title>
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-35 p-r-55 p-t-120" method="POST" action="../includes/login_user.php">
					<span class="login100-form-title" style="
    padding-top: 20px; padding-bottom:20px;">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Email">
						<input class="input100" type="email" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<a class="txt1 p-b-9" aria-hidden="true">
							Log In With
						</a>

						<a href="<?= $logInURL; ?>" class="fa fa-facebook" aria-hidden="true">acebook</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit_login">
							Sign in
						</button>
					</div>

					<div class="flex-col-c p-t-10 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="register.php" class="txt3">
							Sign up now
						</a>
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
        <script src="js/facebook.js"></script>
        
<script>
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
</script>


</body></html>