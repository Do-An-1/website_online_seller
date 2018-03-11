<?PHP

include('includes/header.php');
include('inc/myconnect.php');
?>

<style>
.results{color:#009966;}
.results1{color:#FF0000;}
.frm-image{
    margin-bottom: 25px;
}
.frm-image  .wrap-img:after{
    content: "";
    display: table;
    clear: both;
}
.frm-image  .wrap-img .item{
    box-sizing: border-box;
    padding: 2px;
    width: 80px;
    height: 150px;
    position: relative;
    display: block;
    cursor: pointer;
    float: left;
    margin-right: 10px;
    background: #e1e1e1;
    border: 1px dashed #333;
    width: 100%;
    height: 200px;
    margin-bottom: 15px;
    width: 80%;
    height: 200px;
    margin-bottom: 15px;
    text-align: center
}
.frm-image .image1 .wrap-img .item,.frm-image .image4 .wrap-img .item{
   width: 40%;
   height: 400px;
}

.frm-image .wrap-img .icon{
    line-height: 200px;

}
.frm-image .image1 .wrap-img .icon, .frm-image .image4 .wrap-img .icon{
   line-height: 400px;
}
.frm-image .wrap-img .icon i{
    font-size: 35px;
    z-index: 10;
}
.file1, .file2, .file3, .file4{
    width: 100%;height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    z-index: 100;
}
.frm-image .img:after{
    content: "";
    display: table;
    clear: both;
}
.frm-image .img{
    padding: 15px;
    background: white;
    border: 1px solid #e1e1e1;
    border-radius: 4px;
}
.item-img1, .item-img2, .item-img3, .item-img4{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1;
}
</style>



<div class="row" style="background: #f1f1f1">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
        include('inc/myconnect.php');
        include('inc/function.php');
        ?>
        <form name="frmadd-video" method="post" class="frm-image" action="" enctype="multipart/form-data">
            <h2 style="color: red">Hình ảnh quảng cáo</h2>
            <?php 
            if(isset($_POST['submit'])){
                if ( isset($_FILES['img1']) && isset($_FILES['img2']) && isset($_FILES['img3']) && isset($_FILES['img4']) && $_POST['category1'] != 0 && $_POST['category2'] != 0 && $_POST['category3'] != 0 && $_POST['category4'] != 0) {  
                    /* luu hinh thu nhat */
                    if (($_FILES['img1']['type'] != "image/png") &&
                        ($_FILES['img1']['type'] != "image/gif") &&
                        ($_FILES['img1']['type'] != "image/jpg") &&
                        ($_FILES['img1']['type'] != "image/jpeg")
                    ) {
                        $massge = "<p class='results1'>File không đúng định dạng !!</p>";
                } elseif (($_FILES['img1']['size'] > 1000000)) {
                    $massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
                } else {
                    $img = str_replace(" ","",$_FILES['img1']['name']);
                    $link_img = 'image/' . $img;
                    move_uploaded_file($_FILES['img1']['tmp_name'], "../image/" . $img);
                }

                $id_category = $_POST['category1'];
                $query = "SELECT * FROM tb_information WHERE name='image_1'";
                $result = mysqli_query($dbc, $query);
                if( mysqli_num_rows($result) > 0 ) {
                    if (!empty($_FILES['img1']['name'])) {
                        $query_image = "UPDATE tb_information SET  
                        value = '{$link_img}'
                        WHERE name='image_1'";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    
                    
                    $query_category = "UPDATE tb_information SET  
                    value = '{$id_category}'
                    WHERE name='category_1'";
                    $result_category = mysqli_query($dbc, $query_category);
                } else {
                    if (!empty($_FILES['img1']['name'])) {
                        $query_image = "INSERT INTO  tb_information(name,value)
                        VALUES('image_1','{$link_img}')";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    $query_category = "INSERT INTO  tb_information(name,value)
                    VALUES('category_1','{$id_category}')";
                    $result_category = mysqli_query($dbc, $query_category);
                }

                /*ket thuc luu hinh thu nhat */

                 /* luu hinh thu hai */
                    if (($_FILES['img2']['type'] != "image/png") &&
                        ($_FILES['img2']['type'] != "image/gif") &&
                        ($_FILES['img2']['type'] != "image/jpg") &&
                        ($_FILES['img2']['type'] != "image/jpeg")
                    ) {
                        $massge = "<p class='results1'>File không đúng định dạng !!</p>";
                } elseif (($_FILES['img2']['size'] > 1000000)) {
                    $massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
                } else {
                    $img = str_replace(" ","",$_FILES['img2']['name']);
                    $link_img = 'image/' . $img;
                    move_uploaded_file($_FILES['img2']['tmp_name'], "../image/" . $img);
                }

                $id_category = $_POST['category2'];
                $query = "SELECT * FROM tb_information WHERE name='image_2'";
                $result = mysqli_query($dbc, $query);
                if( mysqli_num_rows($result) > 0 ) {

                    if (!empty($_FILES['img2']['name'])) {
                        $query_image = "UPDATE tb_information SET  
                        value = '{$link_img}'
                        WHERE name='image_2'";
                        $result_image = mysqli_query($dbc, $query_image);
                    }

                    $query_category = "UPDATE tb_information SET  
                    value = '{$id_category}'
                    WHERE name='category_2'";
                    $result_category = mysqli_query($dbc, $query_category);
                } else {
                    if (!empty($_FILES['img2']['name'])) {
                        $query_image = "INSERT INTO  tb_information(name,value)
                        VALUES('image_2','{$link_img}')";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    $query_category = "INSERT INTO  tb_information(name,value)
                    VALUES('category_2','{$id_category}')";
                    $result_category = mysqli_query($dbc, $query_category);
                }

                /*ket thuc luu hinh thu hai */
                 /* luu hinh thu ba */
                    if (($_FILES['img3']['type'] != "image/png") &&
                        ($_FILES['img3']['type'] != "image/gif") &&
                        ($_FILES['img4']['type'] != "image/jpg") &&
                        ($_FILES['img4']['type'] != "image/jpeg")
                    ) {
                        $massge = "<p class='results1'>File không đúng định dạng !!</p>";
                } elseif (($_FILES['img3']['size'] > 1000000)) {
                    $massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
                } else {
                    $img = str_replace(" ","",$_FILES['img3']['name']);
                    $link_img = 'image/' . $img;
                    move_uploaded_file($_FILES['img3']['tmp_name'], "../image/" . $img);
                }

                $id_category = $_POST['category3'];
                $query = "SELECT * FROM tb_information WHERE name='image_3'";
                $result = mysqli_query($dbc, $query);
                if( mysqli_num_rows($result) > 0 ) {
                    if (!empty($_FILES['img3']['name'])) {
                        $query_image = "UPDATE tb_information SET  
                        value = '{$link_img}'
                        WHERE name='image_3'";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    $query_category = "UPDATE tb_information SET  
                    value = '{$id_category}'
                    WHERE name='category_3'";
                    $result_category = mysqli_query($dbc, $query_category);
                } else {
                    if (!empty($_FILES['img3']['name'])) {
                        $query_image = "INSERT INTO  tb_information(name,value)
                        VALUES('image_3','{$link_img}')";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    $query_category = "INSERT INTO  tb_information(name,value)
                    VALUES('category_3','{$id_category}')";
                    $result_category = mysqli_query($dbc, $query_category);
                }

                /*ket thuc luu hinh thu ba */
                 /* luu hinh thu tu */
                    if (($_FILES['img4']['type'] != "image/png") &&
                        ($_FILES['img4']['type'] != "image/gif") &&
                        ($_FILES['img4']['type'] != "image/jpg") &&
                        ($_FILES['img4']['type'] != "image/jpeg")
                    ) {
                        $massge = "<p class='results1'>File không đúng định dạng !!</p>";
                } elseif (($_FILES['img4']['size'] > 1000000)) {
                    $massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
                } else {
                    $img = str_replace(" ","",$_FILES['img4']['name']);
                    $link_img = 'image/' . $img;
                    move_uploaded_file($_FILES['img4']['tmp_name'], "../image/" . $img);
                }

                $id_category = $_POST['category4'];
                $query = "SELECT * FROM tb_information WHERE name='image_4'";
                $result = mysqli_query($dbc, $query);
                if( mysqli_num_rows($result) > 0 ) {
                    if (!empty($_FILES['img4']['name'])) {
                        $query_image = "UPDATE tb_information SET  
                        value = '{$link_img}'
                        WHERE name ='image_4'";
                        $result_image = mysqli_query($dbc, $query_image);
                    }
                    $query_category = "UPDATE tb_information SET  
                    value = '{$id_category}'
                    WHERE name='category_4'";
                    $result_category = mysqli_query($dbc, $query_category);
                } else {
                    if (!empty($_FILES['img4']['name'])) {
                    $query_image = "INSERT INTO  tb_information(name,value)
                    VALUES('image_4','{$link_img}')";
                    $result_image = mysqli_query($dbc, $query_image);
                    }

                    $query_category = "INSERT INTO  tb_information(name,value)
                    VALUES('category_4','{$id_category}')";
                    $result_category = mysqli_query($dbc, $query_category);
                }
                 echo '<div style="color: #009966;">Lưu thành công</div>';
                /*ket thuc luu hinh thu tu */
            } else {
                echo '<div style="color:red">Vui nhập đầy đủ thông tin</div>';
            }
        } 
        ?>
        <?php 
        $query = "SELECT * FROM tb_information";
        $result = mysqli_query($dbc, $query);

        $array_info = array();
        while( $rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $array_info[$rows['name']] =  $rows['value']; 
        }
        extract($array_info);
        ?>
        <div class="form-group img image1" id_category="<?php echo  isset($category_1) ? $category_1 : ''  ?>">
            <label class="">Hình 1</label>
            <div class="wrap-img">        
                <span class="item">
                    <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                    <img src="../<?php echo  isset($image_1) ? $image_1 : ''  ?>" class="item-img1" alt="Hãy chọn hình ảnh">
                    <input type="file" name="img1" value="<?php echo  isset($image_1) ? $image_1 : ''  ?>" class="file1">
                </span>
            </div>
            <label>Danh mục</label><?php ctrSelect('category1', 'category1'); ?> 


        </div>
        <!--  -->
        <div class="form-group img image2" id_category="<?php echo  isset($category_2) ? $category_2 : ''  ?>">
            <label>Hình 2</label>
            <div class="wrap-img">        
                <span class="item">
                    <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                    <img src="../<?php echo  isset($image_2) ? $image_2 : ''  ?>" class="item-img2" alt="Hãy chọn hình ảnh">
                    <input type="file" name="img2" value="<?php echo  isset($image_1) ? $image_1 : ''  ?>" class="file2">
                </span>
            </div>
            <label style="display: block;">Danh mục</label><?php ctrSelect('category2', 'category2'); ?> 
        </div>
        <!--  -->
        <div class="form-group img image3" id_category="<?php echo  isset($category_3) ? $category_3 : ''  ?>">
            <label>Hình 3</label>
            <div class="wrap-img">        
                <span class="item">
                    <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                    <img src="../<?php echo  isset($image_3) ? $image_3 : ''  ?>" class="item-img3" alt="Hãy chọn hình ảnh">
                    <input type="file" name="img3" value="<?php echo  isset($image_1) ? $image_1 : ''  ?>" class="file3">
                </span>
            </div>
            <label style="display: block;">Danh mục</label><?php ctrSelect('category3', 'category3'); ?> 
        </div>
        <!--  -->
        <div class="form-group img image4" id_category="<?php echo  isset($category_4) ? $category_4 : ''  ?>">
            <label>Hình 4</label>
            <div class="wrap-img">        
                <span class="item">
                    <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                    <img src="../<?php echo  isset($image_4) ? $image_4 : ''  ?>" class="item-img4" alt="Hãy chọn hình ảnh">
                    <input type="file" name="img4" value="<?php echo  isset($image_1) ? $image_1 : ''  ?>" class="file4">
                </span>
            </div>
            <label>Danh mục</label><?php ctrSelect('category4', 'category4'); ?> 
        </div>
        <!--  -->
        <div class="text-center"><input type="submit" name="submit" value="Lưu" class="btn btn-primary form-control"></div>
    </form>
</div>
</div>
<?PHP include('includes/footer.php');?>
<script>
    $("body").on("change", ".file1", function(){
        console.log(this.files[0]);
        var ready = new FileReader();
        ready.onload  = function(e){
            $(".item-img1").attr('src', e.srcElement.result);
        };
        ready.readAsDataURL(this.files[0]);
     });
    $("body").on("change", ".file2", function(){
            var ready = new FileReader();
            ready.onload  = function(e){
             $(".item-img2").attr('src', e.srcElement.result);
        };
        ready.readAsDataURL(this.files[0]);
     });
    $("body").on("change", ".file3", function(){
            var ready = new FileReader();
            ready.onload  = function(e){
             $(".item-img3").attr('src', e.srcElement.result);
         };
         ready.readAsDataURL(this.files[0]);
     });
    $("body").on("change", ".file4", function(){
            var ready = new FileReader();
            ready.onload  = function(e){
             $(".item-img4").attr('src', e.srcElement.result);
         };
         ready.readAsDataURL(this.files[0]);
     });

    /* selected */
    var category1 = $('.image1').attr('id_category');
    $(".image1 option").each(function(){
        if( $(this).attr("value") ==  category1){
            $(this).attr("selected","selected");
        }
   })
    var category2 = $('.image2').attr('id_category');
    $(".image2 option").each(function(){
        if( $(this).attr("value") ==  category2){
            $(this).attr("selected","selected");
        }
   })
    var category3 = $('.image3').attr('id_category');
    $(".image3 option").each(function(){
        if( $(this).attr("value") ==  category3){
            $(this).attr("selected","selected");
        }
   })
    var category4 = $('.image4').attr('id_category');
    $(".image4 option").each(function(){
        if( $(this).attr("value") ==  category4){
            $(this).attr("selected","selected");
        }
   })
    /**/
</script>
<script type="text/javascript">
    $('.quang-cao .collapse').addClass('in');
    $('.quang-cao .hinhanh').addClass('active-hover');
</script>