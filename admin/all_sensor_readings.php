<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="1800"> 
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

    <script>
     function autoClick(){
     document.getElementById('linkToClick').click();
     }
     </script>

  </head>

<body onload="setTimeout('autoClick();');">

<!-- ########## START: LEFT PANEL ########## -->



<?php
 
 require_once 'graph_calculation.php';

?>

<!-- Randomm data insert for testing -->
<?php 

    // require_once 'db_config.php';
     
    // $pH = rand(4.5,9.0);
    // $TDS= rand(950.70,1700.60); 
    // $TSS =rand(975.90,1660.00);
    // $Temp =rand(26.9,35.9); 


    // $query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
    // $result = mysqli_query($db,$query);

?>


<!-------------------------------- code for sms or email ------------------------------------>

<!-- This code is for mailing -->
<?php

  
  // $last_data = fetch_data_from_table_latest($db);
  // $all_emails=fetch_data_from_table_emails($pdo);

  // $EMAILS=array();
  // $NAMES=array();
  // foreach ($all_emails as $key => $data) {
      
  //    array_push($EMAILS,$data['email']);    
  //    array_push($NAMES,$data['name']);    

  // }


  // $ph=$last_data['pH'];
  // $tds=$last_data['TDS'];
  // $tss=$last_data['TSS'];
  // $temp=$last_data['Temp'];
  // $time = $last_data['Realtime'];

  
  // $trigger_ph=0;
  // $trigger_tds=0;
  // $trigger_tss=0;
  // $trigger_temp=0;

  // if($ph>=6.8 && $ph<=8.0)
  // {
  //   $trigger_ph=1;
  // }
  // if($tds<=1500.00)
  // {
  //   $trigger_tds=1;
  // }
  // if($tss>=1000.00 && $tss<=1500.00)
  // {
  //   $trigger_tss=1;
  // }
  // if($temp>=28.0 && $temp<=30.0)
  // {
  //   $trigger_temp=1;
  // }


  
  // if($trigger_ph!=1 || $trigger_tss!=1 || $trigger_tds!=1 || $trigger_temp!=1)
  // {

  //   for ($i=0; $i < count($EMAILS) ; $i++) { 
        
  //       MAILING($temp,$tds,$tss,$ph,$EMAILS[$i],$time,$NAMES[$i],$trigger_ph,$trigger_tss,$trigger_tds,$trigger_temp);

  //     }

     
  // }

  // function MAILING($temp,$tds,$tss,$ph,$mail_to,$time,$name,$trigger_ph,$trigger_tss,$trigger_tds,$trigger_temp)
  // {

  //   $formating_time=date("d M, Y | H:ia",strtotime($time));
  //   $sub = "Biofloc Notification";
  //   $msg_start="Hello! ".$name.", your Biofloc system has an unsual reading at ".$formating_time.". Please check your System:\n";

  //   $msg_ph="";
  //   $msg_temp="";
  //   $msg_tss="";
  //   $msg_tds="";

  //       if($trigger_ph!=1)
  //       {
  //         $msg_ph="ph reading: ".$ph." units\n";
  //       }
  //       if($trigger_tss!=1)
  //       {
  //          $msg_tss="tss reading: ".$tss." units\n";
  //       }
  //       if($trigger_tds!=1)
  //       {
  //          $msg_tds="tds reading: ".$tds." units\n";
  //       }
  //       if($trigger_temp!=1)
  //       {
  //         $msg_temp="temp reading: ".$temp." units\n";
  //       }
        
  //   $main_msg=$msg_start.$msg_ph.$msg_temp.$msg_tss.$msg_tds;
   
  //   $rec = $mail_to;

   
  //   mail($rec,$sub,$main_msg);

  // }

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


?>

<!-- This code is for SMS -->

