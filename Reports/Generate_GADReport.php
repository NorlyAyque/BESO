<?php
session_start();
include("../Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

if((isset($_GET['Year']) == FALSE) AND (isset($_GET['Quarter'])== FALSE)) {
	echo "<center> <br>";
	echo("<h1> Please Select Year and Quarter </h1>");
	echo "<h2> <a href='../GADReport.php'> RETURN <a> </h2>";
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
<title>Generate GAD Report</title>
<link rel="stylesheet" type="text/css" href="../styles/QuarterlyStatusGad-STYLES.css">

</head>
<body>
<div class="content1">
<div class="print">
	<!-- <button id="print_button"> PRINT </button> -->
	<button id="myBtn" onclick="ButtonClick()"> PRINT </button>
</div>
<table class="Gad-content">
	
		<tr>
			
			<td colspan="4"><img src ="../images/logo.png" class="logo">Reference No. : BatStateU-FO-ESO-03</td>
			<td colspan="4">Effectivity Date: May 18, 2022</td>
			<td colspan="2">Revision No. : 01</td>
		</tr>
		<tr>
			<th colspan="10"><center>Quarterly Report of GAD Programs,Project ang Activities (PPAs)</center></th>
		</tr>
		<tr>
			<th colspan="10"><center> <b><u><?php echo $Quarter;?></b></u> Quarter, FY <b><u><?php echo $Year; ?></b></u></center></th>
		</tr>
		<tr>
			<td colspan="10">Campus: BatStateU Alangilan</td>
		</tr>



		
		<tr>
			<th width="168px";>Title of<br> Implemented<br> PPAs</th>
			<th width="110px">Date/<br>Duration <br> (Number of hours)</th>
			<th width="150px";>No. of<br> beneficiaries <br>(Male and <br>Female)</th>
			<th width="150px">Tyes of <br>Beneficiaries</th>
			<th width="105px";>Location</th>
			<th width="198px";>Personal Involved<br>
				(Project Leader,<br> Asst.<br> Project Leader/s <br>Coordinator, etc.)</th>
			<th width="100px";>Approved <br>Budget</th>
			<th width="83px";>Actual<br> Cost</th>
			<th>PS <br>Attribution<br>(BatstateU <br>Participants)</th>
			<th width="90px";>Source <br>of<br> Fund</th>
		</tr>
<?php
//Display all PAPS with GAD
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $Year) AND
		(Quarter = $Q) AND
		(IsGAD = 'Yes')AND
		(Remarks = 'Evaluated')");
$command = $con->query($sql) or die("Error finding GAD Proposal");
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
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up


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
		<tr >
			<td class="font"><textarea style="height:80px;"><?php echo $No.". ".$Title; ?></textarea></td> <!-- Title of the Training -->
			<td class="font2nd"><textarea style="height:80px ;"><?php echo $Dateduration."&#13;".$NoOfHours." hours"; ?></textarea></td> <!-- Date/Duration (Number of Hours) -->
			<td class="font2nd"><textarea style="height:80px;"><?php echo "Headcount: ".$Total."&#10;&#10;"."Male: ".$Male."&#10;"."Female: ".$Female."&#10;&#10;"."Weighted by the length of training: ".$Weighted; ?></textarea></td> <!-- No of Beneficiaries -->
			<td class="font2nd"><textarea  style="width:90px;"><?php echo $Beneficiaries; ?></textarea></td> <!-- Type of Beneficiaries -->
			<td class="font2nd"><textarea><?php echo $Location; ?></textarea></td> <!-- Location -->
			<td class="font2nd"><textarea style="height:80px;" ><?php echo $People; ?></textarea></td> <!-- Personnel Involved -->
			<td class="font2nd"><textarea style="width:69px;"><?php echo $Cost; ?></textarea></td> <!-- Approved Budget -->
			<td class="font2nd"><textarea style="width:65px;"><?php echo $Cost; ?></textarea></td> <!-- Actual Cost -->
			<td class="font2nd"><textarea><?php echo ""; ?></textarea></td> <!-- PS -->
			<td class="font2nd"><textarea style="width:70px;"><?php echo $SourceFund; ?></textarea></td> <!-- Source of Fund -->
		</tr>
		
		
		<tr>
		
		</tr>
		
		
		
<?php }}?>	
</table>
<table class="GADsignatories">
	<tr>
		<th >Prepared by:</th>
		<th colspan="2">Checked by:</th>
		<th >Verified by:</th>
	</tr>
	<tr>
		<!-- PREPARED BY -->
		<td><div class="DrpSigna">	
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
			<textarea id = "PreparedByField" placeholder="type here..."><?php echo strtoupper($Fullname)."\n".$Position;?></textarea>Date Signed:
		</td>
		
		<!-- CHECKED BY 1-->
		<td>
		<div class="DrpSigna">	
			<select id="CheckedBy1Name">
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

			<select id="CheckedBy1Designation">
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
				<button id = "BtnCheckedBy1" onclick="CheckBy1()"> ✓ </button>
			</div>
			<textarea id="CheckedBy1Field" placeholder="type here..."></textarea>Date Signed:
		</td>

		<!-- CHECKED BY 2-->
		<td>
		<div class="DrpSigna">	
			<select id="CheckedBy2Name">
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
			<select id="CheckedBy2Designation">
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
				<button id = "BtnCheckedBy2" onclick="CheckBy2()"> ✓ </button>
			</div>
			<textarea id="CheckedBy2Field" placeholder="type here..."></textarea>Date Signed:
		</td>
		
		
		<!-- VERIFIED BY-->
		<td>
		<div class="DrpSigna">
			<select id="VerifiedByName">
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
			<select id="VerifiedByDesignation">
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
				<button id = "BtnVerified" onclick="Verified()"> ✓</button>
			</div>
			<textarea id="VerifiedByField" placeholder="type here..."></textarea>Date Signed:
		</td>
	</tr>
	
	
