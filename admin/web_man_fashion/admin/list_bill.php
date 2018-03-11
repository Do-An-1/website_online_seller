<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/19/2017
 * Time: 8:45 AM
 */
?>


<?Php
include('includes/header.php');
include('../inc/myconnect.php');
include('../inc/function.php');
?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style=" color: red">Danh sách đơn hàng
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
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tên sản phẩm</th>

                    <th>Sửa</th>
                    <th>Xóa</th>
                    <th>In</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT * FROM tb_product, tb_customer ORDER BY id_product DESC';
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);
                while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $product['name_customer'];?></td>
                        <td><?php echo $product['phonenumber_customer'];?></td>
                        <td><?php echo $product['address_customer'];?></td>
                        <td><?php echo $product['email_customer'];?></td>
                        <td><?php echo $product['name_product']; ?></td>

                        <td align="center"><a href="edit_product.php?id=<?php echo $product['id_product']; ?>"><i
                                        class="fa fa-fw fa-pencil"
                                        style="font-size: 20px; color:#1b926c;"></i> </a></td>
                        <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                              href="delete_product.php?id=<?php echo $product['id_product']; ?>"><i
                                        class="fa fa-fw fa-trash"
                                        style="font-size: 20px; color:rgba(26,27,23,0.87);"></i></a></td>
                        <td align="center"><a href="bill.php?id=<?php echo $product['id_product']; ?>"> <i
                                        class="fa fa-fw fa-print" style="font-size: 20px;"></i></a></td>
                    </tr>

                    <?php
                }
                ?>

                </tbody>
            </table>

        </div>
    </div>

<?PHP include('includes/footer.php'); ?>