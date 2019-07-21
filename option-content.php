<?php
include 'head.php'; //session started here
?>
<?php
include 'database_connection.php';
if(isset($_SESSION['user_usn'])||isset($_COOKIE['user_usn']))
{
	$temp= (!$_SESSION['user_usn'])?$_COOKIE['user_usn']:$_SESSION['user_usn'];
	$query="SELECT Name,USN FROM user_info WHERE USN='$temp'";
	$res=mysqli_query($connection, $query);
	if(mysqli_num_rows($res)==0)  die ('Unable to select data'.mysqli_error($connection));
	$row = mysqli_fetch_assoc($res);
}
else{
	echo "<script type='text/javascript'> 
			alert('Login first !!');
		    window.location.href='bmsPay-login-final.php';
		  </script>";
}
?>
<head>
   <style>
   body{color : rgb(80,80,80);}
  .information{
		background-color : darkcyan;
        border-left:5px solid darkblue;
		font-style : bold;
		color :white;
		padding : 5px;
	}
   </style>
   <title><?php $_SESSION['form_name']=$_GET['form_name']; 
				echo $_SESSION['form_name']; ?>
	</title>
</head>
<body>
<section id="main" class="wrapper" style="background-image:linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,0.7));">
	<div class="inner" style="border-left: 5px solid coral; border-radius: 10px; padding-left:2%; padding-right:2%; background-color:rgb(220,220,220);">
			<h2 id="formhead" ><?php echo $_SESSION['form_name']; ?></h2>
	        <form method="post" action="save_option.php" name="form_option" id="form_option" onsubmit="return confirm('Are you sure you want to proceed ?');">
				<div class="row uniform">
					<div class="6u 12u$(xsmall)">
					    <label><h4>Name:</h4></label>
						<input type="text" name="op_name" id="op_name" style="background-color:rgb(100,100,100); color:white;" value="<?php echo $row['Name'];?>" placeholder="Name" onkeydown="return false" />
					</div>
					<div class="6u$ 12u$(xsmall)">
					    <label><h4>USN:</h4></label>
						<input type="text" name="op_usn" id="op_usn" style="background-color:rgb(100,100,100); color:white;" value="<?php echo $row['USN']; ?>" placeholder="USN" maxlength="10" onkeydown="return false"/>
					</div>
					<br />
					<div class="6u$ 12u$(xsmall)">
					    <label><h4>Branch:</h4></label>
						<input type="text" name="op_branch" id="op_branch" style="background-color:rgb(100,100,100); color:white;" value="" placeholder="Branch" onkeydown="return false" />
					</div>
					<!--break-->
					<div class="12u$">
						<div class="information">
						    <strong style="color: coral">Note : </strong>You can pay for only one course at a time. 
					    </div>
						<br />
						<div class="select-wrapper">
							<select name="semester" id="semester" title="Semester" onchange="select_box(this.options[this.selectedIndex].value);"style="background-color:rgb(100,100,100); color:white;" required>
								<option value="">- Semester -</option>
								<option value="1">First</option>
								<option value="3">Third</option>
								<option value="5">Fifth</option>
								<option value="7">Seventh</option>
							</select>
						</div>
					</div>
					<?php include "branches-and-courses.php";?>
					<div class="12u$" >
						<ul class="actions" style="text-align:right;">
							<li><input type="submit" name="apply" id="apply" value="Apply & Proceed for Payment" onclick="return select_op();" title="Proceed for payment"/></li>
						</ul>
						<br />
					</div>
				</div>
			</form>      
	</div>
</section>
<script type="text/javascript" src="js/branch_subject.js"></script>
<?php include "footer.php";
	mysqli_close($connection);
?>
</body>
</html>