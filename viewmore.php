<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/viewmore.css">
    <script src="viewmore.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    include 'cheader.php';
    ?>
<!------------------------------------------buy-cart------------------------------------------------->
<?php
include 'connection.php';
    $id=$_REQUEST['id'];
    $sql="SELECT * from a_product where p_id=$id";
    $result=mysqli_query($con,$sql);
    while($a=mysqli_fetch_array($result))
    { 
        $get_stock=$a['stock'];
        $c1= $a['p_id'];
        /*$c= $a['sub1_category'];*/
        $get_img=$a['img3']; 
        $get_img1=$a['img4'];
        ?>

    <div class="container-fluid">
        <div class="buy-cart-in">

            <div class="buy-cart">

                <div class="short-image">
                    <div class="big-image">
                        <img src="./admin/<?php echo $a['img1'];?>" class="big-perticuler-img" onmouseover="clk(this)">
                    </div>
                    <div class="big-image">
                        <img src="./admin/<?php echo $a['img2'];?>" class="big-perticuler-img" onmouseover="clk(this)">
                    </div>
                    <div class="big-image">
                        <img src="./admin/<?php echo $a['img3'];?>" class="big-perticuler-img" onmouseover="clk(this)">
                    </div>
                    <div class="big-image">
                        <img src="./admin/<?php echo $a['img4'];?>" class="big-perticuler-img" onmouseover="clk(this)">
                    </div>
                </div>

                <div class="big-image-box">
                    <img src="./admin/<?php echo $a['img1'];?>" class="big-image-box-in" id="bigimgview">
                </div>
            </div>

            <div class="description-main">
                <h3><?php echo $a['p_name']; ?></h3>

                <div class="price-description">
                    <div class="rupise">₹</div>
                    <div class="price"><?php echo $a['p_mrp'];?></div>
                    <div class="cancle-price"><del><?php echo $a['p_price'];?></del></div>
                    <div class="off-price">Extra 4% off</div>
                </div>

                <div class="mobile-detail">
                    <h5>Highlights</h5>
                    <ul>
                    <li><?php echo $a['p_ram'];?> | <?php echo $a['p_rom'];?></li>
                    <li><?php echo $a['p_display'];?></li>
                    <li><?php echo $a['p_frontcamera'];?></li>
                    <li><?php echo $a['p_backcamera'];?></li>
                    <li><?php echo $a['p_processor'];?></li>
                    </ul>
                </div>

                <div>
                    <h5 class="mobile-detail">Warranty</h5>
                    <ul>
                        <li> 1 Year manufacturer warranty</li>
                    </ul>
                </div>

                <div>
                    <h5 class="mobile-detail">Return Policy</h5>
                    <ul>
                        <li>Returns are accepted within 7–14 days from the purchase or delivery date.</li>
                        <li>The device must be unused, undamaged, and in its original condition.</li>
                        <li>Opened or activated devices</li>
                        <li>Products with user-caused damage (e.g., water damage, dropped devices)</li>
                        <li>A valid receipt or invoice is required for all returns.</li>
                    </ul>
                </div>
                <?php 
                if($get_stock!=0) 
                {
                ?>
                <div class="button-buy-main">
                <form method="post" action="add-cart.php">
			<input type="hidden" name="p_id" value="<?php echo $a['p_id'];?>">
            <button type="submit" name="add-cart">BUY NOW</button>
    </form>
                </div>
                <?php } 
                else {
                    ?>
                      <div class="button-buy-main">
                      <button type="submit" name="add-cart">Out Of Stock</button>
                      </div>
            </div>
            <?php }
?>
    </div>
    <?php }
?>
</body>
</html>