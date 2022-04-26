<!DOCTYPE HTML>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Comapatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

    <link rel="icon" href="images/favicon.png">
    
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body>
    <div class="container">
    <div class="signin-form">
        <form action="#" method="post" id="formId" enctype="multipart/form-data" autocomplete="off">
            <div class="form-header">
                <h2>SIGN IN </h2>
                <p>LOG IN TO MY CHAT</p>
            </div>
            <div class="error-text"></div>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" class="form-control" name="email" placeholder="ENTER YOUR EMAIL" autocompelete="off"
                    required>
                </input>
            </div>
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control" name="pass" placeholder="ENTER YOUR PASSWORD"
                    autocompelete="OFF" required>
                    <i class="fa fa-eye"></i>
            </div>
            <div class="small">forgot password?<a href="forgot_pass.php">CLICK HERE</a></div><br>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block btn-lg sub" name="submit" value="Sign in">
               
            </div>

            <br>
            <div class="text-center small" style="color: #67428;">Dont have an account? <a href="signup.php">Create
                    one</a>
            </div>
        </form>
    </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/hide-show.js"></script>
    <script src="js/signin.js"></script>
</body>

</html>