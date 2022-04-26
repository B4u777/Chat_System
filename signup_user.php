<?php
   
    include "connection.php";
    $name =  $_POST['user_name'];
    $email =  $_POST['user_email'];
    $password =  $_POST['user_password'];
    $country =  $_POST['user_country'];
    $state =  $_POST['user_state'];
    $city =  $_POST['user_city'];
    $gender =  $_POST['user_gender'];
    $answer =  $_POST['forgotten_answer'];


    if(!empty($name) && !empty($email) && !empty($password) && !empty($country) && !empty($state) && !empty($city) && !empty($gender)){
        
                if(isset($_FILES['user_profile'])){
                    $img_name = $_FILES['user_profile']['name'];
                    $img_type = $_FILES['user_profile']['type'];
                    $tmp_name = $_FILES['user_profile']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Offline now";
                               
                                $insert_query = mysqli_query($con, "INSERT INTO users (unique_id,user_name,user_password,user_email,user_profile,user_country,user_state,user_city,user_gender,forgotten_answer,log_in)
                                VALUES ({$ran_id}, '{$name}', '{$password}', '{$email}','{$new_img_name}', '{$country}', '{$state}', '{$city}', '{$gender}','{$answer}','{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($con, "SELECT * FROM users WHERE user_email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        $message = array(
                                                'status' => true,
                                                'title' => 'Registration Done',
                                                'message' => 'Registration successfully done!',
                                                
                                            );
                                        echo json_encode($message);
                                    }else{
                                        echo json_encode("This email address not Exist!");
                                    }
                                }else{
                                    echo json_encode("Something went wrong. Please try again!");
                                }
                            }
                        }else{
                            echo json_encode("Please upload an image file - jpeg, png, jpg");
                        }
                    }else{
                        echo json_encode("Please upload an image file - jpeg, png, jpg");
                    }
                }
            
        
    }else{
        echo json_encode("All input fields are required!");
    }
?>