<?php
include 'database_connection.php';
session_start();
if(isset($_POST['update']))
{
	$new_name=$_POST['new_name'];
	$new_usn=$_POST['new_usn'];
	$new_email=$_POST['new_email'];
	$temp= (!$_SESSION['user_usn'])?$_COOKIE['user_usn']:$_SESSION['user_usn'];
	$query="UPDATE user_info SET Name='$new_name',USN='$new_usn',Email='$new_email' WHERE USN='$temp'";
	$res=mysqli_query($connection, $query) or die(mysqli_error($connection));
	$_SESSION['username']=strtok($new_name," ");
	
	$query = "SELECT * FROM payment_info WHERE USN='$temp'";
	$res = mysqli_query($connection,$query);
	if(mysqli_num_rows($res)>0)
	{
		$r= mysqli_query($connection,"UPDATE payment_info SET USN='$new_usn',Name='$new_name' WHERE USN='$temp'");
	}
	$q = "SELECT * FROM bank_info WHERE USN='$temp'";
	$r = mysqli_query($connection,$q);
	if(mysqli_num_rows($r)>0)
	{
		$r1= mysqli_query($connection,"UPDATE bank_info SET USN='$new_usn',Name='$new_name' WHERE USN='$temp'");
	}
	
	$_SESSION['user_usn']=$new_usn;
	echo "<script type='text/javascript'> 
			alert('Information updated successfully!');
			window.location.href='bmsPay-home-final.php';					
		  </script>";
}

?>