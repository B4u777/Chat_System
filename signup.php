<!DOCTYPE html>
<html>

<head>
    <title>Create New Account</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>
    <div class="signup-form">
        <form action="" method="post" id="formId" name="myform" autocomplete="off">
            <div class="form-header">
                <h2>Sign up</h2>
                <p>Fill out this form and start chating with your friends.</p>
            </div>
            <div class="error-text"></div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your name"
                    autocompelete="off">
                <span class="error_form" id="name_error_message"></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password"
                    placeholder="Enter your password" autocompelete="off">
                <i class="fa fa-eye"></i>
                <span class="error_form" id="password_error_message"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="user_email" name="user_email"
                    placeholder="Enter your email" autocompelete="off">
                <span class="error_form" id="email_error_message"></span>
            </div>
            <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="user_country" id="country">
                    <option value="0">select a Country</option>

                </select>
                <span class="error_form" id="country_error_message"></span>

            </div>
            <div class="form-group">
                <label>State</label>
                <select class="form-control" name="user_state" id="state">
                    <option value="0">select a state</option>


                </select>
                <span class="error_form" id="state_error_message"></span>

            </div>
            <div class="form-group">
                <label>City</label>
                <select class="form-control" name="user_city" id="city">
                    <option value="0">select a city</option>

                </select>
                <span class="error_form" id="city_error_message"></span>

            </div>

            <div class="form-group">
                <label>Select Your Gender </label>

                <div class="form-check">
                    <div class="radio">
                        <label for="radio1" class="form-check-label ">
                            <input type="radio" id="radio1" name="radios" value="option1"
                                class="form-check-input">Option 1
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radio2" class="form-check-label ">
                            <input type="radio" id="radio2" name="radios" value="option2"
                                class="form-check-input">Option 2
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radio3" class="form-check-label ">
                            <input type="radio" id="radio3" name="radios" value="option3"
                                class="form-check-input">Option 3
                        </label>
                    </div>
                </div>
                <span class="error_form" id="gender_error_message"></span>
            </div>

            <div class="form-group">
                <label>Give Best Friend name</label>
                <input type="text" class="form-control" id="forgotten" name="forgotten_answer"
                    placeholder="Enter Best Friend Name" autocompelete="off">
                <span class="error_form" id="forgotten_error_message"></span>

            </div>
            <div class="form-group">
                <label>Select Image</label>
                <input type="file" name="user_profile" id="user_profile"
                    accept="image/x-png,image/gif,image/jpeg,image/jpg">
                <span class="error_form" id="profile_error_message"></span>

            </div>


            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" name="policy" id="policy">I accept the<a
                        href="#">Terms
                        of Use</a>
                    &amp; <a href="#">Privacy policy</a>
                </label><br>
                <span class="error_form" id="policy_error_message"></span>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Signup</button>
            </div>

            <div class="text-center small" style="color: #674288;">Already have an account?<a href="signin.php">Signin
                    here</a></div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/hide-show.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>
    <script src="js/home.js"></script>




</body>

</html>