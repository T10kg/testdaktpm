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

    function checkthongtin($conn, $PASSPORTNO){
        $sql = "SELECT * FROM passenger_infor WHERE 'PASSPORTNO' = '$PASSPORTNO'";
        return mysqli_query($conn, $sql);
    }
    ?>