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
        <div class="col-12">
            <h3 style=" color: red">Danh sách hóa đơn</h3>
            <a href="list_bill_review.php" class="btn btn-primary" style="float: right;">Các hóa đơn đã duyệt</a>
            <table class="table table-striped"> 
                <thead> 
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt hàng</th>
                        <th>Xem chi tiết</th>
                        <th>Duyệt</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT code_bill, name_customer, phone_customer,address_customer, order_day, id_product, tb_bill.status_bill, tb_district.name_district, tb_city.name_city FROM tb_order,tb_bill, tb_district, tb_city WHERE tb_district.id_city = tb_city.id_city && tb_district.id_district = tb_order.id_district && tb_bill.id_order = tb_order.id_order && tb_bill.status_bill = '0'  GROUP BY code_bill ORDER BY status_bill";
                        $result = mysqli_query($dbc,$query);
                        kt_query($query, $result);

                        while ($bill = mysqli_fetch_array($result, MYSQLI_NUM)) {              
                        ?>                    
                    <tr >
                        <td><?php echo $bill[0]; ?></td>
                        <td><?php echo $bill[1]; ?></td>
                        <td><?php echo $bill[2]; ?></td>
                        <td><?php echo $bill[3]. ", " . $bill[7]. ", " . $bill[8]; ?></td>
                        <td><?php $date=date_create($bill[4]);
                            echo date_format($date,"H:i - d/m/Y"); ?></td>
                        <td class="text-center"><a href="bill_detail.php?code_bill=<?php echo $bill[0]; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        <?php 
                            if ( $bill[6] == "0" ) {
                         ?>

                       <td class="text-center"><a onClick="return confirm('Bạn muốn chuyển đơn hàng này qua bên giao hàng ?');" href="functions/review_bill.php?code_bill=<?php echo $bill[0]; ?>"><i class="glyphicon glyphicon-ok"></i></a></td>
                        <?php 
                            }
                        ?>
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
    $('.kinh-doanh .collapse').addClass('in');
    $('.kinh-doanh .hoadon').css({'background-color': '#e1e1e1'});
</script>