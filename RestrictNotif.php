<?php

if ($Position == "Coordinator" ){
	echo "
		<script> 
			//document.querySelector('.notifDASH').style.display = 'none';
			//document.querySelector('.notifEVAL').style.display = 'none';
			//document.querySelector('.notifMONI').style.display = 'none';

			document.querySelector('.notif').style.display = 'none';
			
		</script>
	";
}else{
	echo "
		<script> 
			document.querySelector('.notifREV').style.display = 'none';
		</script>
	";
}


?>