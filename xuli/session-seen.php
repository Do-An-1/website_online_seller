<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 31/8/2017
 * Time: 22:11 PM
 */
session_start();
include('../inc/myconnect.php');
include('../inc/function.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $query_product = "SELECT id_product,name_product,image_thump FROM tb_product";
    $result_product = mysqli_query($dbc, $query_product);
    kt_query($query_product, $result_product);
    $data = array();

    while ($product = mysqli_fetch_array($result_product, MYSQLI_ASSOC)) {
        $data[$product['id_product']] = $product;
    }


    if (!isset($_SESSION['seen']) or empty($_SESSION['seen'])) {
        $_SESSION['seen'][$id] = $data[$id];
    } else {

        $_SESSION['seen'][$id] = $data[$id];

    };
}else{
    header('location:../index.php');
}






?>