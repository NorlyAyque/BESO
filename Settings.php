
<?php
session_start();
include("Connection.php");


if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Getting Session Variables from index.php
$College = $_SESSION["College"];
$Position = $_SESSION["Position"];


date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="styles/SettingSTYLE.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>
			<center><?php include("userlogin.php"); ?></center>
			<li>
				<a href="Dashboard.php">
					<span class ="icon"> <ion-icon name="home-outline"></ion-icon> </span>
					<span class ="title"> Home</span>
				</a>
			</li>
			<li>
				<a href="CreateProposal.php">
					<span class ="icon"> <ion-icon name="document-text-outline"></ion-icon> </span>
					<span class ="title"> Create Proposal</span>
				</a>
			</li>
			<li>
				<a href="Proposal.php">
					<span class ="icon"> <ion-icon name="document-attach-outline"></ion-icon> </span>
					<span class ="title"> Project Proposals</span>
					<div class="notifDASH">
						<span class="icon-buttonDASH">44</span>
					</div>
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL">45</span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
					<div class="notifMONI">
						<span class="icon-buttonMONI">46</span>
					</div>
				</a>
			</li>
			<li>
				<a href="Reports.php">
					<span class ="icon"> <ion-icon name="documents-outline"></ion-icon> </span>
					<span class ="title"> Reports</span>
				</a>
			</li>
			<li>
				<a  href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a  class="active" href="Settings.php">
					<span class ="icon"> <ion-icon name="settings-outline"></ion-icon> </span>
					<span class ="title"> Settings</span>
				</a>
			</li>
			<li>
				<a href="Signout.php">
					<span class ="icon"> <ion-icon name="log-in-outline"></ion-icon> </span>
					<span class ="title"> Sign out</span>
				</a>
			</li>
		</ul>
	</div>
		
		<!--main-->
		<div class="main">
			<div class="topbar">
				
			</div>
			<table class="TimeDate">
				<tr>
					<td>
						<?php echo date("F d, Y")?>
					</td>
				</tr>
				<tr>
					<td><p id="current-time"></p></td>
				</tr>
			</table>
	
	<br>
		<!-- Display Set Year and Quarter-->
		<div id="LabelText">
			<center> 
				<h2> Current Set Year <u> <?php echo "$CustomYear";?> </u>
				and Quarter <u><?php echo "$CustomQuarter";?> </u></h2>
			</center>
		</div>

			<table id="TableForYearQuarter" class="settings">
				<tr>
					<th colspan="2"><h3>Set Year and Quarter to be used for the whole system</h3></i></th>
				</tr>

				<tr>
					<th width="50%";>Set Year</th>
					<th width="50%";>Set Quarter </th>
				</tr>	
				
				<tr>
					<td>
						<form action="" method="POST">	
							<div class ="Year">
								<input type="number" min="0" id="Year" name="Year" value = "<?php echo "$CustomYear";?>" placeholder="type here.." required> 
							</div>
							
							<div class="tbcreate">
								<input type="submit" name="SetYearBtn"  value="Set Year" class = "SubmitYQ">
							</div>
						</form>
					</td> 
					<td>
						<form action="" method="POST">
							<div class ="Quarter">
								 
								<select id="Quarter" name="Quarter" required>
									<option value="">Please Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="<?php echo "$CustomQuarter";?>" selected><?php echo "$CustomQuarter";?></option>
								</select>
							</div>
							
							<div class="tbcreate">
								<input type="submit" name="SetQuarterBtn" value=" Set Quarter"  class = "SubmitYQ">
							</div>
						</form>
					</td> 
				</tr>
			</table>
			<?php

//Restrictions for Year and Quarter
if (($Position == "Coordinator") OR ($Position == "Staff")){
	echo "
		<script> 
			document.getElementById('LabelText').style.display = 'none';
			document.getElementById('TableForYearQuarter').style.display = 'none';
		</script>
	";
}
?>		


<!--********************************************
					SIGNATORIES 
