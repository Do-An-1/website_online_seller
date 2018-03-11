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
                header("Location: list_category.php");
                exit();
            }

            //bat dau submit
            if (isset($_POST['submit'])) {
                $errors = array();
                if (empty($_POST['code_category'])) {
                    $errors[] = 'code_category';
                } else {
                    $code = $_POST['code_category'];
                }

                if (empty($_POST['name_category'])) {
                    $errors[] = 'name_category';
                } else {
                    $name = $_POST['name_category'];
                }

                $parent_id= $_POST['parent_id'];


                if (empty($errors)) {
                    $query_in = "UPDATE tb_category SET code_category='$code', name_category='$name',parent_id='$parent_id' where id_category='$id'";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_category'] = "";
                        $_POST['name_category'] = "";
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }

            //ket thuc submit
            $query = "SELECT * FROM tb_category WHERE id_category={$id}";
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

                <h2 style=" color: red">Chỉnh sửa - loại sản phẩm "<?php echo $dong['name_category'] ?>"</h2>
                <div class="form-group">
                    <label>Mã loại sản phẩm</label>
                    <input type="text" name="code_category" value="<?php if(isset($_POST['code_category'])) {echo $_POST['code_category'];} echo $dong['code_category']; ?>" class="form-control" placeholder='Mã loại sản phẩm'/>
                </div>

                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name_category" value="<?php if(isset($_POST['name_category'])) {echo $_POST['name_category'];} echo $dong['name_category']; ?>" class="form-control" id="name_category" current_id="<?php echo $id; ?>" parent_id="<?php echo $dong['parent_id'] ?>" placeholder='Tên loại sản phẩm'/>
                </div>

                <div class="form-group">
                    <label>Thuộc loại </label>
                    <?php ctrSelect('parent_id', 'parent_category'); ?>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>
<script type="text/javascript">
           var parent_id = $("#name_category").attr("parent_id");
           var current_id = $("#name_category").attr("current_id");
           $(".parent_category option").each(function(){
                if( $(this).attr("value") ==  parent_id){
                    $(this).attr("selected","selected");
                }

                if( $(this).attr("value") ==  current_id){
                    $(this).attr("disabled","disabled");
                }

           })

</script>
<script type="text/javascript">
    $('.danh-muc .collapse').addClass('in');
    $('.danh-muc .loaisanpham').css({'background-color': '#e1e1e1'});
</script>