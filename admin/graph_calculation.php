<?php
	require_once 'db_config.php';

	
	$data_reading =fetch_data_pdo_from_table($pdo);

	$all_data_reading = fetch_all_data_pdo_from_table($pdo);

	$all_emails_from_system = fetch_all_data_pdo_from_email_table($pdo);
	  


	  function fetch_data_from_table($db)
	  {
	    $sql="Select * FROM water_quality_monitoring_system ORDER BY id DESC limit 10;";
	    $result = mysqli_query($db,$sql);

	    // Assoc array
	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	        
	    // Free result set
	    mysqli_free_result($result);
	  
	    return $row;
	    
	  }


	  
	  function fetch_data_pdo_from_table($pdo)
	  {

	  	//GROUP BY hour(Realtime)
	    $sql="Select * FROM water_quality_monitoring_system ORDER BY id DESC limit 20;";
	    $statement = $pdo->prepare($sql);
	    $statement->execute();
	    $row = $statement->fetchAll();
	  
	    return $row;
	    
	  }

	  function fetch_all_data_pdo_from_table($pdo)
	  {

	    $sql="Select * FROM water_quality_monitoring_system ORDER BY id DESC;";
	    $statement = $pdo->prepare($sql);
	    $statement->execute();
	    $row = $statement->fetchAll();
	  
	    return $row;
	    
	  }


	  function fetch_all_data_pdo_from_email_table($pdo)
	  {

	    $sql="Select * FROM emails ORDER BY id DESC;";
	    $statement = $pdo->prepare($sql);
	    $statement->execute();
	    $row = $statement->fetchAll();
	  
	    return $row;
	    
	  }


	 $pH_dataset=array();
	 $TDS_dataset=array();
	 $TSS_dataset=array();
	 $Temp_dataset=array();
	
	 foreach ($data_reading as $key => $data) {
	 	
	 	array_push($pH_dataset,$data['pH']);

	 	array_push($TDS_dataset,$data['TDS']);

	 	array_push($TSS_dataset,$data['TSS']);

	 	array_push($Temp_dataset,$data['Temp']);

	 	
	 	

	 }

	 //pH latest 10 readings
	 $pH_data1= $pH_dataset[0];
	 $pH_data2= $pH_dataset[1];
	 $pH_data3= $pH_dataset[2];
	 $pH_data4= $pH_dataset[3];
	 $pH_data5= $pH_dataset[4];
	 $pH_data6= $pH_dataset[5];
	 $pH_data7= $pH_dataset[6];
	 $pH_data8= $pH_dataset[7];
	 $pH_data9= $pH_dataset[8];
	 $pH_data10= $pH_dataset[9];

	 //TDS latest 10 readings
	 $TDS_data1= $TDS_dataset[0];
	 $TDS_data2= $TDS_dataset[1];
	 $TDS_data3= $TDS_dataset[2];
	 $TDS_data4= $TDS_dataset[3];
	 $TDS_data5= $TDS_dataset[4];
	 $TDS_data6= $TDS_dataset[5];
	 $TDS_data7= $TDS_dataset[6];
	 $TDS_data8= $TDS_dataset[7];
	 $TDS_data9= $TDS_dataset[8];
	 $TDS_data10= $TDS_dataset[9];


	 //TSS latest 10 readings
	 $TSS_data1= $TSS_dataset[0];
	 $TSS_data2= $TSS_dataset[1];
	 $TSS_data3= $TSS_dataset[2];
	 $TSS_data4= $TSS_dataset[3];
	 $TSS_data5= $TSS_dataset[4];
	 $TSS_data6= $TSS_dataset[5];
	 $TSS_data7= $TSS_dataset[6];
	 $TSS_data8= $TSS_dataset[7];
	 $TSS_data9= $TSS_dataset[8];
	 $TSS_data10= $TSS_dataset[9];

	 //Temp latest 10 readings
	 $Temp_data1= $Temp_dataset[0];
	 $Temp_data2= $Temp_dataset[1];
	 $Temp_data3= $Temp_dataset[2];
	 $Temp_data4= $Temp_dataset[3];
	 $Temp_data5= $Temp_dataset[4];
	 $Temp_data6= $Temp_dataset[5];
	 $Temp_data7= $Temp_dataset[6];
	 $Temp_data8= $Temp_dataset[7];
	 $Temp_data9= $Temp_dataset[8];
	 $Temp_data10= $Temp_dataset[9];

	

?>