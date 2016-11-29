<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/29/16
 * Time: 9:49 AM
 */

session_start();
include ('include/connect.php');

if (isset($_SESSION['user'])) {
    if(isset($_POST['submit'])) {
        $sid = session_id();
        $pid = $_GET['id'];
        $qty = $_POST['qty'];

        $sql = "insert into cost (session_id,product_id,qty) VALUES ('$sid','$pid','$qty')";
        $res = mysqli_query($conn, $sql) or die("dbms error");
        if ($res) {

            echo "<script>alert('Item added successfully!!');</script>";
            echo "<script>window.location = 'index.php';</script>";

        }
    }
}  else
        {
        ?>
        <script>
            alert('You Are Not Logged In !! You need to login to add items in the Cart...');
            alert(window.location = 'login.php');
        </script>
        <?php
    }

?>

