<?php
include('db.php');
$update=false;
$date="";
$qua="";
$price="";
$total="";
if(isset($_POST['save'])){
    $pro_id=$_POST['product_id'];
    $date = $_POST['date'];
    $qua = $_POST['quantity'];
    $price = $_POST['price'];
    $total_price = $qua * $price;

    $sql = "INSERT INTO `stock_in`(`product_id`, `date`, `quantity`, `unit_price`, `total_price`)
     VALUES ('$pro_id','$date','$qua','$price','$total_price')";
    $qry=mysqli_query($conn,$sql);
    if($qry){
        echo "data inserted successfuly";
    }
    else{
        echo "Not Yet!!";
    }
}
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $select=$conn->query("SELECT  `date`, `quantity`,`unit_price` FROM `stock_in` WHERE `product_id`='$id'");
    $row=$select->fetch_array();
    $date=$row['date'];
    $qua=$row['quantity'];
    $price=$row['unit_price'];
}
if (isset($_POST['update'])) {
$id=$_GET['edit'];
$date=$_POST['date'];
$total=$qua * $price ;
$qua=$_POST['quantity'];
$price=$_POST['price'];
$update ="UPDATE `stock_in` SET `date`='$date',`quantity`='$qua',`unit_price`='$price',`total_price`='$total' WHERE product_id='$id'";
$rs=mysqli_query($conn,$update);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock_in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</div>
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
        
    </div>
    <div class="tr">
        <div class="head">stock_in</div>
        <div>
            <form action="" method="POST">
                <select name="product_id" id="">
                    <option value="">select any product</option>
                    <?php
                    $s = "SELECT * FROM `product`";
                    $q = mysqli_query($conn,$s);
                    while($r = mysqli_fetch_array($q)){ ?>

                    <option value="<?php echo $r[0] ?>"><?php echo $r[1] ?></option>

                        <?php
                    }
                    
                    ?>
                </select>
                
                <label for="">date</label>
                <input type="date" value="<?php echo $date ?>" name = "date">
                <label for="">quantity</label>
                <input type="number"  value="<?php echo $qua ?>" name="quantity" id="">
                <label for="">unity price</label>
                <input type="number"  value="<?php echo $price ?>" name="price" id="">
                <?php if($update==true):?>
                <input type="submit" value="update" name="update">
                <?php else: ?>
                <input type="submit" value="save" name="save">
                <?php endif;?>

                <?php
                if(isset($_POST['save'])){
                    $pro_id=$_POST['product_id'];
                    $date = $_POST['date'];
                    $qua = $_POST['quantity'];
                    $price = $_POST['price'];
                    $total_price = $qua * $price;
                    $sql = "INSERT INTO `stock_in`(`product_id`, `date`, `quantity`, `unit_price`, `total_price`) 
                    VALUES ('$pro_id','$date','$qua','$price','$total_price')";
                    $qry = mysqli_query($conn,$sql);
                    if($qry){
                        echo "data inserted successfuly";
                    }
                    else{
                        echo "Not Yet!!";
                    }
                }
                ?>
            </form>
        </div>
    </div>

    <div class="X">
        <table border="2px" colspan="2px" cellpadding="0px">
            <tr>
                <th>Product Name</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $select = "SELECT * FROM stock_in INNER JOIN product ON product.product_id=stock_in.product_id;";
            $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_array ($result)) {
            ?>
            <tr>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['unit_price']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><a href="?delete=<?php echo $row['product_id']; ?>">Delete</a></td>
                <td><a href="?edit=<?php echo $row['product_id']; ?>">Update</a></td>
            </tr>
            <?php } 
            if(isset($_GET['delete'])) {
                $delete_id = $_GET['delete'];
                $delete_query = "DELETE FROM `stock_in` WHERE `product_id` = '$delete_id'";
                $result = mysqli_query($conn, $delete_query);
                if($result) {
                    echo "<script>alert('Deleted successfully');</script>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
