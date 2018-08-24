<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <img src="images/favicon.png" alt="profile image">
            <p class="text-center font-weight-medium text-upper"><?php echo $userdetails['fullname']; ?></p>
            <p class="text-center font-weight-light">
              Referral Code: <?php echo $userdetails['referal_code'] ?>
              <input type="text" value="https://affiliate.sunxcoin.com/register/<?php echo $userdetails['referal_code'] ?>" id="ref-link" class="faraway" aria-hidden="true">
              <button type="button" class="btn btn-icons btn-rounded btn-inverse-primary ml-2" onclick="copyRefLink()"><i class="fa fa-paste"></i></button>
            </p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index">
              <i class="menu-icon icon-grid"></i>
              <span class="menu-title">Dashboard</span>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="./packages">
              <i class="menu-icon icon-present"></i>
              <span class="menu-title">Packages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="affiliate-views.php">
              <i class="menu-icon icon-people"> </i>
              <span class="menu-title">Affiliates</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="withdraw">
              <i class="menu-icon icon-basket-loaded"> </i>
              <span class="menu-title">Withdraw</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#my-account" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon icon-user-following"></i>
              <span class="menu-title">My Account</span>
            </a>
            <div class="collapse" id="my-account">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">          
                <a class="nav-link" href="./profile">My Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./change-password">Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="identification">Upload ID</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./support">
              <i class="menu-icon icon-support"> </i>
              <span class="menu-title">Support Center</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon icon-power"> </i>
              <span class="menu-title">Logout</span>
            </a>
          </li>  
          <!-- <button class="btn btn-default submit-btn btn-block" style="margin-left: auto; margin-right: auto; width: 50%;">Logout</button>        -->
        </ul>
      </nav>
      <style>
        .text-upper{
            text-transform: capitalize !important;
        }
        .swal-text{
          text-align: center;
        }
        .navbar.default-layout{
          background: #F9FBFD;
        }
        .faraway{
          position: absolute;
          left: -9000px;
        }
      </style>
      