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

    </style>
</head>
<body style="margin-top: -20px">
<?php
include('inc/myconnect.php');
include('inc/function.php');
include('include/header.php');
?>

<div class="news-letter hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>BẠN CHƯA NHẬP EMAIL HOẶC EMAIL KHÔNG ĐƯỢC XÁC THỰC</h2>
                <div>Thông tin này sẽ được bảo mật trên hệ thống 4MEN</div>
                <div>Hệ thống sẽ tự động gửi thông tin khuyến mãi hoặc sản phẩm mới nhất về thời trang nam về email mà
                    bạn đã đăng ký
                </div>
                <form action="xuli/mail.php" method="post">
                    <div class="form-group">
                        <input type="text" name="insertMail" placeholder="Email của bạn">
                        <button type="submit" name="submitNewleter" >Đăng kí</button>
                    </div>
                </form>

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
</html>
