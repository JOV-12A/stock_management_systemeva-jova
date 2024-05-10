<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body><div class="signupform">
    <div class="head">login</div>
        
        <div>
        <form action="" method="post">
            <label for="" id="n">username</label><br>
            <input type="text" name="username" required><br><br>
            <label for=""id="n">password</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="login" name="login">
            <button><a href="signup.php">signup</a></button>





        </form>

        <?php
        if(isset($_POST['login'])){
            $name=$_POST['username'];
            $password=$_POST['password'];

            $select="SELECT `user_id`, `username`, `password` FROM `user` WHERE `username`='$name' AND `password`='$password'";
            $a=mysqli_query($conn,$select);
            if($a){
                header('location:product.php');
            }
            
            }

            

        
        ?>
    

        </div>
        </div>
    

</body>
</html>