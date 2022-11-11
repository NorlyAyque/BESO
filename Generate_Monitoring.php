<?php
require("FPDFLibrary/fpdf.php");
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//For No input PID, EID at MID  under Generate PDF
if((isset($_GET['view']))== False){ 
	echo "<center> <br>";
	echo("<h1> Please Select Monitoring Report to Generate into PDF </h1>");
	echo "<h2> <a href='Monitoring.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}else{
	$MID = $_GET['view'];
}

//With input PID, EID at MID but not existing in database
$sqlexist = ("SELECT COUNT(*) as TotalCount FROM monitoring_alangilan WHERE MonitoringID = '$MID'");
$commandexist = $con->query($sqlexist) or die("Error Fetching Data");
while($row = mysqli_fetch_array($commandexist)){$Count = $row['TotalCount'];}

if ($Count == 0){
	echo "<center> <br>";
	echo("<h1> Monitoring ID does not exist. </h1>");
	echo "<h2> <a href='Monitoring.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}

$sql = ("SELECT * FROM monitoring_alangilan WHERE MonitoringID = $MID");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		
		$Title = $result['Title'];
		$Location_Area = $result['Location_Area'];
		$Duration = $result['Duration'];
		$TypeCES = $result['TypeCES'];
		$SDG = $result['SDG'];
		$Office = $result['Office'];
		$Programs = $result['Programs'];
		$People = $result['People'];
		$Agencies = $result['Agency'];
		$Beneficiaries = $result['Beneficiaries'];
		
		$PS1 = $result['PS1'];
		$PS2 = $result['PS2'];
		$PS3 = $result['PS3'];
		$PS4 = $result['PS4'];
		$PS5 = $result['PS5'];
		$PS6 = $result['PS6'];
		$PS7 = $result['PS7'];
	 
		$Sign1_1 = $result['Sign1_1'];
		$Sign1_2 = $result['Sign1_2'];
		$Sign2_1 = $result['Sign2_1'];
		$Sign2_2 = $result['Sign2_2'];
		$Sign3_1 = $result['Sign3_1'];
		$Sign3_2 = $result['Sign3_2'];
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
		$this->Cell(65,15,'Reference No.: BatStateU-REC-ESO-01',1,0,'C');
		$this->Cell(60.9,15,'Effectivity Date: May 18, 2022',1,0,'C');
		$this->Cell(40,15,'Revision No.: 03',1,1,'C');
	}
	function Row2(){
        $this->SetFillColor(179, 179, 0);
        $this->SetFont('Times','B',10);
		$this->SetXY(15,30);
        $this->Cell(20,10,"Title: ",1,0,'C');
		$this->Cell(165.9,10,"MONITORING THE PROGRESS OF THE PROJECT",1,1,'C', TRUE);
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

$pdf->Ln();

$pdf->SetFont('Times','',10);

$Length = 160;
$Spacing = 5;
$Border = 0;
$indent = 35;

$pdf->Multicell($Length, $Spacing, 'I.          Title of the Project:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Title, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'II.         Location:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Location_Area, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'III.       Duration;', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Duration, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IV.       Type of Community Extension Service:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $TypeCES, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'V.        Sustainable Development Goals (SDG):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $SDG, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VI.       Office/s / College/s Involved:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Office, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VII.      Program/s Involved (specify the programs under the college implementing the project):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Programs, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VIII.     Project Leader, Assistant Project Leader and Coordinators:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $People, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IX.       Cooperating Agencies:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Agencies, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'X.        Beneficiaries (Type and Number of Male and Female):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $Beneficiaries, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XI.        Project Status:', $Border, 'L');

$pdf->Multicell($Length, $Spacing,'               1. As to purpose (how far has the purpose been attained)', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS1, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               2. Availability of materials', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS2, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               3. Schedule of activities', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS3, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               4. Financial report', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS4, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               5. Problems encountered', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS5, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               6. Actions taken to solve the problems encountered', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS6, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               7. Suggestions and recommendations', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $PS7, 'J');

$pdf->Ln();

//Signatories

$pdf->SetMargins(15,20,10,0);//L-T-R-B
$pdf->SetX(15);

//Box 1 Title
$pdf->Cell(92.95, 5, 'Prepared By:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Reviewed By:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); 
$pdf->Cell(92.95, 7, '', 'L', 1, 'L');

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
$pdf->Cell(92.95, 5, 'Accepted by:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Remarks:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 2 Names
$pdf->Cell(92.95, 5, $Sign3_1, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L', 1, 'C');

//Box 2 Designation
$pdf->Cell(92.95, 5, $Sign3_2, 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L',1,'C');

//Box 2 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 'B', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,B', 1, 'L');

$pdf->Output();
?>