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

$SelectedYear = $CustomYear;
$Prompt = "<h1> Please Select Year </h1>";

if(isset($_GET['Year']) == TRUE)  {
	$SelectedYear = $_GET['Year'];

	//Checking if Year is Exisiting
	$sql = mysqli_query($con,"SELECT * FROM target_alangilan WHERE Year = '$SelectedYear'");
	if(mysqli_num_rows($sql)>0){
		//Year is Existing
		
		$sql = ("SELECT * FROM target_alangilan WHERE Year = $SelectedYear");
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
<link rel="stylesheet" type="text/css" href="styles/Dashboard-STYLE.css">

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
						<span class="icon-buttonDASH">44</span>
					</div>
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
						<th>CEAFA</th>
						<td>13</td>
						<td><?php echo $dbCEAFA_AQ1;?></td> <!-- Target Row 1 Q1 -->
						<td><?php echo $dbCEAFA_AQ2;?></td> <!-- Target Row 1 Q2 -->
						<td><?php echo $dbCEAFA_AQ3;?></td> <!-- Target Row 1 Q3 -->
						<td><?php echo $dbCEAFA_AQ4;?></td> <!-- Target Row 1 Q4 -->
						<td><?php echo $dbCEAFA_AQT;?></td> <!-- Target Row 1 Total -->
						
						<td><?php echo "$dbT_R1Q1";?></td> <!-- Trainees Row 1 Q1 -->
						<td><?php echo "$dbT_R1Q2";?></td> <!-- Trainees Row 1 Q2 -->
						<td><?php echo "$dbT_R1Q3";?></td> <!-- Trainees Row 1 Q3 -->
						<td><?php echo "$dbT_R1Q4";?></td> <!-- Trainees Row 1 Q4 -->
						<td><?php echo "$dbT_R1_T";?></td> <!-- Trainees Row 1 Total -->
						
						<td><?php echo $dbCEAFA_BQ1;?></td> <!-- Actual Row 1 Q1 -->
						<td><?php echo $dbCEAFA_BQ2;?></td> <!-- Actual Row 1 Q2 -->
						<td><?php echo $dbCEAFA_BQ3;?></td> <!-- Actual Row 1 Q3 -->
						<td><?php echo $dbCEAFA_BQ4;?></td> <!-- Actual Row 1 Q4 -->
						<td><?php echo $dbCEAFA_BQT;?></td> <!-- Actual Row 1 Total -->

						<td><?php echo "$dbP_R1Q1";?>%</td> <!-- Percentage Row 1 Q1 -->
						<td><?php echo "$dbP_R1Q2";?>%</td> <!-- Percentage Row 1 Q2 -->
						<td><?php echo "$dbP_R1Q3";?>%</td> <!-- Percentage Row 1 Q3 -->
						<td><?php echo "$dbP_R1Q4";?>%</td> <!-- Percentage Row 1 Q4 -->
						<td><?php echo "$dbP_R1_T";?>%</td> <!-- Percentage Row 1 Total -->

						<td rowspan="3">₱<?php echo "$dbBudget";?></td><!-- Budget -->
					</tr>
					<tr>
						<th>CICS</th>
						<td>4</td>
						<td><?php echo $dbCICS_AQ1;?></td> <!-- Target Row 2 Q1 -->
						<td><?php echo $dbCICS_AQ2;?></td> <!-- Target Row 2 Q2 -->
						<td><?php echo $dbCICS_AQ3;?></td> <!-- Target Row 2 Q3 -->
						<td><?php echo $dbCICS_AQ4;?></td> <!-- Target Row 2 Q4 -->
						<td><?php echo $dbCICS_AQT;?></td> <!-- Target Row 2 Total -->
						
						<td><?php echo "$dbT_R2Q1";?></td> <!-- Trainees Row 2 Q1 -->
						<td><?php echo "$dbT_R2Q2";?></td> <!-- Trainees Row 2 Q2 -->
						<td><?php echo "$dbT_R2Q3";?></td> <!-- Trainees Row 2 Q3 -->
						<td><?php echo "$dbT_R2Q4";?></td> <!-- Trainees Row 2 Q4 -->
						<td><?php echo "$dbT_R2_T";?></td> <!-- Trainees Row 2 Total -->
						
						<td><?php echo $dbCICS_BQ1;?></td> <!-- Actual Row 2 Q1 -->
						<td><?php echo $dbCICS_BQ2;?></td> <!-- Actual Row 2 Q2 -->
						<td><?php echo $dbCICS_BQ3;?></td> <!-- Actual Row 2 Q3 -->
						<td><?php echo $dbCICS_BQ4;?></td> <!-- Actual Row 2 Q4 -->
						<td><?php echo $dbCICS_BQT;?></td> <!-- Actual Row 2 Total -->

						<td><?php echo "$dbP_R2Q1";?>%</td> <!-- Percentage Row 2 Q1 -->
						<td><?php echo "$dbP_R2Q2";?>%</td> <!-- Percentage Row 2 Q2 -->
						<td><?php echo "$dbP_R2Q3";?>%</td> <!-- Percentage Row 2 Q3 -->
						<td><?php echo "$dbP_R2Q4";?>%</td> <!-- Percentage Row 2 Q4 -->
						<td><?php echo "$dbP_R2_T";?>%</td> <!-- Percentage Row 2 Total -->	 
					</tr>
					<tr>
						<th>CIT</th>
						<td>6</td>
						<td><?php echo $dbCIT_AQ1;?></td> <!-- Target Row 3 Q1 -->
						<td><?php echo $dbCIT_AQ2;?></td> <!-- Target Row 3 Q2 -->
						<td><?php echo $dbCIT_AQ3;?></td> <!-- Target Row 3 Q3 -->
						<td><?php echo $dbCIT_AQ4;?></td> <!-- Target Row 3 Q4 -->
						<td><?php echo $dbCIT_AQT;?></td> <!-- Target Row 3 Total -->
						
						<td><?php echo "$dbT_R3Q1";?></td> <!-- Trainees Row 3 Q1 -->
						<td><?php echo "$dbT_R3Q2";?></td> <!-- Trainees Row 3 Q2 -->
						<td><?php echo "$dbT_R3Q3";?></td> <!-- Trainees Row 3 Q3 -->
						<td><?php echo "$dbT_R3Q4";?></td> <!-- Trainees Row 3 Q4 -->
						<td><?php echo "$dbT_R3_T";?></td> <!-- Trainees Row 3 Total -->
						
						<td><?php echo $dbCIT_BQ1;?></td> <!-- Actual Row 3 Q1 -->
						<td><?php echo $dbCIT_BQ2;?></td> <!-- Actual Row 3 Q2 -->
						<td><?php echo $dbCIT_BQ3;?></td> <!-- Actual Row 3 Q3 -->
						<td><?php echo $dbCIT_BQ4;?></td> <!-- Actual Row 3 Q4 -->
						<td><?php echo $dbCIT_BQT;?></td> <!-- Actual Row 3 Total -->

						<td><?php echo "$dbP_R3Q1";?>%</td> <!-- Percentage Row 3 Q1 -->
						<td><?php echo "$dbP_R3Q2";?>%</td> <!-- Percentage Row 3 Q2 -->
						<td><?php echo "$dbP_R3Q3";?>%</td> <!-- Percentage Row 3 Q3 -->
						<td><?php echo "$dbP_R3Q4";?>%</td> <!-- Percentage Row 3 Q4 -->
						<td><?php echo "$dbP_R3_T";?>%</td> <!-- Percentage Row 3 Total -->
					</tr>
					<tr>
						<th>Total</th> 
						<td>23</td>
						<td><?php echo $dbAT_Q1;?></td> <!-- Total Row 4 Target Q1 -->
						<td><?php echo $dbAT_Q1;?></td> <!-- Total Row 4 Target Q2 -->
						<td><?php echo $dbAT_Q2;?></td> <!-- Total Row 4 Target Q3 -->
						<td><?php echo $dbAT_Q3;?></td> <!-- Total Row 4 Target Q4 -->
						<td><?php echo $dbAT_QT;?></td> <!-- Total Row 4 Target Total -->
					
						<td><?php echo "$dbT_R4Q1";?></td> <!-- Total Row 4 Trainees Q1 -->
						<td><?php echo "$dbT_R4Q2";?></td> <!-- Total Row 4 Trainees Q2 -->
						<td><?php echo "$dbT_R4Q3";?></td> <!-- Total Row 4 Trainees Q3 -->
						<td><?php echo "$dbT_R4Q4";?></td> <!-- Total Row 4 Trainees Q4 -->
						<td><?php echo "$dbT_R4_T";?></td> <!-- Total Row 4 Trainees Total -->
						
						<td><?php echo $dbBT_Q1;?></td> <!-- Total Row 4 Actual Q1 -->
						<td><?php echo $dbBT_Q2;?></td> <!-- Total Row 4 Actual Q1 -->
						<td><?php echo $dbBT_Q3;?></td> <!-- Total Row 4 Actual Q1 -->
						<td><?php echo $dbBT_Q4;?></td> <!-- Total Row 4 Actual Q1 -->
						<td><?php echo $dbBT_QT;?></td> <!-- Total Row 4 Actual Total -->
						
						<td colspan="5"><?php echo "$dbPercentageTotal";?>%</td> <!-- Total Row 4 Percentage Total -->

						<td>₱<?php echo "$dbBudget";?></td> <!-- Budget -->
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