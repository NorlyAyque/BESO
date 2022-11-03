<?php
require("FPDFLibrary/fpdf.php");
include("Connection.php");

if((isset($_GET['view']))== False){ 
	echo "<center> <br>";
	echo("<h1> Please Select Evaluation Report to Generate into PDF </h1>");
	echo "<h2> <a href='Evaluation.php'> RETURN <a> </h2>";
	echo "</center";
	die;
}else{
	$EID = $_GET['view'];
}

$sql = ("SELECT * FROM evaluation_alangilan WHERE EvaluationID = $EID");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$Title = $result['Title'];
		$Location_Area = $result['Location_Area'];
		$Implementation = $result['Implementation'];
		$Office = $result['Office'];
		$Agencies = $result['Agency'];
		$TypeCES = $result['TypeCES'];
		$SDG = $result['SDG'];
		$Beneficiaries = $result['Beneficiaries'];
		
		$M1 = $result['M1'];
		$M2 = $result['M2'];
		$MT = $result['MT'];
		$F1 = $result['F1'];
		$F2 = $result['F2'];
		$FT = $result['FT'];
		$MFT = $result['MFT'];

		$People = $result['People'];
		$Objectives = $result['Objectives'];
		$Narrative = $result['Narrative'];

		$Eval1A1 = $result['Eval1A1'];
		$Eval1A2 = $result['Eval1A2'];
		$Eval1AT = $result['Eval1AT'];
		$Eval1B1 = $result['Eval1B1'];
		$Eval1B2 = $result['Eval1B2'];
		$Eval1BT = $result['Eval1BT'];
		$Eval1C1 = $result['Eval1C1'];
		$Eval1C2 = $result['Eval1C2'];
		$Eval1CT = $result['Eval1CT'];
		$Eval1D1 = $result['Eval1D1'];
		$Eval1D2 = $result['Eval1D2'];
		$Eval1DT = $result['Eval1DT'];
		$Eval1E1 = $result['Eval1E1'];
		$Eval1E2 = $result['Eval1E2'];
		$Eval1ET = $result['Eval1ET'];

		$Eval2A1 = $result['Eval2A1'];
		$Eval2A2 = $result['Eval2A2'];
		$Eval2AT = $result['Eval2AT'];
		$Eval2B1 = $result['Eval2B1'];
		$Eval2B2 = $result['Eval2B2'];
		$Eval2BT = $result['Eval2BT'];
		$Eval2C1 = $result['Eval2C1'];
		$Eval2C2 = $result['Eval2C2'];
		$Eval2CT = $result['Eval2CT'];
		$Eval2D1 = $result['Eval2D1'];
		$Eval2D2 = $result['Eval2D2'];
		$Eval2DT = $result['Eval2DT'];
		$Eval2E1 = $result['Eval2E1'];
		$Eval2E2 = $result['Eval2E2'];
		$Eval2ET = $result['Eval2ET'];

		//$Pic1 = 'data:image/*;base64,'.base64_encode($result['Pic1']);
		//$Pic2 = 'data:image/*;base64,'.base64_encode($result['Pic2']);
		//$Pic3 = 'data:image/*;base64,'.base64_encode($result['Pic3']);
		
		$image1 = $result['Pic1'];
		$image2 = $result['Pic2'];
		$image3 = $result['Pic3'];

		if ($image1 == ""){$Pic1 = "";}
		else{$Pic1 = 'data:image/*;base64,'.base64_encode($image1);}

		if ($image2 == ""){$Pic2 = "";}
		else{$Pic2 = 'data:image/*;base64,'.base64_encode($image2);}
		
		if ($image3 == ""){$Pic3 = "";}
		else{$Pic3 = 'data:image/*;base64,'.base64_encode($image3);}
		
		
		$Caption1 = $result['Caption1'];
		$Caption2 = $result['Caption2'];
		$Caption3 = $result['Caption3'];

		$Sign1_1 = $result['Sign1_1'];
		$Sign1_2 = $result['Sign1_2'];
		$Sign2_1 = $result['Sign2_1'];
		$Sign2_2 = $result['Sign2_2'];
		$Sign3_1 = $result['Sign3_1'];
		$Sign3_2 = $result['Sign3_2'];
	}
?>
	
<?php


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
$pdf->multicell(115.9, 5, $Title, 1, 'J');

$pdf->Cell(70, 7, 'Location:', 'T', 0, 'L');
$pdf->multicell(115.9, 5, $Location_Area, 1, 'J');

$pdf->Cell(70, 5, 'Date of Implementation /','T,R', 0,'L');
$pdf->Cell(115.9, 5, $Implementation , 0, 1, 'J');

$pdf->Cell(70, 5, 'Number of hours of implementation:','R,B', 0,'L');
$pdf->Cell(115.9, 5, '', 'B', 1, 'J');

