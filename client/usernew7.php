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
<h3>Xác nhận và xác thực thanh toán </h3>
Thanh toán của bạn được xác nhận khi bạn nhận được vé điện tử qua email.</br>
Nếu bạn chưa nhận được vé điện tử trong vòng 60 phút sau khi hoàn tất thanh toán, vui lòng tải lên bằng chứng thanh toán theo các bước sau:</br>
<ul>
1. Đến tài khoản của bạn trong trang chủ Traveloka ở góc trên bên phải, sau đó chọn phần Danh sách giao dịch.</br>
2. Chọn đặt chỗ bạn vừa thanh toán và nhấp chuột vào nút Tiếp tục thanh toán. Kéo xuống phần Bạn đã hoàn tất thanh toán? và chọn nút Tôi đã hoàn tất thanh toán.</br>
3. Nhấp chuột vào nút Tải lên bằng chứng thanh toán. Chọn tệp bạn muốn tải lên, và nhấp chọn Mở. Bạn sẽ thấy tình trạng thanh toán được cập nhật trong Đặt chỗ của tôi</br>
</ul>
Thanh toán của bạn sẽ được xác nhận trong khoảng 15 phút sau khi tải lên bằng chứng thanh toán. Nếu thanh toán bằng thẻ tín dụng, vui lòng đảm bảo bạn đã điền đúng mật khẩu dùng một lần (OTP). Nếu thanh toán bằng chuyển khoản, vui lòng đảm bảo bạn đã điền đúng số tài khoản và số tiền. </br>
Nếu bạn bị mất bằng chứng thanh toán, vui lòng xem bài viết này.</br>
Nếu thanh toán của bạn vẫn chưa được xác thực sau khi bạn tải lên bằng chứng thanh toán 60 phút, bạn thanh toán sai số tiền, hoặc bạn thanh toán sau thời gian quy định, vui lòng kiểm tra email của bạn, bao gồm hộp thư rác. Nếu bạn cần hỗ trợ thêm, vui lòng Liên hệ chúng tôi.</br></div>
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