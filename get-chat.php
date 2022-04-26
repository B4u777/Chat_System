<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "connection.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $output = "";
        $update_msg=mysqli_query($con, "UPDATE `userschat` SET msg_status='read' WHERE  outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}");

        $sql = "SELECT * ,DATE_FORMAT(msg_date , '%d-%m-%y %h:%i %p') as date FROM userschat LEFT JOIN users ON users.unique_id = userschat.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <h6>'.$row['date'].'</h6>
                                    <p>'. $row['msg_content'].'</p>
                                    <h6>'. $row['msg_status'] .'</h6>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="images/'.$row['user_profile'].'" alt="">
                                <div class="details">
                                    <h6>'. $row['date'] .'</h6>
                                    <p>'. $row['msg_content'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo json_encode($output);
    }else{
        header("location: signin.php");
    }

?>