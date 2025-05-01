<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css" >
</head>
    <?php
    include 'cheader.php';
    ?>

<!-------------------------------------------------- Banner image -------------------------------------------------->
<div>
        <img src="image/Cashback-on-Vivo-X200-Pro-Desktop-Banner.webp" class="banner">
</div>

<!-------------------------------------------------- Brand Logo -------------------------------------------------->
<div class="brandmain">

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Vivo Brand"><div class=""><img src="image/vovo.png" class="vivo" id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="vivotext">VIVO</h3></a>-->
    </div>

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Oppo Brand"><div class=""><img src="image/OPPO_LOGO_2019.svg.png" class="oppo"  id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="oppotext">OPPO</h3></a>-->
    </div>

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Oneplus Brand"><div class=""><img src="image/OnePlus_logo.png" class="oneplus"  id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="oneplustext">ONEPLUS</h3></a>-->
    </div>

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Apple Brand"><div class=""><img src="image/Apple_logo_black.svg.png" class="apple"  id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="appletext">APPLE</h3></a>-->
    </div>

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Realme Brand"><div class=""><img src="image/Realme_logo_2020_version.jpg" class="Realme"  id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="realmetext">REALME</h3></a>-->
    </div>

    <div class="bardicon">
    <a href="vivo.php?p_seriescategory=Samsung Brand"><div class=""><img src="image/20210930181848!Samsung_Logo.svg.png" class="samsung"  id="mobile"></div></a>
        <!--<a href="" class="barandname"><h3 class="samsungtext">SAMSUNG</h3></a>-->
    </div>
</div>

<!-------------------------------------------------- Top selling product Text -------------------------------------------------->
<h4 class="sellingtext">Top Selling Products</h4>

<!-------------------------------------------------- Top selling product  -------------------------------------------------->
<div class="container">
<?php
    include 'connection.php';
    $sql="SELECT * from a_product where p_seriescategory='topselling' LIMIT 5";
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result1); 
    while($a=mysqli_fetch_array($result))
    {
		// $get_stock=$a['stock'];
    
	?>
    <a href="viewmore.php? id=<?php echo $a['id']; ?>" </a>
    <div class="mobile-cart-main">
        <div class="vivo-image">
            <img src="admin/<?php echo $a['img1'];?>" class="viov-mobileimage">
        </div>
        

        <div class="mobile-description-main">
            <a href="" class="mobile-description-link"><h6 class="mobile-description"><?php echo $a['p_name'];?></h6></a>
        </div>

        <div class="rupies-main">
            <sup class="rupies">₹</sup><span class="mobile-prince"><?php echo $a['p_mrp'];?></span> 
            <span class="discount-prince">M.R.P:<del><?php echo $a['p_price'];?></del><span>
        </div>
    
        <div>
            <form method="post" action="add-cart.php">
		    <input type="hidden" name="id" value="<?php echo $a['id'] ?>">
            <button class="add-button" type="submit" name="add-cart">Add to Cart</button>
        </div>

    </div>
<?php } ?>
    
</div>

<!-------------------------------------------------- Comming Soon Products -------------------------------------------------->
<h4 class="sellingtext">Comming Soon Products</h4>

<!-------------------------------------------------- Comming Soon product  -------------------------------------------------->
<div class="container">
<?php
    include 'connection.php';
    $sql="SELECT * from a_product where p_seriescategory='comming soon' LIMIT 5";
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result1); 
    while($a=mysqli_fetch_array($result))
    {
		$get_stock=$a['stock'];
    
	?>
    <a href="viewmore.php? id=<?php echo $a['id']; ?>" </a>
    <div class="mobile-cart-main">

        <div class="vivo-image">
            <img src="admin/<?php echo $a['img1'];?>" class="viov-mobileimage">
        </div>

        <div class="mobile-description-main">
            <a href="" class="mobile-description-link"><h6 class="mobile-description"><?php echo $a['p_name'];?></h6></a>
        </div>

        <div class="rupies-main">
            <sup class="rupies">₹</sup><span class="mobile-prince"><?php echo $a['p_mrp'];?></span> 
            <span class="discount-prince">M.R.P:<del><?php echo $a['p_price'];?></del><span>
        </div>
    
        <div>
			<form method="post" action="add-cart.php">
			<input type="hidden" name="id" value="<?php echo $a['id'] ?>">
            <button class="add-button" type="submit" name="add-cart.php">Add to Cart</button>
        </div>

    </div>
<?php } ?>
    
</div>


<!-------------------------------------------------- New Mobile Launch -------------------------------------------------->
<h4 class="sellingtext">New Mobile Launch</h4>

<!-------------------------------------------------- New Mobile Launch -------------------------------------------------->
<div class="container">
<?php
    include 'connection.php';
    $sql="SELECT * from a_product where p_seriescategory='new mobile' LIMIT 5";
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result1); 
    while($a=mysqli_fetch_array($result))
    {
		$get_stock=$a['stock'];
    
	?>
    <a href="viewmore.php? id=<?php echo $a['id']; ?>" </a>
    <div class="mobile-cart-main">

        <div class="vivo-image">
            <img src="admin/<?php echo $a['img1'];?>" class="viov-mobileimage">
        </div>

        <div class="mobile-description-main">
            <a href="" class="mobile-description-link"><h6 class="mobile-description"><?php echo $a['p_name'];?></h6></a>
        </div>

        <div class="rupies-main">
            <sup class="rupies">₹</sup><span class="mobile-prince"><?php echo $a['p_mrp'];?></span> 
            <span class="discount-prince">M.R.P:<del><?php echo $a['p_price'];?></del><span>
        </div>
    
        <div>
            <button class="add-button">Add to Cart</button>
        </div>

    </div>
<?php } ?>
    
</div>
</body>
</html>