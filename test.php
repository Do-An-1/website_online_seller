<?php
include('inc/myconnect.php');
include('inc/function.php');
//error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quần áo nam đẹp, quần áo hàng hiệu, cao cấp kiểu 2017</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-main.css">
	<!--    <link rel="stylesheet" type="text/css" href="css/style.css">-->
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/style-body1.css">


	<style type="text/css">

	</style>
</head>

<body>
	<?php 
		if (isset($_POST['submit'])) {
			$array_size = array();
			if ( isset($_POST['size_m']) ) {
				$array_size[$_POST['size_m']] = $_POST['sl_m'];
			}
			if ( isset($_POST['size_l']) ) {
				$array_size[$_POST['size_l']] = $_POST['sl_l'];
			}
			if ( isset($_POST['size_xl']) ) {
				$array_size[$_POST['size_xl']] = $_POST['sl_xl'];
			}
			// echo '<pre>';
			echo Serialize($array_size);
			// echo '</pre>';
			echo '<pre>';
			print_r(Unserialize(Serialize($array_size)));
			echo '</pre>';
		}	
	?>
	<form action="" method="post">
		<input type="checkbox" id="music" name="size_m" value="m">
    	<label for="music">M</label>
    	<input type="number" name="sl_m" value="1" >
		<br>
    	<input type="checkbox" id="music" name="size_l" value="l">
    	<label for="music">L</label>
    	<input type="number" name="sl_l" value="1">
		<br>
    	<input type="checkbox" id="music" name="size_xl" value="xl">
    	<label for="music">XL</label>
    	<input type="number" name="sl_xl" value="1">
    	<br>
    	<input type="submit" name="submit">

	</form>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){


	})

</script>
</html>