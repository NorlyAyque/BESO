<?php
session_start();
include("Connection.php");


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
<link rel="stylesheet" type="text/css" href="styles/Dashboards.css">
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
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td  rowspan="3" class="input1" ><input type = "number"></td>
					</tr>
					<tr>
						<th>CICS</th>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
					</tr>
					<tr>
						<th>CIT</th>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
					</tr>
					<tr>
						<th>Total</th>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td><input type = "number"></td>
						<td colspan="5" class="input2"><input type = "number"></td>
						<td class="input1"><input type = "number" ></td>
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
		window.onload = function () {
			const d = new Date();
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Extension PAP Progress " + d.getFullYear()
				
			},
			axisY:{
				includeZero: true
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "PAP Accomplished",
				indexLabel: "{y}",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "PAP Remaining",
				indexLabel: "{y}",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "GAD Accomplished",
				indexLabel: "{y}",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "GAD Remaining",
				indexLabel: "{y}",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Total Accomplished PAP + GAD",
				indexLabel: "{y}",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		function toggleDataSeries(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart.render();
		}
		 
		}
</script>
	
<script>
//Set all textbox to readonly
document.getElementById("PAP1").readOnly = true;
document.getElementById("PAP2").readOnly = true;
document.getElementById("PAP3").readOnly = true;
document.getElementById("PAP4").readOnly = true;
document.getElementById("PAPT").readOnly = true;

document.getElementById("GAD1").readOnly = true;
document.getElementById("GAD2").readOnly = true;
document.getElementById("GAD3").readOnly = true;
document.getElementById("GAD4").readOnly = true;
document.getElementById("GADT").readOnly = true;

document.getElementById("APAP1").readOnly = true;
document.getElementById("APAP2").readOnly = true;
document.getElementById("APAP3").readOnly = true;
document.getElementById("APAP4").readOnly = true;
document.getElementById("APAPT").readOnly = true;

document.getElementById("RPAP1").readOnly = true;
document.getElementById("RPAP2").readOnly = true;
document.getElementById("RPAP3").readOnly = true;
document.getElementById("RPAP4").readOnly = true;
document.getElementById("RPAPT").readOnly = true;

document.getElementById("AGAD1").readOnly = true;
document.getElementById("AGAD2").readOnly = true;
document.getElementById("AGAD3").readOnly = true;
document.getElementById("AGAD4").readOnly = true;
document.getElementById("AGADT").readOnly = true;

document.getElementById("RGAD1").readOnly = true;
document.getElementById("RGAD2").readOnly = true;
document.getElementById("RGAD3").readOnly = true;
document.getElementById("RGAD4").readOnly = true;
document.getElementById("RGADT").readOnly = true;

document.getElementById("Save").style.display = "none";
document.getElementById("Update").style.display = "none";
document.getElementById("Cancel").style.display = "none";

</script>

<script>
function NewTarget() {
	var checkBox = document.getElementById("New");
	
	if (checkBox.checked == true){
		document.getElementById("PAP1").readOnly = false; document.getElementById("PAP1").value = 0;
		document.getElementById("PAP2").readOnly = false; document.getElementById("PAP2").value = 0;
		document.getElementById("PAP3").readOnly = false; document.getElementById("PAP3").value = 0;
		document.getElementById("PAP4").readOnly = false; document.getElementById("PAP4").value = 0; document.getElementById("PAPT").value = 0;

		document.getElementById("GAD1").readOnly = false; document.getElementById("GAD1").value = 0;
		document.getElementById("GAD2").readOnly = false; document.getElementById("GAD2").value = 0;
		document.getElementById("GAD3").readOnly = false; document.getElementById("GAD3").value = 0;
		document.getElementById("GAD4").readOnly = false; document.getElementById("GAD4").value = 0; document.getElementById("GADT").value = 0;

		document.getElementById("APAP1").value = 0;
		document.getElementById("APAP2").value = 0;
		document.getElementById("APAP3").value = 0;
		document.getElementById("APAP4").value = 0; 
		document.getElementById("APAPT").value = 0;

		document.getElementById("RPAP1").value = 0;
		document.getElementById("RPAP2").value = 0;
		document.getElementById("RPAP3").value = 0;
		document.getElementById("RPAP4").value = 0; 
		document.getElementById("RPAPT").value = 0;

		document.getElementById("AGAD1").value = 0;
		document.getElementById("AGAD2").value = 0;
		document.getElementById("AGAD3").value = 0;
		document.getElementById("AGAD4").value = 0;
		document.getElementById("AGADT").value = 0;
		
		document.getElementById("RGAD1").value = 0;
		document.getElementById("RGAD2").value = 0;
		document.getElementById("RGAD3").value = 0;
		document.getElementById("RGAD4").value = 0;
		document.getElementById("RGADT").value = 0;

		document.getElementById("EditField").style.display = "none";
		document.getElementById("Save").style.display = "block";
		document.getElementById("Cancel").style.display = "block";
		document.getElementById("New").style.display = "none";
	}
}

