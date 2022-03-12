// var flag = 0;
$(document).ready(() => {
    var loginSignup_modal_close = () => {
        $("html, body").removeClass("noscroll");
        $(".loginSignup_modal_con").css({
            "opacity": '0',
            "visibility": 'hidden'
        })
    }
    $(".loginSignup_modal_closeBtn").click(() => {
        loginSignup_modal_close()
    })

    $(".loginSignup_modal_con").on("click", (e) => {
        if (e.target.classList.contains("loginSignup_modal_con")) {
            loginSignup_modal_close()
        }
    })

    $(".signupM_toggle_btn").click(() => {
        $(".signup_modal_wrap").css("display", "block")
        $(".login_modal_wrap").css("display", "none")
    })

    $(".loginM_toggle_btn").click(() => {
        $(".login_modal_wrap").css("display", "block")
        $(".signup_modal_wrap").css("display", "none")
    })

    var usrImg_el = (img_add) => {
        if (img_add == null) {
            var navUser_img = "<img class='nav_userProfile_img' src='./assests/users_img/default_profile_img.png'>"
        } else {
            var navUser_img = "<img class='nav_userProfile_img' src='./assests/users_img/" + img_add + "'>"
        }
        $(navUser_img).appendTo(".nav_userProfile")
        $(".navLogin_btn").remove()
    }

    $(".login_modal_form").on('submit', (e) => {
        e.preventDefault()
        // var form_data = $(".login_modal_form").serialize() + '&form_name=' + $(".login_form").attr('class')
        var form_data = $(".login_modal_form").serialize() + '&form_name=' + 'login_form'
        $.ajax({
            type: 'POST',
            url: './sdk/setLogin_signup.php',
            data: form_data
        }).done((response) => {
            // console.log(response)
            var data = JSON.parse(response)
            // console.log(data)
            // console.log(data.result[0].user_img)
            if (data['status'] == "new_oreo" || data['status'] == "exi_oreo") {
                usrImg_el(data.result[0].user_img)
                $(".navlogin_dropdown_user>.user_name").text(response[0].user_name)
                $(".navlogin_dropdown_user>.user_role").text(response[0].role)
                $(".sideBar_userProfile_name").text(response[0].user_name)
                $(".sideBar_userProfile_role").text(response[0].role)

                $(".loginSignup_modal_con").css("display", "none")
                $(".login_modal_error").text("")
                $("html, body").removeClass("noscroll");
                $(".login_modal_form").trigger("reset")
            } else {
                var data = JSON.parse(response);
                $(".login_modal_error").text(data.status)
            }
        })
    })

    var flags = [0, 0, 0]
    $(".signup_modal_form input[placeholder=E-mail").on("keypress keyup keydown", (e) => {
        var inp_val = $(".signup_modal_form input[placeholder=E-mail").change().val()
        // console.log(signupfchecker("email", inp_val))
        var form_data = '&inp_data=' + inp_val + '&inp_name=' + 'email'
        $.ajax({
            type: 'POST',
            url: './sdk/setLogin_signup.php',
            data: form_data
        }).done((response) => {
            // console.log(response)
            if (response == 1) {
                $(".signup_modal_error").text("E-mail already exist")
                flags[0] = 1
            } else {
                $(".signup_modal_error").text("")
                flags[0] = 0
            }
        })
    })

    $(".signup_modal_form input[placeholder=Username").on("keypress keyup keydown", (e) => {
        var inp_val = $(".signup_modal_form input[placeholder=Username").change().val()
        var form_data = '&inp_data=' + inp_val + '&inp_name=' + 'username'
        $.ajax({
            type: 'POST',
            url: './sdk/setLogin_signup.php',
            data: form_data
        }).done((response) => {
            if (response == 1) {
                $(".signup_modal_error").text("Username already taken")
                flags[1] = 1
            } else {
                $(".signup_modal_error").text("")
                flags[1] = 0
            }
        })
    })

    $(".signup_modal_form>#c_pass").on("keypress keyup keydown", (e) => {
        var o_pass = $(".signup_modal_form>#o_pass").change().val()
        var c_pass = $(".signup_modal_form>#c_pass").change().val()
        if (o_pass != c_pass) {
            $(".signup_modal_error").text("Password not match")
            flags[2] = 1
        } else {
            $(".signup_modal_error").text("")
            flags[2] = 0
        }
    })


    $(".signup_modal_form").on('submit', (e) => {
        e.preventDefault()
        // var flag = $(".signup_modal_error").text()
        // console.log(flag)
        if (!flags.includes(1)) {
            var form_data = $(".signup_modal_form").serialize() + '&form_name=' + 'signup_form'
            // var form_data = $(".signup_form").serialize() + '&form_name=' + $(".signup_form").attr('class')
            $.ajax({
                type: 'POST',
                url: './sdk/setLogin_signup.php',
                data: form_data
            }).done((response) => {
                // console.log(response)                
                if (response == 'signup sucessful') {
                    usrImg_el(null)

                    $(".loginSignup_modal_con").css("display", "none")
                    $(".signup_modal_error").text("")
                    $("html, body").removeClass("noscroll");
                    $(".signup_modal_form").trigger("reset")
                }
            })
        } else {
            var ind = flags.indexOf(1)
            if (ind == 0) {
                $(".signup_modal_error").text("E-mail already exists")
            } else if (ind == 1) {
                $(".signup_modal_error").text("Username already taken")
            } else {
                $(".signup_modal_error").text("Password not match")
            }
        }
    })

})