<?php include('inc/myconnect.php'); ?>
<style>
  .thongbao{
    background: #d54e21;
    width: 20px;
    height: 20px;
    text-align: center;
    color: white;
    display: inline-block;
    border-radius: 50%;
    font-size: 11px;
    line-height: 20px;
  }
</style>
<div class="collapse navbar-collapse navbar-ex1-collapse wrap-sidebar">
    <ul class="nav navbar-nav side-nav">
        <li style="background:#1b926c;color:#fff;">
          <a href="index.php" style="color:#fff;"><img src="../image/logo-top.png" width="100%"></a>
        </li>
        <li style="color:rgba(26,27,23,0.87);" class="li-first">
            <a href="index.php"><i class="fa fa-fw fa-user"></i> 
               <?php
               $uid = $_SESSION['uid'];
               $query_name = "SELECT name_user FROM tb_user where id_user={$uid}";
               $result_name = mysqli_query($dbc, $query_name);
               list($name_user) = mysqli_fetch_array($result_name, MYSQLI_NUM);
               echo $name_user;
               ?>
               <div style=" padding-left: 15px;font-size: 12px">
                 <i class="fa fa-fw fa-circle" style="color: #5cb85c; font-size: 10px;"></i> online
             </div>
         </a>
     </li>

     <li style="" class="li-first">
        <a href="index.php" style="color:#fff;"><i class="fa fa-fw fa-home"></i> Trang chủ</a>
    </li>

    <li class="li-first danh-muc">
        <a href="javascript:;" data-toggle="collapse" data-target="#menu"><i class="fa fa-fw fa-tags icon"></i>
            <span class="text">Danh mục</span> <i class="fa fa-fw fa-angle-double-down"></i>
        </a>
        <ul id="menu" class="collapse">
            <li class="loaisanpham">
                <a href="list_category.php"><i class="fa fa-fw fa-list"></i> Loại sản phẩm</a>
            </li>
            <li class="hieusanpham">
                <a href="list_label.php"><i class="fa fa-fw fa-list"></i> Hiệu sản phẩm</a>
            </li>
            <li class="sanpham">
                <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Sản phẩm</a>
            </li>
        </ul>
    </li>
    

          <!-- dem so don hang chua duyet -->
          <?php
             $query_count_order =  "SELECT count(code_order) sodon_dathang FROM tb_order WHERE status_order = '0' && status_order != '1'    GROUP BY code_order ORDER BY order_day DESC";
             $result_count_order = mysqli_query($dbc,$query_count_order);
              $sodon_dathang =  mysqli_num_rows($result_count_order);
           ?>
           <!-- dem so hoa don chua duyet -->
           <?php 
              $query_count_bill = "SELECT code_bill, name_customer, phone_customer,address_customer, order_day, id_product, tb_bill.status_bill FROM tb_order,tb_bill WHERE tb_bill.id_order = tb_order.id_order && tb_bill.status_bill = '0'  GROUP BY code_bill ORDER BY status_bill";
              $result_count_bill = mysqli_query($dbc,$query_count_bill);
              $sodon_hoadon =  mysqli_num_rows($result_count_bill);


           ?>
    <li class="li-first kinh-doanh">
        <a href="javascript:;" data-toggle="collapse" data-target="#sales"><i class="fa fa-fw fa-line-chart"></i>
            Kinh doanh <i class="fa fa-fw fa-angle-double-down"></i>
            <?php if ( !empty($sodon_dathang) && $sodon_dathang > 0 ){
                ?>
                <span class="thongbao"><?php echo $sodon_dathang+$sodon_hoadon;  ?></span>
                <?php
              }
            ?>
        </a>
        <ul id="sales" class="collapse">
          
           <li class="themdonhang">
               <a href="add_order.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
           </li>
            <li class="dathang">
                <a href="list_order.php"><i class="fa fa-fw fa-list"></i> Đặt hàng
                <?php if ( !empty($sodon_dathang) && $sodon_dathang > 0 ){
                    ?>
                    <span class="thongbao"><?php echo $sodon_dathang;  ?></span>
                    <?php
                  }
                ?>
                </a>
            </li>
            <li class="hoadon">
                <a href="list_bill.php"><i class="fa fa-fw fa-list"></i> Hóa đơn
                  <?php if ( !empty($sodon_hoadon) && $sodon_hoadon > 0 ){
                    ?>
                    <span class="thongbao"><?php echo $sodon_hoadon;  ?></span>
                    <?php
                  }
                ?>
                </a>
            </li>
         <!--    <li class="giaohang">
                <a href="list_delivery.php"><i class="fa fa-fw fa-list"></i> Giao hàng</a>
            </li> -->
        </ul>
    </li>
      

           <!-- dem so ship chua duyet -->
          <?php
            $query_count_ship = "SELECT count(code_ship)  FROM tb_order,tb_bill,tb_ship WHERE tb_order.id_order = tb_bill.id_order && tb_bill.id_bill = tb_ship.id_bill &&  status_ship = '0'  GROUP BY code_ship";
             $result_count_ship = mysqli_query($dbc,$query_count_ship);
              $sodon_ship =  mysqli_num_rows($result_count_ship);
           ?>
    <li class="li-first giao-hang">
       <a href="javascript:;" data-toggle="collapse" data-target="#demo_ship"><i class="fa fa-fw fa-truck"></i> Giao hàng
        <?php if ( !empty($sodon_ship) && $sodon_ship > 0 ){
                    ?>
                    <span class="thongbao"><?php echo $sodon_ship;  ?></span>
                    <?php
                  }
                ?>
          <i class="fa fa-fw fa-angle-double-down"></i>
      </a>
      <ul id="demo_ship" class="collapse">
       <li class="giaohang">
           <a href="list_delivery.php"><i class="fa fa-fw fa-list"></i> Danh sách
            <?php if ( !empty($sodon_ship) && $sodon_ship > 0 ){
                    ?>
                    <span class="thongbao"><?php echo $sodon_ship;  ?></span>
                    <?php
                  }
                ?>
           </a>

       </li>
    </ul>
  </li>

