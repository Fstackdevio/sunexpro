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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sunxcoin Affiliate View</title>
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
    <!-- partial:../../partials/_navbar.html -->
     <?php include('./partials/header.php'); ?>
      <?php include('./partials/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      <div class="alert alert-warning" role="alert">
                        <strong>Affiliate type % :</strong> <br> Direct -> 10% <br> Indirect1 -> 3% <br> Indirect2 -> 2% <br> Indirect3 -> 1% . 
                     </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>No :</th>
                              <th>Username</th>
                              <th>Affiliate Type</th>
                              <th>Date Reg</th>
                              <th>Package</th>
                              <th>Invested Amount</th>
                              <th>Earning</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php 
                            $number = 0;
                            $dr = $utility->easyquery("SELECT * FROM affilation WHERE referee = '$rfcode'");
                            foreach ($dr as $idr) {
                              $param = $idr['referal'];
                              $dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
                              $earning = ($dl['subamount'] / 100) * 10;
                          ?>
                            <tr>
                              <td><?php echo $number++; ?></td>
                              <td><?php echo $dl['fullname']; ?></td>
                              <td>Direct</td>
                              <td><?php echo $dl['dateRegistered']; ?></td>
                              <td><?php echo $dl['subtybe']; ?></td>
                              <td><?php echo "$" . $dl['subamount']; ?> </td>
                              <td><?php echo "$" . $earning; ?></td>
                            </tr>
                          <?php
                            }
                            $unitTest = $utility->getref($rfcode);
                            $param = $unitTest[0];
                            foreach ($param as $iparam) {
                              $drop  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$iparam'");
                              $earning_firstgen = ($drop['subamount'] / 100) * 10;
                          ?>
                            <tr>
                              <td>1</td>
                              <td><?php echo $drop['fullname']; ?></td>
                              <td>Indirect</td>
                              <td><?php echo $drop['dateRegistered']; ?></td>
                              <td><?php echo $drop['subtybe']; ?></td>
                              <td><?php echo "$" . $drop['subamount']; ?> </td>
                              <td><?php echo "$" . $earning_firstgen; ?></td>
                            </tr>
                          <?php 
                            }
                            $param = $unitTest[1];
                            foreach ($param as $iparam) {
                              $drop  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$iparam'");
                              $earning_firstgen = ($drop['subamount'] / 100) * 10;
                          ?>
                          <tr>
                              <td>1</td>
                              <td><?php echo $drop['fullname']; ?></td>
                              <td>Indirect</td>
                              <td><?php echo $drop['dateRegistered']; ?></td>
                              <td><?php echo $drop['subtybe']; ?></td>
                              <td><?php echo "$" . $drop['subamount']; ?> </td>
                              <td><?php echo "$" . $earning_firstgen; ?></td>
                            </tr>
                          <?php 
                            }
                            $param = $unitTest[2];
                            foreach ($param as $iparam) {
                              $drop  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$iparam'");
                              $earning_firstgen = ($drop['subamount'] / 100) * 10;
                          ?>
                          <tr>
                              <td>1</td>
                              <td><?php echo $drop['fullname']; ?></td>
                              <td>Indirect</td>
                              <td><?php echo $drop['dateRegistered']; ?></td>
                              <td><?php echo $drop['subtybe']; ?></td>
                              <td><?php echo "$" . $drop['subamount']; ?> </td>
                              <td><?php echo "$" . $earning_firstgen; ?></td>
                            </tr>
                          <?php 
                            }
                            $param = $unitTest[3];
                            foreach ($param as $iparam) {
                              $drop  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$iparam'");
                              $earning_firstgen = ($drop['subamount'] / 100) * 10;
                          ?>
                           <tr>
                              <td>1</td>
                              <td><?php echo $drop['fullname']; ?></td>
                              <td>Indirect</td>
                              <td><?php echo $drop['dateRegistered']; ?></td>
                              <td><?php echo $drop['subtybe']; ?></td>
                              <td><?php echo "$" . $drop['subamount']; ?> </td>
                              <td><?php echo "$" . $earning_firstgen; ?></td>
                            </tr>
                          <?php 
                            }
                          ?>

                         </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
  <script src="../../js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>

</html>