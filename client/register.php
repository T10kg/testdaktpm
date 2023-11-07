
<h2>Tạo tài khoản</h2>
    <form method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Tạo tài khoản" name="submitt">
    </form>
    <?php
require("../conn.php");
require("func.php");
?>
<?php
if (isset($_POST['submitt'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Kiểm tra xem tài khoản đã tồn tại hay chưa
    $sql = "SELECT * FROM passenger_login WHERE USERNAME = '$username'";
    $result = checktaikhoan($conn, $sql);

    if ($result->num_rows > 0) {
        echo "Tài khoản đã tồn tại.";
    } else {
        // Băm mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thêm tài khoản vào cơ sở dữ liệu
        $sql = "INSERT INTO passenger_login (`USERNAME`, `PASS`) VALUES ('$username', '$hashedPassword')";
        $result=mysqli_query ($conn, $sql);
        if ($result==1) {
            header("Location: information.php"); // Điều hướng đến trang admin.php
            exit(); // Dừng thực thi mã sau khi điều hướng
        } else {
            echo "<script>
            alert('Wrong Username or Password'); 
            window.location.href='login.php';
            </script>";

        }
    }
}
?>