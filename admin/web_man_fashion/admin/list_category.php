<?PHP include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style=" color: red">Loại sản phẩm
            <a href="add_category.php" style="float: right; color:#1b926c; font-size: 20px;">Thêm<i
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
                <th>Mã loại sản phẩm</th>
                <th>Tên loại sản phẩm</th>
                <th>Thuộc loại</th>

                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM tb_category ORDER BY id_category";
            $result = mysqli_query($dbc, $query);
            kt_query($query, $result);
            while ($category = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $category['code_category']; ?></td>
                <td><?php echo $category['name_category']; ?></td>
                <td><?php
                    $parent_id = $category['parent_id'];
                    if($parent_id ==0){
                        echo "Danh mục gốc";
                    }else{
                        $query_parent_category = "SELECT id_category,name_category,parent_id FROM tb_category WHERE  id_category={$parent_id}";
                        $result_parent_category= mysqli_query($dbc, $query_parent_category);
                        kt_query($query_parent_category, $result_parent_category);
                        list($id_category,$name_category,$parent_id)=mysqli_fetch_array($result_parent_category,MYSQLI_NUM);
                        echo $name_category;
                    }
                    ?>
                </td>


                <td align="center"><a href="edit_category.php?id=<?php echo $category['id_category']; ?>"><i
                                class="fa fa-fw fa-pencil"
                                style="font-size: 20px; color:#1b926c;"></i> </a></td>
                <td align="center"><a onClick="return confirm('Bạn thật sự muốn xóa không ?');"
                                      href="delete_category.php?id=<?php echo $category['id_category']; ?>"><i
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