function EditTarget() {
	var checkBox = document.getElementById("Edit");
	
	if (checkBox.checked == true){
		document.getElementById("PAP1").readOnly = false;
		document.getElementById("PAP2").readOnly = false;
		document.getElementById("PAP3").readOnly = false;
		document.getElementById("PAP4").readOnly = false;
		
		document.getElementById("GAD1").readOnly = false;
		document.getElementById("GAD2").readOnly = false;
		document.getElementById("GAD3").readOnly = false;
		document.getElementById("GAD4").readOnly = false;
		
		document.getElementById("SetNewField").style.display = "none";
		document.getElementById("Update").style.display = "block";
		document.getElementById("Cancel").style.display = "block";
		document.getElementById("Edit").style.display = "none";
	}
}

function CalPAP(){ //Auto Compute for PAP
	let PAP1 = document.getElementById('PAP1').value;
	let PAP2 = document.getElementById('PAP2').value;
	let PAP3 = document.getElementById('PAP3').value;
	let PAP4 = document.getElementById('PAP4').value;
	let ans = (parseInt(PAP1)) + (parseInt(PAP2)) + (parseInt(PAP3)) + (parseInt(PAP4));
	document.getElementById("PAPT").value = ans;

	let APAP1 = document.getElementById('APAP1').value;
	let APAP2 = document.getElementById('APAP2').value;
	let APAP3 = document.getElementById('APAP3').value;
	let APAP4 = document.getElementById('APAP4').value;
	
	let RPAP1 = PAP1 - APAP1; document.getElementById("RPAP1").value = RPAP1;
	let RPAP2 = PAP2 - APAP2; document.getElementById("RPAP2").value = RPAP2;
	let RPAP3 = PAP3 - APAP3; document.getElementById("RPAP3").value = RPAP3;
	let RPAP4 = PAP4 - APAP4; document.getElementById("RPAP4").value = RPAP4;

	let anss = (parseInt(RPAP1)) + (parseInt(RPAP2)) + (parseInt(RPAP3)) + (parseInt(RPAP4));
	document.getElementById("RPAPT").value = anss;
}

function CalGAD(){ //Auto Compute for GAD
	let GAD1 = document.getElementById('GAD1').value;
	let GAD2 = document.getElementById('GAD2').value;
	let GAD3 = document.getElementById('GAD3').value;
	let GAD4 = document.getElementById('GAD4').value;
	let ans = (parseInt(GAD1)) + (parseInt(GAD2)) + (parseInt(GAD3)) + (parseInt(GAD4));
	document.getElementById("GADT").value = ans;

	let AGAD1 = document.getElementById('AGAD1').value;
	let AGAD2 = document.getElementById('AGAD2').value;
	let AGAD3 = document.getElementById('AGAD3').value;
	let AGAD4 = document.getElementById('AGAD4').value;
	
	let RGAD1 = GAD1 - AGAD1; document.getElementById("RGAD1").value = RGAD1;
	let RGAD2 = GAD2 - AGAD2; document.getElementById("RGAD2").value = RGAD2;
	let RGAD3 = GAD3 - AGAD3; document.getElementById("RGAD3").value = RGAD3;
	let RGAD4 = GAD4 - AGAD4; document.getElementById("RGAD4").value = RGAD4;

	let anss = (parseInt(RGAD1)) + (parseInt(RGAD2)) + (parseInt(RGAD3)) + (parseInt(RGAD4));
	document.getElementById("RGADT").value = anss;
}
</script>

