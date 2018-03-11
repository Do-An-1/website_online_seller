<?PHP include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="color: red">Hiệu sản phẩm
                <a href="add_label.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
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
                    <th>Mã hiệu sản phẩm</th>
                    <th>Tên hiệu sản phẩm</th>

                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <body>
                <?php
                $query = 'SELECT * FROM tb_label ORDER BY id_label DESC';
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);
                while ($label = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $label['code_label']; ?></td>
                        <td><?php echo $label['name_label']; ?></td>

                        <td align="center"><a href="edit_label.php?id=<?php echo $label['id_label']; ?>"><i
                                        class="fa fa-fw fa-pencil"
                                        style="font-size: 20px; color:#1b926c;"></i></a></td>
                        <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                              href="delete_label.php?id=<?php echo $label['id_label']; ?>"><i
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