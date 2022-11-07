<?php
session_start();
include("Connection.php");

//Get selected Year and Quarter from Reports.php
if((isset($_GET['Year'])) AND (isset($_GET['Quarter']))) {
	$Year = $_GET['Year'];
	$Q = $_GET['Quarter'];
	if ($Q == 1){$Quarter = "First";}
	else if ($Q == 2){$Quarter = "Second";}
	else if ($Q == 3){$Quarter = "Third";}
	else if ($Q == 4){$Quarter = "Fourth";}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Generate QMR</title>
<link rel="stylesheet" type="text/css" href="styles/QuarterlyStatusGad.css">
</head>

<body>
<div class="content">
	<table>
		<tr>
			<td colspan="13"><center><b> Quarterly Monitoring Report </b><br>Extension Services <br>Programs,Acivities and Projects</center></td>
		</tr>
		<tr>
			<td colspan="13"><center>Fiscal Year: <u><b><?php echo $Year;?></b></u> Quarter: <u><b><?php echo $Quarter;?></b></u></center></td>
		</tr>
		<tr>
			<td colspan="13"><i>A. trainess weighted by the lenght of training / percentage of beneficiaries who rate the training course/s as satisfactory or higher terms of quality and relevance</i></td>
		</tr>
		<tr>
			<th width="45px";>No.</th>
			<th width="120px";>TITLE OF <br>TRAINING</th>
			<th colspan="2" width="280px";>INCLUSIVE<br> DATES</th>
			<th width="107px";>DURATION</th>
			<th width="110px";>NO. OF<br> TRAINEES</th>
			<th width="140px";>TRAINESS<br> WEIGHTED BY <br>THE LENGTH <br>OF TRAINING</th>
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
			<td colspan="13"> <center> Alangilan Campus </center></td>
		</tr>
		<tr>
			<td colspan="13"> College of Industrial Technology </td>
		</tr>
<?php
//Display all PAPS under CIT
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%CIT%' OR Office LIKE '%College of Industrial Technology%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
$No = 0;
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
		if ($NoOfHours <= 7 ){
			echo $Duration = "0.5";
		}else if ($NoOfHours <= 8 OR $NoOfHours <= 15){
			echo $Duration = "1";
		}else if ($NoOfHours <= 16 OR $NoOfHours <= 23){
			echo $Duration = "2";
		}else if ($NoOfHours <= 24 OR $NoOfHours <= 31){
			echo $Duration = "3";
		}else if ($NoOfHours >= 32 ){
			echo $Duration = "4";
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
?>
		<tr class="font">
			<td><?php echo $No; ?></td> <!-- No -->
			<td><textarea><?php echo $Title; ?></textarea></td> <!-- Title of the Training -->
			<td><textarea><?php echo $Date1; ?></textarea></td> <!-- Date From -->
			<td><textarea><?php echo $Date2; ?></textarea></td> <!-- Date To -->
			<td><textarea><?php echo $Duration; ?></textarea></td> <!-- Duration-->
			<td><textarea><?php echo $Trainees; ?></textarea></td> <!-- No. of Trainees -->
			<td><textarea><?php echo $Weighted; ?></textarea></td> <!-- Weighted -->
			<td><textarea><?php echo $Poor; ?></textarea></td> <!-- P -->
			<td><textarea><?php echo $Fair; ?></textarea></td> <!-- F -->
			<td><textarea><?php echo $Satisfactory; ?></textarea></td> <!-- S -->
			<td><textarea><?php echo $VerySatisfactory; ?></textarea></td> <!-- VS -->
			<td><textarea><?php echo $Excellent; ?></textarea></td> <!-- E -->
			<td><textarea><?php echo ""; ?></textarea></td> <!-- Proof -->
		</tr>
<?php }}?>



	</table>
</div>	

<button id="print_button"> PRINT </button>
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
