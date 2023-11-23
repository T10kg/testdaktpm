<?php
   require("../conn.php");
   require("../client/func.php");
   session_start();


if(isset($_POST['submit']))
{
   
   $seats = $_POST['seat'];
   $i = 1;
   foreach ($seats as $s) {

      $res = them_cho($conn,$s, $_SESSION['TICKET_NUMBER'][$i]);
      $i++;
      header("Location: userthanhtoan.php");
      
    }
   
      $temp[] = "";
      $res= da_dat($conn);
      while($c = mysqli_fetch_array($res)){
         $temp[$c['SEAT']] = 0;
      }
}
$seatClass = $_SESSION['class'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="style.css">

   <title>Document</title>
</head>
<body>
<div>
<form action="" method = "POST">
<?php
if ($seatClass == "FIRST-CLASS"){
?>
<table  class="seat-layout">
      <?php
      
      $passengerCount = $_SESSION['passengerCount'];
      ?>

      <input type="hidden" id = "passenger_count" value = "<?php  echo  $passengerCount;?>">
      <?php
     $aa = "";
     $ress= da_dat($conn);
     $tempp[] = 0;
            while($c = mysqli_fetch_array($ress)){
               $tempp[trim($c['SEAT'])] = 0;
         }

      for($i = 0; $i <= 5; $i++){
         if($i == 0) $aa = "F";
         else if($i == 1) $aa = "E";
         else if($i == 2) $aa = "D";
         else if($i == 3) $aa = "C";
         else if($i == 4) $aa = "B";
         else if($i == 5) $aa = "A";

      ?>
         <tr>
      <?php
         for($j = 1; $j <= 3; $j++){
            
            ?>
               <th>
               <label for="<?php echo $aa.$j; ?>"><?php echo $aa.$j; ?></label>
            <?php
               if(isset($tempp[$aa.$j])) continue;
            ?>
    <input type="checkbox" onchange="handleCheckboxChange(this)" name="seat[]" id="<?php echo $aa.$j; ?>" value="<?php echo $aa.$j;?>">
</th>
            <?php
         }
         ?>
         </tr>
         <?php
      }
      ?>
   </table>
   <input type="submit" value="Lưu" name = "submit">
   </form>
   <?php
}
?>
<?php
if ($seatClass == "BUSINESS"){
?>
<table  class="seat-layout">
      <?php
      
      $passengerCount = $_SESSION['passengerCount'];
      ?>

      <input type="hidden" id = "passenger_count" value = "<?php  echo  $passengerCount;?>">
      <?php
     $aa = "";
     $ress= da_dat($conn);
     $tempp[] = 0;
            while($c = mysqli_fetch_array($ress)){
               $tempp[trim($c['SEAT'])] = 0;
         }

      for($i = 0; $i <= 5; $i++){
         if($i == 0) $aa = "F";
         else if($i == 1) $aa = "E";
         else if($i == 2) $aa = "D";
         else if($i == 3) $aa = "C";
         else if($i == 4) $aa = "B";
         else if($i == 5) $aa = "A";
      ?>
         <tr>
      <?php
         for($j = 4; $j <= 7; $j++){
            
            ?>
               <th>
               <label for="<?php echo $aa.$j; ?>"><?php echo $aa.$j; ?></label>
            <?php
               if(isset($tempp[$aa.$j])) continue;
            ?>
    <input type="checkbox" onchange="handleCheckboxChange(this)" name="seat[]" id="<?php echo $aa.$j; ?>" value="<?php echo $aa.$j;?>">
</th>
            <?php
         }
         ?>
         </tr>
         <?php
      }
      ?>
   </table>
   <input type="submit" value="Lưu" name = "submit">
   </form>
   <?php
}
?>
<?php
if ($seatClass == "ECONOMY"){
?>
<table  class="seat-layout">
      <?php
      
      $passengerCount = $_SESSION['passengerCount'];
      ?>

      <input type="hidden" id = "passenger_count" value = "<?php  echo  $passengerCount;?>">
      <?php
     $aa = "";
     $ress= da_dat($conn);
     $tempp[] = 0;
            while($c = mysqli_fetch_array($ress)){
               $tempp[trim($c['SEAT'])] = 0;
         }

      for($i = 0; $i <= 5; $i++){
         if($i == 0) $aa = "F";
         else if($i == 1) $aa = "E";
         else if($i == 2) $aa = "D";
         else if($i == 3) $aa = "C";
         else if($i == 4) $aa = "B";
         else if($i == 5) $aa = "A";

      ?>
         <tr>
      <?php
         for($j = 8; $j <= 15; $j++){
            
            ?>
               <th>
               <label for="<?php echo $aa.$j; ?>"><?php echo $aa.$j; ?></label>
            <?php
               if(isset($tempp[$aa.$j])) continue;
            ?>
    <input type="checkbox" onchange="handleCheckboxChange(this)" name="seat[]" id="<?php echo $aa.$j; ?>" value="<?php echo $aa.$j;?>">
</th>
            <?php
         }
         ?>
         </tr>
         <?php
      }
      ?>
   </table>
   <input type="submit" value="Lưu" name = "submit">
   </form>
   <div class="chongoi">
      Sơ đồ chỗ ngồi
   </div>
   <?php
}
?>
</div>

</body>
<script>
   var i = 0;
  function handleCheckboxChange(checkbox) {
   var nodeList = document.querySelectorAll("input[type='checkbox']");
   var convert = document.getElementById("passenger_count");
   var array = [...nodeList];
      if (checkbox.checked) {
         i++;
         if(i == convert.value){
            array.forEach(function(element) {
               if(element.checked) {
               }
               else element.disabled = true;
            });
         }
      } 
      else {
         i--;
         array.forEach(function(element) {
            if(element.checked) {
            }
            else element.disabled = false;
         });
      
    }
    console.log(i);
   
}
</script>
</html>
<style>
   .chongoi{
      width: 100%;
      height:300px;
        background: url(../img/seattt.jpg) center/cover ;
        background-repeat: no-repeat;
        background-size: 70% 300px;
}
body {
  font-family: Arial, sans-serif;
  background-image: url("../img/sf.jpg");
}

.seat-layout {
  width: 100%;
  border-collapse: collapse;
}

.seat-layout th {
  padding: 10px;
  text-align: center;
}

.seat-layout td {
  padding: 5px;
}

.seat {
  display: inline-block;
  width: 30px;
  height: 30px;
  background-image: url("../img/z4896435291747_e2ebb6c8cdf591aa434c158b7b2cfd7f.jpg");/* Đường dẫn tới hình ảnh cái ghế */
  background-size: cover;
  cursor: pointer;
}

.seat.selected {
  background-image: url(path/to/selected-seat-image.jpg); /* Đường dẫn tới hình ảnh cái ghế được chọn */
}

input[type="submit"] {
  display: block;
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
</style>