<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Monitoring</title>
<link rel="stylesheet" type="text/css" href="Monitoring.css">

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
				<a class="active" href="Monitoring.php">
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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
			<div class ="header">
			<table>
				<tr>
					<th><p> MONITORING THE PROGRESS OF THE PROJECT</p></th>
				</tr>
			</table>
			</div>
			
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title of the project <label>
						<textarea class="font" placeholder="type Here..." ></textarea>
						 
						<label> ll. Location <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> lll. Duration <label>
						<textarea placeholder="type here..." ></textarea>
						 
						<label> lV. Type of Communuty Extension Service <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  V. Sustatinable Development Goals (SDG) <label>
						<textarea placeholder="type here..." ></textarea> 

				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label>  Vl. Office/ College/s Involved <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Vll. Program/s Involved<i>(specify the programs under the college implementing the project)</i>h5><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> lX. Coorperating Agencies<label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> X. Beneficiaries<i>(Type and Number of Male and Female</i><label>
						<textarea placeholder="type here..." ></textarea> 
				  </div>
				</div>
				
			</div>
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