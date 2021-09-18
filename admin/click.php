<?php 
	
	require_once 'db_config.php';
	
	if(isset($_GET['id']))
	{
		$reserved_id = $_GET['id'];

		$sql = "UPDATE `sensor_range_on_fish` SET active = 0";
		$db->query($sql);



		$sql2 = "UPDATE `sensor_range_on_fish` SET active = 1 where id = '$reserved_id'";
		$db->query($sql2);


		header('Location: sensor_range.php');

	}

?>