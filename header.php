<head>
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
<div class="ui inverted fixed menu">
    <div class="ui container">
        <a href="index.php" class="header item">
            <img class="logo" src="images/logo.png">
        </a>
        <a href="index.php" class="item">Bomrel Store</a>
        <a href="#" class="item">Special Offers</a>
        <a href="#" class="item">Delivery</a>
        <a href="#" class="item">Contact Us</a>
        <div class="right menu">
            <form class="item" action="searchResults.php" method="post">
                <div class="ui transparent icon input">
                    <input type="text" name="search" style="color: whitesmoke;" placeholder="Search products">
                    <i style="color: whitesmoke;" class="search link icon"></i>
                </div>
                <input type="hidden" name="submit">
            </form>
            <?php
            session_start();
            if(!isset($_SESSION['user'])){
            ?>
            <div class="item">
                <div class="ui primary button" onclick="location.href='users/register.php';"">Sign up</div>
        </div>
        <div class="item">
            <div class="ui button" onclick="location.href='login.php';">Log-in</div>
        </div> <?php }
        else { ?> <div class="right menu">
                     <div class="item"> <i class="user icon"></i> Welcome <?php echo strtoupper($_SESSION['user'])?> !!!</div>
                        <?php if(isset($_SESSION['role'])){
                            if($_SESSION['role'] == "admin"){
                                ?>
                                <div class="item">
                                    <div class="button" onclick="location.href='admindashboard.php';">AdminDash</div>
                                </div>
                                <?php } elseif ($_SESSION['role'] == "superadmin") { ?>
                                <div class="item">
                                    <div class="button" onclick="location.href='superadmindashboard.php';">SuperAdminDash</div>
                                </div>
                               <?php } else {?>
                                <div class="item">
                                    <button class="ui button piled" onclick="location.href='viewCart.php';">Your Cart Details</button>
                                </div>
                        <?php }
                        }?>
                     <div class="item">
                         <div class="ui button" onclick="location.href='logout.php';">LogOut</div>
                     </div>
                 </div>
        <?php }?>
    </div>
</div>
</div>
