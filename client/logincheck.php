<?php
require("../conn.php");
require("func.php");

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Kiểm tra xem tài khoản có tồn tại hay không
    $sql = "SELECT * FROM passenger_login WHERE USERNAME = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['PASS']; // Lấy hashed password từ cơ sở dữ liệu

        if ($hashedPassword == md5($password)) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['username'] = $username;
            header("Location:userlogin.php"); // Điều hướng đến trang chính
            exit(); // Dừng thực thi mã sau khi điều hướng
        } else {
            echo "<script>
            alert('Wrong Username or Password'); 
            window.location.href='../index.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('No Username or Password'); 
        window.location.href='../index.php';
        </script>";
    }
}
?>