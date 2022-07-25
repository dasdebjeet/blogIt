$(document).ready(() => {
    var dashboard_modal_close = () => {
        $("html, body").removeClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'hidden',
            "opacity": '0'
        })
        $(".dashboard_userMgnt_userProfile_modal_wrap").css("display", 'none')
    }

    $(".cell_btn_view").click(() => {
        $("html, body").addClass("noscroll");
        $(".dashboard_modal").css({
            "visibility": 'visible',
            "opacity": '1'
        })
        $(".dashboard_userMgnt_userProfile_modal_wrap").css("display", "block")
    })

    $(".dashboard_userMgnt_userProfile_modal_closeBtn").on("click", (e) => {
        dashboard_modal_close()
    })

    $(".dashboard_modal").on("click", (e) => {
        if (e.target.classList.contains("dashboard_modal")) {
            dashboard_modal_close()
        }
    })

    var head_titles = document.querySelectorAll('.userProfile_info_head_title')
    for (const title of head_titles) {
        title.addEventListener('click', (e) => {
            var title_name = $(title).text().toLowerCase()

            $(".userProfile_info_head_title").removeClass('info_head_title_active')
            $(title).addClass('info_head_title_active')

            $(".userProfile_info").hide()
            $(`.info_${title_name}`).show()
        })
    }




    // user table checkbox

    $(".userTable_head .userTable_cell .selectAll_article_check").click(() => {
        var checkedStatus = $(".userTable_head .userTable_cell .article_selectAll_inp")[0].checked;
        $('.userTable_body .userTable_cell input[name="article_select"]').each(function () {
            $(this).prop('checked', checkedStatus);
        });
    })


    // user summary search

    $(".dashboard_userMgnt_seachbar_btn").click(() => {
        var search_val = $(".userMgnt_seachbar_input").val().toLowerCase()
        var role_val = $('.dashboard_userMgnt_seachbar_role_filter_value input[name="userMgnt_inpRole_val"]:checked').val().toLowerCase()
        var status_val = $('.dashboard_userMgnt_seachbar_status_filter_value input[name="userMgnt_inpStatus_val"]:checked').val().toLowerCase()

        // without name all
        if (search_val == "" && role_val == "all" && status_val == "all") {
            $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
                $(this).show()
            });
        }

        // without name + role
        else if (role_val != "all" && status_val == "all") {
            $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1 && $(this).text().toLowerCase().indexOf(role_val) > -1)
            });
        }

        // without name + status
        else if (role_val == "all" && status_val != "all") {
            $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1 && $(this).text().toLowerCase().indexOf(status_val) > -1)
            });
        }

        // 
        else if (role_val != "all" && status_val != "all") {
            $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1 && $(this).text().toLowerCase().indexOf(role_val) > -1 && $(this).text().toLowerCase().indexOf(status_val) > -1)
            });
        }


        // with name all
        else if (role_val == "all" && status_val == "all") {
            $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1)
            });
        }





        // // 
        // else if (search_val != "" && role_val == "all" && status_val != "all") {
        //     $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
        //         $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1 && $(this).text().toLowerCase().indexOf(status_val) > -1)
        //     });
        // } else {
        //     $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
        //         $(this).toggle($(this).text().toLowerCase().indexOf(search_val) > -1 && $(this).text().toLowerCase().indexOf(role_val) > -1 && $(this).text().toLowerCase().indexOf(status_val) > -1)
        //     });
        // }


    })

    // $(".userMgnt_seachbar_input").on("keyup", function () {
    //     var value = $(this).val().toLowerCase();
    //     $(".dashboard_userMgnt_userTable .userTable_body .userTable_row").filter(function () {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // });


})