<?php
// Inialize session
session_start();

if(isset($_SESSION['user_usn'])||isset($_COOKIE['user_usn'])){
 session_destroy();
 setcookie('username', '', time() - 1*24*60*60);
 setcookie('user_usn', '', time() - 1*24*60*60);
 setcookie('pass', '', time() - 1*24*60*60);
// Jump to home page
echo "<script type='text/javascript'> 
			alert('Logged out successfully !!');
		    window.location.href='bmsPay-home-final.php';
	  </script>";
}
else{
	echo "<script type='text/javascript'> 
			alert('Login first !!');
		    window.location.href='bmsPay-login-final.php';
		  </script>";
}	
?>