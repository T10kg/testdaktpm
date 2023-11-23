<html><link rel="stylesheet" href="../css/login.css" />
<body>
<div class="banner"><img src="../img/rst.webp" alt="" width="75%">
    <div class="textt">
        <div class="text">
        Đăng nhập
        </div>
        <div class="container">
        <div class="top">
        <form method="post" action="logincheck.php">
            <div class="topp">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
             </div>
             <div class="topp">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            </div>
            <input type="submit" value="Đăng nhập" name="submit">
        </form>
        <a href="register.php"><button>Creart my accout</button> </a>
        </div> 
    </div>
</div>
    </body>
</html>