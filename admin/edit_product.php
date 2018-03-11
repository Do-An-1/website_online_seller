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
        include('inc/images_helper.php');
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
            $array_size = array();
            $quantity_product = 0;
            if( $_POST['category'] == 't' ) {
                if ( isset($_POST['size_s']) ) {
                    $array_size[$_POST['size_s']] = $_POST['sl_s'];
                    $quantity_product += $_POST['sl_s'];
                }
                if ( isset($_POST['size_m']) ) {
                    $array_size[$_POST['size_m']] = $_POST['sl_m'];
                    $quantity_product += $_POST['sl_m'];
                }
                if ( isset($_POST['size_l']) ) {
                    $array_size[$_POST['size_l']] = $_POST['sl_l'];
                    $quantity_product += $_POST['sl_l'];
                }
                if ( isset($_POST['size_xl']) ) {
                    $array_size[$_POST['size_xl']] = $_POST['sl_xl'];
                    $quantity_product += $_POST['sl_xl'];
                }
                if ( isset($_POST['size_xxl']) ) {
                    $array_size[$_POST['size_xxl']] = $_POST['sl_xxl'];
                    $quantity_product += $_POST['sl_xxl'];
                }
                if ( isset($_POST['size_xxl']) ) {
                    $array_size[$_POST['size_xxl']] = $_POST['sl_xxl'];
                    $quantity_product += $_POST['sl_xxl'];
                }

            } else {
                if ( isset($_POST['size_27']) ) {
                    $array_size[$_POST['size_27']] = $_POST['sl_27'];
                     $quantity_product += $_POST['sl_27'];
                }
                if ( isset($_POST['size_28']) ) {
                    $array_size[$_POST['size_28']] = $_POST['sl_28'];
                     $quantity_product += $_POST['sl_28'];
                }
                if ( isset($_POST['size_29']) ) {
                    $array_size[$_POST['size_29']] = $_POST['sl_29'];
                     $quantity_product += $_POST['sl_29'];
                }
                if ( isset($_POST['size_30']) ) {
                    $array_size[$_POST['size_30']] = $_POST['sl_30'];
                     $quantity_product += $_POST['sl_30'];
                }
                if ( isset($_POST['size_31']) ) {
                    $array_size[$_POST['size_31']] = $_POST['sl_31'];
                     $quantity_product += $_POST['sl_31'];
                }
                if ( isset($_POST['size_32']) ) {
                    $array_size[$_POST['size_32']] = $_POST['sl_32'];
                     $quantity_product += $_POST['sl_32'];
                }
                if ( isset($_POST['size_33']) ) {
                    $array_size[$_POST['size_33']] = $_POST['sl_33'];
                     $quantity_product += $_POST['sl_33'];
                }
                if ( isset($_POST['size_34']) ) {
                    $array_size[$_POST['size_34']] = $_POST['sl_34'];
                     $quantity_product += $_POST['sl_34'];
                }
                if ( isset($_POST['size_35']) ) {
                    $array_size[$_POST['size_35']] = $_POST['sl_35'];
                     $quantity_product += $_POST['sl_35'];
                }
                if ( isset($_POST['size_36']) ) {
                    $array_size[$_POST['size_36']] = $_POST['sl_36'];
                     $quantity_product += $_POST['sl_36'];
                }
                if ( isset($_POST['size_37']) ) {
                    $array_size[$_POST['size_37']] = $_POST['sl_37'];
                     $quantity_product += $_POST['sl_37'];
                }
                if ( isset($_POST['size_38']) ) {
                    $array_size[$_POST['size_38']] = $_POST['sl_38'];
                     $quantity_product += $_POST['sl_38'];
                }
                if ( isset($_POST['size_39']) ) {
                    $array_size[$_POST['size_39']] = $_POST['sl_39'];
                     $quantity_product += $_POST['sl_39'];
                }
                if ( isset($_POST['size_40']) ) {
                    $array_size[$_POST['size_40']] = $_POST['sl_40'];
                     $quantity_product += $_POST['sl_40'];
                }
                if ( isset($_POST['size_41']) ) {
                    $array_size[$_POST['size_41']] = $_POST['sl_41'];
                     $quantity_product += $_POST['sl_41'];
                }
                if ( isset($_POST['size_42']) ) {
                    $array_size[$_POST['size_42']] = $_POST['sl_42'];
                     $quantity_product += $_POST['sl_42'];
                }
                if ( isset($_POST['size_43']) ) {
                    $array_size[$_POST['size_43']] = $_POST['sl_43'];
                     $quantity_product += $_POST['sl_43'];
                }
                if ( isset($_POST['size_44']) ) {
                    $array_size[$_POST['size_44']] = $_POST['sl_44'];
                     $quantity_product += $_POST['sl_44'];
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
            }
            // hiệu product
            if (empty($_POST['label_product'])) {
                $errors[] = 'label_product';
            } else {
                $label = ($_POST['label_product']);
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
                $price = str_replace(',' , '' ,  $_POST['price_product']);
            }
                // giá bán sản phẩm
            if (empty($_POST['saleprice_product'])) {
                $errors[] = 'saleprice_product';
            } else {
                $saleprice = str_replace(',' , '' ,  $_POST['saleprice_product']);
            }
                // mô tả sản phẩm
            if (empty($_POST['describe_product'])) {
                $describe = "";
            } else {
                $describe = $_POST['describe_product'];
            }
            $status = $_POST['status'];
            if ( $status == 0 && $quantity_product > 0 ) {
                  $errors[] = 'status';
            } 
            if ( empty($errors) ) {
                $link_image ="";
                $link_image_thump ="";
                $link_image = implode(" ", $_POST['anh_hi']);
                $link_image_thump = implode(" ", $_POST['anhthumb_hi']);
                 // Duyệt mảng
                // echo "<pre>";
                // print_r($_FILES['img']);
                // echo "</pre>";
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
                            $link_image .=" " . $link_img;
                            $link_image_thump .= " " .$thump;
                        }
                    }//ket thuc foreach
                    // echo $link_image . "         ....................................            " . $link_image_thump . "<br>";
                    $query_in = "UPDATE tb_product SET 
                    name_product = '$name',
                    image = '$link_image',
                    image_thump = '$link_image_thump',
                    price_product = '$price',
                    saleprice_product = '$saleprice',
                    describe_product = '$describe',
                    size_product = '$array_size',
                    status_product = '$status',
                    id_category = " . $id_loai .",
                    id_label = {$label}
                    WHERE id_product='$id'";
                    // echo $query_in;
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);
                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_product'] = "";
                        $_POST['name_product'] = "";
                        $_POST['price_product'] = "";
                        $_POST['saleprice_product'] = "";
                        $_POST['describe_product'] = "";
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } elseif( in_array('status', $errors) ){
                    $message = "<p class='results1'> Số lượng sản phẩm lớn hơn 0, không thể hết hàng </p>";
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }
            //ket thuc submit
            $query = "SELECT * FROM tb_product  WHERE id_product={$id}";
            $result = mysqli_query($dbc, $query);
            $dong = mysqli_fetch_array($result, MYSQLI_ASSOC);
            kt_query($query, $result);
            //kiem tra id có tồn tại không
            if (mysqli_num_rows($result)) {
            } else {
                if (in_array('price', $errors)) {
                    $message = "<p class='results1'>Giá sản phẩm không được lớn hơn giá bán </p>";
                } else {
                 $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
             }
            // print_r($errors);
         }
         ?>
         <form name="frmedit-product" method="post" enctype="multipart/form-data" class="frmedit-product">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <h3 style="color: red;">Chỉnh sửa - sản phẩm "<?php echo $dong['name_product']; ?>"</h3>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name_product" value="<?php echo $dong['name_product']; ?>"
                class="form-control" placeholder='Nhập tên sản phẩm'/>
                <?php
                if (isset($errors) && in_array('code_product', $errors)) {
                    echo "<p class='results1'> Bạn hãy nhập tên sản phẩm</p>";
                }
                ?>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group wrap-category" id="<?php echo $dong['id_category']; ?>">
                        <label>Thuộc loại : </label>
                        <?php ctrSelect('id_loai', 'class'); ?>
                        <?php
                        if (isset($errors) && in_array('id_loai', $errors)) {
                            echo "<p class='results1' >Bạn hãy nhập mã sản phẩm</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Hiệu Sản phẩm</label>
                        <select name="label_product" style='padding:5px 10px;border-radius:4px;display: block;'>
                            <option value="" style="color: #999">- - - Chưa có hiệu - - -</option>
                            <?php
                            $query_label = "SELECT* FROM tb_label";
                            $result_label = mysqli_query($dbc, $query_label);
                            kt_query($query_label, $result_label);
                            while ($label = mysqli_fetch_array($result_label, MYSQLI_ASSOC)) {
                                ?>
                                <option style="text-transform: capitalize;"
                                value="<?php echo $label['id_label']; ?>" <?php if($label['id_label'] == $dong['id_label']) { echo "selected='selected'";} ?> ><?php echo $label['name_label']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>    
            


            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <div class="wrap-img">
                    <?php  
                    $array_img = explode(" ", $dong['image']);
                    $array_img_thumb =  explode(" ", $dong['image_thump']);
                        // echo "<pre>";
                        // print_r($array_img_thumb);
                        // echo "</pre>";
                    for($i = 0; $i < count($array_img); $i++ ) {
                        ?>
                        <span class="item">
                            <span class="delete"><i class="glyphicon glyphicon-remove"></i></span>
                            <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                            <img src="../<?php echo $array_img[$i]; ?>" class="item-img">
                            <input type="hidden" name="anh_hi[]" value="<?php echo $array_img[$i]; ?>" class="input-hi">
                            <input type="hidden" name="anhthumb_hi[]" value="<?php echo $array_img_thumb[$i]; ?>" class="input-hi">
                            <input type="file" name="img[]" class="file" ">
                        </span>
                        <?php 
                    }
                    ?>
                    <div class="more"><i class="glyphicon glyphicon-plus"></i></div>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="form-group wrap-size">
             <?php 
             $type_size ='';
             if (isset($dong['size_product']) && !empty($dong['size_product']) ) {
                foreach (Unserialize($dong['size_product']) as $key => $value) {
                    if ( is_numeric( $key )) {
                        $type_size = 'number';
                        break;
                    } else {
                        $type_size = 'text';
                        break;
                    }
                };
            }
            
            ?>
            <label>Chọn loại size: </label>
            <div class="title">
                <input type="radio" name="category" value="t" id="text" class="category_size" <?php echo $type_size == 'text' ?  "checked" : ''; ?> > 
                <label for="text">Size chữ</label>

                <input type="radio" name="category" value="n" id="number"  class="category_size" <?php echo $type_size == 'number' ?  "checked" : ''; ?>>
                <label for="number">Size số</label>
            </div>
            <div class="all-size">
                <?php 
                if (isset($dong['size_product']) && !empty($dong['size_product']) ) {
                    if( $type_size == 'text' ) {
                        temlate_size_text( Unserialize($dong['size_product']) );
                    } else {
                       temlate_size_number( Unserialize($dong['size_product']) );
                   }
               }
               ?>
           </div>
           <div class="form-group">
            <label>Giá sản phẩm</label>
            <input type="text" name="price_product" value="<?php
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
            <input type="text" name="saleprice_product" value="<?php 
            echo number_format($dong['saleprice_product']); ?>" class="form-control"
            placeholder='Nhập giá bán sản phẩm'/>
            <?php
            if (isset($errors) && in_array('saleprice_product', $errors)) {
                echo "<p class='results1' >Bạn hãy nhập giá bán sản phẩm</p>";
            }
            ?>
        </div>
        <div class="form-group">
            <label>Mô tả sản phẩm</label>
            <textarea rows="7"  name="describe_product" value="" class="form-control"><?php 
            echo $dong['describe_product']; ?></textarea>
            <?php
            if (isset($errors) && in_array('describe_product', $errors)) {
                echo "<p class='results1' >Bạn hãy nhập mô tả sản phẩm</p>";
            }
            ?>
        </div>
        <div class="form-group">
            <label style="display:block">Trạng thái</label>
            <label class="radio-inline"> 
                <input type="radio" name="status" value="1" <?php if ($dong['status_product'] == '1') {
               echo 'checked = "checked"';
            } ?>/>
                <p class="results"> Còn hàng</p>
            </label>
            <label class="radio-inline"> 
               <input type="radio" name="status" value="0" <?php if ($dong['status_product'] == '0') {
               echo 'checked = "checked"';
            } ?>/>
                <p class="results1"> Hết hàng</p></label>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>
        </form>
    </div>
</div>
<?PHP include('includes/footer.php'); ?>
<script type="text/javascript">
    $('.danh-muc .collapse').addClass('in');
    $('.danh-muc .sanpham').css({'background-color': '#e1e1e1'});
</script>
<script type="text/javascript">
    window.onload = function()
    {   
            //
            $(".class option").each(function(){
                if($(this).attr("value") ==  $(".wrap-category").attr("id")) { $(this).attr("selected", "selected")};
                if($(this).attr("value") ==  0) { $(this).attr("disabled", "disabled")};
            });
            var i = 0;
            $(".more").click(function(e){
                $(this).before(`<span class="item">
                    <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                    <input type="file" name="img[]" class="file">
                    </span>`);
                $('.item').fadeIn("slow");
            });
            $("body").on("change", ".file", function(){
                if(this.files.length > 0){
                    i++;
                    $(this).parent().find("img").remove();
                    $(this).parent().find(".input-hi").remove();
                    $(this).before('<span class="delete"><i class="glyphicon glyphicon-remove"></i></span>');
                    $(this).before("<img src='' class='img" + i + " item-img" +"'/>");
                    var ready = new FileReader();
                    ready.onload  = function(e){
                        $('.img' + i).attr('src', e.srcElement.result);
                    };

                    ready.readAsDataURL(this.files[0]);
                }

            });
            $("body").on("click", ".delete", function(){
               $(this).parent().remove();
           })
        };
    </script>
    <script type="text/javascript">
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
    if (isset($dong['size_product']) && !empty($dong['size_product']) ) {
        if( $type_size == 'number' ) {
            temlate_size_number( Unserialize($dong['size_product']) );
        } else {
           temlate_size_number();
       }
   } else {
        temlate_size_number();
   }
   ?>
   `;
   var size_text = `<?php 
   if (isset($dong['size_product']) && !empty($dong['size_product']) ) {
    if( $type_size == 'text' ) {
        temlate_size_text( Unserialize($dong['size_product']) );
    } else {
       temlate_size_text();
   }
} else {
       temlate_size_text();
   }
?>`;
</script>