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
<title>Monitoring - Revisions</title>
<link rel="stylesheet" type="text/css" href="styles/MonitoringReport.css">

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
						<span class="icon-buttonDASH">44</span>
					</div>
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL">45</span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> <u style="text-decoration-thickness:3px; text-underline-position: under";> Monitoring Reports</u></span>
					<div class="notifMONI">
						<span class="icon-buttonMONI">46</span>
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
							<a href="Monitoring.php" button class = "listnav1"> List <ion-icon name="list-outline"></ion-icon></a></button>
							<a href="Monitoring-pending.php" button class = "nav"> Pending <ion-icon name="mail-unread-outline"></ion-icon>
							<div class="notif">
							<span class="icon-button__badge">46</span>
							</div></a></button>
							<a href="Monitoring-revision.php" button class = "nav1"> Revision <ion-icon name="repeat-outline"></ion-icon></a></button>
							<a href="Monitoring-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a></button>
							<a href="Monitoring-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a></button>
						</div>
					</th> 
				</tr>
				<tr  class="title">
					<th colspan="7"><center>UNDER REVISION OF MONITORING REPORTS </th> 
				</tr>
				<tr>
					<th colspan="7"> 
					<div class="Drp">
						Select Column to filter: 
							<select name="column" id="column">
								<option value="">Select Column</option>
								<option value="1">Monitoring ID</option>
								<option value="2">Proposal ID</option>
								<option value="3">Title</option>
								<option value="4">College</option>
								<option value="5">Prepared By</option>
								<option value="6">Last Monitored</option>
							</select>
						
						Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
					</div>
					</th>
				</tr>
				<tr>
					<th width="50px"> Monitoring ID </th>
					<th width="50px"> Proposal ID </th>
					<th width="auto"> Title </th>
					<th width="auto";> College/Office</th>
					<th width="120px";> Prepared By</th>
					<th width="120px";> Last Monitored</th>
					<th width="230px";>  </th>
				</tr>
<?php
//Display all the Pending Evaluation Reports based on Colleges/Office
if ($College == $CEAFA){
	$sql = ("SELECT * FROM monitoring_alangilan WHERE 
				(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
				(Remarks = 'Need to Revise')
			");
}else if ($College == $CICS){
	$sql = ("SELECT * FROM monitoring_alangilan WHERE 
				(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
				(Remarks = 'Need to Revise')
			");
}else if ($College == $CIT){
	$sql = ("SELECT * FROM monitoring_alangilan WHERE 
				(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
				(Remarks = 'Need to Revise')
			");
}else{
	$sql = ("SELECT * FROM monitoring_alangilan WHERE Remarks = 'Need to Revise' ");
}

//$sql = ("SELECT * FROM monitoring_alangilan WHERE Remarks = 'Need to Revise' ");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$MID = $result['MonitoringID'];
		$PID = $result['ProposalID'];
		$AID = $result['Author'];
		$Title = $result ['Title'];
		$PreparedBy = $result['Sign1_1'];
		$Remarks = $result['Last_Monitored']; //Monitored. Date
		$College = $result['Office'];

		$sql2 = ("SELECT * FROM account WHERE AccountID = '$AID' ");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$Coll = $result2['College'];
?>
			<tr class="inputs">
				<td><?php echo $MID; ?></td>
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $College; ?></td> 
				<td><?php echo $PreparedBy."<br>".$Coll; ?></td>
				<td><?php echo $Remarks; ?></td> 	
				<td>
					<a href="Generate_Monitoring.php?view=<?php echo $MID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<a href="EditMonitoring.php?edit=<?php echo $MID; ?>" button class="Rbtn1">Edit</button> </a>
					<a href="Monitoring-revision.php?re_submit=<?php echo $MID; ?>" button class="Rbtn2">Re-Submit</button> </a>
				</td> 
			</tr>
<?php }} ?>
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
<body>
</html>

<?php

if(isset($_GET['re_submit'])){
	$MID = $_GET['re_submit'];

	$sql = ("UPDATE monitoring_alangilan SET Remarks = 'PENDING' WHERE MonitoringID = $MID ");
	$command = $con->query($sql) or die("Error Re-submitting Monitoring Report");
	echo "
		<script>
			alert('Monitoring ID $MID Re-submit');	
			window.location.href='Monitoring-revision.php';
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