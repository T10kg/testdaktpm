<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Điều hướng về trang đăng nhập nếu chưa đăng nhập
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
        <div class="chucnang"><i class="fa-solid fa-bars-staggered"> <a href="index.php">wearefly</a></i>
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
                <a href="colab.php">Hợp tác với chúng tôi </a>
        </div>
        <div class="sp">
                <a href="timchuyenbay.php">Tìm chuyến bay </a>
        </div>
        <div class="sp">
                <a href="datcho.php">Đặt chỗ của tôi</a>
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
<h2>Vui lòng nhập thông tin</h2>
    <form method="post">
        <label> PASSPORT</label> <input type="text" name="passport">
        <label> Họ </label> <input type="text" name="ho">
        <label> tên lót </label> <input type="text" name="ten">
        <label> tên </label> <input type="text" name="tenlot">
        <label>SĐT:</label><input type="text" name="PHONE">
        <label>Địa chỉ:</label><input type="text" name="address">
        <label>Tuổi:</label><input type="text" name="age">
        <label>giới tính:</label><input type="text" name="sex">
        <input type="submit" value="Tiếp tục" name="submit">
    </form>
<?php
require("../conn.php");
require("func.php");
if (isset($_POST['submit'])){
$found = 0;
        $passport=$_POST["passport"];
if(!mysqli_num_rows(checkthongtin($conn, $passport))){
        $ho=$_POST["ho"];
        $tenlot=$_POST["tenlot"];
        $ten=$_POST["ten"];
        $SĐT=$_POST["PHONE"];
        $gioitinh=$_POST["sex"];
        $tuoi=$_POST["age"];
        $diachi=$_POST["address"]; 
        $SĐTBigInt = (int)$SĐT;
        $tuoiInt = (int)$tuoi;
                $sql="INSERT INTO passenger_infor (`PASSPORTNO`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `PHONE`, `AGE`, `SEX`,`USERNAME`) VALUES('$passport', '$ho', ' $tenlot', '$ten','$diachi','$SĐTBigInt','$tuoiInt', '$gioitinh','NULL')";
        $result=mysqli_query ($conn, $sql);
        $found = 1;
    }
    if ($result==1 || $found == 0) {
                        $_SESSION['passport']=$passport;
            header("Location: loaive.php"); // Điều hướng đến trang admin.php
            exit(); // Dừng thực thi mã sau khi điều hướng
        } 
    }
?>