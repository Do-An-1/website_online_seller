<?php include('../../inc/myconnect.php');?>
<?php include('../../inc/function.php');?>
<?php 
	$now = getdate(); // thoi gian hien tai
	$thongke = array();
	for ($i=1; $i <=12 ; $i++) { 
		$query = "SELECT SUM(quantity_product*saleprice_product) tongtien FROM  tb_order, tb_product WHERE tb_order.id_product = tb_product.id_product && order_day BETWEEN '".$now["year"]."-".$i."-01 0:0:0' AND '".$now["year"]."-".$i."-31 23:59:59'";
		// echo $query;
		$result = mysqli_query($dbc, $query);
		extract(mysqli_fetch_assoc($result));
		$thongke['thang'.$i] = $tongtien;
	}
	echo json_encode($thongke);
	die;
	?>