<?php 
  
  $last_data = fetch_data_from_table_latest($db);
  $all_emails=fetch_data_from_table_emails($pdo);

  $EMAILS=array();
  $NAMES=array();
  $CONTACTS=array();
  foreach ($all_emails as $key => $data) {
      
     array_push($EMAILS,$data['email']);    
     array_push($NAMES,$data['name']);    
     array_push($NAMES,$data['contact']);    

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

  //dynamic range for different fish 


  $finding_active_fish_status = fetch_all_data_usingDB($db,"select * from sensor_range_on_fish where active = 1");

  $ph_high = $finding_active_fish_status['ph_high'];
  $ph_low = $finding_active_fish_status['ph_low'];
  
  $tss_range = $finding_active_fish_status['tss'];
  
  $tds_high = $finding_active_fish_status['tds_high'];
  $tds_low = $finding_active_fish_status['tds_low'];
  
  $temp_low = $finding_active_fish_status['temp_low'];
  $temp_high = $finding_active_fish_status['temp_high'];


  
  function fetch_all_data_usingDB($db,$sql){
      
      $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $row;
    }




//dynamic changes in the ranges
  if($ph>=$ph_low && $ph<=$ph_high)
  {
    $trigger_ph=1;
  }
  if($tds>=$tds_low && $tds<=$tds_high)
  {
    $trigger_tds=1;
  }
  if($tss<=$tss_range)
  {
    $trigger_tss=1;
  }
  if($temp>=$temp_low && $temp<=$temp_high)
  {
    $trigger_temp=1;
  }

  $main_msg="Hello! your Biofloc system is working correctly";
  
  if($trigger_ph!=1 || $trigger_tss!=1 || $trigger_tds!=1 || $trigger_temp!=1)
  {

   
          
          $formating_time=date("d M, Y | H:ia",strtotime($time));
          
          $msg_start="Hello!, your Biofloc system has an unsual reading at ".$formating_time.". Please check your System: \n";

          $msg_ph="";
          $msg_temp="";
          $msg_tss="";
          $msg_tds="";

              if($trigger_ph!=1)
              {
                $msg_ph=" ph reading: ".$ph." units\n";
              }
              if($trigger_tss!=1)
              {
                 $msg_tss=" tss reading: ".$tss." units\n";
              }
              if($trigger_tds!=1)
              {
                 $msg_tds=" tds reading: ".$tds." units\n";
              }
              if($trigger_temp!=1)
              {
                $msg_temp=" temp reading: ".$temp." units\n";
              }
              
          $main_msg=$msg_start.$msg_ph.$msg_temp.$msg_tss.$msg_tds;
     
  }
  ?> 


<a id="linkToClick" href="sms.php?msg=<?= $main_msg ?>" target="_blank"></a>

<div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> Biofloc</a></div>
    
    <div class="sl-sideleft">
      
      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="index.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <span class="menu-item-label">Graphs</span>
          </div>
        </a>

        <a href="all_sensor_readings.php" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="fa fa-database" aria-hidden="true"></i>
            <span class="menu-item-label">All Sensor Readings</span>
          </div>
        </a>

       <a href="userinformation.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="menu-item-label">User Information</span>
          </div>
        </a>
        
         <a href="sensor_range.php" class="sl-menu-link">
          <div class="sl-menu-item">
           <i class="fa fa-exchange" aria-hidden="true"></i>
            <span class="menu-item-label">Sensor Range</span>
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
      <span class="breadcrumb-item active">Data Readings</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->


      <a href="PDF.php" target="_blank" class="btn btn-warning mb-2">Data Reading in PDF</a>


        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Data Readings</h6>
          
        
         
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr >
                  <th class="text-center">SL</th>
                  <th class="text-center">pH</th>
                  <th class="text-center">TDS</th>
                  <th class="text-center">TSS</th>
                  <th class="text-center">Temp </th>
                  <th class="text-center">Realtime</th>
                  
                </tr>
              </thead>
              <tbody>
                
                    <?php 

                      foreach ($all_data_reading as $key => $data) {
                    ?>

                    <tr class="text-center" style="font-weight: 700;">
                      <td style="width: 10px;"><?= $key+1 ?></td>
                     
                      <td style="width: 10px;"><?= $data['pH'] ?></td>
                      <td style="width: 10px;"><?= $data['TDS'] ?></td>
                      <td style="width: 10px;"><?= $data['TSS'] ?></td>
                      <td style="width: 10px;"><?= $data['Temp'] ?></td>
                      <td style="width: 10px;">

                        <?php
                          $date = date("d M, Y - h:i a", strtotime($data['Realtime']));
                          

                          echo $date;
                        ?>
                        
                      </td>


                    </tr>
                    
                    <?php 
                      }

                    ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>    

    
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


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


