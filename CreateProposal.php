<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Account Restrictions
$UserPosition = $_SESSION["Position"];
if (($UserPosition == "Head") OR ($UserPosition == "Coordinator")) {
	//Code Continue
}else {
	echo "<center> <br>";
	echo "<h1> Access Denied! <br>";
	echo "Staffs are not allowed to Create Proposal. </h1>";
	echo "<h2> <a href='Dashboard.php'> RETURN </a> </h2>";
	die();
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"];
$create_table = $_SESSION["create_table"];

$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];

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
							<label class="check"><span>8. Parent's Empowerment through Social Development(PESODEV)Program</span>
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
						<textarea placeholder="type here..." name="Office" required></textarea>
						
						<label>  Vll. Program/s Involved<i>(specify the programs under the college implementing the project)</i><label>
						<textarea placeholder="type here..." name="Programs" required></textarea>
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i><label>
						<textarea placeholder="type here..." name="People" required></textarea>
						
						<label> lX. Partner Agencies<label>
						<textarea placeholder="type here..." name="Agencies" required></textarea>	
						
						<label> X. Beneficiaries <i>(Type and Number of Male & Female)</i><label>
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
									<th>Total Cost</th>
									<td><input type="number" min="0" name="Cost" id="Cost" title="Based from the Financial Plan Grand Total" readonly> </td> 
								
								</tr>
								<tr class="MF1" >
									<th >Source of Fund</th>
									<td><textarea placeholder="type here" name="SourceFund"></textarea></input></td> 
								</tr>
						</table>
						
						<label> Xll. Rationale<i>(brief description of the situation)</i><label>
						<textarea placeholder="type here..." name="Rationale" required></textarea>
						
						<label> Xlll. Objectives<i>(General and Specific)</i><label>
						<textarea placeholder="type here..." name="Objectives" required></textarea>

						<label> XlV. Description, Strategies and Methods <i>(Activities/Schedule)</i><label>
						<textarea placeholder="type here..." name="Descriptions" required></textarea>
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						
						<label> XV. Financial Plan</i><label>
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
								 
								
						<label> XVl. Functional Relationships with the Partner <i>(Duties/Task of the Partner Agencies)</i><label>
						<textarea placeholder="type here..." name="Functional" required></textarea>
						
						<label> XVll. Monitoring and Evaluation Mechanics/Plan<label>
						<div class="select4">
							<table>
								<tr>
									<th><input type="radio" name="Frequency" value="Monthly">Monthly </th>
									<th><input type="radio" name="Frequency" value="Quarterly"> Quarterly</th>
									<th><input type="radio" name="Frequency" value="Semi-Annually">Semi-Annually</th>
									<th><input type="radio" name="Frequency" value="Yearly">Yearly </th>
								</tr>
							</table>
						</div>
						<textarea placeholder="type here..." name="Monitoring" required></textarea>
						
						<label> XVlll. Sustainability Plan<label>
						<textarea placeholder="type here..." name="Plans" required></textarea>
						
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
						<!-- <div class="checkbox2">
								<label onclick="openForm2()">Select your name</label>
						</div>
							<div class="form-popup2" id="myForm2">
								<label class="check"><span>Sample</span>
									<input type="checkbox" id="" value="" name="" onclick="">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm2()">CLOSE</button>
							</div> -->

							<textarea placeholder="..." name="Sign1_1" required><?php echo strtoupper($Fullname);?></textarea></td>
					<td> <textarea placeholder="..." name="Sign1_2" required><?php echo $Position;?></textarea></td>
				</tr>
				<tr>
					<td> Review by:</td>
					<td>
						<!-- <div class="checkbox4">
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
							</div> -->
						<textarea placeholder="..." name="Sign2_1" required></textarea></td>
					<td>	
					<textarea placeholder="..." name="Sign2_2" required></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td>
						<!--  <div class="checkbox6">
								<label onclick="openForm6()">Select Designation</label>
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
							</div> -->
					<textarea placeholder="..." name="Sign3_1" required></textarea></td>
					
					<td>
					<textarea placeholder="..." name="Sign3_2" required></textarea></td>
				</tr>
				<tr>
					<td> Recommending Approval:</td>
					<td>
						<!-- <div class="checkbox8">
								<label onclick="openForm8()">Select Designation</label>
						</div>
							<div class="form-popup8" id="myForm8">
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
									<input type="checkbox" id="" value="" name="" onclick="S">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm8()">CLOSE</button>
							</div> -->
					<textarea placeholder="..." name="Sign4_1" required></textarea></td>
					
					<td>
					<textarea placeholder="..." name="Sign4_2" required></textarea></td>
				</tr>
				<tr>
					<td>Approved by:</td>
					<td>
						<!-- <div class="checkbox10">
								<label onclick="openForm10()">Select Designation</label>
						</div>
							<div class="form-popup10" id="myForm10">
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
									<input type="checkbox" id="" value="" name="" onclick="S">
									<span class="checkmark"></span>
								</label>
								<button type="button" class="btncancel" onclick="closeForm10()">CLOSE</button>
							</div>-->
					<textarea placeholder="..." name="Sign5_1" required></textarea></td>
					
					<td><textarea placeholder="..." name="Sign5_2" required></textarea></td>
				</tr>
			</table>
			<div class="button">
				<input type="submit" class="btn" name="Save" value="Save">
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

	$sql = ("INSERT INTO create_alangilan
		(AccountID, Date_Time, Year, Quarter, Initiated, Classification, unknown, IsGAD,
				Title, Location_Area, Start_Date, End_Date, Start_Time, End_Time, TypeCES,
				SDG, Office, Programs, People, Agencies, TypeParticipants, Male, Female,
				Cost, SourceFund, Rationale, Objectives, Descriptions,
				FPR1_1, FPR1_2, FPR1_3, FPR1_4, FPR1_5,
				FPR2_1, FPR2_2, FPR2_3, FPR2_4, FPR2_5,
				FPR3_1, FPR3_2, FPR3_3, FPR3_4, FPR3_5,
				FPR4_1, FPR4_2, FPR4_3, FPR4_4, FPR4_5,
				FPR5_1, FPR5_2, FPR5_3, FPR5_4, FPR5_5,
				FPR6_1, FPR6_2, FPR6_3, FPR6_4, FPR6_5,
				FPR7_1, FPR7_2, FPR7_3, FPR7_4, FPR7_5,
				FPR8_1, FPR8_2, FPR8_3, FPR8_4, FPR8_5,
				FPR9_1, FPR9_2, FPR9_3, FPR9_4, FPR9_5,
				FPR10_1, FPR10_2, FPR10_3, FPR10_4, FPR10_5, GrandTotal,
				Functional, Frequency, Monitoring, Plans, ProjectStatus,
				Sign1_1, Sign1_2, Sign2_1, Sign2_2, Sign3_1, Sign3_2,
				Sign4_1, Sign4_2, Sign5_1, Sign5_2)
		VALUES 
			('$AID', '$DateTime', '$Year', '$Quarter', '$Initiated', '$Classification', '$unknown', '$IsGAD',
				'$Title', '$Location_Area', '$Start_Date', '$End_Date', '$Start_Time', '$End_Time', '$TypeCES',
				'$SDG', '$Office', '$Programs', '$People', '$Agencies', '$TypeParticipants', '$Male', '$Female',
				'$Cost', '$SourceFund', '$Rationale', '$Objectives', '$Descriptions',
				'$FPR1_1', '$FPR1_2', '$FPR1_3', '$FPR1_4', '$FPR1_5',
				'$FPR2_1', '$FPR2_2', '$FPR2_3', '$FPR2_4', '$FPR2_5',
				'$FPR3_1', '$FPR3_2', '$FPR3_3', '$FPR3_4', '$FPR3_5',
				'$FPR4_1', '$FPR4_2', '$FPR4_3', '$FPR4_4', '$FPR4_5',
				'$FPR5_1', '$FPR5_2', '$FPR5_3', '$FPR5_4', '$FPR5_5',
				'$FPR6_1', '$FPR6_2', '$FPR6_3', '$FPR6_4', '$FPR6_5',
				'$FPR7_1', '$FPR7_2', '$FPR7_3', '$FPR7_4', '$FPR7_5',
				'$FPR8_1', '$FPR8_2', '$FPR8_3', '$FPR8_4', '$FPR8_5',
				'$FPR9_1', '$FPR9_2', '$FPR9_3', '$FPR9_4', '$FPR9_5',
				'$FPR10_1', '$FPR10_2', '$FPR10_3', '$FPR10_4', '$FPR10_5', '$GrandTotal',
				'$Functional', '$Frequency', '$Monitoring', '$Plans', 'PENDING',
				'$Sign1_1', '$Sign1_2', '$Sign2_1', '$Sign2_2', '$Sign3_1', '$Sign3_2',
				'$Sign4_1', '$Sign4_2', '$Sign5_1', '$Sign5_2'
			)");
	
		$command = $con->query($sql);
		echo "<script>
			alert('Proposal Successfully Created');
		</script>";
}
?>

