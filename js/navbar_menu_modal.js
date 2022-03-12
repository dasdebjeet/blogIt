$(document).ready(() => {
    $(".navbar_menu_modal_closebtn").click(() => {
        $("html, body").removeClass("noscroll");
        $(".navbar_menu_modal_con").css({
            "opacity": '0',
            "visibility": 'hidden',
            "transform": 'translateY(-100%)'
        })
    })
})