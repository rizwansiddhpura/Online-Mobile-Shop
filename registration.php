
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

      <form action="registration.php" method="post" >
        <h1>Registration</h1>
        <div class="input-text">
          <input type="text" placeholder="username" name="username" >
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-text">
          <input type="text" placeholder="email" name="email" >
          <i class="bx bxs-envelope"></i>

        </div>
        <div class="input-text">
          <input type="password" placeholder="password" name="password">
          <i class="bx bxs-lock"></i>
        </div>
        <button class="button" name="regis">Registration</button>
      </form>
    </div>
  
  <div class="register-text">
      <div class="register-text-in">
        <h1>Wellcome Back!</h1>
        <p>Already have an account?</p>
        <a href="login.php"><button class="button-login">Registration</button></a>
      </div>
    <?php
    include 'connection.php';
    if(isset($_POST['regis']))
    {
      $username=$_POST['username'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $c_status='Active';
      
      $validemail=filter_var($email, FILTER_VALIDATE_EMAIL);
      $minLength=strlen($password)<=8;

      if($username !="" && $email !="" && $password)
      {

        $unamelen=strlen($username) <= 10  ;
        if(!$unamelen)
        {
          echo "<script>alert('Username Must of 10 Length and white space is not allowes');</script>";
        }
        else if(!preg_match("/^[a-zA-Z]*$/", $username))
        {
          echo "<script>alert('User Name Only Letter are allowed');</script>";
        }
        else if(!$validemail)
        {
          echo "<script>alert('Invelid Email');</script>";
        }
        else if(!$minLength)
        {
          echo "<script>alert('Password Must of 8 legth');</script>";
        }
        else 
        {
          $sql="SELECT * From c_login where email='$email' and password='$password'";
          $result=mysqli_query($con,$sql);
          $r=mysqli_fetch_array($result);
          if($r>0)
          {
            echo "<script>alert('User allready Exists');</script>";
          }
          else
          {
            $sql="insert into c_login(username,email,password,c_status) values('$username','$email','$password','$c_status')";
           $result=mysqli_query($con,$sql);

           if($result)
           {
            echo "<script>alert('Registraton Succssfully');</script>";
            header ('location:login.php');
           }
           else
           {
            echo "<script>alert('Data Not Insert');</script>";
           }
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