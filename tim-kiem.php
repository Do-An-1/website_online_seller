<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 9/17/2017
 * Time: 7:52 PM
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
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/into-product1.css">
    <style type="text/css">

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
                    <li style="background: url("");"><a href="">Tìm kiếm</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container" id="gioithieu-ch">
    <div class="row">
        <div class="col-xs-12" style="box-sizing: border-box;">
            <h3 class="title">Tìm kiếm</h3>
            <div class="row">
           <?php 
           // || b.unaccentname_category LIKE "%$text_search%" || b.name_category LIKE "%$text_search%" ||  a.name_label LIKE "%$text_search%" 
                $text_search = $_GET['search_header'];
                $query = 'SELECT* FROM tb_label a,tb_category b,tb_product c WHERE c.id_label=a.id_label && c.id_category=b.id_category && ((c.name_product LIKE "%'.$text_search.'%") || (b.unaccentname_category LIKE "%'.$text_search.'%") || (b.name_category LIKE "%'.$text_search.'%") || ( a.name_label LIKE "%'.$text_search.'%"))   ORDER BY c.id_product DESC';
                $result = mysqli_query($dbc, $query);

                if (mysqli_num_rows($result) >0){
                while ( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    ?>


                        <div class="col-xs-12  col-sm-3">
                            <div class="khunghinh">
                                <div class="wapper-img">
                                    <?php
                                        $img_product = explode(" ", $rows['image_thump']);
                                        $i = 0;
                                        foreach ($img_product as $value) {
                                    ?>

<!--                                         <a href="product.php?id=<?php echo $rows['id_product']; ?>"> -->
                                            <img 
                                            title="<?php echo $rows['name_product'];  ?>" 
                                            src="<?php echo $value; ?>" class="img<?php if ($i == 1) {
                                                                         echo '_1';
                                                        } ?> img-responsive" style="margin-right: auto;margin-left: auto">
                                        <!-- </a> -->
                                    <?php
                                        if ($i == 1) {
                                            break;
                                        }
                                        ++$i;
                                    }
                                    ?>
                                    
                                </div>
                                <div class="text-center name"><a href="product.php?id=<?php echo $rows['id_product']; ?>"><?php echo $rows['name_product']; ?></a></div>
                                <div class="text-center price"><?php echo $rows['price_product']; ?></div>
                                <div class="button-product text-center">
                                    <a href="product.php?id=<?php echo $rows['id_product']; ?>" class="cart">
                                        <i class="glyphicon glyphicon-shopping-cart"></i><span>Mua ngay</span>
                                    </a>
                                    <a href="product.php?id=<?php echo $rows['id_product']; ?>" class="see">
                                        <i class="glyphicon glyphicon-triangle-right"></i><span>Chi tiết</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php
                }
            }else{
                echo "<div style=''>Không tìm thấy</div>";
            }
           ?>
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
    $(document).ready(function(){
        $('.cart').click(function () {

            $.get("xuli-seeproduct/session-display.php", {display: "display:block"});
        });
    });
</script>
</html>




