

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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

        <a href="all_sensor_readings.php" class="sl-menu-link ">
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
        
         <a href="sensor_range.php" class="sl-menu-link active" >
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
      <span class="breadcrumb-item active">Sensor with Range & Fish</span>
    </nav>



<?php 

  require_once 'db_config.php';


  $rui_active_status = fetch_all_data_usingDB($db,"select * from sensor_range_on_fish where id = 1");
  $katla_active_status = fetch_all_data_usingDB($db,"select * from sensor_range_on_fish where id = 2");
  $illish_active_status = fetch_all_data_usingDB($db,"select * from sensor_range_on_fish where id = 3");

  function fetch_all_data_usingDB($db,$sql){
      
      $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $row;
    }


?>


    <div class="sl-pagebody"><!-- MAIN CONTENT -->
       <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
           
          <div class="card pd-20 bg-sl-primary">
            
           
            <div class="d-flex justify-content-between align-items-center mg-b-10">
            <a href="click.php?id=1">
              <h3 class="tx-white">RUI</h3>
              <p class="tx-white">
                  <?php 

                    if($rui_active_status['active'] == 1){ 
                      echo "(Active)";
                    }
                  ?>
              </p>

              </a>
                 <a  class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>     
            </div><!-- card-header -->

            
            <div class="d-flex align-items-center justify-content-between">
              
             
            </div><!-- card-body -->
                   
          </div><!-- card -->


        </div><!-- col-3 -->

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-purple">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
               <a href="click.php?id=2">
               <h3 class="tx-white">Katla</h3>
               <p class="tx-white">
                  <?php 

                    if($katla_active_status['active'] == 1){ 
                      echo "(Active)";
                    }
                  ?>
              </p>
            </a>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             
              
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->

        

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-danger">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <a href="click.php?id=3">
                <h3 class="tx-white">Illish </h3>

                <p class="tx-white">
                  <?php 

                    if($illish_active_status['active'] == 1){ 
                      echo "(Active)";
                    }
                  ?>
                </p>
              </a>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
           
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->
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


