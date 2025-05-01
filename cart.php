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
    <link rel="stylesheet" href="css/cart.css" >
    <title>Document</title>
</head>
    
<!-------------------------------------------------- Header -------------------------------------------------->

<div><?php
include 'cheader.php';
?>
</div>


<div class="cart-text"> 
    <h2>Your Cart</h2> 
</div> 
 
     
<div class="cart-main"> 
 
    <div class="cart-main-in">
    <?php 
    include("connection.php");
       
        $c_id=$_SESSION['c_id'];
        $total_mrp=0;
        $total_price=0;
        $disc_mrp=0;
        $p_total_mrp=0;
        $p_total_price=0;

       $sql="SELECT p_id,quantity from cart where c_id=$c_id";
       $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
        {
        while($a=mysqli_fetch_array($result))
        {
            $p_id=$a['p_id'];
            $quantity=$a['quantity'];
            $sql1="SELECT * from a_product where p_id=$p_id";
            $result1=mysqli_query($con,$sql1);
            while($b=mysqli_fetch_array($result1))
            {
                $get_mrp=$b['p_mrp'];
                $get_mrp=intval( $get_mrp);
                // settype($get_mrp,'int');
                // $get_mrp=(int) $get_mrp;
                $get_price=$b['p_price'];
                $get_price=intval( $get_price);
                // settype($get_price,'int');
                // $get_price=(int) $get_price;
                //$disc_mrp=$get_mrp - $total_price;
                $total_mrp = $get_mrp * $quantity;
                $total_price = $get_price * $quantity;
    ?>
 
        <hr class="line"> 
 
        <div class="cart-image-main"> 
            <img src="./admin/<?php echo $b['img1']; ?>" class="cart-image"> 
        </div> 
 
    <div class="cart-desription-main"> 
        <h3><?php echo $b['p_name']; ?></h3> 
            <span class="yourcart-mrp">MRP:<span class="yourcartrupeis">₹</span><del><?php echo $b['p_mrp']; ?></del><span></span></span> 
            <span class="price">₹<span><?php echo $b['p_price']; ?></span></span> 
 
            <form method="post" action="update-cart.php" class="row g-3 mt-1"> 
                <div class="col-md-2"> 
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity ?>">     
                    <input type="hidden" name="p_id" value="<?php echo $p_id ?>" >                     
                </div> 
 
                <div class="col-md-2"> 
                    <input type="submit" name="update" value="Add" class="btn btn-success" 
                    
                    >                         
                </div> 
 
                <div class="col-md-2"> 
                    <input type="submit" class="form-control btn btn-danger" name="delete" value="Remove"> 
                </div> 
 
            </form> 
    </div> 
<?php }$disc_mrp=$total_mrp - ($total_price);}?>
    </div> 
</div> 
     
<div class="address-main"> 
 
        <div class="summary1"> 
            <center> 
                <span class="selectaddress" style="font-size:20px; font-weight:bold;">Select Address</span> 
            </center> 
        </div> 
 
        <?php
        include("connection.php");
        $c_id=$_SESSION['c_id'];
        $sql5="SELECT * from address where c_id =$c_id";
        $result5=mysqli_query($con,$sql5);
        if(mysqli_num_rows($result5)>0)
        {
            while($c=mysqli_fetch_array($result5))
            {
                if(isset($_POST['update']))
                {
                ?>
                    <form method="post" action="update-address.php" class="row g-3">
                        <div>
                    <div class"col-12">
                        <label class="form-label">Address Name </label>
                        <input type="text" value="<?php echo $c['add_address']; ?>" class="form-control" name="add_address">
                    </div>
    
                    <label class="form-label">City</label>
                    <div class"col-6">
                        <input type="text" value="<?php echo $c['city']; ?>" class="form-control" name="city">
                    </div>
    
                    <div class"col-6">
                        <label class="form-label">Pincode</label>
                        <input type="text" value="<?php echo $c['pincode']; ?>" class="form-control" name="pincode">
                    </div>
    
                    <div class="col-md-4 mt-2 mb-2">
                        <button class="btn btn-primary" class="address">Add Address</button>
                    </div>
                    </form>
                    </div>
                    <?php }

                else 
                {
                    ?>
                    <div style="margin-left:10px" class="form-check">
                        <input required class="form-check-input" type="checkbox" id="deafaultCheck1">
                        <label class="form-check-label" for="deafaultCheck1">
                        <?php echo $c['add_address']; echo","; echo $c['city']; echo","; echo $c['pincode'];?>
                    </label>
                    <div class="row">
                   
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>"> 
                    <div style="margin-left:10px;" class="col-md-2 mt-2 mb-2">
                        
                        <input type="submit" class="btn btn-primary" name="update" value="Edit address">
                        </form>
                    </div>
                    
                </div>
                <?php }}
        }
        else{

            ?>


        <div>
                <form method="post" action="add_address.php" class="row g-6">
                <div class"col-12">
                <label class="form-label">Address</label>
            <input type="text"  class="form-control" name="add_address">
                </div>
            
                <div class"col-6">
                <label class="form-label">City</label>
            <input type="text"  class="form-control" name="city">
                </div>
            
                <div class"col-6">
                <label class="form-label">Pincode</label>
            <input type="text" class="form-control" name="pincode">
                </div>
            
                <div class="col-md-4 mt-2 mb-2">
                    <button class="btn btn-primary" class="address">Add Address</button>
                </div>
                </form>
                </div>
                <?php } ?>

        <div class="summary"> 
            <div class="summary1"> 
                <center><span style="font-size: 20px; font-weight: bold;">Bill Summary</span></center> 
            </div> 
            <hr> 
            <div class="total1"> 
                <table> 
                    <tr> 
                        <td>Total MRP</td> 
                        <td><?php echo $get_mrp?></td> 
                    </tr> 
                    <tr> 
                        <td>Discount on MRP</td> 
                        <td><?php echo $disc_mrp ?></td> 
                    </tr> 
                    <tr> 
                        <td>Cart Value</td> 
                        <td><?php echo $get_price?></td> 
                    </tr> 
                     
                    <tr> 
                        <td>Order Total</td> 
                        <td><?php echo $get_price?></td> 
                    </tr> 
                </table> 
                <hr> 
            </div> 
            <div class="total"> 
                <span>Amount Payable Total:<span style="font-size: 22px; font-weight: bold;">₹ <?php echo $get_price ?></span></span> 
            </div> 
            <hr> 
            <div> 
                <center><a href="payment.php?total_price=<?php echo $get_price ?>"<button class="btn btn-success">Proceed To Buy</button></a></center> 
            </div>     
        </div> 
        </div> 
</div> 
<?php } 

else{
?>
<center> <img src="image/empty-cart.gif"></center>
<br>
<center> <a href="main-website.php" class="btn btn-primary"> Add Product</a></center>
<?php
} ?>
</body> 
</html>