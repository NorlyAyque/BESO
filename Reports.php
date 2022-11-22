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
<title>Quarterly Monitoring Report</title>
<link rel="stylesheet" type="text/css" href="styles/DashReports.css">

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
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title"> Project Proposals</span>
				</a>
			</li>
			<li>
				<a href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
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
				<a class="active"  href="Reports.php">
					<span class ="icon"> <ion-icon name="documents-outline"></ion-icon> </span>
					<span class ="title"> Reports</span>
				</a>
			</li>
			<li>
				<a href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a href="Settings.php">
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
			
			<!--Content-->
			<table class="Reports">
				<tr>
					<th>
						<div class="menu">
							<a href="Reports.php" button class = "nav1"> Quarterly Monitoring Report  <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="StatusReport.php" button class = "nav"> Status Report <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="GADReport.php" button class = "nav"> GAD Report <ion-icon name="bookmarks-outline"></ion-icon></a>
						</div>	
					</th>
				</tr>
				<tr>
					<th>
						<div class="menu1">
							<a href="ListImpact.php" button class = "nav"> List of Extension PAPs for Impact assessment <ion-icon name="bookmarks-outline"></ion-icon></a>	
							<a href="AccomplishReport.php" button class = "nav"> Accomplishment report <ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>
					</th>
				</tr>
			</table>	
			
			<form action="Reports.php" method="_GET" target="_blank">
			<table class="tbcontent">	
									
				<tr>
					<th>Set Year</th>
					<th>Set Quarter </th>
					<th>Select College </th>
				</tr>	
				
				<tr>
					<td class="MF">
						<div class ="Drp1">
							<select name="Year" id="Year" required>
								<option value="">Select Year</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
								<option value="2029">2029</option>
								<option value="2030">2030</option>
								<option value="2031">2031</option>
								<option value="2032">2032</option>
								<option value="2033">2033</option>
								<option value="2034">2034</option>
								<option value="2035">2035</option>
							</select>
						</div>
					</td> 
					
					<td>
						<div class ="Drp2">
							<select name="Quarter" id="Quarter" required>
								<option value="">Select Quarter</option>
								<option value="1">Quarter 1</option>
								<option value="2">Quarter 2</option>
								<option value="3">Quarter 3</option>
								<option value="4">Quarter 4</option>
							</select>
						</div>
					</td> 
					<td>
						<div class ="Drp1">
							<select name="College" id="College" required>
								<option value="">Select College</option>
								<option value="CEAFA">CEAFA</option>
								<option value="CICS">CICS</option>
								<option value="CIT">CIT</option>
								<option value="ALL">ALL</option>
							</select>
						</div>
					</td> 
				</tr>
				
				<tr>
					<th colspan="3">
						<div class="tbcreate">
							<input type="submit" value="Create" class = "createBTN">
							<!-- <a href="QuarterlyMonitoringReport.php" button class = "createBTN"> Create <ion-icon name="brush-outline"></ion-icon></a> -->
						</div>
					</th>
				</tr>
			</form>
			</table>
		</div>
	</div>
	
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script type="module" scr="https://cdn.bootcdn.net/ajax/libs/ionicons/6.0.3/cjs/index-1bc7b418.js"></script>
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

</body>
</html>

<?php
if((isset($_GET['Year']) == TRUE) AND (isset($_GET['Quarter'])== TRUE) AND (isset($_GET['College'])== TRUE))  {
	
	$Year = $_GET['Year'];
	$Quarter = $_GET['Quarter'];
	$College = $_GET['College'];

	if ($College == "CEAFA"){
		echo "<script>
			window.location='Reports/Generate_QMR_CEAFA.php?Year=$Year&Quarter=$Quarter&College=$College';
		</script>";
	}
	if ($College == "CICS"){
		echo "<script>
			window.location='Reports/Generate_QMR_CICS.php?Year=$Year&Quarter=$Quarter&College=$College';
		</script>";
	}
	if ($College == "CIT"){
		echo "<script>
			window.location='Reports/Generate_QMR_CIT.php?Year=$Year&Quarter=$Quarter&College=$College';
		</script>";
	}
	if ($College == "ALL"){
		echo "<script>
			window.location='Reports/Generate_QMR_Alangilan.php?Year=$Year&Quarter=$Quarter&College=$College';
		</script>";
	}
}

?>