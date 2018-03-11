
<?PHP include('includes/header.php');?>
<?PHP include('../inc/images_helper.php');?>
<style>
.results{

color:#009966;}
.results1{color:#FF0000;}
</style>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		
		<?php 
			include('../inc/myconnect.php');
			if(isset($_POST['submit']))
			{	
				$errors = array();
				if(empty($_POST['title'])){
					$errors[] = 'title';
				}
				else {
					$title=$_POST['title']; 
					}
				
				$link =$_POST['link'];
					
				if(empty($_POST['ordernum'])){
					$ordernum = 0;
				}
				else {
					$ordernum =$_POST['ordernum'];
					
					}
				
				
				$status=$_POST['status'];
				if (!empty($errors))
				{
				$massge="<p class='results1'>Bạn hãy nhập đầy đủ thông tin !!</p>";
				}
				else {
				if (($_FILES['img']['type'] != "image/png") &&
					($_FILES['img']['type'] != "image/gif")	&&
					($_FILES['img']['type'] != "image/jpg")	&&
					($_FILES['img']['type'] != "image/jpeg")	
				)
					{
						$massge="<p class='results1'>File không đúng định dạng !!</p>";
					}
				elseif (($_FILES['img']['size'] > 1000000) )
				{	
				$massge="<p class='results1'>Kích thước phải nhỏ hơn 1MB !!</p>";
				}
				else{
				$img = $_FILES['img']['name'];
				$link_img = 'upload/' .$img;
				move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);
				
				//xử lí resize, crop hinh anh
				
				$temp= explode('.',$img);
				if($temp[1] == 'jpeg' or $temp[1] =='JPEG'){
				$temp[1] = jpg;
				}
				$temp[1]=strtolower($temp[1]);
				$thump ='upload/resize/'.$temp[0].'_thump'.'.'.$temp[1]; // đường dẫn
				$imageThump = new Image('../'.$link_img);
				// resize ảnh
			/*	if ($imageThump->getWidth() > 700){
				$imageThump->resize(700,'resize');
				}*/
				// crop anh 
				
				$imageThump->resize(260,300,'crop');
				
				$imageThump->save($temp[0] . '_thump','../upload/resize');//ten với đường dẫn lưu anh (ten tự thêm đuôi)
				
				}
				$query="INSERT INTO tb_sider(titile,anh,anh_thumb,link,odernum,status) VALUES('{$title}','{$link_img}','{$thump}','{$link}',$ordernum ,$status)";
				$results = mysqli_query($dbc,$query) or die("Query {$query} \n <br> Mysql errors:" .mysqli_error($dbc));
				if($results==1)	
				{echo "<p class='results'>Thêm mới thành công</p>";
				$_POST['title'] = "";$_POST['link']="";$_POST['ordernum']="";
				}
				else
				{
				echo "Thêm mới Thất bại";
				}
				}
			}
			?>
		<form name="frmadd-slider" method="post" enctype="multipart/form-data">
		<?php
					if(isset($massge)){echo $massge;}
				 ?>
		<h3>Thêm mới slider</h3>
			<div class="form-group">
				
				<label>Title</label>
				<input type="text" name="title" value="<?php if(isset($_POST['title'])) {echo $_POST['title'];}?>" class="form-control"  placeholder='Title'/>
				<?php
					if (isset($errors) && in_array('title',$errors))
					{
					echo "<p class='results1'>Bạn hãy nhập Title </p>";
					}
					
				 ?>
			</div>
			<div class="form-group">
				
				<label>Ảnh đại diện</label>
				<input type="file" name="img" value="" /> 
			</div>
			
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($_POST['link'])) {echo $_POST['link'];}?>" class="form-control"  placeholder='Link slider'/>
				<?php
					if (isset($errors) && in_array('link',$errors))
					{
					echo "<p class='results1'>Bạn hãy nhập Link </p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($_POST['ordernum'])) {echo $_POST['ordernum'];}?>" class="form-control"  placeholder='Thứ tự'/>
				<?php if (isset($errors) && in_array('chuoi',$errors))
					{
					echo "<p class='results1'>Thứ tự phải là số nguyên </p>";
					}
					?>
			</div>
			<div class="form-group">
				<label style="display:block">Trạng thái</label>
				
				<label class="radio-inline" > <input type="radio" name="status" value="1"  checked="checked"/> Hiển thị </label>
				<label class="radio-inline"> <input type="radio" name="status" value="0" />Không Hiển thị </label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới"/>
			
		</form>
	</div>
</div>
<?PHP include('includes/footer.php');?>