<<<<<<< HEAD

=======
<?php
require("../conn.php");
require("../client/func.php");
$city = cityname($conn);
$cityy = cityname($conn); 
?>
>>>>>>> 2027bf2e4690a1967b209ba9c742bd70b36a4642
git add
<form method="post">
    <label>Tìm chuyến bay:</label><br><br>
    <label>Điểm đi:</label>
    <select name="from">
        <?php while ($row = mysqli_fetch_array($city)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>

    <label>Điểm đến:</label>
    <select name="arrive">
        <?php while ($row = mysqli_fetch_array($cityy)) {
            ?>
            <option><?php echo $row["IATA_CODE"]; ?></option>
        <?php
        }
        ?>
    </select>

    <input type="submit" value="Tìm chuyến bay" name="submit">
</form>

<div>
    <?php
    function findFlights($from, $arrive, $conn)
    {
        $sql = "SELECT * FROM flight WHERE IATA_START = '$from' AND IATA_END = '$arrive'";
        $result = $conn->query($sql);
        return $result;
    }

    if (isset($_POST["submit"])) {
        $from = $_POST['from'];
        $arrive = $_POST['arrive'];
        $flights = findFlights($from, $arrive, $conn);

        if ($flights->num_rows > 0) {
            echo "Các chuyến bay từ $from đến $arrive:<br>";

            while ($row = $flights->fetch_assoc()) {
                echo "Mã chuyến bay: " . $row["FLIGHT_CODE"] . "<br>";
                echo "Ngày khởi hành: " . $row["DEPARTURE"] . "<br>";
                // ... in ra các thông tin khác của chuyến bay
                echo '<form method="post" action="loaive.php">'; // Chỉ định URL của trang đặt vé ở đây
                echo '<input type="hidden" name="flight_code" value="' . $row["FLIGHT_CODE"] . '">'; // Truyền mã chuyến bay vào trường ẩn
                echo '<input type="submit" value="Đặt vé" name="book">';
                echo '</form>';
            }
        } else {
            echo "Không tìm thấy chuyến bay từ $from đến $arrive.";
        }
    }
    ?>
</div>
