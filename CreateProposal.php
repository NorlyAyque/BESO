<?php
session_start();
include("Connection.php");

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"];
$create_table = $_SESSION["create_table"];


date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Create Proposal</title>
<link rel="stylesheet" type="text/css" href="styles/Create-proposal.css">

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
				<a class="active" href="CreateProposal.php">
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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
				<table class="header">
				<tr class="title">
					<th colspan="3">
						EXTENSION PROGRAM PLAN/PROJECT PROPOSAL	
					</th> 
				</tr>
				<tr class ="select">
					<th colspan="2">
					<label> <input type="checkbox">Extension Service Program/Project/Activity is requested by clients. <label></th>
					<th colspan="2">
					<label> <input type="checkbox">Extension Service Program/Project/Activity is Department’s initiative. <label></th>
				</tr>	
			</table>
			<table class="header1">
				<tr  class ="select1">
					<th> <input type="checkbox"> Program</th>
					<th> <input type="checkbox"> Project </th>
					<th> <input type="checkbox"> Activity</th>
						
				</tr>
			</table>
	<form method="post">
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title <label>
						<textarea class="font" placeholder="type Here..." name="I" required></textarea>
						 
						<label> ll. Location <label>
						<textarea placeholder="type here..." name="II" required></textarea> 
						
						<label> lll. Duration <label>
						<textarea placeholder="type here..." name="III" required></textarea>
						 
						<label> lV. Type of Communuty Extension Service <label>
						<textarea placeholder="type here..." name="IV" required></textarea>
						
						<label>  V. Sustatinable Development Goals (SDG) <label>
						<textarea placeholder="type here..." name="V" required></textarea>
						
						<label>  Vl. Office/ College/s Involved <label>
						<textarea placeholder="type here..." name="VI" required></textarea>
						
						<label>  Vll. Program/s Involved<i>(specify the programs under the college implementing the project)</i><label>
						<textarea placeholder="type here..." name="VII" required></textarea>
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i><label>
						<textarea placeholder="type here..." name="VIII" required></textarea>
						
						<label> lX. Partner Agencies<label>
						<textarea placeholder="type here..." name="IX" required></textarea>
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label> X. Beneficiaries <i>(Type and Number of Male & Female)</i><label>
						<textarea placeholder="type here..." name="X" required></textarea>
						
						<label> Xl. Total Cost and Sources of Funds<label>
						<textarea placeholder="type here..." name="XI" required></textarea>
						
						<label> Xll. Rationale<i>(brief description of the situation)</i><label>
						<textarea placeholder="type here..." name="XII" required></textarea>
						
						<label> Xlll. Objectives<i>(General and Specific)</i><label>
						<textarea placeholder="type here..." name="XIII" required></textarea>

						<label> XlV. Description, Strategies and Methods <i>(Activities/Schedule)</i><label>
						<textarea placeholder="type here..." name="XIV" required></textarea>
						
						<label> XV. Financial Plan</i><label>
						<textarea placeholder="type here..." name="XV" required></textarea>
						
						<label> XVl. Functional Relationships with the partner <i>(Duties/Task of the Partner Agencies)</i><label>
						<textarea placeholder="type here..." name="XVI" required></textarea>
						
						<label> XVll. Monitoring and Evaluation Mechanics/Plan<label>
						<textarea placeholder="type here..." name="XVII" required></textarea>
						
						<label> XVlll. Sustainability Plan<label>
						<textarea placeholder="type here..." name="XVIII" required></textarea>
				  </div>
				</div>
			</div>
			
			<table class="signiture">
				<tr>
					<th></th>
					<th> Name </th>
					<th> Designation </th>
				</tr>
				<tr>
					<td> Prepared by:</td>
					<td><textarea placeholder="type here..."></textarea></td>
					<td><textarea placeholder="type here..."></textarea></td>
				</tr>
				<tr>
					<td> Review by:</td>
					<td><textarea placeholder="type here..."></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td><textarea placeholder="type here..."></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td><textarea placeholder="type here..."></textarea></td>
				</tr>
				<tr>
					<td>Approved by:</td>
					<td><textarea placeholder="type here..."></textarea></td>
				</tr>
			</table>
			
			
			<div class="button">
				<button type="submit" class="btn" name="=Save">Save </button>
			</div>
		</div>
	</form>

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
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$Classification = "To be Coded";

	$I = htmlspecialchars($_POST['I']);
	$II = htmlspecialchars($_POST['II']);
	$III = htmlspecialchars($_POST['III']);
	$IV = htmlspecialchars($_POST['IV']);
	$V = htmlspecialchars($_POST['V']);
	$VI = htmlspecialchars($_POST['VI']);
	$VII = htmlspecialchars($_POST['VII']);
	$VIII = htmlspecialchars($_POST['VIII']);
	$IX = htmlspecialchars($_POST['IX']);
	$X = htmlspecialchars($_POST['X']);
	$XI = htmlspecialchars($_POST['XII']);
	$XII = htmlspecialchars($_POST['XII']);
	$XIII = htmlspecialchars($_POST['XIII']);
	$XIV = htmlspecialchars($_POST['XIV']);
	$XV = htmlspecialchars($_POST['XV']);
	$XVI = htmlspecialchars($_POST['XVI']);
	$XVII = htmlspecialchars($_POST['XVII']);
	$XVIII = htmlspecialchars($_POST['XVIII']);

	$sql = ("INSERT INTO $create_table
		(AccountID, Date_Time, Title, Location_Area, Duration, TypeCES,
				SDG, Office, Programs, People, Agencies, 
				Beneficiaries, Cost, Rationale, Objectives, Descriptions,
				Financial, Functional, Monitoring, Plans, Remarks, Classification)
		VALUES 
		('$AID', '$DateTime', '$I', '$II', '$III', '$IV',
				'$V', '$VI', '$VII', '$VIII', '$IX', 
				'$X', '$XI', '$XII', '$XIII', '$XIV',
				'$XV', '$XVI', '$XVII', '$XVIII', 'PENDING', 'PAP')");
	$command = $con->query($sql);
		echo "<script>
		alert('Proposal Successfully Created');
		</script>";
}

?>