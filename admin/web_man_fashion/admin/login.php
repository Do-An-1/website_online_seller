
<?PHP session_start();
    if(isset($_SESSION['uid']))
    {
        header('location: index.php');
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style-login.css" />
    <title>Đăng nhập</title>
</head>
<?php include('../inc/myconnect.php');?>
<?php include('../inc/function.php');?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $error=array();
    if(empty($_POST['username']))
    {
        $error='username';
    }
    else
    {
        $taikhoan=$_POST['username'];
    }
    if(empty($_POST['password']))
    {
        $error='password';
    }
    else
    {
        $matkhau=md5($_POST['password']);
    }
    if(empty($error)){
        $query = "SELECT id_user,account_user,pass_user 
					FROM tb_user
					  WHERE account_user='{$taikhoan}' AND pass_user='{$matkhau}' AND status_user=1";
        $result = mysqli_query($dbc,$query);
        kt_query($query,$result);


        if(mysqli_num_rows($result) ==1){
            list($id,$taikhoan,$matkhau,$status)= mysqli_fetch_array($result,MYSQLI_NUM);
            $_SESSION['uid']= $id;
            $_SESSION['taikhoan']= $taikhoan;
            header('Location: index.php') ;
        }
        else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng. Vui lòng đăng nhập lại !!!");</script>';
            $username="";
            $password="";
        }

    }
}

?>
<body>
<div id="login">
    <form action="login.php" method="post" enctype="multipart/form-data">
        <h2>Đăng nhập</h2>
        <input type="text" name="username" id="username" placeholder="Nhập tài khoản . . ." required="required" />
        <input type="password" name="password" id="password" maxlength="20" placeholder="Nhập mật khẩu . . ." required="required" />
        <input style=" margin: auto; margin-top: 13px; " type="submit" name="login" id="button" value="Sign in"/>
    </form>

</div>



</body>
</html>