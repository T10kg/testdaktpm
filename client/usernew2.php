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
<h3>Cách đổi lịch vé máy bay của tôi </h3>
Để đổi lịch chuyến bay, vui lòng làm theo các bước sau:</br>
1. Đăng nhập vào tài khoản Traveloka, đến phần Đặt chỗ của tôi.</br>

2. Chọn chuyến bay bạn muốn đổi lịch.</br>

3. Đến phần Hoàn tiền & Đổi lịch bay, sau đó chọn Đổi lịch. </br>

4. Tùy theo mỗi hãng hàng không, tính năng Đổi lịch bay sẽ cho phép bạn chọn đổi lịch cho từng chặng bay và từng hành khách.</br>

5. Trước khi đổi lịch, vui lòng đọc kỹ mục Chính sách được thể hiện cụ thể trên từng chuyến bay.</br>

6. Sau đó, chọn Yêu cầu đổi lịch.</br>

7. Chi phí đổi lịch và phương thức thanh toán sẽ được thể hiện để bạn xác nhận yêu cầu.</br>
8. Chi tiết các bước thực hiện bằng hình ảnh minh họa, bạn cũng có thể tham khảo tại Hướng dẫn Hoàn tiền.
<ul>Lưu ý:
    <li>Bạn chỉ có thể đổi thời gian và ngày của chuyến bay. </li>
    <li>Ngoài phí đổi lịch của hãng hàng không, Traveloka có thể tính thêm phí như sau:</li>
        <ul>Chặng bay nội địa: Phí bắt đầu từ Rp. 25000 / MYR 5 / SGD 2 / THB 80 / VND 25.500 / PHP 60 / AUD 28 mỗi chặng/hành khách.</ul>
        <ul>Chặng bay quốc tế: IDR 65.000 / MYR 15 / SGD 6 / THB 150 / VND 85.000 / PHP 180 / AUD 28 mỗi chặng/hành khách.</ul>
    <li>Nếu đổi lịch thành công, tình trạng của vé điện tử sẽ được thay đổi như sau:</li>
        <ul>Trên máy tính: Thông báo dưới vé điện tử ban đầu: Chuyến bay này đã được đổi lịch. Vui lòng kiểm tra thông tin đặt chỗ của bạn.</ul>
        <ul>Trên ứng dụng: Tình trạng của vé điện tử ban đầu sẽ được đổi thành Đổi lịch hoàn tất.</ul>
    <li>Sau khi phát hành, vé điện tử mới của bạn sẽ được gửi đến địa chỉ email bạn đã sử dụng khi đặt chỗ.</li>
    <li>Đổi lịch tuỳ vào tình trạng ghế trống của chuyến bay.</li>
    <li>Mỗi hãng hàng không có giới hạn thời gian đổi lịch khác nhau. Để tìm hiểu chính sách của từng hãng, vui lòng đến trang Điều khoản & Điều kiện, sau đó chọn chuyến bay tương ứng.</li>
    
</ul>
Nếu bạn gặp khó khăn khi gửi yêu cầu đổi lịch, vui lòng Liên hệ chúng tôi hoặc liên hệ hãng hàng không.
</div>
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