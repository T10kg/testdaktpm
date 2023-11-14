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
</html>
<?php
require("../conn.php");
require("../client/func.php");

$sql = "SELECT * FROM ticket WHERE PASSPORTNO = '{$_SESSION['passport']}'";
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có bản ghi nào được trả về hay không
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua từng bản ghi và hiển thị thông tin
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ngày mua: " . $row["DATE_OF_BOOKING"] . "<br>";
        echo "ngày đi: " . $row["DATE_OF_TRAVEL"] . "<br>";
        echo "Hạng: " . $row["CLASS"] . "<br>";
        echo "Ngày hủy: " . $row["DATE_OF_CANCELLATION"] . "<br>";
        echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br>";
        echo "Mã vé:" . $row["TICKET_NUMBER"] . "<br><br>";
        header("refresh:2; url=usertimchuyenbay.php");
    }
} else {
    echo "Không có góp ý nào.";
}
?>
</div>