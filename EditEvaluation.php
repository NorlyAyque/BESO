<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"];//Naka Login na User - Evaluator

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<?php
if(isset($_GET['edit'])){
	
	$EID = $_GET['edit']; 
    
	$sql = ("SELECT * FROM evaluation_alangilan WHERE EvaluationID = $EID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		//$dbAuthor = $result['Title']; ////Gumawa ng Proposal - Author

		$dbTitle = $result['Title'];
		$dbLocation_Area = $result['Location_Area'];
		$dbDateImplement = $result['DateImplement'];
		$dbHoursImplement = $result['HoursImplement'];
		$dbOffice = $result['Office'];
		$dbAgencies = $result['Agency'];
		$dbTypeCES = $result['TypeCES'];
		$dbSDG = $result['SDG'];
		$dbBeneficiaries = $result['Beneficiaries'];

		$dbM1 = $result['M1'];
		$dbM2 = $result['M2'];
		$dbMT = $result['MT'];
		$dbF1 = $result['F1'];
		$dbF2 = $result['F2'];
		$dbFT = $result['FT'];
		$dbMFT = $result['MFT'];

		$dbPeople = $result['People'];
		$dbObjectives = $result['Objectives'];
		$dbNarrative = $result['Narrative'];

		$dbEval1A1 = $result['Eval1A1'];
		$dbEval1A2 = $result['Eval1A2'];
		$dbEval1AT = $result['Eval1AT'];
		$dbEval1B1 = $result['Eval1B1'];
		$dbEval1B2 = $result['Eval1B2'];
		$dbEval1BT = $result['Eval1BT'];
		$dbEval1C1 = $result['Eval1C1'];
		$dbEval1C2 = $result['Eval1C2'];
		$dbEval1CT = $result['Eval1CT'];
		$dbEval1D1 = $result['Eval1D1'];
		$dbEval1D2 = $result['Eval1D2'];
		$dbEval1DT = $result['Eval1DT'];
		$dbEval1E1 = $result['Eval1E1'];
		$dbEval1E2 = $result['Eval1E2'];
		$dbEval1ET = $result['Eval1ET'];

		$dbEval2A1 = $result['Eval2A1'];
		$dbEval2A2 = $result['Eval2A2'];
		$dbEval2AT = $result['Eval2AT'];
		$dbEval2B1 = $result['Eval2B1'];
		$dbEval2B2 = $result['Eval2B2'];
		$dbEval2BT = $result['Eval2BT'];
		$dbEval2C1 = $result['Eval2C1'];
		$dbEval2C2 = $result['Eval2C2'];
		$dbEval2CT = $result['Eval2CT'];
		$dbEval2D1 = $result['Eval2D1'];
		$dbEval2D2 = $result['Eval2D2'];
		$dbEval2DT = $result['Eval2DT'];
		$dbEval2E1 = $result['Eval2E1'];
		$dbEval2E2 = $result['Eval2E2'];
		$dbEval2ET = $result['Eval2ET'];
		
		$dbPic1 = $result['Pic1'];
		$dbCaption1 = $result['Caption1'];
		$dbPic2 = $result['Pic2'];
		$dbCaption2 = $result['Caption2'];
		$dbPic3 = $result['Pic3'];
		$dbCaption3 = $result['Caption3'];

		$dbSign1_1 = $result['Sign1_1'];
		$dbSign1_2 = $result['Sign1_2'];
		$dbSign2_1 = $result['Sign2_1'];
		$dbSign2_2 = $result['Sign2_2'];
		$dbSign3_1 = $result['Sign3_1'];
		$dbSign3_2 = $result['Sign3_2'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Edit Evaluation</title>
<link rel="stylesheet" type="text/css" href="styles/EditEvaluationSTYLE.css">

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
					<span class ="title">  Create Proposal</span>
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
					<span class ="title">  Monitoring Reports</span>
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
						EDIT EVALUATION REPORT	
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
						<textarea placeholder="type here..." name="Location" required><?php echo $dbLocation_Area; ?></textarea> 
						
						<label>  Date of Implementation / Number of hours of implementation </label>
						<textarea placeholder="type here..." name="DateImplement" required><?php echo $dbDateImplement; ?></textarea>
						<textarea placeholder="type here..." name="HoursImplement" required><?php echo $dbHoursImplement; ?></textarea>
						 
						<label>  Implementing Office/College/Program<i>(specify the programs under the college implementing the project)</i> </label>
						<textarea placeholder="type here..."  name="Office" required><?php echo $dbOffice; ?></textarea> 
						
						<label>  Partner Agency </label>
						<textarea placeholder="type here..." name="Agency" required><?php echo $dbAgencies; ?></textarea> 
						
						<label>  Types of Community Extension Service </label>
						<textarea placeholder="type here..." name="TypeCES" required><?php echo $dbTypeCES; ?></textarea> 
						
						<label> Sustanable Development Goals </label>
						<textarea placeholder="type here..." name="SDG" required><?php echo $dbSDG; ?></textarea> 
						
						<label> Number of Male and Female and Types of Beneficiaries<i>(Type such as OSY, Childern,Women,etc.)</i>  </label>
						
						<table class="participants">
								<tr class="types">
									<th colspan="4"> 	<label> Types of Participants  <input type="text" name="Beneficiaries" value="<?php echo $dbBeneficiaries; ?>" required></i></label></th>
								</tr>
								<tr>
									<th>  </th>
									<th> BatStateU Participants</th>
									<th> Participants from other institution </th>
									<th> Total </th>
									
								</tr>	
								<tr >
									<td class="MF">Male</td>
									<td><input type="number" min="0" name="M1" id="M1" onchange="CalMale()" value="<?php echo $dbM1; ?>" required> </td> 
									<td><input type="number" min="0" name="M2" id="M2" onchange="CalMale()" value="<?php echo $dbM2; ?>" required> </td> 
									<td><input type="number" min="0" name="MT" id="MT" Readonly required value="<?php echo $dbMT; ?>" required> </td> 
								</tr>
								<tr>
									<td class="MF">Female</td>
									<td><input type="number" min="0" name="F1" id="F1" onchange="CalFemale()" required value="<?php echo $dbF1; ?>" required> </td> 
									<td><input type="number" min="0" name="F2" id="F2" onchange="CalFemale()" required value="<?php echo $dbF2; ?>" required> </td> 
									<td><input type="number" min="0" name="FT" id="FT" Readonly required value="<?php echo $dbFT; ?>" required> </td> 
								</tr>
								<tr class ="total">
									<td colspan="3">Grand Total</td>
									<td><input type="number" min="0" name="MFT" id="MFT" Readonly required value="<?php echo $dbMFT; ?>" required> </td> 
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
									<th><input type="number" min="0" name="Eval1A1" id="Eval1A1" onchange="Cal_1A()" value="<?php echo $dbEval1A1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1A2" id="Eval1A2" onchange="Cal_1A()" value="<?php echo $dbEval1A2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1AT" id="Eval1AT" Readonly value="<?php echo $dbEval1AT; ?>"> </td> 
								</tr>
								<tr class="MF" >
									<td >1.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval1B1" id="Eval1B1" onchange="Cal_1B()" value="<?php echo $dbEval1B1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1B2" id="Eval1B2" onchange="Cal_1B()" value="<?php echo $dbEval1B2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1BT" id="Eval1BT" Readonly value="<?php echo $dbEval1BT; ?>"> </td> 
								</tr>
								<tr class="MF">
									<td >1.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval1C1" id="Eval1C1" onchange="Cal_1C()" value="<?php echo $dbEval1C1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1C2" id="Eval1C2" onchange="Cal_1C()" value="<?php echo $dbEval1C2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1CT" id="Eval1CT" Readonly value="<?php echo $dbEval1CT; ?>"> </td> 
								</tr>
								<tr class="MF">
									<td > 1.4. Fair</td>
									<th><input type="number" min="0" name="Eval1D1" id="Eval1D1" onchange="Cal_1D()" value="<?php echo $dbEval1D1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1D2" id="Eval1D2" onchange="Cal_1D()" value="<?php echo $dbEval1D2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1DT" id="Eval1DT" Readonly value="<?php echo $dbEval1DT; ?>"> </td> 
								</tr>
								<tr  class="MF">
									<td >1.5. Poor</td>
									<th><input type="number" min="0" name="Eval1E1" id="Eval1E1" onchange="Cal_1E()" value="<?php echo $dbEval1C1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1E2" id="Eval1E2" onchange="Cal_1E()" value="<?php echo $dbEval1C2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval1ET" id="Eval1ET" Readonly value="<?php echo $dbEval1CT; ?>"> </td> 
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
									<th><input type="number" min="0" name="Eval2A1" id="Eval2A1" onchange="Cal_2A()" value="<?php echo $dbEval2A1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2A2" id="Eval2A2" onchange="Cal_2A()" value="<?php echo $dbEval2A2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2AT" id="Eval2AT" Readonly value="<?php echo $dbEval2AT; ?>"> </td> 
								</tr>
								<tr class="MF" >
									<td >2.2. Very Satisfactory</td>
									<th><input type="number" min="0" name="Eval2B1" id="Eval2B1" onchange="Cal_2B()" value="<?php echo $dbEval2B1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2B2" id="Eval2B2" onchange="Cal_2B()" value="<?php echo $dbEval2B2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2BT" id="Eval2BT" Readonly value="<?php echo $dbEval2BT; ?>"> </td> 
								</tr>
								<tr class="MF">
									<td >2.3. Satisfactory</td>
									<th><input type="number" min="0" name="Eval2C1" id="Eval2C1" onchange="Cal_2C()" value="<?php echo $dbEval2C1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2C2" id="Eval2C2" onchange="Cal_2C()" value="<?php echo $dbEval2C2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2CT" id="Eval2CT" Readonly value="<?php echo $dbEval2CT; ?>"> </td> 
								</tr>
								<tr class="MF">
									<td > 2.4. Fair</td>
									<th><input type="number" min="0" name="Eval2D1" id="Eval2D1" onchange="Cal_2D()" value="<?php echo $dbEval2D1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2D2" id="Eval2D2" onchange="Cal_2D()" value="<?php echo $dbEval2D2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2DT" id="Eval2DT" Readonly value="<?php echo $dbEval2DT; ?>"> </td> 
								</tr>
								<tr  class="MF">
									<td >2.5. Poor</td>
									<th><input type="number" min="0" name="Eval2E1" id="Eval2E1" onchange="Cal_2E()" value="<?php echo $dbEval2E1; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2E2" id="Eval2E2" onchange="Cal_2E()" value="<?php echo $dbEval2E2; ?>"> </td> 
									<th><input type="number" min="0" name="Eval2ET" id="Eval2ET" Readonly value="<?php echo $dbEval2ET; ?>"> </td> 
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
						<textarea placeholder="type here..."  name="Narrative" required><?php echo $dbNarrative; ?></textarea> 
						<br>
						<label>  Photos <i>(Please attach  3 photos with captions) <br> upload jpeg file type only</i> </label>
						
						<div class ="pics1">
							 <label> Select Picture 1:</label>
							 <input type="file" name="Pic1" accept=".jpg, .jpeg"></input>
							 <textarea class ="caption" placeholder="caption here..." name="Caption1"><?php echo $dbCaption1; ?></textarea> 
						</div>	 
						<div class ="pics2">
							<label> Select Picture 2:</label>
							  <input type="file" name="Pic2" accept=".jpg, .jpeg"></input>
							  <textarea class ="caption" placeholder="caption here..." name="Caption2"><?php echo $dbCaption2; ?></textarea> 
						</div>	
						<div class ="pics2">
						<label> Select Picture 3:</label>
							   <input type="file" name="Pic3" accept=".jpg, .jpeg"></input>
							   <textarea class ="caption" placeholder="caption here..." name="Caption3"><?php echo $dbCaption3; ?></textarea> 
							   
						</div>
						<CENTER>
							<?php 
								echo '<img src="data:image/jpeg;base64,'.base64_encode($dbPic1).'" alt="Image 1 Unavailable" width=400 height=210 />';
								echo "<br>".$dbCaption1."<br><br>";
								echo '<img src="data:image/jpeg;base64,'.base64_encode($dbPic2).'" alt="Image 2 Unavailable" width=400 height=210 />';
								echo "<br>".$dbCaption2."<br><br>";
								echo '<img src="data:image/jpeg;base64,'.base64_encode($dbPic3).'" alt="Image 3 Unavailable" width=400 height=210 />';
								echo "<br>".$dbCaption3;
							?>
						</CENTER>
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
						<textarea placeholder="..." id="Sign2_1" name="Sign2_1" required><?php echo "$dbSign2_1"; ?></textarea>
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
						<textarea placeholder="..." id="Sign2_2" name="Sign2_2" required><?php echo "$dbSign2_2"; ?></textarea>
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
						<textarea placeholder="..." id="Sign3_1" name="Sign3_1" required><?php echo "$dbSign3_1"; ?></textarea>
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
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required><?php echo "$dbSign3_2"; ?></textarea>
					</td>
				</tr>
			</table>

		<div class ="backEval">
			<a href="Evaluation-revision.php" class="btnBack"> Back </a></button>
		</div>
		<div class ="save">
			
			<button class = "btn3" type="submit" name="update"> Update </button>
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

<?php
if (isset($_POST['update'])) {

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
	
	$img1 = ($_FILES['Pic1']['tmp_name']);
	$img2 = ($_FILES['Pic2']['tmp_name']);
	$img3 = ($_FILES['Pic3']['tmp_name']);

	//$Pic1 = addslashes(file_get_contents($_FILES['Pic1']['tmp_name']));
	//$Pic2 = addslashes(file_get_contents($_FILES['Pic2']['tmp_name']));
	//$Pic3 = addslashes(file_get_contents($_FILES['Pic3']['tmp_name']));

	$Caption1 = htmlspecialchars($_POST['Caption1']);
	$Caption2 = htmlspecialchars($_POST['Caption2']);
	$Caption3 = htmlspecialchars($_POST['Caption3']);
	
	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']);
	$Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']);
	$Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']);
	$Sign3_2 = htmlspecialchars($_POST['Sign3_2']);

	if (empty($img1)== true){ }
	else {
		$Pic1 = addslashes(file_get_contents($_FILES['Pic1']['tmp_name']));
		$sql = ("UPDATE evaluation_alangilan SET Pic1 = '$Pic1' WHERE EvaluationID = $EID");
		$command = $con->query($sql);
	}

	if (empty($img2)== true){ }
	else {
		$Pic2 = addslashes(file_get_contents($_FILES['Pic2']['tmp_name']));
		$sql = ("UPDATE evaluation_alangilan SET Pic2 = '$Pic2' WHERE EvaluationID = $EID");
		$command = $con->query($sql);
	}

	if (empty($img3)== true){ }
	else {
		$Pic3 = addslashes(file_get_contents($_FILES['Pic3']['tmp_name']));
		$sql = ("UPDATE evaluation_alangilan SET Pic3 = '$Pic3' WHERE EvaluationID = $EID");
		$command = $con->query($sql);
	}

	//Update for all text fields
	$sql = ("UPDATE evaluation_alangilan
		SET Title = '$Title', Location_Area = '$Location_Area', DateImplement = '$DateImplement', HoursImplement = '$HoursImplement', 
			Office = '$Office', Agency = '$Agency', TypeCES = '$TypeCES', SDG = '$SDG', Beneficiaries = '$Beneficiaries',
			M1 = '$M1', M2 = '$M2', MT = '$MT', F1 = '$F1', F2 = '$F2', FT = '$FT', MFT = '$MFT',
			People = '$People', Objectives = '$Objectives', Narrative = '$Narrative',
			Eval1A1 = '$Eval1A1', Eval1A2 = '$', Eval1AT = '$', 
			Eval1B1 = '$Eval1B1', Eval1B2 = '$Eval1B2', Eval1BT = '$Eval1BT', 
			Eval1C1 = '$Eval1C1', Eval1C2 = '$Eval1C2', Eval1CT = '$Eval1CT',
			Eval1D1 = '$Eval1D1', Eval1D2 = '$Eval1D2', Eval1DT = '$Eval1DT',
			Eval1E1 = '$Eval1E1', Eval1E2 = '$Eval1E2', Eval1ET = '$Eval1ET',
			Eval2A1 = '$Eval2A1', Eval2A2 = '$Eval2A2', Eval2AT = '$Eval2AT',
			Eval2B1 = '$Eval2B1', Eval2B2 = '$Eval2B2', Eval2BT = '$Eval2BT',
			Eval2C1 = '$Eval2C1', Eval2C2 = '$Eval2C2', Eval2CT = '$Eval2CT',
			Eval2D1 = '$Eval2D1', Eval2D2 = '$Eval2D2', Eval2DT = '$Eval2DT',
			Eval2E1 = '$Eval2E1', Eval2E2 = '$Eval2E2', Eval2ET = '$Eval2ET',
			Caption1 = '$Caption1', Caption2 = '$Caption2', Caption3 = '$Caption3',
			Sign1_1 = '$Sign1_1', Sign1_2 = '$Sign1_2', Sign2_1 = '$Sign2_1',
			Sign2_2 = '$Sign2_2', Sign3_1 = '$Sign3_1', Sign3_2 = '$Sign3_2'
		WHERE EvaluationID = $EID");
	
	
	if ($command = $con->query($sql) === TRUE) {
		echo "<script>
			alert('Evaluation Successfully Created');
			window.location='EditEvaluation.php?edit=$EID';
		</script>";
	  } else {
		echo "<script>
				alert('PROCESS FAILED Try Again!');
				window.location.href='EditEvaluation.php';
			</script>";
	  }
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