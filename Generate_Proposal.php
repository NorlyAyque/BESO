<?php
session_start();
require("FPDFLibrary/fpdf.php");
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

if (isset($_GET['view'])== False){ 
	echo "<center> <br>";
	echo("<h1> Please Select Proposal to Generate into PDF </h1>");
	echo "<h2> <a href='Proposal.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}else{
	$PID = $_GET['view'];
}

//With input PID, EID at MID but not existing in database
$sqlexist = ("SELECT COUNT(*) as TotalCount FROM create_alangilan WHERE ProposalID = '$PID'");
$commandexist = $con->query($sqlexist) or die("Error Fetching Data");
while($row = mysqli_fetch_array($commandexist)){$Count = $row['TotalCount'];}

if ($Count == 0){
	echo "<center> <br>";
	echo("<h1> Proposal ID does not exist. </h1>");
	echo "<h2> <a href='Proposal.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}

$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$dbInitiated = $result["Initiated"];
		$dbClassification = $result["Classification"];
		$dbunknown = $result["unknown"];
		$dbIsGAD = $result["IsGAD"];

		$dbTitle = $result['Title'];
		$dbLocation_Area = $result['Location_Area'];
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
		$dbCost = $result['Cost'];
		$dbSourceFund = $result['SourceFund'];
		$dbRationale = $result['Rationale'];
		$dbObjectives = $result['Objectives'];
		$dbDescriptions = $result['Descriptions'];

		$dbFunctional = $result['Functional'];
		$dbFrequency = $result['Frequency'];
		$dbMonitoring = $result['Monitoring'];
				
		$dbSign1_1 = $result['Sign1_1'];
		$dbSign1_2 = $result['Sign1_2'];
		$dbSign2_1 = $result['Sign2_1'];
		$dbSign2_2 = $result['Sign2_2'];
		$dbSign3_1 = $result['Sign3_1'];
		$dbSign3_2 = $result['Sign3_2'];
		$dbSign4_1 = $result['Sign4_1'];
		$dbSign4_2 = $result['Sign4_2'];
		$dbSign5_1 = $result['Sign5_1'];
		$dbSign5_2 = $result['Sign5_2'];
	}

