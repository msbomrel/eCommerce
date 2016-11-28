<?php
include ('../include/connect.php');
$id = $_GET['id'];
$query = "delete from users where id='$id'";
$result = mysqli_query($conn,$query);

if($result){
    header("Location:../superadmindashboard.php");
}
else{
    echo "Cannot delete";
}

?>

