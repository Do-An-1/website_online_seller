<!DOCTYPE html>
<html>
<head>
    <title>Quần áo nam đẹp, quần áo hàng hiệu, cao cấp kiểu 2017</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-main.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="css/product.css?v=1.0">
    <style type="text/css">


    </style>
</head>
<body style="margin-top: -20px;">
<?php
session_start();
if(!isset($_GET['id']) or empty($_GET['id'])){
    header('location:index.php');
}else
{
    $id = $_GET['id'];
}
include('inc/myconnect.php');
include('inc/function.php');
include('include/header.php');



?>


<div class="bcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li  style='text-transform: capitalize'><a href="index.php">Trang chủ</a></li>
                    <?php

                    $query_sp = "SELECT id_category,name_product,view_product FROM tb_product WHERE id_product={$id}";
                    $result_sp = mysqli_query($dbc, $query_sp);
                    kt_query($query_sp, $result_sp);
                    list($id_category,$name_product,$view_product)= mysqli_fetch_array($result_sp,MYSQLI_NUM);
                    ++$view_product;
                    $query_view= "UPDATE tb_product SET view_product = {$view_product} WHERE id_product={$id}";
                    $result_view = mysqli_query($dbc, $query_view);

                    $query_category_c1 = "SELECT id_category,name_category,parent_id FROM tb_category WHERE id_category={$id_category}";
                    $result_category_c1 = mysqli_query($dbc, $query_category_c1);
                    kt_query($query_category_c1, $result_category_c1);
                    list($id_category_c1,$name_category_c1,$parent_id_c1)= mysqli_fetch_array($result_category_c1,MYSQLI_NUM);
                    kt_category($id_category_c1,$name_category_c1,$parent_id_c1);

                    echo  "<li style='text-transform: capitalize;background: none;cursor: pointer;font-weight: 700;font-size: 12px'>$name_product</li>";
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php

