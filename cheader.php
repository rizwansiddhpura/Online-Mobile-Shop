<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/cheader.css" >
    <title>Document</title>
</head>
<body>
    
<!-------------------------------------------------- Header -------------------------------------------------->

<div class="header">

    <div>
        <a href=""><img src="Logo.jpg" class="Logo"></a>
    </div>

    <div class="mainsearch">
        <form method="get" action="search.php" class="search-bar">
        <input type="search" class="serchbox" placeholder="Search Products" name="search">
        <span><button type="Submit" class="searchbutton"><img src="image/serchicon.png" class="serchicon"></button></span>
        </form>
    </div>

    <div class="usermain">
        <div>
            <a href=""><img src="image/user.png" class="users"></a>
            <?php
		    if (isset($_SESSION['email'])) 
            {
			include 'connection.php';
			
			$c_id = $_SESSION['c_id'];
			$sql2="SELECT * from c_login where c_id ='$c_id'";
			$result2 = mysqli_query($con,$sql2);
			$a=mysqli_fetch_array($result2);
			
             echo '<span><a href="profile.php" class="login">'.$a['username'].'</span></a>';
		    }

		    else
            {
			 echo'<span><a href="login.php" class="login">Login / Register</span></a>';
		    }
		 ?>
        </div>
    </div>

    <div class="maincart">
        <div>
            <a href="cart.php"><img src="image/cart.png" class="cart"></a>
            <?php
            include('connection.php');
  	    if (isset($_SESSION['email'])) {
             $c_id = $_SESSION['c_id'];
			 $sql1="SELECT * from cart where c_id ='$c_id'";
			 $result1 = mysqli_query($con,$sql1);
			 if($total = mysqli_num_rows($result1))
			 {
				 echo'<span><a href="" class="carttext">('.$total.')</span></a>';
				
			 }
			 else{
				echo'<span><a href="" class="carttext">(0)</span></a>';
			 }
		  }
		  else{
			echo '<span><a href="" class="carttext">Cart</span></a>';
		}
			  ?>
        </div>
    </div>
</div>
<hr class="line ">
</body>
</html>