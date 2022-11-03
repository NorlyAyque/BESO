<?php
//session_start();
include("Connection.php");


$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];
$College = $_SESSION["College"];
$Campus = $_SESSION["Campus"];
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/Dash.css">
<style>
 .text{
	margin-top:auto;
	
	 text-align:center;
	 font-weight:bold;

 }
 .text1{
	margin-top:-3px;
	 text-align:center;
	 font-size:12px;
	 
	
	
 }
 .margin{
	
	 margin-right:10px;
	
 }


.profile {
	margin-top:50px;
	width:50px;
	height:50px;
	color:green;
	box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
	border-radius:50%;
	
}
.Tuser{
	margin-top: 30px;
}
.Tuser td{
	
}


.Tuser table,td{
	border: none;
	border-collapse: collapse;
}

.Tuser .logo td:nth-child(1){
	border:none;
}

</style>

</head>


<div class="margin">
	<label> 	
            <?php 
				echo "<table class='Tuser'>";
				echo " <tr class='logo'> 
							<td> <ion-icon name='person-circle-sharp' class='profile'></ion-icon> </td>
						</tr>
						";
                echo "<tr>
							<td> <div class='text'> $Fullname - $Position </div></td>
						</tr>
					";
					
				echo "<tr>
							<td> <div class='text1'>$College - $Campus </div> </td>
						</tr>
					"; 
				echo "</table>";
               
				?> 
	</div>		




</html>