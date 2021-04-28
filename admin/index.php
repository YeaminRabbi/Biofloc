<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php
 
 require_once 'graph_calculation.php';

?>

<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

<?php 

    require_once 'db_config.php';
     
    $pH = rand(4.5,9.0);
    $TDS= rand(950.70,1700.60); 
    $TSS =rand(975.90,1660.00);
    $Temp =rand(26.9,35.9); 


    $query = "INSERT INTO water_quality_monitoring_system (pH, TDS, TSS, Temp ) VALUES ('$pH', '$TDS', '$TSS', '$Temp' )";
    $result = mysqli_query($db,$query);

?>



  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php">InsightBD</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>




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

/// Parameter checking and sending mail to all users in the system
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


//Mailing based of the perimeters
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
  //recipient email here
  $rec = $mail_to;

  //send email
  mail($rec,$sub,$main_msg);

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








    <div class="sl-pagebody"><!-- MAIN CONTENT -->
        
        <div class="row row-sm mg-t-50">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Line Chart - pH</h6>
              <p class="mg-b-20 mg-sm-b-30">Readings from the latest 10 Realtime data</p>
              
              <canvas id="pH" width="400" height="400"></canvas>
              <script>
              var ctx = document.getElementById('pH');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['0','1', '2', '3', '4', '5', '6','7','8','9'],
                      datasets: [{
                          label: 'pH reading',
                          data: [
                          <?=$pH_data1?>,
                          <?=$pH_data2?>,
                          <?=$pH_data3?>,
                          <?=$pH_data4?>,
                          <?=$pH_data5?>,
                          <?=$pH_data6?>,
                          <?=$pH_data7?>,
                          <?=$pH_data8?>,
                          <?=$pH_data9?>,
                          <?=$pH_data10?>
                          ],

                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
              </script>
     
            </div><!-- card -->
          </div><!-- col-6 -->


          <div class="col-xl-6 mg-t-25 mg-xl-t-0">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Line Chart - TSS</h6>
              <p class="mg-b-20 mg-sm-b-30">Readings from the latest 10 Realtime data</p>
            

              <canvas id="TSS" width="400" height="400"></canvas>
              <script>
              var ctx = document.getElementById('TSS');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['0','1', '2', '3', '4', '5', '6','7','8','9'],
                      datasets: [{
                          label: 'TSS reading',
                          data: [
                          <?=$TSS_data1?>,
                          <?=$TSS_data2?>,
                          <?=$TSS_data3?>,
                          <?=$TSS_data4?>,
                          <?=$TSS_data5?>,
                          <?=$TSS_data6?>,
                          <?=$TSS_data7?>,
                          <?=$TSS_data8?>,
                          <?=$TSS_data9?>,
                          <?=$TSS_data10?>
                          ],

                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
              </script>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-50">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Line Chart - TDS</h6>
              <p class="mg-b-20 mg-sm-b-30">Readings from the latest 10 Realtime data</p>
              
              <canvas id="TDS" width="400" height="400"></canvas>
              <script>
              var ctx = document.getElementById('TDS');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['0','1', '2', '3', '4', '5', '6','7','8','9'],
                      datasets: [{
                          label: 'TDS reading',
                          data: [
                          <?=$TDS_data1?>,
                          <?=$TDS_data2?>,
                          <?=$TDS_data3?>,
                          <?=$TDS_data4?>,
                          <?=$TDS_data5?>,
                          <?=$TDS_data6?>,
                          <?=$TDS_data7?>,
                          <?=$TDS_data8?>,
                          <?=$TDS_data9?>,
                          <?=$TDS_data10?>
                          ],

                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
              </script>
     
            </div><!-- card -->
          </div><!-- col-6 -->


          <div class="col-xl-6 mg-t-25 mg-xl-t-0">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Line Chart - Temp</h6>
              <p class="mg-b-20 mg-sm-b-30">Readings from the latest 10 Realtime data</p>
            

              <canvas id="Temp" width="400" height="400"></canvas>
              <script>
              var ctx = document.getElementById('Temp');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: ['0','1', '2', '3', '4', '5', '6','7','8','9'],
                      datasets: [{
                          label: 'Temp reading',
                          data: [
                          <?=$Temp_data1?>,
                          <?=$Temp_data2?>,
                          <?=$Temp_data3?>,
                          <?=$Temp_data4?>,
                          <?=$Temp_data5?>,
                          <?=$Temp_data6?>,
                          <?=$Temp_data7?>,
                          <?=$Temp_data8?>,
                          <?=$Temp_data9?>,
                          <?=$Temp_data10?>
                          ],

                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
              </script>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->






    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->




  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>

 
  </body>

</html>

