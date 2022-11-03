<?php
require("FPDFLibrary/fpdf.php");
include("Connection.php");

if((isset($_GET['view']))== False){ 
	echo "<center> <br>";
	echo("<h1> Please Select Proposal to Generate into PDF </h1>");
	echo "<h2> <a href='Proposal.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}else{
	$PID = $_GET['view'];
}

$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = $PID");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		//$PID = $result['ProposalID'];
		//$AID = $result['AccountID'];
		//$Date_Time = $result['Date_Time'];

		$Initiated = $result['Initiated'];
		$Classification = $result['Classification'];

		$I = $result['Title'];
		$II = $result['Location_Area'];
		$III = $result['Duration'];
		$IV = $result['TypeCES'];
		$V = $result['SDG'];
		$VI = $result['Office'];
		$VII = $result['Programs'];
		$VIII = $result['People'];
		$IX = $result['Agencies'];
		$X = $result['Beneficiaries'];
		$XI = $result['Cost'];
		$XII = $result['Rationale'];
		$XIII = $result['Objectives'];
		$XIV = $result['Descriptions'];
		$XV = $result['Financial'];
		$XVI = $result['Functional'];
		$XVII = $result['Monitoring'];
		$XVIII = $result['Plans'];
		
		//$Remarks = $result['Remarks'];

		$Sign1_1 = $result['Sign1_1'];
		$Sign1_2 = $result['Sign1_2'];
		$Sign2_1 = $result['Sign2_1'];
		$Sign2_2 = $result['Sign2_2'];
		$Sign3_1 = $result['Sign3_1'];
		$Sign3_2 = $result['Sign3_2'];
		$Sign4_1 = $result['Sign4_1'];
		$Sign4_2 = $result['Sign4_2'];
		$Sign5_1 = $result['Sign5_1'];
		$Sign5_2 = $result['Sign5_2'];
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

if ($Initiated == "Client"){
	$Client_Color = TRUE;
	$Department_Color = FALSE;
}
else if ($Initiated == "Department"){
	$Client_Color = FALSE;
	$Department_Color = TRUE;
}

if ($Classification == "Program"){
	$Program_Color = TRUE;
	$Project_Color = FALSE;
	$Activity_Color = FALSE;
}
else if ($Classification == "Project"){
	$Program_Color = FALSE;
	$Project_Color = TRUE;
	$Activity_Color = FALSE;
}
else if ($Classification == "Activity"){
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
$pdf->Multicell($Length, $Spacing, $I, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'II.         Location:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $II, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'III.       Duration;', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $III, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IV.       Type of Community Extension Service:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $IV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'V.        Sustainable Development Goals (SDG):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $V, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VI.       Office/s / College/s Involved:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $VI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VII.      Program/s Involved (specify the programs under the college implementing the project):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $VII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VIII.     Project Leader, Assistant Project Leader and Coordinators:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $VIII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IX.       Partner Agencies:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $IX, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'X.        Beneficiaries (Type and Number of Male and Female):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $X, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XI.       Total Cost and Sources of Funds:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XII.      Rationale (brief description of the situation):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIII.     Objectives (General and Specific):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XIII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIV      Description, Strategies and Methods (Activities / Schedule):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XIV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XV.      Financial Plan:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVI.    Functional Relationships with the Partner Agencies (Duties / Tasks of the Partner Agencies):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XVI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVII.    Monitoring and Evaluation Mechanics / Plan:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XVII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVIII.   Sustainability Plan:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $XVIII, $Border, 'J');

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
$pdf->Cell(92.95, 5, $Sign1_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, $Sign2_1, 'L', 1, 'C');

//Box 1 Designation
$pdf->Cell(92.95, 5, $Sign1_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, $Sign2_2, 'L',1,'C');

//Box 1 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 0, 0, 'L');
$pdf->Cell(92.95, 5, '     Date Signed:', 'L', 1, 'L');

/////////////////////////////////////////////////////////////////////////////////////////////

//Box 2 Title
$pdf->Cell(92.95, 5, 'Recommending Approval:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Recommending Approval:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 2 Names
$pdf->Cell(92.95, 5, $Sign3_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, $Sign4_1, 'L', 1, 'C');

//Box 2 Designation
$pdf->Cell(92.95, 5, $Sign3_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, $Sign4_2, 'L',1,'C');

//Box 2 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 0, 0, 'L');
$pdf->Cell(92.95, 5, '     Date Signed:', 'L', 1, 'L');

/////////////////////////////////////////////////////////////////////////////////////////////

//Box 3 Title
$pdf->Cell(92.95, 5, 'Approved by:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 3 Names
$pdf->Cell(92.95, 5, $Sign5_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L', 1, 'C');

//Box 3 Designation
$pdf->Cell(92.95, 5, $Sign5_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L',1,'C');

//Box 3 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 'B', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,B', 1, 'L');

$pdf->Output();
?>