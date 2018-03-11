<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 1/9/2017
 * Time: 19:34 PM
 */
session_start();
if(isset($_GET['display'])&& !empty($_GET['display'])){
    $_SESSION['display']= $_GET['display'];
}
else{
    header('location:index.php');
}


?>