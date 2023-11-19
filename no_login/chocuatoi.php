
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
</html>
<div class="nen">
<h2 >Tìm kiếm thông tin chuyến bay</h2>
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
            echo '<div class=flight-infor" >';
            echo "ngày mua: " . $row["DATE_OF_BOOKING"] . "<br>";
            echo "ngày đi: " . $row["DATE_OF_TRAVEL"] . "<br>";
            echo "Hạng: " . $row["CLASS"] . "<br>";
            echo "Ngày hủy: " . $row["DATE_OF_CANCELLATION"] . "<br>";
            echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br><br>";
            echo "Mã vé:" . $row["TICKET_NUMBER"] . "<br><br>";
            echo '<form method="post" action="huyve.php">';
            echo '<input type="hidden" name="ticketNumber" value="' . $row["TICKET_NUMBER"] . '">';
            echo '<input type="submit" value="Hủy vé" name="huy">';
            echo '</form>';
            echo '</div >';
            exit();
                }
        }
    } else {
        echo "Không tìm thấy thông tin chuyến bay.";
    }
?>
</div>
<style>
body{
    background-image: url("../img/map.jpg");
    background-size:100%;
    }
    h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

form {
    width: 300px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color:#3487FF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: red;
}
</style>

