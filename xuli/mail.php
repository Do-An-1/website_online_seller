<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 3/9/2017
 * Time: 19:38 PM
 */


if(isset($_POST['submitNewleter'])){
    $ktMail="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    $insertMail=$_POST['insertMail'];
    if(!preg_match($ktMail ,$insertMail)){
        header('location:../loi-dang-ki-nhan-km.php');
    }else{
        header('location:../dang-ki-nhan-km-thanh-cong.php');
    }

}
?>