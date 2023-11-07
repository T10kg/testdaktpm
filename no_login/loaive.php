<div>
    <form>
    <label>Loại vé:</label>
    <select name="class">
            <option value="option1">ECONOMY</option>
            <option value="option2">BUSINESS</option>
            <option value="option3">FIRST-CLASS</option>
        </select>
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
</div>
<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])){
        $class=$_POST["class"];
        $sql="INSERT INTO ticket ( `CLASS`) VALUES('$class')";
        $passport=$_POST["passport"];
        $ho=$_POST["ho"];
        $tenlot=$_POST["tenlot"];
        $ten=$_POST["ten"];
        $SĐT=$_POST["PHONE"];
        $gioitinh=$_POST["sex"];
        $tuoi=$_POST["age"];
        $diachi=$_POST["address"]; 
        $SĐTBigInt = (int)$SĐT;
        $tuoiInt = (int)$tuoi;
        $sql="INSERT INTO passenger_infor (`PASSPORTNO`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `PHONE`, `AGE`, `SEX`) VALUES('$passport', '$ho', ' $tenlot', '$ten','$diachi','$SĐTBigInt','$tuoiInt', '$gioitinh')";
        $result=mysqli_query ($conn, $sql);
        if ($result==1) {
            header("Location: ../index.php"); // Điều hướng đến trang admin.php
            exit(); // Dừng thực thi mã sau khi điều hướng
        } 
    }
?>