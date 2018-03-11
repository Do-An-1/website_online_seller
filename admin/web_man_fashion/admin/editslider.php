
<?PHP include('includes/header.php');


//bai nay sai roi xem bài 25
?>
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
			include('../inc/function.php');
			if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' >=1)))
			{
				$id = $_GET['id'];
			}
			else{
			 header('Location: listvideo.php');
			 exit();
			}
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
				if (($_FILES['img']['size'] > 1000000) )
				{	
					$link_img = $_POST['anh_hi'];
					$thumb= $_POST['anhthumb_hi'];
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
				
				$imageThump->resize(1280,168,'crop');
				
				$imageThump->save($temp[0] . '_thump','../upload/resize');//ten với đường dẫn lưu anh (ten tự thêm đuôi)
				
				}
				 $sql ="SELECT anh,anh_thumb FROM tb_sider WHERE id={$id}";
				 $query_a=mysqli_query($dbc,$sql);
				 $anhInfo = mysqli_fetch_assoc($query_a);
				 unlink('../'.$anhInfo['anh']);
				 unlink('../'.$anhInfo['anh_thumb']);
				}
				
				$query="UPDATE FROM tb_sider
						SET titile='{$title}',
							anh='{$link_img}',
							anh_thumb='{$thumb}',
							odernum={ordernum},
							status={status}
						WHERE id={$id};
						";
				$results = mysqli_query($dbc,$query) or die("Query {$query} \n <br> Mysql errors:" .mysqli_error($dbc));
				if($results==1)	
				{echo "<p class='results'>Sửa thành công</p>";
				$_POST['title'] = "";$_POST['link']="";$_POST['ordernum']="";
				}
				else
				{
				echo "Sửa Thất bại";
				}
				}
			}
			$query_id = "SELECT titile,anh,anh_thumb,link,odernum,status FROM tb_sider WHERE id={$id}";
				$result_id = mysqli_query($dbc,$query_id);
				kt_query($query_id,$result_id);
				if(mysqli_num_rows($result_id) ==1)
				{
				list($title,$anh,$anh_thumb,$link,$ordernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
				}
				else{
				$massge="<p class='results1'>ID video không tồn tại</p>";
				}
			?>
		<form name="frmadd-slider" method="post" enctype="multipart/form-data">
		<?php
					if(isset($massge)){echo $massge;}
				 ?>
		<h3>Sửa slider : <?php if(isset($title)) {echo $title;}?></h3>
			<div class="form-group">
				
				<label>Title</label>
				<input type="text" name="title" value="<?php if(isset($title)) {echo $title;}?>" class="form-control"  placeholder='Title'/>
				<?php
					if (isset($errors) && in_array('title',$errors))
					{
					echo "<p class='results1'>Bạn hãy nhập Title </p>";
					}
					
				 ?>
			</div>
			<div class="form-group">
				
				<label>Ảnh đại diện</label>
				<p><img src="../<?php echo $anh; ?>" width="100px />"</p>
				<input type="hidden" name="anh_hi" value="<?php echo $anh; ?>" />
				<input type="hidden" name="anhthumb_hi" value="<?php echo $anh_thumb; ?>"/>
				<input type="file" name="img" value="" /> 
			</div>
			
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($link)) {echo $link;}?>" class="form-control"  placeholder='Link slider'/>
				<?php
					if (isset($errors) && in_array('link',$errors))
					{
					echo "<p class='results1'>Bạn hãy nhập Link </p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($ordernum)) {echo $ordernum;}?>" class="form-control"  placeholder='Thứ tự'/>
				<?php if (isset($errors) && in_array('chuoi',$errors))
					{
					echo "<p class='results1'>Thứ tự phải là số nguyên </p>";
					}
					?>
			</div>
			<div class="form-group">
				<label style="display:block">Trạng thái</label>
				<?php  if ($status == 1){ 
				?>
				<label class="radio-inline" > <input type="radio" name="status" value="1"  checked="checked"/> Hiển thị </label>
				<label class="radio-inline"> <input type="radio" name="status" value="0" />Không Hiển thị </label>
				<?php } 
				else 
				{
				?>
				<label class="radio-inline" > <input type="radio" name="status" value="1"  /> Hiển thị </label>
				<label class="radio-inline"> <input type="radio" name="status" value="0" checked="checked"/>Không Hiển thị </label>
				<?php }?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa"/>
			
		</form>
	</div>
</div>
<?PHP include('includes/footer.php');?>