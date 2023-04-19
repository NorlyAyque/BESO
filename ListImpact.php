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
<title>List of Extension PAPs for Impact Assessment</title>
<link rel="stylesheet" type="text/css" href="styles/Report.css">

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
							<a href="ListImpact.php" button class = "nav1"> List of Extension PAPs for Impact Assessment <ion-icon name="bookmarks-outline"></ion-icon></a>	
							<a href="AccomplishReport.php" button class = "nav"> List of Accomplishment Report <ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>
					</th>
				</tr>
				<tr>
					<th>
						<div class="menu1">
							<a href="ListAllPAPS.php" button class = "nav"> List of All Extension PAPs<ion-icon name="bookmarks-outline"></ion-icon></a>	
						</div>
					</th>
				</tr>
			</table>
			
			<table class="Header" id="MyTable">
				<tr  class="title">
					<th colspan="8" >Extension PAP's for Impact Assessment</th> 
				</tr>
				<tr>
					<th colspan="8"> 
						<div class="Drp5">
						Select Column to filter: 
							<select name="column" id="column">
								<option value="">Select Column</option>
								<option value="1">Proposal ID</option>
								<option value="2">Title</option>
								<option value="3">Duration</option>
								<option value="4">College</option>
								<option value="5">Prepared By</option>
								<option value="6">Last Monitored</option>
								<option value="7">Remarks</option>
							</select>
							Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
						</div>
					</th>
				
				</tr>
				
				<tr>
					<th width="100px"> Proposal ID</th>
					<th width="auto"> Title </th>
					<th width="140px"> Duration </th>
					<th width="auto";> College/Office</th>
					<th width="140px";> Prepared By </th>
					<th width="100px";> Last Monitored </th>
					<th width="120px";> Remarks </th>
					<th width="200px";> </th>
				</tr>
<?php
// Legend	Remarks = Evaluation		Remarks_2 = Monitoring
//Display all the Proposals that need impact assessment based on Colleges/Office
/*
if ($College == $CEAFA){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated') AND
		(Remarks_2 != '')
	");
}else if ($College == $CICS){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated') AND
		(Remarks_2 != '')
	");
}else if ($College == $CIT){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated') AND
		(Remarks_2 != '')
	");
}else{
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated') AND
		(Remarks_2 != '')
	");
}*/

/*
$sql = ("SELECT * FROM create_alangilan WHERE 
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated') AND
		(Remarks_2 != '') //For Monitoring
	");
*/

if ($UserPosition == "Head" OR $UserPosition == "Staff"){
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated')
	");
}else{
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(AccountID = '$AID') AND
		(unknown = 'For Impact Assessment') AND
		(ProjectStatus = 'Approved') AND 
		(Remarks = 'Evaluated')
	");
}

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$AID = $result['AccountID'];
		$Title = $result ['Title'];
		$SD = $result ['Start_Date']; 	$CDate1 = date_create("$SD"); $Date1 = date_format($CDate1,"M, d Y");
		$ED = $result ['End_Date']; 	$CDate2 = date_create("$ED"); $Date2 = date_format($CDate2,"M, d Y");
		$PreparedBy = $result['Sign1_1'];
		$Remarks_2 = $result['Remarks_2'];
		$Remarks_3 = $result['Remarks_3'];
		$College = $result['Office'];

		$sql2 = ("SELECT * FROM account WHERE AccountID = '$AID' ");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$Coll = $result2['College'];
?>
			<tr class="inputs">
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $Date1 . " -<br>". $Date2;?></td> 
				<td><?php echo $College; ?></p></td> 
				<td><?php echo $PreparedBy."<br>".$Coll; ?></td>
				<td><?php echo $Remarks_2; ?></td> 	
				<td><?php echo $Remarks_3; ?></td> 	
				<td>
					<a href="Generate_Proposal.php?view=<?php echo $PID; ?>" target="_blank" button class ="btn1">View</button> </a> <br> <br>
					<a href="ListImpact.php?MarkAsComplete=<?php echo $PID; ?>" button class ="btn1">Mark as Complete</button> </a>
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

	$sql = ("UPDATE create_alangilan SET Remarks_3 = 'Completed' WHERE ProposalID = $PID ");
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