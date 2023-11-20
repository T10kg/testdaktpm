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
<html>
<div class="vb">
<div class="tcb">
<?php
require("../conn.php");
require("../client/func.php");
$city = cityname($conn);
$cityy = cityname($conn); 
?>
<form method="post">
    <h2>Tìm chuyến bay:</h2>
    <label>Điểm đi:</label>
    <div class="flight-search-input">
    <select name="from">
        <?php while ($row = mysqli_fetch_array($city)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>
  </div>
  <div class="flight-search-input">
    <label>Điểm đến:</label>
    <select name="arrive">
        <?php while ($row = mysqli_fetch_array($cityy)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>
    </div>
    <label for="passenger-count">Số hành khách:</label> 
            <input type="number" id="passenger-count" name="passengerCount" min="1" max="4" value="1">
    <input type="submit" value="Tìm chuyến bay" name="submit">
</form>
</div>
<div class="tt">
    <div class="t">
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
                    echo '<div class="ttt" >';
                    echo "Các chuyến bay từ $from đến $arrive:<br>";
                    while ($row = $flights->fetch_assoc()) {
                        echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br>";
                        echo "Giờ khởi hành: " . $row["DEPARTURE"] . "<br>";
                        echo '<input type="hidden" name="date" value="' . $ngay_dat_ve = date("Y-m-d") . '">';
                        $_SESSION['date']=$ngay_dat_ve = date("Y-m-d") ;
                        // ... in ra các thông tin khác của chuyến bay
                        echo '<form method="post" action="userdatcho.php">'; // Chỉ định URL của trang đặt vé ở đây
                        echo '<input type="hidden" name="flight_code" value="' . $row["FLIGHT_CODE"] . '">';
                        $_SESSION['flight_code']=$row["FLIGHT_CODE"];
                        echo $_SESSION['flight_code'];
                        echo '<input type="submit" value="Đặt vé" name="book">';
                        echo '</form>';
                        $_SESSION['passengerCount'] = $_POST['passengerCount'];
                     echo '</div >';
                    }
                } else {
                    echo '<div class="ttt" >';
                    echo "Không tìm thấy chuyến bay từ $from đến $arrive.";
                   echo '</div >';
                }
               
            }
            ?>
        </div>
    </div>
</div>
<style>
    body{
    background-image: url("../img/sf.jpg");
    }
    .vb{
        display: flex;
        justify-self: space-between;
    
    }
    .ttt{
        border:solid;
    }
    .t{
        margin-top: 33%;
    }
    .tt {
    width: 300px;
    margin-top: 50px;
    margin-left:30px;
    }
    .tcb {
    border:solid;
    width: 450px;
    margin-top: 50px;
    padding: 10px;
    }

    .flight-search-input {
    margin-bottom: 10px;
    }

    .flight-search-input label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    }

    .flight-search-input select {
    width: 100%;
    padding: 10px;
    border: 1px solid ;
    border-radius: 3px;
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
