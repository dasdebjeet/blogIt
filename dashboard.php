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
        <link href="./css/dashboard_blog.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_create_blog.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_rich_textEditor.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
        <link href="./css/dashboard_user_management.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

        <link href="./css/mquery.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">


        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


        <script src="./js/cookie_header.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
        <script src="./js/dashboard.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>

        <meta name="theme-color" content="#ff3b1d">

        <!-- Resources -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>

    <body>
        <div class="dashboard_modal flexc">
            <div class="blog_mini_image_upload_wrap flexc">
                <div class="blog_mini_image_upload_title">Add Images</div>
                <div class="blog_mini_image_upload_err_msg">Upload a image to be inserted in your blog</div>

                <div class="blog_mini_image_upload_con">

                    <div class="blog_mini_image_upload_dropzone_overlay flexc"></div>
                    <form class="blog_mini_image_upload_dropzone flexc">
                        <input class="blog_mini_images_inp" type="file" name="blog_content_mini_img_file" multiple hidden>
                        <div class="blog_mini_image_dropzone_icon flexc"><i class="fal fa-cloud-upload"></i></div>
                        <div class="blog_mini_image_dropzone_text">Drag files here or <span>browse</span></div>
                    </form>

                    <div class="blog_mini_image_preveiw_wrap"></div>
                </div>

                <div class="blog_mini_image_upload_btn_con">
                    <button class="blog_mini_image_upload_btn miniImg_cancelBtn">Cancel</button>
                    <button class="blog_mini_image_upload_btn miniImg_uplBtn">Upload images</button>
                    <button class="blog_mini_image_upload_btn miniImg_intBtn">Insert images</button>
                </div>

            </div>

            <div class="dashboard_modal_main_blog_preveiw_wrap">
                <div class="dashboard_modal_main_blog_preveiw_wrap_title">Blog Preveiw</div>

                <div class="dashboard_modal_main_blog_preveiw_con">
                    <div class="dashboard_modal_main_blog_preveiw_con_closeBtn flexc"><i class="fal fa-times" aria-hidden="true"></i></div>
                    <div class="dashboard_modal_main_blog_preveiw_img_con" style="background-image:url('./assests/lastest_feed.jpg')">
                        <div class="dashboard_modal_main_blog_preveiw_catagory_tags flexc">
                            <!-- <span class="blog_preveiw_catagory_format">#Technology</span>
                            <span class="blog_preveiw_tags_format">#Tech</span>
                            <span class="blog_preveiw_tags_format">#Data Center</span> -->
                        </div>
                    </div>
                    <div class="dashboard_modal_main_blog_preveiw_text_con">
                        <div class="dashboard_modal_main_blog_preveiw_title">Lorem Ipsum is simply dummy text of the printing</div>
                        <div class="dashboard_modal_main_blog_preveiw_subtitle">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown print</div>

                        <div class="dashboard_modal_main_blog_preveiw_content">Morbi mattis tristique odio eget placerat. Donec placerat sed orci sit amet accumsan. Morbi vel dignissim nunc. Praesent sit amet efficitur eros. Phasellus eu est nec mauris varius ultricies. Quisque laoreet sagittis felis, id luctus nulla placerat in. Ut placerat eu diam in egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque efficitur metus et nisi gravida, sit amet auctor velit vestibulum. Quisque tellus metus, venenatis sit amet ullamcorper et, auctor eu nisl. Pellentesque consectetur sapien vel libero hendrerit pharetra. Vivamus accumsan id diam in rutrum.</div>

                        <!-- <div class="dashboard_modal_main_blog_preveiw_author">by Debjeet Das</div>
                        <div class="dashboard_modal_main_blog_preveiw_pubDate">published on 8th Feb 2022</div> -->
                    </div>
                </div>

                <div class="dashboard_modal_main_blog_preveiw_btn_con">
                    <button class="dashboard_modal_main_blog_preveiw_btn blog_preveiw_cancelbBtn">Cancel</button>
                    <button class="dashboard_modal_main_blog_preveiw_btn blog_preveiw_submitBtn"><span class="blog_preveiw_submitBtn_inText">Final Submit</span> & Exit</button>
                </div>

            </div>

            <div class="dashboard_userMgnt_userProfile_modal_wrap">
                <div class="dashboard_userMgnt_userProfile_modal_con">

                    <div class="dashboard_userMgnt_userProfile_modal_closeBtn flexc"><i class="fal fa-times" aria-hidden="true"></i></div>

                    <div class="userProfile_cover">
                        <div class="userProfile_details_con flexc">
                            <div class="userProfile_img_con flexc">
                                <img class="userProfile_img" src="./assests/users_img/deb.jpg">
                            </div>
                            <div class="userProfile_text">
                                <div class="userProfile_text_name">Debjeet Das</div>
                                <div class="userProfile_text_role flexc">Admin</div>
                            </div>
                            <div class="userProfile_blog_stats">15k Blogs Published</div>

                        </div>

                    </div>

                    <div class="userProfile_info_con">
                        <div class="userProfile_info_head flexc">
                            <div class="userProfile_info_head_title info_head_title_active">About</div>
                            <div class="userProfile_info_head_title">Details</div>
                            <div class="userProfile_info_head_title">Contact</div>
                        </div>
                        <div class="userProfile_info_wrap flexc">
                            <div class="userProfile_info info_about">
                                Hey! I am a Developer from INDIA, currently doing my BTech in Computer Science & Engineering.
                                <br>
                                <br>
                                I want to help and contribute to the world by being a developer... 🥰
                                <br><br><br><br>
                                <span><i class="fal fa-map-marker-alt"></i> Kolkata, India</span>
                            </div>
                            <div class="userProfile_info info_details">

                                <div class="info_details_con flexc">
                                    <div class="info_details_subSec info_details_sec1">
                                        <div class="info_details_sec1_userAnalytics_con">

                                            <div class="info_details_sec1_userAnalytics userAnalytics_publishedCon">
                                                <div class="sec1_userAnalytics_title">published</div>
                                                <div class="sec1_userAnalytics_count_wrap flexc">
                                                    <div class="sec1_userAnalytics_count_icn"><i class="fal fa-file-signature"></i></div>
                                                    <div class="sec1_userAnalytics_count_val">15</div>
                                                </div>
                                            </div>

                                            <div class="info_details_sec1_userAnalytics userAnalytics_draftCon">
                                                <div class="sec1_userAnalytics_title">Draft</div>
                                                <div class="sec1_userAnalytics_count_wrap flexc">
                                                    <div class="sec1_userAnalytics_count_icn"><i class="fal fa-file-exclamation"></i></div>
                                                    <div class="sec1_userAnalytics_count_val">3</div>
                                                </div>
                                            </div>

                                            <div class="info_details_sec1_userAnalytics userAnalytics_viewCon">
                                                <div class="sec1_userAnalytics_title">blog Veiws</div>
                                                <div class="sec1_userAnalytics_count_wrap flexc">
                                                    <div class="sec1_userAnalytics_count_icn"><i class="fal fa-globe-asia"></i></div>
                                                    <div class="sec1_userAnalytics_count_val">86</div>
                                                </div>
                                            </div>

                                            <div class="info_details_sec1_userAnalytics userAnalytics_reportCon">
                                                <div class="sec1_userAnalytics_title">report</div>
                                                <div class="sec1_userAnalytics_count_wrap flexc">
                                                    <div class="sec1_userAnalytics_count_icn"><i class="fal fa-exclamation-circle"></i></div>
                                                    <div class="sec1_userAnalytics_count_val">0</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="info_details_subSec info_details_sec2">
                                        <div class="info_details_sec2_userMiniBlog_con">
                                            <div class="info_details_sec2_userMiniBlog_wrap">
                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>

                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>


                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>

                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>

                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>

                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>
                                                <div class="sec2_userMiniBlog flexc">
                                                    <div class="sec2_userMiniBlog_thumbnail">
                                                        <img src="./assests/blog_main_img/mainBlog_Img_6bc82dad7a408d9098354590090aa2b001ae341f.jpg" class="sec2_userMiniBlog_thumbnail_img">
                                                    </div>
                                                    <div class="sec2_userMiniBlog_content_con">
                                                        <div class="sec2_userMiniBlog_title">Bonuses for New Hao’s Special Works Race Series</div>
                                                        <div class="sec2_userMiniBlog_content_date"> 21 Jun 2022 ● Last month </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="userProfile_info info_contact">
                                <div class="info_contact_label">EMAIL</div>
                                <div class="info_contact_text contact_text_email">debjeet194@gmail.com</div>
                                <div class="info_contact_label">WEBSITE</div>
                                <div class="info_contact_text contact_text_website">https://dasdebjeet.github.io</div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div class="dashboard_wrapper flexc">
            <div class="dashboard_mobile_bottom_navbar flexc">
                <ul class="dashboard_mobile_bottom_navbar_menu_con flexc">
                    <div class="dashboard_mobile_bottom_navbar_menu flexc" dashborad_id="">
                        <div class="dashboard_mobile_bottom_navbar_menu_icon flexc"><i class='bx bx-line-chart'></i></div>
                        <div class="dashboard_mobile_bottom_navbar_menu_name flexc">Analytics</div>
                    </div>

                    <div class="dashboard_mobile_bottom_navbar_menu flexc" dashborad_id="blog">
                        <div class="dashboard_mobile_bottom_navbar_menu_icon flexc"><i class='bx bx-file flexc'></i></div>
                        <div class="dashboard_mobile_bottom_navbar_menu_name flexc">Blog</div>
                    </div>

                    <div class="dashboard_mobile_bottom_navbar_menu  mobile_bottom_navbar_menu_active flexc" dashborad_id="main">
                        <div class="dashboard_mobile_bottom_navbar_menu_icon flexc"><i class='bx bx-grid-alt flexc'></i></div>
                        <div class="dashboard_mobile_bottom_navbar_menu_name flexc">Dashboard</div>
                    </div>

                    <div class="dashboard_mobile_bottom_navbar_menu flexc" dashborad_id="create_blog">
                        <div class="dashboard_mobile_bottom_navbar_menu_icon flexc"><i class='bx bx-edit-alt'></i></div>
                        <div class="dashboard_mobile_bottom_navbar_menu_name flexc">Create</div>
                    </div>
                    <div class="dashboard_mobile_bottom_navbar_menu flexc" dashborad_id="">
                        <div class="dashboard_mobile_bottom_navbar_menu_icon flexc"><i class='bx bx-server'></i></div>
                        <div class="dashboard_mobile_bottom_navbar_menu_name flexc">Management</div>
                    </div>
                </ul>
            </div>


            <div class="dashboard_dummy_sidebar"></div>


            <div class="dashboard_sidebar">
                <a href="index.php" class="siteLogo flexc"><img src="./assests/siteLogo_W.svg"></a>
                <div class="dashboard_menu_con">
                    <div class="dashboard_sidebar_menu flexc" dashborad_id="main"><i class='bx bx-grid-alt flexc'></i>Dashboard</div>
                    <div class="dashboard_sidebar_menu flexc" dashborad_id=""><i class='bx bx-line-chart'></i>Analytics</div>
                    <div class="dashboard_sidebar_menu flexc" dashborad_id="blog"><i class='bx bx-file'></i>Blog</div>
                    <div class="dashboard_sidebar_menu flexc" dashborad_id="create_blog"><i class='bx bx-edit-alt'></i>Create</div>
                    <div class="dashboard_sidebar_menu dashboard_sidebar_menu_mangt flexc" dashborad_id="">
                        <i class='bx bx-server'></i>Management
                        <div class="dashboard_sidebar_menu_mangtDropMenu">
                            <div class="dashboard_sidebar_menu_mangtMenu"><i class='bx bx-user'></i>Users</div>
                            <div class="dashboard_sidebar_menu_mangtMenu"><i class='bx bx-file'></i>Others Blog</div>
                        </div>
                    </div>
                </div>
                <div class="dashboard_sidebar_bottom_menu_con">
                    <div class="dashboard_sidebar_bottom_menu flexc"><i class='bx bx-cog'></i>Settings</div>
                    <div class="dashboard_sidebar_bottom_menu flexc"><i class='bx bx-log-out bx-rotate-180'></i>Logout</div>
                </div>
            </div>

            <div class="dashboard_con">
                <div class="dashboard_navbar flexc">
                    <div class="flexc">
                        <a href="index.php" class="dashboard_navbar_menu siteLogo flexc">
                            <img src="./assests/siteLogo_W.svg">
                        </a>

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
                        <div class="dashboard_user_profile">
                            <img src="./assests/users_img/default_profile_img.png" class="user_img">
                        </div>
                    </div>

                </div>

                <div class="dashboard_con_content">
                </div>

                <div class="dashboard_contentSpace_forBottom_navbar"></div>
            </div>

        </div>
    </body>

</html>
