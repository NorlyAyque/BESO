<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Session Variables from index.php
$College = $_SESSION["College"];
$Position = $_SESSION["Position"];

?>

<?php
//Default Values
	$dbCEAFA_AQ1 = $dbCEAFA_AQ2 = $dbCEAFA_AQ3 = $dbCEAFA_AQ4 = $dbCEAFA_AQT = "";
	$dbCEAFA_BQ1 = $dbCEAFA_BQ2 = $dbCEAFA_BQ3 = $dbCEAFA_BQ4 = $dbCEAFA_BQT = "";

	$dbCICS_AQ1 = $dbCICS_AQ2 = $dbCICS_AQ3 = $dbCICS_AQ4 = $dbCICS_AQT = "";
	$dbCICS_BQ1 = $dbCICS_BQ2 = $dbCICS_BQ3 = $dbCICS_BQ4 = $dbCICS_BQT = "";

	$dbCIT_AQ1 = $dbCIT_AQ2 = $dbCIT_AQ3 = $dbCIT_AQ4 = $dbCIT_AQT = "";
	$dbCIT_BQ1 = $dbCIT_BQ2 = $dbCIT_BQ3 = $dbCIT_BQ4 = $dbCIT_BQT = "";

	$dbAT_Q1 = $dbAT_Q2 = $dbAT_Q3 = $dbAT_Q4 = $dbAT_QT = "";
	$dbBT_Q1 = $dbBT_Q2 = $dbBT_Q3 = $dbBT_Q4 = $dbBT_QT = "";
	
	$dbT_R1Q1 = $dbT_R1Q2 = $dbT_R1Q3 = $dbT_R1Q4 = $dbT_R1_T = "";
	$dbT_R2Q1 = $dbT_R2Q2 = $dbT_R2Q3 = $dbT_R2Q4 = $dbT_R2_T = "";
	$dbT_R3Q1 = $dbT_R3Q2 = $dbT_R3Q3 = $dbT_R3Q4 = $dbT_R3_T = "";
	$dbT_R4Q1 = $dbT_R4Q2 = $dbT_R4Q3 = $dbT_R4Q4 = $dbT_R4_T = "";

	$dbP_R1Q1 = $dbP_R1Q2 = $dbP_R1Q3 = $dbP_R1Q4 = $dbP_R1_T = "";
	$dbP_R2Q1 = $dbP_R2Q2 = $dbP_R2Q3 = $dbP_R2Q4 = $dbP_R2_T = "";
	$dbP_R3Q1 = $dbP_R3Q2 = $dbP_R3Q3 = $dbP_R3Q4 = $dbP_R3_T = "";
	$dbPercentageTotal = $dbBudget = "";

