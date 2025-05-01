<?php
include("connection.php");
session_start();
if(isset($_POST['done']))
{
    $c_id=$_SESSION['c_id'];
    $status = 'Pending';
    $order_date=date("Y-m-d");
    echo $sql="SELECT * from cart where c_id='$c_id'";
    $result=mysqli_query($con,$sql);
    while($a=mysqli_fetch_array($result))
    {
        $p_id=$a['p_id'];
        echo $sql4="SELECT * from a_product where p_id=$p_id";
        $result4=mysqli_query($con,$sql4);
        $c=mysqli_fetch_array($result4);
       echo $p_name=$c['p_name'];
        $price=$c['p_price'];
        $img1=$c['img1'];
        $quantity=$a['quantity'];
        $mrp=$c['p_mrp'];
        
        echo $sql1="INSERT INTO order_data (c_id,p_id,quantity,order_date,status,p_name,price,img1,mrp)VALUES($c_id,$p_id,'$quantity','$order_date','$status','$p_name','$price','$img1','$mrp')";
        $result1=mysqli_query($con,$sql1);
        if($result1)
        {
            $sql2="DELETE FROM cart WHERE c_id='$c_id' AND p_id='$p_id'";
            $result2=mysqli_query($con,$sql2);
            $sql3="SELECT * from a_product where p_id='$p_id'";
            $result3=mysqli_query($con,$sql3);
            $b=mysqli_fetch_array($result3);
            $get_stock = $b['stock'];
            $d_stock = $get_stock - $quantity;
            $sql5="UPDATE a_product SET stock='$d_stock' where p_id='$p_id'";
            $result5=mysqli_query($con,$sql5);
        }
        echo "<script>window.location.href='bill.php'</script>";
    }
}
?>