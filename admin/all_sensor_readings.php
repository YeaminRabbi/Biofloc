<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="300"> 
    <title>Biofloc Dashboard</title>
    
    <!--Fabicon Image-->
    <link rel="shortcut icon"  href="../img/fabicon_logo/f-white.png">

    <!-- vendor css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>



    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">


  </head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
<?php 

require_once 'db_config.php';
 
$pH = rand(4.5,9.0);
$TDS= rand(950.70,1700.60); 
$TSS =rand(975.90,1660.00);
$Temp =rand(26.9,35.9); 


$query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
$result = mysqli_query($db,$query);
?>


<?php
 
 require_once 'graph_calculation.php';

?>



<div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> Biofloc</a></div>
    
    <div class="sl-sideleft">
      
      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="index.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>

        <a href="all_sensor_readings.php" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="fa fa-database" aria-hidden="true"></i>
            <span class="menu-item-label">All Sensor Readings</span>
          </div>
        </a>

         <a href="emails.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span class="menu-item-label">Emails</span>
          </div>
        </a>

       </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->



  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php">Biofloc</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
        

    	<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Reading from the Database</h6>

          <p class="mg-b-20 mg-sm-b-30">View search all the datas available here.</p>
          <table id="myTable" class="table-striped table-bordered">
			  <thead>
                <tr>
                  <th class="text-center">Sl</th>
                  <th class="text-center">pH</th>
                  <th class="text-center">TDS</th>
                  <th class="text-center">TSS</th>
                  <th class="text-center">Temp</th>
                  <th class="text-center">Realtime</th>
                </tr>
              </thead>
              <tbody>
	                <?php 

	                	foreach ($all_data_reading as $key => $data) {
	                ?>

	                <tr class="text-center">
	                  <td><?= $key+1 ?></td>
	                  <td><?= $data['pH'] ?></td>
	                  <td><?= $data['TDS'] ?></td>
	                  <td><?= $data['TSS'] ?></td>
	                  <td><?= $data['Temp'] ?></td>
	                  <td><?= $data['Realtime'] ?></td>
	                </tr>
	                
	                <?php 
	                	}

	                ?>
            	</tbody>
			</table>
        </div>


    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


<?php

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
if($tds>=1000.00 && $tds<=1500.00)
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

//Mailing based of the perimeters
if($trigger_ph!=1)
{

  for ($i=0; $i < count($EMAILS) ; $i++) { 
      MAILING("pH", $ph, $EMAILS[$i],$time,$NAMES[$i]);
    }

}
if($trigger_tss!=1)
{

  for ($i=0; $i < count($EMAILS) ; $i++) { 
      MAILING("TSS", $tss, $EMAILS[$i],$time,$NAMES[$i]);
    }
 
}
if($trigger_tds!=1)
{

  for ($i=0; $i < count($EMAILS) ; $i++) { 
      MAILING("TDS", $tds, $EMAILS[$i],$time,$NAMES[$i]);
    }
  
}
if($trigger_temp!=1)
{
  
  for ($i=0; $i < count($EMAILS) ; $i++) { 
      MAILING("TEMP", $temp, $EMAILS[$i],$time,$NAMES[$i]);
      
    }

}






//$msg = "Your latest reading for pH:".$last_data['pH']." TDS:".$last_data['TDS']." TSS:".$last_data['TSS']." Temp:".$last_data['Temp']." in realtime of ".$last_data['Realtime'];


function MAILING($sensor,$data,$mail_to,$time,$name)
{

  //the subject
  $sub = "Biofloc Warning Notification";

  //the message
  $msg="Hello! ".$name.", your ".$sensor." has a reading of ".$data." units at ".$time.". Please check your System";

  //recipient email here
  $rec = $mail_to;

  //send email
  mail($rec,$sub,$msg);

}


function fetch_data_from_table_latest($db)
    {
      $sql="Select * FROM water_quality_monitoring_system ORDER BY id DESC limit 1;";
      $result = mysqli_query($db,$sql);

      // Assoc array
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          
      // Free result set
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


?>

  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
 
  <script>
  	$('#myTable').DataTable({
	  bLengthChange: true,
	  searching: true,
	  responsive: true
	});
  </script>


  </body>

</html>

