<?php
require("FPDFLibrary/pdf_mc_table.php");
include("Connection.php");

if(isset($_GET['view'])){ $MID = $_GET['view']; }

$sql = ("SELECT * FROM monitoring_alangilan WHERE MonitoringID = 1");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{ 
		$Sign1_1 = $result['Sign1_1'];
	}

class PDF extends FPDF{ }

$pdf = new PDF('L','mm',array(215.9,330.2)); //W*H Long
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15,15);//L-T-R-B
$pdf->SetAutoPageBreak(TRUE, 15); //For Bottom Margin
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf->Ln();
//Total Width = 300.2

//$pdf->MultiCell(100,10,'TEXT 3',1,'J',false);

$pdf->Cell(100, 10, "", 1, 0, 'C');
$pdf->Cell(130.2, 10, "", 1, 0, 'C');
$pdf->Cell(70, 10, "", 1, 0, 'C');

$pdf->Output();
?>