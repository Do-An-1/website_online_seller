<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 28/8/2017
 * Time: 21:30 PM
 */
    if(isset($_GET['category']) && !empty($_GET['category'])){
        $id_category =(int)$_GET['category'];
    }
    else{
        header("Location: index.php");
    }
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

</head>
<body style="margin-top: -20px">
    <?php
        session_start();
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
                        <?php
                        $query_category1 = "SELECT id_category,name_category,parent_id FROM tb_category WHERE  id_category={$id_category}";
                        $result_category1= mysqli_query($dbc, $query_category1);
                        kt_query($query_category1, $result_category1);
                        list($id_category1,$name_category1,$parent_id1)=mysqli_fetch_array($result_category1,MYSQLI_NUM);
                        
                        if($parent_id1 !=0){
                            $query_category2 = "SELECT id_category,name_category,parent_id FROM tb_category WHERE  id_category={$parent_id1}";
                            $result_category2= mysqli_query($dbc, $query_category2);
                            kt_query($query_category2, $result_category2);
                            list($id_category2,$name_category2,$parent_id2)=mysqli_fetch_array($result_category2,MYSQLI_NUM);

                            if($parent_id2 !=0){
                                $query_category3 = "SELECT id_category,name_category,parent_id FROM tb_category WHERE  id_category={$parent_id2}";
                                $result_category3= mysqli_query($dbc, $query_category3);
                                kt_query($query_category3, $result_category3);
                                list($id_category3,$name_category3,$parent_id3)=mysqli_fetch_array($result_category3,MYSQLI_NUM);
                                echo "<li><a href='sp-category.php?category=".$id_category3."'>".$name_category3."</a></li>";
                            }
                            echo "<li><a href='sp-category.php?category=".$id_category2."'>".$name_category2."</a></li>";
                        }
                        echo "<li><a href='sp-category.php?category=".$id_category1."'>".$name_category1."</a></li>";

                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php

    ?>


    <?php
    $query_category = "SELECT name_category,unaccentname_category FROM tb_category WHERE  id_category={$id_category}";
    $result_category= mysqli_query($dbc, $query_category);
    kt_query($query_category, $result_category);
    list($name_category,$unaccentname_category)=mysqli_fetch_array($result_category,MYSQLI_NUM);
    $id = lay_id($id_category);
    if(empty($id)){
        $id=$id_category;
    }else{
        $id.=",".$id_category;
    }
    ?>
    <div class="product" style="margin-bottom: 1000px">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <h1><?php echo $name_category; ?></h1>
                    <div class="clearfix"></div>
                    <div class="row">
                    <?php
                    $limit=6;
                    //xac dinh vi trí bắt đầu là trang thứ mấy
                    if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range' =>1))){
                        $start = $_GET['s'];
                    }
                    else{
                        $start = 0;
                    }
                    //xem phải có bao nhiu trang
                    if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range' =>1))){
                        $per_page = $_GET['p'];
                    }
                    else{
                        //nếu p không có thì sẽ truy vấn CSDL để tìm xem có bao nhìu trang

                        $query_pg="SELECT COUNT(id_category) FROM tb_product WHERE id_category IN ($id)";
                        $result_pg = mysqli_query($dbc,$query_pg);
                        kt_query($query_pg,$result_pg);
                        list($record)= mysqli_fetch_array($result_pg,MYSQLI_NUM);
                        //Tìm số trang bằng cách chia số dữ liệu cho limit

                        if($record >$limit){
                            $per_page = ceil($record /$limit);
                        }
                        else{
                            $per_page=1;
                        }
                    }



                    $query_sp = "SELECT * FROM tb_product WHERE id_category IN ($id) LIMIT {$start},{$limit}";
                    $result_sp = mysqli_query($dbc, $query_sp);
                    kt_query($query_sp, $result_sp);
                    while ($product = mysqli_fetch_array($result_sp, MYSQLI_ASSOC)) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                            <div class="khunghinh" >
                                <div class="wapper-img">
                                <?php
                                $img_product = explode(" ", $product['image_thump']);
                                $i = 0;
                                foreach ($img_product as $value) {
                                    ?>
                                    <a href="product.php?id=<?php echo $product['id_product']; ?>">
                                        <img title="<?php echo $product['name_product']; ?>"  src="<?php echo $value ?>" class="img<?php if ($i == 1) {
                                            echo '_1';
                                        } ?> img-responsive" style="margin-right: auto;margin-left: auto">
                                    </a>
                                    <!-- 													<img src="image/product/quan-jean-xanh-den-qj1396-7746-slide-1.jpg" class="img_1"> -->
                                    <?php
                                    if ($i == 1) {
                                        break;
                                    }
                                    ++$i;
                                }
                                ?>
                                </div>
                                <div class="text-center name"><a href=""><?php echo $product['name_product']; ?></a></div>
                                <div class="text-center price"><?php echo number_format($product['saleprice_product'], 0, ',', '.'); ?></div>
                                <div class="button-product">
                                    <a href="product.php?id=<?php echo $product['id_product']; ?>" class="cart">
                                        <i class="glyphicon glyphicon-shopping-cart"></i><span>Mua ngay</span>
                                    </a>
                                    <a href="product.php?id=<?php echo $product['id_product']; ?>" class="see">
                                        <i class="glyphicon glyphicon-triangle-right"></i><span>Chi tiết</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                    <div class="row">
                        <div class="page col-xs-12 text-right" style="padding-right: 25px">
                    <?php
                    echo "<ul class='pagination'>";
                    if($per_page>1){
                        $current_page =($start/$limit)+1;
                        //nếu không phải trang đầu
                        if($current_page != 1)
                        {
                            echo "<li><a style='font-size: 12px' href='sp-category.php?category=$id_category&s=".($start-$limit)."&p={$per_page}'><<</a></li>";
                        }
                        //Hiện thị những phần còn lại của trạng
                        for($i=1;$i<=$per_page;$i++)
                        {
                            if($i !=$current_page)
                            {
                                echo "<li><a href='sp-category.php?category=$id_category&s=".($limit*($i-1))."&p={$per_page}'>{$i}</a></li>";
                            }
                            else{
                                echo "<li class='active'><a>{$i}</a></li>";
                            }
                        }
                        //nếu không phải trang cuối thì hiện thị nút next
                        if($current_page != $per_page)
                        {
                            echo "<li><a style='font-size: 12px' href='sp-category.php?category=$id_category&s=".($start+$limit)."&p={$per_page}'>>></a></li>";
                        }
                    }

                    echo "</ul>";
                    ?>
                    </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 sibar-right">
                    <h4 class="hidden-xs">TÌM KIẾM SẢN PHẨM</h4>
                    <form class="form-search hidden-xs" action="tim-kiem.php">
                        <input class="form-control" type="text" name="search_header" placeholder="Từ khóa tìm kiếm">
                        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                    <h5>SẢN PHẨM HOT</h5>
                    <?php
                    $query_sp_hot = "SELECT * FROM tb_product  ORDER BY view_product DESC LIMIT  0,5";
                    $result_sp_hot = mysqli_query($dbc, $query_sp_hot);
                    kt_query($query_sp_hot, $result_sp_hot);
                    while ($product = mysqli_fetch_array($result_sp_hot, MYSQLI_ASSOC)) {
                        ?>
                        <div class="col-xs-12 product-hot">
                            <div class="col-xs-4" style="padding: 0">
                                <a href="product.php?id=<?php echo $product['id_product']; ?>">
                                    <img  class="img-responsive" src="
                                    <?php
                                    $img_product = explode(" ", $product['image_thump']);
                                    echo $img_product[0];
                                    ?>
                                ">
                                </a>
                            </div>
                            <div class="col-xs-8 text-left">
                                <a href=""><?php echo $product['name_product']; ?></a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="tu-khoa col-xs-12" style="padding: 0">
                        <h4>TỪ KHÓA PHÂN LOẠI</h4>
                        <ul class="cat-list">
                            <li><a href="">Áo nam</a></li>
                            <li><a href="">Quần nam</a></li>
                            <li><a href="">Quần áo nam công sở</a></li>
                            <li><a href="">Quần co giãn nam</a></li>
                        </ul>
                    </div>
                    <div class="product-seen" style="background: white;z-index: 2;">
                        <h5 class="name-seen">SẢN PHẨM ĐÃ XEM</h5>
                        <div class="wapper-seen">


                        <?php
                            if(isset($_SESSION['seen']) or !empty($_SESSION['seen'])) {
                                foreach ($_SESSION['seen'] as $value) {
                                    ?>
                                    <div class="col-xs-12 product-hot">
                                        <div class="col-xs-4" style="padding: 0">
                                            <a href="product.php?id=<?php echo $value['id_product']; ?>">
                                                <img class="img-responsive" src="
                                                <?php
                                                $img_product = explode(" ", $value['image_thump']);
                                                echo $img_product[0];
                                                ?>
                                            ">
                                            </a>

                                        </div>
                                        <div class="col-xs-8">
                                            <a href="product.php?id=<?php echo $value['id_product']; ?>"><?php echo $value['name_product']; ?></a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div style="position: relative" "></div>-->
    <?php
    include('include/footer.php');
    ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-main.js"></script>
<!--     <script type="text/javascript" src="js/product1.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.cart').click(function () {

                $.get("xuli-seeproduct/session-display.php", {display: "display:block"});
            });

            $('.bcrumbs ul li:last-child').css("background","url()");


            var scroll= $('.wapper-seen').offset().top-150;
            var footer = $('#footer-header').offset().top;
            var productSeen =0;
            var header =$('.header').height();
            var scrollFooter=0;
            var top =$('#footer-header').offset().top - $('.product-seen').height()-$('.header').height();


            $(window).scroll(function(){
                scrollFooter =footer -productSeen-header;

                if($('body').width()>=768){

                    var width = $('.product-seen').width();
                    if($(this).scrollTop()> scroll){

                        if($(this).scrollTop()> scrollFooter){
                            $('.product-seen').css({'position':'absolute',
                                'top': top-80
                            });
//                            alert( scrollFooter);
                        }else{
                            $('.product-seen').css({
                                'position':'fixed',
                                'top':80,
                                'width':width
                            });
                            top =$('#footer-header').offset().top - $('.product-seen').height()-$('.header').height();

                            header =$('.header').height();
                            footer = $('#footer-header').offset().top;
                            productSeen =$('.product-seen').height();
                            scrollFooter =footer -productSeen-header;
//                            alert(footer+" "+productSeen +" "+header);
////                          alert(footer);
                        }

                    }else{
                        $('.product-seen').css({
                            'position':'static',
                            'top':0
                        });
                    }
                }


            });


//            alert($('#footer-header').offset().top+" left :  "+$('.product-seen').height()+" top :" + $('.header').height() );
        })
    </script>
</body>
</html>



                       



