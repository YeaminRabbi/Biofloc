<?php require_once 'd_header.php'; ?>

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
            <span class="menu-item-label">Graphs</span>
          </div>
        </a>

        <a href="all_sensor_readings.php" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="fa fa-database" aria-hidden="true"></i>
            <span class="menu-item-label">All Sensor Readings</span>
          </div>
        </a>

       <!--   <a href="emails.php" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span class="menu-item-label">Contacts</span>
          </div>
        </a> -->

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
          <a href="#ADDPARTNERS" class="btn btn-primary" style="float: right;width: 150px;margin-bottom: 30px;">Add More</a>
            <table id="myTable" class="table-striped table-bordered">
    			   <thead>
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Contact</th>
                      <th class="text-center">Created at</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
    	                <?php 

    	                	foreach ($all_emails_from_system as $key => $data) {
    	                ?>

    	                <tr class="text-center">
    	                  <td><?= $key+1 ?></td>
    	                  <td><?= $data['name'] ?></td>
    	                  <td><?= $data['email'] ?></td>
    	                  <td><?= $data['contact'] ?></td>
    	                  <td><?= $data['created_at'] ?></td>
                        <td>
                          <a href="userdelete.php?userid=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>

    	                </tr>
    	                
    	                <?php 
    	                	}

    	                ?>
                	</tbody>
    			</table>
      </div>
      <div class="card pd-20 pd-sm-40 mg-t-30" id="ADDPARTNERS">
           <h6 class="card-body-title">Add People to the System</h6>
           <form action="add_person.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" class="form-control" name="email" id="email">
              </div>

              <div class="form-group">
                    <label for="name">Contact:</label>
                    <input type="text" class="form-control" name="contact" id="contact">
              </div>



              <input class="btn btn-warning" name="btn-addperson"  type="submit" value="Submit">
            </form>
      </div><!-- card -->

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

