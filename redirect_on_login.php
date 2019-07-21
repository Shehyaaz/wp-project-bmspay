<?php
  session_start();
  if(isset($_COOKIE['user_usn'])||isset($_SESSION['user_usn'])){
	  header('location:bmsPay-home-final.php');
	  exit();
  }
?>