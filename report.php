<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th,td{
            border: 2px solid;
            border-collapse: collapse;
            padding: 10px;
            margin-top:100px;
            margin-left:20px;
        }
    </style>
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
    <table class="report">
        <tr>
            <th colspan="7">GENERAL REPORT</th>
        </tr>
        <tr>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>DATE IN</th>
            <th>DATE OUT</th>
            <th>UNIT PRICE</th>
            <th>TOTAL PRICE OF PRODUCT SOLD</th>
        </tr>
        <?php 
        include('db.php');
        $query=mysqli_query($conn,"SELECT * FROM product INNER JOIN stock_in ON 
        product.product_id=stock_in.product_id
         INNER JOIN stock_out on stock_in.product_id=stock_out.product_id");
       while($data=mysqli_fetch_array($query)){
        ?>
          <tr>
            <td><?php echo $data[1] ?></td>
            <td><?php echo $data[4]?></td>
            <td><?php echo $data[3]?></td>
            <td><?php echo $data[8]?></td>
            <td><?php echo $data[5]?></td>
            <td><?php echo $data[6]?></td>
          </tr>
        <?php
       }  


?>
    </table>
</body>
</html>