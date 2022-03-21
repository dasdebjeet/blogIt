<script src="./js/dashboard_rich_textEditor.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<div class="blog_textEditorWrapper">
    <div class="blog_textEditorWrapper_title">Content</div>
    <div class="create_blog_inp_error_msg">Enter some content for your blog</div>

    <div class="blog_textEditorWrapper_inp_con">
        <div class="editor_dataModal flexc">
            <div class="imgUrl_dataModal_content">
                <div style="margin-bottom:40px;">Insert image url</div>
                <input class="img_url_inp" type="url">
                <p>Only select images that you have confirmed that you have the license to use.</p>
                <div class="insert_btns flexc">
                    <button class="img_cancleBtn" style="margin-right:20px">Cancel</button>
                    <button class="img_insertBtn">Insert</button>
                </div>
            </div>

            <div class="createUrl_dataModal_content">
                <div style="margin-bottom:40px;">Insert url</div>
                <input class="createUrl_inp" type="url">
                <p>Please put a valid url</p>
                <div class="createUrl_btns flexc">
                    <button class="createUrl_cancleBtn" style="margin-right:20px">Cancel</button>
                    <button class="createUrl_insertBtn">Create</button>
                </div>
            </div>

        </div>

        <div class="blog_textEditor_toolbar">
            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="bold" tooltip="Bold"><i class='bx bx-bold'></i></button>
                <button class="toolbar_btn flexc" data-cmd="italic" tooltip="Italic"><i class='bx bx-italic'></i></button>
                <button class="toolbar_btn flexc" data-cmd="underline" tooltip="Underline"><i class='bx bx-underline'></i></button>
            </div>

            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="strikeThrough" tooltip="Strike Through"><i class='bx bx-strikethrough'></i></button>
                <button class="toolbar_btn flexc" data-cmd="insertParagraph" tooltip="Paragraph"><i class='bx bx-paragraph'></i></button>
            </div>

            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="H1" tooltip="Heading 1"><i class='bx bx-heading'></i><span style="font-weight:600">1</span></button>
                <div class="toolbar_btn_wrapSpace"></div>
                <button class="toolbar_btn flexc" data-cmd="H2" tooltip="Heading 2"><i class='bx bx-heading'></i><span style="font-weight:600">2</span></button>
                <div class="toolbar_btn_wrapSpace"></div>
                <button class="toolbar_btn flexc" data-cmd="H3" tooltip="Heading 3"><i class='bx bx-heading'></i><span style="font-weight:600">3</span></button>
                <div class="toolbar_btn_wrapSpace"></div>
            </div>


            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="justifyLeft" tooltip="Align Left" style="font-size:14px"><i class="fal fa-align-left"></i></button>
                <button class="toolbar_btn flexc" data-cmd="justifyCenter" tooltip="Align Center" style="font-size:14px"><i class="fal fa-align-center"></i></button>
                <button class="toolbar_btn flexc" data-cmd="justifyFull" tooltip="Justify" style="font-size:14px"><i class="fal fa-align-justify"></i></button>
                <button class="toolbar_btn flexc" data-cmd="justifyRight" tooltip="Align Right" style="font-size:14px"><i class="fal fa-align-right"></i></button>
            </div>


            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="insertUnorderedList" tooltip="Unordered List" style="font-size:20px"><i class='bx bx-list-ul'></i></button>
                <button class="toolbar_btn flexc" data-cmd="insertOrderedList" tooltip="Ordered List" style="font-size:20px"><i class='bx bx-list-ol'></i></button>
            </div>

            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="insertImage" tooltip="Insert Image" status="off" style="font-size:18px"><i class='bx bx-image'></i></button>
                <button class="toolbar_btn flexc" data-cmd="createLink" tooltip="Create Link" style="font-size:18px"><i class='bx bx-link'></i></button>


                <div class="insertImg_btn_dropdown">
                    <div class="img_dropdown_menu blog_textEditor_imgFile_upload flexc" style="border-bottom: 1px solid #505050;">
                        <input class="blog_textEditor_img_inp" type="file" name="blog_textEditor_img" hidden>
                        <div class="menu_text">Upload from PC</div>
                        <div class="menu_icon"><i class="fal fa-arrow-to-top"></i></div>
                    </div>
                    <div class="img_dropdown_menu imgUrl flexc">
                        <div class="menu_text">Insert by url</div>
                        <div class="menu_icon"><i class='bx bx-link-alt'></i></div>
                    </div>
                </div>

            </div>

            <div class="toolbar_btn flexc" data-cmd="veiwCode" status="off" tooltip="HTML Code" style="font-size:18px"><i class='bx bx-code-alt'></i></div>

            <div class="toolbar_btn_wrap flexc">
                <button class="toolbar_btn flexc" data-cmd="undo" tooltip="Undo" style="font-size:18px"><i class='bx bx-undo'></i></button>
                <button class="toolbar_btn flexc" data-cmd="redo" tooltip="Redo" style="font-size:18px"><i class='bx bx-redo'></i></button>
            </div>

        </div>

        <div class="editor_container flexc">
            <div class="lineNumber"></div>
            <div class="editor_body" id="blog_editor" contenteditable="true"></div>
        </div>
    </div>

</div>
