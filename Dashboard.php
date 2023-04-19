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
	$dbCAFAD_A_Q1 =  $dbCAFAD_A_Q2 = $dbCAFAD_A_Q3 = $dbCAFAD_A_Q4 = $dbCAFAD_A_T ="";
	$dbCAFAD_B_Q1 =  $dbCAFAD_B_Q2 = $dbCAFAD_B_Q3 = $dbCAFAD_B_Q4 = $dbCAFAD_B_T ="";
	$dbCAFAD_C_Q1 =  $dbCAFAD_C_Q2 = $dbCAFAD_C_Q3 = $dbCAFAD_C_Q4 = $dbCAFAD_C_T ="";
	$dbCAFAD_D_Q1 =  $dbCAFAD_D_Q2 = $dbCAFAD_D_Q3 = $dbCAFAD_D_Q4 = $dbCAFAD_D_T ="";

	$dbCOE_A_Q1 = $dbCOE_A_Q2 = $dbCOE_A_Q3 = $dbCOE_A_Q4 = $dbCOE_A_T = "";
	$dbCOE_B_Q1 = $dbCOE_B_Q2 = $dbCOE_B_Q3 = $dbCOE_B_Q4 = $dbCOE_B_T = "";
	$dbCOE_C_Q1 = $dbCOE_C_Q2 = $dbCOE_C_Q3 = $dbCOE_C_Q4 = $dbCOE_C_T = "";
	$dbCOE_D_Q1 = $dbCOE_D_Q2 = $dbCOE_D_Q3 = $dbCOE_D_Q4 = $dbCOE_D_T = "";

	$dbCICS_A_Q1 = $dbCICS_A_Q2 = $dbCICS_A_Q3 = $dbCICS_A_Q4 = $dbCICS_A_T = "";
	$dbCICS_B_Q1 = $dbCICS_B_Q2 = $dbCICS_B_Q3 = $dbCICS_B_Q4 = $dbCICS_B_T = "";
	$dbCICS_C_Q1 = $dbCICS_C_Q2 = $dbCICS_C_Q3 = $dbCICS_C_Q4 = $dbCICS_C_T = "";
	$dbCICS_D_Q1 = $dbCICS_D_Q2 = $dbCICS_D_Q3 = $dbCICS_D_Q4 = $dbCICS_D_T = "";

	$dbCIT_A_Q1 = $dbCIT_A_Q2 = $dbCIT_A_Q3 = $dbCIT_A_Q4 = $dbCIT_A_T = "";
	$dbCIT_B_Q1 = $dbCIT_B_Q2 = $dbCIT_B_Q3 = $dbCIT_B_Q4 = $dbCIT_B_T = "";
	$dbCIT_C_Q1 = $dbCIT_C_Q2 = $dbCIT_C_Q3 = $dbCIT_C_Q4 = $dbCIT_C_T = "";
	$dbCIT_D_Q1 = $dbCIT_D_Q2 = $dbCIT_D_Q3 = $dbCIT_D_Q4 = $dbCIT_D_T = "";

	$dbTOTAL_A_Q1 = $dbTOTAL_A_Q2 = $dbTOTAL_A_Q3 = $dbTOTAL_A_Q4 = $dbTOTAL_A = "";
	$dbTOTAL_B_Q1 = $dbTOTAL_B_Q2 = $dbTOTAL_B_Q3 = $dbTOTAL_B_Q4 = $dbTOTAL_B = "";
	$dbTOTAL_C_Q1 = $dbTOTAL_C_Q2 = $dbTOTAL_C_Q3 = $dbTOTAL_C_Q4 = $dbTOTAL_C = "";

	$dbPercentage = $dbBudget = "";

