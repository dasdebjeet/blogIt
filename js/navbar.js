$(document).ready(() => {
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 0) {
            $(".navbar").css("background", '#000000')
        } else {
            $(".navbar").css("background", 'transparent')
        }
    });

    $(".navLogin_btn_con").click(() => {
        $("html, body").addClass("noscroll");
        $(".loginSignup_modal_con").css({
            "opacity": '1',
            "visibility": 'visible'
        })
    })

    var sideNavbar = () => {
        $(".sideBar_mobile_con").css({
            "opacity": '1',
            "visibility": 'visible',
            "transform": 'translateX(0%)'
        })
    }

    $(".navMenu_btn_con").click(() => {
        $("html, body").addClass("noscroll");
        $(".navbar_menu_modal_con").css({
            "opacity": '1',
            "visibility": 'visible',
            "transform": 'translateY(0%)'
        })
        sideNavbar()
    })

    $(".nav_userProfile").click(() => {
        sideNavbar()
    })

    $(".navSearch").click(() => {
        $(".navWrap").css("display", 'none')
        $(".nav_space").css("display", 'none')
        $(".nav_searchBar_con").css("display", 'flex')
        $(".nav_searchBar_inp").focus()
    })

    $(".nav_searchBar_closeBtn").click(() => {
        $(".navWrap").css("display", 'flex')
        $(".nav_space").css("display", 'block')
        $(".nav_searchBar_con").css("display", 'none')
    })
})