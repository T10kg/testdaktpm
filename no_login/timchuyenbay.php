<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/client.css" />
<div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="index.php">wearefly</a></i>
            <ul class="dropdown-menu">
                <a href="index.php"><li>Trang chủ</li></a>
                <a href="datcho.php"><li>Đặt chỗ của tôi</li></a>
                <a href="themn.php"><li>Hộp thư của tôi</li></a>
                <a href="no_login/timchuyenbay.php"><li>Tìm chuyến bay</li></a>
                <a href="themn.php"><li>Liên hệ chúng tôi</li></a>
                <a href="no_login/colab.php"><li>Hợp tác chúng tôi</li></a>
                <a href="no_login/trogiup.php"><li> Trợ giúp</li></a>
            </ul>
        </div>
        <div class="menu">
        <div class="sp">
                <a href="no_login/colab.php">Hợp tác với chúng tôi </a>
        </div>
        <div class="sp">
                <a href="no_login/timchuyenbay.php">Tìm chuyến bay </a>
        </div>
        <div class="sp">
                <a href="dssp.php">Đặt chỗ của tôi</a>
        </div>
        <div class="sp">
                <a href="client/login.php">Đăng nhập</a>
        </div>
        <div class="sp">
                <a href="client/register.php">Đăng kí</a>
        </div>
        </div>
</div>
<?php
require("../conn.php");
require("../client/func.php");
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
session_start();
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
                echo '<form method="post" action="datcho.php">'; // Chỉ định URL của trang đặt vé ở đây
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

