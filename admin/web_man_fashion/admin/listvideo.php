<?PHP include('includes/header.php');?>
<?php include('../inc/myconnect.php');?>
<?php include('../inc/function.php');?>
		
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Danh sách video</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Title</th>
							<th>Link</th>
							<th>Thứ tự</th>
							<th>Trạng thái</th>
							<th>Edit</th>
							<th>Delete</th>	
						</tr>
					</thead>
					<tbody>
					<?php 
						$query= 'SELECT * FROM tb_user  ORDER BY  desc';
						$result = mysqli_query($dbc,$query);
						kt_query($query,$result);
						while($video = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						?>
						<tr>
							<td><?php echo $video['id'];?></td>
							<td><?php echo $video['title'];?></td>
							<td><?php echo $video['link'];?></td>
							<td><?php echo $video['ordernum'];?></td>
							<td ><?php if($video['status']==1) echo "Hiển thị"; else echo"Không hiển thị";?></td>
							<td align="center"><a href="editvideo.php?id=<?php echo $video['id']; ?>"><img src="../images/iconeditpng.png" width="16px"></a></td>
							<td align="center"><a  onClick="return confirm('Bạn thật sự muốn xóa không ?');" href="deletevideo.php?id=<?php echo $video['id'];  ?>"><img src="../images/icondelete.ico" width="16px"></a></td>
						</tr>
						
						<?php
						}
					?>
						
					</tbody>
				</table>
		
		</div>
	</div>
	
<?PHP include('includes/footer.php');?>