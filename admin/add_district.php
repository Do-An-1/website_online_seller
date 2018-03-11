<?PHP
error_reporting(0);
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


            if(empty($_POST['city']) || $_POST['city'] == 0)
            {
                $errors[] ='city';
            }
            else
            {
                $city=$_POST['city'];
            }
            if(empty($errors))
            {
                $query ="SELECT * FROM tb_district WHERE code_district='{$code}' && id_city = '{$city}' ";
                $result = mysqli_query($dbc,$query);
                kt_query($query,$result);
                if(mysqli_num_rows($result) ==1 )
                {
                    $message = "<p class='results1'>Mã quận này đã có trong thành phố này</p>";
                }
                else
                {
                    $query_in = "INSERT INTO tb_district(code_district,name_district,id_city)
									VALUES('{$code}','{$name}','{$city}')
						";
                    $result_in=mysqli_query($dbc,$query_in);
                    kt_query($query_in,$result_in);

                    if($result_in==1)
                    {
                        echo "<p class='results'>Thêm mới thành công</p>";
                        $_POST['code'] ="";
                        $_POST['name'] ="";
                        $code=null;
                        $name=null;
                        unset($_POST['code']);
                        unset($_POST['code']);
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
                header("Location: list_category.php");
            }
        }
        ?>
        <form name="frmadd-video" method="post">
            <?php
            if(isset($message)){echo $message;}
            ?>
            <h2 style="color: red">Thêm mới</h2>
            <div class="form-group">
                <label>Mã quận, huyện</label>
                <input type="text" name="code_city" value="<?php if(isset($_POST['code_city'])) {echo $_POST['code_city'];}?>" class="form-control"  placeholder='Nhập mã loại sản phẩm'/>
                <?php
                if (isset($errors) && in_array('code_city',$errors))
                {
                    echo "<p class='results1' >Bạn hãy nhập mã loại thành phố</p>";
                }
                ?>
            </div>

            <div class="form-group">
                <label>Tên quận, huyện</label>
                <input type="text" name="name_city" value="<?php if(isset($_POST['name_city'])) {echo $_POST['name_city'];}?>" class="form-control"  placeholder='Nhập tên loại sản phẩm'/>
                <?php
                if (isset($errors) && in_array('name_city',$errors))
                {
                    echo "<p class='results1' >Bạn hãy nhập tên thành phố</p>";
                }

                ?>
            </div>

            <div class="form-group">
                <label>Thuộc thành phố</label>
                <select name="city" class="city" style="padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
                    <option value="0"> Chưa có </option>
                    <?php 
                        $query = "SELECT id_city, name_city FROM tb_city ORDER BY id_city";
                        $result = mysqli_query($dbc, $query);
                        while ( $rows = mysqli_fetch_array($result, MYSQLI_NUM) ) {
                    ?>
                    <option value="<?php echo $rows[0]; ?>"> <?php echo $rows[1]; ?> </option>
                    <?php    
                        }
                    ?>
                </select>
                <?php
                if (isset($errors) && in_array('city',$errors))
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
    $('.tinh-thanh .quanhuyen').addClass('active-hover');
</script>