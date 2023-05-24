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
	echo "<h2> <a href='../StatusReport.php'> RETURN <a> </h2>";
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
<title>Generate Status Report - Alangilan</title>
<link rel="stylesheet" type="text/css" href="../styles/Generate_StatusReports.css">

</head>
<body>
<div class="content">
	<div class="print">
		<button id="myBtn" onclick="ButtonClick()"> PRINT </button>
	</div>
<table class="header1">
		<tr>
			<td colspan="3"><img src ="../images/logo.png" class="logo">Reference No. : BatStateU-FO-ESO-03</td>
			<td colspan="4">Effectivity Date: May 18, 2022</td>
			<td colspan="3">Revision No.: 01</td>
		</tr>
		<tr>
			<td colspan="3">Name of SUC: <b><u>BATANGAS STATE UNIVERSITY<br>
							THE NATIONAL ENGINEERING UNIVERSITY</b></u> </td>
			<td colspan="4"></td>
			<td colspan="3"><b><u>REGION lV-A</b></u></td>
		</tr>

</table>

<table class="header1">		
		<tr>
		
			<td colspan="10"><center><b>Status Report of Extension Programs, Project and Acivity (PAPs)</b></center></td>	
		</tr>
		<tr>
			<td colspan="10"><center><b><u><?php echo $Quarter; ?></u> Quarter, Fy <u><?php echo $Year;?></u></b></center></td>	
		</tr>
</table>

<table class="header3">

		<tr>
			<th width="155px";>Title of Projects</th>
			<th width="130px";>Sustainable<br> Development<br> Goals</th>
			<th width="90px";>Date/<br>Duration</th>
			<th width ="220px";>Documentation</th>
			<th width="110px";>No. of <br>(Male and <br>Female <br> Beneficiaries)</th>
			<th width="130px";>Beneficiaries</th>
			<th width="120px";>Location</th>
			<th width="120px";>Extensionist </th>
			<th width="100px">Budget <br>Allocation</th>
			<th width="70px">Source <br>of<br> fund</th>
		</tr>
		<tr>
			<td colspan="10"><b> Implemented Projects </b></td>
		</tr>
		<tr>
			<td colspan="10"> <b><i> College of Insdustrial Technology </i></b></td>
		</tr>

<?php
//Display all PAPS under CIT
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$TypeCES = $result['TypeCES'];
		$Title = $result['Title'];
		$SDG = $result['SDG'];

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
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up

		$Dateduration = $Date1." - ".$Date2. " / ".$NoOfDays. "day(s)";

		//Getting number of trainees from Evaluation Table
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Narrative = $result2['Narrative'];
			$Beneficiaries = $result2['Beneficiaries'];
			$Male = $result2['M2'];							//$Male = $result2['MT'];
			$Female = $result2['F2'];						//$Female = $result2['FT'];
			$Location = $result2['Location_Area'];
			$People = $result2['People'];
		$No ++;
?>
		<tr class="font1">
			<td colspan="10"><textarea style="width:50%;"><?php echo $TypeCES;?></textarea></td> <!-- TYPE CES -->
		</tr>
		<tr>
			<td class="font"><textarea style="height:80px; "><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td class="font"><textarea style="height:80px; "><?php echo $SDG; ?> </textarea></td> <!-- SDG-->
			<td class="font2nd"><textarea style="height:80px;"><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date Duration-->
			<td class="font2nd"><textarea style="height:80px;"><?php echo $Narrative; ?> </textarea></td> <!-- Documentation-->
			<td class="font2nd"><textarea style="width:90px;"><?php echo $Male." - Male"."&#13;".$Female." - Female"; ?> </textarea></td> <!-- Male/Female-->
			<td class="font2nd"><textarea style="width:85px; "><?php echo $Beneficiaries; ?> </textarea></td> <!-- Beneficiaries-->
			<td class="font2nd"><textarea style="width:70px; height:80px;"><?php echo $Location; ?> </textarea></td> <!-- Location-->
			<td class="font"><textarea style="width:110px; height:100px;"><?php echo $People; ?> </textarea></td> <!-- Extensionist-->
			<td class="font2nd"><textarea style="width:80px;"><?php echo $Cost; ?> </textarea></td> <!-- Budget-->
			<td class="font2nd"><textarea><?php echo $SourceFund; ?> </textarea></td> <!-- Source fund-->
		</tr>
