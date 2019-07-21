<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/home.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="background-image: linear-gradient(90deg, #33ccff 0%, #ff99cc 100%);">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="bmsPay-home-final.php" class="logo">bmsPay</a>
				<nav class="right">
					<a href="bmsPAY-login-final.php" class="button alt" id="Login">
					   <?php 
					       if(isset($_SESSION['username']))
								echo "Welcome ".$_SESSION['username'];
						   else if(isset($_COOKIE['username']))
							   echo "Welcome ".$_COOKIE['username'];
						   else echo 'Login';
					   ?>
					</a>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="bmsPay-home-final.php">Home</a></li>
					<li><a href="feeStruc.php">Fee Details</a></li>
					<li><a href="option-content.php?form_name=Reval Form">Revaluation</a></li>
					<li><a href="option-content.php?form_name=Retotal Form">Retotaling</a></li>
					<li><a href="option-content.php?form_name=Answer Script Copy Form">Answer Script copy</a></li>
					<li><a href="transaction.php">Your Transactions</a></li>
					<li><a href="bmsPAY-update.php">Edit Account Information</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
		</nav>
	