<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location:login.php"); // Điều hướng về trang đăng nhập nếu chưa đăng nhập
    exit();
}

$username = $_SESSION['username'];

// Khi người dùng nhấp vào nút "Thoát"
if (isset($_POST['logout'])) {
    session_unset(); // Xóa tất cả các biến session
    session_destroy(); // Hủy bỏ session
    header("Location:../index.php"); // Điều hướng về trang đăng nhập
    exit();
}
?>
<html>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/client.css" />
<div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="userlogin.php">wearefly</a></i>
            <ul class="dropdown-menu">
                <a href="userlogin"><li>Trang chủ</li></a>
                <a href="userchocuatoi.php"><li>Đặt chỗ của tôi</li></a>
                <a href="usersms.php"><li>Hộp thư của tôi</li></a>
                <a href="usertimchuyenbay.php"><li>Tìm chuyến bay</li></a>
                <a href="usercallme.php"><li>Liên hệ chúng tôi</li></a>
                <a href="usercolab.php"><li>Hợp tác chúng tôi</li></a>
                <a href="usercachdatve.php"><li>Cách đặt vé</li></a>
                <a href="usertrogiup.php"><li> Trợ giúp</li></a>
            </ul>
        </div>
    <div class="menu">
        <div class="sp">
                <a href="colab.php">Hợp tác với chúng tôi </a>
        </div>
        <div class="sp">
                <a href="timchuyenbay.php">Tìm chuyến bay </a>
        </div>
        <div class="sp">
                <a href="chocuatoi.php">Đặt chỗ của tôi</a>
        </div>
        <div class="sp">
            <form class="form" method="post" action="">
            <p>Xin chào: <?php echo $username; ?> <input type="submit" name="logout" value="Thoát"></p>
            </form>
        </div> 
    </div>
</div>
</body>
</html>
<div class="new1">
<h3>Cách làm thủ tục trực tuyến </h3>
Tính năng check-in trực tuyến giúp bạn check-in trước khi đến sân bay. Bạn có thể làm như vậy thông qua ứng dụng hoặc trang web Traveloka hoặc làm theo các bước đơn giản sau:
<ul>
        1.Đăng nhập vào tài khoản Traveloka.
        2.Mở vé điện tử trong Đặt chỗ của tôi.
        3.Chạm Làm thủ tục trực tuyến.
        4.Sau khi đã đồng ý với chính sách Làm thủ tục trực tuyến, điền thông tin làm thủ tục của bạn. Sau đó, chạm vào nút Làm thủ tục.
        5.Sau khi đã làm thủ tục thành công, bạn sẽ có được thẻ lên máy bay trong vé điện tử của bạn. Thẻ này cũng sẽ được gửi đến email của bạn.
</ul>
Vui lòng lưu ý rằng bạn phải mang bản in thẻ lên máy bay đến cửa khởi hành. Nếu không thể tự in, bạn có thể in thẻ lên máy bay tại quầy làm thủ tục.</br>
Lưu ý: Với người dùng chọn quốc gia là Indonesia, bạn có thể thấy phần Làm thủ tục trực tuyến trong trang chủ ứng dụng Traveloka. Nếu không thể tìm thấy, vui lòng đảm bảo bạn đã đăng nhập vào tài khoản Traveloka của mình.</br>
Vui lòng kiểm tra hãng hàng không của bạn có hỗ trợ làm thủ tục trực tuyến. Đến trang Làm thủ tục rực tuyến để xem danh sách hãng hàng không có hỗ trợ.</div>
<style>
    body {
        
        background-image: url("../img/map.jpg");
        background-size:100%;
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: black;
        margin: 0;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        margin: 20px 0;
    }

    h3 {
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0;
    }

    h5 {
        font-size: 16px;
        margin: 10px 0;
    }

    ul {
        margin: 10px 0;
        padding-left: 20px;
    }

    li {
        font-size: 14px;
        margin-bottom: 5px;
    }

    ul li {
        list-style-type: disc;
    }

    ul ul li {
        list-style-type: circle;
    }
    .new1{
        width: 900px;
        text-align: left;
    }
    input[type="submit"] {
    padding: 10px 20px;
    border-radius: 3px;
    background-color: #00BFFF;
    color: #fff;
    border: none;
    cursor: pointer;
    }
</style>