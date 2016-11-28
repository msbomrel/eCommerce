<?php
include ('../include/connect.php');
if (isset($_POST['submit'])) {

    $target = "../product_images/".basename($_FILES['prod_image']['name']);

    $name = $_POST['productname'];
    $category_id = $_POST['selectcat'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $prod_image = $_FILES['prod_image']['name'];
    $discount = $_POST['discount'];


    $query2 = "insert into product(category_id,name,description,price,stock,prod_image,discount) VALUES
              ('$category_id','$name','$description','$price','$stock','$prod_image','$discount')";
    mysqli_query($conn, $query2) or die("db connection failed");

    if (move_uploaded_file($_FILES['prod_image']['tmp_name'], $target)) {
        $message = "Description Submitted";
        header("Location:../admindashboard.php");
    } else {
        $message = "There is an error";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/semantic.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
<div class="ui one column center aligned grid">
    <div class="column three wide form-holder">
        <h1>Add your products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ui form">
                <div class="field">
                    <input type="text" placeholder="name" name="productname" required>
                </div>
                <div class="field">
                    <select name="selectcat">
                        <?php
                        $query1 = "select * from category";
                        $result = mysqli_query($conn, $query1);
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="field">
                    <input type="text" placeholder="description" name="description" required>
                </div>
                <div class="field">
                    <input type="number" placeholder="price" name="price" required>
                </div>
                <div class="field">
                    <input type="number" placeholder="stock" name="stock" required>
                </div>
                <div class="field">
                    Upload Image: <input type="file" placeholder="Upload Image" name="prod_image" id="prod_image" required>
                </div>
                <div class="field">
                    <input type="number" placeholder="discount" name="discount" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Submit" class="ui button large fluid green">
                </div>
        </form>
    </div>
</div>
<script src="../js/semantic.min.js"></script>
</body>
</html>