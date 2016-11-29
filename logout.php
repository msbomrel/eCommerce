<?php
/**
 * Created by PhpStorm.
 * User: msbomrel
 * Date: 11/27/16
 * Time: 9:25 PM
 */
session_start();
session_unset();
session_destroy();
header("Location:index.php");
?>