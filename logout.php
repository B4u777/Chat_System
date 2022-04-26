<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "bridge/connection.php";
        $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($con, "UPDATE users SET log_in = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: signin.php");
            }
        }else{
            header("location: home.php");
        }
    }else{  
        header("location: signin.php");
    }
?>