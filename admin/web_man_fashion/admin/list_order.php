<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/15/2017
 * Time: 4:40 PM
 */
?>

<form method="POST" name="frmForm" action="./">
    <input type="hidden" name="act" value="order">
    <input type=hidden name="page" value="<?php //echo $page?>">
    <?php //$pageindex = createPage(countRecord("tb_order","1=1"),'./?act=order"."&page=',$MAXPAGE,$page);
    ?>

    <table cellspacing="0" cellpadding="0" width="100%">
        <tr><td height="30" class="smallfont">Trang : <?php //echo $pageindex?></td></tr>
    </table>

    <table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
        <tr>
            <th width="20" class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></th>
            <th width="20" class="title"></th>
            <th width="80" class="title">Chi tiết</th>
            <th width="20" class="title">ID</th>
            <th class="title"><a class="title" href="<?php //echo getLinkSort(2)?>">Mã SP</a></th>
            <th class="title">Số lượng SP</th>
            <th class="title"><a class="title" href="<?php //echo getLinkSort(3)?>">Tên khách hàng</a></th>
            <th width="90" class="title"><a class="title" href="<?php //echo getLinkSort(4)?>">Ngày tạo lập</a></th>
            <th width="90" class="title"><a class="title" href="<?php //echo getLinkSort(5)?>">Lần hiệu chỉnh trước</a></th>
        </tr>

<!--        --><?php //$sortby = 'order by date_added';
//        if ($_REQUEST['sortby']!='') $sortby='order by '.(int)$_REQUEST['sortby'];
//        $direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?'desc':'');
//
//        $sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from tbl_order $sortby $direction limit ".($p*$MAXPAGE).",".$MAXPAGE;
//        $result=mysqli_query($sql,$dbc);
//        $i=0;
//        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
//            $cust = getRecord("tbl_member",'id='.$row['member_id']);
//            $color = $i++%2 ? '#d5d5d5' : '#e5e5e5';
            ?>

            <tr>
                <td bgcolor="<?php echo $color?>" class="smallfont">
                    <input type="checkbox" name="chk[]" value="<?php echo $row['id']?>">
                </td>
                <td bgcolor="<?php echo $color?>" class="smallfont">
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="./?act=order&action=del&id=<?php echo $row['id']?>">Xóa</a>
                </td>
                <td bgcolor="<?php echo $color?>" class="smallfont" align="center">
                    <input type="button" name="butDetail" value="Đơn hàng" class="button" onclick="javascript:window.location='./?act=order_detail&id=<?php echo $row['id']?>'"></td>
                <td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php //echo $row['id']?></td>
                <td bgcolor="<?php echo $color?>" align="center" class="smallfont"><?php //echo $row['code']?></td>
                <td bgcolor="<?php echo $color?>" align="center" class="smallfont">
                    <?php //echo countRecord('tbl_order_detail','order_id='.$row['id'])?>
                </td>
                <td bgcolor="<?php echo $color?>" class="smallfont"><?php //echo $cust['name']?></td>
                <td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php //echo $row['dateAdd']?></td>
                <td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php //echo $row['dateModify']?></td>
            </tr>
        <?php //}
        ?>
    </table>

    <input type="submit" value="Xóa chọn" name="ButDel" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
</form>
<script language="JavaScript">
    function chkallClick(o) {
        var form = document.frmForm;
        for (var i = 0; i < form.elements.length; i++) {
            if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
                form.elements[i].checked = document.frmForm.chkall.checked;
            }
        }
    }
</script>
<?php //if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
    <tr><td height="10"></td></tr>
    <tr><td class="smallfont"><?php //echo 'Tổng số hàng : <b>'.countRecord('tbl_order').'</b>'?></td></tr>
</table>