<?php
$update=false;
$date="";
$qua="";
include('db.php');


if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM `stock_in` WHERE `product_id` = '$delete_id'";
    $result = mysqli_query($conn, $delete_query);
    if($result) {
        echo "<script>alert('Deleted successfully');</script>";
    }
}
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
    $update=true;
    $select=$conn->query("SELECT `product_id`, `date`, `quantity` FROM `stock_out` WHERE product_id='$id'");
    $row=$select->fetch_array();
    $date=$row['date'];
    $quntity=$row['quantity'];
    
}
if(isset($_POST['update'])){
    $date=$_POST['date'];
    $quntity=$_POST['quantity'];
    $update="UPDATE `stock_out` SET `date`='$date',`quantity`='$quntity' WHERE product_id='$id'";
    $rs=mysqli_query($conn,$update);
}




if(isset($_POST['save'])){
    $pro_id=$_POST['product_id'];
    $date = $_POST['date'];
    $qua = $_POST['quantity'];

    $sql = "INSERT INTO `stock_out`(`product_id`, `date`, `quantity`) 
    VALUES ('$pro_id','$date','$qua')";
    $qry = mysqli_query($conn,$sql);
    if($qry){
        echo "data inserted successfuly";
    }
    else{
        echo "Not Yet!!";
    }
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
        <div class="head">stock_out</div>
        <div>
            <form action="" method="post">
                <select name="product_id" id="">
                    <option value="">select any product</option>
                    <?php
                    $s = "SELECT * FROM product NATURAL JOIN stock_in ";
                    $q = mysqli_query($conn,$s);
                    while($r = mysqli_fetch_array($q)){ ?>

                    <option value="<?php echo $r[0] ?>"><?php echo $r[1] ?></option>

                        <?php
                    }
                    
                    ?>
                </select>
                
                <label for="">date</label>
                <input type="date" name = "date">
                <label for="">quantity</label>
                <input type="number" name="quantity" id="">
                <?php if($update==true):?>
                <input type="submit" value="update" name="update">
                <?php else: ?>
                <input type="submit" value="save" name="save">
                <?php endif; ?>

                <?php
              
                ?>
            </form>
        </div>
    </div>

    <div class="c">
        <table border="2px" colspan="2px" cellpadding="0px">
            <tr>
                <th>Product Name</th>
                <th>Date</th>
                <th>Quantity</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $select = "SELECT * FROM stock_out INNER JOIN product ON product.product_id=stock_out.product_id;";
            $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_array ($result)) {
            ?>
            <tr>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><a href="?delete=<?php echo $row['product_id']; ?>">Delete</a></td>
                <td><a href="?edit=<?php echo $row['product_id']; ?>">Update</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