//Display Data of Target and Actual
$sql = ("SELECT * FROM dashboard_targets WHERE Year = '$CustomYear'");
$command = $con->query($sql) or die("Error Fethcing data");
while($result = mysqli_fetch_array($command))
{
	//Targets (A)
	$dbCAFAD_A_Q1 = $result["CAFAD_A_Q1"];
	$dbCAFAD_A_Q2 = $result["CAFAD_A_Q2"];
	$dbCAFAD_A_Q3 = $result["CAFAD_A_Q3"];
	$dbCAFAD_A_Q4 = $result["CAFAD_A_Q4"];
	$dbCAFAD_A_T = $result["CAFAD_A_T"];

	$dbCOE_A_Q1 = $result["COE_A_Q1"];
	$dbCOE_A_Q2 = $result["COE_A_Q2"];
	$dbCOE_A_Q3 = $result["COE_A_Q3"];
	$dbCOE_A_Q4 = $result["COE_A_Q4"];
	$dbCOE_A_T = $result["COE_A_T"];

	$dbCICS_A_Q1 = $result["CICS_A_Q1"];
	$dbCICS_A_Q2 = $result["CICS_A_Q2"];
	$dbCICS_A_Q3 = $result["CICS_A_Q3"];
	$dbCICS_A_Q4 = $result["CICS_A_Q4"];
	$dbCICS_A_T = $result["CICS_A_T"];

	$dbCIT_A_Q1 = $result["CIT_A_Q1"];
	$dbCIT_A_Q2 = $result["CIT_A_Q2"];
	$dbCIT_A_Q3 = $result["CIT_A_Q3"];
	$dbCIT_A_Q4 = $result["CIT_A_Q4"];
	$dbCIT_A_T = $result["CIT_A_T"];

	$dbTOTAL_A_Q1 = $result["TOTAL_A_Q1"];
	$dbTOTAL_A_Q2 = $result["TOTAL_A_Q2"];
	$dbTOTAL_A_Q3 = $result["TOTAL_A_Q3"];
	$dbTOTAL_A_Q4 = $result["TOTAL_A_Q4"];
	$dbTOTAL_A = $result["TOTAL_A"];
	
	//Trainees (B)
	$dbCAFAD_B_Q1 = $result["CAFAD_B_Q1"];
	$dbCAFAD_B_Q2 = $result["CAFAD_B_Q2"];
	$dbCAFAD_B_Q3 = $result["CAFAD_B_Q3"];
	$dbCAFAD_B_Q4 = $result["CAFAD_B_Q4"];
	$dbCAFAD_B_T = $result["CAFAD_B_T"];

	$dbCOE_B_Q1 = $result["COE_B_Q1"];
	$dbCOE_B_Q2 = $result["COE_B_Q2"];
	$dbCOE_B_Q3 = $result["COE_B_Q3"];
	$dbCOE_B_Q4 = $result["COE_B_Q4"];
	$dbCOE_B_T = $result["COE_B_T"];

	$dbCICS_B_Q1 = $result["CICS_B_Q1"];
	$dbCICS_B_Q2 = $result["CICS_B_Q2"];
	$dbCICS_B_Q3 = $result["CICS_B_Q3"];
	$dbCICS_B_Q4 = $result["CICS_B_Q4"];
	$dbCICS_B_T = $result["CICS_B_T"];

	$dbCIT_B_Q1 = $result["CIT_B_Q1"];
	$dbCIT_B_Q2 = $result["CIT_B_Q2"];
	$dbCIT_B_Q3 = $result["CIT_B_Q3"];
	$dbCIT_B_Q4 = $result["CIT_B_Q4"];
	$dbCIT_B_T = $result["CIT_B_T"];

	$dbTOTAL_B_Q1 = $result["TOTAL_B_Q1"];
	$dbTOTAL_B_Q2 = $result["TOTAL_B_Q2"];
	$dbTOTAL_B_Q3 = $result["TOTAL_B_Q3"];
	$dbTOTAL_B_Q4 = $result["TOTAL_B_Q4"];
	$dbTOTAL_B = $result["TOTAL_B"];

	//Actual (C)
	$dbCAFAD_C_Q1 = $result["CAFAD_C_Q1"];
	$dbCAFAD_C_Q2 = $result["CAFAD_C_Q2"];
	$dbCAFAD_C_Q3 = $result["CAFAD_C_Q3"];
	$dbCAFAD_C_Q4 = $result["CAFAD_C_Q4"];
	$dbCAFAD_C_T = $result["CAFAD_C_T"];

	$dbCOE_C_Q1 = $result["COE_C_Q1"];
	$dbCOE_C_Q2 = $result["COE_C_Q2"];
	$dbCOE_C_Q3 = $result["COE_C_Q3"];
	$dbCOE_C_Q4 = $result["COE_C_Q4"];
	$dbCOE_C_T = $result["COE_C_T"];

	$dbCICS_C_Q1 = $result["CICS_C_Q1"];
	$dbCICS_C_Q2 = $result["CICS_C_Q2"];
	$dbCICS_C_Q3 = $result["CICS_C_Q3"];
	$dbCICS_C_Q4 = $result["CICS_C_Q4"];
	$dbCICS_C_T = $result["CICS_C_T"];

	$dbCIT_C_Q1 = $result["CIT_C_Q1"];
	$dbCIT_C_Q2 = $result["CIT_C_Q2"];
	$dbCIT_C_Q3 = $result["CIT_C_Q3"];
	$dbCIT_C_Q4 = $result["CIT_C_Q4"];
	$dbCIT_C_T = $result["CIT_C_T"];

	$dbTOTAL_C_Q1 = $result["TOTAL_C_Q1"];
	$dbTOTAL_C_Q2 = $result["TOTAL_C_Q2"];
	$dbTOTAL_C_Q3 = $result["TOTAL_C_Q3"];
	$dbTOTAL_C_Q4 = $result["TOTAL_C_Q4"];
	$dbTOTAL_C = $result["TOTAL_C"];

	//Percentage (D)
	$dbCAFAD_D_Q1 = $result["CAFAD_D_Q1"];
	$dbCAFAD_D_Q2 = $result["CAFAD_D_Q2"];
	$dbCAFAD_D_Q3 = $result["CAFAD_D_Q3"];
	$dbCAFAD_D_Q4 = $result["CAFAD_D_Q4"];
	$dbCAFAD_D_T = $result["CAFAD_D_T"];

	$dbCOE_D_Q1 = $result["COE_D_Q1"];
	$dbCOE_D_Q2 = $result["COE_D_Q2"];
	$dbCOE_D_Q3 = $result["COE_D_Q3"];
	$dbCOE_D_Q4 = $result["COE_D_Q4"];
	$dbCOE_D_T = $result["COE_D_T"];

	$dbCICS_D_Q1 = $result["CICS_D_Q1"];
	$dbCICS_D_Q2 = $result["CICS_D_Q2"];
	$dbCICS_D_Q3 = $result["CICS_D_Q3"];
	$dbCICS_D_Q4 = $result["CICS_D_Q4"];
	$dbCICS_D_T = $result["CICS_D_T"];

	$dbCIT_D_Q1 = $result["CIT_D_Q1"];
	$dbCIT_D_Q2 = $result["CIT_D_Q2"];
	$dbCIT_D_Q3 = $result["CIT_D_Q3"];
	$dbCIT_D_Q4 = $result["CIT_D_Q4"];
	$dbCIT_D_T = $result["CIT_D_T"];

	$dbPercentageTotal = $result["PercentageTotal"];
	$dbBudget = $result["Budget"];
}
include_once ("Dashboard-Computations.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Dashborad</title>
<link rel="stylesheet" type="text/css" href="styles/Dashboard-style.css">
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

<style>
div.graph {
  overflow: auto;
  white-space: nowrap;
}

</style>


<!-- Graph -->

<div class="graph">
<center>
	<table>
	<tr>
		<td id="ChartForCAFAD"><div id="ChartCAFAD" style="height: 350px; width: 310px;"></div></td>
		<td id="ChartForCOE"><div id="ChartCOE" style="height: 350px; width: 310px;"></div></td>
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
										<option value="<?php echo "$CustomYear";?>" selected><?php echo "$CustomYear";?></option>
									</select>	
									<input type="submit" id="Createbtn" name="Createbtn" value="CREATE">
									<span id="Cancel" onclick="Cancel()">CANCEL</span>
								</a>						
						</th>	
						<th colspan="12" class="SaveCancel">
							<a id="Enable_SaveBtn" onclick="Enable_SaveBtn()">Edit Target/Actual</a>
							<a id="savebtn" style="display:none">
									<input type="submit" class="Ssave" name="Savebtn" value="UPDATE"> 
									<span id="Cancel" onclick="Cancel()">CANCEL</span>
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
					<tr class="cols" border="none";>
						<td colspan="23" ></td>
						
					</tr>
					<tr >
						<th>CAFAD</th>
						<td>13</td>
						<td><input type = "number" min="0" name="CAFAD_A_Q1" id="CAFAD_A_Q1" value="<?php echo $dbCAFAD_A_Q1;?>" onchange="Cal_CAFAD_A()"></td>
						<td><input type = "number" min="0" name="CAFAD_A_Q2" id="CAFAD_A_Q2" value="<?php echo $dbCAFAD_A_Q2;?>" onchange="Cal_CAFAD_A()"></td>
						<td><input type = "number" min="0" name="CAFAD_A_Q3" id="CAFAD_A_Q3" value="<?php echo $dbCAFAD_A_Q3;?>" onchange="Cal_CAFAD_A()"></td>
						<td><input type = "number" min="0" name="CAFAD_A_Q4" id="CAFAD_A_Q4" value="<?php echo $dbCAFAD_A_Q4;?>" onchange="Cal_CAFAD_A()"></td>
						<td><input type = "number" min="0" name="CAFAD_A_T" id="CAFAD_A_T" value="<?php echo $dbCAFAD_A_T;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="CAFAD_B_Q1" id="CAFAD_B_Q1" value="<?php echo "$dbCAFAD_B_Q1";?>" readonly></td> <!-- Trainees Row 1 Q1 -->
						<td><input type = "number" min="0" name="CAFAD_B_Q2" id="CAFAD_B_Q2" value="<?php echo "$dbCAFAD_B_Q2";?>" readonly></td> <!-- Trainees Row 1 Q2 -->
						<td><input type = "number" min="0" name="CAFAD_B_Q3" id="CAFAD_B_Q3" value="<?php echo "$dbCAFAD_B_Q3";?>" readonly></td> <!-- Trainees Row 1 Q3 -->
						<td><input type = "number" min="0" name="CAFAD_B_Q4" id="CAFAD_B_Q4" value="<?php echo "$dbCAFAD_B_Q4";?>" readonly></td> <!-- Trainees Row 1 Q4 -->
						<td><input type = "number" min="0" name="CAFAD_B_T" id="CAFAD_B_T" value="<?php echo "$dbCAFAD_B_T";?>" readonly></td> <!-- Trainees Row 1 Total -->
						
						<td><input type = "number" min="0" name="CAFAD_C_Q1" id="CAFAD_C_Q1" value="<?php echo $dbCAFAD_C_Q1;?>" onchange="Cal_CAFAD_C()"></td>
						<td><input type = "number" min="0" name="CAFAD_C_Q2" id="CAFAD_C_Q2" value="<?php echo $dbCAFAD_C_Q2;?>" onchange="Cal_CAFAD_C()"></td>
						<td><input type = "number" min="0" name="CAFAD_C_Q3" id="CAFAD_C_Q3" value="<?php echo $dbCAFAD_C_Q3;?>" onchange="Cal_CAFAD_C()"></td>
						<td><input type = "number" min="0" name="CAFAD_C_Q4" id="CAFAD_C_Q4" value="<?php echo $dbCAFAD_C_Q4;?>" onchange="Cal_CAFAD_C()"></td>
						<td><input type = "number" min="0" name="CAFAD_C_T" id="CAFAD_C_T" value="<?php echo $dbCAFAD_C_T;?>" readonly> </td> 

						<td><input type = "text" name="CAFAD_D_Q1" id="CAFAD_D_Q1" value="<?php echo "$dbCAFAD_D_Q1";?>%" readonly></td> <!-- Percentage Row 1 Q1 -->
						<td><input type = "text" name="CAFAD_D_Q2" id="CAFAD_D_Q2" value="<?php echo "$dbCAFAD_D_Q2";?>%" readonly></td> <!-- Percentage Row 1 Q2 -->
						<td><input type = "text" name="CAFAD_D_Q3" id="CAFAD_D_Q3" value="<?php echo "$dbCAFAD_D_Q3";?>%" readonly></td> <!-- Percentage Row 1 Q3 -->
						<td><input type = "text" name="CAFAD_D_Q4" id="CAFAD_D_Q4" value="<?php echo "$dbCAFAD_D_Q4";?>%" readonly></td> <!-- Percentage Row 1 Q4 -->
						<td><input type = "text" name="CAFAD_D_T" id="CAFAD_D_T" value="<?php echo "$dbCAFAD_D_T";?>%" readonly></td> <!-- Percentage Row 1 Total -->
						
						<td  rowspan="4" class="input1" ><input type = "text" name = "Budget" id = "Budget" value="₱<?php echo "$dbBudget";?>" readonly></td>

					</tr>

					<tr >
						<th>COE</th>
						<td>13</td>
						<td><input type = "number" min="0" name="COE_A_Q1" id="COE_A_Q1" value="<?php echo $dbCOE_A_Q1;?>" onchange="Cal_COE_A()"></td>
						<td><input type = "number" min="0" name="COE_A_Q2" id="COE_A_Q2" value="<?php echo $dbCOE_A_Q2;?>" onchange="Cal_COE_A()"></td>
						<td><input type = "number" min="0" name="COE_A_Q3" id="COE_A_Q3" value="<?php echo $dbCOE_A_Q3;?>" onchange="Cal_COE_A()"></td>
						<td><input type = "number" min="0" name="COE_A_Q4" id="COE_A_Q4" value="<?php echo $dbCOE_A_Q4;?>" onchange="Cal_COE_A()"></td>
						<td><input type = "number" min="0" name="COE_A_T" id="COE_A_T" value="<?php echo $dbCOE_A_T;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="COE_B_Q1" id="COE_B_Q1" value="<?php echo "$dbCOE_B_Q1";?>" readonly></td> <!-- Trainees Row 1 Q1 -->
						<td><input type = "number" min="0" name="COE_B_Q2" id="COE_B_Q2" value="<?php echo "$dbCOE_B_Q2";?>" readonly></td> <!-- Trainees Row 1 Q2 -->
						<td><input type = "number" min="0" name="COE_B_Q3" id="COE_B_Q3" value="<?php echo "$dbCOE_B_Q3";?>" readonly></td> <!-- Trainees Row 1 Q3 -->
						<td><input type = "number" min="0" name="COE_B_Q4" id="COE_B_Q4" value="<?php echo "$dbCOE_B_Q4";?>" readonly></td> <!-- Trainees Row 1 Q4 -->
						<td><input type = "number" min="0" name="COE_B_T" id="COE_B_T" value="<?php echo "$dbCOE_B_T";?>" readonly></td> <!-- Trainees Row 1 Total -->
						
						<td><input type = "number" min="0" name="COE_C_Q1" id="COE_C_Q1" value="<?php echo $dbCOE_C_Q1;?>" onchange="Cal_COE_C()"></td>
						<td><input type = "number" min="0" name="COE_C_Q2" id="COE_C_Q2" value="<?php echo $dbCOE_C_Q2;?>" onchange="Cal_COE_C()"></td>
						<td><input type = "number" min="0" name="COE_C_Q3" id="COE_C_Q3" value="<?php echo $dbCOE_C_Q3;?>" onchange="Cal_COE_C()"></td>
						<td><input type = "number" min="0" name="COE_C_Q4" id="COE_C_Q4" value="<?php echo $dbCOE_C_Q4;?>" onchange="Cal_COE_C()"></td>
						<td><input type = "number" min="0" name="COE_C_T" id="COE_C_T" value="<?php echo $dbCOE_C_T;?>" readonly> </td> 

						<td><input type = "text" name="COE_D_Q1" id="COE_D_Q1" value="<?php echo "$dbCOE_D_Q1";?>%" readonly></td> <!-- Percentage Row 1 Q1 -->
						<td><input type = "text" name="COE_D_Q2" id="COE_D_Q2" value="<?php echo "$dbCOE_D_Q2";?>%" readonly></td> <!-- Percentage Row 1 Q2 -->
						<td><input type = "text" name="COE_D_Q3" id="COE_D_Q3" value="<?php echo "$dbCOE_D_Q3";?>%" readonly></td> <!-- Percentage Row 1 Q3 -->
						<td><input type = "text" name="COE_D_Q4" id="COE_D_Q4" value="<?php echo "$dbCOE_D_Q4";?>%" readonly></td> <!-- Percentage Row 1 Q4 -->
						<td><input type = "text" name="COE_D_T" id="COE_D_T" value="<?php echo "$dbCOE_D_T";?>%" readonly></td> <!-- Percentage Row 1 Total -->
						
					</tr>

					<tr>
						<th>CICS</th>
						<td>4</td>
						<td><input type = "number" min="0" name="CICS_A_Q1" id="CICS_A_Q1" value="<?php echo $dbCICS_A_Q1;?>" onchange="Cal_CICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_A_Q2" id="CICS_A_Q2" value="<?php echo $dbCICS_A_Q2;?>" onchange="Cal_CICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_A_Q3" id="CICS_A_Q3" value="<?php echo $dbCICS_A_Q3;?>" onchange="Cal_CICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_A_Q4" id="CICS_A_Q4" value="<?php echo $dbCICS_A_Q4;?>" onchange="Cal_CICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_A_T" id="CICS_A_T" value="<?php echo $dbCICS_A_T;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="CICS_B_Q1" id="CICS_B_Q1" value="<?php echo "$dbCICS_B_Q1";?>" readonly></td> <!-- Trainees Row 2 Q1 -->
						<td><input type = "number" min="0" name="CICS_B_Q2" id="CICS_B_Q2" value="<?php echo "$dbCICS_B_Q2";?>" readonly></td> <!-- Trainees Row 2 Q2 -->
						<td><input type = "number" min="0" name="CICS_B_Q3" id="CICS_B_Q3" value="<?php echo "$dbCICS_B_Q3";?>" readonly></td> <!-- Trainees Row 2 Q3 -->
						<td><input type = "number" min="0" name="CICS_B_Q4" id="CICS_B_Q4" value="<?php echo "$dbCICS_B_Q4";?>" readonly></td> <!-- Trainees Row 2 Q4 -->
						<td><input type = "number" min="0" name="CICS_B_T" id="CICS_B_T" value="<?php echo "$dbCICS_B_T";?>" readonly></td> <!-- Trainees Row 2 Total -->
						
						<td><input type = "number" min="0" name="CICS_C_Q1" id="CICS_C_Q1" value="<?php echo $dbCICS_C_Q1;?>" onchange="Cal_CICS_C()"></td>
						<td><input type = "number" min="0" name="CICS_C_Q2" id="CICS_C_Q2" value="<?php echo $dbCICS_C_Q2;?>" onchange="Cal_CICS_C()"></td>
						<td><input type = "number" min="0" name="CICS_C_Q3" id="CICS_C_Q3" value="<?php echo $dbCICS_C_Q3;?>" onchange="Cal_CICS_C()"></td>
						<td><input type = "number" min="0" name="CICS_C_Q4" id="CICS_C_Q4" value="<?php echo $dbCICS_C_Q4;?>" onchange="Cal_CICS_C()"></td>
						<td><input type = "number" min="0" name="CICS_C_T" id="CICS_C_T" value="<?php echo $dbCICS_C_T;?>" readonly> </td> 

						<td><input type = "text" name="CICS_D_Q1" id="CICS_D_Q1" value="<?php echo "$dbCICS_D_Q1";?>%" readonly></td> <!-- Percentage Row 2 Q1 -->
						<td><input type = "text" name="CICS_D_Q2" id="CICS_D_Q2" value="<?php echo "$dbCICS_D_Q2";?>%" readonly></td> <!-- Percentage Row 2 Q2 -->
						<td><input type = "text" name="CICS_D_Q3" id="CICS_D_Q3" value="<?php echo "$dbCICS_D_Q3";?>%" readonly></td> <!-- Percentage Row 2 Q3 -->
						<td><input type = "text" name="CICS_D_Q4" id="CICS_D_Q4" value="<?php echo "$dbCICS_D_Q4";?>%" readonly></td> <!-- Percentage Row 2 Q4 -->
						<td><input type = "text" name="CICS_D_T" id="CICS_D_T" value="<?php echo "$dbCICS_D_T";?>%" readonly></td> <!-- Percentage Row 2 Total -->
						 
					</tr>
					<tr>
						<th>CIT</th>
						<td>6</td>
						<td><input type = "number" min="0" name="CIT_A_Q1" id="CIT_A_Q1" value="<?php echo $dbCIT_A_Q1;?>" onchange="Cal_CIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_A_Q2" id="CIT_A_Q2" value="<?php echo $dbCIT_A_Q2;?>" onchange="Cal_CIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_A_Q3" id="CIT_A_Q3" value="<?php echo $dbCIT_A_Q3;?>" onchange="Cal_CIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_A_Q4" id="CIT_A_Q4" value="<?php echo $dbCIT_A_Q4;?>" onchange="Cal_CIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_A_T" id="CIT_A_T" value="<?php echo $dbCIT_A_T;?>" readonly> </td> 
						
						<td><input type = "number" min="0" name="CIT_B_Q1" id="CIT_B_Q1" value="<?php echo "$dbCIT_B_Q1";?>" readonly></td> <!-- Trainees Row 3 Q1 -->
						<td><input type = "number" min="0" name="CIT_B_Q2" id="CIT_B_Q2" value="<?php echo "$dbCIT_B_Q2";?>" readonly></td> <!-- Trainees Row 3 Q2 -->
						<td><input type = "number" min="0" name="CIT_B_Q3" id="CIT_B_Q3" value="<?php echo "$dbCIT_B_Q3";?>" readonly></td> <!-- Trainees Row 3 Q3 -->
						<td><input type = "number" min="0" name="CIT_B_Q4" id="CIT_B_Q4" value="<?php echo "$dbCIT_B_Q4";?>" readonly></td> <!-- Trainees Row 3 Q4 -->
						<td><input type = "number" min="0" name="CIT_B_T" id="CIT_B_T" value="<?php echo "$dbCIT_B_T";?>" readonly></td> <!-- Trainees Row 3 Total -->

						<td><input type = "number" min="0" name="CIT_C_Q1" id="CIT_C_Q1" value="<?php echo $dbCIT_C_Q1;?>" onchange="Cal_CIT_C()"></td>
						<td><input type = "number" min="0" name="CIT_C_Q2" id="CIT_C_Q2" value="<?php echo $dbCIT_C_Q2;?>" onchange="Cal_CIT_C()"></td>
						<td><input type = "number" min="0" name="CIT_C_Q3" id="CIT_C_Q3" value="<?php echo $dbCIT_C_Q3;?>" onchange="Cal_CIT_C()"></td>
						<td><input type = "number" min="0" name="CIT_C_Q4" id="CIT_C_Q4" value="<?php echo $dbCIT_C_Q4;?>" onchange="Cal_CIT_C()"></td>
						<td><input type = "number" min="0" name="CIT_C_T" id="CIT_C_T" value="<?php echo $dbCIT_C_T;?>" readonly> </td> 

						<td><input type = "text" name="CIT_D_Q1" id="CIT_D_Q1" value="<?php echo "$dbCIT_D_Q1";?>%" readonly></td> <!-- Percentage Row 3 Q1 -->
						<td><input type = "text" name="CIT_D_Q2" id="CIT_D_Q2" value="<?php echo "$dbCIT_D_Q2";?>%" readonly></td> <!-- Percentage Row 3 Q2 -->
						<td><input type = "text" name="CIT_D_Q3" id="CIT_D_Q3" value="<?php echo "$dbCIT_D_Q3";?>%" readonly></td> <!-- Percentage Row 3 Q3 -->
						<td><input type = "text" name="CIT_D_Q4" id="CIT_D_Q4" value="<?php echo "$dbCIT_D_Q4";?>%" readonly></td> <!-- Percentage Row 3 Q4 -->
						<td><input type = "text" name="CIT_D_T" id="CIT_D_T" value="<?php echo "$dbCIT_D_T";?>%" readonly></td> <!-- Percentage Row 3 Total -->
						
					</tr>
					<tr>
						<th>Total</th> 
						<td>23</td>
						<td><input type = "number" min="0" name="TOTAL_A_Q1" id="TOTAL_A_Q1" value="<?php echo $dbTOTAL_A_Q1;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_A_Q2" id="TOTAL_A_Q2" value="<?php echo $dbTOTAL_A_Q2;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_A_Q3" id="TOTAL_A_Q3" value="<?php echo $dbTOTAL_A_Q3;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_A_Q4" id="TOTAL_A_Q4" value="<?php echo $dbTOTAL_A_Q4;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_A" id="TOTAL_A" value="<?php echo $dbTOTAL_A;?>" readonly></td>

						<td><input type = "number" min="0" name="TOTAL_B_Q1" id="TOTAL_B_Q1" value="<?php echo "$dbTOTAL_B_Q1";?>" readonly></td> <!-- Trainees Row 4 Q1 -->
						<td><input type = "number" min="0" name="TOTAL_B_Q2" id="TOTAL_B_Q2" value="<?php echo "$dbTOTAL_B_Q2";?>" readonly></td> <!-- Trainees Row 4 Q2 -->
						<td><input type = "number" min="0" name="TOTAL_B_Q3" id="TOTAL_B_Q3" value="<?php echo "$dbTOTAL_B_Q3";?>" readonly></td> <!-- Trainees Row 4 Q3 -->
						<td><input type = "number" min="0" name="TOTAL_B_Q4" id="TOTAL_B_Q4" value="<?php echo "$dbTOTAL_B_Q4";?>" readonly></td> <!-- Trainees Row 4 Q4 -->
						<td><input type = "number" min="0" name="TOTAL_B" id="TOTAL_B" value="<?php echo "$dbTOTAL_B";?>" readonly></td> <!-- Trainees Row 4 Total -->
						
						<td><input type = "number" min="0" name="TOTAL_C_Q1" id="TOTAL_C_Q1" value="<?php echo $dbTOTAL_C_Q1;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_C_Q2" id="TOTAL_C_Q2" value="<?php echo $dbTOTAL_C_Q2;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_C_Q3" id="TOTAL_C_Q3" value="<?php echo $dbTOTAL_C_Q3;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_C_Q4" id="TOTAL_C_Q4" value="<?php echo $dbTOTAL_C_Q4;?>" readonly></td>
						<td><input type = "number" min="0" name="TOTAL_C" id="TOTAL_C" value="<?php echo $dbTOTAL_C;?>" readonly></td>

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
	document.getElementById("CAFAD_A_Q1").readOnly = true;	document.getElementById("CAFAD_C_Q1").readOnly = true;
	document.getElementById("CAFAD_A_Q2").readOnly = true;	document.getElementById("CAFAD_C_Q2").readOnly = true;
	document.getElementById("CAFAD_A_Q3").readOnly = true;	document.getElementById("CAFAD_C_Q3").readOnly = true;
	document.getElementById("CAFAD_A_Q4").readOnly = true;	document.getElementById("CAFAD_C_Q4").readOnly = true;

	document.getElementById("COE_A_Q1").readOnly = true;	document.getElementById("COE_C_Q1").readOnly = true;
	document.getElementById("COE_A_Q2").readOnly = true;	document.getElementById("COE_C_Q2").readOnly = true;
	document.getElementById("COE_A_Q3").readOnly = true;	document.getElementById("COE_C_Q3").readOnly = true;
	document.getElementById("COE_A_Q4").readOnly = true;	document.getElementById("COE_C_Q4").readOnly = true;

	document.getElementById("CICS_A_Q1").readOnly = true;	document.getElementById("CICS_C_Q1").readOnly = true;
	document.getElementById("CICS_A_Q2").readOnly = true;	document.getElementById("CICS_C_Q2").readOnly = true;
	document.getElementById("CICS_A_Q3").readOnly = true;	document.getElementById("CICS_C_Q3").readOnly = true;
	document.getElementById("CICS_A_Q4").readOnly = true;	document.getElementById("CICS_C_Q4").readOnly = true;

	document.getElementById("CIT_A_Q1").readOnly = true;	document.getElementById("CIT_C_Q1").readOnly = true;
	document.getElementById("CIT_A_Q2").readOnly = true;	document.getElementById("CIT_C_Q2").readOnly = true;
	document.getElementById("CIT_A_Q3").readOnly = true;	document.getElementById("CIT_C_Q3").readOnly = true;
	document.getElementById("CIT_A_Q4").readOnly = true;	document.getElementById("CIT_C_Q4").readOnly = true;
}

