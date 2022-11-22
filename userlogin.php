<?php
//session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}


$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];
$College = $_SESSION["College"];
$Campus = $_SESSION["Campus"];
?>
<link rel="stylesheet" type="text/css" href="styles/Create-proposal.css">
<!DOCTYPE html>
<html>
<head>

<style>
 .text{
	margin-top:auto;
	color:white;
	 text-align:center;
	 font-weight:bold;
	 box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
	 padding:5px;

 }
 .text1{
	margin-top:-3px;
	 text-align:center;
	 font-size:12px;
	 color:white;

 }


.profile {
	width:80px;
	height:80px;
	color:green;
	box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
	border-radius:50%;
	color:white;
	
	
	
}



.Tuser{
	 
	margin-top:30px;
	margin-right:10px;
	
	
	
}


.Tuser table,td{
	border: none;
	border-collapse: collapse;

	
}

.Tuser .logo td:nth-child(1){
	border:none;
	text-align:center;
	
}

</style>

</head>

<h1> BESO Portal </h1>
Year <u><b><?php echo "$CustomYear";?></b></u>
Quarter <u><b><?php echo "$CustomQuarter";?></u></b>
<div class="margin">
	<label> 	
            <?php 
				echo "<table class='Tuser'>";
				echo " <tr class='logo'> 
							<td> <img src ='images/logo.png' class='profile'> </td>
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