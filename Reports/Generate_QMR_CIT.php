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
<title>Generate QMR</title>
<link rel="stylesheet" type="text/css" href="../styles/QuarterlyStatusGad.css">
</head>

<body>
<div class="content">
<div class="print">
		<button id="print_button"> PRINT </button>
	</div>
	<table class="table-class">
		<tr>
			<th><center> Quarterly Monitoring Report</center></th>
		</tr>
		<tr>
			<td><center>Extension Services <br>Programs,Acivities and Projects</center></td>
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
		<tr>
			<td colspan="13"> <b> College of Industrial Technology </b></td>
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

//Display all PAPS under CIT
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%CIT%' OR Office LIKE '%College of Industrial Technology%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");

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
		if ($NoOfHours <= 7 ){ //Less than 8 hrs
			$Duration = "0.5";
		}else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ //1 day
			$Duration = "1";
		}else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ //2 days
			$Duration = "1.25";
		}else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ // 3 - 4 days
			$Duration = "1.50";
		}else if ($NoOfHours >= 40 ){ // 5 days up
			$Duration = "2";
		}

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
			<td class="font"><textarea style="width:200px;"><?php echo $Title; ?></textarea></td> <!-- Title of the Training -->
			<td class="font2nd"><textarea style="width:100px;" ><?php echo $Date1; ?></textarea></td> <!-- Date From -->
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
			<td><textarea placeholder="type here..."><?php echo strtoupper($Fullname)."\n".$Position;?></textarea></td>
			<td><textarea placeholder="type here..."></textarea></td>
			<td><textarea placeholder="type here..."></textarea></td>
			<td><textarea placeholder="type here..."></textarea></td>
		</tr>
	</table>
</div>	
</body>
</html>

<script>
const btn = document.getElementById('print_button');
	btn.addEventListener('click', () => {
		btn.style.display = 'none';
		window.print(); 
		btn.style.display = 'block';
	});
</script>
