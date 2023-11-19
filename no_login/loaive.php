
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
<div class="ve">
    <form method="post">
        <label>Loại vé:</label>
        <select name="class">
            <option value="ECONOMY">ECONOMY</option>
            <option value="BUSINESS">BUSINESS</option>
            <option value="FIRST-CLASS">FIRST-CLASS</option>
        </select>
        <label>Ngày khởi hành:</label>
        <input type="date" name="departure_date">
        <?php
        session_start();
        $passengerCount = $_SESSION['passengerCount'];
        for ($i = 0; $i < $passengerCount; $i++) {
            $passengerIndex = $i + 1;
            echo  $passengerIndex;
            ?>
            <label>Hộ chiếu hành khách <?php echo $passengerIndex; ?>:</label>
            <input type="text" name="passport<?php echo $passengerIndex; ?>">
            <?php
        }
        ?>

        <input type="submit" value="Đặt vé" name="submit">
    </form>
</div>
<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])) {
    $_SESSION['class'] = $_POST['class'];
    echo $_SESSION['flight_code'];
    $class = $_POST["class"];
    $departure_date = $_POST['departure_date'];

    // Lặp qua thông tin của từng hành khách
    for ($i = 1; $i <= $passengerCount; $i++) {
        $passport = $_POST['passport' . $i];
        $_SESSION['passport']=$passport;
        $ticket_code = rand(100000000, 999999999);
        $_SESSION['TICKET_NUMBER']=$ticket_code; // Tạo mã vé ngẫu nhiên
        $codeInt = (int)$ticket_code;

        $ticket_sql = "INSERT INTO ticket (`TICKET_NUMBER`, `DATE_OF_BOOKING`, `DATE_OF_TRAVEL`, `CLASS`, `DATE_OF_CANCELLATION`, `PASSPORTNO`,`FLIGHT_CODE`) VALUES ('$codeInt','" . $_SESSION['date'] . "','$departure_date', '$class','NULL','$passport','" . $_SESSION['flight_code'] . "')";
        $ticket_result = mysqli_query($conn, $ticket_sql);

        if ($ticket_result == 1) {
            echo "Thêm vé thành công cho hành khách thứ " . $i . "! Mã vé: " . $ticket_code . "<br>";
        } else {
            echo "Lỗi khi thêm vé cho hành khách thứ " . $i . ": " . mysqli_error($conn) . "<br>";
        }
    }

    header("Location: chongoi.php");
}
?>
<style>
    body{
        background-image: url("../img/rst(2).webp");
        background-size:100%;
    }
.ve{
    margin-right:50%;
}
form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

select,
input[type="date"],
input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #3487FF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: red;
}
</style>