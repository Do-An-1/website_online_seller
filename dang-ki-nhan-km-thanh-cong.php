<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 3/9/2017
 * Time: 19:44 PM
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
       .wapper-ssuccess .success{background: #333333;color: white;padding: 10px;margin: 20px 0;  }
        .wapper-ssuccess{margin-bottom: 10px}
    </style>
</head>
<body style="margin-top: -20px">
<?php
include('inc/myconnect.php');
include('inc/function.php');
include('include/header.php');
?>

<div class="container wapper-ssuccess">
    <div class="row">
        <div class="col-xs-12">
            <div class="success">
                <div>Chúc mừng bạn đã đăng ký email nhận thông báo khuyến mãi thành công.</div>
                <div>Bạn có thể truy cập vào trang chủ hoặc xem những danh mục bên dưới để tiếp tục tham gia mua hàng.
                </div>
            </div>
            <div class="wapper-ssuccess text-center"><a href="index.php" style=""><div class="btn btn-primary dki-tc">Trở về</div></a></div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-main.js"></script>
</html>
