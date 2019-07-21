<?php
include 'head.php'; //session started here
?>
<?php
   include 'database_connection.php';
   if(isset($_SESSION['user_usn'])||isset($_COOKIE['user_usn']))
{
	$temp= (!$_SESSION['user_usn'])?$_COOKIE['user_usn']:$_SESSION['user_usn'];
	$query="SELECT * FROM bank_info WHERE USN='$temp'";
	$res=mysqli_query($connection, $query);
	if(mysqli_num_rows($res)==0)  
	{ 
			echo "<script type='text/javascript'> 
				alert('You have not made any transactions yet !');
				window.location.href='bmsPay-home-final.php';
		  </script>";
	}
}
else{
	echo "<script type='text/javascript'> 
			alert('Login first !!');
		    window.location.href='bmsPay-login-final.php';
		  </script>";
}
?>

<head>
   <title>Transaction History</title>
</head>

<body>
	<section id="main" class="wrapper">
		<div class="inner">
			<h4>Transaction History</h4>
			 <div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th>USN</th>
							<th>Name</th>
							<th>Subject</th>
							<th>Amount Paid</th>
							<th>Date</th>
							<th>Transaction ID</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<tr>";
								echo "	<td>".$row['USN']."</td>";
								echo "	<td>".$row['Name']."</td>";
								echo "  <td>".$row['Course']."</td>";
								echo "	<td>".$row['Amount']."</td>";
								echo "	<td>".$row['Date']."</td>";
								echo "	<td>".$row['Transaction']."</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<?php include 'footer.php';
	  mysqli_close($connection);?>
</body>
</html>