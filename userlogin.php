<?php
//session_start();
include("Connection.php");

?>

<div class ="profile">
  
<ion-icon name="person-circle-sharp"></ion-icon>
<label> 
            <?php 
                echo "<b>".$_SESSION["FullName"]."</b>";
				echo " <br> ";
				echo $_SESSION["Position"];  
				echo "<br>";
				echo $_SESSION["Department"];
                echo " - ";
                echo $_SESSION["Campus"];
			?> 
    </label>
</div>