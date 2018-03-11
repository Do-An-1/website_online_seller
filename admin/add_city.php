<?PHP
include('includes/header.php');
?>

<style>
    .results{color:#009966;}
    .results1{color:#FF0000;}
</style>



<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
        include('inc/myconnect.php');
        include('inc/function.php');
        if(isset($_POST['submit']))
        {
            $errors = array();
            if(empty($_POST['code_city']))
            {
                $errors[] ='code_city';
            }
            else
            {
                $code=$_POST['code_city'];
            }

            if(empty($_POST['name_city']))
            {
                $errors[] ='name_city';
            }
            else
            {
                $name=$_POST['name_city'];
            }

            if(empty($errors))
            {
                $query ="SELECT code_city FROM tb_city WHERE code_city='{$code}'";
                $result = mysqli_query($dbc,$query);
                kt_query($query,$result);

                if(mysqli_num_rows($result)==1)
                {
                    $message = "<p class='results1'>Mã thành phố này đã tồn tại</p>";
                }
                else
                {
                    $query_in = "INSERT INTO tb_city(code_city,name_city)
									VALUES('{$code}','{$name}')
						";
                    $result_in=mysqli_query($dbc,$query_in);
                    kt_query($query_in,$result_in);

                    if($result_in==1)
                    {
                        echo "<p class='results'>Thêm mới thành công</p>";
                        $_POST['code_city'] ="";
                        $_POST['name_city'] ="";
                        $code=null;
                        $name=null;
                        unset($_POST['code_city']);
                        unset($_POST['name_city']);
                        unset($_POST['code_city']);
                    }
                    else
                    {
                        echo "<p class='results1'>Thêm mới không thành công</p>";
                    }
                }
            }
            else
            {
                $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
            }
        }
        ?>
        <form name="frmadd-video" method="post">
            <?php
            if(isset($message)){echo $message;}
            ?>
            <h2 style="color: red">Thêm mới</h2>
            <div class="form-group">
                <label>Mã thành phố</label>
                <input type="text" name="code_city" value="<?php if(isset($_POST['code_city'])) {echo $_POST['code_city'];}?>" class="form-control"  placeholder='Nhập mã loại sản phẩm'/>
                <?php
                if (isset($errors) && in_array('code_city',$errors))
                {
                    echo "<p class='results1' >Bạn hãy nhập mã loại thành phố</p>";
                }
                ?>
            </div>

            <div class="form-group">
                <label>Tên thành phố</label>
                <input type="text" name="name_city" value="<?php if(isset($_POST['name_city'])) {echo $_POST['name_city'];}?>" class="form-control"  placeholder='Nhập tên loại sản phẩm'/>
                <?php
                if (isset($errors) && in_array('name_city',$errors))
                {
                    echo "<p class='results1' >Bạn hãy nhập tên thành phố</p>";
                }

                ?>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

        </form>
    </div>
</div>
<?PHP include('includes/footer.php');?>
<script type="text/javascript">
    $('.tinh-thanh .collapse').addClass('in');
    $('.tinh-thanh .thanhpho').css({'background-color': '#e1e1e1'});
</script>