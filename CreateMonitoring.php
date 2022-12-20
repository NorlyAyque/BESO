<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Data declared from index.php
$AID = $_SESSION["AccountAID"]; //Naka Login na User
$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];

date_default_timezone_set("Asia/Manila");
$DateTime = date("M, d Y; h:i:s A");
?>

<?php
if(isset($_GET['create'])){
	$PID = $_GET['create']; //Proposal ID
    
	$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
	$command = $con->query($sql) or die("Error Fethcing data");
    while($result = mysqli_fetch_array($command))
	{
		$dbAuthor = $result['AccountID']; //Gumawa ng Proposal

		$dbYear = $result['Year'];
        $dbQuarter = $result['Quarter'];

		$dbTitle = $result['Title'];
        $dbLocation = $result['Location_Area'];
		
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
	$DurationTime = $NoOfHours . " hours"; //Compute number of hours depends on number of days
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Create Monitoring</title>
<link rel="stylesheet" type="text/css" href="styles/CreateMonitoring-style.css">

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
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL"><?php echo "$CountEvaluation";?></span>
					</div>
				</a>
			</li>
			<li>
				<a class="active" href="Monitoring.php">
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
						MONITORING THE PROGRESS OF THE PROJECT
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
						<textarea placeholder="type here..." name="Location_Area" required><?Php echo $dbLocation; ?></textarea> 
						
						<label> lll. Duration </label>
						<textarea placeholder="type here..." name="Duration" required><?Php echo $DurationDate."\r".$DurationTime; ?></textarea>
						 
						<label> lV. Type of Community Extension Service </label>
						<textarea placeholder="type here..." name="TypeCES" required><?Php echo $dbTypeCES; ?></textarea> 
						
						<label>  V. Sustatinable Development Goals (SDG) </label>
						<textarea placeholder="type here..." name="SDG" required><?Php echo $dbSDG; ?></textarea> 
						
						<label>  Vl. Office/ College/s Involved </label>
						<textarea placeholder="type here..." name="Office" required><?Php echo $dbOffice; ?></textarea> 
						
						<label>  Vll. Program/s Involved<i><h5>(specify the programs under the college implementing the project)</h5></i></label>
						<textarea placeholder="type here..." name="Programs" required><?Php echo $dbPrograms; ?></textarea> 
						
						<label> Vlll. Project Leader, Assistant Project Leader and coordinator</i></label>
						<textarea placeholder="type here..." name="People" required><?Php echo $dbPeople; ?></textarea> 
						
						<label> lX. Cooperating Agencies</label>
						<textarea placeholder="type here..." name="Agency" required><?Php echo $dbAgencies; ?></textarea> 
						
						

						
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						<label> X. Beneficiaries<i><h5>(Type and Number of Male and Female</h5></i></label>
						<textarea placeholder="type here..." name="Beneficiaries" required><?Php echo "Type: ".$dbTypeParticipants. "\rMale: ".$dbMale. "\rFemale: ".$dbFemale;?></textarea> 
						
						<center><label> Xl. Project Status<label></center><br>
						<label>1. As to purpose <h5><i>(how far has the purpose been attained)</i></h5></label>
						<textarea placeholder="type here..." name="PS1" required></textarea> 
						
						<label>2. Availability of materials</label>
						<textarea placeholder="type here..." name="PS2" required></textarea> 
						
						<label>3. Schedule of activities</label>
						<textarea placeholder="type here..." name="PS3" required></textarea> 
						<label> 4. Financial report<label><i><h5> (Click the button Form to open the table)</h5></i>
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
						<br>
						<label>5. Problems encountered</label>
						<textarea placeholder="type here..." name="PS5" required></textarea> 
						
						<label>6. Actions taken to solve the problems encountered</label>
						<textarea placeholder="type here..." name="PS6" required></textarea> 
						
						<label>7. Suggestions and recommendations</label>
						<textarea placeholder="type here..." name="PS7" required></textarea> 
				  </div>
				</div>
				
			</div>
			<table class="signiture">
				<tr>
					<th></th>
					<th width="40%"> Name </th>
					<th width="40%"> Designation </th>
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
							<span onclick="ReviewedByName()"> ✓</span>									
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
						<span onclick="AcceptedByDesignation()"> ✓ </span>
					</div>
						<br>
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required><?php echo ""; ?></textarea>
					</td>
				</tr>
			</table>
			
			<div class="buttonBACK">
				<a href="Monitoring.php" class="btnB"> Back </a></button>
			</div>
			<div class ="save">
				<button class = "btn3" type="submit" name="submit"> Save </button>
			</div>
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

	$sql = ("INSERT INTO monitoring_alangilan
		(ProposalID, Author, Evaluator, Date_Time, Year, Quarter,
			Title, Location_Area, Duration, TypeCES, SDG, 
			Office, Programs, People, Agency, Beneficiaries,
			PS1, PS2, PS3, PS5, PS6, PS7,
			Remarks, Sign1_1, Sign1_2, Sign2_1, Sign2_2, Sign3_1, Sign3_2)
		VALUES 
		('$PID', '$dbAuthor', '$AID', '$DateTime', '$dbYear', '$dbQuarter',
			'$Title', '$Location_Area', '$Duration', '$TypeCES', '$SDG', 
			'$Office', '$Programs', '$People', '$Agency', '$Beneficiaries',
			'$PS1', '$PS2', '$PS3', '$PS5', '$PS6', '$PS7',
			'PENDING', '$Sign1_1', '$Sign1_2', '$Sign2_1', '$Sign2_2', '$Sign3_1', '$Sign3_2')");

	if ($con->query($sql) === TRUE) { $last_id = $con->insert_id; }
	else { echo "Error: " . $sql . "<br>" . $con->error; }


	//Inserting Data into Financial Plan Proposal Table
	$sql = ("INSERT INTO financial_plan_monitoring
		(MonitoringID,
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
	
	if ($command = $con->query($sql) === TRUE) { }
	else {
		echo "<script>
			alert('FAILED TO Insert Financial Plan. Try Again!');
			window.location.href='CreateProposal.php';
		</script>";
	}

	//Update Remarks_2 for Create_alagilan Table
	$sql = ("UPDATE create_alangilan
			SET Remarks_2 = '$DateTime'
			WHERE ProposalID = $PID");
	$command = $con->query($sql);

	//Update Last_Monitored for Monitoring table
	$sql = ("UPDATE monitoring_alangilan
			SET Last_Monitored = '$DateTime'
			WHERE MonitoringID = $last_id");
	$command = $con->query($sql);



	echo "<script>
			alert('Monitoring Successfully Created');
			window.location='Monitoring-pending.php';
		</script>";
}

?>
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