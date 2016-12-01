<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/30/16
 * Time: 5:27 PM
 */
session_start();
include ('include/connect.php');

if (isset($_SESSION['user'])){

    if(isset($_POST['submit'])){

        $pid = $_GET['id'];
        $itemNo = $_POST['updateCart'];

        $sql = "update cost set qty = '$itemNo' WHERE product_id= '$pid'";

        $res = mysqli_query($conn, $sql) or die("dbms error");
    }
    if ($res){
        header("Location:viewCart.php");
    }
}
else{
    echo "cannot update";
}

?>