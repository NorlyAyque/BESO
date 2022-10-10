<?php
session_start();
include("Connection.php");

//Getting Data declared from index.php
$target_table = $_SESSION["target_table"];

?>

<?php
//Getting Todays Year by default
$YearToday = date("Y");

//Displaying Data into each textboxes default year
$sql = ("SELECT * FROM $target_table WHERE Year = '$YearToday'");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$dbPAP1 = $result['PAP1'];
		$dbPAP2 = $result['PAP2'];
		$dbPAP3 = $result['PAP3'];
		$dbPAP4 = $result['PAP4'];
		$dbPAPT = $result['PAPT'];

		$dbGAD1 = $result['GAD1'];
		$dbGAD2 = $result['GAD2'];
		$dbGAD3 = $result['GAD3'];
		$dbGAD4 = $result['GAD4'];
		$dbGADT = $result['GADT'];

		$dbAPAP1 = $result['APAP1'];
		$dbAPAP2 = $result['APAP2'];
		$dbAPAP3 = $result['APAP3'];
		$dbAPAP4 = $result['APAP4'];
		$dbAPAPT = $result['APAPT'];

		$dbRPAP1 = $result['RPAP1'];
		$dbRPAP2 = $result['RPAP2'];
		$dbRPAP3 = $result['RPAP3'];
		$dbRPAP4 = $result['RPAP4'];
		$dbRPAPT = $result['RPAPT'];

		$dbAGAD1 = $result['AGAD1'];
		$dbAGAD2 = $result['AGAD2'];
		$dbAGAD3 = $result['AGAD3'];
		$dbAGAD4 = $result['AGAD4'];
		$dbAGADT = $result['AGADT'];

		$dbRGAD1 = $result['RGAD1'];
		$dbRGAD2 = $result['RGAD2'];
		$dbRGAD3 = $result['RGAD3'];
		$dbRGAD4 = $result['RGAD4'];
		$dbRGADT = $result['RGADT'];
	}

