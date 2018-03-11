<?PHP include('includes/header.php');?>
<?php include('../inc/myconnect.php');?>
<?php include('../inc/function.php');?>
		
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3> Danh sách ảnh slider </h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Mã</th>
						<th>Tài khoản</th>
						
						<th>Họ tên</th>
						<th>Điện thoại</th>
						<th>Email</th>
						<th>Địa chỉ</th>
						
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
						$limit=2;
						//xac dinh vi trí bắt đầu là trang thứ mấy
						if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range' =>1))){
							$start = $_GET['s'];
						}
						else{
							$start = 0;
						}
						//xem phải có bao nhiu trang
						if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range' =>1))){
							$per_page = $_GET['p'];
						}
						else{
							//nếu p không có thì sẽ truy vấn CSDL để tìm xem có bao nhìu trang
							
							$query_pg="SELECT COUNT(id) FROM tb_user";	
							$result_pg = mysqli_query($dbc,$query_pg);
							kt_query($query_pg,$result_pg);	
							list($record)= mysqli_fetch_array($result_pg,MYSQLI_NUM);
							//Tìm số trang bằng cách chia số dữ liệu cho limit
							
							if($record >$limit){
								$per_page = ceil($record /$limit);
								echo $record;
								echo $per_page;
							}
							else{
							 	$per_page=1;
							}
						}
						
						$query = "SELECT* FROM tb_user ORDER BY id LIMIT {$start},{$limit}";
						$result = mysqli_query($dbc,$query);
						kt_query($query,$result);
						while($slider = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
					?>
					<tr>
						<td><?php echo $slider['id']; ?></td>
						<td><?php echo $slider['taikhoan']; ?></td>	
						<td><?php echo $slider['hoten']; ?></td>
						<td><?php echo $slider['dienthoai'] ?></td>
						<td><?php echo $slider['email'] ?></td>
						<td><?php echo $slider['diachi'] ?></td>
						<td align="center"><a href="edituser.php?id=<?php echo $slider['id']; ?>"><img src="../images/iconeditpng.png" width="16px"></a></td>
						<td align="center"><a  onClick="return confirm('Bạn thật sự muốn xóa không ?');" href="deleteuser.php?id=<?php echo $slider['id'];  ?>"><img src="../images/icondelete.ico" width="16px"></a></td>
					</tr>
					<?PHP }?>
				</tbody>
			</table>
			
			<?php 
				echo "<ul class='pagination'>";
					if($per_page>1){
						$current_page =($start/$limit)+1;
						//nếu không phải trang đầu
						if($current_page != 1)
						{
							echo "<li><a href='listuser.php?s=".($start-$limit)."&p={$per_page}'>Black</a></li>";
						}
						//Hiện thị những phần còn lại của trạng
						for($i=1;$i<=$per_page;$i++)
						{
							if($i !=$current_page)
							{
								echo "<li><a href='listuser.php?s=".($limit*($i-1))."&p={$per_page}'>{$i}</a></li>";
							}
							else{
								echo "<li class='active'><a>{$i}</a></li>";
							}
						}
						//nếu không phải trang cuối thì hiện thị nút next
						if($current_page != $per_page)
						{
						echo "<li><a href='listuser.php?s=".($start+$limit)."&p={$per_page}'>Next</a></li>";	
						}
					}
						
				echo "</ul>";
			?>
			
		</div>
</div>		
<?PHP include('includes/footer.php');?>