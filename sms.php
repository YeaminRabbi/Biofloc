<?php 
	
	if(isset($_GET['val'])  && isset($_GET['sensor']))
	{
		$val = $_GET['val'];
		$sensor = $_GET['sensor'];
	}

	$msg="Hello! Your Biofloc system has an unusual reading for ".$sensor." reading: ".$val.". Please check your System";

	header("Location: https://tpsms.xyz/sms/api?action=send-sms&api_key=c2hpZmF0MTA1Mjc3OnNoaWZhdDEwNTI3Nw==&to=+8801768002727&from=8804445616285&sms=$msg");

?>