<?php include('../../inc/myconnect.php');?>
<?php include('../../inc/function.php');?>
<?php
	$date = $_GET['date']; // tong so ngay cua thang truoc
	$now = getdate(); // thoi gian hien tai
	$month_ago = $now["mon"] -1;
	$year = $now["year"];
	if($month_ago == 0) {
		$month_ago =12;
		$year = $now["year"] - 1;
	}
	$thongke = array();
	for ($i=1; $i <= $date; $i++) { 
		$query = "SELECT SUM(quantity_product*saleprice_product) tongtien FROM  tb_order, tb_product WHERE tb_order.id_product = tb_product.id_product && order_day BETWEEN '".$year."-".$month_ago."-".$i." 0:0:0' AND '".$year."-".$month_ago."-".$i." 23:59:59'";
		$result = mysqli_query($dbc, $query);
		extract(mysqli_fetch_assoc($result));
		$thongke['ngay'.$i] = $tongtien;
	}
	echo json_encode($thongke);
	die;
	?>