if (isset($_POST['View'])){
	//Code Here
	//Open new form to display target from selected year
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>DashBoard BESO Portal</title>
<link rel="stylesheet" type="text/css" href="dashboard.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
					<a class="active" href="Dashboard.php">
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
			<table class ="header">
			<thead>
			<tr>
				<th><p>ANNUAL TARGET </p></th> 
				<th class="select"  id="SetNewField">
					<label> <input type="checkbox" name="New"  id="New" onclick="NewTarget()">Set New Target <label></th> 
				<th class="select1" id="EditField">
					<label> <input type="checkbox" name="Edit" id="Edit" onclick="EditTarget()">Edit Target <label></th> 

<form method="post">				
				<!--Save Button -->
				<th>
					<button class="btn" type="submit" name="Save" id="Save">Save</button>
					<button class="btn2" type="submit" name="Update" id="Update">Update</button>
					<button class="btn1" type="submit" name="Cancel" id="Cancel">Cancel</button></th>
				
			</tr>
			</thead>
			</table>
			<table class="target">
			<thead>
			<tr>
				<th>
					<p id="Display_Year">  <?php echo $YearToday; ?></p>
					<select name="Year" id="Year">
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
				 </select>
				 <button type="submit" name="View" id="View">View</button>
				</th>
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
					<input type = "number" min="0" name="PAP1" id="PAP1" value="<?php echo $dbPAP1;?>" onchange="CalPAP()"> </td> 
				<td><input type = "number" min="0" name="PAP2" id="PAP2" value="<?php echo $dbPAP2;?>" onchange="CalPAP()"> </td> 
				<td><input type = "number" min="0" name="PAP3" id="PAP3" value="<?php echo $dbPAP3;?>" onchange="CalPAP()"> </td> 
				<td><input type = "number" min="0" name="PAP4" id="PAP4" value="<?php echo $dbPAP4;?>" onchange="CalPAP()"> </td> 
				<td><input type = "number" min="0" name="PAPT" id="PAPT" value="<?php echo $dbPAPT;?>"> </td> 
			</tr>
			
			<tr>
				<td>GAD </td>
				<td><input type = "number" min="0" name="GAD1" id="GAD1" value="<?php echo $dbGAD1;?>" onchange="CalGAD()"> </td> 
				<td><input type = "number" min="0" name="GAD2" id="GAD2" value="<?php echo $dbGAD2;?>" onchange="CalGAD()"> </td> 
				<td><input type = "number" min="0" name="GAD3" id="GAD3" value="<?php echo $dbGAD3;?>" onchange="CalGAD()"> </td> 
				<td><input type = "number" min="0" name="GAD4" id="GAD4" value="<?php echo $dbGAD4;?>" onchange="CalGAD()"> </td> 
				<td><input type = "number" min="0" name="GADT" id="GADT" value="<?php echo $dbGADT;?>"> </td> 
			</tr>
			
	
			<tr>
				<th colspan="6"><center>PROGRESS OF PAP'S </th> 
				
			</tr>
			
			<tr>
				<td>Accomplished </td> 
				<td><input type = "number" min="0" name="APAP1" id="APAP1" value="<?php echo $dbAPAP1;?>" onchange="CalAPAP()"> </td> 
				<td><input type = "number" min="0" name="APAP2" id="APAP2" value="<?php echo $dbAPAP2;?>" onchange="CalAPAP()"> </td> 
				<td><input type = "number" min="0" name="APAP3" id="APAP3" value="<?php echo $dbAPAP3;?>" onchange="CalAPAP()"> </td> 
				<td><input type = "number" min="0" name="APAP4" id="APAP4" value="<?php echo $dbAPAP4;?>" onchange="CalAPAP()"> </td> 
				<td><input type = "number" min="0" name="APAPT" id="APAPT" value="<?php echo $dbAPAPT;?>"> </td> 
			</tr>
			<tr>
				<td>Remain </td> 
				<td><input type = "number" min="0" name="RPAP1" id="RPAP1" value="<?php echo $dbRPAP1;?>" onchange="CalRPAP()"> </td> 
				<td><input type = "number" min="0" name="RPAP2" id="RPAP2" value="<?php echo $dbRPAP2;?>" onchange="CalRPAP()"> </td> 
				<td><input type = "number" min="0" name="RPAP3" id="RPAP3" value="<?php echo $dbRPAP3;?>" onchange="CalRPAP()"> </td> 
				<td><input type = "number" min="0" name="RPAP4" id="RPAP4" value="<?php echo $dbRPAP4;?>" onchange="CalRPAP()"> </td> 
				<td><input type = "number" min="0" name="RPAPT" id="RPAPT" value="<?php echo $dbRPAPT;?>"> </td> 
			</tr>
			<tr>
				<th colspan="6"><center>PROGRESS OF GAD </th> 
			</tr>
			
			<tr>
				<td>Accomplished </td> 
				<td><input type = "number" min="0" name="AGAD1" id="AGAD1" value="<?php echo $dbAGAD1;?>" onchange="CalAGAD()"> </td> 
				<td><input type = "number" min="0" name="AGAD2" id="AGAD2" value="<?php echo $dbAGAD2;?>" onchange="CalAGAD()"> </td> 
				<td><input type = "number" min="0" name="AGAD3" id="AGAD3" value="<?php echo $dbAGAD3;?>" onchange="CalAGAD()"> </td> 
				<td><input type = "number" min="0" name="AGAD4" id="AGAD4" value="<?php echo $dbAGAD4;?>" onchange="CalAGAD()"> </td> 
				<td><input type = "number" min="0" name="AGADT" id="AGADT" value="<?php echo $dbAGADT;?>"> </td> 
			</tr>
			<tr>
				<td>Remain </td> 
				<td><input type = "number" min="0" name="RGAD1" id="RGAD1" value="<?php echo $dbRGAD1;?>" onchange="CalRGAD()"> </td> 
				<td><input type = "number" min="0" name="RGAD2" id="RGAD2" value="<?php echo $dbRGAD2;?>" onchange="CalRGAD()"> </td> 
				<td><input type = "number" min="0" name="RGAD3" id="RGAD3" value="<?php echo $dbRGAD3;?>" onchange="CalRGAD()"> </td> 
				<td><input type = "number" min="0" name="RGAD4" id="RGAD4" value="<?php echo $dbRGAD4;?>" onchange="CalRGAD()"> </td> 
				<td><input type = "number" min="0" name="RGADT" id="RGADT" value="<?php echo $dbRGADT;?>"> </td> 
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

//Set all textbox to readonly
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

document.getElementById("Save").style.display = "none";
document.getElementById("Update").style.display = "none";
document.getElementById("Cancel").style.display = "none";

const d = new Date();
document.getElementById("Year").value = d.getFullYear();

document.getElementById("Display_Year").style.display = "none";


function NewTarget() {
	var checkBox = document.getElementById("New");
	
	if (checkBox.checked == true){
		document.getElementById("PAP1").readOnly = false; document.getElementById("PAP1").value = 0;
		document.getElementById("PAP2").readOnly = false; document.getElementById("PAP2").value = 0;
		document.getElementById("PAP3").readOnly = false; document.getElementById("PAP3").value = 0;
		document.getElementById("PAP4").readOnly = false; document.getElementById("PAP4").value = 0; document.getElementById("PAPT").value = 0;

		document.getElementById("GAD1").readOnly = false; document.getElementById("GAD1").value = 0;
		document.getElementById("GAD2").readOnly = false; document.getElementById("GAD2").value = 0;
		document.getElementById("GAD3").readOnly = false; document.getElementById("GAD3").value = 0;
		document.getElementById("GAD4").readOnly = false; document.getElementById("GAD4").value = 0; document.getElementById("GADT").value = 0;

		document.getElementById("APAP1").readOnly = false; document.getElementById("APAP1").value = 0;
		document.getElementById("APAP2").readOnly = false; document.getElementById("APAP2").value = 0;
		document.getElementById("APAP3").readOnly = false; document.getElementById("APAP3").value = 0;
		document.getElementById("APAP4").readOnly = false; document.getElementById("APAP4").value = 0; document.getElementById("APAPT").value = 0;

		document.getElementById("RPAP1").readOnly = false; document.getElementById("RPAP1").value = 0;
		document.getElementById("RPAP2").readOnly = false; document.getElementById("RPAP2").value = 0;
		document.getElementById("RPAP3").readOnly = false; document.getElementById("RPAP3").value = 0;
		document.getElementById("RPAP4").readOnly = false; document.getElementById("RPAP4").value = 0; document.getElementById("RPAPT").value = 0;

		document.getElementById("AGAD1").readOnly = false; document.getElementById("AGAD1").value = 0;
		document.getElementById("AGAD2").readOnly = false; document.getElementById("AGAD2").value = 0;
		document.getElementById("AGAD3").readOnly = false; document.getElementById("AGAD3").value = 0;
		document.getElementById("AGAD4").readOnly = false; document.getElementById("AGAD4").value = 0; document.getElementById("AGADT").value = 0;
		
		document.getElementById("RGAD1").readOnly = false; document.getElementById("RGAD1").value = 0;
		document.getElementById("RGAD2").readOnly = false; document.getElementById("RGAD2").value = 0;
		document.getElementById("RGAD3").readOnly = false; document.getElementById("RGAD3").value = 0;
		document.getElementById("RGAD4").readOnly = false; document.getElementById("RGAD4").value = 0; document.getElementById("RGADT").value = 0;

		document.getElementById("EditField").style.display = "none";
		document.getElementById("Save").style.display = "block";
		document.getElementById("Cancel").style.display = "block";
		document.getElementById("New").style.display = "none";

		document.getElementById("Year").value = 0;
		document.getElementById("View").style.display = "none";

	}
}

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

		document.getElementById("SetNewField").style.display = "none";
		document.getElementById("Update").style.display = "block";
		document.getElementById("Cancel").style.display = "block";
		document.getElementById("Edit").style.display = "none";

		document.getElementById("Year").style.display = "none";
		document.getElementById("View").style.display = "none";

		document.getElementById("Display_Year").style.display = "block";
	}
}

