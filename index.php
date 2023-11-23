
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/client.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
<div class="banner">
    <div class="menuu">
        <div class="chucnang"><i class="fa-solid fa-bars-staggered" onclick="hello()"> <a href="index.php">wearefly</a></i>
                <ul class="dropdown-menu" style = "transform: translate(-100%,0px);">
                        <a href="index.php"><li>Trang chủ</li></a>
                        <a href="no_login/chocuatoi.php"><li>Đặt chỗ của tôi</li></a>
                        <a href="no_login/sms.php"><li>Hộp thư của tôi</li></a>
                        <a href="no_login/timchuyenbay.php"><li>Tìm chuyến bay</li></a>
                        <a href="no_login/callme.php"><li>Liên hệ chúng tôi</li></a>
                        <a href="no_login/colab.php"><li>Hợp tác chúng tôi</li></a>
                        <a href="no_login/cachdatve.php"><li>Cách đặt vé</li></a>
                        <a href="no_login/trogiup.php"><li> Trợ giúp</li></a>
                </ul>
         </div>
                
          <div class="menu">
                <div class="sp">
                        <a href="no_login/colab.php">Hợp tác với chúng tôi </a>
                </div>
                <div class="sp">
                        <a href="no_login/timchuyenbay.php">Tìm chuyến bay </a>
                </div>
                <div class="sp">
                        <a href="no_login/chocuatoi.php">Đặt chỗ của tôi</a>
                </div>
                <div class="sp1">
                        <a href="client/login.php">Đăng nhập</a>
                </div>
                <div class="sp2">
                        <a href="client/register.php">Đăng kí</a>
                </div>
           </div>
    </div>
</div>

<div class="main">
        <h1 >
        Tại sao nên đặt chỗ với Wearefly?
        </h1>
        <div class="container">
                <div >
                <img src="img/1.webp" width="100vw">
                        <div class= "text">
                        Đội ngũ nhân viên hỗ trợ khách hàng luôn sẵn sàng giúp đỡ bạn trong từng bước của quá trình đặt vé
                        </div>
                </div>
                <div >
                <img src="img/2.webp" width="100vw">
                        <div class= "text">
                        Giao dịch trực tuyến an toàn với nhiều lựa chọn như thanh toán tại cửa hàng tiện lợi, chuyển khoản ngân hàng, thẻ tín dụng đến Internet Banking. 
                        </div>
                </div>
                <div>
                <img src="img/3.webp" width="100vw">
                        <div class= "text">
                        Giá bạn thấy là giá bạn trả! Nhiều lựa chọn giá rẻ để bạn thỏa sức so sánh!
                        </div>
                </div>
                <div>
                <img src="img/4.webp" width="100vw">
                        <div class= "text">
                        Giải pháp toàn diện - giúp bạn tìm chuyến bay và khách sạn khắp Việt Nam và Đông Nam Á một cách tiết kiệm.
                        </div>
                </div>
        </div>
</div>
<div class="main">
        <h1 >
        Các hãng tiêu biểu
        </h1>
        <div class="container">
                <div >
                <img src="img/VJ.png" width="200vw">
                </div>
                <div >
                <img src="img/vna.png" width="200vw">
                </div>
                <div>
                <img src="img/BB.png" width="250vw">
                </div>
        </div>
</div>

</body>
</html>
<h1>Các địa điểm nổi bật</h1>
<div class="like">
        <div class="imggg" >
                <?php require("no_login/saigon.php") ?>
                <h3>Sài Gòn</h3>
                </div>
                <div class="imggg" >
                <?php require("no_login/hanoi.php") ?>
                <h3>Hà Nội</h3>
                </div>
                <div class="imggg" >
                <?php require("no_login/cantho.php") ?>
                <h3>Cần Thơ</h3>
                </div>
</div>

<div >
        <?php require("no_login/end.php") ?>
            </div>

<script>

        function hello() {
  var ele = document.querySelector(".dropdown-menu");
  if (ele.style.transform == "translate(-100%, 0px)") {
    ele.style.transform = "translate(0px, 0px)";
    ele.style.transition = "all 0.6s ease-in-out";
  } else {
    ele.style.transform = "translate(-100%, 0px)";
    ele.style.transition = "all 0.6s ease-in-out";
  }
}

</script>