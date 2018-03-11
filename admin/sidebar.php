<?php include('inc/myconnect.php'); ?>
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
            <li>
                <a href="list_label.php"><i class="fa fa-fw fa-list"></i> Hiệu sản phẩm</a>
            </li>
            <li class="sanpham">
                <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Sản phẩm</a>
            </li>
        </ul>
    </li>

    <li class="li-first">
        <a href="javascript:;" data-toggle="collapse" data-target="#sales"><i class="fa fa-fw fa-line-chart"></i>
            Kinh doanh <i class="fa fa-fw fa-angle-double-down"></i>
        </a>
        <ul id="sales" class="collapse">
            <li>
                <a href="list_order.php"><i class="fa fa-fw fa-list"></i> Đặt hàng</a>
            </li>
            <li>
                <a href="list_bill.php"><i class="fa fa-fw fa-list"></i> Hóa đơn</a>
            </li>
            <li>
                <a href="list_delivery.php"><i class="fa fa-fw fa-list"></i> Giao hàng</a>
            </li>
        </ul>
    </li>

    <li class="li-first">
     <a href="javascript:;" data-toggle="collapse" data-target="#demo_ship"><i class="fa fa-fw fa-truck"></i> Giao hàng
      <i class="fa fa-fw fa-angle-double-down"></i>
  </a>
  <ul id="demo_ship" class="collapse">
      <li>
       <a href="add_order.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
   </li>
   <li>
       <a href="list_delivery.php"><i class="fa fa-fw fa-list"></i> Danh sách</a>
   </li>
</ul>
</li>

<li class="li-first">
 <a href="javascript:;" data-toggle="collapse" data-target="#demo_qc"><i class="fa fa-fw fa-upload"></i>
  Quảng cáo <i class="fa fa-fw fa-angle-double-down"></i>
</a>
<ul id="demo_qc" class="collapse">
  <li>
   <a href="addslider.php"><i class="fa fa-fw fa-sliders"></i>  Slider</a>
</li>
<li>
   <a href="add_image.php"><i class="fa fa-fw fa-camera-retro"></i>  Hình ảnh</a>
</li>
<li>
   <a href="#"><i class="fa fa-fw fa-handshake-o"></i>  Giới thiệu</a>
</li>
</ul>
</li>

<li class="li-first">
    <a href="javascript:;" data-toggle="collapse" data-target="#tinhthanh"><i class="fa fa-fw fa-upload"></i>
      Tỉnh thành<i class="fa fa-fw fa-angle-double-down"></i>
    </a>
    <ul id="tinhthanh" class="collapse">
        <li>
            <a href="list_city.php"><i class="fa fa-fw fa-sliders"></i>Thành phố</a>
        </li>
        <li>
            <a href="list_district.php"><i class="fa fa-fw fa-camera-retro"></i>Quận huyện</a>
        </li>
       
    </ul>
</li>
<li class="li-first">
    <a href="javascript:;" data-toggle="collapse" data-target="#customer"><i class="fa fa-fw fa-male"></i> Liên hệ
        <i class="fa fa-fw fa-angle-double-down"></i></a>
        <ul id="customer" class="collapse">
            <li>
                <a href="list_contact.php"><i class="fa fa-fw fa-info-circle"></i> Thông tin</a>
            </li>
            <li>
                <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Tích lũy</a>
            </li>
        </ul>
    </li>
    <?php 
    if ( $_SESSION['type_user'] == 0 ) {

     ?>
     <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#demo_user"><i class="fa fa-fw fa-users"></i> Tài khoản
            <i class="fa fa-fw fa-angle-double-down"></i>
        </a>
        <ul id="demo_user" class="collapse">
            <li>
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
 <li class="li-first">
    <a href="javascript:;" data-toggle="collapse" data-target="#demo_information"><i class="fa fa-fw fa-star"></i> Thông tin website
        <i class="fa fa-fw fa-angle-double-down"></i>
    </a>
    <ul id="demo_information" class="collapse">
        <li>
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
