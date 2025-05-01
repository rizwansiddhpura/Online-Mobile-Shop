
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css" >
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="ragister-main">

      <form action="login.php" method="post">
        <h1>Login</h1>
        <div class="input-text">
          <input type="text" name="email" placeholder="email">
          <i class='bx bxs-user'></i>
        </div>

        <div class="input-text">
          <input type="password" name="password"placeholder="password">
          <i class='bx bxs-lock'></i>
        </div>
        <a href=""><button class="button" name="login">Login</button></a>
      </form>
  </div>

    <div class="register-text">
      <div class="register-text-in">
        <h1>Hello Wellcome!</h1>
        <p>Don't have an account?</p>
        <a href="registration.php"><button class="button-login">Register</button></a>
      </div>
    </div>
  </div>

  <?php
  include 'connection.php';

  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];

    

    $validemail=filter_var($email, FILTER_VALIDATE_EMAIL);
    $minLength=strlen($password)<=8;

    if($email !="" && $password)
    {
        if(!$validemail)
        {
          echo "<script>alert('Invelid Email');</script>";
        }
        else if(!$minLength)
        {
          echo "<script>alert('Password Must of 8 legth');</script>";
        }
        else
        {
          $sql="SELECT * From c_login where email='$email' and password='$password' AND c_status='Active'";
          $result=mysqli_query($con,$sql);
    
          if($a=mysqli_num_rows($result)>0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
       
                $_SESSION['email']=$row['email'];
                $_SESSION['c_id']=$row['c_id'];
                    
                echo "<script>window.location.href='main-website.php'</script>";
              }
            }
            
            else
            {
                echo "<script>alert('User Not Found');</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Please Fill Box');</script>";
    }
  }
  ?>
</body> 
</html>
