$(document).ready(() => {
    $(".dashboard_con_content").load("./includes/dashboard_create_blog.php ")

    // $(".search_inp").focus(() => {
    //     $(".dashboard_searchbar").css("border", '2px solid #000000')
    //     $(".search_icon").css("color", '#000000')
    // })
    // $(".search_inp").focusout(() => {
    //     $(".dashboard_searchbar").css("border", '2px solid transparent')
    //     $(".search_icon").css("color", "#b5b5b5")
    // })

    $(".menu_btn").click(() => {
        $(".menu_btn>i").toggleClass("bx-x")
        $(".dashboard_sidebar").toggleClass("active_dashboard_sidebar")
        $(".dashboard_con").toggleClass("active_dashboard_con")
    });

    $(".selectAll_article_check").click(() => {
        var checkedStatus = $(".article_selectAll_inp")[0].checked;
        $('input[name="article_select"]').each(function () {
            $(this).prop('checked', checkedStatus);
        });
    })

    var dash_side_menus = document.querySelectorAll('.dashboard_sidebar_menu')
    for (const menu of dash_side_menus) {
        menu.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            var dash_side_val = $(menu).attr("dashborad_id")
            console.log(dash_side_val)
            $(".dashboard_con_content").load("./includes/dashboard_" + dash_side_val + ".php")
        })
    }









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

        var fileName_shortner = (file_name) => {
            if (file_name.length >= 24) { //if file name length is greater than 14 then split it and add ...
                let split_name = file_name.split('.');
                file_name = split_name[0].substring(0, 23) + "..." + split_name[1]
            }
            return file_name
        }

        dropZoneElement.addEventListener("drop", (e) => {
            $(".blog_mini_image_upload_dropzone_overlay").css("display", 'none')
            $(".blog_mini_image_upload_dropzone").css("display", 'none')
            e.preventDefault(); // prevent the image from opening in a new tab
            $(".blog_mini_image_upload_dropzone").css("display", 'none')

            if (e.dataTransfer.files.length) {
                var files = e.dataTransfer.files


                for (var i = 0; i < files.length; i++) {
                    const reader = new FileReader()
                    reader.fileName = files[i].name
                    reader.readAsDataURL(files[i]);
                    reader.onload = (e) => {
                        var file_name = fileName_shortner(e.target.fileName)

                        $(".blog_mini_image_preveiw_wrap").append(`
                        <div class="blog_mini_image_preveiw flexc">
                            <div class="blog_mini_image_preveiw_img_con">
                                <div class="blog_mini_image_preveiw_closebtn_con flexc"><i class="fal fa-times"></i></div>
                                <img class="blog_mini_image_preveiw_img" src="${reader.result}">
                            </div>
                            <div class="blog_mini_image_preveiw_content flexc">
                                <div class="blog_mini_image_preveiw_text flexc">${file_name}</div>
                                <div class="blog_mini_image_preveiw_icon flexc"><i class="fal fa-pencil"></i></div>
                            </div>
                        </div>
                        `)
                        // console.log(reader.result)
                    };
                    $(".blog_mini_image_preveiw_text").text()
                    // console.log(files[i])
                }

                // var image = e.dataTransfer.files[0]
                // var formData = new FormData()
                // formData.append('mainImg_file', image)

                // updateThumnail(dropZoneElement, image, formData);
            }
            remove_dropzone_active()
        });


    })


})