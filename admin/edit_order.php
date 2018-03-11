<?PHP include('includes/header.php'); ?>
<style>
    .results{color:#009966;}
    .results1{color:#FF0000;}
    .add-order{
        background: #f1f1f1;
        margin: -30px -30px 0;
        padding: 30px 30px 0;  
    }
    .add-order .title{
        color: red;

    }
    .add-order .info,.add-order .products{
        margin-top: 15px;
        margin-bottom: 15px;
        background: white;
        padding: 15px;
        border-radius: 4px;
        border:1px solid #e1e1e1;
    }
    .add-order .info .title-left,.add-order .products .text-title{
        font-weight: bold;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .add-order .info label{
        font-weight: inherit;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
        display: block;
    }
    .add-order .info .left .date{
        display: inline-block;
        width: 30%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .add-order .info .hour, .add-order .info .minute{
        width: 15%!important;
    }
    .add-order .products .search{
        margin-top: 15px;
    }
    .add-order .products .wrap_size .size_product,.add-order .products .soluong{
         padding: 6px 12px;
         font-size: 14px;
         line-height: 1.42857143;
         color: #555;
         background-color: #fff;
         background-image: none;
         border: 1px solid #ccc;
         border-radius: 4px;
    }
        .errors{font-size: 12px; color:#bd0103;margin: 5px}
</style>

<?php 
    include('../inc/function.php'); 
    if( isset($_GET['code_order']) ) {
        $code_order = $_GET['code_order'];
        $query = "SELECT * FROM tb_order, tb_product,tb_district,tb_city WHERE tb_city.id_city = tb_district.id_city && tb_order.id_district = tb_district.id_district && tb_product.id_product = tb_order.id_product && code_order='{$code_order}'";
        $result = mysqli_query($dbc, $query); 
         extract(mysqli_fetch_assoc($result)); 
    } else {
        header("Location: list_order.php");
    }
    
?>
<div class="add-order">
    <form name="frmadd-shiper" method="post" action="">
        <h3 class="title">Chỉnh sửa Đơn Đặt hàng</h3>
        <div class="row">
            <div class="col-xs-12">
                <div  class="info">
                    <h4 class="text-order">Đặt hàng #<span class="code_order"><?php echo $code_order; ?></span></h4>
                    <div class="row">
                        <div class="col-xs-6 left">
                            <div class="title-left">Chi tiết chung</div>
                            <div class="form-group wrapper-name">
                                <label>Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="<?php echo $name_customer; ?>">
                                <div class="errors"></div>
                                <span class='icon-notify' style='right: 10px'></span>
                            </div>
                            <div class="form-group wrapper-email">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Không bắt buộc" value="<?php echo $email_customer; ?>">
                                <div class="errors"></div>
                                <span class='icon-notify' style='right: 10px'></span>
                            </div>
                         <div class="form-group wrapper-phone_number">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Số điện thoại" value="<?php echo $phone_customer; ?>">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div>  
                        <div class="form-group wrap-date">
                            <label>Thời gian đặt hàng</label>
                            <?php 
                             // echo $order_day;
                                $order_day= date_create($order_day);
                                $date =  date_format($order_day,"Y") ."-". date_format($order_day,"m") . "-" . date_format($order_day,"d"); 

                                $hour =  date_format($order_day,"H"); 
                                $minute =  date_format($order_day,"i");
                            ?>
                            <input type="date" name="date" maxlength="10" value="<?php echo $date; ?>" class="date">
                            @<input type="number" name="hour" class="date hour" value="<?php echo $hour; ?>">
                            :<input type="number" name="munute" class="date minute" value="<?php echo $minute; ?>">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div>
                    </div>
                    <div class="col-xs-6 right">
                        <div class="title-left">Thông tin thanh toán</div>
                        <div class="form-group wrapper-tinhthanh">
                            <label>Chọn tỉnh thành</label>
                            <select name="tinhthanh" class="select tinhthanh form-control">
                                <option value="">--- Chọn tỉnh thành ---</option> 
                                <?php 
                                    $query_tt = "SELECT * FROM tb_city ORDER BY code_city";
                                      $result_tt = mysqli_query($dbc, $query_tt);
                                      while ( $rows = mysqli_fetch_assoc($result_tt) ) {
                                        ?>
                                        <option <?php echo $id_city == $rows['id_city'] ? 'selected="selected"' : '' ?> value="<?php echo $rows['id_city'] ?>"> <?php echo $rows['name_city'] ?> </option>
                                        <?php
                                      }
                                ?>
                                
                            </select>
                            <div class="errors"></div>
                        </div>
                        <div class="form-group wrapper-quanhuyen">
                            <label>Chọn quận huyện</label>
                            <select name="quanhuyen" class="select select-districts form-control">
                                <option value="">Bạn chưa chọn tỉnh thành</option> 
                            </select>
                            <div class="errors"></div>
                        </div> 
                        <div class="form-group wrapper-sonha-tenduong">
                            <label class="name">Địa chỉ</label>
                            <input type="text" name="sonha-tenduong" class="form-control" value=" <?php echo $address_customer; ?>">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="products">
                    <div class="text-title">
                        Sản phẩm
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr style="color: #bd0103">
                                <th>STT</th>
                                <th>Mã sp</th>
                                <th>Tên sp</th>
                                <th>Hình ảnh</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="wrap-product">
                            <?php 
                                $stt = 0;
                                $query = "SELECT tb_order.id_product, tb_product.code_product, tb_product.size_product size_product,tb_order.size_product size_order,tb_order.quantity_product, tb_product.saleprice_product,tb_product.image, tb_product.name_product  FROM tb_order, tb_product WHERE tb_product.id_product = tb_order.id_product && code_order='{$code_order}'";
                                $result = mysqli_query($dbc, $query); 
                                while ( $rows =  mysqli_fetch_assoc($result) ) {
                                    extract($rows);
                                    $array_id_product[] =  $id_product;
                            ?>
                            <tr class="<?php echo $id_product; ?>">
                                <th style="vertical-align: middle;" class="stt_product"><?php echo $stt++; ?></th>
                                <td style="vertical-align: middle;"><?php echo $code_product; ?></td>
                                <td style="vertical-align: middle;"><?php echo $name_product; ?></td>
                                <td style="vertical-align: middle;"><img src="../<?php echo explode(" ", $image)[0]; ?>" width=50></td>
                                <td style="vertical-align: middle;" class="wrap_size">
                                    <select name="size" class="size_product">
                                        <?php 
                                             $array_size = (unserialize($size_product));
                                             foreach ($array_size as $key => $value) {
                                        ?>
                                            <option value="<?php echo $key ?>"><?php echo strtoupper($key); ?></option>
                                        <?php
                                             }
                                        ?>
                                        <?php
                                        ?>
                                    </select>
                                </td>
                                <td style="vertical-align: middle;font-family: georgia" class="gia"><?php  echo number_format($saleprice_product, 0,',','.'); ?></td>
                                <td style="vertical-align: middle;">
                                    <input type="number" class="soluong" name="soluong" value="<?php echo $quantity_product; ?>" min="1" style="width: 60px;text-align: center;" class="form-control" >
                                </td>
                                <td style="vertical-align: middle;font-family: georgia" class="tong-tien"><?php echo number_format($saleprice_product*$quantity_product, 0,',','.'); ?></td>
                                <td style="vertical-align: middle;" class="delete_product" style="color:red;cursor:pointer"><i style="color:red;cursor:pointer" class="fa fa-times" aria-hidden="true"></i></td>
                             </tr>
                             <?php 
                                }
                             ?>
                            <tr class="wrap-search">
                                <td colspan="8">
                                    <input type="text" name="search" class="search form-control" placeholder="Gõ sản phẩm tìm kiếm">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 text-center">
                <div class="btn btn-primary guidonhang" style="margin-bottom: 25px;">Lưu</div>
            </div>
        </div>
    </form>
</div>
<?php include ('includes/footer.php');?>

<!--  -->
<script type="text/javascript">
    $('.kinh-doanh .collapse').addClass('in');
    $('.kinh-doanh .dathang').css({'background-color': '#e1e1e1'});
</script>


<!-- Tạo seession sản pham đã có -->
<script>
    <?php 
        foreach (array_unique($array_id_product) as $key => $value) {
            ?>
            $.ajax({
                url: 'functions/qr_product.php',
                type : "get",
                data: {id: <?php echo $value ?>},
                dataType:"json",
                success: function(dt){
                    update_quanlity(<?php echo $value?>);
                }
            });
            <?php
        }
    ?>
</script>
<!--  -->
<script type="text/javascript">
    <?php
    unset($_SESSION['order']);
    $query="SELECT * FROM tb_product ORDER BY id_product";
    $result = mysqli_query($dbc, $query);
    ?>
    var availableTags = [
    <?php foreach ($result as $value) { 
        echo "{". 'value: '. "'" .$value['code_product']."-".$value['name_product']. "'" .",".'data: '. "'" . $value['id_product'] . "'" ."}".",";
    } ?>
    ];
    var stt_product = 0;
    $(".add-order .products .search").autocomplete({
         source: availableTags,
         select: function(e, ui) {
            var id = ui.item.data; 

            $.ajax({
                url: 'functions/qr_product.php',
                type : "get",
                data: {id: ui.item.data},
                dataType:"json",
                success: function(dt){
                    // console.log(dt);
                    var str_size = '';
                    var default_size = '';
                    var stt = 1;
                    for(key in dt['size_product']) {
                        str_size += '<option value="'+ key +'">' + key.toUpperCase() +  '</option>';
                        if( stt == 1 ) { default_size = key; stt++;}
                    } 
                    
                    stt_product++;
                    $('.wrap-search').before(`
                        <tr class="`+dt['id_product']+`">
                            <th style="vertical-align: middle;" class="stt_product">` + stt_product +`</th>
                            <td style="vertical-align: middle;">` + dt['code_product'] + `</td>
                            <td style="vertical-align: middle;">` + dt['name_product'] + `</td>
                            <td style="vertical-align: middle;"> <img width=50 src='` + dt['image'].split(" ", 1) + `' /></td>
                            <td style="vertical-align: middle;" class="wrap_size"> <select name="size" class="size_product">` + str_size + `</select></td>
                            <td style="vertical-align: middle;font-family: georgia" class="gia">` + dt['saleprice_product'] + `</td>
                            <td style="vertical-align: middle;">` + `<input type="number" class="soluong" name="soluong" value="1" min="1" style="width: 60px;text-align: center;" class="form-control" >` + `</td>
                            <td style="vertical-align: middle;font-family: georgia" class="tong-tien">` + dt['tong_gia'] +`</td>
                            <td style="vertical-align: middle;" class="delete_product" style="color:red;cursor:pointer"><i style="color:red;cursor:pointer" class="fa fa-times" aria-hidden="true"></i></td>
                        </tr>
                        `);
                    $(".add-order .products .search").val('');
                    update_quanlity(dt['id_product'], default_size, 1);

                }
            });
        }
    });
    function update_quanlity(id_product) {

        var array_quanlity = new Array();
        var json_quanlity = {};
        var array_size = new Array();
        $('.'+id_product).each(function(index){
            if ( array_quanlity[$(this).find('.size_product').val()] == undefined ) {
                var size = $(this).find('.size_product').val();
                var quantily = parseInt($(this).find('.soluong').val());
                array_size.push(size);
                array_quanlity[size] = quantily;
                // console.log(array_quanlity);
            } else {
                array_quanlity[$(this).find('.size_product').val()] += parseInt($(this).find('.soluong').val());
            }
            array_size.forEach(function(element) {
                json_quanlity[element] = array_quanlity[element];
            });
            // console.log(json_quanlity);

        })
        $.ajax({
            url: 'functions/ud_quanlity.php',
            type : "get",
            data: {id_product: id_product, array_quanlity: json_quanlity},
            dataType:"text",
            success: function(dt){
                console.log(dt);
            }
        });
        /* sắp xếp lại stt */
            var stt_product_delete = 0;
            $('.stt_product').each(function(){
                stt_product_delete++;
                $(this).html(stt_product_delete);
            })
            stt_product = stt_product_delete;
        /*end sắp xếp lại stt*/
    }
    $('body').on('change', '.size_product', function(){
        update_quanlity($(this).parent().parent().attr('class'));
    })
    $('body').on('change', '.soluong', function(){
        if( $(this).parent().parent().find('.soluong').val() < 1 ){
            alert("Số lượng phải lớn hơn bằng 1");
            $(this).parent().parent().find('.soluong').val("1");

            update_quanlity($(this).parent().parent().attr('class'));

            var sl = $(this).parent().parent().find('.soluong').val();
            var gia = $(this).parent().parent().find('.gia').text().replace('.', '');
            var tong_tien = formatter.format(sl*gia).replace(',', '.');
            $(this).parent().parent().find('.tong-tien').text(tong_tien);
        } else {
            update_quanlity($(this).parent().parent().attr('class'));

            var sl = $(this).parent().parent().find('.soluong').val();
            var gia = $(this).parent().parent().find('.gia').text().replace('.', '');
            var tong_tien = formatter.format(sl*gia).replace(',', '.');
            $(this).parent().parent().find('.tong-tien').text(tong_tien);
        }
        

    })
    /* Delete*/
    $('body').on('click', '.delete_product', function(){
            var str_class = $(this).parent().attr('class');
            $(this).parent().remove();
            update_quanlity(str_class);
            /* sắp xếp lại stt */
            var stt_product_delete = 0;
            $('.stt_product').each(function(){
                stt_product_delete++;
                $(this).html(stt_product_delete);
            })
            stt_product = stt_product_delete;
            /*end sắp xếp lại stt*/
    })
    /* */
    /* Format tiền tệ */
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'decimal',
      currency: 'VND',
      minimumFractionDigits: 0,
    });
    /* 2,500,000 */
</script>
<script type="text/javascript">
    window.onload = function(){
                $("input[name='name']").focusout(function(){
        if($(this).val()){
            // nếu chiều dài giá trị < 3 || > 20
            if ( $(this).val().length < 3 ||  $(this).val().length > 20 ) {
                $(this).parent().removeClass("has-success has-feedback");
                $(this).parent().addClass("has-error has-feedback");
                $(this).next(".errors").css({"opacity":1});
                $(this).next(".errors").html("Họ tên phải nằm trong khoảng từ 3-20 kí tự !!");
                $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }else{
                 $(this).parent().removeClass("has-error has-feedback");
                $(this).parent().addClass("has-success has-feedback");
                $(this).next(".errors").css({"opacity":0});
                $(this).next(".errors").html("...");
                $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");  
            }
        }else{
            $(this).parent().removeClass("has-success has-feedback");
            $(this).parent().addClass("has-error has-feedback");
            $(this).next(".errors").html("Họ và tên không được bỏ trống !!");
            $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
        }
    });
    /* kiem tra email */
    $("input[name='email']").focusout(function(){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
        if($(this).val()){
            if (!filter.test($(this).val().trim())) {
                $(this).parent().removeClass("has-success has-feedback");
                $(this).parent().addClass("has-error has-feedback");
                $(this).next(".errors").html("Email không hợp lệ !!");
                $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  
            }else{
                $(this).parent().removeClass("has-error has-feedback");
                $(this).parent().addClass("has-success has-feedback");
                $(this).next(".errors").html("");
                $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
            }
        }else{
            $(this).parent().removeClass("has-error has-feedback");
            $(this).parent().removeClass("has-success has-feedback");
            $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
            $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(this).next(".errors").html("");
        
        }
    });
    /* kiem tra so dien thoai */
    $("input[name='phone_number']").focusout(function(){
         var filter = /^[0-9-+]+$/; 
        if($(this).val()){
            if (!filter.test($(this).val().trim())) {
                $(this).parent().removeClass("has-success has-feedback");
                $(this).parent().addClass("has-error has-feedback");
                $(this).next(".errors").html("Số điện thoại không hợp lệ");
                $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");   
            }else if( $(this).val().length <10 ||  $(this).val().length >11 ){
                $(this).parent().removeClass("has-success has-feedback");
                $(this).parent().addClass("has-error has-feedback");
                $(this).next(".errors").css({"opacity":1});
                $(this).next(".errors").html("Số điện thoại phải nằm trong khoảng từ 10-11 ký tự");
                $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");   
            }
            else{
                $(this).parent().removeClass("has-error has-feedback");
                $(this).parent().addClass("has-success has-feedback");
                $(this).next(".errors").html("");
                $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");       
            }
        }else{
            $(this).parent().removeClass("has-success has-feedback");
            $(this).parent().addClass("has-error has-feedback");
            $(this).next(".errors").html("Số điện thoại không được bỏ trống !!");
            $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
        }
    });
        /* kiểm tra ten duong */
    $("input[name='sonha-tenduong']").focusout(function(){
        if($(this).val()){
            $(this).parent().removeClass("has-error has-feedback");
            $(this).parent().addClass("has-success has-feedback");
            $(this).next(".errors").html("");
            $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
            $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
        }else{
            $(this).parent().removeClass("has-success has-feedback");
            $(this).parent().addClass("has-error has-feedback");
            $(this).next(".errors").html("Không được bỏ trống !!");
            $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
        }
    });
    /* rang gia tri */
    var a = $('.tinhthanh').val();
        if($('.tinhthanh').val()){
             $.get("../xuli-tinhthanh/xuli-quanhuyen.php",{value:a,id_district: <?php echo $id_district ?>},function(data){
                $('.select-districts').html(data);
            });
        }
    /* tinh thanh*/
    $('.tinhthanh').click(function(){
        var id_district = "<?php echo $id_district ?>";
        var a = $('.tinhthanh').val();
        if(a ==""){
            return false;
        }
        else{

            $.get("../xuli-tinhthanh/xuli-quanhuyen.php",{value:a,id_district: <?php echo $id_district ?> },function(data){
                $('.select-districts').html(data);
            });
        }
    });

    /* Tạo đơn hàng */
    $(".guidonhang").click(function(){
            var errors = new Array();
            //kiem tra tinh thanh 
            if($('select[name="tinhthanh"]').find(":selected").val()==""){
                errors.push("error");
                $(".wrapper-tinhthanh .errors").html("Tỉnh thành không được bỏ trống !!");
            }else{
                $(".wrapper-tinhthanh .errors").html("");
            }
            if($('select[name="quanhuyen"]').find(":selected").val()==""){
                errors.push("error");
                $(".wrapper-quanhuyen .errors").html("Quận huyện không được bỏ trống !!");
            }else{
                $(".wrapper-quanhuyen .errors").html("");
            }
            //kiem tra ten
            if($("input[name='name']").val()){
                  // kiem tra do dai
                    if ( $("input[name='name']").val().length < 3 ||  $("input[name='name']").val().length > 20 ) {
                        $("input[name='name']").parent().removeClass("has-success has-feedback");
                        $("input[name='name']").parent().addClass("has-error has-feedback");
                        $("input[name='name']").next(".errors").css({"opacity":1});
                        $("input[name='name']").next(".errors").html("Họ tên phải nằm trong khoảng từ 3-20 kí tự !!");
                        $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                        $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                    }else{
                        $("input[name='name']").parent().removeClass("has-error has-feedback");
                        $("input[name='name']").parent().addClass("has-success has-feedback");
                        $("input[name='name']").next(".errors").css({"opacity":0});
                        $("input[name='name']").next(".errors").html("...");
                        $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                        $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
                    }
            }else{
                errors.push("error");
                $("input[name='name']").parent().removeClass("has-success has-feedback");
                $("input[name='name']").parent().addClass("has-error has-feedback");
                $("input[name='name']").next(".errors").html("Họ và tên không được bỏ trống !!");
                $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
            //kiem tra email
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            if($("input[name='email']").val()){
                if (!filter.test($("input[name='email']").val().trim())) {
                    errors.push("error");
                    $("input[name='email']").parent().removeClass("has-success has-feedback");
                    $("input[name='email']").parent().addClass("has-error has-feedback");
                    $("input[name='email']").next(".errors").html("Email không hợp lệ !!");
                    $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  
                }else{
                    $("input[name='email']").parent().removeClass("has-error has-feedback");
                    $("input[name='email']").parent().addClass("has-success has-feedback");
                    $("input[name='email']").next(".errors").html("");
                    $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
                }
            }else{
                $("input[name='email']").parent().removeClass("has-error has-feedback");
                $("input[name='email']").parent().removeClass("has-success has-feedback");
                $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $("input[name='email']").next(".errors").html("");
            
            }
            // kiem so dien thoai
             var filter = /^[0-9-+]+$/; 
            if($("input[name='phone_number']").val()){
                if (!filter.test($("input[name='phone_number']").val().trim())) {
                    errors.push("error");
                    $("input[name='phone_number']").parent().removeClass("has-success has-feedback");
                    $("input[name='phone_number']").parent().addClass("has-error has-feedback");
                    $("input[name='phone_number']").next(".errors").html("Số điện thoại không hợp lệ");
                    $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");   
                }else if( $("input[name='phone_number']").val().length <10 ||  $("input[name='phone_number']").val().length >11 ){
                        $("input[name='phone_number']").parent().removeClass("has-success has-feedback");
                        $("input[name='phone_number']").parent().addClass("has-error has-feedback");
                        $("input[name='phone_number']").next(".errors").css({"opacity":1});
                        $("input[name='phone_number']").next(".errors").html("Số điện thoại phải nằm trong khoảng từ 10-11 ký tự");
                        $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                        $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");   
                    }
                else{
                    $("input[name='phone_number']").parent().removeClass("has-error has-feedback");
                    $("input[name='phone_number']").parent().addClass("has-success has-feedback");
                    $("input[name='phone_number']").next(".errors").html("");
                    $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");       
                }
            }else{
                errors.push("error");
                $("input[name='phone_number']").parent().removeClass("has-success has-feedback");
                $("input[name='phone_number']").parent().addClass("has-error has-feedback");
                $("input[name='phone_number']").next(".errors").html("Số điện thoại không được bỏ trống !!");
                $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
           /* kiểm tra ten duong */
            $("input[name='sonha-tenduong']").focusout(function(){
                if($(this).val()){
                    $(this).parent().removeClass("has-error has-feedback");
                    $(this).parent().addClass("has-success has-feedback");
                    $(this).next(".errors").html("");
                    $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
                }else{
                    $(this).parent().removeClass("has-success has-feedback");
                    $(this).parent().addClass("has-error has-feedback");
                    $(this).next(".errors").html("Không được bỏ trống !!");
                    $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }
            });
        
             // kiem tra date
            if( $("input[name='munute']").val() && $("input[name='hour']").val() && $("input[name='munute']").val()){
                $("input[name='munute']").parent().removeClass("has-error has-feedback");
                $("input[name='munute']").parent().addClass("has-success has-feedback");
                $("input[name='munute']").next(".errors").html("");
                $(".wrap-date .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrap-date .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
            }else{
                errors.push("error");
                $("input[name='munute']").parent().removeClass("has-success has-feedback");
                $("input[name='munute']").parent().addClass("has-error has-feedback");
                $("input[name='munute']").next(".errors").html("Không được bỏ trống !!");
                $(".wrap-date .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrap-date .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
             // kiem tra san pham
            if( $(".wrap-product").find('tr').eq(0).hasClass('wrap-search') ){
                 errors.push("error"); 
                 alert("Hãy lựa chọn sản phẩm cho đơn hàng");
            }
            if(errors.length==0){
                var date =  $('input[name="date"').val() + " " + $('input[name="hour"').val() + ":" + $('input[name="munute"').val() + ":" + "0";
                var code_order = $('.code_order').text();
                var name =$("input[name='name']").val();
                var email =$("input[name='email']").val();
                var tinh_thanh = $(".tinhthanh").find(":selected").val();
                var quan_huyen =$('select[name="quanhuyen"]').find(":selected").val();
                var sdt = $("input[name='phone_number']").val();
                var sonha_tenduong=$("input[name='sonha-tenduong']").val();
                $.get("functions/edit_don_hang.php",{
                    date: date,
                    code_order:code_order,
                    name:name,
                    email:email,
                    sdt:sdt,
                    sonha:sonha_tenduong,
                    quan_huyen: quan_huyen

                },function(dt){
                    alert("Lưu đơn hàng thành công");
                    window.location.href = "";
                });
            }
        });
    };
</script>
