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

//Variables to be used in Number of Trainees weight by length of training - B
$CAFAD_B_Q1 = $CAFAD_B_Q2 = $CAFAD_B_Q3 = $CAFAD_B_Q4 = $CAFAD_B_T = 0;
$COE_B_Q1 = $COE_B_Q2 = $COE_B_Q3 = $COE_B_Q4 = $COE_B_T = 0;
$CICS_B_Q1 = $CICS_B_Q2 = $CICS_B_Q3 = $CICS_B_Q4 = $CICS_B_T = 0;
$CIT_B_Q1 = $CIT_B_Q2 = $CIT_B_Q3 = $CIT_B_Q4 = $CIT_B_T = 0;
$TOTAL_B_Q1 = $TOTAL_B_Q2 = $TOTAL_B_Q3 = $TOTAL_B_Q4 = $TOTAL_B = 0;

//Variables to be used in Percentage of beneficiaries - D
$CAFAD_D_Q1 = $CAFAD_D_Q2 = $CAFAD_D_Q3 = $CAFAD_D_Q4 = $CAFAD_D_T = 0;
$COE_D_Q1 = $COE_D_Q2 = $COE_D_Q3 = $COE_D_Q4 = $COE_D_T = 0;
$CICS_D_Q1 = $CICS_D_Q2 = $CICS_D_Q3 = $CICS_D_Q4 = $CICS_D_T = 0;
$CIT_D_Q1 = $CIT_D_Q2 = $CIT_D_Q3 = $CIT_D_Q4 = $CIT_D_T = 0;
$Percentage = 0;

//Variables to be used in Budget - B
$Budget = 0;

/*
*********************Nuber of Trainees*********************
*/

/*
*********************CAFAD QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '1') AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CAFAD_B_Q1 += $Total;  //CAFAD_B_Q1
			}
	}
/*
*********************CAFAD QUARTER 2*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '2') AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CAFAD_B_Q2 += $Total;  //CAFAD B_Q2
			}
	}
/*
*********************CAFAD QUARTER 3*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '3') AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CAFAD_B_Q3 += $Total;  //CAFAD_B_Q3
			}
	}
/*
*********************CAFAD QUARTER 4*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '4') AND
		(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CAFAD_B_Q4 += $Total;  //CAFAD_B_Q4
			}
	}

/*
*********************COE QUARTER 1*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '1') AND
		(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$COE_B_Q1 += $Total;  //COE_B_Q1
			}
	}

/*
*********************COE QUARTER 2*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '2') AND
		(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$COE_B_Q2 += $Total;  //COE_B_Q2
			}
	}

/*
*********************COE QUARTER 3*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
(Year = $CustomYear) AND
(Quarter = '3') AND
(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
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
		//$NoOfTrainees = $result2['MFT'];
		$NoOfTrainees = $result2['M2'] + $result2['F2'];
		
		$Total = $Duration * $NoOfTrainees; 
		$COE_B_Q3 += $Total;  //COE_B_Q3
	}
}

/*
*********************COE QUARTER 4*********************
*/
$sql = ("SELECT * FROM create_alangilan WHERE 
		(Year = $CustomYear) AND
		(Quarter = '4') AND
		(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$COE_B_Q4 += $Total;  //COE_B_Q4
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CICS_B_Q1 += $Total;  //CICS_B_Q1
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CICS_B_Q2 += $Total;  //CICS_B_Q2
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CICS_B_Q3 += $Total;  //CICS_B_Q3
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CICS_B_Q4 += $Total;  //CICS_B_Q4
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CIT_B_Q1 += $Total;  //CIT_B_Q1
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CIT_B_Q2 += $Total;  //CIT_B_Q2
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CIT_B_Q3 += $Total;  //CIT_B_Q3
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
				//$NoOfTrainees = $result2['MFT'];
				$NoOfTrainees = $result2['M2'] + $result2['F2'];
				
				$Total = $Duration * $NoOfTrainees; 
				$CIT_B_Q4 += $Total;  //CIT_B_Q4
			}
	}



/*
*********************Percentage of Beneficiaries*********************
*/

