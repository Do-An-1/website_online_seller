
// *------- Xu li name
	// edit
	$("#ifm-website .wrap-name").on("click",".wrap-value .edit",function(){
		var value = $(this).parents(".wrap-value").find(".text-value").text();
		$(this).parents(".wrap-value").find(".text-value").before(`
			<input type="text" name="" class="form-text text-input text-name" placeholder="Tên Shop Của Bạn" value="`+ value +`">
			`);
		$(this).parents(".wrap-value").find(".text-value").remove();
		$(this).before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
			`);
		$(this).remove();
	});
 	// save  
 	$("#ifm-website .wrap-name").on("click",".wrap-value .save",function(){
 		var seclect = $(this);
 		seclect.parents(".wrap-name").find(".notifi").removeClass("active");
 		var value = seclect.parents(".wrap-value").find(".text-name").val();
 		$.post("functions/xuli-information.php", {field: "name", value: value}, function(data){
 			
 			seclect.parents(".wrap-name").find(".notifi").addClass("active");
 			// 
 			seclect.parents(".wrap-name").find(".text-input").before(' <div class="text-value">'+ value +'</div> ');
 			seclect.parents(".wrap-name").find(".text-input").remove();
 			//
 			//
 			seclect.before('<div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>');
 			seclect.remove();
 		})
 	});
 	// Ket thuc xu li name
// Nut edit chi chuyển text hiện tại sang text input , đôi dấu chỉnh sửa thằng Lưu

// *------- Xu li mo ta
	// 	edit
	$("#ifm-website .wrap-description").on("click",".wrap-value .edit",function(){
		var value = $(this).parents(".wrap-value").find(".text-value").text();
		$(this).parents(".wrap-value").find(".text-value").before(`
			<textarea rows="4"  name=""  class="form-text text-input text-description" placeholder="Mô tả Shop Của Bạn">`+ value.trim() +`</textarea>
			`);
		$(this).parents(".wrap-value").find(".text-value").remove();
		$(this).before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
			`);
		$(this).remove();
	});
	 	// save  
	 	$("#ifm-website .wrap-description").on("click",".wrap-value .save",function(){
	 		var seclect = $(this);
	 		seclect.parents(".wrap-description").find(".notifi").removeClass("active");
	 		var value = seclect.parents(".wrap-value").find(".text-description").val();
	 		$.post("functions/xuli-information.php", {field: "description", value: value}, function(data){
	 			
	 			seclect.parents(".wrap-description").find(".notifi").addClass("active");
	 			// 
	 			seclect.parents(".wrap-description").find(".text-input").before(' <div class="text-value">'+ value +'</div> ');
	 			seclect.parents(".wrap-description").find(".text-input").remove();
	 			//
	 			//
	 			seclect.before('<div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>');
	 			seclect.remove();
	 		})
	 		
	 	});
