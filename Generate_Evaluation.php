<?php
require("FPDFLibrary/fpdf.php");
include("Connection.php");

$sql = ("SELECT * FROM create_alangilan WHERE ProposalID = 1");
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

$x = 77;
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
		$this->Cell(65,15,'Reference No.: BatStateU-REC-ESO-03',1,0,'C');
		$this->Cell(60.9,15,'Effectivity Date: May 18, 2022',1,0,'C');
		$this->Cell(40,15,'Revision No.: 03',1,1,'C');
	}
	function Row2(){
        $this->SetFillColor(179, 179, 0);
        $this->SetFont('Times','B',10);
		$this->SetXY(15,30);
        $this->Cell(20,10,"Title: ",1,0,'C');
		$this->Cell(165.9,10,"EXTENSION PROJECT / ACTIVITY EVALUATION REPORT",1,1,'C', TRUE);
	}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm',array(215.9,330.2)); //W*H
$pdf->AliasNbPages();
$pdf->SetMargins(15,20,10,0);//L-T-R-B
$pdf->SetAutoPageBreak(TRUE, 25); //For Bottom Margin
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf->Row1();
$pdf->Row2();

//$pdf->Ln();

$pdf->SetFont('Times','',10);

$pdf->Cell(70, 7, 'Title of the Project or Activity:', 0, 0, 'L');
$pdf->multicell(115.9, 5, $II, 1, 'L');

$pdf->Cell(70, 7, 'Location:', 'T', 0, 'L');
$pdf->multicell(115.9, 5, $II, 1, 'L');

$pdf->Cell(70, 5, 'Date of Implementation /','T,R', 0,'L');
$pdf->Cell(115.9, 5, $I, 0, 1, 'L');

$pdf->Cell(70, 5, 'Number of hours of implementation:','R,B', 0,'L');
$pdf->Cell(115.9, 5, $I, 'B', 1, 'L');

////
$pdf->Cell(70, 5, 'Implementing Office/ College / Program','R', 1,'L');
$pdf->Cell(70, 5, '(specify the programs under the college','R', 0,'L');
$pdf->multicell(115.9, 5, $II, 'L', 'L');
$pdf->Cell(70, 5, 'implementing the project):','R,B', 1,'L');
////

$pdf->Cell(70, 7, 'Partner Agency:', 'R', 0, 'L');
$pdf->multicell(115.9, 5, $II, 'L,T,B', 'L');

$pdf->Cell(70, 7, 'Type of Community Extension Service:', 'T,R', 0, 'L');
$pdf->multicell(115.9, 5, $II, 'L,B', 'L');

$pdf->Cell(70, 7, 'Sustainable Development Goals:', 'T,R', 0, 'L');
$pdf->multicell(115.9, 5, $II, 'L,B', 'L');

$pdf->Cell(70, 5, 'Number of Male and Female and Type of', 'T,R', 1, 'L');
$pdf->Cell(70, 5, 'Beneficiaries (Type such as OSY, Children,', 'R', 0, 'L');
$pdf->Cell(115.9, 5, 'Type of participants: '.$I, 'R', 1, 'C');
$pdf->Cell(70, 5, 'Women, etc.)', 0, 0, 'L');

////Table for Numner of Male and Female
$pdf->Cell(20.9, 4, '', 'L,T', 0, 'C');
$pdf->Cell(37.5, 4, 'BatStateU', 'L,T', 0, 'C');
$pdf->Cell(37.5, 4, 'Participants from', 'L,T', 0, 'C');
$pdf->Cell(20, 4, 'Total', 'L,T', 1, 'C');

$pdf->SetX(85);
$pdf->Cell(20.9, 4, '', 'L,B', 0, 'C');
$pdf->Cell(37.5, 4, 'Participants', 'L,B', 0, 'C');
$pdf->Cell(37.5, 4, 'Other Institution', 'L,B', 0, 'C');
$pdf->Cell(20, 4, '', 'L,B', 1, 'C');

