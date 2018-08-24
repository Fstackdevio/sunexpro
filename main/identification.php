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
  <title>Sunxcoin Affiliate Program | Upload Identification</title>
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
            <h4 class="page-title mb-3">Upload Identification Document</h4>  
            <?php
                $auth = new Auth();
                $auth->getSessions();
                if(isset($_SESSION['message'])){
            ?>
            <div id="sessmsg" class="<?php echo $_SESSION['messagetype']; ?> alert-dismissible" style="text-align: center;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $_SESSION['message']; ?>
            </div>
            <?php
                }
            ?>        
              <div class="container">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title mb-4 text-warning">
                        As part of SunexCoin affiliate program policy, it is required that all registered users upload a valid government issued ID and
                        a valid proof of residence (such as electricity bill, water bill, internet bill, lease or mortgage documents etc issued within the last 90 days) before their withdrawals can be processed
                    </h4>
                    <form class="cmxform" id="change-password" action="./../backend/operation/fileupload.php" method="POST" enctype="multipart/form-data">
                        <fieldset>
                        <div class="form-group mb-5">
                            <label for="valid-id">Upload your valid government issued ID</label>
                            <input id="valid-id" name="upload[]" type="file" class="dropify" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="valid-id">Upload your recent proof of address</label>
                            <input id="valid-id" name="upload[]" type="file" class="dropify" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="Upload Documents">
                        </fieldset>
                    </form>
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
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/misc.js"></script>
  <script src="./js/settings.js"></script>
  <script src="./js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./js/dropify.js"></script>
  <?php include './../backend/destroyalert.php'; ?>
  <!-- End custom js for this page-->
</body>

</html>
