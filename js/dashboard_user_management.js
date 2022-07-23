// userProfile info con TABS

$(document).ready(() => {

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