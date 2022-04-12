$(document).ready(function () {


    // cursor position -- saver

    var cur_p;
    $(".editor_body").on('keydown keyup keypress mousedown mouseup', (e) => {
        cur_p = saveSelection()
    })

    $(".editor_body").on('input', (e) => {
        if ($(".editor_body").html().length) {
            $(".blog_textEditorWrapper_inp_con").prev().css("display", 'none')
        }
    })

    var saveSelection = () => {
        if (window.getSelection) {
            var sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                return sel.getRangeAt(0);
            }
        } else if (document.selection && document.selection.createRange) {
            return document.selection.createRange();
        }
        return null;
    }

    var restoreSelection = (range) => {
        if (range) {
            if (window.getSelection) {
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (document.selection && range.select) {
                range.select();
            }
            return true
        }
    }




    var displayLN = () => {
        var el_h = $(".editor_body").outerHeight()
        var lines = Math.floor(el_h / 20)
        $(".lineNumber").html("")
        for (var i = 1; i < lines; i++) {
            $(".lineNumber").append("<div>" + i + "</div>")
        }

    }

    displayLN()
    $(".editor_body").on('keydown keyup keypress mousedown mouseup', (e) => {
        displayLN()
    })

    var editor_btns = document.querySelectorAll('.toolbar_btn');

    for (const ebtns of editor_btns) {
        ebtns.addEventListener('click', function (event) {
            var cmd = ($(this).attr('data-cmd'));
            if (cmd != null) {
                if (cmd != "veiwCode") {
                    if (cmd == 'H1' || cmd == 'H2' || cmd == 'H3') {
                        document.execCommand('formatBlock', false, cmd);
                    } else if (cmd == 'insertImage') {
                        $("html, body").addClass("noscroll");
                        $(".dashboard_modal").css({
                            "visibility": 'visible',
                            "opacity": '1'
                        })

                        $(".dashboard_modal_main_blog_preveiw_wrap").css("display", 'none')
                        $(".blog_mini_image_upload_wrap").css("display", 'flex')

                    } else if (cmd == 'createLink') {
                        $(".editor_dataModal").css({
                            "visibility": 'visible',
                            "opacity": '1'
                        })

                        $(".createUrl_dataModal_content").css("display", 'block')
                        $(".createUrl_insertBtn").click(() => {
                            var val = $(".createUrl_inp").val()
                            if (val) {
                                if (restoreSelection(cur_p)) {
                                    document.execCommand(cmd, false, val);
                                    $(".createUrl_inp").val("")
                                    $(".editor_dataModal").css({
                                        "visibility": 'hidden',
                                        "opacity": '0'
                                    })
                                    $(".createUrl_dataModal_content").css("display", 'none')
                                } else {
                                    $(".editor_body").append("<a href=" + val + ">" + val + "</a>")
                                    $(".createUrl_inp").val("")
                                    $(".editor_dataModal").css({
                                        "visibility": 'hidden',
                                        "opacity": '0'
                                    })
                                    $(".createUrl_dataModal_content").css("display", 'none')
                                }

                            }
                        })

                        $(".createUrl_cancleBtn").click(() => {
                            $(".editor_dataModal").css({
                                "visibility": 'hidden',
                                "opacity": '0'
                            })
                            $(".createUrl_dataModal_content").css("display", 'none')
                        })
                    } else {
                        document.execCommand(cmd);
                    }
                } else {
                    displayLN()
                    var state = ($(this).attr('status'));

                    // console.log(state)
                    if (state == 'off') {
                        var content = $(".editor_body").html()
                        console.log(content);

                        $(".editor_body").text(content).css({
                            "background": '#0f1316',
                            "width": 'calc(100% - 35px)',
                            "color": '#00ffc3',
                            "box-shadow": 'inset 10px 10px 20px #090c0d, inset -10px -10px 20px #151a1f'
                        })
                        $(".lineNumber").css("display", 'block')
                        $(this).attr('status', 'on')

                    } else {
                        var content = $(".editor_body").text()
                        $(".editor_body").html(content).css({
                            "background": '#ffffff',
                            "width": '100%',
                            "color": '#000000',
                            "box-shadow": 'inset 9px 9px 35px #e9e9e9, inset -9px -9px 35px #e5e5e5'

                        })
                        $(".lineNumber").css("display", 'none')
                        $(this).attr('status', 'off')
                    }
                    displayLN()
                }
            }
        });
    };

    document.querySelector(".editor_body").addEventListener("paste", function (e) {
        e.preventDefault();
        var text = e.clipboardData.getData("text/plain");

        document.execCommand("insertText", false, text);
    });

    var mini_images_arr = []
    // ----------- create blog mini image upload
    document.querySelectorAll(".blog_mini_images_inp").forEach(inputElement => {

        // console.log()
        const dropZoneElement = inputElement.parentElement.parentElement

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            // console.log(e)

            $(".blog_mini_image_upload_dropzone_overlay").css("display", 'flex')
            $(".blog_mini_image_upload_dropzone").css("display", 'flex')

            $(".blog_mini_image_upload_dropzone").addClass("miniImg_dropzone_active")
            $(".blog_mini_image_dropzone_icon").html("<i class='far fa-check' aria-hidden='true'></i>").css("color", '#4affbc')
            $(".blog_mini_image_dropzone_text").html("Selected")
        })


        var remove_dropzone_active = () => {
            // if ($(".blog_mini_image_upload_dropzone_overlay").css('display') != 'none') {
            //     $(".blog_mini_image_upload_dropzone_overlay").css("display", 'none')
            //     $(".blog_mini_image_upload_dropzone").css("display", 'none')
            // }


            $(".blog_mini_image_upload_dropzone").removeClass("miniImg_dropzone_active")
            $(".blog_mini_image_dropzone_icon").html("<i class='fal fa-cloud-upload' aria-hidden='true'></i>").css("color", '#ff7863')
            $(".blog_mini_image_dropzone_text").html("Drag files here or <span>browse</span>")
        };

        ["dragleave", "dragend"].forEach(type => {
            dropZoneElement.addEventListener(type, (e) => {
                remove_dropzone_active()
            })
        })

        dropZoneElement.addEventListener("drop", (e) => {
            $(".blog_mini_image_upload_dropzone_overlay").css("display", 'none')
            $(".blog_mini_image_upload_dropzone").css("display", 'none')
            e.preventDefault(); // prevent the image from opening in a new tab

            if (e.dataTransfer.files.length) {
                var files = e.dataTransfer.files
                for (var i = 0; i < files.length; i++) {
                    if (files[i].type.startsWith("image/")) {
                        updateThumnail(files[i])
                    }
                }
            }
            remove_dropzone_active()
        });


        //upload btn trigger
        $(".blog_mini_image_upload_dropzone_overlay").click(() => {
            $(".blog_mini_images_inp").trigger('click');
        });

        $(".miniImg_uplBtn").click(() => {
            $(".blog_mini_images_inp").trigger('click');
        });


        //main blog image upload input
        $(".blog_mini_images_inp").on('change', (e) => {
            // console.log(mini_images_arr)
            var files = e.target.files;
            if (files.length) {
                $(".blog_mini_image_upload_dropzone_overlay").css("display", 'none')
                $(".blog_mini_image_upload_dropzone").css("display", 'none')
                for (var i = 0; i < files.length; i++) {
                    updateThumnail(files[i])
                }
            }
        })

        var fileName_shortner = (file_name) => {
            if (file_name.length >= 21) { //if file name length is greater than 14 then split it and add ...
                let split_name = file_name.split('.');
                file_name = split_name[0].substring(0, 19) + "..." + split_name[1]
            }
            return file_name
        }


        const updateThumnail = (file) => {
            if (file.type.startsWith("image/")) {
                if (!mini_images_arr.includes(file.name)) {
                    $(".blog_mini_image_upload_err_msg").css("display", 'none')
                    mini_images_arr.push(file.name)
                    console.log(mini_images_arr)


                    const reader = new FileReader()
                    reader.fileName = file.name
                    reader.readAsDataURL(file);
                    reader.onload = (e) => {
                        var file_name = fileName_shortner(e.target.fileName)

                        $(".blog_mini_image_preveiw_wrap").append(`
                        <div class="blog_mini_image_preveiw flexc">
                            <div class="blog_mini_image_preveiw_img_con">
                                <div class="blog_mini_image_preveiw_closebtn_con flexc">
                                    <div class="blog_mini_image_preveiw_closebtn_overlay"></div>
                                    <i class="fal fa-times"></i>
                                </div>
                                <img class="blog_mini_image_preveiw_img" src="${reader.result}">
                            </div>
                            <div class="blog_mini_image_preveiw_content flexc">
                                <div class="blog_mini_image_preveiw_text" contenteditable="false" img_data_name=` + reader.fileName + `>${file_name}</div>
                                <div class="blog_mini_image_preveiw_icon flexc">
                                    <i class="fal fa-pencil"></i>
                                    <div class="blog_mini_image_preveiw_icon_overlay"></div>
                                </div>
                            </div>
                        </div>
                        `)
                    };

                    var formData = new FormData();
                    formData.append('blog_content_mini_img_file', file);
                    $.ajax({
                        type: "POST",
                        url: "./includes/blog_imgUploader.php",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done((response) => {
                        // console.log(response);
                    });
                } else {
                    console.log("already included")
                }
            }
        }


    })


    // blog -- mini image name modifier
    var old_el_val, new_el_val;
    document.addEventListener('click', (e) => {
        if (e.target.className == "blog_mini_image_preveiw_icon_overlay") {
            var el = $(e.target.parentElement.parentElement.children[0])

            if ($(el).attr("contenteditable") == "false") {
                old_el_val = $(el).attr("img_data_name")
                $(e.target.parentElement.children[0]).addClass("fa-save")
                $(el).attr("contenteditable", 'true').focus().text('')
            } else {
                new_el_val = $(el).text()
                // console.log("new:", new_el_val, "old:", old_el_val)
                if (new_el_val == "") {
                    $(e.target.parentElement.children[0]).removeClass("fa-save")
                    $(el).attr("contenteditable", 'false').text(old_el_val)
                } else {
                    // console.log("new:", new_el_val, "old:", old_el_val)
                    // console.log(old_el_val.split(/\.(?=[^\.]+$)/)[1])
                    var f_ext = old_el_val.split(/\.(?=[^\.]+$)/)[1]

                    var mini_images_index = mini_images_arr.indexOf(old_el_val)
                    mini_images_arr[mini_images_index] = new_el_val + "." + f_ext

                    if (new_el_val.length >= 24) { //if file name length is greater than 24 then split it and add ...
                        var file_name = new_el_val.substring(0, 23) + "..." + f_ext
                    } else {
                        var file_name = new_el_val + "." + f_ext
                    }
                    $(e.target.parentElement.children[0]).removeClass("fa-save")
                    $(el).attr("contenteditable", 'false').text(file_name)

                    var form_data = '&miniImg_name_modify=yes' + '&miniImg_old_name=' + old_el_val + '&miniImg_new_name=' + new_el_val + "." + f_ext
                    $.ajax({
                        type: "POST",
                        url: "./includes/blog_imgUploader.php",
                        data: form_data,
                    }).done((response) => {
                        // console.log(response);
                    })
                    // var fname = $(el).text()
                    $(el).attr("img_data_name", new_el_val + "." + f_ext)
                }

            }
        }
    })


    // blog -- mini image delete function
    document.addEventListener('click', (e) => {
        if (e.target.className == "blog_mini_image_preveiw_closebtn_overlay") {
            var mini_imgTxt_el = e.target.parentElement.parentElement.parentElement.children[1].children[0]
            var mini_imgTxt = $(mini_imgTxt_el).attr("img_data_name")
            var mini_images_index = mini_images_arr.indexOf(mini_imgTxt)

            console.log(mini_images_index)

            mini_images_arr.splice(mini_images_index, 1) // method 1 to delete element from arr of mini image

            // if (mini_images_arr.length == 0) {
            //     $(".blog_mini_image_upload_dropzone_overlay").css("display", 'flex')
            //     $(".blog_mini_image_upload_dropzone").css("display", 'flex')
            // }

            var form_data = '&miniImg_name_delete=yes' + '&miniImg_file_name=' + mini_imgTxt
            $.ajax({
                type: "POST",
                url: "./includes/blog_imgUploader.php",
                data: form_data,
            }).done((response) => {
                // console.log(response)
                e.target.parentElement.parentElement.parentElement.remove()
            })

            console.log(mini_images_arr)
        }

        if (mini_images_arr.length == 0) {
            $(".blog_mini_image_upload_dropzone_overlay").css("display", 'flex')
            $(".blog_mini_image_upload_dropzone").css("display", 'flex')
            mini_images_arr = []
        }

    })



    $(".miniImg_cancelBtn").click(() => {
        $("html, body").removeClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'hidden',
            "opacity": '0'
        })
        $(".blog_mini_image_upload_err_msg").css("display", 'none')
    })


    var dashboard_modal_close_with_mini_img_upload = () => {
        $(".blog_mini_image_upload_err_msg").css("display", 'none')
        $("html, body").removeClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'hidden',
            "opacity": '0'
        })

        $(".blog_mini_image_preveiw_wrap").html("")
        mini_images_arr = []
    }

    $(".miniImg_intBtn").click(() => {
        if (mini_images_arr.length != 0) {
            if (restoreSelection(cur_p)) {
                for (const cr_mini_img of mini_images_arr) {
                    document.execCommand("insertImage", false, "./assests/blog_content_mini_img/miniBlog_Img_" + cr_mini_img)
                }
                dashboard_modal_close_with_mini_img_upload()
            } else {
                for (const cr_mini_img of mini_images_arr) {
                    $(".editor_body").append("<img src=" + "./assests/blog_content_mini_img/miniBlog_Img_" + cr_mini_img + ">")
                }
                dashboard_modal_close_with_mini_img_upload()
            }
        } else {
            $(".blog_mini_image_upload_err_msg").css("display", 'block')
        }
    })

});