/*
*********************CAFAD QUARTER 1*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '1') AND
	(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CAFAD_D_Q1 = number_format($Compute/$No,1); //Average CAFAD_D_Q1
	}
/*
*********************CAFAD QUARTER 2*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '2') AND
	(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CAFAD_D_Q2 = number_format($Compute/$No,1); //Average CAFAD_D_Q2
	}		
/*
*********************CAFAD QUARTER 3*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '3') AND
	(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CAFAD_D_Q3 = number_format($Compute/$No,1); //Average CAFAD_D_Q3
	}
/*
*********************CAFAD QUARTER 4*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Office LIKE '%$CAFAD%' OR Office LIKE '%$CAFAD_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CAFAD_D_Q4 = number_format($Compute/$No,1); //Average CAFAD_D_Q4
	}
/*
*********************COE QUARTER 1*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '1') AND
	(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$COE_D_Q1 = number_format($Compute/$No,1); //Average COE_D_Q1
	}

/*
*********************COE QUARTER 2*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '2') AND
	(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$COE_D_Q2 = number_format($Compute/$No,1); //Average COE_D_Q2
	}

/*
*********************COE QUARTER 3*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '3') AND
	(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$COE_D_Q3 = number_format($Compute/$No,1); //Average COE_D_Q3
	}

/*
*********************COE QUARTER 4*********************
*/
$sql = ("SELECT * FROM evaluation_alangilan WHERE 
	(Year = $CustomYear) AND
	(Quarter = '4') AND
	(Office LIKE '%$COE%' OR Office LIKE '%$COE_Full%') AND
	(ProjectStatus = 'Approved')		
	");
$No = 0;
$Compute = 0;

$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$No++;
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$COE_D_Q4 = number_format($Compute/$No,1); //Average COE_D_Q4
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CICS_D_Q1 = number_format($Compute/$No,1); //Average CICS_D_Q1
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CICS_D_Q2 = number_format($Compute/$No,1); //Average CICS_D_Q2
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CICS_D_Q3 = number_format($Compute/$No,1); //Average CICS_D_Q3
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CICS_D_Q4 = number_format($Compute/$No,1); //Average CICS_D_Q4
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CIT_D_Q1 = number_format($Compute/$No,1); //Average CIT_D_Q1
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CIT_D_Q2 = number_format($Compute/$No,1); //Average CIT_D_Q2
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CIT_D_Q3 = number_format($Compute/$No,1); //Average CIT_D_Q3
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
		//$Participants = $result['MFT'];
		$Participants = $result['M2'] + $result['F2'];
			//$Excellent = $result['Eval1AT'];	$Very_Satisfactory = $result['Eval1BT'];	$Satisfactory = $result['Eval1CT'];
			$Excellent = $result['Eval1A2'];	$Very_Satisfactory = $result['Eval1B2'];	$Satisfactory = $result['Eval1C2'];
		$Responses = $Excellent + $Very_Satisfactory + $Satisfactory;
		$Percentage = (($Responses/$Participants)*100);
		$Compute += $Percentage; //Summation of all Percentage per PAP
		$CIT_D_Q4 = number_format($Compute/$No,1); //Average CIT_D_Q4
	}

/*
*********************BUDGET*********************
*/
$x = 0;
$sql = ("SELECT * FROM create_alangilan WHERE 
	(Year = $CustomYear) AND
	(Remarks = 'Evaluated')		
	");
$command = $con->query($sql) or die("Error SQL");
while($result = mysqli_fetch_array($command))
	{
		$Cost = $result['Cost'];
		$x += $Cost;
	}
	$Budget = number_format($x,2);
	//$Budget = $x;
?>

<!-- Auto update Target once page load-->
<?php
//Trainees
$CAFAD_B_T = $CAFAD_B_Q1 + $CAFAD_B_Q2 + $CAFAD_B_Q3 + $CAFAD_B_Q4; //CAFAD (B) (ROW)
$COE_B_T = $COE_B_Q1 + $COE_B_Q2 + $COE_B_Q3 + $COE_B_Q4; //COE (B) (ROW)
$CICS_B_T = $CICS_B_Q1 + $CICS_B_Q2 + $CICS_B_Q3 + $CICS_B_Q4; //CICS (B) (ROW)
$CIT_B_T = $CIT_B_Q1 + $CIT_B_Q2 + $CIT_B_Q3 + $CIT_B_Q4; //CIT (B) (ROW)

$TOTAL_B_Q1 = $CAFAD_B_Q1 + $COE_B_Q1 + $CICS_B_Q1 + $CIT_B_Q1; //QUARTER 1 (B) (COLUMN)
$TOTAL_B_Q2 = $CAFAD_B_Q2 + $COE_B_Q2 + $CICS_B_Q2 + $CIT_B_Q2; //QUARTER 2 (B) (COLUMN)
$TOTAL_B_Q3 = $CAFAD_B_Q3 + $COE_B_Q3 + $CICS_B_Q3 + $CIT_B_Q3; //QUARTER 1 (B) (COLUMN)
$TOTAL_B_Q4 = $CAFAD_B_Q4 + $COE_B_Q4 + $CICS_B_Q4 + $CIT_B_Q4; //QUARTER 1 (B) (COLUMN)

$TOTAL_B = $TOTAL_B_Q1 + $TOTAL_B_Q2 + $TOTAL_B_Q3 + $TOTAL_B_Q4; //TOTAL_B

//Percentage
//CAFAD Total
$ArrVal = array($CAFAD_D_Q1, $CAFAD_D_Q2, $CAFAD_D_Q3, $CAFAD_D_Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$CAFAD_D_T  = 0;}
else {$CAFAD_D_T  = $x/$Count;}

//COE Total
$ArrVal = array($COE_D_Q1, $COE_D_Q2, $COE_D_Q3, $COE_D_Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$COE_D_T  = 0;}
else {$COE_D_T  = $x/$Count;}

//CICS Total
$ArrVal = array($CICS_D_Q1, $CICS_D_Q2, $CICS_D_Q3, $CICS_D_Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$CICS_D_T  = 0;}
else {$CICS_D_T  = $x/$Count;}

//CIT Total
$ArrVal = array($CIT_D_Q1, $CIT_D_Q2, $CIT_D_Q3, $CIT_D_Q4); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$CIT_D_T  = 0;}
else {$CIT_D_T  = $x/$Count;}

