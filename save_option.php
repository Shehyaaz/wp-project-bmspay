<?php
include "database_connection.php";
session_start();
if(isset($_POST['apply']))
{
		if($_POST['semester']==1)  $selected= 'sem'.$_POST['semester'];
		else $selected='sem'.$_POST['semester'].substr($_POST['op_usn'],5,-3);
		$t= $_POST[$selected];
		$name=$_POST['op_name'];
		$usn=$_POST['op_usn'];
		$index = $_POST['selected_index'];
		if($_SESSION['form_name']=='Reval Form') //insert into database
		{
			$query="SELECT * FROM payment_info WHERE USN='$usn' && Name='$name' && Reval='$t' && Retotal=' '&& Ans_copy=' ' && Amount='600'";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			if(mysqli_num_rows($res)>0)
			{
				alert();
				exit();
		    }
			else{
			$query="INSERT INTO payment_info VALUES('$usn','$name','$t',' ',' ','600')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			$id=mt_rand(100000,999999);
			$query = "INSERT INTO bank_info(USN,Name,Amount,Transaction,Course) VALUES('$usn','$name','600','$id','$t')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			}
		}
		else if($_SESSION['form_name']=='Retotal Form') //insert into database
		{
			$query="SELECT * FROM payment_info WHERE USN='$usn' && Name='$name' && Reval=' ' && Retotal='$t' && Ans_copy=' '&& Amount='100'";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			if(mysqli_num_rows($res)>0)
			{
				alert();
				exit();
		    }
			else{
			$query="INSERT INTO payment_info VALUES('$usn','$name',' ','$t',' ','100')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			
			$id=mt_rand(100000,999999);
			$query = "INSERT INTO bank_info(USN,Name,Amount,Transaction,Course) VALUES('$usn','$name','100','$id','$t')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			}
		}
		else if($_SESSION['form_name']=='Answer Script Copy Form') //insert into database
		{
			$query="SELECT * FROM payment_info WHERE USN='$usn' && Name='$name' && Reval=' '&& Retotal=' '&& Ans_copy='$t' && Amount='700'";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			if(mysqli_num_rows($res)>0)
			{
				alert();
				exit();
		    }
			else{
			$query="INSERT INTO payment_info VALUES('$usn','$name',' ',' ','$t','700')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			$id=mt_rand(100000,999999);
			$query = "INSERT INTO bank_info(USN,Name,Amount,Transaction,Course) VALUES('$usn','$name','700','$id','$t')";
			$res=mysqli_query($connection,$query) or die(mysqli_error($connection));
			}
		}
		
		
		header('location:progress.php');
		exit();
}

function alert(){
	echo "<script type='text/javascript'> 
						alert('You have already paid for this !!');
						window.location.href='bmsPay-home-final.php';
		  </script>";
}

mysqli_close($connection);
?>