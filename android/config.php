<?php
$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$DATABASE = "encarta_app";
$PORT = "80";
$SOCKET = "";
error_reporting(0);
$connection = mysqli_connect($HOST,$USER,$PASSWORD,$DATABASE);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
header("Content-type:text/json");
?>