function Enable_Inputs_Edit(){
	document.getElementById("CAFAD_A_Q1").readOnly = false;	document.getElementById("CAFAD_C_Q1").readOnly = false;
	document.getElementById("CAFAD_A_Q2").readOnly = false;	document.getElementById("CAFAD_C_Q2").readOnly = false;
	document.getElementById("CAFAD_A_Q3").readOnly = false;	document.getElementById("CAFAD_C_Q3").readOnly = false;
	document.getElementById("CAFAD_A_Q4").readOnly = false;	document.getElementById("CAFAD_C_Q4").readOnly = false;

	document.getElementById("COE_A_Q1").readOnly = false;	document.getElementById("COE_C_Q1").readOnly = false;
	document.getElementById("COE_A_Q2").readOnly = false;	document.getElementById("COE_C_Q2").readOnly = false;
	document.getElementById("COE_A_Q3").readOnly = false;	document.getElementById("COE_C_Q3").readOnly = false;
	document.getElementById("COE_A_Q4").readOnly = false;	document.getElementById("COE_C_Q4").readOnly = false;

	document.getElementById("CICS_A_Q1").readOnly = false;	document.getElementById("CICS_C_Q1").readOnly = false;
	document.getElementById("CICS_A_Q2").readOnly = false;	document.getElementById("CICS_C_Q2").readOnly = false;
	document.getElementById("CICS_A_Q3").readOnly = false;	document.getElementById("CICS_C_Q3").readOnly = false;
	document.getElementById("CICS_A_Q4").readOnly = false;	document.getElementById("CICS_C_Q4").readOnly = false;

	document.getElementById("CIT_A_Q1").readOnly = false;	document.getElementById("CIT_C_Q1").readOnly = false;
	document.getElementById("CIT_A_Q2").readOnly = false;	document.getElementById("CIT_C_Q2").readOnly = false;
	document.getElementById("CIT_A_Q3").readOnly = false;	document.getElementById("CIT_C_Q3").readOnly = false;
	document.getElementById("CIT_A_Q4").readOnly = false;	document.getElementById("CIT_C_Q4").readOnly = false;
	
	Color_Target();
	Color_Actual();
}

