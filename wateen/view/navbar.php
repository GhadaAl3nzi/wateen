<?php
  require_once '../controller/src/Cart.php';
  include('head.php');
?>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark lighten-1" style="background-color:#895920">
  <a class="navbar-brand" style="color: white;">Wateen Bakery</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION["loggedin"]) && $_SESSION["id"] === 1){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./menu.php">Menu</a>
      </li>
      <li class="nav-item" id="addmenuitem-btn" name="addmenuitem">
        <a class="nav-link" href="../controller/addmenuitem.php">Add Menu</a>
      </li>
      <li class="nav-item" id="orders-btn" name="ordersmenu">
        <a class="nav-link" href="./orders.php">Orders</a>
      </li>
      <?php
      }
      ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ 
        if($_SESSION["id"] == 0){?>
         <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="cart.php">
          <i class="fas fa-shopping-cart mr-1"></i> Cart
          <span class="badge badge-dark ml-1"><?php echo Cart::instance()->totalCount(); ?></span>
        </a>
      </li>
      <?php }?>
          <li class="nav-item" id="logout-btn" name="logout">
          <a class="nav-link" href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </li>
        <?php
        
        }else {?>
      <li class="nav-item" id="login-btn" name="login">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
      <li class="nav-item" id="register-btn" name="register">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <?php
        }  ?>

    </ul>
  </div>
</nav>