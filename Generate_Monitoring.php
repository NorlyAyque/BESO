<?php
session_start();
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
//Displaying data from financial plan propsoal table
$sql = ("SELECT * FROM financial_plan_monitoring WHERE MonitoringID = $MID");
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
$pdf->SetMargins(20,20,10);//L-T-R-B
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
$pdf->SetFont('Times','B',11); //Set New Font
$pdf->SetX(38); //Header
$pdf->Cell(80, 5, 'Item Description', 1, 0,'C');
$pdf->Cell(20, 5, 'Quantity', 1, 0,'C');
$pdf->Cell(20, 5, 'Unit', 1, 0,'C');
$pdf->Cell(20, 5, 'Unit Cost', 1, 0,'C');
$pdf->Cell(20, 5, 'Total', 1, 1,'C');

$pdf->SetFont('Times','',10);//Reset Font
if ($dbFPR1_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR1_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR1_5, 1, 1,'C');
}
if ($dbFPR2_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR2_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR2_5, 1, 1,'C');
}
if ($dbFPR3_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR3_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR3_5, 1, 1,'C');
}
if ($dbFPR4_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR4_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR4_5, 1, 1,'C');
}
if ($dbFPR5_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR5_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR5_5, 1, 1,'C');
}
if ($dbFPR6_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR6_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR6_5, 1, 1,'C');
}
if ($dbFPR7_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR7_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR7_5, 1, 1,'C');
}
if ($dbFPR8_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR8_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR8_5, 1, 1,'C');
}
if ($dbFPR9_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR9_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR9_5, 1, 1,'C');
}
if ($dbFPR10_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR10_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR10_5, 1, 1,'C');
}
if ($dbFPR11_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR11_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR11_5, 1, 1,'C');
}
if ($dbFPR12_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR12_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR12_5, 1, 1,'C');
}
if ($dbFPR13_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR13_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR13_5, 1, 1,'C');
}
if ($dbFPR14_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR14_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR14_5, 1, 1,'C');
}
if ($dbFPR15_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR15_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR15_5, 1, 1,'C');
}
if ($dbFPR16_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR16_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR16_5, 1, 1,'C');
}
if ($dbFPR17_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR17_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR17_5, 1, 1,'C');
}
if ($dbFPR18_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR18_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR18_5, 1, 1,'C');
}
if ($dbFPR19_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR19_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR19_5, 1, 1,'C');
}
if ($dbFPR20_1 == ""){} else {
	$pdf->SetX(38); //Row 1
	$pdf->Cell(80, 5, $dbFPR20_1, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_2, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_3, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_4, 1, 0,'C');
	$pdf->Cell(20, 5, $dbFPR20_5, 1, 1,'C');
}
//GrandTotal
$pdf->SetFont('Times','B',11); //Set New Font
$pdf->SetX(38);
$pdf->Cell(140, 5, 'Grand Total ', 1, 0,'R');
$pdf->Cell(20, 5, $dbGrandTotal, 1, 1,'C');
$pdf->SetFont('Times','',10); //Reset Font

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

$pdf->SetMargins(15,20,10);//L-T-R-B
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