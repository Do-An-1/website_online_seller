<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 11/4/2017
 * Time: 8:50 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông báo trên trình duyệt</title>
</head>
<body>
<a href="#" id="allownoti">Cho phép thông báo</a> <!-- khi nhấp vào sẽ hiển thị ra một bảng cho phép hiển thị thông báo
trên trình duyệt -->
<a href="#" id="shownoti">Hiển thị thông báo</a> <!-- khi nhấp vào nếu đã cho phép thì sẽ hiển thi thông báo còn ngược lại
sẽ báo lỗi -->
<script>
    var allownoti = document.getElementById('allownoti');
    var shownoti = document.getElementById('shownoti');

    // Thực hiện hành động bên trong khi nhấp vào Cho phép thông báo
    allownoti.addEventListener('click', function (e) {
        e.preventDefault();

        // Nếu trình duyệt không hỗ trợ thông báo
        if (!window.Notification) {
            alert('Trình duyệt của bạn không hỗ trợ chức năng này.');
        }
        // Ngược lại trình duyệt có hỗ trợ thông báo
        else {
            // Gửi lời mời cho phép thông báo
            Notification.requestPermission(function (p) {
                // Nếu không cho phép
                if (p === 'denied') {
                    alert('Bạn đã không cho phép thông báo trên trình duyệt.');
                }
                // Ngược lại cho phép
                else {
                    alert('Bạn đã cho phép thông báo trên trình duyệt, hãy bắt đầu thử Hiển thị thông báo.');
                }
            });
        }
    });

    // Thực hiện hành động bên trong khi nhấp vào Hiển thị thông báo
    shownoti.addEventListener('click', function (e) {
        var notify;
        e.preventDefault();
        // Nếu chưa cho phép thông báo
        if (Notification.permission == 'default') {
            alert('Bạn phải cho phép thông báo trên trình duyệt mới có thể hiển thị nó.');
        }
        // Ngược lại đã cho phép
        else {
            // Tạo thông báo
            notify = new Notification(
                'Bạn có một thông báo mới từ Admin', // Tiêu đề thông báo
                {
                    body: 'Admin vừa có thông báo mới', // Nội dung thông báo
                    icon: 'https://freetuts.net/public/logo/icon.png', // Hình ảnh
                    tag: 'https://localhost/web_man_fashion/admin' // Đường dẫn
                }
            );
            // Thực hiện khi nhấp vào thông báo
            notify.onclick = function () {
                window.location.href = this.tag; // Di chuyển đến trang cho url = tag
            }
        }
    });
</script>
</body>
</html>
