<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"]; //Naka Login na User - Evaluator

$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<?php
if(isset($_GET['evaluation'])){
	$PID = $_GET['evaluation']; //Proposal ID
    
	$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		$dbAuthor = $result['AccountID']; //Gumawa ng Proposal - Author
		$dbYear = $result['Year'];
		$dbQuarter = $result['Quarter'];

		$dbTitle = $result['Title'];
        $dbLocation = $result['Location_Area'];
		
		$dbStart_Date = $result['Start_Date'];
		$dbEnd_Date = $result['End_Date'];
		$dbStart_Time = $result['Start_Time'];
		$dbEnd_Time = $result['End_Time'];

		$dbOffice = $result['Office'];
		$dbAgencies = $result['Agencies'];
		$dbTypeCES = $result['TypeCES'];
		$dbSDG = $result['SDG'];

		$dbTypeParticipants = $result['TypeParticipants'];

		$dbPeople = $result['People'];
		$dbObjectives = $result['Objectives'];

		$dbSign1_1 = $result['Sign1_1'];
		$dbSign1_2 = $result['Sign1_2'];
    }

	//Computation for number of Hours Implemented / Duration
	$date1 = date_create($dbStart_Date); 	$Start_Date = date_format($date1,"F, d Y");
	$date2 = date_create($dbEnd_Date); 		$End_Date = date_format($date2,"F, d Y");
	
	$time1 = date_create($dbStart_Time); 	$Start_Time = date_format($time1,"h:i:s A");
	$time2 = date_create($dbEnd_Time); 		$End_Time = date_format($time2,"h:i:s A");

	//Getting Number of Days
	$dateinterval = date_diff($date1, $date2);
	$x = $dateinterval->format('%a');//Whole Number

	if ($x == 0){ //Same Day = 0 = 1 day (8hrs)
		$NoOfDays = $dateinterval->format('%a') + 1;
	}else{ //Not same day = 2 days or more
		$NoOfDays = $dateinterval->format('%a') +1;
	}
	
	//Getting Number of Hours
	$timeinterval = date_diff($time1, $time2);
	$TimeResult = $timeinterval->format('%h') - 1; //8 hrs = 1 DAY (7:00-4:00 = 9hrs - 1 = 8hrs)
	
	$NoOfHours = $TimeResult * $NoOfDays;
	
	//Use this variables to display in forms
	$DurationDate = $Start_Date . " - " . $End_Date . " ($NoOfDays days)"; //Display Date Only
	$DurationTime = $NoOfHours; //Compute number of hours depends on number of days
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Create Evaluation</title>
<link rel="stylesheet" type="text/css" href="styles/CreateEvaluation.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a href="Dashboard.php">
					<span class ="icon"> <ion-icon name="home-outline"></ion-icon> </span>
					<span class ="title"> Home</span>
				</a>
			</li>
			<li>
				<a href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
				</a>
			</li>
			<li>
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title"> Project Proposals</span>
					<div class="notifDASH">
						<span class="icon-buttonDASH"><?php echo "$CountProposal";?></span>
					</div>
				</a>
			</li>
			
			<li>
				<a class="active" href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL"><?php echo "$CountEvaluation";?></span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
					<div class="notifMONI">
						<span class="icon-buttonMONI"><?php echo "$CountMonitoring";?></span>
					</div>
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
				<a href="Settings.php">
					<span class ="icon"> <ion-icon name="settings-outline"></ion-icon> </span>
					<span class ="title"> Settings</span>
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
					
			</div>
			
			<table class="header">
				<tr class="title">
					<th>
						EXTENSION PROGRAM PLAN/EVALUATION REPORT	
					</th> 
				</tr>
			</table>
