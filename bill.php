<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "<script>window.location.href='main.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <?php include("cheader.php");
    $c_id=$_SESSION['c_id'];
    $sql="SELECT * from order_data where c_id='$c_id' ORDER BY o_id DESC LIMIT 1";
    $result=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result);
    $get_o_id=$a['o_id'];
    ?>
    <div>
        <img style="margin-left: 30%;" width="40%" src="image/Payment-Successfully.gif">
    </div>
    <a href="view_order.php"><button style="margin-left: 32%;" class="btn btn-primary">View Order</button></a>
    <a href="download_bill.php?o_id=<?php echo $get_o_id; ?>"> <button style="margin-left: 20%;" class="btn btn-primary">View / Download Invoice </button></a>
</body>
</html>