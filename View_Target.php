<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
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

$SelectedYear = $CustomYear;
$Prompt = "<h1> Please Select Year </h1>";

if(isset($_GET['Year']) == TRUE)  {
	$SelectedYear = $_GET['Year'];

	//Checking if Year is Exisiting
	$sql = mysqli_query($con,"SELECT * FROM dashboard_targets WHERE Year = '$SelectedYear'");
	if(mysqli_num_rows($sql)>0){
		//Year is Existing
		
		$sql = ("SELECT * FROM dashboard_targets WHERE Year = $SelectedYear");
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

				$dbPercentage = $result["PercentageTotal"];
				$dbBudget = $result["Budget"];
			}

		$Prompt = "<h1>Record Found for Year $SelectedYear</h1>";
	}
	else { $Prompt = "<h1>No Record Found Year $SelectedYear</h1>"; }
}
//include_once ("Dashboard-Computations.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Dashborad BESO Portal</title>
<link rel="stylesheet" type="text/css" href="styles/Dashboard.css">

</head>
<body> 


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
		<br>
		<?php 
					echo "<table class='PromptHead'>";
                echo "<tr>
							<td> <div class='textHead'> $Prompt </div></td>
						</tr>
					";
					
				
				echo "</table>";
		
			 ?> <!-- Adjust mo to -->
		<br>
			<div class ="scroll">

