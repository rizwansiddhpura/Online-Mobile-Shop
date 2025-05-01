<?php
session_start();
include('connection.php');
if(isset($_POST['add-cart']) && isset($_SESSION['email']))
{
    $p_id=$_POST['p_id'];
    $c_id=$_SESSION['c_id'];
    // $quantity=$_POST['quantity'];
    $quantity = 1;
    $sql1="SELECT * from cart where c_id=$c_id and p_id = $p_id";
    $result=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result)>0)
    {
       echo"<script>alert('Product already in cart'); window.location.href='cart.php'</script> ";
    }
    else
    {
        $sql="INSERT INTO cart (c_id,p_id,quantity) values($c_id,$p_id,$quantity)";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>window.location.href='cart.php'</script>";
        }
        else
        {
            echo "Error : Not Add Into Cart";
        }
    }
}
else {
    echo "<script>window.location.href='login.php'</script>";
}
?>