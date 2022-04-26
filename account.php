<?php
session_start();
include("connection.php");
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fastclick.js"></script>




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
                    <tr align="center">
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
                        <td></td>
                        <td><a class="btn btn-default" style="text-decoration:none;font-size: 15px;"
                                href="upload.php"><i class="fa fa-user" aria-hidden="true"></i>Change Profile</a></td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Change Your Email</td>
                        <td>
                            <input type="email" name="u_email" class="form-control" required
                                value=" <?php echo $user_email;?>" />
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;">Country</td>
                        <td>
                            <select class="form-control" name="u_country">
                                <option><?php echo $user_country;?></option>
                                <option>USA</option>
                                <option>UK</option>
                                <option>AUSTRALIA</option>
                                <option>UAE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Gender</td>
                        <td>
                            <select class="form-control" name="u_gender">
                                <option><?php echo $user_gender;?></option>
                                <option>male</option>
                                <option>female</option>

                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold">Forgotten Password</td>
                        <td>

                            <button type="button" class="btn btn-default" data-toggle="modal"
                                data-target="#myModal">Forgotten Password</button>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                                                <strong> who is your school best friend?</strong>
                                                <textarea class="form-control" cols="83" rows="4" name="content"
                                                    placeholder="someone"></textarea><br>
                                                <input class="btn btn-default" type="submit" name="sub" value="submit"
                                                    style="width:100px;"><br><br>
                                                <pre>Answer the above question we will ask you this question if you forgot your<br>Password.</pre>
                                                <br><br>
                                            </form>


                                            <?php
                         						if(isset($_POST['sub'])){
                         							$bfn=htmlentities($_POST['content']);

                         							if($bfn ==''){
                         								echo"<script>alert('please enter something.')</script>";
                         								echo"<script>window.open('account_settings.php','_self')</script>";
                         								exit();

                         							}
                         							else{
                         								$update="UPDATE users set forgotten_answer='$bfn'where user_email='$user'";

                         								$run=mysqli_query($con,$update);

                         								if($run){
                         									echo "<script>alert('working....')</script>";
                         									echo "<script>window.open('account_settings.php','_self')</script>";
                         								}else{
                         									echo "<script>alert('error while updatimg information')</script>";
                         									echo "<script>window.open('account_settings.php','_self')</script>";

                         							}

                         						} 
                         					}
                         					?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </tr>
                    <tr>
                        <td></td>
                        <td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;"
                                href="change_password.php">Change
                                Password</a><i class="fa fa-key fa-fw" aria-hidden="true"></i>
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" value="Update" name="update" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                 if(isset($_POST['update']))
                 {
                 	$user_name = htmlentities($_POST['u_name']);
                 	$email = htmlentities($_POST['u_email']);
                 	$u_country = htmlentities($_POST['u_country']);
                 	$u_gender = htmlentities($_POST['u_gender']);

                    $update = "UPDATE users set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";

                    $run=mysqli_query($con,$update);

                    if($run){
                    	echo"<script>window.open('account_settings.php','_self')</script>";
                    }
                 }

                 ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</body>

</html>
<?php }?>