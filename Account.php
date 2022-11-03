<?php
session_start();
include("Connection.php");

//Session variables from index.php
$AccountID = $_SESSION["AccountAID"];
$Fullname = $_SESSION["FullName"];
$UserPosition = $_SESSION["Position"];
$Campus = $_SESSION["Campus"];
$College = $_SESSION["College"];

if ($UserPosition == "Head"){
	//Code Continue
}else {
	echo "<center> Access Denied! You are not allowed to access this page. <br>";
	echo "<a href='Dashboard.php'> Return </a>";
	die();
}

?>


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
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Account</title>
<link rel="stylesheet" type="text/css" href="styles/Account.css">

</head>
<body>
	
<div class="container">
	
	<div class = "navigation">
	<div class="menu-header-bg"></div>
	
		<ul> 
			<li>
				<a href="#">
					<div class=" logo"><img src ="images/logo.png"></div>
					<span class ="title1"> BESO Portal</span>
				</a>
			</li>
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
				</a>
			</li>
			
			<li>
				<a href="Evaluation.php">
					<span class ="icon"> <ion-icon name="receipt-outline"></ion-icon> </span>
					<span class ="title"> Evaluation Reports</span>
				</a>
			</li>
			<li>
				<a href="Monitoring.php">
					<span class ="icon"> <ion-icon name="hourglass-outline"></ion-icon> </span>
					<span class ="title"> Monitoring Reports</span>
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
				<div class="toggle">
					<ion-icon name="reorder-three-sharp"></ion-icon>
				</div>	
			</div>

			<?php 
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
			?>

			<div class="add">
				<a href="Form_Add.php" button class = "adduser"> Add User <ion-icon name="person-add-outline"></ion-icon></a> </button>
			</div>
			<div style="height: 500px; overflow: auto">

			<table class="account" id="Table">
				<thead>
				<tr class="Name">
					 
					<th colspan="8"> Filter Name: <input type="text" onkeyup="myFunction()" id="keyword" placeholder="Type name here"></th>
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
					<th width="200px";></th>
				</tr>
				</thead>
<?php
//Displaying All Accounts
//$sql = ("SELECT * FROM account WHERE AccountID != '$AccountID' AND Campus = '$Campus'");
//$sql = ("SELECT * FROM account WHERE AccountID = '$AccountID'");
$sql = ("SELECT * FROM account");
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
						<a href="Account.php?enable=<?php echo $dbAID; ?>" button class = "btn3"> Enable </a>
						<a href="Account.php?disable=<?php echo $dbAID; ?>" button class = "btn2"> Disable </a>
					</td>
				</tr>
				</tbody>
<?php
	}
?>
				
			</table>
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