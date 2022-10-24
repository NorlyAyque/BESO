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
<title>Update Proposal</title>
<link rel="stylesheet" type="text/css" href="styles/EditProposal.css">

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
				<a class="active" href="EditProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Edit Proposal </span>
				</a>
			</li>
			<li>
				<a href="EditEvaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title">  Edit Evaluation  Reports</span>
				</a>
			</li>
			<li>
				<a href="EditMonitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title">  Edit Monitoring  Reports </span>
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

	<form action="" method="post">
			<table class="header">
				<tr class="title">
					<th colspan="3">
						EDIT EXTENSION PROGRAM PLAN/PROJECT PROPOSAL	
					</th> 
				</tr>
				<tr class ="select">
					<th colspan="2">
						<input type="radio" id="Client" name="Initiated" value="Client" required> Extension Service Program/Project/Activity is requested by clients.</th>
					<th colspan="2">
						<input type="radio" id="Department" name="Initiated" value="Department" required> Extension Service Program/Project/Activity is Departments initiative.</th>
				</tr>	
			</table>
	
			<table class="header1">
				<tr  class ="select1">
					<th> <input type="radio" id="Program" name="Classification" value="Program" required> Program</th>
					<th> <input type="radio" id="Project" name="Classification" value="Project" required> Project </th>
					<th> <input type="radio" id="Activity" name="Classification" value="Activity" required> Activity</th>	
				</tr>
			</table>
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
					<td><textarea placeholder="Your Name" name="Sign1_1" required></textarea></td>
					<td><textarea placeholder="Designation" name="Sign1_2" required></textarea></td>
				</tr>
				<tr>
					<td> Review by:</td>
					<td><textarea placeholder="Your Name" name="Sign2_1" required></textarea></td>
					<td><textarea placeholder="Designation" name="Sign2_2" required></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td><textarea placeholder="Your Name" name="Sign3_1" required></textarea></td>
					<td><textarea placeholder="Designation" name="Sign3_2" required></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td><textarea placeholder="Your Name" name="Sign4_1" required></textarea></td>
					<td><textarea placeholder="Designation" name="Sign4_2" required></textarea></td>
				</tr>
				<tr>
					<td>Approved by:</td>
					<td><textarea placeholder="Your Name" name="Sign5_1" required></textarea></td>
					<td><textarea placeholder="Designation" name="Sign5_2" required></textarea></td>
				</tr>
			</table>
			<div class="button">
				<input type="submit" class="btn" name="Save" value="Update">
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

//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset($_POST['Save'])) {

	$Initiated = $_POST["Initiated"];
	$Classification = $_POST["Classification"];

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

	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']); $Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']); $Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']); $Sign3_2 = htmlspecialchars($_POST['Sign3_2']);
	$Sign4_1 = htmlspecialchars($_POST['Sign4_1']); $Sign4_2 = htmlspecialchars($_POST['Sign4_2']);
	$Sign5_1 = htmlspecialchars($_POST['Sign5_1']); $Sign5_2 = htmlspecialchars($_POST['Sign5_2']);

	$sql = ("INSERT INTO create_alangilan
		(AccountID, Date_Time, Initiated, Classification, 
				Title, Location_Area, Duration, TypeCES,
				SDG, Office, Programs, People, Agencies, 
				Beneficiaries, Cost, Rationale, Objectives, Descriptions,
				Financial, Functional, Monitoring, Plans, Remarks,
				Sign1_1, Sign1_2, Sign2_1, Sign2_2, Sign3_1, Sign3_2,
				Sign4_1, Sign4_2, Sign5_1, Sign5_2)
		VALUES 
		('$AID', '$DateTime', '$Initiated', '$Classification',
				'$I', '$II', '$III', '$IV', '$V', 
				'$VI', '$VII', '$VIII', '$IX', '$X', 
				'$XI', '$XII', '$XIII', '$XIV','$XV', 
				'$XVI', '$XVII', '$XVIII', 'PENDING',
				'$Sign1_1', '$Sign1_2', '$Sign2_1', '$Sign2_2', '$Sign3_1', '$Sign3_2',
				'$Sign4_1', '$Sign4_2', '$Sign5_1', '$Sign5_2')");
	
		$command = $con->query($sql);
		echo "<script>
		alert('Proposal Successfully Created');
		</script>";
}
?>