<?php
	include('../inc/myconnect.php');
	include('../inc/function.php');
	if ( isset($_GET['code_ship']) ) {
		$code_ship = $_GET['code_ship'];
		$query = "UPDATE tb_ship SET  
					status_ship = '2'
				WHERE code_ship = {$code_ship}";
		$result = mysqli_query($dbc, $query);
			

		header('location: ../list_delivery_sent.php');
	} 
	else {
		header('location: ../list_delivery_sent.php');
	}


?>