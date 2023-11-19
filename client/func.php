<?php

    function checktaikhoan($conn, $sql){
        $result=mysqli_query ($conn, $sql);
        return $result;
    }
    
    function cityname($conn){
        $sql="SELECT * FROM airport ";
        return mysqli_query($conn, $sql);
    }
    function ticket($conn, $sql){
        $result=mysqli_query ($conn, $sql);
        return $result;
    }

    function checkthongtin($conn, $PASSPORTNO){
        $sql = "SELECT * FROM passenger_infor WHERE 'PASSPORTNO' = '$PASSPORTNO'";
        return mysqli_query($conn, $sql);
    }
    function them_cho($conn, $seat, $ticket_number){
        $sql = "UPDATE `ticket` SET `seat`='$seat' WHERE `TICKET_NUMBER` = '$ticket_number'";
        return mysqli_query($conn, $sql);
     }
  
     function da_dat($conn){
        $sql = "SELECT * FROM `ticket`";
        return mysqli_query($conn, $sql);
     }
  
    ?>