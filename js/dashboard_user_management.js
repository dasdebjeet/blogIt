$(document).ready(() => {
    var loadUsers = () => {
        $.ajax({
            type: "POST",
            url: "./sdk/setBlog_users.php",
            data: "&fetch_userId=blog_userId"
        }).done((response) => {
            response = JSON.parse(response)
            console.log(response)

            var users_data = response['arr']

            var page_lim = response['lim']
            var total_users = response['total_users']
            var total_pages = response['total_page']
            var total_pages = 2


            var prev_page = 0
            var cur_page = 1
            var next_page = 2

            var page_arr = []
            if (total_pages > 4) {
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" data_userT_page_nav="prev" data_userTpage_count="prev"><i class="fal fa-angle-left"></i></div>')
                for (var count = 1; count <= 3; count++) {
                    if (count == 1) page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" data_userTpage_count="' + count + '">' + count + '</div>')
                    else page_arr.push('<div class="dashboard_userMgnt_pagination_count" data_userTpage_count="' + count + '">' + count + '</div>')
                }
                page_arr.push("...")
                page_arr.push('<div class="dashboard_userMgnt_pagination_count" data_userTpage_count="' + total_pages + '">' + total_pages + '</div>')
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" data_userT_page_nav="next" data_userTpage_count="next"><i class="fal fa-angle-right"></i></div>')
            } else {
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" data_userT_page_nav="prev" data_userTpage_count="prev"><i class="fal fa-angle-left"></i></div>')
                for (var count = 1; count <= total_pages; count++) {
                    if (count == 1) page_arr.push('<div class="dashboard_userMgnt_pagination_count userMgnt_pagination_active" data_userTpage_count="' + count + '">' + count + '</div>')
                    else page_arr.push('<div class="dashboard_userMgnt_pagination_count" data_userTpage_count="' + count + '">' + count + '</div>')
                }
                page_arr.push('<div class="dashboard_userMgnt_pagination_btn userMgnt_pagination_rnd" data_userT_page_nav="next" data_userTpage_count="next"><i class="fal fa-angle-right"></i></div>')
            }


            // console.log(page_arr)
            $(".dashboard_userMgnt_pagination_con").html(page_arr)

            var pagination_links = document.querySelectorAll('.dashboard_userMgnt_pagination_count')
            for (const pag_link of pagination_links) {
                pag_link.addEventListener('click', (e) => {
                    console.log($(pag_link).attr('data_userTpage_count'))

                    cur_page = $(pag_link).attr('data_userTpage_count')
                    $(pagination_links).removeClass("userMgnt_pagination_active")
                    $(pag_link).addClass("userMgnt_pagination_active")
                })
            }






            var pagination_btn = document.querySelectorAll('.dashboard_userMgnt_pagination_btn')
            for (const pag_nav of pagination_btn) {
                pag_nav.addEventListener('click', (e) => {
                    // console.log($(pag_nav).attr('data_userTpage_count'))
                    var nav_direc = $(pag_nav).attr('data_userT_page_nav')
                    var nav_count = $(pag_nav).attr('data_userTpage_count')

                    // if (prev_page > -1 && next_page < total_pages) {
                    if (nav_direc == "prev") {
                        prev_page -= 1
                        next_page -= 1
                        cur_page -= 1
                        $(pag_nav).attr('data_userTpage_count', prev_page)
                        $(pagination_links).removeClass("userMgnt_pagination_active")
                        $("[data_userTpage_count=" + cur_page + "]").addClass("userMgnt_pagination_active")

                    } else if (nav_direc == "next") {
                        prev_page += 1
                        next_page += 1
                        cur_page += 1
                        $(pag_nav).attr('data_userTpage_count', next_page)
                        $(pagination_links).removeClass("userMgnt_pagination_active")
                        $("[data_userTpage_count=" + cur_page + "]").addClass("userMgnt_pagination_active")

                    }
                    console.log(prev_page, cur_page, next_page, page_arr[3])
                    // }


                    // $(pagination_btn).removeClass("userMgnt_pagination_active")
                    // $(pag_nav).addClass("userMgnt_pagination_active")
                })
            }


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
                    `
                        <div class="userTable_row">
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

            }

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
        })
    }

    loadUsers()







})