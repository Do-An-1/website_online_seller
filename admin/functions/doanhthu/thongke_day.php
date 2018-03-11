<?php include('../../inc/myconnect.php');?>
<?php include('../../inc/function.php');?>
<?php
	$array_date = $_GET['date'];
	$thongke = array();
	foreach ($array_date as  $value) {
		$date= date_create($value);
		$date =  date_format($date,"d");
		$query = "SELECT SUM(quantity_product*saleprice_product) tongtien FROM  tb_order, tb_product WHERE tb_order.id_product = tb_product.id_product && order_day BETWEEN '".$value." 0:0:0' AND '".$value." 23:59:59'";
		$result = mysqli_query($dbc, $query);
		extract(mysqli_fetch_assoc($result));
		$thongke[] = array($date => $tongtien);	
	}
	
	echo json_encode($thongke);
	die;
	?>