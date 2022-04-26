<?php 
  session_start();
  include "bridge/connection.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: signin.php");
  }
?>
<?php include_once "header.php"; ?>
<body style="	background-image: url(images/image2.jpg);	background-size: cover;">
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="images/<?php echo $row['user_profile']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['user_name']?></span>
            <p><?php echo $row['log_in']; ?></p>
          </div>
        </div>
        <a href="account_settings.php?unique_id=<?php echo $row['unique_id']; ?>" style="position: relative;left: 38px;"><i class="fa fa-cog fa-spin" style="color:black;" aria-hidden="true"></i></a>
        <a href="logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout" ><i class="fa fa-power-off"></i> Logout</a>
      </header>
      <div class="search" id="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" id="enter" placeholder="Enter name to search...">
        <button class="arc"><i class="fa fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/user.js"></script>

</body>
</html>
