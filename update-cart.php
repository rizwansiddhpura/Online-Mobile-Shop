<?php
include('connection.php');
session_start();
if(isset($_POST['update']))
{
    $quantity=$_POST['quantity'];
    $p_id=$_POST['p_id'];
    // $c_id=$_SESSION['c_id'];
    // $sql3="UPDATE cart SET quantity=$quantity where c_id=$c_id and p_id=$p_id";
    // $result3=mysqli_query($db,$sql3);   
    // echo "<script>window.location.href='cart.php'</script>";
    $sql6="SELECT * from a_product where p_id=$p_id";
    $result6=mysqli_query($con,$sql6);
    $a=mysqli_fetch_array($result6);
    $get_stock=$a['stock'];

    $c_id=$_SESSION['c_id'];
    if($quantity!=0 && $quantity<$get_stock)
    {
        $sql3="UPDATE cart SET quantity=$quantity where c_id=$c_id and p_id=$p_id";
        $result3=mysqli_query($con,$sql3);   
        echo "<script>window.location.href='cart.php'</script>";
    }
    elseif($quantity>=$get_stock)
    {
        $sql3="UPDATE cart SET quantity=$get_stock where c_id=$c_id and p_id=$p_id";
        $result3=mysqli_query($con,$sql3);   
        echo "<script>window.location.href='cart.php'</script>";
    }
    elseif ($quantity==0) {
        $sql3="UPDATE cart SET quantity=1 where c_id=$c_id and p_id=$p_id";
        $result3=mysqli_query($con,$sql3);   
        echo "<script>window.location.href='cart.php'</script>";
    }
}
?>
<?php
if(isset($_POST['delete']))
{
    $p_id=$_POST['p_id'];
    $c_id=$_SESSION['c_id'];
    $sql3="DELETE from cart where c_id=$c_id and p_id=$p_id ";
    $result3=mysqli_query($con,$sql3);
    echo "<script>window.location.href='cart.php'</script>";
}
?>                                                                                                              