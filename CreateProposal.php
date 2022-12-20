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

$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];
$College = $_SESSION["College"];


//Account Restrictions
if (($Position == "Head") OR ($Position == "Coordinator")) {
	//Code Continue
}else {
	echo "<center> <br>";
	echo "<h1> Access Denied! <br>";
	echo "Staffs are not allowed to Create Proposal. </h1>";
	echo "<h2> <a href='Dashboard.php'> RETURN </a> </h2>";
	die();
}

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Create Proposal</title>
<link rel="stylesheet" type="text/css" href="styles/Create-proposal.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a href="Dashboard.php">
					<span class ="icon"> <ion-icon name="home-outline"></ion-icon> </span>
					<span class ="title"> Home</span>
				</a>
			</li>
			<li>
				<a class="active" href="CreateProposal.php">
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
				<a href="Evaluation.php">
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

	<form method="post">
			<table class="header">
				<tr class="title">
					<th colspan="3">
						EXTENSION PROGRAM PLAN / PROPOSAL	
					</th> 
				</tr>
				<tr>
					<th colspan="3">
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
							<select id="unknown" name="unknown" onchange="MonitoringFrequency()" required>
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
					<tr>
					<th colspan="2">
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
								<option value="<?php echo "$CustomYear";?>" selected><?php echo "$CustomYear";?></option>
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
								<option value="<?php echo "$CustomQuarter";?>" selected><?php echo "$CustomQuarter";?></option>
							</select>
							
						</div>
					</th>
						
					</tr>
				
			</table>

			<div class="Create">
				<div class="fillup">
				  <div class="input-field">
						<label> l. Title <label>
						<textarea class="font" placeholder="type here..." name="Title" required></textarea>
						 
						<label> ll. Location <label>
						<textarea placeholder="type here..." name="Location_Area" required></textarea> 
						
						<label> lll. Duration <label>
								<table class="Date">	
									
								<tr class="Total">
									<th>Start Date</th>
									<th> End Date </th>
								</tr>	
								<tr class="MF" >
									<td><input type="date" id="Start_Date" name="Start_Date" required></td> 
									<td><input type="date" id="End_Date" name="End_Date" required></td> 
								</tr>
								<tr class="Total">
									<th> Start Time</th>
									<th>End Time</th>
								<tr>
								<tr class="MF" >
									<td><input type="time" id="Start_Time" name="Start_Time" required></td> 
									<td><input type="time" id="End_Time" name="End_Time" required></td> 
								</tr>
						</table>
					
						<label><b>lV. Type of Community Extension Service</b></label>
						
						<div class="checkbox">
							<label onclick="openForm()"> Please Select one or more types </label>
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
							<label class="check"><span>5. Technical-Vocational Education and Training(TVET) Program on Agri-Fishery and Related Program for Farmers and Fisherfolks</span>
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
							<label class="check"><span>8. Parent's Empowerment through Social Development(PESODEV) Program</span>
								<input type="checkbox" id="TypeCES_8" value="Parent's Empowerment through Social Development (PESODEV)Program" name="CES" onclick="SelectTypeCES()">
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
							<label class="check"><span>11. BatStateU Inclusive Social Innovation for Regional Growth(BISIG) Program</span>
								<input type="checkbox" id="TypeCES_11" value="BatStateU Inclusive Social Innovation for Regional Growth(BISIG)Program" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<label class="check"><span>12. Livelihood and other Entrepreneurship related on Agri-Fisheries(LEAF)</span>
								<input type="checkbox" id="TypeCES_12" value="Livelihood and other Entrepreneurship related on Agri-Fisheries(LEAF)" name="CES" onclick="SelectTypeCES()">
								<span class="checkmark"></span>
							</label>
							<button type="button" class="btncancel" onclick="closeForm()">CLOSE</button>
						</div>
							<textarea placeholder="..." id="TypeCES" name="TypeCES" required></textarea>
							
							
						<label><b>V. Sustainable Development Goals (SDG)</b></label>
							<!-- -->
							<div class="checkbox1" >
								<label onclick="openForm1()"> Please Select one or more types  </label>
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
								<label class="check"><span>5. Gender equality</span>
									<input type="checkbox" id="SDG5" value="Gender equality" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>6. Clean water and sanitation</span>
									<input type="checkbox" id="SDG6" value="Clean water and sanitation" name="ChkSDG" onclick="SelectSDG()">
									<span class="checkmark"></span>
								</label>
								<label class="check"><span>7. Affordable and clean energy</span>
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
								<label class="check"><span>12. Responsible consumption and production</span>
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
							
						<textarea placeholder="..." name="SDG" ID="SDG" required></textarea>
				
						<label>  Vl. Office/ College/s Involved <label>
							<h5>(CEAFA, CICS, CIT)</h5>
						<textarea placeholder="type here..." name="Office" required><?php echo "$College";?></textarea>
						
						<label>  Vll. Program/s Involved<i><h5>(specify the programs under the college implementing the project)</h5></i><label>
						<textarea placeholder="type here..." name="Programs" required></textarea>
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i><label>
						<textarea placeholder="type here..." name="People" required></textarea>
						
						<label> lX. Partner Agencies<label>
						<textarea placeholder="type here..." name="Agencies" required></textarea>	
						
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label> X. Beneficiaries <i><h5>(Type and Number of Male & Female)</h5></i><label>
						<table class="MaleFemale">	
								<tr class="th1">	
									<th colspan="2">
										Types of Participants : <input type ="text" name="TypeParticipants">
									</th>
								</tr>
								<tr class="th1">
									<th></th>
									<th> <p>Total No. of Male and Female<p> </th>
								</tr>	
								<tr class="MF" >
									<td width="100px" >Male</td>
									<td><input type="number" min="0" name="Male"> </input></td> 
								
								</tr>
								<tr class="MF" >
									<td >Female</td>
									<td><input type="number" min="0" name="Female"> </input></td> 
								</tr>
						</table>
						
						<label> Xl. Total Cost and Sources of Funds<label>
						<table class="TotalCost">	
									
								<tr class="MF" >
									<th>Total Cost</th> <br>
									<i><h5>*auto generated based from the computed Financial Plan</h5> </i>
									<td>
										<input type="number" min="0" name="Cost" id="Cost" title="Based from the Financial Plan Grand Total" readonly> 
										
									</td> 
								
								</tr>
								<tr class="MF1" >
									<th >Source of Fund</th>
									<td><textarea placeholder="type here" name="SourceFund"></textarea></input></td> 
								</tr>
						</table>
						
						<label> Xll. Rationale<i><h5>(brief description of the situation)</h5></i><label>
						<textarea placeholder="type here..." name="Rationale" required></textarea>
						
						<label> Xlll. Objectives<i><h5>(General and Specific)</h5></i><label>
						<textarea placeholder="type here..." name="Objectives" required></textarea>

						<label> XlV. Description, Strategies and Methods <i><h5>(Activities/Schedule)</h5></i><label>
						<textarea placeholder="type here..." name="Descriptions" required></textarea>
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
											<td><textarea placeholder="type here..." name="FPR11_1"></textarea></td>
											<td><input type="number" min="0" name="FPR11_2" id="FPR11_2" onchange="Row11()"></td>
											<td><textarea placeholder="type here..." name="FPR11_3"></textarea></td>
											<td><input type="number" min="0" name="FPR11_4" id="FPR11_4" onchange="Row11()"></td>
											<td><input type="number" min="0" name="FPR11_5" id="FPR11_5" value="0" onchange="Row11()" readonly></td>
										</tr>
										<tr class="MF">
											<td>12</td>
											<td><textarea placeholder="type here..." name="FPR12_1"></textarea></td>
											<td><input type="number" min="0" name="FPR12_2" id="FPR12_2" onchange="Row12()"></td>
											<td><textarea placeholder="type here..." name="FPR12_3"></textarea></td>
											<td><input type="number" min="0" name="FPR12_4" id="FPR12_4" onchange="Row12()"></td>
											<td><input type="number" min="0" name="FPR12_5" id="FPR12_5" value="0" onchange="Row12()" readonly></td>
										</tr>
										<tr class="MF">
											<td>13</td>
											<td><textarea placeholder="type here..." name="FPR13_1"></textarea></td>
											<td><input type="number" min="0" name="FPR13_2" id="FPR13_2" onchange="Row13()"></td>
											<td><textarea placeholder="type here..." name="FPR13_3"></textarea></td>
											<td><input type="number" min="0" name="FPR13_4" id="FPR13_4" onchange="Row13()"></td>
											<td><input type="number" min="0" name="FPR13_5" id="FPR13_5" value="0" onchange="Row13()" readonly></td>
										</tr>
										<tr class="MF">
											<td>14</td>
											<td><textarea placeholder="type here..." name="FPR14_1"></textarea></td>
											<td><input type="number" min="0" name="FPR14_2" id="FPR14_2" onchange="Row14()"></td>
											<td><textarea placeholder="type here..." name="FPR14_3"></textarea></td>
											<td><input type="number" min="0" name="FPR14_4" id="FPR14_4" onchange="Row14()"></td>
											<td><input type="number" min="0" name="FPR14_5" id="FPR14_5" value="0" onchange="Row14()" readonly></td>
										</tr>
										<tr class="MF">
											<td>15</td>
											<td><textarea placeholder="type here..." name="FPR15_1"></textarea></td>
											<td><input type="number" min="0" name="FPR15_2" id="FPR15_2" onchange="Row15()"></td>
											<td><textarea placeholder="type here..." name="FPR15_3"></textarea></td>
											<td><input type="number" min="0" name="FPR15_4" id="FPR15_4" onchange="Row15()"></td>
											<td><input type="number" min="0" name="FPR15_5" id="FPR15_5" value="0" onchange="Row15()" readonly></td>
										</tr>
										<tr class="MF">
											<td>16</td>
											<td><textarea placeholder="type here..." name="FPR16_1"></textarea></td>
											<td><input type="number" min="0" name="FPR16_2" id="FPR16_2" onchange="Row16()"></td>
											<td><textarea placeholder="type here..." name="FPR16_3"></textarea></td>
											<td><input type="number" min="0" name="FPR16_4" id="FPR16_4" onchange="Row16()"></td>
											<td><input type="number" min="0" name="FPR16_5" id="FPR16_5" value="0" onchange="Row16()" readonly></td>
										</tr>
										<tr class="MF">
											<td>17</td>
											<td><textarea placeholder="type here..." name="FPR17_1"></textarea></td>
											<td><input type="number" min="0" name="FPR17_2" id="FPR17_2" onchange="Row17()"></td>
											<td><textarea placeholder="type here..." name="FPR17_3"></textarea></td>
											<td><input type="number" min="0" name="FPR17_4" id="FPR17_4" onchange="Row17()"></td>
											<td><input type="number" min="0" name="FPR17_5" id="FPR17_5" value="0" onchange="Row17()" readonly></td>
										</tr>
										<tr class="MF">
											<td>18</td>
											<td><textarea placeholder="type here..." name="FPR18_1"></textarea></td>
											<td><input type="number" min="0" name="FPR18_2" id="FPR18_2" onchange="Row18()"></td>
											<td><textarea placeholder="type here..." name="FPR18_3"></textarea></td>
											<td><input type="number" min="0" name="FPR18_4" id="FPR18_4" onchange="Row18()"></td>
											<td><input type="number" min="0" name="FPR18_5" id="FPR18_5" value="0" onchange="Row18()" readonly></td>
										</tr>
										<tr class="MF">
											<td>19</td>
											<td><textarea placeholder="type here..." name="FPR19_1"></textarea></td>
											<td><input type="number" min="0" name="FPR19_2" id="FPR19_2" onchange="Row19()"></td>
											<td><textarea placeholder="type here..." name="FPR19_3"></textarea></td>
											<td><input type="number" min="0" name="FPR19_4" id="FPR19_4" onchange="Row19()"></td>
											<td><input type="number" min="0" name="FPR19_5" id="FPR19_5" value="0" onchange="Row19()" readonly></td>
										</tr>
										<tr class="MF">
											<td>20</td>
											<td><textarea placeholder="type here..." name="FPR20_1"></textarea></td>
											<td><input type="number" min="0" name="FPR20_2" id="FPR20_2" onchange="Row20()"></td>
											<td><textarea placeholder="type here..." name="FPR20_3"></textarea></td>
											<td><input type="number" min="0" name="FPR20_4" id="FPR20_4" onchange="Row20()"></td>
											<td><input type="number" min="0" name="FPR20_5" id="FPR20_5" value="0" onchange="Row20()" readonly></td>
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
						
						<label> XVl. Functional Relationships with the Partner <i><h5>(Duties/Task of the Partner Agencies)</h5></i><label>
						<textarea placeholder="type here..." name="Functional" required></textarea>
						
						<label> XVll. Monitoring and Evaluation Mechanics/Plan<label>
						<div class="select4">
							<table>
								<tr>
									<th><input type="radio" name="Frequency" id="Monthly" value="Monthly">Monthly </th>
									<th><input type="radio" name="Frequency" id="Quarterly" value="Quarterly"> Quarterly</th>
									<th><input type="radio" name="Frequency" id="Semi" value="Semi-Annually">Semi-Annually</th>
									<th><input type="radio" name="Frequency" id="Yearly" value="Yearly">Yearly </th>
									<th><input type="radio" name="Frequency" id="N_A" value="Not Applicable">N/A</th>
								</tr>
							</table>
						</div>
						<textarea placeholder="type here..." name="Monitoring" required></textarea>
						
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
											<td><textarea placeholder="type here..." name="SP1_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP1_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP1_3"></textarea></td>
											
										</tr>
										<tr class="MF">
											<td>2</td>
											<td><textarea placeholder="type here..." name="SP2_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP2_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP2_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>3</td>
											<td><textarea placeholder="type here..." name="SP3_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP3_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP3_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>4</td>
											<td><textarea placeholder="type here..." name="SP4_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP4_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP4_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>5</td>
											<td><textarea placeholder="type here..." name="SP5_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP5_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP5_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>6</td>
											<td><textarea placeholder="type here..." name="SP6_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP6_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP6_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>7</td>
											<td><textarea placeholder="type here..." name="SP7_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP7_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP7_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>8</td>
											<td><textarea placeholder="type here..." name="SP8_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP8_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP8_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>9</td>
											<td><textarea placeholder="type here..." name="SP9_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP9_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP9_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>10</td>
											<td><textarea placeholder="type here..." name="SP10_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP10_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP10_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>11</td>
											<td><textarea placeholder="type here..." name="SP11_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP11_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP11_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>12</td>
											<td><textarea placeholder="type here..." name="SP12_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP12_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP12_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>13</td>
											<td><textarea placeholder="type here..." name="SP13_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP13_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP13_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>14</td>
											<td><textarea placeholder="type here..." name="SP14_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP14_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP14_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>15</td>
											<td><textarea placeholder="type here..." name="SP15_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP15_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP15_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>16</td>
											<td><textarea placeholder="type here..." name="SP16_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP16_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP16_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>17</td>
											<td><textarea placeholder="type here..." name="SP17_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP17_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP17_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>18</td>
											<td><textarea placeholder="type here..." name="SP18_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP18_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP18_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>19</td>
											<td><textarea placeholder="type here..." name="SP19_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP19_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP19_3"></textarea></td>
										</tr>
										<tr class="MF">
											<td>20</td>
											<td><textarea placeholder="type here..." name="SP20_1"></textarea></td>
											<td><textarea placeholder="type here..." name="SP20_2"></textarea></td>
											<td><textarea placeholder="type here..." name="SP20_3"></textarea></td>
										</tr>
											
										
									</tbody>
									<div class="hide2nd">
										<a class="hide" href="javascript:myBlurFunction1(0);">X</a>
									</div>
								</table>
								
							</div> 
							
						</div> 
							<textarea placeholder="type here..." name="Sustainability" required></textarea>
					
						
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
					<td> <textarea placeholder="..." name="Sign1_1" required><?php echo strtoupper($Fullname);?></textarea></td>
					<td> <textarea placeholder="..." name="Sign1_2" required><?php echo $Position;?></textarea></td>
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
						<textarea placeholder="..." id="Sign2_1" name="Sign2_1" required></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="ReviewByDesignation">
							<option value="">Please Select Designation</option>
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
						<textarea placeholder="..." id="Sign2_2" name="Sign2_2" required></textarea>
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
						<textarea placeholder="..." id="Sign3_1"name="Sign3_1" required></textarea>
					</td>
					
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval1Designation">
							<option value="">Please Select Designation</option>
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
						<span onclick="RecommendingApproval1Designation()">  ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required></textarea>
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
							<span onclick="RecommendingApproval2Name()"> ✓ </span>
						</div>
						<br>
						<textarea placeholder="..." id="Sign4_1" name="Sign4_1" required></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="RecommendingApproval2Designation">
							<option value="">Please Select Designation</option>
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
						<span onclick="RecommendingApproval2Designation()"> ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign4_2" name="Sign4_2" required></textarea>
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
						<span onclick="ApprovedByName()"> ✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign5_1" name="Sign5_1" required></textarea>
					</td>
					<td>
					<div class="DrpSigna">
						<select id="ApprovedByDesignation">
							<option value="">Please Select Designation</option>
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
						<span onclick="ApprovedByDesignation()">✓ </span>
					</div>
					<br>
						<textarea placeholder="..." id="Sign5_2" name="Sign5_2" required></textarea>
					</td>
				</tr>
			</table>
			<div class="button">
				<input type="submit" class="btn" name="Save" value="Save">
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
if (isset($_POST['Save'])) {

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
	
	//Save in financial_plan_proposal table
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

	$FPR11_1 = htmlspecialchars($_POST['FPR11_1']);
	$FPR11_2 = htmlspecialchars($_POST['FPR11_2']);
	$FPR11_3 = htmlspecialchars($_POST['FPR11_3']);
	$FPR11_4 = htmlspecialchars($_POST['FPR11_4']);
	$FPR11_5 = htmlspecialchars($_POST['FPR11_5']);
	$FPR12_1 = htmlspecialchars($_POST['FPR12_1']);
	$FPR12_2 = htmlspecialchars($_POST['FPR12_2']);
	$FPR12_3 = htmlspecialchars($_POST['FPR12_3']);
	$FPR12_4 = htmlspecialchars($_POST['FPR12_4']);
	$FPR12_5 = htmlspecialchars($_POST['FPR12_5']);
	$FPR13_1 = htmlspecialchars($_POST['FPR13_1']);
	$FPR13_2 = htmlspecialchars($_POST['FPR13_2']);
	$FPR13_3 = htmlspecialchars($_POST['FPR13_3']);
	$FPR13_4 = htmlspecialchars($_POST['FPR13_4']);
	$FPR13_5 = htmlspecialchars($_POST['FPR13_5']);
	$FPR14_1 = htmlspecialchars($_POST['FPR14_1']);
	$FPR14_2 = htmlspecialchars($_POST['FPR14_2']);
	$FPR14_2 = htmlspecialchars($_POST['FPR14_2']);
	$FPR14_3 = htmlspecialchars($_POST['FPR14_3']);
	$FPR14_4 = htmlspecialchars($_POST['FPR14_4']);
	$FPR14_5 = htmlspecialchars($_POST['FPR14_5']);
	$FPR15_1 = htmlspecialchars($_POST['FPR15_1']);
	$FPR15_2 = htmlspecialchars($_POST['FPR15_2']);
	$FPR15_3 = htmlspecialchars($_POST['FPR15_3']);
	$FPR15_4 = htmlspecialchars($_POST['FPR15_4']);
	$FPR15_5 = htmlspecialchars($_POST['FPR15_5']);
	$FPR16_1 = htmlspecialchars($_POST['FPR16_1']);
	$FPR16_2 = htmlspecialchars($_POST['FPR16_2']);
	$FPR16_3 = htmlspecialchars($_POST['FPR16_3']);
	$FPR16_4 = htmlspecialchars($_POST['FPR16_4']);
	$FPR16_5 = htmlspecialchars($_POST['FPR16_5']);
	$FPR17_1 = htmlspecialchars($_POST['FPR17_1']);
	$FPR17_2 = htmlspecialchars($_POST['FPR17_2']);
	$FPR17_3 = htmlspecialchars($_POST['FPR17_3']);
	$FPR17_4 = htmlspecialchars($_POST['FPR17_4']);
	$FPR17_5 = htmlspecialchars($_POST['FPR17_5']);
	$FPR18_1 = htmlspecialchars($_POST['FPR18_1']);
	$FPR18_2 = htmlspecialchars($_POST['FPR18_2']);
	$FPR18_3 = htmlspecialchars($_POST['FPR18_3']);
	$FPR18_4 = htmlspecialchars($_POST['FPR18_4']);
	$FPR18_5 = htmlspecialchars($_POST['FPR18_5']);
	$FPR19_1 = htmlspecialchars($_POST['FPR19_1']);
	$FPR19_2 = htmlspecialchars($_POST['FPR19_2']);
	$FPR19_3 = htmlspecialchars($_POST['FPR19_3']);
	$FPR19_4 = htmlspecialchars($_POST['FPR19_4']);
	$FPR19_5 = htmlspecialchars($_POST['FPR19_5']);
	$FPR20_1 = htmlspecialchars($_POST['FPR20_1']);
	$FPR20_2 = htmlspecialchars($_POST['FPR20_2']);
	$FPR20_3 = htmlspecialchars($_POST['FPR20_3']);
	$FPR20_4 = htmlspecialchars($_POST['FPR20_4']);
	$FPR20_5 = htmlspecialchars($_POST['FPR20_5']);
	$GrandTotal = htmlspecialchars($_POST['GrandTotal']);
	
	$Functional = htmlspecialchars($_POST['Functional']);
	$Frequency = htmlspecialchars($_POST['Frequency']);
	$Monitoring = htmlspecialchars($_POST['Monitoring']);
	
	//Save in sustainability_plan_proposal table
	$Sustainability = htmlspecialchars($_POST['Sustainability']);
	$SP1_1 = htmlspecialchars($_POST['SP1_1']);
	$SP1_2 = htmlspecialchars($_POST['SP1_2']);
	$SP1_3 = htmlspecialchars($_POST['SP1_3']);
	$SP2_1 = htmlspecialchars($_POST['SP2_1']);
	$SP2_2 = htmlspecialchars($_POST['SP2_2']);
	$SP2_3 = htmlspecialchars($_POST['SP2_3']);
	$SP3_1 = htmlspecialchars($_POST['SP3_1']);
	$SP3_2 = htmlspecialchars($_POST['SP3_2']);
	$SP3_3 = htmlspecialchars($_POST['SP3_3']);
	$SP4_1 = htmlspecialchars($_POST['SP4_1']);
	$SP4_2 = htmlspecialchars($_POST['SP4_2']);
	$SP4_3 = htmlspecialchars($_POST['SP4_3']);
	$SP5_1 = htmlspecialchars($_POST['SP5_1']);
	$SP5_2 = htmlspecialchars($_POST['SP5_2']);
	$SP5_3 = htmlspecialchars($_POST['SP5_3']);
	$SP6_1 = htmlspecialchars($_POST['SP6_1']);
	$SP6_2 = htmlspecialchars($_POST['SP6_2']);
	$SP6_3 = htmlspecialchars($_POST['SP6_3']);
	$SP7_1 = htmlspecialchars($_POST['SP7_1']);
	$SP7_2 = htmlspecialchars($_POST['SP7_2']);
	$SP7_3 = htmlspecialchars($_POST['SP7_3']);
	$SP8_1 = htmlspecialchars($_POST['SP8_1']);
	$SP8_2 = htmlspecialchars($_POST['SP8_2']);
	$SP8_3 = htmlspecialchars($_POST['SP8_3']);
	$SP9_1 = htmlspecialchars($_POST['SP9_1']);
	$SP9_2 = htmlspecialchars($_POST['SP9_2']);
	$SP9_3 = htmlspecialchars($_POST['SP9_3']);
	$SP10_1 = htmlspecialchars($_POST['SP10_1']);
	$SP10_2 = htmlspecialchars($_POST['SP10_2']);
	$SP10_3 = htmlspecialchars($_POST['SP10_3']);

	$SP11_1 = htmlspecialchars($_POST['SP11_1']);
	$SP11_2 = htmlspecialchars($_POST['SP11_2']);
	$SP11_3 = htmlspecialchars($_POST['SP11_3']);
	$SP12_1 = htmlspecialchars($_POST['SP12_1']);
	$SP12_2 = htmlspecialchars($_POST['SP12_2']);
	$SP12_3 = htmlspecialchars($_POST['SP12_3']);
	$SP13_1 = htmlspecialchars($_POST['SP13_1']);
	$SP13_2 = htmlspecialchars($_POST['SP13_2']);
	$SP13_3 = htmlspecialchars($_POST['SP13_3']);
	$SP14_1 = htmlspecialchars($_POST['SP14_1']);
	$SP14_2 = htmlspecialchars($_POST['SP14_2']);
	$SP14_3 = htmlspecialchars($_POST['SP14_3']);
	$SP15_1 = htmlspecialchars($_POST['SP15_1']);
	$SP15_2 = htmlspecialchars($_POST['SP15_2']);
	$SP15_3 = htmlspecialchars($_POST['SP15_3']);
	$SP16_1 = htmlspecialchars($_POST['SP16_1']);
	$SP16_2 = htmlspecialchars($_POST['SP16_2']);
	$SP16_3 = htmlspecialchars($_POST['SP16_3']);
	$SP17_1 = htmlspecialchars($_POST['SP17_1']);
	$SP17_2 = htmlspecialchars($_POST['SP17_2']);
	$SP17_3 = htmlspecialchars($_POST['SP17_3']);
	$SP18_1 = htmlspecialchars($_POST['SP18_1']);
	$SP18_2 = htmlspecialchars($_POST['SP18_2']);
	$SP18_3 = htmlspecialchars($_POST['SP18_3']);
	$SP19_1 = htmlspecialchars($_POST['SP19_1']);
	$SP19_2 = htmlspecialchars($_POST['SP19_2']);
	$SP19_3 = htmlspecialchars($_POST['SP19_3']);
	$SP20_1 = htmlspecialchars($_POST['SP20_1']);
	$SP20_2 = htmlspecialchars($_POST['SP20_2']);
	$SP20_3 = htmlspecialchars($_POST['SP20_3']);
	
	//ProjectStatus (Pending, Need to Revise, Approved, Rejected)
	//Remarks (Evaluated)

	$Sign1_1 = htmlspecialchars($_POST['Sign1_1']); $Sign1_2 = htmlspecialchars($_POST['Sign1_2']);
	$Sign2_1 = htmlspecialchars($_POST['Sign2_1']); $Sign2_2 = htmlspecialchars($_POST['Sign2_2']);
	$Sign3_1 = htmlspecialchars($_POST['Sign3_1']); $Sign3_2 = htmlspecialchars($_POST['Sign3_2']);
	$Sign4_1 = htmlspecialchars($_POST['Sign4_1']); $Sign4_2 = htmlspecialchars($_POST['Sign4_2']);
	$Sign5_1 = htmlspecialchars($_POST['Sign5_1']); $Sign5_2 = htmlspecialchars($_POST['Sign5_2']);

	$sql = ("INSERT INTO create_alangilan
		(AccountID, Date_Time, Year, Quarter, Initiated, Classification, unknown, IsGAD,
				Title, Location_Area, Start_Date, End_Date, Start_Time, End_Time, TypeCES,
				SDG, Office, Programs, People, Agencies, TypeParticipants, Male, Female,
				Cost, SourceFund, Rationale, Objectives, Descriptions,
				Functional, Frequency, Monitoring, ProjectStatus,
				Sign1_1, Sign1_2, Sign2_1, Sign2_2, Sign3_1, Sign3_2,
				Sign4_1, Sign4_2, Sign5_1, Sign5_2)
		VALUES 
			('$AID', '$DateTime', '$Year', '$Quarter', '$Initiated', '$Classification', '$unknown', '$IsGAD',
				'$Title', '$Location_Area', '$Start_Date', '$End_Date', '$Start_Time', '$End_Time', '$TypeCES',
				'$SDG', '$Office', '$Programs', '$People', '$Agencies', '$TypeParticipants', '$Male', '$Female',
				'$Cost', '$SourceFund', '$Rationale', '$Objectives', '$Descriptions',
				'$Functional', '$Frequency', '$Monitoring', 'PENDING',
				'$Sign1_1', '$Sign1_2', '$Sign2_1', '$Sign2_2', '$Sign3_1', '$Sign3_2',
				'$Sign4_1', '$Sign4_2', '$Sign5_1', '$Sign5_2')");
		
		if (mysqli_query($con, $sql)) {
			$last_id = mysqli_insert_id($con);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		
		//Inserting Data into Financial Plan Proposal Table
		$sql = ("INSERT INTO financial_plan_proposal
			(ProposalID,
				Item_1, Qty_1, Unit_1, Cost_1, Total_1,
				Item_2, Qty_2, Unit_2, Cost_2, Total_2,
				Item_3, Qty_3, Unit_3, Cost_3, Total_3,
				Item_4, Qty_4, Unit_4, Cost_4, Total_4,
				Item_5, Qty_5, Unit_5, Cost_5, Total_5,
				Item_6, Qty_6, Unit_6, Cost_6, Total_6,
				Item_7, Qty_7, Unit_7, Cost_7, Total_7,
				Item_8, Qty_8, Unit_8, Cost_8, Total_8,
				Item_9, Qty_9, Unit_9, Cost_9, Total_9,
				Item_10, Qty_10, Unit_10, Cost_10, Total_10,
				Item_11, Qty_11, Unit_11, Cost_11, Total_11,
				Item_12, Qty_12, Unit_12, Cost_12, Total_12,
				Item_13, Qty_13, Unit_13, Cost_13, Total_13,
				Item_14, Qty_14, Unit_14, Cost_14, Total_14,
				Item_15, Qty_15, Unit_15, Cost_15, Total_15,
				Item_16, Qty_16, Unit_16, Cost_16, Total_16,
				Item_17, Qty_17, Unit_17, Cost_17, Total_17,
				Item_18, Qty_18, Unit_18, Cost_18, Total_18,
				Item_19, Qty_19, Unit_19, Cost_19, Total_19,
				Item_20, Qty_20, Unit_20, Cost_20, Total_20, GrandTotal)
		VALUES 
			('$last_id',
				'$FPR1_1', '$FPR1_2', '$FPR1_3', '$FPR1_4', '$FPR1_5',
				'$FPR2_1', '$FPR2_2', '$FPR2_3', '$FPR2_4', '$FPR2_5',
				'$FPR3_1', '$FPR3_2', '$FPR3_3', '$FPR3_4', '$FPR3_5',
				'$FPR4_1', '$FPR4_2', '$FPR4_3', '$FPR4_4', '$FPR4_5',
				'$FPR5_1', '$FPR5_2', '$FPR5_3', '$FPR5_4', '$FPR5_5',
				'$FPR6_1', '$FPR6_2', '$FPR6_3', '$FPR6_4', '$FPR6_5',
				'$FPR7_1', '$FPR7_2', '$FPR7_3', '$FPR7_4', '$FPR7_5',
				'$FPR8_1', '$FPR8_2', '$FPR8_3', '$FPR8_4', '$FPR8_5',
				'$FPR9_1', '$FPR9_2', '$FPR9_3', '$FPR9_4', '$FPR9_5',
				'$FPR10_1', '$FPR10_2', '$FPR10_3', '$FPR10_4', '$FPR10_5',
				'$FPR11_1', '$FPR11_2', '$FPR11_3', '$FPR11_4', '$FPR11_5',
				'$FPR12_1', '$FPR12_2', '$FPR12_3', '$FPR12_4', '$FPR12_5',
				'$FPR13_1', '$FPR13_2', '$FPR13_3', '$FPR13_4', '$FPR13_5',
				'$FPR14_1', '$FPR14_2', '$FPR14_3', '$FPR14_4', '$FPR14_5',
				'$FPR15_1', '$FPR15_2', '$FPR15_3', '$FPR15_4', '$FPR15_5',
				'$FPR16_1', '$FPR16_2', '$FPR16_3', '$FPR16_4', '$FPR16_5',
				'$FPR17_1', '$FPR17_2', '$FPR17_3', '$FPR17_4', '$FPR17_5',
				'$FPR18_1', '$FPR18_2', '$FPR18_3', '$FPR18_4', '$FPR18_5',
				'$FPR19_1', '$FPR19_2', '$FPR19_3', '$FPR19_4', '$FPR19_5',
				'$FPR20_1', '$FPR20_2', '$FPR20_3', '$FPR20_4', '$FPR20_5','$GrandTotal')");
	
		if ($command = $con->query($sql) === TRUE) {
			//Execute Succesful
		}
		else {
			echo "<script>
				alert('FAILED TO Insert Financial Plan. Try Again!');
				window.location.href='CreateProposal.php';
			</script>";
		}

		//Inserting Data into Sustainability Plan Proposal Table
		$sql = ("INSERT INTO sustainability_plan_proposal
			(ProposalID, Sustainability, 
				Activities_1, Sched_1, Involved_1,
				Activities_2, Sched_2, Involved_2,
				Activities_3, Sched_3, Involved_3,
				Activities_4, Sched_4, Involved_4,
				Activities_5, Sched_5, Involved_5,
				Activities_6, Sched_6, Involved_6,
				Activities_7, Sched_7, Involved_7,
				Activities_8, Sched_8, Involved_8,
				Activities_9, Sched_9, Involved_9,
				Activities_10, Sched_10, Involved_10,
				Activities_11, Sched_11, Involved_11,
				Activities_12, Sched_12, Involved_12,
				Activities_13, Sched_13, Involved_13,
				Activities_14, Sched_14, Involved_14,
				Activities_15, Sched_15, Involved_15,
				Activities_16, Sched_16, Involved_16,
				Activities_17, Sched_17, Involved_17,
				Activities_18, Sched_18, Involved_18,
				Activities_19, Sched_19, Involved_19,
				Activities_20, Sched_20, Involved_20)
		VALUES 
			('$last_id', '$Sustainability',
				'$SP1_1', '$SP1_2', '$SP1_3', 
				'$SP2_1', '$SP2_2', '$SP2_3', 
				'$SP3_1', '$SP3_2', '$SP3_3', 
				'$SP4_1', '$SP4_2', '$SP4_3', 
				'$SP5_1', '$SP5_2', '$SP5_3', 
				'$SP6_1', '$SP6_2', '$SP6_3', 
				'$SP7_1', '$SP7_2', '$SP7_3', 
				'$SP8_1', '$SP8_2', '$SP8_3', 
				'$SP9_1', '$SP9_2', '$SP9_3', 
				'$SP10_1', '$SP10_2', '$SP10_3',
				'$SP11_1', '$SP11_2', '$SP11_3', 
				'$SP12_1', '$SP12_2', '$SP12_3', 
				'$SP13_1', '$SP13_2', '$SP13_3', 
				'$SP14_1', '$SP14_2', '$SP14_3', 
				'$SP15_1', '$SP15_2', '$SP15_3', 
				'$SP16_1', '$SP16_2', '$SP16_3', 
				'$SP17_1', '$SP17_2', '$SP17_3', 
				'$SP18_1', '$SP18_2', '$SP18_3', 
				'$SP19_1', '$SP19_2', '$SP19_3', 
				'$SP20_1', '$SP20_2', '$SP20_3')");
	
		if ($command = $con->query($sql) === TRUE) {
			echo "<script>
					alert('Proposal Successfully Created');
					window.location.href='Proposal.php';
				</script>";
		  } else {
			echo "<script>
					alert('FAILED TO CREATE. Try Again!');
					window.location.href='CreateProposal.php';
				</script>";
		  }
}
?>

<script>
function MonitoringFrequency(){
	var x = document.getElementById("unknown").value;

	if (x == "Extension PAP"){
		document.getElementById("N_A").checked = true;

		//document.getElementById("Monthly").readonly = true;
		//document.getElementById("Quarterly").readonly = true;
		//document.getElementById("Semi").readonly = true;
		//document.getElementById("Yearly").readonly = true;
	}
	else{
		document.getElementById("N_A").checked = false;

		//document.getElementById("Monthly").readonly = false;
		//document.getElementById("Quarterly").readonly = false;
		//document.getElementById("Semi").readonly = false;
		//document.getElementById("Yearly").readonly = false;	
	}
}

</script>

<script>
//For Form TypeCES and SDG
	function openForm()  { document.getElementById("myForm").style.display = "block"; }
	function closeForm() { document.getElementById("myForm").style.display = "none"; }
		
	function openForm1()  { document.getElementById("myForm1").style.display = "block"; }
	function closeForm1() { document.getElementById("myForm1").style.display = "none"; }
</script>

<script>
//For Financial Plan
	function openFormFinancial()  { document.getElementById("myFormFinancial").style.display = "block"; }
	function closeFormFinancial() { document.getElementById("myFormFinancial").style.display = "none"; }
</script>

<script>
//For Financial Plan
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
//For Auto Compute
function Row1(){
	let a = document.getElementById('FPR1_2').value;
	let b = document.getElementById('FPR1_4').value;
	let ans = a * b;
	document.getElementById("FPR1_5").value = ans;
	
	GrandTotal();
}
function Row2(){
	let a = document.getElementById('FPR2_2').value;
	let b = document.getElementById('FPR2_4').value;
	let ans = a * b;
	document.getElementById("FPR2_5").value = ans;

	GrandTotal();
}
function Row3(){ 
	let a = document.getElementById('FPR3_2').value;
	let b = document.getElementById('FPR3_4').value;
	let ans = a * b;
	document.getElementById("FPR3_5").value = ans;

	GrandTotal();
}
function Row4(){ 
	let a = document.getElementById('FPR4_2').value;
	let b = document.getElementById('FPR4_4').value;
	let ans = a * b;
	document.getElementById("FPR4_5").value = ans;

	GrandTotal();
}
function Row5(){ 
	let a = document.getElementById('FPR5_2').value;
	let b = document.getElementById('FPR5_4').value;
	let ans = a * b;
	document.getElementById("FPR5_5").value = ans;

	GrandTotal();
}
function Row6(){ 
	let a = document.getElementById('FPR6_2').value;
	let b = document.getElementById('FPR6_4').value;
	let ans = a * b;
	document.getElementById("FPR6_5").value = ans;

	GrandTotal();
}
function Row7(){ 
	let a = document.getElementById('FPR7_2').value;
	let b = document.getElementById('FPR7_4').value;
	let ans = a * b;
	document.getElementById("FPR7_5").value = ans;

	GrandTotal();
}
function Row8(){ 
	let a = document.getElementById('FPR8_2').value;
	let b = document.getElementById('FPR8_4').value;
	let ans = a * b;
	document.getElementById("FPR8_5").value = ans;

	GrandTotal();
}
function Row9(){ 
	let a = document.getElementById('FPR9_2').value;
	let b = document.getElementById('FPR9_4').value;
	let ans = a * b;
	document.getElementById("FPR9_5").value = ans;

	GrandTotal();
}
function Row10(){
	let a = document.getElementById('FPR10_2').value;
	let b = document.getElementById('FPR10_4').value;
	let ans = a * b;
	document.getElementById("FPR10_5").value = ans;

	GrandTotal();
}
function Row11(){
	let a = document.getElementById('FPR11_2').value;
	let b = document.getElementById('FPR11_4').value;
	let ans = a * b;
	document.getElementById("FPR11_5").value = ans;

	GrandTotal();
}
function Row12(){
	let a = document.getElementById('FPR12_2').value;
	let b = document.getElementById('FPR12_4').value;
	let ans = a * b;
	document.getElementById("FPR12_5").value = ans;

	GrandTotal();
}
function Row13(){
	let a = document.getElementById('FPR13_2').value;
	let b = document.getElementById('FPR13_4').value;
	let ans = a * b;
	document.getElementById("FPR13_5").value = ans;

	GrandTotal();
}
function Row14(){
	let a = document.getElementById('FPR14_2').value;
	let b = document.getElementById('FPR14_4').value;
	let ans = a * b;
	document.getElementById("FPR14_5").value = ans;

	GrandTotal();
}
function Row15(){
	let a = document.getElementById('FPR15_2').value;
	let b = document.getElementById('FPR15_4').value;
	let ans = a * b;
	document.getElementById("FPR15_5").value = ans;

	GrandTotal();
}
function Row16(){
	let a = document.getElementById('FPR16_2').value;
	let b = document.getElementById('FPR16_4').value;
	let ans = a * b;
	document.getElementById("FPR16_5").value = ans;

	GrandTotal();
}
function Row17(){
	let a = document.getElementById('FPR17_2').value;
	let b = document.getElementById('FPR17_4').value;
	let ans = a * b;
	document.getElementById("FPR17_5").value = ans;

	GrandTotal();
}
function Row18(){
	let a = document.getElementById('FPR18_2').value;
	let b = document.getElementById('FPR18_4').value;
	let ans = a * b;
	document.getElementById("FPR18_5").value = ans;

	GrandTotal();
}
function Row19(){
	let a = document.getElementById('FPR19_2').value;
	let b = document.getElementById('FPR19_4').value;
	let ans = a * b;
	document.getElementById("FPR19_5").value = ans;

	GrandTotal();
}
function Row20(){
	let a = document.getElementById('FPR20_2').value;
	let b = document.getElementById('FPR20_4').value;
	let ans = a * b;
	document.getElementById("FPR20_5").value = ans;

	GrandTotal();
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
	let r11 = document.getElementById('FPR11_5').value;
	let r12 = document.getElementById('FPR12_5').value;
	let r13 = document.getElementById('FPR13_5').value;
	let r14 = document.getElementById('FPR14_5').value;
	let r15 = document.getElementById('FPR15_5').value;
	let r16 = document.getElementById('FPR16_5').value;
	let r17 = document.getElementById('FPR17_5').value;
	let r18 = document.getElementById('FPR18_5').value;
	let r19 = document.getElementById('FPR19_5').value;
	let r20 = document.getElementById('FPR20_5').value;
	let anss = (parseFloat(r1)) + (parseFloat(r2)) + (parseFloat(r3)) + (parseFloat(r4)) + (parseFloat(r5)) + (parseFloat(r6)) + (parseFloat(r7)) + (parseFloat(r8)) + (parseFloat(r9)) + (parseFloat(r10)) +
			   (parseFloat(r11)) + (parseFloat(r12)) + (parseFloat(r13)) + (parseFloat(r14)) + (parseFloat(r15)) + (parseFloat(r16)) + (parseFloat(r17)) + (parseFloat(r18)) + (parseFloat(r19)) + (parseFloat(r20));
	document.getElementById("GrandTotal").value = anss;
	document.getElementById("Cost").value = anss;
}
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
			//document.getElementById("Sign2_1").value = result;
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