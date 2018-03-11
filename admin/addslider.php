
<?PHP include('includes/header.php');?>
<?PHP include('../inc/images_helper.php');?>
<style>
.results{color:#009966;}
.results1{color:#FF0000;}
#page-wrapper .frmedit-product .wrap-img .item{
	width: 100%;
	height: 200px;
	margin-bottom: 15px;
}
#page-wrapper .frmedit-product .more{
	width: 100%;
	height: 200px;
	line-height: 200px;
	margin-left: 0;
	margin-bottom: 15px;
}
#page-wrapper .frmedit-product .wrap-img .icon{
	line-height: 200px;
}
#page-wrapper .frmedit-product .wrap-img .icon i{
	font-size: 35px;
}
</style>
<?php 
include('inc/myconnect.php');
if(isset($_POST['submit'])) {
	$link_image ="";
	if( isset($_POST['anh_hi']) ) {
		$link_image = implode(" ", $_POST['anh_hi']);	

	}
        // Duyệt mảng
	if ( isset($_FILES['img']) ) {	
		foreach ($_FILES['img']['name'] as $key => $value) {
			if (($_FILES['img']['type'][$key] != "image/png") &&
				($_FILES['img']['type'][$key] != "image/gif") &&
				($_FILES['img']['type'][$key] != "image/jpg") &&
				($_FILES['img']['type'][$key] != "image/jpeg")
			) {
				$massge = "<p class='results1'>File không đúng định dạng !!</p>";
		} elseif (($_FILES['img']['size'][$key] > 1000000)) {
			$massge = "<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
		} else {
			$img = str_replace(" ","",$_FILES['img']['name'][$key]);
			$link_img = 'image/' . $img;
			move_uploaded_file($_FILES['img']['tmp_name'][$key], "../image/" . $img);
			$link_image .= " " .$link_img;
		}
	        }//ket thuc foreach
	    }
	    $link_image = trim($link_image);
	    $query = "SELECT * FROM tb_information WHERE name='slider'";
	    $result = mysqli_query( $dbc, $query );
	    if( mysqli_num_rows($result) > 0 ) {
	    	$query_ud = "UPDATE tb_information SET value='{$link_image}' WHERE name='slider'";
	    	$result_ud = mysqli_query( $dbc, $query_ud );
	    	// if( mysqli_num_rows($result_ud) > 0 ) {
	    	$message = "<p class='results'>Cập nhật thành công</p>";
	    	// } else {
	    	// 	$message = "<p class='results1'>Cập nhật thất bại!!</p>";
	    	// }

	    } else {
	    	$query_is = "INSERT INTO  tb_information(name,value) VALUES('slider', '{$link_image}')";
	    	echo $query_is;
	    	$result_is = mysqli_query( $dbc, $query_is );
	    	echo mysqli_num_rows($result_is);
	    	// if( mysqli_num_rows($result_is) > 0 ) {
	    	// 	$message = "<p class='results'>Lưu thành công</p>";
	    	// } else {
	    	$message = "<p class='results1'>Lưu thất bại!!</p>";
	    	// }
	    }
	}
	?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<div class="form-group">
				<form class="frmedit-product" action="" method="post" enctype="multipart/form-data">
					<?php
					if (isset($message)) {
						echo $message;
					}
					?>	
					<h3 style="text-transform: uppercase;text-align: center;font-weight: bold;">
						Ảnh Slider
						<small style="text-transform: none;">(kích thước tối thiểu 1500x500)</small></h3>
						<div class="wrap-img">
							<?php 
							$query = "SELECT * FROM tb_information WHERE name = 'slider'";
							$result = mysqli_query($dbc, $query);
							if( mysqli_num_rows($result) > 0 ) {
								extract(mysqli_fetch_array($result, MYSQLI_ASSOC));
								$array_slider = explode(" ", $value);
								if( isset($value) && !empty($value)) {
									foreach ($array_slider as $key => $value) {
										?>
										<span class="item">
											<span class="delete"><i class="glyphicon glyphicon-remove"></i></span>
											<div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
											<img src="../<?php echo $value; ?>" class="item-img">
											<input type="hidden" name="anh_hi[]" value="<?php echo $value ?>" class="input-hi">
											<input type="file" name="img[]" class="file">
										</span>
										<?php 
									}
								}
							}
							?>
							<div class="more"><i class="glyphicon glyphicon-plus"></i></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Lưu"/>
				</form>
			</div>
		</div>
		<?PHP include('includes/footer.php');?>
		<script type="text/javascript">
			var i = 0;
			$(".more").click(function(e){
				$(this).before(`<span class="item">
					<div class="icon"><i class="glyphicon glyphicon-camera"></i></div>
					<input type="file" name="img[]" class="file">
					</span>`);
				$('.item').fadeIn("slow");
			});
			$("body").on("change", ".file", function(){
				if(this.files.length > 0){
					i++;
					$(this).parent().find("img").remove();
					$(this).parent().find(".input-hi").remove();
					$(this).before('<span class="delete"><i class="glyphicon glyphicon-remove"></i></span>');
					$(this).before("<img src='' class='img" + i + " item-img" +"'/>");
					var ready = new FileReader();
					ready.onload  = function(e){
						$('.img' + i).attr('src', e.srcElement.result);
					};

					ready.readAsDataURL(this.files[0]);
				}

			});
			$("body").on("click", ".delete", function(){
				$(this).parent().remove();
			})
		</script>
<script type="text/javascript">
    $('.quang-cao .collapse').addClass('in');
    $('.quang-cao .slider').css({'background-color': '#e1e1e1'});
</script>