// kêt thúc mo ta 
// *------- Xu li fb
	// edit
	$("#ifm-website .wrap-fb").on("click",".wrap-value .edit",function(){
		var value = $(this).parents(".wrap-value").find(".text-value").text();
		$(this).parents(".wrap-value").find(".text-value").before(`
			<input type="text" name="" class="form-text text-input text-name" placeholder="Link facebook" value="`+ value +`">
			`);
		$(this).parents(".wrap-value").find(".text-value").remove();
		$(this).before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
			`);
		$(this).remove();
	});
 	// save  
 	$("#ifm-website .wrap-fb").on("click",".wrap-value .save",function(){
 		var seclect = $(this);
 		seclect.parents(".wrap-fb").find(".notifi").removeClass("active");
 		var value = seclect.parents(".wrap-value").find(".text-name").val();
 		$.post("functions/xuli-information.php", {field: "fb", value: value}, function(data){
 			
 			seclect.parents(".wrap-fb").find(".notifi").addClass("active");
 			// 
 			seclect.parents(".wrap-fb").find(".text-input").before(' <div class="text-value">'+ value +'</div> ');
 			seclect.parents(".wrap-fb").find(".text-input").remove();
 			//
 			//
 			seclect.before('<div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>');
 			seclect.remove();
 		})
 	});
 	// Ket thuc xu li name
// *----- Xu li anh logo_header
	// var value_logo_header;
	$("#ifm-website .wrap-logo-header").on("change",".wrap-value .file",function(){
		if(this.files.length > 0) {
			var ready = new FileReader();
            ready.onload  = function(e){
                $('#ifm-website .wrap-logo-header .item-img').attr('src', e.srcElement.result);
            };

            ready.readAsDataURL(this.files[0]);
            $(this).parents(".wrap-value").find(".save-logo").remove();
            $(this).parent(".item").parent().after(`<td style="line-height: 150px" class="save-logo">
                                     <div class="save text-right" style="vertical-align: middle;"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
                                 </td>`);
            // value_logo_header = this.files;
		}
	}) 
	// xuli save 
	$("#ifm-website .wrap-logo-header").on("click",".wrap-value .save",function(){
		var seclect = $(this);	
		seclect.parents(".wrap-logo-header").find(".notifi").removeClass("active");
		var file_data = $('#ifm-website .wrap-logo-header .file').prop('files')[0];
		console.log(file_data['type']);
		if( file_data['type'] == "image/jpeg"|| file_data['type'] == "image/jpg" ||   file_data['type'] == "image/png") {
			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('field', "logo-header");
			// console.log(file_data);
			 $.ajax({
	                url: 'functions/xuli-information.php', // gửi đến file upload.php 
	                dataType: 'text',
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,                       
	                type: 'post',
	                success: function(data){
	                	
	                	seclect.parents(".wrap-logo-header").find(".notifi").addClass("active");
	                	seclect.remove();
	            }

			})
		} else {
			alert("Ảnh không hợp lệ");
		} 
	})
// *----- Xu li anh logo_footer
// xu li logo-footer
// var value_logo_header;
	$("#ifm-website .wrap-logo-footer").on("change",".wrap-value .file",function(){
		if(this.files.length > 0) {
			var ready = new FileReader();
            ready.onload  = function(e){
                $('#ifm-website .wrap-logo-footer .item-img').attr('src', e.srcElement.result);
            };

            ready.readAsDataURL(this.files[0]);
            $(this).parents(".wrap-value").find(".save-logo").remove();
            $(this).parent(".item").parent().after(`<td style="line-height: 150px" class="save-logo">
                                     <div class="save text-right" style="vertical-align: middle;"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
                                 </td>`);
            // value_logo_header = this.files;
		}
	}) 
	// xuli save 
	$("#ifm-website .wrap-logo-footer").on("click",".wrap-value .save",function(){
		var seclect = $(this);	
		seclect.parents(".wrap-logo-footer").find(".notifi").removeClass("active");
		var file_data = $('#ifm-website .wrap-logo-footer .file').prop('files')[0];
		console.log(file_data['type']);
		if( file_data['type'] == "image/jpeg"|| file_data['type'] == "image/jpg" ||   file_data['type'] == "image/png") {
			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('field', "logo-footer");
			// console.log(file_data);
			 $.ajax({
	                url: 'functions/xuli-information.php', // gửi đến file upload.php 
	                dataType: 'text',
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,                       
	                type: 'post',
	                success: function(data){
	                	
	                	seclect.parents(".wrap-logo-footer").find(".notifi").addClass("active");
	                	seclect.remove();
	            }

			})
		} else {
			alert("Ảnh không hợp lệ");
		} 
	})
// ket thuc logo-footer

// *------ Xu li phone
	$("#ifm-website .wrap-phone").on("click", ".add-new", function(){
		$(this).before(`
			<tr class="wrap-right">
                 <td>
                     <input type="text" name="" class="form-text text-input text-phone" placeholder="Số diện thoại" value>
                 </td>
                 <td>
                    <div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
                 </td>
                 <td>
                     <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                 </td>
            </tr>	
		`);
	});
	// edit
	$("#ifm-website .wrap-phone").on("click", ".edit", function(){
		select = $(this);
		var value = select.parents(".wrap-right").find(".text-value").text();
		// 
		select.parents(".wrap-right").find(".text-value").before(`
			<input type="text" name="" class="form-text text-input text-phone" placeholder="Số diện thoại" value="`+ value +`">
		`)
		select.parents(".wrap-right").find(".text-value").remove();
		// 
		select.before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
		`);
		select.remove();
	});
	// delete
	$("#ifm-website .wrap-phone").on("click", ".detele", function(){
		select = $(this);
		select.parents(".wrap-right").remove();
		var value = '';
		$("#ifm-website .wrap-phone .wrap-value .text-value").each(function(){
			value += " " + ignoreSpaces($(this).text());
		})
		$.post('functions/xuli-information.php', {field:'phone', value: value}, function(){
		});
	});
	// save
		$("#ifm-website .wrap-phone").on("click", ".save", function(){
			select = $(this);
			select.parents(".wrap-phone").find(".notifi").removeClass('active');
			var value = select.parents(".wrap-right").find(".text-phone").val();
			// Kiêm tra đúng dịnh dang sdt chưa
			var filter = /^[0-9-+]{10,11}$/;
			if (filter.test(value)) {
				// 
	        	select.parents(".wrap-right").find(".text-phone").before(`
				<div class="text-value">` + value + `</div> 
				`);
				select.parents(".wrap-right").find(".text-phone").remove();
				//  luu lai
				var value = '';
				$("#ifm-website .wrap-phone .wrap-value .text-value").each(function(){
					value += " " + ignoreSpaces($(this).text());
				})
				$.post('functions/xuli-information.php', {field:'phone', value: value}, function(){
					select.parents(".wrap-phone").find(".notifi").addClass('active');
					select.before(`
					 <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
					`);
					select.remove();

				});
				// 
				
		    }
		    else {
		       	alert("Số điện thoại không hợp lệ");
		    }
		// 
	})
// Ket thuc xu li sdt

