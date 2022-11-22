<?php
session_start();
include("Connection.php");


if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content ="width=device-width, initial-scale=1.0">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="styles/Account.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style>
 .popupcenter{
     
      margin:auto;
	margin-top:100px;
	  
  }
  
   .signout .popupcenter{
       width:450px;
       height:220px;
       padding: 30px 20px;
       background: white;
       border-radius:10px;
       z-index: 2;
       text-align:center;
       box-shadow: 0 7px 25px rgba(0, 0, 0, 0.2);
   }
  
  
  
   .signout .popupcenter .icon {
       margin: 5px 0px;
       width: 50px;
       height: 50px;
       border: 2px solid  #E64848;
       text-align:center;
       display:inline-block;
       border-radius:50%;
       line-height:60px;
   }
   .signout .popupcenter .icon i.fa{
       font-size:30px;
       color:red;
   }
   .signout .popupcenter .title{
       margin:5px 0px;
       font-size:30px;
       font-weight:600;
   }
   .signout .popupcenter .des{
  v margin-top:10px;
    font-size:15px;
    font-weight:600px;
}
.signout .popupcenter .des span{
    color:red;
 }
  .signout .popupcenter .dismiss-btn{
      margin-top:15px;
  }
  .signout .popupcenter .dismiss-btn button{
      padding:10px 20px;
      background:#4CAF50;
      color:#f5f5f5;
      border:1px solid #4CAF50;
      font-size:16px;
      font-weight:600;
      outline:none;
      border-radius:10px;
      transition: all 300ms ease-in-out;
      cursor:pointer;
  }
  .signout .popupcenter .dismiss-btn button:hover{
      color:#111;
      background:#f5f5f5;
  }
  
  
</style>
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
				<a  href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a  class="active" href="Settings.php">
					<span class ="icon"> <ion-icon name="log-in-outline"></ion-icon> </span>
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
			
			<center> 
				<h2> Current Set Year <u> <?php echo "$CustomYear";?> </u>
				and Quarter <u><?php echo "$CustomQuarter";?> </u></h2>
			</center>
			<div class="signout">
				<div class="popupcenter">
					
					<div class="title">
						Set Year and Quarter to be used for the whole system
						<form action="" method="POST">		
							Set Year:
							<input type="number" min="0" id="Year" name="Year" placeholder="type here.." required> 
							<input type="submit" name="SetYearBtn" value="Set Year">
						</form>

						<form action="" method="POST">
							Set Quarter:
							<input type="number" min="0" id="Quarter" name="Quarter" placeholder="type here.." required> 
							<input type="submit" name="SetQuarterBtn" value=" Set Quarter">
						</form>	
					</div>
					<div class="des">
						
					</div>
					
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
<body>
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
?>



