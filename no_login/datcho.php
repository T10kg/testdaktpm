
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
        <div class="sp">
                <a href="../client/login.php">Đăng nhập</a>
        </div>
        <div class="sp">
                <a href="../client/register.php">Đăng kí</a>
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
require("../client/func.php");
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