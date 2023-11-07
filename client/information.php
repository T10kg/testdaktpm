<h2>Thông tin khách hàng</h2>
    <form method="post">
        <label> PASSPORT</label> <input type="text" name="passport">
        <label> Họ </label> <input type="text" name="ho">
        <label> tên lót </label> <input type="text" name="ten">
        <label> tên </label> <input type="text" name="tenlot">
        <label>SĐT:</label><input type="text" name="PHONE">
        <label>Địa chỉ:</label><input type="text" name="address">
        <label>Tuổi:</label><input type="text" name="age">
        <label>giới tính:</label><input type="text" name="sex">
         <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required><br><br>
        <input type="submit" value="Lưu thông tin" name="submit">
    </form>
<?php
require("../conn.php");
require("func.php");

if (isset($_POST['submit'])){
        $passport=$_POST["passport"];
        $ho=$_POST["ho"];
        $tenlot=$_POST["tenlot"];
        $ten=$_POST["ten"];
        $SĐT=$_POST["PHONE"];
        $gioitinh=$_POST["sex"];
        $tuoi=$_POST["age"];
        $diachi=$_POST["address"]; 
         $user=$_POST["username"];
        $SĐTBigInt = (int)$SĐT;
        $tuoiInt = (int)$tuoi;
        $sql="INSERT INTO passenger_infor (`PASSPORTNO`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `PHONE`, `AGE`, `SEX`,`USERNAME`) VALUES('$passport', '$ho', ' $tenlot', '$ten','$diachi','$SĐTBigInt','$tuoiInt', '$gioitinh','$user')";
        $result=mysqli_query ($conn, $sql);
        if ($result==1) {
            header("Location: ../index.php"); // Điều hướng đến trang admin.php
            exit(); // Dừng thực thi mã sau khi điều hướng
        } 
    }

?>