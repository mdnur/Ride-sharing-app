<?php
require_once "lib/Session.php";
require_once "driver/inc/spl_autoload.php";
use lib\Session;

?>
<nav class="navbar navbar-expand-lg  ">
  <!-- fixed-top -->


  <img src="images/logo.jpg" class="logo" width="120px" height="100px">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-4">
      <?php if (!Session::ifLogin()) { ?>
        <li class="nav-item">
          <a class="nav-link" data-value=" " href="login.php">Sign In </a>
        </li>
      <?php } ?>

      <?php if (Session::ifLogin()) { ?>
        <li class="nav-item">
          <a class="nav-link " href="home.php">My Home</a>
        </li>


        <li class="nav-item">
          <a class="nav-link " href="current_booking.php">My Booking </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="bookRide.php">Book Ride </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="availableRoute.php">Find Route</a>
        </li>

      <?php } ?>
      <?php if (!Session::ifLogin()) { ?>
        <li class="nav-item">
          <a class="nav-link " data-value="review" href="#">Review</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-value="team" href="#">Team</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " data-value="contact" href="#">Contact</a>
        </li>
      <?php } ?>
      <?php if (Session::ifLogin()) { ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Credit
          </a>
          <?php $credit = new CreditTable(); $credit =$credit->getRemainingCredit(Session::get('rider')['id'])?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item disabled" >Remain:<?php echo( $credit['remaining_credit']);?></a>
            <a class="dropdown-item" href="add_credit.php">Add Credit</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="home.php?action=logout">Logout</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo Session::get('rider')['name'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
            <a class="dropdown-item" href="change_password.php">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="home.php?action=logout">Logout</a>
          </div>
        </li>

      <?php } ?>
    </ul>





  </div>
</nav>