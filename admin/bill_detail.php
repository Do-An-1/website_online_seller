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
    <h2 style=" color: red">Chi tiết hóa đơn đã duyệt

    </h2>
    <div class="customer-infomation">

       <!--   <div class="titile">
             Thông tin khách hàng
           </div> -->
           <?php  
         // $code_order = $_GET['code_order'];
         // $query = "SELECT code_order,status_order,name_customer,phone_customer,address_customer,email_customer,order_day ";
         // $result = mysqli_query($dbc, $query); 
           ?>
           <div class="content">
            <div class="row">
              <div class="name"></div>
            </div>
          </div>
        </div>
        <table class="table table-striped"> 
          <thead> 
            <tr><th>STT</th>
              <th>Mã sản phẩm</th>
              <th>Tên Sản Phẩm</th>        
              <th style="padding-left: 55px">Số Lượng</th>
              <th>Giá</th>
              <th>Tình trạng</th>
            </tr>
          </thead>
          <tbody>
            <!--  -->
            <?php 
            $code_bill = $_GET['code_bill'];
            $query = "SELECT  tb_order.id_product, tb_order.size_product, tb_order.quantity_product, tb_product.name_product,tb_product.saleprice_product, tb_product.code_product, tb_order.code_order FROM tb_product, tb_order, tb_bill WHERE tb_bill.id_order = tb_order.id_order &&  tb_product.id_product=tb_order.id_product && code_bill = $code_bill  GROUP BY tb_order.id_product ORDER BY tb_order.id_product ASC";
            $result = mysqli_query($dbc, $query);
            $stt =1;
            $tongsotien = 0;
            while ($order = mysqli_fetch_array($result, MYSQLI_NUM)) {

              $check_product = check_product($order[0],$order[1] , $order[2]);
              ?>
              <tr style="<?php echo ($check_product) ? 'color: #bd0103' : '';?>">
                <th ><?php echo $stt; ?></th>
                <td><?php echo $order[5]; ?></td>
                <td> <?php echo $order[3]; ?></td>
                <td>
                  <?php 
                  $query_quantity =  "SELECT size_product,quantity_product FROM  tb_order WHERE code_order= $order[6] && id_product = $order[0]";
                  $result_quantity = mysqli_query($dbc, $query_quantity);
                  $saleprice_product = $order[4];
                  $quantity_product =0;
                  while ($order_quantity = mysqli_fetch_array($result_quantity, MYSQLI_NUM)) {
                   $quantity_product += $order_quantity[1];
                   $tongsotien += ($quantity_product*$saleprice_product);
                   ?>                         
                   <div><?php echo "Size " . $order_quantity[0] . " : " . $order_quantity[1]; ?></div>
                   <?php 
                 } 
                 ?>
               </td>
               <td style="font-family: georgia"><?php echo number_format($quantity_product*$saleprice_product, 0, ',', '.') . " đ" ; ?></td>
               <td><?php echo ($check_product) ? 'Không đủ hàng' : 'Còn hàng';  ?></td>
             </tr>
             <?php 
             $stt++;
           } 
           ?>
           <tr>
            <th colspan="1">Tổng tiền :</th>
            <td colspan="3" style="font-family: georgia">
               <?php echo number_format($tongsotien, 0, ',', '.'). " đ"; ?>
             </td>
           </tr>
         </tbody>
       </table>
       <div class="col-xs-12 text-center">
        <a href="list_bill.php" class="btn btn-primary">Quay về danh danh sách hóa đơn</a>
      </div>
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