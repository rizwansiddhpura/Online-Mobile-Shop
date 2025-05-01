<?php
include('connection.php');
session_start();
$c_id=$_SESSION['c_id'];
$add_address = $_POST['add_address'];
$city=$_POST['city'];
$pin_code=$_POST['pincode'];
$sql="INSERT into address(add_address,city,pincode,c_id) values('$add_address','$city','$pin_code','$c_id')";
$result=mysqli_query($con,$sql);
if($result)
{
    header ('location: cart.php');
}
?>