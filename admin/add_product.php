<?PHP
error_reporting(0);
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

<div class="row wrap-add-product">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
        include('inc/myconnect.php');
        include('inc/function.php');
        include('inc/images_helper.php');
        //error_reporting(0);
        if (isset($_POST['submit'])) {
            $errors = array();
            // Size
            $array_size = array();
            if( $_POST['category'] == 't' ) {
                if ( isset($_POST['size_s']) ) {
                    $array_size[$_POST['size_s']] = $_POST['sl_s'];
                }
                if ( isset($_POST['size_m']) ) {
                    $array_size[$_POST['size_m']] = $_POST['sl_m'];
                }
                if ( isset($_POST['size_l']) ) {
                    $array_size[$_POST['size_l']] = $_POST['sl_l'];
                }
                if ( isset($_POST['size_xl']) ) {
                    $array_size[$_POST['size_xl']] = $_POST['sl_xl'];
                }
                if ( isset($_POST['size_xxl']) ) {
                    $array_size[$_POST['size_xxl']] = $_POST['sl_xxl'];
                }
                if ( isset($_POST['size_xxl']) ) {
                    $array_size[$_POST['size_xxl']] = $_POST['sl_xxl'];
                }

            } else {
                if ( isset($_POST['size_27']) ) {
                    $array_size[$_POST['size_27']] = $_POST['sl_27'];
                }
                if ( isset($_POST['size_28']) ) {
                    $array_size[$_POST['size_28']] = $_POST['sl_28'];
                }
                if ( isset($_POST['size_29']) ) {
                    $array_size[$_POST['size_29']] = $_POST['sl_29'];
                }
                if ( isset($_POST['size_30']) ) {
                    $array_size[$_POST['size_30']] = $_POST['sl_30'];
                }
                if ( isset($_POST['size_31']) ) {
                    $array_size[$_POST['size_31']] = $_POST['sl_31'];
                }
                if ( isset($_POST['size_32']) ) {
                    $array_size[$_POST['size_32']] = $_POST['sl_32'];
                }
                if ( isset($_POST['size_33']) ) {
                    $array_size[$_POST['size_33']] = $_POST['sl_33'];
                }
                if ( isset($_POST['size_34']) ) {
                    $array_size[$_POST['size_34']] = $_POST['sl_34'];
                }
                if ( isset($_POST['size_35']) ) {
                    $array_size[$_POST['size_35']] = $_POST['sl_35'];
                }
                if ( isset($_POST['size_36']) ) {
                    $array_size[$_POST['size_36']] = $_POST['sl_36'];
                }
                if ( isset($_POST['size_37']) ) {
                    $array_size[$_POST['size_37']] = $_POST['sl_37'];
                }
                if ( isset($_POST['size_38']) ) {
                    $array_size[$_POST['size_38']] = $_POST['sl_38'];
                }
                if ( isset($_POST['size_39']) ) {
                    $array_size[$_POST['size_39']] = $_POST['sl_39'];
                }
                if ( isset($_POST['size_40']) ) {
                    $array_size[$_POST['size_40']] = $_POST['sl_40'];
                }
                if ( isset($_POST['size_41']) ) {
                    $array_size[$_POST['size_41']] = $_POST['sl_41'];
                }
                if ( isset($_POST['size_42']) ) {
                    $array_size[$_POST['size_42']] = $_POST['sl_42'];
                }
                if ( isset($_POST['size_43']) ) {
                    $array_size[$_POST['size_43']] = $_POST['sl_43'];
                }
                if ( isset($_POST['size_44']) ) {
                    $array_size[$_POST['size_44']] = $_POST['sl_44'];
                }

            }
            // echo '<pre>';
            // print_r($array_size);
            // echo '</pre>';
            $array_size = Serialize($array_size);
            // Kiem tra gia ban vs gia san pham
            if( isset($_POST['price_product']) && isset($_POST['saleprice_product']) ){
                if ($_POST['price_product'] > $_POST['saleprice_product']) {
                    $errors[] = 'price';
                }
            }
            // loại product
            if (empty($_POST['id_loai'])) {
                $errors[] = 'saleprice_product';
            } else {
                $id_loai = ($_POST['id_loai']);  
                $code =  creat_code_product($id_loai);
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
                
                $code =  creat_code_product($id_loai);

            }

            // mô tả  product
            $describe = ($_POST['describe_product']);
            // trạng thái  product
            $status = $_POST['status'];
            $date = date("Y/m/d");
            $view = 0;
            $id_product = 6;
            if (empty($errors)) {
                $query = "SELECT name_product FROM tb_product WHERE code_product='{$name}'";
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);

                if (mysqli_num_rows($result) == 1) {
                    $message = "<p class='results1'>Sản phẩm này đã tồn tại</p>";
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
                        $img = str_replace(" ","",$_FILES['img']['name'][$key]);
                        $link_img = 'upload/' . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'][$key], "../upload/" . $img);
                            //xử lí resize, crop hinh anh
                        $temp = explode('.', $img);
                        if ($temp[1] == 'jpeg' or $temp[1] == 'JPEG') {
                            $temp[1] = "jpg";
                        }
                        $temp[1] = strtolower($temp[1]);
                            $thump = 'upload/resize/' . $temp[0] . '_thump' . '.' . $temp[1]; // đường dẫn
                            $imageThump = new Image("../".$link_img);
                            if ($imageThump->getWidth() > 460) {
                                $imageThump->resize(460, 613,"resize");
                            }
                            $imageThump->save($temp[0] . '_thump', '../upload/resize'); //ten voi duong dan luu anh
                            $link_image .= $link_img . " ";
                            $link_image_thump .= $thump . " ";
                        }
                    }//ket thuc foreach
                    $link_image = trim($link_image);
                    $link_image = trim($link_image_thump);
                    $query_data = "INSERT INTO tb_product(
                    code_product,
                    name_product,
                    image,
                    image_thump,
                    price_product,
                    saleprice_product,
                    describe_product,
                    size_product,
                    view_product,
                    date_product,
                    status_product,
                    id_category,
                    id_label
                    )
                    VALUES( 
                    '{$code}',
                    '{$name}',
                    '{$link_image}',
                    '{$link_image_thump}',
                    '{$price}',
                    '{$saleprice}',
                    '{$describe}',
                    '{$array_size}',
                    '{$view}',
                    '{$date}',
                    '{$status}',
                    '{$id_loai}',
                    '{$label}'
                )";
                // echo $array_size .'<br>';
                // echo  $query_data.'a';
                // //     //echo $query_data;
                $result_data = mysqli_query($dbc, $query_data);
                kt_query($query_data, $result_data);


                if ($result_data > 0) {
                    echo "<p class='results'>Thêm mới thành công</p>";
                    $_POST['code_product'] ="";
                    $_POST['label_product'] ="";
                    $_POST['name_product'] ="";
                    $_POST['link_image'] ="";
                    $_POST['price_product'] ="";
                    $_POST['saleprice_product'] ="";
                    $_POST['describe_product'] ="";
                } else {
                    echo "<p class='results1'>Thêm mới không thành công</p>";
                }
            }
        } else {
            if (in_array('price', $errors)) {
                $message = "<p class='results1'>Giá sản phẩm không được lớn hơn giá bán </p>";
            } else {
               $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
           }

            // print_r($errors);
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



    <!-- warning -->
    <div class="form-group">

        <label>Ảnh sản phẩm</label>
        <input type="file" name="img[]" value="" multiple="multiple"/>
    </div>

    <div class="form-group wrap-size">
        <label>Chọn loại size: </label>
        <div class="title">
            <input type="radio" name="category" value="t" id="text" class="category_size" checked="checked "> 
            <label for="text">Size chữ</label>

            <input type="radio" name="category" value="n" id="number"  class="category_size">
            <label for="number">Size số</label>
        </div>
        <div class="all-size">
            <?php temlate_size_text(); ?>
        </div>
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
<script type="text/javascript">
    // disable loai san pham danh muc cha
    $(".class option").each(function(){
        if($(this).attr("value") ==  0) { $(this).attr("disabled", "disabled")};
    });
    // auto open sidebar
    $(".wrap-sidebar #menu").addClass("in");
    //
    $('.wrap-size').on('change', '.category_size', function(){
        if($(this).val() == 't' ) {
            $(".wrap-size .all-size").html(size_text);
        } else {
            $(".wrap-size .all-size").html(size_number);
        }
    })
    $('.wrap-size .all-size').on('change', '.check', function(){
        if ( this.checked ) {
            $(this).next().next().removeAttr('disabled');
        } else {
            $(this).next().next().attr('disabled', 'disabled');
        }
    })


    var size_number = `
    <?php 
        temlate_size_number();
    ?>
    `;
    var size_text = `
    <?php 
        temlate_size_text();
    ?>`;
</script>
<script type="text/javascript">
    $('.danh-muc .collapse').addClass('in');
    $('.danh-muc .sanpham').css({'background-color': '#e1e1e1'});
</script>