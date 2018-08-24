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
  <title>Sunxcoin Affiliate Program | My Account</title>
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
            <div class="col-8">     
            <h4 class="page-title mb-3">Update your profile information</h4><br>
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
                    <form class="cmxform" id="profile" method="POST" action="./../backend/operation/update_profile.php">
                        <fieldset>
                            <div class="row">
                                <div class="col-6 col-small-12">
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input id="fullname" class="form-control" name="fullname" type="text" value="<?php echo $userdetails['fullname']; ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-small-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control" name="email" type="email" value="<?php echo $userdetails['email']; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" class="form-control" name="phone" type="text" placeholder="+234xxxxxxxxx" value="<?php echo $userdetails['phone']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option><?php echo $userdetails['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Prefer Unknown">Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                        
                        <div class="form-group">
                            <label for="sponsor">Sponsor</label>
                            <input id="sponsor" class="form-control" name="sponsor" type="text" value="<?php echo $userdetails['sponsor']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input id="country" class="form-control" name="country" type="text" value="<?php echo $userdetails['country']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="state">State / Province</label>
                            <input id="state" class="form-control" name="state" type="text" value="<?php echo $userdetails['state']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input id="city" class="form-control" name="city" type="text" value="<?php echo $userdetails['city']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" class="form-control" name="address" rows="4" type="text"> <?php echo $userdetails['address']; ?> </textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
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
  <!-- End custom js for this page-->
</body>

</html>
