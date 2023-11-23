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
<!DOCTYPE html>
<html>
<body>
    <h1>Chọn phương thức thanh toán</h1>
    <div class ="thanhtoan">
    <form method="post">
        <input type="submit" name="online_payment" value="Thanh toán trực tuyến">
        <input type="submit" name="in_store_payment" value="Thanh toán trực tiếp">
    </form>


</body>
</html>
<?php
if (isset($_POST['online_payment'])) {
    // Thực hiện xử lý thanh toán trực tuyến
    // ...

    // Chọn một số ngẫu nhiên từ 1 đến 10
    $randomNumber = rand(1, 10);

    // Tạo tên tệp hình ảnh QR code ngẫu nhiên
    $qrCodeImage = "../img/qr" . $randomNumber . ".png";

    // Hiển thị mã QR code cho người dùng
    echo "<h2>Mã QR code</h2>";
    echo "<img src='$qrCodeImage' alt='QR Code'>";
    echo '<form method="post" action="userthongtinve.php">';
    echo  '<input type="submit" name="end" value="Xác nhập thanh toán">';
    echo '</form>';
}

// Xử lý dữ liệu khi người dùng nhấn nút "Thanh toán trực tiếp"
// Xử lý dữ liệu khi người dùng nhấn nút "Thanh toán trực tiếp"
if (isset($_POST['in_store_payment'])) {
    // Hiển thị danh sách các cửa hàng cho người dùng chọn cửa hàng thanh toán
    echo "<h2>Chọn cửa hàng thanh toán</h2>";
    echo '<form method="post">';
    echo '<input type="radio" name="selected_store" value="Cửa hàng 1" id="store_1">';
    echo '<label for="store_1">Cửa hàng 1</label><br>';
    echo '<input type="radio" name="selected_store" value="Cửa hàng 2" id="store_2">';
    echo '<label for="store_2">Cửa hàng 2</label><br>';
    echo '<input type="radio" name="selected_store" value="Cửa hàng 3" id="store_3">';
    echo '<label for="store_3">Cửa hàng 3</label><br>';
    echo '<br>';
    echo '<input type="submit" name="confirm_store1" value="Xác nhận">';
    echo '</form>';
}
if (isset($_POST['confirm_store'])) {
    // Xử lý dữ liệu khi người dùng xác nhận cửa hàng đã chọn
    $selectedStore = $_POST['selected_store'];

    // Hiển thị thông báo cửa hàng đã chọn
    echo '<form method="post" action="userthongtinve.php">';
    echo "<h2>Bạn đã chọn cửa hàng: $selectedStore</h2>";
    echo "<button>Xác nhận thanh toán</button>";
    echo '</form>';
}
if (isset($_POST['confirm_store1'])) {
    // Xử lý dữ liệu khi người dùng xác nhận cửa hàng đã chọn
    $selectedStore = $_POST['selected_store'];

    // Hiển thị thông báo cửa hàng đã chọn
    echo '<form method="post" action="userthongtinve.php">';
    echo "<h2>Bạn đã chọn cửa hàng: $selectedStore</h2>";
    echo "<button>Xác nhận thanh toán</button>";
    echo '</form>';
}
?>
</div>
<style>

    h1 {
    text-align: center;
}

form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

input[type="submit"],
button {
    padding: 5px 10px;
    background-color: #3487FF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 5px;
}

input[type="submit"]:hover,
button:hover {
    background-color: red;
}

img {
    display: block;
    margin: 0 auto;
    margin-top: 20px;
    max-width: 300px;
}
.thanhtoan > h2{
    text-align:center;
}
.thanhtoan{
    background-color: rgb(225,225,225,0.5);
    border-radius:20px;
}
.thanhtoan p{
    text-align:center;
}
</style>




