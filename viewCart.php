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
    $sql = "select * from product INNER JOIN cost ON product.id = cost.product_id WHERE username='$currentUser'";

    $details = mysqli_query($conn, $sql) or die("dbms 1 ect");
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
                <a class="item">
                    <div class="header"><h3>Products Categories</h3></div>
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
                <h4>Here is the cart details , total items: <strong> <?php echo $items ?> </strong></h4>
                <h4><?php echo $emptycard ?></h4>
            </div>
            <?php
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
                                <strong>Quantity : <?php echo $row['qty'] ?></strong>
                                <div class="ui inverted section divider"></div>
                               <button class="primary ui button"> After Discount: Rs <?php echo  $row['qty']*($row['price'] - $row['discount']) ?></button>
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
            ?>
        </div>
    </div>
</div>
<!----- footer------>
<?php
include('footer.php');
?>
</body>
</html>
