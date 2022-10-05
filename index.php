<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>BESO Portal</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="index-style.css">

</head>
<body>

<div class="popup">
	<div class="popupcenter">
			<div class="icon">
				<i class="fa fa-check"></i>
			</div>
			<div class="title">
				Successfully Login
			</div>
			<div class="dismiss-btn">
			<button id="dismiss-popup-btn"> OK</button>
			</div>
</div>
</div>
		
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
				<button class="btn" id="open-popup-btn" type="submit" name="Login">Log in</button>
			</div>
		</form><br>
		
		<p id="prompt">
	</div>
</body>
</html>


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