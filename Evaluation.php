<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Evaluation</title>
<link rel="stylesheet" type="text/css" href="Evaluation.css">

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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
			<div class ="header">
			<table>
				<tr>
					<th><p>EXTENSION PROGRAM PLAN/ACTIVITY EVALUATION REPORT</p></th>
				</tr>
			</table>
			</div>
			
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label>  Title of the Project or Activity <label>
						<textarea class="font" placeholder="type Here..." ></textarea>
						 
						<label>  Location <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Date of Implementation / Number of hours of implementation <label>
						<textarea placeholder="type here..." ></textarea>
						 
						<label>  Implementing Offica/Collage/Program<i>(specify the programs under the college implementing the project)</i> <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Partner Agency <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Sustanable Development Goals <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Number of Male and Female and Types of Beneficiaries<i>(Type such as OSY, Childern,Women,etc.)</i>  <label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Types of Participants</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<table class="participants">
								<tr>
									<th>  </th>
									<th> BatStateU Participants</th>
									<th> Participants from other institution </th>
									<th> Total </th>
									
								</tr>	
								<tr >
									<td class="MF">Male</td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
								</tr>
								<tr>
									<td class="MF">Female</td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
								</tr>
								<tr class ="total">
									<td colspan="3">Grand Total</td>
									<td><input type="text"></td>
								</tr>
								</table>
								
							<table class="Evaluation">	
								<label><br> Evaluation Result <i>(If activity is training, techinical advice or seminar)</i></label>
								<label> <h4><br>1. Number of beneficiaries/paricipants who rated the activity as:</h4></label>
								<tr class="th1">
									<th>Scale</th>
									<th> BatStateU Participants </th>
									<th> Participants from other institution </th>
									<th> Total </th>
								</tr>	
								<tr class="MF" >
									<td >1.1. Exellent</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF" >
									<td >1.2. Very Satisfactory</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF">
									<td >1.3. Satisfactory</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF">
									<td > 1.4. Fair</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr  class="MF">
									<td >1.5. Poor</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
						</table>
						
						<table class="Evaluation">	
								<label> <h4><br>2. Number of beneficiaries/paricipants who rated the activity as:</h4></label>
								<tr class="th1">
									<th>Scale</th>
									<th> BatStateU Participants </th>
									<th> Participants from other institution </th>
									<th> Total </th>
								</tr>	
								<tr class="MF" >
									<td >2.1. Exellent</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF" >
									<td >2.2. Very Satisfactory</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF">
									<td >2.3. Satisfactory</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr class="MF">
									<td > 2.4. Fair</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
								<tr  class="MF">
									<td >2.5. Poor</td>
									<th><input type="text"></th>
									<th><input type="text"></th>
									<th><input type="text"></th>
								</tr>
						</table>
						
						
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field1">
						<label> Project Leader, Assistant Project Leader, Coordinators</i><label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Objectives<label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Narrative Activity</i><label>
						<textarea placeholder="type here..." ></textarea> 
						<br>
						<label>  Photos <i>(Please attach photos with captions):</i> <label>
						
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