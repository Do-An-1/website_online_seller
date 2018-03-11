<?php include('includes/header.php'); ?>
<?php include('inc/myconnect.php'); ?>
<?php include('inc/function.php'); ?>

<div class="list-product">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="color: red">Tất cả Sản Phẩm
                <a href="add_product.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
                    class="fa fa-fw fa-plus-square-o"
                    style="font-size: 25px; color:#1b926c; float: right; padding-left: 10px; padding-right: 75px;"></i></a>
                </h2>
                <form class="form-search" method="get" action="">
                    <input type="text" name="text_search" class="form-control text_search" placeholder="search">
                    <input type="submit" name="btn-search" class="btn btn-primary btn-search" value="Tìm kiếm">
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã sp</th>
                            <th>Tên sp</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Loại sp</th>
                            <th>Hiệu sp</th>
                            <th>Hình ảnh</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th style="max-width: 100px">Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Ngày thêm</th>
                            <th>Trạng thái</th>

                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <body class="wrap-list-product">
                        <?php 
                        $limit = 10;
                        if (isset($_GET['btn-search']) && isset($_GET['text_search'])) {
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            // patination_product($start, $limit);
                            } else {
                                $per_page = 1;

                            }
                            $text_search = $_GET['text_search'];
                            product_search($text_search, $per_page, $limit);
                        } else {
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            // patination_product($start, $limit);
                            } else {
                                $per_page = 1;

                            }
                            list_product($per_page, $limit);
                        }
                        ?>
                    </body>
                </table>
                <nav aria-label="page navigation">
                    <ul class="pagination">
                        <?php
                        if( isset($_GET['text_search']) && isset($_GET['btn-search']) ){
                            $query = "SELECT count(id_product) FROM tb_product WHERE name_product LIKE ". "'%".$text_search."%'";
                            $result = mysqli_query($dbc, $query);
                            list($record) = mysqli_fetch_array($result, MYSQLI_NUM);
                            $total_page = ceil( $record/$limit );
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            // patination_product($start, $limit);
                            } else {
                                $per_page = 1;

                            }

                            if( $per_page != 1 ) {
                            // echo   ;
                                echo    '<li>
                                <a href="list_product.php?p='. number_format($per_page- 1)  .'" aria-label="previous" >
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>';
                            }
                            for ($i=1; $i <= $total_page; $i++) { 
                                echo '<li class="'. "active".'" ><a href="list_product.php?p='. $i .'">' . $i. '</a></li>';
                            }
                            if( $per_page != $total_page ) {
                                echo '<li>
                                <a href="list_product.php?p='. number_format($per_page + 1) .'" aria-label="next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>';
                            }

                        } else { // Ngược lại
                         $query = "SELECT count(id_product) FROM tb_product";
                         $result = mysqli_query($dbc, $query);
                         list($record) = mysqli_fetch_array($result, MYSQLI_NUM);
                         $total_page = ceil( $record/$limit );
                         if( isset($_GET['p']) ) {
                            $per_page = $_GET['p'];
                            // patination_product($start, $limit);
                        } else {
                            $per_page = 1;

                        }

                        if( $per_page != 1 ) {
                            // echo   ;
                            echo    '<li>
                            <a href="list_product.php?p='. number_format($per_page- 1)  .'" aria-label="previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>';
                        }
                        for ($i=1; $i <= $total_page; $i++) { 
                            // thêm class active
                             $active= "";
                            if( $i == $per_page ) $active = "active"; 
                            echo '<li class="'. $active .'" ><a href="list_product.php?p='. $i .'">' . $i. '</a></li>';
                        }
                        if( $per_page != $total_page ) {
                            echo '<li>
                            <a href="list_product.php?p='. number_format($per_page + 1) .'" aria-label="next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>';
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script type="text/javascript">
    $('.danh-muc .collapse').addClass('in');
    $('.danh-muc .sanpham').css({'background-color': '#e1e1e1'});
</script>