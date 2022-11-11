<?php
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
		$dbFunctional = $result['Functional'];
		$dbFrequency = $result['Frequency'];
		$dbMonitoring = $result['Monitoring'];
		$dbPlans = $result['Plans'];
		
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
$pdf->SetMargins(20,20,10,0);//L-T-R-B
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
$pdf->Multicell($Length, $Spacing, $dbPlans, $Border, 'J');

$pdf->Ln();

//Signatories

$pdf->SetMargins(15,20,10,50);//L-T-R-B
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