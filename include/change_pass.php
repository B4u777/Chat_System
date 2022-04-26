<?php
session_start();
include("connection.php");

	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
    $user=$_SESSION['user_email'];
	 if($pass1!=$pass2){
        echo json_encode("Password did not match!!!");

            }
            if($pass1<9 AND $pass2<9){
                echo json_encode("Password should be less than 9 character!!!");
            }
            if($pass1==$pass2){
            	$update_pass=mysqli_query($con,"UPDATE users SET user_password='$pass1' WHERE user_email='$user'");
            	session_destroy();
                $message = array(
                    'status' => true,
                    'title' => 'Go Ahead',
                    'message' => 'Sign In Your Account',
                    
                );
            echo json_encode($message);
            }

?>