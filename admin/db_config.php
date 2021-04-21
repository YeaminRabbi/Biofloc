<?php
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=water_quality_monitoring_system', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db = new mysqli('localhost', 'root','', 'water_quality_monitoring_system');


?>