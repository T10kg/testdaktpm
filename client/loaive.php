<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Điều hướng về trang đăng nhập nếu chưa đăng nhập
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
                <a href="colab.php">Hợp tác với chúng tôi </a>
        </div>
        <div class="sp">
                <a href="timchuyenbay.php">Tìm chuyến bay </a>
        </div>
        <div class="sp">
                <a href="datcho.php">Đặt chỗ của tôi</a>
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
<div>
    <form method="post">
    <label>Loại vé:</label>
    <select name="class">
            <option value="ECONOMY">ECONOMY</option>
            <option value="BUSINESS">BUSINESS</option>
            <option value="FIRST-CLASS">FIRST-CLASS</option>
        </select>
    <label>Ngày khởi hành:</label><input type="date" name="departure_date">
        <input type="submit" value="Đặt vé" name="submit">
    </form>
</div>

<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])) {
    echo $_SESSION['flight_code'];
    $class = $_POST["class"];
    $departure_date = $_POST['departure_date'];
    $ticket_code =rand(100000000, 999999999); // Tạo mã vé ngẫu nhiên
    $codeInt = (int)$ticket_code;
    $ticket_sql = "INSERT INTO ticket (`TICKET_NUMBER`, `DATE_OF_BOOKING`, `DATE_OF_TRAVEL`, `CLASS`, `DATE_OF_CANCELLATION`, `PASSPORTNO`,`FLIGHT_CODE`) VALUES ('$codeInt','" .  $_SESSION['date'] . "','$departure_date', '$class','NULL','" . $_SESSION['passport'] . "','" . $_SESSION['flight_code'] . "')";
    $ticket_result = mysqli_query($conn, $ticket_sql);
    if ($ticket_result == 1) {
        echo "Thêm vé thành công! Mã vé: " . $ticket_code;
        header("Location: userthanhtoan.php");
    } else {
        echo "Lỗi khi thêm vé: " . mysqli_error($conn);
    }
}
?>