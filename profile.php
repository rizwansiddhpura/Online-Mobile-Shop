<?php 
session_start();
if(!isset($_SESSION['email']))
{
    // header("Location :admin_login.php");
    echo "<script>window.location.href='login.php'</script>";
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" typ="text/css" href="css\profile.css">
    <title>Document</title>
</head>
<body>
<?php
    include("cheader.php");
    include("connection.php");
    $c_id = $_SESSION['c_id'];
    $email = $_SESSION['email'];
    $sql="SELECT * from c_login where c_id = $c_id";
    $result = mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result);
    ?>
    <div class="your_account">
    <h2>Your Account</h2>
    <div style="display: flex;">
    <div class="menu1">
    <div class="profile">
        <div class="photo">
            <img src="img/profile-user.png">
        </div>
        <span class="user_name"><?php echo $a['username']; ?> </span>
        <span class="mail"><?php echo $a['email']; ?> </span>
    </div>
    <div class="option">
        <ul>
        <a href="profile.php"><li><span><img src="img/user3.png"></span>Account Information <img class="right-arrow" src="img/right-arrow.png"></li></a>
        <a href="view_order.php"><li><img src="img/like.png">Order <img class="right-arrow" src="img/right-arrow.png"></li></a>
        <a href="logout.php"><li><img src="img/logout.png">Log Out<img class="right-arrow" src="img/right-arrow.png"></li></a>
        </ul>
    </div>
    </div>
    <div class="Account_Information">
        <h4>Account Information</h4>
        <br>
        <div class="part1">
        <ul style="list-style-type: none;">
        <li>
            <div class="labelname">Email</div>
            <div class="detail"><?php echo $a['email']; ?></div>
        </li>
        <li>
            <div class="labelname">Phone</div>
            <div class="detail">+919601813450</div>
        </li>
        </ul>
        <ul style="list-style-type: none;">
        <li>
            <div class="labelname">Full Name</div>
            <div class="detail"><?php echo $a['username']; ?></div>
        </li>
        <li>
            <div class="labelname">Gender</div>
            <div class="detail">Male</div>
        </li>
        </ul>
        </div>
       
        </div>
        </div>
        </div>

</body>
</html>