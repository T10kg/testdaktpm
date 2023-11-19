
<html>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/client.css" />
<div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="../index.php">wearefly</a></i>
            <ul class="dropdown-menu">
                <a href="../index.php"><li>Trang chủ</li></a>
                <a href="chocuatoi.php"><li>Đặt chỗ của tôi</li></a>
                <a href="sms.php"><li>Hộp thư của tôi</li></a>
                <a href="timchuyenbay.php"><li>Tìm chuyến bay</li></a>
                <a href="callme.php"><li>Liên hệ chúng tôi</li></a>
                <a href="colab.php"><li>Hợp tác chúng tôi</li></a>
                <a href="cachdatve.php"><li>Cách đặt vé</li></a>
                <a href="trogiup.php"><li> Trợ giúp</li></a>
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
        <div class="sp1">
                <a href="../client/login.php">Đăng nhập</a>
        </div>
        <div class="sp2">
                <a href="../client/register.php">Đăng kí</a>
        </div>
    </div>
</div>
</body>
<html>


<!DOCTYPE html>
<html>
<body>
    <h1>Chọn phương thức thanh toán</h1>
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
    echo '<form method="post" action="thongtinve.php">';
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
    echo '<form method="post" action="thongtinve.php">';
    echo "<h2>Cửa hàng thanh toán đã chọn</h2>";
    echo "<p>Bạn đã chọn cửa hàng: $selectedStore</p>";
    echo "<button>Xác nhận thanh toán</button>";
    echo '</form>';
}
if (isset($_POST['confirm_store1'])) {
    // Xử lý dữ liệu khi người dùng xác nhận cửa hàng đã chọn
    $selectedStore = $_POST['selected_store'];

    // Hiển thị thông báo cửa hàng đã chọn
    echo '<form method="post" action="thongtinve.php">';
    echo "<h2>Cửa hàng thanh toán đã chọn</h2>";
    echo "<p>Bạn đã chọn cửa hàng: $selectedStore</p>";
    echo "<button>Xác nhận thanh toán</button>";
    echo '</form>';
}
?>

<style>
    body{
        background-image: url("../img/map.jpg");
        background-size:100%;
    }
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
    padding: 10px 20px;
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
</style>

