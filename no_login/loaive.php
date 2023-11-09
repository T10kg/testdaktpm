<div>
    <form method="post">
    <label>Loại vé:</label>
    <select name="class">
            <option value="ECONOMY">ECONOMY</option>
            <option value="BUSINESS">BUSINESS</option>
            <option value="FIRST-CLASS">FIRST-CLASS</option>
        </select>
    <label>Ngày khởi hành:</label><input type="date" name="departure_date">
        <input type="submit" value="Đặt vé" name="submit">
    </form>
</div>

<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])) {
    session_start();
    echo $_SESSION['flight_code'];
    $class = $_POST["class"];
    $departure_date = $_POST['departure_date'];
    $ticket_code =rand(100000000, 999999999); // Tạo mã vé ngẫu nhiên
    $codeInt = (int)$ticket_code;
    $ticket_sql = "INSERT INTO ticket (`TICKET_NUMBER`, `DATE_OF_BOOKING`, `DATE_OF_TRAVEL`, `CLASS`, `DATE_OF_CANCELLATION`, `PID`, `PASSPORTNO`,`FLIGHT_CODE`) VALUES ('$codeInt','" .  $_SESSION['date'] . "','$departure_date', '$class','NULL',1,'" . $_SESSION['passport'] . "','" . $_SESSION['flight_code'] . "')";
    $ticket_result = mysqli_query($conn, $ticket_sql);
    if ($ticket_result == 1) {
        echo "Thêm vé thành công! Mã vé: " . $ticket_code;
    } else {
        echo "Lỗi khi thêm vé: " . mysqli_error($conn);
    }
}
?>