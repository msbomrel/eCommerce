<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/30/16
 * Time: 6:31 PM
 */
session_start();

include ('include/connect.php');

if(isset($_SESSION['user'])){

    $currentUser = $_GET['user'];
    $sql = "select p.id,p.name,p.description,p.price,p.prod_image,p.discount,c.qty,c.product_id,checkout.id from product p JOIN cost c ON p.id = c.product_id LEFT JOIN checkout ON c.product_id= checkout.p_id WHERE username = '$currentUser' AND checkout.id is null";
    $details = mysqli_query($conn, $sql) or die("dbms serror");

    if(isset($_POST['submit'])){
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];

        while ($row = mysqli_fetch_array($details)){
            $product_id =$row['product_id'];
            $qty = $row['qty'];

            $sql1 = "insert into checkout (uname,p_id,qty,address, phonenumber) VALUES ('$currentUser','$product_id',$qty,'$address',$phonenumber)";
            mysqli_query($conn,$sql1) or die("error");
        }
        echo "<script>alert('Order Placed Successfully');</script>";

        header("Location:index.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
</head>
<body>
<?php
include ('header.php');
?>
<!---- content box--->
<div class="ui main container">
    <div class="ui fluid message">
        <table border="1" class="ui table">
            <thead>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            while ($row = mysqli_fetch_assoc($details))
            {
                ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["price"] ?></td>
                    <td><?php echo $row["discount"] ?></td>
                    <td><?php echo $row["qty"] ?></td>

                    <td><?php echo $row['qty']*($row['price'] - $row['discount']);
                    $sum = $sum + $row['qty']*($row['price'] - $row['discount']);
                    ?></td>
                    <td><a href="removeItem.php?id=<?php echo $row["product_id"]?>">Remove</a></td>
                </tr>

            <?php }?>

            </tbody>

        </table>
        <tr style="float:right;">Total Rs: <?php echo $sum ?></tr>
        <div class="ui inverted section divider"></div>

        <form class="ui form" action="" method="post">
            <h3 style="font-size: larger">Please enter your details to place an order, The service is Cash on Delivery </h3>
            <div class="field">
                <label>Address</label>
                <input type="text" name="address" placeholder="Delivery Address">
            </div>
            <div class="field">
                <label>Phone Number</label>
                <input type="number" name="phonenumber" placeholder="Mobile Number">
            </div>
            <button class="ui button" type="submit" name="submit">Place an Order</button>
        </form>
    </div>
</div>
<!----- footer------>
<?php include ('footer.php')?>
</body>
</html>





