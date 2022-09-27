<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>BESO Portal</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="index-style.css">

</head>
<body>
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<img src ="img/logo.png">
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
				<input type="email" name="email" placeholder="Email" required/>
			</div>
			<div class="form-field">
				<input type="password" id="psw" name="psw" placeholder="Password" required/> 
			</div>

			<div class ="show">
				<input type="checkbox" onclick="ShowPassword()"> Show Password
			</div>
		
			<div class="forgot-password">
				<a href="#" onclick="ForgotPass()"><i>Forgot Password?</i></a>
			</div>
			<div class="form-field">
				<button class="btn" type="submit" name="Login">Log in</button>
			</div>
		</form><br>
		<p id="prompt">
	</div>
</body>
</html>

<?php
session_start();
include("Connection.php");

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
		$dbPosition = $result['Position'];
	}
	
	//Decrypting Password using password verify
	//$DecryptPass = password_verify($Password, $dbPass);

	if ($Email === $dbEmail){
		//Result True
		// if ($DecryptPass == 1){// Password Match
		if ($Password == $dbPass){
			//Adding Value to the Session User ID and User Full Name
			$_SESSION["UserAID"] = $dbAID;
			$_SESSION["UserFullName"] = $dbFN . " " . $dbLN;
			$_SESSION["Email"] = $dbEmail;
			$_SESSION["Campus"] = $dbCampus;
			$_SESSION["Position"] = $dbPosition;
			
			echo "
			<script>
				alert('Login Successful. Welcome $dbFN $dbLN ($dbPosition - $dbCampus)');	
				window.location.href='dashboard.html';
			</script>";
		}
		else{
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
</script>