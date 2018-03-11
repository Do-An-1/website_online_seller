
		$(function(){
		    //
            var id_product = $('.see-product').attr('product');
            $.get("xuli/session-seen.php",{id:id_product});

            $('.width .cart').click(function () {
                $.get("xuli-seeproduct/session-display.php",{display:"display:block"});
            });
			//

            $('.see-product .slider .img-slider .item-img').css('width',function(){
                return $('.see-product .slider .img-slider .item-img').parents('.slider').width();
            });

            //
            //hinh ở dưới
            var width_body=$('body').width();

            if(width_body<480){

                $('.width .item').css('width',function(){
                    return	$('.width  .item').parents('.width').width();

                });
            }
            else if(width_body<768){

                $('.width  .item').css('width',function(){
                    return	$('.width .item').parents('.width').width()*50/100;

                });
            }
            else if(width_body<1200){

                $('.width  .item').css('width',function(){
                    return	$('.width  .item').parents('.width').width()*33.33333333/100;

                });
            }
            else{

                $('.width  .item').css('width',function(){
                    return	$(this).parents('.width').width()*25/100;

                });
            }
			//
            if(width_body<480){

                $('.see-product .item').css('width',function(){
                    return	$('.see-product  .item').parents('.owl-item').width()*50/100;
                });
            }
            else if(width_body<768){

                $('.see-product .item').css('width',function(){
                    return	$('.see-product .item').parents('.owl-item').width()*33.33333333/100;

                });
            }
            else{

                $('.see-product .item').css('width',function(){
                    return	$('.see-product .item').parents('.owl-item').width()*25/100;

                });

            }
			//
            $('.modal-dathang').css({'margin-top':30,'opacity':1});
            //

			$(window).resize(function() {

                $('.see-product .slider .img-slider .item-img').css('width',function(){
                    return $('.see-product .slider .img-slider .item-img').parents('.slider').width();
                });
				width1_body=$('body').width();
				width_body=$('body').width();
			        // alert(width1_body);
                if(width_body<480){
                    $('.see-product .item').css('width',	function(){
                        return	$('.see-product .item').parents('.owl-item').width()*50/100;

                    });
                }
                else if(width_body<768){
                    $('.see-product .item').css('width',function(){
                        return	$('.see-product .item').parents('.owl-item').width()*33.33333333/100;

                    });
                }
                else{

                    $('.see-product .item').css('width',function(){
                        return	$(this).parents('.owl-item').width()*25/100;

                    });


                }
				//
                if(width_body<480){

                    $('.width .item').css('width',function(){
                        return	$('.width  .item').parents('.width').width();

                    });
                }
                else if(width_body<768){

                    $('.width  .item').css('width',function(){
                        return	$('.width .item').parents('.width').width()*50/100;

                    });
                }
                else if(width_body<1200){

                    $('.width  .item').css('width',function(){
                        return	$('.width  .item').parents('.width').width()*33.33333333/100;

                    });
                }
                else{

                    $('.wp  .item').css('width',function(){
                        return	$(this).parents('.width').width()*25/100;

                    });
                }

			  });
            // kết thúc hàm resize

			$('.page-button .next').click(function(){
               var  width1 = $('.width .item').width()+30;
				$(' .wapper').css('opacity',0.45);
					$(' .wapper').animate({'margin-left':-width1,opacity:1},500,function(){
		 				$('.wapper .item:first-child').appendTo(' .wapper');
		 				$(' .wapper').css('margin-left',0);
		 			});

			});

			$('.page-button .pre').click(function(){
               var  width1 = $('.width .item').width()+30;
				$('.wapper').css('opacity',0.45);
					$('.wapper ').css('margin-left',-width1);
			  		$('.wapper .item:last-child').prependTo('.wapper');
					$('.wapper').animate({'margin-left':'0',opacity:1},500,function(){

			 		$('.wapper').css('margin-left',0);
			 	});
			});
			$('.see-product .owl-item .owl-item-synced .item:first-child').addClass('active');


			$('.see-product .next').click(function(){
                	var widtd = $('.see-product .slider').width();
					$('.slider .img-slider').animate({'margin-left':-widtd},500,function(){
						$('.img-slider .item-img:first-child').appendTo('.img-slider');
						$('.slider .img-slider').css('margin-left',0);

						var stt= $('.img-slider .item-img:first-child').attr('stt');
						$('.see-product .owl-item .owl-item-synced .item').removeClass('active');
                        $('.see-product .owl-item .owl-item-synced .item').each(function () {
                            if($(this).attr('stt')==stt){
                                $(this).addClass('active');
                            }
                        });


                        // if(width_body >=768){
                        //     if($('.see-product .owl-item .owl-item-synced .item:eq(3)').hasClass('active')){
                        //
                        //         var width_slider_small = $('.item').parents('.owl-item').width()*25/100;
                        //         $('.owl-item .owl-item-synced').animate({'margin-left':-width_slider_small},500,function(){
                        //             $('.see-product .owl-item .owl-item-synced .item:first-child').appendTo('.owl-item-synced');
                        //             $('.owl-item .owl-item-synced').css('margin-left',0);
                        //         });
                        //     }
                        // }


					});
				});
			$('.see-product .back').click(function(){
              var  widtd = $('.see-product .slider').width();
					$('.slider .img-slider').css('margin-left',-widtd);
					$('.img-slider .item-img:last-child').prependTo('.slider .img-slider');
				 	$('.slider .img-slider').animate({'margin-left':'0'},500,function(){
					$('.slider .img-slider').css('margin-left',0);
					var stt= $('.img-slider .item-img:first-child').attr('stt');
					$('.see-product .owl-item .owl-item-synced .item').removeClass('active');
					$('.see-product .owl-item .owl-item-synced .item').eq(stt).addClass('active');
					})
			});


			 $('.see-product .owl-item .owl-item-synced .item').click(function(){
                 var widtd = $('.see-product .slider').width();
		  		var stt_click = $(this).attr('stt');
		  		var stt_ht = $('.owl-item-synced .active').attr('stt');
		  		stt=stt_click-stt_ht;
		  		//
		  		if(stt>0){
		  			$('.slider .img-slider').animate({'margin-left':stt*(-widtd)},500,function(){
		  				for (var i = stt; i > 0; i--) {
		  						$('.slider .img-slider .item-img:first-child').appendTo('.slider .img-slider');

		  						}
		  						$('.slider .img-slider').css('margin-left',0);

		 				$('.see-product .owl-item .owl-item-synced .item').removeClass('active');
		 				$('.see-product .owl-item .owl-item-synced .item').eq(stt_click).addClass('active');
		  				});
		  		}
		  		if(stt<0){
		  			$('.slider .img-slider').css('margin-left',stt*(widtd));
		  			for (var i = -(stt); i > 0; i--) {
		  				$('.slider .img-slider .item-img:last-child').prependTo('.slider .img-slider');

		  			}
		  			// var left=  $('.slider .img-slider').css('margin-left')-500;
		  			// alert(left);
		  			$('.slider .img-slider').animate({'margin-left':stt*(-widtd)-widtd*(-stt)},500,function(){
		  				$('.slider .img-slider').css('margin-left',0);
		  				$('.see-product .owl-item .owl-item-synced .item').removeClass('active');
		 				$('.see-product .owl-item .owl-item-synced .item').eq(stt_click).addClass('active');
		  				});
		  		}


		  	});

		//
			if($('.dat-hang').css('display')=='block'){
				$('body').css({'overflow-x':'hidden','overflow-y':'hidden'});
				$('.dat-hang').css({'overflow-x':'hidden','overflow-y':'auto'});
			}
			$('.dat-hang .close-dt').click(function(){
				$('.dat-hang').css('display','none');
				$('body').css({'overflow-x':'hidden','overflow-y':'auto'});
			});
			$('.dat-hang .button-dong').click(function(){
				$('.dat-hang').css('display','none');
				$('body').css({'overflow-x':'hidden','overflow-y':'auto'});
			});


            // dang ki mua
            $('.dki-mua').click(function(){
                var id= $('.see-product').attr('product');
                var size=$('.select-size').val();
                var quantity=$('.select-soluong').val();
                $.get('xuli/insert.php',{id:id,size:size,quantity:quantity},function(){
                    window.location.href = "thongtingiohang.php";
                });
            });
            // them vào giỏ hàng
            $('.add-to-cart').click(function(){
                 // alert("b");
                var id= $('.see-product').attr('product');
                var size= $('.select-size').val();
                var quantity= $('.select-soluong').val();  
                try{
                    if(eval(quantity) > 0){
                        $.get('xuli/insert.php',{id:id,size:size,quantity:quantity},function(){
                           alert("Đã thêm vào giỏ hàng");
                           window.location.href = "";
                           
                        });
                    }else{
                         alert("Số lượng sản phẩm không hợp lệ");
                    }
                }catch(err){
                    alert("Số lượng sản phẩm không hợp lệ");
                }
                    
            });


			$('.dat-hang .button-dt').click(function(){
				var id=$('.dat-hang').attr('product');
				var size=$('.size-dt').val();
				var quantity=$('.soluong-dt').val();
				$.get('xuli/insert.php',{id:id,size:size,quantity:quantity},function () {
                    window.location.href = "thongtingiohang.php";
                });
			});
            $('.dat-hang').click(function(){
				$(this).css('display','none');
                $('body').css({'overflow-x':'hidden','overflow-y':'auto'});
            });
            $('.close').click(function(){
                $(this).css('display','none');
                $('body').css({'overflow-x':'hidden','overflow-y':'auto'});
            });
            
            $('.dat-hang .modal-dathang').click(function(){
               return false;
            });


		});
