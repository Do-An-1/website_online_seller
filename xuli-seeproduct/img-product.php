<?php
	include('../inc/myconnect.php');
	include('../inc/function.php');
	$id = $_GET['id'];
	settype($id, 'int');
	$query_product= "SELECT anh FROM tbl_sanpham WHERE id={$id}";
	$result_product=mysqli_query($dbc,$query_product);
	kt_query($query_product,$result_product);
	while($product=mysqli_fetch_array($result_product,MYSQLI_NUM)){
		$stt=0;
		?>
		<div class="item-img" stt="<?php echo $stt;?>">
			<img src="<?php echo $product[0]; ?>" style="width: 300px;height: 400px">		
		</div>
	<?php 
		$stt++;
		}
	 ?>