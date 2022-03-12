<script src="./js/dashboard_create_blog.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="https://unpkg.com/maxlength-contenteditable@1.0.1/dist/maxlength-contenteditable.js"></script>

<div class="dashboard_create_blog_con flexc">
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
            <!-- <div class="blog_inp" id="blog_inp1" maxlength="50" contenteditable="true" data-max-length="10"></div> -->
            <input class="blog_inp" maxlength="50">
            <div class="blog_inp_charCount flexc" data_char_len="50">50</div>
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
            <!-- <div class="blog_inp" contenteditable="true"></div> -->
            <input class="blog_inp" maxlength="100">
            <div class="blog_inp_charCount flexc" data_char_len="100">100</div>
        </div>


        <?php
            require_once "dashboard_rich_textEditor.php";
        ?>
    </div>

    <div class="dashboard_create_blog_sec2">
        <div class="dashboard_create_blog_sec_title">
            Add Info
        </div>
        <div class="blog_inp_con">
            <div class="blog_inp_label flexc">
                <div class="label_text">Catagories</div>
                <div class="label_icon flexc">
                    <i class="fal fa-check">
                        <div class="label_tooltip">character limit 50</div>
                    </i>
                </div>
            </div>
            <!-- <div class="blog_inp" contenteditable="true"></div> -->
            <input class="blog_inp" maxlength="10">
            <div class="blog_inp_charCount flexc" data_char_len="10">10</div>
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
            <div class="create_blog_tags_con flexc" style="flex-wrap:wrap">
                <input class="create_blog_tags_inp" type="text">
            </div>
            <div class="blog_inp_charCount flexc" data_tag_len="10">10</div>
        </div>
    </div>
</div>
