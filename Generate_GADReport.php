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
<title>Generate GAD Report</title>
<link rel="stylesheet" type="text/css" href="styles/QuarterlyStatusGad.css">

</head>
<body>
<div class="content">

<table>
	
		<tr>
			<td colspan="4"><img src ="images/logo.png" class="logo">Reference No.:</td>
			<td colspan="4">Effectivity Date:</td>
			<td colspan="2">Revision No.:</td>
		</tr>
		<tr>
			<td colspan="10"><center>Quarterly Report of GAD Programs,Project ang Activities (PPAs)</center></td>
		</tr>
		<tr>
			<td colspan="10"><center> <b><u><?php echo $Quarter;?></b></u> Quarter, FY <b><u><?php echo $Year; ?></b></u></center></td>
		</tr>
		<tr>
			<td colspan="10">Campus: BatStateU Alangilan</td>
		</tr>
		<tr>
			<th width="168px";>Title of<br> Implementated<br> PPAs</th>
			<th width="110px">Date/<br>Duration <br> (Number of hours)</th>
			<th width="150px";>No. of<br> beneficiaries <br>(Male and <br>Female)</th>
			<th width="150px">Tyes of <br>Beneficiaries</th>
			<th width="105px";>Location</th>
			<th width="198px";>Personal Involved<br>
				(Project Leader,<br> Asst.<br> Project Leader/s <br>Coordinator, etc.)</th>
			<th width="100px";>Approved <br>Budget</th>
			<th width="83px";>Actual<br> Cost</th>
			<th width="100px";>PS Attribution(BatstateU Participants)</th>
			<th width="90px";>Source <br>of<br> Fund</th>
		</tr>
<?php
//Display all PAPS under CIT
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(IsGAD = 'Yes')AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];

		$SD = $result['Start_Date'];	$CDate1 = date_create("$SD"); $Date1 = date_format($CDate1,"F, d Y");
		$ED = $result['End_Date'];		$CDate2 = date_create("$ED"); $Date2 = date_format($CDate2,"F, d Y");
		$ST = $result['Start_Time'];
		$ET = $result['End_Time'];

		$Cost = $result['Cost'];
		$SourceFund = $result['SourceFund'];

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


		//Getting number of trainees from Evaluation Table
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Beneficiaries = $result2['Beneficiaries'];
			$Male = $result2['MT'];
			$Female = $result2['FT'];
			$Total = $result2['MFT'];
			$Location = $result2['Location_Area'];
			$People = $result2['People'];

		$Dateduration = $Date1." - ".$Date2. " / ".$NoOfDays. "day(s)";
		$Weighted = $Duration * $Total;
		$No++; //For auto numbering
?>
		<tr class="font">
			<td><textarea><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td><textarea><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date/Duration (Number of Hours) -->
			<td><textarea><?php echo "Headcount: ".$Total."&#10;&#10;"."Male: ".$Male."&#10;"."Female: ".$Female."&#10;&#10;"."Weighted by the length of training: ".$Weighted; ?></textarea></td> <!-- No of Beneficiaries -->
			<td><textarea><?php echo $Beneficiaries; ?></textarea></td> <!-- Type of Beneficiaries -->
			<td><textarea><?php echo $Location; ?></textarea></td> <!-- Location -->
			<td><textarea><?php echo $People; ?></textarea></td> <!-- Personnel Involved -->
			<td><textarea><?php echo $Cost; ?></textarea></td> <!-- Approved Budget -->
			<td><textarea><?php echo $Cost; ?></textarea></td> <!-- Actual Cost -->
			<td><textarea><?php echo ""; ?></textarea></td> <!-- PS -->
			<td><textarea><?php echo $SourceFund; ?></textarea></td> <!-- Source of Fund -->
		</tr>
<?php }}?>	

</table>
</div>





























	
<body>
</html>