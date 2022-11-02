<?php
//session_start();
include("Connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/Dashboards.css">
<style>
 .text{
	margin-top:auto;
	margin-left:80px;
	 text-align:center;
	 font-weight:bold;

 }
 .text1{
	 margin-left:80px;
	 text-align:center;
	 font-size:12px;
	 
	
	
 }
 .margin{
	text-align: right;
	 margin-right:10px;
	
 }


.profile {
	margin-top:50px;
	width:50px;
	height:50px;
	color:green;
	box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
	border-radius:50%;
	margin-left:10px;
	margin-right:35px;
	

}
</style>

</head>


<div class="margin">
	<label> 	
            <?php 
				
				echo  "<ion-icon name='person-circle-sharp' class='profile'></ion-icon>";
                echo "<div class='text'>" .$_SESSION["FullName"]." - ". $_SESSION["Position"]."</div>";  

	
				
				echo "<div class='text1'>" .$_SESSION["College"]." - ". $_SESSION["Campus"]."</div>"; 
           
               
				?> 
	</div>		




</html>