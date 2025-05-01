<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" typ="text/css" href="css/search.css">
    <title>Search Page</title>
    <style type="text/css">
       
    </style>
</head>
<body>
    <?php
    include('cheader.php');
    include ("connection.php");
    $search=$_GET['search'];
    $sql="SELECT * from a_product where p_name LIKE '%$search%' or p_seriescategory LIKE '%$search%' ";
    $result1=mysqli_query($con,$sql);
    ?>
    <?php
    if(mysqli_num_rows($result1)>0)
    {
        ?>
        <br>
        <span style="margin-left: 20px;font-size: 20px;">Showing All Results For </span><span style="font-size: 22px; font-weight: bolder;"><?php echo $search;?></span>
        
        <?php
        while($a=mysqli_fetch_array($result1))
        {$get_stock=$a['stock'];
            ?>
            <div class="mian-cart">
            <a href="viewmore.php? id=<?php echo $a['p_id']; ?>"> 
            <div class="vivo-image">
                <img src="./admin/<?php echo $a['img1']; ?>" class="viov-mobileimage">
            </div>

            <div class="mobile-description-main">
                <a href="" class="mobile-description-link"><h6 class="mobile-description"><?php echo $a['p_name'];?></h6></a>
            </div>

            <div class="rupies-main">
                <sup class="rupies">₹</sup><span class="mobile-prince"><?php echo $a['p_mrp']; ?></span> 
                <span class="discount-prince">M.R.P:<del>₹<?php echo $a['p_price'];?></del><span>
            </div>
            </div>
        </div>
                        <?php if($get_stock!=0) {
	
	?>
                <div>
            <form method="post" action="add-cart.php">
                <input type="hidden" name="p_id" value="<?php echo $a['p_id'] ?>">
                <button class="add-button" type="submit" name="add-cart">Add to Cart</button>
            </div>
                <?php }
      else {
	
	  ?>
      <div class="cart">
			
            <button onclick="alert('Sorry Product out of Stock')" style="border: none; background-color: none;" type="submit" name="add_cart" class="span">Out Of Stock</button>
            
                    
                
                    </div>
                  </center>
                  <?php } ?>
                        </div>
                    </center>
                    <?php }
                }
                else
                {
                    ?>
                    <br>
                    <span style="margin-left: 20px; font-size: 20px;">
                    We Could Not Find Any Products Related To Your Search
                    </span>
                    <span style="font-size: 22px; font-weight: bolder;"><?php echo $search;?></span>
                 <center>
                     <img src="img/not.png">
                 </center>
                <?php
            }
        ?>
    </div>                
</body>
</html>