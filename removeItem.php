<?php
include ('include/connect.php');

$id = $_GET['id'];

$query = "delete from cost where product_id = $id ";
$result = mysqli_query($conn,$query) or die("dbms error");

if($result){
    $_SESSION['message'] = "Item is removed successfully !!!";
    header("Location:viewCart.php");
}
else{
    echo "Cannot delete";
}
?>

