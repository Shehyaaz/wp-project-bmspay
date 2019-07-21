<?php
include 'database_connection.php';
session_start();
if(isset($_POST['submit_signup']))
{
	$name=$_POST['name'];
	$usn=$_POST['usn'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$query="SELECT * FROM user_info WHERE Name='$name' && USN='$usn'";
	$res=mysqli_query($connection,$query);
	if(mysqli_num_rows($res)==0)
	{
		$query="INSERT INTO user_info(Name,USN,Password,Email) VALUES('$name','$usn',SHA1('$pwd'),'$email')";
		$res=mysqli_query($connection,$query);
		if(!$res) die('Unsuccessful'.mysqli_error($connection));
		/*setting user usn and password to prevent further log in*/
		if(isset($_POST['remember_signup'])) {
            //set the cookies for 1 day, ie, 1*24*60*60 secs
            setcookie('username', strtok($name," "), time() + 1*24*60*60);
            setcookie('user_usn', $usn, time() + 1*24*60*60);
            setcookie('pass', SHA1($pwd), time() + 1*24*60*60);
        } else {
            //destroy any previously set cookie
            setcookie('username', '', time() - 1*24*60*60);
			setcookie('user_usn', '', time() - 1*24*60*60);
            setcookie('pass', '', time() - 1*24*60*60);
        }
		$_SESSION['username']=strtok($name," ");
		$_SESSION['user_usn']=$usn;
		$_SESSION['pass']=$pwd;
		header('location:bmsPay-home-final.php');
		exit();
	}
	else{
		$_SESSION['error']="This User Already Exists !!";
		header('location:bmsPay-signUp-final.php');	
		exit();
	}
}
mysqli_close($connection);
?>