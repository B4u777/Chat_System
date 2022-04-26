<?php
session_start();
include("bridge/connection.php");
include("include/header.php");

if(!isset($_SESSION['unique_id']))
{
  header('location:signin.php');
}
else{
?>
<!DOCTYPE html>
<html>

<head>
    <title>Account Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    <link rel="stylesheet" href="css/master_style.css">
    <link rel="stylesheet" href="css/_all-skins.css">
</head>

<body>
    <div class="row">
        <div class="col-md-2">
        </div>
        <?php
			$user=$_SESSION['unique_id'];
			$get_user="SELECT *from users where unique_id='$user'";
			$run_user=mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);

			$user_name=$row['user_name'];
			$user_password=$row['user_password'];
			$user_email=$row['user_email'];
			$user_profile=$row['user_profile'];
			$user_country=$row['user_country'];
			$user_gender=$row['user_gender'];
			?>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td colspan="6" class="active">
                            <h2>Change Account Setting</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Change Your Username</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required
                                value="<?php echo $user_name;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Change Your Profile</td>
                        <td>
                            <div class='card'>
                             <?php echo   "<img src='images/$user_profile' width=300px height=250px>";?>
                                <form method='post' enctype='multipart/form-data'>
                                    <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select
                                        Profile
                                        <input type='file' name='u_image' size='60'>
                                    </label>


                                    <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i>update profile
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Change Your Email</td>
                        <td>
                            <input type="email" name="u_email" class="form-control" required
                                value=" <?php echo $user_email;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Gender</td>
                        <td>
                            <select class="form-control" name="u_gender">
                                <option diselect><?php echo $user_gender;?></option>
                                <option>female</option>
                                <option>other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <button class="btn btn-success" name="update">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                 if(isset($_POST['update']))
                 {
                 	$user_name = htmlentities($_POST['u_name']);
                 	$email = htmlentities($_POST['u_email']);
                 	$u_gender = htmlentities($_POST['u_gender']);

                    $update = "UPDATE users set user_name='$user_name',user_email='$email',user_gender='$u_gender' where unique_id='$user'";

                    $run=mysqli_query($con,$update);

                    if($run){
                      echo"<div class='alert alert-danger'>
                      <strong>your account  is update.</strong>
                      </div>
                      ";
                    }
                 }

                 ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/template.js"></script>
    <script src="js/demo.js"></script>
                
</body>

</html>
<?php }?>