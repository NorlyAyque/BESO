<?php
require("FPDFLibrary/pdf_mc_table.php"); //Ito ung Path ng Custom Library pdf_mc_table.php
include("Connection.php"); //Database Connection

if(isset($_GET['view'])){ $MID = $_GET['view']; } //Do not Edit

$sql = ("SELECT * FROM monitoring_alangilan WHERE MonitoringID = 1"); //Do not Edit
$command = $con->query($sql) or die("Error SQL"); //Do not Edit
while($result = mysqli_fetch_array($command)) //Do not Edit
	{  //Do not Edit
		$Sign1_1 = $result['Sign1_1']; //Do not Edit
	} //Do not Edit


//You can Edit Starts here
class PDF extends FPDF{ }

$pdf = new PDF('L','mm',array(215.9,330.2)); //W*H Long - Set size ng papel pati orientation
$pdf->AliasNbPages(); // For page numbering. Do not edit
$pdf->SetMargins(15,15,15,15);//L-T-R-B For Margin
$pdf->SetAutoPageBreak(TRUE, 15); //For Bottom Margin
$pdf->AddPage(); // Default
$pdf->SetFont('Times','',10); // Set Font

$pdf->Ln(); //Line Break

//Total Width = 300.2

$pdf->Cell(20, 10, "No.", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "TITLE OF TRAINING", 1, 0, 'C');
$pdf->Cell(40, 10, "INCLUSIVE DATES", 1, 0, 'C');
$pdf->Cell(30, 10, "DURATION", 1, 0, 'C');
$pdf->Cell(30, 10, "NO. OF TRAINEES", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();


$pdf->Cell(20, 10, "", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(310, 10, "Alangilan Campus", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Ln();
$pdf->MultiCell(310,10,'College of Industrial Technology',1,'J',false); //Multicell (Width, Height, "Text", Border, Allignment, Color)

$pdf->Cell(20, 10, "1", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, "2", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, "3", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, "4", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, "5", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->MultiCell(310,10,'College of Informatics and Computing Sciences',1,'J',false); //Multicell (Width, Height, "Text", Border, Allignment, Color)

$pdf->Cell(20, 10, "6", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, "7", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();


$pdf->Cell(20, 10, "8", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(60, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(20, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(10, 10, "", 1, 0, 'C');
$pdf->Cell(50, 10, "", 1, 0, 'C');
$pdf->Ln();


$pdf->Cell(180, 10, "College of Engineering,Architecture and Fine Arts", 1, 0, 'C'); //Normal Cell (Width, Height, "Text", Border, Line, Allignment)
$pdf->Cell(30, 10, "", 1, 0, 'C');
$pdf->Cell(100, 10, "", 1, 0, 'C');


$pdf->Output(); //To Display the whole Code
?>