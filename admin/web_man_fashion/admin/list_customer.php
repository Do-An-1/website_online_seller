<?php
/**
 * Created by PhpStorm.
 * customer: Administrator
 * Date: 9/19/2017
 * Time: 9:16 AM
 */
?>

<?PHP include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style="color:red;">Danh sách khách hàng
            <a href="add_customer.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
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
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Loại</th>

                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = 'SELECT * FROM tb_customer ORDER BY id_customer DESC';
            $result = mysqli_query($dbc, $query);
            kt_query($query, $result);
            while ($customer = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $customer['name_customer']; ?></td>
                    <td><?php echo $customer['phonenumber_customer']; ?></td>
                    <td><?php echo $customer['email_customer']; ?></td>
                    <td><?php echo $customer['address_customer']; ?></td>
                    <td><?php if ($customer['type_customer'] == 1) echo "Khách hàng thân thiết"; else echo "Khách hàng V.I.P"; ?></td>
                    <td align="center"><a href="edit_customer.php?id=<?php echo $customer['id_customer']; ?>"><i
                                class="fa fa-fw fa-pencil"
                                style="font-size: 20px; color:#1b926c;"></i></a></td>
                    <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                          href="delete_customer.php?id=<?php echo $customer['id_customer']; ?>"><i
                                class="fa fa-fw fa-trash"
                                style="font-size: 20px; color:rgba(26,27,23,0.87);"></i></a></td>
                </tr>

                <?php
            }
            ?>

            </tbody>
        </table>

    </div>
</div>

<?PHP include('includes/footer.php'); ?>
