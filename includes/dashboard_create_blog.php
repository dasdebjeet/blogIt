<script src="./js/dashboard_create_blog.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="https://unpkg.com/maxlength-contenteditable@1.0.1/dist/maxlength-contenteditable.js"></script>

<div class="dashboard_create_blog_con">
    <div class="dashboard_create_blog_MainSec1 flexc">
        <div class="dashboard_create_blog_sec1">
            <div class="dashboard_create_blog_sec_title">
                Create blog
            </div>

            <div class="blog_inp_con blog_inp_title">
                <div class="blog_inp_label flexc">
                    <div class="label_text">Title</div>
                    <div class="label_icon flexc">
                        <i class="fal fa-check">
                            <div class="label_tooltip">character limit 50</div>
                        </i>
                    </div>
                </div>
                <div class="create_blog_inp_error_msg title_error_msg">Enter a title for your blog</div>
                <input class="blog_inp create_blog_title_inp" maxlength="50">
                <div class="blog_inp_charCount flexc" data_char_len="50">0</div>
            </div>

            <div class="blog_inp_con">
                <div class="blog_inp_label flexc">
                    <div class="label_text">Subtitle</div>
                    <div class="label_icon flexc">
                        <i class="fal fa-check">
                            <div class="label_tooltip">character limit 100</div>
                        </i>
                    </div>
                </div>
                <div class="create_blog_inp_error_msg subtitle_error_msg">Enter a Subtitle for your blog</div>
                <input class="blog_inp create_blog_subtitle_inp" maxlength="100">
                <div class="blog_inp_charCount flexc" data_char_len="100">0</div>
            </div>

            <?php require_once "dashboard_rich_textEditor.php"; ?>
        </div>

        <div class="dashboard_create_blog_sec2">
            <div class="dashboard_create_blog_sec2_sub_section1">
                <div class="dashboard_create_blog_sec_title">Add Info</div>

                <div class="blog_inp_con">
                    <div class="blog_inp_label flexc">
                        <div class="label_text">Catagory</div>
                        <div class="label_icon flexc">
                            <i class="fal fa-check">
                                <div class="label_tooltip">catagory limit 1</div>
                            </i>
                        </div>
                    </div>
                    <div class="create_blog_inp_error_msg catagory_error_msg">Enter a catagory for your blog</div>
                    <div class="create_blog_cata_con flexc" style="flex-wrap:wrap">
                        <input class="create_blog_cata_inp" data_content="blog_catagories" type="text">
                    </div>
                    <div class="blog_inp_charCount flexc" data_cata_len="1">0</div>
                </div>

                <div class="blog_inp_con">
                    <div class="blog_inp_label flexc">
                        <div class="label_text">Tags</div>
                        <div class="label_icon flexc">
                            <i class="fal fa-check">
                                <div class="label_tooltip">tag limit 10</div>
                            </i>
                        </div>
                    </div>
                    <div class="create_blog_inp_error_msg tags_error_msg">Enter tags for your blog</div>
                    <div class="create_blog_tags_con flexc" style="flex-wrap:wrap">
                        <input class="create_blog_tags_inp" data_content="blog_tags" type="text">
                    </div>
                    <div class="blog_inp_charCount flexc" data_tag_len="10">0</div>
                </div>
            </div>

            <div class="dashboard_create_blog_sec2_sub_section2">
                <div class="dashboard_create_blog_sec_title" style="padding-bottom: 0">Add Thumbnail</div>
                <div class="create_blog_inp_error_msg tags_error_msg thumbnail_error_msg" style="padding: 0px 20px">Upload a thumbnail for your blog</div>

                <div class="dashboard_create_blog_image_upload_con">
                    <div class="dashboard_create_blog_image_dropzone flexc">
                        <div class="dashboard_create_blog_image_dropzone_overlay flexc"></div>
                        <form class="dashboard_create_blog_image_dropzone_content mainImg_upload_form flexc">
                            <input class="dashboard_create_blog_mainImage_inp" type="file" name="mainImg_file" hidden>
                            <div class="blog_image_dropzone_icon flexc"><i class="fal fa-cloud-upload"></i></div>
                            <div class="blog_image_dropzone_text">Drag file here or <span>browse</span></div>
                        </form>
                    </div>

                    <div class="blog_image_progress_preveiw_con flexc">
                        <div class="blog_image_progress_preveiw flexc"></div>
                    </div>

                </div>
            </div>

            <div class="dashboard_create_blog_sec2_sub_section3 flexc">
                <button class="blog_create_mainBtn" btn_val="draft">Draft</button>
                <div class="blog_create_mainBtn_partition flexc">or</div>
                <button class="blog_create_mainBtn blog_create_submitBtn" btn_val="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
