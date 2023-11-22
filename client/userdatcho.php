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
<?php
$passengerCount = $_SESSION['passengerCount']; 
echo $passengerCount;
require("../conn.php");
require("func.php");
if($passengerCount==1){
$sql = "SELECT * FROM passenger_infor WHERE USERNAME = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
// Kiểm tra xem có bản ghi nào được trả về hay không
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua từng bản ghi và hiển thị thông tin
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="hidden" name="passport" value="' . $row["PASSPORTNO"] . '">';
        $_SESSION['passport']=$row["PASSPORTNO"] ;
        header("Location: loaive.php");
         // Điều hướng đến trang admin.php
        exit();
    }
 }
}else if($passengerCount>1){
    ?>
    <form action="" method = "POST">
    <?php
   for ($i = 0; $i < ($passengerCount-1); $i++) {
       echo "<h2>Vui lòng nhập thông tin:</h2>";
       ?>
       <label> PASSPORT</label> <input type="text" name="passport[]">
       <label> Họ </label> <input type="text" name="ho[]">
       <label> tên lót </label> <input type="text" name="tenlot[]">
       <label> tên </label> <input type="text" name="ten[]">
       <label>SĐT:</label><input type="text" name="PHONE[]">
       <label>Địa chỉ:</label><input type="text" name="address[]">
       <label>Tuổi:</label><input type="text" name="age[]">
       <label>giới tính:</label><input type="text" name="sex[]">
       <br><br>
       <?php
   }
}
   ?>
   <input type="submit" value="Tiếp tục" name="submit">
</form>
<?php
if (isset($_POST['submit'])) {
   $found = 0;
   $passengerCount = count($_POST['passport']);

   // Lặp qua từng form để lưu thông tin hành khách
   for ($i = 0; $i < $passengerCount; $i++) {
   echo $passengerCount;
       $passport = $_POST["passport"][$i];
       $ho = $_POST["ho"][$i];
           $tenlot = $_POST["tenlot"][$i];
           $ten = $_POST["ten"][$i];
           $SĐT = $_POST["PHONE"][$i];
           $gioitinh = $_POST["sex"][$i];
           $tuoi = $_POST["age"][$i];
           $diachi = $_POST["address"][$i];
           $SĐTBigInt = (int)$SĐT;
           $tuoiInt = (int)$tuoi;
           $sql = "INSERT INTO passenger_infor (`PASSPORTNO`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `PHONE`, `AGE`, `SEX`,`USERNAME`) VALUES('$passport', '$ho', '$tenlot', '$ten','$diachi','$SĐTBigInt','$tuoiInt', '$gioitinh','NULL')";
           $result = mysqli_query($conn, $sql);
           $found = 1;
           echo $i;
           echo $sql;
           
       // Kiểm tra xem có bản ghi nào được trả về hay không
       $sql = "SELECT * FROM passenger_infor WHERE USERNAME = '{$_SESSION['username']}'";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
        // Duyệt qua từng bản ghi và hiển thị thông tin
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<input type="hidden" name="passport" value="' . $row["PASSPORTNO"] . '">';
                $_SESSION['passport']=$row["PASSPORTNO"] ;
            }
        }
    }

   if ($result == 1 || $found == 0) {
       $_SESSION['passport'] = $passport;
       header("Location: loaive.php"); // Điều hướng đến trang loaive.php
    }
  }
 else {
    echo "Không có góp ý nào.";
}

?>
<?php
if (isset($_POST['submit'])) {
    $found = 0;
    $passengerCount = count($_POST['passport']);

    // Lặp qua từng form để lưu thông tin hành khách
    for ($i = 0; $i < $passengerCount; $i++) {
        $passport = $_POST["passport"][$i];

        // Kiểm tra xem thông tin hành khách đã tồn tại trong cơ sở dữ liệu chưa

        if (!mysqli_num_rows(checkthongtin($conn, $passport))) {
            $ho = $_POST["ho"][$i];
            $tenlot = $_POST["tenlot"][$i];
            $ten = $_POST["ten"][$i];
            $SĐT = $_POST["PHONE"][$i];
            $gioitinh = $_POST["sex"][$i];
            $tuoi = $_POST["age"][$i];
            $diachi = $_POST["address"][$i];
            $SĐTBigInt = (int)$SĐT;
            $tuoiInt = (int)$tuoi;
            $sql = "INSERT INTO passenger_infor (`PASSPORTNO`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `PHONE`, `AGE`, `SEX`,`USERNAME`) VALUES('$passport', '$ho', '$tenlot', '$ten','$diachi','$SĐTBigInt','$tuoiInt', '$gioitinh','NULL')";
            $result = mysqli_query($conn, $sql);
            $found = 1;
        }
    }

    if ($result == 1 || $found == 0) {
        $_SESSION['passport'] = $passport;
        header("Location: loaive.php"); // Điều hướng đến trang loaive.php

    }
}
?>

</body>
</html>
<style>
    body{
        background-image: url("../img/rst(2).webp");
        background-size:100%;
    }
    form {
        width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #00BFFF;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color:red;
    }
    
    
</style>