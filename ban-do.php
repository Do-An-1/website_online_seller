<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuan
 * Date: 4/9/2017
 * Time: 21:22 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quần áo nam đẹp, quần áo hàng hiệu, cao cấp kiểu 2017</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-main.css">
    <style type="text/css">
        /*.wapper-map{ margin: 15px 0;position: relative; }*/
        /*.wapper-map .top-map{  padding: 5px 15px;background: #122b40;color: white;font-size: 15px;font-weight: 700;}*/
        /*.wapper-map #map_canvas{height: 500px;}*/

    </style>
    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng(10.0465737,105.7679048);
            var myOptions = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: '3T Shop'
            });
        }
        var myKey = "AIzaSyCCNkTJ_Dw5UL2Rf0reKcQ-5yzOQZX9v_g";
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = "https://maps.googleapis.com/maps/api/js?key=" + myKey + "&sensor=false&callback=initialize";
            document.body.appendChild(script);
        }
    </script>


</head>
<body style="margin-top: -20px;overflow-x: hidden;" onload="loadScript()">
<?php
include('inc/myconnect.php');
include('inc/function.php');
include('include/header.php');
?>
<div class="bcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li style="background: url("");"><a href="">Bản đồ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="container map-bd" >
        <div class="row">
            <div class="col-xs-12 title"><h3>BẢN ĐỒ ĐẾN  <?php
                            $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                            $result_description = mysqli_query($dbc, $query_description);
                            if( mysqli_num_rows($result_description) > 0 ) {
                                extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                echo  $value;
                            }
                            ?> </h3></div>
            <div class="col-xs-12">
                <div class="wapper-map">
                    <div class="top-map text-center"> <?php
                            $query_description = 'SELECT value FROM tb_information WHERE name = "name"';
                            $result_description = mysqli_query($dbc, $query_description);
                            if( mysqli_num_rows($result_description) > 0 ) {
                                extract( mysqli_fetch_array($result_description, MYSQLI_ASSOC) );
                                echo  $value;
                            }
                            ?>  </div>
                    <div id="map_canvas"></div>

                </div>
            </div>
        </div>
</div>
    <?php
    include('include/footer.php');
    ?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-main.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCNkTJ_Dw5UL2Rf0reKcQ-5yzOQZX9v_g&callback=initMap" async defer></script>-->
<script type="text/javascript">
    $(function(){
//        var map,marker;
//        var myLatLng = new google.maps.LatLng(10.0465737,105.7679048);
//        function initMap() {
//            map = new google.maps.Map(document.getElementById('map'), {
////                zoomControl: false,
////                streetViewControl: false,
////                  scrollwheel:false,   không thể dùng chuột để zoom
//                center: myLatLng,
//                zoom: 16
//            });
//            marker = new google.maps.Marker({
//                position: myLatLng,
//                map: map,
//                title: '3T Shop'
//            });
////            chỉnh màu sắc cho map mà sai mịa r
//            var customMapType = new google.maps.StyleMapType([
//                { stylers: [{ hue: '#D2E4C8'}]},
//                {
//                    featureType: 'water',
//                    stylers: [{ color: '#bd0103'}]
//                }
//            ]);
//            var customMapTypeId = 'custom_style';
//            map.mapTypes.set(customMapTypeId,customMapType);
//            map.setMapTypeId(customMapTypeId);
//
//        };
//
//        initMap();
//
//    });
</script>
</html>


