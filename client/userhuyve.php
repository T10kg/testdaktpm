<?php
require("../conn.php");
require("../client/func.php");

if (isset($_POST['huy'])) {
    // Xử lý khi người dùng nhấn nút "Hủy vé"
    // Thêm mã PHP xử lý hủy vé tại đây
    $ticketNumber = $_POST["ticketNumber"];
    // Lấy thông tin vé từ cột "ticket" dựa trên ticket number
    $sql = "SELECT * FROM ticket WHERE TICKET_NUMBER = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ticketNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy thông tin chuyến bay từ kết quả truy vấn
        $row = $result->fetch_assoc();

        // Lưu thông tin vé vào cột "ticket_cancel"
        $cancelDate = date("Y-m-d"); // Ngày hủy vé
        $ticketNumber = $row["TICKET_NUMBER"];

        $insertSql = "INSERT INTO ticket_cancel (DATE_OF_CANCELLATION, TICKET_NUMBER) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ss", $cancelDate, $ticketNumber);
        $insertStmt->execute();

        // Xóa vé từ cột "ticket" dựa trên ticket number
        $deleteSql = "DELETE FROM ticket WHERE TICKET_NUMBER = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("s", $ticketNumber);
        $deleteStmt->execute();

        echo "<script>
        alert('Hủy vé thành công'); 
        window.location.href='userchocuatoi.php';
        </script>";
    }
}
?>