*************************************************-->

			<table class="signatories">	
				<tr>
					<th colspan="2"><h3>Add Signatories</h3></i></th>
				</tr>			
				<tr>
					<th width="50%";>Name </th>
					<th width="50%";>Position </th>
				</tr>	
				
				<tr>
					<td>
						<form action="" method="POST">	
							<div class ="Name">
								<input type="text" name="PersonsName" placeholder="type here.." required> 
							</div>
							<div class="tbcreate">
								<input type="submit" name="SubmitName" value=" SAVE" class = "SaveName">
							</div>
						</form>
					</td> 
					<td>
						<form action="" method="POST">
							<div class ="Position">
								<input type="text" name="PersonsPosition" placeholder="type here.." required> 
							</div>
							<div class="tbcreate">
								<input type="submit" name="SubmitPosition"  value="SAVE" class="SavePos">
							</div>
						</form>
					</td> 
				</tr>
			</table>

		<!-- Display All Names in Signatories-->
		<div class="row">
		  <div class="column">
				<table class="List">
					<tr>
						<th colspan="3">LIST OF NAME</th>
					</tr>
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th></th>
					</tr>
					<?php
					$sql = ("SELECT * FROM signatories_alangilan WHERE Persons_Name != ''");
					$command = $con->query($sql) or die("Error SQL");
					while($result = mysqli_fetch_array($command))
						{
							$SID = $result['SignID'];
							$Persons_Name = $result['Persons_Name'];
				?>
					<tr>
						<td> <?php echo "$SID";?> </td>
						<td> <?php echo "$Persons_Name";?> </td>
						<td> <a href="Settings.php?delete=<?php echo $SID; ?>" class="deletebtn" >DELETE</button> </a> </td>
					</tr>

				<?php } ?>
				</table>
			</div>
			
			<!-- Display All Positions in Signatories-->
			<div class="column">
				<table class="List2nd"> 
				<tr>
					<th colspan="3"> LIST OF POSITIONS</th>
				</tr>
				<tr>
					<th> ID </th>
					<th> Positions </th>
					<th> </th>
				</tr>
				
				<?php
					$sql = ("SELECT * FROM signatories_alangilan WHERE Position != ''");
					$command = $con->query($sql) or die("Error SQL");
					while($result = mysqli_fetch_array($command))
						{
							$SID = $result['SignID'];
							$Position = $result['Position'];
				?>
				<tr>
					<td> <?php echo "$SID";?> </td>
					<td > <?php echo "$Position";?> </td>
					<td> <a href="Settings.php?delete=<?php echo $SID; ?>" class="deletebtn">DELETE</button> </a> </td>
				</tr>

				<?php } ?>
				</table>
			</div>
		</div>		
	</div>
</div>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<script>
	//MenuToggle
	let toggle = document.querySelector('.toggle');
	let navigation = document.querySelector('.navigation');
	let main = document.querySelector('.main');
	
	toggle.onclick = function(){
		navigation.classList.toggle('active');
		main.classList.toggle('active');
	}
	</script>
	<script>
	// hovered for selected list item
	let list = document.querySelectorAll('.navigation li');
	function activeLink(){
		list.forEach((item)=>
		item.classList.remove('hovered'));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink);
	</script>
	
	
	<script>
	// For date and Time
	let time = document.getElementById("current-time");
	setInterval(()=>{
		let d = new Date();
			time.innerHTML = d.toLocaleTimeString();
	},1000)
		
	</script>

	<script>
		var time = new Date();
		var date = time.getFullYear()+'-'+(time.getMonth()+1)+'-'+time.getDate();
	</script>

</body>
</html>

<?php
if (isset($_POST['SetYearBtn'])){
	$New_Year = $_POST["Year"];
	
	$sql = ("UPDATE custom_alangilan SET Year = '$New_Year'");
	$command = $con->query($sql) or die("Error updating new year");

	echo "<script> alert('Year Successfully Set'); window.location='Settings.php';</script>";
}

if (isset($_POST['SetQuarterBtn'])){
	$New_Quarter = $_POST["Quarter"];
	
	$sql = ("UPDATE custom_alangilan SET Quarter = '$New_Quarter'");
	$command = $con->query($sql) or die("Error updating new year");

	echo "<script> alert('Quarter Successfully Set'); window.location='Settings.php';</script>";
}

if (isset($_POST['SubmitName'])){
	$text = htmlspecialchars($_POST['PersonsName']);
	$PersonsName = strtoupper($text);

	$sql = ("INSERT INTO signatories_alangilan (Persons_Name) VALUES ('$PersonsName')");
	$command = $con->query($sql) or die("Error Occur when inserting name");

	echo "<script> alert('Name Inserted'); window.location='Settings.php';</script>";
}

if (isset($_POST['SubmitPosition'])){
	$PersonsPosition = htmlspecialchars($_POST['PersonsPosition']);

	$sql = ("INSERT INTO signatories_alangilan (Position) VALUES ('$PersonsPosition')");
	$command = $con->query($sql) or die("Error Occur when inserting name");

	echo "<script> alert('Position Inserted'); window.location='Settings.php';</script>";
}


if(isset($_GET['delete'])){

	$SID = $_GET['delete'];

	$sql = ("DELETE FROM signatories_alangilan WHERE SignID = '$SID'");
	$command = $con->query($sql) or die("Error Deleting Signatory");
	echo "
		<script>
			alert('Signatory ID $SID Deleted');	
			window.location.href='Settings.php';
		</script>";
}
?>

