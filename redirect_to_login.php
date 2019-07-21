<?php
  session_start();
  if(!isset($_SESSION['user_usn']) && !isset($_COOKIE['user_usn'])){
	  echo "<script type='text/javascript'> 
				alert('Login first !!');
				window.location.href='bmsPay-login-final.php';
		</script>";
  }
?>