<?php
//include('admin/connect.php');
$get_id=$_GET['id'];
mysqli_query($conn, "delete from order_details where orderid='$get_id'")or die(mysqli_error());
header('location:user_cart.php');
?>
