<html>
<body>

<?php

// $dbname = 'biofloc_automation';
// $dbuser = 'root';  
// $dbpass = ''; 
// $dbhost = 'localhost'; 

// $connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// if(!$connect){
// 	echo "Error: " . mysqli_connect_error();
// 	exit();
// }

// echo "Connection Success!<br><br>";

// $pH = $_GET["pH"];
// $TDS= $_GET["TDS"]; 
// $TSS = $_GET["TSS"];
// $Temp = $_GET["Temp"]; 


// $query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
// $result = mysqli_query($connect,$query);

// echo "Insertion Success!<br>";

?>


<!-- Randomm data insert for testing -->
<?php 

    require_once 'admin/db_config.php';
     
    $pH = rand(4.5,9.0);
    $TDS= rand(950.70,1700.60); 
    $TSS =rand(975.90,1660.00);
    $Temp =rand(26.9,35.9); 


    $query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
    $result = mysqli_query($db,$query);

?>






<!-- This code is for mailing -->
<!-- <?php

	require_once 'admin/db_config.php';
	$last_data = fetch_data_from_table_latest($db);
	$all_emails=fetch_data_from_table_emails($pdo);

	$EMAILS=array();
	$NAMES=array();
	foreach ($all_emails as $key => $data) {
	    
	   array_push($EMAILS,$data['email']);    
	   array_push($NAMES,$data['name']);    

	}


	$ph=$last_data['pH'];
	$tds=$last_data['TDS'];
	$tss=$last_data['TSS'];
	$temp=$last_data['Temp'];
	$time = $last_data['Realtime'];

	
	$trigger_ph=0;
	$trigger_tds=0;
	$trigger_tss=0;
	$trigger_temp=0;

	if($ph>=6.8 && $ph<=8.0)
	{
	  $trigger_ph=1;
	}
	if($tds<=1500.00)
	{
	  $trigger_tds=1;
	}
	if($tss>=1000.00 && $tss<=1500.00)
	{
	  $trigger_tss=1;
	}
	if($temp>=28.0 && $temp<=30.0)
	{
	  $trigger_temp=1;
	}


	
	if($trigger_ph!=1 || $trigger_tss!=1 || $trigger_tds!=1 || $trigger_temp!=1)
	{

	  for ($i=0; $i < count($EMAILS) ; $i++) { 
	      
	      MAILING($temp,$tds,$tss,$ph,$EMAILS[$i],$time,$NAMES[$i],$trigger_ph,$trigger_tss,$trigger_tds,$trigger_temp);

	    }

	   
	}

	function MAILING($temp,$tds,$tss,$ph,$mail_to,$time,$name,$trigger_ph,$trigger_tss,$trigger_tds,$trigger_temp)
	{

	  $formating_time=date("d M, Y | H:ia",strtotime($time));
	  $sub = "Biofloc Notification";
	  $msg_start="Hello! ".$name.", your Biofloc system has an unsual reading at ".$formating_time.". Please check your System:\n";

	  $msg_ph="";
	  $msg_temp="";
	  $msg_tss="";
	  $msg_tds="";

	      if($trigger_ph!=1)
	      {
	        $msg_ph="ph reading: ".$ph." units\n";
	      }
	      if($trigger_tss!=1)
	      {
	         $msg_tss="tss reading: ".$tss." units\n";
	      }
	      if($trigger_tds!=1)
	      {
	         $msg_tds="tds reading: ".$tds." units\n";
	      }
	      if($trigger_temp!=1)
	      {
	        $msg_temp="temp reading: ".$temp." units\n";
	      }
	      
	  $main_msg=$msg_start.$msg_ph.$msg_temp.$msg_tss.$msg_tds;
	 
	  $rec = $mail_to;

	 
	  mail($rec,$sub,$main_msg);

	}

	function fetch_data_from_table_latest($db)
	    {
	      $sql="Select * FROM water_quality_monitoring_system ORDER BY id DESC limit 1;";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	      mysqli_free_result($result);

	      return $row;
	      
	    }


	function fetch_data_from_table_emails($pdo)
	    {
	      $sql="Select * FROM emails";
	      $statement = $pdo->prepare($sql);
	      $statement->execute();
	      $row = $statement->fetchAll();
	    
	      return $row;
	      
	    }


?> -->


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