<?PHP session_start();
if (!isset($_SESSION['uid'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản trị hệ thống</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Custom template -->
    <link rel="stylesheet" type="text/css" href="css/custom_template.css">
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top wrap-header-dasboard" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">QUẢN TRỊ HỆ THỐNG</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- <i class="fa fa-fw fa-user"></i> -->
                     Xin
                    chào: <?php if (isset($_SESSION['taikhoan'])) echo $_SESSION['taikhoan']; ?> <b
                            class="fa fa-fw fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i>Thông tin</a>
                    </li>
                    <li>
                        <a href="change_pass.php"><i class="fa fa-fw fa-gear"></i> Đổi mật khẩu</a>
                    </li>
                    <li>
                        <a href="http://localhost/web_man_fashion" target="_blank"><i class="fa fa-fw fa-shopping-cart"></i>Trang chủ</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </ul>
    <!-- </nav> -->
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?PHP
        include('sidebar.php');
        ?>
