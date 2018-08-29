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
  <link rel="stylesheet" href="./css/custom.css">
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
        <h4 class="page-title mb-4">Support Center</h4>
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
          <div class="row">
            <div class="col-12 mb-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Contact Form</h4>
                  <p class="card-description">Please fill in the form below and send us a message about your questions.</p>
                  <br>
                  <form action="./../backend/operation/Support.php" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Full name</label> -->
                          <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="fullname" placeholder="Full name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                          <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="subject" placeholder="Subject" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                          <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="email" placeholder="Email" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone" />
                          </div>
                        </div>
                      </div>
                    </div>
                  <textarea id="simpleMde" name="message"></textarea>
                  <button type="button" class="btn btn-primary btn-fw btn-lg">Send</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include('./partials/footer.php'); ?>
        <style>
          .CodeMirror, .CodeMirror-scroll {
            min-height: 200px !important;
          }
        </style>
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
  <script src="./js/editorDemo.js"></script>
  <!-- End custom js for this page-->
</body>

</html>