//Display Data of Target and Actual
$sql = ("SELECT * FROM target_alangilan WHERE Year = '$CustomYear'");
$command = $con->query($sql) or die("Error Fethcing data");
while($result = mysqli_fetch_array($command))
{
	$dbCEAFA_AQ1 = $result["CEAFA_AQ1"];
	$dbCEAFA_AQ2 = $result["CEAFA_AQ2"];
	$dbCEAFA_AQ3 = $result["CEAFA_AQ3"];
	$dbCEAFA_AQ4 = $result["CEAFA_AQ4"];
	$dbCEAFA_AQT = $result["CEAFA_AQT"];

	$dbCICS_AQ1 = $result["CICS_AQ1"];
	$dbCICS_AQ2 = $result["CICS_AQ2"];
	$dbCICS_AQ3 = $result["CICS_AQ3"];
	$dbCICS_AQ4 = $result["CICS_AQ4"];
	$dbCICS_AQT = $result["CICS_AQT"];

	$dbCIT_AQ1 = $result["CIT_AQ1"];
	$dbCIT_AQ2 = $result["CIT_AQ2"];
	$dbCIT_AQ3 = $result["CIT_AQ3"];
	$dbCIT_AQ4 = $result["CIT_AQ4"];
	$dbCIT_AQT = $result["CIT_AQT"];

	$dbCEAFA_BQ1 = $result["CEAFA_BQ1"];
	$dbCEAFA_BQ2 = $result["CEAFA_BQ2"];
	$dbCEAFA_BQ3 = $result["CEAFA_BQ3"];
	$dbCEAFA_BQ4 = $result["CEAFA_BQ4"];
	$dbCEAFA_BQT = $result["CEAFA_BQT"];

	$dbCICS_BQ1 = $result["CICS_BQ1"];
	$dbCICS_BQ2 = $result["CICS_BQ2"];
	$dbCICS_BQ3 = $result["CICS_BQ3"];
	$dbCICS_BQ4 = $result["CICS_BQ4"];
	$dbCICS_BQT = $result["CICS_BQT"];

	$dbCIT_BQ1 = $result["CIT_BQ1"];
	$dbCIT_BQ2 = $result["CIT_BQ2"];
	$dbCIT_BQ3 = $result["CIT_BQ3"];
	$dbCIT_BQ4 = $result["CIT_BQ4"];
	$dbCIT_BQT = $result["CIT_BQT"];
	
	$dbAT_Q1 = $result["AT_Q1"];
	$dbAT_Q2 = $result["AT_Q2"];
	$dbAT_Q3 = $result["AT_Q3"];
	$dbAT_Q4 = $result["AT_Q4"];
	$dbAT_QT = $result["AT_QT"];

	$dbBT_Q1 = $result["BT_Q1"];
	$dbBT_Q2 = $result["BT_Q2"];
	$dbBT_Q3 = $result["BT_Q3"];
	$dbBT_Q4 = $result["BT_Q4"];
	$dbBT_QT = $result["BT_QT"];

	$dbT_R1Q1 = $result["T_R1Q1"];
	$dbT_R1Q2 = $result["T_R1Q2"];
	$dbT_R1Q3 = $result["T_R1Q3"];
	$dbT_R1Q4 = $result["T_R1Q4"];
	$dbT_R1_T = $result["T_R1_T"];

	$dbT_R2Q1 = $result["T_R2Q1"];
	$dbT_R2Q2 = $result["T_R2Q2"];
	$dbT_R2Q3 = $result["T_R2Q3"];
	$dbT_R2Q4 = $result["T_R2Q4"];
	$dbT_R2_T = $result["T_R2_T"];

	$dbT_R3Q1 = $result["T_R3Q1"];
	$dbT_R3Q2 = $result["T_R3Q2"];
	$dbT_R3Q3 = $result["T_R3Q3"];
	$dbT_R3Q4 = $result["T_R3Q4"];
	$dbT_R3_T = $result["T_R3_T"];

	$dbT_R4Q1 = $result["T_R4Q1"];
	$dbT_R4Q2 = $result["T_R4Q2"];
	$dbT_R4Q3 = $result["T_R4Q3"];
	$dbT_R4Q4 = $result["T_R4Q4"];
	$dbT_R4_T = $result["T_R4_T"];

	$dbP_R1Q1 = $result["P_R1Q1"];
	$dbP_R1Q2 = $result["P_R1Q2"];
	$dbP_R1Q3 = $result["P_R1Q3"];
	$dbP_R1Q4 = $result["P_R1Q4"];
	$dbP_R1_T = $result["P_R1_T"];

	$dbP_R2Q1 = $result["P_R2Q1"];
	$dbP_R2Q2 = $result["P_R2Q2"];
	$dbP_R2Q3 = $result["P_R2Q3"];
	$dbP_R2Q4 = $result["P_R2Q4"];
	$dbP_R2_T = $result["P_R2_T"];

	$dbP_R3Q1 = $result["P_R3Q1"];
	$dbP_R3Q2 = $result["P_R3Q2"];
	$dbP_R3Q3 = $result["P_R3Q3"];
	$dbP_R3Q4 = $result["P_R3Q4"];
	$dbP_R3_T = $result["P_R3_T"];

	$dbPercentageTotal = $result["PercentageTotal"];
	$dbBudget = $result["Budget"];
}
include_once ("Dashboard-Computations.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Dashborad BESO Portal</title>
<link rel="stylesheet" type="text/css" href="styles/Dashboards.css">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> <!-- For Graph -->
</head>

<body onload="DisplayCharts()">

<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>
				
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a class="active" href="Dashboard.php">
					<span class ="icon"> <ion-icon name="home-outline"></ion-icon> </span>
					<span class ="title"> Home</span>
				</a>
			</li>
			<li>
				<a  href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
				</a>
			</li>
			<li>
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title">Project Proposals</span>
					<div class="notifDASH">
						<span class="icon-buttonDASH"><?php echo "$CountProposal";?></span>
					</div>
				</a>
			</li>
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL"><?php echo "$CountEvaluation";?></span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
					<div class="notifMONI">
						<span class="icon-buttonMONI"><?php echo "$CountMonitoring";?></span>
					</div>
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
				<div class="btnview" id="ViewTargetButton">
					<a href="View_Target.php" button class = "adduser"> View Target<ion-icon name="eye-outline"></ion-icon></a> </button>
				</div>
			</div>
			
<div id="TableForLabelText" style="display:none;">
	<table align="center" class="input" border="2" style="height:30px; width:97%; border-radius:30px;">
		<tr>
			<th style="border-radius:30px;"><h2 id="LabelText"></h1></th>
		</tr>
	</table>
</div>

<!-- Graph -->
<div class="graph">
	<center>
<table>
	<tr>
		<td id="ChartForCEAFA"><div id="ChartCEAFA" style="height: 350px; width: 310px;"></div></td>
		<td id="ChartForCICS"><div id="ChartCICS" style="height: 350px; width: 310px;"></div></td>
		<td id="ChartForCIT"><div id="ChartCIT" style="height: 350px; width: 310px;"></div></td>
	</tr>
</table>
</center>
	</div>

<form action="" method="POST">
	<div class ="scroll">
			<table class="input" id="TableForTargets">
				<tbody>
					<tr>
						<th colspan="23"> 
							<h1> EXTENSION SERVICES <?php echo "$CustomYear";?> TARGETS </h1>
							<p> BATANGAS STATE UNIVERSITY ALANGILAN </p>
						</th>
					</tr>
					<tr id="row">
						<th colspan="11"> 
							<div id="Enable_Dropdown" onclick="Enable_Dropdown()">Create Target</div>
							
								<a id="Dropdown" style="display:none"> 
									Set target for year: 
									<select name="Year" id="Year_DD" required>
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
										<option value="<?php echo "$CustomYear";?>" selected><?php echo "$CustomYear";?></option>
									</select>	
									<input type="submit" id="Createbtn" name="Createbtn" value="CREATE">
									<span id="Cancel" onclick="Cancel()">CANCEL</span>
								</a>						
						</th>	
						<th colspan="12" class="SaveCancel">
							<a id="Enable_SaveBtn" onclick="Enable_SaveBtn()">Edit Target/Actual</a>
							<a id="savebtn" style="display:none">
									<input type="submit" class="Ssave" name="Savebtn" value="Update"> 
									<span id="Cancel" onclick="Cancel()">Cancel</span>
							</a>
						</th>
					</tr>
<?php
//Account Restrictions
$UserPosition = $_SESSION["Position"];
if (($UserPosition == "Head") OR ($UserPosition == "Staff")) {
	//Code Continue
}else {
	echo "
	<script>
		document.getElementById('row').style.display  = 'none';
	</script>
	";
}
?>
					<tr>
						<th rowspan="3"width="200px";>College</p> </th>
						<th rowspan="3">Number of Programs</th>
						<th colspan="23">Indicator</th>
						
					</tr>
					<tr>
						<th colspan="5">Number of Active Partnership with LGUs, Industries, NGOs, NGAs, SMEs, and other stakeholders as a result of extension activities <br> (TARGET)</th>
						<th colspan="5">Number of Trainees weight by length of training </th>
						<th colspan="5">Number of extension programs organized and supported consistent with the SUC's mandated and priority programs <br> (ACTUAL) </th>
						<th colspan="5">Percentage of beneficiaries who rate the training course/s and advisory service as satisfactory or higher in terms of quality and relevance <br> (%)</th>
						<th rowspan="3">Budget </th>
					</tr>
					<tr>
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td >Total</td>
						
						
						<td >1st Qrt</td>
						<td >2nd Qrt</td>
						<td >3rd Qrt</td>
						<td >4th Qrt</td>
						<td >Total</td>
						
						<td >1st Qrt</td>
						<td >2nd Qrt</td>
						<td >3rd Qrt</td>
						<td >4th Qrt</td>
						<td >Total</td>
						
						<td >1st Qrt</td>
						<td >2nd Qrt</td>
						<td >3rd Qrt</td>
						<td >4th Qrt</td>
						<td >Total</td>
						
					</tr>
					<tr class="cols">
						<td colspan="23"></td>
						
					</tr>
					<tr >
						<th>CEAFA</th>
						<td>13</td>
						<td><input type = "number" min="0" name="CEAFA_AQ1" id="CEAFA_AQ1" value="<?php echo $dbCEAFA_AQ1;?>" onchange="CalCEAFA_A()"></td>
						<td><input type = "number" min="0" name="CEAFA_AQ2" id="CEAFA_AQ2" value="<?php echo $dbCEAFA_AQ2;?>" onchange="CalCEAFA_A()"></td>
						<td><input type = "number" min="0" name="CEAFA_AQ3" id="CEAFA_AQ3" value="<?php echo $dbCEAFA_AQ3;?>" onchange="CalCEAFA_A()"></td>
						<td><input type = "number" min="0" name="CEAFA_AQ4" id="CEAFA_AQ4" value="<?php echo $dbCEAFA_AQ4;?>" onchange="CalCEAFA_A()"></td>
						<td><input type = "number" min="0" name="CEAFA_AQT" id="CEAFA_AQT" value="<?php echo $dbCEAFA_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="T_R1Q1" id="T_R1Q1" value="<?php echo "$dbT_R1Q1";?>" readonly></td> <!-- Trainees Row 1 Q1 -->
						<td><input type = "number" min="0" name="T_R1Q2" id="T_R1Q2" value="<?php echo "$dbT_R1Q2";?>" readonly></td> <!-- Trainees Row 1 Q2 -->
						<td><input type = "number" min="0" name="T_R1Q3" id="T_R1Q3" value="<?php echo "$dbT_R1Q3";?>" readonly></td> <!-- Trainees Row 1 Q3 -->
						<td><input type = "number" min="0" name="T_R1Q4" id="T_R1Q4" value="<?php echo "$dbT_R1Q4";?>" readonly></td> <!-- Trainees Row 1 Q4 -->
						<td><input type = "number" min="0" name="T_R1_T" id="T_R1_T" value="<?php echo "$dbT_R1_T";?>" readonly></td> <!-- Trainees Row 1 Total -->
						
						<td><input type = "number" min="0" name="CEAFA_BQ1" id="CEAFA_BQ1" value="<?php echo $dbCEAFA_BQ1;?>" onchange="CalCEAFA_B()"></td>
						<td><input type = "number" min="0" name="CEAFA_BQ2" id="CEAFA_BQ2" value="<?php echo $dbCEAFA_BQ2;?>" onchange="CalCEAFA_B()"></td>
						<td><input type = "number" min="0" name="CEAFA_BQ3" id="CEAFA_BQ3" value="<?php echo $dbCEAFA_BQ3;?>" onchange="CalCEAFA_B()"></td>
						<td><input type = "number" min="0" name="CEAFA_BQ4" id="CEAFA_BQ4" value="<?php echo $dbCEAFA_BQ4;?>" onchange="CalCEAFA_B()"></td>
						<td><input type = "number" min="0" name="CEAFA_BQT" id="CEAFA_BQT" value="<?php echo $dbCEAFA_BQT;?>" readonly> </td> 

						<td><input type = "text" name="P_R1Q1" id="P_R1Q1" value="<?php echo "$dbP_R1Q1";?>%" readonly></td> <!-- Percentage Row 1 Q1 -->
						<td><input type = "text" name="P_R1Q2" id="P_R1Q2" value="<?php echo "$dbP_R1Q2";?>%" readonly></td> <!-- Percentage Row 1 Q2 -->
						<td><input type = "text" name="P_R1Q3" id="P_R1Q3" value="<?php echo "$dbP_R1Q3";?>%" readonly></td> <!-- Percentage Row 1 Q3 -->
						<td><input type = "text" name="P_R1Q4" id="P_R1Q4" value="<?php echo "$dbP_R1Q4";?>%" readonly></td> <!-- Percentage Row 1 Q4 -->
						<td><input type = "text" name="P_R1_T" id="P_R1_T" value="<?php echo "$dbP_R1_T";?>%" readonly></td> <!-- Percentage Row 1 Total -->
						
						<td  rowspan="3" class="input1" ><input type = "text" name = "Budget" id = "Budget" value="₱<?php echo "$dbBudget";?>" readonly></td>

					</tr>
					<tr>
						<th>CICS</th>
						<td>4</td>
						<td><input type = "number" min="0" name="CICS_AQ1" id="CICS_AQ1" value="<?php echo $dbCICS_AQ1;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ2" id="CICS_AQ2" value="<?php echo $dbCICS_AQ2;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ3" id="CICS_AQ3" value="<?php echo $dbCICS_AQ3;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ4" id="CICS_AQ4" value="<?php echo $dbCICS_AQ4;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQT" id="CICS_AQT" value="<?php echo $dbCICS_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="T_R2Q1" id="T_R2Q1" value="<?php echo "$dbT_R2Q1";?>" readonly></td> <!-- Trainees Row 2 Q1 -->
						<td><input type = "number" min="0" name="T_R2Q2" id="T_R2Q2" value="<?php echo "$dbT_R2Q2";?>" readonly></td> <!-- Trainees Row 2 Q2 -->
						<td><input type = "number" min="0" name="T_R2Q3" id="T_R2Q3" value="<?php echo "$dbT_R2Q3";?>" readonly></td> <!-- Trainees Row 2 Q3 -->
						<td><input type = "number" min="0" name="T_R2Q4" id="T_R2Q4" value="<?php echo "$dbT_R2Q4";?>" readonly></td> <!-- Trainees Row 2 Q4 -->
						<td><input type = "number" min="0" name="T_R2_T" id="T_R2_T" value="<?php echo "$dbT_R2_T";?>" readonly></td> <!-- Trainees Row 2 Total -->
						
						<td><input type = "number" min="0" name="CICS_BQ1" id="CICS_BQ1" value="<?php echo $dbCICS_BQ1;?>" onchange="CalCICS_B()"></td>
						<td><input type = "number" min="0" name="CICS_BQ2" id="CICS_BQ2" value="<?php echo $dbCICS_BQ2;?>" onchange="CalCICS_B()"></td>
						<td><input type = "number" min="0" name="CICS_BQ3" id="CICS_BQ3" value="<?php echo $dbCICS_BQ3;?>" onchange="CalCICS_B()"></td>
						<td><input type = "number" min="0" name="CICS_BQ4" id="CICS_BQ4" value="<?php echo $dbCICS_BQ4;?>" onchange="CalCICS_B()"></td>
						<td><input type = "number" min="0" name="CICS_BQT" id="CICS_BQT" value="<?php echo $dbCICS_BQT;?>" readonly> </td> 

						<td><input type = "text" name="P_R2Q1" id="P_R2Q1" value="<?php echo "$dbP_R2Q1";?>%" readonly></td> <!-- Percentage Row 2 Q1 -->
						<td><input type = "text" name="P_R2Q2" id="P_R2Q2" value="<?php echo "$dbP_R2Q2";?>%" readonly></td> <!-- Percentage Row 2 Q2 -->
						<td><input type = "text" name="P_R2Q3" id="P_R2Q3" value="<?php echo "$dbP_R2Q3";?>%" readonly></td> <!-- Percentage Row 2 Q3 -->
						<td><input type = "text" name="P_R2Q4" id="P_R2Q4" value="<?php echo "$dbP_R2Q4";?>%" readonly></td> <!-- Percentage Row 2 Q4 -->
						<td><input type = "text" name="P_R2_T" id="P_R2_T" value="<?php echo "$dbP_R2_T";?>%" readonly></td> <!-- Percentage Row 2 Total -->
						 
					</tr>
					<tr>
						<th>CIT</th>
						<td>6</td>
						<td><input type = "number" min="0" name="CIT_AQ1" id="CIT_AQ1" value="<?php echo $dbCIT_AQ1;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ2" id="CIT_AQ2" value="<?php echo $dbCIT_AQ2;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ3" id="CIT_AQ3" value="<?php echo $dbCIT_AQ3;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ4" id="CIT_AQ4" value="<?php echo $dbCIT_AQ4;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQT" id="CIT_AQT" value="<?php echo $dbCIT_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="T_R3Q1" id="T_R3Q1" value="<?php echo "$dbT_R3Q1";?>" readonly></td> <!-- Trainees Row 3 Q1 -->
						<td><input type = "number" min="0" name="T_R3Q2" id="T_R3Q2" value="<?php echo "$dbT_R3Q2";?>" readonly></td> <!-- Trainees Row 3 Q2 -->
						<td><input type = "number" min="0" name="T_R3Q3" id="T_R3Q3" value="<?php echo "$dbT_R3Q3";?>" readonly></td> <!-- Trainees Row 3 Q3 -->
						<td><input type = "number" min="0" name="T_R3Q4" id="T_R3Q4" value="<?php echo "$dbT_R3Q4";?>" readonly></td> <!-- Trainees Row 3 Q4 -->
						<td><input type = "number" min="0" name="T_R3_T" id="T_R3_T" value="<?php echo "$dbT_R3_T";?>" readonly></td> <!-- Trainees Row 3 Total -->

						<td><input type = "number" min="0" name="CIT_BQ1" id="CIT_BQ1" value="<?php echo $dbCIT_BQ1;?>" onchange="CalCIT_B()"></td>
						<td><input type = "number" min="0" name="CIT_BQ2" id="CIT_BQ2" value="<?php echo $dbCIT_BQ2;?>" onchange="CalCIT_B()"></td>
						<td><input type = "number" min="0" name="CIT_BQ3" id="CIT_BQ3" value="<?php echo $dbCIT_BQ3;?>" onchange="CalCIT_B()"></td>
						<td><input type = "number" min="0" name="CIT_BQ4" id="CIT_BQ4" value="<?php echo $dbCIT_BQ4;?>" onchange="CalCIT_B()"></td>
						<td><input type = "number" min="0" name="CIT_BQT" id="CIT_BQT" value="<?php echo $dbCIT_BQT;?>" readonly> </td> 

						<td><input type = "text" name="P_R3Q1" id="P_R3Q1" value="<?php echo "$dbP_R3Q1";?>%" readonly></td> <!-- Percentage Row 3 Q1 -->
						<td><input type = "text" name="P_R3Q2" id="P_R3Q2" value="<?php echo "$dbP_R3Q2";?>%" readonly></td> <!-- Percentage Row 3 Q2 -->
						<td><input type = "text" name="P_R3Q3" id="P_R3Q3" value="<?php echo "$dbP_R3Q3";?>%" readonly></td> <!-- Percentage Row 3 Q3 -->
						<td><input type = "text" name="P_R3Q4" id="P_R3Q4" value="<?php echo "$dbP_R3Q4";?>%" readonly></td> <!-- Percentage Row 3 Q4 -->
						<td><input type = "text" name="P_R3_T" id="P_R3_T" value="<?php echo "$dbP_R3_T";?>%" readonly></td> <!-- Percentage Row 3 Total -->
						
					</tr>
					<tr>
						<th>Total</th> 
						<td>23</td>
						<td><input type = "number" min="0" name="AT_Q1" id="AT_Q1" value="<?php echo $dbAT_Q1;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q2" id="AT_Q2" value="<?php echo $dbAT_Q2;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q3" id="AT_Q3" value="<?php echo $dbAT_Q3;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q4" id="AT_Q4" value="<?php echo $dbAT_Q4;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_QT" id="AT_QT" value="<?php echo $dbAT_QT;?>" readonly></td>

						<td><input type = "number" min="0" name="T_R4Q1" id="T_R4Q1" value="<?php echo "$dbT_R4Q1";?>" readonly></td> <!-- Trainees Row 4 Q1 -->
						<td><input type = "number" min="0" name="T_R4Q2" id="T_R4Q2" value="<?php echo "$dbT_R4Q2";?>" readonly></td> <!-- Trainees Row 4 Q2 -->
						<td><input type = "number" min="0" name="T_R4Q3" id="T_R4Q3" value="<?php echo "$dbT_R4Q3";?>" readonly></td> <!-- Trainees Row 4 Q3 -->
						<td><input type = "number" min="0" name="T_R4Q4" id="T_R4Q4" value="<?php echo "$dbT_R4Q4";?>" readonly></td> <!-- Trainees Row 4 Q4 -->
						<td><input type = "number" min="0" name="T_R4_T" id="T_R4_T" value="<?php echo "$dbT_R4_T";?>" readonly></td> <!-- Trainees Row 4 Total -->
						
						<td><input type = "number" min="0" name="BT_Q1" id="BT_Q1" value="<?php echo $dbBT_Q1;?>" readonly></td>
						<td><input type = "number" min="0" name="BT_Q2" id="BT_Q2" value="<?php echo $dbBT_Q2;?>" readonly></td>
						<td><input type = "number" min="0" name="BT_Q3" id="BT_Q3" value="<?php echo $dbBT_Q3;?>" readonly></td>
						<td><input type = "number" min="0" name="BT_Q4" id="BT_Q4" value="<?php echo $dbBT_Q4;?>" readonly></td>
						<td><input type = "number" min="0" name="BT_QT" id="BT_QT" value="<?php echo $dbBT_QT;?>" readonly></td>

						<td colspan="5" class="input2"><input type = "text" id="PercentageTotal" name="PercentageTotal" value="<?php echo "$dbPercentageTotal";?>%" readonly></td> <!-- Percentage Row 4 Total -->

						<td class="input1">₱<?php echo $dbBudget;?></td>
					</tr>
				</tbody>
			</table>
		</div>	
	</div>
</form>
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
//auto run
Disable_Inputs();
//Auto Readonly
function Disable_Inputs(){
	document.getElementById("CEAFA_AQ1").readOnly = true;	document.getElementById("CEAFA_BQ1").readOnly = true;
	document.getElementById("CEAFA_AQ2").readOnly = true;	document.getElementById("CEAFA_BQ2").readOnly = true;
	document.getElementById("CEAFA_AQ3").readOnly = true;	document.getElementById("CEAFA_BQ3").readOnly = true;
	document.getElementById("CEAFA_AQ4").readOnly = true;	document.getElementById("CEAFA_BQ4").readOnly = true;

	document.getElementById("CICS_AQ1").readOnly = true;	document.getElementById("CICS_BQ1").readOnly = true;
	document.getElementById("CICS_AQ2").readOnly = true;	document.getElementById("CICS_BQ2").readOnly = true;
	document.getElementById("CICS_AQ3").readOnly = true;	document.getElementById("CICS_BQ3").readOnly = true;
	document.getElementById("CICS_AQ4").readOnly = true;	document.getElementById("CICS_BQ4").readOnly = true;

	document.getElementById("CIT_AQ1").readOnly = true;		document.getElementById("CIT_BQ1").readOnly = true;
	document.getElementById("CIT_AQ2").readOnly = true;		document.getElementById("CIT_BQ2").readOnly = true;
	document.getElementById("CIT_AQ3").readOnly = true;		document.getElementById("CIT_BQ3").readOnly = true;
	document.getElementById("CIT_AQ4").readOnly = true;		document.getElementById("CIT_BQ4").readOnly = true;
}

function Enable_Inputs_Edit(){
	document.getElementById("CEAFA_AQ1").readOnly = false;	document.getElementById("CEAFA_BQ1").readOnly = false;
	document.getElementById("CEAFA_AQ2").readOnly = false;	document.getElementById("CEAFA_BQ2").readOnly = false;
	document.getElementById("CEAFA_AQ3").readOnly = false;	document.getElementById("CEAFA_BQ3").readOnly = false;
	document.getElementById("CEAFA_AQ4").readOnly = false;	document.getElementById("CEAFA_BQ4").readOnly = false;

	document.getElementById("CICS_AQ1").readOnly = false;	document.getElementById("CICS_BQ1").readOnly = false;
	document.getElementById("CICS_AQ2").readOnly = false;	document.getElementById("CICS_BQ2").readOnly = false;
	document.getElementById("CICS_AQ3").readOnly = false;	document.getElementById("CICS_BQ3").readOnly = false;
	document.getElementById("CICS_AQ4").readOnly = false;	document.getElementById("CICS_BQ4").readOnly = false;

	document.getElementById("CIT_AQ1").readOnly = false;	document.getElementById("CIT_BQ1").readOnly = false;
	document.getElementById("CIT_AQ2").readOnly = false;	document.getElementById("CIT_BQ2").readOnly = false;
	document.getElementById("CIT_AQ3").readOnly = false;	document.getElementById("CIT_BQ3").readOnly = false;
	document.getElementById("CIT_AQ4").readOnly = false;	document.getElementById("CIT_BQ4").readOnly = false;
	
	Color_Target();
	Color_Actual();
}

function Enable_Inputs_Create(){
	document.getElementById("CEAFA_AQ1").readOnly = false;
	document.getElementById("CEAFA_AQ2").readOnly = false;
	document.getElementById("CEAFA_AQ3").readOnly = false;
	document.getElementById("CEAFA_AQ4").readOnly = false;

	document.getElementById("CICS_AQ1").readOnly = false;
	document.getElementById("CICS_AQ2").readOnly = false;
	document.getElementById("CICS_AQ3").readOnly = false;
	document.getElementById("CICS_AQ4").readOnly = false;

	document.getElementById("CIT_AQ1").readOnly = false;
	document.getElementById("CIT_AQ2").readOnly = false;
	document.getElementById("CIT_AQ3").readOnly = false;
	document.getElementById("CIT_AQ4").readOnly = false;

	Color_Target();
}

function Color_Target(){
	//Color
	let Color = "#ff8c66";
	document.getElementById("CEAFA_AQ1").style.backgroundColor = Color;
	document.getElementById("CEAFA_AQ2").style.backgroundColor = Color;
	document.getElementById("CEAFA_AQ3").style.backgroundColor = Color;
	document.getElementById("CEAFA_AQ4").style.backgroundColor = Color;

	document.getElementById("CICS_AQ1").style.backgroundColor = Color;
	document.getElementById("CICS_AQ2").style.backgroundColor = Color;
	document.getElementById("CICS_AQ3").style.backgroundColor = Color;
	document.getElementById("CICS_AQ4").style.backgroundColor = Color;

	document.getElementById("CIT_AQ1").style.backgroundColor = Color;
	document.getElementById("CIT_AQ2").style.backgroundColor = Color;
	document.getElementById("CIT_AQ3").style.backgroundColor = Color;
	document.getElementById("CIT_AQ4").style.backgroundColor = Color;
}

function Color_Actual(){
	//Color
	let Color = "#ff8c66";
	document.getElementById("CEAFA_BQ1").style.backgroundColor = Color;
	document.getElementById("CEAFA_BQ2").style.backgroundColor = Color;
	document.getElementById("CEAFA_BQ3").style.backgroundColor = Color;
	document.getElementById("CEAFA_BQ4").style.backgroundColor = Color;

	document.getElementById("CICS_BQ1").style.backgroundColor = Color;
	document.getElementById("CICS_BQ2").style.backgroundColor = Color;
	document.getElementById("CICS_BQ3").style.backgroundColor = Color;
	document.getElementById("CICS_BQ4").style.backgroundColor = Color;

	document.getElementById("CIT_BQ1").style.backgroundColor = Color;
	document.getElementById("CIT_BQ2").style.backgroundColor = Color;
	document.getElementById("CIT_BQ3").style.backgroundColor = Color;
	document.getElementById("CIT_BQ4").style.backgroundColor = Color;
}

function Clear_Inputs(){
	document.getElementById("CEAFA_AQ1").value = "0";
	document.getElementById("CEAFA_AQ2").value = "0";
	document.getElementById("CEAFA_AQ3").value = "0";
	document.getElementById("CEAFA_AQ4").value = "0";
	document.getElementById("CEAFA_AQT").value = "0";

	document.getElementById("CICS_AQ1").value = "0";
	document.getElementById("CICS_AQ2").value = "0";
	document.getElementById("CICS_AQ3").value = "0";
	document.getElementById("CICS_AQ4").value = "0";
	document.getElementById("CICS_AQT").value = "0";

	document.getElementById("CIT_AQ1").value = "0";
	document.getElementById("CIT_AQ2").value = "0";
	document.getElementById("CIT_AQ3").value = "0";
	document.getElementById("CIT_AQ4").value = "0";
	document.getElementById("CIT_AQT").value = "0";

	document.getElementById("AT_Q1").value = "0";
	document.getElementById("AT_Q2").value = "0";
	document.getElementById("AT_Q3").value = "0";
	document.getElementById("AT_Q4").value = "0";
	document.getElementById("AT_QT").value = "0";
}
</script>

<script>
//Auto Compute for TARGET (A)
function CalCEAFA_A(){ //Auto Compute for CEAFA
	let A = document.getElementById('CEAFA_AQ1').value;
	let B = document.getElementById('CEAFA_AQ2').value;
	let C = document.getElementById('CEAFA_AQ3').value;
	let D = document.getElementById('CEAFA_AQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CEAFA_AQT").value = ans;
	CalTotal_AQ1(); CalTotal_AQ2(); CalTotal_AQ3(); CalTotal_AQ4();
	CalTotal_AQ();
}
function CalCICS_A(){ //Auto Compute for CICS
	let A = document.getElementById('CICS_AQ1').value;
	let B = document.getElementById('CICS_AQ2').value;
	let C = document.getElementById('CICS_AQ3').value;
	let D = document.getElementById('CICS_AQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CICS_AQT").value = ans;
	CalTotal_AQ1(); CalTotal_AQ2(); CalTotal_AQ3(); CalTotal_AQ4();
	CalTotal_AQ();
}
function CalCIT_A(){ //Auto Compute for CIT
	let A = document.getElementById('CIT_AQ1').value;
	let B = document.getElementById('CIT_AQ2').value;
	let C = document.getElementById('CIT_AQ3').value;
	let D = document.getElementById('CIT_AQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CIT_AQT").value = ans;
	CalTotal_AQ1(); CalTotal_AQ2(); CalTotal_AQ3(); CalTotal_AQ4();
	CalTotal_AQ();
}

function CalTotal_AQ1(){ //Auto Compute for A_Quarter1
	let A = document.getElementById('CEAFA_AQ1').value;
	let B = document.getElementById('CICS_AQ1').value;
	let C = document.getElementById('CIT_AQ1').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("AT_Q1").value = ans;
}

function CalTotal_AQ2(){ //Auto Compute for A_Quarter2
	let A = document.getElementById('CEAFA_AQ2').value;
	let B = document.getElementById('CICS_AQ2').value;
	let C = document.getElementById('CIT_AQ2').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("AT_Q2").value = ans;
}

function CalTotal_AQ3(){ //Auto Compute for A_Quarter3
	let A = document.getElementById('CEAFA_AQ3').value;
	let B = document.getElementById('CICS_AQ3').value;
	let C = document.getElementById('CIT_AQ3').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("AT_Q3").value = ans;
}

function CalTotal_AQ4(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CEAFA_AQ4').value;
	let B = document.getElementById('CICS_AQ4').value;
	let C = document.getElementById('CIT_AQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("AT_Q4").value = ans;
}

function CalTotal_AQ(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CEAFA_AQT').value;
	let B = document.getElementById('CICS_AQT').value;
	let C = document.getElementById('CIT_AQT').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("AT_QT").value = ans;
}
//End for Auto Compute for TARGET (A)

//Auto Compute for ACTUAL (B)
function CalCEAFA_B(){ //Auto Compute for CEAFA
	let A = document.getElementById('CEAFA_BQ1').value;
	let B = document.getElementById('CEAFA_BQ2').value;
	let C = document.getElementById('CEAFA_BQ3').value;
	let D = document.getElementById('CEAFA_BQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CEAFA_BQT").value = ans;
	CalTotal_BQ1(); CalTotal_BQ2(); CalTotal_BQ3(); CalTotal_BQ4();
	CalTotal_BQ();
}
function CalCICS_B(){ //Auto Compute for CICS
	let A = document.getElementById('CICS_BQ1').value;
	let B = document.getElementById('CICS_BQ2').value;
	let C = document.getElementById('CICS_BQ3').value;
	let D = document.getElementById('CICS_BQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CICS_BQT").value = ans;
	CalTotal_BQ1(); CalTotal_BQ2(); CalTotal_BQ3(); CalTotal_BQ4();
	CalTotal_BQ();
}
function CalCIT_B(){ //Auto Compute for CIT
	let A = document.getElementById('CIT_BQ1').value;
	let B = document.getElementById('CIT_BQ2').value;
	let C = document.getElementById('CIT_BQ3').value;
	let D = document.getElementById('CIT_BQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CIT_BQT").value = ans;
	CalTotal_BQ1(); CalTotal_BQ2(); CalTotal_BQ3(); CalTotal_BQ4();
	CalTotal_BQ();
}

function CalTotal_BQ1(){ //Auto Compute for A_Quarter1
	let A = document.getElementById('CEAFA_BQ1').value;
	let B = document.getElementById('CICS_BQ1').value;
	let C = document.getElementById('CIT_BQ1').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("BT_Q1").value = ans;
}

function CalTotal_BQ2(){ //Auto Compute for A_Quarter2
	let A = document.getElementById('CEAFA_BQ2').value;
	let B = document.getElementById('CICS_BQ2').value;
	let C = document.getElementById('CIT_BQ2').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("BT_Q2").value = ans;
}

function CalTotal_BQ3(){ //Auto Compute for A_Quarter3
	let A = document.getElementById('CEAFA_BQ3').value;
	let B = document.getElementById('CICS_BQ3').value;
	let C = document.getElementById('CIT_BQ3').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("BT_Q3").value = ans;
}

function CalTotal_BQ4(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CEAFA_BQ4').value;
	let B = document.getElementById('CICS_BQ4').value;
	let C = document.getElementById('CIT_BQ4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("BT_Q4").value = ans;
}

function CalTotal_BQ(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CEAFA_BQT').value;
	let B = document.getElementById('CICS_BQT').value;
	let C = document.getElementById('CIT_BQT').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("BT_QT").value = ans;
}
//End for Auto Compute for ACTUAL (B)
</script>

<script>
//for Buttons
function Enable_Dropdown(){ //For Create Target
	Enable_Inputs_Create(); //Call function to enable the input text
	Clear_Inputs();
	document.getElementById("Enable_Dropdown").style.display = "none";
	document.getElementById("Dropdown").style.display = "block";
	document.getElementById("Enable_SaveBtn").style.display = "none";
}

function Enable_SaveBtn(){//For Edit Target
	Enable_Inputs_Edit();//Call function to enable the input text
	document.getElementById("Enable_SaveBtn").style.display = "none";
	document.getElementById("savebtn").style.display = "block";
	document.getElementById("Enable_Dropdown").style.display = "none";
	document.getElementById("Year_DD").disabled  = true;
}
function Cancel(){
	window.location='Dashboard.php';
}

</script>


<?php

if (isset($_POST['Createbtn'])) {//Creating new target
	
	$Year = $_POST["Year"];

	//Checking if Year is exisiting
	$sql = mysqli_query($con,"SELECT * FROM target_alangilan WHERE Year = '$Year'");
	if(mysqli_num_rows($sql)>0){ //if existing
		echo "<script>
            alert('Target for this Year $Year is already existing.');
        </script>";
	}else{//if not exisiting
		$CEAFA_AQ1 = $_POST["CEAFA_AQ1"];
		$CEAFA_AQ2 = $_POST["CEAFA_AQ2"];
		$CEAFA_AQ3 = $_POST["CEAFA_AQ3"];
		$CEAFA_AQ4 = $_POST["CEAFA_AQ4"];
		$CEAFA_AQT = $_POST["CEAFA_AQT"];

		$CICS_AQ1 = $_POST["CICS_AQ1"];
		$CICS_AQ2 = $_POST["CICS_AQ2"];
		$CICS_AQ3 = $_POST["CICS_AQ3"];
		$CICS_AQ4 = $_POST["CICS_AQ4"];
		$CICS_AQT = $_POST["CICS_AQT"];

		$CIT_AQ1 = $_POST["CIT_AQ1"];
		$CIT_AQ2 = $_POST["CIT_AQ2"];
		$CIT_AQ3 = $_POST["CIT_AQ3"];
		$CIT_AQ4 = $_POST["CIT_AQ4"];
		$CIT_AQT = $_POST["CIT_AQT"];

		$AT_Q1 = $_POST["AT_Q1"];
		$AT_Q2 = $_POST["AT_Q2"];
		$AT_Q3 = $_POST["AT_Q3"];
		$AT_Q4 = $_POST["AT_Q4"];
		$AT_QT = $_POST["AT_QT"];

		$sql = ("INSERT INTO target_alangilan
			(Year, CEAFA_AQ1, CEAFA_AQ2, CEAFA_AQ3, CEAFA_AQ4, CEAFA_AQT,
			CICS_AQ1, CICS_AQ2, CICS_AQ3, CICS_AQ4, CICS_AQT,
			CIT_AQ1, CIT_AQ2, CIT_AQ3, CIT_AQ4, CIT_AQT,
			AT_Q1, AT_Q2, AT_Q3, AT_Q4, AT_QT)
		VALUES 
			('$Year','$CEAFA_AQ1','$CEAFA_AQ2','$CEAFA_AQ3','$CEAFA_AQ4','$CEAFA_AQT',
			'$CICS_AQ1','$CICS_AQ2','$CICS_AQ3','$CICS_AQ4','$CICS_AQT',
			'$CIT_AQ1','$CIT_AQ2','$CIT_AQ3','$CIT_AQ4','$CIT_AQT',
			'$AT_Q1','$AT_Q2','$AT_Q3','$AT_Q4','$AT_QT')");
		$command = $con->query($sql);
		echo "<script>
			alert('Target Set Successfuly');
			window.location='Dashboard.php';
		</script>";	
	}		
}
if (isset($_POST['Savebtn'])) { //For update
	$CEAFA_AQ1 = $_POST["CEAFA_AQ1"];	$CEAFA_BQ1 = $_POST["CEAFA_BQ1"];
	$CEAFA_AQ2 = $_POST["CEAFA_AQ2"];	$CEAFA_BQ2 = $_POST["CEAFA_BQ2"];
	$CEAFA_AQ3 = $_POST["CEAFA_AQ3"];	$CEAFA_BQ3 = $_POST["CEAFA_BQ3"];
	$CEAFA_AQ4 = $_POST["CEAFA_AQ4"];	$CEAFA_BQ4 = $_POST["CEAFA_BQ4"];
	$CEAFA_AQT = $_POST["CEAFA_AQT"];	$CEAFA_BQT = $_POST["CEAFA_BQT"];

	$CICS_AQ1 = $_POST["CICS_AQ1"];		$CICS_BQ1 = $_POST["CICS_BQ1"];
	$CICS_AQ2 = $_POST["CICS_AQ2"];		$CICS_BQ2 = $_POST["CICS_BQ2"];
	$CICS_AQ3 = $_POST["CICS_AQ3"];		$CICS_BQ3 = $_POST["CICS_BQ3"];
	$CICS_AQ4 = $_POST["CICS_AQ4"];		$CICS_BQ4 = $_POST["CICS_BQ4"];
	$CICS_AQT = $_POST["CICS_AQT"];		$CICS_BQT = $_POST["CICS_BQT"];

	$CIT_AQ1 = $_POST["CIT_AQ1"];		$CIT_BQ1 = $_POST["CIT_BQ1"];
	$CIT_AQ2 = $_POST["CIT_AQ2"];		$CIT_BQ2 = $_POST["CIT_BQ2"];
	$CIT_AQ3 = $_POST["CIT_AQ3"];		$CIT_BQ3 = $_POST["CIT_BQ3"];
	$CIT_AQ4 = $_POST["CIT_AQ4"];		$CIT_BQ4 = $_POST["CIT_BQ4"];
	$CIT_AQT = $_POST["CIT_AQT"];		$CIT_BQT = $_POST["CIT_BQT"];

	$AT_Q1 = $_POST["AT_Q1"];			$BT_Q1 = $_POST["BT_Q1"];
	$AT_Q2 = $_POST["AT_Q2"];			$BT_Q2 = $_POST["BT_Q2"];
	$AT_Q3 = $_POST["AT_Q3"];			$BT_Q3 = $_POST["BT_Q3"];
	$AT_Q4 = $_POST["AT_Q4"];			$BT_Q4 = $_POST["BT_Q4"];
	$AT_QT = $_POST["AT_QT"];			$BT_QT = $_POST["BT_QT"];

	$sql = ("UPDATE target_alangilan
	SET CEAFA_AQ1 = '$CEAFA_AQ1', CEAFA_AQ2 = '$CEAFA_AQ2', CEAFA_AQ3 = '$CEAFA_AQ3', CEAFA_AQ4 = '$CEAFA_AQ4', CEAFA_AQT = '$CEAFA_AQT',
		CICS_AQ1 = '$CICS_AQ1', CICS_AQ2 = '$CICS_AQ2', CICS_AQ3 = '$CICS_AQ3', CICS_AQ4 = '$CICS_AQ4', CICS_AQT = '$CICS_AQT',
		CIT_AQ1 = '$CIT_AQ1', CIT_AQ2 = '$CIT_AQ2', CIT_AQ3 = '$CIT_AQ3', CIT_AQ4 = '$CIT_AQ4', CIT_AQT = '$CIT_AQT',
		AT_Q1 = '$AT_Q1', AT_Q2 = '$AT_Q2', AT_Q3 = '$AT_Q3', AT_Q4 = '$AT_Q4', AT_QT = '$AT_QT',

		CEAFA_BQ1 = '$CEAFA_BQ1', CEAFA_BQ2 = '$CEAFA_BQ2', CEAFA_BQ3 = '$CEAFA_BQ3', CEAFA_BQ4 = '$CEAFA_BQ4', CEAFA_BQT = '$CEAFA_BQT',
		CICS_BQ1 = '$CICS_BQ1', CICS_BQ2 = '$CICS_BQ2', CICS_BQ3 = '$CICS_BQ3', CICS_BQ4 = '$CICS_BQ4', CICS_BQT = '$CICS_BQT',
		CIT_BQ1 = '$CIT_BQ1', CIT_BQ2 = '$CIT_BQ2', CIT_BQ3 = '$CIT_BQ3', CIT_BQ4 = '$CIT_BQ4', CIT_BQT = '$CIT_BQT',
		BT_Q1 = '$BT_Q1', BT_Q2 = '$BT_Q2', BT_Q3 = '$BT_Q3', BT_Q4 = '$BT_Q4', BT_QT = '$BT_QT'
	WHERE Year = $CustomYear");
	$command = $con->query($sql) or die("Error encounter while updating data");
	echo "<script>
			alert('Target Set Successfuly');
			window.location='Dashboard.php';
		</script>";	
}
?>

<?php
//CEFA
$dataPointsCEAFA_A = array(
	array("label"=> "Q1", "y"=> $dbCEAFA_AQ1),
	array("label"=> "Q2", "y"=> $dbCEAFA_AQ2),
	array("label"=> "Q3", "y"=> $dbCEAFA_AQ3),
	array("label"=> "Q4", "y"=> $dbCEAFA_AQ4)
);
$dataPointsCEAFA_B = array(
	array("label"=> "Q1", "y"=> $dbCEAFA_BQ1),
	array("label"=> "Q2", "y"=> $dbCEAFA_BQ2),
	array("label"=> "Q3", "y"=> $dbCEAFA_BQ3),
	array("label"=> "Q4", "y"=> $dbCEAFA_BQ4)
);

//CICS
$dataPointsCICS_A = array(
	array("label"=> "Q1", "y"=> $dbCICS_AQ1),
	array("label"=> "Q2", "y"=> $dbCICS_AQ2),
	array("label"=> "Q3", "y"=> $dbCICS_AQ3),
	array("label"=> "Q4", "y"=> $dbCICS_AQ4)
);
$dataPointsCICS_B = array(
	array("label"=> "Q1", "y"=> $dbCICS_BQ1),
	array("label"=> "Q2", "y"=> $dbCICS_BQ2),
	array("label"=> "Q3", "y"=> $dbCICS_BQ3),
	array("label"=> "Q4", "y"=> $dbCICS_BQ4)
);

//CIT
$dataPointsCIT_A = array(
	array("label"=> "Q1", "y"=> $dbCIT_AQ1),
	array("label"=> "Q2", "y"=> $dbCIT_AQ2),
	array("label"=> "Q3", "y"=> $dbCIT_AQ3),
	array("label"=> "Q4", "y"=> $dbCIT_AQ4)
);
$dataPointsCIT_B = array(
	array("label"=> "Q1", "y"=> $dbCIT_BQ1),
	array("label"=> "Q2", "y"=> $dbCIT_BQ2),
	array("label"=> "Q3", "y"=> $dbCIT_BQ3),
	array("label"=> "Q4", "y"=> $dbCIT_BQ4)
);
?>

<script type="text/javascript">
function DisplayCharts(){
	var chartCEAFA = new CanvasJS.Chart("ChartCEAFA", {
		animationEnabled: true,
		theme: "light2",
		title:{ text: "CEAFA"},
		axisY:{ includeZero: true },
		legend:{
			cursor: "pointer",
			verticalAlign: "center",
			horizontalAlign: "right",
			itemclick: toggleDataSeries
		},
		data: [{
			type: "column",
			name: "Target",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#b3b3b3", //Target
			dataPoints: <?php echo json_encode($dataPointsCEAFA_A, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			name: "Actual",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#ff6242", //Actual
			dataPoints: <?php echo json_encode($dataPointsCEAFA_B, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartCEAFA.render();
 	/**function toggleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}else{
			e.dataSeries.visible = true;
		}
		chartCICS.render();
	} */



	var chartCICS = new CanvasJS.Chart("ChartCICS", {
		animationEnabled: true,
		theme: "light2",
		title:{ text: "CICS"},
		axisY:{ includeZero: true },
		legend:{
			cursor: "pointer",
			verticalAlign: "center",
			horizontalAlign: "right",
			itemclick: toggleDataSeries
		},
		data: [{
			type: "column",
			name: "Target",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#b3b3b3", //Target
			dataPoints: <?php echo json_encode($dataPointsCICS_A, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			name: "Actual",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#ff6242", //Actual
			dataPoints: <?php echo json_encode($dataPointsCICS_B, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartCICS.render();
 	/**function toggleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}else{
			e.dataSeries.visible = true;
		}
		chartCICS.render();
	} */


	var chartCIT = new CanvasJS.Chart("ChartCIT", {
		animationEnabled: true,
		theme: "light2",
		title:{ text: "CIT"},
		axisY:{ includeZero: true },
		legend:{
			cursor: "pointer",
			verticalAlign: "center",
			horizontalAlign: "right",
			itemclick: toggleDataSeries
		},
		data: [{
			type: "column",
			name: "Target",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#b3b3b3", //Target
			dataPoints: <?php echo json_encode($dataPointsCIT_A, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			name: "Actual",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#ff6242", //Actual
			dataPoints: <?php echo json_encode($dataPointsCIT_B, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartCIT.render();
 	
	
	function toggleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}else{
			e.dataSeries.visible = true;
		}
		chartCIT.render();
		chartCICS.render();
		chartCEAFA.render();
	}
}

</script>


<?php
//Code for Different  Account - Different View
if ($College == "CIT" AND $Position == "Coordinator" ){
	echo "
		<script> 
			document.getElementById('ChartForCIT').style.display = 'block';
			document.getElementById('ChartCIT').style.height = '450px';
			document.getElementById('ChartCIT').style.width = '650px';
			document.getElementById('TableForLabelText').style.display = 'block';
			document.getElementById('LabelText').innerHTML = 'College of Industrial Technology Targets/Actual';

			document.getElementById('ChartForCEAFA').style.display = 'none';
			document.getElementById('ChartForCICS').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}
if ($College == "CICS" AND $Position == "Coordinator" ){
	echo "
		<script> 
			document.getElementById('ChartForCICS').style.display = 'block';
			document.getElementById('ChartCICS').style.height = '450px';
			document.getElementById('ChartCICS').style.width = '650px';
			
			document.getElementById('TableForLabelText').style.display = 'block';
			document.getElementById('LabelText').innerHTML = 'College of Informatics and Computing Sciences Targets/Actual';

			document.getElementById('ChartForCEAFA').style.display = 'none';
			document.getElementById('ChartForCIT').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}
if ($College == "CEAFA" AND $Position == "Coordinator" ){
	echo "
		<script> 
			document.getElementById('ChartForCEAFA').style.display = 'block';
			document.getElementById('ChartCEAFA').style.height = '450px';
			document.getElementById('ChartCEAFA').style.width = '650px';
			
			document.getElementById('TableForLabelText').style.display = 'block';
			document.getElementById('LabelText').innerHTML = 'College of Engineering, Architecture and Fine Arts Targets/Actual';

			document.getElementById('ChartForCICS').style.display = 'none';
			document.getElementById('ChartForCIT').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}
?>

<?php include("RestrictNotif.php"); ?>