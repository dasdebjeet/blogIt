$(document).ready(() => {

    var userContent = (users_data) => {
        for (var i = 0; i < users_data.length; i++) {

            var user_id = users_data[i].user_id
            var user_img = users_data[i].user_img
            var user_name = users_data[i].user_name
            var user_role = users_data[i].role
            var user_lastseen = users_data[i].last_seen
            var user_status = users_data[i].status
            var user_pubBlog_count = users_data[i].pubBlog_count

            var time_ago = (time) => {
                switch (typeof time) {
                    case 'number':
                        break;
                    case 'string':
                        time = +new Date(time);
                        break;
                    case 'object':
                        if (time.constructor === Date) time = time.getTime();
                        break;
                    default:
                        time = +new Date();
                }
                var time_formats = [
                    [60, 'seconds', 1], // 60
                    [120, '1 minute ago', '1 minute from now'], // 60*2
                    [3600, 'minutes', 60], // 60*60, 60
                    [7200, '1 hour ago', '1 hour from now'], // 60*60*2
                    [86400, 'hours', 3600], // 60*60*24, 60*60
                    [172800, 'Yesterday', 'Tomorrow'], // 60*60*24*2
                    [604800, 'days', 86400], // 60*60*24*7, 60*60*24
                    [1209600, 'Last week', 'Next week'], // 60*60*24*7*4*2
                    [2419200, 'weeks', 604800], // 60*60*24*7*4, 60*60*24*7
                    [4838400, 'Last month', 'Next month'], // 60*60*24*7*4*2
                    [29030400, 'months', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
                    [58060800, 'Last year', 'Next year'], // 60*60*24*7*4*12*2
                    [2903040000, 'years', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
                    [5806080000, 'Last century', 'Next century'], // 60*60*24*7*4*12*100*2
                    [58060800000, 'centuries', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
                ];
                var seconds = (+new Date() - time) / 1000,
                    token = 'ago',
                    list_choice = 1;

                if (seconds == 0) {
                    return 'Just now'
                }
                if (seconds < 0) {
                    seconds = Math.abs(seconds);
                    token = 'from now';
                    list_choice = 2;
                }
                var i = 0,
                    format;
                while (format = time_formats[i++])
                    if (seconds < format[0]) {
                        if (typeof format[2] == 'string')
                            return format[list_choice];
                        else
                            return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
                    }
                return time;
            }

            var dateToYMD = (date) => {
                var strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var blog_day = date.getDate();
                var blog_mon = strArray[parseInt(date.getMonth())];
                var blog_yr = date.getFullYear();

                // return (blog_day <= 9 ? '0' + blog_day : blog_day) + ' ' + blog_mon + ' ' + blog_yr + " &#9679; " + time_ago(date.getTime())
                return time_ago(date.getTime())
            }

            var roleColor = (role) => {
                if (role == "admin") return "user_role_admin"
                else if (role == "contributor") return "user_role_contrib"
                else return "user_role_newbie"
            }

            var statColor = (stat) => {
                return (stat == "active" ? '' : 'cell_status_disable')
            }

            $(".dashboard_userMgnt_userTable_con .dashboard_userMgnt_userTable .userTable_body").append(
                `<div class="userTable_row">
                        <div class="userTable_cell">
                            <div class="checkbox_con flexc">
                                <label class="checkbox flexc">
                                    <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="` + user_id + `">
                                    <div class="checkmark flexc"><i class="far fa-check"></i></div>
                                </label>
                            </div>
                        </div>

                        <div class="userTable_cell">
                            <div class="userTable_cell_user_con flexc">
                                <div class="cell_userImg_wrap">
                                    <img class="cell_userImg" src="./assests/users_img/` + user_img + `">
                                </div>
                                <div class="userTable_cell_userName">` + user_name + `<br><small class="user_role ` + roleColor(user_role) + `">` + user_role + `</small></div>
                            </div>
                        </div>

                        <div class="userTable_cell userTable_cell_hide">` + user_pubBlog_count + `</div>
                        <div class="userTable_cell userTable_cell_hide">0</div>
                        <div class="userTable_cell userTable_cell_hide">` + dateToYMD(new Date(user_lastseen)) + `</div>
                        <div class="userTable_cell userTable_cell_hide"><div class="userTable_cell_status ` + statColor(user_status) + `">` + user_status + `</div></div>
                        <div class="userTable_cell"><div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div></div>
                        <div class="userTable_cell"><div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div></div>
                        <div class="userTable_cell userTable_cell_hide"><div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div></div>
                </div>`
            )



            // user table checkbox
            var checkedStatus
            $(".userTable_head .userTable_cell .selectAll_article_check .article_selectAll_inp").click(() => {
                checkedStatus = $(".userTable_head .userTable_cell .article_selectAll_inp")[0].checked;
                $('.userTable_body .userTable_cell input[name="article_select"]').each(function () {
                    $(this).prop('checked', checkedStatus);
                });
            })


            $(".overveiw_blog_article_sel").click(() => {
                var cSum = 0
                $('.userTable_body .userTable_cell input[name="article_select"]').each(function () {
                    var numCheck = $(this).prop('checked')
                    if (numCheck) {
                        cSum += 1
                    }
                });
                // console.log(cSum)
                if (cSum > 0) {
                    $(".dashboard_userMgnt_tableToolBar_con").slideDown();
                } else {
                    $(".dashboard_userMgnt_tableToolBar_con").slideUp();
                }

            })



            // user profile preveiw
            $(".cell_btn_view").click(() => {
                $("html, body").addClass("noscroll");
                $(".dashboard_modal").css({
                    "visibility": 'visible',
                    "opacity": '1'
                })
                $(".dashboard_userMgnt_userProfile_modal_wrap").css("display", "block")
            })


            // user profile info tabs
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

            var dashboard_modal_close = () => {
                $("html, body").removeClass("noscroll");
                $(".dashboard_modal").css({
                    "visibility": 'hidden',
                    "opacity": '0'
                })
                $(".dashboard_userMgnt_userProfile_modal_wrap").css("display", 'none')
            }

            $(".dashboard_userMgnt_userProfile_modal_closeBtn").on("click", (e) => {
                dashboard_modal_close()
            })

            $(".dashboard_modal").on("click", (e) => {
                if (e.target.classList.contains("dashboard_modal")) {
                    dashboard_modal_close()
                }
            })

        }

    }


    var pg_num = 1
    var art_lim
    var total_users
    var total_pages
    var loadUsers = (offset) => {
        var tpg
        $.ajax({
            type: "POST",
            url: "./sdk/setBlog_users.php",
            data: "&fetch_userId=blog_userId&offset=" + offset,
            success: function (data) {
                tpg = data;
            }
        }).done((response) => {
            response = JSON.parse(response)
            console.log(response)
            // offset = (page number - 1)*limit

            var users_data = response['arr']

            art_lim = response['limit']
            total_users = response['total_users']
            total_pages = response['total_page']

            console.log(users_data)

            var page_arr = []

            userContent(users_data)
        })
        return tpg
    }


    var pagination_loader = (pg_num, total_pages) => {
        // console.log(pg_num, total_pages)
        page_arr = []
        if (total_pages > 1) {
            if (total_pages > 3) {
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                // page_arr.push('<div class="page_pagination_num_wrap userMgnt_pagination_rnd">')
                for (var count = pg_num; count <= pg_num + 2; count++) {
                    if (count == pg_num) page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    else page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                }
                page_arr.push('<span class="dashboard_page_pagination_dots">...</span>')
                page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + total_pages + '">' + total_pages + '</div>')
                // page_arr.push('</div>')
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + (pg_num + 1) + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')

            } else {
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                // page_arr.push('<div class="page_pagination_num_wrap userMgnt_pagination_rnd">')
                for (var count = 1; count <= total_pages; count++) {
                    if (count == 1) page_arr.push(' <div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    else page_arr.push(' <div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                }
                // page_arr.push('</div>')
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + (pg_num + 1) + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
            }
        } else {
            page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
            // page_arr.push('<div class="page_pagination_num_wrap userMgnt_pagination_rnd">')
            for (var count = 1; count <= total_pages; count++) {
                if (count == 1) page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                else page_arr.push(' <div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
            }
            // page_arr.push('</div>')
            page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + (pg_num + 1) + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
        }


        return page_arr
    }

    console.log(loadUsers(0))
    // console.log((pg_num, total_pages))
    // $(".dashboard_userMgnt_pagination_con").html(pagination_loader(pg_num, total_pages))


    // async function callerFun() {
    //     var r = await loadUsers(0)
    //     console.log(loadUsers(0))
    //     $(".dashboard_userMgnt_pagination_con").html(pagination_loader(pg_num, total_pages))

    // }

    // callerFun();



    $(".dashboard_userMgnt_seachbar_btn").click(() => {
        var search_val = $(".userMgnt_seachbar_input").val().toLowerCase()
        var role_val = $('.dashboard_userMgnt_seachbar_role_filter_value input[name="userMgnt_inpRole_val"]:checked').val().toLowerCase()
        var status_val = $('.dashboard_userMgnt_seachbar_status_filter_value input[name="userMgnt_inpStatus_val"]:checked').val().toLowerCase()


        $.ajax({
            type: "POST",
            url: "./sdk/setBlog_users.php",
            data: "&fetch_searchUser=blog_searchUser&search_val=" + search_val + "&role_val=" + role_val + "&status_val=" + status_val
        }).done((response) => {
            response = JSON.parse(response)
            console.log(response)
            if (response != false) {
                var users_data = response['arr']

                $(".dashboard_userMgnt_userTable_con .dashboard_userMgnt_userTable .userTable_body").html("")
                userContent(users_data)
            } else {
                $(".dashboard_userMgnt_userTable_con .dashboard_userMgnt_userTable .userTable_body").html(
                    `<div class="userTable_row" style="height:56px !important;">
                        <div class="flexc" style="background: #ffeeee;position:absolute; top: 50%; right: 50%; transform: translate(50%,-50%);padding: 10px; width:100%; height:100%; color:#ff9c9c; font-size: 15px; font-weight:600">No such user found</div>
                    </div>`)
            }
        })

    })



    var old_num = 1
    var new_num
    var pagination_fcn = (n) => {

        var cur_pg = n
        var prv_pg = parseInt(n - 1)
        var nxt_pg = parseInt(n + 1)

        new_num = cur_pg

        var n_page_arr = []
        if (new_num != old_num) {
            if (total_pages > 3) {
                if (cur_pg == 1) {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    for (var count = pg_num; count < pg_num + 2; count++) {
                        if (count == pg_num) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<span class="dashboard_page_pagination_dots">...</span>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + total_pages + '">' + total_pages + '</div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + nxt_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')

                } else if ((total_pages - cur_pg) > 3) {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + (prv_pg) + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + (cur_pg - 1) + '">' + (cur_pg - 1) + '</div>')
                    for (var count = cur_pg; count < cur_pg + 1; count++) {
                        if (count == cur_pg) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<span class="dashboard_page_pagination_dots">...</span>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + total_pages + '">' + total_pages + '</div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + nxt_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')

                } else if (cur_pg != total_pages) {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + prv_pg + '""><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="1">1</div>')
                    n_page_arr.push('<span class="dashboard_page_pagination_dots">...</span>')
                    for (var count = cur_pg; count < cur_pg + 2; count++) {
                        if (count == cur_pg) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + nxt_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')

                } else {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + prv_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="1">1</div>')
                    n_page_arr.push('<span class="dashboard_page_pagination_dots">...</span>')
                    for (var count = cur_pg - 1; count <= cur_pg; count++) {
                        if (count == cur_pg) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
                }
            } else {
                if (cur_pg == 1) {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd" dashboard_data_pg_num="' + prv_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    for (var count = pg_num; count <= total_pages - 1; count++) {
                        if (count == pg_num) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_count flexc" dashboard_data_pg_num="' + total_pages + '">' + total_pages + '</div>')
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd" dashboard_data_pg_num="' + nxt_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
                } else if (cur_pg == total_pages) {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + prv_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    for (var count = pg_num; count <= total_pages; count++) {
                        if (count == total_pages) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn dashboard_page_pagination_btn_disable userMgnt_pagination_rnd"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
                } else {
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + prv_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-left"></i></div>')
                    for (var count = 1; count < cur_pg; count++) {
                        n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    for (var count = cur_pg; count <= total_pages; count++) {
                        if (count == cur_pg) n_page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                        else n_page_arr.push('<div class="dashboard_userMgnt_pagination_count" dashboard_data_pg_num="' + count + '">' + count + '</div>')
                    }
                    n_page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" dashboard_data_pg_num="' + nxt_pg + '"><div class="dashboard_userMgnt_pagination_btn_overlay"></div><i class="fal fa-angle-right"></i></div>')
                }
            }

            return n_page_arr
        }

    }




    $(document).on("click", (e) => {
        if ($(e.target).hasClass("dashboard_userMgnt_pagination_count") || $(e.target).hasClass("dashboard_userMgnt_pagination_btn_overlay") && !($(e.target).hasClass("dashboard_page_pagination_btn_disable"))) {
            if ($(e.target).hasClass("dashboard_userMgnt_pagination_btn_overlay")) var n = $(e.target).parent().attr('dashboard_data_pg_num')
            else var n = $(e.target).attr('dashboard_data_pg_num')

            if (n != undefined && n > 0) {
                n = parseInt(n)

                var offset = (n - 1) * art_lim
                console.log(offset)

                $(".dashboard_userMgnt_pagination_con").html(pagination_fcn(n))

                // $(".dashboard_userMgnt_userTable_con .dashboard_userMgnt_userTable .userTable_body").html("")
                loadUsers(offset)

                old_num = new_num
            }
        }


    })



})