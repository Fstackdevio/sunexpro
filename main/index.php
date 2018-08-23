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
  <title>Sunxcoin Affiliate Program | Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
      <?php include('./partials/header.php'); ?>
      <?php include('./partials/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Dashboard</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Account Balance: 
                    <b class="mb-0 ml-2">$7,223.3</b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Direct Referrals</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-flex">
                        <h2 class="mb-0">$10,200</h2>
                      </div>
                      <small class="text-gray">earned from your direct referrals</small>
                    </div>
                    <div class="d-inline-block">
                      <div class="bg-primary px-4 py-3 rounded">
                        <i class="fa fa-sitemap text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Indirect Referrals</h4>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                      <div class="d-flex">
                        <h2 class="mb-0">$2,256</h2>
                      </div>
                      <small class="text-gray">earned from your indirect referrals</small>
                    </div>
                    <div class="d-inline-block">
                      <div class="bg-success px-4 py-3 rounded">
                        <i class="icon icon-people text-white icon-lg"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-top">
                    <i class="icon icon-basket-loaded text-primary icon-md"></i>
                    <div class="ml-3">
                      <h3 class="text-primary">$5,232.47</h3>
                      <p class="mt-2 text-muted card-text">Total amount withdrawn</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-top">
                    <i class="icon icon-wallet text-success icon-md"></i>
                    <div class="ml-3">
                      <h3 class="text-success">$12,456</h3>
                      <p class="mt-2 text-muted card-text">Total amount earned</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-top">
                    <i class="icon icon-star text-warning icon-md"></i>
                    <div class="ml-3">
                      <h3 class="text-warning">Level 3</h3>
                      <p class="mt-2 text-muted card-text">Your leadership rank</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <h4 class="page-title ml-3 mb-3">Notifications</h4>
            <div class="col-md-12">
              <div class="card px-3 py-4">
                <div class="card-body text-center">
                  <p class="no-notif-icon"><i class="icon icon-bubble text-danger"></i></p>
                  <h3><span class="text-danger">There are no notifications available at this time</span></h3>
                </div>
              </div>
            </div>
          </div>
          </ul>
        </nav>
      </div>
    <!-- </div>
  </div>
</div>
</div>
</div> -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('./partials/footer.php'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>