<form action="View_Target.php" method="_GET">
			<table class="input">
				<tbody>
					<tr>
						<th colspan="23"> 
							<h1> EXTENSION SERVICES VIEW TARGETS for Year <?php echo "$SelectedYear";?> </h1>
							<p> BATANGAS STATE UNIVERSITY ALANGILAN </p>
						</th>
					<tr>
					</tr>
					</tr>
					<tr id="row">
						<th colspan="32"> 
							<div id="DropdownTa" > 
								Type Year:
									<input type="number" name="Year" value="<?php echo $SelectedYear; ?>" required>
							</div>
							<div id="CreatebtnTa" > 
							<input type="submit"  value="VIEW">	
							
												
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
						<th>CAFAD</th>
						<td>13</td>
						<td><?php echo $dbCAFAD_A_Q1;?></td>
						<td><?php echo $dbCAFAD_A_Q2;?></td>
						<td><?php echo $dbCAFAD_A_Q3;?></td>
						<td><?php echo $dbCAFAD_A_Q4;?></td>
						<td><?php echo $dbCAFAD_A_T;?></td> 
						
						<td><?php echo "$dbCAFAD_B_Q1";?></td> 
						<td><?php echo "$dbCAFAD_B_Q2";?></td> 
						<td><?php echo "$dbCAFAD_B_Q3";?></td> 
						<td><?php echo "$dbCAFAD_B_Q4";?></td> 
						<td><?php echo "$dbCAFAD_B_T";?></td> 
						
						<td><?php echo $dbCAFAD_C_Q1;?></td>
						<td><?php echo $dbCAFAD_C_Q2;?></td>
						<td><?php echo $dbCAFAD_C_Q3;?></td>
						<td><?php echo $dbCAFAD_C_Q4;?></td>
						<td><?php echo $dbCAFAD_C_T;?></td>

						<td><?php echo "$dbCAFAD_D_Q1";?>%</td>
						<td><?php echo "$dbCAFAD_D_Q2";?>%</td>
						<td><?php echo "$dbCAFAD_D_Q3";?>%</td>
						<td><?php echo "$dbCAFAD_D_Q4";?>%</td>
						<td><?php echo "$dbCAFAD_D_T";?>%</td>

						<td rowspan="4">₱<?php echo "$dbBudget";?></td><!-- Budget -->
					</tr>
					<tr >
						<th>COE</th>
						<td>13</td>
						<td><?php echo $dbCOE_A_Q1;?></td>
						<td><?php echo $dbCOE_A_Q2;?></td>
						<td><?php echo $dbCOE_A_Q3;?></td>
						<td><?php echo $dbCOE_A_Q4;?></td>
						<td><?php echo $dbCOE_A_T;?></td> 
						
						<td><?php echo "$dbCOE_B_Q1";?></td> 
						<td><?php echo "$dbCOE_B_Q2";?></td> 
						<td><?php echo "$dbCOE_B_Q3";?></td> 
						<td><?php echo "$dbCOE_B_Q4";?></td> 
						<td><?php echo "$dbCOE_B_T";?></td> 
						
						<td><?php echo $dbCOE_C_Q1;?></td>
						<td><?php echo $dbCOE_C_Q2;?></td>
						<td><?php echo $dbCOE_C_Q3;?></td>
						<td><?php echo $dbCOE_C_Q4;?></td>
						<td><?php echo $dbCOE_C_T;?></td>

						<td><?php echo "$dbCOE_D_Q1";?>%</td>
						<td><?php echo "$dbCOE_D_Q2";?>%</td>
						<td><?php echo "$dbCOE_D_Q3";?>%</td>
						<td><?php echo "$dbCOE_D_Q4";?>%</td>
						<td><?php echo "$dbCOE_D_T";?>%</td>
					</tr>
					<tr>
						<th>CICS</th>
						<td>4</td>
						<td><?php echo $dbCICS_A_Q1;?></td>
						<td><?php echo $dbCICS_A_Q2;?></td>
						<td><?php echo $dbCICS_A_Q3;?></td>
						<td><?php echo $dbCICS_A_Q4;?></td>
						<td><?php echo $dbCICS_A_T;?></td>
						
						<td><?php echo "$dbCICS_B_Q1";?></td>
						<td><?php echo "$dbCICS_B_Q2";?></td>
						<td><?php echo "$dbCICS_B_Q3";?></td>
						<td><?php echo "$dbCICS_B_Q4";?></td>
						<td><?php echo "$dbCICS_B_T";?></td>
						
						<td><?php echo $dbCICS_C_Q1;?></td>
						<td><?php echo $dbCICS_C_Q2;?></td>
						<td><?php echo $dbCICS_C_Q3;?></td>
						<td><?php echo $dbCICS_C_Q4;?></td>
						<td><?php echo $dbCICS_C_T;?></td>

						<td><?php echo "$dbCICS_D_Q1";?>%</td>
						<td><?php echo "$dbCICS_D_Q2";?>%</td>
						<td><?php echo "$dbCICS_D_Q3";?>%</td>
						<td><?php echo "$dbCICS_D_Q4";?>%</td>
						<td><?php echo "$dbCICS_D_T";?>%</td>
					</tr>
					<tr>
						<th>CIT</th>
						<td>6</td>
						<td><?php echo $dbCIT_A_Q1;?></td>
						<td><?php echo $dbCIT_A_Q2;?></td>
						<td><?php echo $dbCIT_A_Q3;?></td>
						<td><?php echo $dbCIT_A_Q4;?></td>
						<td><?php echo $dbCIT_A_T;?></td>
						
						<td><?php echo "$dbCIT_B_Q1";?></td>
						<td><?php echo "$dbCIT_B_Q2";?></td>
						<td><?php echo "$dbCIT_B_Q3";?></td>
						<td><?php echo "$dbCIT_B_Q4";?></td>
						<td><?php echo "$dbCIT_B_T";?></td>
						
						<td><?php echo $dbCIT_C_Q1;?></td>
						<td><?php echo $dbCIT_C_Q2;?></td>
						<td><?php echo $dbCIT_C_Q3;?></td>
						<td><?php echo $dbCIT_C_Q4;?></td>
						<td><?php echo $dbCIT_C_T;?></td>

						<td><?php echo "$dbCIT_D_Q1";?>%</td>
						<td><?php echo "$dbCIT_D_Q2";?>%</td>
						<td><?php echo "$dbCIT_D_Q3";?>%</td>
						<td><?php echo "$dbCIT_D_Q4";?>%</td>
						<td><?php echo "$dbCIT_D_T";?>%</td>
					</tr>
					<tr>
						<th>Total</th> 
						<td>23</td>
						<td><?php echo $dbTOTAL_A_Q1;?></td>
						<td><?php echo $dbTOTAL_A_Q2;?></td>
						<td><?php echo $dbTOTAL_A_Q3;?></td>
						<td><?php echo $dbTOTAL_A_Q4;?></td>
						<td><?php echo $dbTOTAL_A;?></td>
					
						<td><?php echo "$dbTOTAL_B_Q1";?></td>
						<td><?php echo "$dbTOTAL_B_Q2";?></td>
						<td><?php echo "$dbTOTAL_B_Q3";?></td>
						<td><?php echo "$dbTOTAL_B_Q4";?></td>
						<td><?php echo "$dbTOTAL_B";?></td>
						
						<td><?php echo $dbTOTAL_C_Q1;?></td>
						<td><?php echo $dbTOTAL_C_Q2;?></td>
						<td><?php echo $dbTOTAL_C_Q3;?></td>
						<td><?php echo $dbTOTAL_C_Q4;?></td>
						<td><?php echo $dbTOTAL_C;?></td>
						
						<td colspan="5"><?php echo "$dbPercentage";?>%</td>

						<td>₱<?php echo "$dbBudget";?></td>
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

<?php include("RestrictNotif.php"); ?>