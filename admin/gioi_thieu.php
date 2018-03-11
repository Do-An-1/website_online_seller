<?PHP
include('includes/header.php');
?>

<style>
    .results{color:#009966;}
    .results1{color:#FF0000;}
</style>



<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php
        include('inc/myconnect.php');
        include('inc/function.php');
        if(isset($_POST['submit']))
        {   
            $errors = array();
            if(!isset($_POST['noidung'])){
                $errors = 'noidung';
            } else {
               $noidung =  $_POST['noidung'];
            }

            if(empty($errors))
            {
                $query = "SELECT * FROM tb_information WHERE name='gioithieu'";
                $result = mysqli_query($dbc, $query);
                if ( mysqli_num_rows($result) > 0 ) {
                    $query_ud = "UPDATE tb_information SET value='{$noidung}' WHERE name='gioithieu'";
                    $result_ud = mysqli_query($dbc, $query_ud);
                    echo "<p class='results'> Lưu thành công </p>";
                } else {
                    $query_is = "INSERT INTO tb_information(name, value) VALUES('gioithieu', '{$noidung}')";
                    $result_is = mysqli_query($dbc, $query_is);
                    echo "<p class='results'> Lưu thành công </p>";
                }
            }
            else
            {
                $message = "<p class='results1'> Bạn hãy nhập đầy đủ thông tin </p>";
                // header("Location: gioi_thieu.php");
            }
        }
        ?>
        <?php 
            $query = "SELECT * FROM tb_information WHERE name='gioithieu'";
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) > 0 ) {
                extract( mysqli_fetch_array($result) );

            }
        ?>
        <form name="frmadd-video" method="post">
            <?php
            if(isset($message)){echo $message;}
            ?>
            <h2 style="color: red">Giới thiệu</h2>
            <div class="form-group">
                <label>Nội dung</label>
               <textarea name="noidung" id="noidung-gioithieu" class="form-control" > <?php echo isset($value) ? $value : ''  ?></textarea> 
                <?php
                if (isset($errors) && in_array('noidung',$errors))
                {
                    echo "<p class='results1' >Bạn hãy nhập mã loại thành phố</p>";
                }
                ?>
            </div>



            <input type="submit" name="submit" class="btn btn-primary" value="Lưu"/>

        </form>
    </div>
</div>
<?PHP include('includes/footer.php');?>
<script type="text/javascript">
    $('.quang-cao .collapse').addClass('in');
    $('.quang-cao .gioithieu').addClass('active-hover');
</script>