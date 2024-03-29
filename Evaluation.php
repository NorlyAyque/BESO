<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
//Getting Session Variables from index.php
$AID = $_SESSION["AccountAID"];
$College = $_SESSION["College"];
$UserPosition = $_SESSION["Position"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Evaluation</title>
<link rel="stylesheet" type="text/css" href="styles/EvaluationReports.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>	
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a href="Dashboard.php">
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
					<div class="notifDASH">
						<span class="icon-buttonDASH"><?php echo "$CountProposal";?></span>
					</div>
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					
					<span class ="title"> <u style="text-decoration-thickness:3px; text-underline-position: under";>Evaluation Reports</u></span>
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
				
			</div>
			
		<table class="proposals" id="MyTable">
			<tr>
				<th colspan="7">
					<div class="menu">
							
						<a href="Evaluation.php" button class = "nav"> Pending <ion-icon name="mail-unread-outline"></ion-icon>
						<div id="PendingEval" class="notif">
							<span class="icon-button__badge"><?php echo "$CountEvaluation";?></span>
						</div></a>
						<a href="Evaluation-revision.php" button class = "nav"> Revision <ion-icon name="repeat-outline"></ion-icon>
						<div id="ReviseEval" class="notifREV">
							<span class="icon-button__badge"><?php echo "$CountCoorRevEval";?></span>
						</div></a>
						<a href="Evaluation-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
						<a href="Evaluation-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a>	
					</div>
				</th> 
			</tr>

			<tr  class="title">
				<th colspan="7" ><center>PENDING EVALUATION REPORTS</th> 
			</tr>
			<tr>
				<th colspan="7"> 
					<div class="Drp">
					Select Column to filter: 
						<select name="column" id="column">
							<option value="">Select Column</option>
							<option value="1">Evaluation ID</option>
							<option value="2">Proposal ID</option>
							<option value="3">Title</option>
							<option value="4">College</option>
							<option value="5">Prepared By</option>
							<option value="6">Status</option>
						</select>
					Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
				</div>
				</th>
			</tr>	
			<tr>
				<th width="30px"> Evaluation ID </th>
				<th width="30px"> Proposal ID </th>
				<th width="auto"> Title </th>
				<th width="auto";> College/Office</th>
				<th width="180px";> Prepared By</th>
				<th width="120px";> Status </th>
				<th id="BtnWidth" width="280px";>  </th>
			</tr>
<?php
//Display all the Pending Evaluation Reports based on Colleges/Office
/*
if ($College == $CEAFA){
	$sql = ("SELECT * FROM evaluation_alangilan WHERE 
				(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else if ($College == $CICS){
	$sql = ("SELECT * FROM evaluation_alangilan WHERE 
				(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else if ($College == $CIT){
	$sql = ("SELECT * FROM evaluation_alangilan WHERE 
				(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else{
	$sql = ("SELECT * FROM evaluation_alangilan WHERE ProjectStatus = 'PENDING' ");
}*/

if ($UserPosition == "Head" OR $UserPosition == "Staff"){
	$sql = ("SELECT * FROM evaluation_alangilan WHERE ProjectStatus = 'PENDING'");
}else{
	$sql = ("SELECT * FROM evaluation_alangilan WHERE 
		(Author = '$AID') AND
		(ProjectStatus = 'PENDING')
	");
}

$BtnRevise = "a";
$BtnApproved = "b";
$BtnReject = "c";

//$sql = ("SELECT * FROM evaluation_alangilan WHERE ProjectStatus = 'PENDING' ");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$EID = $result['EvaluationID'];
		$PID = $result['ProposalID'];
		$AID = $result['Author'];
		$Title = $result ['Title'];
		$PreparedBy = $result['Sign1_1'];
		$Status = $result['ProjectStatus'];
		$College = $result['Office'];

		$sql2 = ("SELECT * FROM account WHERE AccountID = '$AID' ");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$Coll = $result2['College'];

				$BtnRevise .= "a";
				$BtnApproved .= "b";
				$BtnReject .= "c";
?>
			<tr class="inputs">
				<td><?php echo $EID; ?></td>
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $College; ?></td> 
				<td><?php echo $PreparedBy."<br>".$Coll; ?></td> 
				<td><?php echo $Status; ?></td> 	
				<td>
					<a href="Generate_Evaluation.php?view=<?php echo $EID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<a id="<?php echo $BtnRevise;?>" href="Evaluation.php?revise=<?php echo $EID; ?>" button class ="Pbtn1">Revise</button> </a> 
					<a id="<?php echo $BtnApproved;?>" href="Evaluation.php?approved=<?php echo $EID; ?>&update=<?php echo $PID; ?>" button class ="Pbtn2">Approved</button> </a>
					<a id="<?php echo $BtnReject;?>" href="Evaluation.php?reject=<?php echo $EID; ?>" button class ="Pbtn3">Reject</button> </a>
				</td> 
			</tr>
			<?php //Account Restrictions (Hide Buttons)
				if($UserPosition == "Staff" OR $UserPosition == "Coordinator") {
					echo "
						<script> 
							document.getElementById('$BtnRevise').style.display = 'none';
							document.getElementById('$BtnApproved').style.display = 'none';
							document.getElementById('$BtnReject').style.display = 'none';
							document.getElementById('BtnWidth').style.width = '100px';
						</script>";
				}
			?>
<?php }}?>
			</table>	
		</div>
	</div>
	
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
</body>
</html>


