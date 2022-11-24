<?php
//error_reporting(E_ALL);
//error_reporting(0);
if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

/***********************************************************
*					ALANGILAN CAMPUS					   *
************************************************************/														

//Variables to be used in Number of Trainees weight by length of training - T
$T_R1Q1 = $T_R1Q2 = $T_R1Q3 = $T_R1Q4 = $T_R1_T = 0;
$T_R2Q1 = $T_R2Q2 = $T_R2Q3 = $T_R2Q4 = $T_R2_T = 0;
$T_R3Q1 = $T_R3Q2 = $T_R3Q3 = $T_R3Q4 = $T_R3_T = 0;
$T_R4Q1 = $T_R4Q2 = $T_R4Q3 = $T_R4Q4 = $T_R4_T = 0;

//Variables to be used in Percentage of beneficiaries - P
$P_R1Q1 = $P_R1Q2 = $P_R1Q3 = $P_R1Q4 = $P_R1_T = 0;
$P_R2Q1 = $P_R2Q2 = $P_R2Q3 = $P_R2Q4 = $P_R2_T = 0;
$P_R3Q1 = $P_R3Q2 = $P_R3Q3 = $P_R3Q4 = $P_R3_T = 0;
$PercentageTotal = 0;

//Variables to be used in Budget - B
$Budget = 0;

/*
*********************Nuber of Trainees*********************
*/

/*
*********************CEAFA QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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
		(Year = $CustomYear) AND
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



/*
*********************Percentage of Beneficiaries*********************
*/

/*
*********************CEAFA QUARTER 1*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '1') AND
	(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R1Q1 = number_format($Compute/$No,1); //Average R1Q1
	}
/*
*********************CEAFA QUARTER 2*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '2') AND
	(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R1Q2 = number_format($Compute/$No,1); //Average R1Q2
	}		
/*
*********************CEAFA QUARTER 3*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '3') AND
	(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R1Q3= number_format($Compute/$No,1); //Average R1Q3
	}
/*
*********************CEAFA QUARTER 4*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Office LIKE '%$CEAFA%' OR Office LIKE '%$CEAFA_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R1Q4 = number_format($Compute/$No,1); //Average R1Q4
	}

/*
*********************CICS QUARTER 1*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '1') AND
	(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R2Q1 = number_format($Compute/$No,1); //Average R2Q1
	}
/*
*********************CICS QUARTER 2*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '2') AND
	(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R2Q2 = number_format($Compute/$No,1); //Average R2Q2
	}
/*
*********************CICS QUARTER 3*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '3') AND
	(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R2Q3 = number_format($Compute/$No,1); //Average R2Q3
	}
/*
*********************CICS QUARTER 4*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Office LIKE '%$CICS%' OR Office LIKE '%$CICS_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R2Q4 = number_format($Compute/$No,1); //Average R2Q4
	}

/*
*********************CIT QUARTER 1*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '1') AND
	(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R3Q1 = number_format($Compute/$No,1); //Average R3Q1
	}
/*
*********************CIT QUARTER 2*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '2') AND
	(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R3Q2 = number_format($Compute/$No,1); //Average R3Q2
	}
/*
*********************CIT QUARTER 3*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '3') AND
	(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R3Q3 = number_format($Compute/$No,1); //Average R3Q3
	}
/*
*********************CIT QUARTER 4*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Office LIKE '%$CIT%' OR Office LIKE '%$CIT_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		$Participants = $result['MFT'];
			$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$P_R3Q4 = number_format($Compute/$No,1); //Average R3Q4
	}



/*
*********************BUDGET*********************
*/
$x = 0;
$sql = ("SELECT * FROM create_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Remarks = 'Evaluated')		
	");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$GrandTotal = $result['GrandTotal'];
		$x += $GrandTotal;
	}
	$Budget = number_format($x,2);
?>

<!-- Auto update Target once page load-->
<?php
//Trainees
$T_R1_T = $T_R1Q1 + $T_R1Q2 + $T_R1Q3 + $T_R1Q4; //Row 1
$T_R2_T = $T_R2Q1 + $T_R2Q2 + $T_R2Q3 + $T_R2Q4; //Row 2
$T_R3_T = $T_R3Q1 + $T_R3Q2 + $T_R3Q3 + $T_R3Q4; //Row 3

$T_R4Q1 = $T_R1Q1 + $T_R2Q1 + $T_R3Q1; //Column Q1
$T_R4Q2 = $T_R1Q2 + $T_R2Q2 + $T_R3Q2; //Column Q2
$T_R4Q3 = $T_R1Q3 + $T_R2Q3 + $T_R3Q3; //Column Q3
$T_R4Q4 = $T_R1Q4 + $T_R2Q4 + $T_R3Q4; //Column Q4

$T_R4_T = $T_R4Q1 + $T_R4Q2 + $T_R4Q3 + $T_R4Q4; //Total

//Percentage
//Row 1 Total
$ArrVal = array($P_R1Q1, $P_R1Q2, $P_R1Q3, $P_R1Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$P_R1_T  = 0;}
else {$P_R1_T  = $x/$Count;}

//Row 2 Total
$ArrVal = array($P_R2Q1, $P_R2Q2, $P_R2Q3, $P_R2Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$P_R2_T  = 0;}
else {$P_R2_T  = $x/$Count;}

//Row 3 Total
$ArrVal = array($P_R3Q1, $P_R3Q2, $P_R3Q3, $P_R3Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$P_R3_T  = 0;}
else {$P_R3_T  = $x/$Count;}

//Row 4 Total
$ArrVal = array($P_R1_T, $P_R2_T, $P_R3_T); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$ans  = 0;}
else {$ans  = $x/$Count;}
$PercentageTotal = number_format(doubleval($ans),1);

$sql = ("UPDATE target_alangilan SET 
	T_R1Q1 = '$T_R1Q1', T_R1Q2 = '$T_R1Q2', T_R1Q3 = '$T_R1Q3', T_R1Q4 = '$T_R1Q4', T_R1_T = '$T_R1_T',
	T_R2Q1 = '$T_R2Q1', T_R2Q2 = '$T_R2Q2', T_R2Q3 = '$T_R2Q3', T_R2Q4 = '$T_R2Q4', T_R2_T = '$T_R2_T',
	T_R3Q1 = '$T_R3Q1', T_R3Q2 = '$T_R3Q2', T_R3Q3 = '$T_R3Q3', T_R3Q4 = '$T_R3Q4', T_R3_T = '$T_R3_T',
	T_R4Q1 = '$T_R4Q1', T_R4Q2 = '$T_R4Q2', T_R4Q3 = '$T_R4Q3', T_R4Q4 = '$T_R4Q4', T_R4_T = '$T_R4_T',

	P_R1Q1 = '$P_R1Q1', P_R1Q2 = '$P_R1Q2', P_R1Q3 = '$P_R1Q3', P_R1Q4 = '$P_R1Q4', P_R1_T = '$P_R1_T',
	P_R2Q1 = '$P_R2Q1', P_R2Q2 = '$P_R2Q2', P_R2Q3 = '$P_R2Q3', P_R2Q4 = '$P_R2Q4', P_R2_T = '$P_R2_T',
	P_R3Q1 = '$P_R3Q1', P_R3Q2 = '$P_R3Q2', P_R3Q3 = '$P_R3Q3', P_R3Q4 = '$P_R3Q4', P_R3_T = '$P_R3_T',
	PercentageTotal = '$PercentageTotal', Budget = '$Budget'
WHERE Year = '$CustomYear'");
$command = $con->query($sql) or die("Error updating target");
?>

<?php include("RestrictNotif.php"); ?>