$(document).ready(() => {
    $(".login_form").on('submit', (e) => {
        e.preventDefault()
        // var form_data = $(".login_modal_form").serialize() + '&form_name=' + $(".login_form").attr('class')
        var form_data = $(".login_form").serialize() + '&form_name=' + 'login_form'
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
                window.location.href = "index.php"
            } else {
                var data = JSON.parse(response);
                $(".login_error").text(data.status)
            }
        })
    })



    var flags = [0, 0, 0]
    $(".signup_form input[placeholder=E-mail").on("keypress keyup keydown", (e) => {
        var inp_val = $(".signup_form input[placeholder=E-mail").change().val()
        // console.log(signupfchecker("email", inp_val))
        var form_data = '&inp_data=' + inp_val + '&inp_name=' + 'email'
        $.ajax({
            type: 'POST',
            url: './sdk/setLogin_signup.php',
            data: form_data
        }).done((response) => {
            // console.log(response)
            if (response == 1) {
                $(".signup_error").text("E-mail already exist")
                flags[0] = 1
            } else {
                $(".signup_error").text("")
                flags[0] = 0
            }
        })
    })

    $(".signup_form input[placeholder=Username").on("keypress keyup keydown", (e) => {
        var inp_val = $(".signup_form input[placeholder=Username").change().val()
        var form_data = '&inp_data=' + inp_val + '&inp_name=' + 'username'
        $.ajax({
            type: 'POST',
            url: './sdk/setLogin_signup.php',
            data: form_data
        }).done((response) => {
            if (response == 1) {
                $(".signup_error").text("Username already taken")
                flags[1] = 1
            } else {
                $(".signup_error").text("")
                flags[1] = 0
            }
        })
    })

    $(".signup_form>#c_pass").on("keypress keyup keydown", (e) => {
        var o_pass = $(".signup_form>#o_pass").change().val()
        var c_pass = $(".signup_form>#c_pass").change().val()
        if (o_pass != c_pass) {
            $(".signup_error").text("Password not match")
            flags[2] = 1
        } else {
            $(".signup_error").text("")
            flags[2] = 0
        }
    })


    $(".signup_form").on('submit', (e) => {
        e.preventDefault()
        // var flag = $(".signup_modal_error").text()
        // console.log(flag)
        if (!flags.includes(1)) {
            var form_data = $(".signup_form").serialize() + '&form_name=' + 'signup_form'
            // var form_data = $(".signup_form").serialize() + '&form_name=' + $(".signup_form").attr('class')
            $.ajax({
                type: 'POST',
                url: './sdk/setLogin_signup.php',
                data: form_data
            }).done((response) => {
                // console.log(response)                
                if (response == 'signup sucessful') {
                    window.location.href = "index.php"
                }
            })
        } else {
            var ind = flags.indexOf(1)
            if (ind == 0) {
                $(".signup_error").text("E-mail already exists")
            } else if (ind == 1) {
                $(".signup_error").text("Username already taken")
            } else {
                $(".signup_error").text("Password not match")
            }
        }
    })
})