$(document).ready(() => {
    var loadUsers = () => {
        $.ajax({
            type: "POST",
            url: "./sdk/setBlog_users.php",
            data: "&user_fetch=blogUsers_data"
        }).done((response) => {
            console.log(response)
            for (var i = 0; i < response.length; i++) {

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
                                    <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="` + response[i].user_id + `">
                                    <div class="checkmark flexc"><i class="far fa-check"></i></div>
                                </label>
                            </div>
                        </div>

                        <div class="userTable_cell">
                            <div class="userTable_cell_user_con flexc">
                                <div class="cell_userImg_wrap">
                                    <img class="cell_userImg" src="./assests/users_img/` + response[i].user_img + `">
                                </div>
                                <div class="userTable_cell_userName">` + response[i].user_name + `<br><small class="user_role ` + roleColor(response[i].role) + `">` + response[i].role + `</small></div>
                            </div>
                        </div>

                        <div class="userTable_cell userTable_cell_hide">` + response[i].pubBlog_count + `</div>
                        <div class="userTable_cell userTable_cell_hide">0</div>
                        <div class="userTable_cell userTable_cell_hide">` + dateToYMD(new Date(response[i].last_seen)) + `</div>
                        <div class="userTable_cell userTable_cell_hide"><div class="userTable_cell_status ` + statColor(response[i].status) + `">` + response[i].status + `</div></div>
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