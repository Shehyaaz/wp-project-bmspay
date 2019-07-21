<?php
include 'database_connection.php';
session_start();
if(isset($_POST['submit_login'])){
	$user_usn=$_POST['user_usn'];
	$pass=$_POST['pass'];
	$query= "SELECT * FROM user_info WHERE USN='$user_usn' && Password=SHA1('$pass')";
	$res = mysqli_query($connection,$query);
	if(mysqli_num_rows($res)==0){
		$_SESSION['error']="Invalid USN or Password !!";
		header('location:bmsPay-login-final.php');
	}
	else{
		$r=mysqli_fetch_assoc($res);
		$n= strtok($r['Name']," ");
		if(isset($_POST['remember'])) {
            //set the cookies for 1 day, ie, 1*24*60*60 secs
            setcookie('username',$n, time()+1*24*60*60);
            setcookie('user_usn', $user_usn, time() + 1*24*60*60);
            setcookie('pass', SHA1($pass), time() + 1*24*60*60);
        } else {
            //destroy any previously set cookie
            setcookie('user_usn', '', time() - 1*24*60*60);
            setcookie('pass', '', time() - 1*24*60*60);
        }
        $_SESSION['username']=$n;
		$_SESSION['user_usn']=$user_usn;
	    $_SESSION['pass']=$pass;
		header('location:bmsPay-home-final.php');
	}
}
mysqli_close($connection);
?>