<?php }}?>

		<tr>
			<td colspan="10"> <b><i> College of Informatics and Computing Sciences </i></b></td>
		</tr>

<?php
//Display all PAPS under CICS
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$TypeCES = $result['TypeCES'];
		$Title = $result['Title'];
		$SDG = $result['SDG'];

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
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up

		$Dateduration = $Date1." - ".$Date2. " / ".$NoOfDays. "day(s)";

		//Getting number of trainees from Evaluation Table
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Narrative = $result2['Narrative'];
			$Beneficiaries = $result2['Beneficiaries'];
			$Male = $result2['M2'];							//$Male = $result2['MT'];
			$Female = $result2['F2'];						//$Female = $result2['FT'];
			$Location = $result2['Location_Area'];
			$People = $result2['People'];
		$No ++;
?>
		<tr class="font1">
			<td colspan="10"><textarea style="width:50%;"><?php echo $TypeCES;?></textarea></td> <!-- TYPE CES -->
		</tr>
		<tr class="font">
			<td><textarea style="height:80px; "><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td><textarea style="height:80px; text-align:left;"><?php echo $SDG; ?> </textarea></td> <!-- SDG-->
			<td><textarea style="height:80px;"><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date Duration-->
			<td><textarea style="height:80px;"><?php echo $Narrative; ?> </textarea></td> <!-- Documentation-->
			<td><textarea style="width:90px;"><?php echo $Male." - Male"."&#13;".$Female." - Female"; ?> </textarea></td> <!-- Male/Female-->
			<td><textarea style="width:85px; "><?php echo $Beneficiaries; ?> </textarea></td> <!-- Beneficiaries-->
			<td><textarea style="width:70px; height:80px;"><?php echo $Location; ?> </textarea></td> <!-- Location-->
			<td><textarea style="width:110px; height:100px; text-align:left;"><?php echo $People; ?> </textarea></td> <!-- Extensionist-->
			<td><textarea style="width:80px;"><?php echo $Cost; ?> </textarea></td> <!-- Budget-->
			<td><textarea><?php echo $SourceFund; ?> </textarea></td> <!-- Source fund-->
		</tr>
<?php }}?>

		<tr>
			<td colspan="10"> <b><i> College of Architecture, Fine Arts and Design </i></b></td>
		</tr>

<?php
//Display all PAPS under CAFAD
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$TypeCES = $result['TypeCES'];
		$Title = $result['Title'];
		$SDG = $result['SDG'];

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
		
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$Dateduration = $Date1." - ".$Date2. " / ".$NoOfDays. "day(s)";

		//Getting number of trainees from Evaluation Table
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Narrative = $result2['Narrative'];
			$Beneficiaries = $result2['Beneficiaries'];
			$Male = $result2['M2'];							//$Male = $result2['MT'];
			$Female = $result2['F2'];						//$Female = $result2['FT'];
			$Location = $result2['Location_Area'];
			$People = $result2['People'];
		$No ++;
?>
		<tr class="font1">
			<td colspan="10"><textarea style="width:50%;"><?php echo $TypeCES;?></textarea></td> <!-- TYPE CES -->
		</tr>
		<tr class="font">
			<td><textarea style="height:80px; "><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td><textarea style="height:80px; text-align:left;"><?php echo $SDG; ?> </textarea></td> <!-- SDG-->
			<td><textarea style="height:80px;"><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date Duration-->
			<td><textarea style="height:80px;"><?php echo $Narrative; ?> </textarea></td> <!-- Documentation-->
			<td><textarea style="width:90px;"><?php echo $Male." - Male"."&#13;".$Female." - Female"; ?> </textarea></td> <!-- Male/Female-->
			<td><textarea style="width:85px; "><?php echo $Beneficiaries; ?> </textarea></td> <!-- Beneficiaries-->
			<td><textarea style="width:70px; height:80px;"><?php echo $Location; ?> </textarea></td> <!-- Location-->
			<td><textarea style="width:110px; height:100px; text-align:left;"><?php echo $People; ?> </textarea></td> <!-- Extensionist-->
			<td><textarea style="width:80px;"><?php echo $Cost; ?> </textarea></td> <!-- Budget-->
			<td><textarea><?php echo $SourceFund; ?> </textarea></td> <!-- Source fund-->
		</tr>