function Enable_Inputs_Create(){
	document.getElementById("CAFAD_A_Q1").readOnly = false;
	document.getElementById("CAFAD_A_Q2").readOnly = false;
	document.getElementById("CAFAD_A_Q3").readOnly = false;
	document.getElementById("CAFAD_A_Q4").readOnly = false;

	document.getElementById("COE_A_Q1").readOnly = false;
	document.getElementById("COE_A_Q2").readOnly = false;
	document.getElementById("COE_A_Q3").readOnly = false;
	document.getElementById("COE_A_Q4").readOnly = false;	

	document.getElementById("CICS_A_Q1").readOnly = false;
	document.getElementById("CICS_A_Q2").readOnly = false;
	document.getElementById("CICS_A_Q3").readOnly = false;
	document.getElementById("CICS_A_Q4").readOnly = false;

	document.getElementById("CIT_A_Q1").readOnly = false;
	document.getElementById("CIT_A_Q2").readOnly = false;
	document.getElementById("CIT_A_Q3").readOnly = false;
	document.getElementById("CIT_A_Q4").readOnly = false;

	Color_Target();
}

function Color_Target(){
	//Color
	let Color = "#ff8c66";
	document.getElementById("CAFAD_A_Q1").style.backgroundColor = Color;
	document.getElementById("CAFAD_A_Q2").style.backgroundColor = Color;
	document.getElementById("CAFAD_A_Q3").style.backgroundColor = Color;
	document.getElementById("CAFAD_A_Q4").style.backgroundColor = Color;

	document.getElementById("COE_A_Q1").style.backgroundColor = Color;
	document.getElementById("COE_A_Q2").style.backgroundColor = Color;
	document.getElementById("COE_A_Q3").style.backgroundColor = Color;
	document.getElementById("COE_A_Q4").style.backgroundColor = Color;

	document.getElementById("CICS_A_Q1").style.backgroundColor = Color;
	document.getElementById("CICS_A_Q2").style.backgroundColor = Color;
	document.getElementById("CICS_A_Q3").style.backgroundColor = Color;
	document.getElementById("CICS_A_Q4").style.backgroundColor = Color;

	document.getElementById("CIT_A_Q1").style.backgroundColor = Color;
	document.getElementById("CIT_A_Q2").style.backgroundColor = Color;
	document.getElementById("CIT_A_Q3").style.backgroundColor = Color;
	document.getElementById("CIT_A_Q4").style.backgroundColor = Color;
}