$query_sp = "SELECT * FROM tb_product WHERE id_product={$id}";
$result_sp = mysqli_query($dbc, $query_sp);
kt_query($query_sp, $result_sp);
while ($product = mysqli_fetch_array($result_sp, MYSQLI_ASSOC)) {
    ?>
    <div class="see-product" style="background: #666" product="<?php echo $product['id_product']; ?>">
        <div class="container container-see">
            <div class="row">
                <div class="col-sm-5 col-xs-12 left">
                    <div class="slider">
                        <div class="img-slider text-center">
                            <?php

                            $img_product = explode(" ", $product['image_thump']);
                            $stt = 0;
                            foreach ($img_product as $value) {
                                if(isset($value) && !empty($value)){
                                ?>
                                <div class="item-img" stt="<?php echo $stt; ?>">
                                    <img src="<?php echo $value; ?>" class="img-responsive" style="margin: 0 auto">
                                </div>
                                <?php
                                $stt++;
                                }
                            }
                            ?>

                        </div>
                        <div class="back"><i class="glyphicon glyphicon-chevron-left"></i></div>
                        <div class="next"><i class="glyphicon glyphicon-chevron-right"></i></div>
                    </div>
                    <div class="owl-item">
                        <div class="owl-item-synced">
                            <?php
                            $img_product = explode(" ", $product['image_thump']);
                            $stt = 0;
                            foreach ($img_product as $value) {
                                if(isset($value) && !empty($value)){
                                    ?>

                                <div class="item" stt="<?php echo $stt; ?>">
                                    <img class="img-responsive" src="<?php echo $value; ?>">
                                </div>
                                    <?php
                                    $stt++;
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12 right">
                    <h1 class="title-product-see"><?php echo $product['name_product']; ?></h1>
                    <div class="price"
                         id="quickBuyPrice"><?php echo number_format($product['saleprice_product'], 0, ',', '.'); ?></div>
                    <div class="stock"> Tình trạng: <span id="quickBuyStock"><?php if ($product['status_product'] == 1) {
                                echo "Còn hàng";
                            } else {
                                echo "Hết hàng";
                            } ?></span></div>
                    <hr>
                    <p style="font-weight: 700;color: #fff;text-decoration: underline;">Điểm nổi bật:</p>
                    <p id="quickBuyHighlight"><?php echo $product['describe_product']; ?></p>
                    <hr>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div style="color: #fff">Size<span style="font-size: 10px">*</span></div>
                            <div class="col-xs-12 option1">
                                <div class="row">
                                    <select name="size" class="select select-size" style="text-transform: uppercase;">
                                        <?php 
                                             $array_size = (unserialize($product['size_product']));
                                             foreach ($array_size as $key => $value) {
                                        ?>
                                            <option value="<?php echo $key ?>"><?php echo strtoupper($key); ?></option>
                                        <?php
                                             }
                                        ?>
                                        <?php
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-5 col-sm-offset-1 col-xs-12">
                        <div class="row">
                            <div style="color: white">Số lượng<span style="font-size: 10px">*</span></div>
                            <input type="number" name="soluong" class="select select-soluong col-xs-12" value="1">
                           
                        </div>

                    </div>
                    <hr class="col-xs-12">
                    <div class="col-xs-12 col-sm-6 button-buy">
                       <div class="buy-mua">
						<span class="dk-mua dki-mua">
							<span>
								<i class="glyphicon glyphicon-shopping-cart"></i>
							</span>
							đăng kí mua
						</span>

                       </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 button-buy">
                       <div class="buy-mua">
                        <span class="dk-mua add-to-cart">
                            <span>
                                <i class="glyphicon glyphicon-plus"></i>
                            </span>
                             Thêm vào giỏ hàng
                        </span>

                       </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-6 button-cart">
                        <a href="" style="text-decoration: none;" class="cart">
						<span class="dk-mua">
						<span>
						<i class="glyphicon glyphicon-plus"></i>
						</span>
						thêm vào giỏ hàng
						</span>
                        </a>
                    </div> -->
                    <div class="col-xs-12 diachi">
                        <h6>ĐỊA CHỈ BÁN HÀNG:</h6>
                        <ul>
                            <?php
                        $query_adress = 'SELECT value FROM tb_information WHERE name = "adress"';
                        $result_adress = mysqli_query($dbc, $query_adress);
                        if( mysqli_num_rows($result_adress) > 0 ) { 
                            extract( mysqli_fetch_array($result_adress, MYSQLI_ASSOC) );
                            $array_adress = explode("$%^$%^", trim($value, "$%^$%^") );
                            echo '<li>'. $array_adress[0] .'</li>';
                        }
                        ?>
                            <li>(Ngoài những địa chỉ mua hàng trực tiếp  
                                <?php
                            $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                            $result_description = mysqli_query($dbc, $query_description);
                            if( mysqli_num_rows($result_description) > 0 ) {
                                extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                echo  $value;
                            }
                            ?>  còn có hình thức Giao Hàng Tận Nhà và Thu
                                Tiền)
                            </li>
                        </ul>
                    </div>
                    <hr class="col-xs-12">
                    <div class="col-xs-12">
                        <div class="row  cam-ket">
                            <span class="info"><i class="glyphicon glyphicon-info-sign"></i>Cam kết:</span>
                            Hình ảnh sản phẩm thời trang được chụp từ mẫu thực. Chất lượng sản phẩm được sản xuất và
                            thiết kế theo xu hướng thời trang 2018 của thương hiệu  <?php
                            $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                            $result_description = mysqli_query($dbc, $query_description);
                            if( mysqli_num_rows($result_description) > 0 ) {
                                extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                echo  $value;
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
}
?>
<div class="container" style="margin:20px auto">
    <div class="row">
        <div class="col-xs-12">
            <div class="product-list">
                <div class="left">
                    <h2><a href="sp-category.php?category=<?php echo $id_category; ?>">SẢN PHẨM CÙNG DANH MỤC</a></h2>
                </div>
                <div class="right">
                    <a href="sp-category.php?category=<?php echo $id_category; ?>">Xem tất cả</a>
                </div>
            </div>
            <div class="page-button">
                <div class="pre"></div>
                <div class="next"></div>
            </div>
            <div class="col-xs-12 wp" style="margin-top: 20px">
                <div class="row width" style="overflow: hidden;">
                    <div class="wapper">
                        <?php
                        $query_product = "SELECT * FROM tb_product WHERE id_category={$id_category} && id_product !={$id}";
                        $result_product = mysqli_query($dbc, $query_product);
                        kt_query($query_product, $result_product);
                        while ($product = mysqli_fetch_array($result_product, MYSQLI_ASSOC)) {
                            ?>
                            <div class="item">
                                <div class="khung-img">
                                    <div class="item-img">
                                        <?php
                                        $img_product = explode(" ", $product['image_thump']);
                                        $i = 0;
                                        foreach ($img_product as $value) {
                                            ?>
                                            <a href="product.php?id=<?php echo $product['id_product']; ?>">
                                                <img title="<?php echo $product['name_product']; ?>" src="<?php echo $value; ?>" class="img<?php if ($i == 1) {
                                                    echo '_1';
                                                } ?>">
                                            </a>



                                            <?php
                                            if ($i == 1) {
                                                break;
                                            }
                                            ++$i;
                                        }
                                        ?>

                                    </div>
                                    <div class="text-center name"><a href=""><?php echo $product['name_product']; ?></a>
                                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$query_product="SELECT * FROM tb_product WHERE id_product={$id}";
$result_product=mysqli_query($dbc,$query_product);
kt_query($query_product,$result_product);
while($product=mysqli_fetch_array($result_product,MYSQLI_ASSOC))
{
    ?>
    <div class="dat-hang" style="<?php if(isset($_SESSION['display'])){
//        hàm gọi session trong ở cuối trang index
        echo $_SESSION['display'];
    }else{
        echo "display:none";
    }
    unset($_SESSION['display']);
    ?>" product="<?php echo $product['id_product']; ?>">

            <div class="modal-dathang" >
                <div class="col-xs-12 name-dt"><?php echo $product['name_product'];?>
                    <div class="close-dt">
                        <i class="glyphicon glyphicon-remove"></i>
                    </div>
                </div>
                <hr class="col-xs-12">
                <div class="col-xs-12">
                    <div class="col-xs-3 hinh-dt">
                        <div class="row">
                            <?php

                            $img_product = explode(" ", $product['image_thump']);

                            echo "<img src='$img_product[0]' class='img-responsive'>";
                            ?>



                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="price-dt"><?php echo number_format($product['saleprice_product'], 0,',','.');?></div>
                        <hr>
                        <div class="col-sm-6 col-xs-12" style="margin-bottom: 10px">
                            <div class="row">
                                <div style="color: #666;font-weight: 700;margin-bottom: 5px">Size<span style="font-size: 10px">*</span></div>
                                <div class="col-xs-12 option1">
                                    <div class="row">
                                        <select name="size-dt" class="select size-dt select-size" style="text-transform: uppercase;">
                                            <?php if($product['id_loaisanpham']==1)
                                            {
                                                ?>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">Xl</option>
                                                <?php
                                            }
                                            ?>
                                            <?php if($product['id_loaisanpham']!=2)
                                            {
                                                ?>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-5 col-sm-offset-1 col-xs-12">
                            <div class="row">
                                <div style="color: #666;font-weight: 700;margin-bottom: 5px">Số lượng<span style="font-size: 10px">*</span></div>
                                <select name="soluong-dt" class="select select-soluong soluong-dt col-xs-12">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="col-xs-12">
                <div class="col-xs-12">
                    <div class="button-dong"><i class="glyphicon glyphicon-remove"></i>Đóng</div>
                    <div class="button-dt"><i class="glyphicon glyphicon-shopping-cart
glyphicon glyphicon-"></i>Gửi đơn hàng</div>
                </div>
            </div>

    </div>
    <?php
}
?>
<?php
include('include/footer.php');
?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-main.js"></script>
<script type="text/javascript" src="js/product5.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    var id_product = $('.see-product').attr('product');
    $.get("xuli/session-seen.php",{id:id_product});


        // lan sau gap bo? cai nay
      // $('.add-to-cart').click(function(){
      //    // alert("b");
      //   var id= $('.see-product').attr('product');
      //   var size= $('.select-size').val();
      //   var quantity= $('.select-soluong').val();   
      //   try{
      //       if(eval(quantity) > 0){
      //           $.get('xuli/insert.php',{id:id,size:size,quantity:quantity},function(){
      //              window.location.href = "";
      //              alert("Đã thêm vào giỏ hàng");
      //           });
      //       }
      //   }catch(err){
      //       alert("Số lượng sản phẩm không hợp lệ");
      //   }
                
      // });
});
</script>
</html>
<!-- sin(pi/2) + 1 lỗi them dấu cộng ở phía sau ở dạng chuỗi -->