<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Evaluation</title>
<link rel="stylesheet" type="text/css" href="styles/Evaluation.css">

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
				<a class="active" href="Evaluation.php">
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
				<ion-icon name="menu"></ion-icon>
				</div>	
			</div>
			
			<table class="header">
				<tr class="title">
					<th>
						EXTENSION PROGRAM PLAN/EVALUATION REPORT	
					</th> 
				</tr>
			</table>
			
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label>  Title of the Project or Activity  </label>
						<textarea class="font" placeholder="type Here..." ></textarea>
						 
						<label>  Location </label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Date of Implementation / Number of hours of implementation </label>
						<textarea placeholder="type here..." ></textarea>
						 
						<label>  Implementing Offica/Collage/Program<i>(specify the programs under the college implementing the project)</i> <</label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label>  Partner Agency </label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Sustanable Development Goals </label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Number of Male and Female and Types of Beneficiaries<i>(Type such as OSY, Childern,Women,etc.)</i>  </label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Types of Participants</i></label>
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
									<td><input type="number" min="0" name="M1" id="M1" onchange="CalMale()"> </td> 
									<td><input type="number" min="0" name="M2" id="M2" onchange="CalMale()"> </td> 
									<td><input type="number" min="0" name="MT" id="MT" Readonly> </td>
								</tr>
								<tr>
									<td class="MF">Female</td>
									<td><input type="number" min="0" name="F1" id="F1" onchange="CalFemale()"> </td> 
									<td><input type="number" min="0" name="F2" id="F2" onchange="CalFemale()"> </td> 
									<td><input type="number" min="0" name="FT" id="FT" Readonly></td>
								</tr>
								<tr class ="total">
									<td colspan="3">Grand Total</td>
									<td><input type="number" min="0" name="MFT" id="MFT" Readonly></input></td>
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
									<th><input type="number" min="0" name="Eval1A1" id="Eval1A1" onchange="Cal_1A()"> </td> 
									<th><input type="number" min="0" name="Eval1A2" id="Eval1A2" onchange="Cal_1A()"> </td> 
									<th><input type="number" min="0" name="Eval1AT" id="Eval1AT" Readonly></td>
								</tr>
								<tr class="MF" >
									<td >1.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval1B1" id="Eval1B1" onchange="Cal_1B()"> </td> 
									<th><input type="number" min="0" name="Eval1B2" id="Eval1B2" onchange="Cal_1B()"> </td> 
									<th><input type="number" min="0" name="Eval1BT" id="Eval1BT" Readonly></td>
								</tr>
								<tr class="MF">
									<td >1.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval1C1" id="Eval1C1" onchange="Cal_1C()"> </td> 
									<th><input type="number" min="0" name="Eval1C2" id="Eval1C2" onchange="Cal_1C()"> </td> 
									<th><input type="number" min="0" name="Eval1CT" id="Eval1CT" Readonly></td>
								</tr>
								<tr class="MF">
									<td > 1.4. Fair</td>
									<th><input type="number" min="0" name="Eval1D1" id="Eval1D1" onchange="Cal_1D()"> </td> 
									<th><input type="number" min="0" name="Eval1D2" id="Eval1D2" onchange="Cal_1D()"> </td> 
									<th><input type="number" min="0" name="Eval1DT" id="Eval1DT" Readonly></td>
								</tr>
								<tr  class="MF">
									<td >1.5. Poor</td>
									<th><input type="number" min="0" name="Eval1E1" id="Eval1E1" onchange="Cal_1E()"> </td> 
									<th><input type="number" min="0" name="Eval1E2" id="Eval1E2" onchange="Cal_1E()"> </td> 
									<th><input type="number" min="0" name="Eval1ET" id="Eval1ET" Readonly></td>
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
									<th><input type="number" min="0" name="Eval2A1" id="Eval2A1" onchange="Cal_2A()"> </td> 
									<th><input type="number" min="0" name="Eval2A2" id="Eval2A2" onchange="Cal_2A()"> </td> 
									<th><input type="number" min="0" name="Eval2AT" id="Eval2AT" Readonly></td>
								</tr>
								<tr class="MF" >
									<td >2.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval2B1" id="Eval2B1" onchange="Cal_2B()"> </td> 
									<th><input type="number" min="0" name="Eval2B2" id="Eval2B2" onchange="Cal_2B()"> </td> 
									<th><input type="number" min="0" name="Eval2BT" id="Eval2BT" Readonly></td>
								</tr>
								<tr class="MF">
									<td >2.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval2C1" id="Eval2C1" onchange="Cal_2C()"> </td> 
									<th><input type="number" min="0" name="Eval2C2" id="Eval2C2" onchange="Cal_2C()"> </td> 
									<th><input type="number" min="0" name="Eval2CT" id="Eval2CT" Readonly></td>
								</tr>
								<tr class="MF">
									<td > 2.4. Fair</td>
									<th><input type="number" min="0" name="Eval2D1" id="Eval2D1" onchange="Cal_2D()"> </td> 
									<th><input type="number" min="0" name="Eval2D2" id="Eval2D2" onchange="Cal_2D()"> </td> 
									<th><input type="number" min="0" name="Eval2DT" id="Eval2DT" Readonly></td>
								</tr>
								<tr  class="MF">
									<td >2.5. Poor</td>
									<th><input type="number" min="0" name="Eval2E1" id="Eval2E1" onchange="Cal_2E()"> </td> 
									<th><input type="number" min="0" name="Eval2E2" id="Eval2E2" onchange="Cal_2E()"> </td> 
									<th><input type="number" min="0" name="Eval2ET" id="Eval2ET" Readonly></td>
									
								</tr>
						</table>
				  </div>
				</div>
				
				<div class="fillup">
					<div class="input-field1">
						<label> Project Leader, Assistant Project Leader, Coordinators</i></label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Objectives</label>
						<textarea placeholder="type here..." ></textarea> 
						
						<label> Narrative Activity</i></label>
						<textarea placeholder="type here..." ></textarea> 
						<br>
						<label>  Photos <i>(Please attach  3 photos with captions):</i> </label>
						
						<div class ="pics1">
							 <label> Select Picture 1:</label>
							 <input type="file"></input>
							 <textarea class ="caption" placeholder="caption here..." ></textarea> 
						</div>	 
						<div class ="pics2">
							<label> Select Picture 2:</label>
							  <input type="file"></input>
							  <textarea class ="caption" placeholder="caption here..." ></textarea> 
						</div>	
						<div class ="pics2">
						<label> Select Picture 3:</label>
							   <input type="file"></input>
							   <textarea class ="caption" placeholder="caption here..." ></textarea> 
						</div>	
						<div class ="save2">
							 <input class ="submit" type="submit"></input>
						</div>
		
					</div>
		
	</div>
		</div>
		<div class ="save">
			<button class = "btn3"> Save </button>
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