// *------ Xu li email

	$("#ifm-website .wrap-email").on("click", ".add-new", function(){
		$(this).before(`
			<tr class="wrap-right">
                 <td>
                     <input type="text" name="" class="form-text text-input text-email" placeholder="Email" value>
                 </td>
                 <td>
                    <div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
                 </td>
                 <td>
                     <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                 </td>
            </tr>	
		`);
	});
	// edit
	$("#ifm-website .wrap-email").on("click", ".edit", function(){
		select = $(this);
		var value = select.parents(".wrap-right").find(".text-value").text();
		// 
		select.parents(".wrap-right").find(".text-value").before(`
			<input type="text" name="" class="form-text text-input text-email" placeholder="Số diện thoại" value="`+ value +`">
		`)
		select.parents(".wrap-right").find(".text-value").remove();
		// 
		select.before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
		`);
		select.remove();
	});
	// delete
	$("#ifm-website .wrap-email").on("click", ".detele", function(){
		select = $(this);
		select.parents(".wrap-right").remove();
		var value = '';
		$("#ifm-website .wrap-email .wrap-value .text-value").each(function(){
			value += " " + ignoreSpaces($(this).text());
		})
		$.post('functions/xuli-information.php', {field:'email', value: value}, function(){
		});
	});
	// save
		$("#ifm-website .wrap-email").on("click", ".save", function(){
			select = $(this);
			select.parents(".wrap-email").find(".notifi").removeClass('active');
			var value = select.parents(".wrap-right").find(".text-email").val();
			// Kiêm tra đúng dịnh dang sdt chưa
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (filter.test(value)) {
				// 
	        	select.parents(".wrap-right").find(".text-email").before(`
				<div class="text-value">` + value + `</div> 
				`);
				select.parents(".wrap-right").find(".text-email").remove();
				//  luu lai
				var value = '';
				$("#ifm-website .wrap-email .wrap-value .text-value").each(function(){
					value += " " + ignoreSpaces($(this).text());
				})
				$.post('functions/xuli-information.php', {field:'email', value: value}, function(){
					select.parents(".wrap-email").find(".notifi").addClass('active');
					select.before(`
					 <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
					`);
					select.remove();

				});
				// 
				
		    }
		    else {
		       	alert("Email không hợp lệ");
		    }
		// 
	})
// Ket thuc xu li email

// *------ Xu li dia chi

	$("#ifm-website .wrap-adress").on("click", ".add-new", function(){
		$(this).before(`
			<tr class="wrap-right">
                 <td>
                     <input type="text" name="" class="form-text text-input text-adress" placeholder="Địa chỉ" value>
                 </td>
                 <td>
                    <div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
                 </td>
                 <td>
                     <div class="detele text-right"><i class="glyphicon glyphicon-remove"></i>Xóa</div>   
                 </td>
            </tr>	
		`);
	});
	// edit
	$("#ifm-website .wrap-adress").on("click", ".edit", function(){
		select = $(this);
		var value = select.parents(".wrap-right").find(".text-value").text();
		// 
		select.parents(".wrap-right").find(".text-value").before(`
			<input type="text" name="" class="form-text text-input text-adress" placeholder="Số diện thoại" value="`+ value +`">
		`)
		select.parents(".wrap-right").find(".text-value").remove();
		// 
		select.before(`
			<div class="save text-right"><i class="glyphicon glyphicon-floppy-save"></i>Lưu</div>
		`);
		select.remove();
	});
	// delete
	$("#ifm-website .wrap-adress").on("click", ".detele", function(){
		select = $(this);
		select.parents(".wrap-right").remove();
		var value = '';
		$("#ifm-website .wrap-adress .wrap-value .text-value").each(function(){
			value += " " + ignoreSpaces($(this).text());
		})
		$.post('functions/xuli-information.php', {field:'adress', value: value}, function(){
		});
	});
	// save
		$("#ifm-website .wrap-adress").on("click", ".save", function(){
			select = $(this);
			select.parents(".wrap-adress").find(".notifi").removeClass('active');
			var value = select.parents(".wrap-right").find(".text-adress").val();

        	select.parents(".wrap-right").find(".text-adress").before(`
			<div class="text-value">` + value + `</div> 
			`);
			select.parents(".wrap-right").find(".text-adress").remove();
			//  luu lai
			var value = '';
			$("#ifm-website .wrap-adress .wrap-value .text-value").each(function(){
				value += "$%^$%^" + $(this).text();
			})
			$.post('functions/xuli-information.php', {field:'adress', value: value}, function(){
				select.parents(".wrap-adress").find(".notifi").addClass('active');
				select.before(`
				 <div class="edit text-right"><i class="glyphicon glyphicon-pencil"></i>Chỉnh sửa</div>
				`);
				select.remove();

			});
			// 
				
		    
		// 
	})
// Ket thuc xu li dia chi

// Hàm xóa bỏ khoảng trắng trong chuỗi
function ignoreSpaces(string) {
	var temp = "";
	string = '' + string;
	splitstring = string.split(" ");
	for(i = 0; i < splitstring.length; i++)
	temp += splitstring[i];
	return temp;
	}
