<?PHP
include('includes/header.php');
?>

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
                    $query = "SELECT code_label FROM tb_label WHERE code_label='{$code}'";
                    $result = mysqli_query($dbc, $query);
                    kt_query($query, $result);

                    if (mysqli_num_rows($result) == 1) {
                        $message = "<p class='results1'>Hiệu sản phẩm này đã tồn tại</p>";
                    } else {
                        $query_in = "INSERT INTO tb_label(code_label,name_label)
									VALUES('{$code}','{$name}')";
                        $result_in = mysqli_query($dbc, $query_in);
                        kt_query($query_in, $result_in);

                        if ($result_in == 1) {
                            echo "<p class='results'>Thêm mới thành công</p>";
                            $_POST['code_category'] = "";
                            $_POST['name_category'] = "";
                            $code = null;
                            $name = null;
                        } else {
                            echo "<p class='results1'>Thêm mới không thành công</p>";
                        }
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }
            ?>
            <form name="frmadd-video" method="post">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <h2 style="color:red;">Thêm mới hiệu sản phẩm</h2>
                <div class="form-group">

                    <label>Mã hiệu sản phẩm</label>
                    <input type="text" name="code_label" value="<?php if (isset($_POST['code_label'])) {
                        echo $_POST['code_label'];
                    } ?>" class="form-control" placeholder='Nhập mã hiệu sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('code_label', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập mã hiệu sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Tên hiệu sản phẩm</label>
                    <input type="text" name="name_label" value="<?php if (isset($_POST['name_label'])) {
                        echo $_POST['name_label'];
                    } ?>" class="form-control" placeholder='Nhập tên hiệu sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('name_label', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập tên hiệu sản phẩm</p>";
                    }

                    ?>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>