//Displaying data from financial plan propsoal table
$sql = ("SELECT * FROM financial_plan_proposal WHERE ProposalID = $PID");
$command = $con->query($sql) or die("Error Fethcing data");
while($result = mysqli_fetch_array($command))
	{
		$dbFPR1_1 = $result['Item_1'];
		$dbFPR1_2 = $result['Qty_1'];
		$dbFPR1_3 = $result['Unit_1'];
		$dbFPR1_4 = $result['Cost_1'];
		$dbFPR1_5 = $result['Total_1'];

		$dbFPR2_1 = $result['Item_2'];
		$dbFPR2_2 = $result['Qty_2'];
		$dbFPR2_3 = $result['Unit_2'];
		$dbFPR2_4 = $result['Cost_2'];
		$dbFPR2_5 = $result['Total_2'];

		$dbFPR3_1 = $result['Item_3'];
		$dbFPR3_2 = $result['Qty_3'];
		$dbFPR3_3 = $result['Unit_3'];
		$dbFPR3_4 = $result['Cost_3'];
		$dbFPR3_5 = $result['Total_3'];

		$dbFPR4_1 = $result['Item_4'];
		$dbFPR4_2 = $result['Qty_4'];
		$dbFPR4_3 = $result['Unit_4'];
		$dbFPR4_4 = $result['Cost_4'];
		$dbFPR4_5 = $result['Total_4'];

		$dbFPR5_1 = $result['Item_5'];
		$dbFPR5_2 = $result['Qty_5'];
		$dbFPR5_3 = $result['Unit_5'];
		$dbFPR5_4 = $result['Cost_5'];
		$dbFPR5_5 = $result['Total_5'];

		$dbFPR6_1 = $result['Item_6'];
		$dbFPR6_2 = $result['Qty_6'];
		$dbFPR6_3 = $result['Unit_6'];
		$dbFPR6_4 = $result['Cost_6'];
		$dbFPR6_5 = $result['Total_6'];

		$dbFPR7_1 = $result['Item_7'];
		$dbFPR7_2 = $result['Qty_7'];
		$dbFPR7_3 = $result['Unit_7'];
		$dbFPR7_4 = $result['Cost_7'];
		$dbFPR7_5 = $result['Total_7'];

		$dbFPR8_1 = $result['Item_8'];
		$dbFPR8_2 = $result['Qty_8'];
		$dbFPR8_3 = $result['Unit_8'];
		$dbFPR8_4 = $result['Cost_8'];
		$dbFPR8_5 = $result['Total_8'];

		$dbFPR9_1 = $result['Item_9'];
		$dbFPR9_2 = $result['Qty_9'];
		$dbFPR9_3 = $result['Unit_9'];
		$dbFPR9_4 = $result['Cost_9'];
		$dbFPR9_5 = $result['Total_9'];

		$dbFPR10_1 = $result['Item_10'];
		$dbFPR10_2 = $result['Qty_10'];
		$dbFPR10_3 = $result['Unit_10'];
		$dbFPR10_4 = $result['Cost_10'];
		$dbFPR10_5 = $result['Total_10'];

		$dbFPR11_1 = $result['Item_11'];
		$dbFPR11_2 = $result['Qty_11'];
		$dbFPR11_3 = $result['Unit_11'];
		$dbFPR11_4 = $result['Cost_11'];
		$dbFPR11_5 = $result['Total_11'];

		$dbFPR12_1 = $result['Item_12'];
		$dbFPR12_2 = $result['Qty_12'];
		$dbFPR12_3 = $result['Unit_12'];
		$dbFPR12_4 = $result['Cost_12'];
		$dbFPR12_5 = $result['Total_12'];

		$dbFPR13_1 = $result['Item_13'];
		$dbFPR13_2 = $result['Qty_13'];
		$dbFPR13_3 = $result['Unit_13'];
		$dbFPR13_4 = $result['Cost_13'];
		$dbFPR13_5 = $result['Total_13'];

		$dbFPR14_1 = $result['Item_14'];
		$dbFPR14_2 = $result['Qty_14'];
		$dbFPR14_3 = $result['Unit_14'];
		$dbFPR14_4 = $result['Cost_14'];
		$dbFPR14_5 = $result['Total_14'];

		$dbFPR15_1 = $result['Item_15'];
		$dbFPR15_2 = $result['Qty_15'];
		$dbFPR15_3 = $result['Unit_15'];
		$dbFPR15_4 = $result['Cost_15'];
		$dbFPR15_5 = $result['Total_15'];

		$dbFPR16_1 = $result['Item_16'];
		$dbFPR16_2 = $result['Qty_16'];
		$dbFPR16_3 = $result['Unit_16'];
		$dbFPR16_4 = $result['Cost_16'];
		$dbFPR16_5 = $result['Total_16'];

		$dbFPR17_1 = $result['Item_17'];
		$dbFPR17_2 = $result['Qty_17'];
		$dbFPR17_3 = $result['Unit_17'];
		$dbFPR17_4 = $result['Cost_17'];
		$dbFPR17_5 = $result['Total_17'];

		$dbFPR18_1 = $result['Item_18'];
		$dbFPR18_2 = $result['Qty_18'];
		$dbFPR18_3 = $result['Unit_18'];
		$dbFPR18_4 = $result['Cost_18'];
		$dbFPR18_5 = $result['Total_18'];

		$dbFPR19_1 = $result['Item_19'];
		$dbFPR19_2 = $result['Qty_19'];
		$dbFPR19_3 = $result['Unit_19'];
		$dbFPR19_4 = $result['Cost_19'];
		$dbFPR19_5 = $result['Total_19'];

		$dbFPR20_1 = $result['Item_20'];
		$dbFPR20_2 = $result['Qty_20'];
		$dbFPR20_3 = $result['Unit_20'];
		$dbFPR20_4 = $result['Cost_20'];
		$dbFPR20_5 = $result['Total_20'];
	
		$dbGrandTotal = $result['GrandTotal'];
	}
	
