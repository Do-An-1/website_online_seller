<?php
//kiếm tra xem kết quả trả về có đúng hay không.

function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|À|Á',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

    );
    foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    return str_replace(" ","", $str);
}
function kt_query($result,$query)
{
    global $dbc;
    if (!$result){
        die("Query {$query} \n<br/> MYSQL Errors : " .mysqli_error($dbc));
    }
}

function show_categories($parent_id=0,$insert_text=""){
    global $dbc;
    $query="SELECT * FROM tb_category WHERE parent_id={$parent_id}";
    $result= mysqli_query($dbc,$query);
    kt_query($result,$query);
    while($parent=mysqli_fetch_array($result,MYSQLI_ASSOC)){


        echo ("<option value='".$parent['id_category']."'>".$insert_text.$parent['name_category']."</option>");
        show_categories($parent['id_category'],$insert_text."- ");
    }

}

function ctrSelect($name,$class){
    global $dbc;

    echo "<select name='$name' class='$class' style='padding:5px 10px;border-radius:4px;display:block'>";
    echo "<option value='0'>Danh mục cha</option>";
    show_categories();
    echo "</select>";
}


?>