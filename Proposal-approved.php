<?php
session_start();
include("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Proposals - Approved</title>
<link rel="stylesheet" type="text/css" href="styles/Proposal.css">

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
				<a class="active" href="Proposal.php">
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
				<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
		<table class="proposals">
				<tr>
					<th colspan="5">
						<div class="menu">
							
							<a href="Proposal.php" button class = "nav"> Pending <ion-icon name="mail-unread-outline"></ion-icon></a>
							</button>
							
							<a href="Proposal-revision.php" button class = "nav"> Revsion <ion-icon name="repeat-outline"></ion-icon></a>
							</button>
							
							<a href="Proposal-approved.php" button class = "nav3"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
							</button>
						
							<a href="Proposal-reject.php" button class = "nav"> Rejected <ion-icon name="thumbs-down-outline"></ion-icon></a>
							</button>
							
						</div>
					</th> 
					
				</tr>
				<tr  class="title">
					<th colspan="5"><center>APPROVED PROPOSALS </th> 
				</tr>
				
				<tr>
				<th width="50px"> Proposal ID </th>
				<th width="350px"> Title </th>
				<th width="200px";> Creator</th>
				<th width="100px";> Status </th>
				<th width="200px";>  </th>
			</tr>
	
<?php
//Display all the Approved Proposals
$sql = ("SELECT * FROM create_alangilan WHERE Remarks = 'Approved' ");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];
		$Creator = $result['AccountID'];
		$Status = $result['Remarks'];
		
		$sql = ("SELECT * FROM account WHERE AccountID = '$Creator' ");
		$Command = $con->query($sql) or die("Error SQL");
		while($result = mysqli_fetch_array($Command)){
			$FN = $result['Firstname'];
			$LN = $result['Lastname'];
			$Fullname = $FN . " " . $LN;
?>

			<tr class="inputs">
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></td> 
				<td><?php echo $Fullname; ?></td> 
				<td><?php echo $Status; ?></td> 	
				<td>
					<a href="Generate_Proposal.php?view=<?php echo $PID; ?>" target="_blank" button class="Abtn">View</button> </a> <br>
					<a href="CreateEvaluation.php?evaluation=<?php echo $PID; ?>" target="_blank" button class="Abtn1">CREATE EVALUATION</button> </a>
					<br>
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