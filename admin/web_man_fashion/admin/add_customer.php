<?php
/**
 * Created by PhpStorm.
 * customer: Administrator
 * Date: 9/19/2017
 * Time: 9:21 AM
 */
?>

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

        if (isset($_POST['submit'])) {
            $errors = array();
            if (empty($_POST['name'])) {
                $errors[] = 'name';
            } else {
                $hoten = $_POST['name'];
            }

            if (empty($_POST['phone'])) {
                $errors[] = 'phone';
            } else {
                $dienthoai = $_POST['phone'];
            }

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == TRUE) {
                $email = mysqli_real_escape_string($dbc, $_POST['email']);
            } else {
                $errors[] = 'email';
            }

            if (empty($_POST['address'])) {
                $errors[] = 'address';
            } else {
                $diachi = $_POST['address'];
            }
            $type = $_POST['type'];

            if (empty($errors)) {
                $query = "SELECT name_customer FROM tb_customer WHERE name_customer='{$hoten}'";
                $result = mysqli_query($dbc, $query);
                kt_query($query, $result);

                $query2 = "SELECT email_customer FROM tb_customer WHERE email_customer='{$email}'";
                $result2 = mysqli_query($dbc, $query2);
                kt_query($query2, $result2);
                if (mysqli_num_rows($result) == 1) {
                    $message = "<p class='results1'>Khách hàng đã tồn tại</p>";
                } elseif (mysqli_num_rows($result2) == 1) {
                    $message = "<p class='results1'>Email đã tồn tại</p>";
                } else {
                    $query_in = "INSERT INTO tb_customer(name_customer,phonenumber_customer,email_customer,address_customer,type_customer)
									VALUES('{$hoten}','{$dienthoai}','{$email}','{$diachi}',{$type})
						";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Thêm mới thành công</p>";
                        $_POST['name'] = "";
                        $_POST['phone'] = "";
                        $_POST['email'] = "";
                        $_POST['address'] = "";
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
            <h2 style="color: red">Thêm mới khách hàng</h2>
            <div class="form-group">

                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
                        echo $_POST['name'];
                    } ?>" class="form-control" placeholder='Nhập họ tên'/>

                    <?php
                    if (isset($errors) && in_array('name', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập họ tên</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="phone" value="<?php if (isset($_POST['phone'])) {
                        echo $_POST['phone'];
                    } ?>" class="form-control" placeholder='Nhập số điện thoại'/>

                    <?php
                    if (isset($errors) && in_array('phone', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập điện thoại</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php if (isset($_POST['email'])) {
                        echo $_POST['email'];
                    } ?>" class="form-control" placeholder='Nhập email'/>

                    <?php
                    if (isset($errors) && in_array('email', $errors)) {
                        echo "<p class='results1' >Email không hợp lệ</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="<?php if (isset($_POST['address'])) {
                        echo $_POST['address'];
                    } ?>" class="form-control" placeholder='Nhập địa chỉ'/>

                    <?php
                    if (isset($errors) && in_array('diachi', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập địa chỉ</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label style="display:block">Trạng thái</label>
                    <label class="radio-inline"> <input type="radio" name="type" value="1" checked="checked"/>
                        <p class="results"> Khách hàng thân thiết</p></label>
                    <label class="radio-inline"> <input type="radio" name="type" value="0"/>
                        <p class="results1"> Khách hàng V.I.P</p></label>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

        </form>
    </div>
</div>
<?PHP include('includes/footer.php'); ?>
