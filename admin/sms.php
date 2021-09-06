<?php 
	
	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];
	}

	//$msg="বাংলা টাইপ করুন";
	//8801907461079 naima
	//8801768002727 yeamin
	//8801534555456 yousuf

	header("Location: https://tpsms.xyz/sms/api?action=send-sms&api_key=c2hpZmF0MTA1Mjc3OnNoaWZhdDEwNTI3Nw==&to=+8801647291019&from=8804445616285&sms=$msg");


?>
