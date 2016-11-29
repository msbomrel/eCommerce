<?php
session_start();

include("include/connect.php");
if(isset($_SESSION['user'])) {

    $query = "select * from category";
    $results1 = mysqli_query($conn, $query) or die("Cannot connect");

    $query1 = "select * from product";
    $results2 = mysqli_query($conn, $query1) or die("Cannot connect");
}
else{
    ?>
    <script>
        alert('You Are Not Logged In !! Please Login to access this page');
        alert(window.location='login.php');
    </script>
    <?php
}
?>
<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="components/reset.min.css">
    <link rel="stylesheet" href="components/site.min.css">
    <link rel="stylesheet" href="components/container.min.css">
    <link rel="stylesheet" href="components/grid.min.css">
    <link rel="stylesheet" href="components/header.min.css">
    <link rel="stylesheet" href="components/image.min.css">
    <link rel="stylesheet" href="components/menu.min.css">
    <link rel="stylesheet" href="components/divider.min.css">
    <link rel="stylesheet" href="components/list.min.css">
    <link rel="stylesheet" href="components/segment.min.css">
    <link rel="stylesheet" href="components/dropdown.min.css">
    <link rel="stylesheet" href="components/icon.min.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/themes/default/assets/fonts/icons.woff ">
    <link rel="stylesheet" href="css/themes/default/assets/fonts/icons.ttf ">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <style>
        button.accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active, button.accordion:hover {
            background-color: #ddd;
        }

        div.panel {
            padding: 0 18px;
            display: none;
            background-color: white;
        }

        div.panel.show {
            display: block;
        }
    </style>

</head>
<div class="ui pointing fixed menu">
    <div class="ui container">
        <a href="#" class="header item">
            <img class="logo" src="images/logo.png">
        </a>
        <a href="index.php" class="item">Bomrel Store</a>
        <a href="#" class="item">Special Offers</a>
        <a href="#" class="item">Delivery</a>
        <a href="#" class="item">Contact Us</a>
        <div class="right menu">
              <div class="item">Welcome <?php echo strtoupper($_SESSION['user'])?> !!!</div>
            <div class="item">
                <div class="ui button" onclick="location.href='logout.php';">LogOut</div>
            </div>
        </div>
</div>
</div>

<body>
<br>
<br>
<br>
<button class="accordion">List Category</button>
        <div class="panel">
            <a href="products/addcategory.php">Add Category</a>
            <h2>Category List</h2>
            <table border="1" class="ui table">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Page Title</th>
                    <th>Page Keyword</th>
                    <th>Page Description</th>
                    <th colspan="2">Action</th>
                 </thead>
                <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($results1))
            {
                ?>
                <tr>
                    <td><?php echo stripslashes($row["name"]); ?></td>
                    <td><?php echo stripslashes($row["description"]); ?></td>
                    <td><div id="img_div"><img src="<?php echo 'category_images/'.$row['image'];?>"/></div></td>
                    <td><?php echo $row["page_title"] ?></td>
                    <td><?php echo $row["page_keyword"] ?></td>
                    <td><?php echo $row["page_description"] ?></td>
                    <td><a href="products/edit.php?id=<?php echo $row["id"]?>">Edit</a></td>
                    <td><a href="products/deletecategory.php?id=<?php echo $row["id"]?>">Delete</a></td>
                </tr>
            <?php }?>
                </tbody>
            </table>
    </div>
<button class="accordion">List Products</button>
        <div class="panel">
        <h2>Product List</h2>
            <a href="products/addproduct.php">Add Products</a>
        <table border="1" class="ui table">
            <thead>
                <th>Category Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>IsSale</th>
                <th>Product Image</th>
                <th>Discount</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
            <?php
            while ($row1 = mysqli_fetch_assoc($results2))
            {
                ?>
                <tr>
                    <td><?php echo $row1["category_id"]; ?></td>
                    <td><?php echo $row1["name"]; ?></td>
                    <td><?php echo $row1["description"]; ?></td>
                    <td><?php echo $row1["price"]; ?></td>
                    <td><?php echo $row1["stock"] ?></td>
                    <td><?php echo $row1["is_sale"] ?></td>
                    <td><div id="img_div"><img src="<?php echo 'product_images/'.$row1['prod_image'];?>"/></div></td>
                    <td><?php echo $row1["discount"] ?></td>
                    <td><a href="products/edit.php?id=<?php echo $row1["id"]?>">Edit</a></td>
                    <td><a href="products/deleteproduct.php?id=<?php echo $row1["id"]?>">Delete</a></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
       </div>
    <?php include ('footer.php')?>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function(){
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    </script>
</body>
</html>
