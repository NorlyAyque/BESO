<?php
//error_reporting(E_ALL);
//error_reporting(0);
if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

/*														
*********************ALANGILAN CAMPUS*********************
*/														

//Set Department/College
$CIT = "CIT";
$CIT_Full = "College of Industrial Technology";

$CICS = "CICS";
$CICS_Full = "College of Informatics and Computing Sciences";

$CEAFA = "CEAFA";
$CEAFA_Full = "College of Engineering, Architecture and Fine Arts";

//Variables to be used in Number of Trainees weight by length of training
$T_R1Q1 = $T_R1Q2 = $T_R1Q3 = $T_R1Q4 = $T_R1_T = 0;
$T_R2Q1 = $T_R2Q2 = $T_R2Q3 = $T_R2Q4 = $T_R2_T = 0;
$T_R3Q1 = $T_R3Q2 = $T_R3Q3 = $T_R3Q4 = $T_R3_T = 0;
$T_R4Q1 = $T_R4Q2 = $T_R4Q3 = $T_R4Q4 = $T_R4_T = 0;

/*
*********************CEAFA QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '1') AND
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(Remarks = 'Evaluated')		
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R1Q1 += $Total;  //CEAFA R1Q1
			}
	}
/*
*********************CEAFA QUARTER 2*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '2') AND
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R1Q2 += $Total;  //CEAFA R1Q2
			}
	}
/*
*********************CEAFA QUARTER 3*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '3') AND
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R1Q3 += $Total;  //CEAFA R1Q3
			}
	}
/*
*********************CEAFA QUARTER 4*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '4') AND
		(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R1Q4 += $Total;  //CEAFA R1Q4
			}
	}

/*
*********************CICS QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '1') AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R2Q1 += $Total;  //CICS R2Q1
			}
	}
/*
*********************CICS QUARTER 2*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '2') AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R2Q2 += $Total;  //CICS R2Q2
			}
	}
/*
*********************CICS QUARTER 3*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '3') AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R2Q3 += $Total;  //CICS R2Q3
			}
	}
/*
*********************CICS QUARTER 4*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '4') AND
		(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R2Q4 += $Total;  //CICS R2Q4
			}
	}

/*
*********************CIT QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '1') AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R3Q1 += $Total;  //CIT R3Q1
			}
	}
/*
*********************CIT QUARTER 2*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '2') AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R3Q2 += $Total;  //CIT R3Q2
			}
	}
/*
*********************CIT QUARTER 3*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '3') AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R3Q3 += $Total;  //CIT R3Q3
			}
	}
/*
*********************CIT QUARTER 4*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $YearToday) AND
		(Quarter = '4') AND
		(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
		(Remarks = 'Evaluated')
		");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$PID = $result['ProposalID'];
		
        $SD = $result['Start_Date'];    $date1 = date_create($SD);
		$ED = $result['End_Date'];      $date2 = date_create($ED); 
		$ST = $result['Start_Time'];    $time1 = date_create($ST);
		$ET = $result['End_Time'];      $time2 = date_create($ET);

		$dateinterval = date_diff($date1, $date2);  $DateResult = $dateinterval->format('%a')+1;
		$timeinterval = date_diff($time1, $time2);  $TimeResult = $timeinterval->format('%h')-1;
		
		$NoOfHours = $TimeResult * $DateResult; //Display number of hours depends on number of days
		if ($NoOfHours <= 7 ){ $Duration = "0.5";} //Less than 8 hrs
        else if ($NoOfHours <= 8 OR $NoOfHours <= 15){ $Duration = "1";} //1 day
        else if ($NoOfHours <= 16 OR $NoOfHours <= 23){ $Duration = "1.25";} //2 days
        else if ($NoOfHours <= 24 OR $NoOfHours <= 39){ $Duration = "1.50";} // 3 - 4 days
        else if ($NoOfHours >= 40 ){ $Duration = "2";} // 5 days up
		
		$sql2 = ("SELECT * FROM evaluation_alangilan WHERE ProposalID = '$PID'");
		$command2 = $con->query($sql2) or die("Error SQL");
		while($result2 = mysqli_fetch_array($command2))
			{
				$NoOfTrainees = $result2['MFT'];
				
				$Total = $Duration * $NoOfTrainees; 
				$T_R3Q4 += $Total;  //CIT R3Q4
			}
	}

?>