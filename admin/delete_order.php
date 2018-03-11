<?php
include('inc/myconnect.php');
include('inc/function.php');

if (isset($_GET['code_order']) && filter_var($_GET['code_order'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $code_order = $_GET['code_order'];
    $query = "DELETE FROM tb_order WHERE code_order={$code_order}";
    $result = mysqli_query($dbc, $query);
    kt_query($query, $result);
    header("Location: list_order.php");
} else {
    header("Location: list_order.php");
    exit();
}
?>