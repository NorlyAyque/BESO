<?php
require("FPDFLibrary/fpdf.php");
include("Connection.php");

$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = 2");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		$AID = $result['AccountID'];
		$Date_Time = $result['Date_Time'];

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
		
		$Remarks = $result['Remarks'];
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

$pdf->Multicell($Length, $Spacing, 'IX.       Cooperating Agencies:', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $IX, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'X.        Beneficiaries (Type and Number of Male and Female):', $Border, 'L');
$pdf->SetX($indent);
$pdf->Multicell($Length, $Spacing, $X, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XI.        Project Status:', $Border, 'L');

$pdf->Multicell($Length, $Spacing,'               1. As to purpose (how far has the purpose been attained)', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               2. Availability of materials', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               3. Schedule of activities', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               4. Financial report', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               5. Problems encountered', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               6. Actions taken to solve the problems encountered', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();
$pdf->Multicell($Length, $Spacing,'               7. Suggestions and recommendations', $Border, 'J');
$pdf->SetX(40);
$pdf->Multicell(155, $Spacing, $XI, 'J');

$pdf->Ln();

//Signatories

$pdf->SetMargins(15,20,10,0);//L-T-R-B
$pdf->SetX(15);

//Box 1 Title
$pdf->Cell(92.95, 5, 'Prepared By:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Reviewed By:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 1 Names
$pdf->Cell(92.95, 5, 'NAME', 0, 0, 'C');
$pdf->Cell(92.95, 5, 'NAME', 'L', 1, 'C');

//Box 1 Designation
$pdf->Cell(92.95, 5, 'Designation', 0, 0, 'C');
$pdf->Cell(92.95, 5, 'Designation', 'L',1,'C');

//Box 1 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 0, 0, 'L');
$pdf->Cell(92.95, 5, '     Date Signed:', 'L', 1, 'L');

/////////////////////////////////////////////////////////////////////////////////////////////

//Box 2 Title
$pdf->Cell(92.95, 5, 'Accepted by:', 'T', 0, 'L');
$pdf->Cell(92.95, 5, 'Remarks:', 'L,T', 1, 'L');

$pdf->Cell(92.95, 7, '', 0, 0, 'L'); $pdf->Cell(92.95, 7, '', 'L', 1, 'L');

//Box 2 Names
$pdf->Cell(92.95, 5, 'NAME', 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L', 1, 'C');

//Box 2 Designation
$pdf->Cell(92.95, 5, 'Designation', 0, 0, 'C');
$pdf->Cell(92.95, 5, '', 'L',1,'C');

//Box 2 Date Signed
$pdf->Cell(92.95, 5, '     Date Signed:', 'B', 0, 'L');
$pdf->Cell(92.95, 5, '', 'L,B', 1, 'L');

$pdf->Output();
?>