<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/23/16
 * Time: 7:55 PM
 */
include ('../include/connect.php');
$id  = $_GET['id'];

$res=mysqli_query($conn,"SELECT prod_image FROM product WHERE id='$id'");
$row = mysqli_fetch_array($res);

mysqli_query($conn,"DELETE FROM product WHERE id='$id'");

unlink('../product_images/'.$row['prod_image']);
header("Location:../admindashboard.php");
?>