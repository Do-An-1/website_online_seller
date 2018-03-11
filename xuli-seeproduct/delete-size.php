<?php
session_start();

$id=$_GET['id'];
$size=strtoupper($_GET['size']);
unset($_SESSION['cart'][$id]['quantity'][$size]);
if($_SESSION['cart'][$id]['quantity']==null){
	unset($_SESSION['cart'][$id]);
	echo 0;
}else{
	echo 1;
}
?>