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
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Evaluation - Revisions</title>
<link rel="stylesheet" type="text/css" href="styles/EvaluationReport.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
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
				<a class="active" href="Evaluation.php">
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
			
		<table class="proposals" id="MyTable">
				<tr>
					<th colspan="6">
						<div class="menu">
							
							<a href="Evaluation.php" button class = "nav"> Pending <ion-icon name="mail-unread-outline"></ion-icon></a>
							</button>
							
							<a href="Evaluation-revision.php" button class = "nav2"> Revision <ion-icon name="repeat-outline"></ion-icon></a>
							</button>
							
							<a href="Evaluation-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
							</button>
						
							<a href="Evaluation-reject.php" button class = "nav"> Reject <ion-icon name="thumbs-down-outline"></ion-icon></a>
							</button>
							
						</div>
					</th> 
					
				</tr>
				<tr  class="title">
					<th colspan="6"><center>UNDER REVISION OF EVALUATION REPORTS </th> 
				</tr>
				<tr>
					<th colspan="6"> 
							<div class="Drp">
								Select Column to filter: 
							<select name="column" id="column">
								<option value="">Select Column</option>
								<option value="1">Evaluation ID</option>
								<option value="2">Proposal ID</option>
								<option value="3">Title</option>
								<option value="4">Prepared By</option>
								<option value="5">Status</option>
								</select>
							
						Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
						</div>
					</th>
				</tr>	
				
				<tr>
					<th width="30px"> Evaluation ID </th>
					<th width="30px"> Proposal ID </th>
					<th width="auto"> Title </th>
					<th width="180px";> Prepared By</th>
					<th width="120px";> Status </th>
					<th width="250px";>  </th>
				</tr>
<?php
//Display all the Pending Evaluation Reports
$sql = ("SELECT * FROM evaluation_alangilan WHERE ProjectStatus = 'Need to Revise' ");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$EID = $result['EvaluationID'];
		$PID = $result['ProposalID'];
		$Title = $result ['Title'];
		$PreparedBy = $result['Sign1_1'];
		$Status = $result['ProjectStatus'];
?>
			<tr class="inputs">
				<td><?php echo $EID; ?></td>
				<td><?php echo $PID; ?></td>
				<td><?php echo $Title; ?></p></td> 
				<td><?php echo $PreparedBy; ?></td> 
				<td><?php echo $Status; ?></td>  	
				<td>
					<a href="Generate_Evaluation.php?view=<?php echo $EID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<a href="Evaluation-revision.php?edit=<?php echo $EID; ?>" button class="Rbtn1">Edit</button> </a>
					<a href="Evaluation-revision.php?re_submit=<?php echo $EID; ?>" button class="Rbtn2">Re-Submit</button> </a>
				</td> 
			</tr>
<?php }?>
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

if(isset($_GET['edit'])){
	//Account Restriction
	$UserPosition = $_SESSION["Position"];
	if (($UserPosition == "Head") OR ($UserPosition == "Coordinator")){ //Code Continue
	}else {
		echo "<script> alert('Action not allowed!'); </script> ";
		die;
	}
	
	
	$EID = $_GET['edit'];
	echo "<script> window.location.href='EditEvaluation.php?edit=$EID'; </script>";
}

if(isset($_GET['re_submit'])){
	//Account Restriction
	$UserPosition = $_SESSION["Position"];
	if (($UserPosition == "Head") OR ($UserPosition == "Coordinator")){ //Code Continue
	}else {
		echo "<script> alert('Action not allowed!'); </script> ";
		die;
	}
	
	$EID = $_GET['re_submit'];

	$sql = ("UPDATE evaluation_alangilan SET ProjectStatus = 'PENDING' WHERE EvaluationID = $EID ");
	$command = $con->query($sql) or die("Error Re-submitting Evaluation Report");
	echo "
		<script>
			alert('Evaluation ID $EID Re-submit');	
			window.location.href='Evaluation-revision.php';
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