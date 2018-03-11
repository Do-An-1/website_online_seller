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
<?PHP 
    include('../inc/function.php'); 
    date_default_timezone_set("Asia/HO_CHI_MINH");
    $order_day = getdate();
    $year = $order_day['year'] .'-'. $order_day['mon'] .'-'. $order_day['mday'];
    $year= date_create($year);
    $year =  date_format($year,"Y-m-d");
    
    $hour = $order_day['hours'];
    $minute = $order_day['minutes'];
?>
<div class="add-order">
    <form name="frmadd-shiper" method="post" action="">
        <h2 class="title">Thêm hóa đơn</h2>
        <div class="row">
            <div class="col-xs-12">
                <div  class="info">
                    <h4 class="text-order"><strong>Đặt hàng #<span class="code_order" style="color: red"><?php echo ramdom_code(); ?></span></strong></h4>
                    <div class="row">
                        <div class="col-xs-6 left">
                            <div class="title-left"><strong>Chi tiết chung</strong></div>
                            <div class="form-group wrapper-name">
                                <label>Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                                <div class="errors"></div>
                                <span class='icon-notify' style='right: 10px'></span>
                            </div>
                            <div class="form-group wrapper-email">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Không bắt buộc">
                                <div class="errors"></div>
                                <span class='icon-notify' style='right: 10px'></span>
                            </div>
                         <div class="form-group wrapper-phone_number">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Số điện thoại">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div>  
                        <div class="form-group wrap-date">
                            <label>Thời gian đặt hàng</label>
                            <input type="date" name="date" maxlength="10" value="<?php echo $year; ?>" class="date">
                            @<input type="number" name="hour" class="date hour" value="<?php echo $hour; ?>">
                            :<input type="number" name="munute" class="date minute" value="<?php echo $minute; ?>">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div>
                    </div>
                    <div class="col-xs-6 right">
                        <div class="title-left"><strong>Thông tin thanh toán</strong></div>
                        <div class="form-group wrapper-tinhthanh">
                            <label>Chọn tỉnh thành</label>
                            <select name="tinhthanh" class="select tinhthanh form-control">
                                <option value="">--- Chọn tỉnh thành ---</option> 
                                <?php echo_city(); ?>

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
                        <div class="form-group  wrapper-phuong-xa">
                            <label>Tên phường/Xã</label>
                            <input type="text" name="phuong-xa" class="form-control">
                            <div class="errors"></div>
                            <span class='icon-notify' style='right: 10px'></span>
                        </div> 
                        <div class="form-group wrapper-sonha-tenduong">
                            <label class="name">Số nhà, tên đường</label>
                            <input type="text" name="sonha-tenduong" class="form-control">
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
                <div class="btn btn-primary guidonhang" style="margin-bottom: 25px;">Tạo đơn hàng</div>
            </div>
        </div>
    </form>
</div>
<?php include ('includes/footer.php');?>
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
                            <td style="vertical-align: middle;"> <img width=50 src='../` + dt['image'].split(" ", 1) + `' /></td>
                            <td style="vertical-align: middle;" class="wrap_size"> <select name="size" class="size_product">` + str_size + `</select></td>
                            <td style="vertical-align: middle;font-family: georgia" class="gia">` + dt['saleprice_product'] + `</td>
                            <td style="vertical-align: middle;">` + `<input type="number" class="soluong" name="soluong" value="1" min="1" style="width: 60px;text-align: center;" class="form-control" >` + `</td>
                            <td style="vertical-align: middle;font-family: georgia" class="tong-tien">` + dt['tong_gia'] +`</td>
                            <td style="vertical-align: middle;" class="delete_product" style="color:red;cursor:pointer"><i style="color:red;cursor:pointer" class="fa fa-times" aria-hidden="true"></i></td>
                        </tr>
                        `);
                    $(".add-order .products .search").val('');
                    update_quanlity(dt['id_product']);

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
<!-- Kiem tra du lieu -->
<script type="text/javascript" src="js/add_order.js"></script>
<!--  -->
<script type="text/javascript">
    $('.kinh-doanh .collapse').addClass('in');
    $('.kinh-doanh .themdonhang').css({'background-color': '#e1e1e1'});
</script>