<form method = "Post" enctype="multipart/form-data">
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label>  Title of the Project or Activity  </label>
						<textarea class="font" placeholder="type Here..."  name="Title" required><?php echo $dbTitle; ?></textarea>
						 
						<label>  Location </label>
						<textarea placeholder="type here..." name="Location" required><?php echo $dbLocation; ?></textarea> 
						
						<label>  Date of Implementation / Number of hours of implementation </label>
							<table class="Dates">
								<tr>
									<th width="350px";><textarea placeholder="type here..." name="DateImplement" required><?php echo $DurationDate; ?></textarea></th>
									<th><textarea placeholder="type here..." name="HoursImplement" required><?php echo $DurationTime ." hours"; ?></textarea></th>
								</tr>
							</table>
						<label>  Implementing Office/College/Program<i><h5>(specify the programs under the college implementing the project)</h5></i> </label>
						<textarea placeholder="type here..."  name="Office" required><?php echo $dbOffice; ?></textarea> 
						
						<label>  Partner Agency </label>
						<textarea placeholder="type here..." name="Agency" required><?php echo $dbAgencies; ?></textarea> 
						
						<label>  Types of Community Extension Service </label>
						<textarea placeholder="type here..." name="TypeCES" required><?php echo $dbTypeCES; ?></textarea> 
						
						<label> Sustanable Development Goals </label>
						<textarea placeholder="type here..." name="SDG" required><?php echo $dbSDG; ?></textarea> 
						
						<label> Number of Male and Female and Types of Beneficiaries<i><h5>(Type such as OSY, Childern,Women,etc.)</h5></i>  </label>
						
						<table class="participants">
								<tr class="types">
									<th colspan="4"> 	<label> Types of Participants  <input type="text" name="Beneficiaries" value="<?php echo $dbTypeParticipants; ?>" required></i></label></th>
								</tr>
								<tr>
									<th>  </th>
									<th> BatStateU Participants</th>
									<th> Participants from other institution </th>
									<th> Total </th>
									
								</tr>	
								<tr >
									<td class="MF">Male</td>
									<td><input type="number" min="0" name="M1" id="M1" onchange="CalMale()" required> </td> 
									<td><input type="number" min="0" name="M2" id="M2" onchange="CalMale()" required> </td> 
									<td><input type="number" min="0" name="MT" id="MT" Readonly required> </td>
								</tr>
								<tr>
									<td class="MF">Female</td>
									<td><input type="number" min="0" name="F1" id="F1" onchange="CalFemale()" required> </td> 
									<td><input type="number" min="0" name="F2" id="F2" onchange="CalFemale()" required> </td> 
									<td><input type="number" min="0" name="FT" id="FT" Readonly required></td>
								</tr>
								<tr class ="total">
									<td colspan="3">Grand Total</td>
									<td><input type="number" min="0" name="MFT" id="MFT" Readonly required></input></td>
								</tr>
						</table>
								
							<table class="Evaluation">	
								<label><br> Evaluation Result <i><h5>(If activity is training, techinical advice or seminar)</h5></i></label>
								<label> <h4><br>1. Number of beneficiaries/paricipants who rated the activity as:</h4></label>
								<tr class="th1">
									<th>Scale</th>
									<th> BatStateU Participants </th>
									<th> Participants from other institution </th>
									<th> Total </th>
								</tr>	
								<tr class="MF" >
									<td >1.1. Exellent</td>
									<th><input type="number" min="0" name="Eval1A1" id="Eval1A1" onchange="Cal_1A()" > </td> 
									<th><input type="number" min="0" name="Eval1A2" id="Eval1A2" onchange="Cal_1A()" > </td> 
									<th><input type="number" min="0" name="Eval1AT" id="Eval1AT" Readonly ></td>
								</tr>
								<tr class="MF" >
									<td >1.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval1B1" id="Eval1B1" onchange="Cal_1B()" > </td> 
									<th><input type="number" min="0" name="Eval1B2" id="Eval1B2" onchange="Cal_1B()" > </td> 
									<th><input type="number" min="0" name="Eval1BT" id="Eval1BT" Readonly ></td>
								</tr>
								<tr class="MF">
									<td >1.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval1C1" id="Eval1C1" onchange="Cal_1C()" > </td> 
									<th><input type="number" min="0" name="Eval1C2" id="Eval1C2" onchange="Cal_1C()" > </td> 
									<th><input type="number" min="0" name="Eval1CT" id="Eval1CT" Readonly ></td>
								</tr>
								<tr class="MF">
									<td > 1.4. Fair</td>
									<th><input type="number" min="0" name="Eval1D1" id="Eval1D1" onchange="Cal_1D()" > </td> 
									<th><input type="number" min="0" name="Eval1D2" id="Eval1D2" onchange="Cal_1D()" > </td> 
									<th><input type="number" min="0" name="Eval1DT" id="Eval1DT" Readonly ></td>
								</tr>
								<tr  class="MF">
									<td >1.5. Poor</td>
									<th><input type="number" min="0" name="Eval1E1" id="Eval1E1" onchange="Cal_1E()" > </td> 
									<th><input type="number" min="0" name="Eval1E2" id="Eval1E2" onchange="Cal_1E()" > </td> 
									<th><input type="number" min="0" name="Eval1ET" id="Eval1ET" Readonly ></td>
								</tr>
							</table>
						
						<table class="Evaluation">	
								<label> <h4><br>2. Number of beneficiaries/paricipants who rated the timeliness of the activity as:</h4></label>
								<tr class="th1">
									<th>Scale</th>
									<th> BatStateU Participants </th>
									<th> Participants from other institution </th>
									<th> Total </th>
								</tr>	
								<tr class="MF" >
									<td >2.1. Exellent</td>
									<th><input type="number" min="0" name="Eval2A1" id="Eval2A1" onchange="Cal_2A()" > </td> 
									<th><input type="number" min="0" name="Eval2A2" id="Eval2A2" onchange="Cal_2A()" > </td> 
									<th><input type="number" min="0" name="Eval2AT" id="Eval2AT" Readonly ></td>
								</tr>
								<tr class="MF" >
									<td >2.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval2B1" id="Eval2B1" onchange="Cal_2B()" > </td> 
									<th><input type="number" min="0" name="Eval2B2" id="Eval2B2" onchange="Cal_2B()" > </td> 
									<th><input type="number" min="0" name="Eval2BT" id="Eval2BT" Readonly ></td>
								</tr>
								<tr class="MF">
									<td >2.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval2C1" id="Eval2C1" onchange="Cal_2C()" > </td> 
									<th><input type="number" min="0" name="Eval2C2" id="Eval2C2" onchange="Cal_2C()" > </td> 
									<th><input type="number" min="0" name="Eval2CT" id="Eval2CT" Readonly></td>
								</tr>
								<tr class="MF">
									<td > 2.4. Fair</td>
									<th><input type="number" min="0" name="Eval2D1" id="Eval2D1" onchange="Cal_2D()" > </td> 
									<th><input type="number" min="0" name="Eval2D2" id="Eval2D2" onchange="Cal_2D()" > </td> 
									<th><input type="number" min="0" name="Eval2DT" id="Eval2DT" Readonly ></td>
								</tr>
								<tr  class="MF">
									<td >2.5. Poor</td>
									<th><input type="number" min="0" name="Eval2E1" id="Eval2E1" onchange="Cal_2E()" > </td> 
									<th><input type="number" min="0" name="Eval2E2" id="Eval2E2" onchange="Cal_2E()" > </td> 
									<th><input type="number" min="0" name="Eval2ET" id="Eval2ET" Readonly ></td>
								</tr>
						</table>
				 	</div>
				</div>
				
				<div class="fillup">
					<div class="input-field1">
						<label> Project Leader, Assistant Project Leader, Coordinators</i></label>
						<textarea placeholder="type here..."  name="People" required ><?php echo $dbPeople; ?></textarea> 
						
						<label> Objectives</label>
						<textarea placeholder="type here..."  name="Objectives" required><?php echo $dbObjectives; ?></textarea> 
						
						<label> Narrative Activity</i></label>
						<textarea placeholder="type here..."  name="Narrative" required></textarea> 
						<br>
						<label>  Photos <i><h5>(Please attach  3 photos with captions Accepts JPEG only):</h5></i> </label>
						
						<div class ="pics1">
							 <label> Select Picture 1:</label>
							 <input type="file" id="Pic1" name="Pic1" accept=".jpg, .jpeg" onchange="validateFileTypePic1()">
							 <textarea class ="caption" placeholder="caption here..." name="Caption1"></textarea> 
						</div>	 
						<div class ="pics2">
							<label> Select Picture 2:</label>
							  <input type="file" id="Pic2" name="Pic2" accept=".jpg, .jpeg" onchange="validateFileTypePic2()">
							  <textarea class ="caption" placeholder="caption here..." name="Caption2"></textarea> 
						</div>	
						<div class ="pics2">
						<label> Select Picture 3:</label>
							   <input type="file" id="Pic3" name="Pic3" accept=".jpg, .jpeg" onchange="validateFileTypePic3()">
							   <textarea class ="caption" placeholder="caption here..." name="Caption3"></textarea> 
						</div>	
					</div>
				</div>
		</div>
		
			<table class="signiture">
				<tr>
					<th></th>
					<th width="40%";> Name </th>
					<th width="40%";> Designation </th>>
				</tr>
				<tr>
					<td> Prepared by:</td>	
					<td><textarea placeholder="..." name="Sign1_1" required><?php echo strtoupper($dbSign1_1);?></textarea></td>
					<td><textarea placeholder="..." name="Sign1_2" required><?php echo $dbSign1_2; ?></textarea></td>
				</tr>
				<tr>
					<td> Reviewed by:</td>
					<td>
					<div class="DrpSigna">
						<select id="ReviewedByName">
							<option value="">Please Select Name</option>
								<?php
									$SQLName = ("SELECT * FROM signatories_alangilan WHERE Persons_Name != ''");
									$CMDName = $con->query($SQLName) or die("Error SQL Signatories");
										while($RSTName = mysqli_fetch_array($CMDName)){
											$Persons_Name = $RSTName['Persons_Name']; 
								?>
							<option value="<?php echo "$Persons_Name";?>"><?php echo "$Persons_Name";?></option>
								<?php } ?>
						</select>
					</div>
						<div class="Getbtn">
							<span onclick="ReviewedByName()"> ✓  </span>	
						</div>
						<br>
						<textarea placeholder="..." id="Sign2_1" name="Sign2_1" required><?php echo ""; ?></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="ReviewByDesignation">
							<option value="">Please Select Name</option>
								<?php
									$SQLPosition = ("SELECT * FROM signatories_alangilan WHERE Position != ''");
										$CMDPosition = $con->query($SQLPosition) or die("Error SQL Signatories");
											while($RSTPosition = mysqli_fetch_array($CMDPosition)){ 
												$SignPosition = $RSTPosition['Position']; 
								?>
							<option value="<?php echo "$SignPosition";?>"><?php echo "$SignPosition";?></option>
								<?php } ?>
						</select>
						</div>
						<div class="Getbtn">
							<span onclick="ReviewByDesignation()"> ✓ </span>
						</div>
						<br>
						<textarea placeholder="..." id="Sign2_2" name="Sign2_2" required><?php echo ""; ?></textarea>
					</td>
				</tr>
				<tr>
					<td> Accepted by:</td>
					<td>
					<div class="DrpSigna">
						<select id="AcceptedByName">
							<option value="">Please Select Name</option>
								<?php
									$SQLName = ("SELECT * FROM signatories_alangilan WHERE Persons_Name != ''");
									$CMDName = $con->query($SQLName) or die("Error SQL Signatories");
										while($RSTName = mysqli_fetch_array($CMDName)){
											$Persons_Name = $RSTName['Persons_Name']; 
								?>
							<option value="<?php echo "$Persons_Name";?>"><?php echo "$Persons_Name";?></option>
							<?php } ?>
						</select>
					</div>
					<div class="Getbtn">
						<span onclick="AcceptedByName()"> ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign3_1" name="Sign3_1" required><?php echo ""; ?></textarea>
					</td>
					
					<td>
					<div class="DrpSigna">
						<select id="AcceptedByDesignation">
							<option value="">Please Select Name</option>
								<?php
									$SQLPosition = ("SELECT * FROM signatories_alangilan WHERE Position != ''");
									$CMDPosition = $con->query($SQLPosition) or die("Error SQL Signatories");
										while($RSTPosition = mysqli_fetch_array($CMDPosition)){ 
											$SignPosition = $RSTPosition['Position']; 
								?>
							<option value="<?php echo "$SignPosition";?>"><?php echo "$SignPosition";?></option>
								<?php } ?>
						</select>
						</div>
						<div class="Getbtn">
							<span onclick="AcceptedByDesignation()">  ✓ </span>
						</div>
						<br>
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required><?php echo ""; ?></textarea>
					</td>
				</tr>
			</table>
	
		<div class="buttonBACK">
				<a href="Proposal-approved.php" class="btnB"> Back </a></button>
			</div>
		<div class ="save">
			<button class = "btn3" type="submit" name="submit"> Save </button>
		</div>
