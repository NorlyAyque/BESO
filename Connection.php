<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$dbname = "Beso_Portal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed To Connect to the Server and to the Database  " .$dbname);
}

?>