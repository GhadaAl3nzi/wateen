<?php
  session_start();
  session_destroy();
  unset($_SESSION["email"]);
  header("Location: ../view/login.php");
  exit;



  // if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  //   session_destroy();
  //   echo "<script>if(confirm('Logged out successfully.')){document.location.href='../view/login.php'};</script>";
  //   exit;
  // }
  // else {
  //   echo "<script>if(confirm('You are not even logged in. Log in first.')){document.location.href='login.php'};</script>";
  // }
?>
