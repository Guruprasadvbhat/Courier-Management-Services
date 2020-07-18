<?php
require '../dbconfig/config.php';
$id=$_REQUEST['username'];
$query = "DELETE FROM userinfo WHERE username='$id' "  ;
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view.php"); 
?>
