<?php
	session_start();
	include('../inc/myconnect.php');
	include('../inc/function.php');
	
	if(isset($_SESSION['order']) or !empty($_SESSION['order']) && isset($_GET['name']) && isset($_GET['email'])  && isset($_GET['sdt']) && isset($_GET['sonha']) &&  isset($_GET['code_order']) && isset($_GET['quan_huyen']) ){
		$code_order = $_GET['code_order'];
    	/* Xoa don hang cu */
    	$query = "DELETE FROM tb_order WHERE code_order={$code_order}";
    	$result = mysqli_query($dbc, $query);


		$name = $_GET['name'];
		$email = $_GET['email'];
		$sdt = $_GET['sdt'];
		$code_order = $_GET['code_order'];
		$address_customer =  $_GET['sonha'];
		$id_district = $_GET['quan_huyen'];
		// date_default_timezone_set("Asia/HO_CHI_MINH");
		$order_day = $_GET['date'];
			foreach ($_SESSION['order'] as $value) {
				$id_product = $value['id_product'];
				foreach ($value['quanlity'] as $key_sl => $value_sl) {
					print_r($value['quanlity']);
					$size_product =  $key_sl;
					$quantity_product = $value_sl;
					$query= "INSERT INTO tb_order(
											code_order,
											status_order,
											id_product,
											size_product,
											quantity_product,
											name_customer, 
											phone_customer,
											address_customer,
											email_customer,
											order_day,
											id_district
										) VALUES(
										'{$code_order}',
										'0',
										'{$id_product}', 
										'{$size_product}', 
										'{$quantity_product}', 
										'{$name}', 
										'{$sdt}', 
										'{$address_customer}', 
										'{$email}',
										'{$order_day}',
										'{$id_district}'
									)";
									echo $query;
				$result =  mysqli_query($dbc,$query);
				}
				

				// header('location:../gui-hang-thanh-cong.php');
			}	
			unset($_SESSION['order']);
		// header('location:../gui-hang-thanh-cong.php');
	}
?>