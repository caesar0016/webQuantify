<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "prac001";
    $conn = "";

    $conn = mysqli_connect($db_server,
                            $db_user,
                            $db_pass,
                            $db_name);
    
    if($conn){
        echo "This is connected!!";
    }else{
        echo "This is not connected!!";
    }
?>