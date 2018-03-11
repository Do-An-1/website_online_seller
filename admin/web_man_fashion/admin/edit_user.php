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

            //
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
                $id = $_GET['id'];


            } else {
                header("Location: list_user.php");
                exit();
            }

            //bat dau submit
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
                    $query_in = "UPDATE tb_user SET account_user='$taikhoan',
                                                        pass_user='$matkhau',
                                                        name_user='$hoten',
                                                        birthday_user='$birthday',
                                                        cmnd_user = '$cmnd',
                                                        phonenumber_user='$dienthoai',
                                                        address_user='$diachi',
                                                        email_user='$email',
                                                        status_user='$status' WHERE id_user='$id'";
                    $result_in = mysqli_query($dbc, $query_in);
                    kt_query($query_in, $result_in);

                    if ($result_in == 1) {
                        echo "<p class='results'>Chỉnh sửa thành công</p>";
                        $_POST['account'] = "";
                        $_POST['pass'] = "";
                        $_POST['name'] = "";
                        $_POST['cmnd']="";
                        $_POST['phone'] = "";
                        $_POST['email'] = "";
                        $_POST['address'] = "";
                        $_POST['repass'] = "";
                    } else {
                        echo "<p class='results1'>Chỉnh sửa không thành công</p>";
                    }
                } else {

                    $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                }
            }
            //ket thuc submit

            $query = "SELECT * FROM tb_user WHERE id_user={$id}";
            $result = mysqli_query($dbc, $query);
            $hienthi = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
                <h3>Chỉnh sửa User</h3>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" name="account" value="<?php if (isset($_POST['account'])) {
                        echo $_POST['account'];
                    }
                    echo $hienthi['account_user']; ?>" class="form-control" placeholder='Tài khoản'/>

                    <?php
                    if (isset($errors) && in_array('account', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập Tài khoản</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="pass" maxlength="20" value="<?php if (isset($_POST['pass'])) {
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
                    <input type="password" name="repass" maxlength="20" value="<?php if (isset($_POST['repass'])) {
                        echo $_POST['repass'];
                    } ?>" class="form-control" placeholder='Xác nhận mật khẩu'/>

                    <?php
                    if (isset($errors) && in_array('repass', $errors)) {
                        echo "<p class='results1' >Mật khẩu không trùng khớp</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
                        echo $_POST['name'];
                    }
                    echo $hienthi['name_user']; ?>" class="form-control" placeholder='Họ tên'/>

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
                    }
                    echo $hienthi['birthday_user']; ?>" class="form-control" placeholder='Ngày sinh'/>

                    <?php
                    if (isset($errors) && in_array('birthday', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập ngày sinh</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Số CMND</label>
                    <input type="text" name="cmnd" minlength="9" maxlength="13" value="<?php if (isset($_POST['name'])) {
                        echo $_POST['cmnd'];
                    }
                    echo $hienthi['cmnd_user']; ?>" class="form-control" placeholder='Chứng minh nhân dân'/>

                    <?php
                    if (isset($errors) && in_array('cmnd', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập họ tên</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="phone" value="<?php if (isset($_POST['phone'])) {
                        echo $_POST['phone'];
                    }
                    echo $hienthi['phonenumber_user']; ?>" class="form-control" placeholder='Điện thoại'/>

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
                    }
                    echo $hienthi['email_user']; ?>" class="form-control" placeholder='Email'/>

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
                    }
                    echo $hienthi['address_user']; ?>" class="form-control" placeholder='Địa chỉ'/>

                    <?php
                    if (isset($errors) && in_array('address', $errors)) {
                        echo "<p class='results1' >Bạn hãy nhập địa chỉ</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label style="display:block">Trạng thái</label>
                    <label class="radio-inline"> <input type="radio" name="status" value="1" checked="checked"/>
                        <p class="results">Hoạt động</p></label>
                    <label class="radio-inline"> <input type="radio" name="status" value="0"/>
                        <p class="results1">Không hoạt động</p></label>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Chỉnh sửa"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>