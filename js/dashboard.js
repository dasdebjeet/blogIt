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






})