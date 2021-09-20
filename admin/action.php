<?php


require_once 'db_config.php';


if(isset($_POST['btn_submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];

	$contact = $_POST['contact'];

	$address = $_POST['address'];


	$sql = "UPDATE `user` SET name = '$name' , email = '$email' , contact = '$contact' , address = '$address'";

		$db->query($sql);

		header("Location: userinformation.php");

}

?>