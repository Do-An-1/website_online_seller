<?php ob_start(); ?>
<?php include('../inc/myconnect.php');?>
<?php include('../inc/function.php');?>

<?php 
	if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 1))){
		$id = $_GET['id'];
		$query_a= "SELECT anh,anh_thumb FROM tb_sider WHERE id={$id}";
		$result_a = mysqli_query($dbc,$query_a);
		kt_query($query_a,$result_a);
		$anhInfo =mysqli_fetch_assoc($result_a);
		unlink('../'.$anhInfo['anh']);
		unlink('../'.$anhInfo['anh_thumb']);
			$query = "DELETE FROM tb_sider WHERE id={$id}";
		$result = mysqli_query($dbc,$query);
		kt_query($query,$result);
		header('Location: listslider.php');

	}
	else{
	header('Location: listslider.php');
	}
?>
