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

