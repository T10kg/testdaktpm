
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
 <div class="search">
    <div class="imgr">
        <img src="../img/left.png" width="250"px>
    </div>
    <div class="air">
<h2>Tìm kiếm thông tin chuyến bay</h2>
<form method="post">
    <label for="searchTerm"> số hộ chiếu:</label>
    <input type="text" id="searchTerm" name="searchTerm" required><br><br>
    <input type="submit" value="Tìm kiếm" name="submit">
</form>
<?php
require("../conn.php");
require("../client/func.php");
session_start();
if (isset($_POST['submit'])) {
    $searchTerm = $_POST["searchTerm"];
    $_SESSION['passport']=$searchTerm;
    $sql = "SELECT * FROM ticket WHERE  PASSPORTNO =?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Hiển thị thông tin chuyến bay
        while ($row = $result->fetch_assoc()) {
            // Hiển thị thông tin chuyến bay
            
            echo '<div class="thongtin">';
            echo '<p>Ngày mua: ' . $row["DATE_OF_BOOKING"] . '</p>';
            echo '<p>Ngày đi: ' . $row["DATE_OF_TRAVEL"] . '</p>';
            echo '<p>Hạng: ' . $row["CLASS"] . '</p>';
            echo '<p>Ghế ngồi: ' . $row["SEAT"] . '</p>';
            echo '<p>Mã chuyến bay: ' . $row["FLIGHT_CODE"] . '</p>';
            echo '<p>Mã vé: ' . $row["TICKET_NUMBER"] . '</p>';
            echo '</div>';
            echo '<form method="post" action="huyve.php">';
            echo '<input type="hidden" name="ticketNumber" value="' . $row["TICKET_NUMBER"] . '">';
            echo '<input type="submit" value="Hủy vé" name="huy">';
            echo '</form>';
            echo '<form method="post" action="chinhsua.php">';
            echo '<input type="hidden" name="ticketNumber" value="' . $row["TICKET_NUMBER"] . '">';
            echo '<input type="submit" value="Chỉnh sửa" name="chinhsua">';
            echo '</form>';
        }
    } else {
        echo "Không tìm thấy thông tin chuyến bay.";
    }
}

?>
</div>
<div class="imgl">
        <img src="../img/right.png" width="250"px>
    </div>
</div>
<style>
.search{
    display:flex;
    width: 100%; 
    justify-content: space-between;
}
.imgr{
    margin-top:3%;
    position: sticky;
    display: block;
}
.imgl{
    margin-top:3%;
    position: sticky;
    display: block;
}
    .thongtin {
    background-image: url("../img/ve.jpg");
    background-size:100%;
    width: 700px;
    margin-top:50px;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 4px;
    height:300px;
}


.thongtin p:last-child {
    margin-bottom: 0;
}
.thongtin {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Chia thành 2 cột bằng nhau */
    grid-gap: 10px; /* Khoảng cách giữa các cột */
}

.thongtin p {
    text-decoration: underline;
    font-size: 1.5em;
    margin: 38px; /* Loại bỏ khoảng trống giữa các dòng trong mỗi cột */
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
form {
    width: 300px;
    margin: 0 auto;
}
label {
    font-size: 1em;
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

</style>
