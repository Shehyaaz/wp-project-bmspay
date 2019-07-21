<?php
	include 'redirect_to_login.php';
	include 'database_connection.php';
    $query="SELECT Name,USN,Email FROM user_info WHERE USN='".$_SESSION['user_usn']."';";	
	$res=mysqli_query($connection, $query);
	$row=mysqli_fetch_assoc($res);	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update information</title>
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
    </style>
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" name="update_form" action="update.php" method="post">
					<span class="login100-form-title p-b-49">
						Update Information
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">New Name</span>
						<input class="input100" type="text" name="new_name" value="<?php echo $row['Name'];?>"  pattern="^[a-zA-Z\s]+$" title="Name cannot have special characters">
					</div>
					
					<div class="wrap-input100 validate-input">
						<span class="label-input100">New USN</span>
						<input class="input100" type="text" name="new_usn" value="<?php echo $row['USN'];?>"  pattern="^1BM1[0-9](BT|CE|CV|CS|EC|EE|EI|IM|IS|ME|ML|TE)[0-9]{3}$" title="USN Ex: 1BM17CS001">
					</div>
					<br />
					<div class="wrap-input100 validate-input">
						<span class="label-input100"> New Email</span>
						<input class="input100" type="email" name="new_email" value="<?php echo $row['Email'];?>" >
					</div>
					<br />
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
						   <div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="update" name="update" >
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>