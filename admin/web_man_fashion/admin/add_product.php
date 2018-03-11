<?PHP
//    error_reporting(0);
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
        include('../inc/images_helper.php');
        //error_reporting(0);
        if (isset($_POST['submit'])) {
            $errors = array();

            // mã product
            if (empty($_POST['code_product'])) {
                $errors[] = 'code_product';
            } else {
                $code = $_POST['code_product'];
            }
            // hiệu product
            if (empty($_POST['label_product'])) {
                $errors[] = 'label_product';
            } else {
                $label = ($_POST['label_product']);
            }
            // tên product
            if (empty($_POST['name_product'])) {
                $errors[] = 'name_product';
            } else {
                $name = ($_POST['name_product']);
            }
            // giá product
            if (empty($_POST['price_product'])) {
                $errors[] = 'price_product';
            } else {
                $price = ($_POST['price_product']);
            }

            // giá bán product
            if (empty($_POST['saleprice_product'])) {
                $errors[] = 'saleprice_product';
            } else {
                $saleprice = ($_POST['saleprice_product']);
            }
            if (empty($_POST['id_loai'])) {
                $errors[] = 'saleprice_product';
            } else {
                $id_loai = ($_POST['id_loai']);
            }

            // mô tả  product
            $describe = ($_POST['describe_product']);
            // trạng thái  product
            $status = $_POST['status'];
            $date = date("Y/m/d");
            $view = 0;
            $id_product = 6;
            if (empty($errors)) {
                $query = "SELECT code_product FROM tb_product WHERE code_product='{$code}'";
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);

                if (mysqli_num_rows($result) == 1) {
                    $message = "<p class='results1'>Mã sản phẩm này đã tồn tại</p>";
                } else {

                    // Duyệt mảng
                    $link_image = "";
                    $link_image_thump = "";
//                    echo "<pre>";
//                    print_r($_FILES['img']);
//                    echo "</pre>";
                    foreach ($_FILES['img']['name'] as $key => $value) {

                        if (($_FILES['img']['type'][$key] != "image/png") &&
                            ($_FILES['img']['type'][$key] != "image/gif") &&
                            ($_FILES['img']['type'][$key] != "image/jpg") &&
                            ($_FILES['img']['type'][$key] != "image/jpeg")
                        ) {
                            $massge = "<p class='results1'>File không đúng định dạng !!</p>";
                        } elseif (($_FILES['img']['size'][$key] > 1000000)) {
                            $massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
                        } else {
                            $img = $_FILES['img']['name'][$key];
                            $link_img = 'upload/' . $img;
//                             $link_image .= $link_img." ";
                            move_uploaded_file($_FILES['img']['tmp_name'][$key], "../upload/" . $img);
                            //xử lí resize, crop hinh anh

                            $temp = explode('.', $img);
                            if ($temp[1] == 'jpeg' or $temp[1] == 'JPEG') {
                                $temp[1] = "jpg";
                            }
                            $temp[1] = strtolower($temp[1]);
                            $thump = 'upload/resize/' . $temp[0] . '_thump' . '.' . $temp[1]; // đường dẫn


//                            $imageThump = new Image("../".$link_img);
//                            if ($imageThump->getWidth() > 460) {
//                                $imageThump->resize(460, 'resize');
//                            }
//                            $imageThump->save($temp[0] . '_thump', '../upload/resize'); //ten voi duong dan luu anh
//                             echo $link_img. "<br>".$thump;

                            $link_image .= $link_img . " ";
                            $link_image_thump .= $thump . " ";
//                             echo "<br>"."Link"."<br>".$link_image . "<br>".$link_image_thump;
                            // //
                        }

                    }//ket thuc foreach

                    $query_data = "INSERT INTO tb_product(code_product,
														name_product,
														image,
														image_thump,
														price_product,
														saleprice_product,
														describe_product,
														view_product,
														date_product,
														status_product,
														id_category,
														id_label
														)
								VALUES( '{$code}',
										'{$name}',
										'{$link_image}',
										'{$link_image_thump}',
										'{$price}',
										'{$saleprice}',
										'{$describe}',
										'{$view}',
										'{$date}',
										'{$status}',
										'{$id_loai}',
										'{$label}'
										)";
                    //echo $query_data;
                    $result_data = mysqli_query($dbc, $query_data);
                    kt_query($query_data, $result_data);


                    if ($result_data > 0) {
                        echo "<p class='results'>Thêm mới thành công</p>";
                        // $_POST['code_label'] ="";
                        // $_POST['name_label'] ="";
                    } else {
                        echo "<p class='results1'>Thêm mới không thành công</p>";
                    }

                }
            } else {
                $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                print_r($errors);

            }
        }
        ?>
        <form name="frmadd-product" method="post" enctype="multipart/form-data">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <h3 style="color: red">Thêm mới - sản phẩm</h3>

            <!-- Lấy value id_product -->


            <input type="hidden" name="id_product" value="">

            <!--  -->
            <div class="form-group">
                <label>Mã sản phẩm</label>
                <input type="text" name="code_product" value="<?php if (isset($_POST['code_product'])) {
                    echo $_POST['code_product'];
                } ?>" class="form-control" placeholder='Nhập mã sản phẩm'/>
                <?php
                if (isset($errors) && in_array('code_product', $errors)) {
                    echo "<p class='results1' >Bạn hãy nhập mã sản phẩm</p>";
                }
                ?>
            </div>

            <div class="form-group">
                <label>Hiệu sản phẩm : </label>
                <select name="label_product" style='padding:5px 10px;border-radius:4px;display: block;'>
                    <option value="" style="color: #999">- - - Chưa có hiệu - - -</option>
                    <?php
                    $query_label = "SELECT* FROM tb_label";
                    $result_label = mysqli_query($dbc, $query_label);
                    kt_query($query_label, $result_label);
                    while ($label = mysqli_fetch_array($result_label, MYSQLI_ASSOC)) {
                        ?>
                        <option style="text-transform: capitalize;"
                                value="<?php echo $label['id_label']; ?>"><?php echo $label['name_label']; ?></option>
                        <?php
                    }
                    ?>
                </select>

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
                } ?>" class="form-control" placeholder='Nhập tên loại sản phẩm'/>
                <?php
                if (isset($errors) && in_array('name_product', $errors)) {
                    echo "<p class='results1' >Bạn hãy nhập tên sản phẩm</p>";
                }
                ?>
            </div>

            <!-- warning -->
            <div class="form-group">

                <label>Ảnh sản phẩm</label>
                <input type="file" name="img[]" value="" multiple="multiple"/>
            </div>

            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text" name="price_product" value="<?php if (isset($_POST['price_product'])) {
                    echo $_POST['price_product'];
                } ?>" class="form-control" placeholder='Nhập giá sản phẩm'/>
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
                } ?>" class="form-control" placeholder='Nhập giá bán sản phẩm'/>
                <?php
                if (isset($errors) && in_array('saleprice_product', $errors)) {
                    echo "<p class='results1' >Bạn hãy nhập giá bán sản phẩm</p>";
                }
                ?>
            </div>

            <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea name="describe_product" value="<?php if (isset($_POST['describe_product'])) {
                    echo $_POST['describe_product'];
                } ?>" class="form-control" placeholder='Nhập mô tả sản phẩm'></textarea>
                <?php
                if (isset($errors) && in_array('describe_product', $errors)) {
                    echo "<p class='results1' >Bạn hãy nhập mô tả sản phẩm</p>";
                }
                ?>
            </div>

            <div class="form-group">
                <label style="display:block">Trạng thái</label>

                <label class="radio-inline"> <input type="radio" name="status" value="1" checked="checked"/><p class="results"> Còn hàng</p>
                </label>
                <label class="radio-inline"> <input type="radio" name="status" value="0"/><p class="results1"> Hết hàng</p></label>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

        </form>
    </div>
</div>
<?PHP include('includes/footer.php'); ?>
