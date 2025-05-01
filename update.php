<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="update.php" method="post">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password1" placeholder="New Password">
        <input type="password" name="password" placeholder="Re enter Password">

        <button name="submit">Submit</button>
    </form>

    <?php
     include 'connection.php';
    if (isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $newpassword=$_POST['password1'];
        $password = $_POST['password'];

        $validemail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $minLength = strlen($password) <= 8;

        if ($email != "" && $password) 
        {
            if (!$validemail) 
            {
                echo "<script>alert('Invelid Email');</script>";
            } 
            else if (!$minLength) 
            {
                echo "<script>alert('Password Must of 8 legth');</script>";
            }
            else if($newpassword!==$password)
            {
                echo "<script>alert('Password Not match');</script>";
            }
            else
            {
                $sql="SELECT email from c_login where email='$email'";
                $result=mysqli_query($con,$sql);
                $r=mysqli_fetch_array($result);

                if(!$r>0)
                {
                    echo "<script>alert('Email Not exists');</script>";
                }
                else
                {
                    $sql="UPDATE c_login SET password='$password' where email='$email'";    
                    $result=mysqli_query($con,$sql);
                    if($result)
                    {
                        echo "<script>alert('Update Successfully');</script>";
                    }
                    else
                    {
                        echo "<script>alert('Data Not Updated');</script>";
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