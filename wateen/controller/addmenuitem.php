<?php
  session_start();
  include('../model/connect.php');
  include('../view/navbar.php');
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
  }
  elseif ($_SESSION["id"] !== 1) {
    echo "<script>if(confirm('Only Restaurant Admins can edit menu.')){document.location.href='menu.php'};</script>";
    exit;
  }
  else {
    $mremail = strval($_SESSION["email"]);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../view/css/style.css">
    <title>Food Orders | Add Menu Item</title>
  </head>
  <body>
    <?php
      if(isset($_POST['cussubmit'])) {
        $mremail = $_SESSION["email"];
        $mitem = $_POST['m_item'];
        $mcost = $_POST['m_cost'];
        $query = "INSERT INTO menu(m_r_email, m_item, m_cost) VALUES ('$mremail', '$mitem', '$mcost')";
        $result = mysqli_query($con, $query);
      }
    ?>
    <div id="outer-box">
      <div id="menuform-box">
        <div id="boxtitle">
          <?php
            $result = $con->query("SELECT r_name FROM user_res WHERE r_email = '$mremail'");
            while($row = mysqli_fetch_array($result)) {
              // $rname = $row['r_name'];
              echo "<center><h1>".$row['r_name']."'s Menu</h1></center>";
            }
            
          ?>
        </div>
        <form id="menu_reg" method="POST" action="addmenuitem.php">
          <input type="text" id="reginput-field" placeholder="Name of the dish" name="m_item" required>
          <input type="number" id="reginput-field" placeholder="Cost" name="m_cost" required>
          <button type="submit" id="cussubmit-btn" name="cussubmit">Add Item</button>
        </form>
      </div>
    </div>
  </body>
</html>