//Displaying data from sustainability plan propsoal table
$sql = ("SELECT * FROM sustainability_plan_proposal WHERE ProposalID = $PID");
$command = $con->query($sql) or die("Error Fethcing data");
while($result = mysqli_fetch_array($command))
	{
		$dbSustainability = $result['Sustainability'];
		$dbSP1_1 = $result['Activities_1'];
		$dbSP1_2 = $result['Sched_1'];
		$dbSP1_3 = $result['Involved_1'];

		$dbSP2_1 = $result['Activities_2'];
		$dbSP2_2 = $result['Sched_2'];
		$dbSP2_3 = $result['Involved_2'];

		$dbSP3_1 = $result['Activities_3'];
		$dbSP3_2 = $result['Sched_3'];
		$dbSP3_3 = $result['Involved_3'];

		$dbSP4_1 = $result['Activities_4'];
		$dbSP4_2 = $result['Sched_4'];
		$dbSP4_3 = $result['Involved_4'];

		$dbSP5_1 = $result['Activities_5'];
		$dbSP5_2 = $result['Sched_5'];
		$dbSP5_3 = $result['Involved_5'];

		$dbSP6_1 = $result['Activities_6'];
		$dbSP6_2 = $result['Sched_6'];
		$dbSP6_3 = $result['Involved_6'];

		$dbSP7_1 = $result['Activities_7'];
		$dbSP7_2 = $result['Sched_7'];
		$dbSP7_3 = $result['Involved_7'];

		$dbSP8_1 = $result['Activities_8'];
		$dbSP8_2 = $result['Sched_8'];
		$dbSP8_3 = $result['Involved_8'];

		$dbSP9_1 = $result['Activities_9'];
		$dbSP9_2 = $result['Sched_9'];
		$dbSP9_3 = $result['Involved_9'];

		$dbSP10_1 = $result['Activities_10'];
		$dbSP10_2 = $result['Sched_10'];
		$dbSP10_3 = $result['Involved_10'];	

		$dbSP11_1 = $result['Activities_11'];
		$dbSP11_2 = $result['Sched_11'];
		$dbSP11_3 = $result['Involved_11'];

		$dbSP12_1 = $result['Activities_12'];
		$dbSP12_2 = $result['Sched_12'];
		$dbSP12_3 = $result['Involved_12'];

		$dbSP13_1 = $result['Activities_13'];
		$dbSP13_2 = $result['Sched_13'];
		$dbSP13_3 = $result['Involved_13'];

		$dbSP14_1 = $result['Activities_14'];
		$dbSP14_2 = $result['Sched_14'];
		$dbSP14_3 = $result['Involved_14'];

		$dbSP15_1 = $result['Activities_15'];
		$dbSP15_2 = $result['Sched_15'];
		$dbSP15_3 = $result['Involved_15'];

		$dbSP16_1 = $result['Activities_16'];
		$dbSP16_2 = $result['Sched_16'];
		$dbSP16_3 = $result['Involved_16'];

		$dbSP17_1 = $result['Activities_7'];
		$dbSP17_2 = $result['Sched_17'];
		$dbSP17_3 = $result['Involved_17'];

		$dbSP18_1 = $result['Activities_18'];
		$dbSP18_2 = $result['Sched_18'];
		$dbSP18_3 = $result['Involved_18'];

		$dbSP19_1 = $result['Activities_19'];
		$dbSP19_2 = $result['Sched_19'];
		$dbSP19_3 = $result['Involved_19'];

		$dbSP20_1 = $result['Activities_20'];
		$dbSP20_2 = $result['Sched_20'];
		$dbSP20_3 = $result['Involved_20'];	
	}

class PDF extends FPDF

{		
	function Header(){
		//$this->SetLineWidth(0.5); //for border thickness
		
		//For Border Size Long (8.5 * 13) or (215.9 * 330.2)
		//Set Margin to 0.5in or 12.7mm each sides
		
		//             Left  Top  Right  Bottom
		//$this->Rect(17.8, 15.2, 177.8, 307.5, 'D'); 
		$pageWidth = 215.9;
		$pageHeight = 330.2;
		$margin = 15;
		$this->Rect( $margin, $margin , $pageWidth - ($margin+$margin) , $pageHeight - ($margin*2.5)); 
	}
	
