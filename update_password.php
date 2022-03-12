<?php
    echo "<script> var token = '".$_GET['token']."'</script>";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blogIt - Update Password</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assests/favicon.svg">

        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/76c40a5f57.js" crossorigin="anonymous"></script>
        <link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel=" stylesheet">

        <!-- CSS -->
        <link href="./css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/update_password_page.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">

        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/update_password.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    </head>

    <body>
        <div class="nPass_link_not_found_con flexc">
            <img src="./assests/page_not_found.png">
            <p style="margin-top:50px">Reset password link has expired.</p>
            <p style="margin-top:5px">Go to <a href="">home page</a></p>
            <!-- <a href="">HOME</a> -->
        </div>
        <div class="update_password_wrap flexc">

            <div class="update_password_modal_con flexc">
                <div class="update_password_modal">
                    <h2>Password Updated</h2>
                    <p style="font-weight:600">Your password have been succesfully updated.</p>
                    <p>Please go to the <a href="">login page</a> to login into the site.</p>
                    <!-- <p style="margin-bottom:5px">If you don't receive an email from us, please check your spam folder or</p>
                    <a href="">contact customer support.</a> -->
                    <p style="margin-top:50px;font-weight:600">The blogIt team</p>
                    <div class="update_password_modal_closeBtn flexc">Close</div>
                </div>
            </div>

            <div class="update_password_con flexc">
                <div class="update_password_poster flexc">
                    <div class="siteTitle"><img src="./assests/siteTitle.svg"></div>
                    <!-- <p class="qoute"><i class="fas fa-quote-left"></i> Success is normally found in pile of mistakes <i class="fas fa-quote-right"></i></p> -->
                </div>
                <div class="update_password_form_con">
                    <h2 class="update_password_form_title">Update Password</h2>
                    <p class="update_password_form_text">Set up your new password.</p>
                    <p class="update_password_form_error"></p>
                    <form class="update_password_form" autocomplete="off">
                        <input class="update_password_form_inp n_pass" type="password" name="new_password" placeholder="New password" min="8" max="20" required>
                        <input class="update_password_form_inp c_pass" type="password" name="confirm_password" placeholder="Comfirm Password" min="8" max="20" required>
                        <button class="updatePass_submit" type="submit">Save changes</button>
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>
