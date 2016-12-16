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
        $user = $_SESSION['user'];
        $sid = session_id();
        $pid = $_GET['id'];
        $qty = $_POST['qty'];

        $checkproduct = "select * from cost where username= '$user' && product_id='$pid'";
        $result = mysqli_query($conn, $checkproduct);

        while ($row = mysqli_fetch_assoc($result)) {
            $pro = $row['product_id'];
            $old_qty = $row['qty'];
        }
            if ($pro == $pid) {
                $finalqty = $old_qty + $qty;

                mysqli_query($conn, "update cost set qty ='$finalqty' WHERE username ='$user' && product_id='$pid'");
                echo "<script>window.location = 'viewCart.php';</script>";

            }
        else {

                $sql = "insert into cost (username,session_id,product_id,qty) VALUES ('$user','$sid','$pid','$qty')";
                $res = mysqli_query($conn, $sql) or die("dbms error");

                if ($res) {
                    echo "<script>window.location = 'viewCart.php';</script>";

                }
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