	function Footer(){
		if ($this->PageNo() == 1 ) {		
			//Tracking Number
			$this->SetXY(15,310);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,'Tracking Number ______________',0,0,'L');
			
			//Page Number
			$this->SetY(-15);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,'Page '.$this->PageNo().' of  {nb}',0,0,'R');
		}
		else {
			//Page Number
			$this->SetY(-15);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,'Page '.$this->PageNo().' of  {nb}',0,0,'R');
		}	
	}

	function Row1(){
		//=185.9
		$this->SetXY(15,15);
		$this->Image('images/logo.png',17,15,15,15); //Right-Top-Width-Height
		$this->Cell(20,15,"",1,0,'C');
		$this->Cell(65,15,'Reference No.: BatStateU-FO-ESO-01',1,0,'C');
		$this->Cell(60.9,15,'Effectivity Date: May 18, 2022',1,0,'C');
		$this->Cell(40,15,'Revision No.: 02',1,1,'C');
	}
	function Row2(){
		$this->SetXY(15,30);
		$this->Cell(185.9,10,"EXTENSION PROGRAM PLAN / PROPOSAL",1,1,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm',array(215.9,330.2)); //W*H
$pdf->AliasNbPages();
$pdf->SetMargins(20,20,10);//L-T-R-B
$pdf->SetAutoPageBreak(TRUE, 25); //For Bottom Margin
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf->Row1();
$pdf->Row2();

if ($dbInitiated == "Client"){
	$Client_Color = TRUE;
	$Department_Color = FALSE;
}
else if ($dbInitiated == "Department"){
	$Client_Color = FALSE;
	$Department_Color = TRUE;
}

if ($dbClassification == "Program"){
	$Program_Color = TRUE;
	$Project_Color = FALSE;
	$Activity_Color = FALSE;
}
else if ($dbClassification == "Project"){
	$Program_Color = FALSE;
	$Project_Color = TRUE;
	$Activity_Color = FALSE;
}
else if ($dbClassification == "Activity"){
	$Program_Color = FALSE;
	$Project_Color = FALSE;
	$Activity_Color = TRUE;
}

//For Row 3
$pdf->SetXY(45,42);
$pdf->Cell(100,5,"Extension Service Program/Project/Activity is requested by clients.",0,1);
		
//For Small Box 1
$pdf->SetXY(40,42);
$pdf->Cell(5,5,'', 1, 0, 'C', $Client_Color);
		
$pdf->SetXY(45,47);
$pdf->Cell(100,5,"Extension Service Program/Project/Activity is Department's initiative.",0,1);
		
//For Small Box 2
$pdf->SetXY(40,47);
$pdf->Cell(5,5,'', 1, 0, 'C', $Department_Color);

//For new line
$pdf->SetXY(15,54);
$pdf->Cell(185.9, 10, '', 'T', 0, 'C');

//For Row 4
//Box for Program
$pdf->SetXY(40,56.6);
$pdf->Cell(5,5,'', 1, 1, 'C',$Program_Color);
$pdf->SetXY(15,54);
$pdf->Cell(75,10,"Program",0,0,'C');

//Box for Project
$pdf->SetXY(91,56.6);
$pdf->Cell(5,5,'', 1, 1, 'C',$Project_Color);
$pdf->SetXY(15,54);
$pdf->Cell(175,10,"Project",0,0,'C');

//Box for Activity
$pdf->SetXY(148,56.6);
$pdf->Cell(5,5,'', 1, 1, 'C',$Activity_Color);
$pdf->SetXY(15,54);
$pdf->Cell(290,10,"Activity",0,0,'C');

//For new line
$pdf->SetXY(15,64);
$pdf->Cell(185.9, 5, '', 'T', 1, 'C');

//Body
$Length = 160;
$Spacing = 5;
$Border = 0;
$indent = 35;

$pdf->Multicell($Length, $Spacing, 'I.          Title of the Project/Activity:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbTitle, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'II.         Location:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbLocation_Area, $Border, 'J');

$pdf->Ln();

//Format Date & Time
$date1 = date_create($dbStart_Date); 	$Format_Start_Date = date_format($date1,"F, d Y");
$date2 = date_create($dbEnd_Date); 		$Format_End_Date = date_format($date2,"F, d Y");

$time1 = date_create($dbStart_Time); 	$Format_Start_Time = date_format($time1,"h:i:s A");
$time2 = date_create($dbEnd_Time); 		$Format_End_Time = date_format($time2,"h:i:s A");

$pdf->Multicell($Length, $Spacing, 'III.       Duration:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing,  'Date: ' .$Format_Start_Date. ' to '. $Format_End_Date, $Border, 'J');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing,  'Time: '.$Format_Start_Time. ' to ' .$Format_End_Time, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IV.       Type of Community Extension Service:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbTypeCES, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'V.        Sustainable Development Goals (SDG):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbSDG, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VI.       Office/s / College/s Involved:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbOffice, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VII.      Program/s Involved (specify the programs under the college implementing the project):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbPrograms, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VIII.     Project Leader, Assistant Project Leader and Coordinators:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbPeople, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IX.       Partner Agencies:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbAgencies, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'X.        Beneficiaries (Type and Number of Male and Female):', $Border, 'L');
//Type
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, 'Type: '. $dbTypeParticipants, $Border, 'J');
//Male
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, 'Male: ' .$dbMale, $Border, 'J');
//Female
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, 'Female: ' .$dbFemale, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XI.       Total Cost and Sources of Funds:', $Border, 'L');
//Total Cost
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, 'Total Cost: P' .$dbCost, $Border, 'J');
//Source of Fund
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, 'Source of Fund: ' .$dbSourceFund, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XII.      Rationale (brief description of the situation):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbRationale, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIII.     Objectives (General and Specific):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbObjectives, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIV      Description, Strategies and Methods (Activities / Schedule):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbDescriptions, $Border, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing, 'XV.      Financial Plan:', $Border, 'L');

