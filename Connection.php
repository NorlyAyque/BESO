<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$dbname = "Beso_Portal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed To Connect to the Server and to the Database  " .$dbname);
}

//Copy Codes Here
$query = ("SELECT * FROM custom_alangilan");
$x = $con->query($query) or die("Error Fethcing data from custome alangilan");
while($output = mysqli_fetch_array($x))
{
	$CustomYear = $output["Year"];
	$CustomQuarter = $output["Quarter"];
}

//Set Department/College
$CICS = strtoupper("CICS");
$CICS_Full = strtoupper("College of Informatics and Computing Sciences");

$CIT = strtoupper("CIT");
$CIT_Full = strtoupper("College of Industrial Technology");

$CEAFA = strtoupper("CEAFA");
$CEAFA_Full = strtoupper("College of Engineering, Architecture and Fine Arts");


//For Proposal Pending
$QueryProp = ("SELECT COUNT(*) as TotalProposal FROM create_alangilan WHERE ProjectStatus = 'PENDING'");
$CMDProp = $con->query($QueryProp) or die("Error Fethcing Data");
while($ResultProp = mysqli_fetch_array($CMDProp)){$CountProposal = $ResultProp['TotalProposal'];}

//For Evaluaion Pending
$QueryEval = ("SELECT COUNT(*) as TotalEvaluation FROM evaluation_alangilan WHERE ProjectStatus = 'PENDING'");
$CMDEval = $con->query($QueryEval) or die("Error Fethcing Data");
while($ResultEval = mysqli_fetch_array($CMDEval)){$CountEvaluation = $ResultEval['TotalEvaluation'];}

//For Monitoring Pending
$QueryMon = ("SELECT COUNT(*) as TotalMonitoring FROM monitoring_alangilan WHERE Remarks = 'PENDING'");
$CMDMon = $con->query($QueryMon) or die("Error Fethcing Data");
while($ResultMon = mysqli_fetch_array($CMDMon)){$CountMonitoring = $ResultMon['TotalMonitoring'];}


if ((isset($_SESSION['College']) == TRUE) AND (isset($_SESSION['Position']) == TRUE)){
	//Getting Session Variables from index.php
	$AID = $_SESSION["AccountAID"];
	$College = $_SESSION["College"];
	$UserPosition = $_SESSION["Position"];

	//For Coordinator Proposal Revision
	$sql = ("SELECT COUNT(*) as TotalCount FROM create_alangilan WHERE (AccountID = '$AID') AND (ProjectStatus = 'Need to Revise')");
	$command = $con->query($sql) or die("Error Fethcing Data");
	while($result = mysqli_fetch_array($command)){$CountCoorRevProp = $result['TotalCount'];}

	//For Coordinator Evaluation Revision
	$sql = ("SELECT COUNT(*) as TotalCount FROM evaluation_alangilan WHERE (Author = '$AID') AND (ProjectStatus = 'Need to Revise')");
	$command = $con->query($sql) or die("Error Fethcing Data");
	while($result = mysqli_fetch_array($command)){$CountCoorRevEval = $result['TotalCount'];}

	//For Coordinator Monitoring Revision
	$sql = ("SELECT COUNT(*) as TotalCount FROM monitoring_alangilan WHERE (Author = '$AID') AND (Remarks = 'Need to Revise')");
	$command = $con->query($sql) or die("Error Fethcing Data");
	while($result = mysqli_fetch_array($command)){$CountCoorRevMon = $result['TotalCount'];}
	
	//For Demo
	//$CountProposal = 10; //Proposal
	//$CountEvaluation = 20; //Evaluation
	//$CountMonitoring = 30; //Monitoring

	if ($UserPosition == "Coordinator"){
		$CountProposal = $CountCoorRevProp;// = 1; //Proposal
		$CountEvaluation = $CountCoorRevEval;// = 2; //Evaluation
		$CountMonitoring = $CountCoorRevMon;// = 3; //Monitoring
	}
}
?>