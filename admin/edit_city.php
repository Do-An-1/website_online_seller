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
            include('inc/myconnect.php');
            include('inc/function.php');

            //
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
                $id = $_GET['id'];
            } else {
                header("Location: list_city.php");
                exit();
            }

            //bat dau submit
            if (isset($_POST['submit'])) {
                $errors = array();
                if (empty($_POST['code_city'])) {
                    $errors[] = 'code_city';
                } else {
                    $code = $_POST['code_city'];
                }

                if (empty($_POST['name_city'])) {
                    $errors[] = 'name_city';
                } else {
                    $name = $_POST['name_city'];
                }


                if (empty($errors)) {
                    $query_in = "UPDATE tb_city SET code_city='$code', name_city='$name' where id_city='$id'";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_city'] = "";
                        $_POST['name_city'] = "";
                        unset($_POST['code_city']);
                        unset($_POST['name_city']);
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }

            //ket thuc submit
            $query = "SELECT * FROM tb_city WHERE id_city={$id}";
            $result = mysqli_query($dbc, $query);
            $dong = mysqli_fetch_array($result,MYSQLI_ASSOC);
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

                <h2 style=" color: red">Chỉnh sửa - thành phố "<?php echo $dong['name_city'] ?>"</h2>
                <div class="form-group">
                    <label>Mã loại sản phẩm</label>
                    <input type="text" name="code_city" value="<?php echo $dong['code_city']; ?>" class="form-control" placeholder='Mã thành phố'/>
                </div>

                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name_city" value="<?php echo $dong['name_city']; ?>" class="form-control" id="name_category" placeholder='Tên thành phố'/>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>
<script type="text/javascript">
    $('.tinh-thanh .collapse').addClass('in');
    $('.tinh-thanh .thanhpho').css({'background-color': '#e1e1e1'});
</script>