<?php
session_start();
include("Connection.php");

if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}

//Session variables from index.php
$AccountID = $_SESSION["AccountAID"];
$Fullname = $_SESSION["FullName"];
$Campus = $_SESSION["Campus"];
$College = $_SESSION["College"];
$UserPosition = $_SESSION["Position"];

/*
//Account Restrictions
if ($UserPosition == "Head"){
	//Code Continue
}else {
	echo "<center> <br>";
	echo "<h1> Access Denied! <br>";
	echo "You are not allowed to access this page. </h1>";
	echo "<h2> <a href='Dashboard.php'> RETURN </a> </h2>";
	die();
}
*/

?>
<script>
	document.getElementById('Logo_Title').style.display = 'none'; //Do not Delete
</script>

<?php
if(isset($_GET['disable'])){
	$AID = $_GET['disable'];

	if ($AccountID == $AID){
		echo "
		<script>
			alert('You are not allow to Enable/Disable your own account');	
			window.location.href='Account.php';
		</script>";
	}else {
		$sql = ("UPDATE account SET AccStatus = 'Disabled' WHERE AccountID = $AID ");
		$command = $con->query($sql) or die("Error Disabling the Account");
		echo "
			<script>
				alert('Account ID $AID is Disabled');
				window.location.href='Account.php';	
			</script>";
	}
}

if(isset($_GET['enable'])){
	$AID = $_GET['enable'];

	if ($AccountID == $AID){
		echo "
		<script>
			alert('You are not allow to Enable/Disable your own account');
			window.location.href='Account.php';
		</script>";
	}else {
		$sql = ("UPDATE account SET AccStatus = 'Active' WHERE AccountID = $AID ");
		$command = $con->query($sql) or die("Error Enabling the Account");
		echo "
			<script>
				alert('Account ID $AID is Active');	
				window.location.href='Account.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Account</title>
<link rel="stylesheet" type="text/css" href="styles/Account-STYLE.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
		<div class="toggle">
				<ion-icon name="menu"></ion-icon>
				</div>
			<center><?php include("userlogin.php"); ?></p></center>
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
						<span class="icon-buttonDASH"><?php echo "$CountProposal";?></span>
					</div>
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
					<div class="notifEVAL">
						<span class="icon-buttonEVAL"><?php echo "$CountEvaluation";?></span>
					</div>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
					<div class="notifMONI">
						<span class="icon-buttonMONI"><?php echo "$CountMonitoring";?></span>
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
				<a class="active" href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a href="Settings.php">
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

			<?php 
				/*
				echo "<table class='Tuser'>";
				echo " <tr class='logo'> 
							<td> <ion-icon name='person-circle-sharp' class='profile'></ion-icon> </td>
						</tr>";
				echo "<tr>
							<td> <div class='text'> $Fullname - $UserPosition </div></td>
						</tr>";	
				echo "<tr>
							<td> <div class='text1'> $College - $Campus </div><td>
					  </tr>";						
						
				echo "<tr>		
						<td><div class='filter'><button type='button' onclick='display()'>FILTER</button></div><td>
					</tr>
					";
				echo "</table>";
				*/
			?>

			<div class="add">
				<a href="Form_Add.php" button class = "adduser" id="AddUserBtn"> Add User <ion-icon name="person-add-outline"></ion-icon></a> </button>
			</div>
			<div class="scroll" >
			<table class="account" id="Table" >
				<thead>
				<tr class="Name">
					 
					<th colspan="8" id="FilterRow"> 
						Filter Name: <input type="text" onkeyup="myFunction()" id="keyword" placeholder="Type name here">
						<button type='button' onclick='display()'>FIND ME</button>
					</th>
				</tr>

				<tr>
					<th colspan="8"><center>ACCOUNT MANAGEMENT </th> 
				</tr>
				<tr>
					<th> Account ID </th>
					<th width="auto";> Name </th>
					<th width="auto";> Email</th>
					<th width="auto";> Campus</th>
					<th width="auto";> College </th>
					<th width="auto";> Position </th>
					<th width="auto";> Status </th>
					<th id="ColumnForButton" width="200px";></th>
				</tr>
				</thead>
<?php
//Displaying All Accounts
//$sql = ("SELECT * FROM account WHERE AccountID != '$AccountID' AND Campus = '$Campus'");
//$sql = ("SELECT * FROM account WHERE AccountID = '$AccountID'");


if ($UserPosition == "Staff" OR $UserPosition == "Coordinator"){
	$sql = ("SELECT * FROM account WHERE AccountID = '$AccountID' AND Campus = '$Campus'");
	echo "
		<script>
			document.getElementById('FilterRow').style.display = 'none';
			document.getElementById('Logo_Title').style.display = 'block';
		</script>
	";
}else{
	$sql = ("SELECT * FROM account WHERE Campus = '$Campus'");
	//$sql = ("SELECT * FROM account");
}


//$sql = ("SELECT * FROM account");
$command = $con->query($sql) or die("Error SQL");

while($result = mysqli_fetch_array($command))
	{
		$dbAID = $result['AccountID'];
		//$dbLN = $result['Lastname'];
		//$dbFN = $result['Firstname'];
		$dbName = $result['Firstname'] ." ". $result['Lastname'];
		$dbEmail = $result['Email'];
		$dbCampus = $result['Campus'];
		$dbCollege = $result['College'];
		$dbPosition = $result['Position'];
		$dbStatus = $result['AccStatus'];
?>				<tbody>
					<tr class="inputs">
					<td> <?php echo $dbAID; ?> </td>
					<td> <?php echo $dbName; ?> </td> 
					<td> <?php echo $dbEmail; ?> </td> 
					<td> <?php echo $dbCampus; ?> </td> 
					<td> <?php echo $dbCollege; ?> </td> 
					<td> <?php echo $dbPosition; ?> </td> 
					<td> <?php echo $dbStatus; ?> </td> 
					<td>
						<a href="Form_Edit.php?edit=<?php echo $dbAID; ?>" button class = "btn"> Edit </button> </a>
						<a id="EnableBtn" href="Account.php?enable=<?php echo $dbAID; ?>" button class = "btn3"> Enable </a>
						<a id="DisableBtn" href="Account.php?disable=<?php echo $dbAID; ?>" button class = "btn2"> Disable </a>
					</td>
				</tr>
				</tbody>
<?php
	}
?>
			</table>
			
				<p align="center" id="Logo_Title">
					<img src="images/logo.png" width="200px">
					<marquee> <h1> BESO PORTAL </h1> </marquee>
				</p>

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
</body>
</html>

<script>
function display(){
	const data = "<?php echo $Fullname; ?>";
    document.getElementById("keyword").value = data;
	myFunction()
}
function myFunction(){
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("keyword");
  filter = input.value.toUpperCase();
  table = document.getElementById("Table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; //1 = Column 2 in the table (Count starts at 0)
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<?php
if ($UserPosition == "Staff" OR $UserPosition == "Coordinator"){
	echo "
		<script>
			document.getElementById('AddUserBtn').style.display = 'none';
			document.getElementById('EnableBtn').style.display = 'none';
			document.getElementById('DisableBtn').style.display = 'none';
			document.getElementById('ColumnForButton').style.width = '100px';
		</script>
	";
}else{
	echo "
		<script>
			document.getElementById('Logo_Title').style.display = 'none';
		</script>
	";
}
?>

<?php include("RestrictNotif.php"); ?>