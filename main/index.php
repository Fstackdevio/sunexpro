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
  $rfcode = $userdetails['referal_code'];

  $unitTest = $utility->getref($rfcode);
  $firstgen = $unitTest[0];
  $secondgen = $unitTest[1];
  $thirdgen = $unitTest[2];
  $forthgen = $unitTest[3];
  $amount_of_dr = count($firstgen);
  $amount_of_idr = count($secondgen) + count($thirdgen) + count($forthgen);
  
  $dramount = array();

  $dr = $utility->easyquery("SELECT * FROM affilation WHERE referee = '$rfcode'");
  foreach ($dr as $idr) {
    $param = $idr['referal'];
    $dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
    $amount = $dl['subamount'];
    array_push($dramount, $amount);
  }

  $realdirectref = array_sum($dramount);

  $cash1 = array();
  $cash2 = array();
  $cash3 = array();
  
  foreach ($secondgen as $secondgenid) {
    $dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
      $amount1 = $dl['subamount'];
      array_push($cash1, $amount1);
  }

  foreach ($thirdgen as $thirdgenid) {
    $dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
      $amount2 = $dl['subamount'];
      array_push($cash2, $amount2);
  }

  foreach ($forthgen as $forthgenid) {
    $dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
      $amount3 = $dl['subamount'];
      array_push($cash3, $amount3);
  }

  $sumcash1 = array_sum($cash1);
  $sumcash2 = array_sum($cash2);
  $sumcash3 = array_sum($cash3);

  $total_idr = $sumcash1 + $sumcash2 + $sumcash3;

  $mytransaction = array();
  $gettransactions = $utility->easyquery("SELECT * FROM withdrawal_request WHERE userid = '$rfcode'");
  foreach ($gettransactions as $trasaction) {
    $param = $trasaction['amount'];
    if($trasaction['approve'] == 1){
      array_push($mytransaction, $param);
    }
  }
  $totalwithdraw = array_sum($mytransaction);

  $levelcal = $utility->getting_level($realdirectref + $total_idr);

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
                    <b class="mb-0 ml-2"><?php echo "$" . $userdetails['acc_bal']; ?></b>
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
                        <h2 class="mb-0"><?php echo "$". $realdirectref; ?></h2>
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
                        <h2 class="mb-0"><?php echo "$" . $total_idr; ?></h2>
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
                      <h3 class="text-primary"><?php echo "$". $totalwithdraw; ?> </h3>
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
                      <h3 class="text-success"><?php echo "$". $realdirectref + $total_idr; ?></h3>
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
                      <h3 class="text-warning">Level <?php echo $levelcal; ?></h3>
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