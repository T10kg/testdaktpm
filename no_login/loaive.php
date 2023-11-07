<div>
    <form method="post">
    <label>Loại vé:</label>
    <select name="class">
            <option value="option1">ECONOMY</option>
            <option value="option2">BUSINESS</option>
            <option value="option3">FIRST-CLASS</option>
        </select>
    <label>Ngày khởi hành:</label><input type="date" name="departure_date">
        <input type="submit" value="Tiếp tục" name="submit">
    </form>
</div>
<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['submit'])) {
    $class = $_POST["class"];
    $departure_date = $_POST['departure_date'];
    $ticket_code = uniqid(); // Tạo mã vé ngẫu nhiên
    $flight_code = $_POST['flight_code'];
    $ticket_sql = "INSERT INTO ticket (`TICKET_`, `CLASS`, `DATE_OF_TRAVEL`, `FLIGHT_CODE`) VALUES ('$ticket_code', '$class', '$departure_date', '$flight_code')";
    $ticket_result = mysqli_query($conn, $ticket_sql);
    if ($ticket_result ==1) {
        echo "Thêm vé thành công! Mã vé: " . $ticket_code;
    } else {
        echo "Lỗi khi thêm vé: " . mysqli_error($conn);
    }
}
?>