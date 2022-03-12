$(document).ready(() => {
    var logout = () => {
        $.ajax({
            type: 'POST',
            url: './includes/logout.php'
        }).done((response) => {
            // console.log(response)
            if (response == "Succesfully logouted") {
                location.reload(true)
            }
            // $(".navLogin_btn").remove()
            // $(".nav_userProfile>img").remove()
            // $("<div class='navLogin_btn flexc'><div class='water'></div><span>login</span></div>").appendTo(".navLogin_btn_con")

            // $(".sideBar_userProfile").css("display", 'none')
            // $(".sideBar_loginBtn").css("display", 'flex')
        })
    }

    var sildeBar_close = () => {
        $("html, body").removeClass("noscroll");
        $(".sideBar_mobile_con").css({
            "opacity": '0',
            "visibility": 'hidden',
            "transform": 'translateX(-100%)'
        })
    }

    $(".navDropdown_logout").click(() => {
        logout()
    })


    $(".sideBar_logoutBtn").click(() => {
        // sildeBar_close()
        logout()
    })

})