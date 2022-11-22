<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

date_default_timezone_set("Asia/Manila");
//$DateToday = date("Y-m-d");
$DateToday = date("Y-m-d"); //YYYY-mm-dd
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Monitoring</title>
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
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
				</a>
			</li>
			<li>
				<a class="active" href="Monitoring.php">
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
			<div class="topbar">
				
			</div>
<?php
if(isset($_GET['verify'])){
	$PID = $_GET['verify'];
	$End_Date = $_GET['EndDate'];
	
	$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		$Title = $result['Title'];
		$Frequency = $result['Frequency'];
	}

	$date = date_create($DateToday);
	$display_date = date_format($date,"M, d Y");

	echo "<center>

	<table class='headmes'>
		<tr>
			<th colspan='2' style='text-align:center'> <h2> PROMPT </h2> </th>
		</tr>
		<tr>
			<td> Create Monitoring for: </td>
			<td> <h3>$Title</h3></td>
		</tr>

		<tr>
			<td > Project End Date: </td>
			<td > <h3>$End_Date</h3></td>
		</tr>
		<tr>
			<td > Monitoring Frequency: </td>
			<td > <h3>$Frequency</h3></td>
		</tr>
		<tr>
			<td> Date Today: </td>
			<td > <h3>$display_date</h3></td>
		</tr>
		<tr>
			<td colspan='2' style='text-align:right' > <a href='Monitoring.php' class='cancel'>CANCEL</a> 
			<a href='CreateMonitoring.php?create=$PID'  class='proceed'>PROCEED</a></td>
		</tr>
	</table>
	";
	echo "<br>";
}
?>
		<table class="proposals" id="MyTable">
			<tr>
				<th colspan="7">
					<div class="menu">
						<a href="Monitoring.php" button class = "nav1"> List<ion-icon name="list-outline"></ion-icon></a></button>
						<a href="Monitoring-pending.php" button class = "nav"> Pending <ion-icon name="mail-unread-outline"></ion-icon></a></button>
						<a href="Monitoring-revision.php" button class = "nav"> Revision <ion-icon name="repeat-outline"></ion-icon></a></button>
						<a href="Monitoring-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a></button>
						<a href="Monitoring-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a></button>
					</div>
				</th> 
			</tr>

			<tr  class="title">
				<th colspan="7" ><center>LIST OF EXTENSION PAPs FOR MONITORING </center> </th> 
			</tr>
			<tr>
				<th colspan="7"> 
					<div class="Drp">
					Select Column to filter: 
						<select name="column" id="column">
							<option value="">Select Column</option>
							<option value="1">Proposal ID</option>
							<option value="2">Title</option>
							<option value="3">College</option>
							<option value="4">End Date</option>
							<option value="5">Monitoring</option>
							<option value="6">Last Monitored</option>
						</select>
					
					Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
					</div>
				</th>
			</tr>
			<tr>
				<th width="50px"> Proposal ID </th>
				<th width="auto"> Title </th>
				<th width="90px";> College</th>
				<th width="130px";> End Date </th>
				<th width="120px";> Monitoring</th> <!-- Frequency (Monthly, Quarterly, Semi-Annually, Yearly) -->
				<th width="120px";> Last Monitored</th> <!-- Remarks_2 in Create Proposal table-->
				<th width="220x";>  </th> <!-- Buttons, View and Create Monitoring -->
			</tr>
<?php

//Display Proposal that needs to Monitor
$sql = ("SELECT * FROM create_alangilan WHERE (unknown != 'Extension PAP' AND Remarks = 'Evaluated') ORDER BY ProposalID DESC");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$AID = $result['AccountID'];
		$Title = $result ['Title'];
		$End_Date = $result['End_Date']; $date = date_create("$End_Date");
		$Frequency = $result['Frequency'];
		$Remarks = $result['Remarks_2']; //Monitored. Date

		$sql2 = ("SELECT * FROM account WHERE AccountID = '$AID' ");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$College = $result2['College'];
?>
			<tr class="inputs">
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $College; ?></td> 
				<td><?php echo $dt = date_format($date,"M, d Y"); ?></td> 
				<td><?php echo $Frequency; ?></td> 	
				<td><?php echo $Remarks; ?></td> 	
				<td>
					<a href="Generate_Proposal.php?view=<?php echo $PID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<!-- <a href="CreateMonitoring.php?create=<?php //echo $PID; ?>" button class ="Pbtn2">CREATE MONITORING</button> </a> -->
					<a href="Monitoring.php?verify=<?php echo $PID; ?>&EndDate=<?php echo $dt; ?>" button class ="Pbtn2">CREATE MONITORING</button> </a> 
					
				</td> 
			</tr>
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
	$MID = $_GET['revise'];

	$sql = ("UPDATE monitoring_alangilan SET Remarks = 'Need to Revise' WHERE MonitoringID = $MID ");
	$command = $con->query($sql) or die("Error Monitoring move to revision");
	echo "
		<script>
			alert('Monitoring ID $MID Move to Revision');	
			window.location.href='Monitoring.php';
		</script>";
}

if(isset($_GET['approved'])){
	$MID = $_GET['approved'];

	$sql = ("UPDATE monitoring_alangilan SET Remarks = 'Approved' WHERE MonitoringID = $MID ");
	$command = $con->query($sql) or die("Error Monitoring Approval");
	echo "
		<script>
			alert('Monitoring ID $MID APPROVED');	
			window.location.href='Monitoring.php';
		</script>";
}

if(isset($_GET['reject'])){
	$MID = $_GET['reject'];

	$sql = ("UPDATE monitoring_alangilan SET Remarks = 'Rejected' WHERE MonitoringID = $MID ");
	$command = $con->query($sql) or die("Error Rejecting Monitoring Report");
	echo "
		<script>
			alert('Monitoring ID $MID REJECTED');	
			window.location.href='Monitoring.php';
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