<?php
$host = 'localhost';
$un = 'root';
$pass = '';
$db = 'wb8db';

$con = mysqli_connect($host, $un, $pass, $db);

if(!$con){
	echo "database not connected!";
	die(mysqli_error($con));
}

?>