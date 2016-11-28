<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/20/16
 * Time: 8:49 PM
 */
include ('../include/connect.php');
$id  = $_GET['id'];

$res=mysqli_query($conn,"SELECT image FROM category WHERE id='$id'");
$row = mysqli_fetch_array($res);

mysqli_query($conn,"DELETE FROM category WHERE id='$id'");

unlink('../category_images/'.$row['image']);
header("Location:../admindashboard.php");
?>