<?php }}?>

		<tr>
			<td colspan="10"> <b><i> College of Engineering</i></b></td>
		</tr>

<?php
//Display all PAPS under COE
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$TypeCES = $result['TypeCES'];
		$Title = $result['Title'];
		$SDG = $result['SDG'];

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
		
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$Dateduration = $Date1." - ".$Date2. " / ".$NoOfDays. "day(s)";

		//Getting number of trainees from Evaluation Table
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error finding Total number of Trainees");
		while($result2 = mysqli_fetch_array($command2))
		{
			$Narrative = $result2['Narrative'];
			$Beneficiaries = $result2['Beneficiaries'];
			$Male = $result2['M2'];							//$Male = $result2['MT'];
			$Female = $result2['F2'];						//$Female = $result2['FT'];
			$Location = $result2['Location_Area'];
			$People = $result2['People'];
		$No ++;
?>
		<tr class="font1">
			<td colspan="10"><textarea style="width:50%;"><?php echo $TypeCES;?></textarea></td> <!-- TYPE CES -->
		</tr>
		<tr class="font">
			<td><textarea style="height:80px; "><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td><textarea style="height:80px; text-align:left;"><?php echo $SDG; ?> </textarea></td> <!-- SDG-->
			<td><textarea style="height:80px;"><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date Duration-->
			<td><textarea style="height:80px;"><?php echo $Narrative; ?> </textarea></td> <!-- Documentation-->
			<td><textarea style="width:90px;"><?php echo $Male." - Male"."&#13;".$Female." - Female"; ?> </textarea></td> <!-- Male/Female-->
			<td><textarea style="width:85px; "><?php echo $Beneficiaries; ?> </textarea></td> <!-- Beneficiaries-->
			<td><textarea style="width:70px; height:80px;"><?php echo $Location; ?> </textarea></td> <!-- Location-->
			<td><textarea style="width:110px; height:100px; text-align:left;"><?php echo $People; ?> </textarea></td> <!-- Extensionist-->
			<td><textarea style="width:80px;"><?php echo $Cost; ?> </textarea></td> <!-- Budget-->
			<td><textarea><?php echo $SourceFund; ?> </textarea></td> <!-- Source fund-->
		</tr>
<?php }}?>

<!-- SIGNATORIES -->
		<tr>
			<th colspan="3" width="33%";>
				<p align="left">Prepared by: </p>
				<div class="DrpSigna">
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
				</div>				
				
				<div class="DrpSigna">
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
				</div>
				<div class="Getbtn">
					<button id = "BtnPreparedBy" onclick="PreparedBy()"> ✓ </button>
				</div>
				<p class="signatories"> <textarea id="PreparedByField" placeholder="type here..."><?php echo strtoupper($Fullname)."\n".$Position;?></textarea> </p>
			</th>


			<th colspan="4"  width="34%";>
				<p align="left">Reviewed by: </p>
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
				
				<div class="DrpSigna">
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
				</div>
				<div class="Getbtn">
					<button id = "BtnReviewedBy" onclick="ReviewedBy()"> ✓ </button>
				</div>
				<p class="signatories"> <textarea id="ReviewedByField" placeholder="type here..."></textarea> </p>
			</th>

			<th colspan="3"  width="33%";>
				<p align="left">Approved by: </p>
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
					<button id = "BtnApprovedBy" onclick="ApprovedBy()"> ✓ </button>
				</div>
				<p class="signatories"> <textarea id="ApprovedByField"placeholder="type here..."></textarea> </p>
			</th>
		</tr>
	</tbody>
</table>
</div>	

<h3> Attachments: </h3>
<table border="0" align="center">

<?php
//Display all Pictures under CIT
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
$No = 0;