function Color_Actual(){
	//Color
	let Color = "#ff8c66";
	document.getElementById("CAFAD_C_Q1").style.backgroundColor = Color;
	document.getElementById("CAFAD_C_Q2").style.backgroundColor = Color;
	document.getElementById("CAFAD_C_Q3").style.backgroundColor = Color;
	document.getElementById("CAFAD_C_Q4").style.backgroundColor = Color;

	document.getElementById("COE_C_Q1").style.backgroundColor = Color;
	document.getElementById("COE_C_Q2").style.backgroundColor = Color;
	document.getElementById("COE_C_Q3").style.backgroundColor = Color;
	document.getElementById("COE_C_Q4").style.backgroundColor = Color;

	document.getElementById("CICS_C_Q1").style.backgroundColor = Color;
	document.getElementById("CICS_C_Q2").style.backgroundColor = Color;
	document.getElementById("CICS_C_Q3").style.backgroundColor = Color;
	document.getElementById("CICS_C_Q4").style.backgroundColor = Color;

	document.getElementById("CIT_C_Q1").style.backgroundColor = Color;
	document.getElementById("CIT_C_Q2").style.backgroundColor = Color;
	document.getElementById("CIT_C_Q3").style.backgroundColor = Color;
	document.getElementById("CIT_C_Q4").style.backgroundColor = Color;
}

function Clear_Inputs(){
	document.getElementById("CAFAD_A_Q1").value = "0";
	document.getElementById("CAFAD_A_Q2").value = "0";
	document.getElementById("CAFAD_A_Q3").value = "0";
	document.getElementById("CAFAD_A_Q4").value = "0";
	document.getElementById("CAFAD_A_T").value = "0";

	document.getElementById("COE_A_Q1").value = "0";
	document.getElementById("COE_A_Q2").value = "0";
	document.getElementById("COE_A_Q3").value = "0";
	document.getElementById("COE_A_Q4").value = "0";
	document.getElementById("COE_A_T").value = "0";

	document.getElementById("CICS_A_Q1").value = "0";
	document.getElementById("CICS_A_Q2").value = "0";
	document.getElementById("CICS_A_Q3").value = "0";
	document.getElementById("CICS_A_Q4").value = "0";
	document.getElementById("CICS_A_T").value = "0";

	document.getElementById("CIT_A_Q1").value = "0";
	document.getElementById("CIT_A_Q2").value = "0";
	document.getElementById("CIT_A_Q3").value = "0";
	document.getElementById("CIT_A_Q4").value = "0";
	document.getElementById("CIT_A_T").value = "0";

	document.getElementById("TOTAL_A_Q1").value = "0";
	document.getElementById("TOTAL_A_Q2").value = "0";
	document.getElementById("TOTAL_A_Q3").value = "0";
	document.getElementById("TOTAL_A_Q4").value = "0";
	document.getElementById("TOTAL_A").value = "0";
}

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

