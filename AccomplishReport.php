<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>List of Accomplishment Report</title>
<link rel="stylesheet" type="text/css" href="styles/Reports-STYLE.css">

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
				<a class="active"  href="Reports.php">
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
			
			<!--Content-->
			<table class="Reports">
				<tr>
					<th>
						<div class="menu">
							<a href="Reports.php" button class = "nav"> Quarterly Monitoring Report  <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="StatusReport.php" button class = "nav"> Status Report <ion-icon name="bookmarks-outline"></ion-icon></a>
							<a href="GADReport.php" button class = "nav"> GAD Report <ion-icon name="bookmarks-outline"></ion-icon></a>
							
						</div>	
					</th>
				</tr>
				<tr>
					<th>
						<div class="menu1">
							<a href="ListImpact.php" button class = "nav"> List of Extension PAPs for Impact Assessment <ion-icon name="bookmarks-outline"></ion-icon></a>	
							<a href="AccomplishReport.php" button class = "nav1"> List of Accomplishment Report <ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>
					</th>
				</tr>
			</table>
			
			<table class="Header" id="MyTable">
				<tr  class="title">
					<th colspan="9" >List of Accomplishment Reports</th> 
				</tr>
				<tr>
					<th colspan="9"> 
						
						<div class ="Drp3">
								Select Column to filter: 
							<select name="column" id="column">
								<option value="">Select Column</option>
								<option value="1">Proposal ID</option>
								<option value="2">Title</option>
								<option value="3">Year</option>
								<option value="4">College</option>
								<option value="5">Proposal</option>
								<option value="6">Evaluation</option>
								<option value="7">Last Monitored</option>
								<option value="8">Impact Assessment</option>
							</select>
								 Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
						</div>
							
						</th>	
				</tr>
				
				<tr>
					<th width="80px"> Proposal ID</th>
					<th width="auto"> Title </th>
					<th width="90px"> Year </th> 
					<th width="auto";> College/Office</th>
					<th width="100px"> Proposal </th> 
					<th width="100px";> Evaluation </th> <!-- Remarks -->
					<th width="120px";> Last Monitored </th> <!-- Remarks_2 -->
					<th width="120px";> Impact Assessment </th> <!-- Remarks_3 -->
					<th width="130px";> View</th>
				</tr>
<?php
//Display all the Approved PAP based on Colleges/Office
if ($College == $CEAFA){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(ProjectStatus = 'Approved' AND 
		Remarks = 'Evaluated' AND
		Remarks_2 != '') AND
		(Remarks_3 = 'Completed' OR Remarks_3 = '')
	");
}else if ($College == $CICS){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(ProjectStatus = 'Approved' AND 
		Remarks = 'Evaluated' AND
		Remarks_2 != '') AND
		(Remarks_3 = 'Completed' OR Remarks_3 = '')
	");
}else if ($College == $CIT){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(ProjectStatus = 'Approved' AND 
		Remarks = 'Evaluated' AND
		Remarks_2 != '') AND
		(Remarks_3 = 'Completed' OR Remarks_3 = '')
	");
}else{
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(ProjectStatus = 'Approved' AND 
		Remarks = 'Evaluated' AND
		Remarks_2 != '') AND
		(Remarks_3 = 'Completed' OR Remarks_3 = '')
	");
}

/* 
$sql = ("SELECT * FROM create_alangilan WHERE 
		(ProjectStatus = 'Approved' AND 
		Remarks = 'Evaluated' AND
		Remarks_2 != '') AND
		(Remarks_3 = 'Completed' OR Remarks_3 = '')
	");
*/
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$AID = $result['AccountID'];
		$Year = $result['Year'];
		$Title = $result ['Title'];
		$PS = $result ['ProjectStatus']; // Pending, Approved, Revised, Reject
		$R1 = $result ['Remarks']; //For Evaluation
		$R2 = $result['Remarks_2']; //For Monitoring
		$R3 = $result['Remarks_3']; // For Impact Assessment
		$College = $result['Office'];

		$sql2 = ("SELECT * FROM account WHERE AccountID = '$AID' ");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$Coll = $result2['College']; //Not Used
?>
			<tr class="inputs">
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $Year; ?></p></td> 
				<td><?php echo $College; ?></p></td> 
				<td><?php echo $PS; ?></td> 
				<td><?php echo $R1; ?></td> 
				<td><?php echo $R2; ?></td> 
				<td><?php echo $R3; ?></td> 	
				<td>
					<div class="margin">
						<a href="Generate_Proposal.php?view=<?php echo $PID; ?>" target="_blank" button class ="btn1">Proposal</button> </a>
					</div>
					<div class="margin2">
						<a href="Evaluation-approved.php?FilterPID=<?php echo $PID; ?>" target="_blank" button class ="btn2">Evaluation</button> </a>
					</div>
					<div class="margin1">
						<a href="Monitoring-approved.php?FilterPID=<?php echo $PID; ?>" target="_blank" button class ="btn3">Monitoring</button> </a>
					</div>
				</td> 
			</tr>
<?php }}?>
			</table>	
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script type="module" scr="https://cdn.bootcdn.net/ajax/libs/ionicons/6.0.3/cjs/index-1bc7b418.js"></script>
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
<body>
</html>

<?php

if(isset($_GET['MarkAsComplete'])){
	$PID = $_GET['MarkAsComplete'];

	$sql = ("UPDATE create_alangilan SET Remarks_3 = 'Done Impact Assessment' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Rejecting Proposal");
	echo "
		<script>
			alert('Proposal ID $PID Completed');	
			window.location.href='ListImpact.php';
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
	else if (x == "7"){var SelectedColumn = 6;}	
	else if (x == "8"){var SelectedColumn = 7;}	
	
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