<li class="li-first quang-cao">
   <a href="javascript:;" data-toggle="collapse" data-target="#demo_qc"><i class="fa fa-fw fa-upload"></i>
    Quảng cáo <i class="fa fa-fw fa-angle-double-down"></i>
  </a>
  <ul id="demo_qc" class="collapse">
    <li class="slider">
       <a href="addslider.php"><i class="fa fa-fw fa-sliders"></i>  Slider</a>
    </li>
    <li class="hinhanh">
       <a href="add_image.php"><i class="fa fa-fw fa-camera-retro"></i>  Hình ảnh</a>
    </li>
    <li class="gioithieu">
       <a href="gioi_thieu.php"><i class="fa fa-fw fa-handshake-o"></i>  Giới thiệu</a>
    </li>
  </ul>
</li>

<li class="li-first tinh-thanh">
    <a href="javascript:;" data-toggle="collapse" data-target="#tinhthanh"><i class="fa fa-fort-awesome" aria-hidden="true"></i>
      Tỉnh thành<i class="fa fa-fw fa-angle-double-down"></i>
    </a>
    <ul id="tinhthanh" class="collapse">
        <li class="thanhpho">
            <a href="list_city.php"><i class="fa fa-font-awesome" aria-hidden="true"></i> Thành phố</a>
        </li>
        <li class="quanhuyen">
            <a href="list_district.php"><i class="fa fa-rebel" aria-hidden="true"></i> Quận huyện</a>
        </li>
       
    </ul>
</li>
<li class="li-first lien-he">
    <a href="javascript:;" data-toggle="collapse" data-target="#customer"><i class="fa fa-fw fa-male"></i> Liên hệ
        <i class="fa fa-fw fa-angle-double-down"></i></a>
        <ul id="customer" class="collapse">
            <li class="thongtin">
                <a href="list_contact.php"><i class="fa fa-fw fa-info-circle"></i> Thông tin</a>
            </li>
<!--             <li>
                <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Tích lũy</a>
            </li> -->
        </ul>
    </li>
    <?php 
    if ( $_SESSION['type_user'] == 0 ) {

     ?>
     <li class="tai-khoan">
        <a href="javascript:;" data-toggle="collapse" data-target="#demo_user"><i class="fa fa-fw fa-users"></i> Tài khoản
            <i class="fa fa-fw fa-angle-double-down"></i>
        </a>
        <ul id="demo_user" class="collapse">
            <li class="nguoidung">
                <a href="list_user.php"><i class="fa fa-fw fa-list"></i> Danh sách</a>
            </li>
        </ul>
    </li>
    <?php
}
?>

<?php 
if ( $_SESSION['type_user'] == 0 ) {

 ?>
 <li class="li-first thong-tin-trang">
    <a href="javascript:;" data-toggle="collapse" data-target="#demo_information"><i class="fa fa-fw fa-star"></i> Thông tin website
        <i class="fa fa-fw fa-angle-double-down"></i>
    </a>
    <ul id="demo_information" class="collapse">
        <li class="thongtintrang">
            <a href="modify.php"><i class="fa fa-fw fa-pencil"></i> Chỉnh sửa</a>
        </li>
    </ul>
</li>
<?php
}
?>
</ul>

</div>
<!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
