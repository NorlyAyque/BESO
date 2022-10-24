<?php
session_start();
include("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Monitoring</title>
<link rel="stylesheet" type="text/css" href="styles/MonitoringReport.css">

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
				<a class="active" href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
				</a>
			</li>
			<li>
				<a href="#">
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
			
		<table class="proposals">
			<tr>
				<th colspan="5">
					<div class="menu">
							
						<a href="Monitoring.php" button class = "nav1"> Pending <ion-icon name="mail-unread-outline"></ion-icon></a>
						<a href="Monitoring-revision.php" button class = "nav"> Revsion <ion-icon name="warning-outline"></ion-icon></a>
						<a href="Monitoring-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
						<a href="Monitoring-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a>	
					</div>
				</th> 
			</tr>

			<tr  class="title">
				<th colspan="5" ><center>PENDING MONITORING REPORTS</th> 
			</tr>
				
			<tr>
				<th width="50px"> Proposal ID </th>
				<th width="350px"> Title </th>
				<th width="200px";> Creator</th>
				<th width="100px";> Status </th>
				<th width="270px";>  </th>
			</tr>


			<tr class="inputs">
				<td>sample4</td> >
				<td>sample4</td> 
				<td>sample4</td> 
				<td>sample4</td> d> 	
				<td width ="260px";>
					<a href="#" button class ="Pbtn">View</button> </a>
					<a href="#" button class ="Pbtn1">Revise</button> </a> 
					<a href="#" button class ="Pbtn2">Approved</button> </a>
					<a href="#" button class ="Pbtn3">Reject</button> </a>
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
		item.classList.remove('hovered));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink));
	</script>
<body>
</html>


<?php
if(isset($_GET['revise'])){
	$PID = $_GET['revise'];

	$sql = ("UPDATE create_alangilan SET Remarks = 'Need to Revise' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Proposal move to revision");
	echo "
		<script>
			alert('Proposal ID $PID Move to Revision');	
			window.location.href='Proposal.php';
		</script>";
}

if(isset($_GET['approved'])){
	$PID = $_GET['approved'];

	$sql = ("UPDATE create_alangilan SET Remarks = 'Approved' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Proposal Approval");
	echo "
		<script>
			alert('Proposal ID $PID APPROVED');	
			window.location.href='Proposal.php';
		</script>";
}

if(isset($_GET['reject'])){
	$PID = $_GET['reject'];

	$sql = ("UPDATE create_alangilan SET Remarks = 'Rejected' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Rejecting Proposal");
	echo "
		<script>
			alert('Proposal ID $PID REJECTED');	
			window.location.href='Proposal.php';
		</script>";
}



?>
