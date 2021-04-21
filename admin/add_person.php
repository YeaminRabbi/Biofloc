<?php
	
	require "db_config.php";

	 if(isset($_POST['btn-addperson']))
	 {
	 	
	 	$name=$_POST['name'];
	 	$email=$_POST['email'];
	 	$contact=$_POST['contact'];

		$query = "INSERT INTO emails (name,email,contact ) VALUES ('$name', '$email', '$contact')";
		$result = mysqli_query($db,$query);
		header("Location: emails.php");

		
	 }
	 else
	 {
	 	header("Location: emails.php");
	 }


?>