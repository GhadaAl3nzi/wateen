<?php
  session_start();
  require_once '../controller/src/Cart.php';
  include('../model/connect.php');
  if(isset($_POST['ordersubmit'])) {
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      echo "<script>if(confirm('Log In as a customer to order.')){document.location.href='login.php'};</script>";
    }
    elseif ($_SESSION["id"] !== 0) {
      echo "<script>if(confirm('Log In as a customer to order.')){document.location.href='login.php'};</script>";
      exit;
    }
    else {
      $ocemail = strval($_SESSION["email"]);
      $orname = $_POST['orname'];
      $result = $con->query("SELECT r_email FROM user_res WHERE r_name = '$orname'");
      while($row = mysqli_fetch_array($result)) {
        $oremail = $row['r_email'];
      }
      $omitem = $_POST['odish'];
      $oquan = $_POST['oquan'];
      $ocost = $_POST['ocost'];
      Cart::instance()->add($oremail, $omitem, $ocost, $oquan, [
          'restaurant_name' => $orname,
      ]);
      header('Location: ' . $_SERVER['REQUEST_URI']);
      exit;
    }
  }
  include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Wateen Bakery | Menu</title>
  </head>
  <style>
    .fixed_header th,
    .fixed_header td {
      width: 210px;
    }
    .table-fixed tbody {
      height: auto;
      max-height: 500px;
      overflow-y: auto;
      width: 100%;
    }
    .btn {
      padding: 0.5rem 0.8rem;
    }
  </style>
  <body class="bg-white">
    <?php
     if($_SESSION["id"] !== 0){
      $query ="SELECT * FROM menu WHERE m_r_email= '".$_SESSION['email']."' ";
     }else{  $query ="SELECT id, menu.m_item, user_res.r_name, menu.m_cost FROM menu INNER JOIN user_res ON menu.m_r_email=user_res.r_email ORDER BY menu.m_item"; }
        echo '<div style="padding-top: 100px; padding-bottom: 40px; padding-left: 16%; height: 800px;">
                <table class="table table-hover table-fixed fixed_header bg-light" style="width: 80%;" id="menubox">
                  <thead class=" white-text" style="background-color:#895920">
                    <tr>
                      <th>Dish</th>
                      <th>Restaurant</th>
                      <th>Cost</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
        if ($result = $con->query($query)) {
          $i = 0;
          while ($row = $result->fetch_assoc()) {
            $dish = $row["m_item"];
            if($_SESSION["id"] !== 0){
            $rname = $row["m_r_email"];
            }else{$rname = $row["r_name"];}
            $cost = $row["m_cost"];
            echo '<form method="POST" id="orderform'.$i.'" action="menu.php"></form>
                  <tr>
                    <td><input type="text" id="menu-field" name="odish" form="orderform'.$i.'" value="'.$dish.'" readonly /></td>
                    <td><input type="text" id="menu-field" name="orname" form="orderform'.$i.'" value="'.$rname.'" readonly /></td>
                    <td><input type="text" id="menu-field" name="ocost" form="orderform'.$i.'" value="'.$cost.'" readonly /></td>
                    <td><input type="number" id="menu-field" name="oquan" min="1" form="orderform'.$i.'" value="1" required /></td>
                    <td>';
                   if($_SESSION["id"] == 0){
                    echo '<input type="submit" class="btn text-white " style="background-color:#895920" form="orderform'.$i.'" value="ADD" name="ordersubmit"/> ';                  
                   }else{ echo   ' 
                    <a href="editmenuitem.php?id='.$row['id'].'"><button type="button"
                  class="btn text-white " style="background-color:#895920"> Upadate</button></a>
                    <a href="deletemenuitem.php?id='.$row['id'].'"><button type="button"
                  class="btn btn-danger">Delete</button></a>
                  ';   }
               '
                  </td>
                  </tr>';
            $i++;
          }
        }
      ?>
    </tbody>
    </table>
    </div>
  </body>
</html>