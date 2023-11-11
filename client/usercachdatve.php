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
<link rel="stylesheet" href="../css/cho.css" />
<link href="https://fonts.googleapis.com/css2?family=FontName&display=swap" rel="stylesheet">
<div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="userlogin.php">wearefly</a></i>
            <ul class="dropdown-menu">
            <a href="userlogin.php"><li>Trang chủ</li></a>
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
<h2>Cách đặt vé với Wearefly</h2>
<h6>Hoàn tất trong 5 phút</h6>
<div class="parent">

    <div class="box1">
        <b>1</b><strong>Tìm chuyến bay</strong></br>
        Bắt đầu bằng việc điền các thông tin tìm kiếm.
    </div>
    <div class="box2">
        <b>2</b><strong>Chọn chuyến bay và đặt vé</strong></br>
        Thông tin chuyến bay (hãng bay, lịch bay, giá vé, v.v.) đều được hiển thị trên trang kết quả tìm kiếm.
    </div>
    <div class="box3">
        <b>3</b><strong>Điền thông tin liên lạc và thông tin hành khách</strong></br>
        Sau khi đã chọn đúng chuyến bay, bạn cần điền thông tin người đặt vé và thông tin hành khách.
    </div>
    <div class="box4">
        <b>4</b><strong>Tiến hành thanh toán</strong></br>
        Có nhiều phương thức thanh toán khả dụng. Hãy chọn phương thức bạn mong muốn.
    </div>
    <div class="box5">
        <b>5</b><strong>Nhận vé điện tử</strong></br>
        Chúng tôi sẽ gửi vé điện tử vào email của bạn trong vòng 60 phút sau khi nhận được số tiền thanh toán.
    </div>
</div>
</body>
</html>

