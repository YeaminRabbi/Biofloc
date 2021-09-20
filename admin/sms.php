<?php 
	
	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];
	}

	echo $msg;
	//$msg="বাংলা টাইপ করুন";
	//8801907461079 naima
	//8801768002727 yeamin
	//8801534555456 yousuf

	 require_once 'db_config.php';

	 function fetch_all_data_usingDB($db,$sql){
	      
	    $result = mysqli_query($db,$sql);
	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    mysqli_free_result($result);
	    return $row;

	  }

	    $user_data= fetch_all_data_usingDB($db,"select * from user");


	    $contact = $user_data['contact'];

	 header("Location: https://tpsms.xyz/sms/api?action=send-sms&api_key=c2hpZmF0MTA1Mjc3OnNoaWZhdDEwNTI3Nw==&to=$contact&from=8804445616285&sms=$msg");


?>

