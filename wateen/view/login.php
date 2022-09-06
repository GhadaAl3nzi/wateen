<?php
  session_start();
  include('../model/connect.php');
  // include('');
  //include('navbar.php');
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "<script>alert('Already Logged In')</script>";
    header("location: menu.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/login.scss" rel="stylesheet"  type='text/css'>
    <title>Wateen Bakery | Log In</title>

</head>
<body>
<?php
      if(isset($_POST["adminsubmit"])) {
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        if ($email === 'admin@info.com' & $pwd === 'admin123'){
          session_start();
          $_SESSION["email"] = $email;
          header("location: ./admin.php");
        }
      }
      if(isset($_POST["cussubmit"])) {
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        $cemail_res = $con->query("SELECT * FROM user_cus WHERE c_email = '$email'");
        $cpwd_res = $con->query("SELECT * FROM user_cus WHERE c_pwd = '$pwd' AND c_email = '$email'");
        if ($cemail_res->num_rows == 0) {
          echo "<script>alert('Email is not registered.')</script>";
        }
        elseif ($cpwd_res->num_rows == 0) {
          echo "<script>alert('Wrong Password')</script>";
        }
        else {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = 0;
          $_SESSION["email"] = $email;
          header("location: ./menu.php");
        }
      }

      if(isset($_POST["ressubmit"])) {

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $remail_res = $con->query("SELECT * FROM user_res WHERE r_email = '$email'");
        $rpwd_res = $con->query("SELECT * FROM user_res WHERE r_pwd = '$pwd' AND r_email = '$email'");
        if ($remail_res->num_rows == 0) {
          echo "<script>alert('Email is not registered.')</script>";
        }
        elseif ($rpwd_res->num_rows == 0) {
          echo "<script>alert('Wrong Password')</script>";
        }
        else {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = 1;
          $_SESSION["email"] = $email;
          header("location: orders.php");
        }
      }
    ?>
<div class="login" >
    <img class="logo" src="./image/logo.png" style="margin-left: 25%;"/>
  <h2 class="active" style="margin-left: 20%;"> Wateen Bakery </h2>
  <form method="POST" action="login.php">
    <input type="email" class="text" name="email" required>
     <span>username</span>
    <br>
    <br>
    <input type="password" class="text" name="pwd" minlength="8" required>
    <span>password</span>
    <br>
    <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1">Keep me Signed in</label>
    
    <button class="signin" type="submit" id="cussubmit-btn" name="cussubmit">
      Sign As Customer
    </button>
    <button class="signin" type="submit" id="ressubmit-btn" name="ressubmit">
      Sign As Restaurant
    </button>
    <button class="signin" type="submit" id="adminsubmit-btn" name="adminsubmit">
      Sign As Admin
    </button>



  </form>

</div>
<script src="layout/script.js"></script>
</body>
</html>