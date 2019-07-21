<?php
//to connect to database
$connection = mysqli_connect('localhost','bmspay','bmspay');

if(!$connection ) {  
die('Could not connect to Server' .mysqli_error($connection));  
}

mysqli_select_db($connection, 'bmspay_data');
if(!$connection) {  
die('Database Selection Problem' .mysqli_error($connection));  
}
//echo 'successful';
?>