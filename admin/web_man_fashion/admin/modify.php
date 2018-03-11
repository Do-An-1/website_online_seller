<?PHP include('includes/header.php');?>
<?php include('../inc/myconnect.php');?>
<?php include('../inc/function.php');?>
<style>
	#name-add{cursor:pointer;color:blue}
</style>
<div class="col-xs-12">
	<div class="row">
    	<div class="form-group">
        	<label>Tên Shop: </label>
            <div id="wrapper-name"></div>
        	<div id="name-add">+ thêm mới</div>
        </div>
    </div>
</div>

<?PHP include('includes/footer.php');?>
<script>
	$("#name-add").click(function(){
		$("#wrapper-name").append("<div><input></input> <span>Lưu</span></div>");
	})
</script>