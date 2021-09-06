<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>WQMS | Login</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Water Quality <br>Monitoring System</div>
        <div class="tx-center mg-b-60">Login with valid Information</div>

        <form action="action.php" method="POST">
        	<div class="form-group">
	          <input type="email" class="form-control" name="email" placeholder="Enter your email">
	        </div><!-- form-group -->
	        <div class="form-group">
	          <input type="password" class="form-control" name="password" placeholder="Enter your password">
	          
	        </div><!-- form-group -->
        
        <button type="submit" name="btn-login_admin" class="btn btn-info btn-block">Login</button>

        <?php

            if(isset($_GET['msg']))
            {
          ?>

           <p style="color: red;font-weight: 700;">Wrong Credentials!</p>
          <?php 
            }
          ?>
        </form>
        
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

  </body>
</html>

