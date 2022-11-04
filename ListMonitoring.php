<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Status Report</title>
<link rel="stylesheet" type="text/css" href="styles/Report.css">

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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
			<!--Content-->
			<table class="Reports">
				<tr>
					<th>
						<div class="menu">
							<a href="Reports.php" button class = "nav"> Quarterly Monitoring Report  <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="StatusReport.php" button class = "nav"> Status Report <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="GADReport.php" button class = "nav"> GAD Report <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="ListImpact.php" button class = "nav"> List of Extension PAPs for Impact assessment <ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>	
					</th>
				</tr>
				<tr>
					<th>
						<div class="menu1">
							<a href="ListMonitoring.php" button class = "nav1"> List of Extension PAPs for Monitoring <ion-icon name="bookmarks-outline"></ion-icon></a>	
							<a href="AccomplishReport.php" button class = "nav"> Accomplishment report <ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>
					</th>
				</tr>
					
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
		item.classList.remove('hovered));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink));
	</script>
<body>
</html>