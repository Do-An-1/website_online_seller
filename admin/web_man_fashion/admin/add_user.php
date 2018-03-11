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
                if (empty($_POST['account'])) {
                    $errors[] = 'account';
                } else {
                    $taikhoan = $_POST['account'];
                }

                if (empty($_POST['pass'])) {
                    $errors[] = 'pass';
                } else {
                    $matkhau = md5($_POST['pass']);
                }
                if (trim($_POST['pass']) != trim($_POST['repass'])) {
                    $errors[] = 'repass';
                }

                if (empty($_POST['name'])) {
                    $errors[] = 'name';
                } else {
                    $hoten = $_POST['name'];
                }

                if (empty($_POST['birthday'])) {
                    $errors[] = 'birthday';
                } else {
                    $birthday = $_POST['birthday'];
                }

                if (empty($_POST['cmnd'])) {
                    $errors[] = 'cmnd';
                } else {
                    $cmnd = $_POST['cmnd'];
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
                $status = $_POST['status'];

                if (empty($errors)) {
                    $query = "SELECT account_user FROM tb_user WHERE account_user='{$taikhoan}'";
                    $result = mysqli_query($dbc, $query);
                    kt_query($query, $result);

                    $query2 = "SELECT email_user FROM tb_user WHERE email_user='{$email}'";
                    $result2 = mysqli_query($dbc, $query2);
                    kt_query($query2, $result2);

                    $query3="SELECT birthday_user FROM tb_user WHERE birthday_user='{$birthday}'";
                    $result3=mysqli_query($dbc,$query3);
                    kt_query($query3,$result3);

                    if (mysqli_num_rows($result) == 1) {
                        $message = "<p class='results1'>Tài khoản đã tồn tại</p>";
                    } elseif (mysqli_num_rows($result2) == 1) {
                        $message = "<p class='results1'>Email đã tồn tại</p>";
                    }
                    elseif (mysqli_num_rows($result3)==1){
                        $message="<p class='results1'>Số chứng minh nhân dân đã tồn tại</p>";
                    }
                    else {
                        $query_in = "INSERT INTO tb_user(account_user,pass_user,name_user,birthday_user,cmnd_user,phonenumber_user,email_user,address_user,status_user)
									VALUES('{$taikhoan}','{$matkhau}','{$hoten}','{$birthday}','{$cmnd}','{$dienthoai}','{$email}','{$diachi}',{$status})
						";
                        $result_in = mysqli_query($dbc, $query_in);
                        kt_query($query_in, $result_in);

                        if ($result_in == 1) {
                            echo "<p class='results'>Thêm mới thành công</p>";
                            $_POST['account'] = "";
                            $_POST['pass'] = "";
                            $_POST['name'] = "";
                            $_POST['cmnd'] = "";
                            $_POST['phone'] = "";
                            $_POST['email'] = "";
                            $_POST['address'] = "";
                            $_POST['repass'] = "";
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
                <h2 style="color: red;">Thêm mới User</h2>
                <div class="form-group">

                    <label>Tài khoản</label>
                    <input type="text" name="account" value="<?php if (isset($_POST['account'])) {
                        echo $_POST['account'];
                    } ?>" class="form-control" placeholder='Tài khoản'/>

                    <?php
                    if (isset($errors) && in_array('account', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập Tài khoản</p>";
                    }

                    ?>

                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="pass" maxlength="20" value="<?php if (isset($_POST['pass'])) {
                        echo $_POST['pass'];
                    } ?>" class="form-control" placeholder='Nhập mật khẩu - tối đa 20 ký tự'/>

                    <?php
                    if (isset($errors) && in_array('pass', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập mật khẩu</p>";
                    }

                    ?>
                </div>

                <div class="form-group">
                    <label>Xác nhận mật khẩu</label>
                    <input type="text" name="repass" maxlength="20" value="<?php if (isset($_POST['repass'])) {
                        echo $_POST['repass'];
                    } ?>" class="form-control" placeholder='Xác nhận mật khẩu'/>

                    <?php
                    if (isset($errors) && in_array('repass', $errors)) {
                        echo "<p class='results1' >Mật khẩu không trùng khớp</p>";
                    }

                    ?>
                </div>

                <div class="form-group">
                    <label>Loại tài khoản : </label>
                    <select name="type_user" style="padding:5px 10px;border-radius:4px;display: block;">
                        <option value="" style="color: #999">- - - Chưa có loại tài khoản - - -</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
                        echo $_POST['name'];
                    } ?>" class="form-control" placeholder='Họ tên'/>

                    <?php
                    if (isset($errors) && in_array('name', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập họ tên</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="birthday" value="<?php if (isset($_POST['birthday'])) {
                        echo $_POST['birthday'];
                    } ?>" class="form-control" placeholder='Ngày sinh'/>

                    <?php
                    if (isset($errors) && in_array('birthday', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập ngày sinh</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Số CMND</label>
                    <input type="text" name="cmnd" minlength="9" maxlength="13" value="<?php if (isset($_POST['cmnd'])) {
                        echo $_POST['cmnd'];
                    } ?>" class="form-control" placeholder='Nhập chứng minh nhân dân'/>

                    <?php
                    if (isset($errors) && in_array('cmnd', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập số chứng minh nhân dân</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="phone" maxlength="11" value="<?php if (isset($_POST['phone'])) {
                        echo $_POST['phone'];
                    } ?>" class="form-control" placeholder='Điện thoại'/>

                    <?php
                    if (isset($errors) && in_array('phone', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập điện thoại</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
                        echo $_POST['email'];
                    } ?>" class="form-control" placeholder='Email'/>

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
                    } ?>" class="form-control" placeholder='Địa chỉ'/>

                    <?php
                    if (isset($errors) && in_array('address', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập địa chỉ</p>";
                    }

                    ?>
                </div>

                <div class="form-group">
                    <label style="display:block">Trạng thái</label>
                    <label class="radio-inline"> <input type="radio" name="status" value="1" checked="checked"/>
                        <p class="results"> Hoạt động</p></label>
                    <label class="radio-inline"> <input disabled type="radio" name="status" value="0"/>
                        <p class="results1"> Không hoạt động</p></label>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>