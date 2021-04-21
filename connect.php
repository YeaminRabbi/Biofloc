<html>
<body>

<?php

$dbname = 'biofloc_automation';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

$pH = $_GET["pH"];
$TDS= $_GET["TDS"]; 
$TSS = $_GET["TSS"];
$Temp = $_GET["Temp"]; 


$query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>