$pdf->SetX(85);
$pdf->Cell(20.9, 5, 'Male', 1, 0, 'C');
$pdf->Cell(37.5, 5, $x, 1, 0, 'C');
$pdf->Cell(37.5, 5, $x, 1, 0, 'C');
$pdf->Cell(20, 5, $x, 1, 1, 'C');

$pdf->SetX(85);
$pdf->Cell(20.9, 5, 'Female', 1, 0, 'C');
$pdf->Cell(37.5, 5, $x, 1, 0, 'C');
$pdf->Cell(37.5, 5, $x, 1, 0, 'C');
$pdf->Cell(20, 5, $x, 1, 1, 'C');

$pdf->SetX(85);
$pdf->Cell(95.9, 5, 'Grand Total', 1, 0, 'R');
$pdf->Cell(20, 5, $x, 1, 0, 'C');
//End Table

$pdf->Ln(5);
$pdf->Cell(185.9, 5, 'Project Leader, Assistant Project Leader, Coordinators:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $II, 0, 'J');

$pdf->Ln(3);

$pdf->Cell(185.9, 5, 'Objectives:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $II, 0, 'J');

$pdf->Ln(3);

$pdf->Cell(185.9, 5, 'Narrative of the Activity:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $II, 0, 'J');

$pdf->Ln(3);

$pdf->Cell(185.9, 5, 'Evaluation Result (if activity is training, technical advice or seminar)', 'T', 1, 'L');
$pdf->Ln(2);

//Table 1
$pdf->Cell(185.9, 5, '     1. Number of beneficiaries/participants who rated the activity as:', 0, 1, 'L');

$pdf->SetX(25);
$pdf->Cell(10.9, 7, '', 1, 0, 'C');
$pdf->Cell(35, 7, 'Scale', 1, 0, 'C');
$pdf->Cell(50, 7, 'BatStateU Participants', 1, 0, 'C');
$pdf->Cell(55, 7, 'Participants from other Institutions', 1, 0, 'C');
$pdf->Cell(15, 7, 'Total', 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.1.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Excellent', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.2.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Very Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.3.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.4.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Fair', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.5.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Poor', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->Ln(3);

//Table 2
$pdf->Cell(185.9, 5, '     2. Number of beneficiaries/participants who rated the timeliness of the activity as:', 0, 1, 'L');

$pdf->SetX(25);
$pdf->Cell(10.9, 7, '', 1, 0, 'C');
$pdf->Cell(35, 7, 'Scale', 1, 0, 'C');
$pdf->Cell(50, 7, 'BatStateU Participants', 1, 0, 'C');
$pdf->Cell(55, 7, 'Participants from other Institutions', 1, 0, 'C');
$pdf->Cell(15, 7, 'Total', 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.1.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Excellent', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.2.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Very Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.3.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.4.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Fair', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.5.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Poor', 1, 0, 'L');
$pdf->Cell(50, 5, $x, 1, 0, 'C');
$pdf->Cell(55, 5, $x, 1, 0, 'C');
$pdf->Cell(15, 5, $x, 1, 1, 'C');

$pdf->Ln(5);

$Height = 60;
$Width = 60;

$pdf->Cell(185.9, 5, 'Photos (Please attach photos with caption):', 'T', 1, 'L');
$pdf->Ln(5);

$pdf->Cell(61.97, $Height, $pdf->Image('images/logo.png', $pdf->GetX(), $pdf->GetY(), $Height, $Width), 0, 0, 'C');
$pdf->Cell(61.97, $Height, $pdf->Image('images/back.jpg', $pdf->GetX(), $pdf->GetY(), $Height, $Width), 0, 0, 'C');
$pdf->MultiCell(61.97, $Height, $pdf->Image('images/logo.png', $pdf->GetX(), $pdf->GetY(), $Height, $Width), 0, 'C');


$pdf->Ln(5);

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