<?php
	session_start();
	if(isset($_SESSION['cart']) or !empty($_SESSION['cart'])){
		$gia_tong=0;
		foreach ($_SESSION['cart'] as  $value) {
			$gia=$value['saleprice_product'];
			$sl_product=0;
			foreach ($value['quantity'] as  $sl) {
				$sl_product += $sl;
			}
			$gia_tong += $gia *$sl_product;
		}
		echo number_format($gia_tong, 0,',',',');
	}	
?>