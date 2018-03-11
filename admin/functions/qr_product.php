<?php 
	// session_destroy();
	session_start();

	include('../inc/myconnect.php');
	include('../inc/function.php');

	$id_product = $_GET['id'];
	if (!isset($_SESSION['order'])) {
		$_SESSION['order'] = array();
		
	}

	
	$array_product = array();
	$query = "SELECT * FROM tb_product WHERE id_product = $id_product";
	$result = mysqli_query($dbc, $query);
	extract(mysqli_fetch_array($result, MYSQLI_ASSOC));

	$array_product['id_product'] = $id_product;
	$array_product['code_product'] = $code_product;
	$array_product['name_product'] = $name_product;
	$array_product['image'] = $image;
	$array_product['size_product'] = unserialize($size_product);
	$array_product['saleprice_product'] = number_format($saleprice_product, 0, ',', '.');
	$array_product['tong_gia'] = number_format($saleprice_product*1, 0, ',', '.');

	/* Lấy size đầu tiên làm mặc định */
	// $size_default = '';
	// foreach ($array_product['size_product'] as $key => $value) {
	// 	$size_default = $key;
	// 	break;
	// }
	/* Kết thúc lấy size đầu tiên làm mặc định */

	/* Tạo SESSION sản phẩm */
	$_SESSION['order'][$id_product] = $array_product;
	// $_SESSION['order'][$id_product]['quanlity'] = array($size_default => '1');
	/* Kết thúc tạo SESSION sản phẩm*/
	
	
	
	

	/*$array_product['code_product'] = $code_product;
	$array_product['code_product'] = $code_product;*/
	// echo "<pre>";
	// print_r($_SESSION['order']);
	// echo "</pre>";
	echo json_encode($array_product);
?>