<?php
session_start();
include("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
<link rel="stylesheet" type="text/css" href="styles/Dash.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	
	<div class="container">
	
		<div class = "navigation">
		<div class="menu-header-bg"></div>
		
			<ul> 
				<li>
					<a href="#">
						<div class=" logo"><img src ="images/logo.png"></div>
						<span class ="title1"> BESO Portal</span>
					</a>
				</li>
				<li>
					<a class="active" href="Dashboard.php">
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
					<a href="Account.php">
						<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
						<span class ="title"> Accounts</span>
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
				<div class="toggle">
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>
				<?php include("userlogin.php"); ?>
			</div>
			 <div class ="scroll">
			<table class="input">
				<tbody>
					<tr>
						<th rowspan="3"width="200px";>College</p> </th>
						<th rowspan="3">Number of Programs</th>
						<th colspan="20">Indicator</th>
						<th rowspan="3">Budget </th>
						
					</tr>
					<tr>
						<th colspan="5">Number of Active Partnetship with LGUs,Industries,NGOs,NGAs, SMEs, and other stake holder as a result of extension activirties</th>
						<th colspan="5">Number of Trainees weight by lenght of training </th>
						<th colspan="5">Number of extension programs organized and supported consistent with the SUC's mandated and priority programs </th>
						<th colspan="5">Percentage of beneficiaries who rate the training course/s and advisory service as satisfactory or higher in terms of quality and relevance</th>
						
					</tr>
					<tr>
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td>Total</td>
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td>Total</td>
						
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td>Total</td>
						
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td>Total </td>
						
					</tr>
					<tr class="cols">
						<td colspan="23"></td>
						
					</tr>
					<tr >
						<th>CEAFA</th>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td  rowspan="3" class="input1" ><input type = "number" min="0"></td>
					</tr>
					<tr>
						<th>CICS</th>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
					</tr>
					<tr>
						<th>CIT</th>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
					</tr>
					<tr>
						<th>Total</th>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td><input type = "number" min="0"></td>
						<td colspan="5" class="input2"><input type = "number" min="0"></td>
						<td class="input1"><input type = "number" min="0"></td>
					</tr>
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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