<script>
//For Form TypeCES and SDG
	function openForm()  { document.getElementById("myForm").style.display = "block"; }
	function closeForm() { document.getElementById("myForm").style.display = "none"; }
		
	function openForm1()  { document.getElementById("myForm1").style.display = "block"; }
	function closeForm1() { document.getElementById("myForm1").style.display = "none"; }
</script>

<!-- <script>
//For Signatories Dropdown
	function openForm2()  { document.getElementById("myForm2").style.display = "block"; }
	function closeForm2() { document.getElementById("myForm2").style.display = "none"; }

	function openForm4()  { document.getElementById("myForm4").style.display = "block"; }
	function closeForm4() { document.getElementById("myForm4").style.display = "none"; }

	function openForm6()  { document.getElementById("myForm6").style.display = "block"; }
	function closeForm6() { document.getElementById("myForm6").style.display = "none"; }

	function openForm8()  { document.getElementById("myForm8").style.display = "block"; }
	function closeForm8() { document.getElementById("myForm8").style.display = "none"; }

	function openForm10()  { document.getElementById("myForm10").style.display = "block"; }
	function closeForm10() { document.getElementById("myForm10").style.display = "none"; }
</script> -->

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

	GrandTotal();
	ForCost();
}

function Row6(){ 
	let a = document.getElementById('FPR6_2').value;
	let b = document.getElementById('FPR6_4').value;
	let ans = a * b;
	document.getElementById("FPR6_5").value = ans;

	GrandTotal();
	ForCost();
}

function Row7(){ 
	let a = document.getElementById('FPR7_2').value;
	let b = document.getElementById('FPR7_4').value;
	let ans = a * b;
	document.getElementById("FPR7_5").value = ans;

	GrandTotal();
	ForCost()
}

function Row8(){ 
	let a = document.getElementById('FPR8_2').value;
	let b = document.getElementById('FPR8_4').value;
	let ans = a * b;
	document.getElementById("FPR8_5").value = ans;

	GrandTotal()
	ForCost();
}

function Row9(){ 
	let a = document.getElementById('FPR9_2').value;
	let b = document.getElementById('FPR9_4').value;
	let ans = a * b;
	document.getElementById("FPR9_5").value = ans;

	GrandTotal();
	ForCost();
}

function Row10(){
	let a = document.getElementById('FPR10_2').value;
	let b = document.getElementById('FPR10_4').value;
	let ans = a * b;
	document.getElementById("FPR10_5").value = ans;

	GrandTotal()
	ForCost();
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