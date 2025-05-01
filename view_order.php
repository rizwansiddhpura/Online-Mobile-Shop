<?php
session_start();
if(!isset($_SESSION['email']))
{
 echo "<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style type="text/css">
        .your_account{
            margin-top: 20px;
            width: 98%;
            margin-left: 14px;
            height: 500px;
            background-color: white;
            padding-top: 10px;
            border-radius: 5px;
        }
        h2,h4{
            font-family: bahnschrift;
            font-weight: bold;
            font-size: 20px;
            margin-left: 30px;
        }
        
        .profile{
            margin-top: 20px;
            width: 25rem;
            margin-left: 14px;
            height: 90px;
            border: 1px lightgray solid;
            padding: 10px 50px 10px 35px;
        }
        .photo{
            float: left;
        }
        .profile img{
            width: 3rem;
            height: 3rem;
            border: 3px grey solid;
            border-radius: 100px;
        }
        .user_name{
            margin-left: 30px;
            font-size: 25px;
        }
        .mail{
            margin-top: 10px;
            display: flex;
            color: grey;
            margin-left: 70px;
        }
        .option{
            padding-right: 38px;
            margin-top: 10px;
            margin-left: 14px;
            width: 25rem;
            height: 325px;
            border: 1px lightgray solid;
        }
        .option ul{
            margin-left: -10px;
            list-style-type: none;
        }
        .option li{
            padding-bottom: 20px;
            padding-top: 20px;
            border-bottom: 1px lightgray solid;
            text-decoration: none;
            font-size: 15px;
            color: black;
        }
        .option li:hover{
            padding-bottom: 20px;
            padding-top: 20px;
            background-color: whitesmoke;
            border-bottom: 1px grey solid;
           
            font-size: 15px;
        }
        .option li img{
            width: 15px;
            margin-right: 10px;
        }
        .right-arrow{
            justify-content: right;
            margin-left: 20px;
        }
        .order_information{
            margin-top: 20px;
            margin-left: 70px;
            width: 70%;
            height: auto;
            background-color: white;
            border: 1px lightgray solid;
        }
        .address{
            margin-top: 20px;
            margin-left: 70px;
            width: 50%;
            height: 320px;
            background-color: white;
            border: 1px lightgray solid;
            display: none;
        }
        .labelname{
            color: rgb(21, 161, 153);
            font-weight: bold;
            width: 40%;
        }
        .detail{
            font-size: 20px;
            width: 40%;
        }
        .Account_information li{
            padding-bottom: 10px;
            border-bottom: 1px lightgray solid;
            margin-bottom: 20px;
        }
        .Account_information ul{
            width: 34%;
        }
        .part1{
            display: flex;
        }
        .button{
            margin-left: 70%;
            color: white;
            width: 20%;
            border: 1px rgb(21, 161, 153) solid;
            padding: 10px 15px 10px 15px;
            background-color: rgb(21, 161, 153);
            border-radius: 5px;
        }
        .button img{
            margin-right: 10px;
        }
        .order{
            float: left;
            width: 38%;
            height: 190px;
            border: 1px solid black;
            margin-left: 70px;
            margin-bottom: 20px;
        }
        .order_no{
            background-color: rgb(21, 161, 153);
            width: 100%;
            height: 30px;
            padding: 5px 0px 5px 0px;
        }
        .order_no1{
            background-color: rgb(21, 161, 153);
            width: 100%;
            max-height: 20px;
            padding: 5px 0px 5px 0px;
            margin-top: 26px;
        }
        .order_no span{
            color: white;
            font-weight: bold;
            margin-left: 10px;
        }
        .order_no1 span{
            color: white;
            font-weight: bold;
        }
        table{
            margin-top: 10px;
            border: 1px solid black;
        }
        table th{
            border-bottom: 1px solid black;
        }
        table tr{
            text-align: center;
        }

    </style>
</head>
<body>
<?php
include("cheader.php");
include("connection.php");
$c_id=$_SESSION['c_id'];
$total=0;
$sql="SELECT * from c_login where c_id=$c_id";
$result=mysqli_query($con,$sql);
$a=mysqli_fetch_array($result);
?>
<div class="your_account">
<h2>Your Account</h2>
<div style="display:flex;">
<div class="menu1">
<div class="profile">
<div class="photo">
<img src="img/profile-user.png">
    </div>
    <span class="user_name"> <?php echo $a['username']; ?> </span>
    <span class="mail"><?php echo $a['email']; ?></span>
</div>
<div class="option">
    <ul>
        <a href="profile.php"><li><span><img src="img/user3.png"></span>Account Information <img class="right-arrow" src="img/right-arrow.png"></li></a>
        <a href="view_order.php"><li><img src="img/like.png">Order <img class="right-arrow" src="img/right-arrow.png"></li></a>
        <a href="logout.php"><li><img src="img/logout.png">Log Out<img class="right-arrow" src="img/right-arrow.png"></li></a>
</ul>
</div>
</div>
<div class="order_information">
    <h4>Order History </h4>
    <?php
    include("connection.php");
    $c_id=$_SESSION['c_id'];
    $sql1="SELECT p_id,quantity,o_id,order_date,status,p_name,price,img1 from order_data where c_id=$c_id";
    $result1=mysqli_query($con,$sql1);
while($a=mysqli_fetch_array($result1))
{
    $p_id=$a['p_id'];
    $quantity=$a['quantity'];
    $get_status=$a['status'];
    $sql2="SELECT * from a_product where p_id=$p_id";
    $result2=mysqli_query($con,$sql2);
    while($b=mysqli_fetch_array($result2))
    {
        ?>
    <div class="order">
        <div class="order_no">
        <span>Order No : <?php echo $a['o_id']; ?> </span>
        <span style="margin-left:115px;"> Date : <?php echo $a['order_date'];?> </span>
      </div>
        <div style="float:left;width:35%; margin-top:20px; margin-left:10px;">
        <img width="70%" src="./admin/<?php echo $a['img1'];?>">
    </div>
        <div style="min-height:97px; margin-top:10px;">
        <span><?php echo $a['p_name']; ?></span>
        <table class="">
            <tr>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>₹<?php echo $a['price']; ?></td>
                <td><?php echo $quantity ?></td>
                <?php /*$price=$a['price']; $total=$price * $quantity */?>
                <td><?php echo $total; ?></td>
            </tr>
        </table>
    </div>
<div class="order_no1">
    <span style="margin-left:10px;">Order Status : <?php echo $get_status ?> </span>
    <a href="download_bill.php?o_id=<?php echo $a['o_id']; ?>"><span style="margin-left:40px;"><button style="background:#F8F9FA; border:none; color:black; font-weight:bold;">Download Invoice</button></span></a>
    </div>
    </div>
    <?php
   }
  }
?>
</div>
</div>
</body>
</html>