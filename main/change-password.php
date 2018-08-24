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
  <title>Sunxcoin Affiliate Program | Change Password</title>
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
            <h4 class="page-title mb-3">Change your password</h4> 
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
                    <!-- <h4 class="card-title mb-3">Edit your profile information</h4> -->
                    <form class="cmxform" id="change-password" method="POST" action="./../backend/operation/changepass.php">
                        <fieldset>
                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input id="password" class="form-control" name="oldpass" type="password" placeholder="your Old Password">
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input id="new-password" class="form-control" name="newpass" type="password" placeholder="Enter your new password">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm password</label>
                            <input id="confirm-password" class="form-control" name="renewpass" type="password" placeholder="Re-enter your new password">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update Password">
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
  <?php include './../backend/destroyalert.php'; ?>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <!-- End custom js for this page-->
</body>

</html>
