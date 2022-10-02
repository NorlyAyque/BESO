<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Create Proposal</title>
<link rel="stylesheet" type="text/css" href="CreateProposal-style.css">

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
				<a href="#">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
				</a>
			</li>
			<li>
				<a href="#">
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
					<th><p> Extention Program Plan/Project Proposal</p></th>
				</tr>
			</table>
			</div>
			
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title <label>
						<textarea class="font" placeholder="type Here..." ></textarea>
						 
						<label> ll. Location <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> lll. Duration <label>
						<textarea placeholder="type here..." ></textarea>
						 
						<label> lV. Type of Communuty Extension Service <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  V. Sustatinable Development Goals (SDG) <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Vl. Office/ College/s Involved <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Vll. Program/s Involved<i>(specify the programs under the college implementing the project)</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> lX. Partner Agencies<label>
						<textarea placeholder="type here..." ></textarea> 
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label> X. Beneficiaries <i>(Tpye and Number of Male & Female)</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Xl.Total Cost and Sources of Funds<label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Xll. Rationale<i>(brief description of the situation)</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Xlll. Objectives<i>(General and Specific)</i><label>
						<textarea placeholder="type here..." ></textarea>

						<label> XlV. Description, Strategies and Methods <i>(Activities/Schedule)</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> XV. Financial Plan</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> XVl. Functional Relationships with the partner <i>(Duties/Task of the Partner Agencies)</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> XVll. Monitoring and Evaluation Mechanics/Plan<label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> XVlll. Sustainability Plan<label>
						<textarea placeholder="type here..." ></textarea> 
				  </div>
				</div>
			</div>
			<div class="button">
				<button class="btn" type="submit" name="=Save">Save</button>
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