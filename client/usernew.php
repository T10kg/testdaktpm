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
<h3>Lời hứa hoàn lại tiền trên Traveloka</h3>
Chỉ áp dụng trên một số chuyến bay, Chương trình Lời hứa hoàn tiền của Traveloka về cơ bản là chúng tôi hứa hoàn lại tiền cho bạn đúng lúc trong mọi hoàn cảnh.</br>
Cho đến nay, chúng tôi hứa hoàn lại cho bạn trong 14 hoặc 30 ngày. Điều này có nghĩa là sau này nếu bạn yêu cầu hoàn tiền cho chuyến bay, bạn sẽ nhận được tiền hoàn lại chậm nhất là 14 hoặc 30 ngày sau ngày gửi yêu cầu hoàn tiền.</p>
Do đó, bạn không cần phải lo lắng về việc hoàn tiền của mình bị chậm trễ với chương trình lời hứa hoàn tiền của Traveloka. Bởi vì ngay cả khi hãng hàng không cần thêm thời gian để xử lý việc hoàn tiền của bạn, chúng tôi sẽ bao trả khoản tiền hoàn lại của bạn và gửi tiền trước cho bạn.</p>
Nếu bạn quan tâm đến việc đặt vé máy bay có áp dụng chương trình Lời hứa hoàn tiền của Traveloka, hãy xem danh sách bên dưới để biết các hãng hàng không đủ điều kiện.</br>
Các hãng hàng không đủ điều kiện áp dụng chương trình Lời hứa hoàn tiền 14-Ngày</br>
<ul>
1. Lion Air</br>
2. Batik Air </br>

3. Wings Air</br>

4. Citilink</br>

5. Super Air Jet</br>

6. Trigana Air</br>

7. Susi Air
</ul>
Các hãng hàng không đủ điều kiện áp dụng chương trình Lời hứa hoàn tiền 30-Ngày</br>
<ul>
1. Scoot</br>

2. Singapore </br>

3. Silk Air</br>

4. All Nippon </br>

5. Cathay Pacific</br>

6. Japan Airlines
</br>
7. China Airlines</br>

8. Eva Air</br>
</ul></div>
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