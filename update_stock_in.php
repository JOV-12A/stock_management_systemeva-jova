<?php
include('db.php');
$product_id="";
$id=$_GET['id'];
$sel="SELECT * FROM `stock_in` where product_id='$id'";
$rs=mysqli_query($conn,$sel);
$row=mysqli_fetch_array($rs);
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
</head>
<div class="tx">
<h1>WELCOME TO dashboard</h1>
</div>
<body>
    <div class="header">


       <a href="product.php">product</a>
       <a href="stock_in.php">stock_in</a>
       <a href="stock_out.php">stock_out</a>
    
    
</div>
    <div class="body">
        
<body><div class="signupform">
    <div class="head">INSERT PRODUCT</div>
        
        <div>
        <form action="" method="post">
            <input type="hidden" value="<?php echo $row['product_id']?>" hidden>
            <label for="" id="n">date</label><br>
            <input type="text"  value="<?php echo $row['date']?>" name="date" required><br><br>
            <label for="" id="n">quantity</label><br>
            <input type="text"  value="<?php echo $row['quantity']?>" name="quantity" required><br><br>
            <label for="" id="n">unity price</label><br>
            <input type="text"  value="<?php echo $row['unit_price']?>" name="unit_price" required><br><br>
            <label for="" id="n">total price</label><br>
            <input type="text"  value="<?php echo $row['total_price']?>" name="total_price" required><br><br>
            <input type="submit" value="update" name="update">
            
            


        </form>

        <?php
        if(isset($_POST['update'])){
            $id=$_GET['id'];
            $date=$_POST['date'];
            $quantity=$_POST['quantity'];
            $unity=$_POST['unit_price'];
            $toatl=$_POST['total_price'];
            $up="UPDATE stock_in SET product_id='',date='$date',
            quantity='$quantity',unit_price='$unity',total_price='$toatl' WHERE product_id='$id'";
            $rs=mysqli_query($conn,$up);
            if ($rs) {
                header('location:stock_in.php');
            }
            

            

        }
        ?>
        </div>
        </div>
      
    

</body>
</html>