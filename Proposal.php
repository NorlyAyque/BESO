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
<title>Proposals</title>
<link rel="stylesheet" type="text/css" href="styles/Proposal-STYLE.css">

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
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> 
					</span>
					<span class ="title"> Create Proposal</span>
				</a>
			</li>
			<li>
				<a class="active" href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					
					<span class ="title" ><u style="text-decoration-thickness:3px; text-underline-position: under";> Project Proposals</u></span>
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
			<div class="topbar">
				
			</div>
			
		<table class="proposals" id="MyTable">
			<tr>
				<th colspan="6">
					<div class="menu">
					
						<a href="Proposal.php" button class = "nav1"> Pending <ion-icon name="mail-unread-outline"></ion-icon>
						<div id="PendingProp" class="notif">
							<span class="icon-button__badge"><?php echo "$CountProposal";?></span>
						</div></a>

						<a href="Proposal-revision.php" button class = "nav">Revision <ion-icon name="repeat-outline"></ion-icon>
						<div id="ReviseProp" class="notifREV">
							<span class="icon-button__badge"><?php echo "$CountCoorRevProp";?></span>
						</div><a>
						
						<a href="Proposal-approved.php" button class = "nav"> Approved <ion-icon name="checkmark-done-outline"></ion-icon></a>
						<a href="Proposal-reject.php" button class = "nav"> Rejected <ion-icon name="thumbs-down-outline"></ion-icon></a>	
					</div>
				</th> 
			</tr>

			<tr  class="title">
				<th colspan="6" ><center>PENDING PROPOSALS </center> </th> 
			</tr>
			<tr>
				<th colspan="6"> 
					<div class="Drp">
					Select Column to filter: 
						<select name="column" id="column">
							<option value="">Select Column</option>
							<option value="1">Proposal ID</option>
							<option value="2">Title</option>
							<option value="3">College</option>
							<option value="4">Prepared By</option>
							<option value="5">Status</option>
						</select>
						
					Keyword: <input type="text" onkeyup="Filter()" id="keyword"  placeholder="type keyword"> 
				</div>
				</th>
			</tr>
				
			<tr>
				<th width="30px"> Proposal ID </th>
				<th width="auto"> Title </th>
				<th width="auto";> College/Office</th>
				<th width="180px";> Prepared By</th>
				<th width="120px";> Status </th>
				<th id="BtnWidth" width="280px";>  </th>
			</tr>

<?php
//Display all the Pending Proposals based on Colleges/Office
/*if ($College == $CEAFA){
	$sql = ("SELECT * FROM create_alangilan WHERE 
				(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else if ($College == $CICS){
	$sql = ("SELECT * FROM create_alangilan WHERE 
				(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else if ($College == $CIT){
	$sql = ("SELECT * FROM create_alangilan WHERE 
				(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
				(ProjectStatus = 'PENDING')
			");
}else{
	$sql = ("SELECT * FROM create_alangilan WHERE ProjectStatus = 'PENDING'");
}**/

if ($UserPosition == "Head" OR $UserPosition == "Staff"){
	$sql = ("SELECT * FROM create_alangilan WHERE ProjectStatus = 'PENDING'");
	
}else{
	$sql = ("SELECT * FROM create_alangilan WHERE 
		(AccountID = '$AID') AND
		(ProjectStatus = 'PENDING')
	");
}

$BtnRevise = "a";
$BtnApproved = "b";
$BtnReject = "c";

//$sql = ("SELECT * FROM create_alangilan WHERE ProjectStatus = 'PENDING'");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$AID = $result['AccountID'];
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
				<td><?php echo $PID; ?></td>
				<td style="text-align: justify;"><?php echo $Title; ?></p></td> 
				<td><?php echo $College; ?></td> 
				<td><?php echo $PreparedBy."<br>".$Coll; ?></td>
				<td><?php echo $Status; ?></td> 	
				<td>
					<a href="Generate_Proposal.php?view=<?php echo $PID; ?>" target="_blank" button class ="Pbtn">View</button> </a>
					<a id="<?php echo $BtnRevise;?>" href="Proposal.php?revise=<?php echo $PID; ?>" button class ="Pbtn1">Revise</button> </a> 
					<a id="<?php echo $BtnApproved;?>" href="Proposal.php?approved=<?php echo $PID; ?>" button class ="Pbtn2">Approve</button> </a>
					<a id="<?php echo $BtnReject;?>" href="Proposal.php?reject=<?php echo $PID; ?>" button class ="Pbtn3">Reject</button> </a>
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
<body>
</html>


<?php
if(isset($_GET['revise'])){
	$PID = $_GET['revise'];

	$sql = ("UPDATE create_alangilan SET ProjectStatus = 'Need to Revise' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Proposal move to revision");
	echo "
		<script>
			alert('Proposal ID $PID Move to Revision');	
			window.location.href='Proposal.php';
		</script>";
}

if(isset($_GET['approved'])){
	$PID = $_GET['approved'];

	$sql = ("UPDATE create_alangilan SET ProjectStatus = 'Approved', Remarks = 'Not Yet Evaluated' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Proposal Approval");
	echo "
		<script>
			alert('Proposal ID $PID APPROVED');	
			window.location.href='Proposal.php';
		</script>";
}

if(isset($_GET['reject'])){
	$PID = $_GET['reject'];

	$sql = ("UPDATE create_alangilan SET ProjectStatus = 'Rejected' WHERE ProposalID = $PID ");
	$command = $con->query($sql) or die("Error Rejecting Proposal");
	echo "
		<script>
			alert('Proposal ID $PID REJECTED');	
			window.location.href='Proposal.php';
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

<?php include("RestrictNotif.php"); ?>