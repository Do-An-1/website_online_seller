<?PHP include('includes/header.php');?>
<?php include('inc/myconnect.php');?>
<?php include('inc/function.php');?>
<style>
</style>
<form  id="ifm-website">
    <?php
    $query = "SELECT name, value FROM tb_information";
    $result = mysqli_query($dbc, $query);
    $array_information = array();
    while ( $value = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $array_information[$value['name']] = $value['value']; 
    }

        // echo "<pre>";
        // print_r($array_information);
        // echo "</pre>";
    ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td colspan="2" class="text-center title">THÔNG TIN SHOP</td>
            </tr>
            <!--  -->
            <tr class="wrap-name">
                <td>
                 <label class="text-label">Tên Shop: </label>
             </td>
             <td>
                 <table class="table wrap-value">
                     <tbody>
                         <tr>
                             <td>
                                 <div class="text-value"><?php if ( array_key_exists("name", $array_information) ) {
                                    echo $array_information['name'];
                                } ?></div>   
                            </td>
                            <td>
                             <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
                         </td>
                     </tr>

                 </tbody>
             </table> 
             <div class="text-success notifi">Lưu Thành Công</div>


         </td>
     </tr>
     <!--  -->
     <tr class="wrap-description">
        <td>
         <label class="text-label">Mô tả: </label>
     </td>
     <td>    
        <table class="table wrap-value">
         <tbody>
             <tr>
                 <td>
                     <div class="text-value">
                        <?php if ( array_key_exists("description", $array_information) ) {
                            echo trim($array_information['description']);
                        } ?>

                    </div>   
                </td>
                <td>
                 <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
             </td>
         </tr>
     </tbody>
 </table> 
 <div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
<!--  -->
   <tr class="wrap-fb">
        <td>
            <label class="text-label">Link facebook: </label>
        </td>
         <td>
            <table class="table wrap-value">
                 <tbody>
                     <tr>
                         <td>
                             <div class="text-value"><?php if ( array_key_exists("fb", $array_information) ) {
                                echo $array_information['fb'];
                            } ?></div>   
                        </td>
                        <td>
                         <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
                     </td>
                 </tr>

             </tbody>
            </table> 
            <div class="text-success notifi">Lưu Thành Công</div>
     </td>
     </tr>
<!--  -->
<tr class="wrap-logo-header">
    <td>
     <label class="text-label">Logo Header: </label>
 </td>
 <td>
    <form action="" method="POST" role="form">
        <table class="table wrap-value">
         <tbody>
             <tr>
                 <td>
                    <div class="item">
                        <img src="../<?php if ( array_key_exists('logo_header', $array_information) ) {
                            echo $array_information['logo_header'];
                        } ?>" class="item-img">
                        <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                        <input type="file" name="img" class="file">
                    </div> 

                </td>
            </tr>
        </tbody>
    </table> 
</form>
<div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
<!--  -->
<tr class="wrap-logo-footer">
    <td>
     <label class="text-label">Logo Footer: </label>
 </td>
 <td>
    <form action="" method="POST" role="form">
        <table class="table wrap-value">
         <tbody>
             <tr>
                 <td>
                    <div class="item">
                        <img src="../<?php if ( array_key_exists('logo_footer', $array_information) ) {
                            echo $array_information['logo_footer'];
                        } ?>" class="item-img">
                        <div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
                        <input type="file" name="img" class="file">
                    </div> 

                </td>
            </tr>
        </tbody>
    </table> 
</form>
<div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
<!--  -->
<tr class="wrap-phone">
 <td>
     <label class="text-label">Số điện thoại: </label>
 </td>
 <td>
    <table class="table wrap-value">
     <tbody>
        <?php if ( array_key_exists('phone', $array_information) ) {
                                // echo $array_information['phone'];
            $array_phone = explode(" ", $array_information['phone']);
            for ($i=1; $i < count( $array_phone ); $i++) { 


                ?> 
                <tr class="wrap-right">
                 <td>
                     <div class="text-value"><?php echo $array_phone[$i]; ?></div>   
                 </td>
                 <td>
                     <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
                 </td>
                 <td>
                     <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                 </td>
             </tr>
             <?php 
         }
     }
     ?>
     <tr class="add-new">
        <td> + Thêm mới</td>
    </tr>

</tbody>
</table> 
<div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
<!--  -->
<tr class="wrap-email">
    <td>
     <label class="text-label">Email: </label>
 </td>
 <td>
    <table class="table wrap-value">
     <tbody>
        <?php if ( array_key_exists('email', $array_information) ) {
                                // echo $array_information['phone'];
            $array_email = explode(" ", $array_information['email']);
            for ($i=1; $i < count( $array_email ); $i++) { 


                ?> 
                <tr class="wrap-right">
                 <td>
                     <div class="text-value"><?php echo $array_email[$i]; ?></div>   
                 </td>
                 <td>
                     <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
                 </td>
                 <td>
                     <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                 </td>
             </tr>
             <?php 
         }
     }
     ?>
     <tr class="add-new">
        <td> + Thêm mới</td>
    </tr>

</tbody>
</table> 
<div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
<!--  -->
<tr class="wrap-adress">
    <td>
     <label class="text-label">Địa chỉ: </label>
 </td>
 <td>
    <table class="table wrap-value">
     <tbody>
        <?php 
        if ( array_key_exists('adress', $array_information) ) {
            if( isset($array_information['adress']) && !empty($array_information['adress']) ){
                $array_adress = explode("$%^$%^", trim($array_information['adress'], "$%^$%^") );
                for ($i=0; $i < count( $array_adress ); $i++) { 
                    ?> 
                    <tr class="wrap-right">
                     <td>
                         <div class="text-value"><?php echo $array_adress[$i]; ?></div>   
                     </td>
                     <td>
                         <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
                     </td>
                     <td>
                         <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                     </td>
                 </tr>
                 <?php 
             }
         }
     }
     ?>
     <tr class="add-new">
        <td> + Thêm mới</td>
    </tr>

</tbody>
</table> 
<div class="text-success notifi">Lưu Thành Công</div>
</td>
</tr>
</tbody>
</table>


</form>

<?PHP include('includes/footer.php');?>
<script type="text/javascript">
    $('.thong-tin-trang .collapse').addClass('in');
    $('.thong-tin-trang .thongtintrang').addClass('active-hover');
</script>