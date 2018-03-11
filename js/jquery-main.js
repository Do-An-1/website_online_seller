$(function(){
     $('#themeContainer .wrapper-style .oregional-skins  .item-oregional-skins .item-oregional-skins-x').each(function(){
            if($(this).attr("id")=="default"){
                $(this).css("background","#F1F1F1");
            }else{
                 $(this).css("background",function(){
                    return $(this).attr("id");
                 });
            }
        });
        $("#themes").click(function(){
          $(this).animate({"right": -60},500,function(){
              $("#themeContainer").animate({"right": 0},500);
          });
        });
        $("#themeContainer .wrapper-style >h4").click(function(){
            $("#themeContainer").animate({"right": -200},500,function(){
                $("#themes").animate({"right": -24},500);
            });
        });
        var id ="";
        $("#themeContainer .wrapper-style .oregional-skins  .item-oregional-skins .item-oregional-skins-x").click(function(){
            $("#themeContainer .wrapper-style .oregional-skins  .item-oregional-skins .item-oregional-skins-x").css("border-color","#666");
            $(this).css("border-color","#d73814");
            id=$(this).attr("id").toString();
        });

        $("#themeContainer .wrapper-style .oregional-skins  .item-oregional-skins  #default").click(function(){
            $(".header").css("background","#F1F1F1");
        });
        $("#themeContainer .wrapper-style .time  #save-time").click(function(){
            var time;
            if(Number($("#themeContainer .wrapper-style .time #minutes").val()) >=0 && Number($("#themeContainer .wrapper-style .time #seconds").val()) >=0){
                time = (Number($("#themeContainer .wrapper-style .time #minutes").val())*60 + Number($("#themeContainer .wrapper-style .time #seconds").val())) * 1000;
            }
            else{
                $("#themeContainer .wrapper-style .time #error").text("Lỗi thời gian");
                 $("#themeContainer .wrapper-style .time #error").css({"color":"#bd0103","font-weight":700});

            }


            if (id=="") {
                $("#themeContainer .wrapper-style .time #error").text("Hãy chọn màu");
                $("#themeContainer .wrapper-style .time #error").css({"color":"#bd0103","font-weight":700});
            }
            else if(id=="default"){
                $(".header").css("background","#F1F1F1");
            }else{
                $(".header").css("background",id);
                    setTimeout(function(){
                     $(".header").css("background","#F1F1F1");
                },time);
            }



        });
    //ban do
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
    // menu header
    $('.body .cart').click(function () {

    });
    $('.body .see').click(function () {
        $('.dat-hang').css("display,none");
    });

    $('.list .title-menu > a').click(function(e){
        e.preventDefault();
        if($(this).next().is(':visible')){
            $(this).next().slideUp();
        }
        else{$('.item-title-menu').slideUp();
            $(this).next().slideToggle();}
    });

    $('.icon-menu').click(function(){
        $('.item-menu ').slideToggle();
        $('.list ').slideToggle();
        $('.list > ul').slideToggle();
    });//end menu header
    // fixed header
    var width_body=$('body').width();
    $(window).resize(function() {
        width_body=$('body').width();
        if(width_body<768){
            $('.header .icon-header').css('top',30);
        }

    });
    $(window).scroll(function(){
        if($(this).scrollTop()> 40){
            $('.header').css('position','fixed');
            $('.header').css('height',80);
            $('.header').css('top',0);
            $('.banner').css('margin-top',80);
            $('.menu-header >ul >li').css('margin-top',30);
            $('.menu-header >ul >li').css('padding-bottom',30);
            $('.body').css('margin-bottom',80);
            if(width_body<768){
                $('.header .logo-header img').css({'height':45,'width':140});
                $('.header .logo-header img').css('margin-top',10);
                // $('.header .logo-header img').css('padding-bottom',10);
                $('.header').css('height',60);
                $('.header .logo-header img').css('margin-top',5);
            }
            else{
                $('.header .logo-header img').css({'height':50,'width':150});
                $('.header .logo-header img').css('margin-top',10);
                $('.header .icon-header').css('top',30);
            }

        }
        else{
            $('.body').css('margin-bottom',0);
            $('.header').css('position','relative');$('.header').css('margin-top',0);$('.banner').css('margin-top',0);
            $('.header .logo-header img').css('margin-top',0);
            $('.menu-header >ul >li').css('margin-top',45);
            $('.menu-header >ul >li').css('padding-bottom',12);

            $('.header').css('height',96);
            if(width_body<768){
                $('.header .logo-header img').css('margin-top',10);
                $('.header').css('height',60);
                $('.header .logo-header img').css({'height':50,'width':150});
            }
            else{
                $('.header .logo-header img').css({'height':70,'width':219});
                $('.header .icon-header').css('top',45);
            }
        }
    });//end fixed header

    // back-to-top
    $(window).scroll(function(){
        if($(this).scrollTop()> 149){
            $('.back-to-top').css('opacity',1);
        }
        else{
            $('.back-to-top').css('opacity',0);
        }
    });
    $('.back-to-top').click(function(){
        $('body').animate({'scrollTop':0},2000);
    });
    //end back-to-top




    //Scrip cho thong tin gio hang
    $('.tinhthanh').click(function(){
        var a = $('.tinhthanh').val();
        if(a ==""){
            return false;
        }
        else{
            $.get("xuli-tinhthanh/xuli-quanhuyen.php",{value:a},function(data){
                $('.select-districts').html(data);
            });
        }
    });


    //    $.get("product-cart.php",function(data){
    // 	$('.thongtin .right .tt_product').html(data);

    // });
    //
    $('input[name="soluong"]').change(function(){
        // $(".load").css("display","block");

        var quantity=$(this).val()-$(this).attr('val');
        var size=$(this).attr('size');
        var id=$(this).attr('cart');
        var price=$(this).attr('price');
        var sl_product;

        $.get("xuli/insert.php",{id:id,size:size,quantity:quantity},function(){});
        $(this).attr('val',$(this).val());

        $.get("xuli/sl-product.php",{id:id},function(data){
            $(".sl-product"+id).text(data);
        });



        $.get("xuli/sl-product.php",{id:id},function(data){
            var gia=price*data;
            gia =gia.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            $(".price"+id).text(gia);
        });

        $(".load").animate({opacity:1},100,function(){
            // $(".load").animate({opacity:0},2000,function(){};
            // $(".load").css("display","none");
            setTimeout(function(){
                $(".load").css("opacity",0);
            }, 1000);
        });
        $.get('xuli-seeproduct/tong-tien.php',function(data){
            $('#price-buy').text(data);
        });
    });


    $('.item-icon-header .delete-product-cart').click(function(){
        var id= $(this).parents('.product-cart').attr('product');
        $.get('xuli/delete-cart.php',{id:id});
        $(this).parents('.product-cart').remove();
        var sl_product= $('.item-icon-header .soluong').text();
        var sl=$(this).parents('.information-cart').attr('soluong');

        var sl_delete= sl_product-sl;
        $('.item-icon-header .soluong').text(sl_delete);
        $('.cart .quantity-cart').text(sl_delete);
    });



});
