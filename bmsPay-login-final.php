<?php
  include 'redirect_on_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" name="form_login" action="login_check.php" method="post">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">USN</span>
						<input class="input100" type="text" name="user_usn" placeholder="Enter USN" required pattern="^1BM1[0-9](BT|CE|CV|CS|EC|EE|EI|IM|IS|ME|ML|TE)[0-9]{3}$" title="USN Ex:1BM17CS001">
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter Password" required pattern=".{6,}" title="Six or more characters">
					</div>
					
					<br />
					<div>
						<input type="checkbox" id="remember" name="remember" />
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
							<button class="login100-form-btn" id="submit_login" name="submit_login">
								Login
							</button>
						</div>
					</div>

					
					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="bmsPay-signUp-final.php" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>