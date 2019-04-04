<?php  
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="userdata";

$conn=mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
	die("connection failes" . mysqli_connect_error());
}

/*error logs:
sqlerror101 = error in case that for some reason one cannot READ from the database
sqlerror202 = error in case that for some reason one cannot WRITE into the database

