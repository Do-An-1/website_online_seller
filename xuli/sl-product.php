<?php
session_start();
$id=$_GET['id'];
$soluong=0;
 if(isset($_SESSION['cart']) or !empty($_SESSION['cart'])){
 	foreach ($_SESSION['cart'][$id]['quantity'] as  $value) {
 		$soluong+=$value;
 	}
 	
 }
 echo $soluong;
 ?>