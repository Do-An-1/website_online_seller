<?php 
	session_start();
	include('../inc/myconnect.php');
	include('../inc/function.php');

	$id_product = $_GET['id_product'];

	if( isset($_GET['array_quanlity']) ) {
		$array_quanlity = $_GET['array_quanlity'];
		$_SESSION['order'][$id_product]['quanlity'] = array();
		foreach ($array_quanlity as $key => $value) {
			$_SESSION['order'][$id_product]['quanlity'][$key] = $value;
		}
		print_r($_SESSION['order']);
	} else {
		unset($_SESSION['order'][$id_product]);
		print_r($_SESSION['order']);
		echo "khong co array_quanlity (fileL:ud_quanlity.php)";
	}
?>