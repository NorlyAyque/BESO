<?php
session_start();
include("../Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Get selected Year and Quarter from Reports.php
if((isset($_GET['Year']) == FALSE) AND (isset($_GET['Quarter'])== FALSE)) {
	echo "<center> <br>";
	echo("<h1> Please Select Year and Quarter </h1>");
	echo "<h2> <a href='../Reports.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}else{
	$Year = $_GET['Year'];
	$Q = $_GET['Quarter'];
	if ($Q == 1){$Quarter = "First";}
	else if ($Q == 2){$Quarter = "Second";}
	else if ($Q == 3){$Quarter = "Third";}
	else if ($Q == 4){$Quarter = "Fourth";}
}
//Getting Data declared from index.php
$Fullname = $_SESSION["FullName"];
$Position = $_SESSION["Position"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Generate QMR - CICS</title>
<link rel="stylesheet" type="text/css" href="../styles/QuarterlyStatusGad.css">
</head>

<body>
<div class="content">
	<div class="print">
		<button id="myBtn" onclick="ButtonClick()"> PRINT </button>
	</div>
	<table class="table-class">
		<tr>
			<th><center> Quarterly Monitoring Report</center></th>
		</tr>
		<tr>
			<td><center>Extension Services <br>Programs, Acivities and Projects</center></td>
		</tr>
		<tr>
			<td><center>Fiscal Year: <u><b><?php echo $Year;?></b></u> Quarter: <u><b><?php echo $Quarter;?></b></u></center></td>
		</tr>
	</table>
	<table class="table-trainess">
	<tr>
		<th><i>A. trainess weighted by the lenght of training / percentage of beneficiaries who rate the training course/s as satisfactory or higher terms of quality and relevance</i></th>
	</tr>
	</table>
	<table class="table2">
		<tr>
			<th><p style="width:30px;">No.</p></th>
			<th width="120px";>TITLE OF <br>TRAINING</th>
			<th colspan="2" width="280px";>INCLUSIVE<br> DATES</th>
			<th width="107px";>DURATION</th>
			<th width="110px";>NO. OF<br> TRAINEES</th>
			<th width="150px";>TRAINESS<br> WEIGHTED BY <br>THE LENGTH <br>OF TRAINING</th>
			<th colspan="5" width="140px";>QUALITY AND <br>RELEVANCE <br>RATING </th>
			<th width="110px";>PROOF OF<br> IMPLEMETAION<br>(reference)</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<th width="80px";>From: <br> (mm/dd/yy)</th>
			<th width="80px";>To: <br> (mm/dd/yy)</th>
			<td></td>
			<td></td>
			<td></td>
			<th>P</th>
			<th>F</th>
			<th>S</th>
			<th width="42px";>VS</th>
			<th>E</th>
			<td></td>
		</tr>
		<tr>
			<td colspan="13"> <center> <b> Alangilan Campus </b></center></td>
		</tr>
<?php
$No = 0;
$TotalDuration = 0;
$TotalTrainees = 0;
$TotalWeight = 0;
$TotalP = 0;
$TotalF = 0;
$TotalS = 0;
$TotalVS = 0;
$TotalE = 0;
?>

		<tr>
			<td colspan="13"> <b> College of Informatics and Computing Sciences </b></td>
		</tr>
<?php
//Display all PAPS under CICS
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%CICS%' OR Office LIKE '%College of Informatics and Computing Sciences%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];
		$SD = $result['Start_Date'];	$CDate1 = date_create("$SD"); $Date1 = date_format($CDate1,"m/d/Y");
		$ED = $result['End_Date'];		$CDate2 = date_create("$ED"); $Date2 = date_format($CDate2,"m/d/Y");

		$ST = $result['Start_Time'];
		$ET = $result['End_Time'];

		$time1 = date_create($ST); 		$Start_Time = date_format($time1,"h:i:s A");
		$time2 = date_create($ET); 		$End_Time = date_format($time2,"h:i:s A");

		//Getting Number of Days
		$dateinterval = date_diff($CDate1, $CDate2);
		$x = $dateinterval->format('%a');//Whole Number

		if ($x == 0){ //Same Day = 0 = 1 day (8hrs)
			$NoOfDays = $dateinterval->format('%a') + 1;
		}else{ //Not same day = 2 days or more
			$NoOfDays = $dateinterval->format('%a') +1;
		}
	
		//Getting Number of Hours
		$timeinterval = date_diff($time1, $time2);
		$TimeResult = $timeinterval->format('%h'); //8 hrs = 1 DAY (7:00-4:00 = 9hrs - 1 = 8hrs)
	
		$NoOfHours = $TimeResult * $NoOfDays; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up

		//Getting number of trainees from Evaluation MFT 
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Trainees = $result2['MFT'];
			$Excellent = $result2['Eval1AT'];
			$VerySatisfactory = $result2['Eval1BT'];
			$Satisfactory = $result2['Eval1CT'];
			$Fair = $result2['Eval1DT'];
			$Poor = $result2['Eval1ET'];
			
		$Weighted = $Duration * $Trainees;
		$No++; //For auto numbering

		$TotalDuration += $Duration;
		$TotalTrainees += $Trainees;
		$TotalWeight += $Weighted;
		$TotalP += $Poor;
		$TotalF += $Fair;
		$TotalS += $Satisfactory;
		$TotalVS += $VerySatisfactory;
		$TotalE += $Excellent;
?>
		<tr >
			<td><?php echo $No;?></td> <!-- No -->
			<td class="font"> <textarea style="width:200px;"><?php echo $Title; ?></textarea></td> <!-- Title of the Training -->
			<td class="font2nd"><textarea style="width:100px;"><?php echo $Date1; ?></textarea></td> <!-- Date From -->
			<td class="font2nd"><textarea style="width:100px;"><?php echo $Date2; ?></textarea></td> <!-- Date To -->
			<td class="font2nd"><textarea style="width:90px;"><?php echo $Duration; ?></textarea></td> <!-- Duration-->
			<td class="font2nd"><textarea style="width:100px;"><?php echo $Trainees; ?></textarea></td> <!-- No. of Trainees -->
			<td class="font2nd"><textarea style="width:130px;"><?php echo $Weighted; ?></textarea></td> <!-- Weighted -->
			<td class="font2nd"><textarea style="width:50px;"><?php echo $Poor; ?></textarea></td> <!-- P -->
			<td class="font2nd"><textarea style="width:50px;"><?php echo $Fair; ?></textarea></td> <!-- F -->
			<td class="font2nd"><textarea style="width:50px;"><?php echo $Satisfactory; ?></textarea></td> <!-- S -->
			<td class="font2nd"><textarea style="width:50px;"><?php echo $VerySatisfactory; ?></textarea></td> <!-- VS -->
			<td class="font2nd"><textarea style="width:50px;"><?php echo $Excellent; ?></textarea></td> <!-- E -->
			<td class="font2nd"><textarea><?php echo ""; ?></textarea></td> <!-- Proof -->
		</tr>
<?php }}?>

		<tr style="font-weight:bold;">
			<td></td>
			<td>Sub-total: <?php echo $No; ?></td><!-- Sub Total-->
			<td></td>
			<td></td>
			<td align="center"><?php echo $TotalDuration; ?></td> <!-- Total Duration-->
			<td align="center"><?php echo $TotalTrainees; ?></td> <!-- Total Trainees-->
			<td align="center"><?php echo $TotalWeight; ?></td> <!-- Total Weight-->
			<td align="center"><?php echo $TotalP; ?></td> <!-- Total P-->
			<td align="center"><?php echo $TotalF; ?></td> <!-- Total F-->
			<td align="center"><?php echo $TotalS; ?></td> <!-- Total S-->
			<td align="center"><?php echo $TotalVS; ?></td> <!-- Total VS-->
			<td align="center"><?php echo $TotalE; ?></td> <!-- Total E-->
			<td></td>
		</tr>

	</table>

	<table class="legend">
		<tr>
			<td>[1] - 0.5 = Less than 8hrs; 1 = 8 hours or 1 day; 1.25 = 2 days; 1.50 = 3 to 4 days; 2 =  5 days or more</td>
		</tr>
		<tr>
			<td>[2] - Annex A: Extension Program Write-up describing the program framwork and the actual implementaion
			<br> Annex B: MOA/Other similar supporting Documents
			</td>
		</tr>
		<tr>
			<td><br>*A copy of the monitoring reports assigned to contituent campuses must be submitted to the Office of the Director for Extension Services for consolidation</td>
		</tr>
	</table>
	
	<table class="signatories">
		<tr>
			<th>Prepared by:</th>
			<th>Reviewed by:</th>
			<th>Approved by:</th>
			<th>Received by:</th>
		</tr>
		<tr>
			<!-- PREPARED BY -->
			<td>
				<select id="PreparedByName">
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
								
				<br>

				<select id="PreparedByDesignation">
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
				<button id = "BtnPreparedBy" onclick="PreparedBy()"> GET </button>
				<textarea id = "PreparedByField" placeholder="type here..."><?php echo strtoupper($Fullname)."\n".$Position;?></textarea>Date Signed:
			</td>
			
			<!-- REVIEWED BY -->
			<td>
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
									
				<br>

				<select id="ReviewedByDesignation">
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
				<button id = "BtnReviewedBy" onclick="ReviewedBy()"> GET </button>
				<textarea id="ReviewedByField" placeholder="type here..."></textarea>Date Signed:
			</td>

			<!-- APPROVED BY -->
			<td>
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
									
				<br>

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
				<button id = "BtnApprovedBy" onclick="ApprovedBy()"> GET </button>
				<textarea id="ApprovedByField" placeholder="type here..."></textarea>Date Signed:
			</td>

			<!-- RECEIVED BY -->
			<td>
				<select id="ReceivedName">
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
									
				<br>

				<select id="ReceivedDesignation">
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
				<button id = "BtnReceived" onclick="Received()"> GET </button>
				<textarea id="ReceivedField" placeholder="type here..."></textarea>Date Signed:
			</td>
		</tr>
	</table>
