<?php include('../inc/myconnect.php'); ?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li style="color:rgba(26,27,23,0.87);">
            <a href="index.php"><i class="fa fa-fw fa-user"></i> 
			<?php
                $uid = $_SESSION['uid'];
                $query_name = "SELECT name_user FROM tb_user where id_user={$uid}";
                $result_name = mysqli_query($dbc, $query_name);
                list($name_user) = mysqli_fetch_array($result_name, MYSQLI_NUM);
                echo $name_user;
             ?>
                <div style=" padding-left: 15px;font-size: 12px"><i class="fa fa-fw fa-circle" style="color: #5cb85c; font-size: 10px;"></i> online
                </div>
            </a>
        </li>

        <li style="background:#1b926c;color:#fff;">
            <a href="index.php" style="color:#fff;"><i class="fa fa-fw fa-home"></i> Trang chủ</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#catalog"><i class="fa fa-fw fa-tags"></i>
                Danh mục <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="catalog" class="collapse">
                <li>
                    <a href="list_category.php"><i class="fa fa-fw fa-list"></i> Loại sản phẩm</a>
                </li>
                <li>
                    <a href="list_label.php"><i class="fa fa-fw fa-list"></i> Hiệu sản phẩm</a>
                </li>
                <li>
                    <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Sản phẩm</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#sales"><i class="fa fa-fw fa-line-chart"></i>
                Kinh doanh <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="sales" class="collapse">
                <li>
                    <a href="list_order.php"><i class="fa fa-fw fa-plus"></i> Đặt hàng</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-shopping-cart"></i> Bán hàng</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gift"></i> Quà tặng</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#customer"><i class="fa fa-fw fa-male"></i> Khách hàng
                <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="customer" class="collapse">
                <li>
                    <a href="list_customer.php"><i class="fa fa-fw fa-info-circle"></i> Thông tin</a>
                </li>
                <li>
                    <a href="list_product.php"><i class="fa fa-fw fa-list"></i> Tích lũy điểm</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_qc"><i class="fa fa-fw fa-upload"></i>
                Quảng cáo <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="demo_qc" class="collapse">
                <li>
                    <a href="addslider.php"><i class="fa fa-fw fa-sliders"></i>  Slider</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-video-camera"></i>  Video</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-bookmark-o"></i>  Banner</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_bill"><i class="fa fa-fw fa-dollar"></i> Hóa đơn
                <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="demo_bill" class="collapse">
                <li>
                    <a href="list_order.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
                </li>
                <li>
                    <a href="list_bill.php"><i class="fa fa-fw fa-list"></i> Xem hóa đơn</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_ship"><i class="fa fa-fw fa-truck"></i> Giao hàng
                <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="demo_ship" class="collapse">
                <li>
                    <a href="add_shiper.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
                </li>
                <li>
                    <a href="search.php"><i class="fa fa-fw fa-list"></i> Danh sách</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_user"><i class="fa fa-fw fa-users"></i> Tài khoản
                <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="demo_user" class="collapse">
                <li>
                    <a href="add_user.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
                </li>
                <li>
                    <a href="list_user.php"><i class="fa fa-fw fa-list"></i> Danh sách</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo_information"><i class="fa fa-fw fa-star"></i> Thông tin website
                <i class="fa fa-fw fa-angle-double-down"></i></a>
            <ul id="demo_information" class="collapse">
                <li>
                    <a href="modify.php"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
                </li>
                <li>
                    <a href="list_web_infor.php"><i class="fa fa-fw fa-list"></i> Danh sách</a>
                </li>
            </ul>
        </li>

    </ul>

</div>
<!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
			