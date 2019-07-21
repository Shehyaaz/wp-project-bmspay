<?php
include "redirect_on_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util-login.css">
	<link rel="stylesheet" type="text/css" href="css/main-login.css">
	<style type="text/css">

		input:not(:placeholder-shown):invalid, input:focus:invalid {
		background-image: url(images/invalid.png);
		background-position: right top;
		background-repeat: no-repeat;
		background-size : 5%;
	}
		input:required:valid {
		background-image: url(images/valid.png);
		background-position: right top;
		background-repeat: no-repeat;
		background-size : 5%;
	}
		.invalid{
		background-color : lightcoral;
        border-left:5px solid firebrick;
		font-style : bold;
		color :white;
	}
    </style>
	<script type="text/javascript" src="js/form_validate.js"></script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" name="signup_form" action="signup_save.php" method="post">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Full Name" required pattern="^[a-zA-Z\s]+$" title="Name cannot have special characters">
					</div>
					
					<div class="wrap-input100 validate-input">
						<span class="label-input100">USN</span>
						<input class="input100" type="text" name="usn" placeholder="USN" required pattern="^1BM1[0-9](BT|CE|CV|CS|EC|EE|EI|IM|IS|ME|ML|TE)[0-9]{3}$" title="USN Ex: 1BM17CS001">
					</div>
					<br />
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="email" required>
					</div>
					<br />
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pwd" placeholder="Password" required pattern=".{6,}" title="Six or more characters">
					</div>
					<br />
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="re_pwd" placeholder="Retype Password" required onkeyup="check_pass();" title="">
					    <span id="message"></span>
					</div>
					<br />
					<div>
						<input type="checkbox" id="remember_signup" name="remember_signup" />
					    <label >Remember me</label>
					</div>
					<br />
					<div class="invalid">
					<?php
					   if(!empty($_SESSION['error']))
						   echo $_SESSION['error'];
					?>
					</div>
					<?php unset($_SESSION['error']);?>
					<br />
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
						   <div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="submit_signup" name="submit_signup" disabled>
								Sign Up
							</button>
						</div>
					</div>

					
					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Log in Using
						</span>

						<a href="bmsPay-login-final.php" class="txt2">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>