</div>	
</body>
</html>

<script>
function ButtonClick(){
	hide();
	window.print();
	show();
}

function hide(){
	document.getElementById('myBtn').style.display = 'none';

	document.getElementById('PreparedByName').style.display = 'none';
	document.getElementById('PreparedByDesignation').style.display = 'none';
	document.getElementById('BtnPreparedBy').style.display = 'none';

	document.getElementById('ReviewedByName').style.display = 'none';
	document.getElementById('ReviewedByDesignation').style.display = 'none';
	document.getElementById('BtnReviewedBy').style.display = 'none';

	document.getElementById('ApprovedByName').style.display = 'none';
	document.getElementById('ApprovedByDesignation').style.display = 'none';
	document.getElementById('BtnApprovedBy').style.display = 'none';

	document.getElementById('ReceivedName').style.display = 'none';
	document.getElementById('ReceivedDesignation').style.display = 'none';
	document.getElementById('BtnReceived').style.display = 'none';
}

function show(){
	document.getElementById('myBtn').style.display = 'block';

	document.getElementById('PreparedByName').style.display = 'block';
	document.getElementById('PreparedByDesignation').style.display = 'block';
	document.getElementById('BtnPreparedBy').style.display = 'block';

	document.getElementById('ReviewedByName').style.display = 'block';
	document.getElementById('ReviewedByDesignation').style.display = 'block';
	document.getElementById('BtnReviewedBy').style.display = 'block';

	document.getElementById('ApprovedByName').style.display = 'block';
	document.getElementById('ApprovedByDesignation').style.display = 'block';
	document.getElementById('BtnApprovedBy').style.display = 'block';

	document.getElementById('ReceivedName').style.display = 'block';
	document.getElementById('ReceivedDesignation').style.display = 'block';
	document.getElementById('BtnReceived').style.display = 'block';
}
</script>

<script>
//For Signatories Dropdown
function PreparedBy(){
	var x = document.getElementById("PreparedByName").value;
	var y = document.getElementById("PreparedByDesignation").value;
	document.getElementById("PreparedByField").value = x+"\n"+y;
}

function ReviewedBy(){
	var x = document.getElementById("ReviewedByName").value;
	var y = document.getElementById("ReviewedByDesignation").value;
	document.getElementById("ReviewedByField").value = x+"\n"+y;
}

function ApprovedBy(){
	var x = document.getElementById("ApprovedByName").value;
	var y = document.getElementById("ApprovedByDesignation").value;
	document.getElementById("ApprovedByField").value = x+"\n"+y;
}

function Received(){
	var x = document.getElementById("ReceivedName").value;
	var y = document.getElementById("ReceivedDesignation").value;
	document.getElementById("ReceivedField").value = x+"\n"+y;
}
</script>