$pdf->SetFont('Times','B',11); //Set New Font
$pdf->SetX(32); //Header
$pdf->Cell(80, 5, 'Item Description', 1, 0,'C');
$pdf->Cell(20, 5, 'Quantity', 1, 0,'C');
$pdf->Cell(20, 5, 'Unit', 1, 0,'C');
$pdf->Cell(20, 5, 'Unit Cost', 1, 0,'C');
$pdf->Cell(20, 5, 'Total', 1, 1,'C');

$pdf->SetFont('Times','',10);//Reset Font
if ($dbFPR1_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR1_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_5, 1, 1,'C');
}
if ($dbFPR2_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR2_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_5, 1, 1,'C');
}
if ($dbFPR3_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR3_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_5, 1, 1,'C');
}
if ($dbFPR4_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR4_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_5, 1, 1,'C');
}
if ($dbFPR5_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR5_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_5, 1, 1,'C');
}
if ($dbFPR6_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR6_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_5, 1, 1,'C');
}
if ($dbFPR7_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR7_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_5, 1, 1,'C');
}
if ($dbFPR8_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR8_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_5, 1, 1,'C');
}
if ($dbFPR9_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR9_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_5, 1, 1,'C');
}
if ($dbFPR10_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR10_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_5, 1, 1,'C');
}
if ($dbFPR11_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR11_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_5, 1, 1,'C');
}
if ($dbFPR12_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR12_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_5, 1, 1,'C');
}
if ($dbFPR13_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR13_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_5, 1, 1,'C');
}
if ($dbFPR14_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR14_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_5, 1, 1,'C');
}
if ($dbFPR15_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR15_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_5, 1, 1,'C');
}
if ($dbFPR16_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR16_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_5, 1, 1,'C');
}
if ($dbFPR17_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR17_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_5, 1, 1,'C');
}
if ($dbFPR18_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR18_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_5, 1, 1,'C');
}
if ($dbFPR19_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR19_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_5, 1, 1,'C');
}
if ($dbFPR20_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(80, 5, $dbFPR20_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_5, 1, 1,'C');
}
//GrandTotal
$pdf->SetFont('Times','B',11); //Set New Font
$pdf->SetX(32);
$pdf->Cell(140, 5, 'Grand Total ', 1, 0,'R');
$pdf->Cell(20, 5, $dbGrandTotal, 1, 1,'C');
$pdf->SetFont('Times','',10); //Reset Font

$pdf->Ln(5);