</table>
<table class="legend">
	<tr>
		<td>Required Attachments: Signed and approved: (1) PPA Proposal or Request Letter<br>
														(2) Narrative or Evaluation Report of the PPAs implemented</td>
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

	document.getElementById('CheckedBy1Name').style.display = 'none';
	document.getElementById('CheckedBy1Designation').style.display = 'none';
	document.getElementById('BtnCheckedBy1').style.display = 'none';

	document.getElementById('CheckedBy2Name').style.display = 'none';
	document.getElementById('CheckedBy2Designation').style.display = 'none';
	document.getElementById('BtnCheckedBy2').style.display = 'none';
	
	document.getElementById('VerifiedByName').style.display = 'none';
	document.getElementById('VerifiedByDesignation').style.display = 'none';
	document.getElementById('BtnVerified').style.display = 'none';
}

function show(){
	document.getElementById('myBtn').style.display = 'block';

	document.getElementById('PreparedByName').style.display = 'block';
	document.getElementById('PreparedByDesignation').style.display = 'block';
	document.getElementById('BtnPreparedBy').style.display = 'block';

	document.getElementById('CheckedBy1Name').style.display = 'block';
	document.getElementById('CheckedBy1Designation').style.display = 'block';
	document.getElementById('BtnCheckedBy1').style.display = 'block';

	document.getElementById('CheckedBy2Name').style.display = 'block';
	document.getElementById('CheckedBy2Designation').style.display = 'block';
	document.getElementById('BtnCheckedBy2').style.display = 'block';

	document.getElementById('VerifiedByName').style.display = 'block';
	document.getElementById('VerifiedByDesignation').style.display = 'block';
	document.getElementById('BtnVerified').style.display = 'block';

}
</script>




<script>
//For Signatories Dropdown
function PreparedBy(){
	var x = document.getElementById("PreparedByName").value;
	var y = document.getElementById("PreparedByDesignation").value;
	document.getElementById("PreparedByField").value = x+"\n"+y;
}

function CheckBy1(){
	var x = document.getElementById("CheckedBy1Name").value;
	var y = document.getElementById("CheckedBy1Designation").value;
	document.getElementById("CheckedBy1Field").value = x+"\n"+y;
}

function CheckBy2(){
	var x = document.getElementById("CheckedBy2Name").value;
	var y = document.getElementById("CheckedBy2Designation").value;
	document.getElementById("CheckedBy2Field").value = x+"\n"+y;
}

function Verified(){
	var x = document.getElementById("VerifiedByName").value;
	var y = document.getElementById("VerifiedByDesignation").value;
	document.getElementById("VerifiedByField").value = x+"\n"+y;
}

</script>