<!DOCTYPE HTML>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Comapatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1">
	<link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
	<link rel="stylesheet" href="css/sweetalert.css">

</head>

<body>
    <div class="signin-form">
	    

        <form action="" id="formId" method="post">
            <div class="form-header">
                <h2>Forgot Password </h2>
                <p>MY CHAT</p>
            </div>
			<div class="error-text"></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="ENTER YOUR EMAIL" autocompelete="off"
                    required>
                </input>
            </div>
            <div class="form-group">
                <label>Bestfriend name</label>
                <input type="text" class="form-control" id="forgot" name="bf" placeholder="SOMEONE....." autocompelete="OFF"
                    required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
            </div>
        </form>
        <br>
        <div class="text-center small" style="color: #67428;">Back To SignIn? <a href="signin.php">Click Here</a>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/forgot.js"></script>
</body>

</html>