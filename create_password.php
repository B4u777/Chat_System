<!DOCTYPE HTML>
<html>

<head>
    <tittle>LOGIN TO YOUR ACCOUNT</tittle>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Comapatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body>
    <div class="signin-form">
        <form action="" id="formId" method="post">
            <div class="form-header">
                <h2>Create New Password</h2>
                <p> MY CHAT</p>
            </div>
            <div class="error-text"></div>

            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="ENTER YOUR EMAIL"
                    autocompelete="off" required>
            </div>
            <div class="form-group">
                <label> Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="CONFIRM PASSWORD"
                    autocompelete="OFF" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>

            </div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/change_pass.js"></script>
</body>

</html>