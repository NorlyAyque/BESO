<?php
session_start();
include("Connection.php");


if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="styles/Setting-style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a href="Dashboard.php">
					<span class ="icon"> <ion-icon name="home-outline"></ion-icon> </span>
					<span class ="title"> Home</span>
				</a>
			</li>
			<li>
				<a href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
				</a>
			</li>
			<li>
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title"> Project Proposals</span>
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
				</a>
			</li>
			<li>
				<a href="Reports.php">
					<span class ="icon"> <ion-icon name="documents-outline"></ion-icon> </span>
					<span class ="title"> Reports</span>
				</a>
			</li>
			<li>
				<a  href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a  class="active" href="Settings.php">
					<span class ="icon"> <ion-icon name="settings-outline"></ion-icon> </span>
					<span class ="title"> Settings</span>
				</a>
			</li>
			<li>
				<a href="Signout.php">
					<span class ="icon"> <ion-icon name="log-in-outline"></ion-icon> </span>
					<span class ="title"> Sign out</span>
				</a>
			</li>
		</ul>
	</div>
		
		<!--main-->
		<div class="main">
			<div class="topbar">
				
			</div>
			<br><br><br><br><br>
			<center> 
				<h2> Current Set Year <u> <?php echo "$CustomYear";?> </u>
				and Quarter <u><?php echo "$CustomQuarter";?> </u></h2>
			</center>
			
				<table class="settings">	
					
				<tr>
					<th colspan="2"><h3>Set Year and Quarter to be used for the whole system</h3></i></th>
					
				</tr>			
				<tr>
					<th>Set Year</th>
					<th>Set Quarter </th>
				</tr>	
				
				<tr>
					<td>
						<div class ="Year">
							<input type="number" min="0" id="Year" name="Year" placeholder="type here.." required> 
							
						</div>
						<div class="tbcreate">
							<input type="submit" name="SetYearBtn"  value="Set Year" class = "SubmitYQ">
							
						</div>
					</td> 
					<td>
						<div class ="Quarter">
							<input type="number" min="0" id="Quarter" name="Quarter" placeholder="type here.." required> 
						</div>
						<div class="tbcreate">
							<input type="submit" name="SetQuarterBtn" value=" Set Quarter"  class = "SubmitYQ">
						</div>
					</td> 
					
				</tr>
				
				
					
			
				
				
		
			</table>
				
				
					
					
					
			
		</div>
	</div>
	
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<script>
	//MenuToggle
	let toggle = document.querySelector('.toggle');
	let navigation = document.querySelector('.navigation');
	let main = document.querySelector('.main');
	
	toggle.onclick = function(){
		navigation.classList.toggle('active');
		main.classList.toggle('active');
	}
	</script>
	<script>
	// hovered for selected list item
	let list = document.querySelectorAll('.navigation li');
	function activeLink(){
		list.forEach((item)=>
		item.classList.remove('hovered'));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink);
	</script>
<body>
</html>

<?php
if (isset($_POST['SetYearBtn'])){
	$New_Year = $_POST["Year"];
	
	$sql = ("UPDATE custom_alangilan SET Year = '$New_Year'");
	$command = $con->query($sql) or die("Error updating new year");

	echo "<script> alert('Year Successfully Set'); window.location='Settings.php';</script>";
}

if (isset($_POST['SetQuarterBtn'])){
	$New_Quarter = $_POST["Quarter"];
	
	$sql = ("UPDATE custom_alangilan SET Quarter = '$New_Quarter'");
	$command = $con->query($sql) or die("Error updating new year");

	echo "<script> alert('Quarter Successfully Set'); window.location='Settings.php';</script>";
}
?>



