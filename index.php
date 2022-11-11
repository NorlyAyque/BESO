<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == TRUE){
	header('Location: Dashboard.php');
	die;
}
?>
			

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>BESO Portal</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="styles/Index_Style.css">

</head>
<body>
	
<div class="box-form" id="LoginForm">
	<div class="left">
		<div class="overlay">
			<img src ="images/logo.png">
			<span>
				<p>BATSTATEU EXTENSION SERVICES OFFICE PORTAL<br>"BESO"</br></p>
			</span>
		</div>
	</div>
	
	<div class="right">
		<div class="welcome">
			<p> Red Spartan Leads to Greatness</p>
		</div>
			<form method="post">
		
				<div class="form-field">
					<input type="email" name="email" id="email" placeholder="Email" required>
				</div>
				<div class="form-field">
					<input type="password" id="psw" name="psw" placeholder="Password" 
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
					required> 
				</div>

				<div class ="show">
					<input type="checkbox" onclick="ShowPassword()"> Show Password
				</div>
		
				<div class="forgot-password">
					<a href="#" onclick="ForgotPass()" id="forgotpassword"><i>Forgot Password?</i></a>
				</div>
				<div class="form-field">
					<button class="btn" id="open-popup-btn" type="submit" name="Login">Log in</button>
				</div>
			</form><br>
			<p id="prompt">
		</div>
	</div>
</body>
</html>

<?php
if (isset($_POST['Login'])){
	$Email = htmlspecialchars($_POST['email']);
	$Password = htmlspecialchars($_POST['psw']);

	$sql = ("SELECT * FROM account WHERE Email = '$Email'");
	$command = $con->query($sql) or die("Error SQL");

	//initialize the value
	$dbEmail = "";

	while($result = mysqli_fetch_array($command))
	{
		$dbAID = $result['AccountID'];
		$dbEmail = $result['Email'];
		$dbPass = $result['Password'];
		$dbFN = $result['Firstname'];
		$dbLN = $result['Lastname'];
		$dbCampus = $result['Campus'];
		$dbCollege = $result['College'];
		$dbPosition = $result['Position'];
		$dbStatus = $result['AccStatus'];
	}
	//Decrypting Password using password verify
	$DecryptPass = password_verify($Password, $dbPass);
	
	if ($Email === $dbEmail){
		//Result True
		if ($DecryptPass == 1){// Password Match
			//Checking Account Stauts if Active or Disabled
			if ($dbStatus == "Disabled") {
				echo "<script> alert('You cannot login. Your account is Disabled'); </script> ";
			}
			else{
				//Adding Value to the Session variables
				$_SESSION["AccountAID"] = $dbAID;
				$_SESSION["FullName"] = $dbFN . " " . $dbLN;
				$_SESSION["Email"] = $dbEmail;
				$_SESSION["Campus"] = $dbCampus;
				$_SESSION["College"] = $dbCollege;
				$_SESSION["Position"] = $dbPosition;
				$_SESSION["Status"] = $dbStatus;
			
				echo "
				<script>
					document.getElementById('email').disabled = true;
					document.getElementById('psw').disabled = true;
					document.getElementById('open-popup-btn').disabled = true;
					document.getElementById('forgotpassword').style.display = 'none';
				</script>
				<div class='popup'>
					<div class='popupcenter'>
						<div class='icon'>
							<i class='fa fa-check'></i>
						</div>
					
						<div class='title'>
							Successfully Login
						</div>
						<div class='des'>
							Welcome <span> $dbFN $dbLN </span><br>
							$dbPosition - $dbCollege - $dbCampus
						</div>
						<div class='dismiss-btn'>
							<button id='dismiss-popup-btn' onclick='OK()'> OK</button>
						</div>
					</div>
				</div>
				";

				//Filtering Users from Different Campuses and Position
				//Initializing tables to be used
				if ($dbCampus == "Alangilan"){
					$_SESSION["target_table"] = "target_alangilan";
					$_SESSION["create_table"] = "create_alangilan";
				}else if ($dbCampus == "Lipa"){
					$_SESSION["target_table"] = "target_lipa";
					$_SESSION["create_table"] = "create_lipa";
				}
				//Initializing Users Position
				if ($dbPosition == "Head"){$_SESSION["Position"] = "Head";}
				else if ($dbPosition == "Staff"){$_SESSION["Position"] = "Staff";}
				else if ($dbPosition == "Coordinator"){$_SESSION["Position"] = "Coordinator";}
			}
		}else{
			//echo "Invalid Password <br>";
			echo "
				<script> 
					document.getElementById('prompt').innerHTML = '<b> Invalid Password </b>';
				</script>
			";
		}
	}else {
		//echo "Invalid Email"; 
		echo "
			<script> 
				document.getElementById('prompt').innerHTML = '<b> Invalid Email </b>';
			</script>
		";
	}
}
?>

<script>
function ForgotPass(){
		document.getElementById('prompt').innerHTML = '<b> Contact Admin to change your password </b>';
}

function ShowPassword() {
	var x = document.getElementById("psw");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

function OK() {
	window.location.href='Dashboard.php';
}

</script>