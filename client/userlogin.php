<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Điều hướng về trang đăng nhập nếu chưa đăng nhập
    exit();
}

$username = $_SESSION['username'];

// Khi người dùng nhấp vào nút "Thoát"
if (isset($_POST['logout'])) {
    session_unset(); // Xóa tất cả các biến session
    session_destroy(); // Hủy bỏ session
    header("Location:../index.php"); // Điều hướng về trang đăng nhập
    exit();
}
?>
<div class="sign">
    <div class="sp">
        <ul >wearefly
            <a href="themsp.php"><li>Trang chủ</li></a>
            <a href="themsp.php"><li>Đặt chỗ của tôi</li></a>
            <a href="themn.php"><li>Hộp thư của tôi</li></a>
            <a href="themsp.php"><li>Tìm chuyến bay</li></a>
            <a href="themn.php"><li>Liên hệ chúng tôi</li></a>
            <a href="themn.php"><li>Hợp tác chúng tôi</li></a>
            <a href="themn.php"><li>Trợ giúp</li></a>
        </ul>
    </div>
    <div class="sp">
            <a href="dssp.php">Hợp tác với chúng tôi </a>
    </div>
    <div class="sp">
            <a href="dssp.php">Tìm chuyến bay </a>
    </div>
    <div class="sp">
            <a href="dssp.php">Đặt chỗ của tôi</a>
    </div>
    <div class="sing">
    <p>Xin chào: <?php echo $username; ?></p>
    <form class="form" method="post" action="">
        <input type="submit" name="logout" value="Thoát">
    </form>
    </div> 
</div>
<div>

</div>
