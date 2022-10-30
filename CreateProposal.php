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
<link rel="stylesheet" type="text/css" href="styles/Create-Proposals.css">

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
				<a class="active" href="CreateProposal.php">
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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>

	<form action="" method="post">
			<table class="header">
				<tr class="title">
					<th colspan="3">
						EXTENSION PROGRAM PLAN/PROJECT PROPOSAL	
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
				<tr  class ="select2">
					<th> <input type="radio" id="ExtensionPAP" name="1" value="ExtensionPAP" required> Extension PAP</th>
					<th> <input type="radio" id="Monitoring" name="1" value="Monitoring" required> Monitoring </th>
					<th> <input type="radio" id="Impact" name="1" value="Impact" required> Impact Assessment</th>	
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
						 
						<label><b>lV. Type of Communuty Extension Service</b></label>
						<div class="checkbox" >
							<button onclick="openForm()"> Please Select one or more types..  </button>
						</div>
						<div class="form-popup" id="myForm">
							<label class="check" value=""><span>1. Smart Analytics and Engineering</span>
								<input type="checkbox" checked="checked">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>2. Environment and Ntural Resources Conservation, Protection and Rehabilitation Program</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>3. Adopt-A-Barangay/Municipality/School/Social Development through BIDANI Implementation</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>4. Community Outreach Program</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>5. Technical-Vocational Education and Training(TVET)Program on Agri-Fishery and Related Program for Farmers and Fisherfolks</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>6. Technology Transfer, Utilization and Commercialization Program</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>7. Technical Assistance and Advisory Program to Agencies, Organizations, Associations and Other Groups</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>8. Parent's Empowerment through Social Development(PESODEV)Program</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>9. Genger and Development</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>10. Disaster Preparedness and Response/Climate Change Adaptation</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>11. BatStateU Inclusive Social Innovation for Regional Growth(BISIG)Program</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<label class="check"value=""><span>12. Livelihood and other Entrepreneurship related on Agri-Fisheries(LEAF)</span>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<button type="button" class="btncancel" onclick="closeForm()">CLOSE</button>
						</div>
							<textarea placeholder="..." name="lV" required></textarea>
							
							
						<label><b>V. Sustatinable Development Goals (SDG)</b></label>
							<!-- -->
							<div class="checkbox1" >
								<button onclick="openForm1()"> Please Select one or more types..  </button>
							</div>
							<div class="form-popup1" id="myForm1">
								<label class="check"value=""><span>1. No povery</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"value=""><span>2. Zero hunger</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>3. Good health and well-being</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>4. Quality education</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"value=""><span>5. Genger equality</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>6. Clean water and sanitation</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>7. Affordableand clean energy</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>8. Decent work and economic growth</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>9. Industry, innovation and infrastructure</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>10. Reduced inequalities</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>11. Sustainable cities and communities</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>12. Resonsible comsumption and production</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>13. Climate action</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"value=""><span>14. Life below water</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"value=""><span>15. Life on land</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>16. Peace, justice and strong institution</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<label class="check"value=""><span>16. Peace, justice and strong institution</span>
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm1()">CLOSE</button>
							</div>
							
						<textarea placeholder="..." name="V" required></textarea>
				
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
						<table class="MaleFemale">	
								<tr class="th1">
									<th></th>
									<th> <p>Total No. of Male and Female<p> </th>
								</tr>	
								<tr class="MF" >
									<td width="100px"  >Male</td>
									<td><input type="number"> </input></td> 
								
								</tr>
								<tr class="MF" >
									<td >Female</td>
									<td><input type="number"> </input></td> 
								</tr>
							</table>
						
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
				<input type="submit" class="btn" name="Save" value="Save">
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
		item.classList.remove('hovered'));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink);
	</script>
	
	<script>
		function openForm() {
		document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		}
	</script>
	
	<script>
		function openForm1() {
		document.getElementById("myForm1").style.display = "block";
		}

		function closeForm1() {
		  document.getElementById("myForm1").style.display = "none";
		}
	</script>
	
	<script>
		function openForm2() {
		document.getElementById("myForm2").style.display = "block";
		}

		function closeForm2() {
		  document.getElementById("myForm2").style.display = "none";
		}
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