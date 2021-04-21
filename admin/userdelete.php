<?php
 
 require "db_config.php";

 if(isset($_GET['userid']))
 {
 	$id= $_GET['userid'];
 
	$sql = "DELETE FROM emails WHERE id='$id';";
	$db->query($sql);
	header("Location: emails.php");

	
 }
 else
 {
 	header("Location: emails.php");
 }

?>