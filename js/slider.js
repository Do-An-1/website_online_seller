$(function(){
	 		var stt=0;
	 		//start
	 		var width =$('.slider #img li').parents('.slider').width();
	 		$('.slider #img li').css("width",width);

	 		 $(window).resize(function() {
	 		 	width =$('.slider #img li').parents('.slider').width();
		        $('.slider #img li').css("width",width);

		    });
	 		function startSlider(){
		 			interval= setInterval(function(){
		 				$('.slider #img').animate({'margin-left':-width},500,function(){

		 				$('.slider #img li:first-child').appendTo('.slider #img');
		 				$('.slider #img').css('margin-left',0);
		 				stt = $('.slider #img li:first-child').attr('stt');
		 				$('#icon li').removeClass('active');
		 				$('#icon li').eq(stt).addClass('active');
		 			});
		 		},3000);
		 	
		 	};
		 	//pause
		 	function pauseSlider(){
			 	clearInterval(interval);
			 };

			$('.slider #img').on('mouseenter',pauseSlider).on('mouseleave',startSlider);
			$('#next').on('mouseenter',pauseSlider).on('mouseleave',startSlider);
			$('#icon li').on('mouseenter',pauseSlider).on('mouseleave',startSlider);
			$('#pre').on('mouseenter',pauseSlider).on('mouseleave',startSlider);
			  startSlider();
		  	$('#icon li').click(function(){
		  		var stt_click = $(this).attr('stt');
		  		var stt_ht = $('#icon .active').attr('stt');
		  		stt=stt_click-stt_ht;

		  		if(stt>0){
		  			$('.slider #img').animate({'margin-left':stt*(-width)},1000,function(){
		  				for (var i = stt; i > 0; i--) {
		  						$('.slider #img li:first-child').appendTo('.slider #img');
		  						
		  						}
		  						$('.slider #img').css('margin-left',0);
		  		
		 				$('#icon li').removeClass('active');
		 				$('#icon li').eq(stt_click).addClass('active');
		  				});
		  		}
		  		if(stt<0){
		  			$('.slider #img').css('margin-left',stt*(width));
		  			for (var i = -(stt); i > 0; i--) {
		  				$('.slider #img li:last-child').prependTo('.slider #img');
		  						
		  			}
		  			// var left=  $('.slider #img').css('margin-left')-500;
		  			// alert(left);
		  			$('.slider #img').animate({'margin-left':stt*(-width)-width*(-stt)},1000,function(){
		  				$('.slider #img').css('margin-left',0);
		  				$('#icon li').removeClass('active');
		 				$('#icon li').eq(stt_click).addClass('active');
		  				});
		  		}
		  		
		  		
		  	});
		 });