
<div id="footer-header">
	<div class="container">
		<div class="row" style="background: #2E2E2E;padding: 25px 0">

			<div class="col-xs-12 col-sm-5 wapper1">
				<?php
				$query_logo_footer = 'SELECT value FROM tb_information WHERE name = "logo_footer"';
				$result_logo_footer = mysqli_query($dbc, $query_logo_footer);
				if( mysqli_num_rows($result_logo_footer) > 0 ) {
					extract( mysqli_fetch_array($result_logo_footer, MYSQLI_ASSOC) );
					echo  '<img src="'. $value .'" class="img-responsive">';
				}
				?>  
				<!-- <img src="image/logo-bottom.png" class="img-responsive"> -->
				<p class="nd">
					<?php
					$query_description = 'SELECT value FROM tb_information WHERE name = "description"';
					$result_description = mysqli_query($dbc, $query_description);
					if( mysqli_num_rows($result_description) > 0 ) {
						extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
						echo  $value;
					}
					?> 
				</p>
				<span><a href="<?php echo  isset($fb) ? $fb : '' ?>"><img src="image/icon/fb.svg" alt="" style="width:40px"></a></span>
			</div>

			<div class="col-xs-12 col-sm-offset-1 col-sm-3 wapper2">
				<h3><span><i class="glyphicon glyphicon-list-alt"></i></span>
					Danh mục
				</h3>
				<ul>
					<?PHP 
					$array = category_name();
					foreach ($array as $value) {
						$value = explode("-+&", $value);
						?>
						<li><span><i class="glyphicon glyphicon-ok"></i></span><a href="sp-category.php?category=<?php echo $value[0]; ?>" style="color: #ccc;text-decoration: none;text-transform: capitalize;"><?php echo $value[1]; ?></a></li>
						<?php
					}
					?>
						<!-- <li><span><i class="glyphicon glyphicon-ok"></i></span>Áo thun nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Áo khoác nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Áo vest nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Áo len nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Giày nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Thắt lưng nam</li>
						<li><span><i class="glyphicon glyphicon-ok"></i></span>Ví da nam</li> -->
					</ul>
				</div>

				<div class="col-xs-12 col-sm-3 wapper3">
					<h3><span><i class="glyphicon glyphicon-envelope"></i></span>
						Liên hệ
					</h3>
					<ul>
						<!-- query email -->
						<?php
						$query_email = 'SELECT value FROM tb_information WHERE name = "email"';
						$result_email = mysqli_query($dbc, $query_email);
						if( mysqli_num_rows($result_email) > 0 ) { 
							extract( mysqli_fetch_array($result_email, MYSQLI_ASSOC) );
							$array_email = explode(' ', trim($value));
							foreach ($array_email as $value) {
								?>
								<li><span><i class="glyphicon glyphicon-envelope"></i></span><span style="font-family: 'Open Sans Bold';background: none">Email:</span> <?php echo $value; ?></li>
								<?php 
							}
						}
						?>

						<!-- query adress -->
						<?php
						$query_adress = 'SELECT value FROM tb_information WHERE name = "adress"';
						$result_adress = mysqli_query($dbc, $query_adress);
						if( mysqli_num_rows($result_adress) > 0 ) { 
							extract( mysqli_fetch_array($result_adress, MYSQLI_ASSOC) );
							$array_adress = explode("$%^$%^", trim($value, "$%^$%^") );
							foreach ($array_adress as $value) {
								?>
								<li><span><i class="glyphicon glyphicon-map-marker"></i></span>Địa chỉ <?php echo $value; ?></li>
								<?php 
							}
						}
						?>
					</ul>
				</div>


			</div>

		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<!-- <ul class="footer-botom">
					<li><a href="">Giới thiệu</a></li>
					<li><a href="">Liên hệ</a></li>
					<li><a href="">Chính sách khách vip</a></li>
					<li><a href="">Câu hỏi thường gặp</a></li>
					<li><a href="">Chính sách bảo mật</a></li>
					<li><a href="">Chính sách cookie</a></li>

				</ul> -->
				<div class="div-footer">Copyright 2018 · by <span>3T</span> All rights reserved</div>
			</div>
		</div>
	</footer>
