<?php 
    session_start();
    include "connection.php";
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($con, "SELECT * FROM users WHERE user_email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = $password;
            $enc_pass = $row['user_password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($con, "UPDATE users SET log_in = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo  json_encode("success");
                }else{
                    echo  json_encode("Something went wrong. Please try again!");
                }
            }else{
                echo  json_encode("Email or Password is Incorrect!");
            }
        }else{
            echo  json_encode("$email - This email not Exist!");
        }
    }else{
        echo  json_encode("All input fields are required!");
    }
?>