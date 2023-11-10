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
            <a href="userlogin.php"><li>Trang chủ</li></a>
                <a href="userchocuatoi.php"><li>Đặt chỗ của tôi</li></a>
                <a href="usersms.php"><li>Hộp thư của tôi</li></a>
                <a href="usertimchuyenbay.php"><li>Tìm chuyến bay</li></a>
                <a href="usercallme.php"><li>Liên hệ chúng tôi</li></a>
                <a href="usercolab.php"><li>Hợp tác chúng tôi</li></a>
                <a href="usertrogiup.php"><li> Trợ giúp</li></a>
            </ul>
        </div>
    <div class="menu">
        <div class="sp">
                <a href="usercolab.php">Hợp tác với chúng tôi </a>
        </div>
        <div class="sp">
                <a href="usertimchuyenbay.php">Tìm chuyến bay </a>
        </div>
        <div class="sp">
                <a href="userchocuatoi.php">Đặt chỗ của tôi</a>
        </div>
        <div class="sp">
            <form class="form" method="post" action="">
            <p>Xin chào: <?php echo $username; ?> <input type="submit" name="logout" value="Thoát"></p>
            </form>
        </div> 
    </div>
</div>
</body>
<html>
<div class="help">
    <div><a href="usernew1.php">Hãng hàng không Bamboo Airways đổi lịch chuyến bay của tôi</a></div>
    <div><a href="usernew2.php">Cách đổi lịch vé máy bay của tôi </a></div>
    <div><a href="usernew3.php">Cách huỷ vé và hoàn tiền cho đặt chỗ máy bay </a></div>
    <div><a href="usernew4.php">Cách sửa hoặc đổi tên hành khách bay</a></div>
    <div><a href="usernew5.php">Cách làm thủ tục trực tuyến</a></div>
    <div><a href="usernew6.php">Cách yêu cầu xuất hóa đơn GTGT khi đặt vé máy bay tại Việt Nam </a></div>
    <div><a href="usernew7.php">Xác nhận và xác thực thanh toán </a></div>
    <div><a href="usernew8.php">Làm cách nào để kiểm tra trạng thái hoàn tiền của tôi</a></div>
    <div><a href="usernew9.php">Lời hứa hoàn lại tiền trên Traveloka </a></div>
</div>