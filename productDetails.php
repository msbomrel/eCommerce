<?php
include("include/connect.php");

    $pid = $_GET['id'];

    $query = "select * from category";
    $results1 = mysqli_query($conn, $query) or die("Cannot connect");

    /*$query1 = "select * from product";
    $results2 = mysqli_query($conn,$query1) or die("Cannot connect");*/

    $query3 = "select  * from product WHERE id= '$pid'";

    $results3 = mysqli_query($conn, $query3);
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="components/dropdown.min.css">
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
            <h3 style="align-self: flex-start">Product Information</h3>
                <?php
                while ($row = mysqli_fetch_assoc($results3))
                {
                    ?>

            <div class="ui info message">
            <div class="ui items">
                <div class="item">
                    <div class="image">
                        <img src='product_images/<?php echo $row["prod_image"]?>' width="100%" height="100%">
                    </div>
                    <div class="content">
                        <a class="header"><h1><?php echo $row["name"];?></h1></a>
                        <div class="description">
                            Description : <?php echo $row["description"];?> <br>
                            <div class="ui inverted section divider"></div>
                            Price : Rs <?php echo $row["price"];?>
                            <div class="ui inverted section divider"></div>

                            Discount : Rs <?php echo $row["discount"];?>
                            <div class="ui inverted section divider"></div>
                            <form action="addCart.php?id=<?php  echo $row['id']?>" method="post">
                            <strong>Quantity :</strong>
                                <select name="qty" id="cart-no" class="dropdown selection">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <strong><?php echo $row["stock"];?> items in stock </strong>
                            <button type="submit" name="submit" style="float: right;" class="ui animated fade youtube button" tabindex="0">
                                <div class="visible content">Add to Cart</div>
                                <div class="hidden content">
                                    <i class="shop icon"></i>
                                </div>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
                </div>

        </div>
    </div>

</div>
<!----- footer------>
<footer style="position: absolute; ">
    <div class="ui inverted vertical footer segment" style="margin-top: 14px;">
        <div class="ui center aligned container">
            <div class="ui stackable inverted divided grid">
                <div class="four wide column">
                    <h4 class="ui inverted header">ACCOUNT</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                    </div>
                </div>
                <div class="four wide column">
                    <h4 class="ui inverted header">INFORMATION</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                    </div>
                </div>
                <div class="four wide column">
                    <h4 class="ui inverted header">OFFERS</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                    </div>
                </div>
                <div class="four wide column">
                    <h4 class="ui inverted header">SOCIAL MEDIA</h4>
                    <button class="ui circular facebook icon button">
                        <i class="facebook icon"></i>
                    </button>
                    <button class="ui circular twitter icon button">
                        <i class="twitter icon"></i>
                    </button>
                    <button class="ui circular linkedin icon button">
                        <i class="linkedin icon"></i>
                    </button>
                    <button class="ui circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                    <p class="pull-right">© msbomrel</p>
                </div>
            </div>
            <div class="ui inverted section divider"></div>
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="#">Site Map</a>
                <a class="item" href="#">Contact Us</a>
                <a class="item" href="#">Terms and Conditions</a>
                <a class="item" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
<script>
    $('#cart-no').dropdown();
</script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/semantic.min.js"></script>
<script src="components/dropdown.min.js"></script>
</body>
</html>


