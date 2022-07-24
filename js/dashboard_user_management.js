// userProfile info con TABS

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




})