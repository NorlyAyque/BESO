<?php
session_start();
include("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Monitoring</title>
<link rel="stylesheet" type="text/css" href="styles/MonitoringReport.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
			<li>
				<a href="#">
					<div class=" logo"><img src ="images/logo.png"></div>
					<span class ="title1"> BESO Portal</span>
				</a>
			</li>
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
				<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
		<table class="proposals">
			<tr>
				<th colspan="5">
					<div class="menu">
							
						<a href="Monitoring.php" button class = "nav1"> Pending <ion-icon name="mail-unread-outline"></ion-icon></a>
						<a href="Monitoring-revision.php" button class = "nav"> Revision <ion-icon name="warning-outline"></ion-icon></a>
						<a href="Monitoring-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
						<a href="Monitoring-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a>	
					</div>
				</th> 
			</tr>

			<tr  class="title">
				<th colspan="5" ><center>PENDING MONITORING REPORTS</th> 
			</tr>
				
			<tr>
				<th width="50px"> Proposal ID </th>
				<th width="350px"> Title </th>
				<th width="200px";> Creator</th>
				<th width="100px";> Status </th>
				<th width="270px";>  </th>
			</tr>
<?php
//Display all the Pending Evaluation Reports
$sql = ("SELECT * FROM monitoring_alangilan WHERE Remarks = 'PENDING' ");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$MID = $result['MonitoringID'];
		$Title = $result ['Title'];
		//$Creator = $result['Author'];
		$Evaluator = $result['Evaluator'];
		$Status = $result['Remarks'];
		
		$sql = ("SELECT * FROM account WHERE AccountID = '$Evaluator' ");
		$Command = $con->query($sql) or die("Error SQL");
		while($result = mysqli_fetch_array($Command)){
			$FN = $result['Firstname'];
			$LN = $result['Lastname'];
			$Fullname = $FN . " " . $LN;
?>
			<tr class="inputs">
				<td><?php echo $MID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $Fullname; ?></td> 
				<td><?php echo $Status; ?></td> 	
				<td width ="260px";>
					<a href="Generate_Monitoring.php?view=<?php echo $MID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<a href="Monitoring.php?revise=<?php echo $MID; ?>" button class ="Pbtn1">Revise</button> </a> 
					<a href="Monitoring.php?approved=<?php echo $MID; ?>" button class ="Pbtn2">Approved</button> </a>
					<a href="Monitoring.php?reject=<?php echo $MID; ?>" button class ="Pbtn3">Reject</button> </a>
				</td> 
			</tr>
<?php } }?>
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
		item.classList.remove('hovered));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink));
	</script>
<body>
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
