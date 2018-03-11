<?PHP include('includes/header.php'); ?>
<?php include('inc/myconnect.php'); ?>
<?php include('inc/function.php'); ?>

<div class="row district-category">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style=" color: red">Danh sách Quận, huyện
            <a href="add_district.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
                class="fa fa-fw fa-plus-square-o"
                style="font-size: 25px; color:#1b926c; float: right; padding-left: 10px; padding-right: 75px;"></i></a>
            </h2>
            <div style="">
                 <form class="form-search text-right" method="GET" action="">
                    <input type="text" name="text_search" class="form-control text_search" placeholder="Search" style="display: inline-block;width: auto">
                    <input type="submit" name="btn-search" class="btn btn-primary btn-search" value="Tìm kiếm">
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã quận, huyện</th>
                        <th>Tên quận, huyện</th>
                        <th>Thuộc thành phố</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                     <?php 
                        $limit = 30;

                        if (isset($_GET['btn-search']) && isset($_GET['text_search'])) {
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            } else {
                                $per_page = 1;

                            }
                            $text_search = $_GET['text_search'];
                            district_search($text_search,$per_page, $limit);
                        } else {
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            // patination_product($start, $limit);
                            } else {
                                $per_page = 1;

                            }
                            list_district($per_page, $limit);
                        }
                        ?>
              </tbody>
          </table>
         <nav aria-label="page navigation">
                    <ul class="pagination">
                        <?php
                        if( isset($_GET['text_search']) && isset($_GET['btn-search']) ){
                            $query = "SELECT count(id_district) FROM tb_district WHERE name_district LIKE ". "'%".$text_search."%'";
                            $result = mysqli_query($dbc, $query);
                            list($record) = mysqli_fetch_array($result, MYSQLI_NUM);
                            $total_page = ceil( $record/$limit );
                            if( isset($_GET['p']) ) {
                                $per_page = $_GET['p'];
                            // patination_district($start, $limit);
                            } else {
                                $per_page = 1;

                            }

                            if( $per_page != 1 ) {
                            // echo   ;
                                echo    '<li>
                                <a href="list_district.php?p='. number_format($per_page- 1)  .'" aria-label="previous" >
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>';
                            }
                            for ($i=1; $i <= $total_page; $i++) { 
                                echo '<li class="'. "active".'" ><a href="list_district.php?p='. $i .'">' . $i. '</a></li>';
                            }
                            if( $per_page != $total_page ) {
                                echo '<li>
                                <a href="list_district.php?p='. number_format($per_page + 1) .'" aria-label="next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>';
                            }

                        } else { // Ngược lại
                         $query = "SELECT count(id_district) FROM tb_district";
                         $result = mysqli_query($dbc, $query);
                         list($record) = mysqli_fetch_array($result, MYSQLI_NUM);
                         $total_page = ceil( $record/$limit );
                         if( isset($_GET['p']) ) {
                            $per_page = $_GET['p'];
                            // patination_district($start, $limit);
                        } else {
                            $per_page = 1;

                        }

                        if( $per_page != 1 ) {
                            echo    '<li>
                            <a href="list_district.php?p='. number_format($per_page- 1)  .'" aria-label="previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>';
                        }
                        for ($i=1; $i <= $total_page; $i++) { 
                            // thêm class active
                             $active= "";
                            if( $i == $per_page ) $active = "active"; 
                            echo '<li class="'. $active .'" ><a href="list_district.php?p='. $i .'">' . $i. '</a></li>';
                        }
                        if( $per_page != $total_page ) {
                            echo '<li>
                            <a href="list_district.php?p='. number_format($per_page + 1) .'" aria-label="next">
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

  <?PHP include('includes/footer.php'); ?>
<script type="text/javascript">
    $('.tinh-thanh .collapse').addClass('in');
    $('.tinh-thanh .quanhuyen').addClass('active-hover');
</script>