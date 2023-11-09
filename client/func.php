<?php
    function taikhoan($conn, $sql){
        $result=mysqli_query ($conn, $sql);
        return $result;
    }
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
    function passport($conn){
        $sql="INSERT INTO `passenger_ticket`(`PID`, `PASSPORTNO`) VALUES ('8','A13578') ";
        return mysqli_query($conn, $sql);
    }
    ?>