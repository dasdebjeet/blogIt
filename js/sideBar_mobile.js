$(document).ready(() => {
    var sildeBar_close = () => {
        $("html, body").removeClass("noscroll");
        $(".sideBar_mobile_con").css({
            "opacity": '0',
            "visibility": 'hidden',
            "transform": 'translateX(-100%)'
        })
    }

    $(".sideBar_mobile_con").on("click", (e) => {
        if (e.target.classList.contains("sideBar_mobile_con")) {
            sildeBar_close()
        }
    });

    $(".sideBar_mobile_closeBtn").click(() => {
        sildeBar_close()
    })

    $(".sideBar_userProfile").click(() => {
        $(".sideBar_userProfile i").toggleClass("fa-angle-up");
        $(".sideBar_userProfile").toggleClass("sideBar_userProfile_active")
        $(".sideBar_login_dropdown_con").slideToggle()
    })

    $(".sideBar_loginBtn").click(() => {
        sildeBar_close()

        $("html, body").addClass("noscroll");
        $(".loginSignup_modal_con").css({
            "opacity": '1',
            "visibility": 'visible'
        })
    })

})