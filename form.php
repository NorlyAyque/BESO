<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
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
			

			<!--Sign up form -->
			<table class="forms">
			<tr>
				<th>
			<form>
				<div class="signup">
					<h1>Add User</h1>
					<br>
					
					<label><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="email" required>
					
					<label><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="email" required>
					
					<label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>
					
					<label><b>Position</b></label>
					<div class ="Drp">
					<select name="pos" id="post" >
						<option value="0">Select Position</option>
						<option value="head">Head</option>
						<option value="corr">Coordinator</option>
						<option value="staff">Staff</option>
					</select>
					</div>
					<!--Save Button -->
					<button class="btn" type="submit" name="Signup">Add Account</button>
				</div>
			</form>
				</th>
				<th>
					<form>
					<div class="signup1">
					<h1>Edit User Info</h1>
					<br>
					
					<label><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="email" required>
					
					<label><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="email" required>
					
					<label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>
					
					<label><b>Position</b></label>
					<div class ="Drp">
					<select name="pos" id="post" >
						<option value="0">Select Position</option>
						<option value="head">Head</option>
						<option value="corr">Coordinator</option>
						<option value="staff">Staff</option>
					</select>
					</div>
					
					<!--Save Button -->
					<button class="btn1" type="submit" name="Signup">Save</button>
				</div>
					</form>
				</th>
			</tr>
			
		
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