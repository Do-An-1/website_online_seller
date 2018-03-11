<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/18/2017
 * Time: 8:39 AM
 */
?>

<?php
session_start();
?>

<html>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 21cm;
        overflow: hidden;
        min-height: 297mm;
        padding: 2.5cm;
        margin-left: auto;
        margin-right: auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }

    @page {
        size: A4;
        margin: 0;
    }

    button {
        width: 100px;
        height: 24px;
    }

    .header {
        overflow: hidden;
    }

    .logo {
        background-color: #FFFFFF;
        text-align: left;
        float: left;
    }

    .company {
        padding-top: 24px;
        text-transform: uppercase;
        background-color: #FFFFFF;
        text-align: right;
        float: right;
        font-size: 16px;
    }

    .title {
        text-align: center;
        position: relative;
        color: black;
        font-size: 24px;
        top: 1px;
    }

    .footer-left {
        text-align: center;
        text-transform: uppercase;
        padding-top: 24px;
        position: relative;
        height: 150px;
        width: 50%;
        color: #000;
        float: left;
        font-size: 12px;
        bottom: 1px;
    }

    .footer-right {
        text-align: center;
        text-transform: uppercase;
        padding-top: 24px;
        position: relative;
        height: 150px;
        width: 50%;
        color: #000;
        font-size: 12px;
        float: right;
        bottom: 1px;
    }

    .TableData {
        background: #ffffff;
        font: 11px;
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 12px;
        border: thin solid #d3d3d3;
    }

    .TableData TH {
        background: rgba(0, 0, 255, 0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }

    .TableData TR {
        height: 24px;
        border: thin solid #d3d3d3;
    }

    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border: thin solid #d3d3d3;
    }

    .TableData TR:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    .TableData .cotSTT {
        text-align: center;
        width: 10%;
    }

    .TableData .cotTenKhachHang {
        text-align: center;
        width: 10%;
    }

    .TableData .cotTenSanPham {
        text-align: left;
        width: 40%;
    }

    .TableData .cotHangSanXuat {
        text-align: left;
        width: 20%;
    }

    .TableData .cotGia {
        text-align: right;
        width: 120px;
    }

    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }

    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }

    .TableData .tong {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
    }

    .TableData .tratruoc {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
    }

    .TableData .chietkhau {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
    }

    .TableData .thanhtoan {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
    }

    .TableData .cotSoLuong input {
        text-align: center;
    }

    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body>
<script>
    function myPrint() {
        window.print();
    }
</script>

<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="../images/logo.jpg" style="height: 60px; width: 120px;"/></div>
        <div class="company"><strong>3T SHOP </strong></div>
    </div>
    <br/>
    <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
    </div>
    <br/>
    <br/>
    <table class="TableData">
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        $tongsotien = 0;
        if (isset($_SESSION['giohang'])) {

            $tongsotien = 0; $pos = 1;
            foreach ($_SESSION['giohang'] as $i => $row) {
                $tongsotien += $row['sp_soluong'] * $row['sp_dongia'];
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenKhachHang\">" . $row['sp_ten'] . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $row['sp_ten'] . "</td>";
                echo "<td class=\"cotGia\"><div id='giasp" . $row['sp_id'] . "' name='giasp" . $row['sp_id'] . "' value='" . $row['sp_dongia'] . "'>" . number_format($row['sp_dongia'], 0, ",", ".") . "</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $row['sp_soluong'] . "</td>";
                echo "<td class=\"cotSo\">" . number_format(($row['sp_soluong'] * $row['sp_dongia']), 0, ",", ".") . "</td>";
                echo "</tr>";
            }
        }
        ?>

        <td colspan="4" class="tong"> Tổng cộng </td>
        <td class="cotSo"><?php echo number_format(($tongsotien), 0, ",", ".") ?></td>

        <tr>
            <td colspan="4" class="chietkhau"> Chiết khấu </td>
            <td class="cotSo">0</td>
        </tr>
        <tr>
            <td colspan="4" class="thanhtoan"> Thanh toán </td>
            <td class="cotSo">0</td>
        </tr>
    </table>
    <?php $date = getdate(); ?>
    <div class="footer-left"><br/><br><strong>Khách hàng</strong><br>(Kí và ghi rõ họ tên)</div>

    <div class="footer-left"><strong>Cần Thơ, Ngày <?php echo $date['mday']; ?> Tháng <?php echo $date['mon'] ?>
        Năm <?php echo $date['year'] ?> </strong> <br/>
        <br><strong>Nhân viên</strong><br>(Kí và ghi rõ họ tên)
    </div>
</body>
<!--<input type="button" value="In hóa đơn" onclick="this.style.display ='none'; window.print()" />-->
<input type="button"  id="print" value="In hóa đơn"  />
<script>
	$(document).ready(function(){
		
	})
</script
</html>