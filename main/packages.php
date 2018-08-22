<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once ('./../backend/util/functions.php');
  $utility = new Utility();
  $auth = new Auth();
  $inactive = 12000;
  $session_life = time() - $_SESSION['timestamp'];
  if (!isset($_SESSION['user_id'])){  
    header("Location: ./../login.php");  
  } else {
    $_SESSION['last_activity'] = time();
  }
  $usid = $_SESSION['user_id'];
  $userdetails = $utility->getone("SELECT * FROM customers WHERE _id = '$usid'");
    $walletdetails = $utility->getone("SELECT * FROM wallet WHERE userid = '$usid'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sunxcoin Affiliate Program | Packages</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
   <?php include('./partials/header.php'); ?>
      <?php include('./partials/sidebar.php'); ?>
      
      <!-- partial -->
      <div class="main-panel" >
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">               
              <div class="container text-center">
                <h4 class="mb-3 mt-3">Start up your Bussiness today</h4>
                <p class="w-75 mx-auto mb-5">Choose a plan that suits you best.</p>
                
                <div class="row pricing-table">
                  
                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Agent Package</h3> <br>
                      <img src="./images/packages/Agent-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Starter Package</h3> <br>
                      <img src="./images/packages/Starter-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Trader Package</h3> <br>
                      <img src="./images/packages/Trader-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Ruby Package</h3> <br>
                      <img src="./images/packages/Ruby-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Rubbylight </h3> <br>
                      <img src="./images/packages/Rubylight-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-6 grid-margin stretch-card pricing-card">
                    <div class="card border-primary border pricing-card-body">
                      <h3 class="text-default">Platinum Package</h3> <br>
                      <img src="./images/packages/platinum-package.jpg" alt="packages" class="center">
                      <br>
                      <div class="wrapper">
                        <br>
                        <a href="#" class="btn btn-outline-primary btn-block">Buy </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <style>
        .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}
     </style>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include('./partials/footer.php'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
