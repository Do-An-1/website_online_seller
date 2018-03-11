<?php //khoi tao bo nho dem
	ob_start(); 
	?>

<?PHP include('includes/header.php');?>
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
				if(empty($_POST['link'])){
					$errors[] = 'link';
				}
				else {
					$link =$_POST['link'];
					}
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
				
				$query="UPDATE tb_video
						SET 
							title = '{$title}',
							link ='{$link}',
							ordernum= {$ordernum},
							status = {$status}
						WHERE
							id = {$id};
							";
				$results = mysqli_query($dbc,$query) or die("Query {$query} \n <br> Mysql errors:" .mysqli_error($dbc));
				if($results==1)	
				{echo "<p class='results'>Sửa thành công</p>";
				
				}
				else
				{
				echo "Thêm mới Thất bại";
				}
				}
				
				
			}
			$query_id = "SELECT title,link,ordernum,status FROM tb_video WHERE id={$id}";
				$result_id = mysqli_query($dbc,$query_id);
				kt_query($query_id,$result_id);
				if(mysqli_num_rows($result_id) ==1)
				{
				
				list($title,$link,$ordernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
				}
				else{
				$massge="<p class='results1'>ID video không tồn tại</p>";
				}
			?>
		<form name="frmadd-video" method="post">
		<?php
					if(isset($massge)){echo $massge;}
				 ?>
		<h3>Sửa video : <?php if(isset($title)) {echo $title;}?></h3>
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
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($link)) {echo $link;}?>" class="form-control"  placeholder='Video'/>
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
				<?php if($status == 1){ ?>
				<label class="radio-inline" > <input type="radio" name="status" value="1"  checked="checked"/> Hiển thị </label>
				<label class="radio-inline"> <input type="radio" name="status" value="0" />Không Hiển thị </label>
					<?php
				}
				else{
				?>
				
				<label class="radio-inline" > <input type="radio" name="status" value="1"  /> Hiển thị </label>
				<label class="radio-inline"> <input type="radio" name="status" value="0" checked="checked"/>Không Hiển thị </label>
				<?php 
				}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa Video"/>
			
		</form>
	</div>
</div>
<?PHP include('includes/footer.php');?>
<?php ob_flush();  ?>