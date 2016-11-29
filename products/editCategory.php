<?php
include ('../include/connect.php');
$message ="";
if (isset($_POST['submit'])){

    $target = "../category_images/".basename($_FILES['cat_image']['name']);

    $name = $_POST['name'];
    $description = $_POST['description'];
    $cat_image = $_FILES['cat_image']['name'];
    $page_title = $_POST['page_title'];
    $page_keyword = $_POST['page_keyword'];
    $page_description = $_POST['page_description'];

    $query = "insert into category(name,description,image,page_title,page_keyword,page_description) VALUES 
      ('$name','$description','$cat_image','$page_title','$page_keyword','$page_description')";
    mysqli_query($conn,$query) or die("cannot get connected");

    if(move_uploaded_file($_FILES['cat_image']['tmp_name'],$target)){
        $message = "Description Submitted";
        header("Location:../admindashboard.php");
    }
    else{
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
        <h1>Add category</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ui form">
                <div class="field">
                    <input type="text" placeholder="name" name="name" required>
                </div>
                <div class="field">
                    <input type="text" placeholder="description" name="description" required>
                </div>
                <div class="field">
                    Upload Image: <input type="file" placeholder="Upload Image" name="cat_image" id="cat_image">
                </div>
                <div class="field">
                    <input type="text" placeholder="page title" name="page_title">
                </div>
                <div class="field">
                    <input type="text" placeholder="Keyword" name="page_keyword" required>
                </div>
                <div class="field">
                    <input type="text" placeholder="PageDescription" name="page_description">
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