</form>
<br><br><br><br><br>
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
		item.classList.remove('hovered'));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink);
	</script>
	
</body>
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

<script type="text/javascript">
//For Image Validation

function validateFileTypePic1(){
	var fileName = document.getElementById("Pic1").value;
	var idxDot = fileName.lastIndexOf(".") + 1;
	var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
	if (extFile=="jpg" || extFile=="jpeg"){ }
	else{
		alert("Only jpg/jpeg files are allowed! \r\r   ->Reselect Picture 1");
		document.getElementById("Pic1").value = "";
	}   
}

function validateFileTypePic2(){
	var fileName = document.getElementById("Pic2").value;
	var idxDot = fileName.lastIndexOf(".") + 1;
	var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
	if (extFile=="jpg" || extFile=="jpeg"){ }
	else{
		alert("Only jpg/jpeg files are allowed! \r\r   ->Reselect Picture 2");
		document.getElementById("Pic2").value = "";
	}   
}

function validateFileTypePic3(){
	var fileName = document.getElementById("Pic3").value;
	var idxDot = fileName.lastIndexOf(".") + 1;
	var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
	if (extFile=="jpg" || extFile=="jpeg"){ }
	else{
		alert("Only jpg/jpeg files are allowed! \r\r   ->Reselect Picture 3");
		document.getElementById("Pic3").value = "";
	}   
}