//PERCENTAGE
$ArrVal = array($CAFAD_D_T, $COE_D_T, $CICS_D_T, $CIT_D_T); 
$Count = $x = 0;
foreach ($ArrVal as $value) { if ($value > 1) { $Count++; $x += doubleval($value); } }
if ($x == 0 AND $Count == 0){$ans  = 0;}
else {$ans  = $x/$Count;}
$PercentageTotal = number_format(doubleval($ans),1);

$sql = ("UPDATE dashboard_targets SET 
	CAFAD_B_Q1 = '$CAFAD_B_Q1', CAFAD_B_Q2 = '$CAFAD_B_Q2', CAFAD_B_Q3 = '$CAFAD_B_Q3', CAFAD_B_Q4 = '$CAFAD_B_Q4', CAFAD_B_T = '$CAFAD_B_T',
	COE_B_Q1 = '$COE_B_Q1', COE_B_Q2 = '$COE_B_Q2', COE_B_Q3 = '$COE_B_Q3', COE_B_Q4 = '$COE_B_Q4', COE_B_T = '$COE_B_T',
	CICS_B_Q1 = '$CICS_B_Q1', CICS_B_Q2 = '$CICS_B_Q2', CICS_B_Q3 = '$CICS_B_Q3', CICS_B_Q4 = '$CICS_B_Q4', CICS_B_T = '$CICS_B_T',
	CIT_B_Q1 = '$CIT_B_Q1', CIT_B_Q2 = '$CIT_B_Q2', CIT_B_Q3 = '$CIT_B_Q3', CIT_B_Q4 = '$CIT_B_Q4', CIT_B_T = '$CIT_B_T',
	
	CAFAD_D_Q1 = '$CAFAD_D_Q1', CAFAD_D_Q2 = '$CAFAD_D_Q2', CAFAD_D_Q3 = '$CAFAD_D_Q3', CAFAD_D_Q4 = '$CAFAD_D_Q4', CAFAD_D_T = '$CAFAD_D_T',
	COE_D_Q1 = '$COE_D_Q1', COE_D_Q2 = '$COE_D_Q2', COE_D_Q3 = '$COE_D_Q3', COE_D_Q4 = '$COE_D_Q4', COE_D_T = '$COE_D_T',
	CICS_D_Q1 = '$CICS_D_Q1', CICS_D_Q2 = '$CICS_D_Q2', CICS_D_Q3 = '$CICS_D_Q3', CICS_D_Q4 = '$CICS_D_Q4', CICS_D_T = '$CICS_D_T',
	CIT_D_Q1 = '$CIT_D_Q1', CIT_D_Q2 = '$CIT_D_Q2', CIT_D_Q3 = '$CIT_D_Q3', CIT_D_Q4 = '$CIT_D_Q4', CIT_D_T = '$CIT_D_T',

	TOTAL_B_Q1 = '$TOTAL_B_Q1', TOTAL_B_Q2 = '$TOTAL_B_Q2', TOTAL_B_Q3 = '$TOTAL_B_Q3', TOTAL_B_Q4 = '$TOTAL_B_Q4',
	TOTAL_B = '$TOTAL_B',

	PercentageTotal = '$PercentageTotal', Budget = '$Budget'
WHERE Year = '$CustomYear'");
$command = $con->query($sql) or die("Error updating target");
?>

<?php include("RestrictNotif.php"); ?>