<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/14/2017
 * Time: 12:25 AM
 */
?>

<?php
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

        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM tb_user WHERE id_user={$uid}";
        $result = mysqli_query($dbc, $query);
        $hienthi = mysqli_fetch_array($result, MYSQLI_ASSOC);
        kt_query($query, $result);
        //kiem tra id có tồn tại không
        if (mysqli_num_rows($result)) {

        } else {
            $message = "<p class='results1'>ID không tồn tại</p>";
        }
        ?>

        <h3>Profiles User</h3>
        <div class="form-group">
            <label>Tài khoản</label>
            <input readonly type="text" name="account" value="<?php if (isset($_POST['account'])) {
                echo $_POST['account'];
            }
            echo $hienthi['account_user']; ?>" class="form-control" placeholder='Tài khoản'/>

            <?php
            if (isset($errors) && in_array('account', $errors)) {
                echo "<p class='results1' >Bạn hãy nhập Tài khoản</p>";
            }

            ?>
        </div>

        <!--<div class="form-group">
            <label>Mật khẩu</label>
            <input readonly type="text" name="pass" value="<?php if (isset($_POST['pass'])) {
                echo $_POST['pass'];
            }
            echo $hienthi['pass_user']; ?>" class="form-control" placeholder='Mật khẩu'/>

            <?php
            if (isset($errors) && in_array('pass', $errors)) {
                echo "<p class='results1' >Bạn hãy nhập mật khẩu</p>";
            }

            ?>
        </div>-->

        <div class="form-group">
            <label>Họ tên</label>
            <input readonly type="text" name="name" value="<?php if (isset($_POST['name'])) {
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
            <label>Điện thoại</label>
            <input readonly type="text" name="phone" value="<?php if (isset($_POST['phone'])) {
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
            <input readonly type="text" name="email" value="<?php if (isset($_POST['email'])) {
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
            <input readonly type="text" name="address" value="<?php if (isset($_POST['address'])) {
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
            <label class="radio-inline"> <input disabled type="radio" name="status" value="1" checked="checked"/>
                <p class="results">Hoạt động</p></label>
            <label class="radio-inline"> <input disabled type="radio" name="status" value="0"/>
                <p class="results1">Không hoạt động</p></label>
        </div>


    </div>
</div>
<?php
    include ('includes/footer.php');
?>
