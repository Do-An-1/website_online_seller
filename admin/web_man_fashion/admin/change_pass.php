<?PHP
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


    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <?php
            include('../inc/myconnect.php');
            include('../inc/function.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $present_password = $_POST['present_password'];
                $new_password =$_POST['new_password'];
                $query = "SELECT id_user,pass_user FROM tb_user WHERE pass_user=md5({$present_password}) AND id_user={$_SESSION['uid']}";
                $results = mysqli_query($dbc, $query);
                kt_query($results, $query);
                if (mysqli_num_rows($results) == 1) {
                    if (trim($_POST['new_password']) != trim($_POST['confirm_password'])) {
                        $message = "<p class='results1'>Mật khẩu mới không giống nhau</p>";
                    } else {
                        $query_update = "UPDATE tb_user SET pass_user=md5($new_password) WHERE id_user={$_SESSION['uid']}";
                        $results_update = mysqli_query($dbc, $query_update);
                        kt_query($results_update, $query_update);
                        if (mysqli_num_rows($dbc) == 1) {
                            $message = "<p class='results'>Đổi mật khẩu thành công</p>";
                        } else {
                            $message = "<p class='results1'>Đổi mật khẩu không thành công</p>";
                        }
                    }
                } else {
                    $message = "<p class='results1'>Mật khẩu cũ không đúng</p>";
                }
            }
            ?>
            <form name="frmchange-password" method="post">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <h3>Change Password</h3>
                <div class="form-group">

                    <label>Account User</label>
                    <input readonly type="text" name="account" value="<?php echo $_SESSION['taikhoan'] ?>" class="form-control"
                           placeholder='Nhập tên tài khoản'/>
                </div>

                <div class="form-group">
                    <label>Present Password</label>
                    <input type="text" name="present_password" value="" class="form-control"
                           placeholder='Nhập mật khẩu hiện tại'/>
                    <?php
                    if (isset($errors) && in_array('name_category', $errors)) {
                        echo "<p class='results1' >Nhập mật khẩu cũ</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="text" name="new_password" value="" class="form-control"
                           placeholder='Nhập mật khẩu mớ
                           i'/>
                    <?php
                    if (isset($errors) && in_array('name_category', $errors)) {
                        echo "<p class='results1' >Nhập mật khẩu mới</p>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="text" name="confirm_password"  value="" class="form-control"
                           placeholder='Xác nhận mật khẩu'/>
                    <?php
                    if (isset($errors) && in_array('name_category', $errors)) {
                        echo "<p class='results1' >Xác nhận mật khẩu</p>";
                    }
                    ?>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Change"/>

            </form>
        </div>
    </div>
<?PHP include('includes/footer.php'); ?>