<?php
if (isset($_POST['Save'])){
	
	$PAP1 = htmlspecialchars($_POST['PAP1']);
	$PAP2 = htmlspecialchars($_POST['PAP2']);
	$PAP3 = htmlspecialchars($_POST['PAP3']);
	$PAP4 = htmlspecialchars($_POST['PAP4']);
	$PAPT = htmlspecialchars($_POST['PAPT']);

	$GAD1 = htmlspecialchars($_POST['GAD1']);
	$GAD2 = htmlspecialchars($_POST['GAD2']);
	$GAD3 = htmlspecialchars($_POST['GAD3']);
	$GAD4 = htmlspecialchars($_POST['GAD4']);
	$GADT = htmlspecialchars($_POST['GADT']);

	$APAP1 = htmlspecialchars($_POST['APAP1']);
	$APAP2 = htmlspecialchars($_POST['APAP2']);
	$APAP3 = htmlspecialchars($_POST['APAP3']);
	$APAP4 = htmlspecialchars($_POST['APAP4']);
	$APAPT = htmlspecialchars($_POST['APAPT']);

	$RPAP1 = htmlspecialchars($_POST['RPAP1']);
	$RPAP2 = htmlspecialchars($_POST['RPAP2']);
	$RPAP3 = htmlspecialchars($_POST['RPAP3']);
	$RPAP4 = htmlspecialchars($_POST['RPAP4']);
	$RPAPT = htmlspecialchars($_POST['RPAPT']);

	$AGAD1 = htmlspecialchars($_POST['AGAD1']);
	$AGAD2 = htmlspecialchars($_POST['AGAD2']);
	$AGAD3 = htmlspecialchars($_POST['AGAD3']);
	$AGAD4 = htmlspecialchars($_POST['AGAD4']);
	$AGADT = htmlspecialchars($_POST['AGADT']);

	$RGAD1 = htmlspecialchars($_POST['RGAD1']);
	$RGAD2 = htmlspecialchars($_POST['RGAD2']);
	$RGAD3 = htmlspecialchars($_POST['RGAD3']);
	$RGAD4 = htmlspecialchars($_POST['RGAD4']);
	$RGADT = htmlspecialchars($_POST['RGADT']);

	//Verifying if Year is Existing
	$sqlexist = ("SELECT COUNT(*) as TotalCount FROM $target_table WHERE Year = '$YearToday'");
	$commandexist = $con->query($sqlexist) or die("Error Fetching Data");
	while($row = mysqli_fetch_array($commandexist)){$Count = $row['TotalCount'];}

	if ($Count == 1){
		echo "<script>
		alert('Target for this year $YearToday is already been set. Edit if you want to modify.');
		</script>";
	}else {
		$sql = ("INSERT INTO $target_table
		(Year, PAP1, PAP2, PAP3, PAP4, PAPT,
				GAD1, GAD2, GAD3, GAD4, GADT,
				APAP1, APAP2, APAP3, APAP4, APAPT,
				RPAP1, RPAP2, RPAP3, RPAP4, RPAPT,
				AGAD1, AGAD2, AGAD3, AGAD4, AGADT, 
				RGAD1, RGAD2, RGAD3, RGAD4, RGADT) 
		VALUES 
		('$YearToday', '$PAP1', '$PAP2', '$PAP3', '$PAP4', '$PAPT',
				'$GAD1', '$GAD2', '$GAD3', '$GAD4', '$GADT', 
				'$APAP1', '$PAAP2', '$APAP3', '$APAP4', '$APAPT',
				'$RPAP1', '$RPAP2', '$RPAP3', '$RPAP4', '$RPAPT',
				'$AGAD1', '$AGAD2', '$AGAD3', '$AGAD4', '$AGADT'
				'$RGAD1', '$RGAD2', '$RGAD3', '$RGAD4', '$RGADT')");
		$command = $con->query($sql) or die("Error Encounter while inserting Data");
		echo "<script>
		alert('Target Set Successfully');
		window.location='Dashboard.php';
		</script>";
	}
}

if (isset($_POST['Update'])){
	
	$PAP1 = htmlspecialchars($_POST['PAP1']);
	$PAP2 = htmlspecialchars($_POST['PAP2']);
	$PAP3 = htmlspecialchars($_POST['PAP3']);
	$PAP4 = htmlspecialchars($_POST['PAP4']);
	$PAPT = htmlspecialchars($_POST['PAPT']);

	$GAD1 = htmlspecialchars($_POST['GAD1']);
	$GAD2 = htmlspecialchars($_POST['GAD2']);
	$GAD3 = htmlspecialchars($_POST['GAD3']);
	$GAD4 = htmlspecialchars($_POST['GAD4']);
	$GADT = htmlspecialchars($_POST['GADT']);

	$APAP1 = htmlspecialchars($_POST['APAP1']);
	$APAP2 = htmlspecialchars($_POST['APAP2']);
	$APAP3 = htmlspecialchars($_POST['APAP3']);
	$APAP4 = htmlspecialchars($_POST['APAP4']);
	$APAPT = htmlspecialchars($_POST['APAPT']);

	$RPAP1 = htmlspecialchars($_POST['RPAP1']);
	$RPAP2 = htmlspecialchars($_POST['RPAP2']);
	$RPAP3 = htmlspecialchars($_POST['RPAP3']);
	$RPAP4 = htmlspecialchars($_POST['RPAP4']);
	$RPAPT = htmlspecialchars($_POST['RPAPT']);

	$AGAD1 = htmlspecialchars($_POST['AGAD1']);
	$AGAD2 = htmlspecialchars($_POST['AGAD2']);
	$AGAD3 = htmlspecialchars($_POST['AGAD3']);
	$AGAD4 = htmlspecialchars($_POST['AGAD4']);
	$AGADT = htmlspecialchars($_POST['AGADT']);

	$RGAD1 = htmlspecialchars($_POST['RGAD1']);
	$RGAD2 = htmlspecialchars($_POST['RGAD2']);
	$RGAD3 = htmlspecialchars($_POST['RGAD3']);
	$RGAD4 = htmlspecialchars($_POST['RGAD4']);
	$RGADT = htmlspecialchars($_POST['RGADT']);
	
	$sql = ("UPDATE target_alangilan 
		SET PAP1 = $PAP1, PAP2 = $PAP2, PAP3 = $PAP3, PAP4 = $PAP4, PAPT = $PAPT, 
			GAD1 = $GAD1, GAD2 = $GAD2, GAD3 = $GAD3, GAD4 = $GAD4, GADT = $GADT,
			APAP1 = $APAP1, APAP2 = $APAP2, APAP3 = $APAP3, APAP4 = $APAP4, APAPT = $APAPT,
			RPAP1 = $RPAP1, RPAP2 = $RPAP2, RPAP3 = $RPAP3, RPAP4 = $RPAP4, RPAPT = $RPAPT,
			AGAD1 = $AGAD1, AGAD2 = $AGAD2, AGAD3 = $AGAD3, AGAD4 = $AGAD4, AGADT = $AGADT,
			RGAD1 = $RGAD1, RGAD2 = $RGAD2, RGAD3 = $RGAD3, RGAD4 = $RGAD4, RGADT = $RGADT
		WHERE Year = $YearToday");
	$command = $con->query($sql) or die("Error encounter while updating data");
		
	echo "<script>
		alert('Target Updated Successfully');
		window.location='Dashboard.php';
	</script>";
}

?>