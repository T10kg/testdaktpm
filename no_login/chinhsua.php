
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
<?php
require("../conn.php");
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
    session_start();
    $class = $_POST["class"];
    $_SESSION['class'] = $class;
    echo $_SESSION['class'];
    $ticketNumber = $_POST["ticketNumber"];
    $_SESSION['TICKET_NUMBER']=$ticketNumber;
    echo $_SESSION['TICKET_NUMBER'];

    $sql = "UPDATE `ticket` SET `CLASS`='$class' WHERE `TICKET_NUMBER` = '$ticketNumber'";
    mysqli_query($conn, $sql);
    header("Location: chongoib.php");
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