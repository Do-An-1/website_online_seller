<?php ob_start();?>
<?php 
	session_start();
	session_destroy();
	header('Location: login.php');
?>
<?php ob_flush();?>