function CalPAP(){ //Auto Compute for PAP
	let PAP1 = document.getElementById('PAP1').value;
	let PAP2 = document.getElementById('PAP2').value;
	let PAP3 = document.getElementById('PAP3').value;
	let PAP4 = document.getElementById('PAP4').value;
	let ans = (parseInt(PAP1)) + (parseInt(PAP2)) + (parseInt(PAP3)) + (parseInt(PAP4));
	document.getElementById("PAPT").value = ans;
}

function CalGAD(){ //Auto Compute for GAD
	let PAP1 = document.getElementById('GAD1').value;
	let PAP2 = document.getElementById('GAD2').value;
	let PAP3 = document.getElementById('GAD3').value;
	let PAP4 = document.getElementById('GAD4').value;
	let ans = (parseInt(PAP1)) + (parseInt(PAP2)) + (parseInt(PAP3)) + (parseInt(PAP4));
	document.getElementById("GADT").value = ans;
}
</script>

<?php
if (isset($_POST['Save'])){
	
	$Year = htmlspecialchars($_POST['Year']);

	//Verifying if Year is Valid
	if ($Year == 0){
		echo "<script>alert('Please select year');</script>";
		die;
	}
	
	$PAP1 = htmlspecialchars($_POST['PAP1']);
	$PAP2 = htmlspecialchars($_POST['PAP2']);
	$PAP3 = htmlspecialchars($_POST['PAP3']);
	$PAP4 = htmlspecialchars($_POST['PAP4']);
	$PAPT = htmlspecialchars($_POST['PAPT']);

	$GAD1 = htmlspecialchars($_POST['GAD1']);
	$GAD2 = htmlspecialchars($_POST['GAD2']);
	$GAD3 = htmlspecialchars($_POST['GAD3']);
	$GAD4 = htmlspecialchars($_POST['GAD4']);
	$GADT = htmlspecialchars($_POST['GADT']);

	$APAP1 = htmlspecialchars($_POST['APAP1']);
	$APAP2 = htmlspecialchars($_POST['APAP2']);
	$APAP3 = htmlspecialchars($_POST['APAP3']);
	$APAP4 = htmlspecialchars($_POST['APAP4']);
	$APAPT = htmlspecialchars($_POST['APAPT']);

	$RPAP1 = htmlspecialchars($_POST['RPAP1']);
	$RPAP2 = htmlspecialchars($_POST['RPAP2']);
	$RPAP3 = htmlspecialchars($_POST['RPAP3']);
	$RPAP4 = htmlspecialchars($_POST['RPAP4']);
	$RPAPT = htmlspecialchars($_POST['RPAPT']);

	$AGAD1 = htmlspecialchars($_POST['AGAD1']);
	$AGAD2 = htmlspecialchars($_POST['AGAD2']);
	$AGAD3 = htmlspecialchars($_POST['AGAD3']);
	$AGAD4 = htmlspecialchars($_POST['AGAD4']);
	$AGADT = htmlspecialchars($_POST['AGADT']);

	$RGAD1 = htmlspecialchars($_POST['RGAD1']);
	$RGAD2 = htmlspecialchars($_POST['RGAD2']);
	$RGAD3 = htmlspecialchars($_POST['RGAD3']);
	$RGAD4 = htmlspecialchars($_POST['RGAD4']);
	$RGADT = htmlspecialchars($_POST['RGADT']);
	
	//Verifying if Year is Existing
	$sqlexist = ("SELECT COUNT(*) as TotalCount FROM $target_table WHERE Year = '$Year'");
	$commandexist = $con->query($sqlexist) or die("Error Fetching Room ID");
	while($row = mysqli_fetch_array($commandexist)){$Count = $row['TotalCount'];}
	
	if ($Count == 1){
		echo "<script>
		alert('Target for this year $Year is already been set. Edit if you want to modify.');
		</script>";
	}else {
		$sql = ("INSERT INTO $target_table
		(Year, PAP1, PAP2, PAP3, PAP4, PAPT,
				GAD1, GAD2, GAD3, GAD4, GADT, 
				APAP1, APAP2, APAP3, APAP4, APAPT,
				RPAP1, RPAP2, RPAP3, RPAP4, RPAPT,
				AGAD1, AGAD2, AGAD3, AGAD4, AGADT,
				RGAD1, RGAD2, RGAD3, RGAD4, RGADT) 
		VALUES 
		('$Year', '$PAP1', '$PAP2', '$PAP3', '$PAP4', '$PAPT',
				'$GAD1', '$GAD2', '$GAD3', '$GAD4', '$GADT', 
				'$APAP1', '$APAP2', '$APAP3', '$APAP4', '$APAPT',
				'$RPAP1', '$RPAP2', '$RPAP3', '$RPAP4', '$RPAPT',
				'$AGAD1', '$AGAD2', '$AGAD3', '$AGAD4', '$AGADT',
				'$RGAD1', '$RGAD2', '$RGAD3', '$RGAD4', '$RGADT')");
		$command = $con->query($sql) or die("Error Encounter while inserting Data");
		echo "<script>
		alert('Target Set Successfully');
		window.location='Dashboard.php';
		</script>";
	}
}

if (isset($_POST['Update'])){
	
	$Year = htmlspecialchars($_POST['Year']);

	//Verifying if Year is Valid
	if ($Year == 0){
		echo "<script>alert('Please select year');</script>";
		die;
	}
	
	$PAP1 = htmlspecialchars($_POST['PAP1']);
	$PAP2 = htmlspecialchars($_POST['PAP2']);
	$PAP3 = htmlspecialchars($_POST['PAP3']);
	$PAP4 = htmlspecialchars($_POST['PAP4']);
	$PAPT = htmlspecialchars($_POST['PAPT']);

	$GAD1 = htmlspecialchars($_POST['GAD1']);
	$GAD2 = htmlspecialchars($_POST['GAD2']);
	$GAD3 = htmlspecialchars($_POST['GAD3']);
	$GAD4 = htmlspecialchars($_POST['GAD4']);
	$GADT = htmlspecialchars($_POST['GADT']);

	$APAP1 = htmlspecialchars($_POST['APAP1']);
	$APAP2 = htmlspecialchars($_POST['APAP2']);
	$APAP3 = htmlspecialchars($_POST['APAP3']);
	$APAP4 = htmlspecialchars($_POST['APAP4']);
	$APAPT = htmlspecialchars($_POST['APAPT']);

	$RPAP1 = htmlspecialchars($_POST['RPAP1']);
	$RPAP2 = htmlspecialchars($_POST['RPAP2']);
	$RPAP3 = htmlspecialchars($_POST['RPAP3']);
	$RPAP4 = htmlspecialchars($_POST['RPAP4']);
	$RPAPT = htmlspecialchars($_POST['RPAPT']);

	$AGAD1 = htmlspecialchars($_POST['AGAD1']);
	$AGAD2 = htmlspecialchars($_POST['AGAD2']);
	$AGAD3 = htmlspecialchars($_POST['AGAD3']);
	$AGAD4 = htmlspecialchars($_POST['AGAD4']);
	$AGADT = htmlspecialchars($_POST['AGADT']);

	$RGAD1 = htmlspecialchars($_POST['RGAD1']);
	$RGAD2 = htmlspecialchars($_POST['RGAD2']);
	$RGAD3 = htmlspecialchars($_POST['RGAD3']);
	$RGAD4 = htmlspecialchars($_POST['RGAD4']);
	$RGADT = htmlspecialchars($_POST['RGADT']);
	
	//Verifying if Year is Existing
	$sqlexist = ("SELECT COUNT(*) as TotalCount FROM $target_table WHERE Year = '$Year'");
	$commandexist = $con->query($sqlexist) or die("Error Fetching Room ID");
	while($row = mysqli_fetch_array($commandexist)){$Count = $row['TotalCount'];}
	
	if ($Count == 0){
		echo "<script>
		alert('Target for this year $Year is not been set. Set new target to edit');
		</script>";
	}else {
		$sql = ("UPDATE target_alangilan 
			SET PAP1 = $PAP1, PAP2 = $PAP2, PAP3 = $PAP3, PAP4 = $PAP4, PAPT = $PAPT, 
				GAD1 = $GAD1, GAD2 = $GAD2, GAD3 = $GAD3, GAD4 = $GAD4, GADT = $GADT
			WHERE Year = $Year");
		$command = $con->query($sql) or die("Error encounter while updating data");
		
		echo "<script>
		alert('Target Updated Successfully');
		window.location='Dashboard.php';
		</script>";
	}
}
?>