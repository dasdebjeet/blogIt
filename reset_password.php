<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blogIt - Forgot Password</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assests/favicon.svg">

        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/76c40a5f57.js" crossorigin="anonymous"></script>
        <link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel=" stylesheet">

        <!-- CSS -->
        <link href="./css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/forgot_password_page.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">

        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/resetPassword_page.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    </head>

    <body>
        <div class="forgot_password_wrap flexc">
            <div class="forgot_password_modal_con flexc">
                <div class="forgot_password_modal">
                    <h2>Forgot your password</h2>
                    <p style="font-weight:600">We have sent you a verification mail.</p>
                    <p>Please verify your account via the link in the mail and reset your password.</p>
                    <p style="margin-bottom:5px">If you don't receive an email from us, please check your spam folder or</p>
                    <a href="">contact customer support.</a>
                    <p style="margin-top:50px;font-weight:600">The blogIt team</p>
                    <div class="forgot_password_modal_closeBtn flexc">Close</div>
                </div>
            </div>

            <div class="forgot_password_con flexc">
                <div class="forgot_password_poster flexc">
                    <div class="siteTitle"><img src="./assests/siteTitle.svg" style="width:100%"></div>
                    <!-- <p class="qoute"><i class="fas fa-quote-left"></i> Success is normally found in pile of mistakes <i class="fas fa-quote-right"></i></p> -->
                </div>
                <div class="forgot_password_form_con">
                    <h2 class="forgot_password_form_title">Reset Password</h2>
                    <p class="forgot_password_form_text">Enter your email address and we will send you a link to reset your password.</p>
                    <form class="forgot_password_form" autocomplete="off">
                        <input class="forgot_password_form_inp" type="email" name="email" placeholder="E-mail">
                        <p class="forgot_password_form_error"></p>

                        <button class="forgotPass_submit" type="submit">Forgot Password</button>
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>