<script>
function CalMale(){ //Auto Compute for Male
	let M1 = document.getElementById('M1').value;
	let M2 = document.getElementById('M2').value;
	let ans = (parseInt(M1)) + (parseInt(M2));
	document.getElementById("MT").value = ans;

	let MT = document.getElementById('MT').value;
	let FT = document.getElementById('FT').value;
	let anss = (parseInt(MT)) + (parseInt(FT));
	document.getElementById("MFT").value = anss;
	
}
function CalFemale(){ //Auto Compute for Female
	let F1 = document.getElementById('F1').value;
	let F2 = document.getElementById('F2').value;
	let ans = (parseInt(F1)) + (parseInt(F2));
	document.getElementById("FT").value = ans;

	let MT = document.getElementById('MT').value;
	let FT = document.getElementById('FT').value;
	let anss = (parseInt(MT)) + (parseInt(FT));
	document.getElementById("MFT").value = anss;
}

function Cal_1A(){ 
	let Eval1A1 = document.getElementById('Eval1A1').value;
	let Eval1A2 = document.getElementById('Eval1A2').value;
	let ans = (parseInt(Eval1A1)) + (parseInt(Eval1A2));
	document.getElementById("Eval1AT").value = ans;
}
function Cal_1B(){
	let Eval1B1 = document.getElementById('Eval1B1').value;
	let Eval1B2 = document.getElementById('Eval1B2').value;
	let ans = (parseInt(Eval1B1)) + (parseInt(Eval1B2));
	document.getElementById("Eval1BT").value = ans;	
}
function Cal_1C(){
	let Eval1C1 = document.getElementById('Eval1C1').value;
	let Eval1C2 = document.getElementById('Eval1C2').value;
	let ans = (parseInt(Eval1C1)) + (parseInt(Eval1C2));
	document.getElementById("Eval1CT").value = ans;	
}
function Cal_1D(){
	let Eval1D1 = document.getElementById('Eval1D1').value;
	let Eval1D2 = document.getElementById('Eval1D2').value;
	let ans = (parseInt(Eval1D1)) + (parseInt(Eval1D2));
	document.getElementById("Eval1DT").value = ans;	
}
function Cal_1E(){
	let Eval1E1 = document.getElementById('Eval1E1').value;
	let Eval1E2 = document.getElementById('Eval1E2').value;
	let ans = (parseInt(Eval1E1)) + (parseInt(Eval1E2));
	document.getElementById("Eval1ET").value = ans;	
}

function Cal_2A(){
	let Eval2A1 = document.getElementById('Eval2A1').value;
	let Eval2A2 = document.getElementById('Eval2A2').value;
	let ans = (parseInt(Eval2A1)) + (parseInt(Eval2A2));
	document.getElementById("Eval2AT").value = ans;
}
function Cal_2B(){
	let Eval2B1 = document.getElementById('Eval2B1').value;
	let Eval2B2 = document.getElementById('Eval2B2').value;
	let ans = (parseInt(Eval2B1)) + (parseInt(Eval2B2));
	document.getElementById("Eval2BT").value = ans;
}
function Cal_2C(){
	let Eval2C1 = document.getElementById('Eval2C1').value;
	let Eval2C2 = document.getElementById('Eval2C2').value;
	let ans = (parseInt(Eval2C1)) + (parseInt(Eval2C2));
	document.getElementById("Eval2CT").value = ans;
}
function Cal_2D(){
	let Eval2D1 = document.getElementById('Eval2D1').value;
	let Eval2D2 = document.getElementById('Eval2D2').value;
	let ans = (parseInt(Eval2D1)) + (parseInt(Eval2D2));
	document.getElementById("Eval2DT").value = ans;
}
function Cal_2E(){
	let Eval2E1 = document.getElementById('Eval2E1').value;
	let Eval2E2 = document.getElementById('Eval2E2').value;
	let ans = (parseInt(Eval2E1)) + (parseInt(Eval2E2));
	document.getElementById("Eval2ET").value = ans;
}


</script>