</script>


<?php
if (isset($_POST['submit'])) {

	//$PID , $dbAuthor , $AID - Evaluator , $DateTime
	
	$Title = htmlspecialchars($_POST['Title']);
	$Location_Area = htmlspecialchars($_POST['Location']);
	$DateImplement = htmlspecialchars($_POST['DateImplement']);
	$HoursImplement = htmlspecialchars($_POST['HoursImplement']);
	$Office = htmlspecialchars($_POST['Office']);
	$Agency = htmlspecialchars($_POST['Agency']);
	$TypeCES = htmlspecialchars($_POST['TypeCES']);
	$SDG = htmlspecialchars($_POST['SDG']);
	$Beneficiaries = htmlspecialchars($_POST['Beneficiaries']);
	$M1 = htmlspecialchars($_POST['M1']);
	$M2 = htmlspecialchars($_POST['M2']);
	$MT = htmlspecialchars($_POST['MT']);
	$F1 = htmlspecialchars($_POST['F1']);
	$F2 = htmlspecialchars($_POST['F2']);
	$FT = htmlspecialchars($_POST['FT']);
	$MFT = htmlspecialchars($_POST['MFT']);
	$People = htmlspecialchars($_POST['People']);
	$Objectives = htmlspecialchars($_POST['Objectives']);
	$Narrative = htmlspecialchars($_POST['Narrative']);
	$Eval1A1 = htmlspecialchars($_POST['Eval1A1']);
	$Eval1A2 = htmlspecialchars($_POST['Eval1A2']);
	$Eval1AT = htmlspecialchars($_POST['Eval1AT']);
	$Eval1B1 = htmlspecialchars($_POST['Eval1B1']);
	$Eval1B2 = htmlspecialchars($_POST['Eval1B2']);
	$Eval1BT = htmlspecialchars($_POST['Eval1BT']);
	$Eval1C1 = htmlspecialchars($_POST['Eval1C1']);
	$Eval1C2 = htmlspecialchars($_POST['Eval1C2']);
	$Eval1CT = htmlspecialchars($_POST['Eval1CT']);
	$Eval1D1 = htmlspecialchars($_POST['Eval1D1']);
	$Eval1D2 = htmlspecialchars($_POST['Eval1D2']);
	$Eval1DT = htmlspecialchars($_POST['Eval1DT']);
	$Eval1E1 = htmlspecialchars($_POST['Eval1E1']);
	$Eval1E2 = htmlspecialchars($_POST['Eval1E2']);
	$Eval1ET = htmlspecialchars($_POST['Eval1ET']);
	$Eval2A1 = htmlspecialchars($_POST['Eval2A1']);
	$Eval2A2 = htmlspecialchars($_POST['Eval2A2']);
	$Eval2AT = htmlspecialchars($_POST['Eval2AT']);
	$Eval2B1 = htmlspecialchars($_POST['Eval2B1']);
	$Eval2B2 = htmlspecialchars($_POST['Eval2B2']);
	$Eval2BT = htmlspecialchars($_POST['Eval2BT']);
	$Eval2C1 = htmlspecialchars($_POST['Eval2C1']);
	$Eval2C2 = htmlspecialchars($_POST['Eval2C2']);
	$Eval2CT = htmlspecialchars($_POST['Eval2CT']);
	$Eval2D1 = htmlspecialchars($_POST['Eval2D1']);
	$Eval2D2 = htmlspecialchars($_POST['Eval2D2']);
	$Eval2DT = htmlspecialchars($_POST['Eval2DT']);
	$Eval2E1 = htmlspecialchars($_POST['Eval2E1']);
	$Eval2E2 = htmlspecialchars($_POST['Eval2E2']);
	$Eval2ET = htmlspecialchars($_POST['Eval2ET']);
	
	//$Pic1 = htmlspecialchars($_POST['Pic1']);
	//$Pic2 = htmlspecialchars($_POST['Pic2']);
	//$Pic3 = htmlspecialchars($_POST['Pic3']);

	$Pic1 = $_FILES['Pic1']['tmp_name'];
	if ($Pic1 == ""){ $img1 = "";}
	else{$img1 = file_get_contents($Pic1);}

	$Pic2 = $_FILES['Pic2']['tmp_name'];
	if ($Pic2 == ""){ $img2 = "";}
	else{$img2 = file_get_contents($Pic2);}

	$Pic3 = $_FILES['Pic3']['tmp_name'];
    if ($Pic3 == ""){ $img3 = "";}
	else{$img3 = file_get_contents($Pic3);}

	$Caption1 = htmlspecialchars($_POST['Caption1']);
	$Caption2 = htmlspecialchars($_POST['Caption2']);
	$Caption3 = htmlspecialchars($_POST['Caption3']);
	
	//$Remarks (Pending, Approved, Revise, Reject)
	$Status = "PENDING";
	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']);
	$Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']);
	$Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']);
	$Sign3_2 = htmlspecialchars($_POST['Sign3_2']);

	$stmt = mysqli_prepare($con, "INSERT INTO evaluation_alangilan
		(ProposalID, Author, Evaluator, Date_Time, Year, Quarter,
			Title, Location_Area, DateImplement, HoursImplement, Office, Agency, TypeCES, SDG, Beneficiaries,
			M1, M2, MT, F1, F2, FT, MFT, People, Objectives, Narrative,
			Eval1A1, Eval1A2, Eval1AT, Eval1B1, Eval1B2, Eval1BT, Eval1C1, Eval1C2, Eval1CT,
			Eval1D1, Eval1D2, Eval1DT, Eval1E1, Eval1E2, Eval1ET,
			Eval2A1, Eval2A2, Eval2AT, Eval2B1, Eval2B2, Eval2BT, Eval2C1, Eval2C2, Eval2CT,
			Eval2D1, Eval2D2, Eval2DT, Eval2E1, Eval2E2, Eval2ET,
			Pic1, Caption1, Pic2, Caption2, Pic3, Caption3,
			ProjectStatus, Sign1_1, Sign1_2, Sign2_1, Sign2_2, Sign3_1, Sign3_2)
		VALUES 
			(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
			 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
			 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
			 ?,?,?,?,?)");
	mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', //65
		$PID, $dbAuthor, $AID, $DateTime, $dbYear, $dbQuarter,
			$Title, $Location_Area, $DateImplement, $HoursImplement, $Office, $Agency, $TypeCES, $SDG, $Beneficiaries,
			$M1, $M2, $MT, $F1, $F2, $FT, $MFT, $People, $Objectives, $Narrative,
			$Eval1A1, $Eval1A2, $Eval1AT, $Eval1B1, $Eval1B2, $Eval1BT, $Eval1C1, $Eval1C2, $Eval1CT,
			$Eval1D1, $Eval1D2, $Eval1DT, $Eval1E1, $Eval1E2, $Eval1ET,
			$Eval2A1, $Eval2A2, $Eval2AT, $Eval2B1, $Eval2B2, $Eval2BT, $Eval2C1, $Eval2C2, $Eval2CT,
			$Eval2D1, $Eval2D2, $Eval2DT, $Eval2E1, $Eval2E2, $Eval2ET,
			$img1, $Caption1, $img2, $Caption2, $img3, $Caption3,
			$Status, $Sign1_1, $Sign1_2, $Sign2_1, $Sign2_2, $Sign3_1, $Sign3_2);
	mysqli_stmt_execute($stmt);
	
	echo "<script>
			alert('Evaluation Successfully Created');
			window.location='Evaluation.php';
		</script>";
}
?>

<script>
//For Signatories Dropdown
function ReviewedByName(){
	var x = document.getElementById("ReviewedByName").value;
	document.getElementById("Sign2_1").value = x;
}
function ReviewByDesignation(){
	var x = document.getElementById("ReviewByDesignation").value;
	document.getElementById("Sign2_2").value = x;
}

function AcceptedByName(){
	var x = document.getElementById("AcceptedByName").value;
	document.getElementById("Sign3_1").value = x;
}
function AcceptedByDesignation(){
	var x = document.getElementById("AcceptedByDesignation").value;
	document.getElementById("Sign3_2").value = x;
}
</script>

<?php include("RestrictNotif.php"); ?>