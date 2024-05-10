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
    <title>signup</title>
</head>
<body><div class="signupform">
    <div class="head">signup</div>
        
        <div>
        <form action="" method="post">
            <label for="" id="n">username</label><br>
            <input type="text" name="username" required><br><br>
            <label for=""id="n">password</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="signup" name="submit">
            <button><a href="login.php">login</a></button>



        </form>

        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['username'];
            $password=$_POST['password'];

            $insert="INSERT INTO `user`(`user_id`, `username`, `password`) VALUES ('','$name','$password')";
            $rs=mysqli_query($conn,$insert);
            if($rs){
                echo "successfully created";
            }
            else{
                echo "failed";
            }

            

        }
        ?>
    

        </div>
        </div>
    

</body>
</html>