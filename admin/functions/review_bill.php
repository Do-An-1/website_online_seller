<?php
	include('../inc/myconnect.php');
	include('../inc/function.php');
	if ( isset($_GET['code_bill']) ) {
		$code_bill = $_GET['code_bill'];
		$query = "UPDATE tb_bill SET  
					status_bill = '1'
				WHERE code_bill = {$code_bill}";
		$result = mysqli_query($dbc, $query);
		

		// tao ship 

		$code_ship = ramdom_code_ship();
		$query_code_bill = "SELECT id_bill,id_order FROM tb_bill WHERE code_bill = {$code_bill}";
		$result_code_bill = mysqli_query($dbc, $query_code_bill);
		while ( $rows = mysqli_fetch_array($result_code_bill, MYSQLI_ASSOC) ) {
			$id_bill = $rows['id_bill'];
			$id_order = $rows['id_order'];
			$query_is_ship = "INSERT INTO `tb_ship`(`code_ship` , `id_bill`,`id_order`, `status_ship`) VALUES ('{$code_ship}','{$id_bill}','{$id_order}', 0)";
			$result_is_ship = mysqli_query($dbc, $query_is_ship);
		}
		

		header('location: ../list_bill.php');
	} 
	else {
		header('location: ../list_bill.php');
	}


?>