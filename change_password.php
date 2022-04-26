<!DOCTYPE html>
<?php
session_start();
include("connection.php");
include("include/header.php");
if(!isset($_SESSION['unique_id']))
{
  header("location:signin.php");
}
else{
?>
<html>
<head><title>Account Settings</title></head>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    <link rel="stylesheet" href="css/master_style.css">
	<link rel="stylesheet" href="css/_all-skins.css"><script src="js/jquery.min.js"></script>
	  <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/fastclick.js"></script>
	<script src="js/template.js"></script>
	<script src="js/demo.js"></script>

</head>
<style>
body{ 
	overflow-x:hidden;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<?php
		$user=$_SESSION['unique_id'];
		$get_user="SELECT*from users where unique_id='$user'";
		$run_user=mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);

		$user_pass=$row['user_password'];
		?>
		<div class ="col-sm-8">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
							<td colspan="6" class ="active"><h2>Change Password</h2></td>
						</tr>
						<tr>
							<td style="font-weight:bold;">Current Password</td>
							<td>
							<input type="password" name="current_pass" id="mypass"class="form-control" required placeholder="current password"/>
						</tr>
					</td>
					<tr>
							<td style="font-weight:bold;">New Password</td>
							<td>
							<input type="password" name="u_pass1" id="mypass"class="form-control" required placeholder="confirm password"/>
						</tr>
					</td>
					<tr>
							<td style="font-weight:bold;">Confirm Password</td>
							<td>
							<input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="confirm password"/>
						</tr>
					</td>
					<tr align="center">
						<td colspan="6">
							<input type="submit" name="change" value="Change" class="btn btn-info"/>
						</td>
					</tr>

					</table>
				</form>
				<?php
				if(isset($_POST['change'])){
				$c_pass=$_POST['current_pass'];
				$pass1=$_POST['u_pass1'];
				$pass2=$_POST['u_pass2'];

				$user=$_SESSION['unique_id'];
				$get_user="SELECT* from users where unique_id='$user'";
				$run_user=mysqli_query($con,$get_user);
				$row=mysqli_fetch_array($run_user);
				$user_password=$row['user_password'];
				if($c_pass!==$user_password){
				echo"
				<div class='alert alert-danger'>
					<strong>your old password did not match </strong>
				</div>
				";

			}
            if($pass1!=$pass2){
            	echo"<div class='alert alert-danger'>
            	<strong>your new password did not match with confirm password!</strong>
            	</div>
            	";

            }
            if($pass1 < 9 AND $pass2 < 9){
            	echo"<div class='alert alert-danger'>
            	<strong>Use 9 or more than 9 characters</strong>
            	</div>
            	";
            }
            if($pass1==$pass2 AND $c_pass==$user_password){
            	$update_pass=mysqli_query($con,"UPDATE users SET user_password='$pass1' WHERE unique_id='$user'");
            	
            	echo"<div class='alert alert-danger'>
            	<strong>your password is changed</strong>
            	</div>
            	";
				
            }

        }
			?>
			</div>
		<div class="col-sm-2">
		</div>
</div>
</body>
</html>
</body>
<?php } ?>