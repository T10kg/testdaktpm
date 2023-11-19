<?php
   require("../conn.php");
   require("../client/func.php");



if(isset($_POST['submit']))
{
   
   $seats = $_POST['seat'];
   foreach ($seats as $s) {
      $res = them_cho($conn,$s);
    }
   
      $temp[] = "";
      $res= da_dat($conn);
      while($c = mysqli_fetch_array($res)){
         $temp[$c['SEAT']] = 0;
      }
}
?>
<?php


if(isset($_POST['submit']))
{
   
   $seats = $_POST['seat'];
   $i = 1;
   foreach ($seats as $s) {
      $res = them_cho($conn,$s, $_SESSION['TICKET_NUMBER'][$i]);
      $i++;
    }
   
      $temp[] = "";
      $res= da_dat($conn);
      while($c = mysqli_fetch_array($res)){
         $temp[$c['SEAT']] = 0;
      }
}
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
<table>
      <?php
      session_start();
      $passengerCount = $_SESSION['passengerCount'];
     
     $aa = "";
     $ress= da_dat($conn);
     $tempp[] = 0;
            while($c = mysqli_fetch_array($ress)){
               echo $c['SEAT'];
               $tempp[trim($c['SEAT'])] = 0;
         }

      for($i = 0; $i <= 2; $i++){
         if($i == 0) $aa = "A";
         else if($i == 1) $aa = "B";
         else if($i == 2) $aa = "C";
      ?>
         <tr>
      <?php
         for($j = 1; $j <= 10; $j++){
            
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
</div>

</body>
<script>
   var i = 0;
  function handleCheckboxChange(checkbox) {
   var nodeList = document.querySelectorAll("input[type='checkbox']");
   var array = [...nodeList];
      if (checkbox.checked) {
         i++;
         if(i == $_SESSION['passengerCount']){
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