<?php
    session_start();
    include "connection.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
      echo json_encode($output .= "No users are available to chat");
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo json_encode($output);
?>