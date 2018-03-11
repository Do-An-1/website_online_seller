<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10/24/2017
 * Time: 10:40 AM
 */
?>

<?PHP include('includes/header.php'); ?>
<style>
    .results{color:#009966;}
    .results1{color:#FF0000;}
</style>
<form name="frmadd-shiper" method="post" action="">
    <h2 style="color: #FF0000">Thêm mới</h2>
    <div class="form-group">
        <label>Mã đơn hàng</label>
    </div>

    <div class="form-group">
        <label>Mã sản phẩm</label>
    </div>

    <div class="form-group">
        <label>Tên sản phẩm</label>
    </div>

    <div class="form-group">
        <label>Số lượng</label>
    </div>

    <div class="form-group">
        <label>Chiết khấu</label>
    </div>

    <div class="form-group">
        <label>Thành tiền</label>
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
</form>
<?php include ('includes/footer.php');?>
