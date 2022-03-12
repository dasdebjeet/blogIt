<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blogIt - Best blogging website</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assests/favicon.svg">

        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/76c40a5f57.js" crossorigin="anonymous"></script>
        <link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel=" stylesheet">

        <!-- CSS -->
        <link href="./css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/sideBar_mobile_modal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/navbar_menu_modal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/loginSignup_modal.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/navbar.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/header.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/catagories.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">
        <link href="./css/blog_posts_preveiw.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">


        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel=" stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/cookie_header.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/logout.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/navbar_menu_modal.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/sideBar_mobile.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/loginSignup_modal.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/navbar.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/catagories.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

        <meta name="theme-color" content="#ff3b1d">
    </head>

    <body>
        <div class="main_page_container">
            <?php
                require "./includes/sideBar_mobile.php";
                require "./includes/navbar_menu_modal.php";
                require "./includes/loginSignup_modal.php";
                require "./includes/navbar.php";
                require "./includes/header.php";
                require "./includes/catagories.php";
                require "./includes/blog_posts_preveiw.php";
            ?>
        </div>

    </body>

</html>
