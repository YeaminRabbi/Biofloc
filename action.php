<?php
	
	if(isset($_POST['btn-login_admin']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		if(($email == "admin@gmail.com" ) && ($password == "12345") || ($email == "abc@gmail.com" ) && ($password == "abc"))
		{
			header("Location: admin/index.php");	
		}
		else{
			header("Location: index.php?msg=error");
		}
	}

?>