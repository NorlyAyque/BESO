<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
<link rel="stylesheet" type="text/css" href="Account-style.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
			<li>
				<a href="#">
					<div class=" logo"><img src ="img/logo.png"></div>
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
				<a href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a href="#">
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
			
			<table class="account">
				<tr>
					<th colspan="5"><center>ACCOUNT MANAGEMENT </th> 
				</tr>
			<tr>
				
				<th width="170px";> Name </th>
				<th> Email</th>
				<th width="120px";> Position </th>
				<th width="90px";> Status </th>
				<th width="180px";></th>
				
			</tr>	
				<tr>
					<td><input type = "text"  disabled> </td> 
					<td><input type = "text"  disabled> </td> 
					<td><input type = "text"  disabled> </td> 
					<td><input type = "text"  disabled> </td> 
					<td><button  class="btn" type="Submit" name="Edit">Edit</button>
					<button class="btn1" type="submit" name="=Delete">Delete</button>
					<button class="btn2" type="submit" name="=Disable">Disable</button>
				</tr>
				</tbody>
			</table>
			



			<!-- Sign up form -->
		
			<form>
				<div class="signup">
					<h1>Add User</h1>
					<p>Please fill in this form to create an account.</p>
					
					<label><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="email" required>
					
					<label><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="email" required>
					
					<label><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>

					<label><b>Repeat Password</b></label>
					<input type="password" placeholder="Repeat Password" name="psw-repeat" required>
					
					<label><b>Position</b></label>
					<input type="text" placeholder="Enter Position" name="email" required>
					
					<!--Save Button -->
					<button class="btn" type="submit" name="Signup">Add Account</button>
				</div>
			</form>

		



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