while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];

		//Getting pictures from Eval Tablr
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error");
		while($result2 = mysqli_fetch_array($command2))
		{
			$dbPic1 = $result2['Pic1'];
			$dbCaption1 = $result2['Caption1'];
			$dbPic2 = $result2['Pic2'];
			$dbCaption2 = $result2['Caption2'];
			$dbPic3 = $result2['Pic3'];
			$dbCaption3 = $result2['Caption3'];
		$No++;

			echo "<tr> <td colspan='3'><b> $No. $Title </b></td></tr>";
			echo '
				<tr align="center">
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic1).'" alt="Image 1 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic2).'" alt="Image 2 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic3).'" alt="Image 3 Unavailable" width=400 height=210> </td>
				</tr>';
			echo "
				<tr align='center'>
					<td><b>$dbCaption1</b></td>
					<td><b>$dbCaption2</b></td>
					<td><b>$dbCaption3</b></td>
				</tr>";
		}
	}	
?>

<?php
//Display all Pictures under CICS
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;

while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];

		//Getting pictures from Eval Tablr
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error");
		while($result2 = mysqli_fetch_array($command2))
		{
			$dbPic1 = $result2['Pic1'];
			$dbCaption1 = $result2['Caption1'];
			$dbPic2 = $result2['Pic2'];
			$dbCaption2 = $result2['Caption2'];
			$dbPic3 = $result2['Pic3'];
			$dbCaption3 = $result2['Caption3'];
		$No++;

			echo "<tr> <td colspan='3'><b> $No. $Title </b></td></tr>";
			echo '
				<tr align="center">
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic1).'" alt="Image 1 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic2).'" alt="Image 2 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic3).'" alt="Image 3 Unavailable" width=400 height=210> </td>
				</tr>';
			echo "
				<tr align='center'>
					<td><b>$dbCaption1</b></td>
					<td><b>$dbCaption2</b></td>
					<td><b>$dbCaption3</b></td>
				</tr>";
		}
	}	
?>

<?php
//Display all Pictures under CAFAD
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;

while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];

		//Getting pictures from Eval Tablr
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error");
		while($result2 = mysqli_fetch_array($command2))
		{
			$dbPic1 = $result2['Pic1'];
			$dbCaption1 = $result2['Caption1'];
			$dbPic2 = $result2['Pic2'];
			$dbCaption2 = $result2['Caption2'];
			$dbPic3 = $result2['Pic3'];
			$dbCaption3 = $result2['Caption3'];
		$No++;

			echo "<tr> <td colspan='3'><b> $No. $Title </b></td></tr>";
			echo '
				<tr align="center">
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic1).'" alt="Image 1 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic2).'" alt="Image 2 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic3).'" alt="Image 3 Unavailable" width=400 height=210> </td>
				</tr>';
			echo "
				<tr align='center'>
					<td><b>$dbCaption1</b></td>
					<td><b>$dbCaption2</b></td>
					<td><b>$dbCaption3</b></td>
				</tr>";
		}
	}	
?>

<?php
//Display all Pictures under COE
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding Offices under CIT");
//$No = 0;

while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$Title = $result['Title'];

		//Getting pictures from Eval Tablr
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID ='$PID'");
		$command2 = $con->query($sql2) or die("Error");
		while($result2 = mysqli_fetch_array($command2))
		{
			$dbPic1 = $result2['Pic1'];
			$dbCaption1 = $result2['Caption1'];
			$dbPic2 = $result2['Pic2'];
			$dbCaption2 = $result2['Caption2'];
			$dbPic3 = $result2['Pic3'];
			$dbCaption3 = $result2['Caption3'];
		$No++;

			echo "<tr> <td colspan='3'><b> $No. $Title </b></td></tr>";
			echo '
				<tr align="center">
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic1).'" alt="Image 1 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic2).'" alt="Image 2 Unavailable" width=400 height=210> </td>
					<td> <img src="data:image/jpeg;base64,'.base64_encode($dbPic3).'" alt="Image 3 Unavailable" width=400 height=210> </td>
				</tr>';
			echo "
				<tr align='center'>
					<td><b>$dbCaption1</b></td>
					<td><b>$dbCaption2</b></td>
					<td><b>$dbCaption3</b></td>
				</tr>";
		}
	}	
?>

</table>

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

</script>
