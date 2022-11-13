<?php
session_start();
if (isset($_SESSION['AccountAID']) == FALSE){
	header('Location: index.php');
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewpoet" content ="width=device-width, initial-scale=1.0">
<title>Sign out</title>
<link rel="stylesheet" type="text/css" href="styles/Account-style.css">
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
				<a  href="Account.php">
					<span class ="icon"> <ion-icon name="person-add-outline"></ion-icon> </span>
					<span class ="title"> Accounts</span>
				</a>
			</li>
			<li>
				<a  class="active" href="Signout.php">
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
			
			<div class="signout">
				<div class="popupcenter">
					<div class="icon">
						<i class="fa fa-sign-out"></i>
					</div>
					
					<div class="title">
						Do you want to Sign out?
					</div>
					<div class="des">
						
					</div>
					<div class="dismiss-btn">
						<form method="post">
							<button id="dismiss-popup-btn" type="submit" name="Logout"> OK</button>
						</form>
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
		item.classList.remove('hovered));
		this.classList.add('hovered');
	}
	list.forEach((item))=>
	item.addEventlistener('mouseover',activeLink));
	</script>
<body>
</html>

<?php
if (isset($_POST['Logout'])){
	session_destroy();
	//header("location: index.php");
	echo"<script> window.location.href='index.php'; </script>";
}
?>