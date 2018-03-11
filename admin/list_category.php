<?PHP include('includes/header.php'); ?>
<?php include('inc/myconnect.php'); ?>
<?php include('inc/function.php'); ?>
<div class="row product-category">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style=" color: red">Loại sản phẩm
            <a href="add_category.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
                class="fa fa-fw fa-plus-square-o"
                style="font-size: 25px; color:#1b926c; float: right; padding-left: 10px; padding-right: 75px;"></i></a>
            </h2>
            <div style="">
                <form class="form-search" method="GET" action="">
                    <input type="text" name="text_search" class="form-control text_search" placeholder="Search">
                    <input type="submit" name="btn-search" class="btn btn-primary btn-search" value="Tìm kiếm">
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã loại sản phẩm</th>
                        <th>Tên loại sản phẩm</th>
                        <th>Thuộc loại</th>
                    <?php 
                    if ( $_SESSION['type_user'] == 0 ) {
                     ?>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    <?php 
                        }
                    ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($_GET['btn-search']) && isset($_GET['text_search'])) {
                        $text_search = $_GET['text_search'];
                        category_search($text_search);
                    } else {
                        list_category();
                    }
                    ?>
                   
              </tbody>
          </table>

      </div>
  </div>

  <?PHP include('includes/footer.php'); ?>
  <script type="text/javascript">
    $('.danh-muc .collapse').addClass('in');
    $('.danh-muc .loaisanpham').css({'background-color': '#e1e1e1'});
</script>