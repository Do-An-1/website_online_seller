<?PHP include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="color: red">Danh sách tài khoản
                <a href="add_user.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
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
                    <th>Tài khoản</th>
                    <!--<th>Mật khẩu</th>-->
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>CMND</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>

                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = 'SELECT* FROM tb_user ORDER BY id_user';
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);
                while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $user['account_user']; ?></td>
                        <!--<td><?php echo $user['pass_user']; ?></td>-->
                        <td><?php echo $user['name_user']; ?></td>
                        <td><?php echo date("d/m/Y",strtotime($user['birthday_user'])); ?></td>
                        <td><?php echo $user['cmnd_user']; ?></td>
                        <td><?php echo $user['address_user']; ?></td>
                        <td><?php echo $user['phonenumber_user']; ?></td>
                        <td><?php echo $user['email_user']; ?></td>
                        <td><?php if ($user['status_user'] == 1) echo "Hoạt động"; else echo "Không hoạt động"; ?></td>
                        <td align="center"><a href="edit_user.php?id=<?php echo $user['id_user']; ?>"><i
                                        class="fa fa-fw fa-pencil"
                                        style="font-size: 20px; color:#1b926c;"></i></a></td>
                        <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                              href="delete_user.php?id=<?php echo $user['id_user']; ?>"><i
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