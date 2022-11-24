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
//notif = All Pending tables (.class)
//notifREV = All Revisions (.class)



//	$CountProposal = $CountCoorRevProp; //Proposal
//	$CountEvaluation = $CountCoorRevEval; //Evaluation
//	$CountMonitoring = $CountCoorRevMon; //Monitoring

//id="PendingProp" (#id)
//id="PendingEval" (#id)
//id="PendingMon" (#id)

//id="ReviseProp" (#id)
//id="ReviseEval" (#id)
//id="ReviseMon" (#id)

//notifDASH = Proposal Side menus (.class)
//notifEVAL = Evalaution Side menus (.class)
//notifMONI = Monitoring  Side menus (.class)


if($CountProposal == 0){
	echo "
	<script> 
		document.querySelector('.notifDASH').style.display = 'none';
		document.querySelector('#PendingProp').style.display = 'none';

	</script>
";
}

if($CountEvaluation == 0){
	echo "
	<script> 
		document.querySelector('.notifEVAL').style.display = 'none';
		document.querySelector('#PendingEval').style.display = 'none';
	</script>
";
}

if($CountMonitoring == 0){
	echo "
	<script> 
		document.querySelector('.notifMONI').style.display = 'none';
		document.querySelector('#PendingMon').style.display = 'none';
	</script>
";
}
?>