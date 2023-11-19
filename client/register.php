<div class="cr">
<div class="banner"><img src="../img/rst(2).webp" alt="" width="1200px"></div>
<div class="rst">
    <form method="post">
    
    <h2>Tạo tài khoản</h2>
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Tạo tài khoản" name="submitt">
    </form>
</div>
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
        $hashedPassword = md5($password);
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
</div>
<style>
    .cr{
        margin-right: 20px;
        display: flex;
    }
    .benner{

    }
    h2{
        padding-bottom:0px;
    }
    .rst{
        margin-top:10%;
        margin-right:80%;
    }
    form {
        width: 300px;
        margin: 10px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>