<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/10/16
 * Time: 6:54 PM
 */
session_start();
$dbname = "ecommerce";
$dbusername= "root";
$password="123";
$host = "localhost";
$conn = mysqli_connect($host,$dbusername,$password,$dbname) or die("DBMS Error");
?>
