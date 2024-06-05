<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "prac001";
    $conn = "";

    
    try{
        $conn = mysqli_connect($db_server,
                            $db_user,
                            $db_pass,
                            $db_name);
    }catch(Exception $ex){
        echo ("Not connected");
    }
?>