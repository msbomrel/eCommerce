<?php
session_start();
include("include/connect.php");
$id = $_GET['id'];

$query1 = "select * from category";
$results1 = mysqli_query($conn,$query1) or die("Cannot connect");

$name = "select * from category WHERE  id=$id";
$res_name = mysqli_query($conn, $name);

$query2 = "select * from product WHERE category_id=$id";
$results2 = mysqli_query($conn,$query2) or die("Cannot connect");
$t = mysqli_num_rows($results2);
?>

<!doctype html>
<html lang="en">
<head>

</head>
<?php include ('header.php')?>
<body>
<!---- content box--->
<div class="ui main container">
    <div class="ui grid">
        <div class="three wide column">
            <div class="ui vertical menu">
                <a class="item">
                    <div class="header"><h3>Products Categories</div>
                </a>
                <?php
                while ($row = mysqli_fetch_assoc($results1))
                {
                    ?>
                    <a class="item" href="categoryDetails.php?id=<?php echo $row['id']; ?>" > <?php echo strtoupper($row['name']); ?> </a>
                <?php } ?>
            </div>
        </div>
        <div class="thirteen wide column">
            <h3>Category: <?php while ($row = mysqli_fetch_array($res_name))
                {
                    echo strtoupper($row['name']);
                }?>
                <div style="float: right"><?php echo $t ?>+ featured products</div> </h3>
            <div class="ui three column grid">
                <?php
                while ($row = mysqli_fetch_assoc($results2))
                {
                    ?>
                    <div class="column">
                        <div class="ui segment">

                            <a class="item">
                                <center>
                                    <img src='product_images/<?php echo $row["prod_image"]?>'> <br>
                                    <strong><?php echo mb_strtoupper($row["name"]);?></strong><br>
                                    Price : Rs
                                    <?php echo $row["price"];?><br>

                                    <div class="ui vertical animated button" tabindex="0">
                                        <div class="hidden content"> <a href="productDetails.php?id=<?php echo $row["id"]?>">Shop</a></div>
                                        <div class="visible content">
                                            <i class="shop icon"></i>
                                        </div>
                                    </div>
                                    <div class="ui animated google button" tabindex="0">
                                        <div class="hidden content"> <a href="productDetails.php?id=<?php echo $row["id"]?>">Details</a></div>
                                        <div class="visible content">
                                            <i class="content icon"></i>
                                        </div>
                                    </div>
                                </center>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<!----- footer------>
<?php include ('footer.php')?>
</body>
</html>