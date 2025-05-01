<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/vivo.css" >
        <title>Document</title>
    </head>
    <body>
        <?php
        include 'cheader.php';
        ?>
    <?php
    include 'connection.php';
        $get=$_REQUEST['p_seriescategory'];
        $sql="SELECT * from a_product where p_brandcategory='$get' ";
        $result=mysqli_query($con,$sql);
    ?>

    <center><h4 class="viovtext"><label><?php echo $get ?></label></h4></center>

    <?php
    include 'connection.php';
    
        $sql1="SELECT DISTINCT  p_seriescategory from a_product where p_brandcategory='$get' ";
        $result1=mysqli_query($con,$sql1);
        while($a=mysqli_fetch_array($result1))
        {
            $b=$a['p_seriescategory'];

        ?>
    
    <h4 style="margin-left:20px; margin-top:20px;"><?php echo $a['p_seriescategory']; ?></h4>
    <div class="container-fluid"> 
    
    <?php 
            $sql2="SELECT * from a_product where p_seriescategory='$b' and p_brandcategory='$get'  ";
            $result2=mysqli_query($con,$sql2);
            while($c=mysqli_fetch_array($result2))
            { ?>
        <div class="mian-cart">

        <a href="viewmore.php? id=<?php echo $c['p_id']; ?>"> 
            <div class="vivo-image">
                <img src="admin/<?php echo $c['img1']; ?>" class="viov-mobileimage">
            </div>
        </a>
            <div class="mobile-description-main">
                <a href="" class="mobile-description-link"><h6 class="mobile-description"><?php echo $c['p_name'];?></h6></a>
            </div>

            <div class="rupies-main">
                <sup class="rupies">₹</sup><span class="mobile-prince"><?php echo $c['p_mrp']; ?></span> 
                <span class="discount-prince">M.R.P:<del>₹<?php echo $c['p_price'];?></del><span>
            </div>

            <div>
            <form method="post" action="add-cart.php">
                <input type="hidden" name="p_id" value="<?php echo $c['p_id'] ?>">
                <button class="add-button" type="submit" name="add-cart">Add to Cart</button>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    </body>
    </html>