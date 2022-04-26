<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "connection.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['msg_content']);
        if(!empty($message)){
            $sql = "INSERT INTO userschat (incoming_msg_id, outgoing_msg_id, msg_content, msg_status, msg_date)
                                        VALUES ('$incoming_id', '$outgoing_id', '$message', 'unread', NOW())"; 
                                                       	$run_insert = mysqli_query($con,$sql);

                                                           echo json_encode("success");

        }
    }else{
        echo json_encode("fail");
        header("location: signin.php");
    }


    
?>