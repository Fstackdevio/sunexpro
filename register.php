<?php 
  session_start();
  require_once('backend/util/functions.php');
  $refid = isset($_GET['referal']) ? $_GET['referal'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sunxcoin Affiliate Registration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./main/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./main/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./main/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="./main/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./main/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="./main/css/custom.css">
  <link rel="stylesheet" href="./main/css/loading.css">
  <link rel="stylesheet" href="./main/css/loading-btn.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./main/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./main/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100 mx-auto">
          <div class="col-lg-4 mx-auto">
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
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
              <form method="POST" id="register-form"  action="./backend/operation/customerReg.php">
                <div class="form-group">
                  <div class="input-group">
                    <input class="form-control" name="referal_code" placeholder="Refered by" value="<?php echo $refid; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div> <br>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Full name" name="fullname">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email address" name="email">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="login" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php 
    function destroysess(){
        unset($_SESSION['message']);
        unset($_SESSION['messagetype']);
    }
  ?>
  <script>
        setTimeout(function(){
          $('#sessmsg').remove();
        }, 5000);
        var runQuery = "<?php destroysess(); ?>"; 
  </script>
  <script src="./main/vendors/js/vendor.bundle.base.js"></script>
  <script src="./main/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./main/js/off-canvas.js"></script>
  <script src="./main/js/hoverable-collapse.js"></script>
  <script src="./main/js/misc.js"></script>
  <script src="./main/js/settings.js"></script>
  <script src="./main/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>