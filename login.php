<?php
include("include/connect.php");
if(isset($_POST['submit'])){
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $query = "select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {       while ($row = mysqli_fetch_array($result)){
        if ($row['role'] == "admin"){
            header("Location:admindashboard.php");
        }
        elseif ($row['role'] == "superadmin"){
            header("Location:superadmindashboard.php");
        }
    }
    }
    else
    {
        echo "Cannot Log In";
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
<div class="ui one column center aligned grid">
    <div class="column three wide form-holder">
        <h2 class="center aligned header form-head">BomrelStore</h2>
        <form action="" method="post">
            <div class="ui form">
                <div class="field">
                    <i class="flaticon-graduates"></i>
                    <input type="text" placeholder="username" name="username" required>
                </div>
                <div class="field">
                    <i class="flaticon-plus"></i>
                    <input type="password" placeholder="password" name="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Sign In" class="ui button large fluid green">
                </div>
        </form>

        <div class="field">
            <button type="submit" name="register" class="ui button fluid"><a href="users/register.php">Register now</a> </button>
        </div>
    </div>
</div>
<script src="js/semantic.min.js"></script>
</body>
</html>


