<div>
    <form method="post">
    <label>Loại vé:</label>
    <select name="class">
            <option value="ECONOMY">ECONOMY</option>
            <option value="BUSINESS">BUSINESS</option>
            <option value="FIRST-CLASS">FIRST-CLASS</option>
        </select>
    <label>Ngày khởi hành:</label><input type="date" name="departure_date">
        <input type="submit" value="Tiếp tục" name="submit">
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
    $ticket_code = uniqid(); // Tạo mã vé ngẫu nhiên
    $ticket_sql = "INSERT INTO ticket (`TICKET_NUMBER`, `DATE_OF_BOOKING`, `DATE_OF_TRAVEL`, `CLASS`, `DATE_OF_CANCELLATION`, `PID`, `PASSPORTNO`,`FLIGHT_CODE`) VALUES ('$ticket_code','77777','1133212', '$class','7237',1,'A1234568','$_SESSION['flight_code']')";
    $ticket_result = mysqli_query($conn, $ticket_sql);
    if ($ticket_result ==1) {
        echo "Thêm vé thành công! Mã vé: " . $ticket_code;
    } else {
        echo "Lỗi khi thêm vé: " . mysqli_error($conn);
    }
}
?>