$pdf->Multicell($Length, $Spacing, 'XVI.    Functional Relationships with the Partner Agencies (Duties / Tasks of the Partner Agencies):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbFunctional, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVII.    Monitoring and Evaluation Mechanics / Plan:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbMonitoring, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVIII.   Sustainability Plan:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $dbSustainability, $Border, 'J');

$pdf->Ln();

$pdf->SetFont('Times','B',11); //Set New Font
$pdf->SetX(32); //Header
$pdf->Cell(70, 5, 'Activities', 1, 0,'C');
$pdf->Cell(45, 5, 'Tentative Schedule', 1, 0,'C');
$pdf->Cell(45, 5, 'Involved', 1, 1,'C');


$pdf->SetFont('Times','',10);//Reset Font
if ($dbSP1_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP1_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP1_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP1_3, 1, 1,'C');
}
if ($dbSP2_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP2_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP2_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP2_3, 1, 1,'C');
}
if ($dbSP3_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP3_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP3_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP3_3, 1, 1,'C');
}
if ($dbSP4_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP4_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP4_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP4_3, 1, 1,'C');
}
if ($dbSP5_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP5_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP5_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP5_3, 1, 1,'C');
}
if ($dbSP6_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP6_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP6_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP6_3, 1, 1,'C');
}
if ($dbSP7_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP7_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP7_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP7_3, 1, 1,'C');
}
if ($dbSP8_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP8_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP8_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP8_3, 1, 1,'C');
}
if ($dbSP9_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP9_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP9_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP9_3, 1, 1,'C');
}
if ($dbSP10_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP10_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP10_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP10_3, 1, 1,'C');
}
if ($dbSP11_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP11_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP11_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP11_3, 1, 1,'C');
}
if ($dbSP12_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP12_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP12_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP12_3, 1, 1,'C');
}
if ($dbSP13_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP13_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP13_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP13_3, 1, 1,'C');
}
if ($dbSP14_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP14_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP14_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP14_3, 1, 1,'C');
}
if ($dbSP15_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP15_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP15_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP15_3, 1, 1,'C');
}
if ($dbSP16_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP16_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP16_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP16_3, 1, 1,'C');
}
if ($dbSP17_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP17_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP17_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP17_3, 1, 1,'C');
}
if ($dbSP18_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP18_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP18_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP18_3, 1, 1,'C');
}
if ($dbSP19_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP19_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP19_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP19_3, 1, 1,'C');
}
if ($dbSP20_1 == ""){} else {
	$pdf->SetX(32); //Row 1
	$pdf->Cell(70, 5, $dbSP20_1, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP20_2, 1, 0,'C');
	$pdf->Cell(45, 5, $dbSP20_3, 1, 1,'C');
}
$pdf->Ln();

//Signatories

$pdf->SetMargins(15,20,10);//L-T-R-B
$pdf->SetAutoPageBreak(TRUE, 25); //For Bottom Margin
$pdf->SetX(15);

//Box 1 Title
$pdf->Cell(92.95, 5, 'Prepared By:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Reviewed By:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 1 Names
$pdf->Cell(92.95, 5, $dbSign1_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, $dbSign2_1, 'L', 1, 'C');

//Box 1 Designation
$pdf->Cell(92.95, 5, $dbSign1_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, $dbSign2_2, 'L',1,'C');

//Box 1 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 0, 0, 'L');
$pdf->Cell(92.95, 5, '     Date Signed:', 'L', 1, 'L');

/////////////////////////////////////////////////////////////////////////////////////////////

//Box 2 Title
$pdf->Cell(92.95, 5, 'Recommending Approval:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Recommending Approval:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 2 Names
$pdf->Cell(92.95, 5, $dbSign3_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, $dbSign4_1, 'L', 1, 'C');

//Box 2 Designation
$pdf->Cell(92.95, 5, $dbSign3_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, $dbSign4_2, 'L',1,'C');

//Box 2 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 0, 0, 'L');
$pdf->Cell(92.95, 5, '     Date Signed:', 'L', 1, 'L');

/////////////////////////////////////////////////////////////////////////////////////////////

//Box 3 Title
$pdf->Cell(92.95, 5, 'Approved by:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 3 Names
$pdf->Cell(92.95, 5, $dbSign5_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L', 1, 'C');

//Box 3 Designation
$pdf->Cell(92.95, 5, $dbSign5_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L',1,'C');

//Box 3 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 'B', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,B', 1, 'L');

$pdf->Output();
?>