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
    
    ?>