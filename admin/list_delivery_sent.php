<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/15/2017
 * Time: 4:40 PM
 */
?>
<?PHP 
    include('includes/header.php');
    include('inc/function.php');
?>
    <div class="row">
        <div class="col-xs-12">
            <h3 style=" color: red;">Danh sách giao hàng đã gửi</h3> 
            <table class="table table-striped"> 
                <thead> 
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Mã ship</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt hàng</th>
                        <th class="text-center">Xem chi tiết</th>
                        <th class="text-center">Đã nhận</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT code_ship, name_customer, phone_customer,address_customer,order_day,code_bill, tb_district.name_district, tb_city.name_city FROM tb_order,tb_bill,tb_ship, tb_district, tb_city  WHERE tb_district.id_city = tb_city.id_city && tb_district.id_district = tb_order.id_district && tb_order.id_order = tb_bill.id_order && tb_bill.id_bill = tb_ship.id_bill &&  status_ship = '1'  GROUP BY code_ship";
                        $result = mysqli_query($dbc,$query);
                        kt_query($query, $result);
                        while ($order = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        ?>                    
                    <tr>
                         <td><?php echo $order[5]; ?></td>
                        <td><?php echo $order[0]; ?></td>
                        <td><?php echo $order[1]; ?></td>
                        <td><?php echo $order[2]; ?></td>
                        <td><?php echo $order[3]. ", " . $order[6]. ", " . $order[7]; ?></td>
                        <td><?php $date=date_create($order[4]);
                            echo date_format($date,"H:i - d/m/Y"); ?></td>
                        <td class="text-center"><a href="delivery_detail.php?code_ship=<?php echo $order[0]; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        <td class="text-center"><a onClick="return confirm('Hóa đơn đã được gửi');" href="functions/review_ship_sent.php?code_ship=<?php echo $order[0]; ?>"><i class="glyphicon glyphicon-ok"></i></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
    </div>  



<?PHP 
    include('includes/footer.php');
?>

<script language="JavaScript">
    function chkallClick(o) {
        var form = document.frmForm;
        for (var i = 0; i < form.elements.length; i++) {
            if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
                form.elements[i].checked = document.frmForm.chkall.checked;
            }
        }
    }
</script>
<script type="text/javascript">
    $('.giao-hang .collapse').addClass('in');
    $('.giao-hang .giaohang').css({'background-color': '#e1e1e1'});
</script>