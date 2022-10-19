<?php
session_start();
include("Connection.php");
?>

<?php
if(isset($_GET['edit'])){
	$AID = $_GET['edit'];
    $_SESSION["AID"] = $AID;

	$sql = ("SELECT * FROM account WHERE AccountID = $AID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		$dbFN = $result['Firstname'];
        $dbLN = $result['Lastname'];
		$dbEmail = $result['Email'];
		$dbPosition = $result['Position'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="styles/Forms.css">

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
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title"> Project Proposals</span>
				</a>
			</li>
			<li>
				<a href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
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
				<a class="active" href="Account.php">
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
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>	
			</div>
			
<form method = "Post">
			<!--Sign up form -->
		<table class="forms">
			<tr>
				<th>
					<form>
					<div class="signup1">
					<h1>Edit User Info</h1>
					<br>
					
					<label><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="FN" value="<?php echo $dbFN; ?>" required>
					
					<label><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="LN" value="<?php echo $dbLN; ?>" required>
					
					<label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="Email" value="<?php echo $dbEmail; ?>" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="PSW">
					
					<label><b>Position</b></label>
					<div class ="Drp">
					<select name="Position" id="Position">
						<option value="0">Select Position</option>
						<option value="Head">Head</option>
						<option value="Coordinator">Coordinator</option>
						<option value="Staff">Staff</option>
                        <option value="<?php echo $dbPosition; ?>" selected><?php echo $dbPosition; ?></option>
					</select>
					</div>
					
					<!--Save Button -->
					<button class="btn1" type="submit" name="Update">Save</button>
	                </div>
				</th>
			</tr>	
		</table>
	</div>
</form>	
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
if (isset($_POST['Update'])) {
    $AID = $_SESSION["AID"];
    
    $FN = htmlspecialchars($_POST['FN']);
    $LN = htmlspecialchars($_POST['LN']);
    $Email = htmlspecialchars($_POST['Email']);
    $PSW = htmlspecialchars($_POST['PSW']);
    $Position = htmlspecialchars($_POST['Position']);

    if (empty($_POST["PSW"])) { //Do not Update Password
        $sql = ("UPDATE account
			SET Email = '$Email', Firstname = '$FN', Lastname = '$LN', Position = '$Position'
			WHERE AccountID = $AID");
		$command = $con->query($sql) or die("Error encounter while updating data");
		
		echo "<script>
		alert('Target Updated Successfully');
		window.location='Account.php';
		</script>";
    }
    else { //kung ndi empty c Password, Edi Update
        $sql = ("UPDATE account
			SET Email = '$Email', Password = '$PSW', Firstname = '$FN', Lastname = '$LN', Position = '$Position'
			WHERE AccountID = $AID");
		$command = $con->query($sql) or die("Error encounter while updating data");
		
		echo "<script>
		alert('Target Updated Successfully');
		window.location='Account.php';
		</script>";
    }
}
?>