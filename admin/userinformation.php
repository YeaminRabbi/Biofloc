<?php require_once 'd_header.php'; ?>

<!-- ########## START: LEFT PANEL ########## -->


<?php 

 require_once 'db_config.php';

 function fetch_all_data_usingDB($db,$sql){
      
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $row;

  }

    $user_data= fetch_all_data_usingDB($db,"select * from user");



?>


<div class="sl-logo"><a href="index.php"><i class="icon ion-android-star-outline"></i> Biofloc </a></div>
    
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

       <a href="userinformation.php" class="sl-menu-link active">
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
      <span class="breadcrumb-item active">User Information</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      
<a href="PDF.php" target="_blank" class="btn btn-warning">Data Reading in PDF</a>
      <div class="row row-sm mg-t-20">
          
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">User Information</h6>
              <form action="action.php" method="POST">
                  
                  <div class="row">
                    <label class="col-sm-4 form-control-label">Name: </label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control" name="name" value="<?= $user_data['name'] ?>">
                    </div>
                  </div><!-- row -->


                  <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Email: </label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control" name="email" value="<?= $user_data['email'] ?>">
                    </div>
                  </div>
                  <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Contact: </label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control" name="contact"  value="<?= $user_data['contact'] ?>">
                    </div>
                  </div>
                  <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Address:</label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control" name="address"  value="<?= $user_data['address'] ?>">
                    </div>
                  </div>
                  <div class="form-layout-footer mg-t-30">
                    <button type="submit" name="btn_submit" class="btn btn-success mg-r-5">Update Information</button>
                
                  </div><!-- form-layout-footer -->
              </form>
              
            </div><!-- card -->
          </div><!-- col-6 -->
         

          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">User Information</h6>
             
              <div class="row">
                <label class="col-sm-4 form-control-label">Name: </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter firstname">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter lastname">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Contact:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter email address">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" placeholder="Enter your address"></textarea>
                </div>
              </div>
              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-success mg-r-5">Update Information</button>
            
              </div><!-- form-layout-footer -->
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

