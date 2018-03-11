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
						<th>Tiêu đề </th>
						<th>Ảnh</th>
						<th>Link</th>
						<th>Thứ tự</th>
						<th>Trạng thái</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT* FROM tb_sider ORDER BY id DESC";
						$result = mysqli_query($dbc,$query);
						kt_query($query,$result);
						while($slider = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
					?>
					<tr>
						<td><?php echo $slider['id']; ?></td>
						<td><?php echo $slider['titile']; ?></td>
						<td><img width="80px" src="../<?php echo $slider['anh']; ?>" /></td>
						<td><?php echo $slider['link']; ?></td>
						<td><?php echo $slider['odernum'] ?></td>
						<td><?php if (($slider['status']) == 1)
						
									{
										
									echo "Hiển thị";
									}
									else {echo "Không hiển thị";} ?></td>
						<td align="center"><a href="editslider.php?id=<?php echo $slider['id']; ?>"><img src="../images/iconeditpng.png" width="16px"></a></td>
						<td align="center"><a  onClick="return confirm('Bạn thật sự muốn xóa không ?');" href="deleteslider.php?id=<?php echo $slider['id'];  ?>"><img src="../images/icondelete.ico" width="16px"></a></td>
					</tr>
					<?PHP }?>
				</tbody>
			</table>
		</div>
</div>		
<?PHP include('includes/footer.php');?>