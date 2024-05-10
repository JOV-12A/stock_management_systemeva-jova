<?php
include('db.php');
if (isset($_GET['delete'])) {
    $delete=$_GET['delete'];
    $del="DELETE FROM `product` WHERE product_id='$delete'";
    $rs=mysqli_query($conn,$del);
}
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

<body>
    <div class="header">
    <a href="home.php">HOME</a>


       <a href="product.php">product</a>
       <a href="stock_in.php">stock_in</a>
       <a href="stock_out.php">stock_out</a>
       <a href="report.php">report</a>
       <a href="logout.php">logout</a>
    
    
</div>
    <div class="body">
        
<body><div class="product">
    <div class="head">INSERT PRODUCT</div>
        
        <div>
        <form action="" method="post">
            <label for="" id="n">product name</label><br>
            <input type="text" name="product_name" required><br><br>
            <input type="submit" value="save" name="submit">
            
            


        </form>

        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['product_name'];
            

            $insert="INSERT INTO `product`(`product_id`, `name`) VALUES ('','$name')";
            $rs=mysqli_query($conn,$insert);
            if($rs){
                echo "product inserted successfully ";
            }
            else{
                echo "failed";
            }

            

        }
        ?>
        </div>
        </div>
        <div class="table">
            <table border="2px" cellspace="0px" cellpadding="10px" >
            <tr>
                <th>product_id</th>
                <th>product_name</th >
                <th collspan="2px">action</th>
                <?php
                $select="select * from product";
                $a=mysqli_query($conn,$select);
                while($row=mysqli_fetch_array($a)){?>
                <tr>
                    <td><?php echo $row['product_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><a href="?delete=<?php echo $row['product_id']?>">delete</a>
                    <a href="update_product.php?id=<?php echo $row['product_id']?>">update</a>
                
                </td>
                </tr>
         
                <?php
                    
                }
                ?>
            </tr>
            </table>

        </div>
    

</body>
</html>