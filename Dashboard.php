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
						<th colspan="5">Number of Active Partnership with LGUs,Industries,NGOs,NGAs, SMEs, and other stake holder as a result of extension activities</th>
						<th colspan="5">Number of Trainees weight by length of training </th>
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
						<td><input type = "number" min="0" name="ACEAFA" id="ACEAFA" value="<?php echo $dbACEAFA;?>"></td>
						<td><input type = "number" min="0" name="CEAFA1" id="CEAFA1" value="<?php echo $dbCEAFA1;?>" onchange="CalCEAFA()"></td>
						<td><input type = "number" min="0" name="CEAFA2" id="CEAFA2" value="<?php echo $dbCEAFA2;?>" onchange="CalCEAFA()"></td>
						<td><input type = "number" min="0" name="CEAFA3" id="CEAFA3" value="<?php echo $dbCEAFA3;?>" onchange="CalCEAFA()"></td>
						<td><input type = "number" min="0" name="CEAFA4" id="CEAFA4" value="<?php echo $dbCEAFA4;?>" onchange="CalCEAFA()"></td>
						<td><input type = "number" min="0" name="CEAFAT" id="CEAFAT" value="<?php echo $dbCEAFAT;?>"> </td> 
						
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
						<td><input type = "number" min="0" name="BCICS" id="BCICS" value="<?php echo $dbBCICS;?>"></td>
						<td><input type = "number" min="0" name="CICS1" id="CICS1" value="<?php echo $dbCICS1;?>" onchange="CalCICS()"></td>
						<td><input type = "number" min="0" name="CICS2" id="CICS2" value="<?php echo $dbCICS2;?>" onchange="CalCICS()"></td>
						<td><input type = "number" min="0" name="CICS3" id="CICS3" value="<?php echo $dbCICS3;?>" onchange="CalCICS()"></td>
						<td><input type = "number" min="0" name="CICS4" id="CICS4" value="<?php echo $dbCICS4;?>" onchange="CalCICS()"></td>
						<td><input type = "number" min="0" name="CICST" id="CICST" value="<?php echo $dbCICST;?>"> </td> 
						
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
						<td><input type = "number" min="0" name="CCIT" id="CCIT" value="<?php echo $dbCCIT;?>"></td>
						<td><input type = "number" min="0" name="CIT1" id="CIT1" value="<?php echo $dbCIT1;?>" onchange="CalCIT()"></td>
						<td><input type = "number" min="0" name="CIT2" id="CIT2" value="<?php echo $dbCIT2;?>" onchange="CalCIT()"></td>
						<td><input type = "number" min="0" name="CIT3" id="CIT3" value="<?php echo $dbCIT3;?>" onchange="CaCIT()"></td>
						<td><input type = "number" min="0" name="CIT4" id="CIT4" value="<?php echo $dbCIT4;?>" onchange="CalCIT()"></td>
						<td><input type = "number" min="0" name="CITT" id="CITT" value="<?php echo $dbCITT;?>"> </td> 
						
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


<script>
function CalCEAFA(){ //Auto Compute for CEAFA
	let CEAFA1 = document.getElementById('CEAFA1').value;
	let CEAFA2 = document.getElementById('CEAFA2').value;
	let CEAFA3 = document.getElementById('CEAFA3').value;
	let CEAFA4 = document.getElementById('CEAFA4').value;
	let ans = (parseInt(CEAFA1)) + (parseInt(CEAFA2)) + (parseInt(CEAFA3)) + (parseInt(CEAFA4));
	document.getElementById("CEAFAT").value = ans;
	
}
function CalCICS(){ //Auto Compute for CICS
	let CICS1 = document.getElementById('CICS1').value;
	let CICS2 = document.getElementById('CICS2').value;
	let CICS3 = document.getElementById('CICS3').value;
	let CICS4 = document.getElementById('CICS4').value;
	let ans = (parseInt(CICS1)) + (parseInt(CICS2)) + (parseInt(CICS3)) + (parseInt(CICS4));
	document.getElementById("CICST").value = ans;
}
function CalCIT(){ //Auto Compute for CIT
	let CIT1 = document.getElementById('CIT1').value;
	let CIT2 = document.getElementById('CIT2').value;
	let CIT3 = document.getElementById('CIT3').value;
	let CIT4 = document.getElementById('CIT4').value;
	let ans = (parseInt(CIT1)) + (parseInt(CIT2)) + (parseInt(CIT3)) + (parseInt(CIT4));
	document.getElementById("CITT").value = ans;
	
}
</script>