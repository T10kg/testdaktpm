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
session_start();
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