<?php
if(isset($_GET['revise'])){
	$EID = $_GET['revise'];

	$sql = ("UPDATE evaluation_alangilan SET ProjectStatus = 'Need to Revise' WHERE EvaluationID = $EID ");
	$command = $con->query($sql) or die("Error Evaluation Report move to revision");
	echo "
		<script>
			alert('Evaluation ID $EID Move to Revision');	
			window.location.href='Evaluation.php';
		</script>";
}

if(isset($_GET['approved'])){
	$EID = $_GET['approved'];
	$PID = $_GET['update'];

	//Updating Target
	//Getting the values from Actual Target
	$sql = ("SELECT * FROM dashboard_targets WHERE Year = $CustomYear");
	$command = $con->query($sql) or die("Error Fethcing data");
	while($result = mysqli_fetch_array($command))
	{
		$CAFAD_C_Q1 = $result["CAFAD_C_Q1"];
		$CAFAD_C_Q2 = $result["CAFAD_C_Q2"];
		$CAFAD_C_Q3 = $result["CAFAD_C_Q3"];
		$CAFAD_C_Q4 = $result["CAFAD_C_Q4"];
		$CAFAD_C_T = $result["CAFAD_C_T"];

		$COE_C_Q1 = $result["COE_C_Q1"];
		$COE_C_Q2 = $result["COE_C_Q2"];
		$COE_C_Q3 = $result["COE_C_Q3"];
		$COE_C_Q4 = $result["COE_C_Q4"];
		$COE_C_T = $result["COE_C_T"];
		
		$CICS_C_Q1 = $result["CICS_C_Q1"];
		$CICS_C_Q2 = $result["CICS_C_Q2"];
		$CICS_C_Q3 = $result["CICS_C_Q3"];
		$CICS_C_Q4 = $result["CICS_C_Q4"];
		$CICS_C_T = $result["CICS_C_T"];

		$CIT_C_Q1 = $result["CIT_C_Q1"];
		$CIT_C_Q2 = $result["CIT_C_Q2"];
		$CIT_C_Q3 = $result["CIT_C_Q3"];
		$CIT_C_Q4 = $result["CIT_C_Q4"];
		$CIT_C_T = $result["CIT_C_T"];

		$TOTAL_C_Q1 = $result["TOTAL_C_Q1"];
		$TOTAL_C_Q2 = $result["TOTAL_C_Q2"];
		$TOTAL_C_Q3 = $result["TOTAL_C_Q3"];
		$TOTAL_C_Q4 = $result["TOTAL_C_Q4"];
		$TOTAL_C = $result["TOTAL_C"];
	}

	//Determining what Office/College involved
	$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
	$command = $con->query($sql) or die("Error Fethcing data");
	while($result = mysqli_fetch_array($command))
	{
		$Quarter = $result["Quarter"];
		$word = $result["Office"];
		$Office = strtoupper($word);
	}

	//Words are in Connection.php
	// Test if string contains the word 
	//if (((str_contains($Office, $CAFAD)) == TRUE) OR ((str_contains($Office, $CAFAD_Full)) == TRUE)) {
	if (((strpos($Office, $CAFAD)) !== FALSE) OR ((strpos($Office, $CAFAD_Full)) !== FALSE)) {
		//if ($CustomQuarter == 1){//For CEAFA Actual Quarter 1
		if ($Quarter == 1){//For CAFAD Actual Quarter 1
			$NewCount = $CAFAD_C_Q1 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q1 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q1 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q1 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 2){//For CAFAD Actual Quarter 2
			$NewCount = $CAFAD_C_Q2 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q2 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q2 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q2 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 3){//For CAFAD Actual Quarter 3
			$NewCount = $CAFAD_C_Q3 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q3 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q3 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q3 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 4){//For CAFAD Actual Quarter 4
			$NewCount = $CAFAD_C_Q4 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q4 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q4 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q4 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
	}

	//if (((str_contains($Office, $CAFAD)) == TRUE) OR ((str_contains($Office, $CAFAD_Full)) == TRUE)) {
	if (((strpos($Office, $CAFAD)) !== FALSE) OR ((strpos($Office, $CAFAD_Full)) !== FALSE)) {
		//if ($CustomQuarter == 1){//For CAFAD Actual Quarter 1
		if ($Quarter == 1){//For CAFAD Actual Quarter 1
			$NewCount = $CAFAD_C_Q1 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q1 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q1 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q1 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 2){//For CAFAD Actual Quarter 2
			$NewCount = $CAFAD_C_Q2 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q2 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q2 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q2 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 3){//For CAFAD Actual Quarter 3
			$NewCount = $CAFAD_C_Q3 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q3 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q3 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q3 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 4){//For CAFAD Actual Quarter 4
			$NewCount = $CAFAD_C_Q4 + 1;
			$Col = $CAFAD_C_T + 1;
			$Row = $TOTAL_C_Q4 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CAFAD_C_Q4 = '$NewCount', CAFAD_C_T = '$Col', TOTAL_C_Q4 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
	}

	//if (((str_contains($Office, $COE)) == TRUE) OR ((str_contains($Office, $COE_Full)) == TRUE)) {
	if (((strpos($Office, $COE)) !== FALSE) OR ((strpos($Office, $COE_Full)) !== FALSE)) {
		//if ($CustomQuarter == 1){//For COE Actual Quarter 1
		if ($Quarter == 1){//For COE Actual Quarter 1
			$NewCount = $COE_C_Q1 + 1;
			$Col = $COE_C_T + 1;
			$Row = $TOTAL_C_Q1 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET COE_C_Q1 = '$NewCount', COE_C_T = '$Col', TOTAL_C_Q1 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 2){//For COE Actual Quarter 2
			$NewCount = $COE_C_Q2 + 1;
			$Col = $COE_C_T + 1;
			$Row = $TOTAL_C_Q2 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET COE_C_Q2 = '$NewCount', COE_C_T = '$Col', TOTAL_C_Q2 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 3){//For COE Actual Quarter 3
			$NewCount = $COE_C_Q3 + 1;
			$Col = $COE_C_T + 1;
			$Row = $TOTAL_C_Q3 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET COE_C_Q3 = '$NewCount', COE_C_T = '$Col', TOTAL_C_Q3 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 4){//For COE Actual Quarter 4
			$NewCount = $COE_C_Q4 + 1;
			$Col = $COE_C_T + 1;
			$Row = $TOTAL_C_Q4 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET COE_C_Q4 = '$NewCount', COE_C_T = '$Col', TOTAL_C_Q4 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
	}
	
	//if (((str_contains($Office, $CICS)) == TRUE) OR ((str_contains($Office, $CICS_Full)) == TRUE)) {
	if (((strpos($Office, $CICS)) !== FALSE) OR ((strpos($Office, $CICS_Full)) !== FALSE)) {
		if ($Quarter == 1){//For CICS Actual Quarter 1
			$NewCount = $CICS_C_Q1 + 1;
			$Col = $CICS_C_T + 1;
			$Row = $TOTAL_C_Q1 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CICS_C_Q1 = '$NewCount', CICS_C_T = '$Col', TOTAL_C_Q1 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 2){//For CICS Actual Quarter 2
			$NewCount = $CICS_C_Q2 + 1;
			$Col = $CICS_C_T + 1;
			$Row = $TOTAL_C_Q2 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CICS_C_Q2 = '$NewCount', CICS_C_T = '$Col', TOTAL_C_Q2 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 3){//For CICS Actual Quarter 3
			$NewCount = $CICS_C_Q3 + 1;
			$Col = $CICS_C_T + 1;
			$Row = $TOTAL_C_Q3 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CICS_C_Q3 = '$NewCount', CICS_C_T = '$Col', TOTAL_C_Q3 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 4){//For CICS Actual Quarter 4
			$NewCount = $CICS_C_Q4 + 1;
			$Col = $CICS_C_T + 1;
			$Row = $TOTAL_C_Q4 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CICS_C_Q4 = '$NewCount', CICS_C_T = '$Col', TOTAL_C_Q4 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}	
	}
	
	//if (((str_contains($Office, $CIT)) == TRUE) OR ((str_contains($Office, $CIT_Full)) == TRUE)) {
	if (((strpos($Office, $CIT)) !== FALSE) OR ((strpos($Office, $CIT_Full)) !== FALSE)) {
		if ($Quarter == 1){//For CIT Actual Quarter 1
			$NewCount = $CIT_C_Q1 + 1;
			$Col = $CIT_C_T + 1;
			$Row = $TOTAL_C_Q1 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CIT_C_Q1 = '$NewCount', CIT_C_T = '$Col', TOTAL_C_Q1 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 2){//For CIT Actual Quarter 2
			$NewCount = $CIT_C_Q2 + 1;
			$Col = $CIT_C_T + 1;
			$Row = $TOTAL_C_Q2 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CIT_C_Q2 = '$NewCount', CIT_C_T = '$Col', TOTAL_C_Q2 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 3){//For CIT Actual Quarter 3
			$NewCount = $CIT_C_Q3 + 1;
			$Col = $CIT_C_T + 1;
			$Row = $TOTAL_C_Q3 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CIT_C_Q3 = '$NewCount', CIT_C_T = '$Col', TOTAL_C_Q3 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
		else if ($Quarter == 4){//For CIT Actual Quarter 4
			$NewCount = $CIT_C_Q4 + 1;
			$Col = $CIT_C_T + 1;
			$Row = $TOTAL_C_Q4 + 1;
			$Total = $TOTAL_C + 1;
			$sql = ("UPDATE dashboard_targets SET CIT_C_Q4 = '$NewCount', CIT_C_T = '$Col', TOTAL_C_Q4 = '$Row', TOTAL_C = '$Total' WHERE Year = '$CustomYear'");
			$command = $con->query($sql) or die("Error Occur");
		}
	}
	
	//Updating Project Status
	$sql = ("UPDATE evaluation_alangilan SET ProjectStatus = 'Approved' WHERE EvaluationID = $EID ");
	$command = $con->query($sql) or die("Error Evaluation Report Approval");
	echo "
		<script>
			alert('Evaluation ID $EID APPROVED');	
			window.location.href='Evaluation.php';
		</script>";
}

if(isset($_GET['update'])){
	$PID = $_GET['update'];
	
	$sql = ("UPDATE create_alangilan SET Remarks = 'Evaluated' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Occur");

}

if(isset($_GET['reject'])){
	$EID = $_GET['reject'];

	$sql = ("UPDATE evaluation_alangilan SET ProjectStatus = 'Rejected' WHERE EvaluationID = $EID ");
	$command = $con->query($sql) or die("Error Rejecting Evaluation Report");
	echo "
		<script>
			alert('Evaluation ID $EID REJECTED');	
			window.location.href='Evaluation.php';
		</script>";
}
?>


<script>
//For Table filter
function Filter() {
	var x = document.getElementById("column").value;
	
	if (x == "1"){var SelectedColumn = 0;}
	else if (x == "2"){var SelectedColumn = 1;}
	else if (x == "3"){var SelectedColumn = 2;}
	else if (x == "4"){var SelectedColumn = 3;}	
	else if (x == "5"){var SelectedColumn = 4;}
	else if (x == "6"){var SelectedColumn = 5;}	
	
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("keyword");
	filter = input.value.toUpperCase();
	table = document.getElementById("MyTable");
	tr = table.getElementsByTagName("tr");
	
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[SelectedColumn];
		
		if (td) {
			txtValue = td.textContent || td.innerText;
			
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}       
	}
}
</script>

<?php include("RestrictNotif.php"); ?>