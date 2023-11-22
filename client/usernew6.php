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
<h3>Cách yêu cầu xuất hóa đơn GTGT khi đặt vé máy bay tại Việt Nam </h3>
Để yêu cầu xuất hóa đơn GTGT, vui lòng thực hiện theo các bước dưới đây.
<ul>
        1.Truy cập com trên thiết bị máy tính để bàn và nhấp vào menu Đặt chỗ của tôi nằm ở đầu trang.</br>
        2.Nhấp vào chuyến bay bạn muốn yêu cầu xuất hóa đơn thuế.</br>
        3.Nhấp vào Yêu cầu Phiếu thu/Hóa đơn VAT dưới mục Chi tiết chuyến bay.</br>
</ul>
Nhưng trước khi bạn tiếp tục, vui lòng lưu ý những điều sau:
<ul>
    <li>Trong hầu hết các trường hợp, chúng tôi không thể xuất hóa đơn cho mục đích hoàn thuế tại Việt Nam. Tuy nhiên, chúng tôi sẽ hỗ trợ các yêu cầu về hóa đơn thuế từ các công ty hoạt động bên trong lãnh thổ Việt Nam. Dịch vụ này áp dụng cho các hãng hàng không như VietJet (VJ), Bamboo Airways (QH), Vietravel Airlines (VU) và Vietnam Airlines (VNA).</li>
    <li>Theo các quy định hiện hành về thuế tại Việt Nam (Điều 2, Khoản 4, Thông tư số 78/2014/TT-BTC và Công văn số 513/CT-TTHT ngày 16/01/2017), vé máy bay điện tử và thẻ lên máy bay là các chứng từ đầy đủ để công ty bạn được trừ vào chi phí tại Việt Nam.</li>
</ul>
Thời hạn yêu cầu xuất hóa đơn là ngày 05 của tháng tiếp theo sau tháng thanh toán. Quy định này có nghĩa là bất kể thời điểm thanh toán được thực hiện trong tháng trước, hóa đơn phải được yêu cầu trước ngày 05 của tháng tiếp theo. Xin lưu ý rằng chúng tôi không thể chấp nhận yêu cầu hóa đơn cho tháng thanh toán trước đó sau thời hạn này.
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

