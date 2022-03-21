$(document).ready(() => {

    // create blog title and subtitle input limit function

    var max_len_checker = (el, len, limit, e) => {
        $(el).next().text(len)
        $(el).next().addClass("active_blog_inp_charCount")
        $(el).prev().prev().children(".label_icon").addClass("active_label_icon")
        if (len >= limit && !(e.keyCode == 8)) {
            $(el).prev().prev().children(".label_icon").children(".fa-check").addClass("fa-exclamation-circle").css("color", "#ff9c9c")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text("character limit reached")
        } else if (len == 0) {
            $(el).next().removeClass("active_blog_inp_charCount")
            $(el).prev().prev().children(".label_icon").removeClass("active_label_icon")
            $(el).prev().prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text("character limit " + limit)
        } else {
            $(el).prev().prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text("character limit " + limit)
            $(el).prev().text("")
        }
    }

    var blog_create_inp = document.querySelectorAll('.blog_inp')
    for (const blog_cinp of blog_create_inp) {
        blog_cinp.addEventListener("input", (e) => {
            var inp_val = $(blog_cinp).val().length
            // console.log(inp_val)

            var max_len = ($(blog_cinp).next().attr("data_char_len"))
            max_len_checker(blog_cinp, inp_val, max_len, e)
        })
    }


    // ========================================================

    var update_tags_limit = (el, tag_name, len, limit) => {
        $(el).next().text(len)
        $(el).next().addClass("active_blog_inp_charCount")
        $(el).prev().prev().children(".label_icon").addClass("active_label_icon")
        if (len >= limit) {
            $(el).prev().prev().children(".label_icon").children(".fa-check").addClass("fa-exclamation-circle").css("color", "#ff9c9c")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text(tag_name + " limit reached")
            $(el).prev().text("")
        } else if (len == 0) {
            $(el).next().removeClass("active_blog_inp_charCount")
            $(el).prev().prev().children(".label_icon").removeClass("active_label_icon")
            $(el).prev().prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text(tag_name + " limit " + limit)
        } else {
            $(el).prev().prev().children(".label_icon").children(".fa-check").removeClass("fa-exclamation-circle").css("color", "#4affbc")
            $(el).prev().prev().children(".label_icon").children(".fa-check").children(".label_tooltip").text(tag_name + " limit " + limit)
            $(el).prev().text("")
        }
    }

    var backpress_key = 0

    // create blog catagories
    var arr_cata = [];

    $(".create_blog_cata_con").click(() => { //fn to focus on the tags input elements
        $(".create_blog_cata_inp").focus();
    });

    var createCata = (cata_name) => { // prepend tags in frontend
        $(".create_blog_cata_con").prepend("<div class='cata_format'><span style='padding: 0 5px;' >#" + cata_name + "</span><i id='cata_remove' class='fal fa-times' data-item=" + cata_name + "></i></div>");
    }

    var resetCata = () => { //  reset tags are not working
        document.querySelectorAll(".cata_format").forEach((cata) => {
            cata.parentElement.removeChild(cata)
        })
    }
    var addCata = () => { //function declaration to add tags
        resetCata();
        arr_cata.slice().reverse().forEach((cata) => {
            createCata(cata)
        })
    }

    $(".create_blog_cata_inp").on('keydown', (e) => { // main function of tags by key events
        var inp_cata_val = $(".create_blog_cata_inp").val();
        var max_len = ($(".create_blog_cata_con").next().attr("data_cata_len"))

        // update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
        if (arr_cata.length < max_len) {
            if (e.key == "Enter" && inp_cata_val != "") {
                arr_cata.push(inp_cata_val);
                addCata();
                $(".create_blog_cata_inp").val("")
                update_tags_limit(".create_blog_cata_con", "category", arr_cata.length, max_len)
            }
        } else {
            update_tags_limit(".create_blog_cata_con", "category", arr_cata.length, max_len)
        }

        if (e.keyCode == 8 && inp_cata_val == 0) {
            if (backpress_key == 2) {
                arr_cata.pop(); // method 1 to delete element from arr of tags(arr_tags)
                addCata()
                update_tags_limit(".create_blog_cata_con", "category", arr_cata.length, max_len)
                backpress_key = 0
            }
            backpress_key += 1;
        }
    })

    var delete_cata = (e) => { // fn to delete tags
        var max_len = ($(".create_blog_cata_con").next().attr("data_cata_len"))
        var value = e.target.getAttribute('data-item');
        var index = arr_cata.indexOf(value);
        arr_cata.splice(index, 1); // method 1 to delete element from arr of tags(arr_tags)
        addCata();
        update_tags_limit(".create_blog_cata_con", "category", arr_cata.length, max_len)
    }

    document.addEventListener('click', (e) => { //delete tags on click eventlistener
        if (e.target.id == "cata_remove") {
            delete_cata(e);
        }
    })





    // ========================================================
    // create blog tags
    var arr_tags = [];

    $(".create_blog_tags_con").click(() => { //fn to focus on the tags input elements
        $(".create_blog_tags_inp").focus();
    });

    var createTags = (tag_name) => { // prepend tags in frontend
        $(".create_blog_tags_con").prepend("<div class='tags_format'><span style='padding: 0 5px;' >#" + tag_name + "</span><i id='tag_remove' class='fal fa-times' data-item=" + tag_name + "></i></div>");
    }

    var resetTags = () => { //  reset tags are not working
        document.querySelectorAll(".tags_format").forEach((tag) => {
            tag.parentElement.removeChild(tag);
        });
    }
    var addTags = () => { //function declaration to add tags
        resetTags();
        arr_tags.slice().reverse().forEach((tag) => {
            createTags(tag);
        });
    }

    $(".create_blog_tags_inp").on('keydown', (e) => { // main function of tags by key events
        var inp_tag_val = $(".create_blog_tags_inp").val();
        var max_len = ($(".create_blog_tags_con").next().attr("data_tag_len"))

        // update_tags_limit(".create_blog_tags_con", arr_tags.length, max_len)
        if (arr_tags.length < max_len) {
            if (e.key == "Enter" && inp_tag_val != "") {
                arr_tags.push(inp_tag_val);
                addTags();
                $(".create_blog_tags_inp").val("")
                update_tags_limit(".create_blog_tags_con", "tag", arr_tags.length, max_len)
            }
        } else {
            update_tags_limit(".create_blog_tags_con", "tag", arr_tags.length, max_len)
        }

        if (e.keyCode == 8 && inp_tag_val == 0) {
            if (backpress_key == 2) {
                arr_tags.pop(); // method 1 to delete element from arr of tags(arr_tags)
                // arr_tags = [...arr_tags.slice(0, index), ...arr_tags.slice(index + 1)];  method 2 to delete element from arr of tags(arr_tags)
                addTags()
                update_tags_limit(".create_blog_tags_con", "tag", arr_tags.length, max_len)
                backpress_key = 0
            }
            backpress_key += 1;
        }
    })

    var delete_tags = (e) => { // fn to delete tags
        var max_len = ($(".create_blog_tags_con").next().attr("data_tag_len"))
        var value = e.target.getAttribute('data-item');
        var index = arr_tags.indexOf(value);
        arr_tags.splice(index, 1); // method 1 to delete element from arr of tags(arr_tags)
        addTags();
        update_tags_limit(".create_blog_tags_con", "tag", arr_tags.length, max_len)
    }

    document.addEventListener('click', (e) => { //delete tags on click eventlistener
        if (e.target.id == "tag_remove") {
            delete_tags(e);
        }
    })


    // --------------------------------------------------------------------------------------------
    // blog main image uploader

    var blog_thumbnail_url
    document.querySelectorAll(".dashboard_create_blog_mainImage_inp").forEach(inputElement => {
        const dropZoneElement = inputElement.closest(".dashboard_create_blog_image_dropzone")

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            $(".dashboard_create_blog_image_dropzone").addClass("dropzone_active")
            $(".blog_image_dropzone_icon").html("<i class='far fa-check' aria-hidden='true'></i>").css("color", '#4affbc')
            $(".blog_image_dropzone_text").html("Selected")
        })

        var remove_dropzone_active = () => {
            $(".dashboard_create_blog_image_dropzone").removeClass("dropzone_active")
            $(".blog_image_dropzone_icon").html("<i class='fal fa-cloud-upload' aria-hidden='true'></i>").css("color", '#ff7863')
            $(".blog_image_dropzone_text").html("Drag files here or <span>browse</span>")
        };

        ["dragleave", "dragend"].forEach(type => {
            dropZoneElement.addEventListener(type, (e) => {
                remove_dropzone_active()
            })
        })

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();
            // console.log(e.dataTransfer.files.length);
            if (e.dataTransfer.files.length) {
                var image = e.dataTransfer.files[0]
                var formData = new FormData()
                formData.append('mainImg_file', image)

                updateThumnail(dropZoneElement, image, formData);
            }
            remove_dropzone_active()
        });


        //upload btn
        $(".dashboard_create_blog_image_dropzone_overlay").click(() => {
            $(".dashboard_create_blog_mainImage_inp").trigger('click');

        });

        //main blog image upload input
        $(".dashboard_create_blog_mainImage_inp").on('change', (e) => {
            var files = e.target.files;

            var form = $('.mainImg_upload_form')[0]; // You need to use standard javascript object here
            var formData = new FormData(form)
            if (files.length) {
                inputElement = files
                updateThumnail(dropZoneElement, files[0], formData)
            };
        });


        // thumbnail
        const updateThumnail = (dropZoneElement, file, formData) => {
            // let thumbnailElement = dropZoneElement.querySelector(".main_blog_thumbnail");
            // let dropZone = dropZoneElement.querySelector(".main_img_dropZone");
            // if (dropZone) {
            //     dropZone.remove();
            // }

            // document.querySelectorAll(".main_blog_thumbnail").forEach((thumbnail) => { // the already existing thumbnail
            //     thumbnail.parentElement.removeChild(thumbnail);
            // })


            // display the filename
            // if (file.type.startsWith("image/")) {
            //     console.log("image")
            // } else {
            //     console.log("Not image")
            // }


            //show the thumbnail img
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                let file_name = file.name; //getting file name
                if (file_name.length >= 14) { //if file name length is greater than 14 then split it and add ...
                    let split_name = file_name.split('.');
                    file_name = split_name[0].substring(0, 8) + "..." + split_name[1]
                }

                reader.readAsDataURL(file);
                reader.onload = () => {
                    blog_thumbnail_url = (reader.result)
                    $(".dashboard_create_blog_image_dropzone_overlay").css({
                        "background-image": `url(${reader.result})`,
                        "background-color": '#fff1ef'
                    });
                };

                // console.log(formData)
                $.ajax({
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest()

                        xhr.upload.addEventListener("progress", (e) => {
                                if (e.lengthComputable) {
                                    // console.log(evt);
                                    var fileLoaded = Math.floor((e.loaded / e.total) * 100); //getting percentage of loaded file size
                                    var fileTotal = Math.floor(e.total / 1000); //gettting total file size in KB from bytes
                                    // console.log(file.size, file.size * 1024)
                                    var file_size = ((file.size / 1024) < 1024) ? Math.floor(file.size / 1024) + " KB" : Math.floor(file.size / (1024 * 1024)) + " MB" // if file size is less than 1024 then add only KB else convert this KB into MB
                                    var percentComplete = Math.floor((e.loaded / e.total) * 100)

                                    $('.blog_image_progress_preveiw').html(`
                                    <div class="blog_image_progress_preveiw_mainImgIcon flexc"><i class="fal fa-file-image"></i></div>
                                    <div class="blog_image_progress_preveiw_mainImg_content flexc">
                                        <div class="blog_image_progress_preveiw_mainImg_details flexc">
                                            <div class="preveiw_img_name">` + file_name + ` • Uploading</div>
                                            <div class="upload_percent">` + percentComplete + `%</div>
                                        </div>
                                        <div class="blog_image_progress_bar_con">
                                            <div class="blog_image_progress_bar" style="width: ` + percentComplete + `%"></div>
                                        </div>
                                    </div>      
                                    `)

                                    if (e.loaded == e.total) {
                                        $('.blog_image_progress_preveiw').html(`
                                        <div class="blog_image_progress_preveiw_mainImgIcon flexc"><i class="fal fa-file-image"></i></div>
                                        <div class="blog_image_progress_preveiw_mainImg_content flexc" style="width: calc(100% - 100px)">
                                            <div class="blog_image_progress_preveiw_mainImg_details">
                                                <div class="preveiw_img_name">` + file_name + ` • Uploaded</div>
                                                <div class="preveiw_img_size">` + file_size + `</div>
                                            </div>
                                        </div>
                                        <div class="blog_image_upload_completed flexc"><i class="fal fa-times"></i></div>
                                        `)

                                        $(".blog_image_upload_completed").on("click", () => {
                                            $(".dashboard_create_blog_image_dropzone_overlay").css({
                                                "background-image": `none`,
                                                "background-color": 'transparent'
                                            })
                                            $(".blog_image_progress_preveiw").html("")
                                        })
                                    }
                                }
                            },
                            false);

                        return xhr;
                    },
                    type: "POST",
                    url: "./includes/main_blog_imgUploader.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (result) => {
                        console.log(result);
                    }
                })

            };




        };


    });

    // --------------------------------------------------------------------------------------------
    // blog create draft and publish btn

    $(".blog_create_publishBtn").click(() => {
        $("html, body").addClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'visible',
            "opacity": '1'
        })

        console.log($(".create_blog_title_inp").val())
        console.log($(".create_blog_subtitle_inp").val())
        console.log($(".editor_body").html())
        console.log(arr_cata)
        console.log(arr_tags)
        console.log(blog_thumbnail_url)
    })

    var dashboard_modal_close = () => {
        $("html, body").removeClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'hidden',
            "opacity": '0'
        })
    }

    $(".dashboard_modal").on("click", (e) => {
        if (e.target.classList.contains("dashboard_modal")) {
            dashboard_modal_close()
        }
    })

    $(".blog_preveiw_cancelbBtn").click(() => {
        dashboard_modal_close()
    })

    $(".dashboard_modal_main_blog_preveiw_con_closeBtn").click(() => {
        dashboard_modal_close()
    })

})