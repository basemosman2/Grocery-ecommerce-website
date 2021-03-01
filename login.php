<?php
session_start();
if (isset($_SESSION["user"])) {
	header("location:./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include('head.php')
    ?>
    <link rel="stylesheet" href="./Style/signIn-style.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <?php include('header.php')?>
    <main class="log-main">
        <div class="log-container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form id="signin_form" class="sign-in-form form" onsubmit="return false" novalidation>
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="email" placeholder="Username" name="login_email" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="login_password" required />
                        </div>
                        <input type="submit" value="Login" class="btn solid" />
                    </form>


                    <form id="signup_form" class="sign-up-form form" onsubmit="return false">
                        <h2 class="title">Sign up</h2>
                        <ul class="signup_msg"></ul>
                        <div class="sign-up-form-container">
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Name" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-location-arrow"></i>
                                <input type="text" name="address" placeholder="Address" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-map-pin"></i>
                                <input type="text" name="postcode" placeholder="Postcode" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-mobile-alt"></i>
                                <input type="text" name="mobile" placeholder="Phone Number" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="repassword" placeholder="Confirm Password" required />
                            </div>
                        </div>

                        <input id="btn_submit" type="submit" name="signup_button" class="btn" value="Sign up" />


                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ?</h3>
                        <p>
                            With us shopping is diffrent, Sign Up to enjoy shopping.
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="img/log.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>
                            Good to see you again.
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                    <img src="img/register.svg" class="image" alt="" />
                </div>
            </div>
        </div>
    </main>


    <script src="./JScript/user-info.js"></script>
</body>

</html>