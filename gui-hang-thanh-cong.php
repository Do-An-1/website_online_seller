<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 4/9/2017
 * Time: 21:22 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quần áo nam đẹp, quần áo hàng hiệu, cao cấp kiểu 2017</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-main.css">
    <style type="text/css">
      #wrapper-giaohang{text-align: center;font-family: "Myriad Pro"; font-size:24px;margin-top: 20px;font-weight: bold;color: #444;margin-bottom: 25px}

      
    </style>


</head>
<body style="margin-top: -20px;overflow-x: hidden;">
<?php
include('inc/myconnect.php');
include('inc/function.php');
include('include/header.php');
?>


<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="wrapper-giaohang">
				<div class="row-1"><i class="glyphicon glyphicon-ok" style="color: #48A4FF;font-size: 24px;margin-right: 5px"></i>Chúc mừng bạn đã gửi đơn hàng thành công. 
				</div>
				<div class="row-2">Cảm ơn bạn đã sử dụng dịch vụ của thương hiệu thời trang nam 3T</div>
				<a href="index.php" class="btn btn-primary" style="font-weight: bold;margin-top: 15px ">Tiếp tục tham gia mua hàng</a>
			</div>
		</div>	
	</div>
</div>


<?php
include('include/footer.php');
?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-main.js"></script>
<script type="text/javascript">

</script>
</html>


