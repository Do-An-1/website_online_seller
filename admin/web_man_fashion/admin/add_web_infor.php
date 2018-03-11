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
                if (empty($_POST['shop_name'])) {
                    $errors[] = 'shop_name';
                } else {
                    $name = $_POST['shop_name'];
                }

                if (empty($_POST['shop_phone'])) {
                    $errors[] = 'shop_phone';
                } else {
                    $phone = $_POST['shop_phone'];
                }

                if (empty($_POST['shop_address'])) {
                    $errors[] = 'shop_address';
                } else {
                    $address = $_POST['shop_address'];
                }

                if (empty($_POST['shop_link'])) {
                    $errors[] = 'shop_link';
                } else {
                    $link = $_POST['shop_link'];
                }

                if (empty($errors)) {
                    $query = "SELECT name_shop FROM tb_shop WHERE name_shop='{$name}'";
                    $result = mysqli_query($dbc, $query);
                    kt_query($query, $result);

                    if (mysqli_num_rows($result) == 1) {
                        $message = "<p class='results1'>Tên shop này đã tồn tại</p>";
                    } else {
                        $query_in = "INSERT INTO tb_shop(name_shop,phone_shop, address_shop, link_shop)
									VALUES('{$name}','{$phone}','{$address}','{$link}')";
                        $result_in = mysqli_query($dbc, $query_in);
                        kt_query($query_in, $result_in);

                        if ($result_in == 1) {
                            echo "<p class='results'>Thêm mới thành công</p>";
                            $_POST['shop_name'] = "";
                            $_POST['shop_phone'] = "";
                            $_POST['shop_address'] = "";
                            $_POST['shop_link'] = "";
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
                <h2 style="color: red">Thêm mới Thông tin website</h2>
                <div class="form-group">

                    <label>Tên shop</label>
                    <input type="text" name="shop_name" value="<?php if (isset($_POST['shop_name'])) {
                        echo $_POST['shop_name'];
                    } ?>" class="form-control" placeholder='Nhập tên shop'/>
                    <?php
                    if (isset($errors) && in_array('shop_name', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập tên shop</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="shop_phone"
                           value="<?php if (isset($_POST['shop_phone'])) {
                               echo $_POST['shop_phone'];
                           } ?>" class="form-control" placeholder='Nhập số điện thoại'/>
                    <?php
                    if (isset($errors) && in_array('shop_phone', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập số điện thoại</p>";
                    }

                    ?>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="shop_address" value="<?php if (isset($_POST['shop_address'])) {
                        echo $_POST['shop_address'];
                    } ?>" class="form-control" placeholder='Nhập địa chỉ'/>
                    <?php
                    if (isset($errors) && in_array('shop_address', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập địa chỉ</p>";
                    }

                    ?>
                </div>

                <div class="form-group">
                    <label>Link Facebook</label>
                    <input type="text" name="shop_link" value="<?php if (isset($_POST['shop_link'])) {
                        echo $_POST['shop_link'];
                    } ?>" class="form-control" placeholder='Nhập link facebook'/>
                    <?php
                    if (isset($errors) && in_array('shop_link', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập đường dẫn Facebook</p>";
                    }

                    ?>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>