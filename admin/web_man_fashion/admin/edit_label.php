<?PHP include('includes/header.php'); ?>
    <style>
        .results {

            color: #009966;
        }

        .results1 {
            color: #FF0000;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <?php
            include('../inc/myconnect.php');
            include('../inc/function.php');

            //
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
                $id = $_GET['id'];


            } else {
                header("Location: list_label.php");
                exit();
            }

            //bat dau submit
            if (isset($_POST['submit'])) {
                $errors = array();
                if (empty($_POST['code_label'])) {
                    $errors[] = 'code_label';
                } else {
                    $code = $_POST['code_label'];
                }

                if (empty($_POST['name_label'])) {
                    $errors[] = 'name_label';
                } else {
                    $name = $_POST['name_label'];
                }


                if (empty($errors)) {
                    $query_up = "UPDATE tb_label SET code_label='$code', name_label='$name' WHERE id_label='$id'";
                    $result_up = mysqli_query($dbc, $query_up);
                    kt_query($query_up, $result_up);

                    if ($result_up == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_label'] = "";
                        $_POST['name_label'] = "";
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }
            //ket thuc submit
            $query = "SELECT * FROM tb_label WHERE id_label={$id}";
            $result = mysqli_query($dbc, $query);
            $dong = mysqli_fetch_array($result, MYSQLI_ASSOC);
            kt_query($query, $result);
            //kiem tra id có tồn tại không
            if (mysqli_num_rows($result)) {

            } else {
                $message = "<p class='results1'>ID không tồn tại</p>";
            }
            ?>
            <form name="frmadd-video" method="post">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

                <h3 style="color: #FF0000">Chỉnh sửa - hiệu sản phẩm "<?php echo $dong['name_label']; ?>"</h3>
                <div class="form-group">
                    <label>Mã loại sản phẩm</label>
                    <input type="text" name="code_label" value="<?php if (isset($_POST['code_label'])) {
                        echo $_POST['code_label'];
                    }
                    echo $dong['code_label']; ?>" class="form-control" placeholder='Mã hiệu sản phẩm'/>
                </div>

                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name_label" value="<?php if (isset($_POST['name_label'])) {
                        echo $_POST['name_label'];
                    }
                    echo $dong['name_label']; ?>" class="form-control" placeholder='Tên hiệu sản phẩm'/>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>