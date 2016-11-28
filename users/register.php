<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link rel="stylesheet" href="../components/reset.min.css">
    <link rel="stylesheet" href="../components/site.min.css">
    <link rel="stylesheet" href="../components/container.min.css">
    <link rel="stylesheet" href="../components/grid.min.css">
    <link rel="stylesheet" href="../components/header.min.css">
    <link rel="stylesheet" href="../components/image.min.css">
    <link rel="stylesheet" href="../components/menu.min.css">
    <link rel="stylesheet" href="../components/divider.min.css">
    <link rel="stylesheet" href="../components/list.min.css">
    <link rel="stylesheet" href="../components/segment.min.css">
    <link rel="stylesheet" href="../components/dropdown.min.css">
    <link rel="stylesheet" href="../components/modal.min.css">
    <link rel="stylesheet" href="../components/icon.min.css">
    <link rel="stylesheet" href="../css/semantic.min.css">
    <link rel="stylesheet" href="../css/themes/default/assets/fonts/icons.woff ">
    <link rel="stylesheet" href="../css/themes/default/assets/fonts/icons.ttf ">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/semantic.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
<?php
include("../include/connect.php");
$count= 0;
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = ($_POST['username']);
   // $password = hash('sha512', $password);
    $password = md5($_POST['password']);
    $role = $_POST['adminbox'];
    $status = $_POST['statusbox'];

    $checkuser = mysqli_query($conn, "select username from users where username = '$username'");
    if(mysqli_num_rows($checkuser) != 0){
        echo "Username already exist";
    }
    else
    {
        $query = "insert into users (name,username,password,role,status) VALUES ('$name','$username','$password','$role','$status')";
        $result = mysqli_query($conn, $query) or die("DB error");
    }

    if($result)
    {
        echo "<script>alert('Your account has been created !!');</script>";
        echo "<script>window.location='../index.php';</script>";
    }
}

?>
<div class="ui one column center aligned grid">
    <div class="column three wide form-holder">
        <h2 class="center aligned header form-head">eCommerce Site</h2>
        <form action="" method="post">
            <div class="ui form">
                <div class="field">
                    <input type="text" placeholder="name" name="name">
                </div>
                <div class="field">
                    <input type="text" placeholder="username" name="username">
                </div>
                <div class="field">
                    <input type="password" placeholder="password" name="password">
                </div>
                <div class="field">
                    <select name="adminbox">
                        <option value="admin">Admin</option>
                        <option value="superadmin">SuperAdmin</option>
                    </select>
                </div>
                <div class="field">
                    <select name="statusbox">
                        <option value="active">Active</option>
                        <option value="passive">Passive</option>
                    </select>
                </div>
                <div class="field">
                    <input type="submit" name="register" value="register" class="ui button large fluid red">
                </div>
        </form>
    </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../js/semantic.min.js"></script>
</body>
</html>


