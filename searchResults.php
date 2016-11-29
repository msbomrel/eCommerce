<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/29/16
 * Time: 1:35 PM
 */
include ('include/connect.php');

if(isset($_POST['submit'])){
    $search = $_POST['search'];

    $query = "select * from category";
    $results1 = mysqli_query($conn, $query) or die("Cannot connect");

    $sql = "select id from category WHERE page_keyword LIKE '%$search%'";
    $res = mysqli_query($conn, $sql);
   if ($one = mysqli_fetch_array($res)) {
       $i = $one['id'];

       $sql1 = "select * from product where category_id = '$i'";
       $results2 = mysqli_query($conn, $sql1) or die("dbms error");
   }else{
       $message = "Items not found";
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
    <div class="ui grid">
        <div class="three wide column">
            <div class="ui vertical menu">
                <a class="item">
                    <div class="header"><h3>Products Categories</h3></div>
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
            <div class="ui fluid message">
                <h3 style="align-self: flex-start">Featured Products  <div style="float: right"> </div></h3>
                <div class="ui three column grid"><br>
                <h1><?php echo $message ?> </h1>

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

                                        <div class="ui vertical animated blue button" tabindex="0">
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

</div>

<!----- footer------>
<?php
include('footer.php');
?>
</body>
</html>


