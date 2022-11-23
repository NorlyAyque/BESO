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

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/userlogin-style.css">

<body>
<?php

$month = date("n");
$CurrentQuarter = ceil($month / 3);
$CurrentYear = date("Y");
$MsgYear = "";
$MsgQtr = "";

if ($CurrentYear != $CustomYear){
	$MsgYear = "<br> NOTICE: Update Year <br>";
}

if ($CurrentQuarter != $CustomQuarter){
	$MsgQtr = "<br> NOTICE: Update Quarter!";
}
?>

</head>
<br>
<div class="BESOTITLE"><h1> BESO Portal</h1></div> 
 <b><?php echo "<div class='BESOTITLE'> Year: $CustomYear </div>";?></b>
 <b><?php echo "<div class='BESOTITLE'> Quarter: $CustomQuarter</div>";?></b>

 <b> <?php echo "$MsgYear"; ?> </b>
 <b> <?php echo "$MsgQtr"; ?> </b>

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
	</label>
</div>		
</body>
</html>