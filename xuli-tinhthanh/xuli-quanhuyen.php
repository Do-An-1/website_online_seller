<?php 
	include('../inc/myconnect.php');
	include('../inc/function.php');
	$id =$_GET['value'];
	$query = "SELECT * FROM tb_district WHERE id_city = $id";
	$result = mysqli_query($dbc, $query);
	/* tao seleced cho edit order */
	if ( isset($_GET['id_district']) ) {
		$id_district = $_GET['id_district'];
	}
	/**/
	echo "<option value=''>Bạn chưa chọn tỉnh thành</option>";
	while ($rows = mysqli_fetch_assoc($result)) {
	?>
	<option <?php if (isset($id_district)) {
		echo $id_district == $rows['id_district'] ? 'selected="selected"' : '';
	} ?>
	value="<?php echo $rows['id_district'] ?>"><?php echo $rows['name_district'] ?></option>
	<?php
	}
?>