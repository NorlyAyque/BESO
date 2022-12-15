<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
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
		$dbCampus = $result['Campus'];
		$dbCollege = $result['College'];
		$dbPosition = $result['Position'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="styles/Form.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
			<div class="toggle">
					<ion-icon name="reorder-three-sharp"></ion-icon>
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
					<input type="password" placeholder="Enter Password" name="PSW" id="PSW"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					
					<div class="showP">
						<input type="checkbox" onclick="ShowPassword()"> Show Password
					</div>

					<label><b>Campus</b></label>
					<div class ="DrpCAMPUS">
					<select name="Campus" id="Campus" required>
						<option value="">Select Campus</option>
						<option value="Alangilan">Alangilan</option>
						<option value="Balayan">Balayan</option>
						<option value="Lemery">Lemery</option>
						<option value="Lipa">Lipa</option>
						<option value="Lobo">Lobo</option>
						<option value="Mabini">Mabini</option>
						<option value="Malvar">Malvar</option>
						<option value="Pablo Borbon">Pablo Borbon</option>
						<option value="Rosario">Rosario</option>
						<option value="San Juan">San Juan</option>
						<option value="<?php echo $dbCampus; ?>" selected><?php echo $dbCampus; ?></option>
					</select>
					</div>

					<label><b>College</b></label>
					<div class ="DrpCAMPUS">
					<select name="College" id="College" required>
						<option value="0">Select College</option>
						<option value="CEAFA">CEAFA</option>
						<option value="CICS">CICS</option>
						<option value="CIT">CIT</option>
						<option value="**">N/A (Head)</option>
						<option value="*">N/A (Staff)</option>
                        <option value="<?php echo $dbCollege; ?>" selected><?php echo $dbCollege; ?></option>
					</select>
					</div>
					
					<label><b>Position</b></label>
					<div class ="DrpCAMPUS">
					<select name="Position" id="Position" required>
						<option value="0">Select Position</option>
						<option value="Head">Head</option>
						<option value="Coordinator">Coordinator</option>
						<option value="Staff">Staff</option>
                        <option value="<?php echo $dbPosition; ?>" selected><?php echo $dbPosition; ?></option>
					</select>
					</div>
					
					<!--Save Button -->
					<table class="SAVEBACK">
						<tr>
							<th><a href="Account.php" button class="btn3"> BACK </button></th>
							<th>	<button class="btn1" type="submit" name="Update">Save</button></th>
						</tr>
					</table>
					
				
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
		item.classList.remove('hovered'));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink);
	</script>
</body>
</html>

<?php
if (isset($_POST['Update'])) {
    $AID = $_SESSION["AID"];
    
    $FN = htmlspecialchars($_POST['FN']);
    $LN = htmlspecialchars($_POST['LN']);
    $Email = htmlspecialchars($_POST['Email']);
    $PSW = htmlspecialchars($_POST['PSW']);
	$Campus = htmlspecialchars($_POST['Campus']);
	$College = htmlspecialchars($_POST['College']);
    $Position = htmlspecialchars($_POST['Position']);

	//Encrypting the New Password
	$EncryptPass = password_hash("$PSW", PASSWORD_DEFAULT);

	//Verifying email if exisiting
	if ($Email == $dbEmail){ //if true, ndi nagpalit ng email
		//code continue
	}else{ //nagpalit ng email
		$sql = mysqli_query($con,"SELECT * FROM account WHERE Email = '$Email'");
		if(mysqli_num_rows($sql)>0){
			echo "<script>
				alert('Email is Existing. Try a new one!');
			</script>";
			die;
		}
	}

    if (empty($_POST["PSW"])) { //Kung Empty c Passoword, walang laman
        $sql = ("UPDATE account
			SET Email = '$Email', Firstname = '$FN', Lastname = '$LN', Campus = '$Campus', College = '$College', Position = '$Position'
			WHERE AccountID = $AID");
		$command = $con->query($sql) or die("Error encounter while updating data");
		
		//Update Session for Position
		//$_SESSION["Position"] = $Position; //must be implement after logout

		echo "<script>
		alert('Account Successfully Updated');
		window.location='Account.php';
		</script>";
    }
    else { //kung ndi empty c Password, Edi Update
        $sql = ("UPDATE account
			SET Email = '$Email', Password = '$EncryptPass', Firstname = '$FN', Lastname = '$LN', Campus = '$Campus', College = '$College', Position = '$Position'
			WHERE AccountID = $AID");
		$command = $con->query($sql) or die("Error encounter while updating data");
		
		//Update Session for Position
		//$_SESSION["Position"] = $Position; //must be implement after logout
		
		echo "<script>
		alert('Account Successfully Updated');
		window.location='Account.php';
		</script>";
    }
}
?>

<script>
function ShowPassword() {
	var x = document.getElementById("PSW");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
</script>

<?php include("RestrictNotif.php"); ?>