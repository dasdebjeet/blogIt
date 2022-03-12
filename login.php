<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blogIt - Login to blogIt</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assests/favicon.svg">

        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/76c40a5f57.js" crossorigin="anonymous"></script>
        <link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel=" stylesheet">

        <!-- CSS -->
        <link href="./css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/login_signup.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">

        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/login_signup.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    </head>

    <body>
        <div class="login_wrapper flexc">
            <div class="login_poster flexc">
                <div class="siteTitle"><img src="./assests/siteTitle.svg"></div>
                <!-- <p class="qoute"><i class="fas fa-quote-left"></i> Success is normally found in pile of mistakes <i class="fas fa-quote-right"></i></p> -->
            </div>
            <div class="login_form_con">
                <h2 class="login_title">Login to continue</h2>
                <p class="login_error"></p>
                <form class="login_form" autocomplete="off">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button class="login_submit" type="Submit">Login</button>
                </form>
                <div style="text-align:center"><a href="reset_password.php" class="forgot_pass">Forgot your pasword?</a></div>
                <div class="member_loginSignup" style="text-align:center">Not a member yet? <a href="signup.php" class="toggle_btn" style="color:var(--themec)">Signup Now</a></div>
            </div>
        </div>

    </body>

</html>
