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
		$this->Image('img/logo.png',17,15,15,15); //Right-Top-Width-Height
		$this->Cell(20,15,"",1,0,'C');
		$this->Cell(65,15,'Reference No.: BatStateU-FO-ESO-01',1,0,'C');
		$this->Cell(60.9,15,'Effectivity Date: May 18, 2022',1,0,'C');
		$this->Cell(40,15,'Revision No.: 02',1,1,'C');
	}
	function Row2(){
		$this->SetXY(15,30);
		$this->Cell(185.9,10,"EXTENSION PROGRAM PLAN / PROPOSAL",1,1,'C');
	}
	function Row3(){
		$this->SetXY(45,42);
		$this->Cell(100,5,"Extension Service Program/Project/Activity is requested by clients.",0,1);
		
		$this->SetFillColor(128, 128, 128);
		
		//For Small Box 1
		$this->SetXY(40,42);
		$this->Cell(5,5,'', 1, 0, 'C', TRUE);

		/////////////////////////////////////////////////
		
		$this->SetXY(45,47);
		$this->Cell(100,5,"Extension Service Program/Project/Activity is Department's initiative.",0,1);
		
		//For Small Box 2
		$this->SetXY(40,47);
		$this->Cell(5,5,'', 1, 0, 'C', True);

		//For new line
		$this->SetXY(15,54);
		$this->Cell(185.9, 10, '', 'T', 0, 'C');
	}
	function Row4(){
		//Box for Program
		$this->SetXY(40,56.6);
		$this->Cell(5,5,'', 1, 1, 'C', True);
		$this->SetXY(15,54);
		$this->Cell(75,10,"Program",0,0,'C');

		//Box for Project
		$this->SetXY(91,56.6);
		$this->Cell(5,5,'', 1, 1, 'C', True);
		$this->SetXY(15,54);
		$this->Cell(175,10,"Project",0,0,'C');

		//Box for Activity
		$this->SetXY(148,56.6);
		$this->Cell(5,5,'', 1, 1, 'C', True);
		$this->SetXY(15,54);
		$this->Cell(290,10,"Activity",0,0,'C');
		
		//For new line
		$this->SetXY(15,64);
		$this->Cell(185.9, 5, '', 'T', 1, 'C');
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
$pdf->Row3();
$pdf->Row4();


$Length = 176;
$Spacing = 5;
$Border = 0;

$pdf->Multicell($Length, $Spacing, 'I.          Title:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$I, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'II.         Location:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$II, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'III.       Duration;', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$III, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IV.       Type of Community Extension Service:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$IV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'V.        Sustainable Development Goals (SDG):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$V, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VI.       Office/s / College/s Involved:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$VI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VII.      Program/s Involved (specify the programs under the college implementing the project):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$VII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'VIII.     Project Leader, Assistant Project Leader and Coordinators:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$VIII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'IX.       Partner Agencies:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$IX, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'X.        Beneficiaries (Type and Number of Male and Female):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$X, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XI.       Total Cost and Sources of Funds:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XII.      Rationale (brief description of the situation):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIII.     Objectives (General and Specific):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XIII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XIV      Description, Strategies and Methods (Activities / Schedule):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XIV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XV.      Financial Plan:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XV, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVI.    Functional Relationships with the Partner Agencies (Duties / Tasks of the Partner Agencies):', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XVI, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVII.    Monitoring and Evaluation Mechanics / Plan:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XVII, $Border, 'J');

$pdf->Ln();

$pdf->Multicell($Length, $Spacing, 'XVIII.   Sustainability Plan:', $Border, 'L');
$pdf->Multicell($Length, $Spacing,'               '.$XVIII, $Border, 'J');
$pdf->Output();
?>