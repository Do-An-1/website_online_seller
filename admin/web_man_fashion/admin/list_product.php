<?PHP include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="color: red">Sản phẩm
                <a href="add_product.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
                            class="fa fa-fw fa-plus-square-o"
                            style="font-size: 25px; color:#1b926c; float: right; padding-left: 10px; padding-right: 75px;"></i></a>
            </h2>
            <div style="float: right">
                <input style="margin-left: 300px;" type="search" name="search" value="" placeholder=" Search">
                <input type="submit" name="submit" value="Tìm">
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Size</th>
                    <th>Loại SP</th>
                    <th>Hiệu SP</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Giá bán</th>
                    <th>Mô tả</th>
                    <th>Lượt xem</th>
                    <th>Ngày thêm</th>
                    <th>Trạng thái</th>

                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <body>
                <?php
                $query = 'SELECT * FROM tb_product ORDER BY id_product DESC';
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);
                while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                    <tr>
                    <td><?php echo $product['code_product']; ?></td>
                        <td><?php echo $product['name_product']; ?></td>
                        <td><?php echo $product['size_product']; ?></td>
                        <td><?php echo $product['id_category']; ?></td>
                        <td><?php echo $product['id_label']; ?></td>
                        <td><?php

                            $img_product = explode(" ",  $product['image']);
                            $stt = 0;
                            foreach ($img_product as $value) {
                                if(isset($value) && !empty($value)){
                                    ?>

                                        <img  style="height: 100px;width: 500px;margin-bottom: 8px" src="<?php echo '../'.$value; ?>" class="img-responsive" style="margin: 0 auto">

                                    <?php
                                    $stt++;
                                }
                            }
                            ?></td>
                        <td><?php echo number_format($product['price_product']) ; ?><br/><strong> VND</strong></td>
                        <td><?php echo number_format($product['saleprice_product']) ; ?><br/><strong> VND</strong></td>
                        <td><?php echo $product['describe_product']; ?></td>
                        <td><?php echo $product['view_product']; ?></td>
                        <td><?php echo date("d/m/Y",strtotime($product['date_product'])); ?></td>
                        <td><?php
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

                        <td align="center"><a href="edit_product.php?id=<?php echo $product['id_product']; ?>"><i
                                        class="fa fa-fw fa-pencil"
                                        style="font-size: 20px; color:#1b926c;"></i></a></td>
                        <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                              href="delete_product.php?id=<?php echo $product['id_product']; ?>"><i
                                        class="fa fa-fw fa-trash"
                                        style="font-size: 20px; color:rgba(26,27,23,0.87);"></i></a></td>
                    </tr>

                    <?php
                }
                ?>

                </body>
            </table>

        </div>
    </div>

<?PHP include('includes/footer.php'); ?>