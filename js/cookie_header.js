$(document).ready(() => {

    var log_oldStat = 0;
    var log_newStat = 0;

    var usrImg_el = (img_add) => {
        if (img_add == null) {
            var navUser_img = "<img class='nav_userProfile_img' src='./assests/users_img/default_profile_img.png'>"
        } else {
            var navUser_img = "<img class='nav_userProfile_img' src='./assests/users_img/" + img_add + "'>"
        }
        $(".nav_userProfile>img").remove()
        $(".navLogin_btn").remove()
        $(navUser_img).appendTo(".nav_userProfile")
    }
    setInterval(() => {
        $.ajax({
            type: 'POST',
            url: './includes/cookie_header.php',
            // data: ""
        }).done((response) => {
            // console.log(response)
            if (response != "New user") {
                if (response == "You logged in from a new device! Please login") {
                    log_newStat = 0
                    // console.log(log_oldStat, log_newStat)
                    if (log_newStat != log_oldStat) { // not logedin
                        // console.log(response)
                        $(".navLogin_btn").remove()
                        $(".nav_userProfile>img").remove()
                        $("<div class='navLogin_btn flexc'><div class='water'></div><span>login</span></div>").appendTo(".navLogin_btn_con")

                        $(".sideBar_userProfile").css("display", 'none')
                        $(".sideBar_loginBtn").css("display", 'flex')

                        log_oldStat = log_newStat
                    }
                } else {
                    log_newStat = 1
                    // console.log(log_oldStat, log_newStat)

                    if (log_newStat != log_oldStat) { // logedin
                        // console.log(response)
                        usrImg_el(response[0].user_img)

                        $(".sideBar_loginBtn").css("display", 'none')
                        $(".sideBar_userProfile").css("display", 'flex')
                        $(".navlogin_dropdown_user>.user_name").text(response[0].user_name)
                        $(".navlogin_dropdown_user>.user_role").text(response[0].role)
                        $(".sideBar_userProfile_name").text(response[0].user_name)
                        $(".sideBar_userProfile_role").text(response[0].role)
                        // $(".navlogin_dropdown_user>.user_name").text(response[0].user_name)

                        log_oldStat = log_newStat
                    }
                }
            } else {
                console.log(response)
            }
        })
    }, 1000)

})