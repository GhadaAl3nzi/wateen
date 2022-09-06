<?php
  session_start();
  include('connection/connect.php');
  include('navbar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Wteen Bakery | Edit Menu Item</title>
    </head>
    <body>
    <?php
     if(count($_POST)>0) {
            $id = $_POST['id'];
            $mitem = $_POST['m_item'];
            $mcost = $_POST['m_cost'];
            $edit =  mysqli_query($con, "UPDATE menu SET m_item='$mitem',m_cost='$mcost' WHERE id='$id' ");
            if ($edit) {
                mysqli_close($con);
                echo ('Editing done successfully .....');
                header('Location:menu.php'); 
              
            } else {
                echo mysqli_error($con);
            }
     }
        ?>
        <div id="outer-box">
            <div id="menuform-box">
                <div id="boxtitle">
                    <?php
                $id = $_GET['id'];
                $result = mysqli_query($con, "SELECT * FROM menu WHERE id ='$id'");
                $row = mysqli_fetch_array($result)
             ?>
             <div class="text-center"><h1>Update Menu</h1></div>
                </div>
                <form id="menu_reg" method="POST" action="editmenuitem.php">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                    <input type="text" id="reginput-field" name="m_item" value="<?php echo $row['m_item']?>">
                    <input type="number" id="reginput-field" name="m_cost" value="<?php echo $row['m_cost']?>">
                    <button type="submit" id="cussubmit-btn" name="cussubmit">Update</button>
                </form>
            </div>
        </div>
    </body>
</html>