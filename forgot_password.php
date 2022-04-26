<?php
session_start();
include "connection.php";


	$email=$_POST['email'];
    $recovery_account=$_POST['bf'];
     
     $select_user="SELECT*from users where user_email='$email' AND
     forgotten_answer='$recovery_account'";

     $query=mysqli_query($con,$select_user);
     $check_user=mysqli_num_rows($query);
     if($check_user==1){
     	$_SESSION['user_email']=$email;
     	$message = array(
            'status' => true,
            'title' => 'Go Ahead',
            'message' => 'To Change Password',
            
        );
    echo json_encode($message);
     }
     else{
        echo json_encode("Check Email or Friend!!!");
     }




?>