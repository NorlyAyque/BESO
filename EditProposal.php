<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"];
$create_table = $_SESSION["create_table"];

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<?php
if(isset($_GET['edit'])){
	$PID = $_GET['edit'];
	
	$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		$dbInitiated = $result["Initiated"];
		$dbClassification = $result["Classification"];
		$dbunknown = $result["unknown"];
		$dbIsGAD = $result["IsGAD"];

		$dbYear = $result["Year"];
		$dbQuarter = $result["Quarter"];

		$dbTitle = $result['Title'];
		$dbLocation_Area = $result['Location_Area'];
		$dbStart_Date = $result['Start_Date'];
		$dbEnd_Date = $result['End_Date'];
		$dbStart_Time = $result['Start_Time'];
		$dbEnd_Time = $result['End_Time'];
		$dbTypeCES = $result['TypeCES'];
		$dbSDG = $result['SDG'];
		$dbOffice = $result['Office'];
		$dbPrograms = $result['Programs'];
		$dbPeople = $result['People'];
		$dbAgencies = $result['Agencies'];
		$dbTypeParticipants = $result['TypeParticipants'];
		$dbMale = $result['Male'];
		$dbFemale = $result['Female'];
		$dbCost = $result['Cost'];
		$dbSourceFund = $result['SourceFund'];
		$dbRationale = $result['Rationale'];
		$dbObjectives = $result['Objectives'];
		$dbDescriptions = $result['Descriptions'];
		$dbFPR1_1 = $result['FPR1_1'];
		$dbFPR1_2 = $result['FPR1_2'];
		$dbFPR1_3 = $result['FPR1_3'];
		$dbFPR1_4 = $result['FPR1_4'];
		$dbFPR1_5 = $result['FPR1_5'];
		$dbFPR2_1 = $result['FPR2_1'];
		$dbFPR2_2 = $result['FPR2_2'];
		$dbFPR2_3 = $result['FPR2_3'];
		$dbFPR2_4 = $result['FPR2_4'];
		$dbFPR2_5 = $result['FPR2_5'];
		$dbFPR3_1 = $result['FPR3_1'];
		$dbFPR3_2 = $result['FPR3_2'];
		$dbFPR3_3 = $result['FPR3_3'];
		$dbFPR3_4 = $result['FPR3_4'];
		$dbFPR3_5 = $result['FPR3_5'];
		$dbFPR4_1 = $result['FPR4_1'];
		$dbFPR4_2 = $result['FPR4_2'];
		$dbFPR4_2 = $result['FPR4_2'];
		$dbFPR4_3 = $result['FPR4_3'];
		$dbFPR4_4 = $result['FPR4_4'];
		$dbFPR4_5 = $result['FPR4_5'];
		$dbFPR5_1 = $result['FPR5_1'];
		$dbFPR5_2 = $result['FPR5_2'];
		$dbFPR5_3 = $result['FPR5_3'];
		$dbFPR5_4 = $result['FPR5_4'];
		$dbFPR5_5 = $result['FPR5_5'];
		$dbFPR6_1 = $result['FPR6_1'];
		$dbFPR6_2 = $result['FPR6_2'];
		$dbFPR6_3 = $result['FPR6_3'];
		$dbFPR6_4 = $result['FPR6_4'];
		$dbFPR6_5 = $result['FPR6_5'];
		$dbFPR7_1 = $result['FPR7_1'];
		$dbFPR7_2 = $result['FPR7_2'];
		$dbFPR7_3 = $result['FPR7_3'];
		$dbFPR7_4 = $result['FPR7_4'];
		$dbFPR7_5 = $result['FPR7_5'];
		$dbFPR8_1 = $result['FPR8_1'];
		$dbFPR8_2 = $result['FPR8_2'];
		$dbFPR8_3 = $result['FPR8_3'];
		$dbFPR8_4 = $result['FPR8_4'];
		$dbFPR8_5 = $result['FPR8_5'];
		$dbFPR9_1 = $result['FPR9_1'];
		$dbFPR9_2 = $result['FPR9_2'];
		$dbFPR9_3 = $result['FPR9_3'];
		$dbFPR9_4 = $result['FPR9_4'];
		$dbFPR9_5 = $result['FPR9_5'];
		$dbFPR10_1 = $result['FPR10_1'];
		$dbFPR10_2 = $result['FPR10_2'];
		$dbFPR10_3 = $result['FPR10_3'];
		$dbFPR10_4 = $result['FPR10_4'];
		$dbFPR10_5 = $result['FPR10_5'];
		$dbGrandTotal = $result['GrandTotal'];
		$dbFunctional = $result['Functional'];
		$dbFrequency = $result['Frequency'];
		$dbMonitoring = $result['Monitoring'];
		$dbPlans = $result['Plans'];
		
		$dbSign1_1 = $result['Sign1_1'];
		$dbSign1_2 = $result['Sign1_2'];
		$dbSign2_1 = $result['Sign2_1'];
		$dbSign2_2 = $result['Sign2_2'];
		$dbSign3_1 = $result['Sign3_1'];
		$dbSign3_2 = $result['Sign3_2'];
		$dbSign4_1 = $result['Sign4_1'];
		$dbSign4_2 = $result['Sign4_2'];
		$dbSign5_1 = $result['Sign5_1'];
		$dbSign5_2 = $result['Sign5_2'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Edit Proposal</title>
<link rel="stylesheet" type="text/css" href="styles/Create-proposal.css">

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
				<a class="active" href="Proposal-revision.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Edit Proposal </span>
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
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title">   Evaluation  Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL"><?php echo "$CountEvaluation";?></span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title">  Monitoring  Reports </span>
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

	<form action="" method="post">
			<table class="header">
				<tr class="title">
					<th colspan="3">
						EDIT PROJECT PROPOSAL	
					</th> 
				</tr> 
				<tr>
					<th colspan="4">
						<div class="Drp">
							Type of Proposal: 
							<select name="Initiated" id="Initiated" required>
								<option  value="">Please Select</option>
								<option  value="Client"required>Requested by clients.</option>
								<option  value="Department" required>Departments initiative.</option>
							</select>
						</div>
						<div class="DrpCate">
								Category: 
							<select id="unknown"name="unknown" required>
								<option value="">Please Select</option>
								<option value="Extension PAP">Extension PAP</option>
								<option value="For Monitoring">Monitoring</option>
								<option value="For Impact Assessment">Impact Assessment</option>
							</select>
						</div>
						<div class="DrpGAD">
							GAD PAP: 
							<select id="IsGAD" name="IsGAD" required>
								<option value="">Please Select</option>
								<option value="Yes">YES</option>
								<option value="No">NO</option>
							</select>
						</div>
					</th>
					
				</tr>	
				<tr>
					<th colspan="4">
						<div class="DrpV2">
							Classification: 
							<select id="Classification" name="Classification" required>
								<option value="">Please Select</option>
								<option value="Program">Program</option>
								<option value="Project">Project</option>
								<option value="Activity">Activity</option>
							</select>
						</div>
						<div class="DrpYear">
							Year: 
							<select id="Year" name="Year" required>
								<option value="">Please Select</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
								<option value="2029">2029</option>
								<option value="2030">2030</option>
							</select>
						</div>
						<div class="DrpQrt">
							Quarter: 
							<select id="Quarter" name="Quarter" required>
								<option value="">Please Select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							
						</div>
					</th>
				</tr>
			</table>
				
				
	
	<!--
			<table class="header1">
				<tr  class ="select1">
					<th> <input type="radio" id="Program" name="Classification" value="Program" required> Program</th>
					<th> <input type="radio" id="Project" name="Classification" value="Project" required> Project </th>
					<th> <input type="radio" id="Activity" name="Classification" value="Activity" required> Activity</th>	
				</tr>
				<tr  class ="select2">
					<th> <input type="radio" id="ExtensionPAP" name="unknown" value="ExtensionPAP" required> Extension PAP</th>
					<th> <input type="radio" id="Monitoring" name="unknown" value="Monitoring" required> Monitoring </th>
					<th> <input type="radio" id="Impact" name="unknown" value="Impact" required> Impact Assessment</th>	
				</tr>
				<tr class ="select3">
					<th> Is this Proposal a GAD PAP? </th>
					<th> <input type="radio" id="Yes" name="IsGAD" value="Yes" required> Yes </th>
					<th> <input type="radio" id="No" name="IsGAD" value="No" required> No </th>
				</tr>
			</table>
			-->
			
			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title </label>
						<textarea class="font" placeholder="type Here..." name="Title" required><?php echo $dbTitle; ?></textarea>
						 
						<label> ll. Location </label>
						<textarea placeholder="type here..." name="Location_Area" required><?php echo $dbLocation_Area; ?></textarea> 
						
						<label> lll. Duration </label>
							<table class="Date">	
									
								<tr class="Total">
									<th>Start Date</th>
									<th> End Date </th>
								</tr>	
								<tr class="MF" >
									<td><input type="date" id="Start_Date" name="Start_Date" value="<?php echo $dbStart_Date; ?>" required></td> 
									<td><input type="date" id="End_Date" name="End_Date" value="<?php echo $dbEnd_Date; ?>" required></td> 
								</tr>
								<tr class="Total">
									<th> Start Time</th>
									<th>End Time</th>
								<tr>
								<tr class="MF" >
									<td><input type="time" id="Start_Time" name="Start_Time" value="<?php echo $dbStart_Time; ?>" required></td> 
									<td><input type="time" id="End_Time" name="End_Time" value="<?php echo $dbEnd_Time; ?>" required></td> 
								</tr>
								
						</table>
						 
						<label> lV. Type of Communuty Extension Service </label>
						
						<div class="checkbox" >
							<label onclick="openForm()"> Please Select one or more types..  </label>
						</div>

						<div class="form-popup" id="myForm">
							<label class="check"><span>1. Smart Analytics and Engineering</span>
								<input type="checkbox" id="TypeCES_1" value="Smart Analytics and Engineering" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>2. Environment and Natural Resources Conservation, Protection and Rehabilitation Program</span>
								<input type="checkbox" id="TypeCES_2" value="Environment and Natural Resources Conservation, Protection and Rehabilitation Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>3. Adopt-A-Barangay/Municipality/School/Social Development through BIDANI Implementation</span>
								<input type="checkbox" id="TypeCES_3" value="Adopt-A-Barangay/Municipality/School/Social Development through BIDANI Implementation" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>4. Community Outreach Program</span>
								<input type="checkbox" id="TypeCES_4" value="Community Outreach Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>5. Technical-Vocational Education and Training(TVET)Program on Agri-Fishery and Related Program for Farmers and Fisherfolks</span>
								<input type="checkbox" id="TypeCES_5" value="Technical-Vocational Education and Training(TVET)Program on Agri-Fishery and Related Program for Farmers and Fisherfolks" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>6. Technology Transfer, Utilization and Commercialization Program</span>
								<input type="checkbox" id="TypeCES_6" value="Technology Transfer, Utilization and Commercialization Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>7. Technical Assistance and Advisory Program to Agencies, Organizations, Associations and Other Groups</span>
								<input type="checkbox" id="TypeCES_7" value="Technical Assistance and Advisory Program to Agencies, Organizations, Associations and Other Groups" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>8. Parent's Empowerment through Social Development(PESODEV)Program</span>
								<input type="checkbox" id="TypeCES_8" value="Parent's Empowerment through Social Development(PESODEV)Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>9. Gender and Development</span>
								<input type="checkbox" id="TypeCES_9" value="Gender and Development" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>10. Disaster Preparedness and Response/Climate Change Adaptation</span>
								<input type="checkbox" id="TypeCES_10" value="Disaster Preparedness and Response/Climate Change Adaptation" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>11. BatStateU Inclusive Social Innovation for Regional Growth(BISIG)Program</span>
								<input type="checkbox" id="TypeCES_11" value="BatStateU Inclusive Social Innovation for Regional Growth(BISIG)Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>12. Livelihood and other Entrepreneurship related on Agri-Fisheries(LEAF)</span>
								<input type="checkbox" id="TypeCES_12" value="Livelihood and other Entrepreneurship related on Agri-Fisheries(LEAF)" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<button type="button" class="btncancel" onclick="closeForm()">CLOSE</button>
						</div>
							<textarea placeholder="type here..." id ="TypeCES" name="TypeCES" required><?php echo $dbTypeCES; ?></textarea>
							
						<label>  V. Sustatinable Development Goals (SDG) </label>
							<div class="checkbox1" >
								<label onclick="openForm1()"> Please Select one or more types..  </label>
							</div>
							<div class="form-popup1" id="myForm1">
								<label class="check"><span>1. No poverty</span>
									<input type="checkbox" id="SDG1" value="No poverty" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>2. Zero hunger</span>
									<input type="checkbox" id="SDG2" value="Zero hunger" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>3. Good health and well-being</span>
									<input type="checkbox" id="SDG3" value="Good health and well-being" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>4. Quality education</span>
									<input type="checkbox" id="SDG4" value="Quality education" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>5. Genger equality</span>
									<input type="checkbox" id="SDG5" value="Genger equality" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>6. Clean water and sanitation</span>
									<input type="checkbox" id="SDG6" value="Clean water and sanitation" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>7. Affordableand clean energy</span>
									<input type="checkbox" id="SDG7" value="Affordableand clean energy" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>8. Decent work and economic growth</span>
									<input type="checkbox" id="SDG8" value="Decent work and economic growth" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>9. Industry, innovation and infrastructure</span>
									<input type="checkbox" id="SDG9" value="Industry, innovation and infrastructure" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>10. Reduced inequalities</span>
									<input type="checkbox" id="SDG10" value="Reduced inequalities" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>11. Sustainable cities and communities</span>
									<input type="checkbox" id="SDG11" value="Sustainable cities and communities" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>12. Resonsible comsumption and production</span>
									<input type="checkbox" id="SDG12" value="Resonsible comsumption and production" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>13. Climate action</span>
									<input type="checkbox" id="SDG13" value="Climate action" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>14. Life below water</span>
									<input type="checkbox" id="SDG14" value="Life below water" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<br>
								<label class="check"><span>15. Life on land</span>
									<input type="checkbox" id="SDG15" value="Life on land" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>16. Peace, justice and strong institution</span>
									<input type="checkbox" id="SDG16" value="Peace, justice and strong institution" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>17. Partnership for the goals</span>
									<input type="checkbox" id="SDG17" value="Partnership for the goals" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm1()">CLOSE</button>
							</div>
		
						<textarea placeholder="type here..." name="SDG" id="SDG" required><?php echo $dbSDG; ?></textarea>
						
						<label>  Vl. Office/ College/s Involved </label>
								<h5>(CEAFA, CICS, CIT)</h5>
						<textarea placeholder="type here..." name="Office" required><?php echo $dbOffice; ?></textarea>
						
						<label>  Vll. Program/s Involved<i><h5>(specify the programs under the college implementing the project)</h5></i></label>
						<textarea placeholder="type here..." name="Programs" required><?php echo $dbPrograms; ?></textarea>
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i></label>
						<textarea placeholder="type here..." name="People" required><?php echo $dbPeople; ?></textarea>
						
						<label> lX. Partner Agencies</label>
						<textarea placeholder="type here..." name="Agencies" required><?php echo $dbAgencies; ?></textarea>	
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label> X. Beneficiaries <i><h5>(Type and Number of Male & Female)</h5></i><label>
							<table class="MaleFemale">	
								<tr class="th1">	
									<th colspan="2">
										Types of Participants : <input type ="text" name="TypeParticipants" value="<?php echo $dbTypeParticipants; ?>">
									</th>
								</tr>
								<tr class="th1">
									<th></th>
									<th> <p>Total No. of Male and Female<p> </th>
								</tr>	
								<tr class="MF" >
									<td width="100px" >Male</td>
									<td><input type="number" min="0" name="Male" value="<?php echo $dbMale; ?>"> </td> 
								
								</tr>
								<tr class="MF" >
									<td >Female</td>
									<td><input type="number" min="0" name="Female" value="<?php echo $dbFemale; ?>"> </td> 
								</tr>
						</table>
						
						<label> Xl. Total Cost and Sources of Funds<label>
							<table class="TotalCost">	
										
									<tr class="MF" >
										<th>Total Cost</th>
										<td><input type="number" min="0" name="Cost" value="<?php echo $dbCost; ?>" id="Cost" title="Based from the Financial Plan Grand Total" readonly> </td> 
									
									</tr>
									<tr class="MF1" >
										<th >Source of Fund</th>
										<td><textarea placeholder="type here" name="SourceFund"><?php echo $dbSourceFund; ?></textarea></td> 
									</tr>
							</table>
						
						<label> Xll. Rationale<i><h5>(brief description of the situation)</h5></i><label>
						<textarea placeholder="type here..." name="Rationale" required><?php echo $dbRationale; ?></textarea>
						
						<label> Xlll. Objectives<i><h5>(General and Specific)</h5></i><label>
						<textarea placeholder="type here..." name="Objectives" required><?php echo $dbObjectives; ?></textarea>

						<label> XlV. Description, Strategies and Methods <i><h5>(Activities/Schedule)</h5></i><label>
						<textarea placeholder="type here..." name="Descriptions" required><?php echo $dbDescriptions; ?></textarea>
						<label> XV. Financial Plan</i><label>
						
						<i><h5>(Click the button Form to open the table)</h5></i>
						<div class="bform">
							<a  class="open-button" href="javascript:myBlurFunction(1);">Open Form</a>
						</div>
						<div id="overlay">
							
							<div class="Tfinancial">
								 <table class="financial">
									<tbody>
										<tr>
											<th width="50px";>No.</th>
											<th>Item Description </th>
											<th> Quantity </th>
											<th>Unit </th>
											<th>Unit Cost </th>
											<th>Total</th>
										</tr>
										<tr class="MF">
											<td>1</td>
											<td><textarea placeholder="type here..." name="FPR1_1"></textarea></td>
											<td><input type="number" min="0" name="FPR1_2" id="FPR1_2" onchange="Row1()"></td>
											<td><textarea placeholder="type here..." name="FPR1_3"></textarea></td>
											<td><input type="number" min="0" name="FPR1_4" id="FPR1_4" onchange="Row1()"></td>
											<td><input type="number" min="0" name="FPR1_5" id="FPR1_5" value="0" onchange="Row1()" readonly></td>
										</tr>
										<tr class="MF">
											<td>2</td>
											<td><textarea placeholder="type here..." name="FPR2_1"></textarea></td>
											<td><input type="number" min="0" name="FPR2_2" id="FPR2_2" onchange="Row2()"></td>
											<td><textarea placeholder="type here..." name="FPR2_3"></textarea></td>
											<td><input type="number" min="0" name="FPR2_4" id="FPR2_4" onchange="Row2()"></td>
											<td><input type="number" min="0" name="FPR2_5" id="FPR2_5" value="0" onchange="Row2()" readonly></td>
										</tr>
										<tr class="MF">
											<td>3</td>
											<td><textarea placeholder="type here..." name="FPR3_1"></textarea></td>
											<td><input type="number" min="0" name="FPR3_2" id="FPR3_2" onchange="Row3()"></td>
											<td><textarea placeholder="type here..." name="FPR3_3"></textarea></td>
											<td><input type="number" min="0" name="FPR3_4" id="FPR3_4" onchange="Row3()"></td>
											<td><input type="number" min="0" name="FPR3_5" id="FPR3_5" value="0" onchange="Row3()" readonly></td>
										</tr>
										<tr class="MF">
											<td>4</td>
											<td><textarea placeholder="type here..." name="FPR4_1"></textarea></td>
											<td><input type="number" min="0" name="FPR4_2" id="FPR4_2" onchange="Row4()"></td>
											<td><textarea placeholder="type here..." name="FPR4_3"></textarea></td>
											<td><input type="number" min="0" name="FPR4_4" id="FPR4_4" onchange="Row4()"></td>
											<td><input type="number" min="0" name="FPR4_5" id="FPR4_5" value="0" onchange="Row4()" readonly></td>
										</tr>
										<tr class="MF">
											<td>5</td>
											<td><textarea placeholder="type here..." name="FPR5_1"></textarea></td>
											<td><input type="number" min="0" name="FPR5_2" id="FPR5_2" onchange="Row5()"></td>
											<td><textarea placeholder="type here..." name="FPR5_3"></textarea></td>
											<td><input type="number" min="0" name="FPR5_4" id="FPR5_4" onchange="Row5()"></td>
											<td><input type="number" min="0" name="FPR5_5" id="FPR5_5" value="0" onchange="Row5()" readonly></td>
										</tr>
										<tr class="MF">
											<td>6</td>
											<td><textarea placeholder="type here..." name="FPR6_1"></textarea></td>
											<td><input type="number" min="0" name="FPR6_2" id="FPR6_2" onchange="Row6()"></td>
											<td><textarea placeholder="type here..." name="FPR6_3"></textarea></td>
											<td><input type="number" min="0" name="FPR6_4" id="FPR6_4" onchange="Row6()"></td>
											<td><input type="number" min="0" name="FPR6_5" id="FPR6_5" value="0" onchange="Row6()" readonly></td>
										</tr>
										<tr class="MF">
											<td>7</td>
											<td><textarea placeholder="type here..." name="FPR7_1"></textarea></td>
											<td><input type="number" min="0" name="FPR7_2" id="FPR7_2" onchange="Row7()"></td>
											<td><textarea placeholder="type here..." name="FPR7_3"></textarea></td>
											<td><input type="number" min="0" name="FPR7_4" id="FPR7_4" onchange="Row7()"></td>
											<td><input type="number" min="0" name="FPR7_5" id="FPR7_5" value="0" onchange="Row7()" readonly></td>
										</tr>
										<tr class="MF">
											<td>8</td>
											<td><textarea placeholder="type here..." name="FPR8_1"></textarea></td>
											<td><input type="number" min="0" name="FPR8_2" id="FPR8_2" onchange="Row8()"></td>
											<td><textarea placeholder="type here..." name="FPR8_3"></textarea></td>
											<td><input type="number" min="0" name="FPR8_4" id="FPR8_4" onchange="Row8()"></td>
											<td><input type="number" min="0" name="FPR8_5" id="FPR8_5" value="0" onchange="Row8()" readonly></td>
										</tr>
										<tr class="MF">
											<td>9</td>
											<td><textarea placeholder="type here..." name="FPR9_1"></textarea></td>
											<td><input type="number" min="0" name="FPR9_2" id="FPR9_2" onchange="Row9()"></td>
											<td><textarea placeholder="type here..." name="FPR9_3"></textarea></td>
											<td><input type="number" min="0" name="FPR9_4" id="FPR9_4" onchange="Row9()"></td>
											<td><input type="number" min="0" name="FPR9_5" id="FPR9_5" value="0" onchange="Row9()" readonly></td>
										</tr>
										<tr class="MF">
											<td>10</td>
											<td><textarea placeholder="type here..." name="FPR10_1"></textarea></td>
											<td><input type="number" min="0" name="FPR10_2" id="FPR10_2" onchange="Row10()"></td>
											<td><textarea placeholder="type here..." name="FPR10_3"></textarea></td>
											<td><input type="number" min="0" name="FPR10_4" id="FPR10_4" onchange="Row10()"></td>
											<td><input type="number" min="0" name="FPR10_5" id="FPR10_5" value="0" onchange="Row10()" readonly></td>
										</tr>
										<tr class="MF">
											<td>11</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>12</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>13</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>14</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>15</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>16</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>17</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>18</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>19</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
										<tr class="MF">
											<td>20</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><input type="number" min="0" name="" id="" ></td>
											<td><input type="number" min="0" name="" id="" ></td>
										</tr>
											
										<tr class="MF">
											<th colspan="5"  class="total">Grand Total</th>
											<td><input type="number" name="GrandTotal" id="GrandTotal" readonly></td>
										</tr>
									</tbody>
									<div class="hideleft">
										<a class="hide" href="javascript:myBlurFunction(0);">X</a>
									</div>
								</table>
								
							</div> 
							
						</div> 
						
						
						<label> XVl. Functional Relationships with the partner <i><h5>(Duties/Task of the Partner Agencies)</i></h5></label>
						<textarea placeholder="type here..." name="Functional" required><?php echo $dbFunctional; ?></textarea>
						
						<label> XVll. Monitoring and Evaluation Mechanics/Plan</label>
							<div class="select4">
							<table>
								<tr>
									<th><input type="radio" id="Monthly" name="Frequency" value="Monthly">Monthly </th>
									<th><input type="radio" id="Quarterly" name="Frequency" value="Quarterly"> Quarterly</th>
									<th><input type="radio" id='Semi-Annually' name="Frequency" value="Semi-Annually">Semi-Annually</th>
									<th><input type="radio" id="Yearly" name="Frequency" value="Yearly">Yearly </th>
								</tr>
							</table>
						</div>
						<textarea placeholder="type here..." name="Monitoring" required><?php echo $dbMonitoring; ?></textarea>
			
						<label> XVlll. Sustainability Plan<label><i><h5> (Click the button Form to open the table)</h5></i>
						<div class="bform">
							<a  class="open-button" href="javascript:myBlurFunction1(1);">Open Form</a>
						</div>
						<div id="overlay2nd">
							
							<div class="Tfinancial">
								 <table class="financial">
									<tbody>
										<tr>
											<th width="50px";>No. </th>
											<th>ACTIVITIES </th>
											<th>TENTATIVE SCHEDULE </th>
											<th>INVOLVED </th>
											
										</tr>
										<tr class="MF">
											<td>1</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>2</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>3</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>4</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>5</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>6</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>7</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>8</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>9</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>10</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>11</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>12</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>13</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>14</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>15</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>16</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>17</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>18</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>19</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
										<tr class="MF">
											<td>20</td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
											<td><textarea placeholder="type here..." name=""></textarea></td>
										</tr>
											
										
									</tbody>
									<div class="hide2nd">
										<a class="hide" href="javascript:myBlurFunction1(0);">X</a>
									</div>
								</table>
								
							</div> 
							
						</div> 
							<textarea placeholder="type here..." name="" required></textarea>
						
				  </div>
				</div>
			</div>
			
			<table class="signiture">
				<tr>
					<th></th>
					<th width="40%";> Name </th>
					<th width="40%";> Designation </th>
				</tr>
				<tr>
					<td> Prepared by:</td>
					<td> <textarea placeholder="..." name="Sign1_1" required><?php echo strtoupper($dbSign1_1);?></textarea></td>
					<td> <textarea placeholder="..." name="Sign1_2" required><?php echo $dbSign1_2;?></textarea></td>
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
							<span onclick="ReviewedByName()" > ✓ </span>
						</div>
						<br>
					
						<textarea placeholder="..." id="Sign2_1" name="Sign2_1" required><?php echo "$dbSign2_1";?></textarea>
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
						<textarea placeholder="..." id="Sign2_2" name="Sign2_2" required><?php echo "$dbSign2_2";?></textarea>
					</td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval1Name">
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
						<span onclick="RecommendingApproval1Name()"> ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign3_1"name="Sign3_1" required><?php echo "$dbSign3_1";?></textarea>
					</td>
					
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval1Designation">
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
							<span onclick="RecommendingApproval1Designation()"> ✓ </span>
						</div>
						<br>
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required><?php echo "$dbSign3_2";?></textarea>
					</td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval2Name">
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
						<span onclick="RecommendingApproval2Name()">  ✓ </span>
					</div>
					<br>					
						<textarea placeholder="..." id="Sign4_1" name="Sign4_1" required><?php echo "$dbSign4_1";?></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval2Designation">
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
						<span onclick="RecommendingApproval2Designation()">  ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign4_2" name="Sign4_2" required><?php echo "$dbSign4_2";?></textarea>
					</td>
				</tr>
				<tr>
					<td>Approved by:</td>
					<td>
					<div class="DrpSigna">
						<select id="ApprovedByName">
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
							<span onclick="ApprovedByName()">  ✓ </span>
						</div>
						<br>
						<textarea placeholder="..." id="Sign5_1" name="Sign5_1" required><?php echo "$dbSign5_1";?></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="ApprovedByDesignation">
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
						<span onclick="ApprovedByDesignation()"> ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign5_2" name="Sign5_2" required><?php echo "$dbSign5_2";?></textarea>
					</td>
				</tr>
			</table>
			<div class="buttonBACK">
				<a href="Proposal-revision.php" class="btnB"> Back </a></button>
			</div>
			<div class="buttonU">
				<input type="submit" class="btn" name="update" value="Update">

			</div>
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

<?php

if (isset($_POST['update'])) {

	$Initiated = $_POST["Initiated"];
	$Classification = $_POST["Classification"];
	$unknown = $_POST["unknown"];
	$IsGAD = $_POST["IsGAD"];

	$Year = $_POST["Year"];
	$Quarter = $_POST["Quarter"];

	$Title = htmlspecialchars($_POST['Title']);
	$Location_Area = htmlspecialchars($_POST['Location_Area']);
	$Start_Date = htmlspecialchars($_POST['Start_Date']);
	$End_Date = htmlspecialchars($_POST['End_Date']);
	$Start_Time = htmlspecialchars($_POST['Start_Time']);
	$End_Time = htmlspecialchars($_POST['End_Time']);
	$TypeCES = htmlspecialchars($_POST['TypeCES']);
	$SDG = htmlspecialchars($_POST['SDG']);
	$Office = htmlspecialchars($_POST['Office']);
	$Programs = htmlspecialchars($_POST['Programs']);
	$People = htmlspecialchars($_POST['People']);
	$Agencies = htmlspecialchars($_POST['Agencies']);
	$TypeParticipants = htmlspecialchars($_POST['TypeParticipants']);
	$Male = htmlspecialchars($_POST['Male']);
	$Female = htmlspecialchars($_POST['Female']);
	$Cost = htmlspecialchars($_POST['Cost']);
	$SourceFund = htmlspecialchars($_POST['SourceFund']);
	$Rationale = htmlspecialchars($_POST['Rationale']);
	$Objectives = htmlspecialchars($_POST['Objectives']);
	$Descriptions = htmlspecialchars($_POST['Descriptions']);
	$FPR1_1 = htmlspecialchars($_POST['FPR1_1']);
	$FPR1_2 = htmlspecialchars($_POST['FPR1_2']);
	$FPR1_3 = htmlspecialchars($_POST['FPR1_3']);
	$FPR1_4 = htmlspecialchars($_POST['FPR1_4']);
	$FPR1_5 = htmlspecialchars($_POST['FPR1_5']);
	$FPR2_1 = htmlspecialchars($_POST['FPR2_1']);
	$FPR2_2 = htmlspecialchars($_POST['FPR2_2']);
	$FPR2_3 = htmlspecialchars($_POST['FPR2_3']);
	$FPR2_4 = htmlspecialchars($_POST['FPR2_4']);
	$FPR2_5 = htmlspecialchars($_POST['FPR2_5']);
	$FPR3_1 = htmlspecialchars($_POST['FPR3_1']);
	$FPR3_2 = htmlspecialchars($_POST['FPR3_2']);
	$FPR3_3 = htmlspecialchars($_POST['FPR3_3']);
	$FPR3_4 = htmlspecialchars($_POST['FPR3_4']);
	$FPR3_5 = htmlspecialchars($_POST['FPR3_5']);
	$FPR4_1 = htmlspecialchars($_POST['FPR4_1']);
	$FPR4_2 = htmlspecialchars($_POST['FPR4_2']);
	$FPR4_2 = htmlspecialchars($_POST['FPR4_2']);
	$FPR4_3 = htmlspecialchars($_POST['FPR4_3']);
	$FPR4_4 = htmlspecialchars($_POST['FPR4_4']);
	$FPR4_5 = htmlspecialchars($_POST['FPR4_5']);
	$FPR5_1 = htmlspecialchars($_POST['FPR5_1']);
	$FPR5_2 = htmlspecialchars($_POST['FPR5_2']);
	$FPR5_3 = htmlspecialchars($_POST['FPR5_3']);
	$FPR5_4 = htmlspecialchars($_POST['FPR5_4']);
	$FPR5_5 = htmlspecialchars($_POST['FPR5_5']);
	$FPR6_1 = htmlspecialchars($_POST['FPR6_1']);
	$FPR6_2 = htmlspecialchars($_POST['FPR6_2']);
	$FPR6_3 = htmlspecialchars($_POST['FPR6_3']);
	$FPR6_4 = htmlspecialchars($_POST['FPR6_4']);
	$FPR6_5 = htmlspecialchars($_POST['FPR6_5']);
	$FPR7_1 = htmlspecialchars($_POST['FPR7_1']);
	$FPR7_2 = htmlspecialchars($_POST['FPR7_2']);
	$FPR7_3 = htmlspecialchars($_POST['FPR7_3']);
	$FPR7_4 = htmlspecialchars($_POST['FPR7_4']);
	$FPR7_5 = htmlspecialchars($_POST['FPR7_5']);
	$FPR8_1 = htmlspecialchars($_POST['FPR8_1']);
	$FPR8_2 = htmlspecialchars($_POST['FPR8_2']);
	$FPR8_3 = htmlspecialchars($_POST['FPR8_3']);
	$FPR8_4 = htmlspecialchars($_POST['FPR8_4']);
	$FPR8_5 = htmlspecialchars($_POST['FPR8_5']);
	$FPR9_1 = htmlspecialchars($_POST['FPR9_1']);
	$FPR9_2 = htmlspecialchars($_POST['FPR9_2']);
	$FPR9_3 = htmlspecialchars($_POST['FPR9_3']);
	$FPR9_4 = htmlspecialchars($_POST['FPR9_4']);
	$FPR9_5 = htmlspecialchars($_POST['FPR9_5']);
	$FPR10_1 = htmlspecialchars($_POST['FPR10_1']);
	$FPR10_2 = htmlspecialchars($_POST['FPR10_2']);
	$FPR10_3 = htmlspecialchars($_POST['FPR10_3']);
	$FPR10_4 = htmlspecialchars($_POST['FPR10_4']);
	$FPR10_5 = htmlspecialchars($_POST['FPR10_5']);
	$GrandTotal = htmlspecialchars($_POST['GrandTotal']);
	$Functional = htmlspecialchars($_POST['Functional']);
	$Frequency = htmlspecialchars($_POST['Frequency']);
	$Monitoring = htmlspecialchars($_POST['Monitoring']);
	$Plans = htmlspecialchars($_POST['Plans']);
	
	//ProjectStatus (Pending, Need to Revise, Approved, Rejected)
	//Remarks (Evaluated)

	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']); $Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']); $Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']); $Sign3_2 = htmlspecialchars($_POST['Sign3_2']);
	$Sign4_1 = htmlspecialchars($_POST['Sign4_1']); $Sign4_2 = htmlspecialchars($_POST['Sign4_2']);
	$Sign5_1 = htmlspecialchars($_POST['Sign5_1']); $Sign5_2 = htmlspecialchars($_POST['Sign5_2']);

	$sql = ("UPDATE create_alangilan
			SET Year = '$Year', Quarter = '$Quarter', Initiated = '$Initiated', Classification = '$Classification', unknown = '$unknown', IsGAD = '$IsGAD',
				Title = '$Title', Location_Area = '$Location_Area', 
				Start_Date = '$Start_Date', End_Date = '$End_Date', Start_Time = '$Start_Time', End_Time = '$End_Time',
				TypeCES = '$TypeCES', SDG = '$SDG', Office = '$Office', Programs = '$Programs', People = '$People', 
				Agencies = '$Agencies', TypeParticipants = '$TypeParticipants', Male = '$Male', Female = '$Female',
				Cost = '$Cost', SourceFund = '$SourceFund', Rationale = '$Rationale', Objectives = '$Objectives', Descriptions = '$Descriptions', 
				FPR1_1 = '$FPR1_1', FPR1_2 = '$FPR1_2', FPR1_3 = '$FPR1_3', FPR1_4 = '$FPR1_4', FPR1_5 = '$FPR1_5',
				FPR2_1 = '$FPR2_1', FPR2_2 = '$FPR2_2', FPR2_3 = '$FPR2_3', FPR2_4 = '$FPR2_4', FPR2_5 = '$FPR2_5',
				FPR3_1 = '$FPR3_1', FPR3_2 = '$FPR3_2', FPR3_3 = '$FPR3_3', FPR3_4 = '$FPR3_4', FPR3_5 = '$FPR3_5',
				FPR4_1 = '$FPR4_1', FPR4_2 = '$FPR4_2', FPR4_3 = '$FPR4_3', FPR4_4 = '$FPR4_4', FPR4_5 = '$FPR4_5',
				FPR5_1 = '$FPR5_1', FPR5_2 = '$FPR5_2', FPR5_3 = '$FPR5_3', FPR5_4 = '$FPR5_4', FPR5_5 = '$FPR5_5',
				FPR6_1 = '$FPR6_1', FPR6_2 = '$FPR6_2', FPR6_3 = '$FPR6_3', FPR6_4 = '$FPR6_4', FPR6_5 = '$FPR6_5',
				FPR7_1 = '$FPR7_1', FPR7_2 = '$FPR7_2', FPR7_3 = '$FPR7_3', FPR7_4 = '$FPR7_4', FPR7_5 = '$FPR7_5',
				FPR8_1 = '$FPR8_1', FPR8_2 = '$FPR8_2', FPR8_3 = '$FPR8_3', FPR8_4 = '$FPR8_4', FPR8_5 = '$FPR8_5',
				FPR9_1 = '$FPR9_1', FPR9_2 = '$FPR9_2', FPR9_3 = '$FPR9_3', FPR9_4 = '$FPR9_4', FPR9_5 = '$FPR9_5',
				FPR10_1 = '$FPR10_1', FPR10_2 = '$FPR10_2', FPR10_3 = '$FPR10_3', FPR10_4 = '$FPR10_4', FPR10_5 = '$FPR10_5', GrandTotal = '$GrandTotal',
				Functional = '$Functional', Frequency = '$Frequency', Monitoring = '$Monitoring', Plans = '$Plans',
				Sign1_1 = '$Sign1_1', Sign1_2 = '$Sign1_2', Sign2_1 = '$Sign2_1', Sign2_2 = '$Sign2_2', 
				Sign3_1 = '$Sign3_1', Sign3_2 = '$Sign3_2', Sign4_1 = '$Sign4_1', Sign4_2 = '$Sign4_2', 
				Sign5_1 = '$Sign5_1', Sign5_2 = '$Sign5_2'
			WHERE ProposalID = $PID");

		if ($command = $con->query($sql) === TRUE) {
			echo "<script>
				alert('Proposal Successfully Updated');
				window.location='EditProposal.php?edit=$PID';
			</script>";
		  } else {
			echo "<script>
					alert('PROCESS FAILED. Try Again!');
					window.location='EditProposal.php?edit=$PID';
				</script>";
		  }	
}
?>
<script>
//For Form TypeCES and SDG
	function openForm()  { document.getElementById("myForm").style.display = "block"; }
	function closeForm() { document.getElementById("myForm").style.display = "none"; }
		
	function openForm1()  { document.getElementById("myForm1").style.display = "block"; }
	function closeForm1() { document.getElementById("myForm1").style.display = "none"; }
</script>

<?php
 if ($dbInitiated == "Department"){
	echo "<script>document.getElementById('Initiated').value = 'Department'; </script>";
 } else if ($dbInitiated == "Client"){
	echo "<script>document.getElementById('Initiated').value = 'Client'; </script>";
 }

 if ($dbClassification == "Program"){
	echo "<script>document.getElementById('Classification').value = 'Program'; </script>";
 } else if ($dbClassification == "Project"){
	echo "<script>document.getElementById('Classification').value = 'Project'; </script>";
 }else if ($dbClassification == "Activity"){
	echo "<script>document.getElementById('Classification').value = 'Activity'; </script>";
 }

 if ($dbunknown == "Extension PAP"){
	echo "<script>document.getElementById('unknown').value = 'Extension PAP'; </script>";
 } else if ($dbunknown == "For Monitoring"){
	echo "<script>document.getElementById('unknown').value = 'For Monitoring'; </script>";
 }else if ($dbunknown == "For Impact Assessment"){
	echo "<script>document.getElementById('unknown').value = 'For Impact Assessment'; </script>";
 }

 if ($dbIsGAD == "Yes"){
	echo "<script>document.getElementById('IsGAD').value = 'Yes'; </script>";
 } else if ($dbIsGAD == "No"){
	echo "<script>document.getElementById('IsGAD').value = 'No'; </script>";
 }

 if ($dbFrequency == "Monthly"){
	echo "<script>document.getElementById('Monthly').checked = true; </script>";
 } else if ($dbFrequency == "Quarterly"){
	echo "<script>document.getElementById('Quarterly').checked = true; </script>";
 }else if ($dbFrequency == "Semi-Annually"){
	echo "<script>document.getElementById('Semi-Annually').checked = true; </script>";
 }else if ($dbFrequency == "Yearly"){
	echo "<script>document.getElementById('Yearly').checked = true; </script>";
 }

 if ($dbQuarter == "1"){
	echo "<script>document.getElementById('Quarter').value = '1'; </script>";
 } else if ($dbQuarter == "2"){
	echo "<script>document.getElementById('Quarter').value = '2'; </script>";
 } else if ($dbQuarter == "3"){
	echo "<script>document.getElementById('Quarter').value = '3'; </script>";
 } else if ($dbQuarter == "4"){
	echo "<script>document.getElementById('Quarter').value = '4'; </script>";
 }
//For Year
 echo "<script>document.getElementById('Year').value = '$dbYear'; </script>";
?>

<script>
//For Auto Compute
function Row1(){
	let a = document.getElementById('FPR1_2').value;
	let b = document.getElementById('FPR1_4').value;
	let ans = a * b;
	document.getElementById("FPR1_5").value = ans;
	
	GrandTotal()
}

function Row2(){
	let a = document.getElementById('FPR2_2').value;
	let b = document.getElementById('FPR2_4').value;
	let ans = a * b;
	document.getElementById("FPR2_5").value = ans;

	GrandTotal()
}

function Row3(){ 
	let a = document.getElementById('FPR3_2').value;
	let b = document.getElementById('FPR3_4').value;
	let ans = a * b;
	document.getElementById("FPR3_5").value = ans;

	GrandTotal()
}

function Row4(){ 
	let a = document.getElementById('FPR4_2').value;
	let b = document.getElementById('FPR4_4').value;
	let ans = a * b;
	document.getElementById("FPR4_5").value = ans;

	GrandTotal()
}

function Row5(){ 
	let a = document.getElementById('FPR5_2').value;
	let b = document.getElementById('FPR5_4').value;
	let ans = a * b;
	document.getElementById("FPR5_5").value = ans;

	GrandTotal()
}

function Row6(){ 
	let a = document.getElementById('FPR6_2').value;
	let b = document.getElementById('FPR6_4').value;
	let ans = a * b;
	document.getElementById("FPR6_5").value = ans;

	GrandTotal()
}

function Row7(){ 
	let a = document.getElementById('FPR7_2').value;
	let b = document.getElementById('FPR7_4').value;
	let ans = a * b;
	document.getElementById("FPR7_5").value = ans;

	GrandTotal()
}

function Row8(){ 
	let a = document.getElementById('FPR8_2').value;
	let b = document.getElementById('FPR8_4').value;
	let ans = a * b;
	document.getElementById("FPR8_5").value = ans;

	GrandTotal()
}

function Row9(){ 
	let a = document.getElementById('FPR9_2').value;
	let b = document.getElementById('FPR9_4').value;
	let ans = a * b;
	document.getElementById("FPR9_5").value = ans;

	GrandTotal()
}

function Row10(){
	let a = document.getElementById('FPR10_2').value;
	let b = document.getElementById('FPR10_4').value;
	let ans = a * b;
	document.getElementById("FPR10_5").value = ans;

	GrandTotal()
}
function GrandTotal(){ 
	let r1 = document.getElementById('FPR1_5').value;
	let r2 = document.getElementById('FPR2_5').value;
	let r3 = document.getElementById('FPR3_5').value;
	let r4 = document.getElementById('FPR4_5').value;
	let r5 = document.getElementById('FPR5_5').value;
	let r6 = document.getElementById('FPR6_5').value;
	let r7 = document.getElementById('FPR7_5').value;
	let r8 = document.getElementById('FPR8_5').value;
	let r9 = document.getElementById('FPR9_5').value;
	let r10 = document.getElementById('FPR10_5').value;
	let anss = (parseFloat(r1)) + (parseFloat(r2)) + (parseFloat(r3)) + (parseFloat(r4)) + (parseFloat(r5)) + (parseFloat(r6)) + (parseFloat(r7)) + (parseFloat(r8)) + (parseFloat(r9)) + (parseFloat(r10));
	document.getElementById("GrandTotal").value = anss;
	document.getElementById("Cost").value = anss;
}

</script>


<script>
//For financial Plan
myBlurFunction = function(state) {
    /* state can be 1 or 0 */
    var containerElement = document.getElementById('main_container');
    var overlayEle = document.getElementById('overlay');

    if (state) {
        overlayEle.style.display = 'block';
        containerElement.setAttribute('class', 'blur');
    } else {
        overlayEle.style.display = 'none';
        containerElement.setAttribute('class', null);
    }
};

</script>
<script>
//For Sustainability Plan
myBlurFunction1 = function(state) {
    /* state can be 1 or 0 */
    var containerElement = document.getElementById('main_container');
    var overlay2ndEle = document.getElementById('overlay2nd');

    if (state) {
        overlay2ndEle.style.display = 'block';
        containerElement.setAttribute('class', 'blur');
    } else {
        overlay2ndEle.style.display = 'none';
        containerElement.setAttribute('class', null);
    }
};

</script>















<script>
//For Type CES & SDG
function SelectTypeCES(){
	var checkboxes = document.getElementsByName('CES');
	var result = "";
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
					result += checkboxes[i].value + " " + "\n";
                }
            }
			document.getElementById("TypeCES").value = result ;
}

function SelectSDG(){
	var checkboxes = document.getElementsByName('ChkSDG');
	var result = "";
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
					result += checkboxes[i].value + " " + "\n";
                }
            }
			document.getElementById("SDG").value = result ;
}
</script>

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

function RecommendingApproval1Name(){
	var x = document.getElementById("RecommendingApproval1Name").value;
	document.getElementById("Sign3_1").value = x;
}
function RecommendingApproval1Designation(){
	var x = document.getElementById("RecommendingApproval1Designation").value;
	document.getElementById("Sign3_2").value = x;
}

function RecommendingApproval2Name(){
	var x = document.getElementById("RecommendingApproval2Name").value;
	document.getElementById("Sign4_1").value = x;
}
function RecommendingApproval2Designation(){
	var x = document.getElementById("RecommendingApproval2Designation").value;
	document.getElementById("Sign4_2").value = x;
}

function ApprovedByName(){
	var x = document.getElementById("ApprovedByName").value;
	document.getElementById("Sign5_1").value = x;
}
function ApprovedByDesignation(){
	var x = document.getElementById("ApprovedByDesignation").value;
	document.getElementById("Sign5_2").value = x;
}
</script>

<?php include("RestrictNotif.php"); ?>