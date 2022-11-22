<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$dbname = "Beso_Portal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed To Connect to the Server and to the Database  " .$dbname);
}


$query = ("SELECT * FROM custom_alangilan");
$x = $con->query($query) or die("Error Fethcing data from custome alangilan");
while($output = mysqli_fetch_array($x))
{
	$CustomYear = $output["Year"];
	$CustomQuarter = $output["Quarter"];
}
?>