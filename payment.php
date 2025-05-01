<?php
session_start();
{

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
    <style type="text/css">
        .box1{
            border-style:solid;
            border-color:#1d2c4d;
            border-width:3px;
        }
        .input{
            border: 2px solid #1d2c4d;

        }
        .price{
            font-size: 18px;
            font-weight: bold;
        }
        .button{
            background-color: rgb(21, 161, 153);
            color: white;
        }    
        #cancle-buttin
        {
            background-color:transparent;
            border-style:none;
            font-weight:bold;
            font-size:20px;
        }
        #makepayment:hover
        {
            background-color:transparent;
            color:black;
            border-style:none;
        }
    </style>
</head>
<body>
    <?php include("cheader.php");
    include("connection.php");
    $get=$_GET['total_price'];
    ?>
    <div style="width: 40%;" class="container mt-5 justify-content-center">
        <div class="card p-4 box1">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Total amount</h5>
            <div class=""><span class="price"><span>₹</span><?php echo "".$get;?></span></div>
        </div>
        <form method="post" action="order-data.php">
            <div class="pt-4">
                <label class="d-flex justify-content-between">
                <span class="label-text label-text-cc-number" >CARD NUMBER</span></label>
                <input required type="tel" name="" class="form-control input" minlength="16" maxlength="16" placeholder="Enter 16 Digit CardNumber">
            </div>
            <div class="d-flex justify-content-between pt-4">
                <div>
                    <label><span class="label-text" >EXPIRY DATE</span></label>
                    <input required type="text" name="" class="form-control input" placeholder="MM/YYYY" maxlength="7">
            </div>
            <div>
                <label><span class="label-text" >CVV</span></label>
                <input required type="tel" name="" class="form-control input" minlength="3" maxlength="3" placeholder="Enter 3 Digit CVV">    
            </div>
            </div>
            <div class="d-flex justify-content-between pt-5 align-itmes-center">
                 <a href="cart.php" ><button  type="button" id="cancle-buttin">Cancel</button></a> 
                <input name="done" class="btn btn-success" type="submit" class="btn button" id="makepayment" value="Make Payment">
		</div>
        </form>
        <?php
        
        ?>
        </div>
       
    </div>
</body>
</html>
