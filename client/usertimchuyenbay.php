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
<html>
<?php
require("../conn.php");
require("func.php");
$city = cityname($conn);
$cityy = cityname($conn); 
?>
<form method="post">
    <label>Tìm chuyến bay:</label><br><br>
    <label>Điểm đi:</label>
    <select name="from">
        <?php while ($row = mysqli_fetch_array($city)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>

    <label>Điểm đến:</label>
    <select name="arrive">
        <?php while ($row = mysqli_fetch_array($cityy)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>

    <input type="submit" value="Tìm chuyến bay" name="submit">
</form>

<div>
    <?php
    function findFlights($from, $arrive, $conn)
    {
        $sql = "SELECT * FROM flight WHERE IATA_START = '$from' AND IATA_END = '$arrive'";
        $result = $conn->query($sql);
        return $result;
    }
    if (isset($_POST["submit"])) {
        $from = $_POST['from'];
        $arrive = $_POST['arrive'];
        $flights = findFlights($from, $arrive, $conn);
        if ($flights->num_rows > 0) {
            echo "Các chuyến bay từ $from đến $arrive:<br>";
            while ($row = $flights->fetch_assoc()) {
                echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br>";
                echo "Giờ khởi hành: " . $row["DEPARTURE"] . "<br>";
                echo '<input type="hidden" name="date" value="' . $ngay_dat_ve = date("Y-m-d") . '">';
                $_SESSION['date']=$ngay_dat_ve = date("Y-m-d") ;
                // ... in ra các thông tin khác của chuyến bay
                echo '<form method="post" action="userdatcho.php">'; // Chỉ định URL của trang đặt vé ở đây
                echo '<input type="hidden" name="flight_code" value="' . $row["FLIGHT_CODE"] . '">';
                $_SESSION['flight_code']=$row["FLIGHT_CODE"] ;
                echo $_SESSION['flight_code'];
                echo '<input type="submit" value="Đặt vé" name="book">';
                echo '</form>';
            }
        } else {
            echo "Không tìm thấy chuyến bay từ $from đến $arrive.";
        }
    }
    ?>
</div>

