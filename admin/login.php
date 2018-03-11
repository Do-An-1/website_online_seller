<?PHP 
    session_start();
    if(isset($_SESSION['uid']))
    {
        header('location: index.php');
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style-login.css" />
    <title>Đăng nhập</title>
</head>
<?php include('inc/myconnect.php');?>
<?php include('inc/function.php');?>

<?php
if( isset( $_POST['login'] ))
{
    $error=array();
    if( empty($_POST['username']) || empty($_POST['password']) )
    {
        $error='username';
        $error='password';
    }
    else
    {   
        $partten = "/[A-Za-z0-9]/";
        if( strlen($_POST['username']) < 3 || strlen($_POST['username']) >15 || strlen($_POST['password']) < 3 || strlen($_POST['password']) >15){
            $error='username';
            $error='password';
            echo '<script>alert("Tài khoản và mật khẩu phải trong khoảng từ 3 đến 15 ký tự.!");</script>';
        }elseif ( !preg_match($partten ,$_POST['username'], $matchs) || !preg_match($partten ,$_POST['password'], $matchs)) {
            $error='username';
            $error='password';
            echo '<script>alert("Tài khoản mật khẩu không hợp lệ");</script>';
        }else{
            $taikhoan=$_POST['username'];
            $matkhau=md5($_POST['password']);
        }
        
    }




    if(empty($error)){
        $query =    "SELECT id_user,account_user,pass_user,type_user
					FROM tb_user
					WHERE account_user='{$taikhoan}' AND pass_user='{$matkhau}' AND status_user=1";
        $result = mysqli_query($dbc,$query);
        kt_query($query,$result);


        if(mysqli_num_rows($result) ==1){
            list($id,$taikhoan,$matkhau,$type_user)= mysqli_fetch_array($result,MYSQLI_NUM);
            $_SESSION['uid']= $id;
            $_SESSION['taikhoan']= $taikhoan;
            $_SESSION['type_user']= $type_user;
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
        <input style=" margin: auto; margin-top: 13px; " type="submit" name="login" id="button" value="Đăng nhập"/>
    </form>

</div>



</body>
</html>