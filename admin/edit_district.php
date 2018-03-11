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
                header("Location: list_district.php");
                exit();
            }

            //bat dau submit
            if (isset($_POST['submit'])) {
                $errors = array();
                if (empty($_POST['code_district'])) {
                    $errors[] = 'code_district';
                } else {
                    $code = $_POST['code_district'];
                }

                if (empty($_POST['name_district'])) {
                    $errors[] = 'name_district';
                } else {
                    $name = $_POST['name_district'];
                }

                $id_city = $_POST['city'];
                if (empty($errors)) {
                    $query_in = "UPDATE tb_district SET code_district='$code', name_district='$name',id_city='$id_city'  where id_district='$id'";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['code_district'] = "";
                        $_POST['name_district'] = "";
                        unset($_POST['code_district']);
                        unset($_POST['name_district']);
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {
                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }

            //ket thuc submit
            $query = "SELECT * FROM tb_district WHERE id_district={$id}";
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

                <h2 style=" color: red">Chỉnh sửa - quận "<?php echo $dong['name_district']?>"</h2>
                <div class="form-group">
                    <label>Mã quận, huyện</label>
                    <input type="text" name="code_district" value="<?php echo $dong['code_district']; ?>" class="form-control" placeholder='Mã thành phố'/>
                </div>

                <div class="form-group">
                    <label>Tên quận, huyện</label>
                    <input type="text" name="name_district" value="<?php echo $dong['name_district']; ?>" class="form-control" id="name_category" placeholder='Tên thành phố'/>
                </div>
				<div class="form-group">
                	<label>Thuộc thành phố</label>
	                <select name="city" class="district" style="padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
	                    <?php 
	                        $query = "SELECT id_city, name_city FROM tb_city ORDER BY id_city";
	                        $result = mysqli_query($dbc, $query);
	                        while ( $rows = mysqli_fetch_array($result, MYSQLI_NUM) ) {
	                    ?>
	                    <option value="<?php echo $rows[0]; ?>" <?php echo $rows[0] == $dong['id_city'] ? 'selected="selected"' : ''; ?> > <?php echo $rows[1]; ?> </option>
	                    <?php    
	                        }
	                    ?>
	                </select>
	                <?php
	                if (isset($errors) && in_array('district',$errors))
	                {
	                    echo "<p class='results1' >Bạn hãy nhập tên thành phố</p>";
	                }

	                ?>
	            </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>
<script type="text/javascript">
    $('.tinh-thanh .collapse').addClass('in');
    $('.tinh-thanh .quanhuyen').addClass('active-hover');
</script>