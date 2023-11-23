<?php
session_start();
require("../conn.php");
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Điều hướng về trang đăng nhập nếu chưa đăng nhập
    exit();
}

$username = $_SESSION['username'];


// Truy vấn để lấy thông tin passport
$sql = "SELECT PASSPORTNO FROM passenger_infor WHERE USERNAME = '$username'";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả truy vấn
if (mysqli_num_rows($result) > 0) {
    // Lấy thông tin passport từ kết quả truy vấn
    $row = mysqli_fetch_assoc($result);
    $passport = $row['PASSPORTNO'];
    $_SESSION['passport']=$passport;
}


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
                <a href="userdatcho.php">Đặt chỗ của tôi</a>
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

if (isset($_POST['chinhsua'])) {
    $ticketNumber = $_POST["ticketNumber"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thay đổi hạng vé</title>
</head>
<body>
    <h1>Thay đổi hạng vé</h1>
    <form method="post" action="">
        <label>Hạng vé mới:</label>
        <select name="class">
            <option value="ECONOMY">ECONOMY</option>
            <option value="BUSINESS">BUSINESS</option>
            <option value="FIRST-CLASS">FIRST-CLASS</option>
        </select>
        <input type="hidden" name="ticketNumber" value="<?php echo $ticketNumber; ?>">
        <input type="submit" name="chinhsuaa" value="Chỉnh sửa">
    </form>
<?php
if (isset($_POST['chinhsuaa'])) {
    $class = $_POST["class"];
    $_SESSION['class'] = $class;
    echo $_SESSION['class'];
    $ticketNumber = $_POST["ticketNumber"];
    $_SESSION['TICKET_NUMBER']=$ticketNumber;
    echo $_SESSION['TICKET_NUMBER'];
    $sql = "UPDATE `ticket` SET `CLASS`='$class' WHERE `TICKET_NUMBER` = '$ticketNumber'";
    mysqli_query($conn, $sql);
    header("Location: userchongoib.php");
    exit;
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

