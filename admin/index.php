<?PHP 
include('includes/header.php');
?>
<style type="text/css">
    .title{
        color: red;
        text-align: center;
        text-transform: uppercase;
        margin-top: 35px;
        font-weight: bold;
    }
    .statistic-chart{
      /*  text-align: center;*/
      margin-top: 25px;
    }
    .statistic-chart #buyers{
        margin: 0 auto;
    }
    .statistic-chart .menu > ul{
        line-height: inherit;
        padding: 0;
        margin-left: 10px;
        border-bottom: 1px solid #ccc;
    }
    .statistic-chart .menu > ul:after{
        content: "";
        display: table;
        clear: both;
    }
    .statistic-chart .menu > ul li{
        float: left;
        cursor: pointer;
        background: #999l;
        list-style: none;
        padding: 8px 15px;
        background: #e1e1e1;
        box-sizing: border-box;
        border-left: 1px solid #ccc; 
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        margin-bottom: -1px;
        margin-left: 10px;
    }
    .statistic-chart .menu > ul li:hover{
        background: #f1f1f1;
        border-bottom: 1px solid #f1f1f1;
    }
    .statistic-chart .menu > ul .active{
        background: #f1f1f1;
        border-bottom: 1px solid #f1f1f1;
    }
    /**/
    .statistic-chart .sub-menu{
        text-align: center;
        background: white;
        margin-top: 25px;
    }
    .statistic-chart .sub-menu ul{
        text-align: left;
        background: #f5f5f5;
        list-style: none;
        padding: 0;
        border-bottom: 1px solid #ccc;
    }
    .statistic-chart .sub-menu ul li:first-child{
        margin-left: 0px;
    }
    .statistic-chart .sub-menu ul li{
        font-weight: 700;
        color: #0073aa;
        display: inline-block;
        cursor: pointer;
        background: #999l;
        list-style: none;
        padding: 8px 15px;
        background: #f5f5f5;
        box-sizing: border-box;
        border-left: 1px solid #ccc; 
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        margin-bottom: -1px;
        margin-left: 10px;
    }
    .statistic-chart .sub-menu ul .active{
        background: #fff;
    }
    .statistic-chart .sub-menu ul li:hover{
        background: #fff;
    }
    /**/
    /*style header*/
    .wrap-header{
        margin:15px 0;
    }
    .wrap-header:after{
        content: " ";
        display: table;
        clear: both;
    }
    .wrap-header .left,.wrap-header .right{
        background: white;
        border-radius: 4px;
        padding: 5px 10px;
        border:1px solid #e1e1e1;
    }
    .wrap-header .left .title-left{
        margin-top: 5px;
        margin-bottom: 5px;
        color: blue;
        font-weight: bold;
        font-size: 16px;
    }
    .link_a{
        background: #f1f1f1;
        padding: 8px;
        border:1px solid #e1e1e1;
        border-radius: 4px;

    }
</style>
<div class="row" style="margin-top: -15px;padding-bottom: 55px">
    <div class="row" style="background: #f1f1f1;">
        <div class="col-lg-12">
            <div class="title">
                <h2 class="title" >Thống kê cửa hàng</h2>
            </div>
            <div class="wrap-header">
                <div class="col-xs-12">
                    <div class="left">
                        <div class="title-left">Sản phẩm bán chạy</div>
                        <hr style="margin-top: 0">
                        <div class="content-product">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="color: red">
                                        <th>STT</th>
                                        <th>Mã sp</th>
                                        <th>Tên sp</th>
                                     <!--    <th>Loại sp</th>
                                        <th>Hiệu sp</th> -->
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Lượt xem</th>
                                        <th>Số đơn hàng đặt</th>
                                        <!-- <th>Ngày thêm</th> -->
                                        <th>Trạng thái</th>
                                        <th>Xem</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $query = "SELECT tb_order.id_product, tb_product.code_product, tb_product.name_product,tb_product.price_product,tb_product.saleprice_product, tb_product.image,tb_product.view_product,tb_product.size_product, tb_product.status_product, SUM(tb_order.quantity_product) quantity_product_order, COUNT(tb_order.id_order) total_order FROM tb_order, tb_product WHERE tb_order.id_product = tb_product.id_product GROUP BY tb_order.id_product ORDER BY quantity_product_order DESC LIMIT 10";
                                    $result = mysqli_query($dbc, $query);
                                    $stt = 0;
                                    while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                                        $stt++;
                                        /* Tính số lượng */
                                        $sl = 0;
                                        foreach (unserialize($product['size_product']) as $key => $value) {
                                           $sl += $value;
                                        }
                                    ?>
                                    
                                    <tr>
                                        <th style="vertical-align: middle;"><?php echo $stt; ?></th>
                                        <td style="vertical-align: middle;"><?php echo $product['code_product']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $product['name_product']; ?></td>
                                        <td style="vertical-align: middle;"><?php

                                        $img_product = explode(" ",  $product['image']);
                                        $stt = 0;
                                        foreach ($img_product as $value) {
                                            if(isset($value) && !empty($value)){
                                              ?>

                                              <img  style="width: 50px;" src="../<?php echo $value; ?>"  style="margin: 0 auto">

                                              <?php
                                              $stt++;
                                              break;
                                          }
                                      }
                                      ?></td>
                                      <td style="vertical-align: middle;"><?php echo number_format($product['price_product']) ; ?><br/><strong> VND</strong></td>
                                      <td style="vertical-align: middle;"><?php echo number_format($product['saleprice_product']) ; ?><br/><strong> VND</strong></td>
                                      <td style="vertical-align: middle;" class="text-center"><?php echo $sl; ?></td>
                                      <td style="vertical-align: middle;" class="text-center"><?php echo number_format($product['view_product']) ; ?></td>
                                      <td style="vertical-align: middle;" class="text-center"><?php echo number_format($product['total_order']) ; ?></td>
                                      <td style="vertical-align: middle;"><?php
                                      $status = $product['status_product'];
                                      if ($status==1)
                                      {
                                        echo "Còn hàng";
                                    }
                                    else
                                    {
                                        echo "Hết hàng";
                                    }
                                    ?></td>
                                    <td style="vertical-align: middle;" align="center"><a class="link_a" href="edit_product.php?id=<?php echo $product['id_product']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>   
            </div>
            <div class="col-xs-5">
               <!--  <div class="right">
                    a
                </div>  -->
            </div>
        </div>
        <div class="statistic-chart">
            <div class="menu">
                <ul>
                    <li  style="color: blue;font-size: 18px;font-weight: 700"  class="active dh"><i style="margin-right: 5px;" class="fa fa-bar-chart" aria-hidden="true"></i> Doanh thu</li>
                    <li  style="color: blue;font-size: 18px;font-weight: 700"  class="kho"><i style="margin-right: 5px;" class="glyphicon glyphicon-object-align-bottom" aria-hidden="true"></i>Kho</li>
                </ul>
                <div class="sub-menu">
                    <ul>
                        <li class="active year">Năm</li>
                        <li class="month-ago">Tháng trước</li>
                        <li class="this-month">Tháng này</li>
                        <li class="day">7 ngày qua</li>
                    </ul>
                    <canvas id="buyers" width="900" height="500" ></canvas>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>
</div>



<?PHP 
include('includes/footer.php');
?>
<script type="text/javascript" src="js/thongke.js"></script>