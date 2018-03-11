<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 4/9/2017
 * Time: 10:55 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quần áo nam đẹp, quần áo hàng hiệu, cao cấp kiểu 2017</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-main.css">
    <style type="text/css">
    .errors{font-size: 12px; color:#bd0103;margin-left: 5px}
</style>
<script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(10.0465737,105.7679048);
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
        marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: '3T Shop'
        });
    }
    var myKey = "AIzaSyCCNkTJ_Dw5UL2Rf0reKcQ-5yzOQZX9v_g";
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "https://maps.googleapis.com/maps/api/js?key=" + myKey + "&sensor=false&callback=initialize";
        document.body.appendChild(script);
    }
</script>


</head>
<body style="margin-top: -20px;overflow-x: hidden;" onload="loadScript()">
    <?php
    include('inc/myconnect.php');
    include('inc/function.php');
    include('include/header.php');
    ?>
    <div class="bcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li style="background: url("");"><a href="">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    <div class="tt-lienhe">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="title text-center"><h3>GỬI LIÊN HỆ VỀ 
                                <?php
                                $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                                $result_description = mysqli_query($dbc, $query_description);
                                if( mysqli_num_rows($result_description) > 0 ) {
                                    extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                    echo  $value;
                                }
                                ?> </h3></div>
                                <form action="" method="post" >
                                    <div class="wapper-lh">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="wrapper-name">
                                                <input type="text" name="name" placeholder="Nhập họ tên" class="form-control">
                                                <div class="errors" style="opacity: 0">...</div>
                                                <span class='icon-notify' style='right: 5px'></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="wrapper-email">
                                                <input type="text" name="email" placeholder="Email của bạn" class="form-control">
                                                <div class="errors" style="opacity: 0">...</div>
                                                <span class='icon-notify' style='right: 5px'></span>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="wrapper-phone_number">
                                                <input type="text" name="phone_number" placeholder="Điện thoại" class="form-control">
                                                <div class="errors" style="opacity: 0">...</div>
                                                <span class='icon-notify' style='right: 5px'></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="wrapper-address">
                                                <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                                                <div class="errors" style="opacity: 0">...</div>
                                                <span class='icon-notify' style='right: 5px'></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="wrapper-content">
                                                <textarea id="content" placeholder="Nội dung liên hệ" class="form-control" rows="6"></textarea>
                                                <div class="errors" style="opacity: 0">...</div>
                                                <span class='icon-notify' style='right: 5px'></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <input type="button" name="submit" value="GỬI LIÊN HỆ" class="btn btn-success">
                                            </div>
                                        </div>


                                    </div>

                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-4 tt-right">
                                <div class="title text-center col-xs-12"><h3>THÔNG TIN LIÊN HỆ VỀ 
                                    <?php
                                    $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                                    $result_description = mysqli_query($dbc, $query_description);
                                    if( mysqli_num_rows($result_description) > 0 ) {
                                        extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                        echo  $value;
                                    }
                                    ?> 
                                </h3></div>
                                <div class="col-xs-12">
                                    <div class="row address">
                                        <div class="col-xs-1 left">
                                            <div class="row icon-ttrigt">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-11 right" style="padding-right: 0">
                                           <div class="name-title">Địa chỉ:</div>
                                           <div class="media-body"><?php
                                           $query_adress = 'SELECT value FROM tb_information WHERE name = "adress"';
                                           $result_adress = mysqli_query($dbc, $query_adress);
                                           if( mysqli_num_rows($result_adress) > 0 ) { 
                                            extract( mysqli_fetch_array($result_adress, MYSQLI_ASSOC) );
                                            $array_adress = explode("$%^$%^", trim($value, "$%^$%^") );
                                            echo  $array_adress[0];
                                        }
                                        ?></div>
                                    </div>
                                </div>

                                <div class="row phone">
                                    <div class="col-xs-1 left">
                                        <div class="row icon-ttrigt">
                                            <i class="glyphicon glyphicon-earphone"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-11 right" style="padding-right: 0">
                                        <div class="name-title">Điện thoại:</div>
                                        <div class="media-body">
                                            <?php
                                            $query_adress = 'SELECT value FROM tb_information WHERE name = "phone"';
                                            $result_adress = mysqli_query($dbc, $query_adress);
                                            if( mysqli_num_rows($result_adress) > 0 ) { 
                                                extract( mysqli_fetch_array($result_adress, MYSQLI_ASSOC) );
                                                $array_adress = explode(" ", trim($value) );
                                                echo  $array_adress[0];
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mail">
                                    <div class="col-xs-1 left">
                                        <div class="row icon-ttrigt">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-11 right" style="padding-right: 0">
                                        <div class="name-title">Email:</div>
                                        <div class="media-body">
                                            <?php
                                            $query_adress = 'SELECT value FROM tb_information WHERE name = "email"';
                                            $result_adress = mysqli_query($dbc, $query_adress);
                                            if( mysqli_num_rows($result_adress) > 0 ) { 
                                                extract( mysqli_fetch_array($result_adress, MYSQLI_ASSOC) );
                                                $array_adress = explode(" ", trim($value) );
                                                echo  $array_adress[0];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 foooter">
                                <div class="row"><p>
                                    <?php
                                    $query_description = 'SELECT value FROM tb_information WHERE name = "description"';
                                    $result_description = mysqli_query($dbc, $query_description);
                                    if( mysqli_num_rows($result_description) > 0 ) {
                                        extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                        echo  $value;
                                    }
                                    ?> 

                                </p></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="wapper-map">
                        <div class="top-map text-center">
                            <?php
                            $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                            $result_description = mysqli_query($dbc, $query_description);
                            if( mysqli_num_rows($result_description) > 0 ) {
                                extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                echo  $value;
                            }
                            ?> 
                        </div>
                        <div id="map_canvas"></div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        include('include/footer.php');
        ?>
    </body>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-main.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCNkTJ_Dw5UL2Rf0reKcQ-5yzOQZX9v_g&callback=initMap" async defer></script> -->
    <script type="text/javascript">
        $(function(){
            $("input[name='name']").focusout(function(){

            // nếu có giá trị
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
            $(this).next(".errors").css({"opacity":1});
            $(this).next(".errors").html("Họ và tên không được bỏ trống !!");
            $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
            $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
        }

    });

            $("input[name='email']").focusout(function(){
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
                if($(this).val()){
                    if (!filter.test($(this).val().trim())) {
                        $(this).parent().removeClass("has-success has-feedback");
                        $(this).parent().addClass("has-error has-feedback");
                        $(this).next(".errors").css({"opacity":1});
                        $(this).next(".errors").html("Email không hợp lệ !!");
                        $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                        $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  
                    }else{
                        $(this).parent().removeClass("has-error has-feedback");
                        $(this).parent().addClass("has-success has-feedback");
                        $(this).next(".errors").css({"opacity":0});
                        $(this).next(".errors").html("...");
                        $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                        $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
                    }
                }else{
                    $(this).parent().removeClass("has-success has-feedback");
                    $(this).parent().addClass("has-error has-feedback");
                    $(this).next(".errors").css({"opacity":1});
                    $(this).next(".errors").html("Email không được trống !!");
                    $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  

                }
            });

            $("input[name='phone_number']").focusout(function(){
             var filter = /^[0-9-+]+$/; 
             if($(this).val()){
                if (!filter.test($(this).val().trim())) {
                    $(this).parent().removeClass("has-success has-feedback");
                    $(this).parent().addClass("has-error has-feedback");
                    $(this).next(".errors").css({"opacity":1});
                    $(this).next(".errors").html("Số điện thoại không hợp lệ");
                    $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");   
                }
                else if( $(this).val().length <10 ||  $(this).val().length >11 ){
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
                    $(this).next(".errors").css({"opacity":0});
                    $(this).next(".errors").html("...");
                    $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");       
                }
            }else{
                $(this).parent().removeClass("has-success has-feedback");
                $(this).parent().addClass("has-error has-feedback");
                $(this).next(".errors").css({"opacity":1});
                $(this).next(".errors").html("Số điện thoại không được bỏ trống !!");
                $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
            }
        });

            $("input[name='address']").focusout(function(){
                if($(this).val()){
                    $(this).parent().removeClass("has-error has-feedback");
                    $(this).parent().addClass("has-success has-feedback");
                    $(this).next(".errors").css({"opacity":0});
                    $(this).next(".errors").html("...");
                    $(".wrapper-address .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-address .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
                }else{
                    $(this).parent().removeClass("has-success has-feedback");
                    $(this).parent().addClass("has-error has-feedback");
                    $(this).next(".errors").css({"opacity":1});
                    $(this).next(".errors").html("Không được bỏ trống !!");
                    $(".wrapper-address .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-address .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }
            });

            $("#content").focusout(function(){
                if($(this).val()){
                    $(this).parent().removeClass("has-error has-feedback");
                    $(this).parent().addClass("has-success has-feedback");
                    $(this).next(".errors").css({"opacity":0});
                    $(this).next(".errors").html("...");
                    $(".wrapper-content .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-content .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
                }else{
                    $(this).parent().removeClass("has-success has-feedback");
                    $(this).parent().addClass("has-error has-feedback");
                    $(this).next(".errors").css({"opacity":1});
                    $(this).next(".errors").html("Không được bỏ trống !!");
                    $(".wrapper-content .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-content .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }
            });


        // su kien submit
        $("input[name='submit']").click(function(){
            var errors = [];
                // kiem tra name
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
                }
                else{
                    errors.push("error");
                    $("input[name='name']").parent().removeClass("has-success has-feedback");
                    $("input[name='name']").parent().addClass("has-error has-feedback");
                    $("input[name='name']").next(".errors").css({"opacity":1});
                    $("input[name='name']").next(".errors").html("Họ và tên không được bỏ trống !!");
                    $(".wrapper-name .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-name .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }



                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
                if($("input[name='email']").val()){
                    if (!filter.test($("input[name='email']").val().trim())){
                        errors.push("error");
                        $("input[name='email']").parent().removeClass("has-success has-feedback");
                        $("input[name='email']").parent().addClass("has-error has-feedback");
                        $("input[name='email']").next(".errors").css({"opacity":1});
                        $("input[name='email']").next(".errors").html("Email không hợp lệ !!");
                        $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                        $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  
                    }else{
                        $("input[name='email']").parent().removeClass("has-error has-feedback");
                        $("input[name='email']").parent().addClass("has-success has-feedback");
                        $("input[name='email']").next(".errors").css({"opacity":0});
                        $("input[name='email']").next(".errors").html("...");
                        $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                        $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");      
                    }
                }else{
                    errors.push("error");
                    $("input[name='email']").parent().removeClass("has-success has-feedback");
                    $("input[name='email']").parent().addClass("has-error has-feedback");
                    $("input[name='email']").next(".errors").css({"opacity":1});
                    $("input[name='email']").next(".errors").html("Email không được trống !!");
                    $(".wrapper-email .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-email .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");  

                }

                var filter = /^[0-9-+]+$/; 
                if($("input[name='phone_number']").val()){
                    if (!filter.test($("input[name='phone_number']").val().trim())) {
                        errors.push("error");
                        $("input[name='phone_number']").parent().removeClass("has-success has-feedback");
                        $("input[name='phone_number']").parent().addClass("has-error has-feedback");
                        $("input[name='phone_number']").next(".errors").css({"opacity":1});
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
                        $("input[name='phone_number']").next(".errors").css({"opacity":0});
                        $("input[name='phone_number']").next(".errors").html("...");
                        $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                        $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");       
                    }
                }else{
                    errors.push("error");
                    $("input[name='phone_number']").parent().removeClass("has-success has-feedback");
                    $("input[name='phone_number']").parent().addClass("has-error has-feedback");
                    $("input[name='phone_number']").next(".errors").css({"opacity":1});
                    $("input[name='phone_number']").next(".errors").html("Số điện thoại không được bỏ trống !!");
                    $(".wrapper-phone_number .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-phone_number .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }

                if($("input[name='address']").val()){
                    $("input[name='address']").parent().removeClass("has-error has-feedback");
                    $("input[name='address']").parent().addClass("has-success has-feedback");
                    $("input[name='address']").next(".errors").css({"opacity":0});
                    $("input[name='address']").next(".errors").html("...");
                    $(".wrapper-address .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-address .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
                }else{
                    errors.push("error");
                    $("input[name='address']").parent().removeClass("has-success has-feedback");
                    $("input[name='address']").parent().addClass("has-error has-feedback");
                    $("input[name='address']").next(".errors").css({"opacity":1});
                    $("input[name='address']").next(".errors").html("Không được bỏ trống !!");
                    $(".wrapper-address .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-address .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }

                if($("#content").val()){
                    $("#content").parent().removeClass("has-error has-feedback");
                    $("#content").parent().addClass("has-success has-feedback");
                    $("#content").next(".errors").css({"opacity":0});
                    $("#content").next(".errors").html("...");
                    $(".wrapper-content .icon-notify").removeClass("glyphicon glyphicon-remove form-control-feedback");
                    $(".wrapper-content .icon-notify").addClass("glyphicon glyphicon-ok form-control-feedback");     
                }else{
                    errors.push("error");
                    $("#content").parent().removeClass("has-success has-feedback");
                    $("#content").parent().addClass("has-error has-feedback");
                    $("#content").next(".errors").css({"opacity":1});
                    $("#content").next(".errors").html("Không được bỏ trống !!");
                    $(".wrapper-content .icon-notify").removeClass("glyphicon glyphicon-ok form-control-feedback");
                    $(".wrapper-content .icon-notify").addClass("glyphicon glyphicon-remove form-control-feedback");
                }
                if(errors.length==0){
                    var name =$("input[name='name']").val();
                    var email =$("input[name='email']").val();
                    var sdt = $("input[name='phone_number']").val();
                    var address=$("input[name='address']").val();
                    var content =$("#content").val();
                    $.get("xuli/lien-he.php",{
                        name:name,
                        email:email,
                        sdt:sdt,
                        address:address,
                        content:content,
                    },function(){
                        alert("Gửi thành công !!");
                        window.location.href = "lien-he.php";
                    });
                }

            });
//         var map,marker;
//         var myLatLng = new google.maps.LatLng(10.0465737,105.7679048);
//         function initMap() {
//             map = new google.maps.Map(document.getElementById('map'), {
// //                zoomControl: false,
// //                streetViewControl: false,
// //                  scrollwheel:false,   không thể dùng chuột để zoom
//                 center: myLatLng,
//                 zoom: 16
//             });
//             marker = new google.maps.Marker({
//                 position: myLatLng,
//                 map: map,
//                 title: '3T Shop'
//             });
// //            chỉnh màu sắc cho map mà sai mịa r
//             var customMapType = new google.maps.StyleMapType([
//                 { stylers: [{ hue: '#D2E4C8'}]},
//                 {
//                     featureType: 'water',
//                     stylers: [{ color: '#bd0103'}]
//                 }
//             ]);
//             var customMapTypeId = 'custom_style';
//             map.mapTypes.set(customMapTypeId,customMapType);
//             map.setMapTypeId(customMapTypeId);

//         };

//         initMap();

});
</script>
</html>

