<?php 
  session_start();
  include "bridge/connection.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include "header.php"; ?>
<body style="background-image: url(images/image5.jpeg);background-size: cover;">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
          $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: home.php");
          }
        ?>
        <a href="home.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
        <img src="images/<?php echo $row['user_profile']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['user_name']?></span>
          <p><?php echo $row['log_in']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="msg_content" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fa fa-paper-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/chat.js"></script>

</body>
</html>
