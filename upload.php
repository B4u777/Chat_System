<?php
session_start();
include("bridge/connection.php");
if(!isset($_SESSION['unique_id']))
{
  header("location:signin.php");
}
else{
?>
<!Doctype html>
<html>

<head>
    <title>Change Profile Picture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    <link rel="stylesheet" href="css/master_style.css">
	<link rel="stylesheet" href="css/_all-skins.css">


    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/demo.js"></script>
</head>
<style>
.card {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;

}

.card img {
    height: 200px;

}

.title {
    color: grey;
    font-size: 18px;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 9px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

#update_profile {
    position: absolute;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
    color: white;
    background-color: #000;

}

label {
    padding: 7px;
    display: table;
    color: #fff;

}

input[type="file"] {
    display: none;
}
</style>

<body>
  
 <?php include("include/header.php"); ?>

    <?php
        $user = $_SESSION['unique_id'];
		$get_user = " SELECT * from users where unique_id='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
		$user_profile = $row['user_profile'];

		 echo "    <div class='card'>
                   <img src='images/$user_profile'>
                   <h1>$user_name</h1>
                   
                   <form method='post' enctype='multipart/form-data'>
                   <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
                   <input type='file' name='u_image' size='60'>
                   </label>
                  

                   <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i>update profile</button>
                   </form>
                   </div><br><br>
                  
                   ";
                   if(isset($_POST['update']))
                    {

                    	$img_name = $_FILES['u_image']['name'];
                        $img_type = $_FILES['u_image']['type'];
                        $tmp_name = $_FILES['u_image']['tmp_name'];
                    
                        $img_explode = explode('.',$img_name);
                        $img_ext = end($img_explode);
    
                        $extensions = ["jpeg", "png", "jpg"];
                        if(in_array($img_ext, $extensions) === true){
                            $types = ["image/jpeg", "image/jpg", "image/png"];
                            if(in_array($img_type, $types) === true){
                                $time = time();
                                $new_img_name = $time.$img_name;
                                if(move_uploaded_file($tmp_name,"images/".$new_img_name)){

                                    $update="UPDATE users set user_profile='$new_img_name' where unique_id='$user'";
                                    $run =mysqli_query($con,$update);
                                    if($run){
                                        echo"<div class='alert alert-danger'>
                                        <strong>your password is changed</strong>
                                        </div>
                                        ";
                                     echo"<script>window.open('upload.php','_self')</script>";
                                    }
                                    
                                }else{
                                    echo "Something went wrong. Please try again!";
                                    }
                                
                            }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                            }
                        }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }

                    
                
                ?>
</body>

</html>
<?php } ?>