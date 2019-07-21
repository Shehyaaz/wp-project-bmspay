<!DOCTYPE html>
<html>
<head>
	<title>Processing details</title>
	<link rel="stylesheet" type="text/css" href="css/loading.css"/>
</head>
<body>
	Processing transaction<br>
<div class="loader">
</div>
<script type="text/javascript">
window.setTimeout(f1,5000);
function f1()
{
	alert("payment successful!!");
	window.location.href="transaction.php";
}

</script>
</body>
</html>