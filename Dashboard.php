<?php
session_start();
include("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
<link rel="stylesheet" type="text/css" href="dashboard-style.css">

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
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>	
			</div>
			<table class ="header">
			<thead>
			<tr>
				<th><p>ANNUAL TARGET </p></th> 
				<th class="select">
					<label> <input type="checkbox" name="Edit" id="Edit" onclick="NewTarget()">Set New Target <label></th> 
				<th class="select1">
					<label> <input type="checkbox" name="Edit" id="Edit" onclick="EditTarget()">Edit Target <label></th> 

<form method="post">				
				<!--Save Button -->
				<th><button class="btn" type="submit" name="Save" id="Save">Save</button></th>
				<th><button class="btn" type="submit" name="Update" id="Save">Update</button></th>
			</tr>
			</thead>
			</table>
			<table class="target">
			<thead>
			<tr>
				<th>
					<select name="year" id="year">
						<option value="0">Select year</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
						<option value="2031">2031</option>
						<option value="2032">2032</option>
						<option value="2033">2033</option>
				 </select></th>
				<th> Quarter 1 </th>
				<th> Quarter 2 </th>
				<th> Quarter 3 </th>
				<th> Quarter 4 </th>
				<th> TOTAL </th>
			</tr>	
			</thead>
			
			<tbody>
			<tr>
				<td>PAP </td> 
				<td class="btn">
					<input type = "number" min="1" name="PAP1" id="PAP1"> </td> 
				<td><input type = "number" min="1" name="PAP2" id="PAP2"> </td> 
				<td><input type = "number" min="1" name="PAP3" id="PAP3"> </td> 
				<td><input type = "number" min="1" name="PAP4" id="PAP4"> </td> 
				<td><input type = "number" min="1" name="PAPT" id="PAPT"> </td> 
			</tr>
			
			<tr>
				<td>GAD </td>
				<td><input type = "number" min="1" name="GAD1" id="GAD1"> </td> 
				<td><input type = "number" min="1" name="GAD2" id="GAD2"> </td> 
				<td><input type = "number" min="1" name="GAD3" id="GAD3"> </td> 
				<td><input type = "number" min="1" name="GAD4" id="GAD4"> </td> 
				<td><input type = "number" min="1" name="GADT" id="GADT"> </td> 
			</tr>
			
	
			<tr>
				<th colspan="6"><center>PROGRESS OF PAP'S </th> 
				
			</tr>
			
			<tr>
				<td>Accomplished </td> 
				<td><input type = "number" min="1" name="APAP1" id="APAP1"> </td> 
				<td><input type = "number" min="1" name="APAP2" id="APAP2"> </td> 
				<td><input type = "number" min="1" name="APAP3" id="APAP3"> </td> 
				<td><input type = "number" min="1" name="APAP4" id="APAP4"> </td> 
				<td><input type = "number" min="1" name="APAPT" id="APAPT"> </td> 
			</tr>
			<tr>
				<td>Remain </td> 
				<td><input type = "number" min="1" name="RPAP1" id="RPAP1"> </td> 
				<td><input type = "number" min="1" name="RPAP2" id="RPAP2"> </td> 
				<td><input type = "number" min="1" name="RPAP3" id="RPAP3"> </td> 
				<td><input type = "number" min="1" name="RPAP4" id="RPAP4"> </td> 
				<td><input type = "number" min="1" name="RPAPT" id="RPAPT"> </td> 
			</tr>
			<tr>
				<th colspan="6"><center>PROGRESS OF GAD </th> 
			</tr>
			
			<tr>
				<td>Accomplished </td> 
				<td><input type = "number" min="1" name="AGAD1" id="AGAD1"> </td> 
				<td><input type = "number" min="1" name="AGAD2" id="AGAD2"> </td> 
				<td><input type = "number" min="1" name="AGAD3" id="AGAD3"> </td> 
				<td><input type = "number" min="1" name="AGAD4" id="AGAD4"> </td> 
				<td><input type = "number" min="1" name="AGADT" id="AGADT"> </td> 
			</tr>
			<tr>
				<td>Remain </td> 
				<td><input type = "number" min="1" name="RGAD1" id="RGAD1"> </td> 
				<td><input type = "number" min="1" name="RGAD1" id="RGAD2"> </td> 
				<td><input type = "number" min="1" name="RGAD1" id="RGAD3"> </td> 
				<td><input type = "number" min="1" name="RGAD1" id="RGAD4"> </td> 
				<td><input type = "number" min="1" name="RGADT" id="RGADT"> </td> 
			</tr>
			</tbody>
</table>
</form>			
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

document.getElementById("PAP1").readOnly = true;
document.getElementById("PAP2").readOnly = true;
document.getElementById("PAP3").readOnly = true;
document.getElementById("PAP4").readOnly = true;
document.getElementById("PAPT").readOnly = true;

document.getElementById("GAD1").readOnly = true;
document.getElementById("GAD2").readOnly = true;
document.getElementById("GAD3").readOnly = true;
document.getElementById("GAD4").readOnly = true;
document.getElementById("GADT").readOnly = true;

document.getElementById("APAP1").readOnly = true;
document.getElementById("APAP2").readOnly = true;
document.getElementById("APAP3").readOnly = true;
document.getElementById("APAP4").readOnly = true;
document.getElementById("APAPT").readOnly = true;

document.getElementById("RPAP1").readOnly = true;
document.getElementById("RPAP2").readOnly = true;
document.getElementById("RPAP3").readOnly = true;
document.getElementById("RPAP4").readOnly = true;
document.getElementById("RPAPT").readOnly = true;

document.getElementById("AGAD1").readOnly = true;
document.getElementById("AGAD2").readOnly = true;
document.getElementById("AGAD3").readOnly = true;
document.getElementById("AGAD4").readOnly = true;
document.getElementById("AGADT").readOnly = true;

document.getElementById("RGAD1").readOnly = true;
document.getElementById("RGAD2").readOnly = true;
document.getElementById("RGAD3").readOnly = true;
document.getElementById("RGAD4").readOnly = true;
document.getElementById("RGADT").readOnly = true;

//document.getElementById("Save").style.display = "none";

const d = new Date();
document.getElementById("year").value = d.getFullYear();


function EditTarget() {
	var checkBox = document.getElementById("Edit");
	
	if (checkBox.checked == true){
		document.getElementById("PAP1").readOnly = false;
		document.getElementById("PAP2").readOnly = false;
		document.getElementById("PAP3").readOnly = false;
		document.getElementById("PAP4").readOnly = false;
		
		document.getElementById("GAD1").readOnly = false;
		document.getElementById("GAD2").readOnly = false;
		document.getElementById("GAD3").readOnly = false;
		document.getElementById("GAD4").readOnly = false;
		
		document.getElementById("APAP1").readOnly = false;
		document.getElementById("APAP2").readOnly = false;
		document.getElementById("APAP3").readOnly = false;
		document.getElementById("APAP4").readOnly = false;
	
		document.getElementById("RPAP1").readOnly = false;
		document.getElementById("RPAP2").readOnly = false;
		document.getElementById("RPAP3").readOnly = false;
		document.getElementById("RPAP4").readOnly = false;
		
		document.getElementById("AGAD1").readOnly = false;
		document.getElementById("AGAD2").readOnly = false;
		document.getElementById("AGAD3").readOnly = false;
		document.getElementById("AGAD4").readOnly = false;
		
		document.getElementById("RGAD1").readOnly = false;
		document.getElementById("RGAD2").readOnly = false;
		document.getElementById("RGAD3").readOnly = false;
		document.getElementById("RGAD4").readOnly = false;
		
		//document.getElementById("Save").style.display = "block";

	} else {
		document.getElementById("PAP1").readOnly = true;
		document.getElementById("PAP2").readOnly = true;
		document.getElementById("PAP3").readOnly = true;
		document.getElementById("PAP4").readOnly = true;
	
		document.getElementById("GAD1").readOnly = true;
		document.getElementById("GAD2").readOnly = true;
		document.getElementById("GAD3").readOnly = true;
		document.getElementById("GAD4").readOnly = true;
		
		document.getElementById("APAP1").readOnly = true;
		document.getElementById("APAP2").readOnly = true;
		document.getElementById("APAP3").readOnly = true;
		document.getElementById("APAP4").readOnly = true;
	
		document.getElementById("RPAP1").readOnly = true;
		document.getElementById("RPAP2").readOnly = true;
		document.getElementById("RPAP3").readOnly = true;
		document.getElementById("RPAP4").readOnly = true;
		
		document.getElementById("AGAD1").readOnly = true;
		document.getElementById("AGAD2").readOnly = true;
		document.getElementById("AGAD3").readOnly = true;
		document.getElementById("AGAD4").readOnly = true;
		
		document.getElementById("RGAD1").readOnly = true;
		document.getElementById("RGAD2").readOnly = true;
		document.getElementById("RGAD3").readOnly = true;
		document.getElementById("RGAD4").readOnly = true;
		
		//document.getElementById("Save").style.display = "none";

  }
}

</script>

<?php




?>
