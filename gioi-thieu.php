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
    #gioithieu-ch{padding-top: 15px;padding-bottom: 15px}
    #gioithieu-ch .content-gt{margin-top: 20px;font-family: Raleway;color: #444}
    #gioithieu-ch .title{font-weight: 700;  font-size: 20px;border-bottom: 1px dashed #cccccc;padding-bottom: 5px}
</style>


</head>
<body style="margin-top: -20px;overflow-x: hidden;">
    <?php
    include('inc/myconnect.php');
    include('inc/function.php');
    include('include/header.php');
    ?>
    <div class="bcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li style="background: url("");"><a href="">Giới thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="gioithieu-ch">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="title">Giới thiệu 3T-SHOP</h3>
                <?php
                $query = "SELECT * FROM tb_information WHERE name ='gioithieu'";
                $result = mysqli_query($dbc, $query);
                if ( mysqli_num_rows($result) > 0 ) {
                    extract( mysqli_fetch_array($result) );
                    echo $value;
                }  else {

                    ?>

                    <div class="content-gt">Chưa có.</div>
                    <?php 
                }
                ?>
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


