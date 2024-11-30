<?php
// DATABASE
$sname= "localhost";
$unmae= "";
$password = "";
$db_name = "hoteldata";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}