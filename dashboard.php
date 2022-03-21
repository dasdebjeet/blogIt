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
        <div class="dashboard_modal">

            <div class="dashboard_modal_main_blog_preveiw_wrap">
                <div class="dashboard_modal_main_blog_preveiw_wrap_title">Blog Preveiw</div>

                <div class="dashboard_modal_main_blog_preveiw_con">
                    <div class="dashboard_modal_main_blog_preveiw_con_closeBtn flexc"><i class="fal fa-times" aria-hidden="true"></i></div>
                    <div class="dashboard_modal_main_blog_preveiw_img_con" style="background-image:url('./assests/lastest_feed.jpg')">
                        <div class="dashboard_modal_main_blog_preveiw_catagory_tags">
                            <span class="blog_preveiw_catagory_format">#Technology</span>
                            <span class="blog_preveiw_tags_format">#Tech</span>
                            <span class="blog_preveiw_tags_format">#Data Center</span>
                            <span class="blog_preveiw_tags_format">#Big Tech</span>
                            <span class="blog_preveiw_tags_format">#Giants</span>
                        </div>
                    </div>
                    <div class="dashboard_modal_main_blog_preveiw_text_con">
                        <div class="dashboard_modal_main_blog_preveiw_title">Lorem Ipsum is simply dummy text of the printing</div>
                        <div class="dashboard_modal_main_blog_preveiw_subtitle">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown print</div>

                        <div class="dashboard_modal_main_blog_preveiw_content">Morbi mattis tristique odio eget placerat. Donec placerat sed orci sit amet accumsan. Morbi vel dignissim nunc. Praesent sit amet efficitur eros. Phasellus eu est nec mauris varius ultricies. Quisque laoreet sagittis felis, id luctus nulla placerat in. Ut placerat eu diam in egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque efficitur metus et nisi gravida, sit amet auctor velit vestibulum. Quisque tellus metus, venenatis sit amet ullamcorper et, auctor eu nisl. Pellentesque consectetur sapien vel libero hendrerit pharetra. Vivamus accumsan id diam in rutrum.</div>

                        <div class="dashboard_modal_main_blog_preveiw_author">by Debjeet Das</div>
                        <div class="dashboard_modal_main_blog_preveiw_pubDate">published on 8th Feb 2022</div>
                    </div>
                </div>

                <div class="dashboard_modal_main_blog_preveiw_btn_con">
                    <button class="dashboard_modal_main_blog_preveiw_btn blog_preveiw_cancelbBtn">Cancel</button>
                    <button class="dashboard_modal_main_blog_preveiw_btn blog_preveiw_publishBtn">Publish & Exit</button>
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
    </body>

</html>
