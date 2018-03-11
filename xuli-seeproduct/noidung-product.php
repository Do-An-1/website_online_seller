<?php
	include('../inc/myconnect.php');
	include('../inc/function.php');
	$id = $_GET['id'];
	settype($id, 'int');
	$query_product= "SELECT noidung FROM tbl_sanpham WHERE id={$id}";
	$result_product=mysqli_query($dbc,$query_product);
	kt_query($query_product,$result_product);
	while($product=mysqli_fetch_array($result_product,MYSQLI_NUM)){
		echo $product[0];
	}
 ?>