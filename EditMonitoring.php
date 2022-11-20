<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"]; //Naka Login na User

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<?php
if(isset($_GET['edit'])){
	$MID = $_GET['edit']; //Proposal ID
    
	$sql = ("SELECT * FROM monitoring_alangilan WHERE MonitoringID = $MID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
        $dbTitle = $result['Title'];
		$dbLocation_Area = $result['Location_Area'];
		$dbDuration = $result['Duration'];
		$dbTypeCES = $result['TypeCES'];
		$dbSDG = $result['SDG'];
		$dbOffice = $result['Office'];
		$dbPrograms = $result['Programs'];
		$dbPeople = $result['People'];
		$dbAgency = $result['Agency'];
		$dbBeneficiaries = $result['Beneficiaries'];
		
		$dbPS1 = $result['PS1'];
		$dbPS2 = $result['PS2'];
		$dbPS3 = $result['PS3'];
		$dbPS4 = $result['PS4'];
		$dbPS5 = $result['PS5'];
		$dbPS6 = $result['PS6'];
		$dbPS7 = $result['PS7'];
		
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
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Update Monitoring</title>
<link rel="stylesheet" type="text/css" href="styles/EditMonitoring.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
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
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title">  Evaluation Reports</span>
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
						EDIT MONITORING PROJECT
					</th> 
				</tr>
			</table>
<form method = "Post">	
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title of the project </label>
						<textarea class="font" placeholder="type Here..." name="Title" required><?Php echo $dbTitle; ?></textarea>
						 
						<label> ll. Location </label>
						<textarea placeholder="type here..." name="Location_Area" required><?Php echo $dbLocation_Area; ?></textarea> 
						
						<label> lll. Duration </label>
						<textarea placeholder="type here..." name="Duration" required><?Php echo $dbDuration; ?></textarea>
						 
						<label> lV. Type of Community Extension Service </label>
						<textarea placeholder="type here..." name="TypeCES" required><?Php echo $dbTypeCES; ?></textarea> 
						
						<label>  V. Sustatinable Development Goals (SDG) </label>
						<textarea placeholder="type here..." name="SDG" required><?Php echo $dbSDG; ?></textarea> 
						
						<label>  Vl. Office/ College/s Involved </label>
						<textarea placeholder="type here..." name="Office" required><?Php echo $dbOffice; ?></textarea> 
						
						<label>  Vll. Program/s Involved<i>(specify the programs under the college implementing the project)</i></label>
						<textarea placeholder="type here..." name="Programs" required><?Php echo $dbPrograms; ?></textarea> 
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i></label>
						<textarea placeholder="type here..." name="People" required><?Php echo $dbPeople; ?></textarea> 
						
						<label> lX. Cooperating Agencies</label>
						<textarea placeholder="type here..." name="Agency" required><?Php echo $dbAgency; ?></textarea> 
						
						<label> X. Beneficiaries<i>(Type and Number of Male and Female)</i></label>
						<textarea placeholder="type here..." name="Beneficiaries" required><?Php echo $dbBeneficiaries; ?></textarea> 
						
						<center><label> Xl. Project Status<label></center><br>
						
						<label>1. As to purpose (how far has the purpose been attained)</label>
						<textarea placeholder="type here..." name="PS1" required><?Php echo $dbPS1; ?></textarea> 
						
						<label>2. Availability of materials</label>
						<textarea placeholder="type here..." name="PS2" required><?Php echo $dbPS2; ?></textarea> 
						
						<label>3. Schedule of activities</label>
						<textarea placeholder="type here..." name="PS3" required><?Php echo $dbPS3; ?></textarea> 
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						
						
						
						
						<label> 4. Financial report<label>
							<div class="Tfinancial">
								 <table class="financial">
									<tbody>
										<tr>
											<th>Item Description </th>
											<th> Quantity </th>
											<th>Unit </th>
											<th>Unit Cost </th>
											<th>Total</th>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR1_1"></textarea></td>
											<td><input type="number" min="0" name="FPR1_2" id="FPR1_2" onchange="Row1()"></td>
											<td><textarea placeholder="type here..." name="FPR1_3"></textarea></td>
											<td><input type="number" min="0" name="FPR1_4" id="FPR1_4" onchange="Row1()"></td>
											<td><input type="number" min="0" name="FPR1_5" id="FPR1_5" value="0" onchange="Row1()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR2_1"></textarea></td>
											<td><input type="number" min="0" name="FPR2_2" id="FPR2_2" onchange="Row2()"></td>
											<td><textarea placeholder="type here..." name="FPR2_3"></textarea></td>
											<td><input type="number" min="0" name="FPR2_4" id="FPR2_4" onchange="Row2()"></td>
											<td><input type="number" min="0" name="FPR2_5" id="FPR2_5" value="0" onchange="Row2()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR3_1"></textarea></td>
											<td><input type="number" min="0" name="FPR3_2" id="FPR3_2" onchange="Row3()"></td>
											<td><textarea placeholder="type here..." name="FPR3_3"></textarea></td>
											<td><input type="number" min="0" name="FPR3_4" id="FPR3_4" onchange="Row3()"></td>
											<td><input type="number" min="0" name="FPR3_5" id="FPR3_5" value="0" onchange="Row3()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR4_1"></textarea></td>
											<td><input type="number" min="0" name="FPR4_2" id="FPR4_2" onchange="Row4()"></td>
											<td><textarea placeholder="type here..." name="FPR4_3"></textarea></td>
											<td><input type="number" min="0" name="FPR4_4" id="FPR4_4" onchange="Row4()"></td>
											<td><input type="number" min="0" name="FPR4_5" id="FPR4_5" value="0" onchange="Row4()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR5_1"></textarea></td>
											<td><input type="number" min="0" name="FPR5_2" id="FPR5_2" onchange="Row5()"></td>
											<td><textarea placeholder="type here..." name="FPR5_3"></textarea></td>
											<td><input type="number" min="0" name="FPR5_4" id="FPR5_4" onchange="Row5()"></td>
											<td><input type="number" min="0" name="FPR5_5" id="FPR5_5" value="0" onchange="Row5()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR6_1"></textarea></td>
											<td><input type="number" min="0" name="FPR6_2" id="FPR6_2" onchange="Row6()"></td>
											<td><textarea placeholder="type here..." name="FPR6_3"></textarea></td>
											<td><input type="number" min="0" name="FPR6_4" id="FPR6_4" onchange="Row6()"></td>
											<td><input type="number" min="0" name="FPR6_5" id="FPR6_5" value="0" onchange="Row6()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR7_1"></textarea></td>
											<td><input type="number" min="0" name="FPR7_2" id="FPR7_2" onchange="Row7()"></td>
											<td><textarea placeholder="type here..." name="FPR7_3"></textarea></td>
											<td><input type="number" min="0" name="FPR7_4" id="FPR7_4" onchange="Row7()"></td>
											<td><input type="number" min="0" name="FPR7_5" id="FPR7_5" value="0" onchange="Row7()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR8_1"></textarea></td>
											<td><input type="number" min="0" name="FPR8_2" id="FPR8_2" onchange="Row8()"></td>
											<td><textarea placeholder="type here..." name="FPR8_3"></textarea></td>
											<td><input type="number" min="0" name="FPR8_4" id="FPR8_4" onchange="Row8()"></td>
											<td><input type="number" min="0" name="FPR8_5" id="FPR8_5" value="0" onchange="Row8()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR9_1"></textarea></td>
											<td><input type="number" min="0" name="FPR9_2" id="FPR9_2" onchange="Row9()"></td>
											<td><textarea placeholder="type here..." name="FPR9_3"></textarea></td>
											<td><input type="number" min="0" name="FPR9_4" id="FPR9_4" onchange="Row9()"></td>
											<td><input type="number" min="0" name="FPR9_5" id="FPR9_5" value="0" onchange="Row9()" readonly></td>
										</tr>
										<tr class="MF">
											<td><textarea placeholder="type here..." name="FPR10_1"></textarea></td>
											<td><input type="number" min="0" name="FPR10_2" id="FPR10_2" onchange="Row10()"></td>
											<td><textarea placeholder="type here..." name="FPR10_3"></textarea></td>
											<td><input type="number" min="0" name="FPR10_4" id="FPR10_4" onchange="Row10()"></td>
											<td><input type="number" min="0" name="FPR10_5" id="FPR10_5" value="0" onchange="Row10()" readonly></td>
										</tr>
											
										<tr class="MF">
											<th colspan="4"  class="total">Grand Total</th>
											<td><input type="number" name="GrandTotal" id="GrandTotal" readonly></td>
										</tr>
									</tbody>
								</table>
							</div> 
						
						
						
						
						
						
						
						
						
						
						
						<label>5. Problems encountered</label>
						<textarea placeholder="type here..." name="PS5" required><?Php echo $dbPS5; ?></textarea> 
						
						<label>6. Actions taken to solve the problems encountered</label>
						<textarea placeholder="type here..." name="PS6" required><?Php echo $dbPS6; ?></textarea> 
						
						<label>7. Suggestions and recommendations</label>
						<textarea placeholder="type here..." name="PS7" required><?Php echo $dbPS7; ?></textarea> 
				  </div>
				</div>
				
			</div>
			<table class="signiture">
				<tr>
					<th></th>
					<th> Name </th>
					<th> Designation </th>
				</tr>
				<tr>
								<td> Prepared by:</td>
									
								<td>
									<div class="checkbox2">
											<label onclick="openForm2()">Select your name</label>
									</div>
										<div class="form-popup2" id="myForm2">
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<button type="button" class="btncancel" onclick="closeForm2()">CLOSE</button>
										</div>
										<textarea placeholder="Your Name" name="Sign1_1" required><?php echo $dbSign1_1; ?></textarea></td>
	
								<td>
									<div class="checkbox3">
											<label onclick="openForm3()">Select Designation</label>
									</div>
										<div class="form-popup3" id="myForm3">
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<button type="button" class="btncancel" onclick="closeForm3()">CLOSE</button>
										</div>
										<textarea placeholder="Designation" name="Sign1_2" required><?php echo $dbSign1_2; ?></textarea></td>
							</tr>
							<tr>
								<td> Review by:</td>
								<td>
									<div class="checkbox4">
											<label onclick="openForm4()">Select your name</label>
									</div>
										<div class="form-popup4" id="myForm4">
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<button type="button" class="btncancel" onclick="closeForm4()">CLOSE</button>
										</div>
									<textarea placeholder="Your Name" name="Sign2_1" required><?php echo $dbSign2_1; ?></textarea></td>
								<td>
									<div class="checkbox5">
											<label onclick="openForm5()">Select Designation</label>
									</div>
										<div class="form-popup5" id="myForm5">
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<br>
											<label class="check"><span>Sample</span>
												<input type="checkbox" id="" value="" name="" onclick="">
												<span class="checkmark"></span>
											</label>
											<button type="button" class="btncancel" onclick="closeForm5()">CLOSE</button>
										</div>
								<textarea placeholder="Designation" name="Sign2_2" required><?php echo $dbSign2_2; ?></textarea></td>
							</tr>
				<tr>
					<td> Accepted by:</td>
					<td>
						<div class="checkbox6">
								<label onclick="openForm6()">Select your name</label>
						</div>
							<div class="form-popup6" id="myForm6">
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm6()">CLOSE</button>
							</div>
					<textarea placeholder="Your Name" name="Sign3_1" required><?php echo $dbSign3_1; ?></textarea></td>
					
					<td>
						<div class="checkbox7">
								<label onclick="openForm7()">Select Designation</label>
						</div>
							<div class="form-popup7" id="myForm7">
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm7()">CLOSE</button>
							</div>
					<textarea placeholder="Designation" name="Sign3_2" required><?php echo $dbSign3_2; ?></textarea></td>
				</tr>
			</table>
			<table class="save-back">
				<tr>
					<th>
						<div class ="back">
							<a href="Monitoring-revision.php" button class = "btn4"> Back </a></button>
						</div>
					</th>
					<th>
					<div class ="save">
							<button class = "btn3" type="submit" name="submit"> Update </button>
						</div>
						
					</th>
				</tr>
			</table>
			
			
		</div>	
	</div>
</form>
	
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
	
	<script>
//For Signatories Dropdown
	function openForm2()  { document.getElementById("myForm2").style.display = "block"; }
	function closeForm2() { document.getElementById("myForm2").style.display = "none"; }
	
	function openForm3()  { document.getElementById("myForm3").style.display = "block"; }
	function closeForm3() { document.getElementById("myForm3").style.display = "none"; }
	
	function openForm4()  { document.getElementById("myForm4").style.display = "block"; }
	function closeForm4() { document.getElementById("myForm4").style.display = "none"; }
	
	function openForm5()  { document.getElementById("myForm5").style.display = "block"; }
	function closeForm5() { document.getElementById("myForm5").style.display = "none"; }
	
	function openForm6()  { document.getElementById("myForm6").style.display = "block"; }
	function closeForm6() { document.getElementById("myForm6").style.display = "none"; }
	
	function openForm7()  { document.getElementById("myForm7").style.display = "block"; }
	function closeForm7() { document.getElementById("myForm7").style.display = "none"; }
</script>
<body>
</html>

<?php

if (isset($_POST['submit'])) {
	//$PID , $dbAuthor , $AID - Who Monitor (Evaluator), $DateTime
	
	$Title = htmlspecialchars($_POST['Title']);
	$Location_Area = htmlspecialchars($_POST['Location_Area']);
	$Duration = htmlspecialchars($_POST['Duration']);
	$TypeCES = htmlspecialchars($_POST['TypeCES']);
	$SDG = htmlspecialchars($_POST['SDG']);
	$Office = htmlspecialchars($_POST['Office']);
	$Programs = htmlspecialchars($_POST['Programs']);
	$People = htmlspecialchars($_POST['People']);
	$Agency = htmlspecialchars($_POST['Agency']);
	$Beneficiaries = htmlspecialchars($_POST['Beneficiaries']);
	$PS1 = htmlspecialchars($_POST['PS1']);
	$PS2 = htmlspecialchars($_POST['PS2']);
	$PS3 = htmlspecialchars($_POST['PS3']);
	$PS4 = htmlspecialchars($_POST['PS4']);
	$PS5 = htmlspecialchars($_POST['PS5']);
	$PS6 = htmlspecialchars($_POST['PS6']);
	$PS7 = htmlspecialchars($_POST['PS7']);

	//$Remarks (Pending, Approved, Revise, Reject)
	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']);
	$Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']);
	$Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']);
	$Sign3_2 = htmlspecialchars($_POST['Sign3_2']);

	$sql = ("UPDATE monitoring_alangilan
		SET Title = '$Title', Location_Area = '$Location_Area', Duration = '$Duration', 
			TypeCES = '$TypeCES', SDG = '$SDG', 
			Office = '$Office', Programs = '$Programs', People = '$People', Agency = '$Agency', 
			Beneficiaries = '$Beneficiaries',
			PS1 = '$PS1', PS2 = '$PS2', PS3 = '$PS3', PS4 = '$PS4', 
			PS5 = '$PS5', PS6 = '$PS6', PS7 = '$PS7',
			Sign1_1 = '$Sign1_1', Sign1_2 = '$Sign1_2', Sign2_1 = '$Sign2_1',
			Sign2_2 = '$Sign2_2', Sign3_1 = '$Sign3_1', Sign3_2 = '$Sign3_2'
		WHERE MonitoringID = $MID");
	$command = $con->query($sql);
	echo "<script>
			alert('Monitoring Successfully Updated');
			window.location='EditMonitoring.php?edit=$MID';
		</script>";
}

?>