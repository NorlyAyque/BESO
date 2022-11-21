<?php
session_start();
include("Connection.php");
$YearToday = date("Y");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
?>

<?php
//Display Data of Target and Actual
$sql = ("SELECT * FROM target_alangilan WHERE Year = $YearToday");
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
}
include_once ("Dashboard-Computations.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Dashborad BESO Portal</title>
<link rel="stylesheet" type="text/css" href="styles/Dashboard-style.css">

</head>
<body onload="Compute()">

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
			
				<div class="btnview">
				<a href="View.php" button class = "adduser"> View Target<ion-icon name="eye-outline"></ion-icon></a> </button>
			</div>
					
				</div>
			
			<div class ="scroll">

<form action="" method="POST">
			
			<table class="input">
				<tbody>
					<tr>
						<th colspan="23"> 
							<h2> EXTENSION SERVICES <?php echo $YearToday;?> TARGETS </h2>
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
									</select>	
									<input type="submit" id="Createbtn" name="Createbtn" value="CREATE">
									<span id="Cancel" onclick="Cancel()">CANCEL</span>
								
								</a>						
						</th>	
						<th colspan="12" class="SaveCancel">
							<a id="Enable_SaveBtn" onclick="Enable_SaveBtn()">Edit Target/Actual</a>
							<a id="savebtn" style="display:none">
									<input type="submit" class="Ssave" name="Savebtn" value="Save"> 
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
						<td>Total</td>
						
						<td>1st Qrt</td>
						<td>2nd Qrt</td>
						<td>3rd Qrt</td>
						<td>4th Qrt</td>
						<td>Total</td>
						
						<td style=" background-color:#D6E4E5";>1st Qrt</td>
						<td style=" background-color:#D6E4E5";>2nd Qrt</td>
						<td style=" background-color:#D6E4E5";>3rd Qrt</td>
						<td style=" background-color:#D6E4E5";>4th Qrt</td>
						<td style=" background-color:#D6E4E5";>Total</td>
						
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
						<td>13</td>
						<td><input type = "number" min="0" name="CEAFA_AQ1" id="CEAFA_AQ1" value="<?php echo $dbCEAFA_AQ1;?>" onchange="CalCEAFA_A()" REQUIRED></td>
						<td><input type = "number" min="0" name="CEAFA_AQ2" id="CEAFA_AQ2" value="<?php echo $dbCEAFA_AQ2;?>" onchange="CalCEAFA_A()" REQUIRED></td>
						<td><input type = "number" min="0" name="CEAFA_AQ3" id="CEAFA_AQ3" value="<?php echo $dbCEAFA_AQ3;?>" onchange="CalCEAFA_A()" REQUIRED></td>
						<td><input type = "number" min="0" name="CEAFA_AQ4" id="CEAFA_AQ4" value="<?php echo $dbCEAFA_AQ4;?>" onchange="CalCEAFA_A()" REQUIRED></td>
						<td><input type = "number" min="0" name="CEAFA_AQT" id="CEAFA_AQT" value="<?php echo $dbCEAFA_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" id="T_R1Q1" value="<?php echo $T_R1Q1;?>" readonly></td> <!-- Trainees Row 1 Q1 -->
						<td><input type = "number" min="0" id="T_R1Q2" value="<?php echo $T_R1Q2;?>" readonly></td> <!-- Trainees Row 1 Q2 -->
						<td><input type = "number" min="0" id="T_R1Q3" value="<?php echo $T_R1Q3;?>" readonly></td> <!-- Trainees Row 1 Q3 -->
						<td><input type = "number" min="0" id="T_R1Q4" value="<?php echo $T_R1Q4;?>" readonly></td> <!-- Trainees Row 1 Q4 -->
						<td><input type = "number" min="0" id="T_R1_T" value="<?php echo $T_R1_T;?>" readonly></td> <!-- Trainees Row 1 Total -->
						
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CEAFA_BQ1" id="CEAFA_BQ1" value="<?php echo $dbCEAFA_BQ1;?>" onchange="CalCEAFA_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CEAFA_BQ2" id="CEAFA_BQ2" value="<?php echo $dbCEAFA_BQ2;?>" onchange="CalCEAFA_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CEAFA_BQ3" id="CEAFA_BQ3" value="<?php echo $dbCEAFA_BQ3;?>" onchange="CalCEAFA_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CEAFA_BQ4" id="CEAFA_BQ4" value="<?php echo $dbCEAFA_BQ4;?>" onchange="CalCEAFA_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CEAFA_BQT" id="CEAFA_BQT" value="<?php echo $dbCEAFA_BQT;?>" readonly> </td> 

						<td><input type = "text" id="P_R1Q1" value="<?php echo $P_R1Q1;?>" readonly></td> <!-- Percentage Row 1 Q1 -->
						<td><input type = "text" id="P_R1Q2" value="<?php echo $P_R1Q2;?>" readonly></td> <!-- Percentage Row 1 Q2 -->
						<td><input type = "text" id="P_R1Q3" value="<?php echo $P_R1Q3;?>" readonly></td> <!-- Percentage Row 1 Q3 -->
						<td><input type = "text" id="P_R1Q4" value="<?php echo $P_R1Q4;?>" readonly></td> <!-- Percentage Row 1 Q4 -->
						<td><input type = "text" id="P_R1_T" value="<?php echo $P_R1_T;?>" readonly></td> <!-- Percentage Row 1 Total -->
						
						<td  rowspan="3" class="input1" >₱<?php echo $Budget;?></td>
					</tr>
					<tr>
						<th>CICS</th>
						<td>4</td>
						<td><input type = "number" min="0" name="CICS_AQ1" id="CICS_AQ1" value="<?php echo $dbCICS_AQ1;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ2" id="CICS_AQ2" value="<?php echo $dbCICS_AQ2;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ3" id="CICS_AQ3" value="<?php echo $dbCICS_AQ3;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQ4" id="CICS_AQ4" value="<?php echo $dbCICS_AQ4;?>" onchange="CalCICS_A()"></td>
						<td><input type = "number" min="0" name="CICS_AQT" id="CICS_AQT" value="<?php echo $dbCICS_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" id="T_R2Q1" value="<?php echo $T_R2Q1;?>" readonly></td> <!-- Trainees Row 2 Q1 -->
						<td><input type = "number" min="0" id="T_R2Q2" value="<?php echo $T_R2Q2;?>" readonly></td> <!-- Trainees Row 2 Q2 -->
						<td><input type = "number" min="0" id="T_R2Q3" value="<?php echo $T_R2Q3;?>" readonly></td> <!-- Trainees Row 2 Q3 -->
						<td><input type = "number" min="0" id="T_R2Q4" value="<?php echo $T_R2Q4;?>" readonly></td> <!-- Trainees Row 2 Q4 -->
						<td><input type = "number" min="0" id="T_R2_T" value="<?php echo $T_R2_T;?>" readonly></td> <!-- Trainees Row 2 Total -->
						
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CICS_BQ1" id="CICS_BQ1" value="<?php echo $dbCICS_BQ1;?>" onchange="CalCICS_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CICS_BQ2" id="CICS_BQ2" value="<?php echo $dbCICS_BQ2;?>" onchange="CalCICS_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CICS_BQ3" id="CICS_BQ3" value="<?php echo $dbCICS_BQ3;?>" onchange="CalCICS_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CICS_BQ4" id="CICS_BQ4" value="<?php echo $dbCICS_BQ4;?>" onchange="CalCICS_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CICS_BQT" id="CICS_BQT" value="<?php echo $dbCICS_BQT;?>" readonly> </td> 

						<td><input type = "text" id="P_R2Q1" value="<?php echo $P_R2Q1;?>" readonly></td> <!-- Percentage Row 2 Q1 -->
						<td><input type = "text" id="P_R2Q2" value="<?php echo $P_R2Q2;?>" readonly></td> <!-- Percentage Row 2 Q2 -->
						<td><input type = "text" id="P_R2Q3" value="<?php echo $P_R2Q3;?>" readonly></td> <!-- Percentage Row 2 Q3 -->
						<td><input type = "text" id="P_R2Q4" value="<?php echo $P_R2Q4;?>" readonly></td> <!-- Percentage Row 2 Q4 -->
						<td><input type = "text" id="P_R2_T" value="<?php echo $P_R2_T;?>" readonly></td> <!-- Percentage Row 2 Total -->
						 
					</tr>
					<tr>
						<th>CIT</th>
						<td>6</td>
						<td><input type = "number" min="0" name="CIT_AQ1" id="CIT_AQ1" value="<?php echo $dbCIT_AQ1;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ2" id="CIT_AQ2" value="<?php echo $dbCIT_AQ2;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ3" id="CIT_AQ3" value="<?php echo $dbCIT_AQ3;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQ4" id="CIT_AQ4" value="<?php echo $dbCIT_AQ4;?>" onchange="CalCIT_A()"></td>
						<td><input type = "number" min="0" name="CIT_AQT" id="CIT_AQT" value="<?php echo $dbCIT_AQT;?>" readonly> </td> 
						
						<td><input type = "number" min="0" id="T_R3Q1" value="<?php echo $T_R3Q1;?>" readonly></td> <!-- Trainees Row 3 Q1 -->
						<td><input type = "number" min="0" id="T_R3Q2" value="<?php echo $T_R3Q2;?>" readonly></td> <!-- Trainees Row 3 Q2 -->
						<td><input type = "number" min="0" id="T_R3Q3" value="<?php echo $T_R3Q3;?>" readonly></td> <!-- Trainees Row 3 Q3 -->
						<td><input type = "number" min="0" id="T_R3Q4" value="<?php echo $T_R3Q4;?>" readonly></td> <!-- Trainees Row 3 Q4 -->
						<td><input type = "number" min="0" id="T_R3_T" value="<?php echo $T_R3_T;?>" readonly></td> <!-- Trainees Row 3 Total -->

						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CIT_BQ1" id="CIT_BQ1" value="<?php echo $dbCIT_BQ1;?>" onchange="CalCIT_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CIT_BQ2" id="CIT_BQ2" value="<?php echo $dbCIT_BQ2;?>" onchange="CalCIT_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CIT_BQ3" id="CIT_BQ3" value="<?php echo $dbCIT_BQ3;?>" onchange="CalCIT_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CIT_BQ4" id="CIT_BQ4" value="<?php echo $dbCIT_BQ4;?>" onchange="CalCIT_B()"></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="CIT_BQT" id="CIT_BQT" value="<?php echo $dbCIT_BQT;?>" readonly> </td> 

						<td><input type = "text" id="P_R3Q1" value="<?php echo $P_R3Q1;?>" readonly></td> <!-- Percentage Row 3 Q1 -->
						<td><input type = "text" id="P_R3Q2" value="<?php echo $P_R3Q2;?>" readonly></td> <!-- Percentage Row 3 Q2 -->
						<td><input type = "text" id="P_R3Q3" value="<?php echo $P_R3Q3;?>" readonly></td> <!-- Percentage Row 3 Q3 -->
						<td><input type = "text" id="P_R3Q4" value="<?php echo $P_R3Q4;?>" readonly></td> <!-- Percentage Row 3 Q4 -->
						<td><input type = "text" id="P_R3_T" value="<?php echo $P_R3_T;?>" readonly></td> <!-- Percentage Row 3 Total -->
						
					</tr>
					<tr>
						<th>Total</th> 
						<td>23</td>
						<td><input type = "number" min="0" name="AT_Q1" id="AT_Q1" value="<?php echo $dbAT_Q1;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q2" id="AT_Q2" value="<?php echo $dbAT_Q2;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q3" id="AT_Q3" value="<?php echo $dbAT_Q3;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_Q4" id="AT_Q4" value="<?php echo $dbAT_Q4;?>" readonly></td>
						<td><input type = "number" min="0" name="AT_QT" id="AT_QT" value="<?php echo $dbAT_QT;?>" readonly></td>

						<td><input type = "number" min="0" id="T_R4Q1" value="<?php echo $T_R4Q1;?>" readonly></td> <!-- Trainees Row 4 Q1 -->
						<td><input type = "number" min="0" id="T_R4Q2" value="<?php echo $T_R4Q2;?>" readonly></td> <!-- Trainees Row 4 Q2 -->
						<td><input type = "number" min="0" id="T_R4Q3" value="<?php echo $T_R4Q3;?>" readonly></td> <!-- Trainees Row 4 Q3 -->
						<td><input type = "number" min="0" id="T_R4Q4" value="<?php echo $T_R4Q4;?>" readonly></td> <!-- Trainees Row 4 Q4 -->
						<td><input type = "number" min="0" id="T_R4_T" value="<?php echo $T_R4_T;?>" readonly></td> <!-- Trainees Row 4 Total -->
						
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="BT_Q1" id="BT_Q1" value="<?php echo $dbBT_Q1;?>" readonly></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="BT_Q2" id="BT_Q2" value="<?php echo $dbBT_Q2;?>" readonly></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="BT_Q3" id="BT_Q3" value="<?php echo $dbBT_Q3;?>" readonly></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="BT_Q4" id="BT_Q4" value="<?php echo $dbBT_Q4;?>" readonly></td>
						<td style=" background-color:#D6E4E5";><input type = "number" min="0" name="BT_QT" id="BT_QT" value="<?php echo $dbBT_QT;?>" readonly></td>

						<td colspan="5" class="input2"><input type = "text" id="PercentageTotal" value="<?php echo $PercentageTotal;?>" readonly></td> <!-- Percentage Row 4 Total -->

						<td class="input1">₱<?php echo $Budget;?></td>
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
Disable_Inputs()
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

function Enable_Inputs(){
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

//Auto Compute for Number of Trainees weight by length of training
//Rows
function T_R1_T(){
	let A = document.getElementById('T_R1Q1').value;
	let B = document.getElementById('T_R1Q2').value;
	let C = document.getElementById('T_R1Q3').value;
	let D = document.getElementById('T_R1Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("T_R1_T").value = ans;
}
function T_R2_T(){
	let A = document.getElementById('T_R2Q1').value;
	let B = document.getElementById('T_R2Q2').value;
	let C = document.getElementById('T_R2Q3').value;
	let D = document.getElementById('T_R2Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("T_R2_T").value = ans;
}
function T_R3_T(){
	let A = document.getElementById('T_R3Q1').value;
	let B = document.getElementById('T_R3Q2').value;
	let C = document.getElementById('T_R3Q3').value;
	let D = document.getElementById('T_R3Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("T_R3_T").value = ans;
}
//Columns
function T_R4Q1(){
	let A = document.getElementById('T_R1Q1').value;
	let B = document.getElementById('T_R2Q1').value;
	let C = document.getElementById('T_R3Q1').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("T_R4Q1").value = ans;
}
function T_R4Q2(){
	let A = document.getElementById('T_R1Q2').value;
	let B = document.getElementById('T_R2Q2').value;
	let C = document.getElementById('T_R3Q2').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("T_R4Q2").value = ans;
}
function T_R4Q3(){
	let A = document.getElementById('T_R1Q3').value;
	let B = document.getElementById('T_R2Q3').value;
	let C = document.getElementById('T_R3Q3').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("T_R4Q3").value = ans;
}
function T_R4Q4(){
	let A = document.getElementById('T_R1Q4').value;
	let B = document.getElementById('T_R2Q4').value;
	let C = document.getElementById('T_R3Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C));
	document.getElementById("T_R4Q4").value = ans;
}
function T_R4_T(){
	let A = document.getElementById('T_R4Q1').value;
	let B = document.getElementById('T_R4Q2').value;
	let C = document.getElementById('T_R4Q3').value;
	let D = document.getElementById('T_R4Q4').value;
	let ans = (parseInt(A)) + (parseInt(B)) + (parseInt(C)) + (parseInt(D));
	document.getElementById("T_R4_T").value = ans;
}

function P_R1_T(){
	let A = document.getElementById('P_R1Q1').value;
	let B = document.getElementById('P_R1Q2').value;
	let C = document.getElementById('P_R1Q3').value;
	let D = document.getElementById('P_R1Q4').value;

	if ((A > 0) && (B == 0) && (C == 0) && (D == 0)) {Count = 1;}	//A
	if ((A == 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 1;}	//B
	if ((A == 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 1;}	//C
	if ((A == 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 1;}	//D

	if ((A > 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 2;}	//AB
	if ((A > 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 2;}	//AC
	if ((A > 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 2;}	//AD
	if ((A == 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 2;}	//BC
	if ((A == 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 2;}	//BD
	if ((A == 0) && (B == 0) && (C > 0) && (D > 0)) {Count = 2;}	//CD

	if ((A > 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 3;}		//ABC
	if ((A > 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 3;}		//ABD
	if ((A == 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 3;}		//BCD

	if ((A > 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 4;}		//ABCD

	let ans = (((parseFloat(A)) + (parseFloat(B)) + (parseFloat(C)) + (parseFloat(D)))/Count);
	let answer = ans.toFixed(1);
	document.getElementById("P_R1_T").value = answer;
}
function P_R2_T(){
	let A = document.getElementById('P_R2Q1').value;
	let B = document.getElementById('P_R2Q2').value;
	let C = document.getElementById('P_R2Q3').value;
	let D = document.getElementById('P_R2Q4').value;

	if ((A > 0) && (B == 0) && (C == 0) && (D == 0)) {Count = 1;}	//A
	if ((A == 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 1;}	//B
	if ((A == 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 1;}	//C
	if ((A == 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 1;}	//D

	if ((A > 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 2;}	//AB
	if ((A > 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 2;}	//AC
	if ((A > 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 2;}	//AD
	if ((A == 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 2;}	//BC
	if ((A == 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 2;}	//BD
	if ((A == 0) && (B == 0) && (C > 0) && (D > 0)) {Count = 2;}	//CD

	if ((A > 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 3;}		//ABC
	if ((A > 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 3;}		//ABD
	if ((A == 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 3;}		//BCD

	if ((A > 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 4;}		//ABCD

	let ans = (((parseFloat(A)) + (parseFloat(B)) + (parseFloat(C)) + (parseFloat(D)))/Count);
	let answer = ans.toFixed(1);
	document.getElementById("P_R2_T").value = answer;
}
function P_R3_T(){
	let A = document.getElementById('P_R3Q1').value;
	let B = document.getElementById('P_R3Q2').value;
	let C = document.getElementById('P_R3Q3').value;
	let D = document.getElementById('P_R3Q4').value;

	if ((A > 0) && (B == 0) && (C == 0) && (D == 0)) {Count = 1;}	//A
	if ((A == 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 1;}	//B
	if ((A == 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 1;}	//C
	if ((A == 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 1;}	//D

	if ((A > 0) && (B > 0) && (C == 0) && (D == 0)) {Count = 2;}	//AB
	if ((A > 0) && (B == 0) && (C > 0) && (D == 0)) {Count = 2;}	//AC
	if ((A > 0) && (B == 0) && (C == 0) && (D > 0)) {Count = 2;}	//AD
	if ((A == 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 2;}	//BC
	if ((A == 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 2;}	//BD
	if ((A == 0) && (B == 0) && (C > 0) && (D > 0)) {Count = 2;}	//CD

	if ((A > 0) && (B > 0) && (C > 0) && (D == 0)) {Count = 3;}		//ABC
	if ((A > 0) && (B > 0) && (C == 0) && (D > 0)) {Count = 3;}		//ABD
	if ((A == 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 3;}		//BCD

	if ((A > 0) && (B > 0) && (C > 0) && (D > 0)) {Count = 4;}		//ABCD

	let ans = (((parseFloat(A)) + (parseFloat(B)) + (parseFloat(C)) + (parseFloat(D)))/Count);
	let answer = ans.toFixed(1);
	document.getElementById("P_R3_T").value = answer;
}
function PercentageTotal(){
	let A = document.getElementById('P_R1_T').value;
	let B = document.getElementById('P_R2_T').value;
	let C = document.getElementById('P_R3_T').value;

	if ((A > 0) && (B == 0) && (C == 0)) {Count = 1;}	//A
	if ((A == 0) && (B > 0) && (C == 0)) {Count = 1;}	//B
	if ((A == 0) && (B == 0) && (C > 0)) {Count = 1;}	//C

	if ((A > 0) && (B > 0) && (C == 0)) {Count = 2;}	//AB
	if ((A > 0) && (B == 0) && (C > 0)) {Count = 2;}	//AC
	if ((A == 0) && (B > 0) && (C > 0)) {Count = 2;}	//BC

	if ((A > 0) && (B > 0) && (C > 0)) {Count = 3;}	//ABC
	
	let ans = (((parseFloat(A)) + (parseFloat(B)) + (parseFloat(C)))/Count);
	let answer = ans.toFixed(1);
	document.getElementById("PercentageTotal").value = answer;
}

//Compute Trainees and Percentage
function Compute(){
	T_R1_T();	T_R2_T();	T_R3_T();	
	T_R4Q1();	T_R4Q2();	T_R4Q3();	T_R4Q4();	T_R4_T();

	P_R1_T();	P_R2_T();	P_R3_T();
	PercentageTotal();	
}



</script>

<script>
//for Buttons
function Enable_Dropdown(){ //For Create Target
	Enable_Inputs(); //Call function to enable the input text
	Clear_Inputs();
	document.getElementById("Enable_Dropdown").style.display = "none";
	document.getElementById("Dropdown").style.display = "block";
	document.getElementById("Enable_SaveBtn").style.display = "none";
}

function Enable_SaveBtn(){//For Edit Target
	Enable_Inputs();//Call function to enable the input text
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
	WHERE Year = $YearToday");
	$command = $con->query($sql) or die("Error encounter while updating data");
	echo "<script>
			alert('Target Set Successfuly');
			window.location='Dashboard.php';
		</script>";	
}
?>


