<?php
session_start();
include("include/connect.php");

if(isset($_SESSION['user']) && ($_SESSION['role'] == "superadmin")) {
    $query = "select * from users";
    $results = mysqli_query($conn, $query) or die("Cannot connect");
}else{?>

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
    <link rel="stylesheet" href="css/semantic.min.css">
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
</head>

<body>
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
<div class="ui fluid accordion">
<h2>User List</h2>
<table border="1" class="ui table">
    <thead>
    <th>Name</th>
    <th>Username</th>
    <th>Password</th>
    <th>Role</th>
    <th>Status</th>
    <th colspan="2">Action</th>
    </thead>

    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($results))
    {
        ?>
        <tr>
            <td><?php echo stripslashes($row["name"]); ?></td>
            <td><?php echo stripslashes($row["username"]); ?></td>
            <td><?php echo $row["password"] ?></td>
            <td><?php echo $row["role"] ?></td>
            <td><?php echo $row["status"] ?></td>
            <td><a href="users/edituser.php?id=<?php echo $row["id"]?>">Edit</a></td>
            <td><a href="users/deleteuser.php?id=<?php echo $row["id"]?>">Delete</a></td>
        </tr>
    <?php }?>
    </tbody>
</table>
</div>
<?php include ('footer.php')?>
</body>
</html>
