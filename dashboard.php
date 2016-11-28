<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/semantic.min.css">
</head>
<body>
<h1>You are at admin panel</h1>
<a href="products/addcategory.php">Add Category</a>
<a href="products/addproduct.php">Add Products</a>
<?php
include ('include/connect.php');
$query = "select * from category";
$result = mysqli_query($conn,$query) or die("Data not connected");


while ($row = mysqli_fetch_array($result)){
    echo "<div id='img_div'>";
        echo "<img src='category_images/".$row['image']."'>";
        echo "Category:".$row['name']."";
    echo "</div>";
}
?>
</div>
</div>
<script src="js/semantic.min.js"></script>
</body>
</html>