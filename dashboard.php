<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blogIt - Dashboard</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assests/favicon.svg">

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/76c40a5f57.js" crossorigin="anonymous"></script>
        <link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel=" stylesheet">

        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

        <!-- CSS -->
        <link href="./css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_create_blog.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_rich_textEditor.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/dashboard.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

        <meta name="theme-color" content="#ff3b1d">

        <!-- Resources -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>

    <body>

        <div class="dashboard_create_blog_image_dropzone_main_wrapper">
            <div class="dashboard_create_blog_image_dropzone_main_container flexc">
                <div class="dashboard_create_blog_image_dropzone_main_container_content flexc">
                    <div class="dropzone_main_container_icon">
                        <i class="fal fa-plus"></i>
                    </div>
                    <div class="dropzone_main_container_text">Drop your files here</div>
                </div>
            </div>
        </div>
        <div class="dashboard_wrapper flexc">
            <div class="dashboard_sidebar">
                <a href="index.php" class="siteLogo flexc"><img src="./assests/siteLogo_W.svg"></a>
                <div class="dashboard_menu_con">
                    <div class="dashboard_sidebar_menu flexc" dashborad_id="main"><i class='bx bx-grid-alt flexc'></i>Dashboard</div>
                    <div class="dashboard_sidebar_menu flexc" dashborad_id=""><i class='bx bx-line-chart'></i>Analytics</div>
                    <div class="dashboard_sidebar_menu flexc"><i class='bx bx-file flexc'></i>Blog</div>
                    <div class="dashboard_sidebar_menu flexc" dashborad_id="create_blog"><i class='bx bx-edit-alt'></i>Create</div>
                </div>
                <div class="dashboard_sidebar_bottom_menu_con">
                    <div class="dashboard_sidebar_bottom_menu flexc"><i class='bx bx-cog'></i>Settings</div>
                    <div class="dashboard_sidebar_bottom_menu flexc"><i class='bx bx-log-out bx-rotate-180'></i>Logout</div>
                </div>
            </div>

            <div class="dashboard_con">
                <div class="dashboard_navbar flexc">
                    <div class="flexc">
                        <div class="dashboard_navbar_menu menu_btn flexc">
                            <i class='bx bx-menu-alt-left'></i>
                        </div>
                        <div class="dashboard_searchbar flexc">
                            <div class="search_icon flexc">
                                <i class='bx bx-search'></i>
                            </div>
                            <input class="search_inp" type="text" placeholder="search">
                        </div>
                    </div>


                    <div class="flexc">
                        <div class="dashboard_navbar_menu nofication_con flexc">
                            <i class='bx bx-bell'></i>
                        </div>
                        <div class="user_profile">
                            <img src="./assests/author_photo.jpg" class="user_img">
                        </div>
                    </div>

                </div>

                <div class="dashboard_con_content">
                </div>



            </div>

        </div>
        </div>
    </body>

</html>
