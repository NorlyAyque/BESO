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
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Update Monitoring</title>
<link rel="stylesheet" type="text/css" href="styles/EditMonitoring-style.css">

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
					<span class ="title">  Evaluation Reports</span>
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
						
						
				  </div>
				</div>
				
				<div class="fillup">
				  <div class="input-field">
						
						<label> X. Beneficiaries<i>(Type and Number of Male and Female)</i></label>
						<textarea placeholder="type here..." name="Beneficiaries" required><?Php echo $dbBeneficiaries; ?></textarea> 
						
						<center><label> Xl. Project Status<label></center><br>
						
						<label>1. As to purpose (how far has the purpose been attained)</label>
						<textarea placeholder="type here..." name="PS1" required><?Php echo $dbPS1; ?></textarea> 
						
						<label>2. Availability of materials</label>
						<textarea placeholder="type here..." name="PS2" required><?Php echo $dbPS2; ?></textarea> 
						
						<label>3. Schedule of activities</label>
						<textarea placeholder="type here..." name="PS3" required><?Php echo $dbPS3; ?></textarea> 
						
						
						<label> 4. Financial report<label>
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
					<th width="40%"> Name </th>
					<th width="40%"> Designation </th>
				</tr>
				<tr>
					<td> Prepared by:</td>	
					<td><textarea placeholder="..." name="Sign1_1" required><?php echo strtoupper($Fullname);?></textarea></td>
					<td><textarea placeholder="..." name="Sign1_2" required><?php echo $Position; ?></textarea></td>
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
						<textarea placeholder="..." id="Sign2_2" name="Sign2_2" required><?php echo "dbSign2_2"; ?></textarea>
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
						<textarea placeholder="..." id="Sign3_1" name="Sign3_1" required><?php echo "dbSign3_1"; ?></textarea>
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
						<textarea placeholder="..." id="Sign3_2" name="Sign3_2" required><?php echo "dbSign3_2"; ?></textarea>
					</td>
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

	$sql = ("UPDATE monitoring_alangilan
		SET Title = '$Title', Location_Area = '$Location_Area', Duration = '$Duration', 
			TypeCES = '$TypeCES', SDG = '$SDG', 
			Office = '$Office', Programs = '$Programs', People = '$People', Agency = '$Agency', 
			Beneficiaries = '$Beneficiaries',
			PS1 = '$PS1', PS2 = '$PS2', PS3 = '$PS3',
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
			PS5 = '$PS5', PS6 = '$PS6', PS7 = '$PS7',
			Sign1_1 = '$Sign1_1', Sign1_2 = '$Sign1_2', Sign2_1 = '$Sign2_1',
			Sign2_2 = '$Sign2_2', Sign3_1 = '$Sign3_1', Sign3_2 = '$Sign3_2'
		WHERE MonitoringID = $MID");
	
	if ($command = $con->query($sql) === TRUE) {
		echo "<script>
				alert('Monitoring Successfully Updated');
				window.location='EditMonitoring.php?edit=$MID';
			</script>";
	  } else {
		echo "<script>
				alert('PROCESS FAILED Try Again!');
				window.location.href='CreateProposal.php';
			</script>";
	  }
}

?>
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