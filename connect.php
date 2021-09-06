<html>
<body>

<?php

$dbname = 'water_quality_monitoring_system';
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










<!-- This code is for SMS  -->
<?php 
	
	if($pH>=6.8 && $pH<=8.0)
	{
	  header("Location: sms.php?sensor=ph&val=$pH");
	}
	if($TDS<=1500.00)
	{
	  header("Location: sms.php?sensor=tds&val=$TDS");
	}
	if($TSS>=1000.00 && $TSS<=1500.00)
	{
		
	  header("Location: sms.php?sensor=tss&val=$TSS");

	}
	if($Temp>=28.0 && $Temp<=30.0)
	{
	  header("Location: sms.php?sensor=temp&val=$Temp");

	}

?>


</body>
</html>