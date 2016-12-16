<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/29/16
 * Time: 5:13 PM
 */
session_start();
include ("include/connect.php");

$query = "select * from category";
$results1 = mysqli_query($conn,$query) or die("Cannot connect");

if(isset($_SESSION['user'])){
    $currentUser = $_SESSION['user'];

    $query = "select product_id from cost LEFT JOIN checkout ON cost.product_id= checkout.p_id WHERE username = '$currentUser' AND checkout.id is null";
    $det = mysqli_query($conn, $query) or  die("erroeeeeeeeeeeeeeeeee");
    $r =mysqli_fetch_array($det);
    $prod = $r['product_id'];

    if($prod != NULL){
            $sql = "select p.id,p.name,p.price,p.prod_image,p.discount,c.qty,c.product_id,checkout.id from product p JOIN cost c ON p.id = c.product_id LEFT JOIN checkout ON c.product_id= checkout.p_id WHERE username = '$currentUser' AND checkout.id is null";
            $details = mysqli_query($conn, $sql) or die("dbms 1 ect");
        }
        else{
      //  $_SESSION['nocart'] = "There is no items available right now";
        }
            $items = mysqli_num_rows($details);

    if (mysqli_num_rows($details) == 0){
        $_SESSION['emptycart'] = "You have not added anything in your Cart. Start Shopping Now !!!";
    }

}

else {
    ?>
    <script>
        alert('You Are Not Logged In !! Please Login to access this page');
        alert(window.location='login.php');
    </script>
    <?php
}
?>

<!doctype html>
<html lang="en">
<head>
</head>
<body>
<?php
include ('header.php');

if(isset($_SESSION['emptycart'])){
    $emptycard = $_SESSION['emptycart'];
}
?>
<!---- content box--->
<div class="ui main container">
    <div class="ui grid">
        <div class="three wide column">
            <div class="ui vertical menu">

                <a class="items">
                    <a class="item" href="purchaseHistory.php?user=<?php echo $_SESSION['user']?>">
                    <button class="ui pinterest button"><h3>Purchase History</h3></button>
                    </a>
                    <a class="item">
                    <div class="header"><h3>Products Categories</h3></div>
                    </a>
                </a>
                <?php
                while ($one = mysqli_fetch_assoc($results1))
                {
                    ?>
                    <a class="item" href="categoryDetails.php?id=<?php echo $one['id']; ?>" > <?php echo strtoupper($one['name']); ?> </a>
                <?php } ?>
            </div>
        </div>
        <div class="thirteen wide column">
            <div class="ui fluid message">
                <div class="ui items">
                <div class="item">
                    <h4>Here is the cart details:  <div style="float:right;">Total Items: <strong> <?php echo $items ?> </strong> </div></h4>
                    <?php echo $_SESSION['nocart'] ?></h4>
                </div>
                </div>

            <?php
            $sum = 0;
            while ($row = mysqli_fetch_assoc($details))
            {
            ?>
            <div class="ui info message">
                <div class="ui items">
                    <div class="item">
                        <div class="image">
                            <img src='product_images/<?php echo $row["prod_image"]?>'>
                        </div>
                        <div class="content">
                            <a class="header"><h1><?php echo $row["name"];?></h1></a>
                            <div class="description">
                                Price : Rs <?php echo $row["price"];?> <br>
                                Discount : Rs <?php echo $row["discount"];?>
                                <div class="ui inverted section divider"></div>
                                <!--- Button for Cart Update--->
                                <form action="updateCart.php?id=<?php echo $row['product_id']?>" method="post">
                                    <strong>Quantity : <input  name='updateCart' value="<?php echo $row['qty']?>"></strong>
                                    <button name="submit" type="submit" class="ui brown button">Update</button>
                                </form>
                                <div class="ui inverted section divider"></div>
                               <button class="primary ui button"> After Discount: Rs <?php echo $row['qty']*($row['price'] - $row['discount']);
                               $sum = $sum + $row['qty']*($row['price'] - $row['discount']);
                               ?></button>
                                <!------ Button for removing Cart----->
                                <a href="removeItem.php?id=<?php echo $row["product_id"]?>">
                                <button style="float: right;" class="ui animated fade youtube button" tabindex="0">
                                        <div class="visible content"> Remove </div>
                                        <div class="hidden content">
                                            <i class="recycle icon"></i>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
            ?><?php if ($items !=0) { ?>
                    <!----Button to check Out ----->
                <h2> Your total price: Rs <?php echo $sum ?>
                    <a href="checkOut.php?user=<?php echo $_SESSION['user'] ?>">
                        <button  style="float: right" class="ui animated fade youtube button" tabindex="0">
                            <div class="visible content"> Check Out</div>
                            <div class="hidden content">
                                <i class="shop icon"></i>
                            </div>
                        </button>
                    </a></h2>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!----- footer------>
<?php
include('footer.php');
?>
</body>
</html>