<script>
//Auto Compute for TARGET (A)
function Cal_CAFAD_A(){ //Auto Compute for CAFAD
	let A = document.getElementById('CAFAD_A_Q1').value;
	let B = document.getElementById('CAFAD_A_Q2').value;
	let C = document.getElementById('CAFAD_A_Q3').value;
	let D = document.getElementById('CAFAD_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CAFAD_A_T").value = ans;
	CalTotal_A_Q1(); CalTotal_A_Q2(); CalTotal_A_Q3(); CalTotal_A_Q4();
	CalTotal_A();
}
function Cal_COE_A(){ //Auto Compute for COE
	let A = document.getElementById('COE_A_Q1').value;
	let B = document.getElementById('COE_A_Q2').value;
	let C = document.getElementById('COE_A_Q3').value;
	let D = document.getElementById('COE_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("COE_A_T").value = ans;
	CalTotal_A_Q1(); CalTotal_A_Q2(); CalTotal_A_Q3(); CalTotal_A_Q4();
	CalTotal_A();
}
function Cal_CICS_A(){ //Auto Compute for CICS
	let A = document.getElementById('CICS_A_Q1').value;
	let B = document.getElementById('CICS_A_Q2').value;
	let C = document.getElementById('CICS_A_Q3').value;
	let D = document.getElementById('CICS_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CICS_A_T").value = ans;
	CalTotal_A_Q1(); CalTotal_A_Q2(); CalTotal_A_Q3(); CalTotal_A_Q4();
	CalTotal_A();
}
function Cal_CIT_A(){ //Auto Compute for CIT
	let A = document.getElementById('CIT_A_Q1').value;
	let B = document.getElementById('CIT_A_Q2').value;
	let C = document.getElementById('CIT_A_Q3').value;
	let D = document.getElementById('CIT_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CIT_A_T").value = ans;
	CalTotal_A_Q1(); CalTotal_A_Q2(); CalTotal_A_Q3(); CalTotal_A_Q4();
	CalTotal_A();
}

function CalTotal_A_Q1(){ //Auto Compute for A_Quarter1
	let A = document.getElementById('CAFAD_A_Q1').value;
	let B = document.getElementById('COE_A_Q1').value;
	let C = document.getElementById('CICS_A_Q1').value;
	let D = document.getElementById('CIT_A_Q1').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_A_Q1").value = ans;
}

function CalTotal_A_Q2(){ //Auto Compute for A_Quarter2
	let A = document.getElementById('CAFAD_A_Q2').value;
	let B = document.getElementById('COE_A_Q2').value;
	let C = document.getElementById('CICS_A_Q2').value;
	let D = document.getElementById('CIT_A_Q2').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_A_Q2").value = ans;
}

function CalTotal_A_Q3(){ //Auto Compute for A_Quarter3
	let A = document.getElementById('CAFAD_A_Q3').value;
	let B = document.getElementById('COE_A_Q3').value;
	let C = document.getElementById('CICS_A_Q3').value;
	let D = document.getElementById('CIT_A_Q3').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_A_Q3").value = ans;
}

function CalTotal_A_Q4(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CAFAD_A_Q4').value;
	let B = document.getElementById('COE_A_Q4').value;
	let C = document.getElementById('CICS_A_Q4').value;
	let D = document.getElementById('CIT_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_A_Q4").value = ans;
}

function CalTotal_A(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('TOTAL_A_Q1').value;
	let B = document.getElementById('TOTAL_A_Q2').value;
	let C = document.getElementById('TOTAL_A_Q3').value;
	let D = document.getElementById('TOTAL_A_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_A").value = ans;
}
//End for Auto Compute for TARGET (A)

//Auto Compute for ACTUAL (C)
function Cal_CAFAD_C(){ //Auto Compute for CAFAD
	let A = document.getElementById('CAFAD_C_Q1').value;
	let B = document.getElementById('CAFAD_C_Q2').value;
	let C = document.getElementById('CAFAD_C_Q3').value;
	let D = document.getElementById('CAFAD_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CAFAD_C_T").value = ans;
	CalTotal_C_Q1(); CalTotal_C_Q2(); CalTotal_C_Q3(); CalTotal_C_Q4();
	CalTotal_C();
}
function Cal_COE_C(){ //Auto Compute for COE
	let A = document.getElementById('COE_C_Q1').value;
	let B = document.getElementById('COE_C_Q2').value;
	let C = document.getElementById('COE_C_Q3').value;
	let D = document.getElementById('COE_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("COE_C_T").value = ans;
	CalTotal_C_Q1(); CalTotal_C_Q2(); CalTotal_C_Q3(); CalTotal_C_Q4();
	CalTotal_C();
}
function Cal_CICS_C(){ //Auto Compute for CICS
	let A = document.getElementById('CICS_C_Q1').value;
	let B = document.getElementById('CICS_C_Q2').value;
	let C = document.getElementById('CICS_C_Q3').value;
	let D = document.getElementById('CICS_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CICS_C_T").value = ans;
	CalTotal_C_Q1(); CalTotal_C_Q2(); CalTotal_C_Q3(); CalTotal_C_Q4();
	CalTotal_C();
}
function Cal_CIT_C(){ //Auto Compute for CIT
	let A = document.getElementById('CIT_C_Q1').value;
	let B = document.getElementById('CIT_C_Q2').value;
	let C = document.getElementById('CIT_C_Q3').value;
	let D = document.getElementById('CIT_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("CIT_C_T").value = ans;
	CalTotal_C_Q1(); CalTotal_C_Q2(); CalTotal_C_Q3(); CalTotal_C_Q4();
	CalTotal_C();
}

function CalTotal_C_Q1(){ //Auto Compute for A_Quarter1
	let A = document.getElementById('CAFAD_C_Q1').value;
	let B = document.getElementById('COE_C_Q1').value;
	let C = document.getElementById('CICS_C_Q1').value;
	let D = document.getElementById('CIT_C_Q1').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_C_Q1").value = ans;
}

function CalTotal_C_Q2(){ //Auto Compute for A_Quarter2
	let A = document.getElementById('CAFAD_C_Q2').value;
	let B = document.getElementById('COE_C_Q2').value;
	let C = document.getElementById('CICS_C_Q2').value;
	let D = document.getElementById('CIT_C_Q2').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_C_Q2").value = ans;
}

function CalTotal_C_Q3(){ //Auto Compute for A_Quarter3
	let A = document.getElementById('CAFAD_C_Q3').value;
	let B = document.getElementById('COE_C_Q3').value;
	let C = document.getElementById('CICS_C_Q3').value;
	let D = document.getElementById('CIT_C_Q3').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_C_Q3").value = ans;
}

function CalTotal_C_Q4(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('CAFAD_C_Q4').value;
	let B = document.getElementById('COE_C_Q4').value;
	let C = document.getElementById('CICS_C_Q4').value;
	let D = document.getElementById('CIT_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_C_Q4").value = ans;
}

function CalTotal_C(){ //Auto Compute for A_Quarter4
	let A = document.getElementById('TOTAL_C_Q1').value;
	let B = document.getElementById('TOTAL_C_Q2').value;
	let C = document.getElementById('TOTAL_C_Q3').value;
	let D = document.getElementById('TOTAL_C_Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("TOTAL_C").value = ans;
}
//End for Auto Compute for ACTUAL (C)
</script>

<?php

if (isset($_POST['Createbtn'])) {//Creating new target
	
	$Year = $_POST["Year"];

	//Checking if Year is exisiting
	$sql = mysqli_query($con,"SELECT * FROM dashboard_targets WHERE Year = '$Year'");
	if(mysqli_num_rows($sql)>0){ //if existing
		echo "<script>
            alert('Target for this Year $Year is already existing.');
        </script>";
	}else{//if not exisiting
		$CAFAD_A_Q1 = $_POST["CAFAD_A_Q1"];
		$CAFAD_A_Q2 = $_POST["CAFAD_A_Q2"];
		$CAFAD_A_Q3 = $_POST["CAFAD_A_Q3"];
		$CAFAD_A_Q4 = $_POST["CAFAD_A_Q4"];
		$CAFAD_A_T = $_POST["CAFAD_A_T"];

		$COE_A_Q1 = $_POST["COE_A_Q1"];
		$COE_A_Q2 = $_POST["COE_A_Q2"];
		$COE_A_Q3 = $_POST["COE_A_Q3"];
		$COE_A_Q4 = $_POST["COE_A_Q4"];
		$COE_A_T = $_POST["COE_A_T"];

		$CICS_A_Q1 = $_POST["CICS_A_Q1"];
		$CICS_A_Q2 = $_POST["CICS_A_Q2"];
		$CICS_A_Q3 = $_POST["CICS_A_Q3"];
		$CICS_A_Q4 = $_POST["CICS_A_Q4"];
		$CICS_A_T = $_POST["CICS_A_T"];

		$CIT_A_Q1 = $_POST["CIT_A_Q1"];
		$CIT_A_Q2 = $_POST["CIT_A_Q2"];
		$CIT_A_Q3 = $_POST["CIT_A_Q3"];
		$CIT_A_Q4 = $_POST["CIT_A_Q4"];
		$CIT_A_T = $_POST["CIT_A_T"];

		$TOTAL_A_Q1 = $_POST["TOTAL_A_Q1"];
		$TOTAL_A_Q2 = $_POST["TOTAL_A_Q2"];
		$TOTAL_A_Q3 = $_POST["TOTAL_A_Q3"];
		$TOTAL_A_Q4 = $_POST["TOTAL_A_Q4"];
		$TOTAL_A = $_POST["TOTAL_A"];
	
		$sql = ("INSERT INTO dashboard_targets
			(Year, CAFAD_A_Q1, CAFAD_A_Q2, CAFAD_A_Q3, CAFAD_A_Q4, CAFAD_A_T,
			COE_A_Q1, COE_A_Q2, COE_A_Q3, COE_A_Q4, COE_A_T,
			CICS_A_Q1, CICS_A_Q2, CICS_A_Q3, CICS_A_Q4, CICS_A_T,
			CIT_A_Q1, CIT_A_Q2, CIT_A_Q3, CIT_A_Q4, CIT_A_T,
			TOTAL_A_Q1, TOTAL_A_Q2, TOTAL_A_Q3, TOTAL_A_Q4, TOTAL_A)
		VALUES 
		('$Year', '$CAFAD_A_Q1', '$CAFAD_A_Q2', '$CAFAD_A_Q3', '$CAFAD_A_Q4', '$CAFAD_A_T',
			'$COE_A_Q1', '$COE_A_Q2', '$COE_A_Q3', '$COE_A_Q4', '$COE_A_T',
			'$CICS_A_Q1', '$CICS_A_Q2', '$CICS_A_Q3', '$CICS_A_Q4', '$CICS_A_T',
			'$CIT_A_Q1', '$CIT_A_Q2', '$CIT_A_Q3', '$CIT_A_Q4', '$CIT_A_T',
			'$TOTAL_A_Q1', '$TOTAL_A_Q2', '$TOTAL_A_Q3', '$TOTAL_A_Q4', '$TOTAL_A')");
		$command = $con->query($sql);
		echo "<script>
			alert('Target Set Successfuly');
			window.location='Dashboard.php';
		</script>";	
	}		
}
if (isset($_POST['Savebtn'])) { //For update
	$CAFAD_A_Q1 = $_POST["CAFAD_A_Q1"];	$CAFAD_C_Q1 = $_POST["CAFAD_C_Q1"];
	$CAFAD_A_Q2 = $_POST["CAFAD_A_Q2"];	$CAFAD_C_Q2 = $_POST["CAFAD_C_Q2"];
	$CAFAD_A_Q3 = $_POST["CAFAD_A_Q3"];	$CAFAD_C_Q3 = $_POST["CAFAD_C_Q3"];
	$CAFAD_A_Q4 = $_POST["CAFAD_A_Q4"];	$CAFAD_C_Q4 = $_POST["CAFAD_C_Q4"];
	$CAFAD_A_T = $_POST["CAFAD_A_T"];	$CAFAD_C_T = $_POST["CAFAD_C_T"];

	$COE_A_Q1 = $_POST["COE_A_Q1"];		$COE_C_Q1 = $_POST["COE_C_Q1"];
	$COE_A_Q2 = $_POST["COE_A_Q2"];		$COE_C_Q2 = $_POST["COE_C_Q2"];
	$COE_A_Q3 = $_POST["COE_A_Q3"];		$COE_C_Q3 = $_POST["COE_C_Q3"];
	$COE_A_Q4 = $_POST["COE_A_Q4"];		$COE_C_Q4 = $_POST["COE_C_Q4"];
	$COE_A_T = $_POST["COE_A_T"];		$COE_C_T = $_POST["COE_C_T"];

	$CICS_A_Q1 = $_POST["CICS_A_Q1"];	$CICS_C_Q1 = $_POST["CICS_C_Q1"];
	$CICS_A_Q2 = $_POST["CICS_A_Q2"];	$CICS_C_Q2 = $_POST["CICS_C_Q2"];
	$CICS_A_Q3 = $_POST["CICS_A_Q3"];	$CICS_C_Q3 = $_POST["CICS_C_Q3"];
	$CICS_A_Q4 = $_POST["CICS_A_Q4"];	$CICS_C_Q4 = $_POST["CICS_C_Q4"];
	$CICS_A_T = $_POST["CICS_A_T"];		$CICS_C_T = $_POST["CICS_C_T"];
	
	$CIT_A_Q1 = $_POST["CIT_A_Q1"];		$CIT_C_Q1 = $_POST["CIT_C_Q1"];
	$CIT_A_Q2 = $_POST["CIT_A_Q2"];		$CIT_C_Q2 = $_POST["CIT_C_Q2"];
	$CIT_A_Q3 = $_POST["CIT_A_Q3"];		$CIT_C_Q3 = $_POST["CIT_C_Q3"];
	$CIT_A_Q4 = $_POST["CIT_A_Q4"];		$CIT_C_Q4 = $_POST["CIT_C_Q4"];
	$CIT_A_T = $_POST["CIT_A_T"];		$CIT_C_T = $_POST["CIT_C_T"];

	$TOTAL_A_Q1 = $_POST["TOTAL_A_Q1"];	$TOTAL_C_Q1 = $_POST["TOTAL_C_Q1"];
	$TOTAL_A_Q2 = $_POST["TOTAL_A_Q2"];	$TOTAL_C_Q2 = $_POST["TOTAL_C_Q2"];
	$TOTAL_A_Q3 = $_POST["TOTAL_A_Q3"];	$TOTAL_C_Q3 = $_POST["TOTAL_C_Q3"];
	$TOTAL_A_Q4 = $_POST["TOTAL_A_Q4"];	$TOTAL_C_Q4 = $_POST["TOTAL_C_Q4"];
	$TOTAL_A = $_POST["TOTAL_A"];	$TOTAL_C = $_POST["TOTAL_C"];

	$sql = ("UPDATE dashboard_targets
	SET CAFAD_A_Q1 = '$CAFAD_A_Q1', CAFAD_A_Q2 = '$CAFAD_A_Q2', CAFAD_A_Q3 = '$CAFAD_A_Q3', CAFAD_A_Q4 = '$CAFAD_A_Q4', CAFAD_A_T = '$CAFAD_A_T',
		COE_A_Q1 = '$COE_A_Q1', COE_A_Q2 = '$COE_A_Q2', COE_A_Q3 = '$COE_A_Q3', COE_A_Q4 = '$COE_A_Q4', COE_A_T = '$COE_A_T',
		CICS_A_Q1 = '$CICS_A_Q1', CICS_A_Q2 = '$CICS_A_Q2', CICS_A_Q3 = '$CICS_A_Q3', CICS_A_Q4 = '$CICS_A_Q4', CICS_A_T = '$CICS_A_T',
		CIT_A_Q1 = '$CIT_A_Q1', CIT_A_Q2 = '$CIT_A_Q2', CIT_A_Q3 = '$CIT_A_Q3', CIT_A_Q4 = '$CIT_A_Q4', CIT_A_T = '$CIT_A_T',
		TOTAL_A_Q1 = '$TOTAL_A_Q1', TOTAL_A_Q2 = '$TOTAL_A_Q2', TOTAL_A_Q3 = '$TOTAL_A_Q3', TOTAL_A_Q4 = '$TOTAL_A_Q4', TOTAL_A = '$TOTAL_A',

		CAFAD_C_Q1 = '$CAFAD_C_Q1', CAFAD_C_Q2 = '$CAFAD_C_Q2', CAFAD_C_Q3 = '$CAFAD_C_Q3', CAFAD_C_Q4 = '$CAFAD_C_Q4', CAFAD_C_T = '$CAFAD_C_T',
		COE_C_Q1 = '$COE_C_Q1', COE_C_Q2 = '$COE_C_Q2', COE_C_Q3 = '$COE_C_Q3', COE_C_Q4 = '$COE_C_Q4', COE_C_T = '$COE_C_T',
		CICS_C_Q1 = '$CICS_C_Q1', CICS_C_Q2 = '$CICS_C_Q2', CICS_C_Q3 = '$CICS_C_Q3', CICS_C_Q4 = '$CICS_C_Q4', CICS_C_T = '$CICS_C_T',
		CIT_C_Q1 = '$CIT_C_Q1', CIT_C_Q2 = '$CIT_C_Q2', CIT_C_Q3 = '$CIT_C_Q3', CIT_C_Q4 = '$CIT_C_Q4', CIT_C_T = '$CIT_C_T',
		TOTAL_C_Q1 = '$TOTAL_C_Q1', TOTAL_C_Q2 = '$TOTAL_C_Q2', TOTAL_C_Q3 = '$TOTAL_C_Q3', TOTAL_C_Q4 = '$TOTAL_C_Q4', TOTAL_C = '$TOTAL_C'
	WHERE Year = $CustomYear");
	$command = $con->query($sql) or die("Error encounter while updating data");
	echo "<script>
			alert('Target Set Successfuly');
			window.location='Dashboard.php';
		</script>";	
}
?>

<?php
//CAFAD
$dataPointsCAFAD_A = array(
	array("label"=> "Q1", "y"=> $dbCAFAD_A_Q1),
	array("label"=> "Q2", "y"=> $dbCAFAD_A_Q2),
	array("label"=> "Q3", "y"=> $dbCAFAD_A_Q3),
	array("label"=> "Q4", "y"=> $dbCAFAD_A_Q4)
);
$dataPointsCAFAD_B = array(
	array("label"=> "Q1", "y"=> $dbCAFAD_C_Q1),
	array("label"=> "Q2", "y"=> $dbCAFAD_C_Q2),
	array("label"=> "Q3", "y"=> $dbCAFAD_C_Q3),
	array("label"=> "Q4", "y"=> $dbCAFAD_C_Q4)
);

//CAFAD
$dataPointsCOE_A = array(
	array("label"=> "Q1", "y"=> $dbCOE_A_Q1),
	array("label"=> "Q2", "y"=> $dbCOE_A_Q2),
	array("label"=> "Q3", "y"=> $dbCOE_A_Q3),
	array("label"=> "Q4", "y"=> $dbCOE_A_Q4)
);
$dataPointsCOE_B = array(
	array("label"=> "Q1", "y"=> $dbCOE_C_Q1),
	array("label"=> "Q2", "y"=> $dbCOE_C_Q2),
	array("label"=> "Q3", "y"=> $dbCOE_C_Q3),
	array("label"=> "Q4", "y"=> $dbCOE_C_Q4)
);

//CICS
$dataPointsCICS_A = array(
	array("label"=> "Q1", "y"=> $dbCICS_A_Q1),
	array("label"=> "Q2", "y"=> $dbCICS_A_Q2),
	array("label"=> "Q3", "y"=> $dbCICS_A_Q3),
	array("label"=> "Q4", "y"=> $dbCICS_A_Q4)
);
$dataPointsCICS_B = array(
	array("label"=> "Q1", "y"=> $dbCICS_C_Q1),
	array("label"=> "Q2", "y"=> $dbCICS_C_Q2),
	array("label"=> "Q3", "y"=> $dbCICS_C_Q3),
	array("label"=> "Q4", "y"=> $dbCICS_C_Q4)
);

//CIT
$dataPointsCIT_A = array(
	array("label"=> "Q1", "y"=> $dbCIT_A_Q1),
	array("label"=> "Q2", "y"=> $dbCIT_A_Q2),
	array("label"=> "Q3", "y"=> $dbCIT_A_Q3),
	array("label"=> "Q4", "y"=> $dbCIT_A_Q4)
);
$dataPointsCIT_B = array(
	array("label"=> "Q1", "y"=> $dbCIT_C_Q1),
	array("label"=> "Q2", "y"=> $dbCIT_C_Q2),
	array("label"=> "Q3", "y"=> $dbCIT_C_Q3),
	array("label"=> "Q4", "y"=> $dbCIT_C_Q4)
);
?>

<script type="text/javascript">
function DisplayCharts(){
	var chartCAFAD = new CanvasJS.Chart("ChartCAFAD", {
		animationEnabled: true,
		theme: "light2",
		title:{ text: "CAFAD"},
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
			dataPoints: <?php echo json_encode($dataPointsCAFAD_A, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			name: "Actual",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#ff6242", //Actual
			dataPoints: <?php echo json_encode($dataPointsCAFAD_B, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartCAFAD.render();

	var chartCOE = new CanvasJS.Chart("ChartCOE", {
		animationEnabled: true,
		theme: "light2",
		title:{ text: "COE"},
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
			dataPoints: <?php echo json_encode($dataPointsCOE_A, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			name: "Actual",
			indexLabel: "{y}",
			indexLabelFontColor: "black",
			showInLegend: true,
			color: "#ff6242", //Actual
			dataPoints: <?php echo json_encode($dataPointsCOE_B, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chartCOE.render();

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
		chartCAFAD.render();
		chartCOE.render();
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

			document.getElementById('ChartForCAFAD').style.display = 'none';
			document.getElementById('ChartForCOE').style.display = 'none';
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

			document.getElementById('ChartForCAFAD').style.display = 'none';
			document.getElementById('ChartForCIT').style.display = 'none';
			document.getElementById('ChartForCOE').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}
if ($College == "CAFAD" AND $Position == "Coordinator" ){
	echo "
		<script> 
			document.getElementById('ChartForCAFAD').style.display = 'block';
			document.getElementById('ChartCAFAD').style.height = '450px';
			document.getElementById('ChartCAFAD').style.width = '650px';
			
			document.getElementById('TableForLabelText').style.display = 'block';
			document.getElementById('LabelText').innerHTML = 'College of Architecture, Fine Arts and Deisgn Targets/Actual';

			document.getElementById('ChartForCICS').style.display = 'none';
			document.getElementById('ChartForCIT').style.display = 'none';
			document.getElementById('ChartForCOE').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}

if ($College == "COE" AND $Position == "Coordinator" ){
	echo "
		<script> 
			document.getElementById('ChartForCOE').style.display = 'block';
			document.getElementById('ChartCOE').style.height = '450px';
			document.getElementById('ChartCOE').style.width = '650px';
			
			document.getElementById('TableForLabelText').style.display = 'block';
			document.getElementById('LabelText').innerHTML = 'College of Engineering Targets/Actual';

			document.getElementById('ChartForCICS').style.display = 'none';
			document.getElementById('ChartForCIT').style.display = 'none';
			document.getElementById('ChartForCAFAD').style.display = 'none';
			document.getElementById('TableForTargets').style.display = 'none';
			document.getElementById('ViewTargetButton').style.display = 'none';
		</script>
	";
}
?>

<?php include("RestrictNotif.php"); ?>