
<html>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/client.css" />
<div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="index.php">wearefly</a></i>
            <ul class="dropdown-menu">
                <a href="userlogin.php"><li>Trang chủ</li></a>
                <a href="datcho.php"><li>Đặt chỗ của tôi</li></a>
                <a href="sms.php"><li>Hộp thư của tôi</li></a>
                <a href="timchuyenbay.php"><li>Tìm chuyến bay</li></a>
                <a href="callme.php"><li>Liên hệ chúng tôi</li></a>
                <a href="colab.php"><li>Hợp tác chúng tôi</li></a>
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
                <a href="datcho.php">Đặt chỗ của tôi</a>
        </div>
        <div class="sp">
                <a href="client/login.php">Đăng nhập</a>
        </div>
        <div class="sp">
                <a href="client/register.php">Đăng kí</a>
        </div>
    </div>
</div>
</body>
<html>
<h2>Tìm kiếm thông tin chuyến bay</h2>
<form method="post">
    <label for="searchTerm"> số hộ chiếu:</label>
    <input type="text" id="searchTerm" name="searchTerm" required><br><br>
    <input type="submit" value="Tìm kiếm" name="submit">
</form>
<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])) {
    $searchTerm = $_POST["searchTerm"];

    // Kiểm tra xem người dùng đã nhập mã vẽ hay số hộ chiếu (passport)
    // và tìm kiếm thông tin chuyến bay tương ứng
    $sql = "SELECT * FROM ticket WHERE  PASSPORTNO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Hiển thị thông tin chuyến bay
        while ($row = $result->fetch_assoc()) {
            echo "ngày mua: " . $row["DATE_OF_BOOKING"] . "<br>";
            echo "ngày đi: " . $row["DATE_OF_TRAVEL"] . "<br>";
            echo "Hạng: " . $row["CLASS"] . "<br>";
            echo "Ngày hủy: " . $row["DATE_OF_CANCELLATION"] . "<br>";
            echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br><br>";
            echo "Mã vé:" . $row["TICKET_NUMBER"] . "<br><br>";
            exit();
        }
    } else {
        echo "Không tìm thấy thông tin chuyến bay.";
    }
}
?>

