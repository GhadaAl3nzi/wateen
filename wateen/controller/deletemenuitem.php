<?php

include_once('connection/connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $del = mysqli_query($con, "DELETE FROM menu  WHERE id = '$id' "); 
}
if ($del) {
    mysqli_close($con); 
    header('Location:menu.php'); 
    exit;
} else {
    echo "Error deleting record"; 
}




?>