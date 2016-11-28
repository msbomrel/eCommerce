<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/27/16
 * Time: 9:25 PM
 */
session_start();
$_SESSION["userid"]="";
session_destroy();
header("Location:index.php");
?>