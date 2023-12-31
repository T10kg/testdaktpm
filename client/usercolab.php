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
<div class="colab">
    <p><h1>Hợp tác với các hãng hàng không hàng đầu Việt Nam</h1></p>
    Với tiêu chí tạo ra một plasform đem lại sự tin tưởng, an toàn và tiết kiệm đến với người dùng.</br>
    <h5>Luôn chọn các dịch vụ tốt nhất để đưa đến người tiêu dùng</h5>
</div>
<h3>Bắt đầu sử dụng trong 2 bước đơn giản</h3>
<div class="start">
    <div>
        <img src="../img/search.webp" width="150px">
        <h5>Truy cập vào trang wearefly.com </h5>
    </div>
    <div>
        <img src="../img/taotaikhoan.webp" width="150px">
        <h5>Sau đó chọn mục tạo tài khoản</h5>
    </div>
    <div>
        <img src="../img/start.webp" width="150px">
        <h5>Sau khi tao tài khoảng bắt đầu trải nghiệm những dịch vụ của chúng tôi</h5>
    </div>
</div>
<style>
    body{
        background-color: #caf0f8;
        background-size:100%;
    }
    .colab {
        margin-right:30%;
        text-align: left;
        margin-bottom: 20px;
    }

    .colab h1 {
        font-size: 1.5em;
        color: black;
        margin-bottom: 10px;
    }

    .colab h5 {
        font-size: 1.5em;
        color: black;
        margin-bottom: 20px;
    }


    div {
        font-size: 16px;
        color: black;
    }
        .start {
        margin-right: 30%;
        width:150px;
        display: flex;
        text-align: left;
        margin-bottom: 20px;
    }

    h3 { 
        font-size: 1.5em;
        margin-right: 38%;
        text-align:left;
        color: black;
        margin-bottom: 10px;
        border-bottom: 1px dashed #333;
        padding-bottom: 5px;
    }
    .start div {
        font-size: 1.5em;
    margin-right: 100px;
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