////
$pdf->Cell(70, 5, 'Implementing Office/ College / Program','R', 1,'L');
$pdf->Cell(70, 5, '(specify the programs under the college','R', 0,'L');
$pdf->multicell(115.9, 5, $Office, 'L', 'J');
$pdf->Cell(70, 5, 'implementing the project):','R,B', 1,'L');
////

$pdf->Cell(70, 7, 'Partner Agency:', 'R', 0, 'L');
$pdf->multicell(115.9, 5, $Agencies, 'L,T,B', 'J');

$pdf->Cell(70, 7, 'Type of Community Extension Service:', 'T,R', 0, 'L');
$pdf->multicell(115.9, 5, $TypeCES, 'L,B', 'J');

$pdf->Cell(70, 7, 'Sustainable Development Goals:', 'T,R', 0, 'L');
$pdf->multicell(115.9, 5, $SDG, 'L,B', 'J');

$pdf->Cell(70, 5, 'Number of Male and Female and Type of', 'T,R', 1, 'L');
$pdf->Cell(70, 5, 'Beneficiaries (Type such as OSY, Children,', 'R', 0, 'L');
$pdf->Cell(115.9, 5, 'Type of participants:  '.$Beneficiaries, 'R', 1, 'C');
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
$pdf->Cell(37.5, 5, $M1, 1, 0, 'C');
$pdf->Cell(37.5, 5, $M2, 1, 0, 'C');
$pdf->Cell(20, 5, $MT, 1, 1, 'C');

$pdf->SetX(85);
$pdf->Cell(20.9, 5, 'Female', 1, 0, 'C');
$pdf->Cell(37.5, 5, $F1, 1, 0, 'C');
$pdf->Cell(37.5, 5, $F2, 1, 0, 'C');
$pdf->Cell(20, 5, $FT, 1, 1, 'C');

$pdf->SetX(85);
$pdf->Cell(95.9, 5, 'Grand Total', 1, 0, 'R');
$pdf->Cell(20, 5, $MFT, 1, 0, 'C');
//End Table

$pdf->Ln(5);
$pdf->Cell(185.9, 5, 'Project Leader, Assistant Project Leader, Coordinators:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $People, 0, 'J');

$pdf->Ln(3);

$pdf->Cell(185.9, 5, 'Objectives:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $Objectives, 0, 'J');

$pdf->Ln(3);

$pdf->Cell(185.9, 5, 'Narrative of the Activity:', 'T', 1, 'L');
$pdf->SetX(25);
$pdf->multicell(171.9, 5, $Narrative, 0, 'J');

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
$pdf->Cell(50, 5, $Eval1A1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval1A2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval1AT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.2.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Very Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval1B1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval1B2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval1BT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.3.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval1C1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval1C2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval1CT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.4.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Fair', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval1D1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval1D2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval1DT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.5.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Poor', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval1E1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval1E2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval1ET, 1, 1, 'C');

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
$pdf->Cell(50, 5, $Eval2A1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval2A2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval2AT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.2.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Very Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval2B1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval2B2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval2BT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.3.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Satisfactory', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval2C1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval2C2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval2CT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.4.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Fair', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval2D1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval2D2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval2DT, 1, 1, 'C');

$pdf->SetX(25);
$pdf->Cell(10.9, 5, '1.5.', 1, 0, 'C');
$pdf->Cell(35, 5, 'Poor', 1, 0, 'L');
$pdf->Cell(50, 5, $Eval2E1, 1, 0, 'C');
$pdf->Cell(55, 5, $Eval2E2, 1, 0, 'C');
$pdf->Cell(15, 5, $Eval2ET, 1, 1, 'C');

$pdf->Ln(5);

$Height = 55;
$Width = 90;

$pdf->Cell(185.9, 5, 'Photos (Please attach photos with caption):', 'T', 1, 'L');
$pdf->Ln(5);

if ($Pic1 == ""){}
else{
	$pdf->Cell(115, $Height, $pdf->Image($Pic1, $pdf->GetX()+15, $pdf->GetY(), $Width, $Height,'jpeg'), 0, 0, 'C');
	$pdf->Multicell(70.9, $Height, $Caption1, 0, 'L');
}
		
$pdf->Ln(5);

if ($Pic2 == ""){}
else{
	$pdf->Cell(115, $Height, $pdf->Image($Pic2, $pdf->GetX()+15, $pdf->GetY(), $Width, $Height,'jpeg'), 0, 0, 'C');
	$pdf->Multicell(70.9, $Height, $Caption2, 0, 'L');
}

$pdf->Ln(5);

if ($Pic3 == ""){}
else{
	$pdf->Cell(115, $Height, $pdf->Image($Pic3, $pdf->GetX()+15, $pdf->GetY(), $Width, $Height,'jpeg'), 0, 0, 'C');
	$pdf->Multicell(70.9, $Height, $Caption3, 0, 'L');
}






$pdf->Ln(5);

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
