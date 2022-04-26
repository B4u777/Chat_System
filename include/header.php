<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">
        <?php
			$user=$_SESSION['unique_id'];
			$get_user = "SELECT *from users where unique_id='$user'";
			$run_user = mysqli_query($con,$get_user);
			$row = mysqli_fetch_array($run_user);
            $user_name = $row['user_name'];
			 echo" <a class='navbar-brand' href='home.php?user_name=$user_name'>Back To Chat</a>
             ";
                   ?>
    </a>
    
</nav><br>