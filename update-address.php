<?php
include('connection.php');
session_start();
$c_id=$_SESSION['c_id'];
$add_address = $_POST['add_address'];
$city=$_POST['city'];
$pin_code=$_POST['pincode'];
$sql=" UPDATE address SET add_address='$add_address',city='$city',pincode='$pin_code' where c_id='$c_id'";
$result=mysqli_query($con,$sql);
echo"<script>window.location.href='cart.php'</script>";
?>