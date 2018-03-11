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
                header("Location: list_product.php");
                exit();
            }

            //bat dau submit
            if (isset($_POST['submit'])) {
                $errors = array();
                // mã sản phẩm
                if (empty($_POST['code_product'])) {
                    $errors[] = 'code_product';
                } else {
                    $code = $_POST['code_product'];
                }
                // tên sản phẩm
                if (empty($_POST['name_product'])) {
                    $errors[] = 'name_product';
                } else {
                    $name = $_POST['name_product'];
                }
                // giá sản phẩm
                if (empty($_POST['price_product'])) {
                    $errors[] = 'price_product';
                } else {
                    $price = $_POST['price_product'];
                }
                // giá bán sản phẩm
                if (empty($_POST['saleprice_product'])) {
                    $errors[] = 'saleprice_product';
                } else {
                    $saleprice = $_POST['saleprice_product'];
                }
                // tiêu đề sản phẩm
                if (empty($_POST['title_product'])) {
                    $errors[] = 'title_product';
                } else {
                    $title = $_POST['title_product'];
                }
                // mô tả sản phẩm
                if (empty($_POST['describe_product'])) {
                    $errors[] = 'describe_product';
                } else {
                    $describe = $_POST['describe_product'];
                }

                if (empty($errors)) {
                    $query_in = "UPDATE tb_product SET code_product = '$code',
                                                        name_product = '$name',
                                                         price_product = '$price',
                                                          saleprice_product = '$saleprice',
                                                           title_product = '$title',
                                                            describe_product = '$describe' where id_product='$id'";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_product'] = "";
                        $_POST['name_product'] = "";
                        $_POST['price_product'] = "";
                        $_POST['saleprice_product'] = "";
                        $_POST['title_product'] = "";
                        $_POST['describe_product'] = "";
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }
            //ket thuc submit
            $query = "SELECT * FROM tb_product WHERE id_product={$id}";
            $result = mysqli_query($dbc, $query);
            $dong = mysqli_fetch_array($result, MYSQLI_ASSOC);
            kt_query($query, $result);
            //kiem tra id có tồn tại không
            if (mysqli_num_rows($result)) {

            } else {
                $message = "<p class='results1'>Sản phẩm không tồn tại</p>";
            }
            ?>
            <form name="frmadd-video" method="post">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

                <h3 style="color: red;">Chỉnh sửa - sản phẩm "<?php echo $dong['name_product']; ?>"</h3>
                <div class="form-group">

                    <label>Mã sản phẩm</label>
                    <input type="text" name="code_product" value="<?php if (isset($_POST['code_product'])) {
                        echo $_POST['code_product'];
                    }
                    echo $dong['code_product']; ?>"
                           class="form-control" placeholder='Nhập mã sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('code_product', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập mã sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Thuộc loại : </label>
                    <?php ctrSelect('id_loai', 'class'); ?>
                    <?php
                    if (isset($errors) && in_array('id_loai', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập mã sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name_product" value="<?php if (isset($_POST['name_product'])) {
                        echo $_POST['name_product'];
                    }
                    echo $dong['name_product']; ?>"
                           class="form-control" placeholder='Nhập tên sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('code_product', $errors)) {
                        echo "<p class='results1'> Bạn hãy nhập tên sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="img[]" value="" multiple="multiple"/>
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="price_product" value="<?php if (isset($_POST['price_product'])) {
                        echo $_POST['price_product'];
                    }
                    echo number_format($dong['price_product']); ?>" class="form-control"
                           placeholder='Nhập giá sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('price_product', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập giá sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Giá bán sản phẩm</label>
                    <input type="text" name="saleprice_product" value="<?php if (isset($_POST['saleprice_product'])) {
                        echo $_POST['saleprice_product'];
                    }
                    echo number_format($dong['saleprice_product']); ?>" class="form-control"
                           placeholder='Nhập giá bán sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('saleprice_product', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập giá bán sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Tiêu đề sản phẩm</label>
                    <input type="text" name="title_product" value="<?php if (isset($_POST['title_product'])) {
                        echo $_POST['title_product'];
                    }
                    echo $dong['title_product']; ?>" class="form-control" placeholder='Nhập tiêu đề sản phẩm'/>
                    <?php
                    if (isset($errors) && in_array('title_product', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập tên sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <input type="text" name="describe_product" value="<?php if (isset($_POST['describe_product'])) {
                        echo $_POST['describe_product'];
                    }
                    echo $dong['describe_product']; ?>" class="form-control" placeholder='Nhập mô tả sản phẩm'></input>
                    <?php
                    if (isset($errors) && in_array('describe_product', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập mô tả sản phẩm</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label style="display:block">Trạng thái</label>

                    <label class="radio-inline"> <input type="radio" name="status" value="1" checked="checked"/>
                        <p class="results"> Còn hàng</p>
                    </label>
                    <label class="radio-inline"> <input type="radio" name="status" value="0"/>
                        <p class="results1"> Hết hàng</p></label>
                </div>

                <!--<div class="form-group">
                    <label>Thuộc loại </label>
                    <?php ctrSelect('parent_id', 'class'); ?>
                </div>-->

                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>