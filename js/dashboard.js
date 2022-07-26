$(document).ready(() => {
    $(".dashboard_con_content").load("./includes/dashboard_user_management.php")
    // $(".dashboard_con_content").load("./includes/dashboard_blog.php")
    // $(".dashboard_con_content").load("./includes/dashboard_create_blog.php")
    // $(".dashboard_con_content").load("./includes/dashboard_main.php ")

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
        $(".dashboard_dummy_sidebar").toggleClass("active_dashboard_sidebar")
        $(".dashboard_sidebar").toggleClass("active_dashboard_sidebar")
        $(".dashboard_con").toggleClass("active_dashboard_con")
    });

    // sideNavbar page load
    var dash_side_menus = document.querySelectorAll('.dashboard_sidebar_menu')
    for (const menu of dash_side_menus) {
        menu.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            var val = $(menu).attr("dashborad_id")
            $(".dashboard_con_content").load("./includes/dashboard_" + val + ".php")
        })
    }

    var dash_management_menus = document.querySelectorAll('.dashboard_sidebar_menu_mangtMenu')
    for (const menu of dash_management_menus) {
        menu.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            var val = $(menu).attr("dashborad_id")
            $(".dashboard_con_content").load("./includes/dashboard_" + val + ".php")
        })
    }


    // dashboard -- mobile bottom navbar
    var lastScrollTop = 0;
    $(window).scroll(function (event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $(".dashboard_mobile_bottom_navbar").css("transform", 'translateY(0px)')
        } else {
            $(".dashboard_mobile_bottom_navbar").css("transform", 'translateY(100px)')
        }
        lastScrollTop = st;
    })


    var dash_mobile_menus = document.querySelectorAll('.dashboard_mobile_bottom_navbar_menu')
    for (const menu of dash_mobile_menus) {
        menu.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            $(".dashboard_mobile_bottom_navbar_menu").removeClass("mobile_bottom_navbar_menu_active")
            $(menu).addClass("mobile_bottom_navbar_menu_active")

            var dash_side_val = $(menu).attr("dashborad_id")
            $(".dashboard_con_content").load("./includes/dashboard_" + dash_side_val + ".php")
            // var loaded = $(".dashboard_con_content").load("./includes/dashboard_" + dash_side_val + ".php")
            // console.log(loaded)
            // if (loaded) {
            //     console.log(loaded)
            // }
        })
    }



})