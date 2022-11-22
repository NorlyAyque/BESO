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
	 
	margin-top:20px;
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
.BESOTITLE{
	color:white;
	margin-right:10px;

}
</style>
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
	</div>		
</body>
</html>