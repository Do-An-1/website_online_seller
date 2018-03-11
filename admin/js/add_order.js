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
    /* kiểm tra phuong xa */
    $("input[name='phuong-xa']").focusout(function(){
        if($(this).val()){
            $(this).parent().removeClass("has-error has-feedback");
            $(this).parent().addClass("has-success has-feedback");
            $(this).next(".errors").html("");
            $(".wrapper-phuong-xa .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
            $(".wrapper-phuong-xa .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
        }else{
            $(this).parent().removeClass("has-success has-feedback");
            $(this).parent().addClass("has-error has-feedback");
            $(this).next(".errors").html("Không được bỏ trống !!");
            $(".wrapper-phuong-xa .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(".wrapper-phuong-xa .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
        }
    });
    $('.tinhthanh').click(function(){
        var a = $('.tinhthanh').val();
        if(a ==""){
            return false;
        }
        else{

            $.get("../xuli-tinhthanh/xuli-quanhuyen.php",{value:a},function(data){
                $('.select-districts').html(data);
            });
        }
    });

    /* Tạo đơn hàng */
    $(".guidonhang").click(function(){
            var errors = [];
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
            //kiem tra so nha && ten duong
            if($("input[name='sonha-tenduong']").val()){
                $("input[name='sonha-tenduong']").parent().removeClass("has-error has-feedback");
                $("input[name='sonha-tenduong']").parent().addClass("has-success has-feedback");
                $("input[name='sonha-tenduong']").next(".errors").html("");
                $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
            }else{
                errors.push("error");
                $("input[name='sonha-tenduong']").parent().removeClass("has-success has-feedback");
                $("input[name='sonha-tenduong']").parent().addClass("has-error has-feedback");
                $("input[name='sonha-tenduong']").next(".errors").html("Không được bỏ trống !!");
                $(".wrapper-sonha-tenduong .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-sonha-tenduong .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
            // kiem tra phuong && xa
            if($("input[name='phuong-xa']").val()){
                $("input[name='phuong-xa']").parent().removeClass("has-error has-feedback");
                $("input[name='phuong-xa']").parent().addClass("has-success has-feedback");
                $("input[name='phuong-xa']").next(".errors").html("");
                $(".wrapper-phuong-xa .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                $(".wrapper-phuong-xa .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
            }else{
                errors.push("error");
                $("input[name='phuong-xa']").parent().removeClass("has-success has-feedback");
                $("input[name='phuong-xa']").parent().addClass("has-error has-feedback");
                $("input[name='phuong-xa']").next(".errors").html("Không được bỏ trống !!");
                $(".wrapper-phuong-xa .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-phuong-xa .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
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
                var sdt = $("input[name='phone_number']").val();
                var tinh_thanh = $(".tinhthanh").find(":selected").val();
                var quan_huyen =$('select[name="quanhuyen"]').find(":selected").val();
                var sonha_tenduong=$("input[name='sonha-tenduong']").val();
                var phuong_xa =$("input[name='phuong-xa']").val();
                $.get("functions/tao_don_hang.php",{
                    date: date,
                    code_order:code_order,
                    name:name,
                    email:email,
                    sdt:sdt,
                    tinh:tinh_thanh,
                    quan:quan_huyen,
                    sonha:sonha_tenduong,
                    phuong:phuong_xa
                },function(dt){
                    alert("Gửi đơn hàng thành công");
                    window.location.href = "";
                });
            }
        });